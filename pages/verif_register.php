<?php
session_start();
include '../components/db_connect.php';

if (isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['mdp'])) {
    if (!empty($_POST['pseudo']) && $_POST['pseudo'] >= 3 && !empty($_POST['email']) && !empty($_POST['mdp'])) {
        session_destroy();

        $sql = "INSERT INTO utilisateurs (nom_utilisateur, email, password) VALUES (:pseudo, :email, :mdp)";
        $resultat = $db->prepare($sql);
        $resultat->execute(['pseudo' => $_POST["pseudo"], 'email' => $_POST["email"], 'mdp' => $_POST["mdp"]]);

        header('Location: ./index.php');
    } else {
        $_SESSION['old'] = $_POST;
        header('Location: ./register.php');
    }
}