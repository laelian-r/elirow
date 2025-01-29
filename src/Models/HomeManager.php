<?php
namespace Elirow\Models;

use Elirow\Models\Home;
/** Class HomeManager **/
class HomeManager {

    private $bdd;
    
    public function __construct($id_article = null) {
        $this->bdd = new \PDO('mysql:host='.HOST.';dbname=' . DATABASE . ';charset=utf8;' , USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function getBdd() {
        return $this->bdd;
    }

    public function all() {
        $stmt = $this->bdd->query('SELECT * FROM articles');
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Elirow\Models\Home");
    }

    public function getArticleById($id_article) {
        $stmt = $this->bdd->prepare('SELECT * FROM articles WHERE id_article = :id_article');
        $stmt->bindParam(':id_article', $id_article, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject("Phoenix\Models\Home");
    }
}