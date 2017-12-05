<?php 


	class Usuario extends Documents {
		private $id_clientes;
		private $cli_nome;
		private $cli_datanasc;
		private $cli_endereco;
//-metodos-set-get------------------------------------------------------------------
		public function getId_clientes(){
			return $this->id_clientes;
		}
		public function setId_clientes($id_clientes){
			$this->id_clientes = $id_clientes;
		}
		public function getCli_nome(){
			return $this->cli_nome;
		}
		public function setCli_nome($cli_nome){
			$this->cli_nome = $cli_nome;
		}
		public function getCli_datanasc(){
			return $this->cli_datanasc;
		}
		public function setCli_datanasc($cli_datanasc){
			$this->cli_datanasc = $cli_datanasc;
		}
		public function getCli_endereco(){
			return $this->cli_endereco;
		}
		public function setCli_endereco($cli_endereco){
			$this->cli_endereco = $cli_endereco;
		}
//-metodo--------------------------------------------------------------------------------------------------------
		public function __construct($login ="" , $rg = "", $cpf = "", $cnh ="", $nasc = "", $endereco = ""){
			$this->setCli_nome($login);
			$this->setRg($rg);
			$this->setCpf($cpf);
			$this->setCnh($cnh);
			$this->setCli_datanasc($nasc);
			$this->setCli_endereco($endereco);
		}
//-metodo--------------------------------------------------------------------------------------------------------
		public function setData($dados){

			$this->setId_clientes($dados['id_clientes']);
			$this->setCli_nome($dados['cli_nome']);
			$this->setRg($dados['cli_rg']);
			$this->setCpf($dados['cli_cpf']);
			$this->setCnh($dados['cli_cnh']);
			$this->setCli_datanasc($dados['cli_datanasc']);
			$this->setCli_endereco($dados['cli_endereco']);
		}
//-metodo--------------------------------------------------------------------------------------------------------
		public function loadById($id){
			$sql = new Sql();
			$results = $sql->select("SELECT * FROM tb_clientes WHERE id_clientes = :ID" , array(":ID"=>$id));
			if (count($results)> 0) {
				$this->setData($results[0]);
			}
		}
//-metodo--------------------------------------------------------------------------------------------------------
		public function login($login){
			$sql = new Sql();
			$results = $sql->select("SELECT * FROM tb_clientes WHERE cli_nome = :LOGIN" , array(
				":LOGIN"=>$login
		));
			if (count($results)> 0) {
				$this->setData($results[0]);
			} else {
				throw new Exception("Login Invalido!",1);
			}
		}
//-metodo--------------------------------------------------------------------------------------------------------
		public static function getList(){
			$sql = new Sql();

			return $sql->select("SELECT * FROM tb_clientes ORDER BY cli_nome;");
		}
//-metodo--------------------------------------------------------------------------------------------------------
		public static function search($login=""){
			$sql = new Sql();
			return $sql->select("SELECT * FROM tb_clientes WHERE cli_nome LIKE :SEARCH ORDER BY cli_nome", array(":SEARCH"=>"%".$login."%"));
		}
//-metodo--------------------------------------------------------------------------------------------------------
		public function insert(){
			$sql = new Sql();
			$results = $sql->select("CALL sp_clientes_insert(:NOME, :RG, :CPF, :CNH, :NASC, :ENDERECO)", array(
				':NOME'=>   $this->getCli_nome(),
				':RG'=>      $this->getRg(),
				':CPF'=>     $this->getCpf(),
				':CNH'=>     $this->getCnh(),
				':NASC'=>    $this->getCli_datanasc(),
				':ENDERECO'=>$this->getCli_endereco()
			));
			if (count($results)> 0) {
				$this->setData($results[0]);
			}
		}
//-metodo--------------------------------------------------------------------------------------------------------
		public function update($login, $senha){
			$this->setCli_nome($login);
			$this->setRg($senha);

			$sql = new Sql();
			$results = $sql->query("UPDATE tb_clientes SET cli_nome = :LOGIN, Rg = :PASSWORD WHERE id_clientes = :ID", array(
				":LOGIN"=>$this->getCli_nome(),
				":PASSWORD"=>$this->getRg(),
				":ID"=>$this->getId_clientes()
			));
		}
//-metodo--------------------------------------------------------------------------------------------------------
		public function delete(){
			$sql = new Sql();

			$sql->query("DELETE FROM tb_clientes WHERE id_clientes = :ID", array(
				":ID"=>$this->getId_clientes()
			));

			$this->setId_clientes(0);
			$this->setCli_nome("");
			$this->setRg("");
			$this->setcli_datanasc(new DateTime());
		}
//-metodo--------------------------------------------------------------------------------------------------------
		public static function somar($id=""){
			$sql = new Sql();
			return $sql->select("SELECT SUM(loc_valorlocacao) FROM tb_locacao WHERE id_clientes = :ID", array(":ID"=>$id));
		}
//-metodo--------------------------------------------------------------------------------------------------------

		public function __toString(){
			return json_encode(array(
				"id_clientes"=>$this->getId_clientes(),
				"cli_nome"=>$this->getCli_nome(),
				"Rg"=>$this->getRg(),
				"Cpf"=>$this->getCpf(),
				"Cnh"=>$this->getCnh(),
				"cli_datanasc"=>$this->getCli_datanasc(),
				"cli_endereco"=>$this->getCli_endereco()
			));
		}

	}

?>