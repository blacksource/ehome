<?php

require_once APPLICATION_PATH.'/models/Shop.php';

class ShopController extends Zend_Controller_Action
{
	public function init()
	{
		$this->_helper->layout->setLayout('shop');		
	}

	public function indexAction()
	{
		try {
			$shop = new Shop();
			$shop->fetchAll()->toArray();
			var_dump($shop);	
		} catch (Exception $e) {
			echo $e;
		}
		
	}

	public function introAction()
	{
		
	}

	public function productsAction()
	{

	}
}