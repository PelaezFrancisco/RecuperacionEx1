function validacion()
{
    var ced=false;
    var nom=false;
    var ape=false;
    var dir=false;
    var tel=false;

    for(var i = 0; i < document.forms[0].elements.length; i++){
        var elemento = document.forms[0].elements[i];
        //CamposVacios
        if(elemento.value == '' && (elemento.type == 'text')){    
            if(elemento.id == 'cedula'){  
                document.getElementById('mensaje1').innerHTML = 'Campo Cedula esta vacio'; 
                elemento.style.border = '2px red solid';
                return false;
            }
            if(elemento.id == 'nombres'){ 
                document.getElementById('mensaje2').innerHTML = 'Campo Nombres esta vacio'; 
                elemento.style.border = '2px red solid';
                return false;
            }
            if(elemento.id == 'direccion'){ 
                document.getElementById('mensaje4').innerHTML = 'Campo Direccion esta vacio'; 
                elemento.style.border = '2px red solid';
                return false;
            }
            if(elemento.id == 'telefono'){ 
                document.getElementById('mensaje5').innerHTML = 'Campo Telefono esta vacio'; 
                elemento.style.border = '2px red solid';
                return false;
            }
            return false;
            //CamposCompletos
        }else{ 
            if(elemento.id == 'cedula'){ 
                ced=validarCedula(elemento);
            }
            if(elemento.id == 'nombres'){  
                nom=validarLetras(elemento);
            }
            if(elemento.id == 'direccion'){  
                dir=true;
            }
            if(elemento.id == 'telefono'){ 
                tel=validarTelefono(elemento);
            }
            
        }
        if (ced==true&&nom==true&&dir==true&&tel==true) {
            return true;
        }
    }
}
//Cedula
// 48-57 rango de numeros 
function validarCedula(elemento)
{  
    if(elemento.value.length > 0 && elemento.value.length < 11){
        var codigA = elemento.value.charCodeAt(elemento.value.length-1)
        if((codigA >= 48 && codigA <= 57)){
        }else {
            elemento.value = elemento.value.substring(0, elemento.value.length-1)
        }
        }else{
            elemento.value = elemento.value.substring(0, elemento.value.length-1)
    }
    if (elemento.value.length == 10) {
        if((elemento.value.substring(0,2)>=1)||(elemento.value.substring(0,2)<=24)){
            //Suma impares
            var pares = 0;
            var numero =0;
            for (var i = 0; i< 4; i++) {
                numero = elemento.value.substring(((i*2)+1),(i*2)+2);
                numero = (numero * 1);
                if( numero > 9 ){ var numero = (numero - 9); }
                pares = pares + numero; 
            }
            var imp=0;
            numero = 0
            for (var i = 0; i< 5; i++) {
                var numero = elemento.value.substring((i*2),((i*2)+1));
                var numero = (numero * 2);
                if( numero > 9 ){ var numero = (numero - 9); }
                imp = imp + numero; 
            }
            var sum = pares + imp;
            aux = (''+sum)[0];
            var di = aux.substring(0,1);
            di++;
            di = di *10;
            numero = (di - sum);
            if (numero == (elemento.value.substring(9,10))) {
                document.getElementById('mensaje1').innerHTML='' ; 
                elemento.style.border = '2px greenyellow solid';
                return true;
            }else{
                document.getElementById('mensaje1').innerHTML = 'Cedula es Incorrecta'; 
                elemento.style.border = '2px red solid';
                return false;
            }
        }
    }else{
        document.getElementById('mensaje1').innerHTML = 'Cedula es Incorrecta'; 
                elemento.style.border = '2px red solid';
                return false;
    }
}
//Texto 
// 65-90 Mayusculas - 97-122 Minusculas
function validarLetras(elemento){
    if(elemento.value.length > 0){
        var codigA = elemento.value.charCodeAt(elemento.value.length-1)
        if((codigA >= 97 && codigA <= 122)||(codigA >=65 && codigA <= 90)||(codigA == 32)){ 
            if ((elemento.id=='nombres')||(elemento.id=='apellidos')) {
                //console.log("Entra para irse");
                return validarDosOMasCampos(elemento);
            }
        }else {
            console.log("Es una letra invalida")
            elemento.value = elemento.value.substring(0, elemento.value.length-1)
            return false
            }
        }
}
//  Nombre - Apellido
// 32 espacio
function validarDosOMasCampos(elemento)
{    
    if(elemento.value.length > 0){
        for (var i = 0; i < elemento.value.length; i++) {
            if (((elemento.value.charCodeAt(i)==32))) {
                if ((elemento.value.charCodeAt(i-1)!=32)&&(elemento.value.charCodeAt(i+1)>=65)&&(elemento.value.charCodeAt(i+1)<=122)){
                    if (elemento.id=='nombres') {
                        document.getElementById('mensaje2').innerHTML =''; 
                    }else{
                        
                        document.getElementById('mensaje3').innerHTML="" ;
                    }
                    elemento.style.border = '2px greenyellow solid';
                    return true;
                }else{
                    if (elemento.id=='nombres') {
                        document.getElementById('mensaje2').innerHTML = 'Nombres Incorrecto'; 
                    }else{
                        document.getElementById('mensaje3').innerHTML = 'Apellidos Incorrecto';
                    }
                    elemento.style.border = '2px red solid';
                    return false;
                }
            }else{
                if (elemento.id=='nombres') {
                    document.getElementById('mensaje2').innerHTML = 'Nombres Incorrecto';
                    console.log("Es nombre"); 
                }else{
                    document.getElementById('mensaje3').innerHTML = 'Apellidos Incorrecto';
                }
                elemento.style.border = '2px red solid';
            }
            
        }
    }
}
// Telefono

function validarTelefono(elemento)
{
    if(elemento.value.length > 0 && elemento.value.length < 11){
        var miAscii = elemento.value.charCodeAt(elemento.value.length-1)
        //console.log(miAscii)
        if((miAscii >= 48 && miAscii <= 57)){ //Sean numeros
            //console.log("Es un numero valid")
            if (elemento.value.length<=10) {
                document.getElementById('mensaje5').innerHTML=''; 
                elemento.style.border = '2px greenyellow solid';
                return true;
            }else {
                //console.log("Es un numero invalida")
                document.getElementById('mensaje5').innerHTML = 'Telefono Incorrecto'; 
                elemento.style.border = '2px red solid';
                return false;
            }
        }else{
            elemento.value = elemento.value.substring(0, elemento.value.length-1)
            return false;
        }
    }else{
        elemento.value = elemento.value.substring(0, elemento.value.length-1)
        return false;
    }
}
function validarExistencia(elemento) {
    if (elemento.value.length > 0) {
        elemento.style.border = '2px greenyellow solid';
    }
}