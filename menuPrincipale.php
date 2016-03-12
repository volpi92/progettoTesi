<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Sito Web Apas</title>
	</head>
	
	<body>
<?php 	if(!isset($_SESSION['privilegio'])) { //utente non loggato, controllo se ci sono dati nel POST, se si controllo nel database se sono corretti per il sito add, addAmm, Vet
			//controllo se sono venuto quì dal log-in
			if(isset($_POST['username']) && isset($_POST['password'])) {
				//controllo dati nel database
				require 'connectDB.php';
				$username = $_POST["username"];
				$password = $_POST["password"];
				$query = "SELECT idPersona, Nome, Cognome, Privilegio FROM Persona WHERE userName= '".$username."' AND password= '".$password."' AND (privilegio = 'addetto' OR privilegio = 'addetto amministratore' OR privilegio = 'veterinario')";
				$result = $mysqli->query($query);
				if ($result->num_rows > 0) { //è presente l'utente con appropriati privilegi
					//salva i dati nella sessione
					$row = $result->fetch_array();
					$privilegio = $row['Privilegio'];
					$idpersona = $row['idPersona'];
					$nome = $row['Nome'];
					$cognome = $row['Cognome'];
					
					echo "Benvenuto ".$privilegio.": ".$cognome." ".$nome.". Ecco le operazioni che puoi effettuare<br/>";
					
					$_SESSION['idpersona'] = $idpersona;
					$_SESSION['nome'] = $nome;
					$_SESSION['cognome'] = $cognome; 
					$_SESSION['privilegio'] = $privilegio;
					
					if($privilegio=="veterinario") { ?>						
						<a href='formInserisciVisita.php'>Inserisci una visita</a><br/>
						<a href='formInserisciTerapia.php'>Inserisci una terapia</a><br/>
<?php				}
					if($privilegio=="addetto amministratore") { ?>
						<a href='formInserisciAdozione.php'>Inserisci adozione</a><br/>
						<a href='formInserisciPersona.php'>Inserisci persona</a><br/>
						<a href='formInserisciAnimaleRifugio.php'>Inserisci un animale nella struttura</a><br/>
						<a href='formInserisciCaneHotel.php'>Inserisci un cane nell'hotel</a><br/>
						<a href='formInserisciNotizia.php'>Inserisci una notizia</a><br/>
						<a href='formInserisciEvento.php'>Inserisci un evento</a><br/>
<?php				}
					if($privilegio=="addetto") { ?>
						<a href='formInserisciAdozione.php'>Inserisci adozione</a><br/>
						<a href='formInserisciPersona.php'>Inserisci persona</a><br/>
						<a href='formInserisciAnimaleRifugio.php'>Inserisci un animale nella struttura</a><br/>
						<a href='formInserisciCaneHotel.php'>Inserisci un cane nell'hotel</a><br/>
<?php				} ?>				
					<a href='logOut.php'>LogOut</a><br/>  
<?php			} else { ?>
					Dati inseriti scorretti
					<br/>
					<a href='index.php'>Rieffettua il log-in</a><br/>
<?php			}
			} else { //non è presente l'utente con username e password inseriti con appropriati privilegi ?>
				Devi effettuare il log-in
				<br/>
				<a href='index.php'>Effettua il log-in</a><br/>
<?php		}
		} else { //c'è una sessione attiva, riempire con le operazioni possibili
			echo "Benvenuto ".$_SESSION['privilegio'].": ".$_SESSION['cognome']." ".$_SESSION['nome'].". Ecco le operazioni che puoi effettuare<br/>";
			if($_SESSION['privilegio']=="veterinario") { ?>						
				<a href='formInserisciVisita.php'>Inserisci una visita</a><br/>
				<a href='formInserisciTerapia.php'>Inserisci una terapia</a><br/>
<?php				}
			if($_SESSION['privilegio']=="addetto amministratore") { ?>
				<a href='formInserisciAdozione.php'>Inserisci adozione</a><br/>
				<a href='formInserisciPersona.php'>Inserisci persona</a><br/>
				<a href='formInserisciAnimaleRifugio.php'>Inserisci un animale nella struttura</a><br/>
				<a href='formInserisciCaneHotel.php'>Inserisci un cane nell'hotel</a><br/>
				<a href='formInserisciNotizia.php'>Inserisci una notizia</a><br/>
				<a href='formInserisciEvento.php'>Inserisci un evento</a><br/>
<?php				}
			if($_SESSION['privilegio']=="addetto") { ?>
				<a href='formInserisciAdozione.php'>Inserisci adozione</a><br/>
				<a href='formInserisciPersona.php'>Inserisci persona</a><br/>
				<a href='formInserisciAnimaleRifugio.php'>Inserisci un animale nella struttura</a><br/>
				<a href='formInserisciCaneHotel.php'>Inserisci un cane nell'hotel</a><br/>
<?php		} ?>				
			<a href='logOut.php'>LogOut</a><br/>  
<?php	} ?>	
	</body>
</html>
		