<?php
	header('Content-Type: application/json;charset=utf-8');
	require '../connectDB.php';
	
	$query = "SELECT p.nome, p.cognome, v.data, v.descrizione, a.nome FROM visita v, animalerifugio a, persona p  WHERE v.idPersona = p.idPersona AND v.idAnimaleRifugio = a.idAnimaleRifugio AND data > DATE_SUB(NOW(), INTERVAL 1 MONTH)";
	$result = $mysqli->query($query);
	$rows = array();
	while($row = $result->fetch_assoc()) {
		$rows[] = $row;
	}
	
	print json_encode($rows);
	
	$mysqli->close();
?>