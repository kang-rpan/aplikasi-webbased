<?php
class ProductController extends BaseController 
{
	public function index() 
	{
		$this->view->title = 'Buku';
		$this->view->data = Product::getData();
	}
	
	public function category() 
	{
		$id = $this->_registry->router->getQuery();
		
		$data2 = array();
		$data = Product::getData();
		foreach($data as $row){
			if($row['id_cat'] == $id){
				$data2[] = $row;
			}
		}
		
		$this->view->title = 'Buku';
		$this->view->category = $data[$id-1];
		$this->view->data = $data2;
	}

	public function view()
	{
		$id = $this->_registry->router->getQuery();
		$id = $id-1;
		
		$data = Product::getData();
		
		$this->view->title = 'Buku'.$data[$id]['title'];
		$this->view->product = $data[$id]['title'];
		$this->view->description = $data[$id]['description'];
	}

}
?>
