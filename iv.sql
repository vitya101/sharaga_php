-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 10 2024 г., 08:08
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `iv`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bulletin_board`
--

CREATE TABLE `bulletin_board` (
  `id` int NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `bulletin_board`
--

INSERT INTO `bulletin_board` (`id`, `title`, `description`, `author_id`) VALUES
(1, 'sdf', 'sdfsdf', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `time`, `name`, `comment`) VALUES
(1, '2024-09-18 07:57:59', 'Дмитрий', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla efficitur elementum lorem id venenatis. Nullam id sagittis urna, eu ultrices risus. Duis ante lorem, semper nec fringilla eu, commodo vel mauris. Nunc tristique odio lectus, eget condimentum nunc consectetur eu. Nullam non varius nisl, aliquet fringilla lectus. Aliquam erat volutpat. Ut vel mi et lectus hendrerit ornare vel ut neque. Quisque venenatis nisl eu mi'),
(2, '2024-09-18 07:58:28', 'Николай', 'Ut varius commodo fringilla. Nullam id pulvinar odio. Pellentesque gravida aliquam ipsum, et malesuada neque molestie eget. Vestibulum sagittis finibus efficitur. Donec sit amet aliquet dolor, vitae ornare tortor. Etiam eget augue nec diam vehicula bibendum. Nulla quis erat lacus. Vestibulum quis mattis augue. Praesent dignissim, justo non aliquam feugiat, lorem metus egestas leo, quis eleifend odio quam in ex. Aenean diam est, scelerisque ac ultricies sit amet, vulputate in tortor. Etiam ac mi enim. Sed pellentesque elementum erat eu eleifend. Integer imperdiet sem eu magna feugiat, sed efficitur velit convallis. '),
(3, '2024-09-18 08:00:09', 'Кирилл', 'asdfsdfsdf');

-- --------------------------------------------------------

--
-- Структура таблицы `jokes`
--

CREATE TABLE `jokes` (
  `id` int NOT NULL,
  `isHidden` tinyint(1) NOT NULL DEFAULT '1',
  `joke` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `jokes`
--

INSERT INTO `jokes` (`id`, `isHidden`, `joke`, `author`, `category_id`) VALUES
(1, 0, 'Колобок повесился', 'Кристин Скотт', 1),
(3, 0, 'Мой способ шутить — это говорить правду.\r\nНа свете нет ничего смешнее. ', ' Анна Михалкова', 2),
(4, 0, 'Хорошо смеется тот, anekdotov.net, кто смеется без последствий; -)', ' Анна Михалкова', 2),
(5, 0, 'Штирлиц вышел на берег моря и бросился на гальку. Галька завизжала и убежала. ', 'Галька ', 6),
(6, 0, '– Что у вас за собачка?\r\n– Это фараонова собака. anekdotov.net,\r\n– Надо же, как долго живёт!', 'Дмитрий', 4),
(7, 0, 'Оля учится водить машину. Инструктор говорит:\r\n— Оля, давай припаркуемся здесь. anekdotov.net,\r\nОля в ужасе:\r\n— Но здесь же знак \"Парковка только для инвалидов\"!\r\nИнструктор спокойно отвечает:\r\n— Оля, после твоего вождения мы вполне подходим.', 'Оля', 5),
(8, 0, 'hehehe', '0_0', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `joke_categories`
--

CREATE TABLE `joke_categories` (
  `id` int NOT NULL,
  `category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `joke_categories`
--

INSERT INTO `joke_categories` (`id`, `category`) VALUES
(1, 'смешные'),
(2, 'новые'),
(3, 'врачи'),
(4, 'животные'),
(5, 'транспорт'),
(6, 'Штирлиц');

-- --------------------------------------------------------

--
-- Структура таблицы `likes`
--

CREATE TABLE `likes` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `bulletin_id` int NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'VISITOR'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `role`) VALUES
(1, '0_0', 'qwerty666', 'ADMIN');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bulletin_board`
--
ALTER TABLE `bulletin_board`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `jokes`
--
ALTER TABLE `jokes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `joke_categories`
--
ALTER TABLE `joke_categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bulletin_id` (`bulletin_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bulletin_board`
--
ALTER TABLE `bulletin_board`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `jokes`
--
ALTER TABLE `jokes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `joke_categories`
--
ALTER TABLE `joke_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `bulletin_board`
--
ALTER TABLE `bulletin_board`
  ADD CONSTRAINT `bulletin_board_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `jokes`
--
ALTER TABLE `jokes`
  ADD CONSTRAINT `jokes_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `joke_categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`bulletin_id`) REFERENCES `bulletin_board` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
