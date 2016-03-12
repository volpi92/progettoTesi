<?php
	header('Content-Type: application/json;charset=utf-8');
	require '../connectDB.php';
	$idPersona = $_POST["idPersona"];
	$query = "SELECT p.data, p.ora, p.tipo, a.nome, a.linkfoto FROM prenotazione p, animalerifugio a WHERE p.idPersona = '$idPersona' AND p.idAnimaleRifugio = a.idAnimaleRifugo";
	$result = $mysqli->query($query);
	$rows = array();
	$output = array();
	
	if($result->num_rows > 0) { 		
		while($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		$output['result'] = "true";
		$output['data'] = $rows;
	} else {
		$output['result'] = "false";
		$output['data'] = "nessuna prenotazione per passeggiate con cani effetuata";
	}
	print json_encode($output);
	
	$mysqli->close();
?>