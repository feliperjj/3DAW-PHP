<?php
  include("server.php");
$bolCriar = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli($servidor, $usuario, $senha, $bancodeDados);
    if ($conn->connect_error) {
        die("Conexao com o banco de dados falhou!!!");
    }


    if (isset($_POST["botaoCriar"])) {
        $nome = $_POST["nome"];
        $periodo = $_POST["periodo"];
        $credito = $_POST["credito"];
        $idpre = $_POST["idpre"];

        $sqlCriar = "INSERT into `disciplina`(`nome`, `periodo`, `credito`,`idpre`) VALUES ('$nome','$periodo',$credito,'$idpre')";

        if (!$conn->query($sqlCriar)) {
            echo("Error description: " . $conn->error);
        } else {
            $bolCriar = true;
        }
    }
        }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   <script src="index.js"></script> 
    <title>Index</title>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Disciplinas</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" href="criar.php">Criar</a>
        <a class="nav-link" href="alterar.php">Alterar </a>
        <a class="nav-link" href="listar.php">Listar</a>
        <a class="nav-link" href="deletar.php">Excluir</a>
        <a class="nav-link" href="createtxt.php">Usuario</a>

      </div>
    </div>
  </div>
</nav>


  



    <h1>Criar</h1>
    <form id="formIncluir">

        <label for="Nome">Nome:</label>
        <input type="text" id="nome" name="nome"><br><br>
        <label for="Email">Email:</label>
        <input type="text" id="email" name="email"><br><br>
        <label for="Matricula">Matrícula:</label>
        <input type="text" id="matricula" name="matricula"><br><br>
        <input type="button" name="botaoCriar" value="Enviar" onclick="enviarForm();">

    </form>
    <a href="index.php">Voltar</a>
    <p id="msg">

    </p>

</body>

</html>
