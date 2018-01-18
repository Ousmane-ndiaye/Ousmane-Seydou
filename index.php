<?php
session_start();
?>
<!DOCTYPE html>
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
                <div class="alert alert-danger verif" id="infoI" role="alert">
                    <?php
                        if(isset($_POST["enregistrerI"]) && isset($_POST["loginI"]) && isset($_POST["pswdI"]))
                        {
                            extract($_POST);
                            require_once('inc/location/dao/utilisateur.php');
                            $util = new location\dao\Utilisateur();
                            $donnees = $util->find($loginI);
                            $exist = false;
                            if($donnee = $donnees->fetch())
                            {
                                $exist = true;
                            }
                            if($exist)
                            {
                                echo "Ce login existe déjà, si vous avez oublié votre mot de passe cliquez sur mot de passe oublié";
                            }
                            else
                            {
                                $util->nomComplet = $nomI;
                                $util->login = $loginI;
                                $util->password = $pswdI;
                                $util->profil = $profilI;
                                $util->add();
                                echo "Vous vous etes inscrites avec succes. Nous acctiverons votre dès que possible. !";
                            }
                        }
                    ?>
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
                                    &nbsp;
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <div class="main">
                <div class="loginbox">
                    <div class="avatar">
                        <i class="fa fa-user fa-5x" aria-hidden="true"></i>
                    </div>
                    <h1>Se connecter</h1>
                    <form action="#" method="post" id="formConnect">
                        <?php
                            if(isset($_POST["connecterC"]) && isset($_POST["loginC"]) && isset($_POST["pswdC"]))
                            {
                                extract($_POST);
                                require_once('inc/location/dao/utilisateur.php');
                                $util = new location\dao\Utilisateur();
                                $donnees = $util->logOn($loginC, $pswdC, $profilC);
                                if($donnee = $donnees->fetch())
                                {
                                    $_SESSION['nomComplet'] = $donnee["nomComplet"];
                                    $_SESSION['login'] = $donnee["login"];
                                    if($donnee["profil"] == "Administrateur")
                                    {
                                        $_SESSION['typeUser'] = 'Administrateur';
                                        header("location: adminstr.php");
                                    }
                                    elseif($donnee["profil"] == "Gerant" && $donnee["etat"] == '-1')
                                    {
                                        echo "<p style='font-size: 12px; color: red;'>".$donnee["nomComplet"]."  votre compte n'est pas encore activer !</p>";
                                    }
                                    elseif($donnee["profil"] == "Gerant" && $donnee["etat"] == '0')
                                    {
                                        echo "<p style='font-size: 12px; color: red;'>".$donnee["nomComplet"]."  votre compte a été désactiver ! </p>";
                                    }
                                    elseif($donnee["profil"] == "Gerant" && $donnee["etat"] == '1')
                                    {
                                        $_SESSION['typeUser'] = $donnee["profil"];
                                        header("location: gerant.php");
                                    }
                                    elseif($donnee["profil"] == "Admin")
                                    {
                                        $_SESSION['typeUser'] = $donnee["profil"];
                                        header("location: admin.php");
                                    }
                                }
                                else {
                                    echo "<p style='font-size: 12px; coloor: red;'>login ou password incorrecte</p>";
                                }
                            }
                        ?>
                        <div class="alert alert-danger verif" id="alertC" role="alert">
                            <ul>
                            </ul>
                        </div>
                        <p>Nom d'utilisateur</p>
                        <input type="text" name="loginC" id="loginC" nomChamp="login" placeholder="Votre nom d'utilisateur">
                        <p>Mot de passe</p>
                        <input type="password" name="pswdC" id="pswdC" nomChamp="password" placeholder="Votre mot de passe">
                        <p>Profil</p>
                        <select name="profilC" id="profilC" nomChamp="profil">
                            <option value="">Votre profil</option>
                            <option value="Admin">Admin</option>
                            <option value="Gerant">Gérant</option>
                            <option value="Administrateur">Administrateur</option>
                        </select>
                        <input type="submit" name="connecterC" id="connecterC" value="Se connecter">
                        <a href="#" class="openI">Inscivez vous ici</a>
                    </form>
                </div>
                <div class="popupI">
                    <div class="inscriptbox">
                    <div>
                        <button class="closeI">X</button>
                    </div>
                    <h1>S'inscrire</h1>
                    <form action="#" method="post" id="formInscript">
                        <div class="alert alert-danger verif" id="alertI" role="alert">
                            <ul>
                            </ul>
                        </div>
                        <p>Votre prenom et nom</p>
                        <input type="text" name="nomI" id="nomI" nomChamp="prenom et nom" placeholder="Votre prenom et nom ">
                        <p>Nom d'utilisateur</p>
                        <input type="text" name="loginI" id="loginI" nomChamp="login" placeholder="Votre nom d'utilisateur">
                        <p>Mot de passe</p>
                        <input type="password" name="pswdI" id="pswdI" nomChamp="password" placeholder="Votre mot de passe">
                        <p>Profil</p>
                        <select name="profilI" id="profilI" nomChamp="profil">
                            <option value="">Votre profil</option>
                            <option value="Admin">Admin</option>
                            <option value="Gerant">Gérant</option>
                        </select>
                        <input type="submit" name="enregistrerI" id="enregistrerI" value="S'inscrire">
                    </form>
                </div>
                <!--<div class="popupR">
                    <div class="recupbox">
                    <div>
                        <button class="closeR">X</button>
                    </div>
                    <h1>Récuperation de compte</h1>
                    <form action="#" method="post" id="formRecup">
                        <div class="alert alert-danger verif" id="alertR" role="alert">
                            <ul>
                            </ul>
                        </div>
                        <p>Votre prenom et nom</p>
                        <input type="text" name="nomR" id="nomR" nomChamp="prenom et nom" placeholder="Votre prenom et nom ">
                        <p>Nom d'utilisateur</p>
                        <input type="text" name="loginR" id="loginR" nomChamp="login" placeholder="Votre nom d'utilisateur">
                        <p>Profil</p>
                        <select name="profilR" id="profilR" nomChamp="profil">
                            <option value="">Votre profil</option>
                            <option value="Admin">Admin</option>
                            <option value="Gerant">Gérant</option>
                            <option value="Administrateur">Administrateur</option>
                        </select>
                        <input type="submit" name="recupererC" id="recupererC" value="Récuperer">
                    </form>
                </div>-->
            </div>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="inc/js/jquery-3.2.1.min.js"></script>
        <script src="inc/js/dynamiq.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="inc/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    </body>
</html>