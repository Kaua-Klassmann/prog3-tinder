<?php 
include_once __DIR__ . "/../../vendor/autoload.php";

session_start();

if(!isset($_SESSION['id'])) {
    header("Location: ../login/");
    die;
}

$_SESSION['page'] = "rank";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ranking de Linguagens de Programação</title>
</head>
<body>
    <?php
        include_once('../componentes/header.php');
    ?>
    <div class="header">
        <h1>Ranking das Melhores Linguagens de Programação</h1>
    </div>

    <main>
        <div class="container">
            <table>
                <thead>
                    <tr>
                        <th>Nº Votos</th>
                        <th>Linguagem</th>
                        <th>Nota</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $linguagens = Item::get_votos();

                        foreach($linguagens as $linguagem) {
                            echo "<tr>";
                            echo "<td>{$linguagem['votos']}</td>";
                            echo "<td>{$linguagem['nome']}</td>";
                            echo "<td class=\"nota\">" . number_format($linguagem['nota'], 1) . "</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
