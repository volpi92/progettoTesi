function checkFieldNotizia() {

	var titolo = document.getElementById('titoloId').value;
	var descrizione = document.getElementById('descrizioneId').value;
	var foto = document.getElementById('fotoId').value;

	var flag=true;
	
	if(titolo == null || titolo == "") {
		flag=false;
	} else if(descrizione == null || descrizione == "") {
		flag=false;
	} else if(foto == "") {
		flag=false;
	}
	
	if(flag==false) {
		alert("Compilare tutti i campi");
	}

	return flag;

}