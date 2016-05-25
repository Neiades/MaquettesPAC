<?php
  include"includes/database.php";

  if(!isset($_GET['id'])){
    header('location:index.php');
  }

  $id = $_GET['id'];
  $sql = "SELECT * FROM evenements E , type_event TE WHERE E.type_event = TE.id_type_event AND id = $id";
  $evenement = $db->query($sql)->fetch(PDO::FETCH_ASSOC);

  if(empty($evenement['photo_evenement'])){
    $photo = $evenement['photo_type_event'];
  } else {
    $photo = $evenement['photo_evenement'];
  }

 ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Radio Pac</title>

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

<body>


    <div id="all">
        <header>

            <?php include("includes/navigation.php"); ?>

        </header>


        <div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h1></h1>
                    </div>
                    <div class="col-md-8">
                        <ul class="breadcrumb">
                            <li><a href="index.php">Accueil</a>
                            </li>
                            <li><a href="liste_evenement.php">Évenements</a>
                            </li>
                            <li><?=$evenement['title'];?></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <div id="content">
            <div class="container">

                <div class="row">

                    <!-- *** LEFT COLUMN ***
			_________________________________________________________ -->

                    <div class="col-md-9" id="blog-post">

                        <!-- Titre de l'article + date et auteur -->
                        <p class="lead"><h1><?=$evenement['title'];?></h1></p>
                        <p class="text-muted text-uppercase mb-small text-right">Publié le <?=$evenement['date_event'];?></p>
                        <p><h4>Début : <?=$evenement['start'];?></h4></p>
                        <p><h4>Fin : <?=$evenement['end'];?></h4></p>
                        <p><h4>Lieu : <?=$evenement['lieu'];?></h4></p>
                        <?php
                          if($evenement['url']){
                            ?>
                            <p><h4>Site web : <a href="<?=$evenement['url'];?>"><?=$evenement['url'];?></a></h4></p>
                            <?php
                          }
                        ?>

                        <br>

                        <!-- Contenu de l'article -->
                        <div id="post-content">

                          <p>
                              <img src="<?=$photo;?>" class="img-responsive" alt="Example blog post alt">
                          </p>

                          <?=$evenement['contenu_event'];?>

                        </div>
                        <!-- /#post-content -->
                        <br><br><br>
                    </div>
                    <!-- /#blog-post -->

                    <!-- *** LEFT COLUMN END *** -->

                    <!-- *** RIGHT COLUMN ***  -->

                    <div class="col-md-3">

                        <!--  Boutons de partage -->
                        <div class="panel panel-default sidebar-menu">

                            <div class="panel-heading">
                                <h3 class="panel-title">Partage</h3>
                            </div>

                            <div class="panel-body text-widget">
                              <span class='st_facebook_large' displayText='Facebook'></span>
                              <span class='st_twitter_large' displayText='Tweet'></span>
                              <span class='st_googleplus_large' displayText='Google +'></span>
                              <span class='st_email_large' displayText='Email'></span>
                            </div>
                        </div>

                        <div class="panel panel-default sidebar-menu">

                            <div class="panel-heading">
                                <h3 class="panel-title">Categorie</h3>
                            </div>

                            <div class="panel-body">
                                <ul class="nav nav-pills nav-stacked">
                                    <li class="active"><a href="liste_article.php?id_event=<?=$evenement['type_event'];?>"><?=$evenement['lib_type_event'];?></a>
                                </ul>
                            </div>
                        </div>

                        <!-- Fin boutons de partage -->

                    </div>
                    <!-- /.col-md-3 -->

                    <!-- *** RIGHT COLUMN END *** -->


                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <!-- Footer  -->

        <?php include("includes/footer.php") ?>

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

    <script type="text/javascript">var switchTo5x=true;</script>
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>





</body>

</html>
