function _id(name){
    return document.getElementById(name);
}

function _class(name){
    return document.getElementsByClassName(name);
}

//Funcion para ver la contraseña
_class("password-toggle")[0].addEventListener("click", function(){
    _class("password-toggle")[0].classList.toggle("active");
    if(_id("password-field").getAttribute("type") == "password"){
        _id("password-field").setAttribute("type", "text");
    } else {
        _id("password-field").setAttribute("type", "password");
    }
});

//Funciones para hacer aparecer y desaparecer los requisitos
_id("password-field").addEventListener("focus", function(){
    _class("password-policies")[0].classList.add("active");
});

_id("password-field").addEventListener("blur", function(){
    _class("password-policies")[0].classList.remove("active");
});

//Funcion para validar la contraseña
_id("password-field").addEventListener("keyup", function(){
    let password = _id("password-field").value;

    //Validar que existan mayúsculas
    if(/[A-Z]/.test(password)){
        _class("policy-uppercase")[0].classList.add("active");
    } else {
        _class("policy-uppercase")[0].classList.remove("active");
    }

    //Validar que existan numeros
    if(/[0-9]/.test(password)){
        _class("policy-number")[0].classList.add("active");
    } else {
        _class("policy-number")[0].classList.remove("active");
    }

    //Validar que existan carácteres especiales
    if(/[^A-Za-z0-9]/.test(password)){
        _class("policy-special")[0].classList.add("active");
    } else {
        _class("policy-special")[0].classList.remove("active");
    }

    //Validar que existan al menos 8 carácteres
    if(password.length > 7){
        _class("policy-length")[0].classList.add("active");
    } else {
        _class("policy-length")[0].classList.remove("active");
    }


});
