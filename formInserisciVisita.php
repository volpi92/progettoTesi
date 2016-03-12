<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Sito Web Apas</title>
		<script src='jsInserisciVisita.js'></script>
	</head>
	
	<body>
<?php 	if(isset($_SESSION['privilegio'])) { 
			if($_SESSION['privilegio'] == "veterinario") { 
				require 'connectDB.php'; ?>
				<h1>Inserisci visita</h1>
				<form name="form" onsubmit="return checkFieldVisitaAnimale()" method="post" action="inserisciVisitaDataBase.php">
					<h2>Seleziona l'animale</h2>
					<select name="tipo" id="tipoId">
						<option value="cane">Cane</option>
						<option value="gatto">Gatto</option>
					</select>
					
					<h3>Seleziona cane</h3>
					
<?php				$query = "SELECT idanimalerifugio, nome FROM animalerifugio WHERE tipo = 'cane' AND dataadozione IS NULL AND datamorte IS NULL"; 
					$result = $mysqli->query($query);

					echo "<select name='cane' id='caneId'>";
					echo "<option value=''>Nessun cane selezionato</option>";
					if ($result->num_rows > 0) { 
						while($row = $result->fetch_assoc()) { 
							echo "<option value='" . $row["idanimalerifugio"]. "'>".$row["nome"]."</option>";
						}
					} 
					echo "</select>"; ?>					
					
					<br/><br/>
					oppure
					<br/>
					
					<h3>Seleziona gatto</h3>
<?php //riempi select con nome del gatto da adottare 
					$query = "SELECT idanimalerifugio, nome FROM animalerifugio WHERE tipo = 'gatto' AND dataadozione IS NULL AND datamorte IS NULL"; 
					$result = $mysqli->query($query);

					echo "<select name='gatto' id='gattoId'>";
					echo "<option value=''>Nessun gatto selezionato</option>";
					if ($result->num_rows > 0) { 
						while($row = $result->fetch_assoc()) { 
							echo "<option value='" . $row["idanimalerifugio"]. "'>".$row["nome"]."</option>";
						}
					} 
					echo "</select>"; ?>
					
					<h3>Dati della visita</h3>
					Descrizione <textarea name="descrizione" id="descrizioneId" rows="10" cols="60" ></textarea><br/>					
					<input type="submit" value="Submit">	
				</form>
				<br/>	
				<a href='MenuPrincipale.php'>Torna al menu principale</a><br/>
				<a href='logOut.php'>LogOut</a><br/>	
<?php			$mysqli->close(); 		
			} else { ?>
				Non hai i permessi necessari torna al <a href='menuPrincipale.php'>Menu principale</a><br/>
				<br/>
				Oppure <a href='logOut.php'>riloggati</a><br/>
<?php		}
		} else { ?>
			Nessuna sessione presente, <a href='index.php'>effettua il log-in</a><br/>
<?php 	} ?>
	</body>
</html>