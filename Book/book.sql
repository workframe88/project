-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2020 at 07:11 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(4) NOT NULL,
  `name_admin` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name_admin`, `username`, `password`) VALUES
(1, 'ทัตธน ชาวติการ', 'admin', '1234'),
(2, 'อทิตยา บุญก่อ', 'ice', '1234'),
(3, 'กฤติกา แลกันทะ', 'may', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(4) NOT NULL,
  `name_book` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price_book` int(5) NOT NULL,
  `rent_book` int(5) NOT NULL,
  `stok` int(3) NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `name_book`, `type`, `price_book`, `rent_book`, `stok`, `image`) VALUES
(1, 'ครอบครัว ตึ๋งหนืด', '2', 400, 20, 70, 'https://inwfile.com/s-ff/upq5ha.jpg'),
(2, 'โดเรม่อน', '2', 400, 100, 25, 'https://images-se-ed.com/ws/Storage/Originals/978616/042/9786160424153L.jpg?h=7a3870da4b3a9d852909af4f875bf7a7'),
(3, 'เบ็นเท็น เจ้าหนูจอมพลัง', '2', 120, 60, 40, 'https://images-se-ed.com/ws/Storage/Originals/978974/765/9789747656565L.gif?h=1072507ed4fcb0fa4db509d9b374e69a'),
(4, 'Life is a Journey ชีวิตคือการเดินทาง', '3', 480, 160, 30, 'https://images-se-ed.com/ws/Storage/Originals/978616/716/9786167162126L.jpg?h=af4df5d82e8921ffcc3c7535264a3d8b'),
(5, 'ประวัติศาสตร์ไทย', '4', 320, 120, 48, 'https://images-se-ed.com/ws/Storage/Originals/978616/301/9786163014757L.jpg?h=511e0d8734908cf3719c3c8d20fa4dcb');

-- --------------------------------------------------------

--
-- Table structure for table `rent_book`
--

CREATE TABLE `rent_book` (
  `id` int(4) NOT NULL,
  `name_book` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `toltal` int(2) NOT NULL,
  `date` date NOT NULL,
  `date7` date NOT NULL,
  `name_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `id_book` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(4) NOT NULL,
  `name_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name_type`) VALUES
(1, '-- ทั้งหมด --'),
(2, 'การ์ตูน'),
(3, 'การเดินทาง'),
(4, 'ประวัติศาสตร์');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(4) NOT NULL,
  `name_user` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name_user`, `username`, `password`, `email`, `level`) VALUES
(1, 'root', 'root', '1234', 'root', 1),
(2, 'Kowit Tnapruttiwong', 'frame', '1234', 'oloeframe@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rent_book`
--
ALTER TABLE `rent_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rent_book`
--
ALTER TABLE `rent_book`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
