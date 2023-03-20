-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2021 at 06:38 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `No` int(11) NOT NULL,
  `Chat_id` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `Chat_ms` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `Chat_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Chat_ip` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `Type` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`No`, `Chat_id`, `Chat_ms`, `Chat_time`, `Chat_ip`, `Type`) VALUES
(1, 'admin', 'เฮ้', '2021-05-29 04:20:55', '172.15.57.100', ''),
(2, 'lps', '<a data-fancybox="gallery" data-caption="" href="Chat/1.png"><img class="rounded mx-auto d-block" style="width: 100%; height: 100%;" src="Chat/1.png"></a>', '2021-05-29 04:32:33', '172.15.57.100', 'img'),
(3, 'dispatch', '<div class="chat-content"style="margin-top: 5px;margin-bottom: 5px;background: #ff8470;padding-top: 5px;padding-left: 5px;padding-right: 5px;padding-bottom: 5px;"><div class="chat chat-left" style="text-align:left; "><div class="chat-avatar"> <a class="avatar avatar-online"> <img src="img/lps1234.png" alt="..."><i></i></a></div><div style="text-align:left;margin-left: 50px"><span class="badge rounded-pill bg-primary"><i class="fas fa-user"></i>lps / 172.15.57.100<a style="text-align:left;" class="chat-time" datetime="2021-05-29 11:32:33">2021-05-29 11:32:33</a></span></div><div class="chat-body" > <div class="chat-content hard_break" ><p class="hard_break" style=""><a data-fancybox="gallery" data-caption="" href="Chat/1.png"><img class="rounded mx-auto d-block" style="width: 100%; height: 100%;" src="Chat/1.png"></a></p></div></div></div></div><hr>ไงพวก', '2021-05-29 04:33:22', '172.15.57.100', 'img'),
(4, 'edp', '<sapn class="badge bg-success"><i class="fas fa-times-circle"></i> นำออกแล้ว เวลา :  2021-05-29 11:35:23</sapn>', '2021-05-29 04:35:05', '172.15.57.100', 'img');

-- --------------------------------------------------------

--
-- Table structure for table `gate_user`
--

CREATE TABLE `gate_user` (
  `Number_ID` int(11) NOT NULL,
  `USER_ID` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `USER_PW` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `USER_NAME` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gate_user`
--

INSERT INTO `gate_user` (`Number_ID`, `USER_ID`, `USER_PW`, `USER_NAME`) VALUES
(1, 'dhl1234', 'dhl', 'dhl'),
(2, 'dispatch1234', 'dispatch', 'dispatch'),
(3, 'edp1234', 'edp', 'edp'),
(4, 'admin1234', 'admin', 'admin'),
(5, 'asset1234', 'asset', 'asset'),
(6, 'lps1234', 'lps', 'lps'),
(7, 'bjl1234', 'bjl', 'bjl');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `gate_user`
--
ALTER TABLE `gate_user`
  ADD PRIMARY KEY (`Number_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `gate_user`
--
ALTER TABLE `gate_user`
  MODIFY `Number_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
