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

