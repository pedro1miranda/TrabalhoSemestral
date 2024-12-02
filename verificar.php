<?php
require 'conex.php';
session_start();

$_SESSION['mensagem'] = " ";
        if(isset($_POST['enviar'])){
    $senha = $_POST['senha'];
    $email = $_POST['email'];

    try{
        $sql = "SELECT senha FROM adm WHERE email = :email";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':email', $email);
        
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $hash = $stmt->fetchcolumn();
            if(password_verify($senha,$hash)){
                header("location:loja.php");
            }else{
                $_SESSION['mensagem'] = '<div class="alert alert-danger" role="alert">Usuário não encontrado</div>';
            header("location:index.php");
            }
        }else{
            $_SESSION['mensagem'] = '<div class="alert alert-danger" role="alert">Usuário não encontrado</div>';
            header("location:index.php");
        }
    }catch(PDOException $e){
        echo "erro ao verificar". $e->getMessage();
    }
    
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;

}
?>