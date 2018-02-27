<?php
//servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	$mysqli=new mysqli("localhost","root","","vanhack"); 
	
	if(mysqli_connect_errno()){
		echo 'connection error! : ', mysqli_connect_error();
		exit();
	}
?>