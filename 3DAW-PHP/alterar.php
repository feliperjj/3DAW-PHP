<?php

$file = fopen("dojo.txt", "r+");

if (!$file) {
    exit("Falha ao abrir o arquivo");
}

fwrite($file, "Teste no inicio do arquivo\n\n");

while (($line = fgets($file)) !== false) {
    echo $line;
}

if (!feof($file)) {
    exit("Falha inesperada do fgets()");
}

fclose($file);
    ?>
    

    <!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Buscar Matrícula</title>
</head>
<body>



    <form action="alterar.php" method="GET">
    <fieldset>
            <label>Nome:</label> 
            <input type="text" name="nome" value=<?php echo "\"" . $nome . "\""; ?>>
            <label>Matricula:</label> 
            <input type="text" name="matricula" value = <?php echo "\"" . $matricula . "\""; ?>> <br>
            <input type="submit" value="incalterarluir">
    </fieldset>
    </form>

</body>
</html>