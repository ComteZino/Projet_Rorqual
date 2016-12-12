-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 12 Décembre 2016 à 01:51
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
  `libelle` varchar(32) DEFAULT NULL,
  `idCompetence` int(11) NOT NULL,
  `idCursus` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCompetence`),
  KEY `FK_competence_idCursus` (`idCursus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `competence`
--

INSERT INTO `competence` (`libelle`, `idCompetence`, `idCursus`) VALUES
('JAVA', 1, 1),
('Langage C', 2, 1);

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
(1, 'LAOSI'),
(2, 'SIGLIS');

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
  `idEtud` int(11) DEFAULT NULL,
  PRIMARY KEY (`idParcoursPro`),
  KEY `FK_parcoursPro_idEtud` (`idEtud`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `parcourspro`
--

INSERT INTO `parcourspro` (`idParcoursPro`, `libelle`, `anneeEmbauche`, `entreprise`, `ville`, `idEtud`) VALUES
(1, 'test', 2069, 'test', 'test', 1),
(2, 'test2', 2018, 'test2', 'test2', 2),
(3, 'test3', 2020, 'test3', 'test3', 3),
(4, 'test4', 2022, 'test4', 'test4', 4),
(5, '', 0000, '', '', 5);

-- --------------------------------------------------------

--
-- Structure de la table `poursuiteetude`
--

CREATE TABLE IF NOT EXISTS `poursuiteetude` (
  `idPoursuiteEtude` int(11) NOT NULL,
  `formation` varchar(50) DEFAULT NULL,
  `anneeFormation` year(4) DEFAULT NULL,
  `entreprise` varchar(50) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `idEtud` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPoursuiteEtude`),
  KEY `FK_poursuiteEtude_idEtud` (`idEtud`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `poursuiteetude`
--

INSERT INTO `poursuiteetude` (`idPoursuiteEtude`, `formation`, `anneeFormation`, `entreprise`, `ville`, `idEtud`) VALUES
(1, 'LAOSI', 2069, 'test', 'test', 1),
(2, 'SIGLIS', 2018, 'test2', 'test2', 2);

-- --------------------------------------------------------

--
-- Structure de la table `professionnel`
--

CREATE TABLE IF NOT EXISTS `professionnel` (
  `nom` varchar(25) DEFAULT NULL,
  `prenom` varchar(25) DEFAULT NULL,
  `login` varchar(25) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `idEtud` int(11) NOT NULL,
  `idCursus` int(11) DEFAULT NULL,
  PRIMARY KEY (`idEtud`),
  KEY `FK_professionnel_idCursus` (`idCursus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `professionnel`
--

INSERT INTO `professionnel` (`nom`, `prenom`, `login`, `password`, `idEtud`, `idCursus`) VALUES
('test', 'test69', 'test', '098f6bcd4621d373cade4e832627b4f6', 1, 2),
('test2', 'test2', 'test2', 'ad0234829205b9033196ba818f7a872b', 2, 1),
('test3', 'test3', 'test3', '8ad8757baa8564dc136c1e07507f4a98', 3, 1),
('test4', 'test4', 'test4', '86985e105f79b95d6bc918fb45ec7727', 4, 1),
('test5', 'test5', 'test5', 'e3d704f3542b44a621ebed70dc0efe13', 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `temoignage`
--

CREATE TABLE IF NOT EXISTS `temoignage` (
  `idTemoignage` int(11) NOT NULL,
  `auteur` varchar(50) DEFAULT NULL,
  `titre` varchar(50) DEFAULT NULL,
  `contenu` varchar(10000) DEFAULT NULL,
  `dateTemoignage` date DEFAULT NULL,
  `idEtud` int(11) DEFAULT NULL,
  `idCursus` int(11) DEFAULT NULL,
  PRIMARY KEY (`idTemoignage`),
  KEY `FK_temoignage_idEtud` (`idEtud`),
  KEY `FK_temoignage_idCursus` (`idCursus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `temoignage`
--

INSERT INTO `temoignage` (`idTemoignage`, `auteur`, `titre`, `contenu`, `dateTemoignage`, `idEtud`, `idCursus`) VALUES
(2, 'test4 test4', 'test', '&lt;p&gt;test&lt;/p&gt;\r\n', '2016-12-12', 4, 1),
(3, 'test4 test4', 'Plages Palma', '&lt;p&gt;test ets t&lt;/p&gt;\r\n', '2016-12-12', 4, 1),
(4, 'test4 test4', 'Mort de monsieur Gounou Yohan d''une cause naturell', '&lt;p&gt;test&lt;/p&gt;\r\n', '2016-12-12', 4, 2),
(5, 'test4 test4', 'Mort de monsieur Gounou Yohan d''une cause naturell', '&lt;p&gt;test&lt;/p&gt;\r\n', '2016-12-12', 4, 2);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `competence`
--
ALTER TABLE `competence`
  ADD CONSTRAINT `FK_competence_idCursus` FOREIGN KEY (`idCursus`) REFERENCES `cursus` (`idCursus`);

--
-- Contraintes pour la table `parcourspro`
--
ALTER TABLE `parcourspro`
  ADD CONSTRAINT `FK_parcoursPro_idEtud` FOREIGN KEY (`idEtud`) REFERENCES `professionnel` (`idEtud`);

--
-- Contraintes pour la table `poursuiteetude`
--
ALTER TABLE `poursuiteetude`
  ADD CONSTRAINT `FK_poursuiteEtude_idEtud` FOREIGN KEY (`idEtud`) REFERENCES `professionnel` (`idEtud`);

--
-- Contraintes pour la table `professionnel`
--
ALTER TABLE `professionnel`
  ADD CONSTRAINT `FK_professionnel_idCursus` FOREIGN KEY (`idCursus`) REFERENCES `cursus` (`idCursus`);

--
-- Contraintes pour la table `temoignage`
--
ALTER TABLE `temoignage`
  ADD CONSTRAINT `FK_temoignage_idCursus` FOREIGN KEY (`idCursus`) REFERENCES `cursus` (`idCursus`),
  ADD CONSTRAINT `FK_temoignage_idEtud` FOREIGN KEY (`idEtud`) REFERENCES `professionnel` (`idEtud`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
