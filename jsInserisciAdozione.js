function checkFieldAdozione() {

	var tipo = document.getElementById('tipoId').value;
	var cane = document.getElementById('caneId').value;
	var gatto = document.getElementById('gattoId').value;
	var persona = document.getElementById('personaId').value;
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
	
	if(persona=="") {
		flag=false;
	}
	
	if(flag==false) {
		alert("Compilare tutti i campi")
	}
	
	return flag;
}