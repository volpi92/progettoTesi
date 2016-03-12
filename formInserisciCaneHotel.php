<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Sito Web Apas</title>
		<script src='jsInserisciAnimaleHotel.js'></script>
	</head>
	
	<body>
<?php 	if(isset($_SESSION['privilegio'])) { 
			if($_SESSION['privilegio'] == "addetto" || $_SESSION['privilegio'] == "addetto amministratore") { 
				require 'connectDB.php';?>
				<h1>Inserisci un cane nell'hotel</h1>
				<form name="form" onsubmit="return checkFieldAnimaleHotel()" enctype="multipart/form-data" method="post" action="inserisciCaneHotelDataBase.php">
					<h2>Dati del cane da inserire nell'hotel</h2>
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
					Foto: <input type="file" name="foto" id="fotoId" accept="image/gif, image/jpeg, image/png"> <br/>
					Data di nascita: <input type="date" name="dataNascita" id="dataNascitaId"><br/>
					Data entrata: <input type="date" name="dataEntrata" id="dataEntrataId"><br/>
					Data uscita: <input type="date" name="dataUscita" id="dataUscitaId"><br/>
					<h2>Seleziona il padrone dell'animale</h2>
					
					
					
<?php //query le persone nel database e inseriscile in una select, nome cognome e dati indirizzo 
					$query = "SELECT idpersona, nome, cognome, stato, regione, provincia, castello, indirizzo FROM persona"; 
					$result = $mysqli->query($query);

					echo "<select name='idPersonaPadrone'>";
					echo "<option value=''>Nessuna persona selezionata</option>";
					if ($result->num_rows > 0) { 
						while($row = $result->fetch_assoc()) { 
							if($row["stato"] == "Italia") {
								echo "<option value='" . $row["idpersona"]. "'>".$row["cognome"]." ".$row["nome"]." - ".$row["stato"]." ".$row["regione"]." ".$row["provincia"]." ".$row["indirizzo"]."</option>";
							}
							if($row["stato"] == "San Marino") {
								echo "<option value='" . $row["idpersona"]. "'>".$row["cognome"]." ".$row["nome"]." - ".$row["stato"]." ".$row["castello"]." ".$row["indirizzo"]."</option>";
							}
						}
					}
					echo "</select>"; ?>
					<br/><br/>
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