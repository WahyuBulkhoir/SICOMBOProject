-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Des 2024 pada 06.02
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone_project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `expiration` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`id`, `key`, `value`, `expiration`, `created_at`, `updated_at`) VALUES
(33, '902ba3cda1883801594b6e1b452790cc53948fda:timer', 'i:1732500897;', 1732500897, NULL, NULL),
(34, '902ba3cda1883801594b6e1b452790cc53948fda', 'i:1;', 1732500897, NULL, NULL),
(35, 'fe5dbbcea5ce7e2988b8c69bcfdfde8904aabc1f:timer', 'i:1732706726;', 1732706726, NULL, NULL),
(36, 'fe5dbbcea5ce7e2988b8c69bcfdfde8904aabc1f', 'i:1;', 1732706726, NULL, NULL),
(37, 'fa35e192121eabf3dabf9f5ea6abdbcbc107ac3b:timer', 'i:1733146925;', 1733146925, NULL, NULL),
(38, 'fa35e192121eabf3dabf9f5ea6abdbcbc107ac3b', 'i:2;', 1733146925, NULL, NULL),
(39, '0716d9708d321ffb6a00818614779e779925365c:timer', 'i:1733148389;', 1733148389, NULL, NULL),
(40, '0716d9708d321ffb6a00818614779e779925365c', 'i:1;', 1733148389, NULL, NULL),
(41, '472b07b9fcf2c2451e8781e944bf5f77cd8457c8:timer', 'i:1733198263;', 1733198263, NULL, NULL),
(42, '472b07b9fcf2c2451e8781e944bf5f77cd8457c8', 'i:4;', 1733198263, NULL, NULL),
(45, 'q@gmail.com|127.0.0.1:timer', 'i:1733409005;', 1733409005, NULL, NULL),
(46, 'q@gmail.com|127.0.0.1', 'i:1;', 1733409005, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `candidate_pikr_members`
--

CREATE TABLE `candidate_pikr_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `candidate_pikr_members`
--

INSERT INTO `candidate_pikr_members` (`id`, `name`, `email`, `phone`, `jenis_kelamin`, `cv`, `created_at`, `updated_at`) VALUES
(2, 'dani', 'dan@gmail.com', '089867655613', 'Laki-laki', 'cv_uploads/dani_CV.pdf', '2024-10-28 05:42:15', '2024-10-28 05:42:15'),
(3, 'luna', 'lun@gmail.com', '087614565445', 'Perempuan', 'cv_uploads/luna_CV.pdf', '2024-10-28 05:42:47', '2024-10-28 05:42:47'),
(4, 'maya', 'may@gmail.com', '085614528176', 'Perempuan', 'cv_uploads/maya_CV.pdf', '2024-10-28 05:43:13', '2024-10-28 05:43:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Bahan Lunak Alam', '2024-10-22 23:36:49', '2024-10-22 23:36:49'),
(2, 'Bahan Lunak Buatan', '2024-10-22 23:37:24', '2024-10-22 23:37:24'),
(3, 'Bahan Keras Alami', '2024-10-22 23:37:42', '2024-10-22 23:37:42'),
(4, 'Bahan Keras Buatan', '2024-10-22 23:37:48', '2024-10-22 23:37:48'),
(5, 'Limbah Lunak Organik', '2024-10-22 23:38:16', '2024-10-22 23:38:16'),
(6, 'Limbah Lunak Anorganik', '2024-10-22 23:38:31', '2024-10-22 23:38:31'),
(7, 'Limbah Keras Organik', '2024-12-03 01:34:43', '2024-12-03 01:34:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `date` date NOT NULL,
  `location` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `date`, `location`, `created_at`, `updated_at`) VALUES
(1, 'Summer Padang Event', 'Event ini bertujuan untuk membuat kalangan masyarakat kota padang bisa menunjukkan karya atau seni yang dimiliki untuk diperlihatkan dan dipertontonkan', '2024-11-08', 'Gor Padang', '2024-10-23 06:19:33', '2024-10-23 06:19:33'),
(2, 'Event Akhir Tahunan Padang', 'merupakan event yang dibuat setiap akhir tahun sekali untuk memeriahkan kota padang', '2024-12-20', 'Gor Haji Agus Salim', '2024-12-03 07:24:00', '2024-12-03 07:24:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `jobs`
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
-- Struktur dari tabel `job_batches`
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
-- Struktur dari tabel `meetings`
--

CREATE TABLE `meetings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `location` varchar(255) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `meetings`
--

INSERT INTO `meetings` (`id`, `title`, `description`, `date`, `location`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 'Pembuatan Kerajinan Event Summer Padang', 'Meeting ini bertujuan untuk mengkordinasikan setiap anggota agar membuat karya yang menarik', '2024-10-25', 'Bukit Gado-Gado', '10:00:00', '12:00:00', '2024-10-23 06:21:07', '2024-10-23 06:21:07'),
(2, 'Persiapan event akhir tahunan padang', 'mempersiapkan diri untuk hasil yang maksimal di event yang sedang diadakan', '2024-12-10', 'Bukit Gado-Gado', '10:00:00', '13:00:00', '2024-12-03 07:25:39', '2024-12-03 07:25:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '0001_01_01_000000_create_users_table', 1),
(14, '0001_01_01_000001_create_cache_table', 1),
(15, '0001_01_01_000002_create_jobs_table', 1),
(16, '2024_10_06_150223_create_categories_table', 1),
(17, '2024_10_07_143001_create_products_table', 1),
(18, '2024_10_08_180906_create_carts_table', 1),
(19, '2024_10_09_095053_create_orders_table', 1),
(20, '2024_10_10_072619_add_payment_status_to_orders_table', 1),
(21, '2024_10_10_095802_add_slug_column_to_products_table', 1),
(22, '2024_10_18_081604_create_pikr_members_table', 2),
(23, '2024_10_22_170915_create_meetings_table', 3),
(24, '2024_10_18_081528_create_events_table', 4),
(27, '2024_10_23_045803_create_cache_table', 5),
(28, '2024_10_18_085220_add_location_to_events_table', 6),
(30, '2024_10_23_051437_create_cache_table', 7),
(31, '2024_10_26_081853_create_candidate_pikr_members_table', 8),
(32, '2024_10_26_094432_add_jenis_kelamin_to_pikr_members_and_candidate_pikr_members', 8),
(34, '2024_10_28_130418_add_seller_id_to_products_table', 9),
(35, '2024_11_12_084459_add_profile_picture_to_users_table', 10),
(36, '2024_11_30_104525_add_address_to_pikr_members_table', 11),
(37, '2024_12_02_173412_remove_profile_picture_from_users_table', 12),
(38, '2024_12_02_173622_remove_profile_picture_from_users_table', 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `rec_address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'in progress',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'cash on delivery',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `name`, `rec_address`, `phone`, `status`, `user_id`, `product_id`, `payment_status`, `created_at`, `updated_at`) VALUES
(46, 'Profile Baru wahyu', 'pauh', '081234567891', 'in progress', 22, 18, 'cash on delivery', '2024-12-05 10:20:01', '2024-12-05 10:20:01'),
(47, 'Profile Baru wahyu', 'pauh', '081234567891', 'in progress', 22, 13, 'cash on delivery', '2024-12-05 10:20:01', '2024-12-05 10:20:01'),
(48, 'Profile Baru wahyu', 'pauh', '081234567891', 'in progress', 22, 16, 'cash on delivery', '2024-12-05 10:20:01', '2024-12-05 10:20:01'),
(49, 'Profile Baru wahyu', 'pauh', '081234567891', 'in progress', 22, 17, 'paid', '2024-12-05 10:20:47', '2024-12-05 10:20:47'),
(50, 'Profile Baru wahyu', 'pauh', '081234567891', 'in progress', 22, 15, 'paid', '2024-12-05 10:20:47', '2024-12-05 10:20:47'),
(51, 'Profile Baru wahyu', 'pauh', '081234567891', 'in progress', 22, 14, 'paid', '2024-12-05 10:20:47', '2024-12-05 10:20:47'),
(52, 'Wahyu Kedua', 'padang', '082267773165', 'in progress', 1, 18, 'paid', '2024-12-05 10:22:18', '2024-12-05 10:22:18'),
(53, 'Wahyu Kedua', 'padang', '082267773165', 'in progress', 1, 16, 'paid', '2024-12-05 10:22:18', '2024-12-05 10:22:18'),
(54, 'Wahyu Kedua', 'padang', '082267773165', 'in progress', 1, 13, 'paid', '2024-12-05 10:22:18', '2024-12-05 10:22:18'),
(55, 'Wahyu Kedua', 'padang', '082267773165', 'in progress', 1, 17, 'cash on delivery', '2024-12-05 10:22:32', '2024-12-05 10:22:32'),
(56, 'Wahyu Kedua', 'padang', '082267773165', 'in progress', 1, 15, 'cash on delivery', '2024-12-05 10:22:32', '2024-12-05 10:22:32'),
(57, 'Wahyu Kedua', 'padang', '082267773165', 'in progress', 1, 14, 'cash on delivery', '2024-12-05 10:22:32', '2024-12-05 10:22:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pikr_members`
--

CREATE TABLE `pikr_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pikr_members`
--

INSERT INTO `pikr_members` (`id`, `name`, `email`, `phone`, `address`, `jenis_kelamin`, `created_at`, `updated_at`) VALUES
(5, 'first member', 'apa@gmail.com', '081234567690', 'pauh', 'Laki-laki', '2024-10-28 05:40:35', '2024-11-30 03:46:17'),
(6, 'second member', 'bro@gmail.com', '081234567698', 'limau manis', 'Laki-laki', '2024-10-28 05:44:03', '2024-11-30 03:46:33'),
(9, 'Heru Cans', 'cans@gmail.com', '081234567698', 'padang', 'Perempuan', '2024-11-30 03:47:09', '2024-11-30 03:47:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `seller_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `price`, `category`, `quantity`, `slug`, `created_at`, `updated_at`, `seller_id`) VALUES
(13, 'boneka', 'blablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablabla', '1730121763.png', '10000', 'Bahan Lunak Alam', '0', 'aku', '2024-10-28 06:22:43', '2024-12-05 10:22:18', 2),
(14, 'bunga', 'qwertyuiopasdfghjklzxcvbnmqwertyuiopasdfghjklzxcvbnmqwertyuiopasdfghjklzxcvbnmqwertyuiopasdfghjklzxcvbnmqwertyuiopasdfghjklzxcvbnmqwertyuiopasdfghjklzxcvbnm', '1730122510.png', '20000', 'Bahan Lunak Buatan', '0', 'adalah', '2024-10-28 06:35:10', '2024-12-05 10:22:32', 2),
(15, 'Tas', 'Kerajinan tangan yang dibuat dari bahan rotan yang bisa menghasilkan harga tinggi', '1730122564.jpg', '100000', 'Bahan Keras Alami', '0', 'anak', '2024-10-28 06:36:04', '2024-12-05 10:22:32', 2),
(16, 'Bunga', 'qwertyuiopasdfghjklzxcvbnmqwertyuiopasdfghjklzxcvbnmqwertyuiopasdfghjklzxcvbnmqwertyuiopasdfghjklzxcvbnmqwertyuiopasdfghjklzxcvbnmqwertyuiopasdfghjklzxcvbnm', '1730122844.png', '30000', 'Limbah Lunak Organik', '0', 'gembala', '2024-10-28 06:40:44', '2024-12-05 10:22:18', 4),
(17, 'Jam tangan', 'qwertyuiopasdfghjklzxcvbnmqwertyuiopasdfghjklzxcvbnmqwertyuiopasdfghjklzxcvbnmqwertyuiopasdfghjklzxcvbnmqwertyuiopasdfghjklzxcvbnm', '1730122876.png', '5000', 'Limbah Lunak Anorganik', '0', 'yang', '2024-10-28 06:41:16', '2024-12-05 10:22:32', 4),
(18, 'Tas Sandang', 'qwertyuiopasdfghjklzxcvbnmqwertyuiopasdfghjklzxcvbnmqwertyuiopasdfghjklzxcvbnmqwertyuiopasdfghjklzxcvbnmqwertyuiopasdfghjklzxcvbnm', '1733419125.png', '40000', 'Bahan Lunak Alam', '0', 'sering', '2024-10-28 06:41:43', '2024-12-05 10:22:18', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('P6FnNJj22XWJXOCcucFnYFwyFAe4jK7P1vMWAfJD', 17, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidjM1eTFncHVMRnZGMEl5Wm4xQkNqdk52M0VLbGt4UHpDWXJOR2l0dCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3ZpZXdfbWVldGluZ3MiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxNzt9', 1733420630);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT 'user',
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `usertype`, `phone`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Wahyu Kedua', 'wahyu76558@gmail.com', 'user', '082267773165', 'padang', '2024-10-22 22:19:05', '$2y$12$VI1iBVmaFlGH28K9z46o9uTneGq1Bs/8W0aBAokEdJmg0RfSWTMmu', NULL, '2024-10-22 21:36:49', '2024-12-05 10:21:33'),
(2, 'bul seller dua', 'bulwahyu8@gmail.com', 'admin', '081234567699', 'badung', '2024-10-22 22:25:12', '$2y$12$URat849vsfYiPQegwpVsDuwAvF.7rBjMfYny298BqMMs2OOUFc2Va', NULL, '2024-10-22 22:24:10', '2024-12-02 11:13:46'),
(4, 'seller12', 'sigadomail@gmail.com', 'admin', '085681256799', 'padang panjang', '2024-10-28 06:39:08', '$2y$12$gDvmV2JXlc9ARqEmKfTwzu.RRxu1unXl8/4RXvscS9VSuFzDd.9Vu', NULL, '2024-10-28 06:38:47', '2024-11-30 04:25:32'),
(17, 'Admin Sicombo', 'sicombomail@gmail.com', 'superadmin', '083198617414', 'padang', '2024-12-02 07:05:29', '$2y$12$HWMDaE20/djr3ZVx77TiLuEYCCYDFo3y0wpcWUifCgNnO6QbBQvbC', NULL, '2024-12-02 07:04:18', '2024-12-02 07:05:29'),
(22, 'Profile Baru wahyu', 'wahyubulkhoir8@gmail.com', 'user', '081234567891', 'pauh', '2024-12-02 23:16:23', '$2y$12$pc8iNIYiNKN6Jv.3TUvcleR5pbd3mznstvcPJvKXeag31HKclXp0i', 'brAaaExCqprNgk4T2OP4SgRduCBI1PHAC0mksHNSMw1skaKRi2UtTLk3ghDB', '2024-12-02 23:16:23', '2024-12-04 21:15:41');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cache_key_unique` (`key`);

--
-- Indeks untuk tabel `candidate_pikr_members`
--
ALTER TABLE `candidate_pikr_members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `candidate_pikr_members_email_unique` (`email`);

--
-- Indeks untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pikr_members`
--
ALTER TABLE `pikr_members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pikr_members_email_unique` (`email`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_seller_id_foreign` (`seller_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cache`
--
ALTER TABLE `cache`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `candidate_pikr_members`
--
ALTER TABLE `candidate_pikr_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `meetings`
--
ALTER TABLE `meetings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `pikr_members`
--
ALTER TABLE `pikr_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
