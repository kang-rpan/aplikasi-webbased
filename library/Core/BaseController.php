<?php
abstract class BaseController 
{
	protected $_registry;
	
	protected $view;
	
	public function __construct($registry) {
		$this->_registry = $registry;
		$this->view = $registry->template;
	}
	
	public function __destruct()
	{	
		$this->view->dispatch();
	}
	
	abstract public function index();
}
?>
