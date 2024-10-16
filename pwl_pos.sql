-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 16, 2024 at 03:25 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwl_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_09_11_014744_create_m_level_table', 1),
(6, '2024_09_11_015929_create_m_kategori_table', 2),
(7, '2024_09_11_020527_create_m_supplier_table', 3),
(8, '2024_09_11_024022_create_m_user_table', 4),
(9, '2024_09_11_025943_create_m_barang_table', 5),
(10, '2024_09_11_134349_create_t_penjualan_table', 6),
(11, '2024_09_11_135737_create_m_barang_table', 7),
(12, '2024_09_11_140408_create_t_penjualan_table', 8),
(13, '2024_09_11_141708_create_t_penjualan_table', 9),
(14, '2024_09_12_085620_create_t_stok_table', 10),
(15, '2024_09_13_010800_create_t_penjualan_detail_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `m_barang`
--

CREATE TABLE `m_barang` (
  `barang_id` bigint UNSIGNED NOT NULL,
  `kategori_id` bigint UNSIGNED NOT NULL,
  `barang_kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barang_nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` int NOT NULL,
  `harga_jual` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_barang`
--

INSERT INTO `m_barang` (`barang_id`, `kategori_id`, `barang_kode`, `barang_nama`, `harga_beli`, `harga_jual`, `created_at`, `updated_at`) VALUES
(1, 1, 'IDM01', 'Indomie Kuah Ayam Bawang', 3000, 3500, NULL, NULL),
(2, 2, 'ULT01', 'Ultra Milk Chocolate', 8000, 8200, NULL, NULL),
(3, 3, 'PGR01', 'Pensil Greebel 2B', 3500, 4000, NULL, NULL),
(4, 4, 'SL01', 'Sunlight 650ml', 7500, 8000, NULL, NULL),
(5, 5, 'TA01', 'Tolak Angin 250ml', 3900, 4000, NULL, NULL),
(6, 1, 'IDM02', 'Indomie Mie Goreng', 3000, 3500, NULL, NULL),
(7, 2, 'TBS01', 'Teh Botol Sosro 200ml', 3600, 4500, NULL, NULL),
(8, 3, 'PK01', 'Penghapus Kotak', 2000, 2500, NULL, NULL),
(9, 4, 'SML01', 'Sabun Mandi Lifebouy', 3100, 3700, NULL, NULL),
(10, 5, 'PRC01', 'Paracetamol 500mg', 3100, 3300, NULL, NULL),
(11, 1, 'BRK01', 'Biskuit Roma Kelapa 300gr', 11900, 12500, NULL, NULL),
(12, 2, 'PS01', 'Pocari Sweat 350ml', 7300, 8000, NULL, NULL),
(13, 3, 'P3C01', 'Penggaris 30cm', 5000, 5200, NULL, NULL),
(14, 4, 'MG01', 'Minyak Goreng 500ml', 39600, 41000, NULL, NULL),
(15, 5, 'MKP01', 'Minyak Kayu Putih 30ml', 15000, 17000, NULL, NULL),
(16, 1, 'OREO1', 'Oreo Vanilla', 3500, 4000, '2024-10-02 19:33:49', '2024-10-02 19:33:49');

-- --------------------------------------------------------

--
-- Table structure for table `m_kategori`
--

CREATE TABLE `m_kategori` (
  `kategori_id` bigint UNSIGNED NOT NULL,
  `kategori_kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_kategori`
--

INSERT INTO `m_kategori` (`kategori_id`, `kategori_kode`, `kategori_nama`, `created_at`, `updated_at`) VALUES
(1, 'MKA', 'Makanan', NULL, NULL),
(2, 'MNA', 'Minuman', NULL, NULL),
(3, 'ALT', 'Alat Tulis', NULL, NULL),
(4, 'KRT', 'Kebutuhan Rumah Tangga', NULL, NULL),
(5, 'OBT', 'Obat-obatan', NULL, NULL),
(7, 'ELT', 'Elektronik', '2024-10-01 18:02:20', '2024-10-01 18:02:20'),
(8, 'MNN', 'Mainan Anak-Anak', '2024-10-01 18:03:03', '2024-10-02 10:33:40'),
(10, 'KBR', 'Kebersihan Rumah', '2024-10-04 06:11:59', '2024-10-04 08:10:53');

-- --------------------------------------------------------

--
-- Table structure for table `m_level`
--

CREATE TABLE `m_level` (
  `level_id` bigint UNSIGNED NOT NULL,
  `level_kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_level`
--

INSERT INTO `m_level` (`level_id`, `level_kode`, `level_nama`, `created_at`, `updated_at`) VALUES
(1, 'ADM', 'Administrator', NULL, NULL),
(2, 'MNG', 'Manager', NULL, NULL),
(3, 'STF', 'Staff/Kasir', NULL, NULL),
(4, 'CUS', 'Pelanggan', '2024-09-14 02:08:08', '2024-10-01 15:15:36'),
(5, 'OB', 'Staff Kebersihan', '2024-09-29 19:20:45', '2024-10-01 15:15:04'),
(8, 'wkwk', 'heheheha acumalaka', '2024-10-01 17:29:49', '2024-10-02 06:35:38'),
(10, 'asssh', 'apa aja dh', '2024-10-04 03:23:56', '2024-10-04 03:23:56'),
(11, 'KJW', 'Kepala Jurusan', '2024-10-04 03:55:39', '2024-10-04 03:55:39'),
(12, 'SKJ1', 'Sekjur1', '2024-10-04 04:11:54', '2024-10-04 08:14:37');

-- --------------------------------------------------------

--
-- Table structure for table `m_supplier`
--

CREATE TABLE `m_supplier` (
  `supplier_id` bigint UNSIGNED NOT NULL,
  `supplier_kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_supplier`
--

INSERT INTO `m_supplier` (`supplier_id`, `supplier_kode`, `supplier_nama`, `supplier_alamat`, `created_at`, `updated_at`) VALUES
(1, 'SPL01', 'PT Segar Jaya Nasional', 'Jl. Merdeka No. 123, Jakarta', NULL, '2024-10-03 09:00:47'),
(2, 'SPL02', 'CV. Maju Makmur', 'Jl. Melati No. 45, Bandung', NULL, NULL),
(3, 'SPL03', 'PT Prima Abadi', 'Jl. Kamboja No. 5, Semarang', NULL, NULL),
(4, 'SPL04', 'PT Jaya Selamanya', 'JL. Penyu Hitam Karangkates', '2024-10-03 08:39:41', '2024-10-03 08:39:41'),
(5, 'SPL05', 'CV Sejahtera Bahagia', 'JL. Mars Venus 123', '2024-10-03 09:08:51', '2024-10-03 09:08:51'),
(8, 'SPL06', 'XXYYYZZZ1', 'JL. Mana Saja No Berapa Aja yhh', '2024-10-04 06:59:00', '2024-10-04 07:10:46'),
(11, 'SPL08', 'PT Andai Maju', 'JL. Jupiter Dinoyo 456', '2024-10-04 08:36:48', '2024-10-04 08:36:48');

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE `m_user` (
  `user_id` bigint UNSIGNED NOT NULL,
  `level_id` bigint UNSIGNED NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_user`
--

INSERT INTO `m_user` (`user_id`, `level_id`, `username`, `nama`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, 'adminrill', 'Administrator Asli', '$2y$12$KdSsIMdlEQUfjDmtKFs9n.vZSq4jdTxrxnT191xvMeVgroEEBvDOS', NULL, '2024-09-20 06:16:54'),
(2, 2, 'manager1', 'Manager One', '$2y$12$Dz6B/fo08XMfL2dvqWmOEOUGkDU63.vxzDnnhel3PRbUH6PSMsubG', NULL, '2024-09-27 18:09:33'),
(3, 3, 'staff', 'Staff/Kasir', '$2y$12$2W4hU8diziebfzeojHlOrulyrZJ7xvjcbs0JHRbUIBuKm6P.KhPeS', NULL, NULL),
(6, 4, 'customer-1', 'Pelanggan Pertama', '$2y$12$POFJhPqrKTTrgajyxf0HS.zEO81MGRbCUI59Xb262042ZAb.YjIGG', NULL, '2024-09-14 02:14:45'),
(7, 2, 'manager_dua', 'Manager 2', '$2y$12$Yn.RVphbtAGUbxX7QTOuJuSsjPObnkJjbU0I/Y3bvZ6gqYgOZ7zn.', '2024-09-17 17:48:47', '2024-09-17 17:48:47'),
(8, 2, 'manager22', 'Manager Dua Dua', '$2y$12$QBG8McReWZ0y5v6rryBw5.PUvuWIq2Xi5FFeuMtn0V/YOAzqGAMsS', '2024-09-19 01:29:14', '2024-09-19 01:29:14'),
(9, 2, 'manager33', 'Manager Tiga Tiga', '$2y$12$CvG3RG1lcafmHUvpY2gFjOlkd55DCej6Snro5.rDCl2XfIOKDHFca', '2024-09-19 02:03:10', '2024-09-19 02:03:10'),
(14, 2, 'manager56', 'Manager55', '$2y$12$xec2Y4GAsge/Du3mtOcpP.ylC7WS08afwsE7.mAnxqsuN84NnDRHy', '2024-09-19 07:21:18', '2024-09-19 07:21:19'),
(15, 2, 'manager12', 'Manager11', '$2y$12$fkney.xvF6B/9rvqznLOJexb6bo2jkUFru7hIGppyQzjcQdArzMby', '2024-09-19 07:29:10', '2024-09-19 07:29:10'),
(17, 2, 'managernew', 'Manager baru', '$2y$12$IHF54O40J.awofoOctsGPuGXukgPLtlscsGC8Msl.fEuckhBnNfIq', '2024-09-20 06:25:55', '2024-09-20 06:25:55'),
(18, 2, 'manager18', 'Manager ke-18', '$2y$12$LxaleYzAfvrHhFs8caFvauCuan/o4b0m7LHfR9Vt0cikrLP9AUNN2', '2024-09-20 07:20:44', '2024-09-20 07:20:44'),
(19, 3, 'staff2', 'StaffSecond', '$2y$12$qCqF8vlPQow8dA5SZ5R09uQvfYxcBbexqyiiK1asaeMwDqFZycdtW', '2024-09-27 02:08:48', '2024-09-27 02:08:48'),
(20, 4, 'pelanggannew', 'Pelanggan Baru11', '$2y$12$6xYSKVIXPl/3LzwjlaIvWOuil0dQEwf5/y8Z/HD0oAVXdjZU.g2AK', '2024-09-27 02:57:56', '2024-10-03 22:31:08'),
(21, 4, 'pelanggan3', 'Pelanggan Ketiga', '$2y$12$.iumkC2hKt5C8CBGrajfceWAFk3BKgtsKgVqVM3SxsVMHQHnHPot2', '2024-09-27 03:08:56', '2024-09-27 03:08:56'),
(23, 4, 'pp092', 'Pelanggan No 092', '222222', '2024-10-03 20:56:39', '2024-10-03 22:28:46'),
(25, 1, 'admin2', 'Admin ke-2', '$2y$12$BUgO6gGpwsWoi0QiKjBObOw.G5Rz7b1yf6EI1hxHMe7z4CgDoHX/G', '2024-10-08 19:12:28', '2024-10-08 19:12:28'),
(26, 1, 'ahmad', 'ahmad', '$2y$12$2bw.ryww2bqYd4S/suThFuylzapgzJUBNCK7EJqhG5v22bFUuTwGy', '2024-10-08 20:44:31', '2024-10-08 20:44:31'),
(27, 1, 'bangadmin', 'BangAdmin123', '666666', NULL, NULL),
(28, 1, 'wildan1', 'Wildan Rama', '$2y$12$CY8l.Jk8nqP1rh.EqskgYu0oFeg7QAeUcHy4dBhTxPKd/OvdNNdMm', '2024-10-15 17:23:46', '2024-10-15 17:23:46'),
(29, 1, 'rama20', 'Ramadhana', '$2y$12$JsF/yzbSZx/crfhYXC.xl.Jm/NlcRZH59MiESYyUVlkj8Pwmzd81a', '2024-10-15 18:00:11', '2024-10-15 18:00:11'),
(30, 2, 'rezakecap', 'Reza G', '$2y$12$vDDI8XfN5rqDJa053JoxWevJFWEazbE7qM/P5ialFjTEHXnGyu86C', '2024-10-15 18:09:00', '2024-10-15 18:09:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_penjualan`
--

CREATE TABLE `t_penjualan` (
  `penjualan_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `pembeli` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penjualan_kode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penjualan_tanggal` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_penjualan`
--

INSERT INTO `t_penjualan` (`penjualan_id`, `user_id`, `pembeli`, `penjualan_kode`, `penjualan_tanggal`, `created_at`, `updated_at`) VALUES
(1, 3, 'Andi', 'PJL01', '2024-05-10 00:00:00', NULL, NULL),
(2, 3, 'Adam', 'PJL02', '2024-05-11 00:00:00', NULL, NULL),
(3, 3, 'Budi', 'PJL03', '2024-05-12 00:00:00', NULL, NULL),
(4, 3, 'Bagus', 'PJL04', '2024-05-13 00:00:00', NULL, NULL),
(5, 3, 'Chris', 'PJL05', '2024-05-14 00:00:00', NULL, NULL),
(6, 3, 'Cindy', 'PJL06', '2024-05-15 00:00:00', NULL, NULL),
(7, 3, 'Dony', 'PJL07', '2024-05-16 00:00:00', NULL, NULL),
(8, 3, 'Haryo', 'PJL08', '2024-05-17 00:00:00', NULL, NULL),
(9, 3, 'Satria', 'PJL09', '2024-05-18 00:00:00', NULL, NULL),
(10, 3, 'Joko', 'PJL10', '2024-05-19 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_penjualan_detail`
--

CREATE TABLE `t_penjualan_detail` (
  `detail_id` bigint UNSIGNED NOT NULL,
  `penjualan_id` bigint UNSIGNED NOT NULL,
  `barang_id` bigint UNSIGNED NOT NULL,
  `harga` int NOT NULL,
  `jumlah` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_penjualan_detail`
--

INSERT INTO `t_penjualan_detail` (`detail_id`, `penjualan_id`, `barang_id`, `harga`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3500, 3, NULL, NULL),
(2, 1, 6, 3500, 3, NULL, NULL),
(3, 1, 7, 4500, 2, NULL, NULL),
(4, 2, 2, 8200, 2, NULL, NULL),
(5, 2, 11, 12500, 1, NULL, NULL),
(6, 2, 12, 8000, 2, NULL, NULL),
(7, 3, 3, 4000, 4, NULL, NULL),
(8, 3, 8, 2500, 2, NULL, NULL),
(9, 3, 13, 5200, 1, NULL, NULL),
(10, 4, 5, 4000, 3, NULL, NULL),
(11, 4, 10, 3300, 1, NULL, NULL),
(12, 4, 15, 17000, 2, NULL, NULL),
(13, 5, 4, 8000, 2, NULL, NULL),
(14, 5, 9, 3700, 3, NULL, NULL),
(15, 5, 14, 41000, 2, NULL, NULL),
(16, 6, 1, 3500, 3, NULL, NULL),
(17, 6, 2, 8200, 2, NULL, NULL),
(18, 6, 12, 8000, 2, NULL, NULL),
(19, 7, 9, 3700, 4, NULL, NULL),
(20, 7, 12, 8000, 3, NULL, NULL),
(21, 7, 14, 41000, 3, NULL, NULL),
(22, 8, 6, 3500, 4, NULL, NULL),
(23, 8, 11, 12500, 2, NULL, NULL),
(24, 8, 15, 17000, 1, NULL, NULL),
(25, 9, 3, 4000, 5, NULL, NULL),
(26, 9, 4, 8000, 3, NULL, NULL),
(27, 9, 10, 3300, 2, NULL, NULL),
(28, 10, 8, 2500, 4, NULL, NULL),
(29, 10, 10, 3300, 2, NULL, NULL),
(30, 10, 12, 8000, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_stok`
--

CREATE TABLE `t_stok` (
  `stok_id` bigint UNSIGNED NOT NULL,
  `supplier_id` bigint UNSIGNED NOT NULL,
  `barang_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `stok_tanggal` datetime NOT NULL,
  `stok_jumlah` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_stok`
--

INSERT INTO `t_stok` (`stok_id`, `supplier_id`, `barang_id`, `user_id`, `stok_tanggal`, `stok_jumlah`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, '2024-01-01 00:00:00', 100, NULL, NULL),
(2, 1, 6, 2, '2024-01-01 00:00:00', 100, NULL, NULL),
(3, 1, 7, 2, '2024-01-02 00:00:00', 65, NULL, NULL),
(4, 1, 11, 2, '2024-01-10 00:00:00', 50, NULL, NULL),
(5, 1, 12, 2, '2024-01-11 00:00:00', 70, NULL, NULL),
(6, 2, 2, 2, '2024-02-01 00:00:00', 55, NULL, NULL),
(7, 2, 5, 2, '2024-02-03 00:00:00', 35, NULL, NULL),
(8, 2, 10, 2, '2024-02-06 00:00:00', 25, NULL, NULL),
(9, 2, 14, 1, '2024-02-15 00:00:00', 40, NULL, NULL),
(10, 2, 15, 2, '2024-02-16 00:00:00', 20, NULL, NULL),
(11, 3, 3, 2, '2024-03-01 00:00:00', 25, NULL, NULL),
(12, 3, 4, 2, '2024-03-03 00:00:00', 30, NULL, NULL),
(13, 3, 8, 2, '2024-03-03 00:00:00', 20, NULL, NULL),
(14, 3, 9, 2, '2024-03-05 00:00:00', 50, NULL, NULL),
(15, 3, 13, 2, '2024-03-06 00:00:00', 20, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_barang`
--
ALTER TABLE `m_barang`
  ADD PRIMARY KEY (`barang_id`),
  ADD UNIQUE KEY `m_barang_barang_kode_unique` (`barang_kode`),
  ADD KEY `m_barang_kategori_id_index` (`kategori_id`);

--
-- Indexes for table `m_kategori`
--
ALTER TABLE `m_kategori`
  ADD PRIMARY KEY (`kategori_id`),
  ADD UNIQUE KEY `m_kategori_kategori_kode_unique` (`kategori_kode`);

--
-- Indexes for table `m_level`
--
ALTER TABLE `m_level`
  ADD PRIMARY KEY (`level_id`),
  ADD UNIQUE KEY `m_level_level_kode_unique` (`level_kode`);

--
-- Indexes for table `m_supplier`
--
ALTER TABLE `m_supplier`
  ADD PRIMARY KEY (`supplier_id`),
  ADD UNIQUE KEY `m_supplier_supplier_kode_unique` (`supplier_kode`);

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `m_user_username_unique` (`username`),
  ADD KEY `m_user_level_id_index` (`level_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `t_penjualan`
--
ALTER TABLE `t_penjualan`
  ADD PRIMARY KEY (`penjualan_id`),
  ADD UNIQUE KEY `t_penjualan_penjualan_kode_unique` (`penjualan_kode`),
  ADD KEY `t_penjualan_user_id_index` (`user_id`);

--
-- Indexes for table `t_penjualan_detail`
--
ALTER TABLE `t_penjualan_detail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `t_penjualan_detail_penjualan_id_index` (`penjualan_id`),
  ADD KEY `t_penjualan_detail_barang_id_index` (`barang_id`);

--
-- Indexes for table `t_stok`
--
ALTER TABLE `t_stok`
  ADD PRIMARY KEY (`stok_id`),
  ADD KEY `t_stok_supplier_id_index` (`supplier_id`),
  ADD KEY `t_stok_barang_id_index` (`barang_id`),
  ADD KEY `t_stok_user_id_index` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `m_barang`
--
ALTER TABLE `m_barang`
  MODIFY `barang_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `m_kategori`
--
ALTER TABLE `m_kategori`
  MODIFY `kategori_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `m_level`
--
ALTER TABLE `m_level`
  MODIFY `level_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `m_supplier`
--
ALTER TABLE `m_supplier`
  MODIFY `supplier_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `user_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_penjualan`
--
ALTER TABLE `t_penjualan`
  MODIFY `penjualan_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `t_penjualan_detail`
--
ALTER TABLE `t_penjualan_detail`
  MODIFY `detail_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `t_stok`
--
ALTER TABLE `t_stok`
  MODIFY `stok_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `m_barang`
--
ALTER TABLE `m_barang`
  ADD CONSTRAINT `m_barang_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `m_kategori` (`kategori_id`);

--
-- Constraints for table `m_user`
--
ALTER TABLE `m_user`
  ADD CONSTRAINT `m_user_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `m_level` (`level_id`);

--
-- Constraints for table `t_penjualan`
--
ALTER TABLE `t_penjualan`
  ADD CONSTRAINT `t_penjualan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `m_user` (`user_id`);

--
-- Constraints for table `t_penjualan_detail`
--
ALTER TABLE `t_penjualan_detail`
  ADD CONSTRAINT `t_penjualan_detail_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `m_barang` (`barang_id`),
  ADD CONSTRAINT `t_penjualan_detail_penjualan_id_foreign` FOREIGN KEY (`penjualan_id`) REFERENCES `t_penjualan` (`penjualan_id`);

--
-- Constraints for table `t_stok`
--
ALTER TABLE `t_stok`
  ADD CONSTRAINT `t_stok_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `m_barang` (`barang_id`),
  ADD CONSTRAINT `t_stok_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `m_supplier` (`supplier_id`),
  ADD CONSTRAINT `t_stok_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `m_user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
