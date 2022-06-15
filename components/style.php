    <!-- Required meta tags -->
    <meta name="Description" content="GLR Reisbureau, waar studenten met korting een reis kunnen boeken.">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Style CSS import -->
    <?php
    // Check of we in een bepaald gedeelte van de map structuur zijn ja of nee. Zodat we de css juist kunnen inladen.
    if (strpos($_SERVER['REQUEST_URI'], "user")){
        echo '<link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/fontawsome.css"><link rel="stylesheet" href="../css/start-bootstrap-styles.css"><link rel="stylesheet" href="../css/custom.css">';
    }else{
        echo '<link rel="stylesheet" href="css/style.css">
              <link rel="stylesheet" href="css/fontawsome.css"><link rel="stylesheet" href="css/custom.css">';
    }
    ?>