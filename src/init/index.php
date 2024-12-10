<?php 
include_once __DIR__ . "/../../vendor/autoload.php";

session_start();

if (!isset($_SESSION['email'])) {
    header("Location: ../login/");
    die;
}

$_SESSION['page'] = "init";
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
    <?php 
        include_once "../componentes/header.php";
    ?>
    <main>
        <div class="container">
            <div class="card">
                <div class="language-image">
                    <img id="imgLenguage" src="../../img/jsImg.webp" alt="">
                </div>
                <div class="language-name">JavaScript</div>
                <div class="rating">
                    <span class="star" onclick="rate(1)">&#9733;</span>
                    <span class="star" onclick="rate(2)">&#9733;</span>
                    <span class="star" onclick="rate(3)">&#9733;</span>
                    <span class="star" onclick="rate(4)">&#9733;</span>
                    <span class="star" onclick="rate(5)">&#9733;</span>
                </div>
                <div class="actions">
                    <button class="button like" onclick="like()">Confirmar!</button>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
