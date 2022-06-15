<?php
session_start();
require('../php/database.php');
//Checkt of we ingelogd zijn.
if (!isset($_SESSION["loggedin"])) {
    header("Location: index.php");
    exit();
}
// Check of de gebruiker wel een admin role heeft
if ($_SESSION['role'] == 0){
    require('dashboard.php');
}
// Hier checken we of de gebruiker
$result = $database->select("users", ["id", "realname", "identity", "email", "profile"], ["role" => 0, "ORDER" => ["id" => "DESC"]]);
$username = $_SESSION['name'];
$id = $_SESSION['id'];
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
    <h1>Studenten</h1>
    <a href="createreis.php" class="btn btn-primary mt-5"><i class="fas fa-user-plus"></i> Reis Aanmaken</a>
    <div class="center-div">
        <table class="table mt-2">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Student Naam</th>
                <th scope="col">Student NR</th>
                <th scope="col">NIK ID</th>
                <th scope="col">Email</th>
                <th scope="col">Profiel</th>
                <th scope="col">Bekijk Reizen</th>
            </tr>
            </thead>
            <tbody>

            <?php
            foreach ($result as $item) {
                echo "<tr class='bg-white'><td>" . $item["realname"] . "</td><td>" .  $item["id"] . "</td><td>" .  $item["identity"] . "</td><td>" .  $item["email"] . "</td><td><img class='img-fluid rounded-circle' width='200' src='../" .  $item["profile"] . "'></td><td><a href='student.php?id=" . $item['id'] . "' class='btn btn-info btn-lg'><i class='fas fa-eye'></i></a></td></tr>";
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