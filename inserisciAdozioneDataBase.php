<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Risultato inserisci adozione</title>
	</head>
	
	<body>
<?php	
		if($_SESSION['privilegio'] == "addetto" || $_SESSION['privilegio'] == "addetto amministratore") {
			require 'connectDB.php';

			$idpersona = $_POST['persona'];
			$tipo = $_POST["tipo"];
			if($tipo == "cane") {
				$idanimalerifugio=$_POST["cane"];
			}
			if($tipo == "gatto") {
				$idanimalerifugio=$_POST["gatto"];
			}
			//inserisci adozione modificando dati dell'animale
			
			$query = "UPDATE `animalerifugio` SET `idpersona`= ".$idpersona.", dataadozione = now() WHERE idanimalerifugio = ".$idanimalerifugio;
			
			if ($mysqli->query($query) === TRUE) {
				echo "Adozione effettuata con successo";
			} else {
				echo "Errore nell'inserire l'adozione: " . $mysqli->error;
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