-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 17, 2022 at 07:56 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rehearsalz`
--

-- --------------------------------------------------------

--
-- Table structure for table `bands`
--

CREATE TABLE `bands` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `picture` text COLLATE utf8_unicode_ci NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bands`
--

INSERT INTO `bands` (`id`, `name`, `picture`, `userId`) VALUES
(1, 'Moskera', 'PUBLIC/assets/nabmoskera.jpg', 4),
(5, 'some band', 'PUBLIC/assets/icons8-star-48.png', 4),
(6, 'some other band', 'PUBLIC/assets/icons8-star-48.png', 4),
(7, 'The Band', 'PUBLIC/assets/icons8-star-48.png', 4);

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `band_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `name`, `band_id`, `created_at`) VALUES
(1, 'Cambiemos', 1, '2022-04-26 11:53:09');

-- --------------------------------------------------------

--
-- Table structure for table `tracks`
--

CREATE TABLE `tracks` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `path` text COLLATE utf8_unicode_ci NOT NULL,
  `song_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tracks`
--

INSERT INTO `tracks` (`id`, `name`, `path`, `song_id`) VALUES
(3, 'Drums', 'PUBLIC/assets/audio/CAMBIEMOS-drums.mp3', 1),
(4, 'Guitars', 'PUBLIC/assets/audio/CAMBIEMOS-gtr.mp3', 1),
(5, 'Voices', 'PUBLIC/assets/audio/CAMBIEMOS-voice.mp3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nickname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nickname`, `email`, `password`) VALUES
(4, 'Nab', 'nab.prado@outlook.fr', '$2y$10$9Qz7eGbPFkqH80dD75UrFOSua.LZKjKdtSSICEQ3fVsg/jL2GPsBa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bands`
--
ALTER TABLE `bands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`userId`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `band_id` (`band_id`);

--
-- Indexes for table `tracks`
--
ALTER TABLE `tracks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `song_id` (`song_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bands`
--
ALTER TABLE `bands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tracks`
--
ALTER TABLE `tracks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bands`
--
ALTER TABLE `bands`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Constraints for table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `band_id` FOREIGN KEY (`band_id`) REFERENCES `bands` (`id`);

--
-- Constraints for table `tracks`
--
ALTER TABLE `tracks`
  ADD CONSTRAINT `song_id` FOREIGN KEY (`song_id`) REFERENCES `songs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
