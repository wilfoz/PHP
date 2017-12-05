<?php 

	class Classificacao{
		private $id_classificacao;
		private $descricao;
		private $valor;

		public function getId_classificacao(){
			return $this->id_classificacao;
		}
		public function setId_classificacao($classificacao){
			$this->id_classificacao = $classificacao;
		}
		public function getDescricao(){
			return $this->descricao;
		}
		public function setDescricao($descricao){
			$this->descricao = $descricao;
		}

		public function getValor(){
			return $this->valor;
		}
		public function setValor($valor){
			$this->valor = $valor;
		}
	}

?>