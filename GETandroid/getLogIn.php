<?php
	header('Content-Type: application/json;charset=utf-8');
	
	$output = array();
	if (isset($_POST["userName"]) && !empty($_POST["userName"]) && isset($_POST["password"]) && !empty($_POST["password"]) ) {
		require '../connectDB.php';
		$userName = $_POST["userName"];
		$password = $_POST["password"];
	
		$query = "SELECT nome, cognome, sesso, datanascita, email, telefono, stato, regione, provincia, castello, indirizzo, privilegio FROM `persona` WHERE userName = '$userName' AND password = '$password'";
		$result = $mysqli->query($query);
		if ($result->num_rows > 0) { 
			$row = $result->fetch_assoc();
			$output['result'] = "true";
			$output['data'] = $row;
		} else {
			$output['result'] = "false";
			$output['data'] = "userName e password non trovati";
		}		
		$mysqli->close();
	} else {
		$output['result'] = "false";
		$output['data'] = "userName e password non settati nel post";
	}
	print json_encode($output);
?>