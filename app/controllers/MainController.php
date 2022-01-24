<?php
namespace controllers;
 use Ubiquity\attributes\items\router\Get;
 use Ubiquity\attributes\items\router\Route;

 /**
  * Controller MainController
  */
 #[Route('main', automated: true)]
 class MainController extends \controllers\ControllerBase{

	public function index(){
        $a='Titre';
        $page=5;
		$this->loadDefaultView(compact('a','page'));
	}

    #[Get('test/{p}', name:'test')]
    public function Test($p){
        echo $p;
    }

    public function autre(){

    }
}
