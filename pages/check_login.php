<?php
session_start();
include '../components/db_connect.php';

if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['mdp'])) {
    if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['mdp'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['mdp'];

        // Log des valeurs reçues
        error_log("Username: $username, Email: $email, Password: $password");

        $sql = "SELECT id_utilisateur, nom_utilisateur, email, password FROM utilisateurs WHERE nom_utilisateur = :username AND email = :email AND password = :password";
        $resultat = $db->prepare($sql);
        $resultat->execute([
            'username' => $username,
            'email' => $email,
            'password' => $password
        ]);

        $user = $resultat->fetch(PDO::FETCH_ASSOC);

        // Log de la requête SQL exécutée
        error_log("SQL Query: $sql with params: username=$username, email=$email, password=$password");

        if ($user) {
            // Connexion réussie
            $_SESSION['id_utilisateur'] = $user['id_utilisateur'];
            $_SESSION['username'] = $user['nom_utilisateur'];
            header('Location: ./index.php');
            exit();
        } else {
            // Connexion échouée
            $_SESSION['error'] = "Nom d'utilisateur, email ou mot de passe incorrect.";
            $_SESSION['old'] = $_POST;
            header('Location: ./login.php');
            exit();
        }
    } else {
        $_SESSION['error'] = "Veuillez remplir tous les champs.";
        $_SESSION['old'] = $_POST;
        header('Location: ./login.php');
        exit();
    }
} else {
    header('Location: ./login.php');
    exit();
}
?>