<?php
	header('Content-Type: application/json;charset=utf-8');
	require '../connectDB.php';
	$sezione = $_POST["sezione"];
	$query = "SELECT p.nome, p.cognome FROM turno t, personaturno pt, persona p WHERE pt.idPersona = p.idPersona AND pt.idTurno = t.idTurno AND t.data > curdate() AND t.sezione = '$sezione'";
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
		$output['data'] = "nessuna persona assegnata al seguente turno";
	}
	print json_encode($output);
	
	$mysqli->close();
?>