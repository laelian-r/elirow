<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php
        session_start();
        include '../components/db_connect.php';
        include '../components/navbar.php';
    ?>
    <main class="form-container">
        <form action="./check_article.php" method="post" class="auth-form" enctype="multipart/form-data">
            <h2>Inscription</h2>

            <label for="image">Photo de profil</label>
            <input type="file" name="image" id="image">

            <label for="username">Nom d'utilisateur</label>
            <input type="text" name="username" id="username" value="<?php if(isset($_SESSION['old'])){ echo $_SESSION['old']['username'];} ?>" placeholder="John Doe">

            <label for="phone">Numéro de téléphone</label>
            <input type="tel" name="phone" id="phone" value="<?php if(isset($_SESSION['old'])) { echo $_SESSION['old']['phone'];} ?>" placeholder="0601020304">

            <label for="email">Addresse email</label>
            <input type="email" name="email" id="email" value="<?php if(isset($_SESSION['old'])) { echo $_SESSION['old']['email'];} ?>" placeholder="johndoe@email.com">

            <label for="mdp">Mot de passe</label>
            <input type="password" name="mdp" id="mdp" value="<?php if(isset($_SESSION['old'])) { echo $_SESSION['old']['mdp'];} ?>" placeholder="••••••••">

            <label for="address">Adresse</label>
            <input type="text" name="address" id="address" value="<?php if(isset($_SESSION['old'])) { echo $_SESSION['old']['address'];} ?>" placeholder="123 Rue de la Paix">

            <label for="city">Ville</label>
            <input type="text" name="city" id="city" value="<?php if(isset($_SESSION['old'])) { echo $_SESSION['old']['city'];} ?>" placeholder="Paris">

            <label for="postal_code">Code postal</label>
            <input type="text" name="postal_code" id="postal_code" value="<?php if(isset($_SESSION['old'])) { echo $_SESSION['old']['postal_code'];} ?>" placeholder="75000">

            <input type="submit" name="submit" value="S'incrire">
        </form>
    </main>
</body>
</html>