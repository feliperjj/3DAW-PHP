<?php
 
 $servidor = "localhost";
 $usuario = "root";
 $senha = "";
 $bancodeDados = "registro";
 
 
 
 if ($_SERVER["REQUEST_METHOD"] == "GET") {
     $conn = new mysqli($servidor, $usuario, $senha, $bancodeDados);
     if ($conn->connect_error) {
         die("Conexao com o banco de dados falhou!!!");
     }
 }
     
$bolCriar = false;
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $conn = new mysqli($servidor, $usuario, $senha, $bancodeDados);
    if ($conn->connect_error) {
        die("Conexao com o banco de dados falhou!!!");
    }


    if (isset($_GET["botaoCriar"])) {
        $nome = $_GET["nome"];
        $mat = $_GET["matricula"];
        $email = $_GET["email"];

        $sqlCriar = "INSERT into `aluno`(`nome`, `matricula`, `email`) VALUES ('$nome','$mat','$email')";

        if (!$conn->query($sqlCriar)) {
            echo("Error description: " . $conn->error);
        } else {
            $bolCriar = true;
        }
    }
        }

?>