-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2024 at 01:55 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moghtrabene`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `c_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `comment_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `places_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`c_id`, `comment`, `status`, `comment_date`, `user_id`, `places_id`) VALUES
(19, 'i neeed help', 1, '2024-05-16', 11, NULL),
(20, 's', 1, '2024-06-24', 12, NULL),
(21, 'asdsadsadsad', 1, '2024-06-24', 12, 10),
(28, 'asdasda', 1, '2024-06-24', 12, 25),
(29, 'mohamed', 1, '2024-06-24', 12, 10);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_ID` int(11) NOT NULL,
  `job_name` varchar(255) NOT NULL,
  `job_salary` int(11) NOT NULL,
  `discription` varchar(255) NOT NULL,
  `date_j` date DEFAULT NULL,
  `requests_id` tinyint(4) NOT NULL DEFAULT 0,
  `id_user` int(11) NOT NULL,
  `job_places` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_ID`, `job_name`, `job_salary`, `discription`, `date_j`, `requests_id`, `id_user`, `job_places`) VALUES
(10, 'call center', 0, '', NULL, 1, 11, 8),
(11, 'call center', 0, '', NULL, 1, 11, 8),
(12, 'desiner', 0, '', NULL, 1, 11, 29),
(13, 'Account Manger', 0, '', NULL, 1, 11, 30),
(14, 'Account Manger', 0, '', NULL, 1, 11, 30),
(15, 'desiner', 0, '', NULL, 1, 11, 25),
(16, 'desiner', 0, '', NULL, 1, 19, 11),
(18, 'delevry', 0, '', NULL, 1, 11, 25),
(19, 'delevry', 0, '', '2024-06-24', 1, 11, 8),
(20, 'desiner', 6000, '', '2024-06-24', 1, 11, 25),
(21, 'designer', 6000, '', '2024-06-24', 1, 11, 25),
(22, 'designer', 6000, '', '2024-06-24', 1, 11, 11),
(23, 'designer', 6000, '', '2024-06-24', 1, 11, 33),
(24, 'designer', 6000, '', '2024-06-24', 1, 11, 33),
(25, '#', 6000, '', '2024-06-24', 1, 11, 10),
(26, '', 6000, '', '2024-06-24', 1, 11, 10),
(27, 'account manager', 6000, '', '2024-06-24', 1, 11, 10);

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `p_id` int(11) NOT NULL,
  `nameofplaces` varchar(255) NOT NULL,
  `building` int(11) NOT NULL,
  `apartment` int(11) NOT NULL,
  `bed` tinyint(4) NOT NULL DEFAULT 6,
  `room` tinyint(4) NOT NULL DEFAULT 3,
  `image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL DEFAULT 1500,
  `rate` tinyint(11) NOT NULL DEFAULT 0,
  `P_date` date DEFAULT NULL,
  `visability` tinyint(4) NOT NULL DEFAULT 0,
  `allow_comment` tinyint(4) NOT NULL DEFAULT 0,
  `allow_ads` tinyint(4) NOT NULL DEFAULT 0,
  `broker_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`p_id`, `nameofplaces`, `building`, `apartment`, `bed`, `room`, `image`, `price`, `rate`, `P_date`, `visability`, `allow_comment`, `allow_ads`, `broker_id`) VALUES
(8, 'dokki', 11, 20, 1, 3, '', 200, 5, NULL, 1, 0, 0, 7),
(10, 'nasr', 12121212, 112, 0, 3, 'Real_Estate_Egypt_real estate 22.jpg', 1500, 0, NULL, 2, 0, 0, 18),
(11, 'new cairo', 209, 9, -1, 3, '33 Sherif St. -49df42c9-69fb-461c-a30d-e8136e1ac77d.jpg', 1500, 0, '2024-04-22', 2, 0, 0, 11),
(25, 'helioples', 90, 44, 3, 3, 'dep.jpg', 1500, 0, NULL, 2, 0, 0, 7),
(29, 'tAHRER', 20, 30, 6, 3, '', 300, 0, NULL, 1, 0, 0, 4),
(30, 'manial', 50, 2, 6, 3, '', 400, 0, NULL, 1, 0, 0, 11),
(33, '3een sera', 122, 44, 6, 3, '43741062_cairo.jpg', 1500, 0, NULL, 2, 0, 0, 7),
(74, 'Apartment 1', 1, 101, 2, 1, 'image1.jpg', 2000, 4, '2024-06-01', 1, 1, 1, 11),
(75, 'Apartment 2', 2, 102, 3, 1, 'image2.jpg', 2500, 5, '2024-06-02', 1, 1, 1, 11),
(76, 'Apartment 3', 3, 103, 2, 1, 'image3.jpg', 1800, 3, '2024-06-03', 1, 1, 1, 11),
(77, 'Apartment 4', 4, 104, 4, 2, 'image4.jpg', 3000, 5, '2024-06-04', 1, 1, 1, 11),
(78, 'Apartment 5', 5, 105, 1, 1, 'image5.jpg', 1500, 2, '2024-06-05', 1, 1, 1, 11),
(79, 'Apartment 6', 6, 106, 2, 2, 'image6.jpg', 2200, 4, '2024-06-06', 1, 1, 1, 11),
(80, 'Apartment 7', 7, 107, 3, 1, 'image7.jpg', 2600, 5, '2024-06-07', 1, 1, 1, 11),
(81, 'Apartment 8', 8, 108, 2, 1, 'image8.jpg', 1900, 3, '2024-06-08', 1, 1, 1, 11),
(82, 'Apartment 9', 9, 109, 4, 2, 'image9.jpg', 3100, 5, '2024-06-09', 1, 1, 1, 11),
(83, 'Apartment 10', 10, 110, 1, 1, 'image10.jpg', 1600, 2, '2024-06-10', 1, 1, 1, 11),
(84, 'Apartment 11', 11, 111, 2, 2, 'image11.jpg', 2300, 4, '2024-06-11', 1, 1, 1, 11),
(85, 'Apartment 12', 12, 112, 3, 1, 'image12.jpg', 2700, 5, '2024-06-12', 1, 1, 1, 11),
(86, 'Apartment 13', 13, 113, 2, 1, 'image13.jpg', 2000, 3, '2024-06-13', 1, 1, 1, 11),
(87, 'Apartment 14', 14, 114, 4, 2, 'image14.jpg', 3200, 5, '2024-06-14', 1, 1, 1, 11),
(88, 'Apartment 15', 15, 115, 1, 1, 'image15.jpg', 1700, 2, '2024-06-15', 1, 1, 1, 11),
(89, 'Apartment 16', 16, 116, 2, 2, 'image16.jpg', 2400, 4, '2024-06-16', 1, 1, 1, 11),
(90, 'Apartment 17', 17, 117, 3, 1, 'image17.jpg', 2800, 5, '2024-06-17', 1, 1, 1, 11),
(91, 'Apartment 18', 18, 118, 2, 1, 'image18.jpg', 2100, 3, '2024-06-18', 1, 1, 1, 11),
(92, 'Apartment 19', 19, 119, 4, 2, 'image19.jpg', 3300, 5, '2024-06-19', 1, 1, 1, 11),
(93, 'Apartment 20', 20, 120, 1, 1, 'image20.jpg', 1800, 2, '2024-06-20', 1, 1, 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `R_id` int(11) NOT NULL,
  `R_name` varchar(255) NOT NULL,
  `status_p` varchar(255) NOT NULL,
  `pending` tinyint(4) NOT NULL DEFAULT 0,
  `date_r` date DEFAULT NULL,
  `U_id` int(11) NOT NULL,
  `P_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`R_id`, `R_name`, `status_p`, `pending`, `date_r`, `U_id`, `P_id`) VALUES
(42, 'zeen', '', 0, NULL, 11, 11),
(97, 'mohamed', '', 0, NULL, 18, 10),
(132, 'galal', 'paid', 1, '2024-06-25', 7, 8);

-- --------------------------------------------------------

--
-- Table structure for table `userid`
--

CREATE TABLE `userid` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` int(11) NOT NULL,
  `FullName` char(255) NOT NULL,
  `rageStatus` tinyint(4) NOT NULL DEFAULT 0,
  `TrustStatus` tinyint(4) NOT NULL DEFAULT 0,
  `date` date NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userid`
--

INSERT INTO `userid` (`ID`, `username`, `Password`, `email`, `address`, `phone`, `FullName`, `rageStatus`, `TrustStatus`, `date`, `avatar`) VALUES
(4, 'alaa', 'edff502ba473a72dbafeedb576debd93b013ce96', 'alaa@gmail.com', '105 ahmed emam', 101000003, 'Alaa Nasef', 0, 2, '2024-02-20', '0'),
(7, '3am shawkat', 'e8e9c0f5f8743bfbf254131904a37151cf09af17', 'shawkat@gmail.com', 'klfhuisdghfi', 101000006, '3am shawkat el 22r3', 1, 2, '2024-02-27', ''),
(11, 'galal', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'b@gmail.com', '199', 1111272968, 'mohamd mostaf', 1, 1, '2024-03-21', '99715974_feature3.png'),
(12, 'mohamed', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1@f.c', 'hadayk el aharm', 1111272968, 'mohamed mostafa galal mohamed', 0, 0, '2024-03-05', ''),
(13, 'mohamed abd mohsn', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'mohamed@g.c', 'hadayk el aharm', 1111272968, 'Dr.mohamed', 0, 0, '2024-03-05', ''),
(14, 'bbb', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 's@g.c', 'hadayk el aharm', 1111272968, 'joo khaleed', 1, 0, '2024-03-06', ''),
(16, 'saeed', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1@f.c', 'hadayk el aharm', 1111272968, 'mohamed galal', 0, 0, '2024-03-07', ''),
(17, 'hossaam', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'body.1234.mm@gmail.com', 'hadayk el aharm', 1111272968, 'mohamed mostafa galal', 0, 0, '2024-03-07', ''),
(18, 'dr saabery', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1@f.c', 'wewe', 2147483647, 'dr sabry', 0, 0, '2024-03-21', ''),
(19, 'zeen', '7c4a8d09ca3762af61e59520943dc26494f8941b', '1@f.c', 'hadayk el aharm', 1111272968, 'zeen abdeem alii', 0, 0, '2024-05-16', ''),
(20, 'uio', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'op@a.com', 'wk', 123, 'moodoaa', 0, 0, '2024-05-16', ''),
(23, 'mohamedY', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'mohamed.galal2729@gmail.com', 'hadayk el aharm', 1111272968, 'mohamed galal', 0, 0, '2024-06-23', '99715974_feature3.png'),
(24, 'hhaaw', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'mohamed@g.com', 'hadayk el aharm', 1111272968, 'mohamed mostafa galal', 0, 0, '2024-06-23', '7679314_contact.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `comment_user` (`user_id`),
  ADD KEY `comment_places` (`places_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_ID`),
  ADD KEY `ID_P` (`id_user`),
  ADD KEY `placesID` (`job_places`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`p_id`),
  ADD UNIQUE KEY `nameofplaces` (`nameofplaces`),
  ADD KEY `brokers` (`broker_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`R_id`),
  ADD UNIQUE KEY `R_name` (`R_name`),
  ADD KEY `resevation` (`U_id`),
  ADD KEY `resevation-p` (`P_id`);

--
-- Indexes for table `userid`
--
ALTER TABLE `userid`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `R_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `userid`
--
ALTER TABLE `userid`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_places` FOREIGN KEY (`places_id`) REFERENCES `places` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_user` FOREIGN KEY (`user_id`) REFERENCES `userid` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `ID_P` FOREIGN KEY (`id_user`) REFERENCES `userid` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `placesID` FOREIGN KEY (`job_places`) REFERENCES `places` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `brokers` FOREIGN KEY (`broker_id`) REFERENCES `userid` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `resevation` FOREIGN KEY (`U_id`) REFERENCES `userid` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resevation-p` FOREIGN KEY (`P_id`) REFERENCES `places` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
