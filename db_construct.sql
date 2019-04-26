-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 26 avr. 2019 à 05:48
-- Version du serveur :  10.1.32-MariaDB
-- Version de PHP :  7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_construct`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `id_user`) VALUES
(1, 8);

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

CREATE TABLE `demande` (
  `id_dem` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_serv` int(11) NOT NULL,
  `experience` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `demande`
--

INSERT INTO `demande` (`id_dem`, `id_user`, `id_serv`, `experience`) VALUES
(2, 8, 1, 'Je suis dans ce domaine depuis plus de 6 ans. J\'ai même participé à la  construction du palais présidentiel.'),
(3, 9, 1, 'Jeune diplômé dans la filière Sciences physique. Je travaille aussi dans une entreprise d\'électricité.'),
(19, 13, 1, 'Bonjour. Je suis dans la maçonnerie depuis 1988. j\'ai participé à de nombreuses construction.'),
(22, 14, 1, 'Un jeune trés motivé dans le domaine de la menuiserie. Je pratique ce métier, il y\'a de cela 15 ans.\r\nJ\' participé à la construction de l\'université de MAN.');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `id_serv` int(11) NOT NULL,
  `nom_serv` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `date_deb` varchar(255) NOT NULL,
  `date_fin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id_serv`, `nom_serv`, `description`, `lieu`, `photo`, `date_deb`, `date_fin`) VALUES
(1, 'Construction d\'un étage R4', 'Nous cherchons des Personnes pour la construction d\'un étage duplex.', 'Cocody Deux plateuax', 'home1.jpg', '2019-04-22', '2019-04-22'),
(2, 'Construction d\'une école', 'La construction d\'une nouvelle \r\nécole pour facilité l\'éducation. Nous avons besoins des Maçons.', 'Korhogo Ville', 'home8.jpg', '2019-04-30', '2019-06-30'),
(3, 'Construction d\'une Maison à 4 pièces.', 'Mr Yao à besoin des personnes dans\r\nla construction de maison pour\r\nconstruire sa villa. ', 'Daloa Ville', 'home10.jpg', '2019-06-13', '2019-07-19');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `numero` varchar(50) NOT NULL,
  `localite` varchar(255) NOT NULL,
  `fonction` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwords` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `nom`, `prenom`, `numero`, `localite`, `fonction`, `email`, `passwords`) VALUES
(7, 'DIABY', 'ALY', '89562315', 'Abidjan Abobo', 'Manoeuvre', 'diab@gmail.com', 'azerty'),
(8, 'DEMBELE', 'DAOUDA', '55736487', 'Abidjan Abobo', 'Menuisier', 'david@gmail.com', 'azertyu'),
(9, 'KOUAME', 'PARFAIT', '48698745', 'Bouake', 'Electricien', 'kouame@gmail.com', 'azertyui'),
(10, 'LOUKOU', 'ARISTIDE', '48796532', 'Treichville', 'Electricien', 'louk@gmail.com', 'azertyuio'),
(11, 'KONE', 'KADY', '44789658', 'Adjame', 'Electricien', 'kad@gmail.com', 'azerty'),
(12, 'KONE', 'KADY', '44789658', 'Adjame', 'Electricien', 'kad@gmail.com', 'azerty'),
(13, 'SIDIBE', 'MOUSSA', '48796352', 'BOUAKE SOKOURA', 'Maçon', 'mouss@gmail.com', '123456789'),
(14, 'DEMBELE', 'YACOUBA', '04474642', 'BOUAKE(SOKOURA)', 'Menuisier', 'yac@gmail.com', '04474642');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`id_dem`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_serv` (`id_serv`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_serv`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `demande`
--
ALTER TABLE `demande`
  MODIFY `id_dem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `id_serv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `demande`
--
ALTER TABLE `demande`
  ADD CONSTRAINT `demande_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `demande_ibfk_2` FOREIGN KEY (`id_serv`) REFERENCES `service` (`id_serv`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
