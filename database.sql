-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2013 at 10:55 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `www`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `ca_id` int(2) NOT NULL,
  `ca_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ca_id`, `ca_name`) VALUES
(0, 'Null'),
(2, 'Donburi'),
(3, 'Curyy Rice'),
(1, 'A la carte');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE IF NOT EXISTS `food` (
  `f_id` int(15) NOT NULL,
  `f_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `f_detail` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `f_price` int(3) NOT NULL,
  `f_img` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `f_status` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `ca_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`f_id`, `f_name`, `f_detail`, `f_price`, `f_img`, `f_status`, `ca_id`) VALUES
(1, 'Adpara Bancon', '??Ä???????????????????????Ä????????î??Ä???????????ó??????', 100, 'aspara.png', 'H', 0),
(2, 'Avocado Salad', '???????????????????î??????????????î', 90, 'avogado.png', '', 0),
(3, 'Buta Kimchi', '?????????????????î???????????????', 80, 'buta-kimuchi.png', 'N', 0),
(4, 'Chahan', '???????????????????î', 6, 'chahan.png', '', 0),
(5, 'Chuka', '????????Ä?????????????????????????????ï?????????', 80, 'chasyuu-men.png', 'H', 0),
(6, 'Chasyuu Salad', '???????????î???????????ï?????????', 70, 'chasyuu-salad.png', '', 0),
(7, 'Koroge', '????????Å??Ä??Å????????????', 140, 'cheese-coroque.png', '', 0),
(8, 'Chuka Don', '???????????????????????????????', 80, 'chuuka-don.png', 'O', 2),
(9, 'Chuka Wakame', '???????????????????????????', 60, 'chuuka-wakame.png', 'H', 1),
(0, 'Curyy Rice', '?????????????Å??Å?????Å??????????????????', 80, 'curryrice.png', 'O', 3);

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

CREATE TABLE IF NOT EXISTS `personnel` (
  `id_pe` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `age` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sex` varchar(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_pe`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`id_pe`, `name`, `address`, `age`, `sex`) VALUES
('p04', 'Ban', 'Phaphumtane', '22', 'm'),
('p2', 'Top', 'Mahasarakham', '22', 'w'),
('p3', 'Jason', 'Chelacha', '25', 'm');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE IF NOT EXISTS `salary` (
  `id_sa` int(11) NOT NULL,
  `id_pe` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  PRIMARY KEY (`id_sa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE IF NOT EXISTS `work` (
  `id_wo` int(11) NOT NULL,
  `data` date NOT NULL,
  `in` time NOT NULL,
  `out` time NOT NULL,
  `over_time` time NOT NULL,
  `comment` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_wo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
