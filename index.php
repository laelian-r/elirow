<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <?php
        include 'db_connect.php';

        $sql = "
            SELECT * FROM articles
        ";
        $result = $db->query($sql);
        // $result->execute();
        ?>

        <section>
            <?php
            while ($i = $result->fetch()) {
                echo '
                    <form method="post" enctype="multipart/form-data">
                        <div class="img">
                            <img src="./assets/images/' . $i['image_article'] . '">
                        </div>
                        <hr>
                        <main>
                            <h2>' . $i['nom_article'] . '</h2>
                            <p>' . $i['description'] . '</p>
                
                            <label for="qte">Quantité : </label>
                            <input type="number" name="qte" id="qte" value="1" min="1" max="' . $i['stock_restant'] . '">
                
                            <p>Prix : ' . $i['prix'] . '€</p>
                ';
            
                if ($i['stock'] == 1) {
                    echo '<p>Stock: <span class="stock-true">En stock</span></p>';
                } else {
                    echo '<p>Stock: <span class="stock-false">Rupture de stock</span></p>';
                }
            
                echo '
                            <input type="submit" value="Acheter">
                        </main>
                    </form>
                ';
            }
            ?>
        </section>
</body>
</html>