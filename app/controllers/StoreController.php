<?php
namespace controllers;
 use models\Product;
 use models\Section;
 use Ubiquity\attributes\items\router\Route;
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
        $this->repo->all('', ['products']);
        $compte = DAO::count(Product::class);
		$this->loadView('StoreController/index.html', ["count" => $compte]);
	}

    #[Route(path: "section/{idSection}",name: "section.section")]
    public function section($idSection){
        $this->repo->byId( $idSection, ['section', 'products']);
        $this->loadView('StoreController/section.html');
    }
}
