<?php
include("server.php");
$bolAlt = false;
if (isset($_POST["botaoAlt"])) {
  $nome = $_POST["nome"];  
    $nomeA = $_POST["nomeA"];
    $periodo = $_POST["periodo"];
    $idpre = $_POST["idpre"];
    $credito = $_POST["credito"];
    
    $sqlAlt="UPDATE `disciplina` SET
    `nome`='{$nome}',
    `periodo`='{$periodo}',
    `idpre`='{$idpre}',
    `credito`='{$credito}'
    WHERE
    nome=".$_REQUEST["nomeA"];
        
    
        

    echo $sqlAlt;



    if (!$conn->query($sqlAlt)) {
        echo ("Error description: " . $conn->error);
    } else {
        $bolAlt = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Alterar</title>

</head>

<body>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Disciplina</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" href="criar.php">Criar</a>
        <a class="nav-link" href="alterar.php">Alterar </a>
        <a class="nav-link" href="listar.php">Listar</a>
        <a class="nav-link" href="deletar.php">Excluir</a>
      </div>
    </div>
  </div>
</nav>
   <form action="index.php" class="row g-3" method="POST">
    <div class="mb-3">
        
        <h1>Alterar</h1>
        

    
   
        <label for="nomeA" class="form-label">Disciplina</label>
        <input type="text" name="nomeA" placeholder="Disciplina a ser alterada" class="form-control"><br>




        <label for="nome" class="form-label">Disciplina [Alteração Obrigatória]:</label>
        <input type="text" class="form-control" name="nome" placeholder="Novo nome da Disciplina"><br>

        <label for="periodo" class="form-label">Período [Alteração Obrigatória]:</label>
        <input type="periodo" class="form-control" name="periodo" placeholder="Altere o Periodo"><br>
        
        <label for="idpre" class="form-label">Idpre [Alteração Obrigatória]:</label>
        <input type="idpre" class="form-control" name="idpre" placeholder="Id de pré Requisito"><br>
        
        <label for="credito" class="form-label">Credito [Alteração Obrigatória]:</label>
        <input type="credito" class="form-control" name="credito" placeholder="Novo credito"><br>
        
        
        
        

        <input name="botaoAlt" class="botao" type="submit" value="Alterar">
        <?php if ($bolAlt == true) {
            echo ("<p style=\"margin-top: 0px;\">Disciplina Alterado!</p>");
        } ?>
        </form>
        </div>

        <a href="index.php">Voltar</a>




</body>

</html>