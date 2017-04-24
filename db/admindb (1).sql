-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2017 at 11:44 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admindb`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `caption` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner_img` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(8) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `status` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_09_07_102640_create_roles_table', 1),
(4, '2016_09_07_104930_update_users_table', 1),
(5, '2016_09_07_110555_create_permissions_table', 1),
(6, '2016_09_07_110717_create_role_permissions_table', 1),
(7, '2016_09_07_113734_create_site_settings_table', 1),
(16, '2017_02_05_104202_create_categories_table', 2),
(17, '2017_02_05_104921_create_products_table', 2),
(18, '2017_02_05_105718_create_product_img_table', 2),
(19, '2017_02_05_105928_create_banners_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `parent_id`) VALUES
(1, 'RolesController', NULL),
(2, 'index', 1),
(3, 'create', 1),
(4, 'store', 1),
(5, 'show', 1),
(6, 'edit', 1),
(7, 'update', 1),
(8, 'destroy', 1),
(9, 'RegisterController', NULL),
(10, 'showUserLists', 9),
(11, 'showUser', 9),
(12, 'editUser', 9),
(13, 'destroyUser', 9),
(14, 'showRegistrationForm', 9),
(15, 'register', 9),
(16, 'SiteSettingsController', NULL),
(17, 'edit', 16),
(18, 'update', 16),
(19, 'ProductsController', NULL),
(20, 'index', 19),
(21, 'create', 19),
(22, 'store', 19),
(23, 'show', 19),
(24, 'edit', 19),
(25, 'update', 19),
(26, 'destroy', 19);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `price` int(11) NOT NULL,
  `staus` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `img` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `is_deletable` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `status`, `is_deletable`, `created_at`, `updated_at`) VALUES
(1, 'Supper Admin', '<p>Blanditiis velit quis quisquam dolorum exercitationem labore perspiciatis esse. Illum dolorem sunt dolores consequatur ullam. Qui numquam impedit pariatur similique rerum eligendi assumenda.</p>\r\n', '1', 0, '2017-02-02 01:48:56', '2017-02-02 04:01:52'),
(2, 'Admin', '<p>Qui ut animi et magni quia voluptas suscipit dolores. Quaerat eius deleniti facere corrupti. Neque quas eveniet fuga sequi quo molestiae saepe. Voluptates dolores quas molestiae rerum sed.</p>\r\n', 'active', 1, '2017-02-02 01:48:56', '2017-02-02 05:02:48'),
(3, 'Agent', 'Ducimus et quis dignissimos dolorem molestiae. Magni excepturi voluptatem excepturi iusto placeat perferendis laudantium. Occaecati consequatur esse dolor qui a.', 'active', 1, '2017-02-02 01:48:56', '2017-02-02 01:48:56'),
(4, 'Maneger', '<p>Have to manage somthing</p>\r\n', 'active', 1, '2017-02-07 18:26:37', '2017-02-07 18:26:37'),
(5, 'executive', '<p>This position is to manage the role of editor</p>\r\n', 'active', 1, '2017-02-08 16:17:28', '2017-02-08 16:17:28');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(2, 9),
(2, 10),
(2, 11),
(2, 14),
(2, 15),
(2, 16),
(2, 17),
(2, 18),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(4, 6),
(4, 7),
(4, 8),
(4, 9),
(4, 10),
(4, 11),
(4, 12),
(4, 13),
(4, 14),
(4, 15),
(4, 16),
(4, 17),
(4, 18),
(5, 9),
(5, 10),
(5, 11),
(5, 12),
(5, 15),
(5, 16),
(5, 17),
(5, 18);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `logo_alt` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `name`, `email`, `logo`, `logo_alt`) VALUES
(1, 'Laravel App', 'info@example.com', '1486030068_untitled.png', 'App Logo');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `password`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 'Ms. Dessie Shields', 'abc@example.com', '$2y$10$2VX0h4m9joW.C7A8jIrBku0U6uQTJroiSyrQhGLy5Akzo6Xo2wI.y', '4BmmeFMSWA5dNF5v9ktpCfoFNTC8lC6GzegyuIaXF5d8iv42gW3zAlf1h6Rf', 'active', '2017-02-02 01:49:39', '2017-03-19 18:39:56'),
(3, 2, 'Randi Mitchell', 'alysa.schroeder@example.org', '$2y$10$U/V09t8pUklwMIk9O617Re410Ex5l0GGlHZO.4pUviBN7.rSIcHqu', 'nY1wVq4nWvrEid8OzMF3j7LXgCQ3NO6544DZcuvJuqCq6Wn3KqFNJ1KFvDer', 'active', '2017-02-02 01:49:39', '2017-02-02 04:37:43'),
(4, 2, 'Lorenzo Streich', 'rowe.adan@example.net', '$2y$10$U/V09t8pUklwMIk9O617Re410Ex5l0GGlHZO.4pUviBN7.rSIcHqu', 'D7Hsgi5EL1', 'active', '2017-02-02 01:49:39', '2017-02-02 01:49:39'),
(5, 3, 'Patricia Sanford Sr.', 'pgerhold@example.net', '$2y$10$U/V09t8pUklwMIk9O617Re410Ex5l0GGlHZO.4pUviBN7.rSIcHqu', 'TiXhQfaHfo', 'active', '2017-02-02 01:49:39', '2017-02-02 01:49:39'),
(6, 3, 'Maude Moore Jr.', 'arnaldo.dibbert@example.com', '$2y$10$U/V09t8pUklwMIk9O617Re410Ex5l0GGlHZO.4pUviBN7.rSIcHqu', 'utFibkf4hU', 'active', '2017-02-02 01:49:39', '2017-02-02 01:49:39'),
(7, 2, 'Hassan', 'hassan@gmail.com', '$2y$10$2VX0h4m9joW.C7A8jIrBku0U6uQTJroiSyrQhGLy5Akzo6Xo2wI.y', '8EoMblv3oUtPNgu9HVIkYcHrPLlbVXK6YTNOHE50mxFapa6eiiCbyppHXtuX', 'active', '2017-02-02 04:45:57', '2017-02-02 05:13:14'),
(8, 2, 'Shariful', 'sharifcse57@gmail.com', '$2y$10$BnGZGi49NBg73GsIl8hQ..FQSVwQcqYQhQH3C.PAIfMKwgwk8QqV6', 'Z3OneYcvp3D5WFgETUAsYtQe9Y15k81A4okUdtjIMH7ZYzfVtT9fxYVzCK7y', 'active', '2017-02-08 15:45:54', '2017-02-08 15:55:25'),
(9, 3, 'murad', 'murad@gmail.com', '$2y$10$80RtnqgH0DaWAlnLInjPWebv9ww/5ipxcndfBaY1BPpuZNxBbNtIq', NULL, 'active', '2017-02-08 15:54:29', '2017-02-08 15:54:29'),
(10, 5, 'mamun', 'mamun@gmail.com', '$2y$10$3FGwjbreJYIsv1A/OIv2QOCjCq8fCFgMBYiBnv7z72wwtufF8GlJK', NULL, 'active', '2017-02-08 16:18:00', '2017-02-08 16:18:00'),
(11, 2, 'sharif', 'sharif@gmail.com', '$2y$10$d6vRjMcfXKfKWf6.G2caAuScYtecITZ6ZwzXwxw5418Fq9XVDVnLe', 'wzanD2Cs6mh37VHRU7Gp9asuIU26kQsaVIyu1Uek2FfgcWnAFr18D0fY7jGJ', 'active', '2017-03-19 18:39:50', '2017-03-19 18:41:05'),
(12, 3, 'murad', 'noman@gmail.com', '$2y$10$PWOWJZrrw9JeBIxYxcLVeupZPwddLXs1i0HiJ7IOZ1hdQ2XKVwltG', 'XW71MTXPhSzd8DOgYy7alxagrmO5jCXBBVTAsgzMJNJg2Uj8HpeEE2lW9qvH', 'active', '2017-03-19 18:40:44', '2017-03-19 18:41:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `role_permissions_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `site_settings_email_unique` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD CONSTRAINT `role_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
