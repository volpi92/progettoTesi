<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Risultato inserisci notizia</title>
	</head>
	
	<body>
<?php	
		if($_SESSION['privilegio'] == "addetto amministratore") {
			require 'connectDB.php';
			$idpersona = $_SESSION["idpersona"];
			
			$path = "foto/notizie/";
			$titolo = $_POST['titolo'];
			$descrizione = $_POST['descrizione'];
			$idpersona = $_SESSION['idpersona'];
			
			if($_FILES["foto"]["error"] > 0) {
				echo "No file uploaded, or invalid file (immagine). Error code: ".$_FILES["foto"]["error"]."<br/>";
			} else {
				$path_completo = $path.$_FILES["foto"]["name"];
				move_uploaded_file($_FILES["foto"]["tmp_name"], $path_completo);
				$query = "INSERT INTO `notizia`(`Titolo`, `Descrizione`, `LinkFoto`, `DataPubblicazione`, `IdPersona`) VALUES ('$titolo', '$descrizione', '$path_completo', now(), '$idpersona')";
				if ($mysqli->query($query) === TRUE) {
					echo "Notizia inserita con successo";
				} else {
					echo "Errore nell'inserire la notizia: " . $mysqli->error;
				}
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