<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Risultato inserisci terapia</title>
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
			$datainizio = $_POST["dataInizio"];
			$datafine = $_POST["dataFine"];
			
			$query = "INSERT INTO `terapia`(`DataInizio`, `DataFine`, `Descrizione`, `TerminataInAnticipo`, `IdPersona`, `IdAnimaleRifugio`) VALUES ('".$datainizio."', '".$datafine."', '".$descrizione."', 0, '".$idpersona."', '".$idanimalerifugio."')";
	
			if ($mysqli->query($query) === TRUE) {
				echo "Terapia inserita con successo";
			} else {
				echo "Errore nell'inserire la terapia: " . $mysqli->error;
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