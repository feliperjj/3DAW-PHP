<?php
$ehPost = true;
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST ["nome"]; 
    $matricula= $_POST["matricula"];
    if($nome == NULL  || $matricula== NULL)
    {
        echo "Nao foi <br>";
    }
    else if(!file_exists("Dojo.txt")) {
       $arquivo = fopen ("Dojo.txt", "w");
       $cabecalho = "nome;matricula \n";

       fwrite($arquivo, $cabecalho);
    
       $linha = ($nome.";".$matricula.";\n");
       fwrite($arquivo, $linha);

       fclose($arquivo);

    }
    else {
        $arquivo = fopen ("Dojo.txt", "a");

        $linha = ($nome.";".$matricula.";\n");
        fwrite($arquivo, $linha);

        fclose($arquivo);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dojo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <form action="dojo.php" method="POST">
        <fieldset>
            <label>Nome:</label> 
            <input type="text" name="nome">
            <label>Matricula:</label> 
            <input type="text" name="matricula"> <br>
            <input type="submit" value="incluir">
        </fieldset>
    </form>
    
</body>
</html>