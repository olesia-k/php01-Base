-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 26, 2017 at 09:12 PM
-- Server version: 5.5.45
-- PHP Version: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ok-bd`
--

-- --------------------------------------------------------

--
-- Table structure for table `catalogs`
--

CREATE TABLE IF NOT EXISTS `catalogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `body` text NOT NULL,
  `type` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `catalogs`
--

INSERT INTO `catalogs` (`id`, `name`, `body`, `type`) VALUES
(1, 'Каталог Товаров', 'Куча разных ненужных никому товаров', 'main'),
(2, 'Каталог Услуг', 'Перечень надоевших услуг', 'main'),
(3, 'Готовые решения', 'Готовые решения, как от всего этого избавиться', 'main');

-- --------------------------------------------------------

--
-- Table structure for table `mains`
--

CREATE TABLE IF NOT EXISTS `mains` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `body` text NOT NULL,
  `url` tinytext CHARACTER SET utf16 NOT NULL,
  `showhide` enum('show','hide') NOT NULL DEFAULT 'show',
  `lang` enum('ru','en') NOT NULL,
  `putdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `mains`
--

INSERT INTO `mains` (`id`, `name`, `body`, `url`, `showhide`, `lang`, `putdate`) VALUES
(1, 'Доброе пожаловать на сайт', 'Какой-то текст на Главной', 'index', 'show', 'ru', '2017-10-24'),
(2, 'Контакты', 'Телефон', 'contacts', 'show', '', '0000-00-00'),
(3, 'О нас', 'Текс о нас', 'about', 'show', 'ru', '2017-10-24'),
(4, 'Сервисы', 'Текст про сервисы', 'services', 'show', 'ru', '2017-10-24'),
(5, 'Портфолио', 'Примеры работ', 'portfolio-1-col', 'show', 'ru', '2017-10-24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `password` tinytext NOT NULL,
  `blockunblock` enum('unblock','block') NOT NULL DEFAULT 'unblock',
  `datareg` date NOT NULL,
  `lastvisit` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `blockunblock`, `datareg`, `lastvisit`) VALUES
(1, 'sdf', 'sdf@gamil.ru', '123', 'unblock', '2017-10-26', '2017-10-26 19:42:42');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
