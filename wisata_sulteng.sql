-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Mar 2021 pada 17.48
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wisata_sulteng`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
  `is_private_key` tinyint(1) NOT NULL DEFAULT '0',
  `ip_addresses` text,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(2, 1, 'samalili051099', 1, 0, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE `kontak` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `limits`
--

CREATE TABLE `limits` (
  `id` int(11) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `count` int(10) NOT NULL,
  `hour_started` int(11) NOT NULL,
  `api_key` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `bio` text,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `bio`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(21, 'MOH FIKRI', 'mohfikri077@gmail.com', 'IMG_49232.JPG', NULL, '$2y$10$d8OobGWkiS0y4GPgHBvogeySgRISkx2unEpLV3i/1/Kvi7UMtgbri', 1, 1, 1578978024),
(22, 'MOHFIKK', 'mohfikk@gmail.com', 'default.jpg', NULL, '$2y$10$l.D4KCMUoYwfvOXI.gdrqe74SR130SK9wbRppp.XwTm01OioigwNe', 2, 1, 1578978277),
(28, 'valkri', 'valkri077@gmail.com', 'default.jpg', NULL, '$2y$10$v.uMvg.VavyKz.s.fAVmIupRkM9ZnwS5uB2yLWhlr7ETnA13WWXvi', 2, 1, 1611903605);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(14, 1, 3),
(19, 2, 2),
(20, 1, 7),
(23, 2, 7),
(24, 2, 8),
(25, 1, 8),
(26, 1, 9),
(27, 2, 9),
(28, 2, 10),
(29, 1, 10),
(30, 2, 11),
(31, 1, 11),
(32, 3, 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_cerita`
--

CREATE TABLE `user_cerita` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `caption` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_cerita`
--

INSERT INTO `user_cerita` (`id`, `email`, `name`, `lokasi`, `caption`, `gambar`) VALUES
(105, 'mohfikri077@gmail.com', 'MOH FIKRI', 'palu', 'kamu tidak akan pernah berjalan sendirian nnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn', 'images.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_invoice`
--

CREATE TABLE `user_invoice` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_invoice`
--

INSERT INTO `user_invoice` (`id`, `nama`, `alamat`, `tgl_pesan`, `batas_bayar`) VALUES
(4, 'valkri', 'jl.undata', '2021-01-29 14:02:45', '2021-01-30 14:02:45'),
(5, 'valkri', 'jl.undata', '2021-01-29 14:03:15', '2021-01-30 14:03:15'),
(6, 'valkri', 'jl.undata', '2021-01-29 14:03:48', '2021-01-30 14:03:48'),
(7, 'ss', 'jl.undata', '2021-01-29 18:41:20', '2021-01-30 18:41:20'),
(8, 'bebas', 'jl.undata', '2021-01-29 18:46:34', '2021-01-30 18:46:34'),
(9, '', '', '2021-01-29 18:51:45', '2021-01-30 18:51:45'),
(10, 'bebas', 'jl.undata', '2021-01-29 18:57:22', '2021-01-30 18:57:22'),
(11, 'valkri', 'jl.undata', '2021-02-24 14:25:54', '2021-02-25 14:25:54'),
(12, 'valkri', 'jl.undata', '2021-02-24 14:26:42', '2021-02-25 14:26:42'),
(13, 'eiger', 'jl.undata', '2021-02-24 15:44:12', '2021-02-25 15:44:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'Menu'),
(7, 'home'),
(11, 'referensi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_pesanan`
--

CREATE TABLE `user_pesanan` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_user_toko` int(11) NOT NULL,
  `id_profil_toko` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `harga` int(10) NOT NULL,
  `pilihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_pesanan`
--

INSERT INTO `user_pesanan` (`id`, `id_invoice`, `id_user_toko`, `id_profil_toko`, `nama_produk`, `jumlah`, `harga`, `pilihan`) VALUES
(1, 4, 0, 1, 'tas', 2, 800000, ''),
(2, 6, 0, 2, 'contoh', 1, 500000, ''),
(3, 12, 1, 0, 'contoh', 2, 20000, ''),
(4, 13, 1, 0, 'tas', 2, 800000, '');

--
-- Trigger `user_pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `user_pesanan` FOR EACH ROW BEGIN
	UPDATE user_toko SET stok = stok-NEW.jumlah
    WHERE id_toko = NEW.id_user_toko;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_profil_toko`
--

CREATE TABLE `user_profil_toko` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_profil_toko`
--

INSERT INTO `user_profil_toko` (`id`, `email`, `kategori`, `nama`, `alamat`, `keterangan`, `image`) VALUES
(1, 'mohfikk@gmail.com', 'toko outdoor', 'eiger', 'jl.undata', 'aaa', 'Eiger-Exsportfoto.jpg'),
(2, 'mohfikri077@gmail.com', 'toko outdoor', 'rei', 'jl.undata', 'bagus', '11.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(3, 'Pengunjung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Folder', 'admin', 'fas fa-folder-plus', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user-check', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(17, 7, 'Halaman Utama', 'home', 'far fa-fw fa-paper-plane', 1),
(28, 2, 'Cerita', 'user/tampilan', 'fas fa-fw fa-history', 1),
(29, 1, 'Users Aktif', 'admin/users_aktif', 'fas fa-fw fa-user-tie', 1),
(31, 8, 'Wisata Alam', 'pariwisata/alam', 'fas fa-campground', 1),
(32, 8, 'Wisata Kuliner ', 'pariwisata/kuliner', 'fas fa-fw fa-utensils', 1),
(33, 8, 'Wisata Religi', 'pariwisata/religi', 'fas fa-fw fa-book', 1),
(34, 8, 'Wisata Sejarah', 'pariwisata/sejarah', 'fas fa-fw fa-history', 1),
(36, 9, 'Wisata Budaya', 'pariwisata/budaya', 'fas fa-landmark', 1),
(37, 11, 'Wisata Alam', 'pariwisata/alam', 'fas fa-fw fa-utensils', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(19, 'mohfikk@gmail.com', 'tr9HvugiSmRK4eqHHEUMNfukd8NAP6DRMf7UIO7TGbs=', 1578978747),
(25, 'mohfikri077@gmail.com', 'oSzsXv+vtuo4PwWdOGNseXLQG9lsHCtiiHhnmJXUxys=', 1599895130),
(27, 'mohfikri077@gmail.com', 'qULGn4yljXFCSdL3hQ737ko2uVXp5v8CHpNqfle/qRI=', 1599900106),
(28, 'mohfikk@gmail.com', 'cPW2xvw1b2qxQvstS5zLfWQTu7OGBPYalCW27S0gDzI=', 1599900264),
(29, 'mohfik077@gmail.com', 'fvk9yjr2UTzd/2tskwAIqAcRFz5I/hBCvxT0PNOlR4g=', 1604846649),
(30, 'mohfikk@gmail.com', 'yjQRJz/ZPBd01YwIiqQ4eUKuCB2O4CDpcMqwc739owo=', 1609861082),
(31, 'valkri077@gmail.com', 'ldWOK2ZtBBV/2UtN15dMhm99WYzD2DXx/bUR6uagb6k=', 1611903605);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_toko`
--

CREATE TABLE `user_toko` (
  `id_toko` int(11) NOT NULL,
  `id_profil_toko` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `ket` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `stok` varchar(100) NOT NULL,
  `gambar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_toko`
--

INSERT INTO `user_toko` (`id_toko`, `id_profil_toko`, `email`, `name`, `ket`, `harga`, `stok`, `gambar`) VALUES
(1, '1', 'mohfikk@gmail.com', 'tas', 'keril 60 L', '800000', '4', 'jj.jpg'),
(2, '2', 'mohfikri077@gmail.com', 'contoh', 'tas 20', '500000', '11', 'p1.jpg'),
(3, '2', 'mohfikri077@gmail.com', 'balsem', 'beli jo', '20000', '10', 'ii.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_wisata`
--

CREATE TABLE `user_wisata` (
  `id` int(15) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `name` varchar(128) NOT NULL,
  `sumber` varchar(100) NOT NULL,
  `ulasan` text NOT NULL,
  `image` varchar(128) NOT NULL,
  `latitude` varchar(100) DEFAULT NULL,
  `longitude` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_wisata`
--

INSERT INTO `user_wisata` (`id`, `kategori`, `name`, `sumber`, `ulasan`, `image`, `latitude`, `longitude`) VALUES
(10, 'alam', 'PANTAI BINOTIK', 'Sumber Foto (Instagram:@mohfikk)', 'Pantai ini merupakan salah satu pantai yang yangwajib dikunjugi jika anda berada di kabupatenbanggai dengan hamparan pasir putihnya dansangat cocok untuk kalian yang mau kemping', 'pantai_binotik.jpg', '-0.875644', '119.877242'),
(11, 'budaya', 'DANAU PAISUPOK', '', 'Lokasi: Desa Lukpanenteng, Kec. Bulagi,\r\nKab. Banggai Kepulauan.\r\nTak diragukan lagi keindahan yang terdapat di danau\r\nini airnya begitu bening, indah, sayang untuk\r\ndilewatkan \"itu air loh, bukan cermin\"', 'danau_paisupok.jpg', '-0.890577', '119.853209'),
(12, 'religi', 'PANTAI KALUKU', '', 'Pantai Kaluku yang berdekatan dengan Pusat Laut\r\nini sangat instagramable, dan lokasinya pun tidak\r\nterlalu jauh dengan kota palu, satu kali jalan anda\r\nbisa mengunjugi dua tempat sekaligus', 'pantai_kaluku.jpg', '-0.760986', '119.784030'),
(13, 'kuliner', 'PUSAT LAUT', 'sumber foto (instagram/mohfikk)', 'Lokasi: Desa Limboro, Kec. Banawa Tengah,\r\nKab. Donggala.\r\nFasilitas: Warung makan, Kamar mandi.\r\nJarak Tempuh: 12km dari pusat kota Palu.\r\nSumur Laut raksasa terbesar di dunia ini bernama\r\nPusentasi yang berasal dari bahasa Kaili atau\r\nsuku asli Sulawesi tengah, “Pusen” punya arti\r\nPusat, sedangkan “Tasi” berarti laut.', 'pusat_laut.jpg', '-0.708119', '119.759482'),
(14, 'sejarah', 'TAIPA BEACH', '', 'Lokasi: Taipa, Kec. Palu Timur, Kota Palu.\r\nTaipa Beach dilengkapi dengan taman rekreasi dan\r\nterdapat pula kolam renang serta lokasinya pun\r\ntidak jauh dari pusat kota Palu', 'taipa.jpg', '', ''),
(15, 'Pantai', 'SOMBORI ISLAND', '', 'Lokasi: Sombori Kab. Morowali\r\n\r\nBanyak yang bilang kalau Sombori Island ini\r\nRaja Ampatnya Morowali hal ini dikarnakan terdapat\r\nbanyak gugusan pulau nan eksotis, dilengkapi\r\ndengan keindahan bawa lautnya yang\r\nmemanjakan mata', 'sombori.jpg', '', ''),
(16, 'Pantai', 'PANTAI SIVALENTA', '', 'Lokasi: Desa Lende, Kec. Sirenja, Kab. Donggala.\r\nFasilitas: kamar mandi, warung makan,\r\nPantai sivalenta yang berada di kabupaten Donggala\r\nini sangat cocok bagi anda yang ingin kemping,\r\njaraknya sekitar 2-3 jam dari kota palu', 'pantai_sivalenta.jpg', '', ''),
(17, 'Pantai', 'PANTAI POGANDA', '', 'Lokasi; Kab. Banggai Kepulauan,\r\nBanggai kepulauan memang tak ada habisnya\r\nuntuk dieksplor wisata yang satu ini sangan\r\ncocok untuk anda yang butuh ketenangan', 'pantai_poganda.jpg', '', ''),
(18, 'Pantai', 'PANTAI BAMBARANO', '', 'Lokasi: Desa Sabang Kec. Sojol Kab. Donggala,\r\nPantai ini mempunyai hamparan pasir putih yang\r\nmenabjukkan dan lokasinya berdekatan dengan\r\ndanau Talaga, jika kalian berkunjung ke\r\nkabupaten Donggala maka tak ada salahnya\r\nuntuk singgah dipantai ini, tapi hati-hati\r\nkeindahanya membuat anda rindu untuk kembali', 'bambarano.jpg', '', ''),
(19, 'Pantai', 'PANTAI KILO 5', '', 'Lokasi: Luwuk, Kab. Banggai,\r\nObyek wisata alam ini merupakan pesona wisata\r\nyang indah dan bersih yang terletak di dekat\r\npusat Kota Luwuk. Obyek wisata ini memberikan\r\nbanyak fasilitas dan beragam masakan khas daerah\r\nKabupaten Banggai yang tersedia di cafe-cafe di\r\nsepanjang kawasan wisata', 'pantai_kilo.jpg', NULL, NULL),
(20, 'Pantai', 'PANTAI SIURI', '', 'Lokasi: Desa Toinasa, kec. Pamona Barat, Kab. Poso.\r\nFasilitas: Cottage, Restoran, Speedboat dan\r\nbanana boat.\r\nJarak Tempuh: 17 Km dari kota Tentena\r\nPantai Siuri terletak sebelah barat di tepian\r\nDanau Poso dengan menghadirkan pemandangan\r\nalam yang indah kearah danau. Pantai Siuri\r\nmemiliki pasir berwarna kuning keemasan yang\r\nmembuatnya berbeda dari danau lain', 'pantai_siuri.jpg', '', ''),
(21, 'Pantai', 'TANJUNG KARANG', '', 'Lokasi: Desa Labuan Bajo, Kec. Banawa\r\nKab. Donggala.\r\nFasilitas: Penginapan, Warung Makan, Kamar Mandi,\r\nJarak Tempuh: Sekitar 30 menit dari Kota Palu,\r\nTanjung Karang adalah pantai berpasir putih\r\ndengan kekayaan hayati biota bawah laut.\r\nTerdapat pula sebuah resor yang biasa\r\ndikunjungi oleh para wisatawan asing.', 'tanjung_karang.jpg', '', ''),
(22, 'Pantai', 'PANTAI ENU', '', 'Lokasi: Desa Enu Kec. Sindue, Kab. Donggala.\r\nPantai enu ini mempunyai beragam keunikan salah\r\nsatunya, selain memiliki pantai yang indah\r\npantai ini juga memiliki bomgkahan-bongkahan\r\nbatu yan tertata di tepi pantai, masyarakat\r\nsetempat menyebut bongkahan batu ini dengan\r\nsebutan Vatu Mipada', 'pantai_enu.jpg', '', ''),
(23, 'Pantai', 'PANTAI LABUANA', '', 'Lokasi: Desa Lende, Kec. Sirenja, Kab. Donggala.\r\nPantai labuana adalah salah satu pantai yang\r\nsangat banyak dikunjugi oleh masyarakat\r\nkarna pantai ini terkenal dengan\r\nkeindahan pantai pasir putinya, dan di pantai\r\nini terdapat teluk yang masyarakat sekitar\r\nmenamakan dengan teluk Cinta', 'pantai_labuana.jpg', '', ''),
(24, 'Pantai', 'PANTAI SALUR', '', 'Lokasi: Desa Talaga, Kec. Damsol, Kab. Donggala.\r\nPantai salur terkenal dengan pasir putihnya\r\nyang sangat memanjakan mata, kelebihan dari\r\npantai ini adalah terdapat mata air tawar\r\ndisalah satu perkebunan warga yang lokasinya\r\ntidak jauh dari pinggir pantai. Untuk menuju\r\nke pantai ini anda harus naik perahu sekitar\r\n15 menit dari pantai Bambarano', 'pantai_salur.jpg', '', ''),
(25, 'Pantai', 'PANTAI SEGET', '', 'Lokasi: Desa Pesik, Kec. Sojol Utara, Kab. Donggala.\r\nKeindahan pantai ini memang tidak diragukan\r\nlagi pasir pantainya yang putih, airnya\r\nyang jernih berwarna biru lengkap rasanya\r\njika langsung lompat dari batu itu', 'pantai_seget.jpg', '', ''),
(26, 'air', 'AIR TERJUN SALUOPA', '', 'Lokasi: Desa Tonusu, Kec. Pamona Puselemba,\r\nKab Poso,\r\nAir terjun ini berada sekitar 11 km dari\r\nTentena dan 3 Km dari Desa Tonusu. Keunikan\r\nAir Luncur Saluopa lantaran memiliki 12\r\ntingkat, air yang mengalir sangat jernih.', 'saluopa.jpg', '', ''),
(27, 'air', 'AIR TERJUN SALODIK', '', 'Lokasi: Desa Salodik, Kec. Luwuk, Kab. Banggai\r\nSekitar 30 Menit dari Kota Luwuk, Air Terjun\r\nSalodik adalah salah satu lokasi wisata yang\r\npopular Dengan biaya masuk sekitar Rp.2.000\r\nkalian sudah bisa menikmati segar nya air\r\npegunungan di air terjun ini selain itu susunan\r\nnya yang bertingkat tingkat dengan kedalaman\r\nyang aman, jadi kalau mau sekedar berenang\r\natau terjun bebas di air terjun ini Ok Ok saja!', 'salodik.jpg', '', ''),
(28, 'air', 'AIR TERJUN WERA', '', 'Lokasi: Kec. Dolo Barat, Kab. Sigi,\r\nJika anda ke Kabupaten Sigi kami meyarankan\r\nsilahkan kunjugi air terjun yang satu ini,\r\nditempat ini anda bisa mandi sepuasnya akses\r\njalannya pun untuk menuju ke air terjun ini\r\nsudah sangat bagus', 'wera.jpg', '', ''),
(29, 'budaya', 'SOU RAJA', '', 'Lokasi: Kampung Lere, Kec. Palu Barat, Kota Palu,\r\nBenua oge atau Sou Raja adalah rumah adat Kota\r\nPalu, dulu Sou Raja ini berfungsi sebagai\r\ntempat tinggal para raja dan keluarga dan juga\r\nsebagai pusat pemerintahan kerajaan.\r\nPembangunan Sou Raja ini atas prakarsa Raja\r\nYodjokodi pada sekitar abad 19 M', 'sou_raja.jpg', '', ''),
(30, 'budaya', 'Monumen Nosarara Nosabatutu', '', 'Lokasi : Tondo, Palu Timur, Kota Palu, \r\nTugu Perdamaian atau Monumen \"Nosarara Nosabatutu\" yang terletak di kawasan perbukitan Kelurahan Tondo, Dari tempat ini, pengunjung bisa menikmati keindahan Kota Palu dari ketinggian, memandang lepas perbukitan hijau dan pesona Teluk Palu, atau menikmati sunset yang tertutup di balik pegunungan.', 'tugu_perdamaian.jpg', '', ''),
(31, 'budaya', 'DANAU POSO', '', 'Lokasi: Kab. Poso,\r\nDanau Poso merupakan salah satu ikon wisata\r\nSulawesi Tengah dimana akan disajikan bentang\r\nalam menakjubkan serta suasana menenangkan.', 'danau_poso.jpg', '', ''),
(32, 'budaya', 'DANAU LEWUTO', '', 'Danau lewuto ini juga berlokasi di kawasan taman\r\nnasional lore lindu. Jadi ketika anda berkunjung\r\nke taman nasional tersebut kami sarankan juga\r\nuntuk mengunjungi danau lewuto.', 'danau_lewuto.jpg', '', ''),
(33, 'alam', 'DANAU TENDETUNG', '', 'Lokasi: Desa Kanali, Kec. Totikum Selatan\r\nKab. Banggai Kepulauan\r\n\r\nKeunikan danau ini adalah pada debit air yang akan\r\nberubah pada bulan-bulan tertentu', 'danau_tendetung.jpg', '100', '-100'),
(34, 'danau', 'DANAU WANGA', '', 'Lokasi: Napu, Kec. Lore Piore, Kab. Poso.\r\nDanau di kecamatan Lore Piore ini memiliki luas\r\nperairan sekitar 138 Ha. Secara geografis danau\r\nini terletak dalam kawasan Lore Lindu dalam\r\nformasi Lembah Napu', 'danau_wanga.jpg', '', ''),
(35, 'danau', 'RANO BUNGI', '', 'Lokasi: Kabobona, Kab. Sigi.\r\nRano Bungi menjadi salah satu objek\r\nwisata favorit Dolo yang di kelolah langsung\r\noleh penduduk dan pemuda warga desa dolo, dan\r\ntempat ini tidak jauh dari Kota Palu', 'rano_bungi.jpg', '', ''),
(36, 'danau', 'DANAU PAISUPOK', '', 'Lokasi: Desa Lukpanenteng, Kec. Bulagi,\r\nKab. Banggai Kepulauan.\r\nTak diragukan lagi keindahan yang terdapat di danau\r\nini airnya begitu bening, indah, sayang untuk\r\ndilewatkan \"itu air loh, bukan cermin\"', 'danau_paisupok1.jpg', '', ''),
(37, 'danau', 'DANAU TAMBING', '', 'Lokasi: Danau Tambing Kec. Lore Utara Kab. Poso.\r\n\r\nFasilitas: Kamar mandi, Musholah, Penginapan.\r\n\r\nDanau ini sangat cocok untuk anda yang ingin\r\nKemping selain itu biaya masuknya terjangkau\r\nsekitar Rp.10.000 per orang dan juga danau\r\nini biasa dijadikan tempat penginapan sembelum\r\nmelakukan pendakian di Gunung Nokilalaki', 'danau_tambing.jpg', '', ''),
(38, 'danau', 'DANAU TALAGA', '', 'Lokasi: Danau Talaga, Kec. Damsol Kab. Donggala.\r\n\r\nPaling enak menikmati keindahan Danau Talaga\r\nadalah pada sore hari, selain itu anda bisa\r\nmemancing yang dominan ikan didanau ini\r\nadalah ikan Mujair. Dan danau ini berdekatan\r\ndengan pantai Bambarano', 'danau_talaga.jpg', '', ''),
(39, 'danau', 'DANAU LINDU', '', 'Lokasi: Kec. Lindu, Kab. Sigi.\r\nDanau Lindu berada hampir ditengah-tengah\r\nkawasan Taman Nasional Lore Lindu, Danau ini\r\ndimaksukkan kedalam kelas Danau Tektonik dengan\r\nketinggian 1000 Mdpl dengan luas 3.488 Ha.\r\nMasyarakat yang tinggal disekitar Danau ini masih\r\nkental dengan hukum adat sehingga para wisatawan\r\nyang berkunjung ke danau ini harus melapor terlebih\r\ndahualu kepada pemerintah setempat untuk\r\nmengetahuai aturan adat yang berlaku, selain itu\r\ndi obyek wisata ini menyediakan Cottage-cottage\r\nbegi para wisatawan yang ingin menginap', 'danau_lindu.jpg', '', ''),
(40, 'pulau', 'PULAU SOMBORI', '', 'Lokasi : Sombori, Kab. Morowali,\r\nSelain pantai dan bawah lautnya yang indah Sombori juga di lengkapi dengan gugusan pulau-pulau yang memanjakan mata bagi para wisatawan yang berkunjung di tempat ini', 'pulau_sombori.jpg', '', ''),
(41, 'pulau', 'PULAU MALENGE', '', 'Lokasi : Desa Malenge, Kec. Walea Kepulauan, Kab. Tojo  Una-una,\r\nPulau Malenge adalah sebuah pulau yang masuk dalam kawasan Taman Nasional Kepulauan Togean, yang terletak di Teluk Tomini, Sulawesi Tengah dan menjadi salah satu tempat wisata yang sering di kunjungi oleh wisatawan.', 'pulau_malenge.jpg', '', ''),
(42, 'pulau', 'PULAU PASOSO', '', 'Lokasi : Kec. Balaesang, Kab. Donggala,\r\nPulau Pasoso, pulau yang sangat terkenal dengan populasi penyu hijau ini terletak di pantai barat Kabupaten Donggala, yang berjarak sekitar 108 km dari Kota Palu dengan waktu tempuh sekitar 3 jam perjalanan.', 'pulau_pasoso.jpg', '', ''),
(43, 'puncak', 'GUNUNG COLO', '', 'Lokasi : Pulau Una-una, Kab. Tojo Una-una,\r\nGunung Colo adalah sebuah gunung berapi kerucut yang terletak di Pulau Una-Una, Provinsi Sulawesi Tengah, Indonesia. Gunung ini berada di di tengah Teluk Tomini, bagian utara Sulawesi. Secara administratif termasuk ke wilayah Kabupaten Tojo Una-Una. (Sumber : https://id.wikipedia.org)', 'gunung_colo.jpg', '', ''),
(44, 'taman', 'LEMBAH BADA', '', 'Lokasi : Kab. Poso,Lembah Bada atau Lembah Napu adalah lembah yang terletak di Kabupaten Poso, Sulawesi Tengah. Lembah ini adalah bagian dari Taman Nasional Lore Lindu.Di lembah tersebut terdapat puluhan patung megalitik yang diperkirakan didirikan pada abad ke-14. (Sumber : https://id.wikipedia.org)', 'lembah_bada.jpg', '', ''),
(46, 'terbaru', 'PANTAI SALUR', '', '', 'pantai_salur1.jpg', '', ''),
(47, 'populer', 'SOMBORI ISLAND', '', '', 'sombori6.jpg', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `limits`
--
ALTER TABLE `limits`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_cerita`
--
ALTER TABLE `user_cerita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_invoice`
--
ALTER TABLE `user_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_pesanan`
--
ALTER TABLE `user_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_profil_toko`
--
ALTER TABLE `user_profil_toko`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_toko`
--
ALTER TABLE `user_toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indeks untuk tabel `user_wisata`
--
ALTER TABLE `user_wisata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `limits`
--
ALTER TABLE `limits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `user_cerita`
--
ALTER TABLE `user_cerita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT untuk tabel `user_invoice`
--
ALTER TABLE `user_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user_pesanan`
--
ALTER TABLE `user_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_profil_toko`
--
ALTER TABLE `user_profil_toko`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `user_toko`
--
ALTER TABLE `user_toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_wisata`
--
ALTER TABLE `user_wisata`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
