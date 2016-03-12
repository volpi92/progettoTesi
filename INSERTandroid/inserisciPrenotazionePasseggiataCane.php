<?php
	header('Content-Type: application/json;charset=utf-8');
	require '../connectDB.php';
	
	$data = $_POST["data"];
	$ora = $_POST["ora"];
	$tipo = $_POST["tipo"];
	$idPersona = $_POST["idPersona"];
	$idAnimaleRifugio = $_POST["idAnimaleRifugio"];
	
	$query = "INSERT INTO `prenotazione`(`Data`, `Ora`, `Tipo`, `IdPersona`, `IdAnimaleRifugio`) VALUES ('$data', '$ora', '$tipo', '$idPersona', '$idAnimaleRifugio')";
	
	if ($mysqli->query($query) === TRUE) { 
		//(JSON: "result:success")
	} else { 
		//(JSON: "result:failure, errorMessage:errore nell'eseguire la query.  Error: " . $query . "::" . $mysqli->error)
	} 
	$mysqli->close();
?>