-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 08 avr. 2022 à 13:18
-- Version du serveur : 5.7.33
-- Version de PHP : 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `comparoperator`
--

-- --------------------------------------------------------

--
-- Structure de la table `destination`
--

CREATE TABLE `destination` (
  `id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `tour_operator_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `destination`
--

INSERT INTO `destination` (`id`, `location`, `price`, `tour_operator_id`) VALUES
(1, 'Rome', 1650, 2),
(2, 'Londres', 1100, 2),
(3, 'Monaco', 1390, 1),
(4, 'Tunis', 2390, 3),
(5, 'Mars', 500000, 4),
(6, 'Rome', 1595, 3),
(7, 'Belize', 1692, 3),
(8, 'Seychelles', 2400, 7),
(9, 'Seychelles', 1500, 2),
(10, 'Japon', 2489, 1),
(11, 'Islande', 1250, 3),
(12, 'Japon', 2048, 5),
(13, 'Antarctique', 2865, 5),
(14, 'Zambie', 1245, 2),
(15, 'Zambie', 3250, 7);

-- --------------------------------------------------------

--
-- Structure de la table `destionationdetail`
--

CREATE TABLE `destionationdetail` (
  `id` int(11) NOT NULL,
  `location` varchar(255) COLLATE utf8_bin NOT NULL,
  `img` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `destionationdetail`
--

INSERT INTO `destionationdetail` (`id`, `location`, `img`, `title`, `description`) VALUES
(1, 'Rome', 'https://www.voyageur-independant.com/wp-content/uploads/quel-city-pass-pour-rome.jpg', '\"rom-antique\"', 'Civilisations antiques et modernes dans cette métropole vieille de 2 500 ans.'),
(2, 'Londres', 'https://cdn2.civitatis.com/reino-unido/londres/guia/camden-town.jpg', 'Hello...', 'On vous emmène dans les coins les plus insolites de Londres'),
(3, 'Monaco', 'https://img.ev.mu/images/portfolio/villes/40699/1605x1070/297766.jpg', 'La principauté du Rocher ', 'Enclavée en côte d’Azur, c\'est un lieu de villégiature privilégié de la Jet-Set.'),
(4, 'Tunis', 'https://www.voyage-tunisie.info/wp-content/uploads/2017/11/tunis3.jpg', 'Culture et sable fin...', 'Entre plages de rêve et trésors architecturaux,à la recherche d\'un séjour détente...'),
(5, 'Mars', 'https://file1.science-et-vie.com/var/scienceetvie/storage/images/1/1/6/116656/l-incroyable-conquete-mars.jpg?alias=original', 'Avec Rover', 'Explorer la planète Mars devient possible pour tout le monde'),
(6, 'Belize', 'https://ibp.info6tm.fr/api/v1/files/61e69209d286c2751d649a36/methodes/article/image.jpg', 'Un paradis méconnu', 'Une destination idéale pour ceux qui souhaitent un combiné entre culture maya, intense nature tropicale et découvertes sous-marines sur la barrière de corail.'),
(7, 'Seychelles', 'https://www.jet-lag-trips.com/wp-content/uploads/2016/09/Voyage-aux-Seychelles-1280x720.jpg', 'Entre terre et mer', 'Un chapelet de 92 îles posées sur l\'océan indien d’un bleu transparent baignant les plus belles plages de sable fin de notre planète.'),
(8, 'Islande', 'https://mytriplan.travel/wp-content/uploads/2018/07/Islande-Kirkjufell-scaled-e1585049398887.jpeg', 'Terre de feu et de glace', NULL),
(9, 'Japon', 'https://nouvelles.paxeditions.com/storage/app/uploads/public/606/cd2/be0/thumb_110473_1200_1_0_0_auto.jpg', 'L’Empire du Soleil Levant', NULL),
(10, 'Antarctique', 'https://www.stras.info/wp-content/uploads/2016/10/pole-nord.jpg', 'Jusqu\'au bout du monde', NULL),
(11, 'Zambie', 'https://www.allibert-trekking.com/iconographie/25/PA1_zambie.jpeg', 'Le safari de vos envies', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `tour_operator_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `review`
--

INSERT INTO `review` (`id`, `message`, `author`, `tour_operator_id`) VALUES
(1, 'Super voyage, prestation au top !!', 'Michel', 2),
(2, 'Tout est inclus dans le prix, c\'est cool, je recommande', 'Paul', 3),
(3, 'Un peu cher, mais ça vaut le coup', 'Paul', 2),
(4, 'arnaque!!!! a fuire!!!', 'René', 2);

-- --------------------------------------------------------

--
-- Structure de la table `tour_operator`
--

CREATE TABLE `tour_operator` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `grade_count` int(11) NOT NULL DEFAULT '0',
  `grade_total` int(11) NOT NULL DEFAULT '0',
  `is_premium` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tour_operator`
--

INSERT INTO `tour_operator` (`id`, `name`, `link`, `grade_count`, `grade_total`, `is_premium`) VALUES
(1, 'Salaun Holidays', 'https://www.salaun-holidays.com/', 0, 0, 0),
(2, 'Fram', 'https://www.fram.fr/', 2, 6, 1),
(3, 'Heliades', 'https://www.heliades.fr/', 1, 4, 0),
(4, 'SpaceX', 'https://www.spacex.com/', 0, 0, 0),
(5, 'sejours voyages', 'https://www.sejoursvoyages.com/liste-tours-operateurs.html', 0, 0, 1),
(7, 'clubmed', 'https://www.clubmed.fr', 0, 0, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destination_tour_operator` (`tour_operator_id`);

--
-- Index pour la table `destionationdetail`
--
ALTER TABLE `destionationdetail`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `review_tour_operator` (`tour_operator_id`);

--
-- Index pour la table `tour_operator`
--
ALTER TABLE `tour_operator`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `destination`
--
ALTER TABLE `destination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `destionationdetail`
--
ALTER TABLE `destionationdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `tour_operator`
--
ALTER TABLE `tour_operator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `destination`
--
ALTER TABLE `destination`
  ADD CONSTRAINT `destination_tour_operator` FOREIGN KEY (`tour_operator_id`) REFERENCES `tour_operator` (`id`);

--
-- Contraintes pour la table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_tour_operator` FOREIGN KEY (`tour_operator_id`) REFERENCES `tour_operator` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
