-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 30 2019 г., 15:22
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
  `nameGoods` text NOT NULL COMMENT 'Наименование товара',
  `shortGoods` varchar(25) NOT NULL COMMENT 'Короткое наименование',
  `coefTrans` int(11) NOT NULL COMMENT 'Коэффициент'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `nameGoods`, `shortGoods`, `coefTrans`) VALUES
(4, 'Нов Молоко пит. паст. 2,5% ж. в пюр-паке 1л', 'МолПитПаст2,5%ПюрП1л', 1),
(5, 'Нов Молоко топленое 3,5%, в пюр-паке 0,5л', 'МолТопл3,5%ПюрПак0,5', 2),
(6, 'Молоко козье от 3,5% до 4%  жир., в пюр-паке 0,5л', 'МолКоз3,5%-4%п/п0,5л', 3),
(7, 'Нов Кефир, 3,5% ж, в пюр-паке 1 кг', 'Кефир3,5%ПюрПак1кг  ', 4),
(8, 'Ряженка 4% полим. стак. 450г', 'Ряжен4%Стакан200г   ', 3),
(9, 'Сливки питьевые 10% жира, Теtra Brik, 200г', 'Сливки10%200г       ', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `recipt`
--

DROP TABLE IF EXISTS `recipt`;
CREATE TABLE `recipt` (
  `id` int(11) NOT NULL,
  `nameRecipt` text NOT NULL COMMENT 'Покупатель',
  `signFirm` tinyint(4) NOT NULL COMMENT 'Подразделение'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `recipt`
--

INSERT INTO `recipt` (`id`, `nameRecipt`, `signFirm`) VALUES
(3, 'ОАО \"Веста\", магазин №152 ', 0),
(5, 'ОАО \"Витебская  бройлерная  птицефабрика\", магазин № 3 \"Ганна\"', 1),
(6, 'ООО \"Ресттрэйд\", магазин \"Дионис-3\"', 1),
(7, 'ЧТУП \"Меркурий-торг\", магазин \"Меркурий\"', 0),
(8, 'ООО \"БелМаркетКомпани\", магазин № 185', 1);

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
(7, 2, 3, 4, 100),
(9, 2, 6, 4, 50),
(11, 5, 7, 4, 222),
(13, 2, 3, 4, 666),
(15, 5, 3, 4, 11111),
(16, 5, 3, 4, 200);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT '№',
  `login` varchar(45) DEFAULT NULL COMMENT 'Логин',
  `pass` varchar(45) DEFAULT NULL COMMENT 'Пароль',
  `name` varchar(45) DEFAULT NULL COMMENT 'Поставщик',
  `surname` varchar(45) DEFAULT NULL COMMENT 'Оператор',
  `user_group_id` int(11) NOT NULL COMMENT 'Группа'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `name`, `surname`, `user_group_id`) VALUES
(1, 'admin', '123', '-', 'Доморацкая М.Б.', 1),
(2, 'user', '111', 'ОАО \"Беллакт\"', 'Иванова А. К.', 2),
(5, 'ttt', '333', 'ООО \"Молоко\"', 'Петрова В. Н.', 2);

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
(1, 'adm', 'Администраторы'),
(2, 'usr', 'Пользователи');

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
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `recipt`
--
ALTER TABLE `recipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `supply`
--
ALTER TABLE `supply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '№', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '№', AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_user_group1` FOREIGN KEY (`user_group_id`) REFERENCES `user_group` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
