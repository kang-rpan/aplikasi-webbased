<?php
class Router 
{
	private $registry;

	private $path;

	private $args = array();

	private $file;
	
	public $route;

	public $controller;

	public $action; 

	public function __construct($registry) {
		$this->registry = $registry;
	}

	/**
	*
	* @set controller directory path
	*
	* @param string $path
	*
	* @return void
	*
	*/
	public function setPath($path) {

		/*** check if path i sa directory ***/
		if (is_dir($path) == false)
		{
			throw new Exception ('Invalid controller path: `' . $path . '`');
		}
		/*** set the path ***/
		$this->path = $path;
	}


	/**
	*
	* @get the controller
	*
	* @access private
	*
	* @return void
	*
	*/
	private function getController() 
	{
		/*** get the route from the url ***/
		$page = rtrim($_GET['page'], '/');
		$route = (empty($page)) ? 'index' : $page;
		$this->route = explode('/', $route);
		
		$this->controller = (isset($this->route[0])) ? $this->route[0] : 'index';
		$this->action = (isset($this->route[1])) ? $this->route[1] : 'index';

		/*** set the file path ***/
		$this->file = $this->path .'/'. ucfirst($this->controller) . 'Controller.php';
	}


	/**
	*
	* @load the controller
	*
	* @access public
	*
	* @return void
	*
	*/
	public function loader()
	{
		/*** check the route ***/
		$this->getController();

		/*** if the file is not there diaf ***/
		if (is_readable($this->file) == false)
		{
			$this->file = $this->path.'/PageController.php';
			$this->controller = 'page';
			$this->action = 'notfound'; //404
		}

		/*** include the controller ***/
		include $this->file;

		/*** a new controller class instance ***/
		$class = $this->controller . 'Controller';
		$controller = new $class($this->registry);

		/*** check if the action is callable ***/
		if (is_callable(array($controller, $this->action)) == false){
			$action = 'index';
		}
		else{
			$action = $this->action;
		}
		
		/*** run the action ***/
		$controller->$action();
	}
	
	public function getQuery()
	{
		return end($this->route);
	}


}

?>
