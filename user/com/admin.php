<div class="container">
    <h1 id="Groed"></h1><h1><?php echo $username; ?></h1>
    <a href="createreis.php" class="btn btn-primary mt-5"><i class="fas fa-user-plus"></i> Reis Aanmaken</a>
    <div class="center-div">
        <table class="table mt-2">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Reis Titel</th>
                <th scope="col">Begin Datum</th>
                <th scope="col">Eind Datum</th>
                <th scope="col">Bekijken</th>
                <th scope="col">Aanpassen</th>
                <th scope="col">Verwijderen</th>
            </tr>
            </thead>
            <tbody>

            <?php
            // Zet het resultaat weer terug in het bestand.
            foreach ($result as $item) {
                echo "<tr class='bg-white'><td>" . $item["titel"] . "</td><td>" .  $item["begindatum"] . "</td><td>" .  $item["einddatum"] . "</td><td><a href='reis.php?id=" . $item['id'] . "' class='btn btn-info btn-lg'><i class='fas fa-eye'></i></a></td><td><a href='changereis.php?id=" . $item['id'] . "' class='btn btn-warning btn-lg'><i class='fas fa-user-edit'></i></a></td><td><button type='button' data-bs-toggle='modal' data-bs-target='#post". $item['id'] ."' class='btn btn-danger btn-lg'><i class='fas fa-trash-alt'></i></button></td></tr>
					<div class='modal fade' id='post". $item['id'] ."' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='postlabel". $item['id'] ."' aria-hidden='true'>
                        <div class='modal-dialog'>
                          <div class='modal-content'>
                            <div class='modal-header'>
                              <h5 class='modal-title' id='postlabel". $item['id'] ."'>Verwijderen Reis</h5>
                              <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                            <b>Weet je zeker dat je de reis wilt verwijderen? Deze actie kan niet ongedaan worden!</b>
                            </div>
                            <div class='modal-footer'>
                              <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Sluiten</button>
                              <a href='../php/removereis.php?id=" . $item["id"] . "'><button type='button' class='btn btn-danger'>Jazeker</button></a>
                            </div>
                          </div>
                        </div>
                      </div>";
            }
            ?>
            </tbody>
        </table>
        <?php
        //Fout meldingen.
        if($_GET['result'] == "mysql"){
            echo "<span class='p-1 rounded bg-success'>Niet de juiste velden ingevuld.</span>";
        }
        else if ($_GET['result'] == "fields") {
            echo "<span class='p-1 rounded bg-success'>Niet de juiste velden ingevuld.</span>";
        }
        else if ($_GET['result'] == "full") {
            echo "<span class='p-1 rounded bg-success'>Jammer de aanmeldingen voor deze reis zitten vol.</span>";
        }
        else if ($_GET['result'] == "allingeschreven") {
            echo "<span class='p-1 rounded bg-success'>Je bent al ingeschreven.</span>";
        }
        ?>
    </div>
</div>