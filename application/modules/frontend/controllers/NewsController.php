<?php

require_once APPLICATION_PATH.'/models/News.php';

class ChannelController extends Zend_Controller_Action
{
	public function init()
	{
		$this->_helper->layout->setLayout('product');	
	}

	public function indexAction()
	{
	}
}