<?php
	header('Content-Type: application/json;charset=utf-8');
	require '../connectDB.php';
	
	$idPersona = $_POST['idPersona'];
	$query = "SELECT nome, cognome, sesso, datanascita, email, telefono, stato, regione, provincia, castello, indirizzo FROM `persona` WHERE idPersona = '$idPersona'";
	$result = $mysqli->query($query);
	$output = array();
	if ($result->num_rows > 0) { 
		$row = $result->fetch_assoc();
		$output['result'] = "true";
		$output['data'] = $row;
	} else {
		$output['result'] = "false";
		$output['data'] = "errore: idPersona non trovato";
	}
	print json_encode($output);
	//print json_encode($rows);
	
	$mysqli->close();
?>