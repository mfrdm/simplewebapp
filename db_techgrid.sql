-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 20, 2014 at 08:53 AM
-- Server version: 5.5.40
-- PHP Version: 5.4.23

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_techgrid`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastvisit_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `superuser` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `email`, `activkey`, `create_at`, `lastvisit_at`, `superuser`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@example.com', '5827d5b655c528780608c715ff86f3d6', '2014-02-11 03:49:07', '2014-11-18 15:24:32', 1, 1),
(2, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@example.com', '510b4dad2285523c79bf900cb555af9d', '2014-02-11 03:49:07', '2014-09-29 11:23:35', 0, 1),
(3, 'asdasd', 'a8f5f167f44f4964e6c998dee827110c', 'asd@asd.com', '4b20ff096846b2c976cea7b89a954a4c', '2014-11-19 11:12:57', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle`
--

CREATE TABLE IF NOT EXISTS `tbl_vehicle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_make` int(11) NOT NULL,
  `model` varchar(25) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `engine_type_displacement` varchar(50) DEFAULT NULL,
  `transmission` varchar(25) DEFAULT NULL,
  `fuell_supply_system` varchar(20) NOT NULL,
  `doors` tinyint(4) NOT NULL DEFAULT '0',
  `seets` tinyint(4) NOT NULL DEFAULT '0',
  `wheelchair_accessible` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `i_transmission` (`transmission`),
  KEY `i_type` (`type`),
  KEY `i_make` (`id_make`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_vehicle`
--

INSERT INTO `tbl_vehicle` (`id`, `id_make`, `model`, `type`, `engine_type_displacement`, `transmission`, `fuell_supply_system`, `doors`, `seets`, `wheelchair_accessible`) VALUES
(2, 13, 'veyron', 'sport convertible', 'test', 'test', 'test', 2, 2, 0),
(5, 6, 'test', 'test', 'test', 'test', 'test', 2, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehiclemake`
--

CREATE TABLE IF NOT EXISTS `tbl_vehiclemake` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vehicemake` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=104 ;

--
-- Dumping data for table `tbl_vehiclemake`
--

INSERT INTO `tbl_vehiclemake` (`id`, `name`) VALUES
(1, 'A.D Tranmontana'),
(2, 'Acura'),
(3, 'Alfa Romeo'),
(4, 'Artega'),
(5, 'ASA'),
(6, 'Aston Martin'),
(7, 'Audi'),
(8, 'Beck'),
(9, 'Bentley'),
(10, 'Bizzarrini'),
(11, 'BMW'),
(12, 'Brabus'),
(13, 'Bugatti'),
(14, 'Buick'),
(15, 'Cadillac'),
(16, 'Caparo'),
(17, 'Carbontech'),
(18, 'CCG'),
(19, 'Chevrolet'),
(20, 'DeLorean'),
(21, 'Devon'),
(22, 'Dodge'),
(23, 'Falcon'),
(24, 'Farbio'),
(25, 'Fenix'),
(26, 'Ferrari'),
(27, 'Fiat'),
(28, 'Fisker'),
(29, 'Ford'),
(30, 'Freestream'),
(31, 'Fuore'),
(32, 'Galmer'),
(33, 'Genty'),
(34, 'Gillet'),
(35, 'GMC'),
(36, 'GTA'),
(37, 'Hansen'),
(38, 'Honda'),
(39, 'Hulme'),
(40, 'Hummer'),
(41, 'Hyundai'),
(42, 'Infiniti'),
(43, 'Jaguar'),
(44, 'Jeep'),
(45, 'Kamala'),
(46, 'Kepler Motors'),
(47, 'Kia'),
(48, 'Koenigsegg'),
(49, 'Lamborghini'),
(50, 'Lancia'),
(51, 'Land Rover'),
(52, 'Laraki'),
(53, 'LeBlanc'),
(54, 'Lexus'),
(55, 'Lincoln'),
(56, 'Lotus'),
(57, 'Magnum'),
(58, 'Marcos'),
(59, 'Marussia'),
(60, 'Maserati'),
(61, 'Maybach'),
(62, 'Mazda'),
(63, 'McLaren'),
(65, 'Mercedes-Benz'),
(66, 'Mercury'),
(67, 'MINI'),
(68, 'Mitsubishi'),
(64, 'Mitsuoka'),
(69, 'Nissan'),
(70, 'Noble'),
(71, 'Opel'),
(72, 'Oullim Motors'),
(73, 'Pagani'),
(74, 'Panoz'),
(75, 'Porsche'),
(76, 'Qvale'),
(77, 'Ram'),
(78, 'Renault'),
(80, 'Roding'),
(79, 'Rolls-Royce'),
(81, 'Saab'),
(82, 'Saturn'),
(83, 'Scion'),
(84, 'Skoda'),
(85, 'Smart'),
(86, 'Spyker'),
(87, 'Stola'),
(88, 'Subaru'),
(89, 'Suzuki'),
(90, 'Suzusho'),
(91, 'SV'),
(92, 'Tesla'),
(93, 'Toyota'),
(94, 'TVR'),
(95, 'Vector'),
(96, 'Venturi'),
(97, 'Virago'),
(98, 'Volkswagen'),
(99, 'Volvo'),
(100, 'VUHL'),
(101, 'Weber'),
(102, 'Zagato'),
(103, 'Zenvo');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
