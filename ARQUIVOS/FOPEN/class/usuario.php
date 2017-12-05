<?php 

	class Usuario {
		private $idusuario;
		private $deslogin;
		private $dessenha;
		private $dtcadastro;
//-metodos-set-get-------------------------------------------------------------------------------------------------------------------------------------
		public function getIdusuario(){
			return $this->idusuario;
		}
		public function setIdusuario($idusuario){
			$this->idusuario = $idusuario;
		}

		public function getDeslogin(){
			return $this->deslogin;
		}
		public function setDeslogin($deslogin){
			$this->deslogin = $deslogin;
		}

		public function getDessenha(){
			return $this->dessenha;
		}
		public function setDessenha($dessenha){
			$this->dessenha = $dessenha;
		}

		public function getDtcadastro(){
			return $this->dtcadastro;
		}
		public function setDtcadastro($dtcadastro){
			$this->dtcadastro = $dtcadastro;
		}
//-metodo------------------------------------------------------------------------------------------------------------------------------------------
		public function __construct($login ="" , $senha = ""){
			$this->setDeslogin($login);
			$this->setDessenha($senha);
		}
//-metodo------------------------------------------------------------------------------------------------------------------------------------------
		public function setData($dados){

			$this->setIdusuario($dados['idusuario']);
			$this->setDeslogin($dados['deslogin']);
			$this->setDessenha($dados['dessenha']);
			$this->setDtcadastro(new DateTime($dados['dt']));
		}
//-metodo------------------------------------------------------------------------------------------------------------------------------------------
		public function loadById($id){
			$sql = new Sql();
			$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID" , array(":ID"=>$id));
			if (count($results)> 0) {
				$this->setData($results[0]);
			}
		}
//-metodo------------------------------------------------------------------------------------------------------------------------------------------
		public function login($login, $password){
			$sql = new Sql();
			$results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD" , array(
				":LOGIN"=>$login,
				":PASSWORD"=>$password
		));
			if (count($results)> 0) {
				$this->setData($results[0]);
			} else {
				throw new Exception("Login e/ou Senha Invalidos!",1);
			}
		}
//-metodo------------------------------------------------------------------------------------------------------------------------------------------
		public static function getList(){
			$sql = new Sql();

			return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin;");
		}
//-metodo------------------------------------------------------------------------------------------------------------------------------------------
		public static function search($login){
			$sql = new Sql();
			return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(":SEARCH"=>"%".$login."%"));
		}
//-metodo------------------------------------------------------------------------------------------------------------------------------------------	
		public function insert(){
			$sql = new Sql();

			$results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(
				':LOGIN'=>$this->getDeslogin(),
				':PASSWORD'=>$this->getDessenha()
			));

			if (count($results)> 0) {
				$this->setData($results[0]);
			}
		}
//-metodo------------------------------------------------------------------------------------------------------------------------------------------
		public function update($login, $senha){
			$this->setDeslogin($login);
			$this->setDessenha($senha);

			$sql = new Sql();
			$results = $sql->query("UPDATE tb_usuarios SET deslogin = :LOGIN, dessenha = :PASSWORD WHERE idusuario = :ID", array(
				":LOGIN"=>$this->getDeslogin(),
				":PASSWORD"=>$this->getDessenha(),
				":ID"=>$this->getIdusuario()
			));
		}
//-metodo------------------------------------------------------------------------------------------------------------------------------------------
		public function delete(){
			$sql = new Sql();

			$sql->query("DELETE FROM tb_usuarios WHERE idusuario = :ID", array(
				":ID"=>$this->getIdusuario()
			));

			$this->setIdusuario(0);
			$this->setDeslogin("");
			$this->setDessenha("");
			$this->setDtcadastro(new DateTime());
		}
//-metodo------------------------------------------------------------------------------------------------------------------------------------------
		public function __toString(){
			return json_encode(array(
				"idusuario"=>$this->getIdusuario(),
				"deslogin"=>$this->getDeslogin(),
				"dessenha"=>$this->getDessenha(),
				"dt"=>$this->getDtcadastro()
			));
		}

	}

?>