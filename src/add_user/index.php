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
    <div class="container">
        <main>
            <h1>Cadastro de Usuário</h1>
            <form action="index.php" method="post">
                <div class="classNomeUser">
                    <label id="lblNomeUser" for="nomeUser">Nome: </label>
                    <input type="text" id="nomeUser" name="nome" required>
                </div>
                <div class="classEmailUser">
                    <label id="lblEmailUser" for="emailUser">Email: </label>
                    <input type="email" id="emailUser" name="email" required>
                </div>
                <div class="classPasswordUser">
                    <label id="lblPasswordUser" for="">Senha: </label>
                    <input type="password" id="passwordUser" name="senha" required>
                </div>
                <div class="classBtn">
                    <button id="btnVoltar" onclick="location.href = '../login/'">Voltar</button>
                    <input type="submit" value="Confirmar!" id="btnConfirm" name="submit">
                </div>
            </form>
        </main>
    </div>
</body>
</html>