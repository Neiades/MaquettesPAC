<?php
	header('Content-Type: application/json');
	include"../../includes/database.php";

	$page = $_POST['page'];
	$limite = $page*4;

	$lesarticles = array();

	if(isset($_POST['filtre']) && isset($_POST['id'])){
		$id = $_POST['id'];
		switch ($_POST['filtre']) {
    		case "categorie":
        		$sql = "SELECT * FROM articles A, categories C WHERE A.categ_article = C.id_cat AND C.id_cat = $id ORDER BY A.id_article DESC LIMIT $limite,4";
				$articles = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				foreach ($articles as $article) {

					$unarticle = array();

					$unarticle['id'] = $article['id_article'];

					$date = date_create($article['date_article']);
					$date = date_format($date, 'd/m/Y');

					$unarticle['date'] = $date;
					$unarticle['titre'] = $article['titre_article'];
					$unarticle['contenu'] = $article['contenu_article'];
					$unarticle['photo_article'] = $article['photo_article'];
					$unarticle['id_categ'] = $article['id_cat'];
					$unarticle['lib_categ'] = $article['lib_cat'];
					$unarticle['photo_categ'] = $article['photo_cat'];
					$unarticle['type'] = "categorie";

					array_push($lesarticles,$unarticle);
				}

        		break;
			case "emission":
        		$sql = "SELECT * FROM articles A, emissions E WHERE A.id_emission = E.id_emission AND E.id_emission = $id ORDER BY A.id_article DESC LIMIT $limite,4";
				$articles = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				foreach ($articles as $article) {

					$unarticle = array();

					$unarticle['id'] = $article['id_article'];

					$date = date_create($article['date_article']);
					$date = date_format($date, 'd/m/Y');

					$unarticle['date'] = $date;
					$unarticle['titre'] = $article['titre_article'];
					$unarticle['contenu'] = strip_tags($article['contenu_article']);
					$unarticle['photo_article'] = $article['photo_article'];
					$unarticle['id_categ'] = $article['id_emission'];
					$unarticle['lib_categ'] = $article['titre_emission'];
					$unarticle['photo_categ'] = $article['photo_emission'];
					$unarticle['type'] = "emission";

					array_push($lesarticles,$unarticle);
				}

        		break;
		}

	} else {
		//Selection de tous les articles si aucun filtre placé en GET
		$sql = "SELECT * FROM articles ORDER BY id_article DESC LIMIT $limite,4";
		$articles = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
		//Parcours des articles
		foreach ($articles as $article) {
			//initialisation d'un tampon
			$unarticle = array();

			//remplissage du tempon
			$unarticle['id'] = $article['id_article'];

			$date = date_create($article['date_article']);
			$date = date_format($date, 'd/m/Y');

			$unarticle['date'] = $date;
			$unarticle['titre'] = $article['titre_article'];
			$unarticle['contenu'] = strip_tags($article['contenu_article']);
			$unarticle['photo_article'] = $article['photo_article'];

			//differentiation des articles
			if($article['categ_article'] != null){
				$id_categ = $article['categ_article'];
				$sql = "SELECT * FROM categories WHERE id_cat = $id_categ";
				$categ = $db->query($sql)->fetch(PDO::FETCH_ASSOC);

				$unarticle['id_categ'] = $categ['id_cat'];
				$unarticle['lib_categ'] = $categ['lib_cat'];
				$unarticle['photo_categ'] = $categ['photo_cat'];
				$unarticle['type'] = "categorie";

			} else if($article['id_emission'] != null){
				$id_emission = $article['id_emission'];
				$sql = "SELECT id_emission, titre_emission, photo_emission FROM emissions WHERE id_emission = $id_emission";
				$categ = $db->query($sql)->fetch(PDO::FETCH_ASSOC);

				$unarticle['id_categ'] = $categ['id_emission'];
				$unarticle['lib_categ'] = $categ['titre_emission'];
				$unarticle['photo_categ'] = $categ['photo_emission'];
				$unarticle['type'] = "emission";

			}
			array_push($lesarticles,$unarticle);
		}
	}
	echo json_encode($lesarticles);
?>
