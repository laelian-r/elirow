<?php
session_start();
include '../components/db_connect.php';

if (
    isset($_FILES['image']['name']) && isset($_POST['name']) && isset($_POST['desc']) &&
    isset($_POST['comparison_price']) && isset($_POST['serial']) && isset($_POST['stock'])
) {
    if (
        !empty($_FILES['image']['name']) && !empty($_POST['name']) &&
        !empty($_POST['desc']) && !empty($_POST['comparison_price']) &&
        !empty($_POST['serial']) && !empty($_POST['stock'])
    ) {
        // Ne pas détruire la session pour garder l'utilisateur connecté

        $price = $_POST['comparison_price'] * (1 - 20/100);

        $sql = "INSERT INTO articles (image_article, nom_article, description, prix, prix_comparaison, no_serie, id_utilisateur, stock) VALUES (:image, :name, :desc, :price, :comparison_price, :serial, :id_user, :stock)";
        $resultat = $db->prepare($sql);
        $resultat->execute([
            'image' => $_FILES['image']['name'],
            'name' => $_POST['name'],
            'desc' => $_POST['desc'],
            'price' => $price,
            'comparison_price' => $_POST['comparison_price'],
            'serial' => $_POST['serial'],
            'id_user' => $_SESSION['id_utilisateur'],
            'stock' => $_POST['stock']
        ]);

        header('Location: ./index.php');
        exit();
    } else {
        $_SESSION['old'] = $_POST;
        header('Location: ./newArticle.php');
        exit();
    }
}