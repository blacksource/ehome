<?php

require_once APPLICATION_PATH.'/models/News.php';

class NewsController extends Zend_Controller_Action
{
	public function init()
	{
		$this->_helper->layout->setLayout('article');	
	}

	public function indexAction()
	{
		$newsModel = new News();
		$this->view->news = $newsModel->getAll();
		$this->view->hots = $newsModel->getHot();
	}

	public function showAction()
	{
		$id = $this->_request->getParam('id');
		$newsModel = new News();
		$newsModel->addView($id, 1);
		$this->view->news = $newsModel->getById($id);
		$this->view->hots = $newsModel->getHot();
	}
}