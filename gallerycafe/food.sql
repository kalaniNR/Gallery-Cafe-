-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               9.0.1 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for food
DROP DATABASE IF EXISTS `food`;
CREATE DATABASE IF NOT EXISTS `food` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `food`;

-- Dumping structure for table food.admininfo
DROP TABLE IF EXISTS `admininfo`;
CREATE TABLE IF NOT EXISTS `admininfo` (
  `name` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `id` int NOT NULL,
  `email` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` int NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table food.admininfo: ~0 rows (approximately)
DELETE FROM `admininfo`;
/*!40000 ALTER TABLE `admininfo` DISABLE KEYS */;
/*!40000 ALTER TABLE `admininfo` ENABLE KEYS */;

-- Dumping structure for table food.bookinginfo
DROP TABLE IF EXISTS `bookinginfo`;
CREATE TABLE IF NOT EXISTS `bookinginfo` (
  `name` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  `service` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `massage` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table food.bookinginfo: ~0 rows (approximately)
DELETE FROM `bookinginfo`;
/*!40000 ALTER TABLE `bookinginfo` DISABLE KEYS */;
INSERT INTO `bookinginfo` (`name`, `email`, `date`, `service`, `massage`) VALUES
	('dawd', 'a@g.c', '2024-11-01', 'breakfast', 'dawd');
/*!40000 ALTER TABLE `bookinginfo` ENABLE KEYS */;

-- Dumping structure for table food.cart
DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `foodname` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `foodid` int NOT NULL,
  `price` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `details` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `userid` int NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` int NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table food.cart: ~0 rows (approximately)
DELETE FROM `cart`;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;

-- Dumping structure for table food.contacts
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `name` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` int NOT NULL,
  `massage` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table food.contacts: ~0 rows (approximately)
DELETE FROM `contacts`;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;

-- Dumping structure for table food.food
DROP TABLE IF EXISTS `food`;
CREATE TABLE IF NOT EXISTS `food` (
  `titel` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `price` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cuisine` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `details` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `img` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table food.food: ~0 rows (approximately)
DELETE FROM `food`;
/*!40000 ALTER TABLE `food` DISABLE KEYS */;
/*!40000 ALTER TABLE `food` ENABLE KEYS */;

-- Dumping structure for table food.items
DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` int NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `price` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `cuisine` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `details` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `titel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table food.items: ~0 rows (approximately)
DELETE FROM `items`;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` (`id`, `img`, `price`, `cuisine`, `details`, `titel`) VALUES
	(32, 'images/WhatsApp Image 2024-09-24 at 22.20.31_7b95cb5f.jpg', '2135', 'dawda', 'awdwad', 'dawf'),
	(123, 'images/image.png', '123', 'adaw', 'dawda', 'av'),
	(456, 'images/mg-featured.jpg', '5614', 'sregrg', 'sergge', 'dfawef');
/*!40000 ALTER TABLE `items` ENABLE KEYS */;

-- Dumping structure for table food.orders
DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` int NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `foodname` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `price` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `paidprice` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `state` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table food.orders: ~0 rows (approximately)
DELETE FROM `orders`;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table food.save
DROP TABLE IF EXISTS `save`;
CREATE TABLE IF NOT EXISTS `save` (
  `email` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table food.save: ~0 rows (approximately)
DELETE FROM `save`;
/*!40000 ALTER TABLE `save` DISABLE KEYS */;
/*!40000 ALTER TABLE `save` ENABLE KEYS */;

-- Dumping structure for table food.userinfo
DROP TABLE IF EXISTS `userinfo`;
CREATE TABLE IF NOT EXISTS `userinfo` (
  `userid` int NOT NULL,
  `fastname` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` int NOT NULL,
  `address` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `cpassword` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table food.userinfo: ~0 rows (approximately)
DELETE FROM `userinfo`;
/*!40000 ALTER TABLE `userinfo` DISABLE KEYS */;
INSERT INTO `userinfo` (`userid`, `fastname`, `lastname`, `email`, `phone`, `address`, `password`, `cpassword`) VALUES
	(11, 'daw', 'daw', 'dw@g.com', 123456, 'daw 12', '123456', '123456');
/*!40000 ALTER TABLE `userinfo` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
