<?php
$nome = file_get_contents ('dojo.txt',true); 
if (strstr($nome, 'nome')) //coloca o nome numa variavel
{
unlink ("dojo.txt");
echo "excluido";
}
else
{
echo "nao encontrado";
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Excluir</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <form action="dojo.php" method="POST">
        <fieldset>
            <label>Nome:</label> 
            <input type="text" name="nome">
            <input type="submit" value="excluir">
        </fieldset>
    </form>
    
</body>
</html>