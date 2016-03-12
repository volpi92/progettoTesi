<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Risultato inserisci animale nel rifugio</title>
	</head>
	
	<body>
<?php	
		if($_SESSION['privilegio'] == "addetto" || $_SESSION['privilegio'] == "addetto amministratore") {
			require 'connectDB.php';
			$idpersona = $_SESSION["idpersona"];
			
			$path = "foto/animali rifugio/";
			$nome = $_POST['nome'];
			$sesso = $_POST['sesso'];
			$tipo = $_POST['tipo'];
			$razza = $_POST['razza'];
			$descrizione = $_POST['descrizione'];
			$dataNascita = $_POST['dataNascita'];
			$storia = $_POST['storia'];
			$dataEntrata = $_POST['dataEntrata'];
			
			
			if($_FILES["foto"]["error"] > 0) {
				echo "No file uploaded, or invalid file (immagine). Error code: ".$_FILES["foto"]["error"]."<br/>";
			} else {
				$path_completo = $path.$_FILES["foto"]["name"];
				move_uploaded_file($_FILES["foto"]["tmp_name"], $path_completo);
				$query = "INSERT INTO `animalerifugio`(`Nome`, `Sesso`, `Tipo`, `Razza`, `Descrizione`, `LinkFoto`, `DataNascita`, `Storia`, `DataEntrata`) VALUES ('$nome', '$sesso', '$tipo', '$razza', '$descrizione', '$path_completo', '$dataNascita', '$storia', '$dataEntrata')";
				echo $query;
				if ($mysqli->query($query) === TRUE) {
					echo "Animale del rifugio inserito con successo";
				} else {
					echo "Errore nell'inserire l'animale: " . $mysqli->error;
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