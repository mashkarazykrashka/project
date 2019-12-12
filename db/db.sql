-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 12 2019 г., 14:40
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
-- Очистить таблицу перед добавлением данных `goods`
--

TRUNCATE TABLE `goods`;
--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `nameGoods`, `shortGoods`, `coefTrans`) VALUES
(12, 'Молоко пит. паст. 2,5% ж. в пюр-паке 1л', 'МолПитПаст2,5%ПюрП1л', 1),
(14, 'Молоко топленое 3,5%, в пюр-паке 0,5л', 'МолТопл3,5%ПюрПак0,5', 4),
(15, 'Молоко козье от 3,5% до 4%  жир., в пюр-паке 0,5л', 'МолКоз3,5%-4%п/п0,5л', 6),
(16, 'Кефир, 3,5% ж, в пюр-паке 1 кг', 'Кефир3,5%ПюрПак1кг', 4),
(17, 'Ряженка 4% полим. стак. 450г', 'Ряжен4%Стакан200г', 3),
(18, 'Сливки питьевые 10% жира, Теtra Brik, 200г', 'Сливки10%200г', 8);

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
-- Очистить таблицу перед добавлением данных `recipt`
--

TRUNCATE TABLE `recipt`;
--
-- Дамп данных таблицы `recipt`
--

INSERT INTO `recipt` (`id`, `nameRecipt`, `signFirm`) VALUES
(11, 'ОАО \"Веста\"', 1),
(12, 'ООО \"Ресттрейд\"', 0),
(13, 'ЗАО \"Юнифуд\"', 0),
(18, 'ООО \"Белмаркет\"', 1),
(19, 'ОАО \"Белвиллесден\"', 0),
(20, 'ОАО \"Ника\"', 0),
(21, 'ОАО \"Белинтерпродукт\"', 1),
(22, 'ИООО \"Табак-инвест\"', 0),
(23, 'ИООО \"ГРИНрозница\"', 0),
(24, 'ОАО \"Мерком\"', 1),
(25, 'ООО \"Санта-Ритейл\"', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `supply`
--

DROP TABLE IF EXISTS `supply`;
CREATE TABLE `supply` (
  `id` int(11) NOT NULL,
  `user_group_id` int(11) NOT NULL COMMENT 'Поставщик',
  `recipt_id` int(11) NOT NULL COMMENT 'Покупатель',
  `goods_id` int(11) NOT NULL COMMENT 'Товар',
  `quantity` int(11) NOT NULL COMMENT 'Количество'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Очистить таблицу перед добавлением данных `supply`
--

TRUNCATE TABLE `supply`;
--
-- Дамп данных таблицы `supply`
--

INSERT INTO `supply` (`id`, `user_group_id`, `recipt_id`, `goods_id`, `quantity`) VALUES
(22, 5, 11, 12, 101),
(23, 5, 21, 16, 80),
(25, 6, 13, 16, 30),
(27, 7, 25, 17, 40),
(28, 6, 25, 14, 60),
(29, 7, 19, 15, 60),
(30, 5, 23, 14, 60),
(31, 6, 22, 18, 40),
(32, 7, 20, 17, 70),
(33, 5, 13, 12, 60),
(34, 6, 11, 15, 80),
(35, 7, 18, 18, 60),
(36, 6, 24, 14, 50),
(37, 7, 11, 14, 60),
(38, 5, 20, 14, 60),
(39, 5, 13, 16, 80),
(40, 6, 19, 16, 90),
(41, 6, 13, 17, 10),
(42, 7, 19, 12, 80),
(43, 6, 18, 14, 60),
(44, 7, 12, 16, 80),
(45, 5, 22, 16, 60),
(46, 5, 24, 17, 60),
(47, 5, 25, 18, 90);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT '№',
  `login` varchar(45) DEFAULT NULL COMMENT 'Логин',
  `pass` varchar(45) DEFAULT NULL COMMENT 'Пароль',
  `name` varchar(45) DEFAULT NULL COMMENT 'Ф.И.О.',
  `surname` varchar(45) DEFAULT NULL COMMENT 'Должность',
  `user_group_id` int(11) NOT NULL COMMENT 'Группа'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Очистить таблицу перед добавлением данных `users`
--

TRUNCATE TABLE `users`;
--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `name`, `surname`, `user_group_id`) VALUES
(10, 'admin', '123', 'Доморацкая М. Б.', 'Администратор', 4),
(11, 'user', '111', 'Иванова А. П.', 'Оператор', 5),
(14, 'ttt', '222', 'Зайцева А. Н.', 'Опертор', 7),
(15, 'yyy', '333', 'Сидорова М. К.', 'Оператор', 6),
(16, 'uuu', '444', 'Филимонова Л. В.', 'Оператор', 5);

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
-- Очистить таблицу перед добавлением данных `user_group`
--

TRUNCATE TABLE `user_group`;
--
-- Дамп данных таблицы `user_group`
--

INSERT INTO `user_group` (`id`, `cod`, `description`) VALUES
(4, 'adm', 'Администраторы'),
(5, 'bel', 'ОАО \"Беллакт\"'),
(6, 'mol', 'ООО \"Молоко\"'),
(7, 'gmz', 'ОАО \"ГМЗ\"');

--
-- Индексы сохранённых таблиц
--

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
  ADD PRIMARY KEY (`id`,`user_group_id`,`recipt_id`,`goods_id`),
  ADD KEY `fk_supply_recipt1_idx` (`recipt_id`),
  ADD KEY `fk_supply_goods1_idx` (`goods_id`),
  ADD KEY `fk_supply_user_group1_idx` (`user_group_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `recipt`
--
ALTER TABLE `recipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `supply`
--
ALTER TABLE `supply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '№', AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '№', AUTO_INCREMENT=9;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `supply`
--
ALTER TABLE `supply`
  ADD CONSTRAINT `fk_supply_goods1` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_supply_recipt1` FOREIGN KEY (`recipt_id`) REFERENCES `recipt` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_supply_user_group1` FOREIGN KEY (`user_group_id`) REFERENCES `user_group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_user_group1` FOREIGN KEY (`user_group_id`) REFERENCES `user_group` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
