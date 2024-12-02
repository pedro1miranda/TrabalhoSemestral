<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            width: 100%;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .section {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        input[type="email"], input[type="password"], select {
            width: 50%;
            padding: 8px;
            height:40px;
            margin-bottom: 10px;
            font-size:25px;
            margin-left:200px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .button-container {
            text-align: center;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            height:40px;
            width: 52%;
            margin-left:20px;
            font-size:20px;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        #logo{
            height: 200px;
            display:flex;
            align-self:center;
            margin-left:300px;
        }
        .cadastro{
            text-align:center;
            align-content:center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>login</h2>
        <div class="section">
            <h3><img src="login.png" alt="logo" id="logo" srcset="10903422.png"></h3>
            <form id="form-inscricao"  action="verificar.php" method="post">
                <input type="email" id="nome" name="email" placeholder="email" >

                <input type="password" id="email" name="senha" placeholder="senha" >

                <input type="password" id="email" name="cpf" placeholder="senha" >


                <label>
                <input type="checkbox" name="lembre_me" <?php echo isset($_COOKIE['username']) ? 'checked' : ''; ?>> Lembre-me
                </label>

                <div class="button-container">
                    <button type="submit" name="enviar">Cadastrar</button>
                </div>
            </form>
            <div class="cadastro">          
                  <p>Ainda não possui cadastro? <a href="cadastrar.php">cadastre-se</a></p>
            </div>
        </div>
        <?php
        if($_SESSION['email'] == "pedromjorge2005@gmail.com" || $_SESSION['cpf'] = "14597334874"){
            header("location:dados.php");
           }
        session_start();
            echo $_SESSION['mensagem'];
        ?>
        </div>
    </div>
</body>
</html>
