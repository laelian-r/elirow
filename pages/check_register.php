<?php
session_start();
include '../components/db_connect.php';

if (
    isset($_POST['username'], $_POST['phone'], $_POST['email'], $_POST['mdp'], 
          $_POST['address'], $_POST['city'], $_POST['postal_code'])
) {
    $username = trim($_POST['username']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $password = $_POST['mdp'];
    $address = trim($_POST['address']);
    $city = trim($_POST['city']);
    $postal_code = trim($_POST['postal_code']);

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Validation des champs
    if (empty($username) || strlen($username) < 3 || 
        empty($phone) || empty($email) || 
        empty($password) || empty($address) || 
        empty($city) || empty($postal_code)) {
        
        $_SESSION['error'] = "Veuillez remplir tous les champs correctement.";
        $_SESSION['old'] = $_POST;
        header('Location: ./register.php');
        exit();
    }

    // Vérification si l'email existe déjà
    $checkEmail = $db->prepare("SELECT COUNT(*) FROM utilisateurs WHERE email = ?");
    $checkEmail->execute([$email]);
    if ($checkEmail->fetchColumn() > 0) {
        $_SESSION['error'] = "Cet email est déjà utilisé.";
        $_SESSION['old'] = $_POST;
        header('Location: ./register.php');
        exit();
    }

    // Hachage du mot de passe
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Gestion de l'upload d'image
    $image_path = null;
    if (!empty($_FILES['profile_pic']['name'])) {
        $upload_dir = '../uploads/';
        $file_name = time() . "_" . basename($_FILES['profile_pic']['name']);
        $target_file = $upload_dir . $file_name;

        if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target_file)) {
            $image_path = $file_name;
        }
    }

    // Insertion dans la base de données
    $sql = "INSERT INTO utilisateurs (image, nom_utilisateur, numero_telephone, email, password, adresse, ville, code_postal, id_role) 
            VALUES (:image, :username, :phone, :email, :mdp, :address, :city, :postal_code, :id_role)";
    $stmt = $db->prepare($sql);
    $stmt->execute([
        'image' => $image_path,
        'username' => $username,
        'phone' => $phone,
        'email' => $email,
        'mdp' => $hashed_password,
        'address' => $address,
        'city' => $city,
        'postal_code' => $postal_code,
        'id_role' => 2
    ]);

    // Nettoyage de session et redirection
    unset($_SESSION['old']);
    $_SESSION['success'] = "Inscription réussie. Vous pouvez vous connecter.";
    header('Location: ./index.php');
    exit();
} else {
    $_SESSION['error'] = "Une erreur est survenue. Veuillez réessayer.";
    header('Location: ./register.php');
    exit();
}