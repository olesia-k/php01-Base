-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 09 2017 г., 19:21
-- Версия сервера: 5.5.45
-- Версия PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `new-bd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `catalogs`
--

CREATE TABLE IF NOT EXISTS `catalogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `body` text NOT NULL,
  `type` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `catalogs`
--

INSERT INTO `catalogs` (`id`, `name`, `body`, `type`) VALUES
(1, 'Каталог Товаров', 'Различные товары', 'main'),
(2, 'Каталог Услуг', 'Различные услуги', 'main'),
(3, 'Шаблоны', 'Шаблоны товаров и услуг', 'main');

-- --------------------------------------------------------

--
-- Структура таблицы `maintexts`
--

CREATE TABLE IF NOT EXISTS `maintexts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `body` text NOT NULL,
  `url` tinytext NOT NULL,
  `showhide` enum('show','hide') NOT NULL DEFAULT 'show',
  `lang` enum('ru','en') NOT NULL DEFAULT 'ru',
  `putdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `maintexts`
--

INSERT INTO `maintexts` (`id`, `name`, `body`, `url`, `showhide`, `lang`, `putdate`) VALUES
(1, 'Добро пожаловать на сайт', 'text text text text text text text text text text text text text text text text text text text text text text text text ', 'index', 'show', 'ru', '2017-10-24'),
(2, 'контакты', 'телефон', 'contacts', 'show', 'ru', '2017-10-24'),
(3, 'Services', 'Text Services', 'services', 'show', 'ru', '2017-10-24'),
(4, 'About', 'text About', 'About', 'show', 'ru', '2017-10-24');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `body` text NOT NULL,
  `picture` tinytext NOT NULL,
  `price` tinytext NOT NULL,
  `vip` tinytext NOT NULL,
  `putdate` tinytext NOT NULL,
  `url` tinytext NOT NULL,
  `product_code` tinytext NOT NULL,
  `status` tinytext NOT NULL,
  `catalog_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `body`, `picture`, `price`, `vip`, `putdate`, `url`, `product_code`, `status`, `catalog_id`, `user_id`) VALUES
(8, 'BOLODARUM', 'GOR VUHE GARNOL', '17_10_31_08_24_53.jpg', '1155', '0', '2017-10-31 20:24:53', '-', '171031082453', 'new', 0, 1),
(9, 'ABABABABABA', 'Bodydsdada', '17_10_31_08_39_24.jpg', '5115', '0', '2017-10-31 20:39:24', '-', '171031083924', 'new', 0, 1),
(10, 'ARARARAR', 'BYYBBSADS', '17_10_31_08_41_33.jpg', '1551', '0', '2017-10-31 20:41:33', '-', '171031084133', 'new', 1, 1),
(11, 'HAHAHAHAHAH', 'BodyUHUHUHHUHUHUHUH', '17_11_02_07_42_26.jpg', '-', '0', '2017-11-02 19:42:26', '-', '171102074226', 'new', 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `password` tinytext NOT NULL,
  `blockundblock` enum('unblock','block') NOT NULL DEFAULT 'unblock',
  `datareg` date NOT NULL,
  `lastvisit` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `blockundblock`, `datareg`, `lastvisit`) VALUES
(1, 'sadadas', 'saas@as.ru', 'asdasd', 'unblock', '2017-10-26', '2017-10-26 19:36:13');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;