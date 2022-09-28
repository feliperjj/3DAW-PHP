<?php

$ehost = true;
$usuario = "root";
$senha = "";



// se o botao de registrar é clicado
if (isset($_POST['register'])) {

    try {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password_1= $_POST['password_1'];
    $password_2 = $_POST['password_2'];
        $conn = new PDO("mysql:host=localhost;dbname=register", $usuario, $senha);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO  `users`( `username`, `email`, `password`) VALUES('$username','$email','$password_1')";
        echo "Connected successfully";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
       
        $sql = "Insert into users(`username`, `email`, `password`) VALUES ( '$username','$email','$password_1')";
        $result = $conn->query($sql);
       if (!$conn->query($sql)) {
           echo("Error description: " . $conn->error);
         }
       echo "result?: " . $result;
   } 
       $ehPost = false;
   }
   echo "Include Realizado";
   ?>
   