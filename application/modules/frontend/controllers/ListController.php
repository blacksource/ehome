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
		$cid = $this->_request->getParam('cid');
		$categoryModel = new Category();
		// get big category id
		$categories = $categoryModel->find($cid);
		$this->view->currentClass = $categories[0]["ClassId1"];
		switch ($this->view->currentClass) {
			case "1":
				$this->view->currentClassName = "住宅家具";
				break;
			case "2":
				$this->view->currentClassName = "家纺布艺";
				break;
			case "3":
				$this->view->currentClassName = "家居饰品";
				break;
			case "4":
				$this->view->currentClassName = "家装主材";
				break;
			case "5":
				$this->view->currentClassName = "五金电工";
				break;
			default:
				break;
		}
		// get current categories by bigclassid
		$this->view->categories = $categoryModel->getByClass1($this->view->currentClass);
		// get all items by leaf class		
		$itemModel = new Item();
		$this->view->items = $itemModel->getByLeafClass($cid);		
	}
}