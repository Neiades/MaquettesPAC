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

			<?php

					//1 - On place en parametre les clés nécessaires à la connexion OAuth, pour utiliser l'API TwitterOauth

					$consumer_key='Xny0VkPmIiKrQv2FEwTcay12A';
					$consumer_secret='MLNzIn2mm3S3qoRatuFHie0EXDuKXKiUr9oBAmAQHipPsu9ppI';
					$oauth_token = '302258590-3dktRQsICCyyVt7Fvi4mlI9rSyOS8DYAwkjuSLUr';
					$oauth_token_secret = 'Nb81PlwL481oAIxbDRVXxoSMVqdzPpUQYtKFQf551rtKn';

					// On s'assure que les clés sont bien placées en parametre
					if(!empty($consumer_key) && !empty($consumer_secret) && !empty($oauth_token) && !empty($oauth_token_secret)) {

					//2 - On inclut la librairie facilitant la connexion pour l'API twitter
					require_once('twitteroauth/twitteroauth.php');

					//3 - Authentification - On crée un objet de connexion
					$connection = new TwitterOAuth($consumer_key, $consumer_secret, $oauth_token, $oauth_token_secret);

					//4 - On query les résultats voulus, ici les 4 derniers tweets provenant du Twitter de RadioPac
					$query = 'https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=radiopac&count=4'; //Your Twitter API query
					$tweets = $connection->get($query);

					var_dump($tweets);
					 }
			?>

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
	                <div class="row">
										<div class="col-md-12">
											<?php
													foreach($tweets as $tweet){ ?>
													<div class="panel panel-default sidebar-menu">
															<div class="panel-body text-widget">
					                        <p><?=$tweet->user->name;?> <span style="color:#bfbdbd;">‏@<?=$tweet->user->screen_name;?> - 27 avr.</span></p>
																	<p><?=$tweet->text;?><p>
																	<a href="https://twitter.com/radiopac/status/<?=$tweet->id_str;?>" target="_blank" class="pull-right custom-btn-tw">Lire ></a>
		                          </div>
															<hr style="border:1px solid #00ACED;">
		                      </div>
												<?php	}
											?>
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
                      </div>
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

</html>
