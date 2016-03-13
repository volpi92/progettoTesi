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
	if($stato == "Italia") {		
		$regione = $_POST["regione"];
		$provincia = $_POST["provincia"];
	} else {
		$castello = $_POST["castello"];		
	}
	$indirizzo = $_POST["indirizzo"];
	$privilegio = $_POST["privilegio"];
	
	
	$output = array();
	
	if($stato == "Italia") {
		$query = "UPDATE `persona` SET `Nome`= '$nome', `Cognome`='$cognome', `Sesso`='$sesso', `DataNascita`='$dataNascita', `Email`='$email', `Telefono`='$telefono', `Stato`='$stato', `Regione`='$regione', `Provincia`= '$provincia', `Castello` = NULL, `Indirizzo`='$indirizzo', `Privilegio`='$privilegio' WHERE `idPersona` = '$idPersona'";
	} else {
		$query = "UPDATE `persona` SET `Nome`= '$nome', `Cognome`='$cognome', `Sesso`='$sesso', `DataNascita`='$dataNascita', `Email`='$email', `Telefono`='$telefono', `Stato`='$stato', `Regione`= NULL, `Provincia`= NULL, `Castello`='$castello', `Indirizzo`='$indirizzo', `Privilegio`='$privilegio' WHERE `idPersona` = '$idPersona'";
	}
	
	
	
	if ($mysqli->query($query) === TRUE) { 
		$output['result'] = "true";
		$output['data'] = "Modifica effettuata con successo";
	} else { 
		$response['result'] = "false";
		$output['data'] = "Errore nell'eseguire la query. Error: " . $query . "::" . $mysqli->error;
	} 
	
	print json_encode($output);
	
	
	$mysqli->close();
?>