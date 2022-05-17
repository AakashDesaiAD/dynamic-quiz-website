-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 17, 2022 at 01:16 PM
-- Server version: 8.0.29-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `msarii_task_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int NOT NULL,
  `question` varchar(250) NOT NULL,
  `opt_1` varchar(250) NOT NULL,
  `opt_2` varchar(250) NOT NULL,
  `opt_3` varchar(250) NOT NULL,
  `opt_4` varchar(250) NOT NULL,
  `right_answer` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `opt_1`, `opt_2`, `opt_3`, `opt_4`, `right_answer`) VALUES
(1, 'In which year of First World War Germany declared war on Russia and France?', '1914', '1915', '1916', '1917', 'opt_1'),
(2, 'What year was the United Nations established?', '1933', '1922', '1945', '1999', 'opt_3'),
(3, 'How many minutes are in a full week? ', '90999', '12121', '21002', '10080', 'opt_4'),
(4, 'What car manufacturer had the highest revenue in 2020?', 'Tata', 'Maruti', 'Volkswagen', 'BMW', 'opt_3'),
(5, 'How many elements are in the periodic table?', '100', '118', '200', '218', 'opt_2');

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `id` int NOT NULL,
  `email` varchar(250) NOT NULL,
  `score` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`id`, `email`, `score`) VALUES
(1, 'raj@email.com', 3),
(2, 'test@email.com', 4),
(3, 'test@email.com', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(1, 'Aakash Desai', 'test@email.com', '$2y$10$wazIqeFkDSIEj/a9r4OLq.4//lyJI6mQncJKpUlozxN4/gKO7msZ6'),
(2, 'MaheshKumar', 'm@email.com', '$2y$10$yCfs0dzQDAycYxx4v/eJu.guJyQgjpw4dTWOULgy.ooDGF4MitLm6'),
(3, 'Rajesh', 'raj@email.com', '$2y$10$XjE3RL3rDfi7N3AjEFH2AeTQwka98wUgq.q89TOLaFWcInAQRlcfO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
