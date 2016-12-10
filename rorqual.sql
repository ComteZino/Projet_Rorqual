-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 10 Décembre 2016 à 09:59
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `rorqual`
--

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

CREATE TABLE IF NOT EXISTS `competence` (
  `idCompetence` int(11) NOT NULL,
  `cursus_idCursus` int(11) DEFAULT NULL,
  `libelle` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`idCompetence`),
  KEY `cursus_idCursus` (`cursus_idCursus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `competence`
--

INSERT INTO `competence` (`idCompetence`, `cursus_idCursus`, `libelle`) VALUES
(1, 1, 'JAVA'),
(2, 1, 'Langage C');

-- --------------------------------------------------------

--
-- Structure de la table `cursus`
--

CREATE TABLE IF NOT EXISTS `cursus` (
  `idCursus` int(11) NOT NULL,
  `niveau` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idCursus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cursus`
--

INSERT INTO `cursus` (`idCursus`, `niveau`) VALUES
(1, 'LAOSI');

-- --------------------------------------------------------

--
-- Structure de la table `parcourspro`
--

CREATE TABLE IF NOT EXISTS `parcourspro` (
  `idParcoursPro` int(11) NOT NULL,
  `libelle` varchar(50) DEFAULT NULL,
  `anneeEmbauche` year(4) DEFAULT NULL,
  `entreprise` varchar(50) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `professionnel_idEtud` int(11) DEFAULT NULL,
  PRIMARY KEY (`idParcoursPro`),
  KEY `professionnel_idEtud` (`professionnel_idEtud`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `parcourspro`
--

INSERT INTO `parcourspro` (`idParcoursPro`, `libelle`, `anneeEmbauche`, `entreprise`, `ville`, `professionnel_idEtud`) VALUES
(1, 'Chef de projet', 2019, 'Airbus', 'Toulouse', 1);

-- --------------------------------------------------------

--
-- Structure de la table `poursuiteetude`
--

CREATE TABLE IF NOT EXISTS `poursuiteetude` (
  `idPoursuiteEtude` int(11) NOT NULL,
  `formation` varchar(50) DEFAULT NULL,
  `anneeFormation` year(4) DEFAULT NULL,
  `etablissement` varchar(50) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `professionnel_idEtud` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPoursuiteEtude`),
  KEY `professionnel_idEtud` (`professionnel_idEtud`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `poursuiteetude`
--

INSERT INTO `poursuiteetude` (`idPoursuiteEtude`, `formation`, `anneeFormation`, `etablissement`, `ville`, `professionnel_idEtud`) VALUES
(1, 'SIGLIS', 2017, 'Université de Pau', 'anglet', 1);

-- --------------------------------------------------------

--
-- Structure de la table `professionnel`
--

CREATE TABLE IF NOT EXISTS `professionnel` (
  `idEtud` int(11) NOT NULL,
  `nom` varchar(25) DEFAULT NULL,
  `prenom` varchar(25) DEFAULT NULL,
  `login` varchar(25) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `cursus_idCursus` int(11) DEFAULT NULL,
  `competence_idCompetence` int(11) DEFAULT NULL,
  PRIMARY KEY (`idEtud`),
  KEY `cursus_idCursus` (`cursus_idCursus`),
  KEY `competence_idCompetence` (`competence_idCompetence`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `professionnel`
--

INSERT INTO `professionnel` (`idEtud`, `nom`, `prenom`, `login`, `password`, `cursus_idCursus`, `competence_idCompetence`) VALUES
(1, 'Gounou', 'Yohan', 'yohan', 'test', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `temoignage`
--

CREATE TABLE IF NOT EXISTS `temoignage` (
  `idTemoignage` int(11) NOT NULL,
  `auteur` varchar(50) DEFAULT NULL,
  `titre` varchar(50) DEFAULT NULL,
  `contenu` varchar(10000) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `cursus_idCursus` int(11) DEFAULT NULL,
  PRIMARY KEY (`idTemoignage`),
  KEY `cursus_idCursus` (`cursus_idCursus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `competence`
--
ALTER TABLE `competence`
  ADD CONSTRAINT `competence_ibfk_1` FOREIGN KEY (`cursus_idCursus`) REFERENCES `cursus` (`idCursus`);

--
-- Contraintes pour la table `parcourspro`
--
ALTER TABLE `parcourspro`
  ADD CONSTRAINT `parcourspro_ibfk_1` FOREIGN KEY (`professionnel_idEtud`) REFERENCES `professionnel` (`idEtud`);

--
-- Contraintes pour la table `poursuiteetude`
--
ALTER TABLE `poursuiteetude`
  ADD CONSTRAINT `poursuiteetude_ibfk_1` FOREIGN KEY (`professionnel_idEtud`) REFERENCES `professionnel` (`idEtud`);

--
-- Contraintes pour la table `professionnel`
--
ALTER TABLE `professionnel`
  ADD CONSTRAINT `professionnel_ibfk_2` FOREIGN KEY (`competence_idCompetence`) REFERENCES `competence` (`idCompetence`),
  ADD CONSTRAINT `professionnel_ibfk_1` FOREIGN KEY (`cursus_idCursus`) REFERENCES `cursus` (`idCursus`);

--
-- Contraintes pour la table `temoignage`
--
ALTER TABLE `temoignage`
  ADD CONSTRAINT `temoignage_ibfk_1` FOREIGN KEY (`cursus_idCursus`) REFERENCES `cursus` (`idCursus`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
