-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 17 Des 2023 pada 12.33
-- Versi server: 8.0.30
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_topsis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatifs`
--

CREATE TABLE `alternatifs` (
  `id` bigint UNSIGNED NOT NULL,
  `pemohon_id` bigint UNSIGNED NOT NULL,
  `kriteria_id` bigint UNSIGNED NOT NULL,
  `id_periode` bigint UNSIGNED NOT NULL,
  `nilai_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `alternatifs`
--

INSERT INTO `alternatifs` (`id`, `pemohon_id`, `kriteria_id`, `id_periode`, `nilai_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 6, NULL, '2023-11-20 22:04:38'),
(2, 1, 2, 1, 2, NULL, NULL),
(3, 1, 3, 1, 30, NULL, NULL),
(4, 1, 4, 1, 12, NULL, NULL),
(5, 1, 5, 1, 22, NULL, NULL),
(6, 2, 1, 1, 6, NULL, NULL),
(7, 2, 2, 1, 2, NULL, NULL),
(8, 2, 3, 1, 10, NULL, NULL),
(9, 2, 4, 1, 13, NULL, NULL),
(10, 2, 5, 1, 15, NULL, NULL),
(11, 3, 1, 1, 7, NULL, NULL),
(12, 3, 2, 1, 2, NULL, NULL),
(13, 3, 3, 1, 10, NULL, NULL),
(14, 3, 4, 1, 12, NULL, NULL),
(15, 3, 5, 1, 15, NULL, NULL),
(16, 4, 1, 1, 6, NULL, NULL),
(17, 4, 2, 1, 2, NULL, NULL),
(18, 4, 3, 1, 30, NULL, NULL),
(19, 4, 4, 1, 12, NULL, NULL),
(20, 4, 5, 1, 22, NULL, NULL),
(21, 5, 1, 1, 6, NULL, NULL),
(22, 5, 2, 1, 2, NULL, NULL),
(23, 5, 3, 1, 30, NULL, NULL),
(24, 5, 4, 1, 12, NULL, NULL),
(25, 5, 5, 1, 15, NULL, NULL),
(26, 10, 1, 1, 16, NULL, NULL),
(27, 10, 2, 1, 2, NULL, NULL),
(28, 10, 3, 1, 30, NULL, NULL),
(29, 10, 4, 1, 4, NULL, NULL),
(30, 10, 5, 1, 22, NULL, NULL),
(31, 8, 1, 1, 33, NULL, NULL),
(32, 8, 2, 1, 2, NULL, NULL),
(33, 8, 3, 1, 30, NULL, NULL),
(34, 8, 4, 1, 13, NULL, NULL),
(35, 8, 5, 1, 14, NULL, NULL),
(36, 9, 1, 1, 33, NULL, NULL),
(37, 9, 2, 1, 2, NULL, NULL),
(38, 9, 3, 1, 30, NULL, NULL),
(39, 9, 4, 1, 4, NULL, NULL),
(40, 9, 5, 1, 14, NULL, NULL),
(41, 11, 1, 1, 33, NULL, NULL),
(42, 11, 2, 1, 2, NULL, NULL),
(43, 11, 3, 1, 30, NULL, NULL),
(44, 11, 4, 1, 12, NULL, NULL),
(45, 11, 5, 1, 15, NULL, NULL),
(46, 12, 1, 1, 16, NULL, NULL),
(47, 12, 2, 1, 2, NULL, NULL),
(48, 12, 3, 1, 10, NULL, NULL),
(49, 12, 4, 1, 12, NULL, NULL),
(50, 12, 5, 1, 15, NULL, NULL),
(51, 13, 1, 1, 33, NULL, NULL),
(52, 13, 2, 1, 2, NULL, NULL),
(53, 13, 3, 1, 30, NULL, NULL),
(54, 13, 4, 1, 4, NULL, NULL),
(55, 13, 5, 1, 22, NULL, NULL),
(56, 14, 1, 1, 7, NULL, NULL),
(57, 14, 2, 1, 2, NULL, NULL),
(58, 14, 3, 1, 30, NULL, NULL),
(59, 14, 4, 1, 12, NULL, NULL),
(60, 14, 5, 1, 15, NULL, NULL),
(61, 15, 1, 1, 7, NULL, NULL),
(62, 15, 2, 1, 2, NULL, NULL),
(63, 15, 3, 1, 10, NULL, NULL),
(64, 15, 4, 1, 13, NULL, NULL),
(65, 15, 5, 1, 5, NULL, NULL),
(66, 16, 1, 1, 7, NULL, NULL),
(67, 16, 2, 1, 2, NULL, NULL),
(68, 16, 3, 1, 30, NULL, NULL),
(69, 16, 4, 1, 12, NULL, NULL),
(70, 16, 5, 1, 15, NULL, NULL),
(71, 18, 1, 1, 6, NULL, NULL),
(72, 18, 2, 1, 2, NULL, NULL),
(73, 18, 3, 1, 30, NULL, NULL),
(74, 18, 4, 1, 13, NULL, NULL),
(75, 18, 5, 1, 14, NULL, NULL),
(76, 17, 1, 1, 16, NULL, NULL),
(77, 17, 2, 1, 2, NULL, NULL),
(78, 17, 3, 1, 30, NULL, NULL),
(79, 17, 4, 1, 4, NULL, NULL),
(80, 17, 5, 1, 14, NULL, NULL),
(81, 19, 1, 1, 16, NULL, NULL),
(82, 19, 2, 1, 2, NULL, NULL),
(83, 19, 3, 1, 10, NULL, NULL),
(84, 19, 4, 1, 13, NULL, NULL),
(85, 19, 5, 1, 15, NULL, NULL),
(86, 20, 1, 1, 16, NULL, NULL),
(87, 20, 2, 1, 2, NULL, NULL),
(88, 20, 3, 1, 30, NULL, NULL),
(89, 20, 4, 1, 4, NULL, NULL),
(90, 20, 5, 1, 14, NULL, NULL),
(91, 21, 1, 1, 33, NULL, NULL),
(92, 21, 2, 1, 2, NULL, NULL),
(93, 21, 3, 1, 10, NULL, NULL),
(94, 21, 4, 1, 13, NULL, NULL),
(95, 21, 5, 1, 15, NULL, NULL),
(96, 22, 1, 1, 33, NULL, NULL),
(97, 22, 2, 1, 2, NULL, NULL),
(98, 22, 3, 1, 30, NULL, NULL),
(99, 22, 4, 1, 12, NULL, NULL),
(100, 22, 5, 1, 22, NULL, NULL),
(116, 23, 1, 1, 6, NULL, NULL),
(117, 23, 2, 1, 2, NULL, NULL),
(118, 23, 3, 1, 10, NULL, NULL),
(119, 23, 4, 1, 13, NULL, NULL),
(120, 23, 5, 1, 15, NULL, NULL),
(121, 24, 1, 1, 6, NULL, NULL),
(122, 24, 2, 1, 2, NULL, NULL),
(123, 24, 3, 1, 10, NULL, NULL),
(124, 24, 4, 1, 12, NULL, NULL),
(125, 24, 5, 1, 14, NULL, NULL),
(126, 25, 1, 1, 33, NULL, NULL),
(127, 25, 2, 1, 2, NULL, NULL),
(128, 25, 3, 1, 3, NULL, NULL),
(129, 25, 4, 1, 13, NULL, NULL),
(130, 25, 5, 1, 14, NULL, NULL),
(131, 26, 1, 1, 7, NULL, NULL),
(132, 26, 2, 1, 2, NULL, NULL),
(133, 26, 3, 1, 30, NULL, NULL),
(134, 26, 4, 1, 12, NULL, NULL),
(135, 26, 5, 1, 14, NULL, NULL),
(136, 27, 1, 1, 16, NULL, NULL),
(137, 27, 2, 1, 2, NULL, NULL),
(138, 27, 3, 1, 30, NULL, NULL),
(139, 27, 4, 1, 12, NULL, NULL),
(140, 27, 5, 1, 14, NULL, NULL),
(141, 28, 1, 1, 33, NULL, NULL),
(142, 28, 2, 1, 2, NULL, NULL),
(143, 28, 3, 1, 10, NULL, NULL),
(144, 28, 4, 1, 13, NULL, NULL),
(145, 28, 5, 1, 5, NULL, NULL),
(146, 29, 1, 1, 6, NULL, NULL),
(147, 29, 2, 1, 2, NULL, NULL),
(148, 29, 3, 1, 10, NULL, NULL),
(149, 29, 4, 1, 13, NULL, NULL),
(150, 29, 5, 1, 15, NULL, NULL),
(151, 30, 1, 1, 17, NULL, NULL),
(152, 30, 2, 1, 2, NULL, NULL),
(153, 30, 3, 1, 10, NULL, NULL),
(154, 30, 4, 1, 13, NULL, NULL),
(155, 30, 5, 1, 14, NULL, NULL),
(156, 31, 1, 1, 33, NULL, NULL),
(157, 31, 2, 1, 2, NULL, NULL),
(158, 31, 3, 1, 10, NULL, NULL),
(159, 31, 4, 1, 4, NULL, NULL),
(160, 31, 5, 1, 5, NULL, NULL),
(161, 32, 1, 1, 7, NULL, NULL),
(162, 32, 2, 1, 2, NULL, NULL),
(163, 32, 3, 1, 30, NULL, NULL),
(164, 32, 4, 1, 4, NULL, NULL),
(165, 32, 5, 1, 14, NULL, NULL),
(166, 1, 1, 2, 6, NULL, NULL),
(167, 1, 2, 2, 2, NULL, NULL),
(168, 1, 3, 2, 3, NULL, NULL),
(169, 1, 4, 2, 4, NULL, NULL),
(170, 1, 5, 2, 14, NULL, '2023-12-07 09:04:14'),
(171, 2, 1, 2, 33, NULL, NULL),
(172, 2, 2, 2, 2, NULL, NULL),
(173, 2, 3, 2, 10, NULL, NULL),
(174, 2, 4, 2, 4, NULL, NULL),
(175, 2, 5, 2, 14, NULL, NULL),
(176, 3, 1, 2, 33, NULL, NULL),
(177, 3, 2, 2, 2, NULL, NULL),
(178, 3, 3, 2, 10, NULL, NULL),
(179, 3, 4, 2, 13, NULL, NULL),
(180, 3, 5, 2, 14, NULL, NULL),
(181, 4, 1, 2, 33, NULL, NULL),
(182, 4, 2, 2, 2, NULL, NULL),
(183, 4, 3, 2, 10, NULL, NULL),
(184, 4, 4, 2, 12, NULL, NULL),
(185, 4, 5, 2, 14, NULL, NULL),
(186, 5, 1, 2, 33, NULL, NULL),
(187, 5, 2, 2, 2, NULL, NULL),
(188, 5, 3, 2, 10, NULL, NULL),
(189, 5, 4, 2, 12, NULL, NULL),
(190, 5, 5, 2, 14, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `hasils`
--

CREATE TABLE `hasils` (
  `id` bigint NOT NULL,
  `id_pemohon` bigint UNSIGNED NOT NULL,
  `id_periode` bigint UNSIGNED NOT NULL,
  `nilai` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `hasils`
--

INSERT INTO `hasils` (`id`, `id_pemohon`, `id_periode`, `nilai`, `created_at`, `updated_at`) VALUES
(367, 1, 2, 0.72, '2023-12-07 09:19:24', '2023-12-07 09:19:24'),
(368, 2, 2, 0.68, '2023-12-07 09:19:24', '2023-12-07 09:19:24'),
(369, 3, 2, 0.28, '2023-12-07 09:19:24', '2023-12-07 09:19:24'),
(370, 4, 2, 0.48, '2023-12-07 09:19:24', '2023-12-07 09:19:24'),
(371, 5, 2, 0.48, '2023-12-07 09:19:24', '2023-12-07 09:19:24'),
(402, 1, 1, 0.47, '2023-12-17 05:18:44', '2023-12-17 05:18:44'),
(403, 2, 1, 0.55, '2023-12-17 05:18:44', '2023-12-17 05:18:44'),
(404, 3, 1, 0.46, '2023-12-17 05:18:44', '2023-12-17 05:18:44'),
(405, 4, 1, 0.47, '2023-12-17 05:18:44', '2023-12-17 05:18:44'),
(406, 5, 1, 0.52, '2023-12-17 05:18:44', '2023-12-17 05:18:44'),
(407, 10, 1, 0.29, '2023-12-17 05:18:44', '2023-12-17 05:18:44'),
(408, 8, 1, 0.62, '2023-12-17 05:18:44', '2023-12-17 05:18:44'),
(409, 9, 1, 0.68, '2023-12-17 05:18:44', '2023-12-17 05:18:44'),
(410, 11, 1, 0.61, '2023-12-17 05:18:44', '2023-12-17 05:18:44'),
(411, 12, 1, 0.33, '2023-12-17 05:18:44', '2023-12-17 05:18:44'),
(412, 13, 1, 0.57, '2023-12-17 05:18:44', '2023-12-17 05:18:44'),
(413, 14, 1, 0.40, '2023-12-17 05:18:44', '2023-12-17 05:18:44'),
(414, 15, 1, 0.56, '2023-12-17 05:18:44', '2023-12-17 05:18:44'),
(415, 16, 1, 0.40, '2023-12-17 05:18:44', '2023-12-17 05:18:44'),
(416, 18, 1, 0.55, '2023-12-17 05:18:44', '2023-12-17 05:18:44'),
(417, 17, 1, 0.41, '2023-12-17 05:18:44', '2023-12-17 05:18:44'),
(418, 19, 1, 0.30, '2023-12-17 05:18:44', '2023-12-17 05:18:44'),
(419, 20, 1, 0.41, '2023-12-17 05:18:44', '2023-12-17 05:18:44'),
(420, 21, 1, 0.63, '2023-12-17 05:18:44', '2023-12-17 05:18:44'),
(421, 22, 1, 0.55, '2023-12-17 05:18:44', '2023-12-17 05:18:44'),
(422, 23, 1, 0.55, '2023-12-17 05:18:44', '2023-12-17 05:18:44'),
(423, 24, 1, 0.67, '2023-12-17 05:18:44', '2023-12-17 05:18:44'),
(424, 25, 1, 0.73, '2023-12-17 05:18:44', '2023-12-17 05:18:44'),
(425, 26, 1, 0.48, '2023-12-17 05:18:44', '2023-12-17 05:18:44'),
(426, 27, 1, 0.36, '2023-12-17 05:18:44', '2023-12-17 05:18:44'),
(427, 28, 1, 0.73, '2023-12-17 05:18:44', '2023-12-17 05:18:44'),
(428, 29, 1, 0.55, '2023-12-17 05:18:44', '2023-12-17 05:18:44'),
(429, 30, 1, 0.31, '2023-12-17 05:18:44', '2023-12-17 05:18:44'),
(430, 31, 1, 0.84, '2023-12-17 05:18:44', '2023-12-17 05:18:44'),
(431, 32, 1, 0.51, '2023-12-17 05:18:44', '2023-12-17 05:18:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriterias`
--

CREATE TABLE `kriterias` (
  `id` bigint UNSIGNED NOT NULL,
  `namaKriteria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilaiBobot` double(8,2) NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kriterias`
--

INSERT INTO `kriterias` (`id`, `namaKriteria`, `nilaiBobot`, `jenis`, `created_at`, `updated_at`) VALUES
(1, 'character', 5.00, 'benefit', '2023-10-10 02:48:02', '2023-12-17 05:11:18'),
(2, 'capacity', 4.50, 'benefit', '2023-10-10 02:49:53', '2023-12-17 05:10:59'),
(3, 'capital', 4.50, 'benefit', '2023-10-10 02:49:53', '2023-12-17 05:10:59'),
(4, 'condition', 4.00, 'benefit', '2023-10-10 02:50:23', '2023-12-17 05:10:59'),
(5, 'collateral', 4.00, 'benefit', '2023-10-10 02:50:23', '2023-12-17 05:10:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuesioners`
--

CREATE TABLE `kuesioners` (
  `id` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `character` int NOT NULL,
  `capital` int NOT NULL,
  `capacity` int NOT NULL,
  `collateral` int NOT NULL,
  `condition` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kuesioners`
--

INSERT INTO `kuesioners` (`id`, `id_user`, `character`, `capital`, `capacity`, `collateral`, `condition`, `created_at`, `updated_at`) VALUES
(8, 2, 5, 4, 4, 5, 4, '2023-12-04 02:55:06', '2023-12-04 02:55:06'),
(11, 1, 4, 5, 5, 3, 4, '2023-12-17 04:56:22', '2023-12-17 04:57:09'),
(12, 6, 5, 4, 5, 4, 3, '2023-12-17 05:21:56', '2023-12-17 05:21:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_03_26_062746_create_registrasis_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_02_26_063731_create_periodes_table', 1),
(7, '2023_03_24_062752_create_pemohons_table', 1),
(8, '2023_03_24_065351_create_kriterias_table', 1),
(9, '2023_03_24_092407_create_nilais_table', 1),
(10, '2023_03_24_135843_create_alternatifs_table', 1),
(11, '2023_08_10_073329_create_kuesioners_table', 1),
(12, '2023_09_15_060602_create_pinjamen_table', 1),
(13, '2023_09_16_033721_create_hasils_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilais`
--

CREATE TABLE `nilais` (
  `id` bigint UNSIGNED NOT NULL,
  `kriteria_id` bigint UNSIGNED NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `nilais`
--

INSERT INTO `nilais` (`id`, `kriteria_id`, `deskripsi`, `nilai`, `created_at`, `updated_at`) VALUES
(2, 2, 'Berdasarkan perhitungan  kemampuan membayar cicilan pinjaman nasabah dinilai mampu  memenuhi cicilan', 5, '2023-10-09 19:51:31', '2023-11-18 07:40:13'),
(3, 3, 'Laporan Keuangan dan modal Yang Ditunjukkan Memenuhi Kebijakan Perusahaan', 5, '2023-10-09 19:51:43', '2023-11-18 03:35:49'),
(4, 4, 'Berdasarkan survei keberlanjutan usaha/pekerjaan debitur memiliki prospek yang sangat bagus', 5, '2023-10-09 19:51:51', '2023-11-18 07:53:35'),
(5, 5, 'Agunan memiliki nilai yang setiap tahun naik dan agunan milik pribadi', 5, '2023-10-09 19:52:00', '2023-11-18 07:58:19'),
(6, 1, 'Nasabah baru, berkelakuan baik', 4, '2023-10-09 21:50:16', '2023-11-20 22:00:06'),
(7, 1, 'Nasabah lama, kurang kooperatif dalam mencicil angsuran', 3, '2023-10-09 21:50:23', '2023-11-18 03:29:28'),
(8, 2, 'Berdasarkan perhitungan  kemampuan membayar cicilan  pinjaman nasabah dinilai tidak  mampu memenuhi cicilan', 4, '2023-10-09 21:50:35', '2023-11-18 07:40:23'),
(10, 3, 'Laporan Keuangan dan modal Memenuhi Namun Masih Dalam Pertimbangan', 4, '2023-10-09 21:50:50', '2023-11-18 03:35:59'),
(12, 4, 'Berdasarkan survei keberlanjutan usaha/pekerjaan debitur memiliki prospek yang bagus', 4, '2023-10-09 21:51:08', '2023-11-18 07:53:46'),
(13, 4, 'Berdasarkan survei keberlanjutan usaha/pekerjaan debitur memiliki prospek cukup', 3, '2023-10-09 21:51:16', '2023-11-18 07:54:01'),
(14, 5, 'Agunan memiliki nilai yang setiap tahun naik dan agunan milik bersama', 4, '2023-10-09 21:51:29', '2023-11-18 07:58:26'),
(15, 5, 'Agunan memiliki nilai setiap tahun turun dan agunan milik pribadi', 3, '2023-10-09 21:51:36', '2023-11-18 07:58:32'),
(16, 1, 'Nasabah lama, tidak kooperatif dalam mencicil angsuran', 2, '2023-10-11 05:38:33', '2023-11-18 03:29:39'),
(17, 1, 'Nasabah baru, berkelakuan kurang baik', 1, '2023-10-11 05:38:43', '2023-11-18 03:29:49'),
(20, 4, 'Berdasarkan survei keberlanjutan usaha/pekerjaan debitur memiliki prospek buruk', 2, '2023-10-11 05:41:10', '2023-11-18 07:54:15'),
(21, 4, 'Berdasarkan survei keberlanjutan usaha/pekerjaan debitur memiliki prospek sangat buruk', 1, '2023-10-11 05:41:21', '2023-11-18 07:54:26'),
(22, 5, 'Agunan memiliki nilai yang setiap tahun turun dan agunan milik bersama', 2, '2023-10-11 05:42:06', '2023-11-18 07:58:46'),
(23, 5, 'Terdapat sengketa pada agunan yang telah diajukan', 1, '2023-10-11 05:42:20', '2023-11-18 01:32:48'),
(30, 3, 'Laporan Keuangan dan modal Memenuhi Syarat Namun Terdapat Hutang Dengan Pihak Lain', 3, '2023-11-18 03:33:23', '2023-11-18 03:36:08'),
(31, 3, 'Laporan Keuangan dan modal Belum Mencukupi Syarat Pengajuan Pinjaman', 2, '2023-11-18 03:34:02', '2023-11-18 03:36:17'),
(32, 3, 'Tidak dapat memberikan laporan keuangan/diragukan keasliannya.', 1, '2023-11-18 03:34:26', '2023-11-18 03:34:26'),
(33, 1, 'Nasabah lama, kooperatif dalam mencicil angsuran', 5, '2023-11-20 21:31:11', '2023-12-03 02:02:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemohons`
--

CREATE TABLE `pemohons` (
  `id` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_ktp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_pasangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ibu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_nasabah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_rumah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_usaha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lama_usaha` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi_usaha` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lama_menetap` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keperluan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `imgrumah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imgnasabah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imgjaminan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imgktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imgkk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pemohons`
--

INSERT INTO `pemohons` (`id`, `id_user`, `nama`, `no_ktp`, `no_hp`, `nama_pasangan`, `nama_ibu`, `status_nasabah`, `alamat_rumah`, `jenis_usaha`, `lama_usaha`, `lokasi_usaha`, `lama_menetap`, `keperluan`, `tgl_pengajuan`, `imgrumah`, `imgnasabah`, `imgjaminan`, `imgktp`, `imgkk`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dedi Sunarya', '3302121010760006', NULL, 'Ai Tini', 'Nene', 'Lama/Baik', 'Sokawera 01/04', 'Bengkel Las', '5 Tahun', 'Sokawera', '5 tahun', 'Tambah Modal', '2023-10-11', NULL, NULL, NULL, NULL, NULL, '2023-10-09 19:29:54', '2023-10-11 05:06:59'),
(2, 1, 'Sri Suparsih', '3302127008800001', NULL, 'Tarno', 'Sutinem', 'Lama/Baik', 'Sokawera 02/04', 'Tukang Batu', '10 tahun', 'Sokawera', '10 tahun', 'Keperluan Rumah Tangga', '2023-10-11', NULL, NULL, NULL, NULL, NULL, '2023-10-09 21:48:43', '2023-10-11 05:10:18'),
(3, 1, 'Tri Puspayanti', '3302125412730001', NULL, 'Hari Satiyanto Wibowo', 'Sumini', 'Lama/Baik', 'Sokawera 02/04', 'Snack Basah', '3 tahun', 'Sokawera Rt 02/04', '3 tahun', 'Tambah Modal', '2023-10-11', NULL, NULL, NULL, NULL, NULL, '2023-10-09 21:48:53', '2023-10-11 05:13:44'),
(4, 1, 'Endriyani', '3320185409610001', NULL, 'Sri Wardono', 'Tukimah', 'Lama/Baik', 'Pasir Wetan 05/01', 'Kepala Desa', '7,5 tahun', 'Pasir wetan', '7,5 tahun', 'Konsumtif', '2023-10-11', NULL, NULL, NULL, NULL, NULL, '2023-10-10 00:16:19', '2023-10-11 05:17:20'),
(5, 2, 'Rina Rosita', '3320185212830001', NULL, 'Imam Safani', 'Sri Suryani', 'Baru/Baik', 'Pasir wetan Rt 01/01', 'Dagang', '5 tahun', 'Pasir Wetan', '5 tahun', 'Menambah Modal Usaha', '2023-10-11', NULL, NULL, NULL, NULL, NULL, '2023-10-10 01:03:16', '2023-10-11 05:27:11'),
(8, 3, 'Sumini', '3302034305810001', NULL, 'Budiono', 'Sarkem', 'Baru/Baik', 'KarangLewas 06/03', 'Pedagang Sembako', '10 tahun', 'KarangLewas 06/03', '10 tahun', 'Modal Usaha', '2023-10-25', NULL, NULL, NULL, NULL, NULL, '2023-10-12 20:57:42', '2023-10-24 22:38:41'),
(9, 1, 'Karwen', '3302126809540001', NULL, NULL, 'Juminah', 'Lama/Baik', 'Sokawera RT 1/04', 'Jual Buah Keliling', '4 tahun', 'Sokawera', NULL, 'Tambah Modal', '2023-10-25', NULL, NULL, NULL, NULL, NULL, '2023-10-24 22:43:40', '2023-10-24 22:43:40'),
(10, 1, 'Akhir Nowo Basuki', '3302190512830001', NULL, 'Nuning', 'Rusminah', 'Lama/Baik', 'Mersi Rt 02/02', 'Swasta', NULL, NULL, NULL, 'Konsumtif', '2023-10-25', NULL, NULL, NULL, NULL, NULL, '2023-10-24 22:47:36', '2023-10-24 22:47:36'),
(11, 1, 'Tuti', '3302184504670002', NULL, 'Imam Sutrisno', 'Arsiti', 'Lama/Baik', 'Pasir Wetan 06/02', 'Dagang', '10 tahun', 'Pasir wetan', '10 tahun', 'Modal Usaha', '2023-10-25', NULL, NULL, NULL, NULL, NULL, '2023-10-25 04:09:23', '2023-10-25 04:09:23'),
(12, 1, 'Tarwo', '3302182501790002', NULL, NULL, 'Juminah', 'Baru/Baik', 'Pasir wetan Rt 02/01', 'Dagang', '30 tahun', 'Pasir', '30 tahun', 'Modal Usaha', '2023-10-25', NULL, NULL, NULL, NULL, NULL, '2023-10-25 04:11:39', '2023-10-25 04:11:39'),
(13, 1, 'Ahmad Yuwono', '3302251010650001', NULL, 'Yatimi', 'Sujinah', 'Baru/Baik', 'Pasir Kidul 02/04', 'Swasta', NULL, NULL, NULL, 'Konsumtif', '2023-10-25', NULL, NULL, NULL, NULL, NULL, '2023-10-25 04:14:23', '2023-10-25 04:14:23'),
(14, 1, 'Purwani', '3302184711860001', NULL, 'Ikhsan', 'Kamilah', 'Lama/Baik', 'Pasir Wetan 03/01', 'Dagang', '30 tahun', 'Pasir', '30 tahun', 'Modal Usaha', '2023-10-25', NULL, NULL, NULL, NULL, NULL, '2023-10-25 04:18:40', '2023-10-25 04:18:40'),
(15, 1, 'Suratno', '332250205810003', NULL, 'Musrifah', 'Yeni', 'Lama/Baik', 'Pasir Kidul 04/01', 'Usaha Bondol', '10 tahun', 'Pasir Kidul Bonosari', '10 tahun', 'Modal Usaha', '2023-10-25', NULL, NULL, NULL, NULL, NULL, '2023-10-25 04:21:53', '2023-10-25 04:21:53'),
(16, 1, 'Wahyati', '3302186410810001', NULL, 'Sutarno', 'Warsem', 'Lama/Baik', 'Pasir Wetan 02/01', 'Dagang', '10 tahun', 'Pasir wetan', '10 tahun', 'Tambah Modal', '2023-10-25', NULL, NULL, NULL, NULL, NULL, '2023-10-25 04:26:13', '2023-10-25 04:26:13'),
(17, 1, 'Sri Rahayu', '3302185611630001', NULL, NULL, 'Darwati', 'Baru/Baik', 'Pasir Wetan 02/02', 'Dagang', '30 tahun', 'Pasir wetan', '30 tahun', 'Modal Usaha', '2023-10-25', NULL, NULL, NULL, NULL, NULL, '2023-10-25 04:33:12', '2023-10-25 04:33:12'),
(18, 1, 'Indrawati', '3302194207820002', NULL, 'Muhammad Abdul', 'Sakini', 'Lama/Baik', 'Karangduren Rt 05/04', 'Dagang Sembako', NULL, 'Pasar Belik', NULL, 'Tambah Modal', '2023-10-25', NULL, NULL, NULL, NULL, NULL, '2023-10-25 04:36:01', '2023-10-25 04:36:01'),
(19, 1, 'Sofiyati', '3302125405940001', NULL, 'Deni Saputra', 'Ernawati', 'Lama/Tidak', 'Sokawera 02/01', 'Industri Pembuatan Nig', NULL, 'Banyumas', NULL, 'Konsumtif', '2023-10-25', NULL, NULL, NULL, NULL, NULL, '2023-10-25 04:39:05', '2023-10-25 04:39:05'),
(20, 1, 'Pranowo', '3302242802690002', NULL, 'Asunkusi', 'Watiati', 'Baru/Baik', 'karangpucung RT 04/12', 'Laundry', '13 tahun', 'Jl. Mulyadi no. 57', '2 tahun', 'Tambah Modal', '2023-10-25', NULL, NULL, NULL, NULL, NULL, '2023-10-25 04:42:13', '2023-10-25 04:42:13'),
(21, 1, 'Mastur', '3302192303760001', NULL, 'Musdalifah', 'Yeni', 'Baru/Kurang', 'Purwanggara', 'Pedagang Pupuk', '18 Tahun', 'Desa Keniten', '18 Tahun', 'Modal Usaha', '2023-10-25', NULL, NULL, NULL, NULL, NULL, '2023-10-25 04:44:46', '2023-10-25 04:44:46'),
(22, 1, 'Mulyo Harsono', '3302072808610001', NULL, 'Harfisah', 'Somiah', 'Lama/Baik', 'Kebokuro RT 04/14', 'Home industri', '1 Tahun', 'Kutosari', '1 tahun', 'Modal Usaha', '2023-10-25', NULL, NULL, NULL, NULL, NULL, '2023-10-25 04:47:39', '2023-10-25 04:47:39'),
(23, 1, 'Sutrisno', '3302221501940001', '081324556780', 'Gitina', 'Taslimah', 'Baru/Baik', 'Kebumen Rt 8/4', 'Pedagang', '10 tahun', 'Kebumen Rt 8/4', '10 tahun', 'Tambah Modal', '2023-11-22', 'pemohon-images/7JNyaC8g0N9gXBqVySqzyVMn7309z3LAHnTZ8L36.jpg', 'pemohon-images/38nBMnIApr9Ck4HZQ7udFbiKKCSH2PEMb45SLyo7.jpg', 'pemohon-images/uLtLxmzSS4Uvw3u1T7MnJxcAqOVpeMzrdoiODlJr.jpg', NULL, NULL, '2023-11-21 16:53:27', '2023-11-21 16:54:38'),
(24, 1, 'Edi Susanto', '3302200203860002', NULL, 'Anggraeni vitasari', 'Sulistiyowati', 'Lama/Baik', 'Jl. 10 November Rt 4/7 Ledug Kembaran', 'Jual BBM', '5 Tahun', 'Ledug Kembaran', '5 Tahun', 'Tambah Modal', '2023-12-03', NULL, NULL, NULL, NULL, NULL, '2023-12-03 01:16:28', '2023-12-03 01:16:28'),
(25, 1, 'Endah Santosaning', '3302184402900001', NULL, 'Hanan Ariyandika', 'Endriyani', 'Lama/Baik', 'Pasir Wetan RT 05/01', 'ART', NULL, NULL, NULL, 'Perbaikan Rumah', '2023-12-03', NULL, NULL, NULL, NULL, NULL, '2023-12-03 01:18:49', '2023-12-03 01:18:49'),
(26, 1, 'Finita Tri Sela R.', '3302036805930002', NULL, 'Iwan Supriyanto', 'Sutiningsih', 'Baru/Baik', 'Jompo Kulon RT 1/1 Sokaraja', 'Kepala Desa', NULL, 'Jompo Kulon', NULL, 'Konsumtif', '2023-12-03', NULL, NULL, NULL, NULL, NULL, '2023-12-03 01:21:16', '2023-12-03 01:46:53'),
(27, 1, 'Parlan Sansuharjo', '3302123112580008', NULL, 'Jumanti', 'Wati', 'Baru/Baik', 'Desa Sokawera RT 2/4', 'Petani', NULL, NULL, NULL, 'Tambah Modal', '2023-12-03', NULL, NULL, NULL, NULL, NULL, '2023-12-03 01:23:22', '2023-12-03 01:23:22'),
(28, 1, 'dr. Nila Januar', '3303095501850001', NULL, 'Arif Indrasetyadi', 'Eni Sugiyanti', 'Baru/Baik', 'BAI Blok 10 no 14 B-1', 'Skincare Alzena', '3 Tahun', 'Bobotsari/ Purbalingga', '3 Tahun', 'Tambah Modal', '2023-12-03', NULL, NULL, NULL, NULL, NULL, '2023-12-03 01:27:05', '2023-12-03 01:27:05'),
(29, 1, 'Ristam', '3302030809800004', NULL, 'Wefri Utami', 'Wasem', 'Baru/Baik', 'KarangAnyar RT 3/3', 'Pedagang Sembako', '10 Tahun', 'Pasar Margasona Rawalo', '10 tahun', 'Tambah Modal', '2023-12-03', NULL, NULL, NULL, NULL, NULL, '2023-12-03 01:29:27', '2023-12-03 01:29:27'),
(30, 1, 'Suryati', '3302226710740003', NULL, NULL, 'Sujinem', 'Lama/ Kurang', 'Purwosari Rt 01/03', 'Pedagang Buah', '10 tahun', 'Purwosari/Keliling', '10 tahun', 'Modal Usaha', '2023-12-03', NULL, NULL, NULL, NULL, NULL, '2023-12-03 01:31:52', '2023-12-03 01:31:52'),
(31, 1, 'Darwati', '3302105408820001', NULL, 'Budi Wahyudi', 'Tarsem', 'Lama/Baik', 'Kaliori Rt 04/03', 'Bikin Shuttlecock', '15 Tahun', 'Kaliori Rt 04/03', '15 tahun', 'Tambah Modal', '2023-12-03', NULL, NULL, NULL, NULL, NULL, '2023-12-03 01:33:35', '2023-12-03 01:33:35'),
(32, 1, 'Mushlikah', '3302334710670001', NULL, 'Hartono Slamet', 'Salimah', 'Lama/Baik', 'Kutauman Rt 03/01 Kedung Banteng', 'IRT', NULL, NULL, NULL, 'Biaya Pendidikan', '2023-12-03', NULL, NULL, NULL, NULL, NULL, '2023-12-03 01:35:17', '2023-12-03 01:35:17'),
(33, 2, 'Yudhistira', '1234554320987123', NULL, 'Musrifah', 'Sandra', 'Baru/Baik', 'Kutauman Rt 03/01 Kedung Banteng', 'Snack Basah', '5 Tahun', 'Pasir wetan', '10 tahun', 'Tambah Modal', '2023-12-07', NULL, NULL, NULL, NULL, NULL, '2023-12-06 18:08:54', '2023-12-06 18:08:54'),
(34, 1, 'Suwarto', '33021254127300012', '081766544234', 'Musrifah', 'Yeni', 'Lama/Baik', 'Purwosari Rt 01/03', 'Dagang', '10 tahun', 'Pasir Kidul Bonosari', '10 tahun', 'Tambah Modal', '2023-12-10', 'pemohon-images/Vls6vDUZIoUAzkV9fYJD5VyUnV6lj7xWIdP0olOh.jpg', 'pemohon-images/ViFF0jhYAHpjufKivrNgOFzYXAIC4VrYQO1LhX79.jpg', 'pemohon-images/8VIBnCTgZRruaUXMTOgnjCa0zfvql2A32R36X4sI.jpg', 'pemohon-images/BSHIlL5JEh1Wtj5oKBCBwl4LKW0XppHLe3GJIVMU.jpg', 'pemohon-images/kIaI7BGrmwooAzLDTELxtkRwi0N5xKy80BQxymUD.jpg', '2023-12-10 05:33:26', '2023-12-10 05:35:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `periodes`
--

CREATE TABLE `periodes` (
  `id` bigint UNSIGNED NOT NULL,
  `periode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `periodes`
--

INSERT INTO `periodes` (`id`, `periode`, `created_at`, `updated_at`) VALUES
(1, 'Oktober 2023', '2023-10-09 19:30:13', '2023-10-09 19:30:13'),
(2, 'November 2023', '2023-10-09 23:51:12', '2023-10-09 23:51:12'),
(4, 'Januari 2023', '2023-11-19 23:39:08', '2023-11-21 16:45:07'),
(5, 'Agustus 2024', '2023-12-10 20:25:35', '2023-12-17 04:59:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjamen`
--

CREATE TABLE `pinjamen` (
  `id` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `id_periode` bigint UNSIGNED NOT NULL,
  `id_pemohon` bigint UNSIGNED NOT NULL,
  `pinjaman` int NOT NULL,
  `gaji_kotor` int NOT NULL,
  `usaha` int NOT NULL,
  `rumah_tangga` int NOT NULL,
  `lain_lain` int NOT NULL,
  `simpanan_wajib` int DEFAULT NULL,
  `bunga` decimal(8,2) NOT NULL,
  `waktu` int NOT NULL,
  `kurung_waktu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pinjamen`
--

INSERT INTO `pinjamen` (`id`, `id_user`, `id_periode`, `id_pemohon`, `pinjaman`, `gaji_kotor`, `usaha`, `rumah_tangga`, `lain_lain`, `simpanan_wajib`, `bunga`, `waktu`, `kurung_waktu`, `tgl_pengajuan`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 1, 39705000, 15000000, 8000000, 3000000, 0, 0, 2.00, 18, 'bulan', '2023-10-11', '2023-10-11 05:08:27', '2023-12-08 08:49:15'),
(3, 1, 1, 2, 3600000, 1200000, 400000, 300000, 0, 0, 2.00, 12, 'bulan', '2023-10-11', '2023-10-11 05:11:37', '2023-12-10 20:50:29'),
(4, 1, 1, 3, 12000000, 4500000, 2000000, 500000, 0, 0, 2.00, 12, 'bulan', '2023-10-11', '2023-10-11 05:14:46', '2023-10-11 05:14:46'),
(5, 1, 1, 4, 77000000, 10000000, 0, 4000000, 500000, 0, 2.00, 30, 'bulan', '2023-10-11', '2023-10-11 05:18:31', '2023-11-23 06:23:00'),
(6, 1, 1, 5, 40000000, 17000000, 10000000, 2000000, 400000, 0, 2.00, 36, 'bulan', '2023-10-11', '2023-10-11 05:25:07', '2023-10-11 05:25:43'),
(7, 1, 2, 1, 50000000, 10000000, 1000000, 2000000, 1000000, 0, 2.00, 24, 'bulan', '2023-10-13', '2023-10-12 20:08:08', '2023-10-12 20:08:37'),
(11, 1, 1, 8, 35000000, 13500000, 4000000, 3000000, 0, 0, 2.00, 36, 'bulan', '2023-11-20', '2023-11-19 22:04:49', '2023-11-21 06:34:17'),
(12, 1, 1, 9, 500000, 1300000, 700000, 400000, 0, 0, 2.00, 12, 'bulan', '2023-11-20', '2023-11-19 22:41:01', '2023-11-19 22:41:01'),
(13, 1, 1, 10, 45000000, 8000000, 0, 200000, 200000, 0, 2.00, 18, 'bulan', '2023-11-20', '2023-11-19 22:44:09', '2023-11-19 22:44:09'),
(14, 1, 1, 11, 40000000, 20000000, 12000000, 3000000, 500000, 0, 2.00, 24, 'bulan', '2023-11-20', '2023-11-19 22:47:10', '2023-11-19 22:47:10'),
(15, 1, 1, 12, 40000000, 20000000, 10000000, 3000000, 500000, 0, 2.00, 18, 'bulan', '2023-11-20', '2023-11-19 22:49:29', '2023-11-19 22:49:29'),
(16, 1, 1, 13, 40000000, 9000000, 0, 1500000, 200000, 0, 2.00, 36, 'bulan', '2023-11-20', '2023-11-19 22:51:46', '2023-11-19 22:51:46'),
(17, 1, 1, 14, 45000000, 20000000, 10000000, 2000000, 200000, 0, 2.00, 36, 'bulan', '2023-11-20', '2023-11-19 22:53:39', '2023-11-19 22:53:39'),
(18, 1, 1, 15, 50000000, 13000000, 5000000, 2700000, 500000, 0, 2.00, 36, 'bulan', '2023-11-20', '2023-11-19 23:03:14', '2023-11-19 23:03:14'),
(19, 1, 1, 16, 40000000, 20000000, 10000000, 3000000, 500000, 0, 2.00, 36, 'bulan', '2023-11-20', '2023-11-19 23:05:17', '2023-11-19 23:05:17'),
(20, 1, 1, 17, 50000000, 40000000, 30000000, 3000000, 500000, 0, 2.00, 36, 'bulan', '2023-11-20', '2023-11-19 23:07:22', '2023-11-19 23:07:22'),
(21, 1, 1, 19, 4500000, 2500000, 0, 900000, 300000, 0, 2.00, 12, 'bulan', '2023-11-20', '2023-11-19 23:11:46', '2023-11-19 23:11:46'),
(22, 1, 1, 20, 10000000, 12500000, 4000000, 4000000, 1000000, 0, 2.00, 24, 'bulan', '2023-11-20', '2023-11-19 23:12:54', '2023-11-19 23:12:54'),
(23, 1, 1, 21, 100000000, 30000000, 22000000, 2000000, 0, 0, 1.50, 60, 'bulan', '2023-11-20', '2023-11-19 23:14:27', '2023-11-19 23:14:27'),
(24, 1, 1, 22, 40000000, 6990000, 0, 1500000, 324000, 0, 2.00, 36, 'bulan', '2023-11-20', '2023-11-19 23:17:49', '2023-11-19 23:17:49'),
(25, 2, 2, 5, 50000000, 15000000, 2000000, 1000000, 500000, 0, 2.00, 24, 'bulan', '2023-11-20', '2023-11-20 05:16:54', '2023-11-20 05:16:54'),
(26, 1, 2, 11, 1000000, 5000000, 700000, 400000, 0, 100000, 10.00, 12, 'minggu', '2023-11-21', '2023-11-21 01:00:29', '2023-11-21 01:00:29'),
(27, 1, 2, 8, 35000000, 13500000, 4000000, 3000000, 0, 0, 2.00, 36, 'bulan', '2023-11-21', '2023-11-21 01:26:07', '2023-11-21 01:53:47'),
(29, 1, 1, 23, 20000000, 15000000, 0, 6000000, 700000, 0, 2.00, 18, 'bulan', '2023-11-26', '2023-11-26 08:27:45', '2023-11-26 08:27:45'),
(30, 1, 1, 24, 60000000, 15000000, 5000000, 3000000, 1500000, 0, 1.80, 24, 'bulan', '2023-12-03', '2023-12-03 01:37:32', '2023-12-03 01:37:32'),
(31, 1, 1, 25, 80000000, 6500000, 0, 1500000, 1000000, 0, 1.50, 48, 'bulan', '2023-12-03', '2023-12-03 01:38:52', '2023-12-03 01:42:24'),
(32, 1, 1, 25, 80000000, 6500000, 0, 1500000, 1000000, 0, 2.00, 48, 'bulan', '2023-12-03', '2023-12-03 01:44:05', '2023-12-03 01:44:05'),
(33, 1, 1, 26, 100000000, 35500000, 13000000, 7000000, 3000000, 0, 2.00, 12, 'bulan', '2023-12-03', '2023-12-03 01:46:12', '2023-12-03 01:46:12'),
(34, 1, 1, 26, 90725000, 35500000, 13000000, 7000000, 3000000, 0, 2.00, 12, 'bulan', '2023-12-03', '2023-12-03 01:48:26', '2023-12-03 01:51:57'),
(35, 1, 1, 27, 15000000, 5700000, 0, 1500000, 800000, 0, 2.00, 12, 'bulan', '2023-12-03', '2023-12-03 01:53:39', '2023-12-03 01:53:39'),
(36, 1, 1, 28, 100000000, 35000000, 15000000, 5000000, 2000000, 0, 1.30, 18, 'bulan', '2023-12-03', '2023-12-03 01:55:25', '2023-12-03 01:55:25'),
(37, 1, 1, 29, 250000000, 37500000, 8500000, 2000000, 200000, 0, 1.80, 36, 'bulan', '2023-12-03', '2023-12-03 01:57:01', '2023-12-03 01:57:01'),
(38, 1, 1, 30, 2700000, 1500000, 0, 1000000, 0, 0, 2.00, 12, 'bulan', '2023-12-03', '2023-12-03 01:59:26', '2023-12-03 01:59:26'),
(39, 1, 1, 31, 20000000, 12000000, 4500000, 1000000, 200000, 0, 2.00, 18, 'bulan', '2023-12-03', '2023-12-03 02:00:53', '2023-12-03 02:00:53'),
(40, 1, 1, 32, 8000000, 2125000, 0, 1000000, 0, 0, 2.00, 12, 'bulan', '2023-12-03', '2023-12-03 02:02:16', '2023-12-03 02:02:16'),
(44, 1, 1, 33, 80000000, 10000000, 2000000, 3000000, 1000000, 0, 2.00, 36, 'bulan', '2023-12-11', '2023-12-10 20:35:17', '2023-12-10 20:35:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `registrasis`
--

CREATE TABLE `registrasis` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `registrasis`
--

INSERT INTO `registrasis` (`id`, `name`, `email`, `password`, `is_admin`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Yudhistira', 'yudhis@gmail.com', '$2y$10$u.YoQeraOrXqV9gG4zc0Q.9P8wts7jwApPSn31r45I/1ajJ5lMv.q', 1, 'Belum Validasi', '2023-10-09 19:28:37', '2023-10-09 19:28:37'),
(2, 'Sulaiman', 'sulaiman@gmail.com', '$2y$10$4Th4l3rdsuFN7/gB.A04nue5w5WVWlqhBgdM15rAzHplrmrytCir2', 0, 'Validasi', '2023-10-10 01:01:23', '2023-10-10 01:01:37'),
(3, 'Suparman', 'suparman@gmail.com', '$2y$10$N4neJ3.jcsLh1OvcKu4hf.Pm4vedxC5k/EZU40grwBU5gGR/txvQm', 0, 'Validasi', '2023-10-12 20:10:18', '2023-10-12 20:12:30'),
(4, 'Rofiana', 'rofiana@gmail.com', '$2y$10$1IV54zhHkShTm0I20F0jEOgAKld9c4bveCA4AcLUWmunN6rXF7UGG', 0, 'Validasi', '2023-11-21 16:36:43', '2023-11-21 22:02:23'),
(5, 'Firman', 'firman@gmail.com', '$2y$10$QryKTOk0P83jnEGmhUBvJOYxpc7niPqXKaFCoRDcfDtZ0/80cG1Ky', 0, 'Validasi', '2023-12-10 20:42:22', '2023-12-10 20:42:52'),
(6, 'surahman', 'surahman@gmail.com', '$2y$10$AML9XtSXo1.aE8a2pjZsduZaNPvx0h/cZu2ILfWha8GPyqD2RoWAq', 0, 'Belum Validasi', '2023-12-17 04:47:43', '2023-12-17 04:47:43'),
(7, 'sucipto', 'sucipto@gmail.com', '$2y$10$3eIwzNrdKq4.TuQfWO7jsO3DnVxe6xAyAKjym0rbyYVuPatbtR6Mu', 0, 'Validasi', '2023-12-17 04:53:24', '2023-12-17 04:58:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `id_registrasi` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `id_registrasi`, `name`, `email`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Yudhistira Diah Eka', 'yudhistiradiah@gmail.com', '$2y$10$pWlvYPQtNZ3W0Zuf5b4PVOsuA9DeIRqF.qu8akBLpEvE3jf1iBz1O', 1, NULL, '2023-10-09 19:28:37', '2023-12-10 20:41:23'),
(2, 2, 'Sulaiman', 'sulaiman@gmail.com', '$2y$10$4Th4l3rdsuFN7/gB.A04nue5w5WVWlqhBgdM15rAzHplrmrytCir2', 0, NULL, '2023-10-10 01:01:37', '2023-10-10 01:01:37'),
(3, 3, 'Sartiwen', 'sartiwen@gmail.com', '$2y$10$AwJdyp4ORfPyvRHR4fe.De5jcR9XZvl0hP1RDcUosBH6G3/uu7AoK', 0, NULL, '2023-10-12 20:12:30', '2023-10-12 20:59:51'),
(4, 4, 'Rofiana', 'rofiana@gmail.com', '$2y$10$1IV54zhHkShTm0I20F0jEOgAKld9c4bveCA4AcLUWmunN6rXF7UGG', 0, NULL, '2023-11-21 22:02:23', '2023-11-21 22:02:23'),
(5, 5, 'Firman', 'firman@gmail.com', '$2y$10$QryKTOk0P83jnEGmhUBvJOYxpc7niPqXKaFCoRDcfDtZ0/80cG1Ky', 0, NULL, '2023-12-10 20:42:52', '2023-12-10 20:42:52'),
(6, 7, 'sucipto', 'sucipto@gmail.com', '$2y$10$3eIwzNrdKq4.TuQfWO7jsO3DnVxe6xAyAKjym0rbyYVuPatbtR6Mu', 0, NULL, '2023-12-17 04:58:15', '2023-12-17 04:58:15');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alternatifs`
--
ALTER TABLE `alternatifs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alternatifs_nilai_id_foreign` (`nilai_id`),
  ADD KEY `alternatifs_id_periode_foreign` (`id_periode`),
  ADD KEY `alternatifs_kriteria_id_foreign` (`kriteria_id`),
  ADD KEY `alternatifs_pemohon_id_foreign` (`pemohon_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `hasils`
--
ALTER TABLE `hasils`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hasils_id_pemohon_foreign` (`id_pemohon`),
  ADD KEY `hasils_id_periode_foreign` (`id_periode`);

--
-- Indeks untuk tabel `kriterias`
--
ALTER TABLE `kriterias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kriterias_namakriteria_unique` (`namaKriteria`);

--
-- Indeks untuk tabel `kuesioners`
--
ALTER TABLE `kuesioners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kuesioners_id_user_foreign` (`id_user`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilais`
--
ALTER TABLE `nilais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilais_kriteria_id_foreign` (`kriteria_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pemohons`
--
ALTER TABLE `pemohons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pemohons_no_ktp_unique` (`no_ktp`),
  ADD KEY `pemohons_id_user_foreign` (`id_user`);

--
-- Indeks untuk tabel `periodes`
--
ALTER TABLE `periodes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `pinjamen`
--
ALTER TABLE `pinjamen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pinjamen_id_pemohon_foreign` (`id_pemohon`),
  ADD KEY `pinjamen_id_periode_foreign` (`id_periode`),
  ADD KEY `pinjamen_id_user_foreign` (`id_user`);

--
-- Indeks untuk tabel `registrasis`
--
ALTER TABLE `registrasis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_registrasi_foreign` (`id_registrasi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alternatifs`
--
ALTER TABLE `alternatifs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hasils`
--
ALTER TABLE `hasils`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=432;

--
-- AUTO_INCREMENT untuk tabel `kriterias`
--
ALTER TABLE `kriterias`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kuesioners`
--
ALTER TABLE `kuesioners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `nilais`
--
ALTER TABLE `nilais`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `pemohons`
--
ALTER TABLE `pemohons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `periodes`
--
ALTER TABLE `periodes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pinjamen`
--
ALTER TABLE `pinjamen`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `registrasis`
--
ALTER TABLE `registrasis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `alternatifs`
--
ALTER TABLE `alternatifs`
  ADD CONSTRAINT `alternatifs_id_periode_foreign` FOREIGN KEY (`id_periode`) REFERENCES `periodes` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `alternatifs_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriterias` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `alternatifs_nilai_id_foreign` FOREIGN KEY (`nilai_id`) REFERENCES `nilais` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `alternatifs_pemohon_id_foreign` FOREIGN KEY (`pemohon_id`) REFERENCES `pemohons` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `hasils`
--
ALTER TABLE `hasils`
  ADD CONSTRAINT `hasils_id_pemohon_foreign` FOREIGN KEY (`id_pemohon`) REFERENCES `pemohons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hasils_id_periode_foreign` FOREIGN KEY (`id_periode`) REFERENCES `periodes` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kuesioners`
--
ALTER TABLE `kuesioners`
  ADD CONSTRAINT `kuesioners_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilais`
--
ALTER TABLE `nilais`
  ADD CONSTRAINT `nilais_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriterias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pemohons`
--
ALTER TABLE `pemohons`
  ADD CONSTRAINT `pemohons_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pinjamen`
--
ALTER TABLE `pinjamen`
  ADD CONSTRAINT `pinjamen_id_pemohon_foreign` FOREIGN KEY (`id_pemohon`) REFERENCES `pemohons` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `pinjamen_id_periode_foreign` FOREIGN KEY (`id_periode`) REFERENCES `periodes` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `pinjamen_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_registrasi_foreign` FOREIGN KEY (`id_registrasi`) REFERENCES `registrasis` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
