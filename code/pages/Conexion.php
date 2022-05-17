<?php
If(!empty($_POST)){
	 $serverName = "DESKTOP-LF5SAD3\SQLEXPRESS2"; //serverName\instanceName
	// Puesto que no se han especificado UID ni PWD en el array  $connectionInfo,
	// La conexión se intentará utilizando la autenticación Windows.
	$connectionInfo = array( "Database"=>"TiendaMusical");
	$conn = sqlsrv_connect( $serverName, $connectionInfo);
	$Nom=$_POST['name'];
	$Tel=$_POST['telefono'];
	$Cor=$_POST['correo'];
	$NaU=$_POST['nameUsuario'];
	$Pas=$_POST['pass'];
	$Dir=$_POST['direccion'];

	$insertar= "INSERT into cliente values ('$Nom','$Tel','$Cor','$NaU','$Pas','$Dir')";      
	//Te faltaba esta lineaX
	$recurso=sqlsrv_prepare($conn,$insertar); 

	//Para mas seguridad usa el valor retornado por sqlsrv_execute
	if($conn){
		echo "conectó";
	}
	if(sqlsrv_execute($recurso)){
	    echo "<!DOCTYPE html>
<html>
	<head>
		<title>Contacto</title>
		<link rel='shortcut icon' href='../icon/piano.ico'>
		
		<link rel='stylesheet' href='../css/navbar.css'>
		<link rel='stylesheet' href='../css/Parraf.css'>
		<link rel='stylesheet' href='../css/carrusel.css'>
		<link rel='stylesheet' href='../css/background.css'>
		<link rel='stylesheet' href='../css/style_contact.css'>
		<link rel='stylesheet' href='../css/footer.css'>

		<meta charset='utf-8'>
	  	<meta name='viewport' content='width=device-width, initial-scale=1'>
	  	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
		<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js'></script>
		<script src='../js/mensaje.js'></script>
	</head>
	<body class='fondo'>
		<div class='contenedor'>
			<ul class='navbar_piano'>
			  <li class='li'><a href='index2.html'>Inicio</a></li>
			  <li class='li'><a href='Acercade.html'>Acerca de nosotros</a></li>
			  <li class='li'><a href='Cursos.html'>Cursos</a></li>
			  <li class='li'><a class='activar' href='#Contacto'>Contacto</a></li>
			  <li class='li'><a href='Noticias.html'>Noticias</a></li>
			  <li class='li'><a href='Trivia.html'>Trivia</a></li>
			  
			  <li class='li' id='derecha'><a href='Carrito.html'>Carrito de compras</a></li> 
			  <li class='li' id='derecha'><a href='Contacto_ingles.html'>English</a></li>
			</ul>

		</div>
		
		<h2 class='titulo_contacto'>Registrado con exito</h2>

			-->
			</fieldset>
		</form>
		<div class='footer'>
			<footer>Hecho por Carlos Segovia</footer>

		</div>
		
	</body>
</html>";
			
	} 
	    else{
	      echo"No Agregado";
	}

}
?>