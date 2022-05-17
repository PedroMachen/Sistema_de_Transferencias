var answer=""
var resp=0.0
function numero(x){ 
    answer=answer+x
    document.getElementById("calcu").value=answer
}
function c(){
    answer=""
    document.getElementById("calcu").value=answer   
}

function igual(){
    answer=document.getElementById("calcu").value 
    resp=eval(answer,10);
    answer= resp.toString()
    document.getElementById("calcu").value=answer.toString() 
}
function iva(){
    
    var aux= document.getElementById("calcu").value
    var ans=eval(aux,10)*1.16
    answer=ans.toString()
    document.getElementById("calcu").value=answer.toString()
}
function envi(){
 var aux= document.getElementById("calcu").value
    var ans=eval(aux,10)*1.05
    answer=ans.toString()
    document.getElementById("calcu").value=answer.toString()   
}
function susc(){
    
    var aux= document.getElementById("calcu").value
    var ans=eval(aux,10)*0.95
    answer=ans.toString()
    document.getElementById("calcu").value=answer  
}
function ce(){
    var aux=""
    for (var i=0; i<answer.length-1;i++){
        aux+=answer.charAt(i)
    }
    answer=aux
    document.getElementById("calcu").value=answer.toString()  
    
}