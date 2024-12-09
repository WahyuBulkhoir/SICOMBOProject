-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Des 2024 pada 09.12
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
(46, 'q@gmail.com|127.0.0.1', 'i:1;', 1733409005, NULL, NULL),
(47, 'sicombo@gmail.com|127.0.0.1:timer', 'i:1733467884;', 1733467884, NULL, NULL),
(48, 'sicombo@gmail.com|127.0.0.1', 'i:1;', 1733467884, NULL, NULL);

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
(9, 'wahyu', 'wahyu@gmail.com', '086654325431', 'Laki-laki', 'cv_uploads/wahyu_CV.pdf', '2024-12-07 12:57:12', '2024-12-07 12:57:12');

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

--
-- Dumping data untuk tabel `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(116, 22, 16, '2024-12-08 08:54:51', '2024-12-08 08:54:51');

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
(38, '2024_12_02_173622_remove_profile_picture_from_users_table', 13),
(39, '2024_12_07_112256_add_deleted_at_to_products_table', 14);

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
(73, 'Profile Baru wahyu', 'pauh', '081234567891', 'in progress', 22, 31, 'cash on delivery', '2024-12-07 13:07:25', '2024-12-07 13:07:25'),
(74, 'Profile Baru wahyu', 'pauh', '081234567891', 'in progress', 22, 30, 'cash on delivery', '2024-12-07 13:07:25', '2024-12-07 13:07:25'),
(75, 'Profile Baru wahyu', 'pauh', '081234567891', 'Delivered', 22, 26, 'cash on delivery', '2024-12-07 13:07:25', '2024-12-08 09:41:25'),
(76, 'Profile Baru wahyu', 'pauh', '081234567891', 'in progress', 22, 27, 'cash on delivery', '2024-12-07 13:07:25', '2024-12-07 13:07:25'),
(77, 'Profile Baru wahyu', 'pauh', '081234567891', 'in progress', 22, 17, 'cash on delivery', '2024-12-08 08:47:40', '2024-12-08 08:47:40'),
(78, 'Profile Baru wahyu', 'pauh', '081234567891', 'in progress', 22, 18, 'cash on delivery', '2024-12-08 08:49:30', '2024-12-08 08:49:30');

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
(10, 'Morgan', 'gan@gmail.com', '081234567689', 'bandung', 'Laki-laki', '2024-12-07 12:58:38', '2024-12-07 12:58:38');

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
  `seller_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `price`, `category`, `quantity`, `slug`, `created_at`, `updated_at`, `seller_id`, `deleted_at`) VALUES
(13, 'boneka', 'blablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablabla', '1730121763.png', '10000', 'Bahan Lunak Alam', '0', 'aku', '2024-10-28 06:22:43', '2024-12-07 08:14:42', 2, '2024-12-07 08:14:42'),
(14, 'bunga', 'qwertyuiopasdfghjklzxcvbnmqwertyuiopasdfghjklzxcvbnmqwertyuiopasdfghjklzxcvbnmqwertyuiopasdfghjklzxcvbnmqwertyuiopasdfghjklzxcvbnmqwertyuiopasdfghjklzxcvbnm', '1730122510.png', '20000', 'Bahan Lunak Buatan', '0', 'adalah', '2024-10-28 06:35:10', '2024-12-07 04:25:12', 2, '2024-12-07 04:25:12'),
(15, 'Tas Selempang Rajut', 'Kerajinan tangan yang dibuat dari bahan tali kur yang terlihat mewah dan punya nilai jual tinggi', '1733584949.png', '125000', 'Bahan Keras Buatan', '2', 'anak', '2024-10-28 06:36:04', '2024-12-07 10:38:41', 2, NULL),
(16, 'Tempat Pensil', 'Merupakan kerajinan tangan yang dibuat menggunakan bahan dasar stik eskrim yang mudah untuk didapatkan', '1733592415.png', '40000', 'Bahan Keras Buatan', '2', 'gembala', '2024-10-28 06:40:44', '2024-12-07 11:07:02', 4, NULL),
(17, 'Bunga', 'Merupakan kerajinan tangan yang membutuhkan kesabaran untuk membuatnya dan hasilnya yang memiliki nilai jual tinggi', '1733592658.png', '80000', 'Bahan Keras Buatan', '1', 'yang', '2024-10-28 06:41:16', '2024-12-08 08:47:40', 4, NULL),
(18, 'Lampion', 'Merupakan kerajinan tangan yang dibuat menggunakan bahan dasar stik eskrim yang mudah untuk didapatkan juga memiliki keindahan tersendiri', '1733592706.png', '55000', 'Bahan Keras Buatan', '1', 'sering', '2024-10-28 06:41:43', '2024-12-08 08:49:30', 4, NULL),
(26, 'Jam Dinding', 'Sebuah kerajinan tangan jam dinding dari limbah stik - ice cream dan baterai di Madehand Store Sebuah kerajinan tangan jam dinding dari limbah stik - ice cream dan baterai di Madehand Store Sebuah kerajinan tangan jam dinding dari limbah stik - ice cream dan baterai di Madehand Store Sebuah kerajinan tangan jam dinding dari limbah stik - ice cream dan baterai di Madehand Store Sebuah kerajinan tangan jam dinding dari limbah stik - ice cream dan baterai di Madehand Store Sebuah kerajinan tangan jam dinding dari limbah stik - ice cream dan baterai di Madehand Store', '1733580964.png', '70000', 'Bahan Keras Alami', '1', 'jam-dinding', '2024-12-07 07:16:04', '2024-12-07 13:07:25', 2, NULL),
(27, 'Hiasan Dinding', 'Sebuah produk kerajinan tangan yang dibuat dari kertas nasi dan stik yang mudah didapatkan', '1733584833.png', '45000', 'Bahan Keras Buatan', '1', 'hiasan-dinding', '2024-12-07 08:20:33', '2024-12-07 13:07:25', 2, NULL),
(28, 'Tempat Bumbu', 'Kerajinan tangan yang dibuat dari rotan', '1733585196.png', '60000', 'Bahan Keras Alami', '2', 'tempat-bumbu', '2024-12-07 08:26:36', '2024-12-07 08:26:36', 2, NULL),
(29, 'Tatakan Bunga', 'Kerajinan tangan yang dibuat berdasarkan stik ice cream yang mudah didapatkan', '1733585395.png', '30000', 'Bahan Keras Buatan', '2', 'tatakan-bunga', '2024-12-07 08:29:55', '2024-12-07 08:29:55', 2, NULL),
(30, 'Bingkai Foto', 'Sebuah kerajinan tangan yang dibuat berdasarkan bahan seperti stik es krim, kuas, kayu adhesive, gunting, dan sebagainya.', '1733592806.png', '25000', 'Bahan Keras Buatan', '1', 'bingkai-foto', '2024-12-07 10:33:26', '2024-12-07 13:07:25', 4, NULL),
(31, 'Laci Mini', 'Laci mini ini bisa berguna untuk menyimpan barang-barang kecil yang membuat Anda sering lupa menaruhnya seperti kunci motor, kunci rumah, dan sebagainya. Untuk membuatnya, siapkan stik es krim, tang, pisau, pensil, penggaris, cat air, kotak bekas sereal, gunting dan kuas.', '1733592861.png', '120000', 'Limbah Keras Organik', '1', 'laci-mini', '2024-12-07 10:34:21', '2024-12-07 13:07:25', 4, NULL);

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
('ej4PrR3PdABsxUzfaM6LbMs9Zvp0MVFfgESNsbkc', 17, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNTJxc1V4Q0RIRVZTUWtaVjdSbkNJQlFsaktJdjlkR0w1YnNNWlUxbiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkZF9zZWxsZXIiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxNzt9', 1733712732),
('kSg40jH67b0D5YdQFp9l6LZoYcVncKCyOdKiTDWx', 17, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMjgyN0taTG5IUUZpOGhXQnltRlZRVHZ5SjhsY0xsTTBZZEQ5dFBteCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0NToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2V4cG9ydF9zZWxsZXJfcHJvZHVjdC8yIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTc7fQ==', 1733681863);

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
(2, 'bul seller dua', 'bulwahyu8@gmail.com', 'admin', '081234567699', 'badung', '2024-10-22 22:25:12', '$2y$12$URat849vsfYiPQegwpVsDuwAvF.7rBjMfYny298BqMMs2OOUFc2Va', 'W5oUttylnKKBU9CkQfMrGThIzGb7wo75UHPsIlVqvCbb0mxULe2vDa8E5e2K', '2024-10-22 22:24:10', '2024-12-02 11:13:46'),
(4, 'seller12', 'sigadomail@gmail.com', 'admin', '085681256799', 'padang panjang', '2024-10-28 06:39:08', '$2y$12$gDvmV2JXlc9ARqEmKfTwzu.RRxu1unXl8/4RXvscS9VSuFzDd.9Vu', NULL, '2024-10-28 06:38:47', '2024-11-30 04:25:32'),
(17, 'Admin Sicombo', 'sicombomail@gmail.com', 'superadmin', '083198617414', 'padang', '2024-12-02 07:05:29', '$2y$12$HWMDaE20/djr3ZVx77TiLuEYCCYDFo3y0wpcWUifCgNnO6QbBQvbC', 'iL8ZrLJuHI6YlvYb6Nw9QVTAiFZs3BJPLvJ7cwvkAwcLJKLMDXDEnbqMMfFC', '2024-12-02 07:04:18', '2024-12-02 07:05:29'),
(22, 'Profile Baru wahyu', 'wahyubulkhoir8@gmail.com', 'user', '081234567891', 'pauh', '2024-12-02 23:16:23', '$2y$12$ZFGCmGCJO6lyMJDGW.gkn.7M0C.lGYxxlqHUbyhaODK8dmDfDo9wW', 'Z7swmJVZLaIphZpFAyYLyXP768JJ1r5F4shmX41A7ojU8nzeKMXdn5gCtew6', '2024-12-02 23:16:23', '2024-12-08 05:44:32');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `candidate_pikr_members`
--
ALTER TABLE `candidate_pikr_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT untuk tabel `pikr_members`
--
ALTER TABLE `pikr_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
