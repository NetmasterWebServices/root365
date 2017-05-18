<?php
require_once 'libs/Controller.php';

class Hello extends Controller
{
	public function indexAction($id = 0)
	{
		$this->view->hello = 'Hello World from Hello Controller Index action!';
		$this->view->render('views/hello/index.phtml');
	}
}