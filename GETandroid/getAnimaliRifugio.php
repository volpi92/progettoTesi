<?php
	header('Content-Type: application/json;charset=utf-8');
	require '../connectDB.php';
	$query = "SELECT * FROM `animalerifugio` WHERE dataAdozione IS NULL AND dataMorte IS NULL";
	$result = $mysqli->query($query);

	$rows = array();
	$output = array();
	if ($result->num_rows > 0) { 
		while($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		$output['result'] = "true";
		$output['data'] = $rows;
	} else {
		$output['result'] = "false";
		$output['data'] = "nessun animale nel rifugio";
	}
	print json_encode($output);
		
	$mysqli->close();

?>