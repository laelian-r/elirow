<?php
// Inclure la connexion à la base de données
include '../components/db_connect.php';
include '../components/navbar.php';

// Vérifier si un ID est passé en paramètre et s'il est valide
if (isset($_GET['id'])) {
    $id_article = $_GET['id'];

    // Préparer une requête SQL sécurisée
    $sql = "SELECT * FROM articles WHERE id_article = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$id_article]);

    // Récupérer l'article
    $article = $stmt->fetch();

    // Vérifier si l'article existe
    if (!$article) {
        echo "<p>Article introuvable.</p>";
        exit;
    }
} else {
    echo "<p>ID invalide.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($article['nom_article']); ?></title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    <section>
        <form class="article" method="post" enctype="multipart/form-data">
            <div class="img2">
                <img src="../assets/images/<?= $article['image_article'] ?>">
            </div>
            <main>
                <div class="titre-desc">
                    <h2><?= $article['nom_article'] ?></h2>
                    <p class="description"><?= nl2br($article['description']) ?></p>
                </div>

                <hr>
    
                <div class="infos">
                    <div class="prix-container">
                        <p>Prix de comparaison : </p>
                        <p class="base"><?= $article['prix_comparaison'] ?>€</p>
                        <p class="prix"><?= $article['prix'] ?>€</p>
                    </div>

                    <?php
                    if ($article['stock'] >= 1) {
                        echo '<p>Stock : <span class="stock-true">En stock</span></p>';
                    } else {
                        echo '<p>Stock : <span class="stock-false">Rupture de stock</span></p>';
                    }
                    ?>
          

                    <div class="qte">
                        <label for="qte<?= $article['id_article'] ?>">Quantité : </label>
                        <input type="number" name="qte" id="qte<?= $article['id_article'] ?>" value="0" min="0" max="<?= $article['stock'] ?>">
                    </div>
                    <input type="submit" value="Ajouter au panier">
                </div>
            </main>
        </form>
    </section>

</body>
</html>