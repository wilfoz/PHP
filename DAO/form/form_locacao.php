<?php 

	require_once('config.php');

	@$login = $_POST['nome'];
	@$rg    = $_POST['rg'];
	@$cpf   = $_POST['cpf'];
	@$cnh   = $_POST['cnh'];
	@$nasc  = $_POST['nasc'];
	@$endereco = $_POST['endereco'];

	@$acao  =$_POST["acao"];

	if (isset($acao)) {

		$novocliente = new Usuario($login, $rg, $cpf, $cnh, $nasc , $endereco);
		$novocliente->insert();
	}
?>

    <div class="container">
	    <form id="form" class="topBefore">
	    
	      <input id="marca" type="text" placeholder="MARCA">
	      <input id="modelo" type="text" placeholder="MODELO">
	      <input id="ano" type="text" placeholder="ANO FABRICAÇÃO">
	      <input id="submit" type="submit" value="Cadastrar!">
	  
	    </form>
    </div>
