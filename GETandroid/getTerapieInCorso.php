<?php
	header('Content-Type: application/json;charset=utf-8');
	require '../connectDB.php';
	$query = "SELECT p.nome, p.cognome, t.datainizio, t.datafine, t.descrizione, a.nome FROM terapia t, animalerifugio a, persona p  WHERE t.idAnimaleRifugio = a.idAnimaleRifugio AND t.idPersona = p.idPersona AND curdate() > t.datainizio AND curdate() < t.datafine";
	$result = $mysqli->query($query);
	$rows = array();
	while($row = $result->fetch_assoc()) {
		$rows[] = $row;
	}
	
	print json_encode($rows);
	
	$mysqli->close();
?>