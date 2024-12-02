<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <?php
require 'conex.php';
session_start();

if(isset($_POST['excluirCadastro'])){
    try {
        $cpf = $_SESSION['cpf'];
        $sql = "DELETE FROM adm WHERE cpf=:cpf";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->execute();
        header("Location: cadastrar.php");
        exit();
    } catch (PDOException $e) {
        echo "Erro de cadastro: " . $e->getMessage();
    }
}
?>
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
            <li><a class="dropdown-item" href="loja.php">carrinho</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
        <h1>Trocar Senha</h1>
        <form action="#" method="post">
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">  Senha</label>
        <input type="password" name="senha" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">  Nova senha</label>
        <input type="password" name="novaSenha" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">  Confirmar nova senha</label>
        <input type="password" name="confirmaNovaSenha" class="form-control"id="exampleInputPassword1">
    </div>
    <button type="submit" name="alterarSenha" class="btn btn-primary">Trocar</button>
    </form>
    <?php
    if(isset($_POST['alterarSenha'])){
        if(isset($_POST['senha']) && isset($_POST['novaSenha']) && isset($_POST['confirmaNovaSenha'])){
            $senha = $_POST['senha'];
            $novaSenha = $_POST['novaSenha'];    
            $confirmaNovaSenha = $_POST['confirmaNovaSenha'];
            if($senha == $_SESSION['senha']){
                if($novaSenha == $confirmaNovaSenha){
                    $senha_cripto = password_hash($novaSenha, PASSWORD_BCRYPT);
                try {
                    $sql = "UPDATE adm SET senha = :senha WHERE cpf = :cpf";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':cpf', $cpf);
                    $stmt->bindParam(':senha', $senha_cripto);
                    $stmt->execute();
                    echo "<div class='alert alert-success' role='alert'>
                    Senha trocada com sucesso
                  </div>";
                    exit();
                } catch (PDOException $e) {
                    echo "Erro de cadastro: " . $e->getMessage();
                }
            }else{
                echo"<div class='alert alert-danger' role='alert'>
                As senhas divergem
              </div>";
            }
            }else{
                
                echo"<div class='alert alert-danger' role='alert'>
                Senha incorreta
              </div>";
            }
        }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>