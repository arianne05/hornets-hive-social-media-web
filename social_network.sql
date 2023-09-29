-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2021 at 03:44 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social_network`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `com_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`com_id`, `post_id`, `user_id`, `comment`, `comment_author`, `date`) VALUES
(1, 2, 1, 'comment try', 'aya_totot_981945', '2021-05-24 08:48:05'),
(2, 2, 1, 'COMMENTED WITH DESIGN', 'aya_totot_981945', '2021-05-25 05:26:14'),
(3, 2, 1, 'nice', 'lois_floro_571392', '2021-05-25 08:52:02'),
(4, 1, 1, 'asas', 'aya_totot_981945', '2021-05-28 10:27:15'),
(5, 13, 4, 'comment1', 'jan mcrae_soriano_158422', '2021-06-05 14:47:43'),
(6, 11, 4, 'nice', 'Arianne05', '2021-06-06 13:14:33'),
(7, 12, 4, 'nice!', 'Arianne05', '2021-06-06 13:14:58'),
(8, 10, 4, 'nice', 'Arianne05', '2021-06-06 13:15:25'),
(9, 10, 4, 'second comment', 'Arianne05', '2021-06-06 13:21:54'),
(10, 10, 4, 'comment comment comment comment comment comment comment comment\r\ncomment comment comment comment comment comment comment comment\r\ncomment comment comment', 'Arianne05', '2021-06-06 13:22:48'),
(11, 8, 1, 'my comment', 'Arianne05', '2021-06-06 13:25:06'),
(12, 9, 4, 'comment', 'Arianne05', '2021-06-06 13:26:03'),
(13, 12, 4, 'Hello', 'elrich_lanuza_78271', '2021-06-06 13:39:08'),
(14, 17, 5, 'Nice pic', 'dennise_siona_52910', '2021-06-06 13:42:26'),
(15, 23, 1, 'ffggf', 'Arianne05', '2021-06-07 10:34:55'),
(16, 22, 1, 'image', 'Arianne05', '2021-06-07 10:35:55'),
(17, 19, 6, 'nice view', 'Arianne05', '2021-06-07 10:37:24');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_content` varchar(255) NOT NULL,
  `upload_image` varchar(255) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `post_content`, `upload_image`, `post_date`) VALUES
(1, 1, 'Post w/ image						', 'snow.jpg.34', '2021-05-23 11:21:10'),
(4, 2, '3rd Post', 'youbook.jpeg.43', '2021-05-25 08:31:16'),
(5, 2, 'another user post', '', '2021-05-25 08:49:58'),
(8, 1, 'post status only!!!!														', '', '2021-05-28 11:38:51'),
(9, 4, 'new post! no image', '', '2021-06-05 14:28:41'),
(10, 4, 'No', 'about.jpg.80', '2021-06-05 14:29:27'),
(11, 4, 'image and status', 'soriano.jpg.94', '2021-06-05 14:30:05'),
(12, 4, 'status second', '', '2021-06-05 14:30:19'),
(16, 5, 'Lanuza First Status', '', '2021-06-06 13:37:56'),
(17, 5, 'Status w/images', 'cvsu1.jpg.62', '2021-06-06 13:38:58'),
(19, 6, 'No', 'lanuza.jpg.29', '2021-06-06 13:43:05'),
(29, 6, 'HI HORNETS', '', '2021-06-07 10:58:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `f_name` text NOT NULL,
  `l_name` text NOT NULL,
  `user_name` text NOT NULL,
  `describe_user` varchar(255) NOT NULL,
  `Relationship` text NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_country` text NOT NULL,
  `user_gender` text NOT NULL,
  `user_birthday` text NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_cover` varchar(255) NOT NULL,
  `user_reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `posts` text NOT NULL,
  `recovery_account` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `f_name`, `l_name`, `user_name`, `describe_user`, `Relationship`, `user_pass`, `user_email`, `user_country`, `user_gender`, `user_birthday`, `user_image`, `user_cover`, `user_reg_date`, `posts`, `recovery_account`) VALUES
(1, 'Arianne', 'Quimpo', 'Arianne05', 'Life is a Journey of a thousand steps!', 'Single', 'ayatot123', 'arianne@gmail.com', 'Philippines', 'Male', '2000-12-04', 'arianne.jpg.30', 'quimpo.jpg.25', '2021-05-23 03:57:48', 'yes', 'ayatot'),
(2, 'Lois', 'Floro', 'Loixxx', 'Chase your Dream!', 'In a Relationship', 'loisfloro', 'lois@gmail.com', 'United States', 'Other', '2000-05-31', 'loi.jpg.78', 'loro.jpg.13', '2021-05-25 06:20:09', 'yes', 'secret'),
(4, 'Jan McRae', 'Soriano', 'jan mcrae_soriano_158422', 'Hello Hornets This is my default status!', 'Married', 'soriano123', 'soriano@gmail.com', 'Philippines', 'Male', '2000-02-22', 'mcrae.jpg.96', 'soriano.jpg.26', '2021-06-05 14:25:52', 'yes', 'mydefaultrecovery'),
(5, 'Elrich', 'Lanuza', 'elrich_lanuza_78271', 'Fly High!', 'Separated', 'elrichlanuza', 'lanuza@gmail.com', 'Philippines', 'Others', '2000-04-24', 'el.jpg.98', 'siona.jpg.54', '2021-06-06 13:37:15', 'yes', 'mydefaultrecovery'),
(6, 'Dennise', 'Siona', 'dennise_siona_52910', 'Hello Hornets This is my default status!', '...', 'dennisesiona', 'siona@gmail.com', 'Philippines', 'Female', '2001-03-02', 'dennise.jpg.1', 'lanuza.jpg.24', '2021-06-06 13:41:22', 'yes', 'mydefaultrecovery'),
(9, 'Shandyy', 'Dinoo', 'shandywata', 'Hello Hornets This is my default status!', 'In a Relationship', 'shandy123', 'dino@gmail.com', 'United States', 'Female', '2001-01-05', 'head_turqoise.png', 'default_cover.jpg', '2021-06-07 10:44:44', 'yes', 'mary');

-- --------------------------------------------------------

--
-- Table structure for table `user_messages`
--

CREATE TABLE `user_messages` (
  `id` int(11) NOT NULL,
  `user_to` int(11) NOT NULL,
  `user_from` int(11) NOT NULL,
  `msg_body` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_messages`
--

INSERT INTO `user_messages` (`id`, `user_to`, `user_from`, `msg_body`, `date`) VALUES
(1, 2, 1, 'hello lois', '2021-05-26 12:21:55'),
(2, 2, 1, 'try', '2021-05-26 13:04:08'),
(3, 1, 2, 'hiii', '2021-05-26 13:11:59'),
(4, 1, 2, 'hiii', '2021-05-26 13:11:59'),
(5, 1, 2, 'hiii', '2021-05-26 13:12:02'),
(6, 1, 2, 'adsdsadsf', '2021-05-26 13:12:15'),
(7, 1, 2, '12324dfsdfd', '2021-05-26 13:12:26'),
(8, 1, 1, 'asasa', '2021-05-28 09:48:05'),
(9, 1, 1, 'asda', '2021-05-28 09:54:38'),
(10, 2, 1, 'adsads', '2021-05-28 09:54:44'),
(11, 1, 1, 'uyuy', '2021-05-31 02:48:45'),
(12, 1, 1, 'gghhjghjj', '2021-06-06 12:21:35'),
(13, 4, 2, 'Hi mcrae', '2021-06-06 13:33:51'),
(14, 2, 4, 'Hello', '2021-06-06 13:36:15'),
(15, 1, 4, 'Hi Arianne', '2021-06-06 13:36:23'),
(16, 2, 1, 'hello\r\n', '2021-06-07 09:41:14'),
(17, 2, 1, 'hi', '2021-06-07 09:41:25'),
(18, 4, 1, 'Hi McRae', '2021-06-07 09:41:38'),
(19, 5, 1, 'Hey', '2021-06-07 09:41:55'),
(20, 6, 1, 'hi', '2021-06-07 10:38:32'),
(21, 2, 1, 'hello', '2021-06-07 11:51:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_messages`
--
ALTER TABLE `user_messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_messages`
--
ALTER TABLE `user_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
