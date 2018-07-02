-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-07-02 10:42:33
-- 伺服器版本: 10.1.25-MariaDB
-- PHP 版本： 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `android_project`
--

-- --------------------------------------------------------

--
-- 資料表結構 `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE `files` (
  `id` int(10) UNSIGNED NOT NULL,
  `milestone_id` int(11) NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2018_06_28_182211_create_files_table', 1),
('2018_06_28_182211_create_milestone_table', 1),
('2018_06_28_182211_create_team_table', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `milestones`
--

DROP TABLE IF EXISTS `milestones`;
CREATE TABLE `milestones` (
  `id` int(10) UNSIGNED NOT NULL,
  `team_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `milestones`
--

INSERT INTO `milestones` (`id`, `team_id`, `name`, `order`, `created_at`, `updated_at`) VALUES
(1, 0, 'name', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 資料表結構 `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE `teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `score` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `teams`
--

INSERT INTO `teams` (`id`, `picture`, `name`, `subject`, `description`, `score`, `order`, `created_at`, `updated_at`) VALUES
(1, '95330810.jpg', 'R_ID_Button1', 'BMI程式進階健康管理App', '<p>介紹</p>', 0, 1, '2018-06-29 00:27:02', '2018-06-29 00:27:02'),
(2, '52096557.jpg', 'R_ID_Button2', '即時聊天App', '<p>介紹</p>', 0, 2, '2018-06-29 00:30:26', '2018-06-29 00:30:26'),
(3, '94357299.jpg', 'WO.MAN2', '蕃茄鐘(時間管理APP)', '<p>介紹</p>', 0, 3, '2018-06-29 00:31:04', '2018-06-29 00:31:04'),
(4, '80261230.jpg', '三個男人', '實體通路商場比價APP', '<p>專案介紹</p>', 0, 4, '2018-06-29 00:31:53', '2018-06-29 00:31:53'),
(5, '42398071.jpg', '我們只認0與1', '桌遊app', '<p>組員：</p>\r\n<p>ｘｘｘ</p>\r\n<p>介紹：</p>', 0, 5, '2018-06-29 00:33:29', '2018-06-29 00:33:29'),
(6, '97967529.jpg', '狂飆的蝸牛', '商品掃描APP', '<p>組員：</p>\r\n<p>&nbsp;</p>\r\n<p>介紹：</p>', 0, 6, '2018-06-29 00:34:18', '2018-06-29 00:34:18'),
(7, '63751220.jpg', '耕耘者', '教室智慧管理系統', '<p>組員：</p>\r\n<p>&nbsp;</p>\r\n<p>介紹：</p>', 0, 7, '2018-06-29 00:34:59', '2018-06-29 00:34:59'),
(8, '57684326.jpg', '想不到名字', '線上訂餐App', '<p>組員:</p>\r\n<p>介紹:</p>', 0, 8, '2018-06-29 00:36:51', '2018-06-29 00:36:51'),
(9, '62670898.jpg', '辦桌一人組', '旅遊景點介紹APP', '<p>組員:</p>\r\n<p>介紹:</p>', 0, 9, '2018-06-29 00:37:59', '2018-06-29 00:37:59'),
(10, '15014648.jpg', '三個臭皮匠', 'OCBook(二手書交換平台)', '<p>組員名單：</p>\r\n<p>莊峻翔</p>\r\n<p>陳鵬光</p>\r\n<p>洪家吉</p>\r\n<p>App介紹:</p>\r\n<p>&nbsp;</p>', 0, 10, '2018-07-01 22:34:50', '2018-07-01 22:34:50');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'webmaster', 'kemie@macroviz.com', '$2y$10$L07NzGD79Zse7oNWAzlbD.5I/l.qFIA8o5v7m5Dhi1ToTb61d0nBG', NULL, NULL, NULL),
(2, 'webmaster', 'kemieteach@gmail.com', '$2y$10$FM4F8AWj36sE430iHNwANeylpZW4dv73wVX95uUF8G40qvBdAh/HS', '1DO5JQ98hPQOAUsR2MkNfMJHRZuDlIrICHF9hklZeO6owb6tzutrkLzcXmiL', '2018-06-28 21:32:44', '2018-06-28 22:16:02'),
(3, 'user', 'student@android.com', '$2y$10$taWVA/A3k4W2bKJh6bk8S.8.k.KqaA86FptvsdK08EZQ.O6LD2D6K', 'WfpPElhKO9eCwObaJXSjledyu3LDWAJdj79DVEvM4QCtdwbUJpggenGnbQxg', '2018-06-28 22:45:47', '2018-06-28 22:54:01');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `milestones`
--
ALTER TABLE `milestones`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- 資料表索引 `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `milestones`
--
ALTER TABLE `milestones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用資料表 AUTO_INCREMENT `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- 使用資料表 AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
