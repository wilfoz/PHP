<?php 

	class Carro extends Classificacao{
		private $id_carros;
		private $car_marca;
		private $car_modelo;
		private $car_anofabric;

		public function getId_carros(){
			return $this->id_carros;
		}
		public function setId_carros($idcarro){
			$this->id_carros = $idcarro;
		}
		public function getCar_marca(){
			return $this->car_marca;
		}
		public function setCar_marca($marca){
			$this->car_marca = $marca;
		}
		public function getCar_modelo(){
			return $this->car_modelo;
		}
		public function setCar_modelo($modelo){
			$this->car_modelo = $modelo;
		}
		public function getCar_anofabric(){
			return $this->car_anofabric;
		}
		public function setCar_anofabric($ano){
			$this->car_anofabric = $ano;
		}

		public function __construct($marca, $modelo, $ano, $idclass){
			$this->setCar_marca($marca);
			$this->setCar_modelo($modelo);
			$this->setCar_anofabric($ano);
			$this->setId_classificacao($idclass);
		}
		public function setData($dados){
			$this->setId_carros($dados['id_carros']);
			$this->setCar_marca($dados['car_marca']);
			$this->setCar_modelo($dados['car_medelo']);
			$this->setCar_anofabric($dados['car_anofabric']);
			$this->setId_classificacao($dados['id_classificacao']);
		}
		public function loadById($id){
			$sql = new Sql();
			$results = $sql->select("SELECT * FROM tb_carros WHERE id_carross = :ID" , array(":ID"=>$id));
			if (count($results)> 0) {
				$this->setData($results[0]);
			}
		}
		
			public static function search($marca){
			$sql = new Sql();
			return $sql->select("SELECT * FROM tb_carros WHERE car_marca LIKE :SEARCH ORDER BY car_marca", array(":SEARCH"=>"%".$marca."%"));
		}
			public function insert(){
			$sql = new Sql();
			$results = $sql->select("CALL sp_carros_insert(:MARCA, :MODELO, :ANO, :CLASSIFICACAO)", array(
				':MARCA'=>       $this->getCar_marca(),
				':MODELO'=>      $this->getCar_modelo(),
				':ANO'=>         $this->getCar_anofabric(),
				':CLASSIFICACAO'=> $this->getId_classificacao()
			));
			if (count($results)> 0) {
				$this->setData($results[0]);
			}
		}
		public function __toString(){
			return json_encode(array(
				"id_carros"=>$this->getId_carros(),
				"car_marca"=>$this->getCar_marca(),
				"car_modelo"=>$this->getCar_modelo(),
				"car_anofabric"=>$this->getCar_anofabric(),
				"id_classificacao"=>$this->getId_classificacao()
			));
		}


	}


?>