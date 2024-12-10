<?php 
include_once __DIR__ . "/../../vendor/autoload.php";

if(isset($_POST['submit'])) {
    if($_POST['nome'] != null && $_POST['email'] != null && $_POST['senha'] != null) {
        if(User::exists($_POST['email'])) {
            $erro = true;
        } else {
            $user = new User($_POST['nome'], $_POST['email'], $_POST['senha']);
            $user->save();

            echo "<script>
                alert('Cadastro realizado com sucesso!')
                location.href = '../login/';
            </script>";
        }
    } else {
        $erro = true;
    }
}

if(isset($erro)) {
    header("location:index.php?erro");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <main>
        <div class="login-container">
            <h2>Cadastro de Usuário</h2>
            <form action="index.php" method="post">
                <input type="text" class="input-field" placeholder="Nome" name="nome" required>
                <input type="email" class="input-field" placeholder="Email" name="email" required>  
                <input type="password" class="input-field" placeholder="Senha" name="senha" required>
                <div class="form-footer">
                    <button class="login-button" onclick="location.href = '../login/'">Voltar</button>
                    <input type="submit" value="Confirmar!" class="login-button" name="submit">
                </div>
            </form>
        </div>
    </main>
</body>
</html>