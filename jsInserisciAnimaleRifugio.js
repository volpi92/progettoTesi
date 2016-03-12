function checkFieldAnimaleRifugio() {

	var nome = document.getElementById('nomeId').value;
	var descrizione = document.getElementById('descrizioneId').value;
	var foto = document.getElementById('fotoId').value;
	var dataNascita = document.getElementById('dataNascitaId').value;
	var storia = document.getElementById('storiaId').value;
	var dataEntrata = document.getElementById('dataEntrataId').value;

	var flag=true;
	
	if(nome == "" || nome == null) {
		flag=false;
	} else if(descrizione == "" || descrizione == null) {
		flag=false;
	} else if(foto == "") {
		flag=false;
	} else if(!dataNascita) {
		flag=false;
	} else if(storia == "" || storia == null) {
		flag=false; 
	} else if(!dataEntrata) {
		flag=false;
	}
	
	if(flag==false) {
		alert("Compilare correttamente tutti i campi");
	}

	return flag;
}