-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2026 at 03:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventtiket_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Seminar IT', 'seminar-it', '2026-07-30 20:40:19', '2026-07-30 20:40:19'),
(2, 'Entertainment', 'entertainment', '2026-07-30 20:40:19', '2026-07-30 20:40:19'),
(3, 'Olahraga', 'olahraga', '2026-07-30 20:40:19', '2026-07-30 20:40:19');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `date` datetime NOT NULL,
  `location` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `poster_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `organization_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `category_id`, `title`, `description`, `date`, `location`, `price`, `stock`, `poster_path`, `created_at`, `updated_at`, `organization_id`) VALUES
(1, 1, 'AI & Future Tech Summit 2026', 'Jelajahi tren terkini dalam kecerdasan buatan bersama para ahli.', '2026-05-01 13:00:00', 'Cinema Unit 6', 75000, 149, 'posters/a5UR3KvRqQKpSGrArryFFFEWhnNEBNIiKNPgIP9R.jpg', '2026-07-30 20:40:19', '2026-07-30 22:27:46', NULL),
(2, 1, 'Hackathon - Unleash Your Inner Developer', 'Asah skill coding kamu dan ciptakan solusi inovatif.', '2026-05-05 10:00:00', 'Inkubator Amikom', 50000, 92, 'posters/8CLBv8J4uvaYXuSv6AoGX1dIjq0qb8RVrJCTMTE5.jpg', '2026-07-30 20:40:19', '2026-07-31 05:49:23', NULL),
(3, 1, 'UI/UX Masterclass 2026', 'Pelajari teknik desain UI/UX modern dari praktisi berpengalaman.', '2026-05-15 09:00:00', 'Gedung Unit 2 Amikom', 60000, 78, 'posters/U2pNi7zcxbYUSSbW4SQHSe0u3VtPYBmccfd6GwVd.jpg', '2026-07-30 20:40:19', '2026-07-31 04:42:32', NULL),
(4, 2, 'Jazz Night 2026', 'Nikmati malam yang indah dengan alunan musik jazz yang merdu.', '2026-05-10 19:00:00', 'Amikom Baru', 50000, 200, 'posters/KEi3EDCmCoeZM1nNbmJDt0wcqsr5Xh2KOkhGPwoD.jpg', '2026-07-30 20:40:19', '2026-07-30 23:14:32', NULL),
(5, 2, 'Stand Up Comedy Night', 'Malam penuh tawa bersama komika-komika terbaik Yogyakarta.', '2026-05-20 19:30:00', 'Auditorium Amikom', 45000, 120, 'posters/rfc7sSVT9WV64GtWhsuxfwmblxpSzjuTW0bTOyW8.jpg', '2026-07-30 20:40:19', '2026-07-30 23:15:16', NULL),
(6, 3, 'E-Sport U-Champ Tournament', 'Kompetisi e-sport antar mahasiswa se-Yogyakarta.', '2026-06-01 08:00:00', 'Lab Komputer Amikom', 30000, 64, 'posters/1XZsNhg1PPaOEIECG0yxxhAiSkbGKY5KFbzHw4jH.jpg', '2026-07-30 20:40:19', '2026-07-30 23:16:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_04_24_005450_create_categories_table', 1),
(5, '2026_04_24_005659_create_events_table', 1),
(6, '2026_04_24_005722_create_transactions_table', 1),
(7, '2026_05_21_215817_create_partners_table', 1),
(8, '2026_07_30_222546_add_socialite_fields_to_users_table', 1),
(9, '2026_07_30_231502_create_reviews_table', 1),
(10, '2026_07_31_020703_create_organizers_table', 1),
(11, '2026_07_31_032700_create_organizations_table', 1),
(12, '2026_07_31_035230_add_organization_id_to_events_table', 2),
(13, '2026_07_31_051700_add_logo_to_organizations_table', 3),
(14, '2026_07_31_122456_add_proof_of_payment_to_transactions_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `name`, `logo`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'organisasi1', '20260731052607.png', 'organisasi1@amikom.ac.id', NULL, '$2y$12$eJrpCm05o5wUZjeIMUolE.ZMbwlnWRrW0SczvmOohDED3F9KnlaYK', NULL, '2026-07-30 20:46:35', '2026-07-30 22:26:07');

-- --------------------------------------------------------

--
-- Table structure for table `organizers`
--

CREATE TABLE `organizers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organizers`
--

INSERT INTO `organizers` (`id`, `name`, `description`, `is_approved`, `created_at`, `updated_at`) VALUES
(1, 'organisasi1', NULL, 0, '2026-07-30 20:46:35', '2026-07-30 20:46:35');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `rating` tinyint(3) UNSIGNED NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `total_price` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `snap_token` varchar(255) DEFAULT NULL,
  `proof_of_payment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `event_id`, `order_id`, `customer_name`, `customer_email`, `customer_phone`, `total_price`, `status`, `snap_token`, `proof_of_payment`, `created_at`, `updated_at`) VALUES
(1, 1, 'INV-20260731041417-350', 'AFAA', 'ay@students.amikom.ac.id', '08543', 80000, 'pending', '4464a89f-9393-4e7d-9bd3-137c7dd6a69b', NULL, '2026-07-30 21:14:17', '2026-07-30 21:14:17'),
(2, 3, 'INV-20260731045908-955', 'felisha', 'felishafff44@gmail.com', '082244', 65000, 'pending', '704e2887-176a-45bd-acf1-27a251a5ea0d', NULL, '2026-07-30 21:59:08', '2026-07-30 21:59:08'),
(3, 2, 'INV-20260731110156-860', 'Wyrman', 'wyrman76@gmail.com', '08124', 55000, 'pending', '73c2b254-8a24-4761-955e-a1d2ab53d7bb', NULL, '2026-07-31 04:01:56', '2026-07-31 04:01:57'),
(4, 2, 'INV-20260731110332-935', 'Wyrman', 'wyrman76@gmail.com', '08124', 55000, 'pending', '9116ab26-943e-4fb3-ad00-a4afec67d411', NULL, '2026-07-31 04:03:32', '2026-07-31 04:03:33'),
(5, 2, 'INV-20260731110814-841', 'Wyrman', 'wyrman76@gmail.com', '08124', 55000, 'pending', '11940f97-b35d-4708-a47f-b666267433a3', NULL, '2026-07-31 04:08:14', '2026-07-31 04:08:15'),
(6, 2, 'INV-20260731111002-792', 'Wyrman', 'wyrman76@gmail.com', '08124', 55000, 'pending', '300f7de4-849b-44b2-9fac-12479d2c6fdd', NULL, '2026-07-31 04:10:02', '2026-07-31 04:10:03'),
(7, 3, 'INV-20260731114232-106', 'Wyrman', 'wyrman76@gmail.com', '08124', 65000, 'pending', 'fefa69c1-8cef-4da8-bb88-e54cab647deb', NULL, '2026-07-31 04:42:32', '2026-07-31 04:42:32'),
(8, 2, 'INV-20260731115722-248', 'Wyrman', 'wyrman76@gmail.com', '6857967', 55000, 'pending', 'e4230146-395a-47ac-8f22-9aad4339f86f', NULL, '2026-07-31 04:57:22', '2026-07-31 04:57:22'),
(9, 2, 'INV-20260731120303-161', 'Wyrman', 'wyrman76@gmail.com', '08124', 10000, 'pending', '8a552b4f-c44f-4ec7-b35f-c06ca0c988b9', NULL, '2026-07-31 05:03:03', '2026-07-31 05:03:04'),
(10, 2, 'INV-20260731123925-145', 'Wyrman', 'wyrman76@gmail.com', '08124', 10000, 'paid', 'a5c8f075-602b-414f-a56d-dd464a189ce5', 'public/proofs/MFbCmRU7XnNYZ0pa5815m8ki5nOtM5N5hSvQMQH2.png', '2026-07-31 05:39:25', '2026-07-31 05:39:52'),
(11, 2, 'INV-20260731124922-403', 'Wyrman', 'wyrman76@gmail.com', '08124', 10000, 'paid', '3bd514af-80ac-4549-a0af-a9ecb4d229a7', 'public/proofs/1PtvlKEBsX71lalM4cFvtremloWcY7bI5KlYQHLa.png', '2026-07-31 05:49:22', '2026-07-31 05:49:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `provider_id` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `provider`, `provider_id`, `avatar`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Amikom', 'admin@amikom.ac.id', NULL, '$2y$12$2pWef8bk32xXONOkjgcewehuVX8XJCO7AtxY3DgwiIR3rltqR.fki', NULL, NULL, NULL, 'admin', NULL, '2026-07-30 20:40:19', '2026-07-30 20:40:19'),
(2, 'felisha', 'felishafff44@gmail.com', NULL, '$2y$12$Zrug6hnmVzfaLxFRRtRKOe6S1ldb6RSQmupMgXpmyrnqdQCcvr.y2', 'google', '101815437851053057311', 'https://lh3.googleusercontent.com/a/ACg8ocJ5UQ-IUafzgLtys8Xqhl3yVZAzlEs6Inf3bavOfbjqXTH3mg=s96-c', 'user', NULL, '2026-07-30 21:52:28', '2026-07-30 21:52:28'),
(3, 'Wyrman', 'wyrman76@gmail.com', NULL, '$2y$12$BiklMNgjDwgCGlwE0hNkHODcksgjhjc3ZafINjWSjCov8FjG5fpCC', 'google', '109498865743405817067', 'https://lh3.googleusercontent.com/a/ACg8ocIM16fppYtIzPkfl25lUA8FFwHM-WG32LLSK86kl_Bva5to8w=s96-c', 'user', NULL, '2026-07-31 04:01:41', '2026-07-31 04:01:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_category_id_foreign` (`category_id`),
  ADD KEY `events_organization_id_foreign` (`organization_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `organizations_email_unique` (`email`);

--
-- Indexes for table `organizers`
--
ALTER TABLE `organizers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reviews_user_id_event_id_unique` (`user_id`,`event_id`),
  ADD KEY `reviews_event_id_foreign` (`event_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transactions_order_id_unique` (`order_id`),
  ADD KEY `transactions_event_id_foreign` (`event_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `organizers`
--
ALTER TABLE `organizers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `events_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
