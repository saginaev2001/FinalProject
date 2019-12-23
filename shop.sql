-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 23 2019 г., 17:49
-- Версия сервера: 5.7.26
-- Версия PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `price` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `product`, `model`, `price`) VALUES
(1, 'Iphone', '6S', 25000),
(2, 'LG', 'Hi', 50000),
(2, 'LG', 'Hi', 26000),
(2, 'LG', 'Hi', 26000);

-- --------------------------------------------------------

--
-- Структура таблицы `sell`
--

DROP TABLE IF EXISTS `sell`;
CREATE TABLE IF NOT EXISTS `sell` (
  `id` int(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `price` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `sell`
--

INSERT INTO `sell` (`id`, `product`, `model`, `price`) VALUES
(2, 'LG', 'Samsung', 50000);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
