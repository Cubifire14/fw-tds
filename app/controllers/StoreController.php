<?php
namespace controllers;
 use models\Product;
 use models\Section;
 use Ubiquity\orm\DAO;
 use Ubiquity\orm\repositories\ViewRepository;

 /**
  * Controller StoreController
  */
class StoreController extends \controllers\ControllerBase{

    private ViewRepository $repo;

    public function initialize() {
        parent::initialize();
        $this->repo??=new ViewRepository($this,Section::class);
    }

	public function index(){
        $this->repo->all();
        $compte = DAO::count(Product::class);
		$this->loadView('StoreController/index.html', ["count" => $compte]);
	}
}
