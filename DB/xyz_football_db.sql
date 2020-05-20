-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 20, 2020 at 03:07 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xyz_football_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `match_scorer_tbl`
--

CREATE TABLE `match_scorer_tbl` (
  `id` int(10) UNSIGNED NOT NULL,
  `match_score_id` int(10) UNSIGNED NOT NULL,
  `scorer_id` int(10) UNSIGNED NOT NULL,
  `score_time` float NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `match_scorer_tbl`
--

INSERT INTO `match_scorer_tbl` (`id`, `match_score_id`, `scorer_id`, `score_time`, `created_at`) VALUES
(3, 21, 2, 45, '2020-05-19 23:21:08'),
(4, 21, 12, 15, '2020-05-19 23:21:08');

-- --------------------------------------------------------

--
-- Table structure for table `match_score_tbl`
--

CREATE TABLE `match_score_tbl` (
  `id` int(10) UNSIGNED NOT NULL,
  `match_id` int(10) UNSIGNED NOT NULL,
  `home_score` int(10) UNSIGNED NOT NULL,
  `away_score` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `match_score_tbl`
--

INSERT INTO `match_score_tbl` (`id`, `match_id`, `home_score`, `away_score`, `created_at`) VALUES
(21, 2, 1, 1, '2020-05-19 23:21:08');

-- --------------------------------------------------------

--
-- Table structure for table `match_tbl`
--

CREATE TABLE `match_tbl` (
  `id` int(10) UNSIGNED NOT NULL,
  `match_date` datetime NOT NULL,
  `home_team_id` int(10) UNSIGNED NOT NULL,
  `away_team_id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `match_tbl`
--

INSERT INTO `match_tbl` (`id`, `match_date`, `home_team_id`, `away_team_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, '2020-05-19 12:30:00', 6, 8, '2020-05-19 23:15:43', '2020-05-19 23:21:51', NULL),
(3, '2020-05-23 10:00:00', 7, 8, '2020-05-19 23:16:09', '2020-05-19 23:22:01', NULL),
(4, '2020-05-29 11:00:00', 7, 9, '2020-05-20 07:49:26', NULL, '2020-05-20 07:49:41');

-- --------------------------------------------------------

--
-- Table structure for table `player_position_tbl`
--

CREATE TABLE `player_position_tbl` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `player_position_tbl`
--

INSERT INTO `player_position_tbl` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Penyerang', '2020-05-19 06:03:58', NULL, NULL),
(2, 'Gelandang', '2020-05-19 06:04:22', '2020-05-19 06:08:12', NULL),
(3, 'Bertahan', '2020-05-19 06:04:32', NULL, NULL),
(4, 'Penjaga gawang', '2020-05-19 06:04:41', NULL, NULL),
(6, 'Cadangan', '2020-05-19 22:43:24', NULL, '2020-05-19 22:43:36');

-- --------------------------------------------------------

--
-- Table structure for table `player_tbl`
--

CREATE TABLE `player_tbl` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `height` float NOT NULL,
  `weight` float NOT NULL,
  `team_id` int(11) NOT NULL,
  `position_id` int(10) UNSIGNED NOT NULL,
  `jersey_number` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `player_tbl`
--

INSERT INTO `player_tbl` (`id`, `name`, `height`, `weight`, `team_id`, `position_id`, `jersey_number`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Mike', 170, 59, 6, 1, 12, '2020-05-19 22:54:57', '2020-05-19 23:13:12', NULL),
(3, 'Joe', 180, 70, 6, 2, 5, '2020-05-19 23:00:02', NULL, NULL),
(4, 'Kevin', 185, 68, 6, 3, 8, '2020-05-19 23:00:26', NULL, NULL),
(5, 'Dave', 165, 50, 6, 4, 11, '2020-05-19 23:01:00', NULL, NULL),
(6, 'Leon', 168, 60, 7, 1, 1, '2020-05-19 23:01:38', NULL, NULL),
(7, 'Yosua', 190, 80, 7, 2, 9, '2020-05-19 23:03:32', NULL, NULL),
(8, 'Denny', 168, 57, 7, 3, 20, '2020-05-19 23:04:10', NULL, NULL),
(9, 'Mark', 188, 75, 7, 4, 17, '2020-05-19 23:04:36', NULL, NULL),
(10, 'Daniel', 171, 60, 8, 1, 3, '2020-05-19 23:05:24', NULL, NULL),
(11, 'Dennis', 178, 62, 8, 2, 15, '2020-05-19 23:07:06', NULL, NULL),
(12, 'Tommy', 165, 53, 8, 3, 7, '2020-05-19 23:07:35', NULL, NULL),
(13, 'Randy', 177, 65, 8, 4, 9, '2020-05-19 23:07:59', NULL, NULL),
(14, 'Bob', 170, 55, 9, 1, 8, '2020-05-19 23:09:56', NULL, NULL),
(15, 'Dony', 180, 70, 9, 2, 2, '2020-05-19 23:10:46', NULL, NULL),
(16, 'Kelvin', 178, 60, 9, 3, 17, '2020-05-19 23:11:31', NULL, NULL),
(17, 'Garfield', 160, 50, 9, 4, 6, '2020-05-19 23:11:53', NULL, NULL),
(18, 'Andy', 188, 71, 6, 4, 31, '2020-05-20 07:48:13', NULL, '2020-05-20 07:48:42');

-- --------------------------------------------------------

--
-- Table structure for table `team_tbl`
--

CREATE TABLE `team_tbl` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `year_founded` varchar(4) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `team_tbl`
--

INSERT INTO `team_tbl` (`id`, `name`, `logo`, `year_founded`, `address`, `city`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'Tim A', '9c3804632a38fc038d5506417e26051d3512d732.png', '2020', 'Jl Protokol Z', 'Jakarta', '2020-05-19 22:32:20', NULL, NULL),
(7, 'Tim B', 'b334d5ca9b31ee8791172f6b2c669d2f6ff35541.png', '2015', 'Jl Raya ABC', 'Jakarta', '2020-05-19 22:32:53', NULL, NULL),
(8, 'Tim C', '61be5a1f7120e70bf5477b7142ed2f2058fb7dd5.png', '2017', 'Jl Raya X', 'Jakarta', '2020-05-19 22:33:34', NULL, NULL),
(9, 'Tim D', 'f293c3edc507236f222bfb31f84ee1f13412f8af.png', '2012', 'Jl Protokol OP', 'Jakarta', '2020-05-19 22:34:32', NULL, NULL),
(10, 'Tim E', 'c06b42e73310753c56e22261eb44c01a5e530e7e.png', '2020', 'Jl Raya Q', 'Jakarta', '2020-05-19 22:35:13', NULL, '2020-05-19 23:30:40');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'admin', 'admin@mail.com', '$2y$10$r4Jw5GDvyQkpWd1YXDBilePDgDHpji6wNrnFu/3CkI99eXlXkp3gi', 'admin', '2020-05-18 22:22:59', NULL, NULL),
(3, 'Manajemen Satu', 'manajemen_one_edited@xyz.com', '$2y$10$o7DAd9mc4X92QLejbQpufe5PgfCb.zpzIUeldtd85rjBj70nqdPqy', 'user', '2020-05-19 19:06:37', '2020-05-19 19:20:01', '2020-05-19 19:20:23'),
(4, 'Manager Satu', 'manager_one@xyz-football.com', '$2y$10$fLR27ryCJfdGOKVS1/xPdO8mMccwjks6RrQABH6rEz6k/yNEsHOti', 'user', '2020-05-20 07:45:22', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `match_scorer_tbl`
--
ALTER TABLE `match_scorer_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `match_score_tbl`
--
ALTER TABLE `match_score_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `match_tbl`
--
ALTER TABLE `match_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `player_position_tbl`
--
ALTER TABLE `player_position_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `player_tbl`
--
ALTER TABLE `player_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_tbl`
--
ALTER TABLE `team_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `match_scorer_tbl`
--
ALTER TABLE `match_scorer_tbl`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `match_score_tbl`
--
ALTER TABLE `match_score_tbl`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `match_tbl`
--
ALTER TABLE `match_tbl`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `player_position_tbl`
--
ALTER TABLE `player_position_tbl`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `player_tbl`
--
ALTER TABLE `player_tbl`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `team_tbl`
--
ALTER TABLE `team_tbl`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
