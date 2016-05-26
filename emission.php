<?php
  include"includes/database.php";

  if(!isset($_GET['id'])){
	  header('Location:index.php');
  }

  $id = $_GET['id'];
  $sql = "SELECT * FROM emissions WHERE id_emission = $id";
  $emission = $db->query($sql)->fetch(PDO::FETCH_ASSOC);

  $sql = "SELECT count(id_podcast) as qte FROM podcasts WHERE emission_podcast = $id";
  $nb_podcast = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
  $nb_podcast = $nb_podcast['qte'];
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
                            <li><a href="liste_emission.php">Emissions</a>
                            </li>
                            <li><?= $emission['titre_emission'] ?></li>
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
                        <center><p class="lead"><h1 style="font-size: 42px;"><?=$emission['titre_emission'] ?></h1></p></center>
                        <br>

                        <!-- Contenu de l'article -->
                        <div id="post-content">

                          <div class="row">

                              <div class="col-md-4">
                                <p>
                                    <img src="<?=$emission['photo_emission']?>" class="img-responsive" alt="Example blog post alt">
                                </p>
                              </div>

                              <div class="col-md-8">
                                <br>
                                  <?=$emission['descri_emission'] ?>
                              </div>

                          </div>
                          <br><br><br>

                          <div class="panel panel-default sidebar-menu">
                            <div class="panel-heading">
                                <h1 style="font-size: 24px;" class="panel-title">Derniers podcasts...</h1>
                            </div>
                          </div>

                            <div id="liste-podcast" class="row">

                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="box-image-text custom-box blog">
                                        <div class="top">
                                            <div class="image">
                                                <img id="img-podcast1" src="" alt="" class="img-responsive">
                                            </div>
                                            <div class="bg"></div>
                                            <div class="text">
                                                <p class="buttons">
                                                    <a id="link-podcast1" href="portfolio-detail.html" class="btn btn-template-transparent-primary"><i class="fa fa-link"></i> Ecouter le podcast</a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h4><a id="titre-podcast1" href="blog-post.html"></a></h4>
                                            <p id="date-podcast1" class="author-category"></p>

                                        </div>
                                    </div>
                                    <!-- /.box-image-text -->

                                </div>

                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="box-image-text custom-box blog">
                                        <div class="top">
                                            <div class="image">
                                                <img id="img-podcast2" src="" alt="" class="img-responsive">
                                            </div>
                                            <div class="bg"></div>
                                            <div class="text">
                                                <p class="buttons">
                                                    <a id="link-podcast2" href="portfolio-detail.html" class="btn btn-template-transparent-primary"><i class="fa fa-link"></i> Ecouter le podcast</a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h4><a id="titre-podcast2" href="blog-post.html"></a></h4>
                                            <p id="date-podcast2" class="author-category"></p>

                                        </div>
                                    </div>
                                    <!-- /.box-image-text -->

                                </div>

                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="box-image-text custom-box blog">
                                        <div class="top">
                                            <div class="image">
                                                <img id="img-podcast3" src="" alt="" class="img-responsive">
                                            </div>
                                            <div class="bg"></div>
                                            <div class="text">
                                                <p class="buttons">
                                                    <a id="link-podcast3" href="portfolio-detail.html" class="btn btn-template-transparent-primary"><i class="fa fa-link"></i> Ecouter le podcast</a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h4><a id="titre-podcast3" href="blog-post.html"></a></h4>
                                            <p id="date-podcast3" class="author-category"></p>

                                        </div>
                                    </div>
                                    <!-- /.box-image-text -->

                                </div>

                            </div>

                            <ul class="pager">
                                <li id="podcast-apres" class="previous"><a href="#">&larr; Récent</a>
                                </li>
                                <li id="podcast-avant" class="next "><a href="#">Ancien &rarr;</a>
                                </li>
                            </ul>

                            <br><br>

                            <div class="panel panel-default sidebar-menu">
                              <div class="panel-heading">
                                  <h3 style="font-size: 24px;" class="panel-title"><a href="liste_article.php?id_emission=<?=$id; ?>">Derniers articles...</a></h3>
                                </div>
                            </div>

                            <section class="post">

                                <div class="row">

                                    <?php
                                      $sql = "SELECT * FROM articles WHERE id_emission = $id ORDER BY id_article DESC LIMIT 0,3";
                                      $articles = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

                                      foreach($articles as $article){

                                        $article['contenu_article'] =  strip_tags($article['contenu_article']);
                                        $article['contenu_article'] = substr($article['contenu_article'],0, 500)."...";


                                        if(empty($article['photo_article'])){
                                          $article['photo_article'] = $emission['photo_emission'];
                                        }
                                        ?>


                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                            <div class="image">
                                                <a href="article.php?id=<?=$article['id_article'];?>">
                                                    <img src="<?=$article['photo_article'];?>" class="img-responsive" alt="<?=$article['titre_article'];?>">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-8">
                                            <h2 style="margin-top : 0; margin-bottom : 5px;"><a href="article.php?id=<?=$article['id_article'];?>"><?=$article['titre_article'];?></a></h2>
                                            <div class="clearfix">
                                                <p class="author-category"><?=$emission['titre_emission'];?></p>
                                                <p class="date-comments">
                                                    <i class="fa fa-calendar-o"></i>&nbsp<?=$article['date_article'];?>
                                                </p>
                                            </div>
                                            <p class="intro"><?=$article['contenu_article'];?></p>
                                            <p class="read-more"><a href="article.php?id=<?=$article['id_article'];?>" class="btn btn-template-main pull-right">Lire plus</a>
                                            </p>
                                            <div style="clear:both; margin-bottom: 45px;"></div>

                                        </div>


                                      <?php }
                                    ?>
                                </div>

                            </section>
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

    <script type="text/javascript">

    var emission = <?=$id; ?>;
    var page_podcast = 0;
    var limite = Math.ceil(<?=$nb_podcast;?>/3)-1;

    $(document).ready(function(){
    	load_podcasts();
    });

    function load_podcasts(){
    	var request = $.ajax({
    		url:'traitements/ajax/get_podcasts.php',
    		type:'POST',
    		data:{
          'id': emission,
          'page_podcast': page_podcast,
        },
    		dataType : 'json'
    	});

      request.done(function(data){

        for (var i = 1; i <= 3 ; i++) {
          $('#link-podcast'+i).attr('href','');
          $('#img-podcast'+i).attr('src','');
          $('#titre-podcast'+i).html('');
          $('#date-podcast'+i).html('');
          $('#date-podcast'+i).attr('href','');
        }

        $.each(data, function(key, value){
          var i = key+1;
          console.log(value);
          if(value.photo_podcast == null || value.photo_podcast == ''){
            var photo = value.photo_emission;
          } else {
            var photo = value.photo_podcast;
          }
          $('#link-podcast'+i).attr('href','podcast.php?id='+value.id_podcast);
          $('#img-podcast'+i).attr('src',photo);
          $('#titre-podcast'+i).html(value.titre_podcast);
          $('#date-podcast'+i).html(value.date_podcast);
          $('#titre-podcast'+i).attr('href','podcast.php?id='+value.id_podcast);
        });
      });

      if(page_podcast == 0){
        $('#podcast-apres').addClass('disabled');
      } else if($('#podcast-apres').hasClass('disabled')) {
        $('#podcast-apres').removeClass('disabled');
      }

      if(page_podcast == limite){
        $('#podcast-avant').addClass('disabled');
      } else if($('#podcast-avant').hasClass('disabled')) {
        $('#podcast-avant').removeClass('disabled');
      }


    }

    $('#podcast-apres').click(function(e){
      e.preventDefault();
      if(page_podcast > 0){
        page_podcast--;
      }
    	load_podcasts();

    })

    $('#podcast-avant').click(function(e){
      e.preventDefault();
      if(page_podcast < limite){
        page_podcast++;
      }
    	load_podcasts();
    })

    </script>





</body>

</html>
