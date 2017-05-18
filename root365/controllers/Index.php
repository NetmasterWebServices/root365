<?php
require_once 'libs/Controller.php';
require_once 'models/User.php';

class Index extends Controller
{
	public function indexAction($params)
	{
		$user = new User();
		
		$this->view->message = 'Hello World from Index controller index action!' . $params[0];
		$this->view->render('views/index/index.phtml');
	}
}