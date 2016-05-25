<?php
  include"../../includes/database.php";

  $id = $_POST['id'];
  $page = $_POST['page_podcast'];
  $limite = $page*3;

  $sql = "SELECT P.id_podcast, P.titre_podcast, P.photo_podcast, P.date_podcast, P.chemin_podcast, E.id_emission, E.titre_emission, E.photo_emission FROM podcasts P, emissions E WHERE P.emission_podcast = E.id_emission AND P.emission_podcast =  $id ORDER BY P.id_podcast DESC LIMIT $limite,3";
  $podcasts = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode($podcasts);

?>
