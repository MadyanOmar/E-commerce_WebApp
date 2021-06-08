-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 12, 2020 at 03:08 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tsheel`
--

-- --------------------------------------------------------

--
-- Table structure for table `bought`
--

CREATE TABLE `bought` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `state` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bought`
--

INSERT INTO `bought` (`user_id`, `product_id`, `state`) VALUES
(10001, 10001, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `release_year` varchar(4) NOT NULL,
  `used` tinyint(1) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `type`, `name`, `release_year`, `used`, `price`, `image`, `description`) VALUES
(10001, 'Cars', 'Hyundai Tucson', '2015', 0, 158530, 'Tucson.jpeg', 'This car is a grey SUV, suitable for fitting multiple passengers. It is a great family car and has wonderful sets of functionalities.'),
(10002, 'Cars', 'Nissan Patrol', '2012', 0, 222827, 'NissanPatrol.jpg', 'The Nissan Patrol is a great car for Desert trips, and offroad drive. It performs incredibly well and can fit up to 6 passengers.'),
(10003, 'Ovens', 'LG LTE4815BD\r\n', '2020', 0, 13703, 'LGOven.jpg', 'The LG Oven is quite compact and small but can heat up to 400 degrees fahrenheit. It is black in color.'),
(10004, 'Electronics', 'Razer Deathadder', '2012', 0, 300, 'Deathaddermouse.jpg', 'The razer deathadder mouse has a DPI range from 200DPI to 3600DPI. It is good for FPS games and has 2 extra buttons on the side.'),
(10005, 'Cars', 'Range Rover', '2013', 1, 213000, 'RangeRover.jpg', 'The range rover sport is brand new and has a metallic red paint job. It is a very fast car that can accommodate up to 5 passengers.'),
(10006, 'Cars', 'Mercedes Benz', '2019', 0, 430570, 'MercedesBenz.jpg', 'The Mercedes Benz is a luxurious classy car that can fit up to 4 passengers and is a very fast city car that can travel up to 198 miles per hour'),
(10007, 'Fridges', 'LG GRX29FTQKL', '2010', 0, 9825, 'LGFridge.jpg', 'The LG GRX29FTQKL comes with a water dispenser, a see through glass to allow vision of what is inside the fridge and includes a freezer.'),
(10008, 'TVs', 'Haier LE50U6900UG', '2019', 0, 11299, 'Haier.jpg', 'The Haier LE50U6900UG displays with a 4k resolution and is a 50 inch screen. You can use your mobile to control the TV.'),
(10009, 'Fridges', 'Siemens KG76NDI30M', '2012', 1, 8769, 'GreyFridge.jpg', 'The Siemens KG76NDI30M has a capacity of 578 litres, has 2 freezer drawers and has 3 safety glass shelves of which 2 are height adjustable'),
(10010, 'Fridges', 'Samsung RT75K6540SL', '2017', 0, 12050, 'SamsungFridge.jpg', 'The Samsung RT75K6540SL has a capacity of 750 litres, weighs 93kg and is made of stainless platinum.'),
(10011, 'Ovens', 'Miele H2265-1', '2009', 0, 5699, 'MieleOven.jpg', 'The Miele H2265-1 comes with a universal tray, a baking and roasting rack and some removable side runners'),
(10012, 'Ovens', 'Logik LBFANX16', '2017', 0, 12099, 'LogikOven.jpg', 'The Logik LBFANX16 is an electric oven with a capacity of 66 litres and can be cleaned quickly and easily thanks to a durable enamel coating that can be wiped clean in moments.'),
(10013, 'Ovens', 'Westinghouse 900mm', '2017', 0, 14520, 'WestingHouseOven.jpg', 'The Westinghouse 900mm (Dark) comes with airfry and a twin fan system that offers heat distribution throughout the oven for precise cooking results.'),
(10014, 'TVs', 'Hitachi 22inch', '2006', 1, 799, 'Hitachi22Inch.jpg', 'The Hitachi 22inch Combi TV comes with a built in DVD player and is wall mountable. It has a refresh rate of 50hz and max resolution of 1080p.'),
(10015, 'TVs', 'Bush DLED32HDS', '2018', 1, 4500, 'BushSmart.jpg', 'Bush DLED32HDS is capable of streaming shows on apps like Netflix and Prime Video or watch a wide range of channels straight out the box with Freeview Play.'),
(10016, 'Electronics', 'Cougar Immersati', '2016', 0, 289, 'CougarHeadset.jpg', 'Immersa Ti is a 40mm-driver stereo headset that features high-end features such as titanium-coated driver diaphragms, an 9.7mm cardioid microphone and extra-sized earpads for enhanced isolation and comfort.'),
(10017, 'Electronics', 'SeaGate HDD', '2018', 0, 345, 'Seagate2tbhdd.jpg', 'The 2TB SkyHawk Surveillance SATA III 3.5\" Internal Hard Drive from Seagate is designed to withstand the stresses placed on it in a 24/7 surveillance system with 1 to 8 drive bays. With support for up to 64 high-definition surveillance cameras, this 2TB hard drive can hold a large amount of data and gives you the ability to upgrade and expand your security'),
(10018, 'Electronics', 'Rode Microphone', '2007', 0, 239, 'Rodemic.jpg', 'Features The RODE NT1-A 1 cardioid condenser microphone has become an industry standard delivering the warmth, extended dynamic range, clarity and high SPL capability typically only featured on some of the most expensive microphones. With a self noise level of only 5dBA.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(18) NOT NULL,
  `password` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`firstname`, `lastname`, `id`, `email`, `username`, `password`) VALUES
('Ahmed', 'Adel', 10001, 'ahmed1988@gmail.com', 'AhmedAdel33', 'mariokart64'),
('Madyan', 'Bagsheir', 10002, 'madoo88@outlook.com', 'madyan1999', 'destiny2');

-- --------------------------------------------------------

--
-- Table structure for table `user_product`
--

CREATE TABLE `user_product` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `state` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_product`
--

INSERT INTO `user_product` (`user_id`, `product_id`, `state`) VALUES
(10002, 10003, 1),
(10002, 10004, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bought`
--
ALTER TABLE `bought`
  ADD PRIMARY KEY (`user_id`,`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_product`
--
ALTER TABLE `user_product`
  ADD PRIMARY KEY (`user_id`,`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10019;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10003;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
