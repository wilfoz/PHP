<?php 

	require_once('config.php');

  @$pesquisa = $_POST['resultado'];

  if ($pesquisa !="") {

  $consultaValores = Usuario::search($pesquisa);

    if ($consultaValores !="") {
      $search = Usuario::somar($consultaValores[0]['id_clientes']);
      echo json_encode($search);
    } else {
      echo "Usuario não encontrado";
    }
  
  }

?>

<div class="col-md-10">
	<section id="cliente">
    <form id="form" class="topBefore" method="POST">
       <input type="text" name="resultado" placeholder="Pesquisar">
       <button type="submit" name="pesq" value="acao">Pesquisar</button>
    </form>
    </section>
</div> 