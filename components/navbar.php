<?php
if (isset($_SESSION['id_utilisateur'])) {
    $user_id = $_SESSION['id_utilisateur'];
    $query = "SELECT image, nom_utilisateur, id_role FROM utilisateurs WHERE id_utilisateur = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$user_id]);
    $user = $stmt->fetch();

    if ($user) {
        $user_role = $user['id_role'];
        $image = $user['image'];
        $username = $user['nom_utilisateur'];
    } else {
        $user_role = null;
        $image = null;
        $username = null;
    }
} else {
    $user_role = null;
    $image = null;
    $username = null;
}
?>

<head>
    <link 
        rel="stylesheet" 
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" 
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" 
        crossorigin="anonymous" 
        referrerpolicy="no-referrer" 
    />
</head>

<nav>
    <ul>
        <div class="links">
            <li>
                <a href="../pages/index.php"><i class="fa-solid fa-house"></i>Accueil</a>
            </li>
            <?php if (!isset($_SESSION['id_utilisateur'])): ?>
                <li>
                    <a href="../pages/login.php"><i class="fa-solid fa-right-to-bracket"></i>Connexion</a>
                </li>
                <li>
                    <a href="../pages/register.php"><i class="fa-solid fa-user-plus"></i>Inscription</a>
                </li>
            <?php else: ?>
                <li>
                    <a href="#"><i class="fa-solid fa-cart-shopping"></i>Mon panier</a>
                </li>
        
                <?php if (isset($_SESSION['id_utilisateur']) && $user_role == 1): ?>
                    <li>
                        <a href="../pages/newArticle.php"><i class="fa-solid fa-plus"></i>Nouvel article</a>
                    </li>
                <?php endif; ?>
            <?php endif; ?>
        </div>

        <?php if (isset($_SESSION['id_utilisateur']) && $image): ?>
        <!-- <div class="profile-picture-container">
            <p><?= $username; ?></p>
            <img src="../assets/profile-pictures/<?php echo $image; ?>" alt="<?= $image; ?>" class="profile-picture">
        </div> -->

        <div class="dropdown-container">
            <div class="link-icon-container">
                <p class="profile-picture-container"><img src="../assets/profile-pictures/<?php echo $image; ?>" alt="<?= $image; ?>" class="profile-picture"><?= $username; ?></p>
                <i class="fa-solid fa-caret-down"></i>
            </div>
            <div class="dropdown-content">
                <a href="#"><i class="fa-solid fa-user"></i>Profil</a>
                <a href="#"><i class="fa-solid fa-clock-rotate-left"></i></i>Commandes</a>
                <a href="../pages/logout.php"><i class="fa-solid fa-power-off"></i>Déconnexion</a>
            </div>
        </div>
        <?php endif; ?>
    </ul>
</nav>
