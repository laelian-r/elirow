<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php
        session_start();
        include '../components/db_connect.php';
        include '../components/navbar.php';
    ?>

    <main class="form-container">
        <form action="./check_register.php" method="post" class="auth-form" enctype="multipart/form-data">
            <h2>Inscription</h2>

            <label for="profile_pic">Photo de profil</label>
            <input type="file" name="profile_pic" id="profile_pic">

            <label for="username">Nom d'utilisateur</label>
            <input type="text" name="username" id="username" placeholder="John Doe" 
                   value="<?php echo isset($_SESSION['old']['username']) ? htmlspecialchars($_SESSION['old']['username']) : ''; ?>">

            <label for="phone">Numéro de téléphone</label>
            <input type="text" name="phone" id="phone" placeholder="0601020304" 
                   value="<?php echo isset($_SESSION['old']['phone']) ? htmlspecialchars($_SESSION['old']['phone']) : ''; ?>">

            <label for="email">Adresse email</label>
            <input type="email" name="email" id="email" placeholder="johndoe@email.com" 
                   value="<?php echo isset($_SESSION['old']['email']) ? htmlspecialchars($_SESSION['old']['email']) : ''; ?>">

            <label for="mdp">Mot de passe</label>
            <input type="password" name="mdp" id="mdp" placeholder="••••••••">

            <label for="address">Adresse</label>
            <input type="text" name="address" id="address" placeholder="123 Rue de la Paix" 
                   value="<?php echo isset($_SESSION['old']['address']) ? htmlspecialchars($_SESSION['old']['address']) : ''; ?>">

            <label for="city">Ville</label>
            <input type="text" name="city" id="city" placeholder="Paris" 
                   value="<?php echo isset($_SESSION['old']['city']) ? htmlspecialchars($_SESSION['old']['city']) : ''; ?>">

            <label for="postal_code">Code postal</label>
            <input type="text" name="postal_code" id="postal_code" placeholder="75000" 
                   value="<?php echo isset($_SESSION['old']['postal_code']) ? htmlspecialchars($_SESSION['old']['postal_code']) : ''; ?>">

            <input type="submit" value="S'inscrire">
        </form>
        
        <?php if(isset($_SESSION['error'])): ?>
            <p style="color: red;"><?php echo htmlspecialchars($_SESSION['error']); ?></p>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>
    </main>
</body>
</html>