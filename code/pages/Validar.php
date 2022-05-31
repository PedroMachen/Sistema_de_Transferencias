<?php
If($_POST){	
	$serverName = "DESKTOP-LF5SAD3\SQLEXPRESS2";
	$coneectionInfo = array( "Database"=>"TiendaMusical");
	$conn = sqlsrv_connect( $serverName, $coneectionInfo);

	$Nom=$_POST['usuario'];
	$Tel=$_POST['password'];
	$vista = "exec ValidarUsuario '$Nom','$Tel'";
	
	$recurso = sqlsrv_prepare($conn,$vista);
	$result = sqlsrv_query($conn,$vista);
	$row = sqlsrv_fetch_array($result);
	
	$comprovarUsuario = $row["NombreUsuario"];
	$comprovarPass = $row["Pass"];
	$nuevaURL= "index2.html";

	if($Nom==$comprovarUsuario and $comprovarPass==$Tel and $Nom!=""){
		$Mostrar = "exec MuestraUsuarioValidado '$Nom','$Tel'";
		$recurso2 = sqlsrv_prepare($conn,$Mostrar);
		$result2 = sqlsrv_query($conn,$Mostrar);
		$row2 = sqlsrv_fetch_array($result2);
		$insertar = "exec ingresaUltimoUsuario '$Nom'";
		$ultimo=sqlsrv_prepare($conn,$insertar);
		sqlsrv_execute($ultimo);
		if(sqlsrv_execute($recurso2)){
			header('Location: '.$nuevaURL);
		echo "Bien hecho: ",$row2["NombreUsuario"]," - ",$row2["Pass"];
	}	
	}else{	echo '<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    
    <link rel="stylesheet" href="../css/style_login.css"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body class="fondoSesion">
    <div class="container">
        <h2>Usuario o contraseña invalidos</h2>
        <h2>Inicio de sesión</h2>
        <form action="Validar.php" method="post">
            <label>Usuario:</label>
            <input type="text" name="usuario" id="user"/>
            <label>Contraseña:</label>
            <input type="password" name="password" id="pass"/>
            <div class="estilo">
                    <center>
                    <input class="label_contact" value="Ingresar" type="submit" name="Enviar">   
                    </center>
                    
                </div>
            
        </form>

        <a href="registrar.html" style="text-decoration-line: none;" >
            <button type="button" style="">Registrate
            </button>
        </a>

        <div class="fecha_consulta">
            <footer id="demo"></footer>
        </div>

    </div>
        
</body>
</html>';}
	


	
}
?>