<?php 
include_once __DIR__ . "/../../vendor/autoload.php";
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: ../login/");
    die;
}

$_SESSION['page'] = "init";

$language = Item::sortear($_SESSION['id']);

if(isset($_POST['stars'])) {
    Item::avaliar($_SESSION['language'], $_POST['stars']);

    header("Location: ../init/");

    die;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    <title>Avaliação de Linguagens de Programação</title>
</head>
<body>
    <?php include_once "../componentes/header.php"; ?>
    <main>
        <div class="container">
            <div class="card">
                <?php 
                    if ($language != null) {
                        echo "<div class='language-image'>
                                <img id='imgLenguage' src='../../uploads/{$language['imagem']}.jpg' alt=''>
                            </div>
                            <div class='language-name'>{$language['nome']}</div>
                            <div class='rating'>
                                <span class='star' onclick='rate(1)'>&#9733;</span>
                                <span class='star' onclick='rate(2)'>&#9733;</span>
                                <span class='star' onclick='rate(3)'>&#9733;</span>
                                <span class='star' onclick='rate(4)'>&#9733;</span>
                                <span class='star' onclick='rate(5)'>&#9733;</span>
                            </div>
                            <div class='actions'>
                                <form id='ratingForm' action='index.php' method='POST'>
                                    <input type='hidden' name='stars' id='stars'>
                                    <button type='submit' class='button like' onclick='like()'>Confirmar!</button>
                                </form>
                            </div>
                        </div>";

                        $_SESSION['language'] = $language['id'];
                    } else {
                        echo "<div style='height: 100%; display: grid; align-items: center;'>
                            <h1>Todas as linguagens foram avaliadas</h1>
                        </div>";
                    }
                ?>
        </div>
    </main>
</body>
</html>
