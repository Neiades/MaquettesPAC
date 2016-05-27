<?php
	include "includes/database.php";

	if(isset($_GET['id'])){
		$id = $_GET['id'];

		$sql = "SELECT count(id_podcast) as qte FROM podcasts WHERE emission_podcast = $id";

    $nb_podcast = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
    $nb_podcast = $nb_podcast['qte'];

	  } else {
		$id = "none";

		$sql = "SELECT count(id_podcast) as qte FROM podcasts";
	    $nb_podcast = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
	    $nb_podcast = $nb_podcast['qte'];
	  }

    $sql = "SELECT * FROM emissions";
    $emissions = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

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
	                            <li><a href="index.php">Accueil</a></li>
															<li>Podcasts</li>
	                        </ul>
	                    </div>
	                </div>
	            </div>
	        </div>

			<!-- CONTENT -->
			<div id="content">
	            <div class="container">
	                <div class="row">
						<div class="col-md-8" id="blog-listing-medium">

							<div class="panel panel-default sidebar-menu"><div class="panel-heading"><center><p class="lead"><h1 class="panel-title" style="font-size: 42px;">Les podcasts de Radio Pac</h1></p></center></div></div>
							<br><br><br>

							<div id="container-podcast">
							</div>

							<ul class="pager">
								<li class="previous" id="podcast-recent"><a href="#">&larr; Récent</a></li>
								<li class="next" id="podcast-ancien"><a href="#">Ancien &rarr;</a></li>
							</ul>

                    	</div>
						<div class="col-md-3 col-md-offset-1">
							<div class="hidden-xs hidden-sm" style="height:187px;"></div>
							<div class="panel panel-default sidebar-menu">
	                            <div class="panel-heading">
	                                <h3 class="panel-title">Émissions</h3>
	                            </div>

	                            <div class="panel-body">
									<ul class="nav nav-pills nav-stacked">
										<?php

											foreach ($emissions as $emission) {

												if($id == $emission['id_emission']){
													$active = true;
												} else {
													$active = false;
												}

												?>
				                                    <li<?php if($active){ echo " class='active'"; } ?>><a href="liste_podcast.php?id=<?=$emission['id_emission'];?>"><?=$emission['titre_emission'];?></a>
											<?php }
											if($id == "none"){ ?>
												<li class='active'><a href="liste_podcast.php">Tous les podcasts</a>
											<?php } else { ?>
												<li><a href="liste_podcast.php">Tous</a>
											<?php }
										?>
									</ul>
	                            </div>
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

	<script>
		var page_podcast = 0;
		var limite = Math.ceil(<?=$nb_podcast;?>/3)-1;

		$(document).ready(function(){
			load_events();
		});

		function load_events(){
			var request = $.ajax({
	    		url:'traitements/ajax/get_podcasts.php',
	    		type:'POST',
	    		data:{
	          		'id': '<?=$id;?>',
	          		'page_podcast': page_podcast,
	        	},
	    		dataType : 'json'
	    	});

			request.done(function(data){
				$('#container-podcast').empty();

				$.each(data, function(key, value){
					var photo;
					if(value.photo_event == null || value.photo_event == ''){
						photo = value.photo_emission;
					} else {
						photo = value.photo_podcast;
					}

					var html_podcast = '<section class="post"><div style="padding-bottom:0px;" class="row custom-box"><div style="padding-left:0;padding-right:0;" class="col-md-3"><div style="margin-bottom:0px;" class="image"><a href="podcast.php?id='+value.id_podcast+'"><img src="'+photo+'" style="width:100%;" class="img-responsive" alt=""></a></div></div><div style="padding-right:0;padding-left:0;" class="col-md-9"><h2 style="margin-left:10px;margin-bottom:3px;margin-top:5px;"><a href="podcast.php?id='+value.id_podcast+'">'+value.titre_podcast+'</a></h2><div class="clearfix"><p style="margin-right:10px;" class="date-comments"><i class="fa fa-calendar-o" style="margin-right:10px;"></i>'+value.date_podcast+'</p></div><p style="margin-right:10px;margin-left:10px;" class="intro">'+value.descri_podcast+'</p><p class="read-more"><a style="margin-right:9px;" href="podcast.php?id='+value.id_podcast+'" class="btn btn-template-main">Ecouter le podcast</a></p></div></div></section>';
					$('#container-podcast').append(html_podcast);

				});

				if(page_podcast == 0){
		          $('#podcast-recent').addClass('disabled');
			  } else if($('#podcast-recent').hasClass('disabled')) {
		          $('#podcast-recent').removeClass('disabled');
		        }

		        if(page_podcast == limite || limite == -1){
		          $('#podcast-ancien').addClass('disabled');
			  } else if($('#podcast-ancien').hasClass('disabled')) {
		          $('#podcast-ancien').removeClass('disabled');
		        }
			});

			request.fail(function(data){
				console.log(data);
			})
		}

		$('#podcast-recent').click(function(e){
	      e.preventDefault();
	      if(page_podcast > 0){
	        page_podcast--;
	      }
	    	load_events();

	    })

	    $('#podcast-ancien').click(function(e){
	      e.preventDefault();
	      if(page_podcast < limite){
	        page_podcast++;
	      }
	    	load_events();
	    })


	</script>

</html>
