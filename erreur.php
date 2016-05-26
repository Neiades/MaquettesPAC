<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Radio PAC</title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,500,700,800' rel='stylesheet' type='text/css'>

    <!-- Bootstrap and Font Awesome css -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- Css animations  -->
    <link href="css/animate.css" rel="stylesheet">

    <!-- Theme stylesheet, if possible do not edit this stylesheet -->
    <link href="css/style.green.css" rel="stylesheet" id="theme-stylesheet">

    <!-- Custom stylesheet - for your changes -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- Responsivity for older IE -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

    <!-- Favicon and apple touch icons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="img/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="img/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="img/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="img/apple-touch-icon-152x152.png" />
</head>


<?php
  switch($_GET['erreur'])
  {
    case '400' : $erreur = "Erreur 400"; $message="Échec de l'analyse HTTP"; break;
    case '401' : $erreur = "Erreur 401"; $message="Mauvais pseudo ou mot de passe dans le .htaccess"; break;
    case '402' : $erreur = "Erreur 402"; $message="Vous devez reformuler votre demande avec les bonnes données de paiement"; break;
    case '403' : $erreur = "Erreur 403"; $message="La requête soumise est interdite"; break;
    case '404' : $erreur = "Erreur 404"; $message="La page que vous cherchez n'existe pas sur notre base de données"; break;
    case '405' : $erreur = "Erreur 405"; $message="La méthode utilisée n'est pas autorisée"; break;
    case '500' : $erreur = "Erreur 500"; $message="Erreur interne au serveur ou serveur saturé"; break;
    case '501' : $erreur = "Erreur 501"; $message="Le serveur ne supporte pas le service demandé"; break;
    case '502' : $erreur = "Erreur 502"; $message="Mauvaise passerelle"; break;
    case '503' : $erreur = "Erreur 503"; $message="Service indisponible"; break;
    case '504' : $erreur = "Erreur 504"; $message="Trop de temps à la réponse"; break;
    case '505' : $erreur = "Erreur 505"; $message="Version HTTP non supportée"; break;
    default : $erreur = "Erreur 404"; $message="La page que vous cherchez n'existe pas sur notre base de données"; break;
  }

?>

<body>


    <div id="all">
        <header>

          <?php
            include("includes/navigation.php");
          ?>

        </header>

        <div id="content">
            <div class="container">

                <div class="col-sm-6 col-sm-offset-3" id="error-page">

                    <div class="box">

                        <p class="text-center">
                            <a href="index.php">
                                <img src="img/logo.png" alt="Radio PAC logo">
                            </a>
                        </p>

                        <h3><?= $erreur ?></h3>
                        <h4 class="text-muted"><?= $message ?></h4>

                        <p class="buttons"><a href="index.php" class="btn btn-template-main"><i class="fa fa-home"></i> Retournez à l'accueil</a>
                        </p>
                    </div>


                </div>
                <!-- /.col-sm-6 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <!-- *** FOOTER ***
_________________________________________________________ -->

          <?php include("includes/footer.php") ?>

        <!-- *** FOOTER END *** -->


        <!-- *** COPYRIGHT ***
_________________________________________________________ -->

          <?php include("includes/copyright.html") ?>

        <!-- *** COPYRIGHT END *** -->



    </div>
    <!-- /#all -->

    <!-- #### JAVASCRIPT FILES ### -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')
    </script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.parallax-1.1.3.js"></script>
    <script src="js/front.js"></script>





</body>

</html>
