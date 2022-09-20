<?php
$username = "";
$email = "";
$errors = array();
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=registration", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
// se o botao de registrar é clicado
if (isset($_POST['register'])) {

    $username = mysqli_real_escape_string($mysqli, $_POST['username']);
    $email = mysqli_real_escape_string($mysqli, $_POST['username']);
    $password_1 = mysqli_real_escape_string($mysqli, $_POST['username']);
    $password_2 = mysqli_real_escape_string($mysqli, $_POST['username']);
    // verificando se os campos estão sendo preenchidos adequadamente
    if (empty($username)) {
        array_push($erros, "Username is required");
    }
    if (empty($email)) {
        array_push($erros, "Email is required");
    }
    if (empty($password_1)) {
        array_push($erros, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($erros, "The two pass words not match");
    } //na falta de erros salve o usuario na database
    if (count($errors) == 0) {
        $password = md5($password_1); //criptografando o password
        $sql = "INSERT INTO user(username,email,password) 
            VALUES('$username','$email,'$password')";
        mysqli_query($db, $sql);
    }
}
