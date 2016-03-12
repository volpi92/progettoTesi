<?php
	header('Content-Type: application/json;charset=utf-8');
	require '../connectDB.php';
	
	$idPersonaTurno = $_POST["idPersonaTurno"];
	
	$query = "DELETE FROM `personaturno` WHERE `IdPersonaTurno' = '$idPersonaTurno'";
		
	if ($mysqli->query($query) === TRUE) { 
		//(JSON: "result:success")
	} else { 
		//(JSON: "result:failure, errorMessage:errore nell'eseguire la query.  Error: " . $query . "::" . $mysqli->error)
	} 
	$mysqli->close();
?>