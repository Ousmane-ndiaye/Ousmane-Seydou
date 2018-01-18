<?php
session_start();
if(isset($_SESSION['typeUser']) && $_SESSION['typeUser']== 'Administrateur')
{
    ?>
    <!doctype html>
    <html lang="fr">
        <head>
            <title>ACCUIEL L.M LOCATION</title>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="inc/css/bootstrap.min.css">
            <link rel="stylesheet" href="inc/css/font-awesome/css/font-awesome.min.css">
            <link rel="stylesheet" href="inc/css/decos.css" style="text/css">
        </head>
        <body>
            <div class="contenu">
                <header>
                    <div class="parole">
                        <h1>
                            L.M LOCATION
                        </h1>
                        <h5><i class="fa fa-star" aria-hidden="true"></i>&nbsp;<i class="fa fa-star" aria-hidden="true"></i>&nbsp;<i class="fa fa-star" aria-hidden="true"></i>&nbsp; ACCUEIL &nbsp;<i class="fa fa-star" aria-hidden="true"></i>&nbsp;<i class="fa fa-star" aria-hidden="true"></i>&nbsp;<i class="fa fa-star" aria-hidden="true"></i></h5>
                        <img src="inc/images/engagement.png" alt="Notre engagement">
                    </div>
                    <nav>
                        <div class="logo">
                            <img src="inc/images/logos.png" alt="" sizes="" srcset="">
                        </div>
                        <div class="menu">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Contact</a></li>
                                <li>
                                    <div class="menu-icon">
                                        <i class="fa fa-bars fa-2x"></i>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="util cacher">
                        <div>
                            <span><i class="fa fa-angle-up fa-3x" aria-hidden="true"></i></span>
                        </div>
                        <ul class="nav justify-content-center">
                            <li class="nav-item">
                                <?php echo $_SESSION['nomComplet']; ?>
                            </li>
                            <div class="dropdown-divider"></div>
                            <li class="nav-item">
                                <a class="nav-link" href="deconnexion.php">Parametre</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="deconnexion.php">À propos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="deconnexion.php">Déconnexion</a>
                            </li>
                        </ul>
                    </div>
                </header>
                <?php
                    require_once('inc/location/dao/utilisateur.php');
                    $util = new location\dao\Utilisateur();
                    $donnees = $util->listUser();
                    ?>
                    <table>
                        <tr>
                            <th>Prénom et nom</th><th>Adresse</th><th>Quartier</th>
                        </tr>
                    </table>
                    <?php
                ?>
            </div>
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="inc/js/dynamiq.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        </body>
    </html>
<?php
}
else
{
    header("location: index.php");
}
?>