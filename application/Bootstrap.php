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

