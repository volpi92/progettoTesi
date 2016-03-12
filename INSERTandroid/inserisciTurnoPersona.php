<?php
	header('Content-Type: application/json;charset=utf-8');
	require '../connectDB.php';
	
	$idPersona = $_POST["idPersona"];
	$idTurno = $_POST["idTurno"];
	
	$query = "INSERT INTO `personaturno`(`IdTurno`, `IdPersona`) VALUES ('$idTurno', '$idPersona')";
	
	if ($mysqli->query($query) === TRUE) { 
		//(JSON: "result:success")
	} else { 
		//(JSON: "result:failure, errorMessage:errore nell'eseguire la query.  Error: " . $query . "::" . $mysqli->error)
	} 
	$mysqli->close();
?>