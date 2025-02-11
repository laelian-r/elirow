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
        include '../components/db_connect.php';
        include '../components/navbar.php';
    ?>

    <main class="form-container">
        <form action="../index.php" method="post" class="auth-form">
            <h2>Inscription</h2>

            <label for="pseudo">Nom d'utilisateur</label>
            <input type="text" name="pseudo" id="pseudo" required>

            <label for="email">Addresse email</label>
            <input type="email" name="email" id="email" required>

            <label for="mdp">Mot de passe</label>
            <input type="password" name="mdp" id="mdp" required>

            <input type="submit" value="S'incrire">
        </form>
    </main>
    
</body>
</html>