<?php
namespace controllers;
 /**
  * Controller HelloController
  */
class HelloController extends \controllers\ControllerBase{

	public function index(){
		echo "Hello World";
	}

	
	public function showMessage($msg){
		echo $msg;
	}

}
