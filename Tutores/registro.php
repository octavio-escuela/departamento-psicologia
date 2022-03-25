<?php
	$correo = test_input($_POST["correo"]);	
	$usuario = test_input($_POST["usuario"]);	
	$nombre = test_input($_POST["nombre"]);	
	$apellido = test_input($_POST["apellido"]);	
	$password = test_input($_POST["contrasena"]);	
	//validation
	function test_input($data) {
  		$data = trim($data);
  		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
	}
?>
