-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 05 2019 г., 13:43
-- Версия сервера: 10.3.13-MariaDB
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dbdom`
--
CREATE DATABASE IF NOT EXISTS `dbdom` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `dbdom`;

-- --------------------------------------------------------

--
-- Структура таблицы `feedbacktable`
--

DROP TABLE IF EXISTS `feedbacktable`;
CREATE TABLE `feedbacktable` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `codeGoods` int(11) NOT NULL COMMENT 'Код товара',
  `nameGoods` text NOT NULL COMMENT 'Наименование товара',
  `shortGoods` varchar(25) NOT NULL COMMENT 'Короткое наименование',
  `coefTrans` int(11) NOT NULL COMMENT 'Коэффициент'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `codeGoods`, `nameGoods`, `shortGoods`, `coefTrans`) VALUES
(4, 1, 'Товар 1', 'тр1', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `recipt`
--

DROP TABLE IF EXISTS `recipt`;
CREATE TABLE `recipt` (
  `id` int(11) NOT NULL,
  `codeRecipt` int(11) NOT NULL COMMENT 'Код покупателя',
  `nameRecipt` text NOT NULL COMMENT 'Покупатель',
  `signFirm` tinyint(4) NOT NULL COMMENT 'Подразделение'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `recipt`
--

INSERT INTO `recipt` (`id`, `codeRecipt`, `nameRecipt`, `signFirm`) VALUES
(3, 1, 'Покупатель 1', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `supply`
--

DROP TABLE IF EXISTS `supply`;
CREATE TABLE `supply` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL COMMENT 'Поставщик',
  `recipt_id` int(11) NOT NULL COMMENT 'Покупатель',
  `goods_id` int(11) NOT NULL COMMENT 'Товар',
  `quantity` int(11) NOT NULL COMMENT 'Количество'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `supply`
--

INSERT INTO `supply` (`id`, `users_id`, `recipt_id`, `goods_id`, `quantity`) VALUES
(7, 9, 3, 4, 100);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT '№',
  `login` varchar(45) DEFAULT NULL COMMENT 'Логин',
  `pass` varchar(45) DEFAULT NULL COMMENT 'Пароль',
  `name` varchar(45) DEFAULT NULL COMMENT 'Подразделение',
  `surname` varchar(45) DEFAULT NULL COMMENT 'Ответственный',
  `user_group_id` int(11) NOT NULL COMMENT 'Группа'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `name`, `surname`, `user_group_id`) VALUES
(8, 'admin', '123', 'Администрация', 'Иван', 5),
(9, 'user', '111', 'Поставщик 1', 'Петров А.А.', 6),
(10, 't', '1', 'Поставщик 2', 'Петров А.В.', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `user_group`
--

DROP TABLE IF EXISTS `user_group`;
CREATE TABLE `user_group` (
  `id` int(11) NOT NULL COMMENT '№',
  `cod` varchar(45) DEFAULT NULL COMMENT 'Код',
  `description` varchar(45) DEFAULT NULL COMMENT 'Описание'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_group`
--

INSERT INTO `user_group` (`id`, `cod`, `description`) VALUES
(5, 'adm', 'Администраторы'),
(6, 'usr', 'Пользователи'),
(7, 'dft', 'Гости');

-- --------------------------------------------------------

--
-- Структура таблицы `work`
--

DROP TABLE IF EXISTS `work`;
CREATE TABLE `work` (
  `id` int(11) NOT NULL,
  `codeWork` int(11) NOT NULL COMMENT 'Код поставщика',
  `nameWork` text NOT NULL COMMENT 'Поставщик',
  `password` varchar(10) NOT NULL COMMENT 'Пароль'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `feedbacktable`
--
ALTER TABLE `feedbacktable`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `recipt`
--
ALTER TABLE `recipt`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `supply`
--
ALTER TABLE `supply`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_supply_goods_idx` (`goods_id`),
  ADD KEY `fk_supply_recipt1_idx` (`recipt_id`),
  ADD KEY `fk_supply_users1_idx` (`users_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`user_group_id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `fk_users_user_group1_idx` (`user_group_id`);

--
-- Индексы таблицы `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cod` (`cod`);

--
-- Индексы таблицы `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `feedbacktable`
--
ALTER TABLE `feedbacktable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `recipt`
--
ALTER TABLE `recipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `supply`
--
ALTER TABLE `supply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '№', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '№', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `work`
--
ALTER TABLE `work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `supply`
--
ALTER TABLE `supply`
  ADD CONSTRAINT `fk_supply_goods` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`id`),
  ADD CONSTRAINT `fk_supply_recipt1` FOREIGN KEY (`recipt_id`) REFERENCES `recipt` (`id`),
  ADD CONSTRAINT `fk_supply_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_user_group1` FOREIGN KEY (`user_group_id`) REFERENCES `user_group` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
