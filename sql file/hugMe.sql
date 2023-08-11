-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 04, 2021 at 08:54 PM
-- Server version: 5.6.45
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qboxus_hugMe`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `pass` varchar(250) NOT NULL COMMENT 'password should be md5()'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `pass`) VALUES
(1, 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `flag_user`
--

CREATE TABLE `flag_user` (
  `id` int(11) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `flag_by` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `like_unlike`
--

CREATE TABLE `like_unlike` (
  `id` int(11) NOT NULL,
  `action_profile` varchar(250) NOT NULL,
  `effect_profile` varchar(250) NOT NULL,
  `action_type` varchar(250) NOT NULL,
  `match_profile` varchar(150) NOT NULL DEFAULT '0',
  `effected` varchar(120) NOT NULL,
  `chat` varchar(50) NOT NULL DEFAULT 'false'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fb_id` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL DEFAULT '0',
  `first_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `birthday` varchar(150) NOT NULL DEFAULT '0',
  `age` int(11) NOT NULL,
  `gender` varchar(150) NOT NULL,
  `about_me` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lat_long` varchar(50) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `long` varchar(255) NOT NULL,
  `job_title` varchar(250) NOT NULL,
  `company` varchar(250) NOT NULL,
  `living` varchar(250) NOT NULL DEFAULT '0',
  `children` varchar(250) NOT NULL DEFAULT '0',
  `smoking` varchar(250) NOT NULL DEFAULT '0',
  `drinking` varchar(250) NOT NULL DEFAULT '0',
  `relationship` varchar(250) NOT NULL DEFAULT '0',
  `sexuality` varchar(250) NOT NULL DEFAULT '0',
  `school` varchar(250) NOT NULL,
  `image1` varchar(250) NOT NULL DEFAULT '0',
  `image2` varchar(250) NOT NULL DEFAULT '0',
  `image3` varchar(250) NOT NULL DEFAULT '0',
  `image4` varchar(250) NOT NULL DEFAULT '0',
  `image5` varchar(250) NOT NULL DEFAULT '0',
  `image6` varchar(250) NOT NULL DEFAULT '0',
  `like_count` int(11) NOT NULL DEFAULT '0',
  `dislike_count` int(11) NOT NULL DEFAULT '0',
  `hide_me` int(11) NOT NULL DEFAULT '0' COMMENT '0 =  show me   1 = hide me',
  `block` varchar(100) NOT NULL DEFAULT '0',
  `purchased` int(12) NOT NULL DEFAULT '0',
  `version` varchar(15) DEFAULT '0',
  `device` varchar(25) NOT NULL,
  `profile_type` varchar(20) NOT NULL DEFAULT 'user',
  `device_token` varchar(500) NOT NULL,
  `subscription_datetime` varchar(255) NOT NULL,
  `promoted` int(11) NOT NULL,
  `promoted_mins` int(11) NOT NULL,
  `promoted_date` varchar(255) NOT NULL,
  `hide_age` int(11) NOT NULL,
  `hide_location` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_images`
--

CREATE TABLE `user_images` (
  `id` int(11) NOT NULL,
  `fb_id` varchar(250) NOT NULL,
  `image_url` varchar(1000) NOT NULL,
  `columName` varchar(120) NOT NULL,
  `created_time` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flag_user`
--
ALTER TABLE `flag_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like_unlike`
--
ALTER TABLE `like_unlike`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `fb_id` (`fb_id`);

--
-- Indexes for table `user_images`
--
ALTER TABLE `user_images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `flag_user`
--
ALTER TABLE `flag_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `like_unlike`
--
ALTER TABLE `like_unlike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_images`
--
ALTER TABLE `user_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
