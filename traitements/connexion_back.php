<?php
	include "../includes/database.php";

	if(isset($_POST["username"]) && isset($_POST["password"])){
		if($_POST["username"] != "" && $_POST["password"]){
			$username = $_POST['username'];
			$password = $_POST['password'];

			header("Location: http://localhost/BackRadioPac/traitements/connexion.php?username=$username&password=$password");
		} else {
			header('Location: ../index.php');
		}
	} else {
		header('Location: ../index.php');
	}








?>
