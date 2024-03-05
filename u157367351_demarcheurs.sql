-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 13 oct. 2020 à 07:19
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `u157367351_demarcheurs`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Appartement (suite)', '2019-07-26 00:27:11', '2019-07-26 00:27:11'),
(2, 'Logement en copropriété (condominium ou condo)', '2019-07-26 00:27:11', '2019-07-26 00:27:11'),
(3, 'Duplex', '2019-07-26 00:27:11', '2019-07-26 00:27:11'),
(4, 'Maison isolée', '2019-07-26 00:27:11', '2019-07-26 00:27:11'),
(5, 'Maison jumelée', '2019-07-26 00:27:11', '2019-07-26 00:27:11'),
(6, 'Maison en rangée', '2019-07-26 00:27:11', '2019-07-26 00:27:11'),
(7, 'Chambre', '2019-07-26 00:27:11', '2019-07-26 00:27:11'),
(8, 'Autres', '2019-07-26 00:27:11', '2019-07-26 00:27:11');

-- --------------------------------------------------------

--
-- Structure de la table `logements`
--

CREATE TABLE `logements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `texte` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `prix` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commission` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `frais_de_visite` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pseudo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `limit` date NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `logements`
--

INSERT INTO `logements` (`id`, `title`, `texte`, `category_id`, `region_id`, `user_id`, `prix`, `commission`, `frais_de_visite`, `pseudo`, `email`, `limit`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Chambre dediee', 'Chambre Moderne avec coin cuisine à ange raphael à 20m de la route bien propre derriere le Snack DREAMS.', 7, 5, 0, '40000', '25000', '5000', 'Guyzo', 'arrolgb@yahoo.fr', '2020-01-06', 0, '2019-12-30 12:12:50', '2019-12-30 12:12:50'),
(2, 'Appartement spacieux', 'Appartement spacieux', 1, 5, 0, '100000', '2500', '1000', 'arnold', 'arnold3p@yahoo.fr', '2020-02-11', 1, '2020-01-14 11:43:54', '2020-01-14 11:43:54'),
(3, 'Appartement moderne', 'Appartement moderne', 1, 1, 17, '20000', '2000', '1000', 'PA PRISO', 'pa.priso@apesafund.com', '2020-02-04', 0, '2020-01-14 15:43:34', '2020-01-14 15:43:34'),
(4, 'Chambre équipée', 'Chambre équipée', 7, 1, 17, '45000', '2500', '1000', 'PA PRISO', 'pa.priso@apesafund.com', '2020-02-11', 1, '2020-01-14 15:53:24', '2020-01-14 15:53:24');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `texte` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logement_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `texte`, `email`, `logement_id`, `created_at`, `updated_at`) VALUES
(1, 'T’es noyaux', 'prisoprisopaulinarnold@gmail.com', 4, '2020-01-14 15:57:57', '2020-01-14 15:57:57');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(349, '2014_10_12_000000_create_users_table', 1),
(350, '2014_10_12_100000_create_password_resets_table', 1),
(351, '2019_07_23_082947_create_regions_table', 1),
(352, '2019_07_23_083801_create_categories_table', 1),
(353, '2019_07_29_133542_create_logements_table', 1),
(354, '2019_07_29_133752_create_uploads_table', 1),
(355, '2019_07_29_140026_create_messages_table', 1),
(356, '2019_09_02_142443_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Structure de la table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 6),
(3, 'App\\Models\\User', 7),
(3, 'App\\Models\\User', 8),
(3, 'App\\Models\\User', 9),
(3, 'App\\Models\\User', 10),
(3, 'App\\Models\\User', 11),
(3, 'App\\Models\\User', 12),
(3, 'App\\Models\\User', 13),
(3, 'App\\Models\\User', 14),
(3, 'App\\Models\\User', 15),
(3, 'App\\Models\\User', 16),
(3, 'App\\Models\\User', 17);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user.index', 'web', '2019-12-27 09:55:09', '2019-12-27 09:55:09'),
(2, 'user.create', 'web', '2019-12-27 09:55:10', '2019-12-27 09:55:10'),
(3, 'user.all', 'web', '2019-12-27 09:55:10', '2019-12-27 09:55:10'),
(4, 'user.show', 'web', '2019-12-27 09:55:10', '2019-12-27 09:55:10'),
(5, 'user.edit', 'web', '2019-12-27 09:55:10', '2019-12-27 09:55:10'),
(6, 'user.destroy', 'web', '2019-12-27 09:55:10', '2019-12-27 09:55:10'),
(7, 'role.create', 'web', '2019-12-27 09:55:10', '2019-12-27 09:55:10'),
(8, 'role.index', 'web', '2019-12-27 09:55:10', '2019-12-27 09:55:10'),
(9, 'role.show', 'web', '2019-12-27 09:55:10', '2019-12-27 09:55:10'),
(10, 'role.edit', 'web', '2019-12-27 09:55:10', '2019-12-27 09:55:10'),
(11, 'role.destroy', 'web', '2019-12-27 09:55:10', '2019-12-27 09:55:10'),
(12, 'categorie.create', 'web', '2019-12-27 09:55:10', '2019-12-27 09:55:10'),
(13, 'categorie.index', 'web', '2019-12-27 09:55:10', '2019-12-27 09:55:10'),
(14, 'categorie.show', 'web', '2019-12-27 09:55:10', '2019-12-27 09:55:10'),
(15, 'categorie.edit', 'web', '2019-12-27 09:55:10', '2019-12-27 09:55:10'),
(16, 'categorie.destroy', 'web', '2019-12-27 09:55:10', '2019-12-27 09:55:10'),
(17, 'region.index', 'web', '2019-12-27 09:55:10', '2019-12-27 09:55:10'),
(18, 'region.show', 'web', '2019-12-27 09:55:10', '2019-12-27 09:55:10'),
(19, 'logement.all', 'web', '2019-12-27 09:55:10', '2019-12-27 09:55:10'),
(20, 'user.moderer', 'web', '2019-12-27 09:55:10', '2019-12-27 09:55:10'),
(21, 'user.approve', 'web', '2019-12-27 09:55:11', '2019-12-27 09:55:11'),
(22, 'user.refuse', 'web', '2019-12-27 09:55:11', '2019-12-27 09:55:11'),
(23, 'user.obsoletes', 'web', '2019-12-27 09:55:11', '2019-12-27 09:55:11'),
(24, 'user.addweek', 'web', '2019-12-27 09:55:11', '2019-12-27 09:55:11'),
(25, 'user.actives', 'web', '2019-12-27 09:55:11', '2019-12-27 09:55:11'),
(26, 'user.attente', 'web', '2019-12-27 09:55:11', '2019-12-27 09:55:11'),
(27, 'user.obsolete', 'web', '2019-12-27 09:55:11', '2019-12-27 09:55:11'),
(28, 'user.messages', 'web', '2019-12-27 09:55:11', '2019-12-27 09:55:11'),
(29, 'user.message.approve', 'web', '2019-12-27 09:55:11', '2019-12-27 09:55:11'),
(30, 'user.message.refuse', 'web', '2019-12-27 09:55:11', '2019-12-27 09:55:11');

-- --------------------------------------------------------

--
-- Structure de la table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `regions`
--

INSERT INTO `regions` (`id`, `name`, `slug`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Adamaoua', 'adamaoua', 1, '2019-07-26 00:27:11', '2019-07-26 00:27:11'),
(2, 'Centre', 'centre', 2, '2019-07-26 00:27:11', '2019-07-26 00:27:11'),
(3, 'Extreme_Nord', 'extreme_nord', 3, '2019-07-26 00:27:11', '2019-07-26 00:27:11'),
(4, 'Est', 'est', 4, '2019-07-26 00:27:11', '2019-07-26 00:27:11'),
(5, 'Littoral', 'littoral', 5, '2019-07-26 00:27:11', '2019-07-26 00:27:11'),
(6, 'Nord', 'nord', 6, '2019-07-26 00:27:11', '2019-07-26 00:27:11'),
(7, 'Nord_Ouest', 'nord_ouest', 7, '2019-07-26 00:27:11', '2019-07-26 00:27:11'),
(8, 'Ouest', 'ouest', 8, '2019-07-26 00:27:11', '2019-07-26 00:27:11'),
(9, 'Sud', 'sud', 9, '2019-07-26 00:27:11', '2019-07-26 00:27:11'),
(10, 'Sud_Ouest', 'sud_ouest', 10, '2019-07-26 00:27:11', '2019-07-26 00:27:11');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'web', '2019-12-27 09:55:11', '2019-12-27 09:55:11'),
(2, 'admin', 'web', '2019-12-27 09:55:13', '2019-12-27 09:55:13'),
(3, 'demarcheur', 'web', '2019-12-27 09:55:14', '2019-12-27 09:55:14');

-- --------------------------------------------------------

--
-- Structure de la table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(11, 1),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 1),
(21, 2),
(22, 1),
(22, 2),
(23, 1),
(23, 2),
(24, 1),
(24, 2),
(25, 1),
(25, 3),
(26, 1),
(26, 3),
(27, 1),
(27, 3),
(28, 1),
(28, 2),
(29, 1),
(29, 2),
(30, 1),
(30, 2);

-- --------------------------------------------------------

--
-- Structure de la table `uploads`
--

CREATE TABLE `uploads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `index` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logement_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `uploads`
--

INSERT INTO `uploads` (`id`, `filename`, `original_name`, `index`, `logement_id`, `created_at`, `updated_at`) VALUES
(2, 'wissYA9uhHXkxTSktgUOozWvu58Ljd.jpg', '1db4de0e-3669-46be-a03e-481eb8249fd7.jpg', '0', 2, '2020-01-14 11:42:55', '2020-01-14 11:43:54'),
(3, 'r335VkLVoqojh7MXj5HIsootWngPtG.jpg', '4e641a42_original.jpg', '0', 3, '2020-01-14 15:43:04', '2020-01-14 15:43:34'),
(4, '9Z9kACOglsRglvCu8Mme3Ftzy7seqO.jpg', 'bc82eb99-c0fb-40aa-9df7-26530e229979.jpg', '0', 4, '2020-01-14 15:52:58', '2020-01-14 15:53:24'),
(5, 'z9YARaSC356BQoFPYKWJwU2CmcQL2T.jpg', 'driver_private.jpg', '56En2NH4KPBVTLplTCqa46QTD88CLx', 0, '2020-06-30 15:21:02', '2020-06-30 15:21:02');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `telephone`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'support', 'support@demarcheurs.com', '2020-01-14 11:08:48', '$2y$10$4iJh8rOKS4DLvfbTUDnB3OqN7603uWYxZBMyLogqjay11iFer3/Hi', NULL, 'images.png', 'xsNm0fjfRtpd1OyJSysiNymCU5qWojP7LAkHPgsUSdAOpGOyK675Mlbu6t2c', '2019-12-31 10:31:29', '2020-02-19 09:20:40'),
(2, 'Priso Priso Paulin Arnold', 'prisoprisopaulinarnold@gmail.com', '2020-01-14 11:39:57', '$2y$10$CW8G4orWLXF9izlGZ6efP.1oQGgd5DMBWryAkmZTSK24TaXN9DpKK', NULL, 'images.png', NULL, '2020-01-13 15:30:21', '2020-01-14 11:39:57'),
(17, 'PA PRISO', 'pa.priso@apesafund.com', '2020-01-14 15:38:24', '$2y$10$nBFjgHTKw2m3/60iB6j6SuCUvzvYvmpuSfT/QQaPrdo/iWIkVO1d.', NULL, 'images.png', NULL, '2020-01-14 15:36:29', '2020-01-14 15:38:24');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Index pour la table `logements`
--
ALTER TABLE `logements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logements_category_id_foreign` (`category_id`),
  ADD KEY `logements_region_id_foreign` (`region_id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_logement_id_foreign` (`logement_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Index pour la table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `regions_name_unique` (`name`),
  ADD UNIQUE KEY `regions_slug_unique` (`slug`),
  ADD UNIQUE KEY `regions_code_unique` (`code`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Index pour la table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `logements`
--
ALTER TABLE `logements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=357;

--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `logements`
--
ALTER TABLE `logements`
  ADD CONSTRAINT `logements_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `logements_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`);

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_logement_id_foreign` FOREIGN KEY (`logement_id`) REFERENCES `logements` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
