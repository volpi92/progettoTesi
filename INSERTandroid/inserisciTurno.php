<?php
	header('Content-Type: application/json;charset=utf-8');
	require '../connectDB.php';
	
	$data = $_POST["data"];
	$sezione = $_POST["sezione"];
	
	$query = "INSERT INTO `turno`(`Data`, `Sezione`) VALUES ('data', 'sezione')";
	
	if ($mysqli->query($query) === TRUE) { 
		//(JSON: "result:success")
	} else { 
		//(JSON: "result:failure, errorMessage:errore nell'eseguire la query.  Error: " . $query . "::" . $mysqli->error)
	} 
	$mysqli->close();
?>