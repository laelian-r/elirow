<?php
session_start();
include '../components/db_connect.php';

if (
    isset($_POST['username']) && isset($_POST['phone']) && isset($_POST['email']) && 
    isset($_POST['mdp']) && isset($_POST['address']) && isset($_POST['city']) && 
    isset($_POST['postal_code'])
) {
    if (
        !empty($_POST['username']) && $_POST['username'] >= 3 && 
        !empty($_POST['phone']) && !empty($_POST['email']) && 
        !empty($_POST['mdp']) && !empty($_POST['address']) &&
        !empty($_POST['city']) && !empty($_POST['postal_code'])
    ) {
        session_destroy();

        $sql = "INSERT INTO utilisateurs (image, nom_utilisateur, numero_telephone, email, password, adresse, ville, code_postal, id_role) VALUES (:image, :username, :phone, :email, :mdp, :address, :city, :postal_code, :id_role)";
        $resultat = $db->prepare($sql);
        $resultat->execute([
            'image' => $_FILES['image']['name'],
            'username' => $_POST["username"],
            'phone' => $_POST["phone"],
            'email' => $_POST["email"],
            'mdp' => $_POST["mdp"],
            'address' => $_POST["address"],
            'city' => $_POST["city"],
            'postal_code' => $_POST["postal_code"],
            'id_role' => 2
        ]);

        header('Location: ./index.php');
    } else {
        $_SESSION['old'] = $_POST;
        header('Location: ./register.php');
    }
}