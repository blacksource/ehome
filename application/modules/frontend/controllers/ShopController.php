<?php

require_once APPLICATION_PATH.'/models/Shop.php';
require_once APPLICATION_PATH.'/models/Item.php';

class ShopController extends Zend_Controller_Action
{
	public function init()
	{
		$this->_helper->layout->setLayout('shop');		
	}

	public function indexAction()
	{
		$shopId = $this->_request->getParam('id');
		$shop = new Shop();
		$this->view->shop =$shop->getById($shopId);
		$item = new Item();
		$this->view->items = $item->getByShopId($shopId);
		$this->view->actionName = $this->_request->getActionName();
	}

	public function introAction()
	{
		$shopId = $this->_request->getParam('id');
		$shop = new Shop();
		$this->view->shop =$shop->getById($shopId);
		$this->view->actionName = $this->_request->getActionName();
	}

	public function productsAction()
	{
		$shopId = $this->_request->getParam('id');
		$shop = new Shop();
		$this->view->shop =$shop->getById($shopId);
		$item = new Item();
		$this->view->items = $item->getByShopId($shopId);
		$this->view->actionName = $this->_request->getActionName();
	}
}