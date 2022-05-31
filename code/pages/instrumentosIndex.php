<?php
	 $serverName = "DESKTOP-LF5SAD3\SQLEXPRESS2"; //serverName\instanceName
	// Puesto que no se han especificado UID ni PWD en el array  $connectionInfo,
	// La conexión se intentará utilizando la autenticación Windows.
	$connectionInfo = array( "Database"=>"TiendaMusical");
	$conn = sqlsrv_connect( $serverName, $connectionInfo);
	
	$insertar= "Select * from productomusical";      
	//Te faltaba esta lineaX
	//$checa = "select * from ProductoMusical where nombreProducto='$Nom'";
	
	$recurso = sqlsrv_prepare($conn,$insertar); 
	//Para mas seguridad usa el valor retornado por sqlsrv_execute

	if(sqlsrv_execute($recurso)){
	$result = sqlsrv_query($conn,$insertar);
	    echo '<!DOCTYPE html>
<html>
<head>
	<title>Cursos</title>
	<link rel="shortcut icon" href="../icon/piano.ico">


	<link rel="stylesheet" href="../css/navbar.css">
	<link rel="stylesheet" href="../css/Parraf.css">
	<link rel="stylesheet" href="../css/carrusel.css">
	<link rel="stylesheet" href="../css/background.css">
	<link rel="stylesheet" href="../css/style_cursos.css">
	<link rel="stylesheet" href="../css/footer.css">
	<link rel="stylesheet" href="../css/calcu.css">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body bgcolor="skyblue">




	<div class="contenedor ">
		<ul class="navbar_piano">
			<li class="li col"><a href="index2.html">Inicio</a></li>
			<li class="li"><a href="Acercade.html">Noticias</a></li>
			<li class="li"><a class="activar" href="#instrumentos">Instrumentos</a></li>  
		</ul>
	</div>
	<div class="container" style="margin-top:30px">
		<div class="row">
			<div class="col-sm-6">
				<form action="instrumentos.php" method="post">
					<img src="../img/Bongos.jpg" width="300">
					<input name="a" value="Bongos">
					<input type="submit" value="Pedir">
				</form>
				<form action="instrumentos.php" method="post">
					<img src="../img/flauta.png" width="300">
					<input name="a" value="Flauta Dulce">
					<input type="submit" value="Pedir">
				</form>
				<form action="instrumentos.php" method="post">
					<img src="../img/guitarra.jpg" width="300">
					<input name="a" value="Guitarra">
					<input type="submit" value="Pedir">
				</form>
				<form action="instrumentos.php" method="post">
					<img src="../img/guitarraElectrica.gif" width="300">
					<input name="a" value="Guitarra electrica">
					<input type="submit" value="Pedir">
				</form>
				<form action="instrumentos.php" method="post">
					<img src="../img/bateria.jpg" width="300">
					<input name="a" value="Bateria">
					<input type="submit" value="Pedir">
				</form>
				<form action="instrumentos.php" method="post">
					<img src="../img/Armónica.jpg" width="300">
					<input name="a" value="Armónica">
					<input type="submit" value="Pedir">
				</form>
				<form action="instrumentos.php" method="post">
					<img src="../img/maracas.jpg" width="300">
					<input name="a" value="Maracas">
					<input type="submit" value="Pedir">
				</form>
				<form action="instrumentos.php" method="post">
					<img src="../img/triangulo.jpg" width="300">
					<input name="a" value="Triangulo">
					<input type="submit" value="Pedir">
				</form>
			</div>
			<div class="col-sm-6">
				<h3 color="red">Producto selecionado: Seleccione producto</h3>
				<div class="table-responsive">
					<div class="container table-responsive">
						<div style="width: 70%">
							<table class="table table-sm table-bordered table-dark table-hover">
								<thead class=" thead-light">
									<tr>
										<th>Id del producto</th>
										<th>Nombre del producto</th>
										<th>Cantidad disponible</th>
									</tr>
								</thead>
								<tbody>';
									while ($row = sqlsrv_fetch_array($result)){
										echo '
											<tr>
										<td>',$row["ProductoId"],'</td>
										<td>',$row["nombreProducto"],'</td>
										<td>',$row["cantidadProducto"],'</td>
										</tr>';   
									}echo 
									'
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>
</div>


<div class="footer">
	<footer>Hecho por Carlos Segovia y Daniel Soto</footer>
</div>
</body>
</html>';
	} 
	    else{
	      echo"No Agregado";
	}


?>