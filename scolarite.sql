-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 12 nov. 2024 à 22:19
-- Version du serveur : 5.7.36
-- Version de PHP : 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `scolarite`
--

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `idc` int(11) NOT NULL AUTO_INCREMENT,
  `niveau` varchar(20) NOT NULL,
  `idens` int(11) DEFAULT NULL,
  `idsall` int(11) DEFAULT NULL,
  `mat` varchar(10) NOT NULL,
  `horaire` date NOT NULL,
  `duree` int(11) DEFAULT NULL,
  PRIMARY KEY (`idc`),
  KEY `idens` (`idens`),
  KEY `idsall` (`idsall`),
  KEY `mat` (`mat`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`idc`, `niveau`, `idens`, `idsall`, `mat`, `horaire`, `duree`) VALUES
(1, 'Bachelor 2', 1, 1, 'Python', '2025-05-12', 3);

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

DROP TABLE IF EXISTS `enseignant`;
CREATE TABLE IF NOT EXISTS `enseignant` (
  `ide` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `tel` varchar(8) NOT NULL,
  `sexe` varchar(10) DEFAULT NULL,
  `titre` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `adresse` varchar(20) NOT NULL,
  `departement` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ide`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `enseignant`
--

INSERT INTO `enseignant` (`ide`, `nom`, `tel`, `sexe`, `titre`, `email`, `adresse`, `departement`) VALUES
(3, 'Moutari Mahamane', '78654312', 'H', 'ing', 'Moutari@gmail.com', 'Tchangarey', 'Informatique');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `matricule` varchar(20) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `sexe` varchar(10) DEFAULT NULL,
  `tel` varchar(8) NOT NULL,
  `datenaiss` date NOT NULL,
  PRIMARY KEY (`matricule`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`matricule`, `nom`, `prenom`, `sexe`, `tel`, `datenaiss`) VALUES
('UIN789', 'Soumana', 'Cherifatou', 'F', '99405643', '2006-06-23'),
('UIN345', 'Ibrahim', 'RIA', 'F', '98653421', '2053-09-12');

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
  `ids` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `capacite` int(11) DEFAULT NULL,
  `emplacement` varchar(100) DEFAULT NULL,
  `etat` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ids`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`ids`, `nom`, `capacite`, `emplacement`, `etat`) VALUES
(2, 'LAB2', 50, 'ADM', 'occupÃ©e');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `Username` varchar(50) NOT NULL,
  `motpass` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`Username`, `motpass`) VALUES
('rahinatou', '1234ria'),
('Moussa Djibrilou omar', '1234OMD'),
('Draken', '1234'),
('Draken', '1234');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
