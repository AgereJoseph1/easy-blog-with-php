-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 08, 2021 at 04:10 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `likes` int(50) NOT NULL,
  `dislikes` int(50) NOT NULL,
  `views` int(50) NOT NULL,
  `status` varchar(225) NOT NULL,
  `dtime` varchar(100) NOT NULL,
  `thumbnail` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `user_id`, `title`, `content`, `category`, `tags`, `likes`, `dislikes`, `views`, `status`, `dtime`, `thumbnail`) VALUES
(2, 1, '25 Useful Python One-Liners', '1. Swapping Two Variables\r\n# a = 4 b = 5\r\na,b = b,a\r\n# print(a,b) >> 5,4\r\nLet’s start with a simpler one by swapping two variables with each other. This method is one of the most simple and intuitive methods that you can write with no need to use a temp variable or apply arithmetic operations.\r\n2. Multiple Variable Assignments\r\na,b,c = 4,5.5,\'Hello\'\r\n#print(a,b,c) >> 4,5.5,', 'Food', '', 2, 0, 0, 'pending', '2021-05-20 19:16:15', 'https://cdn.dribbble.com/users/2432994/screenshots/10747116/media/9ceff7dd75c0c9af9321030b4d6c2234.png?compress=1&resize=1200x900'),
(4, 1, 'Lorem Ipsum', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'General', 'general, more, others', 0, 0, 0, 'pending', '2021-05-20 20:41:01', 'https://neilpatel.com/wp-content/uploads/2018/10/blog.jpg'),
(5, 9, 'Michaels', 'Botanica lona devfre╟ all ÖinpÖ├', 'It Hardware', 'sdsdsd', 0, 0, 0, 'pending', '2021-05-28 19:52:12', 'https://neilpatel.com/wp-content/uploads/2018/10/blog.jpg'),
(6, 1, 'Incorrect padding', 'hththt', 'Fashion', '', 0, 0, 0, 'pending', '2021-09-24 05:26:42', '1242104a4d130461dc64631.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `register_verify`
--

DROP TABLE IF EXISTS `register_verify`;
CREATE TABLE IF NOT EXISTS `register_verify` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `reg_id` int(5) NOT NULL,
  `token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `register_verify`
--

INSERT INTO `register_verify` (`id`, `reg_id`, `token`) VALUES
(1, 4, '126E1KlUIdafd06jC45afbd74W41z05pbtaAd9e6'),
(3, 6, '8n8525dKO44ba5429392335eWGftM8bd43185dcd'),
(4, 7, 'IMt783cfecc532808bb7365109697O313c8r9AC2'),
(5, 8, 'c6275ld1cf70fe2IbYr57v00e05xa1bz2fA6cW76'),
(6, 9, '3z3a1cIxh148b4M2bcQl57e9269CbWY6d3e9bve9'),
(7, 10, '2C28dUb87f5eW42f824j6Y08b5b4I90dd2Afb68p'),
(8, 11, 'e46dUa22ajd6070ddKehMObbt52Yx3bd21187Cfc'),
(9, 12, '95vcd38Qf4Weban207tI47lf3fCd2Ofbb2ebUeM5');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `profile_pic` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `subscription_type` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `is_verified` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `dtime` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `phone`, `address`, `profile_pic`, `subscription_type`, `is_verified`, `dtime`) VALUES
(1, 'sdfghjm', 'admin', 'admin', 'devfreak235@gmail.com', '', '', '', 'free', 'true', ''),
(10, 'fsfs', 'admin2', 'Prince@20', 'mirekuprince66@gmail.com', '', '', '', 'free', 'true', '2021-05-28 21:09:59'),
(9, 'sdsds', 'admin1', 'Prince@20', 'mirekuprince18@gmail.com', '', '', '', 'free', 'true', '2021-05-28 19:34:38'),
(11, 'nbnb', 'vnvn', '12345Aa#', 'agerejoseph48@gmail.com', '', '', '', 'free', 'true', '2021-06-01 19:48:16'),
(12, 'Joseph AZUMBIL Agere', 'Agere', 'agere123A#', 'agerejoseph448@gmail.com', '', '', '', 'free', 'true', '2021-08-09 01:32:16');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
