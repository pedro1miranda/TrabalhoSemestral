<?php
 require('conex.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    try {
        // Verificar se o produto existe
        $checkSql = "SELECT * FROM produtos WHERE id = :id";
        $checkStmt = $pdo->prepare($checkSql);
        $checkStmt->bindParam(':id', $id, PDO::PARAM_INT);
        $checkStmt->execute();

        if ($checkStmt->rowCount() === 0) {
            header("Location: dados.php")
            echo "Produto com ID $id não encontrado.";
            exit;
        }

        // Excluir o produto
        $sql = "DELETE FROM produtos WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header("Location: dados.php");
            echo "Produto com ID $id foi excluído com sucesso.";
        } else {
            header("Location: dados.php");
            echo "Erro ao excluir o produto.";
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
} else {
    echo "Método de requisição inválido.";
}
?>