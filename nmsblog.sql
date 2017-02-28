-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2017 at 02:29 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nmsblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `body`, `post_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'This is my second blog. Hope ya\'ll like it.', 41, 16, '2017-02-27 22:28:58', '2017-02-27 22:28:58');

-- --------------------------------------------------------

--
-- Table structure for table `comments_visitors`
--

CREATE TABLE `comments_visitors` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL DEFAULT 'visitor'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_02_22_082152_create_social_providers_table', 1),
(4, '2017_02_22_150030_create_posts_table', 2),
(5, '2017_02_25_044701_create_comments_table', 3),
(6, '2017_02_26_115402_create_admins_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('dellakristofferjohn@gmail.com', '$2y$10$K3/zGCkOE/X/JEMUbn14VuoSDNBSl8Gu2N/ZieXynGzRP2pYi21Mu', '2017-02-23 06:39:23');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_publish` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `user_id`, `category`, `is_publish`, `created_at`, `updated_at`) VALUES
(40, 'My First Blog', 'Lorem ipsum dolor sit amet, choro quaestio delicatissimi eum ut. Ex aliquip oblique mediocrem vim. Sonet electram per id. Ex docendi partiendo eam. Ad mel accusam copiosae, in eum congue maiorum ponderum, quidam viderer facilisi sed ei. Mentitum cotidieque an sea, dico dissentiunt et viLorem ipsum dolor sit amet, choro quaestio delicatissimi eum ut. Ex aliquip oblique mediocrem vim. Sonet electram per id. Ex docendi partiendo eam. Ad mel accusam copiosae, in eum congue maiorum ponderum, quidam viderer facilisi sed ei. Mentitum cotidieque an sea, dico dissentiunt et viLorem ipsum dolor sit amet, choro quaestio delicatissimi eum ut. Ex aliquip oblique mediocrem vim. Sonet electram per id. Ex docendi partiendo eam. Ad mel accusam copiosae, in eum congue maiorum ponderum, quidam viderer facilisi sed ei. Mentitum cotidieque an sea, dico dissentiunt et viLorem ipsum dolor sit amet, choro quaestio delicatissimi eum ut. Ex aliquip oblique mediocrem vim. Sonet electram per id. Ex docendi partiendo eam. Ad mel accusam copiosae, in eum congue maiorum ponderum, quidam viderer facilisi sed ei. Mentitum cotidieque an sea, dico dissentiunt et viLorem ipsum dolor sit amet, choro quaestio delicatissimi eum ut. Ex aliquip oblique mediocrem vim. Sonet electram per id. Ex docendi partiendo eam. Ad mel accusam copiosae, in eum congue maiorum ponderum, quidam viderer facilisi sed ei. Mentitum cotidieque an sea, dico dissentiunt et viLorem ipsum dolor sit amet, choro quaestio delicatissimi eum ut. Ex aliquip oblique mediocrem vim. Sonet electram per id. Ex docendi partiendo eam. Ad mel accusam copiosae, in eum congue maiorum ponderum, quidam viderer facilisi sed ei. Mentitum cotidieque an sea, dico dissentiunt et viLorem ipsum dolor sit amet, choro quaestio delicatissimi eum ut. Ex aliquip oblique mediocrem vim. Sonet electram per id. Ex docendi partiendo eam. Ad mel accusam copiosae, in eum congue maiorum ponderum, quidam viderer facilisi sed ei. Mentitum cotidieque an sea, dico dissentiunt et viLorem ipsum dolor sit amet, choro quaestio delicatissimi eum ut. Ex aliquip oblique mediocrem vim. Sonet electram per id. Ex docendi partiendo eam. Ad mel accusam copiosae, in eum congue maiorum ponderum, quidam viderer facilisi sed ei. Mentitum cotidieque an sea, dico dissentiunt et viLorem ipsum dolor sit amet, choro quaestio delicatissimi eum ut. Ex aliquip oblique mediocrem vim. Sonet electram per id. Ex docendi partiendo eam. Ad mel accusam copiosae, in eum congue maiorum ponderum, quidam viderer facilisi sed ei. Mentitum cotidieque an sea, dico dissentiunt et viLorem ipsum dolor sit amet, choro quaestio delicatissimi eum ut. Ex aliquip oblique mediocrem vim. Sonet electram per id. Ex docendi partiendo eam. Ad mel accusam copiosae, in eum congue maiorum ponderum, quidam viderer facilisi sed ei. Mentitum cotidieque an sea, dico dissentiunt et viLorem ipsum dolor sit amet, choro quaestio delicatissimi eum ut. Ex aliquip oblique mediocrem vim. Sonet electram per id. Ex docendi partiendo eam. Ad mel accusam copiosae, in eum congue maiorum ponderum, quidam viderer facilisi sed ei. Mentitum cotidieque an sea, dico dissentiunt et viLorem ipsum dolor sit amet, choro quaestio delicatissimi eum ut. Ex aliquip oblique mediocrem vim. Sonet electram per id. Ex docendi partiendo eam. Ad mel accusam copiosae, in eum congue maiorum ponderum, quidam viderer facilisi sed ei. Mentitum cotidieque an sea, dico dissentiunt et vi', 16, 'Music', 1, '2017-02-27 22:28:14', '2017-02-27 22:28:14'),
(41, 'My Second Blog', 'Lorem ipsum dolor sit amet, choro quaestio delicatissimi eum ut. Ex aliquip oblique mediocrem vim. Sonet electram per id. Ex docendi partiendo eam. Ad mel accusam copiosae, in eum congue maiorum ponderum, quidam viderer facilisi sed ei. Mentitum cotidieque an sea, dico dissentiunt et viLorem ipsum dolor sit amet, choro quaestio delicatissimi eum ut. Ex aliquip oblique mediocrem vim. Sonet electram per id. Ex docendi partiendo eam. Ad mel accusam copiosae, in eum congue maiorum ponderum, quidam viderer facilisi sed ei. Mentitum cotidieque an sea, dico dissentiunt et viLorem ipsum dolor sit amet, choro quaestio delicatissimi eum ut. Ex aliquip oblique mediocrem vim. Sonet electram per id. Ex docendi partiendo eam. Ad mel accusam copiosae, in eum congue maiorum ponderum, quidam viderer facilisi sed ei. Mentitum cotidieque an sea, dico dissentiunt et viLorem ipsum dolor sit amet, choro quaestio delicatissimi eum ut. Ex aliquip oblique mediocrem vim. Sonet electram per id. Ex docendi partiendo eam. Ad mel accusam copiosae, in eum congue maiorum ponderum, quidam viderer facilisi sed ei. Mentitum cotidieque an sea, dico dissentiunt et viLorem ipsum dolor sit amet, choro quaestio delicatissimi eum ut. Ex aliquip oblique mediocrem vim. Sonet electram per id. Ex docendi partiendo eam. Ad mel accusam copiosae, in eum congue maiorum ponderum, quidam viderer facilisi sed ei. Mentitum cotidieque an sea, dico dissentiunt et viLorem ipsum dolor sit amet, choro quaestio delicatissimi eum ut. Ex aliquip oblique mediocrem vim. Sonet electram per id. Ex docendi partiendo eam. Ad mel accusam copiosae, in eum congue maiorum ponderum, quidam viderer facilisi sed ei. Mentitum cotidieque an sea, dico dissentiunt et viLorem ipsum dolor sit amet, choro quaestio delicatissimi eum ut. Ex aliquip oblique mediocrem vim. Sonet electram per id. Ex docendi partiendo eam. Ad mel accusam copiosae, in eum congue maiorum ponderum, quidam viderer facilisi sed ei. Mentitum cotidieque an sea, dico dissentiunt et viLorem ipsum dolor sit amet, choro quaestio delicatissimi eum ut. Ex aliquip oblique mediocrem vim. Sonet electram per id. Ex docendi partiendo eam. Ad mel accusam copiosae, in eum congue maiorum ponderum, quidam viderer facilisi sed ei. Mentitum cotidieque an sea, dico dissentiunt et vi', 16, 'Fashion', 1, '2017-02-27 22:28:27', '2017-02-27 22:28:27');

-- --------------------------------------------------------

--
-- Table structure for table `social_providers`
--

CREATE TABLE `social_providers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_providers`
--

INSERT INTO `social_providers` (`id`, `user_id`, `provider_id`, `provider`, `created_at`, `updated_at`) VALUES
(9, 16, '113470914205787263881', 'google', '2017-02-27 22:27:42', '2017-02-27 22:27:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_enabled` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `user_role`, `is_enabled`, `created_at`, `updated_at`) VALUES
(15, 'admin', 'admin@nmsblog.com', '$2y$10$m2T5pTS1UCgCFOC0CTJr6u5gNwOtvjxIhBnH4Ne2DUFEyHnVpZztm', 'TmjlU4xCX5ywUeSejEzK0C5282PtbF4hCDBZ0pMKYYxgSc99TsKMMYhoSzP9', 'admin', 1, '2017-02-27 22:24:46', '2017-02-27 22:24:46'),
(16, 'Kristoffer John Della', 'dellakristofferjohn@gmail.com', '', 'fZG76P937FC77kj1Fb6m3oJY8RBDqgFYAUUatPwxfOkqnPOYSFt2hMFtVuQc', 'author', 1, '2017-02-27 22:27:42', '2017-02-27 22:27:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments_visitors`
--
ALTER TABLE `comments_visitors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_providers`
--
ALTER TABLE `social_providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `comments_visitors`
--
ALTER TABLE `comments_visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `social_providers`
--
ALTER TABLE `social_providers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
