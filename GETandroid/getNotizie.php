<?php
	header('Content-Type: application/json;charset=utf-8');
	require '../connectDB.php';
	$query = "SELECT * FROM `notizia`";
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
		$output['data'] = "nessuna notizia disponibile";
	}
	
	print json_encode($output);
	
	$mysqli->close();
?>