function limpia(elemento) {
	elemento.value = "";
}

function mayus(e) {
	e.value = e.value.toUpperCase();
}

function minus(e) {
	e.value = e.value.toLowerCase();
}

function validaNumericos(event) {
	if (event.charCode >= 48 && event.charCode <= 57) {
		return true;
	}
	return false;
}

//                                    function validaNumericos(event){ 
//                                   onKeyPress= if (event.keyCode < 48 || event.keyCode > 57)event.returnValue = false;
//                             }
//                                    
//validad campo txt solo texto
function soloLetras(e) {
	var key = e.keyCode || e.which,
		tecla = String.fromCharCode(key).toLowerCase(),
		letras = " áéíóúabcdefghijklmnñopqrstuvwxyz",
		especiales = [8, 37, 39, 46],
		tecla_especial = false;

	for (var i in especiales) {
		if (key == especiales[i]) {
			tecla_especial = true;
			break;
		}
	}

	if (letras.indexOf(tecla) == -1 && !tecla_especial) {
		return false;
	}
}


///para validar campos en formulario deposito

// const selectElement = document.querySelector('.descripcionTipoDeposito');
// 				selectElement.addEventListener('change', (event) => {
// 						const resultado = document.querySelector('.resultado');																											
// 						resultado.textContent = `Te gusta el sabor ${event.target.value}`;																																																																
// 						resultado.value=`${event.target.value}`;
// 						if(resultado.value==="1"){
// 							resultado.value="N/A";
// 							resultado.disabled="true";
// 						}
// 						if(resultado.value==="2"){
// 							resultado.value="";
// 							resultado.removeAttribute('disabled');
// 						}
// 					});
																			





//                                    function validarNumeroDecimal(numero){
//                                    var patt = new RegExp("^[+-]?([0-9]*[.])?[0-9]+$");
//                                     if (patt.test(numero) == false)
//                                     alert("El valor " + numero + " no es un número");
//       



//function filterFloat(evt,input){
//    // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
//    var key = window.Event ? evt.which : evt.keyCode;    
//    var chark = String.fromCharCode(key);
//    var tempValue = input.value+chark;
//    if(key >= 48 && key <= 57){
//        if(filter(tempValue)=== false){
//            return false;
//        }else{       
//            return true;
//        }
//    }else{
//          if(key == 8 || key == 13 || key == 0) {     
//              return true;              
//          }else if(key == 46){
//                if(filter(tempValue)=== false){
//                    return false;
//                }else{       
//                    return true;
//                }
//          }else{
//              return false;
//          }
//    }
//}
//function filter(__val__){
//    var preg = /^([0-9]+\.?[0-9]{0,2})$/; 
//    if(preg.test(__val__) === true){
//        return true;
//    }else{
//       return false;
//    }
//    
//}

//VALIDAR DESDE UN SELECT LIMITADO 

// <!-- <script>
// class="descripcionTipoDeposito"
// class="resultado" 
// const selectElement = document.querySelector('.descripcionTipoDeposito');
// 				selectElement.addEventListener('change', (event) => {
// 						const resultado = document.querySelector('.resultado');																											
// 						resultado.textContent = `Te gusta el sabor ${event.target.value}`;																																																																
// 						resultado.value=`${event.target.value}`;
// 						if(resultado.value==="1"){
// 							resultado.value="N/A";
// 							//resultado.disabled="true";
// 							resultado.attr("readonly", true); 
// 						}
// 						if(resultado.value==="2"){
// 							resultado.value="";
// 							//resultado.removeAttribute('disabled');
// 							resultado.attr("readonly", false);
// 						}
// 					});
// </script> -->

//para validar AL SELECCIONAR UN DATO DE UN COMBOBOX
$("#id_tipdep").change(function() {

    if ($('select option').filter(':selected').val() == 2) {
        $("#tipodep").attr("readonly", false);
		$("#tipodep").attr("value",''); 					
		$("#tipodepTit").attr("value",'TITULAR'); 					
		$("#tipodepCed").attr("value",'N/A'); 
    } else {
        $("#tipodep").attr("readonly", true);		
		$("#tipodep").attr("value",'N/A');			
		$("#tipodepTit").attr("value",'TITULAR'); 					
		$("#tipodepCed").attr("value",'N/A'); 
    }

	// if ($('select option').filter(':selected').val() == 0) {
	// 	$("#tipodepTit").attr("readonly", true);
	// 	$("#tipodepCed").attr("readonly", true);		
	// }else{
	// 	$("#tipodepTit").attr("readonly", false);
	// 	$("#tipodepCed").attr("readonly", false);	
	// }


});
