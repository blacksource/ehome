<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	protected function _initRouter()
    {
		//Zend_Controller_Action_HelperBroker::addPrefix('Jacobi_Helper');
		$frontController = Zend_Controller_Front::getInstance();
		$frontController->addModuleDirectory('../application/modules');
		$frontController->setDefaultModule('frontend');
		$router = $frontController->getRouter();

		$router->addRoute('index',
                  new Zend_Controller_Router_Route('/', 
                  					array('controller' => 'index',
                  							'action' => 'index')));

		/*shop begin*/
		$router->addRoute('shop', new Zend_Controller_Router_Route_Regex(
		    'shop/(\d+)\.html',
		    array(
		        'controller' => 'shop',
		        'action'     => 'index'
		    ),
		    array(1 => 'id'),
		    '%s.html'
		));

		$router->addRoute('shop_intro', new Zend_Controller_Router_Route_Regex(
		    'shop/(\d+)\/intro.html',
		    array(
		        'controller' => 'shop',
		        'action'     => 'intro'
		    ),
		    array(1 => 'id'),
		    '%s.html'
		));

		$router->addRoute('shop_products', new Zend_Controller_Router_Route_Regex(
		    'shop/(\d+)\/products.html',
		    array(
		        'controller' => 'shop',
		        'action'     => 'products'
		    ),
		    array(1 => 'id'),
		    '%s.html'
		));
		/*shop end*/

		/*list start*/
		$router->addRoute('channel', new Zend_Controller_Router_Route_Regex(
		    '(shipin|jiaju|jiafang|jiazhuang|wujin).html',
		    array(
		        'controller' => 'channel',
		        'action'     => 'index'
		    ),
		    array(1 => 'name'),
		    '%s.html'
		));

		$router->addRoute('list', new Zend_Controller_Router_Route_Regex(
		    'list/([a-zA-Z-_0-9-]+).html',
		    array(
		        'controller' => 'list',
		        'action'     => 'index'
		    ),
		    array(1 => 'cid'),
		    '%s.html'
		));
		/*list end*/

		/*product start*/
		$router->addRoute('product', new Zend_Controller_Router_Route_Regex(
		    'product/([a-zA-Z-_0-9-]+).html',
		    array(
		        'controller' => 'product',
		        'action'     => 'index'
		    ),
		    array(1 => 'iid'),
		    '%s.html'
		));
		/*product end*/

		/*article begin*/
		$router->addRoute('news', new Zend_Controller_Router_Route_Regex(
		    'news/(\d+)\.html',
		    array(
		        'controller' => 'news',
		        'action'     => 'show'
		    ),
		    array(1 => 'id'),
		    '%s.html'
		));

		$router->addRoute('zhuangxiu', new Zend_Controller_Router_Route(
			'zhuangxiu.html',
			array('controller'=>'article', 'action'=>'index'))
		);

		$router->addRoute('zhuangxiu_show', new Zend_Controller_Router_Route_Regex(
		    'zhuangxiu/(\d+)\.html',
		    array(
		        'controller' => 'article',
		        'action'     => 'show'
		    ),
		    array(1 => 'id'),
		    '%s.html'
		));
		/*article end*/
	}

    protected function _initLayoutHelper()
	{
		try {
			$this->bootstrap('frontController');
		} catch (Exception $e) {
			echo  $e;
		}
		
	}

}

