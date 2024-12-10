<?php 
include_once __DIR__ . "/../../vendor/autoload.php";

session_start();

if(isset($_POST['submit'])) {
    if($_POST['email'] != null && $_POST['senha'] != null) {
        if(User::login($_POST['email'], $_POST['senha'])) {
            $_SESSION['email'] = $_POST['email'];
            
            if($_POST['email'] == "admin@gmail.com") {
                $_SESSION['admin'] = true;
            }

            header("location:../init/");
        } else {
            $erro = true;
        }
    } else {
        $erro = true;
    }
}

if(isset($erro)) {
    echo "<script>alert('Email ou senha incorretos!')</script>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de Usuário</title>
    <link rel="stylesheet" href="style.css">
</head>
    <body>
        <main>
        <div class="login-container">
            <h2>Login</h2>
            <form action="index.php" method="POST">
                <input type="email" class="input-field" placeholder="Email" name="email" required>
                <input type="password" class="input-field" placeholder="Senha" name="senha" required>
                <input type="submit" name="submit" class="login-button" value="Entrar"/>
            </form>
            <div class="form-footer">
                <p>Não tem conta? <a href="../add_user/">Cadastre-se</a></p>
            </div>
        </div>
        </main>
    </body>
</html>