<?php
require("../php/database.php");
session_start();
// Maak een CRSF token.
$token = bin2hex(openssl_random_pseudo_bytes(32));
$_SESSION['token'] =  $token;
//Hier checken we of we ingelogd zijn
if (!isset($_SESSION["loggedin"])) {
    header("Location: index.php");
    exit();
}

if($stmt = $database->select("users", ["username", "email", "realname", "profile"], ["ID" => $_SESSION["id"]])) {
    if (count($stmt) == 0) {
        header("Location: dashboard.php?error=noprofile");
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php require("../components/style.php"); ?>
    <style>
        #showitbtn{
            float: right;
            margin-top: -40px;
        }
    </style>
    <title>GLR - Profiel</title>
</head>
<body>
<?php require("../components/navbar.php"); ?>
<div class="container mt-2 mb-5">
    <?php
    //hier doen we een foreach data stukje erin. Waar we alle data in proberen te laden van het profiel
    foreach ($stmt as $data) {
    ?>
    <form method="POST" enctype="multipart/form-data" action="../php/bewerkprofile.php">
        <input type="hidden" style="visibility: hidden;" name="token" value="<?php echo $token;?>">
        <div class="form-group">
            <label for="username">Gebruikersnaam</label>
            <input type="text" class="form-control rounded" name="username" id="username" value="<?php echo $data['username']; ?>" required>
        </div>
        <div class="form-group">
            <label>Wachtwoord</label>
            <input name="password" id="password" lenght="32" class="form-control rounded" placeholder="******" type="password" required value="<?php echo $_SESSION['wachtwoord']?>">
            <button id="showitbtn" class="btn" type="button"><i id="eyes" class="fas fa-eye"></i>
            </button>
        </div>
        <div class="form-group">
            <label for="openname">Echte Naam</label>
            <input type="text" class="form-control rounded" name="openname" id="openname" value="<?php echo $data['realname']; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control rounded" name="email" id="email" value="<?php echo $data['email']; ?>" required>
        </div>
        <div class="form-group">
            <label for="foto">Huidige Achtergrond Foto</label><br>
            <input hidden="1" readonly="1" class="form-control rounded" name="Huidige_Afbeelding" value="<?php echo $data['profile'];?>"><img width="100" class="img-fluid rounded" src="../<?php echo $data['profile'] ;?>">
        </div>
        <?php } ?>
        <div class="form-group">
            <label for="foto">Achtergrond Foto</label>
            <input name="image" class="form-control-file" type="file">
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="Verzenden" class="btn btn-dark">
        </div>
        <?php
        if (isset($_GET['error=mysql'])) {
            echo "<span style='color: rgb(0,185,255);'>The biography wasn't send correctly.</span>";
        }
        if (isset($_GET['error=fields'])) {
            echo "<span style='color: rgb(0,185,255);'>The biography wasn't send correctly.</span>";
        }
        ?>
    </form>
    <form method="POST" action="../php/deleteprofile.php" enctype="multipart/form-data">
        <input type="hidden" style="visibility: hidden;" name="token" value="<?php echo $token;?>">
        <input hidden="1" readonly="1" class="form-control rounded" name="Huidige_Afbeelding" value="<?php echo $data['profile'];?>">
        <div class="form-group">
            <?php echo "<button type='button' data-bs-toggle='modal' data-bs-target='#post". $_SESSION['id'] ."' class='btn btn-danger btn-lg'>Verwijder je Account <i class='fas fa-trash-alt'></i></button>"; ?>
        </div>
    </form>
    <?php
    echo "<div class='modal fade' id='post". $_SESSION['id'] ."' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='postlabel". $_SESSION['id'] ."' aria-hidden='true'>
                        <div class='modal-dialog'>
                          <div class='modal-content'>
                            <div class='modal-header'>
                              <h5 class='modal-title' id='postlabel". $_SESSION['id'] ."'>Verwijderen Account</h5>
                              <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                            <b>Weet je zeker dat je je account wilt verwijderen? Deze actie kan niet ongedaan worden!</b>
                            </div>
                            <div class='modal-footer'>
                              <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Sluiten</button>
                              <a href='../php/deleteprofile.php?id=" . $_SESSION["id"] . "'><button type='button' class='btn btn-danger'>Jazeker</button></a>
                            </div>
                          </div>
                        </div>
                      </div>";
    ?>
</div>

<?php require("../components/footer.php"); ?>
<?php require("../components/scripts.php"); ?>
</body>
</html>