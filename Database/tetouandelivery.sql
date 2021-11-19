-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 17 déc. 2020 à 20:31
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tetouandelivery`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id` int(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `email`) VALUES
(2, 'tetouandelivery5@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_compagnie`
--

CREATE TABLE `categorie_compagnie` (
  `idCategorie` int(20) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie_compagnie`
--

INSERT INTO `categorie_compagnie` (`idCategorie`, `nom`, `image`) VALUES
(1, 'SuperMarche', 'superMarche.png'),
(2, 'Restaurant', 'restaurant.jpg'),
(3, 'Pharmacie', 'pharmacie.png');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_produit`
--

CREATE TABLE `categorie_produit` (
  `idCatProduit` int(30) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `nom_compagnie` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie_produit`
--

INSERT INTO `categorie_produit` (`idCatProduit`, `nom`, `nom_compagnie`) VALUES
(1, 'Ingrédients de cuisine', 'Marjane,Carrefour,Acima'),
(2, 'Boissons', 'Marjane,Carrefour,Acima'),
(3, 'Petit déjeuner', 'Marjane,Carrefour,Acima'),
(4, 'Nettoyage', 'Marjane,Carrefour,Acima'),
(5, 'Féculents', 'Marjane,Carrefour,Acima'),
(6, 'Sandwichs', 'Mcdonalds'),
(7, 'Petits faims', 'Mcdonalds'),
(10, 'Boissons', 'Mcdonalds'),
(11, 'Frites', 'Mcdonalds'),
(12, 'Sauces', 'Mcdonalds'),
(13, 'McCafé', 'Mcdonalds'),
(14, 'Burgers', 'Burger King'),
(15, 'Snaks', 'Burger King'),
(16, 'Boissons', 'Burger King'),
(17, 'Desserts', 'Burger King'),
(18, 'Entrées', 'Pizza Hut'),
(19, 'Pizzas ', 'Pizza Hut'),
(20, 'Desserts', 'Pizza Hut'),
(21, 'Boissons ', 'Pizza Hut'),
(22, 'Parapharmacie', 'Marjane'),
(23, 'Vitamines', 'Rif,Afassi,Nakhil'),
(24, 'Solaires - Anti-taches', 'Rif,Afassi,Nakhil');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` text NOT NULL,
  `mot_de_passe` text NOT NULL,
  `code_activation_utilisateur` varchar(250) NOT NULL,
  `email_statut_utilisateur` enum('not verified','verified','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `prenom`, `email`, `mot_de_passe`, `code_activation_utilisateur`, `email_statut_utilisateur`) VALUES
(1, 'amrani', 'nesrine', 'nesrineamr114@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '3efa65e6c13a3d65f08754ab33325733', 'verified'),
(2, 'TetDelivery', 'TetDelivery', 'tetouandelivery5@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '49fe954ebea9cb95e25dc2d88c488103', 'verified');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `telephone` text NOT NULL,
  `email` text NOT NULL,
  `adresse` text NOT NULL,
  `date` datetime NOT NULL,
  `statut` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `id_client`, `nom`, `prenom`, `telephone`, `email`, `adresse`, `date`, `statut`) VALUES
(1, 1, 'amrani', 'nesrine', '0606060606', 'nesrineamr114@gmail.com', 'av des far', '2020-06-29 19:34:31', 1),
(2, 1, 'amrani', 'nesrine', '0606060606', 'nesrineamr114@gmail.com', 'av des far', '2020-06-29 21:25:45', 0),
(3, 1, 'kharraz', 'khadija', '0689789809', 'el.kharraz2019@gmail.com', 'heloo fnideq', '2020-07-01 22:06:28', 0),
(4, 1, 'amrani', 'soufina', '0689789805', 'soufian123@gmail.com', 'Avenue Mars 2 Tetouan NR 5', '2020-07-04 17:21:58', 0);

-- --------------------------------------------------------

--
-- Structure de la table `commande_produit`
--

CREATE TABLE `commande_produit` (
  `id` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `code_produit` varchar(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande_produit`
--

INSERT INTO `commande_produit` (`id`, `id_commande`, `code_produit`, `quantite`) VALUES
(1, 1, 'AMK34', 3),
(2, 2, 'AMK34', 2),
(3, 2, 'QW22', 2),
(4, 3, 'NGL54', 1),
(5, 3, 'SJH23', 1),
(6, 3, 'XDDX2', 5),
(7, 4, 'NGL54', 1),
(8, 4, 'SJH23', 1),
(9, 4, 'CGA23', 1),
(10, 5, 'BBC1', 1),
(11, 6, 'Triple Whop', 2),
(12, 6, '7UP9', 1);

-- --------------------------------------------------------

--
-- Structure de la table `compagnie`
--

CREATE TABLE `compagnie` (
  `idCompagnie` int(20) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `idCategorie` int(20) NOT NULL,
  `type` varchar(50) NOT NULL,
  `telephone` varchar(30) NOT NULL,
  `img` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `compagnie`
--

INSERT INTO `compagnie` (`idCompagnie`, `nom`, `idCategorie`, `type`, `telephone`, `img`) VALUES
(1, 'Marjane', 1, 'SuperMarche', '0538801030', 'marjane.jpg'),
(2, 'Carrefour', 1, 'SuperMarche', '0539999776', 'carrefour.jpg'),
(3, 'Acima', 1, 'SuperMarche', '0539999386', 'acima.jpg'),
(4, 'Rif', 3, 'Pharmacie', '0539993331', 'pha1.jpg'),
(5, 'Afassi', 3, 'Pharmacie', '0539997199', 'pha2.jpg'),
(6, 'Nakhil', 3, 'Pharmacie', '0539700539', 'pha3.jpg'),
(7, 'Mcdonalds', 2, 'Restaurant', '0539993742', 'mcdonald.jpg'),
(8, 'Burger King', 2, 'Restaurant', '0635176698', 'burgerKing.jpg'),
(9, 'Pizza Hut', 2, 'Restaurant', '0539972197', 'pizzaHut.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `nom_complet` varchar(100) NOT NULL,
  `email_client` varchar(100) NOT NULL,
  `contenu` text NOT NULL,
  `id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`nom_complet`, `email_client`, `contenu`, `id`) VALUES
('nesrine amrani', 'nesrine123@gmail.com', 'nice products', 1),
('dahab', 'dahab1234@gmail.com', 'Merci pour vos effort', 3),
('aicha', 'aicha123@gmail.com', 'nice products', 4),
('khadija', 'khadija@gmail.com', 'nice products', 5),
('khadija', 'khadija@gmail.com', 'nice products', 6),
('aicha', 'aicha123@gmail.com', 'nice products', 7),
('aicha', 'aicha123@gmail.com', 'nice products', 8),
('aicha', 'el.kharraz2019@gmail.com', 'Good job', 9);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(30) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `image` text NOT NULL,
  `code` varchar(20) NOT NULL,
  `categorie` int(20) NOT NULL,
  `prix` double(10,2) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `image`, `code`, `categorie`, `prix`, `description`) VALUES
(3, 'Miel Dar Essalam', '3.jpg', 'AMK34', 1, 63.00, 'Miel Dar Essalam Toutes Fleurs 850g M Tal'),
(4, 'Coca Cola', '4.jpg', 'QW22', 2, 79.00, 'Coca Cola BOISSON GAZEUSE PACK 12*50CL'),
(5, 'Ain Atlas', '5.jpg', 'ER12', 2, 24.99, 'AIN ATLAS pack eau 12*33CL Ain Atlas'),
(6, 'Sidi Ali', '6.jpg', 'DE34', 2, 24.00, 'Sidi Ali Pack Eau KIDS 12*33CL'),
(7, 'Nutella', '7.jpg', 'YA12', 3, 72.00, 'Nutella Pâte À Tartiner Chocolat Nutella 750G'),
(8, 'Schar Céréales ', '8.jpg', 'WTV29', 3, 46.00, 'Schar Céréales Milly magique sans gluten 250g'),
(9, 'Sante', '9.jpg', '12WWE', 3, 27.00, 'Sante GRANOLA AU CHOCOLAT 350G'),
(10, 'Gants de lavage', '10.jpg', 'KF36', 4, 89.00, '2pc Gants de lavage pour lave-vaisselle'),
(11, 'Omo', '11.jpg', 'QW09', 4, 90.00, 'Omo Matic Bag Verveine Citron - 5kg'),
(12, 'Fairy', '12.jpg', 'XDDX2', 4, 10.00, 'Fairy Liquide Vaisselle Citron Fairy 625ML'),
(13, 'Dari', '13.jpg', '10KX', 5, 13.00, 'Dari COUSCOUS MOYEN DARI 1KG'),
(14, 'Bio Pro Green', '14.jpg', 'LOI98', 5, 36.00, 'Bio Pro Green Couscous de maïs SANS GLUTEN 1/2 Kg'),
(15, 'Big Beef Classic', 'bbc.jpg', 'BBC1', 6, 51.00, 'Pain au sésame , steak haché , 3 tranches de fromage Cheddar...                              '),
(16, 'Big Chicken Classic', 'bcc.jpg', 'BCC12', 6, 49.00, 'Pain au sésame , filet de poulet frit , 3 tranches de fromage Cheddar ...'),
(17, 'Big Mac', 'bm.png', 'BM123', 6, 37.00, 'Du pain au sésame, une viande de boeuf tendre et saisie...'),
(18, 'Chicken McNuggets x4', 'Nuggets.png', 'CMN4', 7, 19.00, 'Quatre délicieux morceaux de poulet pané doré, croustillants et fondants à la fois'),
(19, 'Croquettes Chili & Cheese', 'CCC.jpg', 'CCC123', 7, 24.00, 'Cinq délicieuses croquettes de fromage relevées aux poivrons'),
(20, 'Swiss Cheese', 'Swiss.png', 'SC123', 7, 24.00, 'Cinq croquettes croustillantes au fromage fondant, 5 pièces'),
(21, 'McFlurry Kit Kat', 'kitkat.png', 'KIT123', 9, 23.00, 'Description non disponible'),
(22, 'McFlurry M&M\'s', 'M&M\'s.png', 'M&M123', 9, 23.00, 'Description non disponible'),
(23, 'Coca Cola', 'coca.png', 'COLA34', 10, 8.00, 'Description non disponible'),
(24, 'Jus d\'orange Minute Maid', 'MinuteMaid.png', 'MM156', 10, 8.00, 'Description non disponible'),
(25, 'Café Americano', 'Americano.png', 'AMR43', 13, 21.00, 'Description non disponible'),
(26, 'Vienes', 'Vienes.png', 'VN123', 13, 25.00, 'Description non disponible'),
(27, 'Capuccino', 'Capuccino.png', 'CAP35', 13, 27.00, 'Description non disponible'),
(28, 'WRAP CHICKEN LOUISIANE', 'swap.png', 'SWP23', 14, 30.00, 'poulet,sauce louisiane'),
(29, 'Triple Whopper Cheese', 'Triple.png', 'Triple Whopper Chees', 14, 61.00, ' Fromages Tomate, viandes, frites'),
(30, 'Extra Long Jalapeno', 'Extra.png', 'ELJ123', 14, 34.00, 'viandes, salade verte.'),
(31, 'Fish Burger', 'Fish.png', 'FB456', 14, 25.00, 'Description non disponible\r\n'),
(32, 'CROUSTY CHEESE', 'crousty.png', 'CRS12', 15, 18.00, 'De savoureuses bouchées croustillantes et fondantes au fromage fondu.'),
(33, 'ONION RINGS', 'onion.png', 'ONN124', 15, 14.00, 'La boucle est bouclée ! Croustillants et fondants, à dévorer seul ou à partager'),
(34, 'Mini Mozar - 4 Pièces', 'MiniMozar.png', 'MIN123', 15, 16.00, 'Croustillants ,fondants,délicieux'),
(35, 'King Wings - 8 Pièces', 'KingWing.png', 'KWH128', 15, 48.00, 'Épicée,Croustillants ,fondants,délicieux'),
(36, 'Chicken croqs', 'Chickencroqs.jpg', 'CCR13', 18, 75.00, '16 bouchées panées au poulet et 1 sauce au choix.'),
(37, 'Chicken tasty', 'Chickentasty.jpg', 'CTS23', 18, 75.00, '4 aiguillettes de poulet panées et une sauce au choix.'),
(38, 'Potatoes', 'Potatoes.jpg', 'PTT78', 18, 64.00, 'Épicée , délicieux,1 sauce au choix.'),
(39, 'Breadsticks Mozzarella', 'pst.jpg', 'BMW234', 18, 98.00, '8 bâtonnets de pâte à pizza garnis de mozzarella. Servis avec une sauce au choix.'),
(40, 'Pizza Margherita', 'Margherita.jpg', 'MRG55', 19, 161.00, 'Sauce tomate à l\'origan et double mozzarella.'),
(41, ' Pizza Spicy Hot One ', 'spicy.jpg', 'SPZ25', 19, 190.00, 'Mozzarella, boulettes de boeuf, piments du Mexique, oignons frais,tomates fraîches'),
(42, 'Pizza Queen', 'Queen.jpg', 'QUN36', 19, 180.00, 'Sauce tomate à l\'origan, mozzarella, jambon et double champigons.'),
(43, 'Pizza Hawaïenne', 'Hawaïenne.jpg', 'HWJ345', 19, 180.00, 'Sauce tomate à l\'origan, mozzarella fraîche, jambon et double ananas.'),
(44, 'Beignets Nutella', 'BeignetsNutella.jpg', 'BNU67', 20, 54.00, '4 mini beignets Nutella'),
(45, 'Breadsticks Nutella', 'Breadstick.jpg', 'BNU45', 20, 10.99, '8 bâtonnets de pâte à pizza fourrés au Nutella.'),
(46, 'Glace Häagen-Dazs ', 'Dazs.jpg', 'GHD238', 20, 76.00, 'Crème glacée à la vanille, sauce caramel et morceaux de brownie.'),
(47, 'Glace Häagen-Dazs Caramel', 'Dazsc.png', 'DCP45', 20, 76.00, 'Crème glacée au caramel, sauce caramel beurre salé, et éclats caramélisés.'),
(48, 'Coca Cola 1,25L', 'Cocap.jpg', 'CCP90', 21, 43.00, 'Description non disponible\r\n\r\n'),
(49, 'Orangina 1,5L', 'Orangina.jpg', 'ORG34', 21, 43.00, 'Description non disponible\r\n'),
(50, 'Oasis ', 'Oasis.jpg\r\n', 'OSS345', 21, 43.00, 'Oasis Pomme Framboise Cassis 2L\r\n'),
(51, 'Lipton Iced Tea Pêche', 'lipton.jpg', 'LPT46', 16, 32.00, 'Description non disponible'),
(52, 'Pulco Citronnade', 'pulco.jpg', 'PLC46', 16, 32.00, 'Description non disponible'),
(53, '7up ', '7up.jpg', '7UP9', 16, 32.00, 'Description non disponible'),
(54, 'Schweppes Agrum', 'Schweppes.jpg', 'SCH33', 16, 32.00, 'Description non disponible'),
(55, 'King Sundae', 'sundae.png', 'SND345', 17, 30.00, 'Une onctueuse glace vanille avec un nappage chocolat ou caramel'),
(56, 'Trio De Teignets', 'trio.png', 'TDT56', 17, 18.00, 'Découvrez ce trio de beignets fourrés au chocolat noir, au chocolat noisette et au chocolat blanc ! \r\n'),
(57, 'Donuts Chocolat Noisette', 'donut.png', 'DCN78', 17, 25.00, 'Ne résistez plus à ce délicieux donut parfum chocolat avec ses éclats de noisettes ! \r\n'),
(58, 'Muffin Chocolat', 'muffin.png', 'MFF334', 17, 24.00, 'Goûtez à ce muffin moelleux au chocolat, aux éclats de chocolat noir et au cœur coulant chocolat noisette !\r\n'),
(59, 'Sauce BBQ', 'bbq.png', 'BBQ356', 12, 5.00, 'description non disponible ....'),
(60, 'Sauce Curry', 'curry.png', 'CRR432', 12, 4.00, 'description non disponible...'),
(62, 'Sauce Ketchup', 'ketchup.png', 'KTC09', 12, 3.00, 'description non disponible...'),
(63, 'Grande Portion de Frites', 'gpor.png\r\n', 'GPF356', 11, 16.00, 'Une grande portion pour les plus gourmands.'),
(64, 'Moyenne Portion de Frites', 'mpor.png', 'MPR367', 11, 12.00, 'Une portion moyenne disponible à tous.'),
(66, 'Frites Steak House Épicées', 'fstk.png', 'STK325', 11, 15.00, 'description non disponible...'),
(67, 'Fanta', 'fatna.png', 'FTN351', 10, 8.00, 'description non disponible....'),
(68, 'Boisson citronnade 1L Marrakech', 'Marrakech.jpg', 'MRK351', 2, 13.65, 'Description non disponible\r\n\r\n'),
(69, ' Sultan Jawhar', 'SultanJawhar.jpg', 'SJH23', 1, 10.50, 'Thé vert en grains 100g '),
(70, 'Nescafe Gold', 'NescafeGold.jpg', 'NGL54', 1, 34.95, 'Café soluble 50g '),
(71, 'Cigala', 'Cigala.jpg', 'CGA23', 5, 14.95, 'Riz semi-long 1Kg '),
(72, 'Spaghetti Alitkane', 'itkane.jpg', 'ITK786', 5, 9.95, 'Spaghetti N5 500g Alitkane\r\n'),
(73, 'MASQUE DE PROTECTION                 ', 'kmama.jpg', 'KMM42', 22, 8.00, 'PAQUET DE 10 PIECES  Couleur  Bleu'),
(74, 'BIOBACTER GEL MAIN ANTISEP 65 ML', 'biobak.png', 'BKB56', 22, 14.00, 'Description non disponible...'),
(75, 'SANYTOL GEL MAIN DESINFECTANT ', 'SANYTOL.jpg', 'SNT555', 22, 29.50, 'Description non disponible....'),
(76, 'Acérola 600 14 Comprimés à Croquer', 'acerola-600.jpg', 'ACL600', 23, 35.00, '- Le Cerisier des Antilles, également appelé Acérola, est un arbuste originaire d\'Amérique du sud qui est fréquemment cultivé dans les pays tropicaux.\r\n'),
(77, 'Fenioux Omega 3 (200 capsules)', 'omega3.jpg', 'OMG333', 23, 170.00, 'Fenioux Omega 3 L\'huile de poisson (dont saumon) indispensable au bien-être de votre organisme.'),
(78, 'Forte pharma power 50+', 'pwr.jpg', 'PWR45', 23, 140.00, '12 vitamines, 5 mineraux, ginseng 75mg (28 comprimes)'),
(79, 'Avène Cleanance solaire', 'avene.jpg', 'AVN567', 24, 240.00, 'Avène Cleanance solaire haute protection SPF 50+ Très haute protection solaire des peaux sensibles à tendance acnéique.\r\nMatifiant. Résistant à l’eau. Sans silicone'),
(80, 'Eucerin Allergie Protection Sun Creme-Gel SPF 50+', 'eucerin.jpg', 'ECRN23', 24, 317.00, 'Texture gel crème offre une protection solaire élevée tout en protégeant efficacement les peaux sujettes aux Lucite Estivale Benigne (LEB).'),
(81, 'ANTHELIOS XL SPF 50+ CRÈME MATIFIANTE', 'rocheposay.png', 'RCP325', 24, 190.00, 'Sans parfum. Sans paraben. Non-comédogène.\r\n\r\n');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie_compagnie`
--
ALTER TABLE `categorie_compagnie`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Index pour la table `categorie_produit`
--
ALTER TABLE `categorie_produit`
  ADD PRIMARY KEY (`idCatProduit`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande_produit`
--
ALTER TABLE `commande_produit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `compagnie`
--
ALTER TABLE `compagnie`
  ADD PRIMARY KEY (`idCompagnie`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie_compagnie`
--
ALTER TABLE `categorie_compagnie`
  MODIFY `idCategorie` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `categorie_produit`
--
ALTER TABLE `categorie_produit`
  MODIFY `idCatProduit` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `commande_produit`
--
ALTER TABLE `commande_produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `compagnie`
--
ALTER TABLE `compagnie`
  MODIFY `idCompagnie` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
