function validar(formulario, configuracion = 0){

    for(var i = 0; i < formulario.elements.length; i++){
        if(formulario.elements[i].className.indexOf("correo-m") != -1){
            if(formulario.elements[i].value != ""){
                if(!/^[-\w.%+]{1,64}@(?:[a-z0-9-]{1,63}\.){1,125}[a-z]{2,63}$/.test(formulario.elements[i].value)){
                    if(configuracion == 0){
                        alert("Error: Correo no valido");
                        formulario.elements[i].focus();
                    }else if(configuracion == 1){
                        swal({
                            icon: 'error',
                            title: 'El correo no es valido'
                        }).then(function(){
                            swal.close();
                            formulario.elements[i].focus();
                        })
                    }
                    return false;
                    exit(1);
                }
            }else{
                if(configuracion == 0){
                    alert("Error: Correo vacío");
                    formulario.elements[i].focus();
                }else if(configuracion == 1){
                    swal({
                        icon: 'error',
                        title: 'El correo no puede quedar vacío'
                    }).then(function(){
                        swal.close();
                        formulario.elements[i].focus();
                    })
                }
                return false;
                exit(1);
            }
        }
        if(formulario.elements[i].className.indexOf("pass-m") != -1){
            if(formulario.elements[i].value == ""){
                if(configuracion == 0){
                    alert("Error: Contraseña Vacía");
                    formulario.elements[i].focus();
                }else if(configuracion == 1){
                    swal({
                        icon: 'error',
                        title: 'La contraseña no puede quedar vacía'
                    }).then(function(){
                        swal.close();
                        formulario.elements[i].focus();
                    })
                }
                return false;
                exit(1);
            }
        }
        if(formulario.elements[i].className.indexOf("pass-r-m") != -1){
            if(formulario.elements[i].value == ""){
                if(configuracion == 0){
                    alert("Error: Contraseña repetida Vacía");
                    formulario.elements[i].focus();
                }else if(configuracion == 1){
                    swal({
                        icon: 'error',
                        title: 'Repita la contraseña'
                    }).then(function(){
                        swal.close();
                        formulario.elements[i].focus();
                    })
                }
                return false;
                exit(1);
            }else{
                for(var j = 0; j < formulario.elements.length; j++){
                    if(formulario.elements[j].className.indexOf("pass-m") != -1){
                        if(formulario.elements[i].value != formulario.elements[j].value){
                            if(configuracion == 0){
                                alert("Error: Las contraseñas no coinciden");
                                formulario.elements[i].value = "";
                                formulario.elements[j].value = "";
                                formulario.elements[j].focus();
                            }else if(configuracion == 1){
                                swal({
                                    icon: 'error',
                                    title: 'Las contraseñas no coinciden'
                                }).then(function(){
                                    swal.close();
                                    formulario.elements[i].value = "";
                                    formulario.elements[j].value = "";
                                    formulario.elements[j].focus();
                                })
                            }
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