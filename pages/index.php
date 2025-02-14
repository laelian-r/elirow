<!DOCTYPE html>
<html lang="fr">
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

        $sql = "
            SELECT * FROM articles
        ";
        $result = $db->query($sql);
        // $result->execute();
        ?>

        <section>
            <?php
            while ($i = $result->fetch()):
            ?>
                <form action="../pages/article.php?id=<?= $i['id_article'] ?>" method="post" enctype="multipart/form-data">
                    <div class="img">
                        <img src="../assets/images/<?= $i['image_article'] ?>">
                    </div>
                    <main>
                        <div class="titre-desc">
                            <a href="../pages/article.php?id=<?= $i['id_article'] ?>"><h2><?= $i['nom_article'] ?></h2></a>
                            <p class="description"><?= nl2br($i['description']) ?></p>
                        </div>

                        <hr>
                
                        <div class="infos">
                            <div class="prix-container">
                                <p>Prix de comparaison : </p>
                                <p class="base"><?= $i['prix_comparaison'] ?>€</p>
                                <p class="prix"><?= $i['prix'] ?>€</p>
                            </div>
            
                            <?php
                            if ($i['stock'] >= 1) {
                                echo '<p>Stock : <span class="stock-true">En stock</span></p>';
                            } else {
                                echo '<p>Stock : <span class="stock-false">Rupture de stock</span></p>';
                            }
                            ?>
                    
                            <input type="submit" value="Voir plus">
                        </div>
                    </main>
                </form>
            <?php endwhile; ?>
        </section>
</body>
</html>