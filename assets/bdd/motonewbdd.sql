-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 01 sep. 2021 à 15:46
-- Version du serveur :  10.4.19-MariaDB
-- Version de PHP : 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `motonewbdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_categorie`, `nom_categorie`) VALUES
(1, 'moto'),
(2, 'equipement'),
(3, 'goodie');

-- --------------------------------------------------------

--
-- Structure de la table `inclut`
--

CREATE TABLE `inclut` (
  `id_produit` int(11) NOT NULL,
  `id_panier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id_panier` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id_panier`, `id_utilisateur`, `id_produit`) VALUES
(1, 4, 28),
(5, 8, 9),
(6, 6, 19),
(7, 3, 28),
(10, 4, 9),
(11, 4, 6),
(12, 4, 34),
(13, 4, 34),
(14, 6, 35),
(15, 6, 13);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id_produit` int(11) NOT NULL,
  `nom_produit` varchar(50) DEFAULT NULL,
  `image_produit` varchar(50) DEFAULT NULL,
  `description_produit` text DEFAULT NULL,
  `prix_produit` decimal(15,2) DEFAULT NULL,
  `date_publication` datetime DEFAULT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id_produit`, `nom_produit`, `image_produit`, `description_produit`, `prix_produit`, `date_publication`, `id_categorie`) VALUES
(5, 'Honda 125 2 temps', 'honda.jpg', 'Cette honda est extrêmement légère. De puissance modérée, elle conviendra à tout débutant de poids léger.', '1199.89', '2021-07-21 12:13:15', 1),
(6, 'Kawasaki 250 4 temps', 'kawasaki2.jpg', 'Cette Kawasaki, un peu moins légère, conviendra plus à quelqu\'un d\'un peu plus fort et lourd. la linéarité du 4 temps améliorera les reprises en bas régime moteur, la rendant un peu plus polyvalente, bien que plus lourde.', '1496.64', '2021-07-21 12:16:35', 1),
(7, 'Yamaha 250 2 temps', 'yamaha.jpg', 'Légère et très puissante, on entre ici dans la catégorie au dessus, le 250 2 temps.\r\nIl s\'agit d\'une moto complexe à maîtriser pour des utilisateurs plus chevronnés.\r\nCette version Yamaha a fait ses preuves.', '2899.95', '2021-07-21 12:17:44', 1),
(8, 'KTM 350 4 temps', 'ktm.jpg', 'Dans la même catégorie que la 250 2 temps, Cette version KTM 350 est d\'une rare efficacité. En effet, on arrive à la croisée des chemins entre la puissance et le couple du 450 et la légèreté du 2 temps 250. Cette moto intermédiaire offre un couple et des performances impressionnantes entre les mains d\'un pilote expérimenté maîtrisant au minimum parfaitement le 25O 2 temps.\r\nOn entre ici entre dans une catégorie exigeante physiquement et techniquement.', '4990.50', '2021-07-21 12:18:50', 1),
(9, 'Yamaha 450 4 temps', 'YZ.jpg', 'Une monstrueuse moto pour de monstrueux pilotes !', '8996.76', '2021-07-21 12:21:12', 1),
(10, 'Casque JUST Noir-jaune fluo', 'casque-noir.jpg', 'Superbe casque ultra résistant pour être protégé tout en ayant du style !', '94.50', '2021-07-21 14:59:46', 2),
(11, 'Casque rose', 'casque-rose.jpg', 'Casque pour les filles ou les hommes de l\'autre bord pour garder un peu de féminité tout en étant badass !!', '91.99', '2021-07-21 15:01:37', 2),
(12, 'Casque Cyan', 'casque-cyan.jpg', 'Un casque ultra badass pour un protection sans faille, Là tu peux le tenter le saut qui te faisait peur car maintenant, peur tu n\'auras plus !', '99.90', '2021-07-21 15:03:44', 2),
(13, 'Tee-shirt Moto-Cross Kawasaki', 't-shirt-kawasaki.jpg', 'Superbe tee-shirt offert uniquement pour l\'achat d\'une moto-cross Kawasaki !', '52.99', '2021-07-21 15:12:17', 3),
(19, 'KTM 450', 'ktm2.jpg', 'Une Superbe KTM préparée pour la course, pour des bêtes de pilotes !', '10050.99', NULL, 1),
(21, 'Casque Kawasaki', 'casque-vert.jpg', 'Un casque ultra résistant avec un design incroyable !', '151.99', NULL, 2),
(26, 'Casque bleu', 'casque-bleu.jpeg', 'Un casque ultra résistant avec un design incroyable !', '150.99', NULL, 2),
(28, 'Honda 450 4 temps', 'honda2.jpg', 'Une incroyable moto pour un incroyable pilote !', '10150.99', NULL, 1),
(34, 'Casque rouge', 'casque-rouge.png', 'Un superbe casque ultra design et ultra résistant, pour un pilote de haut niveau !', '152.99', NULL, 2),
(35, 'Tee-shirt moto-cross Yamaha', 't-shirt-yamaha.jpg', 'Un superbe T-shirt offert pour l\'achat d\'une moto-cross Yamaha', '53.98', NULL, 3),
(36, 'Tee-shirt KTM', 't-shirt-ktm.jpg', 'un superbe t-shirt Offert pour l\'achat d\'une moto-cros KTM', '52.98', NULL, 3),
(37, 'Casque vert Kawasaki', 'casque-vert.jpg', 'Un casque ultra résistant avec un design incroyable pour de terribles pilotes !', '151.99', NULL, 2);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL,
  `pseudo` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mot_de_passe` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `pseudo`, `email`, `mot_de_passe`, `is_admin`) VALUES
(3, 'Melodie', 'melodie@gmail.com', '$2y$10$hWRcM.73KA2.dNaQVfR6Se3NfjVUt6Y2B3JmJFM1xlBAvBYPqqTG6', NULL),
(4, 'Dev_IV', 'dev_iv@gmail.com', '$2y$10$NhmsJGlAvojMCGSlZG/.TuCoEpNJhIqtXtMkO1CcYQSGerxWquXbe', 1),
(6, 'Neo', 'neo@gmail.com', '$2y$10$0YI7mAcMjMh70yJPgt3UM.Rke4OtfrLC/0IhWwXwfYgH3ET/1UXd2', NULL),
(8, 'Pauline', 'pauline@gmail.com', '$2y$10$dvixYhqD/CR34VYwui5wF.I9BUC6RXaa1u4y4D96M5dM3mnU1z2yO', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `inclut`
--
ALTER TABLE `inclut`
  ADD PRIMARY KEY (`id_produit`,`id_panier`),
  ADD KEY `id_panier` (`id_panier`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id_panier`),
  ADD KEY `panier_ibfk_2` (`id_produit`),
  ADD KEY `id_utilisateur` (`id_utilisateur`) USING BTREE;

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id_produit`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD UNIQUE KEY `pseudo` (`pseudo`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id_panier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `inclut`
--
ALTER TABLE `inclut`
  ADD CONSTRAINT `inclut_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id_produit`),
  ADD CONSTRAINT `inclut_ibfk_2` FOREIGN KEY (`id_panier`) REFERENCES `panier` (`id_panier`);

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`),
  ADD CONSTRAINT `panier_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id_produit`);

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id_categorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;