<?php
    session_start(); 
    session_destroy(); 
	
//Redirecciona a la p�gina de login
    header('location: index.php'); 
?>