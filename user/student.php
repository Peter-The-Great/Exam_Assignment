<?php
session_start();
require('../php/database.php');
// Check of we ingelogd zijn.
if (!isset($_SESSION["loggedin"])) {
    header("Location: index.php");
    exit();
}
//Check of we een id hebben van een student.
if (!isset($_GET["id"])) {
    header("Location: studenten.php");
    exit();
}
//Check of we de juiste role hebben.
if ($_SESSION['role'] == 0){
    require('dashboard.php');
}
// Bij deze queries pakken we eerst het id van de student en daarna pakken we alle reisen waar de student voor zich heeft aangemeld.
$result1 = $database->select("users", ["id"], ['id' => intval($_GET["id"])]);
$id = $_SESSION['id'];
$result = $database->select("register",["id","studentid","reisid", "opmerking"], ["studentid" => intval($result1[0]['id'])]);
$username = $_SESSION['name'];
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
<div class="container">
    <h1><?php echo $username; ?></h1>
    <div class="center-div mt-3">
        <table class="table mt-2">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Bestemming</th>
                <th scope="col">Begin Datum</th>
                <th scope="col">Eind Datum</th>
                <th scope="col">Opmerkingen</th>
                <th scope="col">Bekijk de Reis</th>
            </tr>
            </thead>
            <tbody>

            <?php
            foreach ($result as $item) {
                $result2 = $database->select("reizen", ["id", "bestemming", "begindatum", "einddatum", "max"], ["id" => $item['reisid'], "ORDER" => ["begindatum" => "DESC"]]);
                echo "<tr class='bg-white'><td>" . $result2[0]["bestemming"] . "</td><td>" .  $result2[0]["begindatum"] . "</td><td>" .  $result2[0]["einddatum"] . "</td><td>" .  $item["opmerking"] . "</td><td><a href='reis.php?id=" . $item['reisid'] . "' class='btn btn-info btn-lg'><i class='fas fa-eye'></i></a></td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
    <?php require("../components/footer.php"); ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?php require("../components/scripts.php"); ?>
</body>
</html>