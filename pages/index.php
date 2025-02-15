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
        
        if (isset($_SESSION['id_utilisateur'])) {
            $user_id = $_SESSION['id_utilisateur'];
            $query = "SELECT image, id_role FROM utilisateurs WHERE id_utilisateur = ?";
            $stmt = $db->prepare($query);
            $stmt->execute([$user_id]);
            $user = $stmt->fetch();

            if ($user) {
                $user_role = $user['id_role'];
                $image = $user['image'];
            } else {
                $user_role = null;
                $image = null;
            }
        } else {
            $user_role = null;
            $image = null;
        }
        ?>

        <section>
            <?php
            while ($i = $result->fetch()):
            ?>
                <form action="../pages/article.php?id=<?= $i['id_article'] ?>" method="post" enctype="multipart/form-data">
                    <div class="img">
                        <img src="../assets/images/<?= $i['image_article'] ?>">
                    </div>
                    <div class="container-main">
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

                            <?php if (isset($_SESSION['id_utilisateur']) && $user_role == 1): ?>
                                <!-- <hr> -->
                                <div class="admin-btn">
                                    <button class="edit"><i class="fa-solid fa-pen"></i>Modifier</button>
                                    <button class="delete"><i class="fa-solid fa-trash"></i>Supprimer</button>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                </form>
            <?php endwhile; ?>
        </section>
</body>
</html>