-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 01, 2021 at 01:45 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `carouselImages`
--

CREATE TABLE `carouselImages` (
  `ID` int(200) NOT NULL,
  `imageURL` varchar(255) NOT NULL,
  `imageFor` varchar(20) NOT NULL,
  `imageLabel` varchar(255) NOT NULL,
  `buttonURL` varchar(255) DEFAULT NULL,
  `buttonText` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carouselImages`
--

INSERT INTO `carouselImages` (`ID`, `imageURL`, `imageFor`, `imageLabel`, `buttonURL`, `buttonText`) VALUES
(1, 'assets/img/90526760_683920775711999_4112393939963609088_n.jpg', 'lg', 'An alternative to dating apps', '#download', 'hello'),
(1, 'assets/img/s2.png', 'sm', 'Stop Online Dating, Start Meeting', '#download', ' Get the App'),
(2, 'https://st3.depositphotos.com/4232343/36067/i/1600/depositphotos_360672860-stock-photo-handsome-man-smiling-at-his.jpg', 'lg', 'Low expectations platform, anti-hookup, anti-marriage', '#download', ' Get the App'),
(2, 'home - top3.jpg', 'sm', 'top 6 ', '#download', ' Get the App'),
(3, 'https://st3.depositphotos.com/11433364/15303/i/1600/depositphotos_153030308-stock-photo-couple-in-love-having-lunch.jpg', 'lg', 'Tickle to meet people who are just like you', '#download', ' Get the App'),
(3, 'assets/img/s3.png', 'sm', 'Befriend Like-minded People', '#download', ' Get the App'),
(4, 'https://st4.depositphotos.com/13194036/24733/i/1600/depositphotos_247332210-stock-photo-attractive-woman-handsome-man-sitting.jpg', 'lg', 'Loneliness isn’t an option when you can Tickle anytime, anywhere', '#download', ' Get the App'),
(4, 'assets/img/s4.png', 'sm', 'Tickle To Meet New Friends At Your Favorite Places', '#download', ' Get the App'),
(5, 'https://st3.depositphotos.com/13194036/31671/i/1600/depositphotos_316711234-stock-photo-side-view-cheerful-couple-talking.jpg', 'lg', 'Befriend like-minded people', '#download', ' Get the App'),
(5, 'assets/img/s5.png', 'sm', 'Know People Wherever You Go', '#download', ' Get the App'),
(6, 'https://st.depositphotos.com/2117297/2541/i/950/depositphotos_25415543-stock-photo-two-in-cafe-enjoying-the.jpg', 'lg', 'Stop online dating, Start meeting', '#download', ' Get the App'),
(6, 'assets/img/s6.png', 'sm', 'Not Ready To Date? Start With Friendship.', '#download', ' Get the App'),
(7, 'https://st3.depositphotos.com/4232343/18479/i/1600/depositphotos_184796938-stock-photo-content-air-passengers-with-bags.jpg', 'lg', 'Know people wherever you go', '#download', ' Get the App'),
(7, 'assets/img/s7.png', 'sm', 'Stop Online Dating, Start Meeting', '#download', ' Get the App'),
(8, 'https://st3.depositphotos.com/3261171/14811/i/1600/depositphotos_148110003-stock-photo-bearded-man-taking-selfies-with.jpg', 'lg', 'Tickle to meet new friends at your favorite places', '#download', ' Get the App'),
(8, 'assets/img/s8.png', 'sm', 'Befriend Like-minded People', '#download', ' Get the App'),
(9, 'home - top4.jpg', 'lg', 'top 6 ', '#download', ' Get the App'),
(9, 'assets/img/s9.png', 'sm', 'Know People Wherever You Go', '#download', ' Get the App'),
(10, 'home - top4.jpg', 'lg', 'top 6 ', '#download', ' Get the App'),
(10, 'home - top4.jpg', 'sm', 'top 6 ', '#download', ' Get the App'),
(11, 'home - top4.jpg', 'sm', 'top 6 ', '#download', ' Get the App');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carouselImages`
--
ALTER TABLE `carouselImages`
  ADD PRIMARY KEY (`ID`,`imageFor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
