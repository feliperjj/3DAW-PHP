<?php
    $servidor = "localhost";
    $user = "root";
    $pass = "";
    $banco = "copadomundo";
    if($_SERVER["REQUEST_METHOD"]=="GET")
    {    
        $nome = $_GET["nome"];
        $tecnico= $_GET["tecnico"];
        $grupo= $_GET["grupo"];
        
        $conn = new mysqli ($servidor, $user, $pass, $banco);
        $sql="INSERT INTO `selecao`(`nome`, `tecnico`, `grupo`, `pontos`) VALUES ('$nome', '$tecnico', '$grupo', 0)";
        $result=$conn->query($sql);
    }
?>
