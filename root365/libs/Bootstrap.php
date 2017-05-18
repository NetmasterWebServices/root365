<?php

class Bootstrap
{
	public function __construct() 
	{
		// 1. router
		$tokens = explode('/',rtrim($_SERVER['REQUEST_URI'], '/'));
		// echo '<pre>';
		// print_r($_SERVER);
		 //print_r($tokens);
		 $noOfTokens = count($tokens);
		 //echo  $noOfTokens;
		// echo '</pre>';

		// 2. Dispatcher
		if (isset($tokens[1])){
			$controllerName = ucfirst($tokens[1]);
		} else {
			$controllerName = "ErrorCtrl";
		}
		
		if (file_exists('controllers/'.$controllerName.'.php')) {
			require_once('controllers/'.$controllerName.'.php');
			$controller = new $controllerName;
			if (isset($tokens[2])) {
				$actionName = $tokens[2] . 'Action';

				$_tokens = array();

				for ($i=3; $i<= $noOfTokens - 1; $i++){
					$_tokens[] = $tokens[$i];
				}
				
				//print_r($_tokens);
				
				$tokenParams = implode (", ", $_tokens);

				$controller->{$actionName}($_tokens);

				//if(isset($tokens[4])) {
				//	$controller->{$actionName}($tokens[3],$tokens[4]);
				//}

				//else if (isset($tokens[3])) {
				//	$controller->{$actionName}($tokens[3]);	
				//}

				//else {
				//	
				//	$controller->{$actionName}();
				//}
			}
			else
			{
				// default action
				$controller->IndexAction();
			}				
		}
		else {
			require_once('controllers/Error.php');
			$controllerName = 'ErrorCtrl';
			$controller = new $controllerName;
			$controller->IndexAction();
		}		
	}
}