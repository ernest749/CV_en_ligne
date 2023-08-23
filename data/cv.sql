-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 22 août 2023 à 13:51
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cv`
--

-- --------------------------------------------------------

--
-- Structure de la table `details_academique`
--

DROP TABLE IF EXISTS `details_academique`;
CREATE TABLE IF NOT EXISTS `details_academique` (
  `id_det_ac` int NOT NULL AUTO_INCREMENT,
  `id_inf_pers` int NOT NULL,
  `diplome` varchar(128) NOT NULL,
  `universite` varchar(128) NOT NULL,
  `annee_d_obtention` varchar(128) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id_det_ac`),
  KEY `id_inf_pers` (`id_inf_pers`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `details_academique`
--

INSERT INTO `details_academique` (`id_det_ac`, `id_inf_pers`, `diplome`, `universite`, `annee_d_obtention`, `description`) VALUES
(1, 2, 'Diplôme de Technicien Supérieur', 'Institut Supérieur Technologie d\'Ambositra', '2022', 'Mention: Assez-bien'),
(2, 2, 'BACCALAUREAT', 'Lycée Sacre Coeur Fandriana', '2019', 'Mention: Bien'),
(4, 3, 'delf', 'alliance française', '2013', 'mention bien '),
(6, 3, 'certificat', 'madvision', '2019', 'test'),
(7, 3, 'certificat', 'madvision', '2019', 'test'),
(9, 3, 'certificat', 'test', '2019', 'description');

-- --------------------------------------------------------

--
-- Structure de la table `experience_professionnelle`
--

DROP TABLE IF EXISTS `experience_professionnelle`;
CREATE TABLE IF NOT EXISTS `experience_professionnelle` (
  `id_exp_prof` int NOT NULL AUTO_INCREMENT,
  `id_inf_pers` int UNSIGNED NOT NULL,
  `organisation` varchar(128) NOT NULL,
  `designation` varchar(128) NOT NULL,
  `date` varchar(30) NOT NULL,
  `role` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id_exp_prof`),
  KEY `id_inf_pers` (`id_inf_pers`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `experience_professionnelle`
--

INSERT INTO `experience_professionnelle` (`id_exp_prof`, `id_inf_pers`, `organisation`, `designation`, `date`, `role`, `description`) VALUES
(1, 3, 'AREA', 'opérateur de saisie', '12/01/2018 au déc/2020', 'opérateur de saisie', 'traiter de l\'acte d\'état civil dans l\'AREA Fandriana'),
(19, 0, '(organisation)', '(designation)', '(date)', '(role)', '(description)'),
(20, 0, 'ISSD', 'Création de site web educatif', 'juillet au septembre 2022', 'developpeur', 'fait une stage pendant 3 dans l\'ISSD Fianarantsoa\r\ncréation du site web éducatif'),
(21, 2, 'Chambre de Commerce et d’Industrie Haute Matsiatra.', 'Développeur', 'Février 2021- Avril 2021', 'Stage de trois mois au sein de Chambre de Commerce et d’Industrie Haute Matsiatra.', 'Conception et Réalisation d’une application de mise en relation des opérateurs de production et des opérateurs de marché'),
(22, 2, 'Chambre de Commerce et d’Industrie Haute Matsiatra.', 'STAGIAIRE', 'Février 2021- Avril 2021', 'Stage de trois mois au sein de Chambre de Commerce et d’Industrie Haute Matsiatra.', 'Conception et Réalisation d’une application de mise en relation des opérateurs de production et des opérateurs de marché'),
(23, 0, 'Chambre de Commerce et d’Industrie Haute Matsiatra.', 'STAGIAIRE', 'Février 2021- Avril 2021', 'Stage de trois mois au sein de Chambre de Commerce et d’Industrie Haute Matsiatra', 'Conception et Réalisation d’une application de mise en relation des opérateurs de production et des opérateurs de marché'),
(24, 2, 'issd mada', 'développeur web', 'janvier -mars 2022', 'stagiaire', 'développer un site web de gestion d\'établissement et de gestion d\'élèves'),
(27, 3, 'test1 organisation', 'test1 designation', 'test1', 'test1 date', 'test1 descriptionOK'),
(29, 3, 'test3modif', 'test3modif', 'test3modif', 'test3modif', 'test3modif');

-- --------------------------------------------------------

--
-- Structure de la table `informations_personnelles`
--

DROP TABLE IF EXISTS `informations_personnelles`;
CREATE TABLE IF NOT EXISTS `informations_personnelles` (
  `id_inf_pers` int NOT NULL AUTO_INCREMENT,
  `id_user` varchar(11) NOT NULL,
  `nom` varchar(240) NOT NULL,
  `adresse1` varchar(128) NOT NULL,
  `adresse2` varchar(128) NOT NULL,
  `adresse3` varchar(128) NOT NULL,
  `adresse4` varchar(240) NOT NULL,
  `email` varchar(128) NOT NULL,
  `telephone` char(30) NOT NULL,
  `date_naissance` varchar(128) NOT NULL,
  `situation_familiale` varchar(30) NOT NULL,
  `langue` varchar(240) NOT NULL,
  `nationalite` varchar(128) NOT NULL,
  `photo` varchar(128) NOT NULL,
  PRIMARY KEY (`id_inf_pers`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `informations_personnelles`
--

INSERT INTO `informations_personnelles` (`id_inf_pers`, `id_user`, `nom`, `adresse1`, `adresse2`, `adresse3`, `adresse4`, `email`, `telephone`, `date_naissance`, `situation_familiale`, `langue`, `nationalite`, `photo`) VALUES
(1, '1', 'rakoto', 'tsimialona', 'fandriana', 'fisakana', '', 'rk@gmail.com', '0341525414', '21/11/1541', 'celibataire', '', 'malagasy', 'image'),
(3, '3', 'razertirida', '037 BUS', 'Soanierana', 'fianarantsoa', 'Madagascar', 'raz@gmail.com', '0341879495', '14 août 2023', 'marié(e)', 'Malagasy, Français, Anglais', 'Malagasy', 'Inkedinscrire _LI.jpg'),
(2, '3', 'narda', '037 BUS', 'Ankofafa', 'fianarantsoa', 'Madagascar', 'narda@gmail.com', '0343134545', '12 fevrier 2023', 'marié(e)', 'Malagasy, Français, Anglais', 'Malagasy', 'Inkedinscrire _LI.jpg'),
(4, '3', 'bastide', '126 BUS', 'fandriana', 'fandriana', 'Madagascar', 'labastide@gmail.com', '0331243234', 'mars 1923', 'divoré(e)', 'Malagasy, Français, Anglais', 'Malagasy', 'Inkedinscrire _LI.jpg'),
(5, '3', 'razanajoelina ernestine', 'AK13', 'ankilahila', 'Fandriana', 'Madagascar', 'razanajoelina.ernestine@gmail.com', '0338724596', '25 août 1996', 'marié(e)', 'Malagasy, Français, Anglais', 'Malagasy', 'Inkedinscrire _LI.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `langue`
--

DROP TABLE IF EXISTS `langue`;
CREATE TABLE IF NOT EXISTS `langue` (
  `id_lang` int NOT NULL AUTO_INCREMENT,
  `id_inf_pers` int NOT NULL,
  `langue` varchar(280) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `parle` varchar(140) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `comprehension` varchar(140) NOT NULL,
  `lecture` varchar(140) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ecriture` varchar(140) NOT NULL,
  PRIMARY KEY (`id_lang`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `loisir_et_interet`
--

DROP TABLE IF EXISTS `loisir_et_interet`;
CREATE TABLE IF NOT EXISTS `loisir_et_interet` (
  `id_lois_int` int NOT NULL AUTO_INCREMENT,
  `id_inf_pers` int NOT NULL,
  `titre` varchar(140) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id_lois_int`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `loisir_et_interet`
--

INSERT INTO `loisir_et_interet` (`id_lois_int`, `id_inf_pers`, `titre`, `description`) VALUES
(1, 3, 'sport', 'volley, hand-ball, football'),
(2, 2, 'loisir', 'lecture, chanter, danser, nager, Facebook');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(140) NOT NULL,
  `email` varchar(140) NOT NULL,
  `password` varchar(140) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `pseudo`, `email`, `password`) VALUES
(3, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
(4, 'narda', 'narda@gmail.com', '09c852a950209611746e1e7e59f7fcaf');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
