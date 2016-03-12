<?php
	header('Content-Type: application/json;charset=utf-8');
	require '../connectDB.php';
	
	$idPersona = $_POST["idPersona"];
	$nome = $_POST["nome"];
	$cognome = $_POST["cognome"];
	$sesso = $_POST["sesso"];
	$dataNascita = $_POST["dataNascita"];
	$email = $_POST["email"];
	$telefono = $_POST["telefono"];
	$stato = $_POST["stato"];
	$regione = $_POST["regione"];
	$provincia = $_POST["provincia"];
	$castello = $_POST["castello"];
	$indirizzo = $_POST["indirizzo"];
	
	$response = array();
	
	if($stato == "Italia") {
		$querty = "UPDATE `persona` SET `Nome`= '$nome', `Cognome`='$cognome', `Sesso`='$sesso', `DataNascita`='$dataNascita', `Email`='$email', `Telefono`='$telefono', `Stato`='$stato', `Regione`='$regione', `Provincia`= '$provincia', `Indirizzo`='$indirizzo' WHERE `idPersona` = '$idPersona'";
	} else {
		$querty = "UPDATE `persona` SET `Nome`= '$nome', `Cognome`='$cognome', `Sesso`='$sesso', `DataNascita`='$dataNascita', `Email`='$email', `Telefono`='$telefono', `Stato`='$stato', `Castello`='$castello', `Indirizzo`='$indirizzo' WHERE `idPersona` = '$idPersona'";
	}
	
	
	
	if ($mysqli->query($query) === TRUE) { 
		$response['success'] = "true";
	} else { 
		$response['success'] = "false";
	} 
	
	print json_encode($response);
	
	
	$mysqli->close();
?>