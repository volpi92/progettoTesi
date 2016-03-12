<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Sito Web Apas</title>
		<script src='jsInserisciAnimaleRifugio.js'></script>
	</head>
	
	<body>
<?php 	if(isset($_SESSION['privilegio'])) { 
			if($_SESSION['privilegio'] == "addetto" || $_SESSION['privilegio'] == "addetto amministratore") { ?>
				<h1>Inserisci un cane nell'hotel</h1>
				<form name="form" onsubmit="return checkFieldAnimaleRifugio()" enctype="multipart/form-data" method="post" action="inserisciAnimaleRifugioDataBase.php">
					<h2>Dati dell'animale da inserire nel rifugio</h2>
					Nome: <input type="text" name ="nome" id="nomeId"><br/>
					Sesso: 
					<input type="radio" name="sesso" value="maschio" checked>Maschio
					<input type="radio" name="sesso" value="femmina">Femmina	
					<br/>
					Tipo: 
					<input type="radio" name="tipo" value="cane" checked>Cane
					<input type="radio" name="tipo" value="gatto">Gatto
					<br/>
					Razza: <input type="text" name ="razza" id="razzaId"><br/>
					Descrizione <textarea name="descrizione" id="descrizioneId" rows="10" cols="60" >Questa è la descrizione di </textarea><br/>
					Foto: <input type="file" name="foto" id="fotoId" accept="image/gif, image/jpeg, image/png"> <br/>
					Data di nascita: <input type="date" name="dataNascita" id="dataNascitaId"><br/>
					Storia: <textarea name="storia" id="storiaId" rows="10" cols="60" >Questa è la storia di </textarea><br/>
					Data entrata: <input type="date" name="dataEntrata" id="dataEntrataId"><br/>
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