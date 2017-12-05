<?php  

	abstract class Animal {
		public function falar(){
			return "fala";
		}
		public function move(){
			return "anda";
		}
	}

	class Cachorro extends Animal {
		public function falar(){
			return "late";
		}
	}
	class Gato extends Animal {
		public function falar(){
			return "mia";
		}
	}

	class Passaro extends Animal{
		public function falar(){
			return "canta";
		}
		public function move(){
			return "voa e ".parent::move();
		}
	}

	$pluto = new Cachorro();
	echo $pluto->falar()."<br>";
	echo $pluto->move()."<br>";

	echo "-----------------"."<br>";

	$garfild = new Gato();
	echo $garfild->falar()."<br>";
	echo $garfild->move()."<br>";

	echo "-----------------"."<br>";

	$galinha = new Passaro();
	echo $galinha->falar()."<br>";
	echo $galinha->move()."<br>";

?>