-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: MySQL-8.2
-- Время создания: Ноя 30 2024 г., 15:49
-- Версия сервера: 8.2.0
-- Версия PHP: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `docker`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `login` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`) VALUES
(1, 'vika', 'vika');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` smallint UNSIGNED NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_id` int NOT NULL,
  `is_moderated` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `email`, `rating`, `review`, `room_id`, `is_moderated`, `created_at`) VALUES
(5, 'Ivan', 'ivan.tixonov00@mail.ru', 5, 'The best room!', 6, 1, '2024-11-28 14:09:30'),
(6, 'das', 'ivan.tixonov00@mail.ru', 1, 'fdsfg', 6, 1, '2024-11-28 14:26:43'),
(7, 'Вика', 'vika@mail.ru', 5, 'Ну реально классный!', 9, 1, '2024-11-28 15:26:26'),
(8, 'trdt', 'drtd@mail.ru', 3, 'ertyresy', 2, 1, '2024-11-29 13:27:05'),
(9, 'Igor', 'dsa@dsa', 5, 'ВСЁ КЛАССНО!!!!!!!', 10, 1, '2024-11-29 13:32:32');

-- --------------------------------------------------------

--
-- Структура таблицы `rooms`
--

CREATE TABLE `rooms` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `size` int NOT NULL,
  `max_people` int NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `slug`, `price`, `size`, `max_people`, `description`) VALUES
(2, 'dsa', 'dsa', 432, 3, 2, '<p>dfds</p>\r\n'),
(5, 'rttrfyr', 'ytr', 258, 2, 1, '<p>dasdsa</p>\r\n'),
(6, 'New', 'New', 159, 60, 3, '<h1>Описание</h1>\r\n'),
(8, 'привет как дела', 'privet-kak-dela', 200, 100, 5, '<p>Привет</p>\r\n'),
(9, 'Новый номер', 'novyy-nomer', 500, 125, 5, '<h1>Это классный номер!</h1>\r\n\r\n<p><strong><em>Ну очень классный</em></strong></p>\r\n'),
(10, 'dutrjy', 'dutrjy', 600, 12, 1, '<h3><strong><em><s>R7YI-H9FRU9WE</s></em></strong></h3>\r\n');

-- --------------------------------------------------------

--
-- Структура таблицы `room_service`
--

CREATE TABLE `room_service` (
  `id` int NOT NULL,
  `room_id` int NOT NULL,
  `service_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `room_service`
--

INSERT INTO `room_service` (`id`, `room_id`, `service_id`) VALUES
(26, 8, 1),
(30, 2, 1),
(33, 9, 4),
(34, 9, 5),
(39, 10, 1),
(40, 10, 4),
(41, 10, 5),
(42, 10, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE `services` (
  `id` int NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`id`, `name`) VALUES
(1, 'mmh'),
(4, 'Душ'),
(5, 'Туалетf'),
(6, 'Кухня');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`);

--
-- Индексы таблицы `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Индексы таблицы `room_service`
--
ALTER TABLE `room_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_service_ibfk_1` (`room_id`),
  ADD KEY `room_service_ibfk_2` (`service_id`);

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `room_service`
--
ALTER TABLE `room_service`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `room_service`
--
ALTER TABLE `room_service`
  ADD CONSTRAINT `room_service_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `room_service_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
