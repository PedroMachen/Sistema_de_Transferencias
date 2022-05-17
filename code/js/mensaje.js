function validarContacto(){
   var name = document.getElementById("name").value;
   var apellido = document.getElementById("apellidos").value;
   var txt = document.getElementById("msj").value;
   var correo = document.getElementById("correo").value;
   var telef=document.getElementById("tel").value;

   var subName = name.split(' ');
   var subApe = apellido.split(' ');

   if(subName.length<4 && subApe.length<3 && txt.length<256 && telef.length==10){
      if(mail(correo)==true){
         alert("Querido "+subName[0]+" su mensaje ha sido enviado\n");
      }
      else{
         alert("Ingrese un correo válido");
      }
   }else{
      alert("Revise los campos por favor.");
   }

}

function mail(txt){
   var reg = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
   if(txt.match(reg)){
      return true;
   }
   else{
      return false;
   }
}
