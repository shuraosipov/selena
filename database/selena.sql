-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Мар 22 2012 г., 16:36
-- Версия сервера: 5.5.16
-- Версия PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `selena`
--
CREATE DATABASE `selena` DEFAULT CHARACTER SET cp1251 COLLATE cp1251_general_ci;
USE `selena`;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(0, 'Без категории'),
(1, 'программная ошибка'),
(2, 'аппаратная ошибка'),
(3, 'технические неисправности'),
(4, 'консультативная помощь');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `linkkey` int(11) NOT NULL,
  `text` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `linkkey` (`linkkey`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=35 ;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `id_user`, `linkkey`, `text`, `date`) VALUES
(4, 1, 4, 'asdasdasdasdasd', '2012-03-01 06:48:13'),
(10, 37, 51, 'требуется разъяснение, что за хрень?', '2012-03-01 07:26:28'),
(11, 37, 51, 'закрыто', '2012-03-01 08:15:16'),
(18, 37, 61, 'asdsd', '2012-03-02 08:20:22'),
(27, 37, 72, 'переставил, осталось только патч-корд\r\nсделать', '2012-03-05 09:00:05'),
(28, 37, 72, 'asdasdasd', '2012-03-07 06:05:25'),
(29, 37, 82, 'dct jnkbxyj', '2012-03-15 12:28:59'),
(30, 37, 82, 'asd\r\n\r\nasdasd\r\nad\r\nas\r\ndas\r\nda', '2012-03-19 11:10:12'),
(31, 37, 82, 'aaaaa', '2012-03-19 11:10:15'),
(32, 37, 61, 'asd\r\n', '2012-03-21 07:50:56'),
(33, 37, 61, 'bbbb', '2012-03-21 07:50:59'),
(34, 37, 61, 'mmmmm', '2012-03-21 07:51:02');

-- --------------------------------------------------------

--
-- Структура таблицы `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id_dep` int(3) NOT NULL AUTO_INCREMENT,
  `name_dep` tinytext NOT NULL,
  PRIMARY KEY (`id_dep`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `departments`
--

INSERT INTO `departments` (`id_dep`, `name_dep`) VALUES
(1, 'Бухгалтерия'),
(2, 'Управление'),
(3, 'Диспетчерская служба'),
(4, 'Коммерческий отдел'),
(5, 'Производственно-технический отдел'),
(6, 'Отдел информационных технологий'),
(7, 'Отдел кадров'),
(8, 'Отдел техники безопасности'),
(9, 'Отдел главного механика'),
(10, 'Отдел ГО и ЧС'),
(11, 'Дерево-обрабатывающий цех'),
(12, 'Секретариат'),
(13, 'Склад'),
(14, 'Профсоюзный комитет');

-- --------------------------------------------------------

--
-- Структура таблицы `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `request_id` int(11) NOT NULL,
  `editor_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=46 ;

--
-- Дамп данных таблицы `history`
--

INSERT INTO `history` (`id`, `request_id`, `editor_id`, `status`, `date_edit`) VALUES
(1, 2, 3, 3, '2012-03-13 11:27:59'),
(4, 72, 37, 8, '2012-03-07 05:27:39'),
(5, 72, 37, 7, '2012-03-07 05:52:06'),
(6, 72, 37, 8, '2012-03-07 06:02:02'),
(7, 72, 37, 8, '2012-03-07 06:04:19'),
(22, 82, 37, 7, '2012-03-15 06:54:03'),
(23, 82, 37, 9, '2012-03-15 07:02:38'),
(24, 81, 37, 8, '2012-03-15 07:02:42'),
(25, 80, 37, 6, '2012-03-15 07:02:45'),
(26, 79, 37, 7, '2012-03-15 07:02:49'),
(27, 82, 37, 7, '2012-03-15 07:16:11'),
(28, 82, 37, 9, '2012-03-15 07:16:18'),
(33, 82, 37, 7, '2012-03-15 12:28:50'),
(34, 80, 37, 7, '2012-03-16 04:56:17'),
(35, 82, 37, 6, '2012-03-16 08:33:28'),
(36, 82, 37, 7, '2012-03-19 12:38:32'),
(37, 82, 37, 8, '2012-03-19 12:43:04'),
(38, 61, 37, 8, '2012-03-21 07:51:37'),
(39, 61, 37, 6, '2012-03-21 07:51:41'),
(40, 61, 37, 7, '2012-03-21 07:51:44'),
(41, 61, 37, 7, '2012-03-21 07:51:48'),
(42, 61, 37, 6, '2012-03-21 07:51:50'),
(43, 82, 37, 7, '2012-03-22 08:14:29'),
(44, 82, 37, 9, '2012-03-22 08:14:34'),
(45, 81, 37, 6, '2012-03-22 11:57:38');

-- --------------------------------------------------------

--
-- Структура таблицы `online`
--

CREATE TABLE IF NOT EXISTS `online` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `current_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `session_id` varchar(54) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=336 ;

--
-- Дамп данных таблицы `online`
--

INSERT INTO `online` (`id`, `user_id`, `current_time`, `session_id`) VALUES
(335, 37, '2012-03-22 12:35:06', 't6l6a2jc11u53urq5tqd1a1od4');

-- --------------------------------------------------------

--
-- Структура таблицы `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `permissions`
--

INSERT INTO `permissions` (`id`, `type`) VALUES
(1, 'администратор селены'),
(2, 'техподдержка'),
(3, 'пользователи');

-- --------------------------------------------------------

--
-- Структура таблицы `request`
--

CREATE TABLE IF NOT EXISTS `request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) NOT NULL DEFAULT '0',
  `title` varchar(50) NOT NULL,
  `text` varchar(250) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` int(11) NOT NULL,
  `linkkey` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '9',
  `support_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `linkkey` (`linkkey`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=84 ;

--
-- Дамп данных таблицы `request`
--

INSERT INTO `request` (`id`, `category`, `title`, `text`, `date`, `type`, `linkkey`, `status`, `support_id`) VALUES
(60, 0, 'Попытка написать обращение длиной больше пяти', 'фффффффффф', '2012-03-02 05:18:20', 3, 52, 7, 0),
(61, 4, 'Попытка написать обращение дли больше пятидесятим', 'ффф', '2012-03-02 05:18:41', 3, 52, 6, 0),
(72, 2, 'переставить Матвеевой компьютер', 'через 15 минут в кабинете Матвеевой надо переставить компьютер', '2012-03-05 07:13:38', 2, 50, 7, 37),
(73, 3, 'проверка', 'пробадат', '2011-01-05 20:00:00', 1, 50, 7, 0),
(74, 3, 'kzkzkkzkz', 'zkzkzkzkzkz', '2012-03-06 08:54:07', 1, 55, 8, 37),
(75, 0, '123', 'ффф', '2012-03-15 05:34:19', 3, 39, 9, 0),
(76, 0, '555', '5ппппппп', '2012-03-15 05:34:23', 3, 39, 9, 0),
(77, 0, '1111111111111', 'фффффф', '2012-03-15 05:34:27', 3, 39, 9, 0),
(78, 0, 'ифф', 'ффффффф', '2012-03-15 05:34:31', 3, 39, 9, 0),
(80, 0, 'вввввввввввввввввв', 'вфывфывфывфывфы', '2012-03-15 05:34:47', 3, 39, 7, 37),
(81, 0, 'ввввв', 'вввввввввввввввввввв', '2012-03-15 05:34:51', 3, 39, 6, 0),
(82, 3, 'мимисис', 'фвфывфывфывфывфывфы', '2012-03-15 05:34:54', 3, 39, 9, 37),
(83, 0, '1 2 3 4 5 6 7 8 9 0 11 12 13 15 16 7', 'asdad asdad', '2012-03-22 12:07:03', 2, 52, 9, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `request_type`
--

CREATE TABLE IF NOT EXISTS `request_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `request_type`
--

INSERT INTO `request_type` (`id`, `type`) VALUES
(1, 'Молния'),
(2, 'Кролик'),
(3, 'Черепаха');

-- --------------------------------------------------------

--
-- Структура таблицы `shoutbox`
--

CREATE TABLE IF NOT EXISTS `shoutbox` (
  ` id` int(5) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user` tinytext NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (` id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `shoutbox`
--

INSERT INTO `shoutbox` (` id`, `date`, `user`, `message`) VALUES
(1, '2012-02-10 07:18:10', 'РћСЃРёРїРѕРІ', 'РўСЂР°Р»СЏР»СЏ РїСЂРѕРІРµСЂРєР°'),
(2, '2012-02-10 07:19:05', 'РћСЃРёРїРѕРІ', 'РўСЂР°Р»СЏР»СЏ'),
(3, '2012-02-10 07:19:07', 'РћСЃРёРїРѕРІ', 'РґРґРґРґ'),
(4, '2012-02-10 07:19:10', 'РћСЃРёРїРѕРІ', 'РґРґРґРґРїРїРїРї'),
(5, '2012-02-10 07:19:14', 'РћСЃРёРїРѕРІ', 'РґРґРґРґРїРїРїРї'),
(6, '2012-03-16 05:58:21', '111', 'aa'),
(7, '2012-03-16 05:59:05', '111', 'aa');

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `type`) VALUES
(6, 'в исполнении'),
(7, 'завершено'),
(8, 'в обработке'),
(9, 'новый');

-- --------------------------------------------------------

--
-- Структура таблицы `trash_comments`
--

CREATE TABLE IF NOT EXISTS `trash_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `linkkey` int(11) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=35 ;

-- --------------------------------------------------------

--
-- Структура таблицы `trash_history`
--

CREATE TABLE IF NOT EXISTS `trash_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `request_id` int(11) NOT NULL,
  `editor_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date_edit` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=43 ;

-- --------------------------------------------------------

--
-- Структура таблицы `trash_request`
--

CREATE TABLE IF NOT EXISTS `trash_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `text` varchar(250) NOT NULL,
  `date` datetime NOT NULL,
  `type` int(11) NOT NULL,
  `linkkey` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `support_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=76 ;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '3',
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=56 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `user`, `password`, `type`, `register_date`) VALUES
(1, 'admin', '9e1d989dd8cff018042a020dae764798', 1, '2012-02-22 12:05:35'),
(37, 'alex', '16ec46593b7cda7359457a706994c27c', 2, '0000-00-00 00:00:00'),
(38, 'АнуфриеваЕВ', '16ec46593b7cda7359457a706994c27c', 3, '0000-00-00 00:00:00'),
(39, 'ШниткоОП', '16ec46593b7cda7359457a706994c27c', 3, '0000-00-00 00:00:00'),
(40, 'КазиеваТП', '16ec46593b7cda7359457a706994c27c', 3, '0000-00-00 00:00:00'),
(41, 'ОсиповАМ', '16ec46593b7cda7359457a706994c27c', 2, '0000-00-00 00:00:00'),
(42, 'КалининаЕВ', '16ec46593b7cda7359457a706994c27c', 3, '0000-00-00 00:00:00'),
(44, 'СтепановскаяМН', '16ec46593b7cda7359457a706994c27c', 3, '0000-00-00 00:00:00'),
(45, 'МатвееваИГ', '16ec46593b7cda7359457a706994c27c', 3, '0000-00-00 00:00:00'),
(46, 'ПаутоваЮА', '16ec46593b7cda7359457a706994c27c', 3, '0000-00-00 00:00:00'),
(48, 'ИвашкевичЕИ', '16ec46593b7cda7359457a706994c27c', 3, '0000-00-00 00:00:00'),
(49, 'ШарыгинЮА', '6528707df74ad216d6118755e924e959', 3, '0000-00-00 00:00:00'),
(50, 'КазиеваАП', '16ec46593b7cda7359457a706994c27c', 3, '0000-00-00 00:00:00'),
(52, 'ФилипповаНА', '16ec46593b7cda7359457a706994c27c', 3, '2012-02-22 07:07:42'),
(53, 'ВерховцеваНА', '16ec46593b7cda7359457a706994c27c', 3, '2012-02-24 04:25:06'),
(54, 'АлинаАП', '16ec46593b7cda7359457a706994c27c', 3, '2012-02-24 09:39:22'),
(55, 'КуклинаОА', '6528707df74ad216d6118755e924e959', 3, '2012-03-06 08:53:54');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
