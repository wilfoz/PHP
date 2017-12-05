<?php 

	interface Veiculo {

		public function acelerar($velocidade);
		public function frenar($velocidade);
		public function trocarMarcha($marcha);
	}

	class Carro implements Veiculo{

		public function acelerar($velocidade){
			echo "O veiculo acelerou ate ".$velocidade." km/hora";
		}
		public function frenar($velocidade){
			echo "O veiculo freiou a uma velocidade de ".$velocidade." km/hora";
		}
		public function trocarMarcha($marcha){
			echo "A marcha do carro e  ".$marcha;
		}
	}  

	$civic = new Carro();

	$civic->acelerar(52);
	echo "<br>";
	$civic->frenar(62);
	echo "<br>";
	$civic->trocarMarcha(4);

?>