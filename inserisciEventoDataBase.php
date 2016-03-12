<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Risultato inserisci evento</title>
	</head>
	
	<body>
<?php	
		if($_SESSION['privilegio'] == "addetto amministratore") {
			require 'connectDB.php';
			$idpersona = $_SESSION["idpersona"];
			
			$path = "foto/eventi/";
			$titolo = $_POST['titolo'];
			$descrizione = $_POST['descrizione'];
			$luogo = $_POST['luogo'];
			$dataEvento = $_POST['data'];
			$oraEvento = $_POST['ora'];
			
			if($_FILES["foto"]["error"] > 0) {
				echo "No file uploaded, or invalid file (immagine). Error code: ".$_FILES["foto"]["error"]."<br/>";
			} else {
				$path_completo = $path.$_FILES["foto"]["name"];
				move_uploaded_file($_FILES["foto"]["tmp_name"], $path_completo);
				$query = "INSERT INTO `evento`(`Titolo`, `Descrizione`, `LinkFoto`, `Luogo`, `DataEvento`, `OraEvento`, `DataPubblicazione`, `IdPersona`) VALUES ('$titolo', '$descrizione', '$path_completo', '$luogo', '$dataEvento', '$oraEvento', now(), '$idpersona')";
				
				if ($mysqli->query($query) === TRUE) {
					echo "Evento inserito con successo";
				} else {
					echo "Errore nell'inserire l'evento: " . $mysqli->error;
				}
			}
			$mysqli->close(); ?>
			<br/>
			<a href='MenuPrincipale.php'>Torna al menu principale</a>
<?php	} else { ?>
			Nessuna sessione attiva
			<a href='MenuPrincipale.php'>Effettuare il log-in</a>
<?php	} ?>
	</body>
</html>