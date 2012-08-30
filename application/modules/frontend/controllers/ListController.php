<?php

require_once APPLICATION_PATH.'/models/Item.php';
require_once APPLICATION_PATH.'/models/Category.php';

class ListController extends Zend_Controller_Action
{
	public function init()
	{
		$this->_helper->layout->setLayout('list');	
	}

	public function indexAction()
	{
		try {
		$categoryModel = new Category();
		$this->view->categories = $categoryModel->getByClass1(1);
		$itemModel = new Item();
		$this->view->items = $itemModel->getByShopId(1);	
		} catch (Exception $e) {
			echo $e;
		}
			
	}
}