<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Sito Web Apas</title>
		<script src='jsInserisciNotizia.js'></script>
	</head>
	
	<body>
<?php 	if(isset($_SESSION['privilegio'])) { 
			if($_SESSION['privilegio'] == "addetto amministratore") { ?>
				<h1>Inserisci notizia</h1>
				<form name="form" onsubmit="return checkFieldNotizia()" enctype="multipart/form-data" method="post" action="inserisciNotiziaDataBase.php">
					Titolo: <input type="text" name ="titolo" id="titoloId"><br/>
					Descrizione: <textarea name="descrizione" id="descrizioneId" rows="10" cols="80" ></textarea><br/>
					Foto: <input type="file" name="foto" id="fotoId" accept="image/gif, image/jpeg, image/png"> <br/>
					<input type="submit" value="Submit">	
				</form>
				<a href='MenuPrincipale.php'>Torna al menu principale</a><br/>
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