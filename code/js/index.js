var intentos = 3; 
//localStorage

if (typeof(Storage)!=="undefined") {

                localStorage.setItem("usuario","fecturisio");
                localStorage.setItem("contrasena","hola123");
            }
function validar(){
    var usuario = document.getElementById("user").value;
    var contra = document.getElementById("pass").value;
    var usuaropComp=localStorage.getItem("usuario");
    var contraComp=localStorage.getItem("contrasena");

    if (usuario == usuaropComp && contra == contraComp) {
         window.location = "pages/index2.html"; 
        return false;
    }
    else{
        alert("Usuario o contraseña incorrectos");
    }

    /*
    if ( usuario == "fecturisio" && contra == "hola123"){
        alert ("Inicio de sesión exitoso");
        window.location = "pages/index2.html"; 
        return false;
    }
    else{
        intentos --;
        alert("Tiene "+intentos+" intentos restantes;");
        if( intentos == 0){
        document.getElementById("user").disabled = true;
        document.getElementById("pass").disabled = true;
        document.getElementById("submit").disabled = true;
        return false;
        }
    }
    */
}