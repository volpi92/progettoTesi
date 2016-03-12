<?php
	header('Content-Type: application/json;charset=utf-8');
	require '../connectDB.php';
	
	$idPrenotazione = $_POST["idPrenotazione"];
	
	$query = "DELETE FROM `prenotazione` WHERE `idPrenotazione` = '$idPrenotazione'";
		
	if ($mysqli->query($query) === TRUE) { 
		//(JSON: "result:success")
	} else { 
		//(JSON: "result:failure, errorMessage:errore nell'eseguire la query.  Error: " . $query . "::" . $mysqli->error)
	} 
	$mysqli->close();
?>