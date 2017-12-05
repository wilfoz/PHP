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
		echo $novocliente;
	}

	
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Cadastro Automoveis</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>
  	
    <div class="container">
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
		
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>