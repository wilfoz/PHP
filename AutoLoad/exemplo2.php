<?php 

function incluiClasses($nomeClasse){
	if (file_exists($nomeClasse.".php")=== true) {
		require_once($nomeClasse.".php");
	}
}

spl_autoload_register("incluiClasses");

spl_autoload_register(function($nomeClasse){
	if (file_exists("abastrata".DIRECTORY_SEPARATOR.$nomeClasse.".php")=== true) {
		require_once("abastrata".DIRECTORY_SEPARATOR.$nomeClasse.".php");
	}
});

$carro = new Corcel();

$carro->acelerar(200);


?>