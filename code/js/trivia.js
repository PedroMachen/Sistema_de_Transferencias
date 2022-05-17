var preguntas=10;
var descuento=0.02;

var id="true";
var respuestas="";
let resps=["Una cancion de Chuck Berry","Madama Butterfly","Kurt Cobain","Guillermo IX de Aquitania","Almodóvar y McNamara","Finales de los 60/principios de los 70","The Everly Brothers","Vincent Price","Verdadero","Where are we now?"];
function check(){
	var descTotal=0;
	var cont=0;
	for(var i=1;i<=preguntas;i++){
    	id+=i;
    	respuestas+="\nPregunta "+i+"\nRespuesta correcta: "+resps[i-1];
		if(document.getElementById(id).checked){
			descTotal+=descuento;
    		cont++;
    	}
        id="true";
    }
    alert("respuestas correcta(s): "+cont+"\ndescuento: "+descTotal*100+"%"+"\n"+respuestas);
    
    
}