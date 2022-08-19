-- phpMyAdmin SQL Dump
-- version 5.2.1-dev+20220715.f5dac447a0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 19 août 2022 à 13:39
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `web`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `email`, `roles`, `password`) VALUES
(1, 'webmaker@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$DRSvr.COkJTI7Kb52u7PT.W3ew2/YSG7RT3TeoAWoNYBnOi7uC1NG');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `firstname`, `lastname`, `phone`, `email`, `message`) VALUES
(1, 'sarrou', 'mohamed', '0762914480', 'mohamedserrou2016@gmail.com', 'Bon travail'),
(2, 'sarrou', 'mohamed', '0762914480', 'mohamedserrou2016@gmail.com', 'merci'),
(3, 'amin', 'mohamed', '0762914480', 'mohamedserrou2016@gmail.com', 'merci'),
(4, 'akrouch', 'mohamed', '0762914480', 'mohamed@gmail.com', 'cool'),
(5, 'essabri', 'amine', '0762914480', 'ipn@gmail.com', 'super travail'),
(6, 'sarrou', 'mohamed', '0762914480', 'mohamedserrou2016@gmail.com', 'nice'),
(7, 'sarrou', 'mohamed', '0762914480', 'mohamedserrou2016@gmail.com', 'ssssss'),
(8, 'sarrou', 'mohamed', '0762914480', 'mohamedserrou2016@gmail.com', 'ccccc'),
(9, 'sarrou', 'mohamed', '0762914480', 'mohamedserrou2016@gmail.com', 'cc'),
(10, 'akrouch', 'mohamed', '0762914480', 'mohamed@gmail.com', 'cc');

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

CREATE TABLE `demande` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `societe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secteur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tele` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `demande`
--

INSERT INTO `demande` (`id`, `service_id`, `societe`, `fullname`, `secteur`, `ville`, `tele`, `email`, `message`) VALUES
(1, 1, 'webmaker', 'sarrou mohamed', 'graphiques', '0762914480', '0762914480', 'mohamedserrou2016@gmail.com', 'merci'),
(2, 2, NULL, 'amine filali', 'digitale', NULL, '0762914480', 'mohamedserrou2016@gmail.com', 'merci'),
(3, 2, NULL, 'amine filali2', 'digitale', NULL, '0762914480', 'mohamedserrou2016@gmail.com', 'merci'),
(4, 3, NULL, 'sarrou', NULL, NULL, '0762914480', 'sarrou@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220708155131', '2022-07-08 15:51:38', 69),
('DoctrineMigrations\\Version20220717145615', '2022-07-17 14:56:38', 76),
('DoctrineMigrations\\Version20220717150003', '2022-07-17 15:00:07', 55),
('DoctrineMigrations\\Version20220717160752', '2022-07-17 16:08:01', 48),
('DoctrineMigrations\\Version20220718022041', '2022-07-18 02:20:52', 59),
('DoctrineMigrations\\Version20220718145204', '2022-07-18 14:52:08', 67),
('DoctrineMigrations\\Version20220719112747', '2022-07-19 11:27:56', 111),
('DoctrineMigrations\\Version20220818224954', '2022-08-18 22:50:05', 68),
('DoctrineMigrations\\Version20220818225832', '2022-08-18 22:58:35', 55),
('DoctrineMigrations\\Version20220818231458', '2022-08-18 23:15:02', 60);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `portofolio`
--

CREATE TABLE `portofolio` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `demo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `portofolio`
--

INSERT INTO `portofolio` (`id`, `titre`, `demo`, `image`, `updated_at`) VALUES
(1, 'Web site for IPN (Imagerie pub & neon)', 'cree le site web de la societé IPN fez', 'Capture web_17-7-2022_16210_localhost.jpeg', '2022-07-17 15:25:16'),
(2, 'Web store online IPN', 'boutique online créé pour la société IPN FEZ', 'Capture web_17-7-2022_163828_localhost.jpeg', '2022-07-17 15:42:10'),
(3, 'Inscription online upf fez', 'Cree un site d\'inscirption enligne pour simplifier l\'inscription', 'Capture web_17-7-2022_165820_127.0.0.1.jpeg', '2022-07-17 16:00:56');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `context` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id`, `titre`, `context`, `image`, `updated_at`) VALUES
(1, 'Devloppement Web', 'Dans ce service notre équipe vous propose des sites web de haute qualité , sécurisé , rapide qui vous permet de réaliser votre objectif, cela est assurer par une équipe d\'ingénieure fiable et compétents .', 'browser.png', '2022-07-08 00:00:00'),
(2, 'IA Devloppement', 'Notre équipe s\'occupe de crée des projets artificielle avec des techniques plus avancées dans le monde informatique , l’intelligence artificielle  est devenue l’avenir des technologies informatique', 'WhatsApp Image 2022-08-10 at 20.54.33.jpeg', '2022-08-18 00:00:00'),
(3, 'Desktop Application', 'Notre société  vous permet de crée votre application bureau sécurise ,rapide, fiable, performant , avec un suivi de notre équipe des ingénieures compétents qui vise de vous satisfait .', 'WhatsApp Image 2022-08-03 at 12.45.23.jpeg', '2022-08-03 00:00:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_880E0D76E7927C74` (`email`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2694D7A5ED5CA9E6` (`service_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `portofolio`
--
ALTER TABLE `portofolio`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `demande`
--
ALTER TABLE `demande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `portofolio`
--
ALTER TABLE `portofolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `demande`
--
ALTER TABLE `demande`
  ADD CONSTRAINT `FK_2694D7A5ED5CA9E6` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
