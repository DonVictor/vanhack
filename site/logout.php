<?php
    session_start(); 
    session_destroy(); 
	
//Redirecciona a la página de login
    header('location: index.php'); 
?>