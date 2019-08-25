-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2019 at 03:55 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moviereview`
--

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `user` varchar(100) NOT NULL,
  `following` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`user`, `following`) VALUES
('', '1'),
('', '2'),
('2', '2'),
('4', '2'),
('4', '1'),
('4', '4');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `moviename` varchar(100) NOT NULL,
  `thumbnail` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`moviename`, `thumbnail`, `title`, `id`) VALUES
('1', 'a', 'Not Your Barbie Girl', 1),
('2', 'b', 'Lavender\'s Blue', 2),
('3', 'c', 'Alone', 3),
('4', 'd', 'The Way I Are', 4),
('5', 'e', 'Blank Space', 5),
('6', 'f', 'Hymn For Weekend', 6),
('7', 'g', 'Come And Get It', 7),
('8', 'h', 'Cyberpunk', 8),
('9', 'i', 'Into The Dead', 9),
('10', 'j', 'Friction', 10),
('11', 'k', 'Good Life', 11),
('12', 'l', 'Boom Shankar', 12),
('13', 'm', 'La Culpa', 13),
('14', 'n', 'One More Night', 14),
('15', 'o', 'Delicate', 15),
('16', 'p', 'Joker', 16);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `moviename` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `comments` varchar(599) NOT NULL,
  `rating` varchar(100) NOT NULL,
  `id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`moviename`, `username`, `comments`, `rating`, `id`) VALUES
('1', 'arjun', 'good song', '5', 1),
('2', 'arjun', 'qwert', '1', 1),
('1', 'akhil', 'great choice', '4', 2),
('2', 'akhil', 'hello', '5', 2),
('439079', 'arjun', 'qwert', '5', 1),
('335983', 'arjun', 'qwertyu', '5', 1),
('4', 'mehul', 'w2e3r456', '5', 2),
('5', 'arjun', 'asdfh', '', 1),
('335983', 'mehul', 'qwety', '5', 2),
('1', '', 'vksdhclsje', '', 0),
('17478', '', 'Bakwass', '5', 0),
('1', 'arjun123', 'good song', '5', 4),
('299534', 'arjun123', 'great movie', '5', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `password` varchar(300) NOT NULL,
  `id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `id`) VALUES
('arjun', '202cb962ac59075b964b07152d234b70', 1),
('mehul', '202cb962ac59075b964b07152d234b70', 2),
('thakur', '202cb962ac59075b964b07152d234b70', 3),
('arjun123', '202cb962ac59075b964b07152d234b70', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
