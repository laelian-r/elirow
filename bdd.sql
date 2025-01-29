-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 29 jan. 2025 à 17:25
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_elie`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id_article` int NOT NULL AUTO_INCREMENT,
  `image_article` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nom_article` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_modele` int NOT NULL,
  `prix` int NOT NULL,
  `prix_comparaison` int NOT NULL,
  `no_serie` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_ajout` datetime NOT NULL,
  `id_utilisateur` int NOT NULL,
  `stock` int NOT NULL,
  PRIMARY KEY (`id_article`),
  UNIQUE KEY `Nom_article` (`nom_article`),
  UNIQUE KEY `No série` (`no_serie`),
  KEY `id_modele` (`id_modele`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id_article`, `image_article`, `nom_article`, `description`, `id_modele`, `prix`, `prix_comparaison`, `no_serie`, `date_ajout`, `id_utilisateur`, `stock`) VALUES
(1, 'ecran.png', 'Ecran PC - HP V27i - 27\" FHD - Dalle IPS - 5 ms - 60 Hz - HDMI / VGA', '* Type d\'affichageEcran LCD à rétroéclairage LED / matrice active TFT\n* InterfacesVGA, 3 x USB 3.2 Gen 1, HDMI\n* Résolution nativeFull HD (1080p) 1920 x 1080 à 60 Hz\n* Temps de réponse5 ms (gris-à-gris)', 1, 90, 150, '1', '2025-01-14 19:06:18', 2, 0),
(4, 'clavier.png', 'Clavier gaming sans fil - ASUS - ROG AZOTH - RGB - N Key Rollover - Programmable', '* Clavier\n* InterfaceUSB 2.0, Bluetooth 5.1, RF 2.4GHz\n* Fonction de raccourcis clavierAll Keys Programmable\n* TechnologieSans fil', 1, 40, 50, '2', '2025-01-28 21:13:46', 2, 10);

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id_commande` int NOT NULL AUTO_INCREMENT,
  `no_commande` int NOT NULL,
  `no_serie` varchar(20) NOT NULL,
  `id_article` int NOT NULL,
  `id_utilisateur` int NOT NULL,
  PRIMARY KEY (`id_commande`),
  UNIQUE KEY `no_commande` (`no_commande`),
  KEY `no_serie` (`no_serie`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_article` (`id_article`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `modeles`
--

DROP TABLE IF EXISTS `modeles`;
CREATE TABLE IF NOT EXISTS `modeles` (
  `id_modele` int NOT NULL AUTO_INCREMENT,
  `modele` varchar(20) NOT NULL,
  PRIMARY KEY (`id_modele`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `modeles`
--

INSERT INTO `modeles` (`id_modele`, `modele`) VALUES
(1, 'Test');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id_role` int NOT NULL AUTO_INCREMENT,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id_role`, `role`) VALUES
(1, 'Administrateur'),
(2, 'Utilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id_utilisateur` int NOT NULL AUTO_INCREMENT,
  `image` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nom_utilisateur` varchar(20) NOT NULL,
  `email` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `numero_telephone` int NOT NULL,
  `password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `adresse` varchar(20) NOT NULL,
  `ville` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `code_postal` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_inscription` datetime NOT NULL,
  `id_role` int NOT NULL,
  PRIMARY KEY (`id_utilisateur`),
  UNIQUE KEY `nom_utilisateur` (`nom_utilisateur`),
  UNIQUE KEY `Email` (`email`),
  KEY `id_role` (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `image`, `nom_utilisateur`, `email`, `numero_telephone`, `password`, `adresse`, `ville`, `code_postal`, `date_inscription`, `id_role`) VALUES
(2, NULL, 'Laélian', 'laelian.roux@gmail.c', 662720545, 'laelian', '85 rue Docteur Frapp', 'Villeurbanne', '69100', '2025-01-14 19:05:13', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`id_modele`) REFERENCES `modeles` (`id_modele`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `articles` (`id_article`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `commandes_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `commandes_ibfk_3` FOREIGN KEY (`no_serie`) REFERENCES `articles` (`no_serie`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `utilisateurs_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
