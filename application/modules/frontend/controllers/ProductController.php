<?php

require_once APPLICATION_PATH.'/models/Shop.php';
require_once APPLICATION_PATH.'/models/Item.php';
require_once APPLICATION_PATH.'/models/ShopBadge.php';

class ProductController extends Zend_Controller_Action
{
	public function init()
	{
		$this->_helper->layout->setLayout('shop');	
	}

	public function indexAction()
	{
		// get item info by itemId(iid)
		try {
			$iid = $this->_request->getParam('iid');
			$itemModel = new Item();
			$item = $itemModel->find($iid)->toArray();
			$item = $item[0];
		
			$shopId = $item["ShopId"];	
			$shop = new Shop();
			$this->view->shop =$shop->getById($shopId);
			// $item = new Item();
			$this->view->actionName = $this->_request->getActionName();

			$shopBadge = new ShopBadge();
			$this->view->badges = $shopBadge->getByShopId($shopId);
		
		} catch (Exception $e) {
			echo $e;	
		}
	}
}