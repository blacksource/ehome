<?php

require_once APPLICATION_PATH.'/models/Shop.php';
require_once APPLICATION_PATH.'/models/Item.php';
require_once APPLICATION_PATH.'/models/ItemImg.php';
require_once APPLICATION_PATH.'/models/Product.php';
require_once APPLICATION_PATH.'/models/ShopBadge.php';

class ProductController extends Zend_Controller_Action
{
	public function init()
	{
		$this->_helper->layout->setLayout('product');	
	}

	public function indexAction()
	{
		// get item info by itemId(iid)
		try {
			$iid = $this->_request->getParam('iid');
			$itemModel = new Item();
			$item = $itemModel->find($iid)->toArray();
			$this->view->item = $item[0];
			$itemImgModel = new ItemImg();
			$this->view->itemImgs = $itemImgModel->getByItemId($iid);
			// get products 
			$productModel = new Product();
			$this->view->products = $productModel->getByItemId($iid);
			var_dump($this->view->products);

			// get shop info	
			$shopId = $this->view->item["ShopId"];	
			$shop = new Shop();
			$this->view->shop =$shop->getById($shopId);
			$this->view->actionName = $this->_request->getActionName();
			// 

			$shopBadge = new ShopBadge();
			$this->view->badges = $shopBadge->getByShopId($shopId);
		
		} catch (Exception $e) {
			echo $e;	
		}
	}
}