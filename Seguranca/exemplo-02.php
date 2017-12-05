<?php 
	
	$id = (isset($_GET["id"]))?$_GET["id"]:10;

	$conn = mysqli_connect("localhost","root", "","dbphp7");

	$sql = "SELECT * FROM tb_usuarios WHERE idusuario = $id";
	if (!is_numeric($id)) {
		exit("KKKK");
	}

	$exec = mysqli_query($conn, $sql);
	while ( $resultado = mysqli_fetch_object($exec)) {
		echo $resultado->deslogin."<br>";
	}


?>