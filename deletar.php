<?php
$bolDel = false;
include("server.php");
if (isset($_POST["botaoDel"])) {
        $mat = $_POST["matricula"];

        $sqlDel = "DELETE  FROM `registroalunos` WHERE `matricula` = '$mat' " ;

        if (!$conn->query($sqlDel)) {
            echo ("Error description: " . $conn->error);
        }else{
            $bolDel = true;
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
    <title>Index</title>
</head>
<body>
<div class="form-group">
            <h1>Apagar</h1>
            <form action="deletar.php" method="POST">
                <label for="delByMatricula">Matrícula: </label>
                <input type="text" class = "form-row" name="matricula" placeholder="Matrícula a ser deletada"><br>
                <input name="botaoDel" class="btn-primary" type="submit" value="Apagar">
                <?php if($bolDel == true){ echo("<p style=\"margin-top: 0px;\">Aluno Apagado!</p>");} ?>
            </form>
            <a href="index.php">Voltar</a>
        </div>
        </body>
        </html>