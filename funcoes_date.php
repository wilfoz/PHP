<?php 

	setlocale(LC_ALL, "pt_BR", "pt_BR.utf-8", "portuguese");
	echo ucwords(strftime("%A %B"));

	echo "</br></br>";

	$dt = new DateTime();

	$periodo = new DateInterval("P10D");

	echo $dt->format("d/m/Y H:i:s");

	$dt->add($perido);

	echo "</br></br>";

	echo $dt->format("d/m/Y H:i:s");

?>