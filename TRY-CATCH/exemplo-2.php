<?php 

	function trataNome($nome){
		if(!$nome) {
			throw new Exception("Nenhum nome foi informado!", 1);
		}

		echo ucfirst($nome)."<br>";
	}

	try {

		trataNome("Wesley");
		trataNome("");

	} catch(Exception $e){
		echo $e->getMessage();
		
	} finally {
		echo "Executou";
	}

?>