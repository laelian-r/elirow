<?php
namespace Elirow\Controllers;

use Elirow\Models\HomeManager;
use Elirow\Validator;

class HomeController {
    private $manager;

    public function __construct() {
        $this->manager = new HomeManager();
    }

    public function index() {
        $data = $this->manager->all();
        require VIEWS . 'Elirow/homepage.php';
    }

    public function viewArticle($id_article) {
        $data = $this->manager->getArticleById($id_article);
        require VIEWS . 'Elirow/article.php';
    }
}