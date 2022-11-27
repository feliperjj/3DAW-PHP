<?php
    $servidor = "localhost";
    $user = "root";
    $pass = "";
    $banco = "copa";
    $retorno = "";
    
    if($_SERVER["REQUEST_METHOD"]=="GET")
    {    
        $grupo = $_GET["grupo"];
        $conn = new mysqli ($servidor, $user, $pass, $banco);
        $sql="SELECT `nome` FROM `selecao` WHERE `grupo` = '$grupo'";
        
        $result=$conn->query($sql);
        $vetJogos[] = array();
        
        $i = 0;
        
        
        While ($linha = $result->fetch_assoc()){
            foreach ($linha as $x) {
                $k = 0;
                $sqlJogo= "SELECT * FROM `confronto` WHERE `selecaoA` = '$x' OR `selecaoB` = '$x'";
                $resultJogo= $conn->query($sqlJogo);
                while($linha2 = $resultJogo->fetch_assoc()){
                        $vetJogos[$i]=$linha2;
                        $i++;
                        
                    }
                }
                
            }
            $vetJogos=array_unique($vetJogos, SORT_REGULAR);
        
            $retorno=json_encode(array_values($vetJogos));
            echo $retorno;
    }
?>
