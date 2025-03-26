-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2025 at 02:40 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sportsync`
--

-- --------------------------------------------------------

--
-- Table structure for table `coaches`
--

CREATE TABLE `coaches` (
  `id` int(11) NOT NULL,
  `username` varchar(212) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coaches`
--

INSERT INTO `coaches` (`id`, `username`, `name`, `email`, `password`, `age`) VALUES
(1, '', 'Pep Guardiola', 'pep@city.com', 'password123', 53),
(2, '', 'Gregg Popovich', 'pop@spurs.com', 'password123', 75),
(3, '', 'Jurgen Klopp', 'klopp@liverpool.com', 'password123', 56),
(4, '', 'Erik Spoelstra', 'spoelstra@heat.com', 'password123', 53),
(5, '', 'Carlo Ancelotti', 'ancelotti@realmadrid.com', 'password123', 64),
(6, '', 'Steve Kerr', 'kerr@warriors.com', 'password123', 58),
(7, 'Lycoris Radiata', 'aqif imran', 'aqifimran071130@gmail.com', '1257', 18),
(8, 'putri_elieyra', 'PUTRI ELIEYRA', 'blabla@gmail.com', 'jaemin', 18);

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `sport` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `name`, `age`, `position`, `sport`, `number`) VALUES
(1, 'Lionel Messi', 36, 'Forward', 'Football', '10'),
(2, 'LeBron James', 39, 'Small Forward', 'Basketball', '23'),
(3, 'Cristiano Ronaldo', 39, 'Forward', 'Football', '7'),
(4, 'Stephen Curry', 35, 'Point Guard', 'Basketball', '30'),
(5, 'Kylian Mbappé', 25, 'Forward', 'Football', '7'),
(6, 'Kevin De Bruyne', 32, 'Midfielder', 'Football', '17');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `coach_id` int(123) NOT NULL,
  `name` varchar(100) NOT NULL,
  `totalPlayer` int(123) NOT NULL,
  `level` varchar(123) NOT NULL,
  `sport` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `coach_id`, `name`, `totalPlayer`, `level`, `sport`) VALUES
(1, 7, 'Manchester City', 12, 'begginer', 'Football'),
(2, 7, 'Los Angeles Lakers', 65, 'begginer', 'Basketball'),
(3, 2, 'Real Madrid', 15, 'begginer', 'Football'),
(4, 1, 'Golden State Warriors', 12, 'Amature', 'Basketball'),
(5, 3, 'Liverpool', 56, 'Amature', 'Football'),
(6, 4, 'Miami Heat', 11, 'Amature', 'Basketball'),
(7, 7, 'KVKS VC', 23, 'Pro\r\n', 'Volleyball'),
(8, 7, 'KVKS Rugby', 20, 'Pro', 'Rugby'),
(9, 8, 'KVKS NETBALL CLUB', 12, 'BUDAK-BUDAK', 'NETBALL');

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `id` int(11) NOT NULL,
  `player_id` int(11) DEFAULT NULL,
  `coach_id` int(11) DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`id`, `player_id`, `coach_id`, `team_id`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 2),
(3, 3, 3, 3),
(4, 4, 6, 4),
(5, 5, 5, 5),
(6, 6, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coaches`
--
ALTER TABLE `coaches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `player_id` (`player_id`),
  ADD KEY `coach_id` (`coach_id`),
  ADD KEY `team_id` (`team_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coaches`
--
ALTER TABLE `coaches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `team_members`
--
ALTER TABLE `team_members`
  ADD CONSTRAINT `team_members_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `team_members_ibfk_2` FOREIGN KEY (`coach_id`) REFERENCES `coaches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `team_members_ibfk_3` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
