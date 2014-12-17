<?php 
	//Crear sesión
	session_start();
	//Destruir Sesión
	unset($_SESSION['user']);
	//Redireccionar a index.php
	header("location: index.php");
?>