-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Φιλοξενητής: localhost
-- Χρόνος δημιουργίας: 02 Οκτ 2018 στις 10:47:25
-- Έκδοση διακομιστή: 5.7.9
-- Έκδοση PHP: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Βάση: `elmendb`
--
CREATE DATABASE IF NOT EXISTS `elmendb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `elmendb`;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Άδειασμα δεδομένων του πίνακα `client`
--

INSERT INTO `client` (`id`, `email`, `password`, `phone`) VALUES
(1, 'pel1@p.gr', '1234', '6974329329'),
(2, 'pel2@p.gr', '1234', '6940231234'),
(6, 'new@new.gr', '1234', '3242354');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_s` int(11) NOT NULL,
  `id_u` int(11) NOT NULL,
  `id_p` int(11) NOT NULL,
  `Qnt` int(11) NOT NULL,
  `total` float(10,2) NOT NULL,
  `addr` varchar(300) NOT NULL,
  `lat` float(20,10) NOT NULL,
  `lng` float(20,10) NOT NULL,
  `state` varchar(200) NOT NULL,
  `date1` date DEFAULT NULL,
  `dst` float(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Άδειασμα δεδομένων του πίνακα `orders`
--

INSERT INTO `orders` (`id`, `id_s`, `id_u`, `id_p`, `Qnt`, `total`, `addr`, `lat`, `lng`, `state`, `date1`, `dst`) VALUES
(10, 1, 3, 1, 3, 3.00, 'werewrwerw', 38.2500000000, 21.7299995422, '1', '2018-10-02', 0.26),
(11, 1, 3, 2, 3, 12.00, 'Ermou 51', 38.2400016785, 21.7299995422, '1', '2018-10-02', 0.41);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `price` float(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Άδειασμα δεδομένων του πίνακα `products`
--

INSERT INTO `products` (`id`, `title`, `price`) VALUES
(1, 'coffee', 1.00),
(2, 'Food1', 4.00),
(3, 'Food2', 4.00),
(4, 'Food3', 5.00),
(5, 'Food4', 10.00);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `shop`
--

CREATE TABLE IF NOT EXISTS `shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `addr` varchar(200) NOT NULL,
  `lat` float(20,10) NOT NULL,
  `lng` float(20,10) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Άδειασμα δεδομένων του πίνακα `shop`
--

INSERT INTO `shop` (`id`, `title`, `phone`, `addr`, `lat`, `lng`, `id_user`) VALUES
(1, 'Coffee 1 ', '2610222222', 'Ag Androu 10', 38.2444992065, 21.7357006073, 1),
(2, 'Coffee 2', '2610321311', 'Adrs 2', 38.2426986694, 21.7359008789, 2);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `sh_pr`
--

CREATE TABLE IF NOT EXISTS `sh_pr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_p` int(11) NOT NULL,
  `id_s` int(11) NOT NULL,
  `Quant` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Άδειασμα δεδομένων του πίνακα `sh_pr`
--

INSERT INTO `sh_pr` (`id`, `id_p`, `id_s`, `Quant`) VALUES
(1, 1, 1, 120),
(2, 2, 1, 7),
(3, 3, 1, 10),
(4, 4, 1, 10),
(5, 5, 1, 10),
(6, 1, 2, 100),
(7, 2, 2, 10),
(8, 3, 2, 10),
(9, 4, 2, 10),
(10, 5, 2, 10);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `AFM` varchar(9) NOT NULL,
  `AMKA` varchar(11) NOT NULL,
  `IBAN` varchar(32) NOT NULL,
  `type_user` varchar(30) NOT NULL,
  `lat` float(20,10) NOT NULL,
  `lng` float(20,10) NOT NULL,
  `state` int(1) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `AFM`, `AMKA`, `IBAN`, `type_user`, `lat`, `lng`, `state`, `fname`, `lname`) VALUES
(1, 'manager1', '1234', '42423233', '9999333333', '1231234324', 'manager', 0.0000000000, 0.0000000000, 0, 'fn1', 'ln1'),
(2, 'manager2', '1234', '69323133', '0002333333', '23423423432', 'manager', 0.0000000000, 0.0000000000, 0, 'fn2', 'ln2'),
(3, 'del1', '1234', '69372661', '9933322221', '3545425', 'delivery', 38.2460784912, 21.7336082458, 1, 'fn3', 'ln3'),
(4, 'del2', '1234', '69847233', '44433332222', '12323424', 'delivery', 38.2478981018, 21.7380008698, 1, 'fn4', 'ln4');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
