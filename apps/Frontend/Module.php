<?php

namespace Application\Frontend;

use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\DiInterface;
use Phalcon\Mvc\Dispatcher;

class Module {
	/**
     * 注册自定义加载器
     */
	public function registerAutoloaders($di){
		$loader = new Loader();
		
		$loader->registerNamespaces(array(
			'Application\Frontend\Controllers'=> __DIR__ . '/Controllers/',
			'Application\Frontend\Models'=> __DIR__ . '/Models/' 
		));
		
		$loader->register();
	}
	
	/**
     * 注册自定义服务
     */
	public function registerServices($di){
		// Registering a dispatcher
		$dispatcher = $di->get('dispatcher');
		$dispatcher->setDefaultNamespace("Application\Frontend\Controllers");
		$di->set('dispatcher', $dispatcher);
		// Registering the view component
		$view = $di->get('view');
		$view->setViewsDir(__DIR__ . '/Views/');
		$di->set('view', $view);
	}
}