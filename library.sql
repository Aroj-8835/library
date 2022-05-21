-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2022 at 05:11 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `author` varchar(100) NOT NULL,
  `quantity` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `author`, `quantity`) VALUES
(1, 'Muna madan', 'Laxmi Prasad Devkota', 7),
(2, 'Jiwan kada ki ful', 'Jhamak kumari', 13),
(3, 'The alchemist', 'Paulo coelho', 12),
(5, 'A brief hostory of time', 'Stephen hawkings', 32),
(6, 'Object oriened progamming with C++', 'Mac graw hill', 53),
(7, 'Engineering mathematics', 'HC Verma', 24),
(8, 'Dosi chasma', 'Bisweshwar prasad koirala ', 80),
(9, 'Computer Network', 'Tanenbaun', 50),
(12, 'Theory of computation', 'Mac graw hill', 45),
(14, 'Multimedia computing and Technology', 'prasanna', 25),
(15, 'half girlfriend', 'chetan bhagat', 5),
(18, 'aroj chaudhary', 'Mac graw hill', 25),
(19, 'aroj chaudhary', 'Mac graw hill', 25),
(20, 'aroj chaudhary', 'Mac graw hill', 25),
(21, 'aroj chaudhary', 'Mac graw hill', 25),
(22, 'aroj chaudhary', 'Mac graw hill', 25),
(23, 'Darshan Thapa', 'HC Verma', 5),
(24, 'Karan Bhagat', 'jhamak kumari', 50),
(25, 'prasanna chapagain', 'HC Verma', 25),
(26, 'Pradeep yadav', 'Paulo coelho', 80);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`) VALUES
(1, 'Computer'),
(2, 'Electronics and communication'),
(3, 'Civil'),
(4, 'Mechanical'),
(7, 'Aeronautics'),
(8, 'Electrical and electronics'),
(11, 'Software Engineering'),
(12, 'BBA'),
(13, 'MBA'),
(18, 'Darshan Thapa'),
(19, 'aroj chaudhary'),
(21, 'heronautics'),
(23, 'Karan Bhagat'),
(24, 'Darshan Thapa'),
(26, 'Pradeep yadav');

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE `issue` (
  `id` int(11) NOT NULL,
  `book_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `issue_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue`
--

INSERT INTO `issue` (`id`, `book_id`, `student_id`, `issue_date`) VALUES
(5, 2, 11, '2021-02-10'),
(6, 8, 11, '2021-02-25'),
(8, 5, 11, '2021-02-25'),
(9, 1, 11, '2021-02-25'),
(10, 8, 16, '2021-02-25'),
(11, 6, 23, '2021-02-25'),
(12, 7, 19, '2021-02-25'),
(14, 2, 16, '2021-02-25'),
(20, 6, 18, '2021-02-25'),
(21, 1, 23, '2021-02-25'),
(22, 1, 16, '2021-02-26'),
(24, 1, 18, '2021-02-26'),
(25, 2, 18, '2021-02-26'),
(26, 6, 16, '2021-02-28'),
(27, 7, 11, '2021-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(11) COLLATE utf8mb4_bin NOT NULL,
  `category` varchar(11) COLLATE utf8mb4_bin NOT NULL,
  `category_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `return`
--

CREATE TABLE `return` (
  `id` int(11) NOT NULL,
  `book_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `issued_date` date NOT NULL,
  `return_date` date NOT NULL,
  `fine` varchar(10) NOT NULL,
  `exceeded_days` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `return`
--

INSERT INTO `return` (`id`, `book_id`, `student_id`, `issued_date`, `return_date`, `fine`, `exceeded_days`) VALUES
(7, 11, 2021, '2021-02-24', '0000-00-00', '', '14'),
(8, 11, 2021, '2021-02-24', '0000-00-00', '', '14'),
(9, 2, 11, '2021-02-10', '2021-02-25', '', '15'),
(10, 3, 7, '2021-02-25', '2021-02-25', '', '0'),
(11, 3, 13, '2021-02-25', '2021-02-25', '', '0'),
(12, 5, 19, '2021-02-25', '2021-02-25', '', '0'),
(13, 5, 18, '2021-02-25', '2021-02-25', '', '0'),
(14, 5, 17, '2021-02-25', '2021-02-25', '', '0'),
(15, 5, 16, '2021-02-25', '2021-02-25', '', '0'),
(16, 5, 15, '2021-02-25', '2021-02-25', '', '0'),
(17, 1, 23, '2021-02-26', '2021-02-26', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `contact_no` varchar(12) NOT NULL,
  `address` varchar(50) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `faculty_id`, `contact_no`, `address`, `is_active`) VALUES
(11, 'Ribesh Basnet', 7, '98011252', 'Jamungachhi', 0),
(16, 'Karan Bhattarai', 2, '984208450', 'Jamungachhi', 1),
(18, 'Shyam Majhi', 3, '9842201212', 'Chimdi', 1),
(19, 'Pradeep Yadav', 4, '45482115', 'Pulchowk', 1),
(20, 'Darshan Thapa', 2, '9542078121', 'Itahri', 1),
(21, 'Dinesh Basnet', 4, '45215525', 'Samjhana chowk', 1),
(23, 'Anshika Gupta', 1, '9854225566', 'Shanti chowk', 1),
(26, 'Sashank Jha', 1, '9856456152', 'Devkota Chowk', 1),
(27, 'Salman Khan', 7, '095642847522', 'Mumbai', 1),
(28, 'Ram thapa', 2, '454445', 'Bargachhi', 1),
(31, 'Niraj Rajbanshi', 8, '854555854', 'Milanchowk', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(512) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `active`) VALUES
(1, 'library', 'd521f765a49c72507257a2620612ee96', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `return`
--
ALTER TABLE `return`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
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
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `issue`
--
ALTER TABLE `issue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `return`
--
ALTER TABLE `return`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
