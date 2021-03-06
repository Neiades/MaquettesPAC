<?php
  include"includes/database.php";

  if(!isset($_GET['id'])){
    header('location:index.php');
  }

  $id = $_GET['id'];
  $sql = "SELECT * FROM podcasts P, emissions E WHERE P.emission_podcast = E.id_emission AND P.id_podcast = $id";
  $podcast = $db->query($sql)->fetch(PDO::FETCH_ASSOC);

  $podcast['date_podcast'] = date_create($podcast['date_podcast']);
  $podcast['date_podcast'] = date_format($podcast['date_podcast'], 'd/m/Y');


  $titre = $podcast['titre_emission'];

  if($podcast['photo_podcast'] != null){
    $photo = $podcast['photo_podcast'];
  } else {
    $photo = $podcast['photo_emission'];
  }

  $sql = "SELECT * FROM tag_podcast TP, tags T WHERE TP.id_tag = T.id_tag AND TP.id_podcast = $id";
  $tags = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

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

    <!-- CSS pour Jplayer -->
    <link href="css/jplayer.blue.monday.min.css" rel="stylesheet" type="text/css" />

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
                    <div class="col-md-1">
                        <h1></h1>
                    </div>
                    <div class="col-md-11">
                        <ul class="breadcrumb">
                            <li><a href="index.php">Accueil</a>
                            </li>
                            <li><a href="liste_emission.php">Emissions</a>
                            </li>
                            <li><a href="emission.php?id=<?=$podcast['emission_podcast'];?>"><?=$titre;?></a>
                            </li>
                            <li><?=$podcast['titre_podcast'];?></li>
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
                        <p class="lead"><h1><?=$titre;?></h1></p>
                        <p><h3><?=$podcast['titre_podcast'];?></h3></p>
                        <p class="text-muted text-uppercase mb-small text-right">Publié le <?=$podcast['date_podcast'];?></p>

                        <!-- Contenu de l'article -->
                        <div id="post-content">

                          <p>
                              <center><img src="<?=$photo;?>" class="img-responsive" alt="Example blog post alt"></center>
                          </p>

                          <br><br>

                          <div class="row">

                            <div class="col-md-6">

                                <div id="podcast" class="jp-jplayer"></div>
	      						<div id="jp_container_1" class="jp-audio" style="width:250px;" role="application" aria-label="media player">
	      							<div class="jp-type-single">
	      								<div class="jp-gui jp-interface">
	      									<div class="jp-controls">
	      										<button style="transition:0s;" class="jp-play" role="button" tabindex="0">Jouer</button>
	      										<button class="jp-stop" role="button" tabindex="0">Stop</button>
	      									</div>
	      									<div class="jp-volume-controls" style="margin-left : -180px;">
	      										<button class="jp-mute" role="button" tabindex="0">mute</button>
	      										<button class="jp-volume-max" role="button" tabindex="0">max volume</button>
	      										<div class="jp-volume-bar">
	      											<div class="jp-volume-bar-value"></div>
	      										</div>
	      									</div>
	      								</div>
	      								<div class="jp-details">
	      									<div class="jp-title" aria-label="title" id="titre"></div>
	      								</div>
	      								<div class="jp-no-solution">
	      									<span>Update Required</span>
	      									To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
	      								</div>
	      							</div>
	      						</div>


                            </div>

                            <div class="col-md-6">

                              <?=$podcast['descri_podcast'];?>

                              <!-- Input caché pour récupérer le path + titre du podcast -->
                              <input id="title_podcast" hidden value="<?=$podcast['titre_podcast'];?>"></input>

                              <input id="path_podcast" hidden value="<?=$podcast['chemin_podcast'];?>"></p></input>

                            </div>
                        </div>

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
                                <h3 class="panel-title">Emission</h3>
                            </div>

                            <div class="panel-body">
                                <ul class="nav nav-pills nav-stacked">
                                    <li class="active"><a href="emission.php?id=<?=$podcast['emission_podcast'];?>"><?=$titre;?></a>
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

                                        <li><a href="liste_article.php?filtre=tag&id=<?=$tag['id_tag'];?>"><i class="fa fa-tags"></i><?=$tag['lib_tag'];?></li>

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

    <script type="text/javascript" src="js/jquery.jplayer.min.js"></script>

    <script type="text/javascript">

        var title_podcast = $('#title_podcast').val();
        var path_podcast = $('#path_podcast').val();

				function loadXMLDoc()
				{
					var xmlhttp;
					var div = document.getElementById("myDiv");
					if (window.XMLHttpRequest)
					{
						xmlhttp=new XMLHttpRequest();
					}
					else
					{
						xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					}

					xmlhttp.onreadystatechange=function()
					{
						if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
							document.getElementById("titre").innerHTML=" "+xmlhttp.responseText;
						}
					}

					//xmlhttp.open("GET","titre.txt",true);
					xmlhttp.send();
					setTimeout(loadXMLDoc,500);
				}



				$(document).ready(function(){
					$("#podcast").jPlayer({
						ready: function (event) {
							$(this).jPlayer("setMedia", {
								mp3: path_podcast,
                				title: title_podcast,
							});
						},
						swfPath: "js",
						supplied: "mp3",
						wmode: "window",
						useStateClassSkin: true,
						keyEnabled: true,
					});
				});
		</script>





</body>

</html>
