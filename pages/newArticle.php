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
        <form action="./check_article.php" method="post" class="article-form" enctype="multipart/form-data">
            <h2>Nouvel article</h2>

            <label for="image">Image article</label>
            <input type="file" name="image" id="image">

            <label for="name">Nom article</label>
            <input type="text" name="name" id="name" value="<?php if(isset($_SESSION['old'])){ echo $_SESSION['old']['name'];} ?>">

            <label for="desc">Description</label>
            <textarea name="desc" id="desc" value="<?php if(isset($_SESSION['old'])){ echo $_SESSION['old']['desc'];} ?>"></textarea>

            <!-- Ici faire un select pour le modèle -->
            
            <label for="comparison_price">Prix initial</label>
            <input type="number" name="comparison_price" id="comparison_price" value="<?php if(isset($_SESSION['old'])) { echo $_SESSION['old']['comparison_price'];} ?>">

            <!-- Faire la réduction du prix et la mettre dans la bdd -->

            <?php
            // Fonction pour générer un numéro de série aléatoire
            function generateSerialNumber($length = 10) {
                return bin2hex(random_bytes($length / 2));
            }

            // Générer un numéro de série
            $serialNumber = generateSerialNumber();
            ?>

            <!-- Générer un numéro de série aléatoire directement dans l'input -->
            <label for="serial">Numéro de série</label>
            <input type="text" name="serial" id="serial" class="not-clickable" value="<?= $serialNumber; ?>">

            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" value="<?php if(isset($_SESSION['old'])) { echo $_SESSION['old']['stock'];} ?>">

            <input type="submit" name="submit" value="Ajouter l'article">
        </form>
    </main>
</body>
</html>