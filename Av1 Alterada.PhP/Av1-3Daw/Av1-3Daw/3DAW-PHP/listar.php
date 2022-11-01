
<?php
  include("server.php");
if (isset($_POST["botaoExib"])) {
        $nome = $_POST["nome"];
        $sqlExib = "SELECT `nome`, `credito`, `periodo` FROM `disciplina` WHERE `nome` = '$nome'";

        $boolTest = false;
        if (!$conn->query($sqlExib)) {
            echo ("Error description: " . $conn->error);
        }
        if ($result=mysqli_query($conn,$sqlExib))
            {
                while ($row=mysqli_fetch_row($result))
                {
                    $printM = $row[0];
                    $printN = $row[1];
                    $printE = $row[2];
                }
                if(mysqli_num_rows($result)){
                    $boolTest = true;
                }
       
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
    <title>Index</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Disciplinas</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" href="criar.php">Criar</a>
        <a class="nav-link" href="alterar.php">Alterar </a>
        <a class="nav-link" href="listar.php">Listar</a>
        <a class="nav-link" href="deletar.php">Excluir</a>
        <a class="nav-link" href="createtxt.php">Usuario</a>
      </div>
    </div>
  </div>
</nav>

        <div class="mb-3">
            <h1>Exibir</h1>
            <form action="listar.php" method="POST">
                <input class="form-control" type="text" name="nome" placeholder="Disciplina a ser buscada">
                <input name="botaoExib"  class="btn btn-primary" type="submit" value="Exibir 1"><br>
                <?php
                if (isset($_POST["botaoExib"])) {
                    if ($boolTest == true) {
                        echo "<table>
                <tr>
                    <td>$printM</td>
                    <td>$printN</td>
                    <td>$printE</td>
                </tr>
            </table>";
                    }
                }


                ?>
                <p>OU</p>
                <input name="botaoExibTds" class="btn btn-primary" type="submit" value="Exibir Todos"><br>


            </form>
            <table class="table"></table> 
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Disciplina</th>
                        <th scope="col">Creditos</th><br>
                    </tr>
                </thead>
                <tbody>
             <?php       
            if (isset($_POST["botaoExibTds"])) {
                $sqlExibTds = "SELECT `nome`, `periodo`, `credito` FROM `disciplina`";

                if (!$conn->query($sqlExibTds)) {
                    echo ("Error description: " . $conn->error);
                }
                if ($result = mysqli_query($conn, $sqlExibTds)) {
                    while ($row = mysqli_fetch_row($result)) {

                        echo  "<tr><td > $row[0]</td> <br>";
                        echo  "<td> $row[1]</td> <br>";
                        echo  "<td> $row[2]</td></tr> <br>";
                    }
                }
            }
                        ?>
                </tbody>
            <a href="index.php">Voltar</a>

            </body>
        </html>