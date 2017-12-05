<?php 

	require_once('config.php');

	$pesquisa = $_POST[1];

	$consultaValores = Usuario::search($pesquisa);


	$search = Usuario::somar($consultaValores[1]);
    echo json_encode($search);

?>

<div class="col-md-10">
	<section id="cliente">
    <form id="form" class="topBefore" method="POST">
    
      <input name="nome" id="nome" type="text" placeholder="NAME">
      <input name="rg" id="rg" type="text" placeholder="RG">
      <input name="cpf" id="cpf" type="text" placeholder="CPF">
      <input name="cnh" id="cnh" type="text" placeholder="CNH">
      <input name="nasc" id="nasc" type="text" placeholder="DATA NASC">
      <input name="endereco" id="endereco" type="text" placeholder="ENDEREÇO">
      <input type="hidden" name="acao" value="acao">
      <input id="submit" type="submit" value="Cadastrar!">
  
    </form>
    </section>
</div> 