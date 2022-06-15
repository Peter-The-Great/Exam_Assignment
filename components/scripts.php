<!-- Bootstrap JavaScript Libraries -->
<?php
// Check of we in een bepaald gedeelte van de map structuur zijn ja of nee. Zodat we de css juist kunnen inladen.
if (strpos($_SERVER['REQUEST_URI'], "user")){
    echo '<script src="../js/main.js"></script><script src="../js/info.js"></script><script src="../js/toggle.js"></script><script src="../js/password.js"></script>';
}else{
    echo '<script src="js/main.js"></script><script src="js/info.js"></script>';
}
?>