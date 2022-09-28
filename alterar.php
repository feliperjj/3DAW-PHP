<?php
include("server.php");
$bolAlt = false;
if (isset($_POST["botaoAlt"])) {
    $nome = $_POST["nome"];
    $mat = $_POST["matricula"];
    $email = $_POST["email"];

    $sqlAlt = "UPDATE `registroalunos` SET";


    if ($nome != "") {
        $sqlAlt .= " `nome` = '$nome' , ";
    }
    if ($email != "") {
        $sqlAlt .= " `email` = '$email' ";
    }

    $sqlAlt .= "WHERE  `matricula` =  '$mat' ";

    echo $sqlAlt;



    if (!$conn->query($sqlAlt)) {
        echo ("Error description: " . $conn->error);
    } else {
        $bolAlt = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Alterar</title>

</head>

<body>
    <div class="mb-3">
        <h1>Alterar</h1>
        <form action="index.php" method="POST">

    
   
        <label for="Matricula" class="form-label">Matricula</label>
        <input type="text" name="matricula" placeholder="Matrícula a ser alterada" class="form-control"><br>




        <label for="Nome" class="form-label">Nome [Alteração Obrigatória]:</label>
        <input type="text" class="form-control" name="nome" placeholder="Novo nome"><br>


        <label for="Email" class="form-label">Email [Alteração Obrigatória]:</label>
        <input type="email" class="form-control" name="email" placeholder="Novo email"><br>

        <input name="botaoAlt" class="botao" type="submit" value="Alterar">
        <?php if ($bolAlt == true) {
            echo ("<p style=\"margin-top: 0px;\">Aluno Alterado!</p>");
        } ?>
        </form>
        </div>

        <a href="index.php">Voltar</a>




</body>

</html>