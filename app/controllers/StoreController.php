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
    private ViewRepository $repo2;

    public function initialize() {
        parent::initialize();
        $this->repo??=new ViewRepository($this,Section::class);
        $this->repo2??=new ViewRepository($this,Product::class);
    }

	public function index(){
        $this->repo->all('', ['products']);
        $compte = DAO::count(Product::class);
		$this->loadView('StoreController/index.html', ["count" => $compte]);
	}

    #[Route(path: "section/{idSection}",name: "section.section")]
    public function section($idSection){
        $sec = "Section";
        $this->repo->byId( $idSection, ['section', 'products']);
        $this->loadView('StoreController/section.html', ["sec" => $sec]);
    }

    #[Route(path: "allProducts",name: "allProducts")]
    public function allProducts(){
        $this->repo2->all();
        $compte = DAO::count(Product::class);
        $ref = "références";
        $titre = "Tous les produits";
        $this->loadView('StoreController/section.html', ["count" => $compte, "ref" => $ref, 'titre' => $titre]);
    }
}
