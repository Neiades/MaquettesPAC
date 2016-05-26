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
	                            <li>Contact</li>
	                        </ul>
	                    </div>
	                </div>
	            </div>
	        </div>

			<!-- CONTENT -->
			<div id="content">
	            <div class="container" id="contact">
	                <div class="row">

						<div class="col-md-8">
	                        <section>
	                            <div class="heading">
	                                <h3>Formulaire de contact</h3>
	                            </div>

	                            <form>
	                                <div class="row">
	                                    <div class="col-sm-6">
	                                        <div class="form-group">
	                                            <label for="firstname">Prenom</label>
	                                            <input type="text" class="form-control" id="firstname">
	                                        </div>
	                                    </div>
	                                    <div class="col-sm-6">
	                                        <div class="form-group">
	                                            <label for="lastname">Nom</label>
	                                            <input type="text" class="form-control" id="lastname">
	                                        </div>
	                                    </div>
	                                    <div class="col-sm-6">
	                                        <div class="form-group">
	                                            <label for="email">Email</label>
	                                            <input type="text" class="form-control" id="email">
	                                        </div>
	                                    </div>
	                                    <div class="col-sm-6">
	                                        <div class="form-group">
	                                            <label for="subject">Objet</label>
	                                            <input type="text" class="form-control" id="subject">
	                                        </div>
	                                    </div>
	                                    <div class="col-sm-12">
	                                        <div class="form-group">
	                                            <label for="message">Message</label>
	                                            <textarea id="message" class="form-control"></textarea>
	                                        </div>
	                                    </div>

	                                    <div class="col-sm-12 text-center">
	                                        <button type="submit" class="btn btn-template-main"><i class="fa fa-envelope-o"></i> Envoyer message</button>

	                                    </div>
	                                </div>
	                                <!-- /.row -->
	                            </form>
	                        </section>
	                    </div>

						<div class="col-md-4">
	                        <section>
	                            <h3 class="text-uppercase">Adresse</h3>
															<p><strong>Studios de la Forêt BP 28</strong>
									                <br>19231 - Pompadour
									                <br>
									                <br>Téléphone : 05 55 73 38 48
									                <br>Fax : 05 55 73 62 24
									                <br>
									                <br>SIRET : 327 493 151 00028
									                <br>APE (NAF) : 922A
									            </p>
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

</html>
