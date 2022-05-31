<?php
If(!empty($_POST)){
	$serverName = "DESKTOP-LF5SAD3\SQLEXPRESS2"; 

	$connectionInfo = array( "Database"=>"TiendaMusical");
	$conn = sqlsrv_connect( $serverName, $connectionInfo);
	$Nom = $_POST['a'];
	$insertar = "exec VerProductoDisponible '$Nom'"; 
	 
	   
	//$checa = "select * from ProductoMusical where nombreProducto='$Nom'";
	$recurso = sqlsrv_prepare($conn,$insertar); 
	
	if(sqlsrv_execute($recurso)){
	$result = sqlsrv_query($conn,$insertar);
	$row = sqlsrv_fetch_array($result);
	$variableId = $row['ProductoId'];
	//$borrarRegistro = "exec borrarRegistro $variableId";
	
	$ultimoUsuarioID = "select * from VerUltimoUsuarioIngresado";
	$resultUUI = sqlsrv_query($conn,$ultimoUsuarioID);
	$rowUUI = sqlsrv_fetch_array($resultUUI);

	$Y = $rowUUI['nombreUsuarioUUI'];

	$Id = "select clienteId from Cliente where NombreUsuario = '$Y'";
	$IdUtil = sqlsrv_query($conn,$Id);
	$IdLista = sqlsrv_fetch_array($IdUtil);
	$X = $IdLista['clienteId'];

	$nombre = $rowUUI['nombreCompletoUUI'];
	$insertaPedido = "exec hacerPedido $X,$variableId";
	sqlsrv_query($conn,$insertaPedido);

	$vistaPedido = "select * from VistaPedidoId";
	$vistaPedidoExec = sqlsrv_query($conn,$vistaPedido);
	$vistaPedidoArray = sqlsrv_fetch_array($vistaPedidoExec);

	//$rowUUI['nombreCompletoUUI'];
	    echo '
<!DOCTYPE html>
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
<body background-image: linear-gradient(red, yellow, green)>




	<div class="contenedor ">
		<ul class="navbar_piano">
			<li class="li col"><a href="index2.html">Inicio</a></li>
			<li class="li"><a href="Acercade.html">Noticias</a></li>
			<li class="li"><a class="activar" href="instrumentosIndex.php">Instrumentos</a></li>  
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
				<h3>Producto selecionado: ',$row["nombreProducto"],'</h3>
				<div class="table-responsive">
					<div class="container table-responsive">
						<div style="width: 70%">
							<table class="table table-sm table-bordered table-dark table-hover">
								<thead class=" thead-light">
									<tr><center>
										<th>Id del producto</th>
										<th>Cantidad disponible</th>
										</center>
									</tr>
								</thead>
								<tbody>

									<tr>
										<td bgcolor="skyblue"><h3>',$row["ProductoId"],'</h3></td>
										<td bgcolor="skyblue"><h3>',$row["cantidadProducto"],'</h3></td>   
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
							<h3>
							<p color="red"><center>Si la cantidad de producto es 0 es pedido no se puede ejecutar.</center></p>
							<br>Estimad@ cliente:
							', $Y,' <br>Su: ',$row["nombreProducto"],' 
							 Con el ID: ', $row["ProductoId"],'<br>Será enviado a la dirección: ',
							  $rowUUI['direccionUUI'],'<br> en las proximas 72 hroas.<br>No. Folio de su pedido: ',$vistaPedidoArray["pedidoId"],'

							</h3>
			</div>
		</div>
	</div>	
</div>
</div>


<div class="footer">
	<footer style="color=white">Hecho por Carlos Segovia y Daniel Soto</footer>
</div>
</body>
</html>';
	} 
	    else{
	      echo"No Agregado";
	}

}
?>
