-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2024 at 06:50 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tours`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `title`, `content`, `created_at`) VALUES
(1, 'Who We Are?', 'At Travel Dream Company, we are not just travel agents;we are architects of your dream vacations and guardians of your travel peace of mind.\r\nBorn from a passion for globe-trotting and a commitment to create unforgettable journeys, we stand as your gateway to a world waiting to be discovered.', '2024-04-09 04:37:10');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$SYOMEeHrBHKtdESDrGj.Eu37G1OXpRA2lXhEruqrvhgOrETmlMtvm');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `booking_number` bigint(12) DEFAULT NULL,
  `EmailId` varchar(255) NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `booking_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `message` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `payment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `booking_number`, `EmailId`, `booking_id`, `from_date`, `to_date`, `booking_time`, `message`, `status`, `payment`) VALUES
(1, 910477254, 'ronikgorasiya@gmail.com', 1, '2024-04-20', '2024-04-24', '2024-04-19 07:09:36', '55', 0, 1),
(2, 901971168, 'ronikgorasiya@gmail.com', 1, '2024-04-23', '2024-04-27', '2024-04-21 06:55:54', 'hello', 0, 1),
(3, 527310403, 'ronikgorasiya@gmail.com', 1, '2024-04-22', '2024-04-26', '2024-04-21 07:09:56', '44', 0, 1),
(4, 325851350, 'ronikgorasiya@gmail.com', 1, '2024-04-15', '2024-04-19', '2024-04-21 07:12:46', 'hello', 0, 1),
(5, 488554750, 'ronikgorasiya@gmail.com', 1, '2024-04-23', '2024-04-27', '2024-04-21 07:13:52', 'ss', 0, 1),
(6, 857122862, 'ronikgorasiya@gmail.com', 1, '2024-04-27', '2024-05-01', '2024-04-21 07:21:53', 'ss', 0, 1),
(7, 883896569, 'ronikgorasiya@gmail.com', 1, '2024-04-23', '2024-04-27', '2024-04-21 07:22:32', 'ss', 0, 1),
(8, 693970801, 'ronikgorasiya@gmail.com', 1, '2024-04-23', '2024-04-27', '2024-04-21 07:23:03', 'ss', 0, 1),
(9, 836247204, 'ronikgorasiya@gmail.com', 1, '2024-04-27', '2024-05-01', '2024-04-21 07:28:26', '26', 0, 1),
(10, 851539138, 'ronikgorasiya@gmail.com', 3, '2024-04-24', '2024-04-30', '2024-04-21 07:33:41', 'rr', 0, 1),
(11, 277929040, 'ronikgorasiya@gmail.com', 3, '2024-04-23', '2024-04-29', '2024-04-21 07:37:41', '33', 0, 1),
(12, 265637471, 'ronikgorasiya@gmail.com', 1, '2024-04-27', '2024-05-01', '2024-04-25 03:53:39', 'er', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bus_booking`
--

CREATE TABLE `bus_booking` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phoneno` varchar(20) DEFAULT NULL,
  `from_location` varchar(255) DEFAULT NULL,
  `to_location` varchar(255) DEFAULT NULL,
  `no_of_seats` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `buid` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `payment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus_booking`
--

INSERT INTO `bus_booking` (`id`, `booking_id`, `name`, `phoneno`, `from_location`, `to_location`, `no_of_seats`, `date`, `time`, `userEmail`, `buid`, `status`, `payment`) VALUES
(1, 716647428, 'ronik', '123456', 'Mumbai', 'Ahmedabad', 5, '2024-04-23', '01:44:00', 'ronikgorasiya@gmail.com', '1', 0, 1),
(2, 794537004, 'ronik', '123456', 'Mumbai', 'Ahmedabad', 5, '2024-04-23', '00:16:00', 'ronikgorasiya@gmail.com', '1', 0, 1),
(3, 305266723, 'ronik', '123456', 'Mumbai', 'Ahmedabad', 5, '2024-04-24', '09:23:00', 'ronikgorasiya@gmail.com', '1', 0, 1),
(4, 279456488, 'ronik', '123456', 'Mumbai', 'Ahmedabad', 44, '2024-04-27', '09:28:00', 'ronikgorasiya@gmail.com', '1', 0, 0),
(5, 939387820, 'ronik', '123456', 'Delhi', 'Ahmedabad', 44, '2024-04-23', '11:29:00', 'ronikgorasiya@gmail.com', '2', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bus_package`
--

CREATE TABLE `bus_package` (
  `id` int(11) NOT NULL,
  `bus_name` varchar(255) NOT NULL,
  `from_location` varchar(255) NOT NULL,
  `to_location` varchar(255) NOT NULL,
  `distance` float NOT NULL,
  `money` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus_package`
--

INSERT INTO `bus_package` (`id`, `bus_name`, `from_location`, `to_location`, `distance`, `money`) VALUES
(1, 'Gujarat Express', 'Mumbai', 'Ahmedabad', 500, '700.00'),
(2, 'Ahmedabad Voyager', 'Delhi', 'Ahmedabad', 1000, '1200.00'),
(3, 'Gujarat Explorer', 'Pune', 'Surat', 400, '600.00'),
(4, 'Sabarmati Shuttle', 'Jaipur', 'Ahmedabad', 800, '1000.00'),
(5, 'Saurashtra Cruiser', 'Kolkata', 'Rajkot', 1200, '1500.00'),
(6, 'Gujarat Connector', 'Delhi', 'Vadodara', 1100, '1300.00'),
(7, 'Ahmedabad Express', 'Mumbai', 'Ahmedabad', 500, '800.00'),
(8, 'Kutch Cruiser', 'Varanasi', 'Bhuj', 1500, '1800.00'),
(9, 'Gujarat Rapid', 'Chennai', 'Surat', 1400, '1600.00'),
(10, 'Somnath Shuttle', 'Kolkata', 'Veraval', 1600, '2000.00'),
(11, 'Gujarat Shuttle', 'Bangalore', 'Ahmedabad', 1200, '1400.00'),
(12, 'Surat Shuttle', 'Hyderabad', 'Surat', 1300, '1500.00'),
(13, 'Girnar Cruiser', 'Lucknow', 'Junagadh', 1700, '2000.00'),
(14, 'Ahmedabad Voyager', 'New Delhi', 'Ahmedabad', 1000, '1200.00'),
(15, 'Jamnagar Cruiser', 'Chandigarh', 'Jamnagar', 1800, '2200.00'),
(16, 'Gujarat Express', 'Indore', 'Ahmedabad', 800, '1000.00'),
(17, 'Ahmedabad Shuttle', 'Patna', 'Ahmedabad', 1500, '1800.00'),
(18, 'Gujarat Rapid', 'Kanpur', 'Ahmedabad', 1200, '1500.00'),
(19, 'Saurashtra Shuttle', 'Jaipur', 'Porbandar', 1400, '1700.00'),
(20, 'Bhavnagar Voyager', 'Kolkata', 'Bhavnagar', 1700, '2000.00');

-- --------------------------------------------------------

--
-- Table structure for table `contactinfo`
--

CREATE TABLE `contactinfo` (
  `id` int(11) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactinfo`
--

INSERT INTO `contactinfo` (`id`, `Address`, `email`, `contact`) VALUES
(1, 'Bmu,Vesu,surat-6', 'travelt032@gmail.com', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `message`, `submitted_at`) VALUES
(1, 'ronik', ' ronikgorasiya@gmail.com', 'ss', '2024-04-08 11:10:45'),
(2, 'ronik', ' ronikgorasiya@gmail.com', 'ss', '2024-04-08 11:48:15'),
(3, 'ronik', ' ronikgorasiya@gmail.com', 'rfrgg', '2024-04-13 12:45:21'),
(4, 'ronik', ' Ronikgorasiya@gmail.com', 'lll', '2024-04-13 12:51:42'),
(5, 'ronik', ' ronikgorasiya@gmail.com', 'ww', '2024-04-19 17:00:28'),
(6, 'ronik', ' Ronikgorasiya@Gmail.Com', 'hh', '2024-04-19 17:00:58'),
(7, 'ronik', ' ronikgorasiya@gmail.com', 'gg', '2024-04-19 17:03:12'),
(8, 'ronik', ' ronikgorasiya@gmail.com', '22', '2024-04-20 02:00:06');

-- --------------------------------------------------------

--
-- Table structure for table `flight_booking`
--

CREATE TABLE `flight_booking` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneno` varchar(20) NOT NULL,
  `passportid` varchar(255) NOT NULL,
  `passengers` int(11) NOT NULL,
  `birthdate` date NOT NULL,
  `emailId` varchar(255) NOT NULL,
  `fid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `payment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flight_booking`
--

INSERT INTO `flight_booking` (`id`, `booking_id`, `name`, `email`, `phoneno`, `passportid`, `passengers`, `birthdate`, `emailId`, `fid`, `status`, `payment`) VALUES
(1, 488982422, 'ronik', 'ronikgorasiya@gmail.com', '123456789', '121212', 1, '2002-03-24', 'ronikgorasiya@gmail.com', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `flight_package`
--

CREATE TABLE `flight_package` (
  `id` int(11) NOT NULL,
  `flightnumber` varchar(20) DEFAULT NULL,
  `airline` varchar(50) DEFAULT NULL,
  `take_off` varchar(50) DEFAULT NULL,
  `land` varchar(100) DEFAULT NULL,
  `destination` varchar(100) DEFAULT NULL,
  `take_offtime` time DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flight_package`
--

INSERT INTO `flight_package` (`id`, `flightnumber`, `airline`, `take_off`, `land`, `destination`, `take_offtime`, `price`) VALUES
(1, 'AI101', 'Air India', '2024-04-20', 'Delhi', 'Ahmedabad', '08:00:00', '5000.00'),
(2, '6E202', 'IndiGo', '2024-04-21', 'Mumbai', 'Surat', '09:30:00', '4500.00'),
(3, 'SG303', 'SpiceJet', '2024-04-22', 'Bengaluru', 'Vadodara', '11:00:00', '5500.00'),
(4, 'G832', 'GoAir', '2024-04-23', 'Chennai', 'Rajkot', '12:30:00', '4800.00'),
(5, 'JA404', 'Jet Airways', '2024-04-24', 'Kolkata', 'Bhavnagar', '14:00:00', '5200.00'),
(6, 'AI105', 'Air India', '2024-04-25', 'Delhi', 'Surat', '08:30:00', '5100.00'),
(7, '6E206', 'IndiGo', '2024-04-26', 'Mumbai', 'Vadodara', '10:00:00', '4600.00'),
(8, 'SG307', 'SpiceJet', '2024-04-27', 'Bengaluru', 'Rajkot', '11:30:00', '5700.00'),
(9, 'G836', 'GoAir', '2024-04-28', 'Chennai', 'Bhavnagar', '13:00:00', '4900.00'),
(10, 'JA408', 'Jet Airways', '2024-04-29', 'Kolkata', 'Ahmedabad', '14:30:00', '5300.00'),
(11, 'AI109', 'Air India', '2024-04-30', 'Delhi', 'Vadodara', '09:00:00', '5200.00'),
(12, '6E210', 'IndiGo', '2024-05-01', 'Mumbai', 'Rajkot', '10:30:00', '4700.00'),
(13, 'SG311', 'SpiceJet', '2024-05-02', 'Bengaluru', 'Bhavnagar', '12:00:00', '5800.00'),
(14, 'G840', 'GoAir', '2024-05-03', 'Chennai', 'Ahmedabad', '13:30:00', '5000.00'),
(15, 'JA412', 'Jet Airways', '2024-05-04', 'Kolkata', 'Surat', '15:00:00', '5400.00'),
(16, 'AI113', 'Air India', '2024-05-05', 'Delhi', 'Vadodara', '09:30:00', '5300.00'),
(17, '6E214', 'IndiGo', '2024-05-06', 'Mumbai', 'Rajkot', '11:00:00', '4800.00'),
(18, 'SG315', 'SpiceJet', '2024-05-07', 'Bengaluru', 'Bhavnagar', '12:30:00', '5900.00'),
(19, 'G844', 'GoAir', '2024-05-08', 'Chennai', 'Ahmedabad', '14:00:00', '5100.00'),
(20, 'JA416', 'Jet Airways', '2024-05-09', 'Kolkata', 'Surat', '15:30:00', '5500.00');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_booking`
--

CREATE TABLE `hotel_booking` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `guests` int(11) NOT NULL,
  `roomno` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `Emailid` varchar(255) NOT NULL,
  `hid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `payment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel_booking`
--

INSERT INTO `hotel_booking` (`id`, `booking_id`, `name`, `email`, `contact`, `guests`, `roomno`, `check_in`, `check_out`, `Emailid`, `hid`, `status`, `payment`) VALUES
(1, 788533453, 'ronik', 'ronikgorasiya@gmail.com', '9727168583', 2, 201, '2024-04-24', '2024-04-27', 'ronikgorasiya@gmail.com', 1, 0, 1),
(2, 943442606, 'ronik', 'ronikgorasiya@gmail.com', '9727168583', 1, 101, '2024-04-26', '2024-04-28', 'ronikgorasiya@gmail.com', 1, 0, 1),
(3, 210366014, 'ronik', 'ronikgorasiya@gmail.com', '9727168583', 2, 201, '2024-04-27', '2024-05-04', 'ronikgorasiya@gmail.com', 2, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_package`
--

CREATE TABLE `hotel_package` (
  `id` int(11) NOT NULL,
  `hotelname` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `roomtype` varchar(100) DEFAULT NULL,
  `money` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel_package`
--

INSERT INTO `hotel_package` (`id`, `hotelname`, `address`, `roomtype`, `money`) VALUES
(1, 'dershan', 'kapodra,near reliance petrol,surat', 'firstclass', '500.00'),
(2, 'Gujarat Grand Hotel', 'Ahmedabad', 'Standard', '1500.00'),
(3, 'Royal Palace Hotel', 'Surat', 'Deluxe', '2500.00'),
(4, 'Mount View Resort', 'Gir National Park', 'Suite', '3500.00'),
(5, 'Sunrise Beach Resort', 'Dwarka', 'Cottage', '2000.00'),
(6, 'Ocean View Hotel', 'Porbandar', 'Standard', '1800.00'),
(7, 'Golden Sands Resort', 'Somnath', 'Deluxe', '2800.00'),
(8, 'Paradise Hotel', 'Vadodara', 'Standard', '1600.00'),
(9, 'Hilltop Retreat', 'Saputara', 'Deluxe', '3000.00'),
(10, 'City Centre Hotel', 'Ahmedabad', 'Standard', '1700.00'),
(11, 'Riverfront Resort', 'Bharuch', 'Suite', '3200.00'),
(12, 'Green Valley Inn', 'Vadodara', 'Standard', '1900.00'),
(13, 'Coastal Retreat', 'Diu', 'Deluxe', '2700.00'),
(14, 'Hillside Villa', 'Saputara', 'Standard', '1800.00'),
(15, 'Marina View Hotel', 'Daman', 'Deluxe', '2900.00'),
(16, 'Riverside Resort', 'Narmada', 'Standard', '2000.00'),
(17, 'Sunset View Lodge', 'Diu', 'Cottage', '2200.00'),
(18, 'Palm Beach Hotel', 'Somnath', 'Standard', '2100.00'),
(19, 'Lakeview Resort', 'Vadodara', 'Deluxe', '3200.00'),
(20, 'Mountain Retreat', 'Saputara', 'Standard', '1900.00'),
(21, 'Beachfront Hotel', 'Diu', 'Suite', '3500.00');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` int(11) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `pax` int(11) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `inquiry_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `destination`, `pax`, `start`, `end`, `inquiry_date`) VALUES
(1, 'surat', 1, '2024-04-13', '2024-04-15', '2024-04-06 12:41:55'),
(2, 'abc', 10, '2024-05-21', '2024-05-28', '2024-04-06 12:47:16'),
(3, 'as', 33, '2024-04-10', '2024-04-11', '2024-04-09 05:44:23'),
(4, 'greece', 2, '2024-04-10', '2024-04-23', '2024-04-09 06:21:11');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `package_location` varchar(255) DEFAULT NULL,
  `package_price` decimal(10,2) DEFAULT NULL,
  `package_features` text DEFAULT NULL,
  `package_details` text DEFAULT NULL,
  `days` int(11) NOT NULL,
  `img1` varchar(120) DEFAULT NULL,
  `img2` varchar(120) DEFAULT NULL,
  `img3` varchar(120) DEFAULT NULL,
  `img4` varchar(120) DEFAULT NULL,
  `img5` varchar(120) DEFAULT NULL,
  `img6` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package_name`, `package_location`, `package_price`, `package_features`, `package_details`, `days`, `img1`, `img2`, `img3`, `img4`, `img5`, `img6`) VALUES
(1, 'manali', 'Manali Local Sightseeing,Solang Valley/ Rohtang Pass upto snowline as per NGT,Kullu Valley – Naggar Castle - Delhi', '6600.00', 'Volvo bus', 'DAY 1\r\n\r\nDelhi – Manali (12 – 15 hrs, 570 kms)\r\nArrive at Delhi, move to Volvo pickup point.Reach there by 5 p.m. and proceed to Manali to rejuvenate yourself with beautiful mountains & nature.\r\n\r\nDAY 2\r\n\r\nManali Local Sightseeing(3 – 4 hrs)\r\nReach Manali in the morning, mmet and greet with our representative.Transfer to hotel in the cab. Checkinto hotel and have rest. Afternoon visit Hidimba Devi temple, built in 1553 A.D. dedicated to Devi Hidimba & is built around a cave where Devi Hidimba performed meditation. Later visit Club house, Tibetan Monastery & Vashisht village, famous for its hot water sulphur springs.Visit van vihar and mall road.By evening return to your hotel.Dinner and overnight stay at the hotel.\r\n\r\nDAY 3\r\n\r\nManali – Solang Valley/ Rohtang Pass upto snowline as per NGT\r\nAfter breakfast, drive to Rohtang Pass upto snowline.Visit Kothi Gorge, Gulaba or visit solang valley situated between solang village and beas Kund(Rohtang Pass is closed from December to May).Solangvalley have a panoramic view of snowcaped mountains and glaciers. Enjoy various adventure activities here like paragliding, zorbing, gondola ride, trekking, skiing, horse riding, yak riding etc. on your own expense.By evening return to hotel.Dinner and overnight stay at the hotel.\r\n\r\nDAY 4\r\n\r\nManali – Kullu Valley – Naggar Castle - Delhi\r\nAfter breakfast, drive to Kullu. Visit ancient Shiva temple at Jagatsukh village. Visit Kais Tibetan monastery and fish farm. Reach Naggar, the old capital of Kullu. Visit Naggar castle, Roerich art gallery and museum. Visit rafting point and Kullu shawl factory. Evening drop at Vaishno Devi temple in Kullu for onward journey towards Delhi.', 4, 'kalen-emsley-Bkci_8qcdvQ-unsplash.jpg', 'vincent-van-zalinge-vUNQaTtZeOo-unsplash.jpg', 'luca-bravo-VowIFDxogG4-unsplash.jpg', 'eberhard-grossgasteiger-y2azHvupCVo-unsplash.jpg', 'kalen-emsley-_LuLiJc1cdo-unsplash.jpg', 'v2osk-1Z2niiBPg5A-unsplash.jpg'),
(3, 'Ooty', 'Manali Local Sightseeing,Solang Valley/ Rohtang Pass upto snowline as per NGT,Kullu Valley – Naggar Castle - Delhi', '7000.00', 'Volvo bus', 'DAY 1\r\n\r\nDelhi – Manali (12 – 15 hrs, 570 kms)\r\nArrive at Delhi, move to Volvo pickup point.Reach there by 5 p.m. and proceed to Manali to rejuvenate yourself with beautiful mountains & nature.\r\n\r\nDAY 2\r\n\r\nManali Local Sightseeing(3 – 4 hrs)\r\nReach Manali in the morning, mmet and greet with our representative.Transfer to hotel in the cab. Checkinto hotel and have rest. Afternoon visit Hidimba Devi temple, built in 1553 A.D. dedicated to Devi Hidimba & is built around a cave where Devi Hidimba performed meditation. Later visit Club house, Tibetan Monastery & Vashisht village, famous for its hot water sulphur springs.Visit van vihar and mall road.By evening return to your hotel.Dinner and overnight stay at the hotel.\r\n\r\nDAY 3\r\n\r\nManali – Solang Valley/ Rohtang Pass upto snowline as per NGT\r\nAfter breakfast, drive to Rohtang Pass upto snowline.Visit Kothi Gorge, Gulaba or visit solang valley situated between solang village and beas Kund(Rohtang Pass is closed from December to May).Solangvalley have a panoramic view of snowcaped mountains and glaciers. Enjoy various adventure activities here like paragliding, zorbing, gondola ride, trekking, skiing, horse riding, yak riding etc. on your own expense.By evening return to hotel.Dinner and overnight stay at the hotel.\r\n\r\nDAY 4\r\n\r\nManali – Kullu Valley – Naggar Castle - Delhi\r\nAfter breakfast, drive to Kullu. Visit ancient Shiva temple at Jagatsukh village. Visit Kais Tibetan monastery and fish farm. Reach Naggar, the old capital of Kullu. Visit Naggar castle, Roerich art gallery and museum. Visit rafting point and Kullu shawl factory. Evening drop at Vaishno Devi temple in Kullu for onward journey towards Delhi.', 6, 'manali-1941810_1280.jpg', 'manali-1941789_1280.jpg', 'manali-1941788_1280.jpg', 'trekking-1742821_1280.jpg', 'manali-2035750_1280.jpg', 'pexels-sanket-barik-7846563.jpg'),
(21, 'jammu', 'One popular tourist location in Jammu is the Vaishno Devi Temple. ', '4200.00', 'flight', 'Vaishno Devi Temple: Start your journey with a visit to the Vaishno Devi Temple, one of the holiest Hindu shrines dedicated to Goddess Vaishno Devi. The trek to the temple, situated in the Trikuta Mountains, is an essential part of the pilgrimage experience for many devotees. However, if trekking isn\'t your preference, helicopter services are available from Katra to Sanjichhat, near the temple.\r\nRaghunath Temple: Explore the Raghunath Temple complex, which consists of seven Hindu shrines dedicated to various gods and goddesses. It\'s one of the largest temple complexes in northern India and showcases exquisite architecture and intricate carvings.\r\nBahu Fort and Gardens: Visit the historic Bahu Fort, located on the banks of the Tawi River. The fort offers panoramic views of the surrounding areas and houses a temple dedicated to the Hindu goddess Kali. Nearby, you can also explore the beautiful Bahu Gardens, known for their well-maintained lawns, flowerbeds, and walking trails.\r\nMubarak Mandi Palace: Discover the grandeur of the Mubarak Mandi Palace, the former royal residence of the Dogra rulers of Jammu and Kashmir. The palace complex features a blend of architectural styles, including Mughal, Rajput, and European influences. Don\'t miss the Pink Hall, also known as the Durbar Hall, which showcases impressive chandeliers and ornate decorations.\r\nPeer Baba Dargah: Pay a visit to the Peer Baba Dargah, a revered shrine dedicated to the Sufi saint Peer Budhan Ali Shah. It\'s a place of religious significance and attracts devotees of all faiths who seek blessings and spiritual solace.\r\nAmar Mahal Palace Museum: Explore the Amar Mahal Palace Museum, which houses a remarkable collection of paintings, artifacts, and memorabilia related to the Dogra dynasty. The palace itself is an architectural marvel, with its red sandstone facade and European-style turrets.\r\nPatnitop: If you have some extra time, consider taking a day trip to Patnitop, a picturesque hill station located about 112 kilometers from Jammu. Enjoy breathtaking views of the Himalayan ranges, indulge in adventure activities like trekking and paragliding, or simply relax amidst the serene natural surroundings.', 5, 'j1.jpg', 'j2.jpg', 'j3.jpg', 'j4.jpg', 'j5.jpg', 'j6.jpg'),
(22, 'jammu', 'jammu kasmir', '5000.00', 'ff', 'wdwewrw', 0, 'eberhard-grossgasteiger-y2azHvupCVo-unsplash.jpg', 'j1.jpg', 'j2.jpg', 'j3.jpg', 'j4.jpg', 'j6.jpg'),
(23, 'kedarnath', 'Kedarnath,Temple,Gaurikund,Vasuki Tal,Triyugin,Chorabari Tal (Gandhi Sarovar)arayan Temple', '5000.00', 'bus,lunch', 'Day 1: Departure from Origin\r\n\r\nMorning: Departure from the starting point (e.g., your city or a designated meeting point) by bus.\r\nTravel through scenic routes, with breaks for refreshments and meals.\r\nEvening: Arrive at the first overnight stopover destination.\r\nDay 2: En Route to Rishikesh/Haridwar\r\n\r\nMorning: Departure from the overnight stopover.\r\nContinue the journey towards Rishikesh or Haridwar, two major cities in Uttarakhand and common starting points for pilgrimages to Kedarnath.\r\nArrive in Rishikesh/Haridwar by evening.\r\nCheck into accommodation for the night.\r\nDay 3: Rishikesh/Haridwar Exploration\r\n\r\nMorning: Sightseeing in Rishikesh/Haridwar, visiting temples, ashrams, and taking part in Ganga Aarti rituals (depending on the location).\r\nAfternoon: Free time for personal exploration or relaxation.\r\nEvening: Return to accommodation for the night.\r\nDay 4: Journey to Guptkashi\r\n\r\nMorning: Departure from Rishikesh/Haridwar towards Guptkashi, a town situated en route to Kedarnath and often used as a base for the pilgrimage.\r\nTravel through scenic mountain roads, with breaks for meals and sightseeing.\r\nEvening: Arrive in Guptkashi and check into accommodation for the night.\r\nDay 5: Guptkashi to Sonprayag\r\n\r\nMorning: Departure from Guptkashi towards Sonprayag, the starting point for the trek to Kedarnath.\r\nReach Sonprayag by midday.\r\nAfternoon: Begin the trek to Kedarnath (approximately 16 km).\r\nEvening: Arrive at Kedarnath and check into accommodation or rest houses.\r\nDay 6: Kedarnath Darshan\r\n\r\nMorning: Visit the Kedarnath Temple for darshan (worship) and explore the surrounding area.\r\nAfternoon: Free time for personal prayers, relaxation, or exploring nearby attractions.\r\nEvening: Overnight stay in Kedarnath.\r\nDay 7: Return to Sonprayag and Guptkashi\r\n\r\nMorning: Descend from Kedarnath to Sonprayag.\r\nAfternoon: Return journey to Guptkashi by bus.\r\nEvening: Arrive in Guptkashi and check into accommodation for the night.\r\nDay 8: Return Journey to Rishikesh/Haridwar\r\n\r\nMorning: Departure from Guptkashi towards Rishikesh/Haridwar.\r\nTravel through scenic routes, with breaks for meals and rest stops.\r\nEvening: Arrive in Rishikesh/Haridwar and check into accommodation for the night.\r\nDay 9: Return Journey to Origin\r\n\r\nMorning: Departure from Rishikesh/Haridwar towards the origin point.\r\nContinue the journey by bus, with breaks for meals and rest stops.\r\nEvening: Arrive back at the origin point, concluding the Kedarnath tour.', 9, 'k1.jpg', 'k2.jpg', 'k3.jpg', 'k4.jpg', 'k5.jpg', 'k6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `money` decimal(10,2) DEFAULT NULL,
  `cardholder_name` varchar(255) DEFAULT NULL,
  `card_number` varchar(16) DEFAULT NULL,
  `expiry_date` varchar(255) DEFAULT NULL,
  `cvv` varchar(4) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `booking_id`, `Email`, `money`, `cardholder_name`, `card_number`, `expiry_date`, `cvv`, `time`) VALUES
(1, 0, 'ronikgorasiya@gmail.com', '0.00', 'ronik', '1234567891012345', '03/26', '123', '2024-04-21 03:15:50'),
(2, 0, 'ronikgorasiya@gmail.com', '0.00', 'ronik', '1234567891012345', '03/28', '123', '2024-04-21 03:46:29'),
(3, 0, 'ronikgorasiya@gmail.com', '0.00', 'ronik', '123456789012345', '03/29', '123', '2024-04-21 03:48:14'),
(4, 387916888, 'ronikgorasiya@gmail.com', '2250.00', 'ronik', '1234567891012345', '03/26', '123', '2024-04-21 04:07:09'),
(5, 387916888, 'ronikgorasiya@gmail.com', '2250.00', 'ronik', '1234567891012345', '03/26', '123', '2024-04-21 04:07:41'),
(6, 488982422, 'ronikgorasiya@gmail.com', '5000.00', 'ronik', '1234567891012345', '03/26', '1234', '2024-04-21 04:13:47'),
(7, 788533453, 'ronikgorasiya@gmail.com', '1000.00', 'ronik', '1234567891012345', '03/26', '123', '2024-04-21 04:20:46'),
(8, 901971168, 'ronikgorasiya@gmail.com', '6600.00', 'ronik', '1234567891012345', '03/26', '123', '2024-04-21 07:00:06'),
(9, 693970801, 'ronikgorasiya@gmail.com', '6600.00', 'ronik', '1234567891012345', '03/26', '123', '2024-04-21 07:24:58'),
(10, 836247204, 'ronikgorasiya@gmail.com', '6600.00', 'ronik', '1234567891012345', '03/22', '123', '2024-04-21 07:29:00'),
(11, 851539138, 'ronikgorasiya@gmail.com', '7000.00', 'ronikgorasiya', '9876543210123456', '10/26', '123', '2024-04-21 07:34:24'),
(12, 277929040, 'ronikgorasiya@gmail.com', '7000.00', 'ronik', '6068565688887777', '12/26', '123', '2024-04-21 07:39:03'),
(13, 943442606, 'ronikgorasiya@gmail.com', '500.00', 'ronik gor', '1234567891012345', '03/29', '123', '2024-04-24 03:38:27'),
(14, 210366014, 'ronikgorasiya@gmail.com', '3000.00', 'ronik gor', '1234567891011234', '03/26', '123', '2024-04-24 03:53:08'),
(15, 623854516, 'ronikgorasiya@gmail.com', '12250.00', 'ronik gor ', '1234567891012345', '03/26', '123', '2024-04-25 03:32:04'),
(16, 265637471, 'ronikgorasiya@gmail.com', '6600.00', 'ronik gor', '1234567891012345', '03/26', '123', '2024-04-25 03:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `privacy_policy`
--

CREATE TABLE `privacy_policy` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `privacy_policy`
--

INSERT INTO `privacy_policy` (`id`, `title`, `content`, `created_at`) VALUES
(1, 'Privacy Policy', 'At [Company Name] Tours and Travels, we are committed to protecting your privacy and ensuring the security of your personal information. This summary outlines how we collect, use, and safeguard your data:\r\n\r\n1. Information Collection:\r\n\r\nWe collect personal information such as your name, contact details, and payment information when you book travel services through our website or communicate with us.\r\nWe may also collect non-personal information such as cookies and usage data to improve our services and website experience.\r\n2. Use of Information:\r\n\r\nWe use your personal information to process bookings, provide customer support, and communicate with you about your travel arrangements.\r\nYour information may also be used for marketing purposes, such as sending promotional offers and newsletters, but you have the option to opt-out of marketing communications.\r\n3. Data Sharing:\r\n\r\nWe may share your information with trusted third-party service providers, such as airlines, hotels, and tour operators, to fulfill your travel bookings.\r\nYour data may also be shared with legal authorities or regulators when required by law or to protect our rights and interests.\r\n4. Data Security:\r\n\r\nWe implement security measures to protect your personal information from unauthorized access, alteration, disclosure, or destruction.\r\nOur website may use encryption technology to secure online transactions and sensitive data transmission.\r\n5. Cookie Policy:\r\n\r\nWe use cookies and similar tracking technologies to analyze website traffic, improve user experience, and personalize content and advertisements.\r\nYou have the option to disable cookies through your browser settings, but this may affect the functionality of our website.\r\n6. Consent and Rights:\r\n\r\nBy using our website and services, you consent to the collection and use of your information as outlined in this privacy policy.\r\nYou have the right to access, correct, or delete your personal information, as well as to withdraw consent for certain data processing activities.\r\n7. Updates to Policy:\r\n\r\nWe may update this privacy policy periodically to reflect changes in our practices or legal requirements. Any significant changes will be notified to you through our website or other appropriate channels.\r\n8. Contact Information:\r\n\r\nIf you have any questions or concerns about our privacy policy or the handling of your personal information, please contact us at [Contact Information].', '2024-04-09 04:49:37');

-- --------------------------------------------------------

--
-- Table structure for table `termofco`
--

CREATE TABLE `termofco` (
  `id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `termofco`
--

INSERT INTO `termofco` (`id`, `title`, `content`) VALUES
(1, 'Welcome to [Company Name] Tours and Travels. Please read these terms and conditions carefully before booking any tours or travel services with us.', '\r\n\r\n1. Booking Confirmation\r\n\r\n1.1. All bookings are subject to availability and confirmation by [Company Name] Tours and Travels.\r\n\r\n1.2. A booking is considered confirmed only upon receipt of full payment or a specified deposit and issuance of a booking');

-- --------------------------------------------------------

--
-- Table structure for table `termofuse`
--

CREATE TABLE `termofuse` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `termofuse`
--

INSERT INTO `termofuse` (`id`, `title`, `content`, `created_at`) VALUES
(1, 'Terms of Use', 'Welcome to Tours and Travels! By accessing or using our website, you agree to comply with and be bound by the following terms and conditions of use. Please read these terms carefully before using our services.\r\n\r\n1. Acceptance of Terms\r\nBy accessing or using our website, you agree to be bound by these Terms of Use and all applicable laws and regulations. If you do not agree with any of these terms, you are prohibited from using or accessing this site.\r\n\r\n2. Use of Services\r\nYou agree to use the services provided by Tours and Travels solely for lawful purposes and in accordance with these Terms of Use. You shall not use our services for any illegal or unauthorized purpose nor shall you, in the use of the Service, violate any laws in your jurisdiction.\r\n\r\n3. Intellectual Property\r\nAll content included on this website, such as text, graphics, logos, button icons, images, audio clips, digital downloads, data compilations, and software, is the property of Tours and Travels or its content suppliers and is protected by international copyright laws.\r\n\r\n4. User Accounts\r\nSome services provided by Tours and Travels may require you to create an account. You are responsible for maintaining the confidentiality of your account and password and for restricting access to your computer. You agree to accept responsibility for all activities that occur under your account or password.\r\n\r\n5. Booking and Payments\r\nWhen booking travel services through our website, you agree to provide accurate and complete information and to abide by the terms and conditions of purchase imposed by any supplier with whom you elect to deal. You are responsible for all charges, fees, duties, taxes, and assessments arising out of your use of our services.\r\n\r\n6. Links to Third-Party Websites\r\nOur website may contain links to third-party websites that are not owned or controlled by Tours and Travels. We have no control over, and assume no responsibility for, the content, privacy policies, or practices of any third-party websites. You further acknowledge and agree that Tours and Travels shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with the use of or reliance on any such content, goods, or services available on or through any such websites.\r\n\r\n7. Limitation of Liability\r\nIn no event shall Tours and Travels, nor its directors, employees, partners, agents, suppliers, or affiliates, be liable for any indirect, incidental, special, consequential, or punitive damages, including without limitation, loss of profits, data, use, goodwill, or other intangible losses, resulting from (i) your access to or use of or inability to access or use the service; (ii) any conduct or content of any third party on the service; (iii) any content obtained from the service; and (iv) unauthorized access, use, or alteration of your transmissions or content, whether based on warranty, contract, tort (including negligence), or any other legal theory, whether or not we have been informed of the possibility of such damage, and even if a remedy set forth herein is found to have failed of its essential purpose.\r\n\r\n8. Governing Law\r\nThese Terms of Use shall be governed by and construed in accordance with the laws of [Your Jurisdiction], without regard to its conflict of law provisions.\r\n\r\n9. Changes to Terms\r\nTours and Travels reserves the right, at its sole discretion, to modify or replace these Terms of Use at any time. By continuing to access or use our services after any revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, please stop using the services.\r\n\r\n10. Contact Us\r\nIf you have any questions about these Terms of Use, please contact us at [Contact Information].', '2024-04-09 04:42:14');

-- --------------------------------------------------------

--
-- Table structure for table `train_booking`
--

CREATE TABLE `train_booking` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phoneno` varchar(20) NOT NULL,
  `depart_on` date NOT NULL,
  `adult` int(11) NOT NULL,
  `people` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `class_of_travel` varchar(50) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `tid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `payment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `train_booking`
--

INSERT INTO `train_booking` (`id`, `booking_id`, `name`, `phoneno`, `depart_on`, `adult`, `people`, `children`, `class_of_travel`, `userEmail`, `tid`, `status`, `payment`) VALUES
(1, 387916888, 'ronik', '123456', '2024-04-27', 3, 3, 3, 'secondClass', 'ronikgorasiya@gmail.com', 1, 0, 1),
(2, 480501716, '', '', '0000-00-00', 0, 0, 0, '------', 'ronikgorasiya@gmail.com', 1, 0, 0),
(3, 446028903, 'ronik', '9727168583', '2024-04-27', 2, 3, 2, 'secondClass', 'ronikgorasiya@gmail.com', 1, 0, 0),
(4, 623854516, 'ronik', '9727168583', '2024-04-26', 2, 4, 3, 'economy', 'ronikgorasiya@gmail.com', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `train_package`
--

CREATE TABLE `train_package` (
  `id` int(11) NOT NULL,
  `train_name` varchar(255) DEFAULT NULL,
  `starting_place` varchar(255) DEFAULT NULL,
  `destination_place` varchar(255) DEFAULT NULL,
  `fare` float DEFAULT NULL,
  `departure_time` time DEFAULT NULL,
  `arrival_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `train_package`
--

INSERT INTO `train_package` (`id`, `train_name`, `starting_place`, `destination_place`, `fare`, `departure_time`, `arrival_time`) VALUES
(1, 'mumbai Express', 'mumbai', 'surat', 500, '00:03:00', '13:03:00'),
(2, 'Gujarat Express', 'Mumbai', 'Ahmedabad', 500, '08:00:00', '14:00:00'),
(3, 'Ahmedabad Duronto', 'Delhi', 'Ahmedabad', 1200, '10:30:00', '18:30:00'),
(4, 'Gujarat Mail', 'Pune', 'Surat', 700, '06:45:00', '13:00:00'),
(5, 'Sabarmati Express', 'Jaipur', 'Ahmedabad', 800, '14:20:00', '21:45:00'),
(6, 'Saurashtra Mail', 'Kolkata', 'Rajkot', 1500, '15:10:00', '08:30:00'),
(7, 'Gujarat Sampark Kranti', 'Delhi', 'Vadodara', 1100, '12:40:00', '20:15:00'),
(8, 'Ahmedabad Shatabdi', 'Mumbai', 'Ahmedabad', 900, '06:00:00', '13:30:00'),
(9, 'Kutch Express', 'Varanasi', 'Bhuj', 1800, '08:45:00', '20:00:00'),
(10, 'Gujarat Superfast', 'Chennai', 'Surat', 1300, '11:20:00', '04:45:00'),
(11, 'Somnath Express', 'Kolkata', 'Veraval', 1600, '17:30:00', '10:15:00'),
(12, 'Gujarat Queen', 'Bangalore', 'Ahmedabad', 1000, '09:15:00', '16:30:00'),
(13, 'Surat Express', 'Hyderabad', 'Surat', 1400, '13:40:00', '07:00:00'),
(14, 'Girnar Express', 'Lucknow', 'Junagadh', 1700, '10:00:00', '23:45:00'),
(15, 'Ahmedabad Rajdhani', 'New Delhi', 'Ahmedabad', 1500, '16:30:00', '07:45:00'),
(16, 'Jamnagar Express', 'Chandigarh', 'Jamnagar', 1900, '08:20:00', '23:00:00'),
(17, 'Gujarat Mahamana', 'Indore', 'Ahmedabad', 1100, '14:50:00', '22:15:00'),
(18, 'Ahmedabad Garib Rath', 'Patna', 'Ahmedabad', 1300, '11:10:00', '19:30:00'),
(19, 'Gujarat Sampark Kranti Express', 'Kanpur', 'Ahmedabad', 1200, '12:00:00', '20:30:00'),
(20, 'Saurashtra Janta Express', 'Jaipur', 'Porbandar', 1400, '15:40:00', '10:45:00'),
(21, 'Bhavnagar Express', 'Kolkata', 'Bhavnagar', 1600, '07:55:00', '23:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `EmailId` varchar(225) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `MobileNo` varchar(20) NOT NULL,
  `DOB` date DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `FullName`, `EmailId`, `Password`, `MobileNo`, `DOB`, `Address`, `City`, `Country`, `RegDate`, `UpdationDate`) VALUES
(1, 'ronik', 'ronikgorasiya@gmail.com', '$2y$10$F5IT/D.0WPhkh9NxyoyEIusOtQQ.jl3fFugTdDzQBNPI1FNldYF12', '9727168583', '2002-03-24', 'A-4,203,\r\n3rd floor, nadanvan,vrajbhumi sector-2', 'Surat', 'India', '2024-04-04 04:17:19', '2024-04-25 04:46:47'),
(16, 'test', 'Test@gmail.com', 'Test@123', '9727168583', NULL, NULL, NULL, NULL, '2024-04-07 14:30:41', NULL),
(17, 'test', 'Test00@gmail.com', 'Test@123', '123456789', NULL, NULL, NULL, NULL, '2024-04-07 14:32:00', NULL),
(18, 'tes', 'rrg@gmail.com', '$2y$10$tA9vEIRZfrb07CcSdxvoD.6Gt6AiFhWFGgNwj0qn/HYqnX3F85iy', '456798123', '2024-04-10', 's', 'c', 'c', '2024-04-07 14:38:30', NULL),
(19, 'deep', 'deepjadvani006@gmail.com', '$2y$10$QE85U9GfxS2CoXCQ7KaJP.166Shfs.Ic94fQ8FuqAFKW4gKRFgw4u', '9913900557', NULL, NULL, NULL, NULL, '2024-04-09 05:23:02', NULL),
(20, 'kashish', '1999sharmakashish@gmail.com', '$2y$10$A2KATvxTmgjcot3MPH1qsejeKNgRgbSRI/BLQUI6/ZE6.lDixk53y', '9924355010', NULL, NULL, NULL, NULL, '2024-04-09 06:20:24', NULL),
(21, 'utsav', 'utsavgorasiya@gmail.com', '$2y$10$4YNiYco1EMIxeJfgIK5D2.DmTQbWsE0snaIpirKpFcCfjkM3LM92i', '9727168583', NULL, NULL, NULL, NULL, '2024-04-21 05:58:24', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus_booking`
--
ALTER TABLE `bus_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus_package`
--
ALTER TABLE `bus_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactinfo`
--
ALTER TABLE `contactinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flight_booking`
--
ALTER TABLE `flight_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flight_package`
--
ALTER TABLE `flight_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_booking`
--
ALTER TABLE `hotel_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_package`
--
ALTER TABLE `hotel_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `termofco`
--
ALTER TABLE `termofco`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `termofuse`
--
ALTER TABLE `termofuse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `train_booking`
--
ALTER TABLE `train_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `train_package`
--
ALTER TABLE `train_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `EmailId` (`EmailId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `bus_booking`
--
ALTER TABLE `bus_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bus_package`
--
ALTER TABLE `bus_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `contactinfo`
--
ALTER TABLE `contactinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `flight_booking`
--
ALTER TABLE `flight_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `flight_package`
--
ALTER TABLE `flight_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `hotel_booking`
--
ALTER TABLE `hotel_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hotel_package`
--
ALTER TABLE `hotel_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `termofuse`
--
ALTER TABLE `termofuse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `train_booking`
--
ALTER TABLE `train_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `train_package`
--
ALTER TABLE `train_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
