<?php
	
	use \Hcode\Model\User;
	use \Hcode\Model\Cart;

	function formatPrice($vlprice)
	{
		if (!$vlprice > 0) {
			
			$vlprice = 0;
		}
		
		return number_format($vlprice, 2,",", ".");

	}

	function checkLogin($inadmin = true)
	{

		return User::checkLogin($inadmin);

	}

	function getUserName()
	{

		$user = User::getFromSession();

		return $user->getdesperson();

	}

	function getCarNrQtd()
	{
		$cart = Cart::getFromSession();

		$totals = $cart->getProductsTotals();

		return $totals['nrqtd'];
	}

	function getCarVlSubTotal()
	{
		$cart = Cart::getFromSession();

		$totals = $cart->getProductsTotals();

		return formatPrice($totals['vlprice']);
	}

	function formatDate($date)
	{

		return date('d/m/y', strtotime($date));

	}

?>