<?php
require("../php/database.php");
session_start();
// Check of we ingelogd zijn.
if (!isset($_SESSION["loggedin"])) {
    header("Location: index.php");
}
//Hier pakken we de reis op.
$result = $database->select("reizen", ["id", "titel", "bestemming", "begindatum","einddatum", "text", "image"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    require("../components/style.php");
    ?>
    <title>GLR Reisbureau - Reizen</title>
</head>
<body>
<?php require("../components/navbar.php"); ?>
<main id="article">
    <div class="container">
        <h1 class="fw-bold text-center mb-5">Bekijk hieronder De reizen:</h1>
        <div class="row mb-5">
            <?php
            //Laat alle informatie zien van de reis
            foreach ($result as $item) {
                $image = $item['image'];
                echo "
                <div class='colum col-sm-12 col-md-6 col-lg-4'>
                <article class='card' style='background-image: url(";
                echo  "../". $image;
                echo "); '>
                    <div class='card-body'>
                        <h2>".$item['titel']."</h2>
                        <p class='read'><a class='stretched-link' href='reis.php?id=".$item['id']."'>Lees verder...</a></p>
                    </div>
                </article>
                </div>";
            }
            ?>
        </div>
    </div>
</main>
<?php
require("../components/footer.php");
require("../components/scripts.php");
?>
</body>
</html>