<?php
ob_start();
?>

<section>
    <div class="articles-container">
        <?php
        foreach ($data as $row):
            ?>
            <form action="/article/<?= $row->getId() ?>" method="post" enctype="multipart/form-data">
                <div class="img">
                    <img src="../img/<?= $row->getImage() ?>" alt="<?= $row->getName() ?>">
                </div>
                <main>
                    <div class="titre-desc">
                        <a href=""><h2><?= $row->getName() ?></h2></a>
                        <p class="description"><?= nl2br($row->getDescription()) ?></p>
                    </div>
    
                    <hr>
                        
                    <div class="infos">           
                        <div class="prix-container">
                            <p>Prix de comparaison : </p>
                            <p class="base"><?= $row->getComparisonPrice() ?>€</p>
                            <p class="prix"><?= $row->getPrice() ?>€</p>
                        </div>
            
            <?php
                if ($row->getStock() >= 1) {
                    echo '<p>Stock : <span class="stock-true">En stock</span></p>';
                } else {
                    echo '<p>Stock : <span class="stock-false">Rupture de stock</span></p>';
                }
            ?>
                            
                        <input type="submit" value="Voir plus">
                    </div>
                </main>
            </form>
            <?php endforeach;?>
    </div>
    
</section>
    
    <div class="auth-container">
    <form class="auth-form" action="/" method="post" enctype="multipart/form-data">
            <h2>Inscription</h2>
            
            <label for="username">Nom d'utilisateur</label>
            <input type="text" name="username" id="username" required>
            
            <label for="email">Addresse email</label>
            <input type="email" name="email" id="email" required>
            
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" required>

            <input type="submit" value="S'inscrire">
        </form>

        <hr>

        <form class="auth-form" action="/" method="post" enctype="multipart/form-data">
            <h2>Connexion</h2>

            <label for="username">Nom d'utilisateur</label>
            <input type="text" name="username" id="username" required>
            
            <label for="email">Addresse email</label>
            <input type="email" name="email" id="email" required>
            
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" required>
            
            <input type="submit" value="Se connecter">
        </form>
    </div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';