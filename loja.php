<?php 
require 'conex.php';

$sql = "SELECT nome, dsc, categoria, preco, imagem FROM produtos";
$stmt = $pdo->query($sql);
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <?php
    session_start();
    
    ?>
    <style>
        #navbar{
            margin-bottom:20px;
        }
        .title{
            display:flex;
            justify-content:center;
            margin-bottom:50px;
        }
        .titulo-produto{
            font-size:18px;
            max-width: 60ch;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .produto-imagem{
            height:120px;
            width:120px;
            align-self:center;
        }
        .card{
            padding:10px;
        }
        .preço{
            font-size: 18px;
            border: none;
            border-radius: 20px;
            background-color: #4ddbff;
            font-weight: 500;
            color: white;
            width:100px;
        }

    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary" id="navbar" style="whidth:100%;">
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
            <li><a class="dropdown-item" href="carrinho.php">carrinho</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<h1 class="title">Produtos em promoção</h1>
<div class="container text-center">
<div class="row">
    <?php
    foreach ($produtos as $produto){
      if ($produto) {
    echo '  
    <div class="col">
      <div style="width: 18rem;">
 ';
    echo '<div class="card">';
    echo '<img class="card-img-top" src="uploads/'.htmlspecialchars($produto['imagem']).'" alt="' . $produto['nome'] . '" />';
    echo '<div class="card-body">';
    echo '<h2 class="titulo-produto">' . $produto['nome'] . '</h2>';
    echo '<p class="card-text">'.$produto['dsc'].'</p>';
    echo '<p class="preço">R$ ' . $produto['preco'] . '.99</p>';
    echo '</div>';
    echo '</div>';
    echo '</div>
    </div>';
      } else {
          echo '<p>Nenhum produto encontrado.</p>';
      }
    }
    ?>

</div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>