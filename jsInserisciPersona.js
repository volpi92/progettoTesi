function checkFieldPersona() {
/*ciaooo   */
	var nome = document.getElementById('nomeId').value;
	var cognome = document.getElementById('cognomeId').value;
	var dataNascita = document.getElementById('dataNascitaId').value;
	var email = document.getElementById('emailId').value;
	var telefono = document.getElementById('telefonoId').value;
	var stato;
	if(document.getElementById('rdbItaliaId').checked) {
		stato = 'Italia';
	} else {
		stato = 'San Marino';
	}
	var regione = document.getElementById('regioneId').value;
	var provincia = document.getElementById('provinciaId').value;
	var castello = document.getElementById('castelloId').value;
	var indirizzo = document.getElementById('indirizzoId').value;
  	var username = document.getElementById('usernameId').value;
  	var password = document.getElementById('passwordId').value;
  	var ripetiPassword = document.getElementById('ripetiPasswordId').value;
	
	var flag=true;
	
	
	if(!dataNascita) {
		flag=false;
	} else if(nome == null || nome == "") {
		flag=false;
	} else if(cognome == null || cognome == "") {
		flag=false;
	} else if(telefono == null || telefono == "") {
		flag=false;
	} else if(email == null || email == "") {
		flag=false;
	} else if(indirizzo == null || indirizzo == "") {
		flag = false;
	} else if(username == null || username == "") {
		flag = false;		
    } else if(password == null || password =="") {
		flag = false;
    } else if(ripetiPassword == null || ripetiPassword =="") {
		flag = false;
    } else if(password != ripetiPassword) {
    	alert("password e ripetiPassword non coincidono, controllare");
		flag = false;
    }
	
	if(stato == "Italia") {  //controllare che i campi che non servano siano vuoti per sicurezza	
		if(regione == null || regione == "") {
			flag = false;
		}
		if(provincia == null || provincia == "") {
			flag = false;
		}
	}
	if(stato == "San Marino") {	
		if(castello == null || castello == "") {
			flag = false;
		}		
	}
	
	if(flag==false) {
		alert("Compilare correttamente tutti i dati");
	}
	
	return flag;
}