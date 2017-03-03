-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 08 Jun 2016 pada 00.21
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rakmalang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking_list`
--

CREATE TABLE IF NOT EXISTS `booking_list` (
  `order_id_bookinglist` int(11) DEFAULT NULL,
  `product_id_product` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `booking_list`
--

INSERT INTO `booking_list` (`order_id_bookinglist`, `product_id_product`, `jumlah`, `total`) VALUES
(2, 24, 2, 45000),
(4, 23, 2, 40000),
(4, 41, 1, 7500),
(5, 24, 16, 360000),
(6, 25, 18, 540000),
(7, 25, 2, 60000),
(7, 23, 1, 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(300) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `deskripsi`) VALUES
(1, 'PERALATAN CAMPING', '                        '),
(2, 'PERALATAN MOUNTAINEERING', '                        '),
(3, 'KOMUNIKASI DAN MULTIMEDIA', ''),
(4, 'SARANA PENERANGAN', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id_member` int(11) NOT NULL,
  `nama` varchar(60) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `passwd` varchar(65) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` char(1) DEFAULT NULL,
  `nomor_telfon` varchar(15) DEFAULT NULL,
  `alamat` varchar(400) DEFAULT NULL,
  `kode_pos` smallint(6) DEFAULT NULL,
  `last_login` datetime DEFAULT CURRENT_TIMESTAMP,
  `kode_konfirmasi_email` varchar(65) DEFAULT NULL,
  `status_email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `nama`, `email`, `passwd`, `tgl_lahir`, `jenis_kelamin`, `nomor_telfon`, `alamat`, `kode_pos`, `last_login`, `kode_konfirmasi_email`, `status_email`) VALUES
(1, '<?php }?>', '135150400111051@mail.ub.ac.id', 'd41d8cd98f00b204e9800998ecf8427e', '1995-01-05', 'm', '085755533005', 'lamongan', 32767, '2016-05-30 19:52:21', NULL, NULL),
(4, 'mai', 'mail@mail.com', 'd41d8cd98f00b204e9800998ecf8427e', '2015-12-14', 'm', '12781768798', '             klkalmslma          ', 1223, '2015-12-15 20:30:52', NULL, NULL),
(5, 'kaklmd', 'maail@mail.com', '0b1e50e1fd71c96bac94144cc59cff40', '2015-12-14', 'm', '0879889900', '       jnaknlkds                ', 12123, '2015-12-19 23:31:15', NULL, NULL),
(6, 'Oktavia Zalma', 'via@mail.com', 'd41d8cd98f00b204e9800998ecf8427e', '2015-12-13', 'm', '', '', 0, '2015-12-19 15:23:38', NULL, NULL),
(13, 'Oktavia Zalma PMS ', 'oktavia@mail.com', 'd41d8cd98f00b204e9800998ecf8427e', '1995-10-20', 'f', '0908797786', 'wocil indah sekali                       ', 32767, '2015-12-15 20:31:40', NULL, NULL),
(14, 'Contoh User', 'user@mail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2015-12-05', 'f', '089798345673', 'Jalan Bunga Andong No. 3F (Kost Griya Wocil) RT 06 RW 02, Kelurahan Jatimulyo, Kecamatam Lowokwaru', 32767, '2015-12-20 03:00:25', NULL, NULL),
(15, 'user', 'user1@mail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2015-12-01', 'm', '09080909999', 'Wocil                  ', 32767, '2015-12-21 14:44:28', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id_bookinglist` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `tgl_pemesanan` date DEFAULT NULL,
  `tgl_pengembalian` date DEFAULT NULL,
  `batas_pembayaran` date DEFAULT NULL,
  `status_order` char(50) DEFAULT NULL,
  `total_pembayaran` double DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`id_bookinglist`, `member_id`, `tgl_pemesanan`, `tgl_pengembalian`, `batas_pembayaran`, `status_order`, `total_pembayaran`) VALUES
(1, 5, '2015-12-20', '2015-12-21', '2015-12-19', 'Declined', 2500),
(2, 15, '2015-12-03', '2015-12-04', '2015-12-02', 'Pending', 45000),
(3, 15, '2015-12-16', '2015-12-19', '2015-12-15', 'Pending', 0),
(4, 1, '2016-05-31', '2016-06-02', '2016-05-30', 'Declined', 95000),
(5, 1, '2016-05-31', '2016-06-02', '2016-05-30', 'Pending', 720000),
(6, 1, '2016-05-24', '2016-05-01', '2016-05-23', 'Declined', 12420000),
(7, 1, '2016-05-31', '2016-05-31', '2016-05-30', 'Pending', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id_payment` int(11) NOT NULL,
  `order_id_bookinglist` int(11) DEFAULT NULL,
  `id_member` int(11) DEFAULT NULL,
  `nama_akun` varchar(255) DEFAULT NULL,
  `bank_asal` varchar(255) DEFAULT NULL,
  `bank_destinasi` varchar(255) DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `bukti_transfer` varchar(255) DEFAULT NULL,
  `jumlah_transfer` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `payment`
--

INSERT INTO `payment` (`id_payment`, `order_id_bookinglist`, `id_member`, `nama_akun`, `bank_asal`, `bank_destinasi`, `payment_date`, `bukti_transfer`, `jumlah_transfer`) VALUES
(1, 1, 5, 'Via', 'bni', 'bni', '2015-12-19 00:00:00', '4700f774b3a1f1f746091ccb7d27725e.jpg', 90000),
(2, 4, 1, 'via', 'bni', 'BCA', '2016-05-30 00:00:00', '70ed9fa3f2652431d2f47cf1c682f37e.PNG', 95000),
(3, 6, 1, 'asdf', 'bni', 'bni', '2016-05-01 00:00:00', '8f1390192a68276f7ea9385d214ba53a.PNG', 9000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id_product` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `nama_product` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `harga_sewa` double DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `deskripsi` varchar(555) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPRESSED;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id_product`, `id_kategori`, `nama_product`, `gambar`, `harga_sewa`, `stok`, `deskripsi`) VALUES
(23, 1, 'Tenda Dome 1-2 Orang', 'ad0163f7db024c00cbb1ee4902cd5d45.jpg', 20000, 17, 'Perjalanan berkemah menjadi lebih mudah dan nyaman dengan Tenda Camping  tenda ini memiliki perlindungan dasar PE tahan air yang membuat kelembaban di dalam tenda. Selain itu, kepadatan tinggi, pintu jaring anti-serangga membantu mencegah serangga mengganggu Anda di malam hari. \r\n\r\nPanjang :  200cm + 70cm Vestibule. Lebar : 165cm. Tinggi : 115cm. Double layer. Kapasitas : 2 orang. Dilengkapi jaring anti serangga di pintu dan jendela.'),
(24, 1, 'Tenda Dome 3-4 Orang', 'b573bcf10635ecfd9fce44d909645634.jpg', 22500, 0, 'Tenda ini memiliki perlindungan dasar PE tahan air yang membuat kelembaban di dalam tenda. Selain itu, kepadatan tinggi, pintu jaring anti-serangga membantu mencegah serangga mengganggu Anda di malam hari. \r\n\r\nUkuran : 1m + 2.10m x 2.40m x 1.30m. Double layer. Bahan: Rain fly -170T waterproof polyester 45cm. Alas/ Perlindungan tanah.'),
(25, 1, 'Tenda-Dome-5-7 Orang', '49bfc5ba24690579c9deeb8c9d76dfcb.jpg', 30000, 0, ' Penggunaan parasut tenda untuk alas akan membuat alas tipis dan cepat robek.\r\nBahan parasit yang digunakan adalah bahan Waterproof, untuk bagian yang loreng, waterproof menggunakan sistem lapisan Silver yang gak tembus air.\r\nUntuk lantai menggunakan Parasit yang lebih tebal dari dinding, dan waterproof.\r\n\r\nBahan : Parasit Tahan Air \r\nLantai : Parasit Tahan Air dengan PU 3000\r\nFrame : Fiber\r\nPasak : metal\r\nUkuran : P2 x L2 x T1.4m\r\nVentilasi : Pada Atap\r\n'),
(26, 1, 'Tenda Dome 8-10 Orang', '9664a0f162db5abd6d7ee05ab96ddb43.png', 50000, 20, 'Tenda ini memiliki sistem Double Layer sehingga bisa tahan terhadap hujan deras dan juga tidak terjadi kondensi (pengembunan). Bisa diri di dalam tenda. dan terdapat Teras. Flysheet 180T1500mm waterproof. Inner polyster breathable. Alas terpal PE waterproof. Frame : Fiiber. Pasak : Metal.'),
(27, 1, 'Tenda Prisma 3x4 m', 'c25b46461a655da2aa21f2e9d273616b.jpg', 12500, 20, 'Biasa digunakan untuk kegiata di outdoor seperti camping dan sebagainya awet tahan lama anti air karena mengunakan bahan yang bagus dan berkualitas.\r\n\r\n\r\n\r\n\r\nSpesifikasi:\r\nUK.Standar 3x4Mtr, Kap.8-10 orang,\r\nTenda, Cover, 2 Tiang Besi Sambung, 12 pasak\r\nAlas tenda terpal kw 1, di jahit jadi satu sama tendanya \r\nBahan Parasut Waterproof\r\n'),
(28, 1, 'Tenda Keranda (Tenda Rofi)', '870cb3c0209ad0fbf287763cdf2ab19c.jpg', 100000, 20, 'TENDA ROFI, atau TENDA GERBONG, adalah tenda yang berbentuk setengah lingkaran yang memanjang ke belakang, merupakan tenda keluarga dengan kapasitas besar, cocok untuk kemping.\r\n\r\nKapasitas 17 orang. Bahan : Parasit Ribstop Waterproof. Kabin : 2 ruangan. Warna : Putih Keabu-abuan. Bentuk : Tunnel. Berat: 35kg.'),
(29, 1, 'Tenda Pleton', 'f7f08e075b737580629160748e4aac05.jpg', 20000, 20, 'Tenda peleton biasa digunakan untuk posko bantuan bencana, TNI, Polri, Evakuasi bencana, kegiatan sekolah, kegiatan pramuka, kemah ataupun sesuai keinginan Anda. Dimensi Panjang 14 meter, Lebar 6 meter, tinggi 3 meter. Kapasitas menggunakan velbed 40 orang. Kapasitas tidak menggunakan velbed 40-60 orang. Dilengkapi  4 pcs Tiang utama dengan panjang 3 meter dengan system knock down. 3 pcs tiang utama dengan system knockdown 3 meter dengan system knockdown. 28 pcs tiang samping panjang 1.5 meter. 36 pcs pasak besi.'),
(30, 1, 'Terpal Plastik', '2af7ed4ee666612bced15a0eed6f4710.jpg', 6000, 20, 'Terpal Plastik banyak digunakan untuk memberikan perlindungan suatu benda dari pengaruh cuaca buruk. Terpal memiliki ketahanan terhadap air sehingga banyak digunakan untuk pendaki. Ukuran 3x4 m. Bahan plastik pvdf yang anti air dan tahan panas.'),
(31, 1, 'Matras Alas Tidur', '176422c0c4e870f048cfdd6242db8131.jpg', 1500, 20, 'Cocok dipakai untuk fasilitas di dalam ruangan olahraga (senam, Yoga, Pilates, Body Balance, RBT, gym). Bisa juga digunakan di Luar ruangan/Outdoor. Panjang 173 Cm X Lebar 61 Cm X 7mm. Bahan Anti Slip , Tidak Licin. Bahan PVC.'),
(32, 1, 'Ponco (Jas Hujan)', 'e0671181cb1e78a3505c8802885998dc.png', 3500, 20, 'Jas hujan untuk dewasa dengan model ponco. Terbuat dari bahan PVC sehingga kedap air dan tidak panas ketika digunakan. Berat 300 gram. Warna tergantung persediaan.'),
(33, 1, 'Sleeping Bag', 'ef074a89c20fa56d497d95b509b0dd2a.jpg', 7500, 20, 'One Size. 100% Polyester with fill 100% Cotton.'),
(34, 1, 'Kompor Lapangan (Parafin)', 'b151d0b29aaf6afbe536321caedfce35.jpg', 1500, 20, 'Kompor lipatnya sangat praktis, Tidak makan tempat, Kuat sampai menahan 2 kg, Parafin cukup menyala sampai sekitar 5 menit, cukup untuk memasak air, mi atau nasi dalam jumlah terbatas. Disediakan juga korek api. Ukuran: 20 cm.'),
(35, 1, 'Kompor Gas (Kompor Portable)', 'af5aeb3f3d28fbbd71edc6a91f9ddf30.jpg', 10000, 20, 'PORGAS PORTABLE ini sangat aman dan mudah untuk dibawa traveling bersama keluarga karna dilengkapi dengan tas koper. Bahan : stenlisteel dan besi dan plastik \r\n'),
(36, 1, 'Nesting (Panci Susun)', 'b80e3e15b10b5a34cfe8e6f64895581c.jpg', 7500, 20, 'Merupakan pilihan tepat untuk keperluan kemping, piknik, maupun keperluan dapur rumah tangga. Berbagai macam wajan dan kelengkapannya dalam satu kemasan.'),
(37, 2, 'Cover Bag (Rain Cover)', '26c00eac060089d1e2fd769ec822fba6.jpg', 2500, 20, ''),
(41, 2, 'Carrier Bag 60-70 Liter', '70bfa1e3e179a88dbc506cd3723d08df.jpg', 7500, 17, 'Tipe Barang: Backpacks.  Tipe Tutup:\r\nResleting. Item Width: 11.8 inch. Item Height: 29.5 inch. Tipe Pola:\r\nSolid. Berat Barang: 1.85 kg. Volume:\r\n70 Liter.'),
(42, 2, 'Carrier Bag 70-80 Liter', 'd4b5c90f9c7540d6b5bc52b381773c84.jpg', 10000, 20, 'Feature: Top Loaded with 2 back pocket with Rain Cover accessed. Front Pocket with zipper. 2 Side Pocket. Ice Axe Strap. 4 Side Straps Adjuster.'),
(43, 2, 'Daypack (Backpack)', '759e342c0fb8e8ec21e9e20e2a1ed721.jpg', 5000, 20, 'Warna hitam.\r\n'),
(44, 2, 'Carrier Bag 80-100 Liter', '5769ff29ddc89fef6e14059cc88683bd.jpg', 10000, 20, 'Kapasitas 80 L. Bahan cordura, p180, nylon webbing. Double frame alumunium. Raincover.'),
(46, 2, 'Gaiter (Pelindung Kaki)', '058c56af5ce154160576861998c65f22.jpg', 5000, 20, 'Dibangun untuk bertahan suhu yang keras, medan kasar dan digunakan dengan crampon, sepatu salju dan ski. Berukuran cocok lebih sepatu Umum Issue tempur, cahaya sepatu hiking, plastik atau sepatu gunung kulit.'),
(47, 2, 'Jaket Tebal (Jaket Gunung)', '1851daafb134e5e4e0593bc70b382d7c.jpg', 7500, 20, 'Spesifikasi: Water resist, Windproof, Breathable, Fixed hood, Zipper pockets, Internal pockets.'),
(48, 2, 'Kompas Penunjuk Arah', '673df1856644f040ae1e47cc862089c9.gif', 2500, 20, ' '),
(49, 2, 'Teropong (Binoculars)', '23b23dfc278322d19c96043049338498.jpg', 15000, 20, 'Fully Multicoated Eco-Glass Lenses provide a high light transmittance across the entire visible light spectrum.'),
(50, 2, 'GPS', 'fbbceb95fb41907387d2dc65fc004df8.jpg', 75000, 20, ' 1.	waypoint : 500 dengan simbol\r\n2. Track : 10.000 titik\r\n3. Format posisi : Lat/long, UTM, TM3\r\n4. Map datum : 100 pilihan\r\n5. Chanel : 12 chanel\r\n6. Ketelitian dbawah 15 meter\r\n7. Antena : internal dan bisa ditambah external\r\n8. Water proof\r\n9. Batere : 2 x AA tahan sampai 28 jam\r\n'),
(51, 2, 'Stik Pendakian (Trekking Pole)', 'dc98a14cfa4319fd504af2273b57abb3.jpg', 10000, 20, 'Serbaguna 2-bagian batang ekstensi untuk genggam, boom dan berdiri cahaya, dengan standar 1/4 "dan 3/8" ulir sekrup Anda dapat dengan mudah melampirkan flash, Kamera point & shoot atau dv untuk pencahayaan kreatif dan tembakan. Dengan memegang batang ekstensi dengan putar dual head Super penjepit.'),
(52, 2, 'Sepatu Tracking', 'a3cf0c171e6bfd6bf8d2d881e5d22704.jpg', 35000, 20, '100% Rubber, Upper Material : 90% PU + 10% Mesh.'),
(53, 2, 'Sandal Gunung', '09c2340a6db353693d6ca0c23070c987.jpg', 10000, 20, 'Warna hitam\r\n'),
(54, 2, 'Parang-Tebas', 'c55dbf07dcf208bf9d99a7ec310b8ede.jpg', 10000, 20, ' Benda tajam.'),
(55, 3, 'Megaphone TOA (dengan Battery)', '5b5e82dc1e7d068d71072611b4141230.jpg', 15000, 20, 'TOA Megaphone ZR-2230W (30 watt). R20P (D) × 10 (15 V DC). External Power: 12 V DC Battery.\r\n'),
(56, 3, 'Handy Talky (HT) Analog', '8c1bd52069f9dd20c432cc506e378551.jpg', 15000, 20, 'DMR Walkie Talkie DM-880 3000 mAh. Warna Hitam.'),
(57, 3, 'Handy Talky (HT) Digital', '4a58bfa71eafeead60ef1bfb24a9b966.jpg', 20000, 20, 'HT HYT TC-580 1650mAh Li-Ion Battery Warna Hitam.\r\n'),
(58, 3, 'Power Booster (Docking)', '426140134bf3fe4e6204eeeee294ae92.jpg', 20000, 20, 'Eco Power Booster Warna	Hitam-kuning Kegunaan: Penghemat bahan bakar.\r\n'),
(59, 3, 'Walkie Talkie (WT)', 'c909bd60a4cecfcced1071ab09f7dfa8.jpg', 10000, 20, 'Uniden GMR1635-2. Uses 3 AAA Batteries. Warna Hitam.\r\n'),
(60, 3, 'Microphone', 'c55af7399c9ce85378f3b590149a0ce5.jpg', 10000, 20, 'Warna Hitam.\r\n'),
(61, 3, 'Microphone Headset', '32947ce3d266e6fa03d65cab84dd91b6.jpg', 25000, 20, 'Warna Hitam. Kegunaan: Alat pengeras suara.\r\n'),
(62, 3, 'LCD Proyektor + Screen (Layar)', 'afc0a1f99067c19c6b12a3e5b8860a80.jpg', 300000, 20, 'Widescreen-lcd-projector-16009-5791473. Warna Hitam. Kegunaan	Menampilkan tulisan/gambar dengan pantulan cahaya.'),
(63, 4, 'Lampu Badai (Lentera) Kecil', 'a6a90d5e693e3c0a883713f0dbef04e2.jpg', 2000, 20, 'Warna Biru. Kegunaan Penerangan.\r\n'),
(64, 4, 'Lampu Badai (Lentera) Besar', '6a008081b74b7098ab3539b1d2fda2a0.jpg', 5000, 20, 'Warna Hitam. Kegunaan Penerangan.'),
(65, 4, 'Lampu Senter', 'd1f50edec5a8e9941c362071762721cc.jpg', 2500, 18, 'Tahan 5 jam. Warna Kuning. Kegunaan: cahaya penerang.\r\n\r\n'),
(66, 4, 'Lampu Neon 20W', 'f5160a3db581170d5d6c5da1bdf16134.jpg', 5000, 20, 'Warna. Putih Kegunaan: Cahaya penerang.'),
(67, 4, 'Lampu Neon 40W', '1e1dc9348d0852052eab9c0975c89288.jpg', 7500, 20, 'PHILIPS 6x Incandescent Classictone Superlux Lamp 40W E27. Warna Putih.'),
(68, 4, 'Lampu LED', '3ad7c5f9242a1634300708c9f4332903.jpg', 5000, 20, 'PHILIPS LED 2. Warna Putih.\r\n'),
(70, 4, 'Head Lamp', 'e383552bac7b899d78dcbf72f091e23c.jpg', 5000, 20, 'Streamlight 61052 Septor LED Headlamp. Warna Merah.'),
(71, 4, 'Lampu Sorot', '0c0f4e7e1d205ac6e49d3c7fab5dea14.jpg', 15000, 20, 'Lampu Sorot LED AR 703T ARTALUX Warna Hitam.'),
(73, 4, 'Lampu Emergency', '6c6ecf219f7a39bd4c81464ff615e71d.jpg', 10000, 18, 'Lampu emergency Visalux VS-737L. Warna: putih merah.'),
(74, 4, 'Genset 2200 W 4T', '3af38dc00630961bb1941e481470a607.jpg', 200000, 19, 'Warna: Biru-hitam. Kegunaan: Pemutar generator dan alat pembangkit listrik.'),
(75, 2, 'Kantong-Tidur', '49f543e1ff1898f8a204e7a2dc18316a.jpg', 20000, 20, 'Warna Biru'),
(76, 2, 'Kantong-Tidur', '92fd1df659d11f7774d5a61d59b0182a.jpg', 20000, 20, 'Warna biru'),
(77, 1, 'jaket-t1', 'd60c3b91a23feb144175e9720fc3ef27.png', 80000, 3, ' asdfghjk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_list`
--
ALTER TABLE `booking_list`
  ADD KEY `FK_booking_list_product_id_product` (`product_id_product`),
  ADD KEY `FK_booking_list_order_id_bookinglist` (`order_id_bookinglist`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_bookinglist`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`),
  ADD KEY `FK_payment_order_id_bookinglist` (`order_id_bookinglist`),
  ADD KEY `FK_payment_member_id_member` (`id_member`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `FK_product_kategori_id_kategori` (`id_kategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id_bookinglist` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=78;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `booking_list`
--
ALTER TABLE `booking_list`
  ADD CONSTRAINT `FK_booking_list_order_id_bookinglist` FOREIGN KEY (`order_id_bookinglist`) REFERENCES `order` (`id_bookinglist`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_booking_list_product_id_product` FOREIGN KEY (`product_id_product`) REFERENCES `product` (`id_product`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `FK_payment_member_id_member` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_payment_order_id_bookinglist` FOREIGN KEY (`order_id_bookinglist`) REFERENCES `order` (`id_bookinglist`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_product_kategori_id_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
