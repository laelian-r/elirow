<?php
// session_start(); // Supprimez cette ligne

if (isset($_SESSION['id_utilisateur'])) {
    $user_id = $_SESSION['id_utilisateur'];
    $query = "SELECT id_role FROM utilisateurs WHERE id_utilisateur = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$user_id]);
    $user = $stmt->fetch();

    if ($user) {
        $user_role = $user['id_role'];
    } else {
        $user_role = null; // Si l'utilisateur n'est pas trouvé
    }
} else {
    $user_role = null; // Si l'utilisateur n'est pas connecté
}
?>

<nav>
    <ul>
        <li>
            <a href="../pages/index.php">Accueil</a>
        </li>
        <?php if (!isset($_SESSION['id_utilisateur'])): ?>
        <li>
            <a href="../pages/login.php">Connexion</a>
        </li>
        <li>
            <a href="../pages/register.php">Inscription</a>
        </li>
        <?php else: ?>
        <li>
            <a href="../pages/logout.php">Déconnexion</a>
        </li>
        <?php endif; ?>

        <?php if (isset($_SESSION['id_utilisateur']) && $user_role == 1): ?>
        <li>
            <a href="../pages/newArticle.php">Nouvel article</a>
        </li>
        <?php endif; ?>
    </ul>
</nav>