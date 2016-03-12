<?php
	header('Content-Type: application/json;charset=utf-8');
	require '../connectDB.php';
	
	$idTerapia = $_POST["idTerapia"];
	$dataAnticipo = $_POST["dataAnticipo"];
	
	$query = "UPDATE `terapia` SET `TerminataInAnticipo`='1',`DataAnticipo`='$dataAnticipo' WHERE `idTerapia` = '$idTerapia'";
		
	if ($mysqli->query($query) === TRUE) { 
		//(JSON: "result:success")
	} else { 
		//(JSON: "result:failure, errorMessage:errore nell'eseguire la query.  Error: " . $query . "::" . $mysqli->error)
	} 
	$mysqli->close();
?>