<?php
If(!empty($_POST)){
	 $serverName = "DESKTOP-LF5SAD3\SQLEXPRESS2"; 

	$connectionInfo = array( "Database"=>"TiendaMusical");
	$conn = sqlsrv_connect( $serverName, $connectionInfo);
	$Nom=$_POST['name'];
	$Tel=$_POST['telefono'];
	$Cor=$_POST['correo'];
	$NaU=$_POST['nameUsuario'];
	$Pas=$_POST['pass'];
	$Dir=$_POST['direccion'];
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$insertar = "exec RegistrarCliente '$Nom','$Tel','$Cor','$NaU','$Dir','$Pas'";
	$retornar = "select * from vistaDevolverUsuario";
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$recurso = sqlsrv_prepare($conn,$insertar); 
	

	if(sqlsrv_execute($recurso)){
		$result = sqlsrv_query($conn,$retornar);
		$row = sqlsrv_fetch_array($result);
	    echo "
	    <!DOCTYPE html>
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
			<body>
				<div class='contenedor'>
					<ul class='navbar_piano'>
					  

					  
					  <li class='li' id='derecha'><a href='Carrito.html'></a></li> 
					  
					</ul>

				</div>
				<center>
				<h2 class='titulo_contacto'>Registrado con exito al usuario ",$row['nombreusuario'],"
				<br>
				</h2>
				<a href='../index.html' style='text-decoration-line: none;'><button>Volver al inicio</button></a>
				
				</center>

					
					</fieldset>
				</form>

				<br><br>
				<div class='contenedor'>
					<ul class='navbar_piano'>
					  

					  
					  <li class='li' id='derecha'><a href='Carrito.html'></a></li> 
					  
					</ul>

				</div>
				
			</body>
		</html>";
			
	} 
	    else{
	      echo"
	      <!DOCTYPE html>
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
			<body>
				<div class='contenedor'>
					<ul class='navbar_piano'>
					  

					  
					  <li class='li' id='derecha'><a href='Carrito.html'></a></li> 
					  
					</ul>

				</div>
				<center>
				<h2 class='titulo_contacto'>Este nombre de usuario es invalido o ya existe:",$NaU,".
				<br>
				</h2>
				<a href='../index.html' style='text-decoration-line: none;'><button>Volver al inicio</button></a>
				
				</center>

					
					</fieldset>
				</form>

				<br><br>
				<div class='contenedor'>
					<ul class='navbar_piano'>
					  

					  
					  <li class='li' id='derecha'><a href='Carrito.html'></a></li> 
					  
					</ul>

				</div>
				
			</body>
		</html>
	      ";
	}

}
?>