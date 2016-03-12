function checkFieldEvento() {

	var titolo = document.getElementById('titoloId').value;
	var descrizione = document.getElementById('descrizioneId').value;
	var foto = document.getElementById('fotoId').value;
	var luogo = document.getElementById('luogoId').value;
	var data = document.getElementById('dataId').value;
	var ora = document.getElementById('oraId').value;

	var flag=true;
	
	if(titolo == null || titolo == "") {
		flag=false;
	} else if(descrizione == null || descrizione == "") {
		flag=false;
	} else if(foto == "") {
		flag=false;
	} else if(luogo == null || luogo == "") {
		flag=false;
	} else if(!data) {
		flag=false;
	} else if(!ora) {
		flag=false;
	}
	
	if(flag==false) {
		alert("compilare tutti i campi");
	}

	return flag;
}