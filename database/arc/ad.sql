-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 26 2018 г., 23:20
-- Версия сервера: 5.7.16
-- Версия PHP: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ad`
--

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_01_17_182657_create_categories_table', 1),
(4, '2018_01_17_183342_create_tags_table', 1),
(5, '2018_01_17_183438_create_comments_table', 1),
(6, '2018_01_17_183449_create_posts_table', 1),
(7, '2018_01_17_183510_create_subscriptions_table', 1),
(8, '2018_01_17_184506_create_posts_tags_table', 1),
(9, '2018_01_19_124831_add_avtar_column_to_users', 1),
(10, '2018_01_19_160944_make_password_nullable', 1),
(11, '2018_01_22_174611_add_date_to_posts', 1),
(12, '2018_01_22_182116_add_image_to_posts', 1),
(13, '2018_01_23_191816_add_description_to_posts', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `params`
--

CREATE TABLE `params` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `value` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `desc` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  `is_featured` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `projects`
--

CREATE TABLE `projects` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_danish_ci NOT NULL DEFAULT '0',
  `slug` varchar(255) COLLATE utf8_danish_ci NOT NULL DEFAULT '0',
  `need_cnt_invite` int(11) UNSIGNED DEFAULT '0',
  `video_code` varchar(1000) COLLATE utf8_danish_ci DEFAULT '0',
  `start_page_content` text COLLATE utf8_danish_ci,
  `confirm_page_content` text COLLATE utf8_danish_ci,
  `curs_page_content` text COLLATE utf8_danish_ci,
  `course_link` varchar(400) COLLATE utf8_danish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;

--
-- Дамп данных таблицы `projects`
--

INSERT INTO `projects` (`id`, `name`, `slug`, `need_cnt_invite`, `video_code`, `start_page_content`, `confirm_page_content`, `curs_page_content`, `course_link`) VALUES
(1, 'ASTRO', 'astro', 6, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/QJvHd5A-UfQ\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', '<header class=\"b-head\"> <hgroup class=\"b-subhead__text\"> <h1>КОМПЛЕКТ №1 -БЕСПЛАТНЫЕ МАСТЕР-КЛАССЫ ПО ВЕДИЧЕСКОЙ АСТРОЛОГИИ ОТ ИКСА</h1> <h2>1. Закрытые мастер-классы от Василия Тушкина в ИКСА (2 темы)\r\n2. Практика разбора натальных карт Специалистов\r\n3. Кураторский созвон по теме Раху-Кету</h2> </hgroup> <div class=\"b-subhead__eventform colored-eventform\"> <span class=\"fw-b\">Формат курса</span> — Видео-запись</div> </header>', '<header class=\"b-head\"> <hgroup class=\"b-subhead__text\"> <h1>КОМПЛЕКТ №1 -БЕСПЛАТНЫЕ МАСТЕР-КЛАССЫ ПО ВЕДИЧЕСКОЙ АСТРОЛОГИИ ОТ ИКСА</h1> <h2>1. Закрытые мастер-классы от Василия Тушкина в ИКСА (2 темы)', '<header class=\"b-head\"> <hgroup class=\"b-subhead__text\"> <h1>КОМПЛЕКТ №1 -БЕСПЛАТНЫЕ МАСТЕР-КЛАССЫ ПО ВЕДИЧЕСКОЙ АСТРОЛОГИИ ОТ ИКСА</h1> <h2>1. Закрытые мастер-классы от Василия Тушкина в ИКСА (2 темы)', 'https://www.google.com/');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `self_referal` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_referal` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirm_link` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_send` tinyint(1) UNSIGNED DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `self_referal`, `parent_referal`, `confirm_link`, `is_send`, `created_at`, `updated_at`) VALUES
(23, 'alex', 'alex_d@ukr.net', '2sfnlXPW', NULL, 'WCgrYpSbySX4fndg', 1, '2018-01-26 08:19:27', '2018-01-26 18:14:42'),
(24, 'john', 'alex_d@ukr.net1', 'kJAlkRWr', '2sfnlXPW', 'Qi4YHfE1rHmCVNCP', 0, '2018-01-26 08:20:21', '2018-01-26 08:20:21'),
(25, 'ddd', 'alex_d@ukr.net33', 'qCiInD5w', '2sfnlXPW', 'j0STTHJPeRwSCWje', 0, '2018-01-26 08:21:01', '2018-01-26 08:21:01'),
(27, '111', 'dav@argus.kharkov.uatert', 'hsRvZy8e', '2sfnlXPW', 'kGFjyhQmub66tmCF', 0, '2018-01-26 08:48:10', '2018-01-26 08:48:10'),
(42, 'ddd', 'alex_d@ukr.net45646456', 'pZi2CfH2', '2sfnlXPW', 'z6SQY47ysL48AbhJ', 0, '2018-01-26 17:24:03', '2018-01-26 17:24:03'),
(67, 'alex', 'alex_dk@ukr.netertghjh', 'FtaU4JLX', '2sfnlXPW', 'Cf0gTTCh3s9dYJJb', 0, '2018-01-26 18:13:55', '2018-01-26 18:13:55'),
(68, 'ddd', 'sbecompany.uk@gmail.comrtyrty', 'IQITrU0S', '2sfnlXPW', '0TEUj2WMx0qMFO0z', 0, '2018-01-26 18:14:38', '2018-01-26 18:14:38'),
(69, 'ddd', 'sbecompany.uk@gmail.com3454354353', 'U96Uhdt1', '2sfnlXPW', 'h3IKa1SjrJXUS9AX', 0, '2018-01-26 18:15:26', '2018-01-26 18:15:26');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `params`
--
ALTER TABLE `params`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `params`
--
ALTER TABLE `params`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
