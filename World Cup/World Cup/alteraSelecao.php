<?php
    $servidor = "localhost";
    $user = "root";
    $pass = "";
    $banco = "copadomundo";
    $retorno = "";

    if($_SERVER["REQUEST_METHOD"]=="GET")
    {   
        $nome = $_GET["nome"]; 
        $conn = new mysqli ($servidor, $user, $pass, $banco);
        $sql="SELECT * FROM `selecao` WHERE `nome` = '$nome'";
        $result=$conn->query($sql);
        
        $discp = $result->fetch_assoc();
        
        if ($result=true){
            $retorno=json_encode($discp);

        } else {
            $retorno=json_encode("Erro");
        }
    }
echo $retorno;
?>