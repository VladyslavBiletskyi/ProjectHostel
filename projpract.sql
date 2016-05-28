-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 28 2016 г., 12:23
-- Версия сервера: 5.6.29-log
-- Версия PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `projpract`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Admin`
--

CREATE TABLE IF NOT EXISTS `Admin` (
  `login` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Comment`
--

CREATE TABLE IF NOT EXISTS `Comment` (
  `ID` int(100) NOT NULL,
  `text` varchar(500) NOT NULL,
  `user` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `room` int(5) NOT NULL,
  `pre_comment` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Floor`
--

CREATE TABLE IF NOT EXISTS `Floor` (
  `ID` int(3) NOT NULL,
  `img` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Floor`
--

INSERT INTO `Floor` (`ID`, `img`) VALUES
(1, NULL),
(2, NULL),
(3, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `Moder`
--

CREATE TABLE IF NOT EXISTS `Moder` (
  `login` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Room`
--

CREATE TABLE IF NOT EXISTS `Room` (
  `ID` int(5) NOT NULL,
  `floor` int(3) NOT NULL,
  `img` varchar(200) DEFAULT NULL,
  `places` int(2) NOT NULL,
  `info` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Room`
--

INSERT INTO `Room` (`ID`, `floor`, `img`, `places`, `info`) VALUES
(101, 1, NULL, 2, NULL),
(102, 1, NULL, 3, NULL),
(103, 1, NULL, 4, NULL),
(104, 1, NULL, 3, NULL),
(105, 1, NULL, 3, NULL),
(106, 1, NULL, 4, NULL),
(201, 2, NULL, 4, NULL),
(202, 2, NULL, 4, NULL),
(203, 2, NULL, 2, NULL),
(204, 2, NULL, 2, NULL),
(205, 2, NULL, 4, NULL),
(301, 3, NULL, 3, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `ID` int(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `eMail` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `room` int(10) DEFAULT NULL,
  `info` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `User`
--

INSERT INTO `User` (`ID`, `pass`, `eMail`, `name`, `room`, `info`) VALUES
(1, 'pass1', 'newmail1@nure.ua', 'Azaza', 202, NULL),
(2, 'pass2', 'newmail2@nure.ua', 'Петров', 102, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`login`);

--
-- Индексы таблицы `Comment`
--
ALTER TABLE `Comment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user` (`user`),
  ADD KEY `room` (`room`),
  ADD KEY `pre_user` (`pre_comment`);

--
-- Индексы таблицы `Floor`
--
ALTER TABLE `Floor`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `Moder`
--
ALTER TABLE `Moder`
  ADD PRIMARY KEY (`login`);

--
-- Индексы таблицы `Room`
--
ALTER TABLE `Room`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `floor` (`floor`);

--
-- Индексы таблицы `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `room` (`room`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Comment`
--
ALTER TABLE `Comment`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `Floor`
--
ALTER TABLE `Floor`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `User`
--
ALTER TABLE `User`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Comment`
--
ALTER TABLE `Comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user`) REFERENCES `User` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`room`) REFERENCES `Room` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`pre_comment`) REFERENCES `Comment` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `Room`
--
ALTER TABLE `Room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`floor`) REFERENCES `Floor` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `User`
--
ALTER TABLE `User`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`room`) REFERENCES `Room` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
