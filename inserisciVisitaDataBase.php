<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Risultato inserisci visita</title>
	</head>
	
	<body>
<?php	
		if($_SESSION['privilegio'] == "veterinario") {
			require 'connectDB.php';
			$idpersona = $_SESSION["idpersona"];
			
			//check se ha selezionato cane o gatto			
			$tipo = $_POST["tipo"];
			if($tipo == "cane") {
				$idanimalerifugio=$_POST["cane"];
			}
			if($tipo == "gatto") {
				$idanimalerifugio=$_POST["gatto"];
			}
			$descrizione = $_POST["descrizione"];
			
			$query = "INSERT INTO `visita`(`Data`, `Descrizione`, `IdPersona`, `IdAnimaleRifugio`) VALUES (now(), '$descrizione', '$idpersona', '$idanimalerifugio')";
			if ($mysqli->query($query) === TRUE) {
				echo "Visita inserita con successo";
			} else {
				echo "Errore nell'inserire la visita: " . $mysqli->error;
			}
			$mysqli->close(); ?>
			<br/>
			<a href='MenuPrincipale.php'>Torna al menu principale</a>
<?php	} else { ?>
			Nessuna sessione attiva
			<a href='index.php'>Effettuare il log-in</a>
<?php	} ?>
	</body>
</html>