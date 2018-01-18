<?php
session_start();
if(isset($session['typeUser']) && $session['typeUser']== 'Gerant')
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
            <link rel="stylesheet" href="inc/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
            <link rel="stylesheet" href="inc/css/font-awesome/css/font-awesome.min.css">
            <link rel="stylesheet" href="inc/css/deco.css" style="text/css">
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