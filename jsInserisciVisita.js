function checkFieldVisitaAnimale() {
	
	var tipo = document.getElementById('tipoId').value;
	var gatto = document.getElementById('gattoId').value;
	var cane = document.getElementById('caneId').value;
	var descrizione = document.getElementById('descrizioneId').value;
	
	var flag=true;
	
	if(tipo=="cane") {
		if(cane=="") {
			flag=false;
		}
	} else if(tipo=="gatto") {
		if(gatto=="") {
			flag=false;
		}		
	}
	
	if(descrizione==null || descrizione== "") {
		flag=false;
	}
	
	if(flag==false) {
		alert("Compilare correttamente i campi")
	}
	
	return flag;
}