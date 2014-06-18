function numeroTelefono(evento){
    letraASCII = evento.charCode;
  
    if (letraASCII < 48 || letraASCII > 57){
		return false;
    }   
}

function validarDNI(dni) {
	var numero, let, letra, expresion_regular_dni;
	var txtdni = document.getElementById("dni");;
 
	expresion_regular_dni = /^\d{8}[a-zA-Z]$/;
 
	if(expresion_regular_dni.test (dni) == true){
		numero = dni.substr(0,dni.length-1);
		let = dni.substr(dni.length-1,1);
		numero = numero % 23;
		letra='TRWAGMYFPDXBNJZSQVHLCKET';
		letra=letra.substring(numero,numero+1);
		if (letra!=let) {
			alert('Dni erroneo, la letra del NIF no se corresponde');
		}
	}
	else{
		alert('Dni erroneo, formato no valido');
		//txtdni.style.borderColor="red";
	}
}

function subirbajarCantidad(id,estado){
	if(estado == "+"){
		var cantidad = $("#cantidad_"+id).val();
		cantidad = parseInt(cantidad) + 1;
		if(cantidad <= 99){
			$("#cantidad_"+id).val(cantidad);
		}
	}else{
		var cantidad = $("#cantidad_"+id).val();
		cantidad = parseInt(cantidad) - 1;
		if(cantidad >= 0){
			$("#cantidad_"+id).val(cantidad);
		}
	}
}