-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2025 at 02:51 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cultiveer`
--

-- --------------------------------------------------------

--
-- Table structure for table `analytics`
--

CREATE TABLE `analytics` (
  `id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `airTemp` float DEFAULT NULL,
  `humidity` float DEFAULT NULL,
  `lightLux` float DEFAULT NULL,
  `soilMoisture` float DEFAULT NULL,
  `soilTemp1` float DEFAULT NULL,
  `soilTemp2` float DEFAULT NULL,
  `nitrogen` float NOT NULL,
  `phosphorus` float NOT NULL,
  `potassium` float NOT NULL,
  `ph` float NOT NULL,
  `ec` float NOT NULL,
  `NPK_temperature` float NOT NULL,
  `NPK_humidity` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `analytics`
--

INSERT INTO `analytics` (`id`, `device_id`, `airTemp`, `humidity`, `lightLux`, `soilMoisture`, `soilTemp1`, `soilTemp2`, `nitrogen`, `phosphorus`, `potassium`, `ph`, `ec`, `NPK_temperature`, `NPK_humidity`, `created_at`) VALUES
(1, 1, 25.53, 66.97, 442.85, 51.61, 11.06, 23.84, 0, 0, 0, 0, 0, 0, 0, '2024-12-16 06:45:25'),
(2, 1, 27.84, 66.43, 967.54, 15.09, 11.6, 26.88, 0, 0, 0, 0, 0, 0, 0, '2024-12-16 06:45:35'),
(3, 1, 26.15, 31.12, 381.62, 50.44, 11.12, 21.64, 0, 0, 0, 0, 0, 0, 0, '2024-12-16 06:45:46'),
(4, 2, 12.02, 19.42, 401.7, 59.06, 15.52, 20.45, 0, 0, 0, 0, 0, 0, 0, '2024-12-16 06:49:36'),
(5, 2, 21.12, 62.97, 611.58, 25.75, 15.5, 15.06, 0, 0, 0, 0, 0, 0, 0, '2024-12-16 06:49:46'),
(6, 2, 19.81, 16.75, 250.13, 16.42, 16.56, 14.38, 0, 0, 0, 0, 0, 0, 0, '2024-12-16 06:49:56'),
(7, 2, 44.61, 79.11, 824.43, 33.51, 24.49, 24.4, 0, 0, 0, 0, 0, 0, 0, '2024-12-16 06:50:06'),
(8, 2, 22.11, 23.53, 980.69, 56.82, 21.4, 26.26, 0, 0, 0, 0, 0, 0, 0, '2024-12-16 06:50:16'),
(9, 2, 42.33, 28.59, 320.21, 51.52, 29.62, 16.35, 0, 0, 0, 0, 0, 0, 0, '2024-12-16 06:50:26'),
(10, 2, 19.85, 69.08, 29.88, 39.07, 13.56, 12.74, 0, 0, 0, 0, 0, 0, 0, '2024-12-16 06:50:36'),
(11, 2, 19.85, 55.29, 463.61, 51.85, 26.54, 26.3, 0, 0, 0, 0, 0, 0, 0, '2024-12-16 06:50:46'),
(12, 2, 23.73, 32.58, 830.88, 56.02, 15.39, 21.66, 0, 0, 0, 0, 0, 0, 0, '2024-12-16 06:50:56'),
(13, 2, 17.13, 48.29, 273.04, 18.52, 24.96, 27.44, 0, 0, 0, 0, 0, 0, 0, '2024-12-16 06:51:06'),
(14, 2, 30.1, 35.54, 62.2, 56.65, 28.53, 14.46, 0, 0, 0, 0, 0, 0, 0, '2024-12-16 12:44:35'),
(15, 2, 23.68, 21.98, 493.44, 26.54, 14.08, 22.91, 0, 0, 0, 0, 0, 0, 0, '2024-12-16 12:44:45'),
(16, 2, 0.68, 39.56, 551.33, 36.3, 18.9, 18.51, 0, 0, 0, 0, 0, 0, 0, '2024-12-16 12:44:55'),
(17, 2, 31.48, 17.23, 712.52, 52.96, 21.88, 18.34, 0, 0, 0, 0, 0, 0, 0, '2024-12-16 12:45:05'),
(18, 2, 39.89, 35.58, 444.54, 31.15, 20.71, 28.34, 0, 0, 0, 0, 0, 0, 0, '2024-12-16 12:45:15'),
(19, 2, 42.99, 79.44, 635.32, 42.28, 18.04, 23.94, 0, 0, 0, 0, 0, 0, 0, '2024-12-16 12:45:25'),
(20, 2, 7.57, 76.18, 960.6, 11.37, 10.76, 19.37, 0, 0, 0, 0, 0, 0, 0, '2024-12-16 12:45:35'),
(21, 2, 2.55, 25.19, 874.64, 23.71, 28.14, 16.61, 0, 0, 0, 0, 0, 0, 0, '2024-12-16 12:45:45'),
(22, 1, 29.35, 55.31, 120.02, 59.77, 28.03, 25.13, 4.15, 2.44, 4.87, 6.98, 0.51, 29.42, 35.67, '2025-02-02 20:05:10'),
(23, 1, 32.77, 44.68, 122.55, 51.07, 27.73, 25.59, 1.19, 2.85, 2.88, 6.79, 1.01, 20.56, 52.41, '2025-02-02 20:05:11'),
(24, 1, 28.05, 40.59, 144.26, 56.24, 28.99, 28.09, 3, 4.52, 2.92, 7.03, 1.02, 21.62, 41.11, '2025-02-02 20:05:12'),
(25, 1, 32.35, 52.7, 109.24, 48.34, 27.96, 26.82, 2.99, 1.68, 4.19, 6.49, 1.83, 21.73, 32.21, '2025-02-02 20:05:13'),
(26, 1, 29.95, 50.95, 96.01, 48.01, 26.19, 25.13, 1.95, 4.4, 4.32, 5.88, 0.56, 23.12, 61.22, '2025-02-02 20:05:14'),
(27, 1, 28.83, 56, 109.78, 54.87, 29.15, 28.62, 2.69, 3.49, 1.96, 6.29, 0.53, 34.75, 43.11, '2025-02-02 20:05:15'),
(28, 1, 30.61, 40.73, 96.54, 40.94, 27.89, 28.99, 3.52, 4.78, 3.76, 6.4, 1.66, 26.04, 63.66, '2025-02-02 20:05:16'),
(29, 1, 29.62, 52.23, 109.3, 47.03, 28.64, 26.59, 1.39, 3.18, 4.13, 5.75, 0.57, 26.38, 58.63, '2025-02-02 20:05:17'),
(30, 1, 32.23, 41.11, 115.67, 42.36, 27.28, 29.12, 2.31, 3.38, 2.81, 7.34, 0.88, 27.79, 47.77, '2025-02-02 20:05:18'),
(31, 1, 30.09, 44.05, 105.84, 59.13, 25.88, 29.99, 1.64, 4.46, 1.1, 6.51, 0.8, 24.06, 38.79, '2025-02-02 20:05:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `device_id` varchar(255) NOT NULL,
  `device_secret` varchar(255) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `device_id`, `device_secret`, `created`) VALUES
(1, 'zorokolla', '$2y$10$0jZBwKlrTqoTpMD3zNrJmuUjzK2KAqqqtdV1q6Sku8NsmfLjNtu6K', 'zorokolla', 'AZK124', '2024-12-15 22:02:08'),
(2, 'senurah', '$2y$10$/3ZkT59W6wM9Ptuk4JETRuD0iDlq756akn1OYFp9rT9tSFqF4q1fK', 'senurah', '520f3392f58f10bedd01ea480feeccfc', '2024-12-16 06:47:41'),
(3, 'manusayek', '$2y$10$zcX0UH3MnvfpquORpvQGUOIfWrCG2i02QFwXIdKqkJfAESX9mHnri', 'manusayek', '7007cf6b37b2ae69eebe9342950ee13e', '2024-12-17 07:41:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analytics`
--
ALTER TABLE `analytics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `device_id` (`device_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`username`),
  ADD UNIQUE KEY `device_secret` (`device_secret`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analytics`
--
ALTER TABLE `analytics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `analytics`
--
ALTER TABLE `analytics`
  ADD CONSTRAINT `analytics_ibfk_1` FOREIGN KEY (`device_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
