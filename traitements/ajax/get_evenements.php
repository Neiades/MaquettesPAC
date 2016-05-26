<?php
	include"../../includes/database.php";

	$id = $_POST['id'];
	$page = $_POST['page_event'];
	$limite = page*4;

	if($id != "none"){
		$sql = "SELECT E.id, E.title, E.start, E.end, E.contenu_event, E.photo_event, E.date_event, E.lieu, T.id_type_event, T.lib_type_event, T.photo_type_event FROM evenements E, type_event T WHERE E.type_event = T.id_type_event AND E.type_event = $id ORDER BY id DESC LIMIT $limite, 4";
	} else {
		$sql = "SELECT E.id, E.title, E.start, E.end, E.contenu_event, E.photo_event, E.date_event, E.lieu, T.id_type_event, T.lib_type_event, T.photo_type_event FROM evenements E, type_event T WHERE E.type_event = T.id_type_event ORDER BY id DESC LIMIT $limite, 4";
	}

	$evenementsreturn = array();

	$evenements = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

	foreach($evenements as $evenement){

		$evenement['date_event'] = date_create($evenement['date_event']);
		$evenement['date_event'] = date_format($evenement['date_event'], 'd/m/Y');

		$evenement['start'] = date_create($evenement['start']);
		$evenement['start'] = date_format($evenement['start'], 'd/m/Y');

		$evenement['end'] = date_create($evenement['end']);
		$evenement['end'] = date_format($evenement['end'], 'd/m/Y');

		$evenement['contenu_event'] = strip_tags($evenement['contenu_event']);
		if(strlen($evenement['contenu_event'])>300){
			$evenement['contenu_event'] = substr($evenement['contenu_event'],0,300)."...";
		}

		array_push($evenementsreturn, $evenement);
	}

	echo json_encode($evenementsreturn);
?>
