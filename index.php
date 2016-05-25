<?php
	include "includes/database.php";
?>
<!DOCTYPE html>
<html lang="fr">
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
		<!-- owl carousel css -->

	    <link href="css/owl.carousel.css" rel="stylesheet">
	    <link href="css/owl.theme.css" rel="stylesheet">
	</head>

	<body>
		<div id="all">
			<!-- NAVBAR -->
			<header><?php include("includes/navigation.php");?></header>
			<div id="heading-breadcrumbs">
	            <div class="container">
	                <div class="row">
	                    <div class="col-md-7">
	                    </div>
	                    <div class="col-md-5">
	                        <ul class="breadcrumb">
	                            <li>Accueil</li>
	                        </ul>
	                    </div>
	                </div>
	            </div>
	        </div>



			<!-- CONTENT -->
			<div id="content">
	            <div class="container">
					<div class="col-md-8">

						<div class="row">
							<div class="col-md-12">
								<div class="heading">
									<h2>Première Radio Locale de Proximité</h2>
								</div>
							</div>
						</div>

						<div class="project owl-carousel">
							<div class="item">
								<img src="img/main-slider1.jpg" alt="" class="img-responsive">
							</div>
							<div class="item">
								<img class="img-responsive" src="img/main-slider2.jpg" alt="">
							</div>
							<div class="item">
								<img class="img-responsive" src="img/main-slider3.jpg" alt="">
							</div>
							<div class="item">
								<img class="img-responsive" src="img/main-slider4.jpg" alt="">
							</div>
						</div>

						<section class="post">

							<div class="row">
		                        <div class="col-md-12">
		                            <div class="heading">
		                                <h2>Derniers Articles</h2>
		                            </div>
		                        </div>
		                    </div>

			                <div class="row">
								<div class="col-md-12">

									<?php
										//$sql = "SELECT  FROM  WHERE  ORDER BY  DESC LIMIT 0,2";
										//$podcasts = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
									?>

									<section class="post">
										<div class="row">
			                                <div class="col-md-4">
			                                    <div class="image">
			                                        <a href="blog-post.html">
			                                            <img src="img/blog-medium.jpg" class="img-responsive" alt="Example blog post alt">
			                                        </a>
			                                    </div>
			                                </div>
			                                <div class="col-md-8">
			                                    <h2 class="hidden-sm hidden-xs" style="margin-top:0;margin-bottom:10px;"><a href="post.htmls">Titre Article</a></h2>
												<h2 class="hidden-md hidden-lg" style="margin-top:10px;margin-bottom:10px;"><a href="post.htmls">Titre Article</a></h2>
			                                    <p class="author-category">By <a href="#">John Snow</a> in <a href="blog.html">Webdesign</a>
												<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.</p>
											</div>
			                            </div>
									</section>

									<section class="post">
										<div class="row">
			                                <div class="col-md-4">
			                                    <div class="image">
			                                        <a href="blog-post.html">
			                                            <img src="img/blog-medium.jpg" class="img-responsive" alt="Example blog post alt">
			                                        </a>
			                                    </div>
			                                </div>
			                                <div class="col-md-8">
			                                    <h2 class="hidden-sm hidden-xs" style="margin-top:0;margin-bottom:10px;"><a href="post.htmls">Titre Article</a></h2>
												<h2 class="hidden-md hidden-lg" style="margin-top:10px;margin-bottom:10px;"><a href="post.htmls">Titre Article</a></h2>
			                                    <p class="author-category">By <a href="#">John Snow</a> in <a href="blog.html">Webdesign</a>
												<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.</p>
											</div>
			                            </div>
									</section>
								</div>
			                </div>

						</section>

						<section>

							<div class="row">
		                        <div class="col-md-12">
		                            <div class="heading">
		                                <h2>Derniers Podcasts</h2>
		                            </div>
		                        </div>
		                    </div>

							<div class="row portfolio">
								<?php
									$sql = "SELECT P.id_podcast, P.titre_podcast, P.photo_podcast, P.date_podcast, P.chemin_podcast, E.id_emission, E.titre_emission, E.photo_emission FROM podcasts P, emissions E WHERE P.emission_podcast = E.id_emission ORDER BY P.id_podcast DESC LIMIT 0,3";
									$podcasts = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
									foreach ($podcasts as $podcast){
										//Verification de la présence d'une photo spécifique au podcast, si oui, l'utiliser, sinon, utiliser la photo par default de l'emission
										if($podcast['photo_podcast'] == null || $podcast['photo_podcast'] == ""){
											$photo = $podcast['photo_emission'];
										} else {
											$photo = $podcast['photo_podcast'];
										}
										?>

										<div class="col-sm-4">
				                            <div class="box-image-text blog custom-box">
				                                <div class="top">
				                                    <div style="position:relative" class="image">
				                                        <a href="podcast.php?id=<?=$podcast['id_podcast'];?>"><img style="width:100%;" src="<?=$photo;?>" alt="" class="img-responsive"></a>
													</div>
												</div>
				                                <div class="content">
													<h4><a href="podcast.php?id=<?=$podcast['id_podcast'];?>"><?=$podcast['titre_podcast'];?></a></h4>
													<p><a href="emission.php?id=<?=$podcast['id_emission'];?>" class="emission_link"><?=$podcast['titre_emission'];?></a></p>
													<p>Le : <?=$podcast['date_podcast'];?></p>
													<a href="podcast.php?id=<?=$podcast['id_podcast'];?>" class="btn btn-template-main"><i class="fa fa-play" aria-hidden="true"></i> Ecouter</a>
				                                </div>
				                            </div>
				                        </div>

									<?php }
								?>
							</div>

						</section>

						<section>

							<div class="row">
		                        <div class="col-md-12">
		                            <div class="heading">
		                                <h2>Derniers evenements</h2>
		                            </div>
		                        </div>
		                    </div>

							<div class="row portfolio">
								<?php
									$sql = "SELECT E.id, E.title, E.start, E.end, E.contenu_event, E.photo_event, T.photo_type_event FROM evenements E, type_event T WHERE E.type_event = T.id_type_event ORDER BY E.id DESC LIMIT 0,3";
									$evenements = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
									foreach ($evenements as $evenement){

										if($evenement['photo_event'] == null || $evenement['photo_event'] == ""){
											$photo = $evenement['photo_type_event'];
										} else {
											$photo = $evenement['photo_event'];
										}

										$contenu_event = strip_tags($evenement['$contenu_event']);
										if(strlen($contenu_event)>50){
											$contenu_event = substr($contenu_event,0,50)."...";
										}
										?>

										<div class="col-sm-4">
				                            <div class="box-image-text blog custom-box">
				                                <div class="top">
				                                    <div style="position:relative" class="image">
				                                        <a href="evenement.php?id=<?=$evenement['id'];?>"><img style="width:100%;" src="<?=$photo;?>" alt="" class="img-responsive"></a>
													</div>
												</div>
				                                <div class="content">
													<h4><a href="evenement.php?id=<?=$evenement['id'];?>"><?=$evenement['title'];?></a></h4>
													<p>Du <?=$evenement['start'];?><br>Au <?=$evenement['end'];?></p>
													<p><?=$contenu_event;?></p>
				                                </div>
				                            </div>
				                        </div>

									<?php }
								?>

							</div>

						</section>

					</div>

					<!-- Widgets Facebook / Twitter -->
					<div class="col-md-3 col-md-offset-1">

						<div class="row">
							<div class="hidden-xs hidden-sm" style="height:103px;"></div>
							<section>
								<div class="col-xs-12 col-sm-6 col-md-12 col-xl-12">
									<div class="panel panel-default sidebar-menu">
			                            <div class="panel-heading">
			                                <h3 class="panel-title"><i class="fa fa-tint" style="margin-right:10px;" aria-hidden="true"></i>Alerte Météo</h3>
			                            </div>
			                            <div class="panel-body text-widget">
			                                <p>Risque de verglas dans la région !</p>
											<p style="color:#9C9C9C;">Suite aux récentes précipitations, du verglas pourait se former sur le bas coté ! Soyez prudents<p>
			                            </div>
			                        </div>
								</div>

								<div class="col-xs-12 col-sm-6 col-md-12 col-xl-12">
									<div class="panel panel-default sidebar-menu">
			                            <div class="panel-heading">
			                                <h3 class="panel-title"><i class="fa fa-truck" style="margin-right:10px;" aria-hidden="true"></i>Alerte Routière</h3>
			                            </div>
			                            <div class="panel-body text-widget">
			                                <p>Accident sur l'A20</p>
											<p style="color:#9C9C9C;">Un camion entre en colision avec un troupeau de vaches !<p>
			                            </div>
			                        </div>
								</div>
							</section>
							<div style="clear:both;">
							<section>

								<div class="col-xs-12 col-sm-6 col-md-12 col-xl-12">
									<div class="panel panel-default sidebar-menu">

			                            <div style="margin-bottom:20px;" class="panel-heading">
			                                <h3 style="border-bottom: solid 5px #3C5899;" class="panel-title"><i class="fa fa-facebook" style="margin-right:10px;color:#3C5899;" aria-hidden="true"></i>Facebook</h3>
			                            </div>

			                            <div style="margin-top:15px;margin-bottom:15px;" class="panel-body text-widget">
			                                <p>26 avril, 22:39</p>
											<p>Amis du Limousin et du Périgord, bonjour !<br>Commençons cette journée par une bonne nouvelle ...<p>
											<button class="pull-right custom-btn-fa">Lire ></button>
										</div>

										<hr style="border:1px solid #3C5899;">

										<div  style="margin-top:15px;margin-bottom:15px;" class="panel-body text-widget">
			                                <p>26 avril, 22:39</p>
											<p>Amis du Limousin et du Périgord, bonjour !<br>Commençons cette journée par une bonne nouvelle ...<p>
											<button class="pull-right custom-btn-fa">Lire ></button>
										</div>
			                        </div>
								</div>

								<div class="col-xs-12 col-sm-6 col-md-12 col-xl-12">
									<div class="panel panel-default sidebar-menu">
			                            <div class="panel-heading">
			                                <h3 style="border-bottom: solid 5px #00ACED;" class="panel-title"><i class="fa fa-twitter" style="margin-right:10px;color:#00ACED;" aria-hidden="true"></i>Twitter</h3>
			                            </div>

			                            <div class="panel-body text-widget">
			                                <p>Radio <span style="color:#bfbdbd;">‏@radiopac - 27 avr.</span></p>
											<p>Amis du Limousin et du Périgord, bonjour !<br>Commençons cette journée par une bonne nouvelle ...<p>
											<button class="pull-right custom-btn-tw">Lire ></button>
			                            </div>

										<hr style="border:1px solid #00ACED;">

										<div class="panel-body text-widget">
			                                <p>Radio <span style="color:#bfbdbd;">‏@radiopac - 27 avr.</span></p>
											<p>Amis du Limousin et du Périgord, bonjour !<br>Commençons cette journée par une bonne nouvelle ...<p>
											<button class="pull-right custom-btn-tw">Lire ></button>
			                            </div>
			                        </div>
								</div>
							</section>
						</div>

                    </div>

	            </div>
	        </div>

			<!-- FOOTER -->
			<?php include("includes/footer.php") ?>

		</div>
	</body>

	<!-- JS -->
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
	<script src="js/owl.carousel.min.js"></script>

</html>
