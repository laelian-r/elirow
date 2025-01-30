<?php
namespace Elirow\Models;

/** Class Home **/
class Home {
    private $id_article;
    private $image_article;
    private $nom_article;
    private $description;
    // -------------------------
    private $id_modele;     // |
    // -------------------------
    private $prix;
    private $prix_comparaison;
    // -------------------------
    private $no_serie;       // |
    private $date_ajout;     // |
    private $id_utilisateur; // |
    // -------------------------
    private $stock;

    public function getId() {
        return $this->id_article;
    }

    public function getImage() {
        return $this->image_article;
    }

    public function getName() {
        return $this->nom_article;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPrice() {
        return $this->prix;
    }

    public function getComparisonPrice() {
        return $this->prix_comparaison;
    }

    public function getStock() {
        return $this->stock;
    }
    

    public function setId(int $id_article) {
        $this->id_article = $id_article;
    }

    public function setImage(string $image_article) {
        $this->image_article = $image_article;
    }

    public function setName(string $nom_article) {
        $this->nom_article = $nom_article;
    }

    public function setDescription(string $description) {
        $this->description = $description;
    }

    public function setPrice(int $prix) {
        $this->prix = $prix;
    }

    public function setComparisonPrice(int $prix_comparaison) {
        $this->prix_comparaison = $prix_comparaison;
    }

    public function setStock(int $stock) {
        $this->stock = $stock;
    }
}