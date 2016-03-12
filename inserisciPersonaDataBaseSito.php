<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Sito Web Apas</title>
	</head>
	
	<body>
<?php	
		if($_SESSION['privilegio'] == "addetto" || $_SESSION['privilegio'] == "addetto amministratore") {
			require 'connectDB.php';
			//prendi dati dal POST
			$nome =  $_POST["nome"];
			$cognome =  $_POST["cognome"];
			$sesso = $_POST["sesso"];
			$dataNascita =  $_POST["dataNascita"];
			$email =  $_POST["email"];
			$telefono =  $_POST["telefono"];
			$stato =  $_POST["stato"];
			if($stato == "San Marino") {
				$castello =  $_POST["castello"];
			} else {
				$regione =  $_POST["regione"];
				$provincia =  $_POST["provincia"];
			}
			$indirizzo =  $_POST["indirizzo"];
			$username =  $_POST["username"];
			$password =  $_POST["password"];
			
			//controlla se username esiste già
			$query = "SELECT Nome FROM Persona WHERE userName= '$username'";
			$result = $mysqli->query($query);
			
			
			//
			//
			//
			//EFFETTUARE I CONTROLLI SUI CAMPI INSERITI...
			//
			//
			//
			
			if ($result->num_rows > 0) { //username esiste già, inserirne un'altro ?>
				UserName già presente nel database, <a href='#' onclick='history.back();'>reinserisci un userName diverso</a>
				<br/>
<?php		} else {
				if($stato == "Italia") {
					$query = "INSERT INTO `Persona`(`Nome`, `Cognome`, `Sesso`, `DataNascita`, `Email`, `Telefono`, `Stato`, `Regione`, `Provincia`, `Indirizzo`, `Privilegio`, `UserName`, `Password`) VALUES ('$nome', '$cognome', '$sesso', '$dataNascita', '$email', '$telefono', '$stato', '$regione', '$provincia', '$indirizzo', 'utente generico', '$username', '$password')";
				} else {
					$query = "INSERT INTO `Persona`(`Nome`, `Cognome`, `Sesso`, `DataNascita`, `Email`, `Telefono`, `Stato`, `Castello`, `Indirizzo`, `Privilegio`, `UserName`, `Password`) VALUES ('$nome', '$cognome', '$sesso', '$dataNascita', '$email', '$telefono', '$stato', '$castello', '$indirizzo', 'utente generico', '$username', '$password')";
				}
				if ($mysqli->query($query) === TRUE) { ?>
					Persona inserita nel database correttamente
					<br/>
<?php   	    } else { 
					echo "Error: " . $query . "<br>" . $mysqli->error;
				} ?>
				<br/>
				<a href='MenuPrincipale.php'>Torna al menu principale</a>
<?php		}		
			$mysqli->close(); ?>
<?php	} else { ?>
			Nessuna sessione attiva
			<a href='index.php'>Effettuare il log-in</a>
<?php 	} ?>
	</body>
</html>