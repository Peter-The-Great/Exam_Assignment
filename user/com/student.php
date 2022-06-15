<div class="container">
    <h1 id="Groed"></h1><h1><?php echo $username; ?></h1>
    <a href="reizen.php" class="btn btn-primary mt-5"></i>Bekijk Reizen</a>
    <div class="center-div">
        <table class="table mt-2">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Reis Titel</th>
                <th scope="col">Bestemming</th>
                <th scope="col">Begin Datum</th>
                <th scope="col">Eind Datum</th>
                <th scope="col">Bekijken</th>
                <th scope="col">Verwijderen</th>
            </tr>
            </thead>
            <tbody>

            <?php
            // Hier zetten we alle resultaten in van aanmeldingen voor de student.
                 foreach($result as $item1){
                     $result2 = $database->select("reizen", ["id","titel","bestemming","begindatum","einddatum"], ["id" => $item1['reisid']]);
                    echo "<tr class='bg-white'><td>" . $result2[0]["titel"] . "</td><td>" . $result2[0]["bestemming"] . "</td><td>" .  $result2[0]["begindatum"] . "</td><td>" .  $result2[0]["einddatum"] . "</td><td><a href='reis.php?id=" . $item1['reisid'] . "' class='btn btn-info btn-lg'><i class='fas fa-eye'></i></a></td><td><button type='button' data-bs-toggle='modal' data-bs-target='#post". $item1['reisid'] ."' class='btn btn-danger btn-lg'><i class='fas fa-trash-alt'></i></button></td></tr>
					<div class='modal fade' id='post". $result2[0]['id'] ."' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='postlabel". $item1['reisid'] ."' aria-hidden='true'>
                        <div class='modal-dialog'>
                          <div class='modal-content'>
                            <div class='modal-header'>
                              <h5 class='modal-title' id='postlabel". $item1['reisid'] ."'>Verwijderen Reis</h5>
                              <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                            <b>Weet je zeker dat je de reis wilt verwijderen? Deze actie kan niet ongedaan worden!</b>
                            </div>
                            <div class='modal-footer'>
                              <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Sluiten</button>
                              <a href='../php/min.php?id=" . $item1['reisid'] . "'><button type='button' class='btn btn-danger'>Jazeker</button></a>
                            </div>
                          </div>
                        </div>
                      </div>";
                }
            //}
            ?>
            </tbody>
        </table>
        <?php
        if($_GET['result'] == "mysql"){
            echo "<span class='p-1 rounded bg-danger'>Er ging iets fout bij de server probeer het later nog eens!</span>";
        }
        else if ($_GET['result'] == "fields") {
            echo "<span class='p-1 rounded bg-danger'>Niet de juiste velden ingevuld.</span>";
        }
        else if ($_GET['result'] == "full") {
            echo "<span class='p-1 rounded bg-warning'>Jammer de aanmeldingen voor deze reis zitten vol.</span>";
        }
        else if ($_GET['result'] == "allingeschreven") {
            echo "<span class='p-1 rounded bg-success'>Je bent al ingeschreven.</span>";
        }
        ?>
    </div>
</div>