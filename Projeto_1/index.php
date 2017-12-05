<?php 

	require_once("config.php");

	use Cliente\Cadastro;

	$cad = new Cadastro();
	$cad->setNome("Wilerson");
	$cad->setEmail("wil.wil@hotmail.com");
	$cad->setSenha("123");

	echo $cad;

	echo "<br>";

	$cad->registrarVenda();

?>