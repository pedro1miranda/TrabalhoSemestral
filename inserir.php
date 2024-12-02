 <?php
require 'conex.php'; 


session_start();
$_SESSION['mensagem'] = " ";
if(isset($_POST['enviar'])){
    if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['cpf'])){
    if(null != $_POST['nome'] && null != $_POST['email'] && null != $_POST['senha'] && null != $_POST['cpf']){
        $_SESSION['nome'] = $_POST['nome'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['senha'] = $_POST['senha'];
        $_SESSION['cpf'] = $_POST['cpf'];
        $nome = $_SESSION['nome'];
        $email = $_SESSION['email'];
        $senha = $_SESSION['senha'];
        $cpf = $_SESSION['cpf'];

        $senha_cripto = password_hash($senha, PASSWORD_BCRYPT);

        try {
            $sql = "INSERT INTO adm (nome, email, senha, cpf) VALUES (:nome, :email, :senha, :cpf)";
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha_cripto);
            $stmt->bindParam(':cpf', $cpf);

            $stmt->execute();
            header("Location: loja.php");
            exit();
        } catch (PDOException $e) {
            echo "Erro de cadastro: " . $e->getMessage();
        }
        exit();        
    }else{
    header("location: cadastrar.php");
    echo "<h1>Preencha todos os dados para cadastro</h1>";
    }
}
}
     

?>
