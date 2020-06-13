-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 13 2020 г., 16:46
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dlbook`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`) VALUES
(1, 'admin', 'a0bdac0fdc9076828db507e20d029b86');

-- --------------------------------------------------------

--
-- Структура таблицы `users_bd`
--

CREATE TABLE `users_bd` (
  `user_id` int(11) NOT NULL,
  `name_bd` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `contact_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `user_acounts`
--

CREATE TABLE `user_acounts` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Здесь хранятся все аккаунты пользователей ';

--
-- Дамп данных таблицы `user_acounts`
--

INSERT INTO `user_acounts` (`user_id`, `password`, `user_name`, `email`) VALUES
(16, 'a0bdac0fdc9076828db507e20d029b86', 'admin', 'vovandrion@mail.ru'),
(17, 'a0bdac0fdc9076828db507e20d029b86', 'root', 'root@gmail.com'),
(18, 'a0bdac0fdc9076828db507e20d029b86', 'toto', ''),
(19, 'a0bdac0fdc9076828db507e20d029b86', 'tttttttt', 'ttt@mail.ru'),
(20, '512af2f5a98a354bb5334a72d0765266', '111111111', '2222222@mail.ru'),
(21, 'a0bdac0fdc9076828db507e20d029b86', '11', '28336@mail.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `user_rights`
--

CREATE TABLE `user_rights` (
  `user_id` int(11) NOT NULL,
  `db_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `moder` tinyint(1) NOT NULL,
  `user` tinyint(1) NOT NULL,
  `contact_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user_rights`
--

INSERT INTO `user_rights` (`user_id`, `db_name`, `admin`, `moder`, `user`, `contact_id`) VALUES
(16, 'user_bd_1', 0, 0, 1, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users_bd`
--
ALTER TABLE `users_bd`
  ADD PRIMARY KEY (`contact_id`);

--
-- Индексы таблицы `user_acounts`
--
ALTER TABLE `user_acounts`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `user_rights`
--
ALTER TABLE `user_rights`
  ADD PRIMARY KEY (`contact_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users_bd`
--
ALTER TABLE `users_bd`
  MODIFY `contact_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user_acounts`
--
ALTER TABLE `user_acounts`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `user_rights`
--
ALTER TABLE `user_rights`
  MODIFY `contact_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
