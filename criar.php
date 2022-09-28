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
        $mat = $_POST["matricula"];
        $email = $_POST["email"];

        $sqlCriar = "INSERT into `registroalunos`(`nome`, `matricula`, `email`) VALUES ('$nome','$mat','$email')";

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

    <title>Index</title>
</head>

<body>
<!--    
    <div class="mestre">

        <div class="criar">
            <h1>Criar</h1>
            <form action="index.php" method="POST">
                <label for="Matricula">Matrícula:</label>
                <input type="text" name="matricula" placeholder="Num de Matrícula"><br>

                <label for="Nome">Nome:</label>
                <input type="text" name="nome" placeholder="Nome"><br>

                <label for="Email">Email:</label>
                <input type="text" name="email" placeholder="Email"><br>

                <input name="botaoCriar" class="botao" type="submit" value="Criar">
              
            </form>
            <a href="index.php">Voltar</a>
        </div> -->
        <div class="mb-3">
        <form action="criar.php" method="POST">
  
    <label for="Matricula" class="form-label">Matricula</label>
    <input type="text" name="matricula" placeholder="Num de Matrícula" class="form-control"><br>

   
  

    <label for="Nome" class="form-label">Nome</label>
    <input type="text" class="form-control" name="nome" placeholder="Nome"><br>
 
  
  <label for="Email" class="form-label">Email</label>  
  <input type="email" class="form-control" name="email" placeholder="Email"><br>
 
  <input name="botaoCriar" class="botao" type="submit" value="Criar">
  <?php if($bolCriar == true){ echo("<p style=\"margin-top: 0px;\">Aluno Criado!</p>");} ?>
  <a href="index.php">Voltar</a>  
</div>

</form>
        
     
</body>
</html>
