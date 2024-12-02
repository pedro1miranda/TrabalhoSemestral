<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inscrição</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        <?php
        session_start();
        ?>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            width: 100%;
            height: 100%;
        }
        .container {
            width: 60%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2); 
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        .section {
            margin-bottom: 30px;
        }
        .section h2 {
            font-size: 20px;
            margin-bottom: 20px;
            border-bottom: 2px solid #007BFF;
            color: #007BFF;
            padding-bottom: 10px;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            color: #333;
        }
        input, select {
            width: calc(100% - 10px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .row {
            display: flex;
            gap: 20px;
        }
        .col {
            flex: 1;
            min-width: 250px;
        }
        .summary {
            flex: 1;
            padding: 15px;
            background-color: #f1f1f1;
            border: 1px solid #ccc;
            border-radius: 5px;
            max-width: 300px;
        }
        .submit-btn {
            display: block;
            width: 100%;
            padding: 15px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .submit-btn:hover {
            background-color: #0056b3;
        }
        .checkbox{
            margin:0px;
            padding:0px;
        }
        
    </style>
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
    <div class="container">
        <h1>Cadastrar Produtos</h1>
        
        <div class="section">
            <h2>Dados do Produto</h2>
            <div class="row">
                <div class="col">
                    
                <form action="upload.php" method="POST" enctype="multipart/form-data">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required>

    <label for="dsc">Descrição:</label>
    <input type="text" id="dsc" name="dsc" required>

    <label for="preco">Preço:</label>
    <input type="number" id="preco" name="preco" step="0.01" required>

    <label for="categoria">Categoria:</label>
    <select name="categoria" required>
        <option value="Eletro-Domesticos">Eletro-Domésticos</option>
        <option value="Decoracao">Decoração</option>
        <option value="Ferramentas">Ferramentas</option>
    </select>

    <label for="imagem">Escolha uma imagem:</label>
    <input type="file" id="imagem" name="imagem" accept="image/*" required>

    <button type="submit" name="enviar" class="btn btn-primary">cadastrar</button>
</form>
<hr>
<h1>Excluir produto</h1>
<form action="excluirProduto.php" method="post">
<label for="preco">ID:</label>
    <input type="number" id="id" placeholder="ID do produto" name="id" step="1" required>
    <button type="submit" name="enviar" class="btn btn-danger">Excluir</button>
    </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
