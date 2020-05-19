-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 16 mai 2020 à 15:49
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
-- Base de données : `ensat`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

CREATE TABLE `absence` (
  `nom_matiere` varchar(20) NOT NULL,
  `date_seance` date NOT NULL,
  `nombre_heure` int(11) NOT NULL,
  `Heure_debut` time NOT NULL,
  `Heure_fin` time NOT NULL,
  `CNE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `absence`
--

INSERT INTO `absence` (`nom_matiere`, `date_seance`, `nombre_heure`, `Heure_debut`, `Heure_fin`, `CNE`) VALUES
('COMPTABILITE', '2020-02-10', 3, '13:30:00', '16:30:00', 17004661),
('CPP', '2020-02-03', 2, '09:00:00', '11:00:00', 17005941),
('CPP', '2020-03-01', 3, '09:00:00', '12:00:00', 17004052),
('CPP', '2020-03-02', 2, '09:00:00', '11:00:00', 17004052),
('CPP', '2020-04-12', 2, '09:00:00', '11:00:00', 17004445),
('LINUX', '2020-01-01', 0, '00:00:00', '00:00:00', 17005944),
('LINUX', '2020-03-16', 3, '13:30:00', '16:30:00', 17005921),
('LINUX', '2020-04-13', 3, '09:00:00', '12:00:00', 17005958),
('LINUX', '2020-04-22', 0, '00:00:00', '00:00:00', 17004052),
('PHP POO', '2020-01-21', 3, '09:00:00', '12:00:00', 17005954),
('PHP POO', '2020-01-23', 3, '09:00:00', '12:00:00', 123456789),
('PHP POO', '2020-02-13', 3, '09:00:00', '12:00:00', 17005958),
('PHP POO', '2020-03-10', 3, '09:00:00', '12:00:00', 17005944),
('PHP POO', '2020-03-16', 3, '09:00:00', '12:00:00', 17005941),
('PHP POO', '2020-04-06', 0, '00:00:00', '00:00:00', 17005941),
('PHP POO', '2020-04-13', 2, '09:00:00', '11:00:00', 17005941),
('PHP POO', '2020-05-01', 3, '09:00:00', '12:00:00', 17005953),
('PHP POO', '2020-05-02', 3, '09:00:00', '12:00:00', 17005944),
('PHP POO', '2020-05-22', 0, '00:00:00', '00:00:00', 17005941),
('PL/SQL', '2020-01-03', 3, '09:00:00', '12:00:00', 17005931),
('PL/SQL', '2020-01-09', 2, '09:00:00', '11:00:00', 17005956),
('PL/SQL', '2020-02-04', 3, '09:00:00', '12:00:00', 17005955),
('RESEAUX', '2020-01-08', 2, '09:00:00', '11:00:00', 17005952),
('RESEAUX', '2020-02-23', 3, '09:00:00', '12:00:00', 17005952);

-- --------------------------------------------------------

--
-- Structure de la table `eleves`
--

CREATE TABLE `eleves` (
  `cne` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `etat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `eleves`
--

INSERT INTO `eleves` (`cne`, `nom`, `prenom`, `etat`) VALUES
(17004052, 'ACHAHBAR', 'ADNANE', 'false'),
(17004445, 'ADRAOUI', 'KHAWLA', 'false'),
(17004661, 'AISSA', 'MARIA', 'true'),
(17005921, 'BOUHAL', 'BASMA', 'true'),
(17005931, 'BOUABID', 'INESS', 'false'),
(17005941, 'BEN ABDELLAH', 'MOHAMMED', 'true'),
(17005944, 'AMEZIANE', 'CHAIMAA', 'false'),
(17005951, 'AHMADOUN', 'MOHAMMED', 'true'),
(17005952, 'BOUKHALLAD', 'AISSAME', 'true'),
(17005953, 'BOUZEKRAOUI', 'ASMAE', 'false'),
(17005954, 'CHARFI', 'YOUSSEF', 'true'),
(17005955, 'CHIHI', 'HASNAE', 'false'),
(17005956, 'DAHCHAR', 'MOHAMMED SAID', 'true'),
(17005957, 'ECHTIOUI', 'SALMA', 'true'),
(17005958, 'EDRISSI', 'ATAE', 'false'),
(123456789, 'EL AAKKOUCHI', 'SALMA', 'true');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`nom_matiere`,`date_seance`),
  ADD KEY `cne` (`CNE`);

--
-- Index pour la table `eleves`
--
ALTER TABLE `eleves`
  ADD PRIMARY KEY (`cne`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `absence`
--
ALTER TABLE `absence`
  ADD CONSTRAINT `absence_ibfk_1` FOREIGN KEY (`CNE`) REFERENCES `eleves` (`cne`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
