-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  lun. 15 jan. 2018 à 15:11
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `movieproject`
--

-- --------------------------------------------------------

--
-- Structure de la table `actors`
--

CREATE TABLE `actors` (
  `id` int(11) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sh`
--

CREATE TABLE `sheets` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `director` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `synopsis` varchar(2000) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sheets_actors`
--

CREATE TABLE `sheets_actors` (
  `id_actor` int(11) NOT NULL,
  `id_sheet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sheets_catedories`
--

CREATE TABLE `sheets_categories` (
  `id_sheet` int(11) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sh`
--
ALTER TABLE `sheets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `sh`
--
ALTER TABLE `sheets`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;



ALTER TABLE `sheets_actors`
    ADD CONSTRAINT `id_actor` FOREIGN KEY (`id_actor`) REFERENCES `actors` (`id`);
ALTER TABLE `sheets_actors`
    ADD CONSTRAINT `id_sheet_actor` FOREIGN KEY (`id_sheet`) REFERENCES `sheets` (`id`);

ALTER TABLE `sheets_categories`
      ADD CONSTRAINT `id_category` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`);
ALTER TABLE `sheets_categories`
      ADD CONSTRAINT `id_sheet_category` FOREIGN KEY (`id_sheet`) REFERENCES `sheets` (`id`);


-- INSERT --
INSERT INTO `sheets` (`title`, `director`, `date`, `nationality`, `synopsis`, `image`) VALUES
  ('Black panther', 'Ryan Coogler', '2018-02-14', 'Américain', 'Après les événements qui se sont déroulés dans Captain America : Civil War, T’Challa revient chez lui prendre sa place sur le trône du Wakanda, une nation africaine technologiquement très avancée. Mais lorsqu’un vieil ennemi resurgit, le courage de T’Challa est mis à rude épreuve, aussi bien en tant que souverain qu’en tant que Black Panther. Il se retrouve entraîné dans un conflit qui menace non seulement le destin du Wakanda, mais celui du monde entier…', 'black-panther.jpg');

INSERT INTO actors(lastname,firstname) VALUES
  ('Jordan','Michael B.');

INSERT INTO sheets_actors VALUES
  (1,1);

INSERT INTO categories(name) VALUES
  ('Action'),
  ('Science fiction'),
  ('Comédie'),
  ('Horreur'),
  ('Guerre'),
  ('Musique');


