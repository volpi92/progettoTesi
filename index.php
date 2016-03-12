<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Sito Web Apas</title>
	</head>
	
	<body>
<?php 	if(!isset($_SESSION['privilegio'])) { //utente non loggato   ?>
			<h1>Log-In</h1>
			<h3>Inserire le proprie credenziali per poter effettuare operazioni</h3>
			<form name="form" action="MenuPrincipale.php" method="post"/>
				UserName: <input type="text" id="usernameId" name="username"/>
				<br/>
				Password: <input type="password" id="passwordId" name="password"/>
				<br/>
				<input type="submit" value="Log-in"/>
			</form>
<?php	} else { //utente già loggato
			echo "benvenuto: ".$_SESSION['privilegio']." ".$_SESSION['cognome']." ".$_SESSION['nome']; ?>
			<br/>
			<a href='menuPrincipale.php'>Vai al menu principale</a><br/>
			<a href='logOut.php'>Log out</a><br/>
<?PHP	} ?>		
	
	</body>
</html>