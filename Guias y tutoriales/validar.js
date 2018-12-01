function validar(formulario, configuracion = 0){

    for(var i = 0; i < formulario.elements.length; i++){
        if(formulario.elements[i].className.indexOf("correo-m") != -1){
            if(formulario.elements[i].value != ""){
                if(!/^[-\w.%+]{1,64}@(?:[a-z0-9-]{1,63}\.){1,125}[a-z]{2,63}$/.test(formulario.elements[i].value)){
                    if(configuracion == 0){
                        alert("Error: Correo no valido");
                    }else if(configuracion == 1){
                        swal("Correo no valido", "error");
                    }
                    formulario.elements[i].focus();
                    return false;
                    exit(1);
                }
            }else{
                if(configuracion == 0){
                    alert("Error: Correo vacío");
                }else if(configuracion == 1){
                    swal("", "Correo vacío", "error");
                }
                formulario.elements[i].focus();
                return false;
                exit(1);
            }
        }
        if(formulario.elements[i].className.indexOf("pass-m") != -1){
            if(formulario.elements[i].value == ""){
                if(configuracion == 0){
                    alert("Error: Contraseña Vacía");
                }else if(configuracion == 1){
                    swal("", "Contraseña Vacía", "error");
                }
                formulario.elements[i].focus();
                return false;
                exit(1);
            }
        }
        if(formulario.elements[i].className.indexOf("pass-r-m") != -1){
            if(formulario.elements[i].value == ""){
                if(configuracion == 0){
                    alert("Error: Contraseña repetida Vacía");
                }else if(configuracion == 1){
                    swal("", "Contraseña repetida Vacía", "error");
                }
                formulario.elements[i].focus();
                return false;
                exit(1);
            }else{
                for(var j = 0; j < formulario.elements.length; j++){
                    if(formulario.elements[j].className.indexOf("pass-m") != -1){
                        if(formulario.elements[i].value != formulario.elements[j].value){
                            if(configuracion == 0){
                                alert("Error: Las contraseñas no coinciden");
                            }else if(configuracion == 1){
                                swal("", "Las contraseñas no coinciden", "error");
                            }
                            formulario.elements[i].value = "";
                            formulario.elements[j].value = "";
                            formulario.elements[j].focus();
                            return false;
                            exit(1);
                        }
                    }
                }
            }
        }
    }
    return true;
}