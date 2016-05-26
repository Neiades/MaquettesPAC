<?php
	include "includes/database.php";
	if(isset($_GET['id'])){
		$id = $_GET['id'];

		$sql = "SELECT count(id) as qte FROM evenements WHERE type_event = $id";
	    $nb_evenement = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
	    $nb_evenement = $nb_evenement['qte'];

	} else {
		$id = "none";

		$sql = "SELECT count(id) as qte FROM evenements";
	    $nb_evenement = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
	    $nb_evenement = $nb_evenement['qte'];
	}
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
															<li>Evenements</li>
	                        </ul>
	                    </div>
	                </div>
	            </div>
	        </div>

			<!-- CONTENT -->
			<div id="content">
	            <div class="container">
	                <div class="row">
						<div class="col-md-10 col-md-offset-1" id="blog-listing-medium">

							<div class="panel panel-default sidebar-menu"><div class="panel-heading"><center><p class="lead"><h1 class="panel-title" style="font-size: 42px;">Les événements dans la région !</h1></p></center></div></div>
							<br><br><br>

							<div id="container-evenement">

								<section class="post">
		                            <div class="row">

		                                <div class="col-md-3">
		                                    <div class="image">
		                                        <a href="blog-post.html">
		                                            <img src="img/blog-medium.jpg" class="img-responsive" alt="Example blog post alt">
		                                        </a>
		                                    </div>
		                                </div>
		                                <div class="col-md-9">
		                                    <h2><a href="post.htmls">Nom evenement</a></h2>
																				<div class="clearfix">
		                                        <p class="author-category">Lieu : Trifouilli les oies</p>
		                                        <p class="date-comments"><i class="fa fa-calendar-o" style="margin-right:10px;"></i>
		                                            <a href="blog-post.html">Du : June 20, 2013</a>
		                                            <a href="blog-post.html">Au : June 23, 2013</a>
		                                        </p>
		                                    </div>
		                                    <p class="intro">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.
		                                        Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
		                                    <p class="read-more"><a href="blog-post.html" class="btn btn-template-main">Lire plus</a>
		                                    </p>
		                                </div>
		                            </div>
		                        </section>

							</div>

							<ul class="pager">
								<li class="previous" id="article-recent"><a href="#">&larr; Récent</a></li>
								<li class="next" id="article-ancien"><a href="#">Ancien &rarr;</a></li>
							</ul>

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
		var page_event = 0;
		var limite = Math.ceil(<?=$nb_evenement;?>/4)-1;

		$(document).ready(function(){
			load_events();
		});

		function load_events(){
			var request = $.ajax({
	    		url:'traitements/ajax/get_evenements.php',
	    		type:'POST',
	    		data:{
	          		'id': '<?=$id;?>',
	          		'page_event': page_event,
	        	},
	    		dataType : 'json'
	    	});

			request.done(function(data){
				$('#container-evenement').empty();

				$.each(data, function(key, value){
					var photo;
					if(value.photo_event == null || value.photo_event == ''){
						photo = value.photo_type_event;
					} else {
						photo = value.photo_event;
					}

					var html_evenement = '<section class="post"><div class="row"><div class="col-md-3"><div class="image"><a href="evenement.php?id='+value.id+'"><img src="'+photo+'" class="img-responsive" alt="Example blog post alt"></a></div></div><div class="col-md-9"><h2><a href="evenement.php?id='+value.id+'">'+value.title+'</a></h2><div class="clearfix"><p class="author-category">Lieu : '+value.lieu+'</p><p class="date-comments"><i class="fa fa-calendar-o" style="margin-right:10px;"></i>Du : '+value.start+' Au : '+value.start+'</p></div><p class="intro">'+value.contenu_event+'</p><p class="read-more"><a href="evenement.php?id='+value.id+'" class="btn btn-template-main">Lire plus</a></p></div></div></section>';
					$('#container-evenement').append(html_evenement);

				});

				if(page_event == 0){
		          $('#article-ancien').addClass('disabled');
		        } else if($('#article-ancien').hasClass('disabled')) {
		          $('#article-ancien').removeClass('disabled');
		        }

		        if(page_event == limite){
		          $('#article-recent').addClass('disabled');
		        } else if($('#article-recent').hasClass('disabled')) {
		          $('#article-recent').removeClass('disabled');
		        }
			});

			request.fail(function(data){
				console.log(data);
			})
		}

		$('#article-ancien').click(function(e){
	      e.preventDefault();
	      if(page_event > 0){
	        page_event--;
	      }
	    	load_events();

	    })

	    $('#article-recent').click(function(e){
	      e.preventDefault();
	      if(page_event < limite){
	        page_event++;
	      }
	    	load_events();
	    })


	</script>

</html>
