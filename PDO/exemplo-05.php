<?php   

	$conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root", "");

	$conn->beginTransaction();

	$stmt = $conn->prepare("DELETE FROM tb_usuarios WHERE idusuario = ?");

	$id        = 5;

	$stmt->execute(array($id));

	$conn->rollBack();

	echo "Dados Apagados!";

	
?>