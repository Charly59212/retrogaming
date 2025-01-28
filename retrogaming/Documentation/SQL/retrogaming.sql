-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 25 jan. 2025 à 14:58
-- Version du serveur :  5.7.17
-- Version de PHP :  7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `retrogaming`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `intro` text NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` enum('console','jeu','pocket','gameplay') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `title`, `intro`, `description`, `image`, `type`) VALUES
(1, 'La super Nintendo', 'Conçue par Masayuki Uemura', 'La Super NES sort le mercredi 21 novembre 1990 pour un prix de 1300 francs de l\'époque, soit l’équivalent de 278 €. C\'est un succès immédiat ! la livraison initiale de 300 000 unités est vendue en quelques heures et le dérangement occasionné conduit le gouvernement japonais à demander aux fabricants de consoles de jeux vidéo de prévoir, à l\'avenir, de sortir leurs consoles en fin de semaine.', 'Snes.jpg', 'console'),
(2, 'La Mega Drive', 'Conçue par l\'équipe de Masami Ishikawa', 'La version européenne de la console sort le 30 novembre 1990, composée de l\'offre groupée comprenant le jeu Altered Beast. Elle est mise en vente à 1900 francs de l\'époque, soit l’équivalent de 429 €. S\'appuyant sur le succès de la Master System, la Mega Drive devient la console la plus populaire en Europe, et plus de jeux sont disponibles lors de sa mise sur le marché par rapport aux autres.', 'Mdrive.JPG', 'console'),
(3, 'La Game Boy', 'De Nintendo', 'La Game Boy sort en France le 28 septembre 1990 dans un paquetage comprenant la console, un câble de liaison pour jouer à deux, des écouteurs stéréos, quatre piles R6, pour pouvoir jouer immédiatement, et le jeu Tetris, le tout pour 590 francs (environ 90 euros). Les jeux vendus séparément sont, au moment du lancement. Il se vend 1,4 million de Game Boy la première année en France, un record à l\'époque', 'Gameboy.jpg', 'pocket'),
(4, 'La Game Gear', 'De Sega', 'Au niveau matériel, la Game Gear se rapproche tant de sa grande sœur la Master System (dont elle est l\'adaptation en console portable avec quelques différences), que sa ludothèque est composée en grande partie de conversions de jeux faits pour cette dernière avec pour seule différence notable la résolution, plus faible afin d\'être adaptée à l\'écran de la console portable. ', 'gamegear.jpg', 'pocket'),
(5, 'Final Fantasy', 'Édité par Eidos Interactive', 'Final Fantasy est un jeu vidéo de rôle développé par Square (devenu depuis Square Enix) sous la direction de Yoshinori Kitase et sorti en 1997, constituant le septième opus de la série Final Fantasy. Premier jeu de la série à être produit pour la console Sony PlayStation ainsi que pour les ordinateurs dotés de Windows, c’est aussi le premier Final Fantasy à utiliser des graphismes en 3D avec des personnages rendus en temps réel et des arrière-plans précalculés. ', 'FF7.jpg', 'jeu'),
(6, 'Street Fighter 2', 'The World Warrior', 'Street Fighter 2 est un jeu vidéo de combat développé et édité par Capcom, sorti en 1991 sur système d\'arcade CP System, et sujet à un très grand nombre d\'adaptations, y compris sur les téléphones Blackberry. Le jeu fait s\'affronter plusieurs personnages dans des combats en un-contre-un. Le premier joueur mettant KO son adversaire par deux fois sort victorieux du combat.', 'SF2.jpg', 'jeu'),
(7, 'Les jeux d\'aventure', 'Tout public', 'Le jeu d\'aventure est un genre de jeu vidéo dont l\'intérêt prédominant se focalise sur la narration plutôt que sur les réflexes et l\'action. Plus précisément, les jeux d\'aventure mettent le plus souvent l\'accent sur l\'exploration, les dialogues, la résolution d\'énigmes.', 'aventure.jpg', 'gameplay'),
(8, 'Les jeux d\'arcade', 'Toujours plus d\'action !', 'Un jeu vidéo d\'arcade est un jeu vidéo dans une borne d\'arcade se présentant sous la forme d\'un meuble muni d\'un monnayeur, d\'un écran et d\'un dispositif de contrôle. Ce type de jeu d\'arcade se trouve dans des lieux publics comme les centres commerciaux, les bars ou dans des établissements spécialisés connus sous le nom de salles d\'arcade. Puis ils sont arrivés sur nos consoles...', 'arcade.jpg', 'gameplay'),
(9, 'La playstation 1', 'Par Sony', 'La PlayStation 1 est une console de jeux vidéo de cinquième génération, produite par Sony Computer Entertainment à partir de 1994. La PlayStation originale fut la première machine de la gamme PlayStation, déclinée ensuite en PSone (une version plus petite et plus légère que l\'originale). Le 18 mai 2004, soit près de dix ans après son lancement, Sony annonce avoir distribué 100 millions de consoles dans le monde et plus de 962 millions de jeux PlayStation. ', 'Ps1.jpg', 'console'),
(10, 'Alladin', 'Édition Virgin Interactive', 'Aladdin est un jeu vidéo de plates-formes développé et édité par Virgin Interactive en 1993 sur Mega Drive. Des versions Amiga 1200, DOS, Game Boy et NES ont également vu le jour. Il s\'agit d\'un des trois jeux réalisés d\'après le film du même nom de Walt Disney Pictures, aux côtés de Aladdin pour Super Nintendo et Game Boy Advance, et de Aladdin pour Master System et Game Gear. ', 'aladin.jpg', 'jeu'),
(11, 'La Lynx', 'Par Atari', 'L\'Atari Lynx fut la seule console portable d\'Atari et la première portable avec un écran LCD couleur. Elle est sortie en 1989, la même année que le Game Boy (original monochrome) de Nintendo. Atari débutera la commercialisation de la console en octobre 1989 au prix initial de 199 dollars américains, puis elle débarquera en Europe quelques mois plus tard, au début de l\'année 1990. ', 'lyxn.jpg', 'pocket'),
(12, 'Les jeux de courses', 'A fond les ballons !', 'Un jeu vidéo de course est un genre de jeu vidéo dont le gameplay est basé sur le contrôle d\'un véhicule, le plus souvent motorisé. Le but est généralement de progresser le plus rapidement possible d\'un point à un autre pour gagner sur les autres ou sur le temps. Ce type de jeu met en exergue la notion de compétition et tire son intérêt des sensations de vitesse et de pilotage qu\'il procure.', 'course.jpg', 'gameplay');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `rating` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `article_id`, `user_id`, `content`, `rating`) VALUES
(1, 1, 2, 'Oh la Super Nintendo, que de souvenirs !', 5),
(2, 1, 5, 'La Playstation 1, quelques pannes mais énorme choix de jeux', 3),
(3, 4, 5, 'Je suis un grand fan des jeux d\'aventures ! ', 5),
(4, 2, 5, 'Final Fantasy, cultissime !!', 5),
(5, 3, 4, 'Ah la fabuleuse game boy... j’ai toujours la mienne !', 4),
(6, 3, 3, 'J\'adorais ma game gear', 4),
(7, 2, 4, 'Alladin, un jeu tout simplement magnifique !', 5),
(8, 1, 4, 'Je joue encore avec ma mega drive à certaines occasions ', 4),
(9, 4, 2, 'Ah les jeux de courses...vrouuum ', 4),
(10, 3, 2, 'J\'avais complètement oublié la lynx éphémère hihi', 3),
(11, 4, 3, 'J\'en ai passé des heures sur les jeux d\'arcade', 3),
(12, 2, 3, 'Street Fighter, le jeu de baston par excellence', 4);

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pages`
--

INSERT INTO `pages` (`id`, `name`) VALUES
(1, 'Consoles'),
(2, 'Jeux'),
(3, 'Pocket'),
(4, 'Gameplay');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('client','admin') NOT NULL DEFAULT 'client'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Charly', 'Charly@gmail.com', '$2y$10$gyH3hBm959ynCGqVHZiC1ecdyiXETIdrA3AOhadrqkgCBSTMN3/XS', 'admin'),
(2, 'Marie', 'Marie@gmail.com', '$2y$10$gBP3wuuGfkZhBfkrHMa.t.3sqtqT2ooOgaQwze/98xbUnBhXxcF4m', 'client'),
(3, 'Robert', 'Robert@gmail.com', '$2y$10$wmDT2DC5jPSjG5krVilGxeThd1fWlelGBYgJkQUkGL3jHbUt0p2wu', 'client'),
(4, 'Julie', 'Julie@gmail.com', '$2y$10$5cCIu5GS7Ij6m9tTZrHPxujO00mWXM3mOketDAfABF/eWnsXt57Vi', 'client'),
(5, 'Jacques', 'Jacques@gmail.com', '$2y$10$t9I9w5Kbh5x8UGlJIe2jFOrBN32acoPUE6wb9LU/8MG8wzVIC7.6C', 'client');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
