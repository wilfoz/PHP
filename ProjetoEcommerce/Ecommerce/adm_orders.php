<?php 

use \Hcode\PageAdm;
use \Hcode\Model\User;
use \Hcode\Model\Order;
use \Hcode\Model\OrderStatus;

$app->get("/adm/orders/:idorder/status", function($idorder){

	User::verifyLogin();

	$order = new Order();

	$order->get((int)$idorder);

	$page = new PageAdm();

	$page->setTpl("order-status", [
		'order'=>$order->getValues(),
		'status'=>OrderStatus::listAll(),
		'msgSuccess'=>Order::getSuccess(),
		'msgError'=>Order::getError()
	]);

});

$app->post("/adm/orders/:idorder/status", function($idorder){

	User::verifyLogin();

	if (!isset($_POST['idstatus']) || empty((int)$_POST['idstatus'])) {
		Order::setError("Informe o status atual.");	
		header("Location: /adm/orders/".$idorder."/status");
		exit;
	}

	$order = new Order();

	$order->get((int)$idorder);

	$order->setidstatus((int)$_POST['idstatus']);

	$order->save();

	Order::setSuccess("Status atualizado.");
	header("Location: /adm/orders/".$idorder."/status");
	exit;

});


$app->get("/adm/orders/:idorder/delete", function($idorder){

	User::verifyLogin();

	$order = new Order();

	$order->get((int)$idorder);

	$order->delete();

	header("Location: /adm/orders");
	exit;

});

$app->get("/adm/orders/:idorder", function($idorder){

	User::verifyLogin();

	$order = new Order();

	$order->get((int)$idorder);

	$cart = $order->getCart();

	$page = new PageAdm();

	$page->setTpl("order", [
		'order'=>$order->getValues(),
		'cart'=>$cart->getValues(),
		'products'=>$cart->getProducts()
	]);

});

$app->get("/adm/orders" , function(){

	User::verifyLogin(false);

	$page = new PageAdm();

	$page->setTpl("orders", [
		'orders'=>Order::listAll()
	]);

});

?>