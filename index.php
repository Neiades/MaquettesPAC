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

		<link href="css/custom.css" rel="stylesheet">
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
						<div class="col-md-8">
							<div class="project owl-carousel">
								<?php
									$sql = "SELECT * FROM banniere";
									$images = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
									foreach($images as $image){ ?>
										<div class="item">
											<img src="<?=$image['photo_banniere'];?>" alt="" class="img-responsive">
										</div>
									<?php }
								?>
							</div>
						</div>

						<section class="post">

							<div class="row">
		                        <div class="col-md-12">
		                            <div class="heading">
		                                <a class="title_link" href="liste_article.php"><h2>Derniers Articles</h2></a>
		                            </div>
		                        </div>
		                    </div>

			                <div class="row">
								<div class="col-md-12">

									<?php
										$sql = "SELECT id_article, date_article, titre_article, contenu_article, photo_article, categ_article, id_emission FROM articles ORDER BY id_article DESC LIMIT 0,2";
										$articles = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
										foreach ($articles as $article) {
											//var_dump($article);
											if($article['id_emission'] != null){

												$id_emission = $article['id_emission'];
												$sql = "SELECT id_emission, titre_emission, photo_emission FROM emissions WHERE id_emission = $id_emission";
												$emission = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
												$categ = $emission['titre_emission'];

												$id = $emission['id_emission'];
												$url = "emission.php?id=".$id;

												$photo = $emission['photo_emission'];

											} else if($article['categ_article'] != null){

												$id_categ = $article['categ_article'];
												$sql = "SELECT id_cat, lib_cat, photo_cat FROM categories WHERE id_cat = $id_categ";
												$categorie = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
												$categ = $categorie['lib_cat'];

												$filtre = "categorie";
												$id = $categorie['id_cat'];
												$url = "liste_article.php?filtre=".$filtre."&id=".$id;

												$photo = $categorie['photo_cat'];

											}

											if($article['photo_article'] != null){
												$photo = $article['photo_article'];
											}

											$contenu_article = strip_tags($article['contenu_article']);
											if(strlen($contenu_article)>300){
												$contenu_article = substr($contenu_article,0,300)."...";
											}

											?>


											<section class="post custom-box">
												<div class="row">
					                                <div class="col-md-4">
					                                    <div class="image">
					                                        <a href="article.php?id=<?=$article['id_article'];?>">
					                                            <img style="width:100%;" src="<?=$photo;?>" class="img-responsive" alt="">
					                                        </a>
					                                    </div>
					                                </div>
					                                <div class="col-md-8">
					                                    <h2 class="hidden-sm hidden-xs" style="margin-left:10px;margin-top:0;margin-bottom:10px;"><a href="article.php?id=<?=$article['id_article'];?>"><?=$article['titre_article'];?></a></h2>
														<h2 class="hidden-md hidden-lg" style="margin-left:10px;margin-top:10px;margin-bottom:10px;"><a href="article.php?id=<?=$article['id_article'];?>"><?=$article['titre_article'];?></a></h2>
					                                    <p style="margin-left:10px;" class="author-category"><a href="<?=$url;?>"><?=$categ;?></a> <?=$article['date_article'];?></p>
														<p style="margin-left:10px;"><?=$contenu_article;?></p>
													</div>
					                            </div>
											</section>


										<?php }
									?>
								</div>
			                </div>

						</section>

						<section>

							<div class="row">
		                        <div class="col-md-12">
		                            <div class="heading">
		                                <a href="liste_podcast.php"><h2>Derniers Podcasts</h2></a>
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
		                                <a href="liste_evenement.php"><h2>Derniers evenements</h2></a>
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

										$contenu_event = strip_tags($evenement['contenu_event']);
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

					<div class="col-md-3 col-md-offset-1">

						<div class="row">
							<div class="hidden-xs hidden-sm" style="height:103px;"></div>


							<section>
								<!-- Alertes Metéo -->
								<?php
									$sql = "SELECT titre_alerte, contenu_alerte FROM alertes WHERE type_alerte = 1 AND NOW() BETWEEN date_debut_alerte AND date_fin_alerte ORDER BY id_alerte DESC;";
									$alertes_meteo = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
									if(count($alertes_meteo)>0){ ?>

										<div class="col-xs-12 col-sm-6 col-md-12 col-xl-12">
											<div class="panel panel-default sidebar-menu">
					                            <div class="panel-heading">
					                                <h3 class="panel-title"><i class="fa fa-tint" style="margin-right:10px;" aria-hidden="true"></i>Alerte Météo</h3>
					                            </div>

												<?php

												foreach ($alertes_meteo as $key => $alerte_meteo){
													$contenu_alerte = strip_tags($alerte_meteo['contenu_alerte']);
													if($key > 0){ ?> <hr style="border:1px solid #6aae7a;"> <?php }
													?>
													<div class="panel-body text-widget">
						                                <p><?=$alerte_meteo['titre_alerte'];?></p>
														<p style="color:#9C9C9C;"><?=$contenu_alerte;?><p>
						                            </div>

												<?php } ?>

											</div>
										</div>

									<?php }
								?>

								<!-- Alertes Routières -->
								<?php
									$sql = "SELECT titre_alerte, contenu_alerte FROM alertes WHERE type_alerte = 2 AND NOW() BETWEEN date_debut_alerte AND date_fin_alerte ORDER BY id_alerte DESC;";
									$alertes_route = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
									if(count($alertes_route)>0){ ?>

										<div class="col-xs-12 col-sm-6 col-md-12 col-xl-12">
											<div class="panel panel-default sidebar-menu">
					                            <div class="panel-heading">
					                                <h3 class="panel-title"><i class="fa fa-truck" style="margin-right:10px;" aria-hidden="true"></i>Alerte Routière</h3>
					                            </div>

												<?php

												foreach ($alertes_route as $key => $alerte_route){
													$contenu_alerte = strip_tags($alerte_route['contenu_alerte']);
													if($key > 0){ ?> <hr style="border:1px solid #6aae7a;"> <?php }
													?>
													<div class="panel-body text-widget">
														<p><?=$alerte_route['titre_alerte'];?></p>
														<p style="color:#9C9C9C;"><?=$contenu_alerte;?><p>
													</div>

												<?php } ?>

											</div>
										</div>

									<?php }
								?>
							</section>
							<div style="clear:both;">
							<section>
								<!-- Widget Facebook -->
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
								<!-- Widget Twitter -->
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
