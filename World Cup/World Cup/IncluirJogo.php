<?php
    $servidor = "localhost";
    $user = "root";
    $pass = "";
    $banco = "copadomundo";
    if($_SERVER["REQUEST_METHOD"]=="GET")
    {    
        $data = $_GET["data"];
        $hora= $_GET["hora"];
        $local = $_GET["local"];
        $selecaoA= $_GET["selecaoA"];
        $selecaoB= $_GET["selecaoB"];
        $golsA= $_GET["golsA"];
        $golsB= $_GET["golsB"];
        

        $conn = new mysqli ($servidor, $user, $pass, $banco);
        $sql="INSERT INTO `confronto`(`data`, `hora`,`local`, `selecaoA`, `selecaoB`, `golsA`, `golsB`) 
            VALUES ('$data', '$hora','$local', '$selecaoA', '$selecaoB', '$golsA', '$golsB')";
        $result=$conn->query($sql);

        if($golsA>$golsB){
            $sqlPonto = "UPDATE `selecao` SET `pontos` = `pontos`+3 WHERE `nome` = '$selecaoA'";
            $resultPonto=$conn->query($sqlPonto);
        }
        elseif ($golsA<$golsB) {
            $sqlPonto = "UPDATE `selecao` SET `pontos` = `pontos`+3 WHERE `nome` = '$selecaoB'";
            $resultPonto=$conn->query($sqlPonto);
        }
        else{
            $sqlPonto = "UPDATE `selecao` SET `pontos` = `pontos`+1 WHERE `nome`  = '$selecaoA' or `nome` = '$selecaoB'";
            $resultPonto=$conn->query($sqlPonto);
        }
    }
?>
