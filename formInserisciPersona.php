<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Sito Web Apas</title>
		<script src='jsInserisciPersona.js'></script>
	</head>
	
	<body>
<?php 	if(isset($_SESSION['privilegio'])) { 
			echo $_SESSION['privilegio'];
			if($_SESSION['privilegio'] == "addetto" || $_SESSION['privilegio'] == "addetto amministratore") { ?>
				<h1>Inserisci persona</h1>	
				<form name="form" onsubmit="return checkFieldPersona()" method="post" action="inserisciPersonaDataBaseSito.php">
					<h2>Dati anagrafici</h2>				
					Nome: <input type="text" name="nome" id="nomeId"> <br/>
					Cognome: <input type="text" name="cognome" id="cognomeId" > <br/>
					Sesso: 
					<input type="radio" name="sesso" value="maschio" checked>Maschio
					<input type="radio" name="sesso" value="femmina">Femmina	
					<br/>
					Data di nascita: <input type="date" name="dataNascita" id="dataNascitaId"> <br/>
					Email: <input type="email" name="email" id="emailId"> <br/>
					Telefono: <input type="text" name="telefono" id="telefonoId"> <br/><br/>				
					<h2>Residenza</h2>				
					Stato:  <input type="radio" id="rdbItaliaId" name="stato" value="Italia" checked="checked">Italia
							<input type="radio" id="rdbSanMarinoId" name="stato" value="San Marino">San Marino						
					<br>				
					Regione: <input type="text" name="regione" id="regioneId"> <br/>
					Provincia: <input type="text" name="provincia" id="provinciaId"> <br/>
					Castello <input type="text" name="castello" id="castelloId"> <br/>
					Indirizzo <input type="text" name="indirizzo" id="indirizzoId"> <br/>
					UserName <input type="text" name="username" id="usernameId"> <br/>
					Password <input type="text" name="password" id="passwordId"> <br/>
					Ripeti password <input type="text" name="ripetiPassword" id="ripetiPasswordId"> <br/>
					<input type="submit" value="Submit">		
				</form>			
				<a href='menuPrincipale.php'>Menu principale</a><br/>
				<a href='logOut.php'>LogOut</a><br/>				
<?php		} else { ?>
				Non hai i permessi necessari torna al <a href='menuPrincipale.php'>Menu principale</a><br/>
				<br/>
				Oppure <a href='logOut.php'>riloggati</a><br/>
<?php		}
		} else { ?>
			Nessuna sessione presente, <a href='index.php'>effettua il log-in</a><br/>
<?php 	} ?>
	</body>
</html>