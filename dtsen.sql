-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 23, 2026 at 07:22 AM
-- Server version: 8.0.45-0ubuntu0.24.04.1
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dtsen`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `desa`
--

CREATE TABLE `desa` (
  `id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`id`, `nama`, `created_at`, `updated_at`) VALUES
('3301', 'Kabupaten Cilacap', NULL, NULL),
('3302', 'Kabupaten Banyumas', NULL, NULL),
('3303', 'Kabupaten Purbalingga', NULL, NULL),
('3304', 'Kabupaten Banjarnegara', NULL, NULL),
('3305', 'Kabupaten Kebumen', NULL, NULL),
('3306', 'Kabupaten Purworejo', NULL, NULL),
('3307', 'Kabupaten Wonosobo', NULL, NULL),
('3308', 'Kabupaten Magelang', NULL, NULL),
('3309', 'Kabupaten Boyolali', NULL, NULL),
('3310', 'Kabupaten Klaten', NULL, NULL),
('3311', 'Kabupaten Sukoharjo', NULL, NULL),
('3312', 'Kabupaten Wonogiri', NULL, NULL),
('3313', 'Kabupaten Karanganyar', NULL, NULL),
('3314', 'Kabupaten Sragen', NULL, NULL),
('3315', 'Kabupaten Grobogan', NULL, NULL),
('3316', 'Kabupaten Blora', NULL, NULL),
('3317', 'Kabupaten Rembang', NULL, NULL),
('3318', 'Kabupaten Pati', NULL, NULL),
('3319', 'Kabupaten Kudus', NULL, NULL),
('3320', 'Kabupaten Jepara', NULL, NULL),
('3321', 'Kabupaten Demak', NULL, NULL),
('3322', 'Kabupaten Semarang', NULL, NULL),
('3323', 'Kabupaten Temanggung', NULL, NULL),
('3324', 'Kabupaten Kendal', NULL, NULL),
('3325', 'Kabupaten Batang', NULL, NULL),
('3326', 'Kabupaten Pekalongan', NULL, NULL),
('3327', 'Kabupaten Pemalang', NULL, NULL),
('3328', 'Kabupaten Tegal', NULL, NULL),
('3329', 'Kabupaten Brebes', NULL, NULL),
('3371', 'Kota Magelang', NULL, NULL),
('3372', 'Kota Surakarta', NULL, NULL),
('3373', 'Kota Salatiga', NULL, NULL),
('3374', 'Kota Semarang', NULL, NULL),
('3375', 'Kota Pekalongan', NULL, NULL),
('3376', 'Kota Tegal', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kabupaten_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `kabupaten_id`, `nama`, `created_at`, `updated_at`) VALUES
('330101', '3301', 'Kedungreja', NULL, NULL),
('330102', '3301', 'Kesugihan', NULL, NULL),
('330103', '3301', 'Adipala', NULL, NULL),
('330104', '3301', 'Binangun', NULL, NULL),
('330105', '3301', 'Nusawungu', NULL, NULL),
('330106', '3301', 'Kroya', NULL, NULL),
('330107', '3301', 'Maos', NULL, NULL),
('330108', '3301', 'Jeruklegi', NULL, NULL),
('330109', '3301', 'Kawunganten', NULL, NULL),
('330110', '3301', 'Gandrungmangu', NULL, NULL),
('330111', '3301', 'Sidareja', NULL, NULL),
('330112', '3301', 'Karangpucung', NULL, NULL),
('330113', '3301', 'Cimanggu', NULL, NULL),
('330114', '3301', 'Majenang', NULL, NULL),
('330115', '3301', 'Wanareja', NULL, NULL),
('330116', '3301', 'Dayeuhluhur', NULL, NULL),
('330117', '3301', 'Sampang', NULL, NULL),
('330118', '3301', 'Cipari', NULL, NULL),
('330119', '3301', 'Patimuan', NULL, NULL),
('330120', '3301', 'Bantarsari', NULL, NULL),
('330121', '3301', 'Cilacap Selatan', NULL, NULL),
('330122', '3301', 'Cilacap Tengah', NULL, NULL),
('330123', '3301', 'Cilacap Utara', NULL, NULL),
('330124', '3301', 'Kampung Laut', NULL, NULL),
('330201', '3302', 'Lumbir', NULL, NULL),
('330202', '3302', 'Wangon', NULL, NULL),
('330203', '3302', 'Jatilawang', NULL, NULL),
('330204', '3302', 'Rawalo', NULL, NULL),
('330205', '3302', 'Kebasen', NULL, NULL),
('330206', '3302', 'Kemranjen', NULL, NULL),
('330207', '3302', 'Sumpiuh', NULL, NULL),
('330208', '3302', 'Tambak', NULL, NULL),
('330209', '3302', 'Somagede', NULL, NULL),
('330210', '3302', 'Kalibagor', NULL, NULL),
('330211', '3302', 'Banyumas', NULL, NULL),
('330212', '3302', 'Patikraja', NULL, NULL),
('330213', '3302', 'Purwojati', NULL, NULL),
('330214', '3302', 'Ajibarang', NULL, NULL),
('330215', '3302', 'Gumelar', NULL, NULL),
('330216', '3302', 'Pekuncen', NULL, NULL),
('330217', '3302', 'Cilongok', NULL, NULL),
('330218', '3302', 'Karanglewas', NULL, NULL),
('330219', '3302', 'Sokaraja', NULL, NULL),
('330220', '3302', 'Kembaran', NULL, NULL),
('330221', '3302', 'Sumbang', NULL, NULL),
('330222', '3302', 'Baturraden', NULL, NULL),
('330223', '3302', 'Kedungbanteng', NULL, NULL),
('330224', '3302', 'Purwokerto Selatan', NULL, NULL),
('330225', '3302', 'Purwokerto Barat', NULL, NULL),
('330226', '3302', 'Purwokerto Timur', NULL, NULL),
('330227', '3302', 'Purwokerto Utara', NULL, NULL),
('330301', '3303', 'Kemangkon', NULL, NULL),
('330302', '3303', 'Bukateja', NULL, NULL),
('330303', '3303', 'Kejobong', NULL, NULL),
('330304', '3303', 'Kaligondang', NULL, NULL),
('330305', '3303', 'Purbalingga', NULL, NULL),
('330306', '3303', 'Kalimanah', NULL, NULL),
('330307', '3303', 'Kutasari', NULL, NULL),
('330308', '3303', 'Mrebet', NULL, NULL),
('330309', '3303', 'Bobotsari', NULL, NULL),
('330310', '3303', 'Karangreja', NULL, NULL),
('330311', '3303', 'Karanganyar', NULL, NULL),
('330312', '3303', 'Karangmoncol', NULL, NULL),
('330313', '3303', 'Rembang', NULL, NULL),
('330314', '3303', 'Bojongsari', NULL, NULL),
('330315', '3303', 'Padamara', NULL, NULL),
('330316', '3303', 'Pengadegan', NULL, NULL),
('330317', '3303', 'Karangjambu', NULL, NULL),
('330318', '3303', 'Kertanegara', NULL, NULL),
('330401', '3304', 'Susukan', NULL, NULL),
('330402', '3304', 'Purworeja Klampok', NULL, NULL),
('330403', '3304', 'Mandiraja', NULL, NULL),
('330404', '3304', 'Purwanegara', NULL, NULL),
('330405', '3304', 'Bawang', NULL, NULL),
('330406', '3304', 'Banjarnegara', NULL, NULL),
('330407', '3304', 'Sigaluh', NULL, NULL),
('330408', '3304', 'Madukara', NULL, NULL),
('330409', '3304', 'Banjarmangu', NULL, NULL),
('330410', '3304', 'Wanadadi', NULL, NULL),
('330411', '3304', 'Rakit', NULL, NULL),
('330412', '3304', 'Punggelan', NULL, NULL),
('330413', '3304', 'Karangkobar', NULL, NULL),
('330414', '3304', 'Pagentan', NULL, NULL),
('330415', '3304', 'Pejawaran', NULL, NULL),
('330416', '3304', 'Batur', NULL, NULL),
('330417', '3304', 'Wanayasa', NULL, NULL),
('330418', '3304', 'Kalibening', NULL, NULL),
('330419', '3304', 'Pandanarum', NULL, NULL),
('330420', '3304', 'Pagedongan', NULL, NULL),
('330501', '3305', 'Ayah', NULL, NULL),
('330502', '3305', 'Buayan', NULL, NULL),
('330503', '3305', 'Puring', NULL, NULL),
('330504', '3305', 'Petanahan', NULL, NULL),
('330505', '3305', 'Klirong', NULL, NULL),
('330506', '3305', 'Buluspesantren', NULL, NULL),
('330507', '3305', 'Ambal', NULL, NULL),
('330508', '3305', 'Mirit', NULL, NULL),
('330509', '3305', 'Prembun', NULL, NULL),
('330510', '3305', 'Kutowinangun', NULL, NULL),
('330511', '3305', 'Alian', NULL, NULL),
('330512', '3305', 'Kebumen', NULL, NULL),
('330513', '3305', 'Pejagoan', NULL, NULL),
('330514', '3305', 'Sruweng', NULL, NULL),
('330515', '3305', 'Adimulyo', NULL, NULL),
('330516', '3305', 'Kuwarasan', NULL, NULL),
('330517', '3305', 'Rowokele', NULL, NULL),
('330518', '3305', 'Sempor', NULL, NULL),
('330519', '3305', 'Gombong', NULL, NULL),
('330520', '3305', 'Karanganyar', NULL, NULL),
('330521', '3305', 'Karanggayam', NULL, NULL),
('330522', '3305', 'Sadang', NULL, NULL),
('330523', '3305', 'Bonorowo', NULL, NULL),
('330524', '3305', 'Padureso', NULL, NULL),
('330525', '3305', 'Poncowarno', NULL, NULL),
('330526', '3305', 'Karangsambung', NULL, NULL),
('330601', '3306', 'Grabag', NULL, NULL),
('330602', '3306', 'Ngombol', NULL, NULL),
('330603', '3306', 'Purwodadi', NULL, NULL),
('330604', '3306', 'Bagelen', NULL, NULL),
('330605', '3306', 'Kaligesing', NULL, NULL),
('330606', '3306', 'Purworejo', NULL, NULL),
('330607', '3306', 'Banyuurip', NULL, NULL),
('330608', '3306', 'Bayan', NULL, NULL),
('330609', '3306', 'Kutoarjo', NULL, NULL),
('330610', '3306', 'Butuh', NULL, NULL),
('330611', '3306', 'Pituruh', NULL, NULL),
('330612', '3306', 'Kemiri', NULL, NULL),
('330613', '3306', 'Bruno', NULL, NULL),
('330614', '3306', 'Gebang', NULL, NULL),
('330615', '3306', 'Loano', NULL, NULL),
('330616', '3306', 'Bener', NULL, NULL),
('330701', '3307', 'Wadaslintang', NULL, NULL),
('330702', '3307', 'Kepil', NULL, NULL),
('330703', '3307', 'Sapuran', NULL, NULL),
('330704', '3307', 'Kaliwiro', NULL, NULL),
('330705', '3307', 'Leksono', NULL, NULL),
('330706', '3307', 'Selomerto', NULL, NULL),
('330707', '3307', 'Kalikajar', NULL, NULL),
('330708', '3307', 'Kertek', NULL, NULL),
('330709', '3307', 'Wonosobo', NULL, NULL),
('330710', '3307', 'Watumalang', NULL, NULL),
('330711', '3307', 'Mojotengah', NULL, NULL),
('330712', '3307', 'Garung', NULL, NULL),
('330713', '3307', 'Kejajar', NULL, NULL),
('330714', '3307', 'Sukoharjo', NULL, NULL),
('330715', '3307', 'Kalibawang', NULL, NULL),
('330801', '3308', 'Salaman', NULL, NULL),
('330802', '3308', 'Borobudur', NULL, NULL),
('330803', '3308', 'Ngluwar', NULL, NULL),
('330804', '3308', 'Salam', NULL, NULL),
('330805', '3308', 'Srumbung', NULL, NULL),
('330806', '3308', 'Dukun', NULL, NULL),
('330807', '3308', 'Sawangan', NULL, NULL),
('330808', '3308', 'Muntilan', NULL, NULL),
('330809', '3308', 'Mungkid', NULL, NULL),
('330810', '3308', 'Mertoyudan', NULL, NULL),
('330811', '3308', 'Tempuran', NULL, NULL),
('330812', '3308', 'Kajoran', NULL, NULL),
('330813', '3308', 'Kaliangkrik', NULL, NULL),
('330814', '3308', 'Bandongan', NULL, NULL),
('330815', '3308', 'Candimulyo', NULL, NULL),
('330816', '3308', 'Pakis', NULL, NULL),
('330817', '3308', 'Ngablak', NULL, NULL),
('330818', '3308', 'Grabag', NULL, NULL),
('330819', '3308', 'Tegalrejo', NULL, NULL),
('330820', '3308', 'Secang', NULL, NULL),
('330821', '3308', 'Windusari', NULL, NULL),
('330901', '3309', 'Selo', NULL, NULL),
('330902', '3309', 'Ampel', NULL, NULL),
('330903', '3309', 'Cepogo', NULL, NULL),
('330904', '3309', 'Musuk', NULL, NULL),
('330905', '3309', 'Boyolali', NULL, NULL),
('330906', '3309', 'Mojosongo', NULL, NULL),
('330907', '3309', 'Teras', NULL, NULL),
('330908', '3309', 'Sawit', NULL, NULL),
('330909', '3309', 'Banyudono', NULL, NULL),
('330910', '3309', 'Sambi', NULL, NULL),
('330911', '3309', 'Ngemplak', NULL, NULL),
('330912', '3309', 'Nogosari', NULL, NULL),
('330913', '3309', 'Simo', NULL, NULL),
('330914', '3309', 'Karanggede', NULL, NULL),
('330915', '3309', 'Klego', NULL, NULL),
('330916', '3309', 'Andong', NULL, NULL),
('330917', '3309', 'Kemusu', NULL, NULL),
('330918', '3309', 'Wonosegoro', NULL, NULL),
('330919', '3309', 'Juwangi', NULL, NULL),
('330920', '3309', 'Gladagsari', NULL, NULL),
('330921', '3309', 'Tamansari', NULL, NULL),
('330922', '3309', 'Wonosamodro', NULL, NULL),
('331001', '3310', 'Prambanan', NULL, NULL),
('331002', '3310', 'Gantiwarno', NULL, NULL),
('331003', '3310', 'Wedi', NULL, NULL),
('331004', '3310', 'Bayat', NULL, NULL),
('331005', '3310', 'Cawas', NULL, NULL),
('331006', '3310', 'Trucuk', NULL, NULL),
('331007', '3310', 'Kebonarum', NULL, NULL),
('331008', '3310', 'Jogonalan', NULL, NULL),
('331009', '3310', 'Manisrenggo', NULL, NULL),
('331010', '3310', 'Karangnongko', NULL, NULL),
('331011', '3310', 'Ceper', NULL, NULL),
('331012', '3310', 'Pedan', NULL, NULL),
('331013', '3310', 'Karangdowo', NULL, NULL),
('331014', '3310', 'Juwiring', NULL, NULL),
('331015', '3310', 'Wonosari', NULL, NULL),
('331016', '3310', 'Delanggu', NULL, NULL),
('331017', '3310', 'Polanharjo', NULL, NULL),
('331018', '3310', 'Karanganom', NULL, NULL),
('331019', '3310', 'Tulung', NULL, NULL),
('331020', '3310', 'Jatinom', NULL, NULL),
('331021', '3310', 'Kemalang', NULL, NULL),
('331022', '3310', 'Ngawen', NULL, NULL),
('331023', '3310', 'Kalikotes', NULL, NULL),
('331024', '3310', 'Klaten Utara', NULL, NULL),
('331025', '3310', 'Klaten Tengah', NULL, NULL),
('331026', '3310', 'Klaten Selatan', NULL, NULL),
('331101', '3311', 'Weru', NULL, NULL),
('331102', '3311', 'Bulu', NULL, NULL),
('331103', '3311', 'Tawangsari', NULL, NULL),
('331104', '3311', 'Sukoharjo', NULL, NULL),
('331105', '3311', 'Nguter', NULL, NULL),
('331106', '3311', 'Bendosari', NULL, NULL),
('331107', '3311', 'Polokarto', NULL, NULL),
('331108', '3311', 'Mojolaban', NULL, NULL),
('331109', '3311', 'Grogol', NULL, NULL),
('331110', '3311', 'Baki', NULL, NULL),
('331111', '3311', 'Gatak', NULL, NULL),
('331112', '3311', 'Kartasura', NULL, NULL),
('331201', '3312', 'Pracimantoro', NULL, NULL),
('331202', '3312', 'Giritontro', NULL, NULL),
('331203', '3312', 'Giriwoyo', NULL, NULL),
('331204', '3312', 'Batuwarno', NULL, NULL),
('331205', '3312', 'Tirtomoyo', NULL, NULL),
('331206', '3312', 'Nguntoronadi', NULL, NULL),
('331207', '3312', 'Baturetno', NULL, NULL),
('331208', '3312', 'Eromoko', NULL, NULL),
('331209', '3312', 'Wuryantoro', NULL, NULL),
('331210', '3312', 'Manyaran', NULL, NULL),
('331211', '3312', 'Selogiri', NULL, NULL),
('331212', '3312', 'Wonogiri', NULL, NULL),
('331213', '3312', 'Ngadirojo', NULL, NULL),
('331214', '3312', 'Sidoharjo', NULL, NULL),
('331215', '3312', 'Jatiroto', NULL, NULL),
('331216', '3312', 'Kismantoro', NULL, NULL),
('331217', '3312', 'Purwantoro', NULL, NULL),
('331218', '3312', 'Bulukerto', NULL, NULL),
('331219', '3312', 'Slogohimo', NULL, NULL),
('331220', '3312', 'Jatisrono', NULL, NULL),
('331221', '3312', 'Jatipurno', NULL, NULL),
('331222', '3312', 'Girimarto', NULL, NULL),
('331223', '3312', 'Karangtengah', NULL, NULL),
('331224', '3312', 'Paranggupito', NULL, NULL),
('331225', '3312', 'Puhpelem', NULL, NULL),
('331301', '3313', 'Jatipuro', NULL, NULL),
('331302', '3313', 'Jatiyoso', NULL, NULL),
('331303', '3313', 'Jumapolo', NULL, NULL),
('331304', '3313', 'Jumantono', NULL, NULL),
('331305', '3313', 'Matesih', NULL, NULL),
('331306', '3313', 'Tawangmangu', NULL, NULL),
('331307', '3313', 'Ngargoyoso', NULL, NULL),
('331308', '3313', 'Karangpandan', NULL, NULL),
('331309', '3313', 'Karanganyar', NULL, NULL),
('331310', '3313', 'Tasikmadu', NULL, NULL),
('331311', '3313', 'Jaten', NULL, NULL),
('331312', '3313', 'Colomadu', NULL, NULL),
('331313', '3313', 'Gondangrejo', NULL, NULL),
('331314', '3313', 'Kebakkramat', NULL, NULL),
('331315', '3313', 'Mojogedang', NULL, NULL),
('331316', '3313', 'Kerjo', NULL, NULL),
('331317', '3313', 'Jenawi', NULL, NULL),
('331401', '3314', 'Kalijambe', NULL, NULL),
('331402', '3314', 'Plupuh', NULL, NULL),
('331403', '3314', 'Masaran', NULL, NULL),
('331404', '3314', 'Kedawung', NULL, NULL),
('331405', '3314', 'Sambirejo', NULL, NULL),
('331406', '3314', 'Gondang', NULL, NULL),
('331407', '3314', 'Sambungmacan', NULL, NULL),
('331408', '3314', 'Ngrampal', NULL, NULL),
('331409', '3314', 'Karangmalang', NULL, NULL),
('331410', '3314', 'Sragen', NULL, NULL),
('331411', '3314', 'Sidoharjo', NULL, NULL),
('331412', '3314', 'Tanon', NULL, NULL),
('331413', '3314', 'Gemolong', NULL, NULL),
('331414', '3314', 'Miri', NULL, NULL),
('331415', '3314', 'Sumberlawang', NULL, NULL),
('331416', '3314', 'Mondokan', NULL, NULL),
('331417', '3314', 'Sukodono', NULL, NULL),
('331418', '3314', 'Gesi', NULL, NULL),
('331419', '3314', 'Tangen', NULL, NULL),
('331420', '3314', 'Jenar', NULL, NULL),
('331501', '3315', 'Kedungjati', NULL, NULL),
('331502', '3315', 'Karangrayung', NULL, NULL),
('331503', '3315', 'Penawangan', NULL, NULL),
('331504', '3315', 'Toroh', NULL, NULL),
('331505', '3315', 'Geyer', NULL, NULL),
('331506', '3315', 'Pulokulon', NULL, NULL),
('331507', '3315', 'Kradenan', NULL, NULL),
('331508', '3315', 'Gabus', NULL, NULL),
('331509', '3315', 'Ngaringan', NULL, NULL),
('331510', '3315', 'Wirosari', NULL, NULL),
('331511', '3315', 'Tawangharjo', NULL, NULL),
('331512', '3315', 'Grobogan', NULL, NULL),
('331513', '3315', 'Purwodadi', NULL, NULL),
('331514', '3315', 'Brati', NULL, NULL),
('331515', '3315', 'Klambu', NULL, NULL),
('331516', '3315', 'Godong', NULL, NULL),
('331517', '3315', 'Gubug', NULL, NULL),
('331518', '3315', 'Tegowanu', NULL, NULL),
('331519', '3315', 'Tanggungharjo', NULL, NULL),
('331601', '3316', 'Jati', NULL, NULL),
('331602', '3316', 'Randublatung', NULL, NULL),
('331603', '3316', 'Kradenan', NULL, NULL),
('331604', '3316', 'Kedungtuban', NULL, NULL),
('331605', '3316', 'Cepu', NULL, NULL),
('331606', '3316', 'Sambong', NULL, NULL),
('331607', '3316', 'Jiken', NULL, NULL),
('331608', '3316', 'Jepon', NULL, NULL),
('331609', '3316', 'Blora', NULL, NULL),
('331610', '3316', 'Tunjungan', NULL, NULL),
('331611', '3316', 'Banjarejo', NULL, NULL),
('331612', '3316', 'Ngawen', NULL, NULL),
('331613', '3316', 'Kunduran', NULL, NULL),
('331614', '3316', 'Todanan', NULL, NULL),
('331615', '3316', 'Bogorejo', NULL, NULL),
('331616', '3316', 'Japah', NULL, NULL),
('331701', '3317', 'Sumber', NULL, NULL),
('331702', '3317', 'Bulu', NULL, NULL),
('331703', '3317', 'Gunem', NULL, NULL),
('331704', '3317', 'Sale', NULL, NULL),
('331705', '3317', 'Sarang', NULL, NULL),
('331706', '3317', 'Sedan', NULL, NULL),
('331707', '3317', 'Pamotan', NULL, NULL),
('331708', '3317', 'Sulang', NULL, NULL),
('331709', '3317', 'Kaliori', NULL, NULL),
('331710', '3317', 'Rembang', NULL, NULL),
('331711', '3317', 'Pancur', NULL, NULL),
('331712', '3317', 'Kragan', NULL, NULL),
('331713', '3317', 'Sluke', NULL, NULL),
('331714', '3317', 'Lasem', NULL, NULL),
('331801', '3318', 'Sukolilo', NULL, NULL),
('331802', '3318', 'Kayen', NULL, NULL),
('331803', '3318', 'Tambakromo', NULL, NULL),
('331804', '3318', 'Winong', NULL, NULL),
('331805', '3318', 'Pucakwangi', NULL, NULL),
('331806', '3318', 'Jaken', NULL, NULL),
('331807', '3318', 'Batangan', NULL, NULL),
('331808', '3318', 'Juwana', NULL, NULL),
('331809', '3318', 'Jakenan', NULL, NULL),
('331810', '3318', 'Pati', NULL, NULL),
('331811', '3318', 'Gabus', NULL, NULL),
('331812', '3318', 'Margorejo', NULL, NULL),
('331813', '3318', 'Gembong', NULL, NULL),
('331814', '3318', 'Tlogowungu', NULL, NULL),
('331815', '3318', 'Wedarijaksa', NULL, NULL),
('331816', '3318', 'Margoyoso', NULL, NULL),
('331817', '3318', 'Gunungwungkal', NULL, NULL),
('331818', '3318', 'Cluwak', NULL, NULL),
('331819', '3318', 'Tayu', NULL, NULL),
('331820', '3318', 'Dukuhseti', NULL, NULL),
('331821', '3318', 'Trangkil', NULL, NULL),
('331901', '3319', 'Kaliwungu', NULL, NULL),
('331902', '3319', 'Kota Kudus', NULL, NULL),
('331903', '3319', 'Jati', NULL, NULL),
('331904', '3319', 'Undaan', NULL, NULL),
('331905', '3319', 'Mejobo', NULL, NULL),
('331906', '3319', 'Jekulo', NULL, NULL),
('331907', '3319', 'Bae', NULL, NULL),
('331908', '3319', 'Gebog', NULL, NULL),
('331909', '3319', 'Dawe', NULL, NULL),
('332001', '3320', 'Kedung', NULL, NULL),
('332002', '3320', 'Pecangaan', NULL, NULL),
('332003', '3320', 'Welahan', NULL, NULL),
('332004', '3320', 'Mayong', NULL, NULL),
('332005', '3320', 'Batealit', NULL, NULL),
('332006', '3320', 'Jepara', NULL, NULL),
('332007', '3320', 'Mlonggo', NULL, NULL),
('332008', '3320', 'Bangsri', NULL, NULL),
('332009', '3320', 'Keling', NULL, NULL),
('332010', '3320', 'Karimunjawa', NULL, NULL),
('332011', '3320', 'Tahunan', NULL, NULL),
('332012', '3320', 'Nalumsari', NULL, NULL),
('332013', '3320', 'Kalinyamatan', NULL, NULL),
('332014', '3320', 'Kembang', NULL, NULL),
('332015', '3320', 'Pakis Aji', NULL, NULL),
('332016', '3320', 'Donorojo', NULL, NULL),
('332101', '3321', 'Mranggen', NULL, NULL),
('332102', '3321', 'Karangawen', NULL, NULL),
('332103', '3321', 'Guntur', NULL, NULL),
('332104', '3321', 'Sayung', NULL, NULL),
('332105', '3321', 'Karangtengah', NULL, NULL),
('332106', '3321', 'Wonosalam', NULL, NULL),
('332107', '3321', 'Dempet', NULL, NULL),
('332108', '3321', 'Gajah', NULL, NULL),
('332109', '3321', 'Karanganyar', NULL, NULL),
('332110', '3321', 'Mijen', NULL, NULL),
('332111', '3321', 'Demak', NULL, NULL),
('332112', '3321', 'Bonang', NULL, NULL),
('332113', '3321', 'Wedung', NULL, NULL),
('332114', '3321', 'Kebonagung', NULL, NULL),
('332201', '3322', 'Getasan', NULL, NULL),
('332202', '3322', 'Tengaran', NULL, NULL),
('332203', '3322', 'Susukan', NULL, NULL),
('332204', '3322', 'Suruh', NULL, NULL),
('332205', '3322', 'Pabelan', NULL, NULL),
('332206', '3322', 'Tuntang', NULL, NULL),
('332207', '3322', 'Banyubiru', NULL, NULL),
('332208', '3322', 'Jambu', NULL, NULL),
('332209', '3322', 'Sumowono', NULL, NULL),
('332210', '3322', 'Ambarawa', NULL, NULL),
('332211', '3322', 'Bawen', NULL, NULL),
('332212', '3322', 'Bringin', NULL, NULL),
('332213', '3322', 'Bergas', NULL, NULL),
('332215', '3322', 'Pringapus', NULL, NULL),
('332216', '3322', 'Bancak', NULL, NULL),
('332217', '3322', 'Kaliwungu', NULL, NULL),
('332218', '3322', 'Ungaran Barat', NULL, NULL),
('332219', '3322', 'Ungaran Timur', NULL, NULL),
('332220', '3322', 'Bandungan', NULL, NULL),
('332301', '3323', 'Bulu', NULL, NULL),
('332302', '3323', 'Tembarak', NULL, NULL),
('332303', '3323', 'Temanggung', NULL, NULL),
('332304', '3323', 'Pringsurat', NULL, NULL),
('332305', '3323', 'Kaloran', NULL, NULL),
('332306', '3323', 'Kandangan', NULL, NULL),
('332307', '3323', 'Kedu', NULL, NULL),
('332308', '3323', 'Parakan', NULL, NULL),
('332309', '3323', 'Ngadirejo', NULL, NULL),
('332310', '3323', 'Jumo', NULL, NULL),
('332311', '3323', 'Tretep', NULL, NULL),
('332312', '3323', 'Candiroto', NULL, NULL),
('332313', '3323', 'Kranggan', NULL, NULL),
('332314', '3323', 'Tlogomulyo', NULL, NULL),
('332315', '3323', 'Selopampang', NULL, NULL),
('332316', '3323', 'Bansari', NULL, NULL),
('332317', '3323', 'Kledung', NULL, NULL),
('332318', '3323', 'Bejen', NULL, NULL),
('332319', '3323', 'Wonoboyo', NULL, NULL),
('332320', '3323', 'Gemawang', NULL, NULL),
('332401', '3324', 'Plantungan', NULL, NULL),
('332402', '3324', 'Pageruyung', NULL, NULL),
('332403', '3324', 'Sukorejo', NULL, NULL),
('332404', '3324', 'Patean', NULL, NULL),
('332405', '3324', 'Singorojo', NULL, NULL),
('332406', '3324', 'Limbangan', NULL, NULL),
('332407', '3324', 'Boja', NULL, NULL),
('332408', '3324', 'Kaliwungu', NULL, NULL),
('332409', '3324', 'Brangsong', NULL, NULL),
('332410', '3324', 'Pegandon', NULL, NULL),
('332411', '3324', 'Gemuh', NULL, NULL),
('332412', '3324', 'Weleri', NULL, NULL),
('332413', '3324', 'Cepiring', NULL, NULL),
('332414', '3324', 'Patebon', NULL, NULL),
('332415', '3324', 'Kendal', NULL, NULL),
('332416', '3324', 'Rowosari', NULL, NULL),
('332417', '3324', 'Kangkung', NULL, NULL),
('332418', '3324', 'Ringinarum', NULL, NULL),
('332419', '3324', 'Ngampel', NULL, NULL),
('332420', '3324', 'Kaliwungu Selatan', NULL, NULL),
('332501', '3325', 'Wonotunggal', NULL, NULL),
('332502', '3325', 'Bandar', NULL, NULL),
('332503', '3325', 'Blado', NULL, NULL),
('332504', '3325', 'Reban', NULL, NULL),
('332505', '3325', 'Bawang', NULL, NULL),
('332506', '3325', 'Tersono', NULL, NULL),
('332507', '3325', 'Gringsing', NULL, NULL),
('332508', '3325', 'Limpung', NULL, NULL),
('332509', '3325', 'Subah', NULL, NULL),
('332510', '3325', 'Tulis', NULL, NULL),
('332511', '3325', 'Batang', NULL, NULL),
('332512', '3325', 'Warungasem', NULL, NULL),
('332513', '3325', 'Kandeman', NULL, NULL),
('332514', '3325', 'Pecalungan', NULL, NULL),
('332515', '3325', 'Banyuputih', NULL, NULL),
('332601', '3326', 'Kandangserang', NULL, NULL),
('332602', '3326', 'Paninggaran', NULL, NULL),
('332603', '3326', 'Lebakbarang', NULL, NULL),
('332604', '3326', 'Petungkriyono', NULL, NULL),
('332605', '3326', 'Talun', NULL, NULL),
('332606', '3326', 'Doro', NULL, NULL),
('332607', '3326', 'Karanganyar', NULL, NULL),
('332608', '3326', 'Kajen', NULL, NULL),
('332609', '3326', 'Kesesi', NULL, NULL),
('332610', '3326', 'Sragi', NULL, NULL),
('332611', '3326', 'Bojong', NULL, NULL),
('332612', '3326', 'Wonopringgo', NULL, NULL),
('332613', '3326', 'Kedungwuni', NULL, NULL),
('332614', '3326', 'Buaran', NULL, NULL),
('332615', '3326', 'Tirto', NULL, NULL),
('332616', '3326', 'Wiradesa', NULL, NULL),
('332617', '3326', 'Siwalan', NULL, NULL),
('332618', '3326', 'Karangdadap', NULL, NULL),
('332619', '3326', 'Wonokerto', NULL, NULL),
('332701', '3327', 'Moga', NULL, NULL),
('332702', '3327', 'Pulosari', NULL, NULL),
('332703', '3327', 'Belik', NULL, NULL),
('332704', '3327', 'Watukumpul', NULL, NULL),
('332705', '3327', 'Bodeh', NULL, NULL),
('332706', '3327', 'Bantarbolang', NULL, NULL),
('332707', '3327', 'Randudongkal', NULL, NULL),
('332708', '3327', 'Pemalang', NULL, NULL),
('332709', '3327', 'Taman', NULL, NULL),
('332710', '3327', 'Petarukan', NULL, NULL),
('332711', '3327', 'Ampelgading', NULL, NULL),
('332712', '3327', 'Comal', NULL, NULL),
('332713', '3327', 'Ulujami', NULL, NULL),
('332714', '3327', 'Warungpring', NULL, NULL),
('332801', '3328', 'Margasari', NULL, NULL),
('332802', '3328', 'Bumijawa', NULL, NULL),
('332803', '3328', 'Bojong', NULL, NULL),
('332804', '3328', 'Balapulang', NULL, NULL),
('332805', '3328', 'Pagerbarang', NULL, NULL),
('332806', '3328', 'Lebaksiu', NULL, NULL),
('332807', '3328', 'Jatinegara', NULL, NULL),
('332808', '3328', 'Kedungbanteng', NULL, NULL),
('332809', '3328', 'Pangkah', NULL, NULL),
('332810', '3328', 'Slawi', NULL, NULL),
('332811', '3328', 'Adiwerna', NULL, NULL),
('332812', '3328', 'Talang', NULL, NULL),
('332813', '3328', 'Dukuhturi', NULL, NULL),
('332814', '3328', 'Tarub', NULL, NULL),
('332815', '3328', 'Kramat', NULL, NULL),
('332816', '3328', 'Suradadi', NULL, NULL),
('332817', '3328', 'Warureja', NULL, NULL),
('332818', '3328', 'Dukuhwaru', NULL, NULL),
('332901', '3329', 'Salem', NULL, NULL),
('332902', '3329', 'Bantarkawung', NULL, NULL),
('332903', '3329', 'Bumiayu', NULL, NULL),
('332904', '3329', 'Paguyangan', NULL, NULL),
('332905', '3329', 'Sirampog', NULL, NULL),
('332906', '3329', 'Tonjong', NULL, NULL),
('332907', '3329', 'Jatibarang', NULL, NULL),
('332908', '3329', 'Wanasari', NULL, NULL),
('332909', '3329', 'Brebes', NULL, NULL),
('332910', '3329', 'Songgom', NULL, NULL),
('332911', '3329', 'Kersana', NULL, NULL),
('332912', '3329', 'Losari', NULL, NULL),
('332913', '3329', 'Tanjung', NULL, NULL),
('332914', '3329', 'Bulakamba', NULL, NULL),
('332915', '3329', 'Larangan', NULL, NULL),
('332916', '3329', 'Ketanggungan', NULL, NULL),
('332917', '3329', 'Banjarharjo', NULL, NULL),
('337101', '3371', 'Magelang Selatan', NULL, NULL),
('337102', '3371', 'Magelang Utara', NULL, NULL),
('337103', '3371', 'Magelang Tengah', NULL, NULL),
('337201', '3372', 'Laweyan', NULL, NULL),
('337202', '3372', 'Serengan', NULL, NULL),
('337203', '3372', 'Pasar Kliwon', NULL, NULL),
('337204', '3372', 'Jebres', NULL, NULL),
('337205', '3372', 'Banjarsari', NULL, NULL),
('337301', '3373', 'Sidorejo', NULL, NULL),
('337302', '3373', 'Tingkir', NULL, NULL),
('337303', '3373', 'Argomulyo', NULL, NULL),
('337304', '3373', 'Sidomukti', NULL, NULL),
('337401', '3374', 'Semarang Tengah', NULL, NULL),
('337402', '3374', 'Semarang Utara', NULL, NULL),
('337403', '3374', 'Semarang Timur', NULL, NULL),
('337404', '3374', 'Gayamsari', NULL, NULL),
('337405', '3374', 'Genuk', NULL, NULL),
('337406', '3374', 'Pedurungan', NULL, NULL),
('337407', '3374', 'Semarang Selatan', NULL, NULL),
('337408', '3374', 'Candisari', NULL, NULL),
('337409', '3374', 'Gajahmungkur', NULL, NULL),
('337410', '3374', 'Tembalang', NULL, NULL),
('337411', '3374', 'Banyumanik', NULL, NULL),
('337412', '3374', 'Gunungpati', NULL, NULL),
('337413', '3374', 'Semarang Barat', NULL, NULL),
('337414', '3374', 'Mijen', NULL, NULL),
('337415', '3374', 'Ngaliyan', NULL, NULL),
('337416', '3374', 'Tugu', NULL, NULL),
('337501', '3375', 'Pekalongan Barat', NULL, NULL),
('337502', '3375', 'Pekalongan Timur', NULL, NULL),
('337503', '3375', 'Pekalongan Utara', NULL, NULL),
('337504', '3375', 'Pekalongan Selatan', NULL, NULL),
('337601', '3376', 'Tegal Barat', NULL, NULL),
('337602', '3376', 'Tegal Timur', NULL, NULL),
('337603', '3376', 'Tegal Selatan', NULL, NULL),
('337604', '3376', 'Margadana', NULL, NULL);

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_01_01_000001_create_wilayah_tables', 2);

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
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('2g5bmNwg4BgpvN2b4bDaur4PBIgfbPjG3d73cRBv', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWnlLdTR1N1hvaFFKazRIZVJuYnM1WnZDeGFVaXJlR2tDQ3h5S0FmZSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkva2VjYW1hdGFuLzMzMjIiO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1774250264);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `desa_kecamatan_id_foreign` (`kecamatan_id`);

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
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kecamatan_kabupaten_id_foreign` (`kabupaten_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `desa`
--
ALTER TABLE `desa`
  ADD CONSTRAINT `desa_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD CONSTRAINT `kecamatan_kabupaten_id_foreign` FOREIGN KEY (`kabupaten_id`) REFERENCES `kabupaten` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
