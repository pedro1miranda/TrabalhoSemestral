<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <?php session_start() ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary" style="whidth:100%;">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Area do usuario</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cadastrar.php">cadastrar</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $_SESSION['email'];?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="minhaConta.php">Minha conta</a></li>
            <li><a class="dropdown-item" href="cadastrar.php">Cadastro</a></li>
            <li><a class="dropdown-item" href="loja.php">Loja</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
    |<div id="text">
<form action="alterar.php" method="post">
      <h1 class="name">BEM VINDO <?php echo $_SESSION['nome'];?></h1><br>
      <h1 class="cpf">CPF: <?php echo $_SESSION['cpf'];?></h1><br>
      <h1 class="cpf">e-mail: <?php echo $_SESSION['email'];?></h1><br>
      <button type="submit" name="excluirCadastro" class="btn btn-danger">Excluir Conta</button>
      <button type="submit" name="alterarSenha" class="btn btn-warning">Alterar Senha</button>
</form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>