<?php
    $servidor = "localhost";
    $user = "root";
    $pass = "";
    $banco = "copadomundo";

    if($_SERVER["REQUEST_METHOD"]=="GET")
    {   
        $nome = $_GET["nome"];
        $nomeAlt = $_GET["nomeAlt"];
        $tecnico = $_GET["tecnico"]; 
        $grupo = $_GET["grupo"]; 
        $pontos = $_GET["pontos"]; 

        $conn = new mysqli ($servidor, $user, $pass, $banco);
        $sql="UPDATE `selecao` SET `nome`='$nomeAlt',`grupo`='$grupo',`tecnico`='$tecnico',`pontos`=$pontos WHERE `nome` = '$nome'";
        
        $result=$conn->query($sql);
        echo $sql;
    }
?>