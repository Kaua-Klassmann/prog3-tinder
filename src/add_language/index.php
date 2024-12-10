<?php 
include_once __DIR__ . "/../../vendor/autoload.php";

session_start();

if(!isset($_SESSION['admin'])) {
    header("Location: ../login/");
    die;
}

$_SESSION['page'] = "add_language";

if(isset($_POST['submit'])) {
    if($_POST['nome'] != null && $_FILES['imagem']['error'] == 0) {
        $nomeArquivo = uniqid();

        $destinoArquivo = "../../uploads/" . $nomeArquivo . ".jpg";

        if(move_uploaded_file($_FILES['imagem']['tmp_name'], $destinoArquivo)) {
            $item = new Item($_POST['nome'], $nomeArquivo);
            $item->save();
        } else {
            $erro = true;
        }
    } else {
        $erro = true;
    }
}

if(isset($erro)) {
    echo "<script>alert('Preencha todos os campos!')</script>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Linguagem</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        include_once('../componentes/header.php');
    ?>
    <main>
        <div class="login-container">
            <h2>Cadastrar Linguagem</h2>
            <form action="index.php" method="POST" enctype="multipart/form-data">
                <input type="text" class="input-field" placeholder="Nome:" name="nome" required>
                <input type="file" class="input-field" name="imagem" accept="image/*" required>
                <button type="submit" class="login-button" name="submit">Cadastrar</button>
            </form>
        </div>
    </main>
</body>
</html>
