<?php
ob_start();

$sql = "
    SELECT * FROM articles
";
$result = $db->query($sql);
// $result->execute();
?>

<section>
    <?php
    // foreach ($data as $row):
    ?>
    <!-- <form action="article.php?id=<?= $row->getId() ?>" method="post" enctype="multipart/form-data">
        <div class="img">
            <img src="../img/<?= $row->getName() ?>">
        </div>
        <main>
            <div class="titre-desc">
                <a href="article.php?id=<?= $row->getId() ?>"><h2><?= $row->getName() ?></h2></a>
                <p class="description"><?= nl2br($row->getDescription()) ?></p>
            </div>

            <hr>
                
            <div class="infos">
                <div class="qte">
                    <label for="qte<?= $row->getId() ?>">Quantité : </label>
                    <input type="number" name="qte" id="qte<?= $row->getId() ?>" value="1" min="1" max="<?= $row->getStock() ?>">
                </div>
                
                            
                <div class="prix-container">
                    <p>Prix de comparaison : </p>
                    <p class="base"><?= $row->getComparisonPrice() ?>€</p>
                    <p class="prix"><?= $row->getPrice() ?>€</p>
                </div> -->
    
    <?php
        // if ($row->getStock() >= 1) {
        //     echo '<p>Stock : <span class="stock-true">En stock</span></p>';
        // } else {
        //     echo '<p>Stock : <span class="stock-false">Rupture de stock</span></p>';
        // }
    ?>
                    
                <!-- <input type="submit" value="Voir plus">
            </div>
        </main>
    </form> -->
    <?php
    // endforeach;
    ?>
<!-- </section> -->

<h1>Article <?= $data->getName() ?></h1>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';