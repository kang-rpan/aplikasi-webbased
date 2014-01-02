<?php
class IndexController extends BaseController {

	public function index() 
	{
		$this->view->title = 'Kategori';
		$this->view->data = Category::getData();
	}

}

?>
