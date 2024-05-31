-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2024 at 09:44 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `article_id` int(11) NOT NULL,
  `article_title` varchar(255) NOT NULL,
  `article_content` text NOT NULL,
  `article_image` varchar(255) NOT NULL,
  `article_created_time` datetime NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`article_id`, `article_title`, `article_content`, `article_image`, `article_created_time`, `id_categorie`, `id_author`) VALUES
(58, 'Ilog Palangi', '', '12.jpg', '2024-05-17 07:32:40', 2, 1),
(59, 'Bundok ng Ilian', '', '2.jpg', '2024-05-17 07:33:36', 2, 1),
(60, 'Kweba sa Bundok ng Ilian', '', 'kwenna.jpg', '2024-05-17 07:34:04', 2, 1),
(61, 'Tirahan nila Agyu', '', 'trhana.jpg', '2024-05-17 07:34:49', 2, 1),
(62, 'Bayan ng Tigyandang', '', 'awdaw.jpg', '2024-05-17 07:36:40', 2, 1),
(63, 'Tirahan ni Datung Moro', '', 'dawd.jpg', '2024-05-17 07:37:02', 2, 1),
(64, 'Bayan ng Bablayon', '', 'dawdwfaw.jpg', '2024-05-17 07:38:04', 2, 1),
(65, 'Kwenba sa Ilog Palangi', '', 'fawdawdfaw.jpg', '2024-05-17 07:38:50', 2, 1),
(66, 'Look ng Linayagon', '', 'fawdrawfawdfaw.jpg', '2024-05-17 07:39:28', 2, 1),
(67, 'Bayan ng Ayuman', '', 'fsefse.jpg', '2024-05-17 07:40:05', 2, 1),
(68, 'Tanagyaw', '', 'r1.png', '2024-05-17 07:42:00', 1, 1),
(69, 'Agyu', '', 'r5.png', '2024-05-17 07:43:25', 1, 1),
(70, 'Kuyasu', '', 'r4.png', '2024-05-17 07:43:48', 1, 1),
(71, 'Banlak', '', 'r6.png', '2024-05-17 07:44:04', 1, 1),
(72, 'Pamulaw', '', 'r7.png', '2024-05-17 07:44:32', 1, 1),
(73, 'Mananakop', '', 'r2.png', '2024-05-17 07:44:48', 1, 1),
(74, 'Datu Moro', '', 'r3.png', '2024-05-17 07:45:06', 1, 1),
(75, 'Narration Example # 1', '', 'n1.jpg', '2024-05-17 07:47:32', 4, 2),
(76, 'Narration Example # 2', '', 'n2.jpg', '2024-05-17 07:48:02', 4, 2),
(77, 'Narration Example # 3', '', 'n3.jpg', '2024-05-17 07:48:16', 4, 2),
(78, 'Narration Example # 4', '', 'n4.jpg', '2024-05-17 07:48:49', 4, 2),
(79, 'Narration Example # 5', '', 'n5.jpg', '2024-05-17 07:49:11', 4, 2),
(80, 'Script Example # 1', '', 's1.png', '2024-05-17 07:53:55', 4, 2),
(81, 'Script Example # 2', '', 's2.png', '2024-05-17 07:54:24', 4, 2),
(82, 'Script Example # 3', '', 's3.png', '2024-05-17 07:54:42', 4, 2),
(83, 'Script Example # 4', '', 's4.png', '2024-05-17 07:55:03', 4, 2),
(84, 'Script Example # 5', '', 's4.png', '2024-05-17 07:55:21', 4, 2),
(85, 'Script Example # 6', '', 's6.png', '2024-05-17 07:55:37', 4, 2),
(88, 'Game Asset  # 1', '', 'e6.png', '2024-05-17 07:56:59', 14, 2),
(89, 'Game Asset  # 2', '', 'e5.png', '2024-05-17 07:57:12', 14, 2),
(90, 'Game Asset  # 3', '', 'e4.png', '2024-05-17 07:57:27', 14, 1),
(91, 'Game Asset  # 4', '', 'e1.png', '2024-05-17 07:57:42', 14, 2),
(92, 'Game Asset  # 5', '', 'e2.png', '2024-05-17 07:58:14', 14, 2),
(93, 'Game Asset  # 6', '', 'e3.png', '2024-05-17 07:58:26', 14, 2);

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_id` int(11) NOT NULL,
  `author_fullname` varchar(100) NOT NULL,
  `author_desc` varchar(255) NOT NULL DEFAULT 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil voluptatibus in ullam eum corrupti reiciendis.',
  `author_email` varchar(100) NOT NULL,
  `author_twitter` varchar(100) NOT NULL DEFAULT 'loujaybee',
  `author_github` varchar(100) NOT NULL DEFAULT 'loujaybee',
  `author_link` varchar(100) NOT NULL DEFAULT 'loujaybee',
  `author_avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `author_fullname`, `author_desc`, `author_email`, `author_twitter`, `author_github`, `author_link`, `author_avatar`) VALUES
(1, 'John Patrick M. Arago', '', 'johnpatrickarago123@gmail.com', '', '', '', '1by1.png'),
(2, 'Elmer M. Adaza', '', 'elmeradaza123@gmail.com', '', '', '', 'f49c8f04-4c35-44f9-8fcf-74994719823b.png');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_image` varchar(255) NOT NULL,
  `category_color` varchar(10) NOT NULL DEFAULT '333333'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_image`, `category_color`) VALUES
(1, 'CHARACTER', '1.png', '#4bb92f'),
(2, 'MAP', 'android.png', '#0078ff'),
(4, 'SCRIPT', '5.jpg', '#8d00ff'),
(14, 'GAME ASSET', 'Front-end-developemtn-1.png', '#247ba0');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `comment_username` varchar(100) NOT NULL,
  `comment_avatar` varchar(255) NOT NULL DEFAULT 'def_face.jpg',
  `comment_content` text NOT NULL,
  `comment_date` datetime NOT NULL DEFAULT '2020-02-14 10:28:00',
  `comment_likes` int(11) NOT NULL DEFAULT 0,
  `id_article` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', 'admin123', '2024-05-17 00:48:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `article_category` (`id_categorie`),
  ADD KEY `article_author` (`id_author`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_article` (`id_article`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_author` FOREIGN KEY (`id_author`) REFERENCES `author` (`author_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `article_category` FOREIGN KEY (`id_categorie`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_article` FOREIGN KEY (`id_article`) REFERENCES `article` (`article_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
