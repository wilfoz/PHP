<?php 

	require_once('config.php');

	@$marca         = $_POST['nome'];
	@$modelo        = $_POST['rg'];
	@$ano           = $_POST['cpf'];
	@$classificacao = $_POST['classificacao'];

	@$acao  =$_POST["acao"];

	if (isset($acao)) {

		$novocliente = new Usuario($marca, $modelo, $ano, $idclass);
		$novocliente->insert();
	}
?>

    <div class="container">
	    <form id="form" class="topBefore">
	    
	      <input name="marca" id="marca" type="text" placeholder="MARCA">
	      <input name="modelo" id="modelo" type="text" placeholder="MODELO">
	      <input name="ano" id="ano" type="text" placeholder="ANO FABRICAÇÃO">
	      <input name="classificacao" id="classificacao" type="text" placeholder="CLASSIFICACAO">
	      <input type="hidden" name="acao" value="acao">
	      <input id="submit" type="submit" value="Cadastrar">
	  
	    </form>
    </div>
