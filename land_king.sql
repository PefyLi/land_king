-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-04-20 19:03:57
-- 伺服器版本: 10.1.16-MariaDB
-- PHP 版本： 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `land_king`
--

-- --------------------------------------------------------

--
-- 資料表結構 `actual_land`
--

CREATE TABLE `actual_land` (
  `actual_land_ID` int(11) NOT NULL,
  `member_ID` int(11) NOT NULL,
  `title` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `duan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `land_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ping` int(11) NOT NULL,
  `picture` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `land_info` text COLLATE utf8_unicode_ci NOT NULL,
  `sale_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `actual_land`
--

INSERT INTO `actual_land` (`actual_land_ID`, `member_ID`, `title`, `district`, `duan`, `land_no`, `ping`, `picture`, `land_info`, `sale_price`) VALUES
(9, 1, '123', '中壢區', '五權段', '00-15-89', 300, 'images/678.jpg', '	111							            ', 1000),
(17, 3, '三民精華地段', '中壢區', '三民段', 'E895-443', 250, 'images/land01.jpg', '1500						            ', 1500),
(18, 3, '蘆竹大草地', '蘆竹區', '大牛稠段大牛稠小段', 'N84-6325', 600, 'images/89.jpg', '地段遼闊', 1000);

-- --------------------------------------------------------

--
-- 資料表結構 `official_land`
--

CREATE TABLE `official_land` (
  `official_land_ID` int(11) NOT NULL,
  `district` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `duan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `year` year(4) DEFAULT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `official_land`
--

INSERT INTO `official_land` (`official_land_ID`, `district`, `duan`, `year`, `price`) VALUES
(1, 'Daxi', '400', 2010, 1954),
(2, 'Daxi', '401', 2010, 4649),
(3, 'Daxi', '402', 2010, 3232),
(4, 'Daxi', '400', 2013, 3570),
(5, 'Daxi', '400', 2015, 4100),
(6, 'Daxi', '400', 2017, 6461),
(7, 'Zhongli', '200', 2010, 88613),
(8, 'Zhongli', '201', 2010, 120599),
(9, 'Zhongli', '202', 2010, 36954),
(10, 'Yangmei', '600', 2010, 11099),
(11, 'Yangmei', '601', 2010, 24901),
(12, 'Yangmei', '602', 2010, 8567),
(13, 'Luzhu', '28', 2010, 6983),
(14, 'Luzhu', '29', 2010, 13089),
(15, 'Luzhu', '30', 2010, 7448),
(16, 'Dayuan', '52', 2010, 2699),
(17, 'Dayuan', '53', 2010, 28211),
(18, 'Dayuan', '54', 2010, 3390),
(19, 'Zhongli', '200', 2013, 102789),
(20, 'Zhongli', '200', 2015, 119081),
(21, 'Zhongli', '200', 2017, 126392),
(22, 'Yangmei', '600', 2013, 12887),
(23, 'Yangmei', '600', 2015, 16104),
(24, 'Yangmei', '600', 2017, 17377),
(25, 'Luzhu', '28', 2013, 4322),
(26, 'Dayuan', '52', 2013, 3298),
(27, 'Dayuan', '52', 2017, 4547);

-- --------------------------------------------------------

--
-- 資料表結構 `pointer`
--

CREATE TABLE `pointer` (
  `id` int(11) NOT NULL,
  `district` varchar(100) NOT NULL,
  `school_num` int(11) NOT NULL,
  `hospital_num` int(11) NOT NULL,
  `air_station` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `pointer`
--

INSERT INTO `pointer` (`id`, `district`, `school_num`, `hospital_num`, `air_station`) VALUES
(1, 'Zhongli', 32, 11, 1),
(2, 'Pingzhen', 21, 5, 1),
(3, 'Longtan', 15, 2, 1),
(4, 'Yangmei', 18, 2, 0),
(5, 'Xinwu', 13, 1, 0),
(6, 'Guanyin', 11, 0, 1),
(7, 'Taoyuan', 28, 9, 1),
(8, 'Guishan', 20, 3, 0),
(9, 'Bade', 12, 0, 0),
(10, 'Daxi', 16, 0, 0),
(11, 'Fuxing', 13, 0, 0),
(12, 'Dayuan', 12, 2, 1),
(13, 'Luzhu', 15, 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `member_ID` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hash` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `introduction` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `users`
--

INSERT INTO `users` (`member_ID`, `first_name`, `last_name`, `email`, `password`, `hash`, `active`, `introduction`) VALUES
(2, 'Li', 'harry', '106423041@gmail.com', '$2y$10$xwVAYRh38.lIZDaU5b/CfOO0ucduCrUANFCnFwFR0s6DoEK6Ma.C.', '192fc044e74dffea144f9ac5dc9f3395', 0, ''),
(3, '李', '培華', 'pefy19950714@gmail.com', '$2y$10$Va8W.m8ggTjjQIjAwSoPWeoUO91AWu5bdkKJ.QiqN6SJFVZPlJXi2', 'e4bb4c5173c2ce17fd8fcd40041c068f', 1, ''),
(4, 'fff', 'fff', 'fff@fff', '$2y$10$7OzzYIl4JtmqwdyCL4WruOfbSex6WtQRfNwcHYGQXANg0QR2bAjCi', '3328bdf9a4b9504b9398284244fe97c2', 0, '');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `actual_land`
--
ALTER TABLE `actual_land`
  ADD PRIMARY KEY (`actual_land_ID`);

--
-- 資料表索引 `official_land`
--
ALTER TABLE `official_land`
  ADD PRIMARY KEY (`official_land_ID`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`member_ID`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `actual_land`
--
ALTER TABLE `actual_land`
  MODIFY `actual_land_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- 使用資料表 AUTO_INCREMENT `official_land`
--
ALTER TABLE `official_land`
  MODIFY `official_land_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- 使用資料表 AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `member_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
