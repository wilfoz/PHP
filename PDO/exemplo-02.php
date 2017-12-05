<?php   

	$conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root", "");

	$stmt = $conn->prepare("INSERT INTO tb_usuarios(deslogin, dessenha) VALUES (:LOGIN, :PASS)");
	$login = "Kely";
	$password  = "123";

	$stmt->bindParam(":LOGIN", $login);
	$stmt->bindParam(":PASS", $password);

	$stmt->execute();

	echo "Inserido!";

	
?>