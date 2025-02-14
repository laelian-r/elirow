<?php
// include '../components/db_connect.php';
// session_start();

// $user_id = $_SESSION['id_utilisateur'];
// $query = "SELECT role FROM utilisateurs WHERE id = ?";
// $stmt = $pdo->prepare($query);
// $stmt->execute([$user_id]);
// $user = $stmt->fetch();

// $user_role = $user['id_role'];
?>

<nav>
    <ul>
        <li>
            <a href="../pages/index.php">Accueil</a>
        </li>
        <li>
            <a href="../pages/login.php">Connexion</a>
        </li>
        <li>
            <a href="../pages/register.php">Inscription</a>
        </li>
        <?php // if ($user_role == 1): ?>
        <li>
            <a href="../pages/newArticle.php">Creer un article</a>
        </li>
        <?php // endif; ?>
    </ul>
</nav>