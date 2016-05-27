<?php
	include "includes/database.php";

	if(isset($_GET['filtre']) && isset($_GET['id'])){
		$id = $_GET['id'];
		switch ($_GET['filtre']){
			case "categorie":
				$sql = "SELECT count(*) as qte FROM articles A, categories C WHERE A.categ_article = C.id_cat AND C.id_cat = $id";
				$nb_article = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
			    $nb_article = $nb_article['qte'];
				break;

			case "emission":
				$sql = "SELECT count(*) as qte FROM articles A, emissions E WHERE A.id_emission = E.id_emission AND E.id_emission = $id";
				$nb_article = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
			    $nb_article = $nb_article['qte'];
				break;
		}
	} else {
		$sql = "SELECT count(*) as qte FROM articles";
		$nb_article = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
		$nb_article = $nb_article['qte'];
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
	                    <div class="col-md-4">
	                    </div>
	                    <div class="col-md-8">
	                        <ul class="breadcrumb">
	                            <li><a href="index.php">Accueil</a></li>
															<li>Articles</li>
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

							<div class="panel panel-default sidebar-menu"><div class="panel-heading"><center><p class="lead"><h1 class="panel-title" style="font-size: 42px;">Nos articles</h1></p></center></div></div>
							<br><br><br>

							<div id="container-articles">

							</div>

	                        <ul class="pager">
								<li class="previous" id="article-recent"><a href="#">&larr; Récent</a></li>
								<li class="next" id="article-ancien"><a href="#">Ancien &rarr;</a></li>
							</ul>
                    	</div>

						<div class="col-md-3 col-md-offset-1">
							<div class="hidden-xs hidden-sm" style="height:187px;"></div>
							<div class="panel panel-default sidebar-menu">

								<ul class="nav nav-pills nav-stacked">
									<li <?php if(!isset($_GET['filtre']) && !isset($_GET['id'])){echo " class='active'";} ?>><a href="liste_article.php">Tous</a></li>
								</ul>

								<hr>

	                            <div class="panel-heading">
	                                <h3 class="panel-title">Catégories</h3>
	                            </div>

								<div class="panel-body">
									<ul class="nav nav-pills nav-stacked">
									<?php
										$sql = "SELECT id_cat, lib_cat FROM categories";
										$categories = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
										foreach($categories as $categorie){
											if(isset($_GET['filtre']) && isset($_GET['id'])){
												if($_GET['filtre'] == "categorie" && $_GET['id'] == $categorie['id_cat']){ ?>
													<li class="active"><a href="liste_article.php?filtre=categorie&id=<?=$categorie['id_cat'];?>"><?=$categorie['lib_cat'];?></a></li>
												<?php } else { ?>
													<li><a href="liste_article.php?filtre=categorie&id=<?=$categorie['id_cat'];?>"><?=$categorie['lib_cat'];?></a></li>
												<?php }
											} else { ?>
												<li><a href="liste_article.php?filtre=categorie&id=<?=$categorie['id_cat'];?>"><?=$categorie['lib_cat'];?></a></li>
											<?php }
										}
									?>
									</ul>
								</div>
								<hr>
								<div class="panel-heading">
	                                <h3 class="panel-title">Emissions</h3>
	                            </div>

	                            <div class="panel-body">
									<ul class="nav nav-pills nav-stacked">
										<?php
											$sql = "SELECT id_emission, titre_emission FROM emissions";
											$emissions = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
											foreach($emissions as $emission){
												if(isset($_GET['filtre']) && isset($_GET['id'])){
													if($_GET['filtre'] == "emission" && $_GET['id'] == $emission['id_emission']){ ?>
														<li class="active"><a href="liste_article.php?filtre=emission&id=<?=$emission['id_emission'];?>"><?=$emission['titre_emission'];?></a></li>
													<?php } else { ?>
														<li><a href="liste_article.php?filtre=emission&id=<?=$emission['id_emission'];?>"><?=$emission['titre_emission'];?></a></li>
													<?php }
												} else { ?>
													<li><a href="liste_article.php?filtre=emission&id=<?=$emission['id_emission'];?>"><?=$emission['titre_emission'];?></a></li>
												<?php }
											}
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

		var page_article = 0;
		var limite = Math.ceil(<?=$nb_article;?>/4)-1;

		$(document).ready(function(){
			load_articles();
		});

		function load_articles(){
			var request = $.ajax({
				url:'traitements/ajax/get_articles.php',
	    		type:'POST',
				<?php
					if(isset($_GET['filtre']) && isset($_GET['id'])){ ?>
						data:{
			          		'id': '<?=$_GET['id'];?>',
							'filtre': '<?=$_GET['filtre'];?>',
			          		'page': page_article,
			        	},
					<?php } else { ?>
						data:{
							'page': page_article,
						},
					<?php }
				?>
	    		dataType : 'json'
			});
			request.done(function(data){

				$('#container-articles').empty();
				$.each(data, function(key, value){
					var photo;
					if(value.photo_article == null || value.photo_article == ''){
						photo = value.photo_categ;
					} else {
						photo = value.photo_article;
					}

					var url;
					if(value.type == "emission"){
						url = "emission.php?id="+value.id_categ;
					} else if(value.type == "categorie"){
						url = "liste_article.php?filtre=categorie&id="+value.id_categ;
					}

					var html_evenement = '<section class="post"><div class="row"><div class="col-md-4"><div class="image"><a href="article.php?id='+value.id+'"><img src="'+photo+'" class="img-responsive" alt=""></a></div></div><div class="col-md-8"><h2><a href="article.php?id='+value.id+'">'+value.titre+'</a></h2><div class="clearfix"><p class="author-category"><a href="'+url+'">'+value.lib_categ+'</a></p><p class="date-comments"><i class="fa fa-calendar-o"></i> '+value.date+'</p></div><p class="intro">'+value.contenu+'</p><p class="read-more"><a href="article.php?id='+value.id+'" class="btn btn-template-main">Continuer la lecture</a></p></div></div></section>';
					$('#container-articles').append(html_evenement);

					if(page_article == 0){
			          $('#article-recent').addClass('disabled');
			        } else if($('#article-recent').hasClass('disabled')) {
			          $('#article-recent').removeClass('disabled');
			        }

			        if(page_article == limite || limite == -1){
			          $('#article-ancien').addClass('disabled');
				  } else if($('#article-ancien').hasClass('disabled')) {
			          $('#article-ancien').removeClass('disabled');
			        }


				});
			});

			$('#article-recent').click(function(e){
		      e.preventDefault();
		      if(page_article > 0){
		        page_article--;
		      }
		    	load_articles();

		    })

		    $('#article-ancien').click(function(e){
		      e.preventDefault();
		      if(page_article < limite){
		        page_article++;
		      }
		    	load_articles();
		    })

		}

	</script>

</html>
