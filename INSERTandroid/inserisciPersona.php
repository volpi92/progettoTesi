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
	$regione = $_POST["regione"];
	$provincia = $_POST["provincia"];
	$castello = $_POST["castello"];
	$indirizzo = $_POST["indirizzo"];
	$userName = $_POST["userName"];
	$password = $_POST["password"];
	
	
	//controlla se username esiste già, se si avvisa l'utente failure, username diverso...
	$query = "SELECT Nome FROM Persona WHERE userName= '$username'";
	$result = $mysqli->query($query);
	if ($result->num_rows > 0) { //username esiste già, inserirne un'altro 
		//(JSON: "result:failure, errorMessage:username già presente")
	} else {		
		if($_POST["stato"] == "San Marino") {
			$query = "INSERT INTO `persona`(`Nome`, `Cognome`, `Sesso`, `DataNascita`, `Email`, `Telefono`, `Stato`, `Castello`, `Indirizzo`, `Privilegio`, `UserName`, `Password`) VALUES ('$nome', '$cognome', '$sesso', '$dataNascita', '$email', '$telefono', '$stato', '$castello', '$indirizzo', 'utente generico', '$userName', '$password')";
		} else {
			$query = "INSERT INTO `persona`(`Nome`, `Cognome`, `Sesso`, `DataNascita`, `Email`, `Telefono`, `Stato`, `Regione`, `Provincia`, `Indirizzo`, `Privilegio`, `UserName`, `Password`) VALUES ('$nome', '$cognome', '$sesso', '$dataNascita', '$email', '$telefono', '$stato', '$regione', '$provincia', '$indirizzo', 'utente generico', '$userName', '$password')";
		}
		
		if ($mysqli->query($query) === TRUE) { 
			//(JSON: "result:success")
   	    } else { 
			//(JSON: "result:failure, errorMessage:errore nell'eseguire la query.  Error: " . $query . "::" . $mysqli->error)
		} 
	}
	

	
	//print json_encode($jsonString);
	
	$mysqli->close();
?>