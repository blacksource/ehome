<?php

require_once APPLICATION_PATH.'/models/Item.php';
require_once APPLICATION_PATH.'/models/Category.php';

class ChannelController extends Zend_Controller_Action
{
	public function init()
	{
		$this->_helper->layout->setLayout('list');	
	}

	public function indexAction()
	{
		$channelName = $this->_request->getParam('name');
		$classId = '1';
		switch ($channelName) {
			case 'jiaju':
				$classId = '1';
				$this->view->currentClassName = "住宅家具";
				break;
			case 'jiafang':
				$classId = '2';
				$this->view->currentClassName = "家纺布艺";
				break;
			case 'shipin':
				$classId = '3';
				$this->view->currentClassName = "家居饰品";
				break;
			case 'jiazhuang':
				$classId = '4';
				$this->view->currentClassName = "家装主材";
				break;
			case 'wujin':
				$classId = '5';
				$this->view->currentClassName = "五金电工";
				break;
			case 'zhuangxiu':
				$classId = '6';
				break;
			default:
				break;
		}

		$this->view->currentClass = $classId;
		$categoryModel = new Category();
		$this->view->categories = $categoryModel->getByClass1($classId);
		$itemModel = new Item();
		$this->view->items = $itemModel->getByBigClass($classId);	
	}
}