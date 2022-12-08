
function validacion(){
    var pass = document.getElementById('pass1');
    var form = document.getElementById('form_err');
    var num = document.getElementById('numero');
    var cara = document.getElementById('caracter');  
    var minus = document.getElementById('minuscula');
    var mayus = document.getElementById('mayuscula');
    var digi = document.getElementById('digitos');

    // NUMERO
    if (pass.value.match(/[0-9]/)) {
     
        num.style.color = 'green';
        
    }
    else {
        num.style.color = 'red';
    }

    if (pass.value.match(/[!\#\@\$\%\&\?\¿\¡\*\_\.\+\-\^\(/)]/)) {
     
        cara.style.color = 'green';
    }
    else {
        cara.style.color = 'red';
    }

    if (pass.value.match(/[a-z]/)) {
     
        minus.style.color = 'green';
    }
    else {
        minus.style.color = 'red';
    }

    if (pass.value.match(/[A-Z]/)) {
     
        mayus.style.color = 'green';
    }
    else {
        mayus.style.color = 'red';
    }

    if (pass.value.length<8) {
     
        digi.style.color = 'red';
    }
    else {
        digi.style.color = 'green';

    }
   
    
}







