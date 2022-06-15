<?php
session_start();
require('../php/database.php');

//Check of we zijn ingelogd. En laad sessie variabelen.
if (!isset($_SESSION["loggedin"])) {
    header("Location: index.php");
    exit();
}
$username = $_SESSION['name'];
$id = $_SESSION['id'];
//Check of we een Student of admin role hebben.
if ($_SESSION['role'] == 1){
    $result = $database->select("reizen", ["id", "titel", "begindatum", "einddatum"], ["ORDER" => ["begindatum" => "DESC"]]);
}
if ($_SESSION['role'] == 0){
    $result = $database->select("register", ["reisid"], ["studentid" => intval($_SESSION['id'])]);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php require("../components/style.php"); ?>
    <title>GLR Reisbureau - Dashboard</title>
</head>
<body>
<?php require("../components/navbar.php"); ?>
<!-- Hieroner hebben we de tabel gemaakt die alles laat zien -->
<?php
// Hier doen we dezelfde check zoals daarnet.
if ($_SESSION['role'] == 1){
    require('com/admin.php');
}else if($_SESSION['role'] == 0){
    require('com/student.php');
}
?>
<?php
require("../components/footer.php");
?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?php require("../components/scripts.php"); ?>
</body>
</html>