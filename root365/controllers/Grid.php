<?php
require_once 'libs/Controller.php';
require_once 'models/Grid.php';

class Grid extends Controller
{
	public function indexAction($params)
	{
		$grid = new Grd();
		
		$this->view->message = 'Grid controller index action!' . $params[0];
		$this->view->render('views/grid/index.phtml');
	}

	public function viewAction($params)
	{
		$grid = new Grd();

		$gridDetails = $grid->getGridDetails($params[0]);

		$parameters = "Parameters: ";
		foreach ($params as $p){
			$parameters .= $p .' ';
		}

		$this->view->message = '<b style="color:blue;">Grid</b> controller 
			<b style="color:blue;">view</b> action! <br/> ' . $parameters . '<br/>'. $gridDetails ;

		$this->view->render('views/grid/index.phtml');
	}
}