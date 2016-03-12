<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Risultato inserisci animale nell'hotel</title>
	</head>
	
	<body>
<?php	
		if($_SESSION['privilegio'] == "addetto" || $_SESSION['privilegio'] == "addetto amministratore") {
			require 'connectDB.php';
			
			$path = "foto/animali hotel/";
			$idPersonaPadrone = $_POST["idPersonaPadrone"];
			$nome = $_POST['nome'];
			$sesso = $_POST['sesso'];
			$tipo = $_POST['tipo'];
			$razza = $_POST['razza'];
			$dataNascita = $_POST['dataNascita'];
			$dataEntrata = $_POST['dataEntrata'];
			$dataUscita = $_POST['dataUscita'];
			
			if($_FILES["foto"]["error"] > 0) {
				echo "No file uploaded, or invalid file (immagine). Error code: ".$_FILES["foto"]["error"]."<br/>";
			} else {
				$path_completo = $path.$_FILES["foto"]["name"];
				move_uploaded_file($_FILES["foto"]["tmp_name"], $path_completo);
				$query = "INSERT INTO `animalealloggiato`(`Nome`, `Sesso`, `Tipo`, `Razza`, `LinkFoto`, `DataNascita`, `DataEntrata`, `DataUscita`, `IdPersona`) VALUES ('$nome', '$sesso', '$tipo', '$razza', '$path_completo', '$dataNascita', '$dataEntrata', '$dataUscita', '$idPersonaPadrone')";
				if ($mysqli->query($query) === TRUE) {
					echo "Animale alloggiato inserito con successo";
				} else {
					echo "Errore nell'inserire l'animale alloggiato: " . $mysqli->error;
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