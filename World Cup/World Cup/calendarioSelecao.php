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
        $sql="SELECT * FROM `confronto` WHERE `selecaoA` = '$nome' OR `selecaoB` = '$nome'";
        
        $result=$conn->query($sql);
        $vetJogos[] = array();
        
        $i = 0;
        
        While ($linha = $result->fetch_assoc()){
            $vetJogos[$i] = $linha;
            $i++;
        }

        if ($result=true){
            $retorno=json_encode($vetJogos);

        } else {
            $retorno=json_encode("DEU RUIM!😭😭");
        }
    }
echo $retorno;
?>
