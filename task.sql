-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 11 2021 г., 18:29
-- Версия сервера: 10.4.18-MariaDB
-- Версия PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `task`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` enum('done') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `email`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Buy Google', 'google@google.com', 'Donec consectetur nulla et placerat vulputate. Mauris pulvinar eleifend urna. Nulla mollis elementum erat et viverra. Curabitur facilisis diam urna, faucibus cursus elit hendrerit ac. Vestibulum non tincidunt augue. Vivamus consequat rutrum nisl, eu commodo felis faucibus eu. Duis magna dolor, finibus sodales risus eu, laoreet volutpat justo. Sed consequat, enim ac tristique imperdiet, urna eros tristique tellus, sit amet venenatis libero lacus id ex. Nulla arcu leo, vehicula a accumsan id, posuere in metus. Fusce tempus feugiat euismod. Curabitur tincidunt bibendum augue sit amet ultricies. Etiam nec ipsum ligula.', 'done', '2021-04-11 15:30:56', '2021-04-11 17:36:23'),
(2, 'Politechnika Gdańska', 'admin@pg.edu.pl', 'Cras mattis efficitur leo scelerisque iaculis. Donec ac lectus metus. Duis id mollis orci. Integer blandit vehicula tortor eu pellentesque. Suspendisse mollis efficitur orci, elementum pretium purus blandit non. Donec vehicula finibus odio, at placerat ante fringilla vel. Duis a bibendum dolor, a pulvinar massa. Quisque accumsan justo eget erat semper, vel sollicitudin ipsum maximus. Curabitur a dolor a mauris imperdiet sollicitudin. Aenean tristique elit vel posuere convallis. Vivamus sed tincidunt nibh, placerat interdum mi. Donec porttitor volutpat massa. Nunc auctor consectetur mollis. Duis vitae placerat nibh. Donec eget felis fringilla eros gravida volutpat.', NULL, '2021-04-11 15:33:10', '2021-04-11 17:32:17'),
(3, 'task 1', 'task@google.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque non egestas dui, ac volutpat massa. Nam ut vulputate eros. Donec mattis odio lacus, non dictum neque bibendum eu. Nulla elementum maximus sagittis. Suspendisse justo felis, sollicitudin non dignissim sit amet, volutpat dapibus odio. Suspendisse nulla nisi, auctor at ipsum eget, vulputate condimentum quam. Aliquam erat volutpat. Nullam imperdiet blandit sapien, ac laoreet mauris efficitur sed.', NULL, '2021-04-11 15:30:17', '2021-04-11 17:29:08'),
(6, 'amazon test', 'amazon@amazon.pl', 'Sed posuere felis arcu, eu aliquet tortor finibus in. Aenean porta aliquam velit, eu convallis leo mollis eget. Sed arcu sapien, suscipit ac aliquam ac, tempor a urna. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec pretium tellus id nulla volutpat iaculis. Nullam sollicitudin ullamcorper dui in ornare. Etiam finibus commodo molestie. Curabitur condimentum turpis nibh, sit amet condimentum ante egestas sit amet. Nulla felis turpis, tempor nec porttitor eu, fringilla quis mauris. Duis sit amet dolor non ipsum fringilla pulvinar et quis dui. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus odio magna, aliquet id fermentum eget, semper eget nisl. Curabitur suscipit mollis lectus, quis aliquet orci. Mauris tortor lacus, commodo at lacus vitae, lobortis cursus justo. Proin vitae odio sit amet orci interdum molestie. Nunc porta vel tortor non iaculis.', NULL, '2021-04-11 15:32:16', '2021-04-11 17:31:26'),
(7, 'test', 'azurora@allegro.pl', 'Integer vulputate a turpis nec pretium. Donec blandit augue ac libero bibendum maximus. Aliquam ac mauris ex. Ut neque eros, posuere eu tortor vitae, viverra malesuada tortor. Quisque porta, risus vitae suscipit feugiat, lacus diam pharetra dolor, at vulputate nibh enim in sem. Nunc eget malesuada mi, vitae vulputate tellus. Proin consequat lorem quis turpis volutpat, in rutrum sapien viverra.', NULL, '2021-04-11 15:32:16', '2021-04-11 17:31:26'),
(8, 'task 2', 'task2@intel.com', 'Vivamus placerat convallis enim id auctor. Nam blandit at enim et sodales. Vivamus lorem ante, auctor eu neque vitae, tristique pellentesque odio. Fusce at lorem semper, varius enim vitae, volutpat magna. Cras quis euismod risus. Maecenas dolor ligula, sagittis ut auctor vitae, euismod vitae ipsum. Suspendisse mollis ligula eget velit tristique, mattis posuere ligula iaculis. Vestibulum ac mi egestas, porttitor orci non, egestas nulla. Praesent consequat ligula et ultrices commodo. Pellentesque pellentesque sapien elit, et tempus turpis consequat finibus. Pellentesque tempus tortor at dui tincidunt, sed lobortis est congue.', NULL, '2021-04-11 15:30:17', '2021-04-11 17:29:08'),
(10, 'NASA task  ', 'email@email.com', 'Nam molestie, odio a luctus porttitor, sapien risus congue enim, dapibus consequat turpis neque blandit eros. Vestibulum eu quam finibus, sagittis ligula vitae, viverra est. Duis convallis libero non eleifend luctus. Cras efficitur purus vitae ligula commodo, ut hendrerit mi gravida. Duis faucibus sit amet purus quis lacinia. Fusce volutpat congue nulla eu elementum. Fusce eget nisl sit amet risus tincidunt sagittis. Phasellus feugiat, quam a dignissim convallis, dolor orci condimentum odio, sed fringilla turpis sapien id mauris.', NULL, '2021-04-11 15:34:42', '2021-04-11 17:33:48'),
(11, 'task nr 3', 'email@mail.ua', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam interdum molestie nunc, blandit pharetra lorem aliquet sit amet. Fusce tempor justo eu nisi mollis venenatis. In a enim mattis, ultricies risus lobortis, vehicula nunc. Sed in nibh vulputate, commodo dolor eget, varius nunc. Donec in massa ut elit laoreet imperdiet. Sed ac quam elit. Phasellus sed enim sit amet lorem gravida pretium. Vestibulum id ornare enim. Quisque dolor tortor, faucibus a nulla in, semper elementum nisl. Donec iaculis tortor nec ex pulvinar, fringilla imperdiet nulla convallis. Aliquam erat volutpat. Curabitur mollis sem in massa rutrum, sed porta mauris tincidunt. Morbi vehicula eros vitae enim pharetra mollis. Proin in vehicula ex.', NULL, '2021-04-11 15:34:42', '2021-04-11 17:33:48');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `password` varchar(999) NOT NULL,
  `login` varchar(255) NOT NULL,
  `pex` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `password`, `login`, `pex`, `created_at`, `updated_at`) VALUES
(1, '$2y$10$4u/T2En.zo28WPr65pvuku1FpWIbOYYvBsgOZaNLRmPjMkWjwBaCG', 'admin', 'admin', '2021-04-10 16:28:56', '2021-04-10 15:28:50');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
