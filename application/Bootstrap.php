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

