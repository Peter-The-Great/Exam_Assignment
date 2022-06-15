<?php
session_start();
require("php/database.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <title>GLR Reisbureau - Home</title>
      <?php
      require("components/style.php");
      ?>
  </head>
  <body class="text-white">
      <?php require("components/navbar.php"); ?>
      <div class="container marketing mt-1">
          <h1 class="h1 justify-content-center">GLR Reisbureau</h1>
          <!-- Hieronder zie je een voorbeeld van de reizen die je tegemoet komen. -->
          <!-- Begin rij -->
          <div class="row">
              <div class="col-lg-4">
                  <img class="rounded-circle" src="uploads/simg/webimage-50D203B3-6F16-44CD-A186AFA0469EC4D2.png" alt="Generic placeholder image" width="140" height="140">
                  <h2>Eindelijk Vakantie</h2>
                  <p>Boek vakanties om nooit te vergeten. Koffers check, Vrienden check, Betaald dubbel check. Hierbij het GLR reisbureau maken we het gemakklijk voor studenten om vakanties te boeken.</p>
                  <p><a class="btn btn-secondary" href="/user/index.php" role="button">Meld je aan! »</a></p>
              </div><!-- .col-lg-4 -->
              <div class="col-lg-4">
                  <img class="rounded-circle" src="uploads/simg/DS1000853_10prc_Korting_Foto.jpeg" alt="Generic placeholder image" width="140" height="140">
                  <h2>Goeie Prijzen</h2>
                  <p>Neem een tocht over frankrijk of ga partyen in Duitsland. We nemen het allememaal mee voor je allemaal in een handig platform en natuurlijk KORTING!!!</p>
                  <p><a class="btn btn-secondary" href="/user/index.php" role="button">Bekijk locaties! »</a></p>
              </div><!-- .col-lg-4 -->
              <div class="col-lg-4">
                  <img class="rounded-circle" src="uploads/simg/1280px-Cybersecurity.png" alt="Generic placeholder image" width="140" height="140">
                  <h2>Veilig Platform</h2>
                  <p>U kunt bij ons zelf verzekerd zijn dat het register bij ons compleet beveiligd is, zodat niemand bij jou betalingen of data kan komen. Wij maken het gemakklijk, zodat jij daar geen zorgen om hoeft te maken. Neem Contact met ons op als het nodig is!</p>
                  <p><a class="btn btn-secondary" href="contact.php" role="button">Neem contact op! »</a></p>
              </div><!-- .col-lg-4 -->
          </div><!-- einde rij -->
          <!-- Begin rij -->
          <div class="row mb-5">
              <h1>Over Ons</h1>
              <span class="maxw mb-5">Het GLR reisbureau is gemaakt voor studenten door studenten. Met ons platform kun je gemakkelijk een trip boeken voor. Beleef veel avonturen en hopelijk nog leukere momenten met elkaar.Het GLR reisbureau is gemaakt voor studenten door studenten. Met ons platform kun je gemakkelijk een trip boeken voor. Beleef veel avonturen en hopelijk nog leukere momenten met elkaar.Het GLR reisbureau is gemaakt voor studenten door studenten. Met ons platform kun je gemakkelijk een trip boeken voor. Beleef veel avonturen en hopelijk nog leukere momenten met elkaar.Het GLR reisbureau is gemaakt voor studenten door studenten. Met ons platform kun je gemakkelijk een trip boeken voor. Beleef veel avonturen en hopelijk nog leukere momenten met elkaar.Het GLR reisbureau is gemaakt voor studenten door studenten. Met ons platform kun je gemakkelijk een trip boeken voor. Beleef veel avonturen en hopelijk nog leukere momenten met elkaar.Het GLR reisbureau is gemaakt voor studenten door studenten. Met ons platform kun je gemakkelijk een trip boeken voor. Beleef veel avonturen en hopelijk nog leukere momenten met elkaar.Het GLR reisbureau is gemaakt voor studenten door studenten. Met ons platform kun je gemakkelijk een trip boeken voor. Beleef veel avonturen en hopelijk nog leukere momenten met elkaar.</span>
          </div>
          <!-- einde rij -->
      </div>
      <div class="container">
      </div>
      <?php require("components/footer.php"); ?>
    <?php require("components/scripts.php"); ?>
  </body>
</html>