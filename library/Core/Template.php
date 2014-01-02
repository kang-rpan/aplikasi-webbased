<?php
class Template 
{
	private $_registry;

	private $vars = array();
	
	private $path;	
	
	private $_norender = false;

	public function __construct($registry) {
		$this->_registry = $registry;
	}

	public function __set($index, $value)
	{
		$this->vars[$index] = $value;
	}
	
	public function setPath($path) {

		if (is_dir($path) == false)
		{
			throw new Exception ('Invalid template path: `' . $path . '`');
		}
		
		$this->path = $path;
	}
	
	public function load($file)
	{
		foreach ($this->vars as $key => $value){
			$$key = $value;
		}	
		include $this->path . '/' . $file;
	}	
	
	public function setNoRender($norender = true)
	{
		$this->_norender = $norender;
	}

	public function dispatch() 
	{
		if($this->_norender)
			return;
			
		foreach ($this->vars as $key => $value){
			$$key = $value;
		}			
		
		$body = $this->path . '/' . $this->_registry->router->controller . '/' . $this->_registry->router->action . '.php';
		if (file_exists($body) == false){
			throw new Exception('Template not found in '. $body);
			return false;
		}
		
		include ($body); 			             
	}

}

?>
