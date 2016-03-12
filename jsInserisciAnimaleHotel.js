function checkFieldAnimaleHotel() {	

	var nome = document.getElementById('nomeId').value;
	var foto = document.getElementById('fotoId').value;
	var dataNascita = document.getElementById('dataNascitaId').value;
	var dataEntrata = document.getElementById('dataEntrataId').value;
	var dataUscita = document.getElementById('dataUscitaId').value;
	
	var flag = true;
	
	if(nome == null || nome == "") {
		flag=false;
	}
	if(foto == "") {
		flag=false;
	}
	if(!dataNascita || !dataEntrata || !dataUscita) {
		flag = false;
	}
	
	if(flag == false) {
		alert("Compilare tutti i campi");
	}
	
	return flag;
}