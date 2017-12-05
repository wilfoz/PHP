<?php 

	namespace Hcode\Model;
	use \Hcode\Mailer;
	use \Hcode\DB\Sql;
	use \Hcode\Model;

	Class Category extends Model{

		public static function listAll(){
			$sql = new Sql();

			return $sql->select("SELECT * FROM tb_categories ORDER BY descategory");
		}


		public function save(){
			$sql = new Sql();

			$results = $sql->select("CALL sp_categories_save(:idcategory, :descategory)", array(
				":idcategory"=>$this->getidcategory(),
				":descategory"=>$this->getdescategory()
			));

			$this->setData($results[0]);

			Category::updateFile();
		}

		public function get($idcategory){
			$sql = new Sql();

			$results = $sql->select("SELECT * FROM tb_categories WHERE idcategory = :idcategory", [
				":idcategory"=>$idcategory
			]);

			$this->setData($results[0]);

		}

		public function delete(){
			$sql = new Sql();

			$sql->query("DELETE FROM tb_categories WHERE idcategory = :idcategory", [
				":idcategory"=>$this->getidcategory()
			]);

			Category::updateFile();
		}

		public static function updateFile(){
			$categories = Category::listAll();

			$html = [];

			foreach ($categories as $row) {
				array_push($html, '<li><a href="/categories/'.$row['idcategory'].'">'.$row['descategory'].'</a></li>');
			}

			file_put_contents($_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR. "views".DIRECTORY_SEPARATOR."categories-menu.html", implode('', $html));
		}

		public function getProducts($related = true)
		{

			$sql = new Sql();

			if ($related === true) {

				return $sql->select("
					SELECT * FROM tb_products WHERE idproduct IN (
						SELECT p.idproduct 
					    FROM tb_products p
						INNER JOIN tb_productscategories c
						ON p.idproduct = c.idproduct
						WHERE idcategory = :idcategory
				);

			", array(
				":idcategory"=>$this->getidcategory()
			));

			} else {

				return $sql->select("
					SELECT * FROM tb_products WHERE idproduct NOT IN (
						SELECT p.idproduct 
					    FROM tb_products p
						INNER JOIN tb_productscategories c
						ON p.idproduct = c.idproduct
						WHERE idcategory = :idcategory
					);
				", array(
				":idcategory"=>$this->getidcategory()
			));

			}
		}
		// metodo listagem site produtos
		public function getProductsPage($page =1, $itensPerPage = 4)
		{

			$start = ($page - 1) * $itensPerPage;

			$sql = new Sql();

			$results = $sql->select("
				SELECT SQL_CALC_FOUND_ROWS * 
					FROM tb_products a
					INNER JOIN tb_productscategories b
					ON a.idproduct = b.idproduct
					INNER JOIN tb_categories c
					ON c.idcategory = :idcategory
					LIMIT $start , $itensPerPage;

			", array(
				":idcategory"=>$this->getidcategory()
			));

			$resultsTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal");

			return [
				'data'=>Product::checkList($results),
				'total'=>(int)$resultsTotal[0]["nrtotal"],
				'pages'=>ceil($resultsTotal[0]["nrtotal"] / $itensPerPage )
			];

		}


		public function addProduct(Product $product)
		{

			$sql = new Sql();

			$sql->query("INSERT INTO tb_productscategories (idcategory, idproduct) VALUES (:idcategory, :idproduct)", array(
				":idcategory"=>$this->getidcategory(),
				":idproduct"=>$product->getidproduct()
			));
		}

		public function removeProduct(Product $product)
		{

			$sql = new Sql();

			$sql->query("DELETE FROM tb_productscategories WHERE idcategory = :idcategory AND idproduct = :idproduct", array(
				":idcategory"=>$this->getidcategory(),
				":idproduct"=>$product->getidproduct()
			));
		}
	}


?>