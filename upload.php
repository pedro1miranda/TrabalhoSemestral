<?php
require 'conex.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Dados do formulário
    $nome = $_POST['nome'];
    $dsc = $_POST['dsc'];
    $preco = $_POST['preco'];
    $categoria = $_POST['categoria'];

    // Upload da imagem
    $diretorio = 'uploads/';
    if (!is_dir($diretorio)) {
        mkdir($diretorio, 0777, true);
    }

    $arquivo = $_FILES['imagem'];
    $nomeImagem = uniqid() . '-' . basename($arquivo['name']);
    $caminhoImagem = $diretorio . $nomeImagem;

    if (move_uploaded_file($arquivo['tmp_name'], $caminhoImagem)) {
        // Inserir no banco de dados
        $sql = "INSERT INTO produtos (nome, dsc, preco, categoria, imagem) VALUES (:nome, :dsc, :preco, :categoria, :imagem)";
        $stmt = $pdo->prepare($sql);

        // Vinculando os parâmetros
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':dsc', $dsc);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':categoria', $categoria);
        $stmt->bindParam(':imagem', $nomeImagem); // Corrigido: Vincular o caminho da imagem

        if ($stmt->execute()) {
            echo "Produto cadastrado com sucesso!<br>";
            echo "<img src='$caminhoImagem' alt='Imagem do Produto' style='max-width: 300px;'><br>";
            echo "<a href='index.php'>Voltar</a>";
        } else {
            echo "Erro ao cadastrar produto: " . $stmt->errorInfo()[2];
        }
    } else {
        echo "Erro ao fazer upload da imagem.";
    }
} else {
    echo "Método de requisição inválido.";
}
?>
