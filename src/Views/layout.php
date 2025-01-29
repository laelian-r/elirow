<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="Viewsport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Elirow</title>
    <script src="https://kit.fontawesome.com/c1d0ab37d6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li>
                    <a href="/" class="logo">
                        <img class="logo" src="../img/logo.png" alt="logo"> Elirow
                    </a>
                </li>
                <?php
                    if (!isset($_SESSION["user"]["username"])) {
                        ?>
                            <li>
                                <a href="/">Inscription</a>
                            </li>

                            <li>
                                <a href="/">Connexion</a>
                            </li>
                        <?php
                    } else {
                        ?>
                            <li>
                                <a href="/catalogue">Accueil</a>
                            </li>

                            <li>
                                <a href="#">Compte</a>
                            </li>
                        <?php
                    }
                ?>
            </ul>
        </nav>
    </header>

    <main>
        <?= $content; ?>
    </main>

    <footer>
        <p>Elirow</p>
    </footer>
</body>
</html>
<?php
unset($_SESSION['error']);
unset($_SESSION['old']);