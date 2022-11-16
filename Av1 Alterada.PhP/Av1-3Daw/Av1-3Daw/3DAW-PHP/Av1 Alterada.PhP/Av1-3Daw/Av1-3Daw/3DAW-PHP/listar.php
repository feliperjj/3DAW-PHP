
<?php
  include("server.php");
if (isset($_POST["botaoExib"])) {
        $nome = $_POST["nome"];
        $sqlExib = "SELECT `nome`, `credito`, `periodo` FROM `disciplina` WHERE `nome` = '$nome'";

        $boolTest = false;
        if (!$conn->query($sqlExib)) {
            echo ("Error description: " . $conn->error);
        }
        if ($result=mysqli_query($conn,$sqlExib))
            {
                while ($row=mysqli_fetch_row($result))
                {
                    $printM = $row[0];
                    $printN = $row[1];
                    $printE = $row[2];
                }
                if(mysqli_num_rows($result)){
                    $boolTest = true;
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
    <title>Index</title>
   
</head>
<body onload="carregaAlunos();">
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

    <table id="tab" style="border:1px solid">
        <tr style="border:1px solid">
            <th style="border:1px solid">Disciplina</th>
            <th style="border:1px solid">Período</th>
            <th style="border:1px solid">Idpre</th>
            <th style="border:1px solid">Credito</th>
        </tr>
    </table>
    <p id="msg">
    </p>
</body>
</html>