<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php
        session_start();
        include '../components/db_connect.php';
        include '../components/navbar.php';
    ?>

    <main class="form-container">
        <form action="./check_login.php" method="post" class="auth-form">
            <h2>Connexion</h2>

            <label for="username">Nom d'utilisateur</label>
            <input type="text" name="username" id="username" placeholder="John Doe" value="<?php if(isset($_SESSION['old'])){ echo htmlspecialchars($_SESSION['old']['username']);} ?>">

            <label for="email">Adresse email</label>
            <input type="email" name="email" id="email" placeholder="johndoe@email.com" value="<?php if(isset($_SESSION['old'])){ echo htmlspecialchars($_SESSION['old']['email']);} ?>">

            <label for="mdp">Mot de passe</label>
            <input type="password" name="mdp" id="mdp" placeholder="••••••••">

            <input type="submit" value="Se connecter">
        </form>
        <?php if(isset($_SESSION['error'])): ?>
            <p style="color: red;"><?php echo htmlspecialchars($_SESSION['error']); ?></p>
        <?php endif; ?>
    </main>
</body>
</html>