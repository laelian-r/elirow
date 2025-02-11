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
        <form action="./verif_register.php" method="post" class="auth-form" enctype="multipart/form-data">
            <h2>Inscription</h2>

            <label for="pseudo">Nom d'utilisateur</label>
            <input type="text" name="pseudo" id="pseudo" value="<?php if(isset($_SESSION['old'])){ echo $_SESSION['old']['pseudo'];} ?>">

            <label for="email">Addresse email</label>
            <input type="email" name="email" id="email" value="<?php if(isset($_SESSION['old'])) { echo $_SESSION['old']['email'];} ?>">

            <label for="mdp">Mot de passe</label>
            <input type="password" name="mdp" id="mdp" value="<?php if(isset($_SESSION['old'])) { echo $_SESSION['old']['mdp'];} ?>">

            <input type="submit" name="submit" value="S'incrire">
        </form>
    </main>
    
</body>
</html>