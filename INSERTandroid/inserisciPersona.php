<?php
	header('Content-Type: application/json;charset=utf-8');
	require '../connectDB.php';
	
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
	$userName = $_POST["userName"];
	$password = $_POST["password"];
	
	$output = array();
	
	//controlla se username esiste già, se si avvisa l'utente failure, username diverso...
	$query = "SELECT Nome FROM Persona WHERE userName= '$userName'";
	$result = $mysqli->query($query);
	if ($result->num_rows > 0) { //username esiste già, inserirne un'altro 
		$output['result'] = "false";
		$output['data'] = "Username già presente, inserirne un altro";
	} else {		
		if($stato == "San Marino") {
			$query = "INSERT INTO `persona`(`Nome`, `Cognome`, `Sesso`, `DataNascita`, `Email`, `Telefono`, `Stato`, `Castello`, `Indirizzo`, `Privilegio`, `UserName`, `Password`) VALUES ('$nome', '$cognome', '$sesso', '$dataNascita', '$email', '$telefono', '$stato', '$castello', '$indirizzo', 'utente generico', '$userName', '$password')";
		} else {
			$query = "INSERT INTO `persona`(`Nome`, `Cognome`, `Sesso`, `DataNascita`, `Email`, `Telefono`, `Stato`, `Regione`, `Provincia`, `Indirizzo`, `Privilegio`, `UserName`, `Password`) VALUES ('$nome', '$cognome', '$sesso', '$dataNascita', '$email', '$telefono', '$stato', '$regione', '$provincia', '$indirizzo', 'utente generico', '$userName', '$password')";
		}
		
		
		if ($mysqli->query($query) === TRUE) { 
			$output['result'] = true;	
			$output['data'] = "Registrazione avvenuta con successo";
   	    } else { 
			$output['result'] = false;
			$output['data'] = "Errore nell'eseguire la query nel database. Error: " . $query . "::" . $mysqli->error;
		} 
	}
	
	print json_encode($output);
	
	$mysqli->close();
?>