-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 15 nov. 2023 à 13:12
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sponso roy`
--

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `id_evenement` int(11) NOT NULL AUTO_INCREMENT,
  `nom_evenement` varchar(50) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `lieu` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL,
  `type_evenement` varchar(30) NOT NULL,
  PRIMARY KEY (`id_evenement`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id_evenement`, `nom_evenement`, `date_debut`, `date_fin`, `lieu`, `description`, `type_evenement`) VALUES
(1, 'Le Rallye débarque dans le gers', '2023-10-07', '2023-10-08', 'Gers', 'Une course de Rallye qui se déroule durant une nuit de 20h à 6h du matin sur les routes du Gers.', 'Rallye'),
(2, 'Course sur circuit Nogaro', '2023-11-15', '2023-11-22', 'Nogaro', 'Une course sur circuit qui se déroule durant une semaine sur le célèbre circuit de Nogaro.', 'Course sur circuit'),
(3, 'Course en montagne Alpes', '2024-01-02', '2024-01-05', 'Alpes', 'Une course sur piste enneigées durant 3 jours dans les Alpes.', 'Course en montagne'),
(4, 'Compétition de Drift', '2023-12-14', '2023-12-28', 'Toulouse', 'Une compétition de Drift sur Toulouse en partenariat avec Sparco et ZuperEco.', 'Drift');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `nom_produit` varchar(50) NOT NULL,
  `prix` double NOT NULL,
  `type_produit` varchar(30) NOT NULL,
  'image' longblob NOT NULL,
  PRIMARY KEY (`id_produit`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `nom_produit`, `prix`, `type_produit`) VALUES
(1, 'Disque de frein Renault Sport Clio 4 RS', 129.9, 'Freinage'),
(2, 'Filtre à air Sport BMC 807/08 Audi R8 mk2 V10+', 346.9, 'Moteur'),
(3, 'Catback Race Milltek VM Golf 6 R', 941, 'Echappements'),
(4, 'Longues portées LED PIAA LP560', 449, 'Éclairage'),
(5, 'Lame avant Maxton carbon BMW M135I', 729.9, 'Carrosserie'),
(6, 'Diffuseur Maxton Audi TTS 8J', 89.9, 'Carrosserie'),
(7, 'Aileron Renault Sport Clio 3 RS Cup', 199.99, 'Carrosserie'),
(8, 'Bas de caisse Maxton carbon Audi RS6 C8', 1099, 'Carrosserie'),
(9, 'Antenne Sparco Urban Noire', 12.9, 'Carrosserie'),
(10, 'Crochet de remorquage VHC', 28.9, 'Carrosserie'),
(11, 'Kit complet VW Scirocco R', 1020, 'Carrosserie'),
(12, 'Volant tulipé noir GT2I 350MM', 59, 'Intérieur'),
(13, 'Moyeu de volant MOMO Megane 3 RS', 89.9, 'Intérieur'),
(14, 'Pack 4 jantes Turini Rouge Megane 3 RS Trophy-R', 1316.9, 'Jantes et accessoires');

-- --------------------------------------------------------

--
-- Structure de la table `sponsor`
--

DROP TABLE IF EXISTS `sponsor`;
CREATE TABLE IF NOT EXISTS `sponsor` (
  `id_sponsor` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nationalite` varchar(50) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `mail` varchar(60) NOT NULL,
  `categorie` varchar(30) NOT NULL,
  `voiture` varchar(50) NOT NULL,
  PRIMARY KEY (`id_sponsor`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sponsor`
--

INSERT INTO `sponsor` (`id_sponsor`, `nom`, `prenom`, `nationalite`, `telephone`, `mail`, `categorie`, `voiture`) VALUES
(1, 'Fajolle', 'Rémi', 'Français', '0647986235', 'remi.fajolle54@yahoo,fr', 'Rallye', 'Seat Leon 3 ST Cupra'),
(2, 'Petermann', 'Aymeri', 'Italien', '0784659814', 'peter.aymeri@gmail.com', 'F1', 'Red Bull RB19'),
(3, 'Cousseau', 'Benjamin', 'Japonais', '0654985412', 'benjoss14@gmail.com', 'Drift', 'Honda Civic eg4'),
(4, 'Conort', 'Ugo', 'Irlandais', '0612045534', 'ugo.conort@gmail.com', 'Rallye', 'Clio 3 Rallye'),
(5, 'Nolan', 'Vazmon', 'Allemand', '0644652154', 'nolan74100@yahoo.fr', 'Course sur circuit', 'BMW M3 Touring'),
(6, 'Lopez', 'Maël', 'Espagnol', '0645741230', 'lopez65mael@orange.fr', 'Course sur circuit', 'Ford Focus III RS'),
(7, 'Gordon', 'Al', 'Americain', '0784226132', 'gordonAl78@gmail.com', 'Drift', 'BMW E36'),
(8, 'Mathieu', 'Chris', 'Français', '0678446520', 'mathieucrhis777@hotmail.fr', 'Course en montagne', 'Mitsubishi Lancer Evo'),
(9, 'Noz', 'Bartholomé', 'Canadien', '0614853565', 'noz895@hotmail.fr', 'Rallye', 'Citroën C4 WRC'),
(10, 'Dwayne', 'Johnson', 'Americain', '0641366685', 'dwaynejohn@gmail.com', 'Course sur circuit', 'Porsche GT4 RS'),
(11, 'White', 'Walter', 'Grecque', '0641358710', 'walterwhite77@orange.fr', 'Course en montagne', 'Lancia Delta');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `pseudo` int(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;