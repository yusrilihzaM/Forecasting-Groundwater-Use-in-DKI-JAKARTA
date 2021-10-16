-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2021 at 09:40 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dataair`
--

-- --------------------------------------------------------

--
-- Table structure for table `alpha`
--

CREATE TABLE `alpha` (
  `id_alpha` int(10) DEFAULT NULL,
  `alpha` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alpha`
--

INSERT INTO `alpha` (`id_alpha`, `alpha`) VALUES
(1, '0.90');

-- --------------------------------------------------------

--
-- Table structure for table `coba1`
--

CREATE TABLE `coba1` (
  `coba` decimal(20,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coba1`
--

INSERT INTO `coba1` (`coba`) VALUES
('1264.50'),
('12.50'),
('1419.75'),
('1109.25'),
('-155.25');

-- --------------------------------------------------------

--
-- Table structure for table `data_air`
--

CREATE TABLE `data_air` (
  `id_data_air` int(10) NOT NULL,
  `id_kecamatan` int(10) DEFAULT NULL,
  `bulan` int(5) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `jumlah_air` double(20,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_air`
--

INSERT INTO `data_air` (`id_data_air`, `id_kecamatan`, `bulan`, `tahun`, `jumlah_air`) VALUES
(74, 1, 1, 2021, 1575.000),
(85, 1, 2, 2021, 954.000),
(86, 1, 3, 2021, 560.000),
(87, 1, 4, 2021, 704.000),
(88, 1, 5, 2021, 2409.000),
(89, 1, 6, 2021, 466.000),
(90, 1, 7, 2021, 466.000),
(91, 1, 8, 2021, 466.000),
(92, 1, 9, 2021, 1041.000),
(93, 1, 10, 2021, 924.000),
(94, 1, 11, 2021, 931.000),
(95, 1, 12, 2021, 1392.000),
(96, 2, 1, 2021, 13730.000);

--
-- Triggers `data_air`
--
DELIMITER $$
CREATE TRIGGER `ai_data_air` AFTER INSERT ON `data_air` FOR EACH ROW BEGIN
#variabel 
DECLARE hitungpertama float(10);
DECLARE alp decimal(2,2);
#variabel penampung
DECLARE yaksen decimal(20,2);
DECLARE yaksensen decimal(20,2);
DECLARE a decimal(20,2);
DECLARE b decimal(20,2);
DECLARE hasil_forecast decimal(20,2);
DECLARE at_ft decimal(20,2);
DECLARE abs_at_ft_bagiat decimal(20,2);
DECLARE yaksen_before decimal(20,2);
DECLARE yaksensen_before decimal(20,2);

SELECT alpha into alp from alpha;
SELECT COUNT(id_hitung) into hitungpertama FROM hitung NATURAL JOIN data_air NATURAL JOIN m_kecamatan WHERE id_kecamatan=new.id_kecamatan;
IF hitungpertama=0 THEN
INSERT INTO hitung VALUES(null,new.id_data_air,new.jumlah_air,new.jumlah_air,new.jumlah_air,null,null,null,null);

ELSE 
SELECT y_aksen into yaksen_before FROM data_air NATURAL JOIN hitung WHERE id_kecamatan=new.id_kecamatan GROUP BY id_data_air DESC LIMIT 1;
SELECT y_dbl_aksen into yaksensen_before FROM data_air NATURAL JOIN hitung WHERE id_kecamatan=new.id_kecamatan GROUP BY id_data_air DESC LIMIT 1;
#menghitung y aksen
set yaksen=alp*new.jumlah_air+(1-alp)*yaksen_before;
set yaksensen=alp*yaksen+(1-alp)*yaksensen_before;
set a=2*yaksen-yaksensen;
set b=alp/(1-alp)*(yaksen-yaksensen);
set hasil_forecast=a+b;
set at_ft=new.jumlah_air-hasil_forecast;
set abs_at_ft_bagiat=ABS(at_ft/new.jumlah_air);
INSERT into hitung VALUES(null,new.id_data_air,yaksen,yaksensen,a,b,hasil_forecast,at_ft,abs_at_ft_bagiat);
end if;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `hitung`
--

CREATE TABLE `hitung` (
  `id_hitung` int(10) NOT NULL,
  `id_data_air` int(10) DEFAULT NULL,
  `y_aksen` double(50,7) DEFAULT NULL,
  `y_dbl_aksen` double(50,7) DEFAULT NULL,
  `a` double(50,7) DEFAULT NULL,
  `b` double(50,7) DEFAULT NULL,
  `hasil_forecast` double(50,7) DEFAULT NULL,
  `at_ft` double(50,7) DEFAULT NULL,
  `abs_at_ft_bagiat` double(50,7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hitung`
--

INSERT INTO `hitung` (`id_hitung`, `id_data_air`, `y_aksen`, `y_dbl_aksen`, `a`, `b`, `hasil_forecast`, `at_ft`, `abs_at_ft_bagiat`) VALUES
(178, 74, 1575.0000000, 1575.0000000, 1575.0000000, 0.0000000, 0.0000000, 0.0000000, 0.0000000),
(179, 85, 1016.1000000, 1071.9900000, 960.2100000, -503.0100000, 457.2000000, 496.8000000, 0.5207547),
(180, 86, 605.6100000, 652.2480000, 558.9720000, -419.7420000, 139.2300000, 420.7700000, 0.7513750),
(181, 87, 694.1610000, 689.9697000, 698.3523000, 37.7217000, 736.0740000, -32.0740000, 0.0455597),
(182, 88, 2237.5161000, 2082.7614600, 2392.2707400, 1392.7917600, 3785.0625000, -1376.0625000, 0.5712173),
(183, 89, 643.1516100, 787.1125950, 499.1906250, -1295.6488650, -796.4582400, 1262.4582400, 2.7091379),
(184, 90, 483.7151610, 514.0549044, 453.3754176, -273.0576906, 180.3177270, 285.6822730, 0.6130521),
(185, 91, 467.7715161, 472.3998549, 463.1431773, -41.6550495, 421.4881278, 44.5118722, 0.0955190),
(186, 92, 983.6771516, 932.5494219, 1034.8048813, 460.1495670, 1494.9544483, -453.9544483, 0.4360754),
(187, 93, 929.9677152, 930.2258858, 929.7095445, -2.3235361, 927.3860084, -3.3860084, 0.0036645),
(188, 94, 930.8967715, 930.8296829, 930.9638601, 0.6037971, 931.5676572, -0.5676572, 0.0006097),
(189, 95, 1345.8896772, 1304.3836777, 1387.3956766, 373.5539948, 1760.9496714, -368.9496714, 0.2650501),
(190, 96, 13730.0000000, 13730.0000000, 13730.0000000, 0.0000000, 0.0000000, 0.0000000, 0.0000000);

-- --------------------------------------------------------

--
-- Table structure for table `m_kecamatan`
--

CREATE TABLE `m_kecamatan` (
  `id_kecamatan` int(10) NOT NULL,
  `kecamatan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_kecamatan`
--

INSERT INTO `m_kecamatan` (`id_kecamatan`, `kecamatan`) VALUES
(1, 'Cempaka Putih'),
(2, 'Cengkareng'),
(3, 'Cilandak'),
(4, 'Cilincing'),
(5, 'Cipayung'),
(6, 'Ciracas'),
(7, 'Duren sawit'),
(8, 'Gambir'),
(9, 'Grogol Petamburan'),
(10, 'Jagakarsa'),
(11, 'Jatinegara'),
(12, 'Johar Baru'),
(13, 'Kalideres\r\n'),
(14, 'Keb Baru'),
(15, 'Keb Lama'),
(16, 'Kebon Jeruk'),
(17, 'Kelapa gading'),
(18, 'Kemayoran'),
(19, 'Kembangan'),
(20, 'Kep. Seribu'),
(21, 'Koja'),
(22, 'Kramat Jati'),
(23, 'Makasar'),
(24, 'Mampang Prapatan'),
(25, 'Matraman'),
(26, 'Menteng'),
(27, 'Pademangan'),
(28, 'Palmerah'),
(29, 'Pancoran'),
(30, 'Pasar Minggu'),
(31, 'Pasar Rebo'),
(32, 'Penjaringan'),
(33, 'Pesanggrahan'),
(34, 'Pulo Gadung'),
(35, 'Sawah Besar'),
(36, 'Senen'),
(37, 'Setiabudi'),
(38, 'Taman Sari'),
(39, 'Tambora'),
(40, 'Tanah Abang'),
(41, 'Tanjung Priok'),
(42, 'Tebet');

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE `m_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_user`
--

INSERT INTO `m_user` (`id_user`, `username`, `password`) VALUES
(5, '123', '$2y$10$FWbHzMNAiX27aLeRs.nxNOm3YBrk9wC/LwCH9KdwzVEACu0Pb88k2'),
(6, '170441100056', '$2y$10$AMDB3BCNdWeOVCdz4Azie.h1UANhPlWv6v6HjYSrBPDnM9Zyqp4s.'),
(7, 'aa', '$2y$10$z7UeXdsKbHJDbBet7h.te.aZt0CcVMjBVE6LsakplTsrMFVawq4QW'),
(8, 'sss', '$2y$10$7jZS8lUse0GVEwUFbRpfOuCIHWpikqChbYJf.E50QYO/UcyzbYMni'),
(9, 'admin', '$2y$10$FuSSzmFU6BcH74c8LP8iweFMZC5LycLw0h/0CMoSEB09OeLhHGwUS');

-- --------------------------------------------------------

--
-- Table structure for table `ramal_masadepan`
--

CREATE TABLE `ramal_masadepan` (
  `id_ramal_masadepan` int(10) NOT NULL,
  `id_kecamatan` int(10) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `bulan` int(10) DEFAULT NULL,
  `jumlah_air` double(20,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ramal_masadepan`
--

INSERT INTO `ramal_masadepan` (`id_ramal_masadepan`, `id_kecamatan`, `tahun`, `bulan`, `jumlah_air`) VALUES
(24, 1, 2022, 1, 1423.000),
(25, 1, 2022, 2, 1561.000),
(26, 1, 2022, 3, 1699.000),
(27, 1, 2022, 4, 1837.000),
(28, 1, 2022, 5, 1975.000);

-- --------------------------------------------------------

--
-- Table structure for table `tolak_ukur`
--

CREATE TABLE `tolak_ukur` (
  `id_tolak_ukur` int(10) NOT NULL,
  `id_data_air` int(10) DEFAULT NULL,
  `MAPE` double(20,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_air`
--
ALTER TABLE `data_air`
  ADD PRIMARY KEY (`id_data_air`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indexes for table `hitung`
--
ALTER TABLE `hitung`
  ADD PRIMARY KEY (`id_hitung`),
  ADD KEY `id_data_air` (`id_data_air`);

--
-- Indexes for table `m_kecamatan`
--
ALTER TABLE `m_kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `ramal_masadepan`
--
ALTER TABLE `ramal_masadepan`
  ADD PRIMARY KEY (`id_ramal_masadepan`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indexes for table `tolak_ukur`
--
ALTER TABLE `tolak_ukur`
  ADD PRIMARY KEY (`id_tolak_ukur`),
  ADD KEY `tolak_ukur_ibfk_1` (`id_data_air`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_air`
--
ALTER TABLE `data_air`
  MODIFY `id_data_air` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `hitung`
--
ALTER TABLE `hitung`
  MODIFY `id_hitung` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `m_kecamatan`
--
ALTER TABLE `m_kecamatan`
  MODIFY `id_kecamatan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ramal_masadepan`
--
ALTER TABLE `ramal_masadepan`
  MODIFY `id_ramal_masadepan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tolak_ukur`
--
ALTER TABLE `tolak_ukur`
  MODIFY `id_tolak_ukur` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_air`
--
ALTER TABLE `data_air`
  ADD CONSTRAINT `data_air_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `m_kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hitung`
--
ALTER TABLE `hitung`
  ADD CONSTRAINT `hitung_ibfk_1` FOREIGN KEY (`id_data_air`) REFERENCES `data_air` (`id_data_air`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ramal_masadepan`
--
ALTER TABLE `ramal_masadepan`
  ADD CONSTRAINT `ramal_masadepan_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `m_kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tolak_ukur`
--
ALTER TABLE `tolak_ukur`
  ADD CONSTRAINT `tolak_ukur_ibfk_1` FOREIGN KEY (`id_data_air`) REFERENCES `data_air` (`id_data_air`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
