<?php 
	
	class Documents{
		private $rg;
		private $cpf;
		private $cnh;
		private $nascimento;

		public function getRg(){
			return $this->rg;
		}

		public function setRg($rg){
			$this->rg = $rg;
		}

		public function getCpf(){
			return $this->cpf;
		}

		public function setCpf($cpf){
			$this->cpf = $cpf;
		}

		public function getCnh(){
			return $this->cnh;
		}

		public function setCnh($cnh){
			$this->cnh = $cnh;
		}
	}

?>