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
				break;
			case 'jiafang':
				$classId = '2';
				break;
			case 'shipin':
				$classId = '3';
				break;
			case 'jiazhuang':
				$classId = '4';
				break;
			case 'wujin':
				$classId = '5';
				break;
			case 'zhuangxiu':
				$classId = '6';
				break;
			default:
				break;
		}
		$categoryModel = new Category();
		$this->view->categories = $categoryModel->getByClass1($classId);
		$itemModel = new Item();
		$this->view->items = $itemModel->getByShopId(1);	
	}
}