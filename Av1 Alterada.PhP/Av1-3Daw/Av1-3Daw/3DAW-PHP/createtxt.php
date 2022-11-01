<?php
include("server.php");
$ehPost = true;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST ["nome"];
    $email= $_POST["email"];
    $senha = $_POST ["senha"];
    $tipo= $_POST["tipo"];
    if ($nome == null  || $email== null || $senha == null || $tipo == null) {
        echo "Nao foi <br>";
    } elseif (!file_exists("Usuario.txt")) {
        $arquivo = fopen("Usuario.txt", "w");
        $cabecalho = "nome;email;senha;tipo \n";

        fwrite($arquivo, $cabecalho);

        $linha = ($nome.";".$email.";".$senha.";".$tipo.";\n");
        fwrite($arquivo, $linha);

        fclose($arquivo);
    } else {
        $arquivo = fopen("Usuario.txt", "a");

        $linha = ($nome.";".$email.";".$senha.";".$tipo.";\n");
        fwrite($arquivo, $linha);

        fclose($arquivo);
    }


    $arquivo = fopen('Usuario.txt', 'r'); 

while (!feof($arquivo)) {
    $data = explode('|', fgets($arquivo));
    $query = "INSERT INTO users (nome, email, senha, tipo) VALUES ('".implode("', '", $data)."');";
}
}

?>
<!DOCTYPE html>
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
    <a class="navbar-brand" href="index.php">Usuarios</a>
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
<h1>Usuarios</h1>
<form action="createtxt.php"  class="row g-3" method="POST">
        <div class="mb-3">
      
  
    <label for="nome" class="form-label">Nome</label>
    <input type="text" name="nome"  class="form-control"><br>

   
  

    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" placeholder="Email"><br>
 
  
  <label for="password" class="form-label">Senha</label>  
  <input type="senha" class="form-control" name="senha" placeholder="Senha"><br>

  <input type="checkbox" id="tipo" name="tipo" value="tipo"><br>
  <label for="usuario"> Usuario</label><br>
  <input type="checkbox" id="tipo" name="tipo" value="tipo"><br>
  <label for="admin"> Admin</label><br>
  <input name="botaoCriar" class="btn" type="submit" value="Criar"><br>
</form>
 
    
</body>
</html