<?php
session_start();

if (isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['mdp'])) {
    if (!empty($_POST['pseudo']) && $_POST['pseudo'] >= 3 && !empty($_POST['email']) && !empty($_POST['mdp'])) {
        session_destroy();
        header('Location: ../index.php');
    } else {
        $_SESSION['old'] = $_POST;
        header('Location: ./register.php');
    }
}