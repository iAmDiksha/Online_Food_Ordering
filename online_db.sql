-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2023 at 07:41 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(3) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin123@gmail.com', '1q2w3e');

-- --------------------------------------------------------

--
-- Table structure for table `cancel_order`
--

CREATE TABLE `cancel_order` (
  `id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `name` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cancel_order`
--

INSERT INTO `cancel_order` (`id`, `user_id`, `name`, `email`, `reason`, `date`) VALUES
(2, 5, 'Riya Jain', 'ria89@gmail.com', ' I do not need it. ', '2023-01-18'),
(3, 4, 'Pankaj Sharma', 'pankaj45@gmail.com', 'Sorry, but it isn\'t required right now.\r\nI will again make an order if it is required.  ', '2023-01-18');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(4) NOT NULL,
  `cname` varchar(35) NOT NULL,
  `cimg` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cname`, `cimg`) VALUES
(1, 'Drinks', 'drinks.jpg'),
(2, 'Chaat', 'chaat.png'),
(3, 'Burger', 'burger.png'),
(4, 'Paratha', 'paratha.png'),
(5, 'Pasta', 'pasta.png'),
(6, 'Pizza', 'pizza.png'),
(7, 'Sandwich', 'sandwich.png'),
(8, 'Pavbhaji', 'pavbhaji.png'),
(9, 'Noodles', 'noodles.png');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `fid` int(5) NOT NULL,
  `fname` varchar(35) NOT NULL,
  `fprice` int(5) NOT NULL,
  `fimg` varchar(35) NOT NULL,
  `fcategory` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`fid`, `fname`, `fprice`, `fimg`, `fcategory`) VALUES
(1, 'Mango Juice', 25, 'mango_juice.jpg', 'Drinks'),
(2, 'chinese Noodles', 40, 'chinesenoodles.jpg', 'Noodles'),
(3, 'Pav Bhaji', 30, 'pavbhaji1.jpg', 'Pavbhaji'),
(4, 'Sandwich', 20, 'sand.jpg', 'Sandwich'),
(5, 'Double Cheese Pizza', 399, 'doublecheesepizza.jpg', 'Pizza'),
(6, 'Vegetable Pasta', 30, 'vegpasta.jpg', 'Pasta'),
(7, 'Vegetable Noodles', 35, 'vegnoodles.jpg', 'Noodles'),
(8, 'Aloo Paratha', 20, 'alooparatha.jpg', 'Paratha'),
(9, 'Burger', 35, 'burger1.jpg', 'Burger'),
(10, 'Aloo Chaat', 30, 'aloochaat.jpg', 'Chaat'),
(13, 'coffee', 30, 'coffee.png', 'Drinks');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(5) NOT NULL,
  `name` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `phone`, `message`) VALUES
(3, 'Priya', 'priya@gmail.com', '7896443562', 'Amazing service! I like it.'),
(5, 'harry sharma', 'harry12@email.com', '9956342563', 'This is the best online platform.'),
(8, 'ranu', 'ranu@gmail.com', '8856442562', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `ordered_items`
--

CREATE TABLE `ordered_items` (
  `id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `name` varchar(35) NOT NULL,
  `quantity` int(20) NOT NULL,
  `price` int(5) NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordered_items`
--

INSERT INTO `ordered_items` (`id`, `user_id`, `name`, `quantity`, `price`, `time`, `date`) VALUES
(3, 5, 'Double Cheese Pizza', 1, 399, '19:29:31', '2023-01-13'),
(6, 6, 'Mango Juice', 2, 25, '20:16:49', '2023-01-13'),
(12, 6, 'chinese Noodles', 1, 40, '23:21:01', '2023-01-19'),
(13, 6, 'Pav Bhaji', 3, 30, '23:21:01', '2023-01-19'),
(14, 6, 'Mango Juice', 2, 25, '23:21:01', '2023-01-19'),
(15, 5, 'Aloo Samosa', 4, 10, '12:13:24', '2023-01-23');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `name` varchar(35) NOT NULL,
  `mobile_number` varchar(10) NOT NULL,
  `email` varchar(35) NOT NULL,
  `method` varchar(35) NOT NULL,
  `address` varchar(250) NOT NULL,
  `total_price` int(10) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` time NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(35) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `mobile_number`, `email`, `method`, `address`, `total_price`, `date`, `time`, `payment_status`) VALUES
(5, 5, 'Riya Jain', '8967829067', 'ria89@gmail.com', 'Cash on delivery', '12, abc road, gandhi nagar, chittorgarh', 399, '2023-01-13', '19:29:31', 'Completed'),
(7, 6, 'Charvi kapur', '7767854067', 'charvi123@gmail.com', 'Cash on delivery', '67, near nehru park, adarsh nagar, Chittorgarh', 50, '2023-01-13', '20:16:49', 'Completed'),
(12, 6, 'Charvi kapur', '7767854067', 'charvi123@gmail.com', 'Cash on delivery', '89, adarsh nagar, Chittorgarh', 180, '2023-01-19', '23:21:01', 'Pending'),
(13, 5, 'Riya Jain', '8967829067', 'ria89@gmail.com', 'Cash on delivery', 'near vision college, chittorgarh', 40, '2023-01-23', '12:13:24', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `sno` int(5) NOT NULL,
  `full_name` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `mobile_number` varchar(10) NOT NULL,
  `password` varchar(25) NOT NULL,
  `cpassword` varchar(25) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`sno`, `full_name`, `email`, `mobile_number`, `password`, `cpassword`, `date`) VALUES
(2, 'karina', 'karina123@gmail.com', '9467899067', '123', '123', '2022-12-20 11:44:24'),
(4, 'Pankaj Sharma', 'pankaj45@gmail.com', '9447894378', '098', '098', '2023-01-05 23:18:21'),
(5, 'Riya Jain', 'ria89@gmail.com', '8967829067', 'qwe', 'qwe', '2023-01-06 00:04:07'),
(6, 'Charvi kapur', 'charvi123@gmail.com', '7767854067', 'xyz', 'xyz', '2023-01-13 20:04:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cancel_order`
--
ALTER TABLE `cancel_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `cname` (`cname`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordered_items`
--
ALTER TABLE `ordered_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cancel_order`
--
ALTER TABLE `cancel_order`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `fid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ordered_items`
--
ALTER TABLE `ordered_items`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `sno` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
