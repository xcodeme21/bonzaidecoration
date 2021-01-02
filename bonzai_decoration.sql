-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 02, 2021 at 05:41 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bonzai_decoration`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nama_client` varchar(250) NOT NULL,
  `email_client` varchar(150) NOT NULL,
  `telepon_client` varchar(50) NOT NULL,
  `alamat_client` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `nama_client`, `email_client`, `telepon_client`, `alamat_client`, `created_at`, `updated_at`) VALUES
(1, 'PT.  Alpha Partner Solution', 'xcodeme21@gmail.com', '021-56789', 'Jalan raya lenteng agung no.156, Kel. Lenteng Agung, Kec. Jagakarsa, Jakarta Selatan', '2020-12-12 19:40:46', '2020-12-12 19:40:46'),
(3, 'PT. Alyce', 'admin@alyce.com', '021-6789873', 'Jakarta Selatan', '2020-12-19 05:04:48', '2020-12-19 05:04:48');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `kode_schedule` varchar(50) NOT NULL,
  `no_invoice` varchar(255) NOT NULL,
  `tanggal_invoice` date NOT NULL,
  `dp` bigint(20) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal_batal` date DEFAULT NULL,
  `keterangan_batal` text DEFAULT NULL,
  `nominal_total` bigint(20) NOT NULL DEFAULT 0,
  `nominal_terbayar` bigint(20) NOT NULL DEFAULT 0,
  `status_invoice` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `kode_schedule`, `no_invoice`, `tanggal_invoice`, `dp`, `keterangan`, `tanggal_batal`, `keterangan_batal`, `nominal_total`, `nominal_terbayar`, `status_invoice`, `created_at`, `updated_at`) VALUES
(1, 'BNZ/SCH/2021/01/FM1BZ', 'BNZ/INV/2021/01/7TIEU', '2021-01-02', 3000000, '<p>DP awalan</p>', NULL, NULL, 10000000, 10000000, 1, '2021-01-01 17:16:48', '2021-01-01 20:05:06'),
(2, 'BNZ/SCH/2021/01/RF53B', 'BNZ/INV/2021/01/FXHBE', '2021-01-02', 3000000, '<p>-</p>', NULL, NULL, 10000000, 3000000, 0, '2021-01-01 20:31:58', '2021-01-01 20:31:58');

-- --------------------------------------------------------

--
-- Table structure for table `kwitansi`
--

CREATE TABLE `kwitansi` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL DEFAULT 0,
  `kode_kwitansi` varchar(255) NOT NULL,
  `tanggal_kwitansi` date NOT NULL,
  `nominal_pembayaran` bigint(20) NOT NULL,
  `keterangan_pembayaran` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kwitansi`
--

INSERT INTO `kwitansi` (`id`, `id_invoice`, `kode_kwitansi`, `tanggal_kwitansi`, `nominal_pembayaran`, `keterangan_pembayaran`, `created_at`, `updated_at`) VALUES
(4, 1, 'BNZ/KWI/2021/01/QIBNV', '2021-01-02', 5000000, '<p>nyicil</p>', '2021-01-01 19:58:42', '2021-01-01 19:58:42'),
(6, 1, 'BNZ/KWI/2021/01/Q7J83', '2021-01-02', 2000000, '-', '2021-01-01 20:05:06', '2021-01-01 20:05:06');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `package_decoration`
--

CREATE TABLE `package_decoration` (
  `id` int(11) NOT NULL,
  `nama_paket` varchar(255) NOT NULL,
  `harga_paket` bigint(20) NOT NULL,
  `item_paket` text NOT NULL,
  `keterangan_paket` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package_decoration`
--

INSERT INTO `package_decoration` (`id`, `nama_paket`, `harga_paket`, `item_paket`, `keterangan_paket`, `created_at`, `updated_at`) VALUES
(2, 'Paket A', 10000000, '<p>adhahdjkahdjk</p>\r\n\r\n<p>aldlakd</p>\r\n\r\n<ol>\r\n	<li>ajdlkajdl</li>\r\n	<li>lkajdlkajd</li>\r\n	<li>a;djkaljdlkajd</li>\r\n</ol>', '<p>fkshfkjskfhsjkf</p>\r\n\r\n<p>;a;hdkjadkahdjkahdjkad</p>', '2020-12-15 05:02:18', '2020-12-15 05:06:41'),
(3, 'Paket B', 15000000, '<ol>\r\n	<li>dajdkadhjka</li>\r\n	<li>jhadkhakjdh</li>\r\n	<li>hadkjhajkdh</li>\r\n	<li>dakdjhjk</li>\r\n	<li>&nbsp;</li>\r\n</ol>', '<p>testing keterangan</p>', '2020-12-19 05:06:05', '2020-12-19 05:06:05');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `kode_schedule` varchar(50) NOT NULL,
  `client_id` int(11) NOT NULL DEFAULT 0,
  `tanggal_schedule` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `package_decoration_id` int(11) NOT NULL DEFAULT 0,
  `venue` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `kode_schedule`, `client_id`, `tanggal_schedule`, `tanggal_selesai`, `package_decoration_id`, `venue`, `status`, `created_at`, `updated_at`) VALUES
(1, 'BNZ/SCH/2021/01/FM1BZ', 3, '2021-01-02', '2021-01-12', 2, '<p>kjadljald</p>\r\n\r\n<p>ajdkjaldj</p>', 2, '2021-01-01 16:42:18', '2021-01-01 20:05:06'),
(2, 'BNZ/SCH/2021/01/RF53B', 1, '2021-01-28', '2021-01-30', 2, '<p>kjakdjakldjlakd</p>', 1, '2021-01-01 16:56:49', '2021-01-01 20:31:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@sistem.com', NULL, '$2y$10$WN.NtzNztI1hvg0OKKk0WerTGAuJbA4sl5UjcTYPjVxXvUX/yYcTa', NULL, NULL, '2020-12-12 20:04:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kwitansi`
--
ALTER TABLE `kwitansi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_decoration`
--
ALTER TABLE `package_decoration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
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
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kwitansi`
--
ALTER TABLE `kwitansi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `package_decoration`
--
ALTER TABLE `package_decoration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
