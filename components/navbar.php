<nav class="navbar navbar-expand-lg navbar-fixed-top navbar-light bg-success main-nav">
    <div class="container-fluid">
        <a class="navbar-brand text-justify text-white" href="/"><?php
            //Hier bekijken we waar we zijn in de map structuur zonder dat we de afbeelding kwijt raken
            if (strpos($_SERVER['REQUEST_URI'], "user")){ echo '<img alt="GLR Logo" class="img-fluid" width="75" height="auto" src="../uploads/simg/grafisch-lyceum-rotterdam.png">'; }else { echo '<img alt="GLR Logo" class="img-fluid" width="75" height="auto" src="uploads/simg/grafisch-lyceum-rotterdam.png">';}?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link text-white" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <?php
                    //Hier bekijken we waar we zijn in de map structuur zonder dat we de link kwijt raken
                    if (strpos($_SERVER['REQUEST_URI'], "user")){
                        echo '<a class="nav-link text-white" href="reizen.php">Reizen</a>';
                    }else{
                        echo '<a class="nav-link text-white" href="user/reizen.php">Reizen</a>';
                    }
                    ?>
                </li>
                <?php
                //Hier bekijken we hoe de navbar eruit, dat licht eraan of we in de gebruikers tab zijn ja of nee en of we in de juiste folder zitten en of we ingelogd zijn, ETC.
                if(isset($_SESSION["loggedin"]) && strpos($_SERVER['REQUEST_URI'], "user") == 0) {
                    echo "<li class='nav-item'><a class='nav-link text-white' href='user/dashboard.php'>Dashboard</a></li><li class='nav-item'><a class='nav-link text-white' href='user/profile.php'>Profile</a></li><li class='nav-item'><a class='nav-link text-white' href='../php/login/logout.php'>Logout</a></li>";
                }else if (strpos($_SERVER['REQUEST_URI'], "user") == 0){
                    echo "<li class='nav-item'><a class='nav-link text-white' href='user/index.php'>Login</a></li>";
                }else{
                    echo "<li class='nav-item'><a class='nav-link text-white' href='dashboard.php'>Dashboard</a></li><li class='nav-item'><a class='nav-link text-white' href='profile.php'>Profile</a></li>";
                    if ($_SESSION['role'] == 1){
                        echo "<a class='nav-link text-white' href='studenten.php'>Studenten</a></li>";
                    }
                    echo "<li class='nav-item'><a class='nav-link text-white' href='../php/login/logout.php'>Logout</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>
</nav>