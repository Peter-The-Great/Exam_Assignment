<?php
require("../php/database.php");
session_start();
//Als we ingelogd zijn dan gaan we gelijk naar de dashboard.
if(isset($_SESSION["loggedin"])) {
    header("Location: dashboard.php");
}
$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
// Maak een CRSF token.
$token = bin2hex(openssl_random_pseudo_bytes(32));
$_SESSION['token'] =  $token;
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php require("../components/style.php"); ?>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <title>GLR Reisbureau - Register</title>
</head>

<body>
<div class="login-box mx-auto shadow p-3 mb-5 bg-white rounded">
    <!-- Shaduw in het centrum van het scherm -->
    <h5 id="Inloggen"></h5><h4 class="card-title mb-4 mt-1">Registreer</h4>
    <!-- Het formulier -->
    <form method="POST" enctype="multipart/form-data" action="../php/register.php">
        <input type="hidden" style="visibility: hidden;" name="token" value="<?php echo $token;?>">
        <div class="form-group">
            <label>Volledige naam</label>
            <input name="openname" id="openname" lenght="60" required class="form-control" placeholder="John Doe" type="text">
        </div>
        <div class="form-group">
            <label>Gebruikersnaam</label>
            <input name="username" id="username" lenght="60" required class="form-control" placeholder="Gebruikersnaam" type="username">
        </div>
        <div class="form-group">
            <label>Identiteitsbewijs Nummer</label>
            <input name="card" id="card" lenght="60" class="form-control" required placeholder="Je Identiteitsbewijs Hier!" type="text">
        </div>
        <div class="form-group">
            <label>E-mail</label>
            <input name="email" id="email" required class="form-control" placeholder="12345@glr.nl" type="email">
        </div>
        <div class="form-group">
            <label>Opmerkingen</label>
            <input name="op" id="username" lenght="60" class="form-control" placeholder="Denk aan dieet, lichamelijke klachten..." type="username">
        </div>
        <div class="form-group">
            <label for="foto">Achtergrond Foto</label>
            <input required name="image" class="form-control-file" type="file">
        </div>
        <div class="form-group">
            <label>Wachtwoord</label>
            <input name="password" id="password" required lenght="60" class="form-control rounded" placeholder="******" type="password">
            <button id="showitbtn" class="btn" type="button"><i id="eyes" class="fas fa-eye"></i></button>
        </div>
        <div class="form-group">
            <button id="generate" onclick="genPassword()" class="btn btn-primary" type="button">Generate Password</button>
            <button id="copypass" onclick="copyPassword()" class="btn btn-primary" type="button">Copy Password</button>
        </div>
        <div class="form-group">
            <div class="g-recaptcha brochure__form__captcha" name="g-recaptcha-response" data-sitekey="<?php echo $_ENV['RECAPTCHA_KEY']; ?>"></div><br>
        </div>
        <div class="form-group">
            <button id="submit" type="submit" class="btn btn-dark btn-block" name="Inloggen">Registeren</button>
        </div>
        <?php
        if(isset($_GET['error'])) {
            if ($_GET['error'] == "pass") {
                echo "<p style='color: red;'>That account does not exist or the password you provided was incorrect.</p>";
            }
            else if ($_GET['error'] == "captcha") {
                echo "<p style='color: red;'>Google could not verrify that you where a human.</p>";
            }
            else {
                echo "<p style='color: red;'>There was a connection issue between you and our servers.</p>";
            }
        }
        ?>
    </form>
    <a href="../index.php">← Terug naar homepage</a><a class="mx-5" href="index.php">Log in met je Account</a>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php require("../components/scripts.php"); ?>
</body>

</html>