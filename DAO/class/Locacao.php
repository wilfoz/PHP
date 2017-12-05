<?php 

	class Locacao{

		private $valor;
		private $coluna1;
		private $coluna2;
		private $chave1;
		private $chave2;

		public function getValor(){
			return $this->valor;
		}
		public function setValor($valor){
			$this->valor = $valor;
		}

		public function getColuna1(){
			return $this->coluna1;
		}
		public function setColuna1($coluna1){
			$this->coluna1 = $coluna1;
		}

		public function getColuna2(){
			return $this->coluna2;
		}
		public function setColuna2($coluna2){
			$this->coluna2 = $coluna2;
		}

		public function getChave1(){
			return $this->chave1;
		}
		public function setChave1($chave1){
			$this->chave1 = $chave1;
		}

		public function getChave2(){
			return $this->chave2;
		}
		public function setChave2($chave2){
			$this->chave2 = $chave2;
		}
		
		public function valorTotalLocacao($id){

			$sql = new Sql();

			$coluna1 = "U.tb_clientes";
			$coluna2 = "C.tb_locacao";
			$chave1  = "U.id_clientes";
			$chave2  = "C.id_locacao";

			$this->setColuna1($coluna1);
			$this->setColuna1($coluna2);
			$this->setColuna1($chave1);
			$this->setColuna1($chave2);
			
			return $sql->query("SELECT :COLUM1, SUM(:COLUM2) AS Soma FROM tb_clientes AS U 
			INNER JOIN tb_locacao AS C ON :CHAVE1 = :CHAVE2 WHERE :CHAVE1 = :ID", array(
			":ID"=>$id,
			":COLUM1"=>$this->getColuna1(),
			":COLUM2"=>$this->getColuna2(),
			":CHAVE1"=>$this->getChave1(),
			":CHAVE2"=>$this->getChave2() 
			));

		}
	}

?>