<?php

$errors=array();
$servername = "localhost";
$dbuserName = "root";
$password = "";
$db = "register";



// se o botao de registrar é clicado
if (isset($GET['register'])) {

    // $id = $_GET["id"];
    if ($_SERVER["REQUEST_METHOD"] == "_GET") {
        $username = $_GET["username"];
        $email = $_GET["email"];
        $password_1 = $_GET["password_1"];
        $password_2 = $_GET["password_2"];

        $conn = new mysqli($servername, $dbuserName, $password, $db);
        if (!$conn->connect_error) {
            die("Conexao com o banco de dados falhou!!!");
        }

        // verificando se os campos estão sendo preenchidos adequadamente
        if (empty($username)) {
            array_push($errors, "Username is required");
        }
        if (empty($email)) {
            array_push($errors, "Email is required");
        }
        if (empty($password_1)) {
            array_push($errors, "Password is required");
        }
        if ($password_1 != $password_2) {
            array_push($errors, "The two passwords not match");
        } //na falta de erros salve o usuario na database

        if (count($errors) == 0) {
            echo ($password_1);
            $sql = "INSERT INTO  `users`( `username`, `email`, `password`) VALUES ('$username', '$email','$password_1')";
            $result = $conn->query($sql);
            echo ($result);
        }
    }
}
