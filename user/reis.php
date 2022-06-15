<?php
require('../php/database.php');
session_start();
//Hier checken we of we ingelogd zijn
if (!isset($_SESSION["loggedin"])) {
    header("Location: index.php");
    exit();
}
if (!isset($_GET['id'])) {
    header("Location: dashboard.php");
    return false;
}

if ($stmt = $database->select("reizen", ["titel","bestemming","begindatum","einddatum","text","image","max"], ["id" => $_GET['id']])) {
    if (count($stmt) == 0) {
        header("Location: dashboard.php");
    }
}
$result = $database->select("register", ["studentid"], ["reisid" => $_GET['id']]);
// Maak een CRSF token.
$token = bin2hex(openssl_random_pseudo_bytes(32));
$_SESSION['token'] =  $token;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php require("../components/style.php"); ?>
    <title>GLR reisbureu - <?php echo $stmt[0]["titel"]; ?></title>
</head>

<body>
<?php require("../components/navbar.php"); ?>
<header style="background-image: url(<?php echo "../" . $stmt[0]["image"] ?>) !important;">
    <div class="container text-center">
        <h1><?php echo $stmt[0]["titel"]; ?></h1>
    </div>
</header>
<section class="mt-3 mb-5 container" id="article">
    <div class="row">
        <h2>Parijs <?php echo $stmt[0]["bestemming"]; ?></h2>
        <h5>Maximaal aantal personen: <?php echo $stmt[0]["max"]; ?></h5>
        <span class="maxw"><?php echo $stmt[0]["text"]; ?></span>
        <br>
        <?php
        //Check of we de juiste sessie role hebben en kijk of het maximum niet is bereikt.
        if ($_SESSION['role'] == 0 && count($result) < $stmt[0]["max"]){
            echo '<form method="POST" action="../php/plus.php" enctype="multipart/form-data">
            <input type="hidden" style="visibility: hidden;" name="token" value="' . $token . '">
            <input type="hidden" style="visibility: hidden;" name="id" value="'. intval($_SESSION['id']) . '">
            <input type="hidden" style="visibility: hidden;" name="reisid" value="' . $_GET['id'] . '">
            <div class="form-group">
                <input type="submit" value="Meld je aan!" name="submit" class="btn btn-success">
            </div>
        </form>';
            //Zodra het maximum bereikt is kun je niet meer registreren.
         }else if($_SESSION['role'] == 0 && count($result) == $stmt[0]["max"]){
            echo "<h5>Helaas zit het vol.</h5>";
        }
        ?>
        <br>
        <a class="maxw mb-5" href='reizen.php'>← Terug naar reizen</a>
    </div>
</section>
<?php
require("../components/footer.php");
require("../components/scripts.php");
?>
</body>
</html>