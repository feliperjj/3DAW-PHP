<?php
$ehPost = true;
$servidor = "localhost";
$usuario = "root";
$senha = "";
$bancodeDados = "register";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $username = $_GET["username"];
    $email = $_GET["email"];
    $password_1 = $_GET["password_1"];
    $password_2 = $_GET["password_2"];

    $conn = new mysqli($servidor, $usuario, $senha, $bancodeDados);
    if ($conn->connect_error) {
        die("Conexao com o banco de dados falhou!!!");
    }
//INSERT INTO `alunos`(`id`, `nome`, `matricula`, `email`) VALUES ([value-1],[value-2],[value-3],[value-4])
    $sql = "Insert into users(`username`, `email`, `password`) VALUES ( '$username','$email','$password_1')";
     $result = $conn->query($sql);
    if (!$conn->query($sql)) {
        echo("Error description: " . $conn->error);
      }
    echo "result?: " . $result;
} else {
    $ehPost = false;
}
echo "Include Realizado";
?>
