<?php
    $matricula= strval($_GET["matricula"]);
    $encontrei = false;
    $nome = "";
//    echo "Matricula: " . $matricula . "<br>";
    if($matricula == ""  || $matricula== NULL)
    {
        echo "Nao foi  <br>";
    }
    else {
        $arquivo=fopen("Dojo.txt","r");
        
        //$linha[] = fgets($arquivo);
        $x=0;
        while (!feof($arquivo)) {
            $linha[] = fgets($arquivo);
//            echo $linha[$x] . "<br>";
            $aluno = explode(";", $linha[$x]);
//            echo $aluno[0] . "<br>";
//            echo $aluno[1] . "<br>";
        if($aluno[1] == strval($matricula))
        {
            $encontrei = true;
            $nome = $aluno[0];
//            echo "encontrei";
        } else {
//            echo "nao encontrei";
        }
        $x++;
        }
    }
?>


<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Buscar Matrícula</title>
</head>
<body>
<?php
if($encontrei) 
{
?>
    <form action="alterar.php" method="GET">
    <fieldset>
    <label>Nome:</label> 
            <input type="text" name="nome" value=<?php echo "\"" . $nome . "\""; ?>>
            <label>Matricula:</label> 
            <input type="text" name="matricula" value = <?php echo "\"" . $matricula . "\""; ?>> <br>
            <input type="submit" value="incalterarluir">
    </fieldset>
    </form>
<?php
}
?>
</body>
</html>