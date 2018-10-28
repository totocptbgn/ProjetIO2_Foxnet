-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  jeu. 10 mai 2018 à 09:19
-- Version du serveur :  5.6.34-log
-- Version de PHP :  7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `foxnet`
--

-- --------------------------------------------------------

--
-- Structure de la table `postcounter`
--

CREATE TABLE `postcounter` (
  `LastID` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `postcounter`
--

INSERT INTO `postcounter` (`LastID`) VALUES
(65);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `ID` int(4) NOT NULL,
  `author` varchar(20) NOT NULL,
  `date` varchar(16) NOT NULL,
  `content` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`ID`, `author`, `date`, `content`) VALUES
(0, 'totocptbgn', '2018-04-13-15-11', 'Hello world !'),
(1, 'momo', '2018-04-13-15-21', 'J\'aime les kebabs. Avec de l\'harissa et de la sauce blanche MAIS surtout pas du ketchup.'),
(2, 'totocptbgn', '2018-04-13-15-25', 'Yunez pls come back !! I miss you my ninja... T-T'),
(3, 'PavelRussia', '2018-04-13-16-58', 'J\'aime les chips. Je veux aller en Russie!'),
(4, 'totocptbgn', '2018-04-14-18-39', 'My first real post ! :D'),
(5, 'totocptbgn', '2018-04-14-18-39', 'I still miss you Ninjaaaaaaaa T-T'),
(6, 'totocptbgn', '2018-04-14-18-41', 'Lorem ipsum dolor sit amet, vel fierent sapientem et, sea te suas suscipit. Principes definiebas repudiandae est ei. Graeci cetero nostrum ex vix, ex vivendo maluisset torquatos per. Ornatus explicari te has.\r\n\r\nAt nisl noster scriptorem eum, eu nec brute congue. Animal blandit ex cum, an justo post'),
(10, 'lindt', '2018-04-15-02-09', 'heyyy'),
(19, 'lindt', '2018-04-28-12-45', 'oh boi'),
(20, 'totocptbgn', '2018-05-04-20-57', 'lesker got good shit'),
(25, 'totocptbgn', '2018-05-06-17-04', '*This is bold !*'),
(32, 'lammalesang', '2018-05-06-17-21', 'Je pratique la MMA depuis maintenant 6 ans, de la boxe en parallèle depuis 7 ans, je pourrai battre un gorille a main nue.'),
(33, 'dokkaebi', '2018-05-07-13-42', 'vrvrvrvrvrvr... Please answer your phone !'),
(34, 'zoro', '2018-05-07-13-45', 'Hey ! Do you know where i could find some beer and swords ?'),
(38, 'leeroyjenkins', '2018-05-07-13-49', 'Leeeeeroy Jenkins!'),
(39, 'leeroyjenkins', '2018-05-07-13-50', 'At least I have chicken!'),
(42, 'kakashi', '2018-05-07-13-55', 'In the shinobi world, those that break the written and unwritten rules are deemed trash... but be that as it may... Those that would desregard their comrades so easily are even worse than trash. And those who don\'t have the decency to respect the memories of their comrades are the worst.'),
(43, 'wisdomguy', '2018-05-07-13-58', 'Happiness can be found in the darkest of times, if one only remembers to turn on the light.'),
(44, 'firstToMars', '2018-05-07-14-02', 'I’m starting a candy company &amp; it’s going to be amazing'),
(45, 'murloc', '2018-05-07-14-05', '*BRLRBLRLBLRBLLBR !!!*'),
(50, 'hanzoshmd', '2018-05-07-17-26', 'Ryû ga waga teki wo kurau!'),
(53, 'amiralakbar', '2018-05-07-18-19', 'It\'s a trap !'),
(65, 'polarbear', '2018-05-10-03-56', 'If I was a word\r\nI would be hope \r\nOr it would be Happy\r\nThis is some simples words\r\nBut important, they are\r\nbecause they are elements of life\r\nI want to be an artist\r\nWho creates his own life \r\nWith my words, my thoughts \r\nI see the light inside of me \r\nEverything around me, reminds who I am');

-- --------------------------------------------------------

--
-- Structure de la table `subs`
--

CREATE TABLE `subs` (
  `subscriber` varchar(30) NOT NULL,
  `target` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `subs`
--

INSERT INTO `subs` (`subscriber`, `target`) VALUES
('totocptbgn', 'ripfilthyfrank'),
('totocptbgn', 'PavelRussia'),
('lindt', 'totocptbgn'),
('lindt', 'justice'),
('totocptbgn', 'lindt'),
('lammalesang', 'totocptbgn'),
('richrdaldana', 'totocptbgn'),
('richrdaldana', 'lammalesang'),
('dokkaebi', 'totocptbgn'),
('zoro', 'totocptbgn'),
('leeroyjenkins', 'totocptbgn'),
('leeroyjenkins', 'zoro'),
('leeroyjenkins', 'lammalesang'),
('leeroyjenkins', 'lindt'),
('kakashi', 'totocptbgn'),
('kakashi', 'dokkaebi'),
('kakashi', 'momo'),
('wisdomguy', 'totocptbgn'),
('wisdomguy', 'kakashi'),
('firstToMars', 'totocptbgn'),
('firstToMars', 'wisdomguy'),
('firstToMars', 'PavelRussia'),
('murloc', 'totocptbgn'),
('totocptbgn', 'leeroyjenkins'),
('richrdaldana', 'lindt'),
('totocptbgn', 'murloc'),
('totocptbgn', 'firstToMars'),
('totocptbgn', 'kakashi'),
('hanzoshmd', 'totocptbgn'),
('amiralakbar', 'totocptbgn'),
('amiralakbar', 'murloc'),
('totocptbgn', 'amiralakbar'),
('greg', 'totocptbgn'),
('greg', 'amiralakbar'),
('tototototototo', 'totocptbgn'),
('polarbear', 'totocptbgn');

-- --------------------------------------------------------

--
-- Structure de la table `userdata`
--

CREATE TABLE `userdata` (
  `login` varchar(30) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `firstName` varchar(30) DEFAULT NULL,
  `lastName` varchar(30) DEFAULT NULL,
  `birthdate` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `userdata`
--

INSERT INTO `userdata` (`login`, `password`, `firstName`, `lastName`, `birthdate`) VALUES
('amiralakbar', '$2y$10$6RQmhzabRMIaufCUBLqoQeokKGtU7Xw5jMO0/ZbZ38a03W6qFmvRu', 'Amiral', 'Akbar', '1975-05-22'),
('dokkaebi', '$2y$10$vBbMQO9Nxqj0WaICIpjSlOywRk9qcke6e9ip/Js6eE7DT9AmGHwW6', 'Grace', 'Nam', '1990-04-05'),
('firsttomars', '$2y$10$R/w1v1DHSLFcWjH9DrCbHub6CTWSUn8sSrHG2kpiu8tapKFKCqrLO', 'Elon', 'Musk', '1971-06-28'),
('hanzoshmd', '$2y$10$Eh7z0wBd4zS7NvgmZ4sD0eb8KaXp1HCdUwe0yWjVoSdFyVbiaCQrK', 'Hanzo', 'Shimada', '1985-08-04'),
('kakashi', '$2y$10$sJi/h1Zl1neRZ/Rsm.kXKexppflgMr2vDD0hC6U1LlLxJ7Gfn69h6', 'Kakashi', 'Hatake', '1998-09-15'),
('lammalesang', '$2y$10$rwRcdQZFkTaSq/eS5Lijm.dPv2nHlig3oMIkEHxWlLNCWkoxw.8da', 'Joe', 'La Castagne', '2000-05-04'),
('leeroyjenkins', '$2y$10$DKavgqytdgU1Lcu6yz6EkODs92Y.YFcufScXgD8nRYkU7TOfRy8XW', 'Leeroy', 'Jenkins', '2006-10-23'),
('lindt', '$2y$10$pvdozD8GYm6dyOBoiVfxT.GsRcLf/YpvNiAuET.evEpVFYr7xLs8.', 'Hind', 'Hamila', '1999-05-03'),
('momo', '$2y$10$3LVPSoZTRh0Y4Y.QtKv6QOknZokTzZy1C9y8PurD7S5jGpUeVQ/su', 'Morena', 'Mombelli', '1999-01-31'),
('murloc', '$2y$10$qXIqqL.1pY9nyNtUUyAPNeTFwcPmEYFhiincFXXdkDe7vfr3/fCPW', 'Random', 'Murloc', '1980-01-01'),
('PavelRussia', '$2y$10$bksJvrD/xlsXkdIYwRWiHen2/pzZIv5pu3bJpbiC6cBrafJ9jGgGC', 'Paul', 'Essel', '1998-07-22'),
('polarbear', '$2y$10$0P4nQ0ALds76zdBhwN7ETewjHkrynHewTobDxD6Rmrd2ZP2QiNrje', 'Emma', 'Tourou', '1998-11-15'),
('richrdaldana', '$2y$10$FMP1ksuTmM2YLaU.W7NZ/O.TwAQR5JB7V7RKFvYxhFzsneT3PwL0K', 'Richard', 'Aldana', '1988-05-03'),
('totocptbgn', '$2y$10$9C3E.ogL9wgC0p9VN7e5culmbzbXrWX.W29BONiF2bXFZWqPahr42', 'Thomas', 'Copt-Bignon', '1999-10-23'),
('wisdomguy', '$2y$10$jvnT6OqsKWiSpnWSA6xow.nvjPE86B4jlLGAIS.eYM8CNw1OfLdlG', 'Albus', 'Dumbledore', '1956-04-20'),
('yunez', '$2y$10$HzjAyJVFzpuqboJQ6PPPy.FxcyzkxxlRM9Rq1Ewsq.bDz4Y/25W52', 'Yunez', 'Le Cam', '1999-12-07'),
('zoro', '$2y$10$i6yUYYX9pftKWlNqcOCwweF68Bl7iFdTecB/5j6oJDjjqtlS5iUZW', 'Zoro', 'Roronoa', '1980-01-29');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `postcounter`
--
ALTER TABLE `postcounter`
  ADD PRIMARY KEY (`LastID`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
