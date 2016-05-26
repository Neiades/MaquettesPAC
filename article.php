<?php
  include"includes/database.php";

  if(!isset($_GET['id'])){
    header('location:index.php');
  }

  $id = $_GET['id'];
  $sql = "SELECT * FROM articles WHERE id_article = $id";
  $article = $db->query($sql)->fetch(PDO::FETCH_ASSOC);

  $sql = "SELECT * FROM tag_article TA, tags T WHERE TA.id_tag = T.id_tag AND TA.id_article = $id";
  $tags = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

  if($article['id_emission'] != null){

        $id_emission = $article['id_emission'];
        $sql = "SELECT titre_emission, photo_emission FROM emissions WHERE id_emission = $id_emission";
        $emission = $db->query($sql)->fetch(PDO::FETCH_ASSOC);

        $titre = $emission['titre_emission'];
        $photo = $emission['photo_emission'];

        $filtre = "Emission";
        $id = $article['id_emission'];

        $url = "emission.php?id=".$id;

  } else if($article['categ_article'] != null){

        $id_categ = $article['categ_article'];
        $sql = "SELECT lib_cat, photo_cat FROM categories WHERE id_cat = $id_categ";
        $categorie = $db->query($sql)->fetch(PDO::FETCH_ASSOC);

        $titre = $categorie['lib_cat'];
        $photo = $categorie['photo_cat'];

        $filtre = "Categorie";
        $id = $article['categ_article'];

        $url = "liste_article.php?filtre=categorie&id=".$id;

    }

    if($article['photo_article'] != null){
        $photo = $article['photo_article'];
    }

 ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include("includes/database.php"); ?>
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
                    <div class="col-md-2">
                        <h1></h1>
                    </div>
                    <div class="col-md-10">
                        <ul class="breadcrumb">
                            <li><a href="index.php">Accueil</a>
                            </li>
                              <li><a href="<?=$url;?>"><?=$titre;?></a></li>
                            <li><?=$article['titre_article'];?></li>
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
                        <p class="lead"><h1><?=$article['titre_article'];?></h1></p>
                        <p class="text-muted text-uppercase mb-small text-right">Publié le <?=$article['date_article'];?></p>

                        <!-- Contenu de l'article -->
                        <div id="post-content">

                          <p>
                              <img src="<?=$photo;?>" class="img-responsive" alt="Example blog post alt">
                          </p>
                          <br>

                            <?=$article['contenu_article'];?>

                        </div>
                        <!-- /#post-content -->
                        <br><br><br>
                    </div>
                    <!-- /#blog-post -->

                    <!-- *** LEFT COLUMN END *** -->

                    <!-- *** RIGHT COLUMN ***  -->

                    <div class="col-md-3">

                        <!-- *** Catégorie/tags et boutons de partage ***
 _________________________________________________________ -->
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
                                <h3 class="panel-title"><?=$filtre;?></h3>
                            </div>

                            <div class="panel-body">
                                <ul class="nav nav-pills nav-stacked">
                                    <li class="active"><a href="<?=$url;?>"><?=$titre;?></a>
                                </ul>
                            </div>
                        </div>

                        <?php

                          if($tags != null){ ?>

                            <div class="panel sidebar-menu">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Tags</h3>
                                </div>

                                <div class="panel-body">
                                    <ul class="tag-cloud">
                                      <?php
                                        foreach($tags as $tag){ ?>

                                          <li><a href="liste_article.php?filtre=tag&id=<?=$tag['id_tag'];?>"><i class="fa fa-tags"></i><?=$tag['lib_tag'];?></a></li>

                                      <?php  } ?>
                                    </ul>
                                </div>
                            </div>
                          <?php }
                        ?>
                        <!-- *** MENUS AND FILTERS END *** -->

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
