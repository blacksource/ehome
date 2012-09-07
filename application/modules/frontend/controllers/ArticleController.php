<?php

require_once APPLICATION_PATH.'/models/Article.php';

class ArticleController extends Zend_Controller_Action
{
	public function init()
	{
		$this->_helper->layout->setLayout('article');
	}

	public function indexAction()
	{
		$articleModel = new Article();
		$this->view->articles = $articleModel->getAll();
		$this->view->hots = $articleModel->getHot();
		$this->view->currentClassName = "装修宝典";
	}

	public function showAction()
	{
		$id = $this->_request->getParam('id');
		$articleModel = new Article();
		$articleModel->addView($id, 1);
		$this->view->article = $articleModel->getById($id);
		$this->view->hots = $articleModel->getHot();
		$this->view->currentClassName = "装修宝典";
	}
}