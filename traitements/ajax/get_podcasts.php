<?php
  include"../../includes/database.php";

  $id = $_POST['id'];
  $page = $_POST['page_podcast'];
  $limite = $page*3;

  if($id != "none"){
    $sql = "SELECT P.id_podcast, P.descri_podcast, P.titre_podcast, P.photo_podcast, P.date_podcast, P.chemin_podcast, E.id_emission, E.titre_emission, E.photo_emission FROM podcasts P, emissions E WHERE P.emission_podcast = E.id_emission AND P.emission_podcast =  $id ORDER BY P.id_podcast DESC LIMIT $limite,3";
  } else {
    $sql = "SELECT P.id_podcast, P.descri_podcast, P.titre_podcast, P.photo_podcast, P.date_podcast, P.chemin_podcast, E.id_emission, E.titre_emission, E.photo_emission FROM podcasts P, emissions E WHERE P.emission_podcast = E.id_emission ORDER BY P.id_podcast DESC LIMIT $limite,3";
  }



  $podcasts = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

  $podcastsreturn = array();

  foreach($podcasts as $podcast){

    $podcast['date_podcast'] = date_create($podcast['date_podcast']);
    $podcast['date_podcast'] = date_format($podcast['date_podcast'], 'd/m/Y');

    $podcast['descri_podcast'] = strip_tags($podcast['descri_podcast']);
    if(strlen($podcast['descri_podcast'])>300){
      $podcast['descri_podcast'] = substr($podcast['descri_podcast'],0,300)."...";
    }

    array_push($podcastsreturn, $podcast);

  }

  echo json_encode($podcastsreturn);

?>
