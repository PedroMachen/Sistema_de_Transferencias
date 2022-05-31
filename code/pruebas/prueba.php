<?php

$serverName = "DESKTOP-LF5SAD3\SQLEXPRESS2";
$coneectionInfo = array( "Database"=>"TiendaMusical");

$conn = sqlsrv_connect( $serverName, $coneectionInfo);

$vista = "select clienteId,nombreCliente,nombreusuario from cliente";
$result = sqlsrv_query($conn,$vista);

$recurso22 = sqlsrv_prepare($conn,$vista);

if($conn){

	echo "<!DOCTYPE html>
	<html>
	<head>
	<meta charset='utf-8'>
	<title></title>
	</head>
	<body bgcolor='red'>";
	while ($row = sqlsrv_fetch_array($result)){
		echo "<table>
		<thead>
		<tr>
		<th>Id del producto</th>
		<th>Nombre del producto</th>
		<th>Cantidad disponible</th>
		</tr>
		</thead>
		<tbody>

		<tr>
		<td>",$row["clienteId"],"</td>
		<td>",$row["nombreCliente"],"</td>
		<td>",$row["nombreusuario"],"</td>   
		</tr>
		</tbody>
		</table>
		id: ",$row["clienteId"]," - Name: ",$row["nombreCliente"]," ",$row["nombreusuario"],"<br>";
		}echo "
		</body>
		</html>";






		echo "Bien hecho.";
	}else{
		echo "Mal echo.";
	}
	?>
