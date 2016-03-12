<?php
	header('Content-Type: application/json;charset=utf-8');
	require '../connectDB.php';
	
	$idPersona = $_POST["idPersona"];
	$privilegio = $_POST["privilegio"];
	
	$querty = "UPDATE `persona` SET `privilegio`='$privilegio' WHERE `idPersona` = '$idPersona'";
	
	
	if ($mysqli->query($query) === TRUE) { 
		//(JSON: "result:success")
	} else { 
		//(JSON: "result:failure, errorMessage:errore nell'eseguire la query.  Error: " . $query . "::" . $mysqli->error)
	} 
	$mysqli->close();
?>