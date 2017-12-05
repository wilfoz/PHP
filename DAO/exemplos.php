<?php 

require_once("config.php");


/* Carrega um usuário
$root = new Usuario();
$root->loadById(6);
echo $root; */

//Carrega uma lista de usuários
//$lista = Usuario::getList();
//var_dump($lista);

//Carrega uma lista de usuários buscando pelo login

//$search = Usuario::search("t");
//var_dump($search);

//Carrega um usuairo usando o login e senha

//$usuario = new Usuario();
//$usuario->login("Wesley","123");
//echo $usuario;

//$aluno = new Usuario("Jorge", "123");
//$aluno->insert();
//echo $aluno;

//Alterar um usuario
/* $usuario = new Usuario();
$usuario->loadById(6);
$usuario->update("professor", "123");
echo $usuario; */

$usuario = new Usuario();

$usuario->loadById(15);
$usuario->delete();

echo $usuario;

?>
