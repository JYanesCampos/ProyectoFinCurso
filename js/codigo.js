
"use strict";

var oUsuarioLogueado = null;

//  MANEJADORES DE EVENTOS
document.querySelector("#navHome").addEventListener("click",function() {mostrarArea("containerHome");},false);
document.querySelector("#navGaleria").addEventListener("click",function() {mostrarArea("containerGaleria");},false);
document.querySelector("#navSocial").addEventListener("click",function() {mostrarArea("containerSocial");},false);
document.querySelector("#navReserva").addEventListener("click",function() {mostrarArea("containerReservas");},false);
document.querySelector("#navAdmin").addEventListener("click",function() {mostrarArea("containerAdmin");},false);
document.querySelector("#navIniciarSesion").addEventListener("click",function() {mostrarArea("containerIniciarSesion");},false);
document.querySelector("#navCerrarSesion").addEventListener("click",function() {mostrarArea("containerHome");},false);
document.querySelector("#btnFormRegistrarUsuario").addEventListener("click",function() {mostrarArea("containerRegistrarUsuario");},false);

document.querySelector("#btnIniciarSesion").addEventListener("click",function() {iniciarSesion();},false);
document.querySelector("#navCerrarSesion").addEventListener("click",function() {cerrarSesion();},false);
document.querySelector("#btnRegistrarUsuario").addEventListener("click",function() {registrarUsuario();},false);

document.querySelector("#mostrarContraseñaInicio").addEventListener("click",function(){mostrarContraseñaInicio();},false);
document.querySelector("#mostrarContraseñaRegistro").addEventListener("click",function(){mostrarContraseñaRegistro();},false);



// INICIAR PÁGINA
iniciarPagina();

/*

    $.ajax({
        url: "Php/getSocios.php",
        dataType: 'json',
        cache: false,
        async: true, // por defecto
        method: "GET",
        success: procesarGetSocios
    });

*/


//  FUNCIONES

    //  INICIAR PAGINA
function iniciarPagina(){
    
    //SI HAY COOKIE DE USUARIO
    let sUsuarioCookie = getCookie("usuario");
    if(sUsuarioCookie!=""){
        oUsuarioLogueado = JSON.parse(sUsuarioCookie);
        mostrarNavBarLogueado();
    }

    //  MARCAR LAS RESERVAS
    pintarReservasCalendario();
}


    //  CALENDARIO 
function pintarReservasCalendario(){
    $.get("./php/getReservas.php", null, procesoReservasCalendario, "json");
}

    //  MOSTRAR CONTRASEÑAS
function mostrarContraseñaInicio(){
    let aContraseñaInicio = document.getElementById("passwordIniciarSesion");
    if(aContraseñaInicio.type === "password"){
        aContraseñaInicio.type = "text";
    }else{
        aContraseñaInicio.type = "password";
    }
}

function mostrarContraseñaRegistro(){
    let aContraseñaRegistro1 = document.getElementById("contraseñaRegistroUsuario1");
    let aContraseñaRegistro2 = document.getElementById("contraseñaRegistroUsuario2");
    if(aContraseñaRegistro1.type === "password"){
        aContraseñaRegistro1.type = "text";
        aContraseñaRegistro2.type = "text";
    }else{
        aContraseñaRegistro1.type = "password";
        aContraseñaRegistro2.type = "password";
    }
}


    //  MOSTRAR Y OCULTAR
function funciona(){
    alert("funciona");
}

function mensaje(cadena){
    alert(cadena);
}

function ocultarTodo(){
    for(let area of document.getElementsByClassName("view")){
        area.style.display = "none";
    }
    //document.querySelector("#mensaje").style.display = "none";
}

function mostrarArea(areaVisible) {
    ocultarTodo();
    document.getElementById(areaVisible).style.display = "block";
}

    //  INICIAR SESION
function iniciarSesion(){
    let oUsuarioInicioSesion = 
    {
        email: frmInicioSesion.emailIniciarSesion.value.trim(),
        password: frmInicioSesion.passwordIniciarSesion.value.trim(),
        mantenerSesion : frmInicioSesion.checkboxMantenerSesion.checked,
    }
    let sUsuarioInicioSesion = JSON.stringify(oUsuarioInicioSesion);
    let sParametros = "datos="+sUsuarioInicioSesion;

    console.log(sParametros);
    console.log(sParametros.type);

    buscarUsuarioIniciarSesion(sParametros);
}

function buscarUsuarioIniciarSesion(sParametros)
{
    $.post("./php/iniciarSesion.php", sParametros, procesoRespuestaFormulario, "json");
}

function mostrarNavBarLogueado(){
    document.getElementById("navCerrarSesion").style.display = "block";
    document.getElementById("navIniciarSesion").style.display = "none";
    if(oUsuarioLogueado.admin=="1"){
        document.getElementById("navAdmin").style.display = "block";
    }
}

    //  CERRAR SESION
function mostrarNavBarDeslogueado(){
    document.getElementById("navCerrarSesion").style.display = "none";
    document.getElementById("navIniciarSesion").style.display = "block";
    document.getElementById("navAdmin").style.display = "none";
}

function cerrarSesion(){

    console.log("Cerrar Sesion");

    oUsuarioLogueado = null;
    deleteCookie("ususario");
    mostrarNavBarDeslogueado();

}

    //  REGISTRO USUARIO
function validarDatos(){
    let bTodoOk = true;
    let bPrimerErrorEncontrado = false;
    let sMensajeError = "";
    let oAreaForm = null;
    let sInputForm = null;

    //NOMBRE
    oAreaForm = frmRegistroUsuario.nombreRegistroUsuario;
    sInputForm = oAreaForm.value.trim();
    let oExp = /^[a-zA-Z0-9\xc0-\xd6\xd8-\xde\xdf-\xf6\xf8-\xff]{2,30}$/;

    if(!oExp.test(sInputForm)) {
        bTodoOk = false;
        oAreaForm.classList.add("error");
        sMensajeError += "\r -El nombre debe tener entre 2 y 30 caracteres.";

        if(!bPrimerErrorEncontrado) {
            bPrimerErrorEncontrado = true;
            oAreaForm.focus();
        }
    }
    else {
        oAreaForm.classList.remove("error");
    }

    //APELLIDOS
    oAreaForm = frmRegistroUsuario.apellidosRegistroUsuario;
    sInputForm = oAreaForm.value.trim();
    oExp = /^[a-zA-Z0-9 \xc0-\xd6\xd8-\xde\xdf-\xf6\xf8-\xff]{2,30}$/;

    if(!oExp.test(sInputForm)) {
        bTodoOk = false;
        oAreaForm.classList.add("error");
        sMensajeError += "\r -El nombre debe tener entre 2 y 30 caracteres.";

        if(!bPrimerErrorEncontrado) {
            bPrimerErrorEncontrado = true;
            oAreaForm.focus();
        }
    }
    else {
        oAreaForm.classList.remove("error");
    }

    //TELEFONO
    oAreaForm = frmRegistroUsuario.telefonoRegistroUsuario;
    sInputForm = oAreaForm.value.trim();
    oExp = /^[0-9]{9}$/i;

    if(!oExp.test(sInputForm)) {
        bTodoOk = false;
        oAreaForm.classList.add("error");
        sMensajeError += "\r\n -Debe introducir un DNI válido.";
    
        if(!bPrimerErrorEncontrado) {
            bPrimerErrorEncontrado = true;
            oAreaForm.focus();
        }
    }
    else {
        oAreaForm.classList.remove("error");
    }

    //EMAIL
    oAreaForm = frmRegistroUsuario.emailRegistroUsuario;
    sInputForm = oAreaForm.value.trim();
    oExp = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if(!oExp.test(sInputForm)) {
        bTodoOk = false;
        oAreaForm.classList.add("error");
        sMensajeError += "\r\n -El e-mail no tiene un formato correcto.";

        if(!bPrimerErrorEncontrado) {
            bPrimerErrorEncontrado = true;
            oAreaForm.focus();
        }
    }
    else {
        oAreaForm.classList.remove("error");
    }

    //CONTRASEÑA 1
    oAreaForm = frmRegistroUsuario.contraseñaRegistroUsuario1;
    sInputForm = oAreaForm.value.trim();
    oExp = /^[a-zA-Z0-9]{8,}$/;

    if(!oExp.test(sInputForm)) {
        bTodoOk = false;
        oAreaForm.classList.add("error");
        sMensajeError += "\r\n -La contraseña debe estar compuesta por letras y/o números y tener al menos 8 caracteres.";
    
        if(!bPrimerErrorEncontrado) {
            bPrimerErrorEncontrado = true;
            oAreaForm.focus();
        }
    }
    else {
        oAreaForm.classList.remove("error");
    }

    //CONFIRMAR CONTRASEÑA CON CONTRASEÑA 2
    let oAreaForm2 = frmRegistroUsuario.contraseñaRegistroUsuario2;
    let sPass2 = oAreaForm2.value.trim();

    if(!oAreaForm.classList.contains("error") && sPass2 != sInputForm) {
        bTodoOk = false;
        oAreaForm2.classList.add("error");
        sMensajeError += "\r\n -Las contraseñas no coinciden.";

        if(!bPrimerErrorEncontrado) {
        bPrimerErrorEncontrado = true;
        oAreaForm2.focus();
        }
    }
    else {
        oAreaForm2.classList.remove("error");
    }

    if(!bTodoOk)
    mensaje(sMensajeError);

    return bTodoOk;
}

function registrarUsuario(){
    if(validarDatos()){
        //SI TODO CORRECTO, SE REGISTRA.
        let oUsuarioRegistrar =
        {
            nombre: frmRegistroUsuario.nombreRegistroUsuario.value,
            apellidos: frmRegistroUsuario.apellidosRegistroUsuario.value,
            telefono: frmRegistroUsuario.telefonoRegistroUsuario.value,
            email: frmRegistroUsuario.emailRegistroUsuario.value,
            password: frmRegistroUsuario.contraseñaRegistroUsuario1.value,
        }
        let sUsuarioRegistrar = JSON.stringify(oUsuarioRegistrar);
        let sParametros = "datos="+sUsuarioRegistrar;

        console.log(sParametros);

        $.post("./php/registrarUsuario.php", sParametros, procesoRespuestaFormulario, "json");
    }
}


