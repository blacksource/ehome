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
		// $shopId = $this->_request->getParam('id');
		$shop = new Shop();
		$shopModel = $shop->find(1)->toArray();
		$this->view->shop =$shopModel[0];
	}

	public function introAction()
	{
		
	}

	public function productsAction()
	{

	}
}