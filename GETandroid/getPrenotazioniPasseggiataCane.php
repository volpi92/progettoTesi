<?php
	header('Content-Type: application/json;charset=utf-8');
	require '../connectDB.php';
	$query = "SELECT pe.nome, pe.cognome, p.ora, a.nome FROM animalerifugio a, persona pe, prenotazione p WHERE pe.idPersona = p.idPersona AND p.idAnimaleRifugio = a.idAnimaleRifugio AND p.data = curdate()";
	$result = $mysqli->query($query);
	$rows = array();
	while($row = $result->fetch_assoc()) {
		$rows[] = $row;
	}
	
	print json_encode($rows);
	
	$mysqli->close();
?>