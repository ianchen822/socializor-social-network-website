-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-06-10 20:34:14
-- 伺服器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `socializor`
--

-- --------------------------------------------------------

--
-- 資料表結構 `chatrecord`
--

CREATE TABLE `chatrecord` (
  `crId` int(100) NOT NULL,
  `room` char(100) CHARACTER SET utf8mb4 NOT NULL,
  `typer` char(100) CHARACTER SET utf8mb4 NOT NULL,
  `crcontent` varchar(10000) CHARACTER SET utf32 NOT NULL,
  `crTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `chatrecord`
--

INSERT INTO `chatrecord` (`crId`, `room`, `typer`, `crcontent`, `crTime`) VALUES
(1, '2', '', 'test', '2020-06-10 21:58:06'),
(2, '2', '123456', '2113', '2020-06-09 22:02:00'),
(3, '2', '5c633167-2a45-ab2f-720b-c86dabc2522f', '456', '2020-06-09 22:05:39'),
(4, '2', '123456', '7777', '2020-06-09 22:06:49'),
(5, '2', '123456', '7777', '2020-06-09 22:07:06'),
(6, '2', '123456', 'etert', '2020-06-09 22:07:37'),
(7, '2', '123456', 'you', '2020-06-09 22:09:03'),
(8, '2', '123456', 'yes', '2020-06-10 08:15:57'),
(9, '2', '123456', '最近過得怎麼樣', '2020-06-10 08:19:28'),
(10, '2', 'b5224d61-b248-8807-e5f1-7f9c3177af90', 'ji', '2020-06-10 08:36:12'),
(11, '2', 'b5224d61-b248-8807-e5f1-7f9c3177af90', 'yes', '2020-06-10 08:38:37'),
(12, '2', 'b5224d61-b248-8807-e5f1-7f9c3177af90', 'ffdfd', '2020-06-10 09:06:34'),
(13, '2', 'b5224d61-b248-8807-e5f1-7f9c3177af90', 'jflajjfl', '2020-06-10 10:02:07'),
(14, '2', 'b5224d61-b248-8807-e5f1-7f9c3177af90', 'fajjslfjaf', '2020-06-10 10:03:25'),
(15, '2', 'b5224d61-b248-8807-e5f1-7f9c3177af90', 'fasfa', '2020-06-10 10:07:16'),
(16, '2', 'b5224d61-b248-8807-e5f1-7f9c3177af90', 'fasfaf', '2020-06-10 10:09:14'),
(17, '2', 'b5224d61-b248-8807-e5f1-7f9c3177af90', 'fasfdsadf', '2020-06-10 10:13:39'),
(18, '2', 'b5224d61-b248-8807-e5f1-7f9c3177af90', 'iiiii', '2020-06-10 10:13:48'),
(19, '2', 'b5224d61-b248-8807-e5f1-7f9c3177af90', 'fsafasf', '2020-06-10 10:20:42'),
(20, '2', 'b5224d61-b248-8807-e5f1-7f9c3177af90', 'fsjfoafj', '2020-06-10 10:20:50'),
(21, '2', 'b5224d61-b248-8807-e5f1-7f9c3177af90', 'fdsfasfaf', '2020-06-10 10:21:03'),
(22, '2', 'b5224d61-b248-8807-e5f1-7f9c3177af90', '中文', '2020-06-10 10:21:19'),
(23, '2', 'b5224d61-b248-8807-e5f1-7f9c3177af90', '你說甚麼', '2020-06-10 10:22:31'),
(24, '2', 'b5224d61-b248-8807-e5f1-7f9c3177af90', 'dfasdfas', '2020-06-10 10:26:48'),
(25, '', 'b5224d61-b248-8807-e5f1-7f9c3177af90', '', '2020-06-10 11:11:00'),
(26, '2', 'b5224d61-b248-8807-e5f1-7f9c3177af90', 'fdsfasf', '2020-06-10 11:11:06'),
(27, '', 'b5224d61-b248-8807-e5f1-7f9c3177af90', '', '2020-06-10 11:11:07'),
(28, '', 'b5224d61-b248-8807-e5f1-7f9c3177af90', '', '2020-06-10 11:13:09'),
(29, '', 'b5224d61-b248-8807-e5f1-7f9c3177af90', '', '2020-06-10 11:14:09'),
(30, '', 'b5224d61-b248-8807-e5f1-7f9c3177af90', '', '2020-06-10 11:14:34'),
(31, '2', 'b5224d61-b248-8807-e5f1-7f9c3177af90', 'fjiasljf', '2020-06-10 11:14:42'),
(32, '', 'b5224d61-b248-8807-e5f1-7f9c3177af90', '', '2020-06-10 11:14:43'),
(33, '', 'b5224d61-b248-8807-e5f1-7f9c3177af90', '', '2020-06-10 11:15:51'),
(34, '2', 'b5224d61-b248-8807-e5f1-7f9c3177af90', 'jjljlf', '2020-06-10 11:16:01'),
(35, '', 'b5224d61-b248-8807-e5f1-7f9c3177af90', '', '2020-06-10 11:16:02'),
(36, '2', 'b5224d61-b248-8807-e5f1-7f9c3177af90', 'fdsfasf', '2020-06-10 11:16:19'),
(37, '', 'b5224d61-b248-8807-e5f1-7f9c3177af90', '', '2020-06-10 11:16:20'),
(38, '', 'b5224d61-b248-8807-e5f1-7f9c3177af90', '', '2020-06-10 11:17:02'),
(39, '', 'b5224d61-b248-8807-e5f1-7f9c3177af90', '', '2020-06-10 11:20:25'),
(40, '', 'b5224d61-b248-8807-e5f1-7f9c3177af90', '', '2020-06-10 11:20:52'),
(41, '', 'b5224d61-b248-8807-e5f1-7f9c3177af90', '', '2020-06-10 11:22:00'),
(42, '', 'b5224d61-b248-8807-e5f1-7f9c3177af90', '', '2020-06-10 11:26:19'),
(43, '', 'b5224d61-b248-8807-e5f1-7f9c3177af90', '', '2020-06-10 11:28:03'),
(44, '', 'b5224d61-b248-8807-e5f1-7f9c3177af90', '', '2020-06-10 11:30:11'),
(45, '', 'b5224d61-b248-8807-e5f1-7f9c3177af90', '', '2020-06-10 11:30:55'),
(46, '', 'b5224d61-b248-8807-e5f1-7f9c3177af90', '', '2020-06-10 11:31:35'),
(47, '', 'b5224d61-b248-8807-e5f1-7f9c3177af90', '', '2020-06-10 11:33:00'),
(48, '', 'b5224d61-b248-8807-e5f1-7f9c3177af90', '', '2020-06-10 11:35:58'),
(49, '', 'b5224d61-b248-8807-e5f1-7f9c3177af90', '', '2020-06-10 11:36:05'),
(50, '', 'b5224d61-b248-8807-e5f1-7f9c3177af90', '', '2020-06-10 11:36:44'),
(51, '2', 'b5224d61-b248-8807-e5f1-7f9c3177af90', '', '2020-06-10 11:37:50'),
(52, '', 'b5224d61-b248-8807-e5f1-7f9c3177af90', '', '2020-06-10 11:37:50'),
(53, '', 'b5224d61-b248-8807-e5f1-7f9c3177af90', '', '2020-06-10 11:41:25'),
(54, '', 'b5224d61-b248-8807-e5f1-7f9c3177af90', '', '2020-06-10 11:44:20'),
(55, '2', 'b5224d61-b248-8807-e5f1-7f9c3177af90', 'jflsajajf', '2020-06-10 12:02:35'),
(56, '2', 'b5224d61-b248-8807-e5f1-7f9c3177af90', 'jflsajajf', '2020-06-10 12:03:19'),
(57, '2', 'b5224d61-b248-8807-e5f1-7f9c3177af90', 'fassdafafasfasfasfafdf', '2020-06-10 12:03:24'),
(58, '2', 'b5224d61-b248-8807-e5f1-7f9c3177af90', 'fadaff', '2020-06-10 12:03:29'),
(59, '2', '123456', 'fadsfafaf', '2020-06-10 14:16:24'),
(60, '2', '123456', 'fjljljfa', '2020-06-10 14:16:32'),
(61, '2', '123456', 'how do you sleep when you llie to me', '2020-06-10 14:16:48'),
(62, '2', '123456', 'how do you sleep when you llie to me', '2020-06-10 14:20:25'),
(63, '2', '123456', 'how do you sleep when you llie to me', '2020-06-10 14:20:30'),
(64, '2', '123456', 'how do you sleep when you llie to me', '2020-06-10 14:20:32'),
(65, '2', '123456', 'fjljjj', '2020-06-10 14:43:19'),
(66, '2', '123456', 'aaa', '2020-06-10 14:49:55'),
(67, '2', '123456', 'aaaa', '2020-06-10 14:50:17'),
(68, '2', '123456', 'aaaa', '2020-06-10 14:56:22'),
(69, '2', '123456', 'aaaa', '2020-06-10 15:13:20'),
(70, '2', '123456', 'aaaa', '2020-06-10 15:13:58'),
(71, '2', '123456', 'aaaa', '2020-06-10 15:14:32'),
(72, '2', '123456', 'abcde', '2020-06-10 15:14:54'),
(73, '2', '123456', 'abcde', '2020-06-10 15:14:58'),
(74, '', '123456', '', '2020-06-10 15:15:21'),
(75, '', '123456', '', '2020-06-10 15:15:39'),
(76, '2', '123456', 'abcde', '2020-06-10 15:16:43'),
(77, '2', '123456', '', '2020-06-10 15:17:28'),
(78, '2', '123456', 'abcde', '2020-06-10 15:17:38'),
(79, '2', '123456', '', '2020-06-10 15:18:35'),
(80, '2', '123456', 'abcde', '2020-06-10 15:18:48'),
(81, '2', '123456', 'qoqoqooqoq', '2020-06-10 15:19:20'),
(83, '2', '123456', 'jjjjj\n', '2020-06-10 15:21:48'),
(84, '2', '123456', 'abcde', '2020-06-10 15:24:16'),
(85, '2', '123456', 'asdfggh', '2020-06-10 15:25:45'),
(86, '2', '123456', 'saerdvgtynhugfdfghfcxdfvbh', '2020-06-10 15:29:13'),
(87, '2', '123456', 'sdzxfcgvbnjvgcxfs', '2020-06-10 15:29:16'),
(88, '2', '123456', 'fxcdvgmnjhcgfxdscvbnj', '2020-06-10 15:29:17'),
(89, '2', '123456', 'hi', '2020-06-10 15:29:45'),
(90, '2', '123456', 'cody is a normal person', '2020-06-10 15:30:27'),
(91, '2', '123456', 'cody you do it', '2020-06-10 15:43:31'),
(92, '2', '123456', 'how are you', '2020-06-10 15:45:49'),
(93, '2', '123456', 'hi', '2020-06-10 16:08:30'),
(94, '2', '5c633167-2a45-ab2f-720b-c86dabc2522f', 'hi', '2020-06-10 16:10:37'),
(95, '2', '5c633167-2a45-ab2f-720b-c86dabc2522f', 'this is a test this is a test this is a test this is a test', '2020-06-10 16:11:54'),
(96, '2', '123456', 'what the hell are you talking about', '2020-06-10 16:13:10'),
(97, '2', '5c633167-2a45-ab2f-720b-c86dabc2522f', 'im talking about this is test', '2020-06-10 16:14:11'),
(98, '2', '5c633167-2a45-ab2f-720b-c86dabc2522f', 'this is test this is test this is test this is test this is test this is test this is test this is test this is test this is test this is test this is test this is test this is test this is test this is test this is test this is test this is test this is test this is test this is test this is test this is test this is test this is test this is test this is test this is test this is test this is test this is test ', '2020-06-10 16:26:37'),
(99, '2', '123456', 'this is test this is testthis is testthis is testthis is testthis is testthis is testthis is testthis is testthis is testthis is testthis is testthis is testthis is testthis is testthis is testthis is testthis is testthis is testthis is testthis is testthis is testthis is testthis is testthis is testthis is testthis is testthis is test', '2020-06-10 16:27:12'),
(100, '2', '123456', 'aaaa', '2020-06-10 17:33:48'),
(101, '2', '123456', 'aaaa', '2020-06-10 17:34:43');

-- --------------------------------------------------------

--
-- 資料表結構 `comment`
--

CREATE TABLE `comment` (
  `cId` char(100) CHARACTER SET utf8mb4 NOT NULL,
  `post` char(100) CHARACTER SET utf8mb4 NOT NULL,
  `cident` char(100) CHARACTER SET utf8mb4 NOT NULL,
  `maker` char(100) CHARACTER SET utf8mb4 NOT NULL,
  `ccontent` varchar(10000) CHARACTER SET utf8mb4 NOT NULL,
  `cTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `comment`
--

INSERT INTO `comment` (`cId`, `post`, `cident`, `maker`, `ccontent`, `cTime`) VALUES
('2657154774952622', '5677309350519742', '理學院', '123456', '我也好想玩			', '2020-06-08 13:37:00'),
('2832458876724587', '3664194220702458', '匿名', '123456', '不知道爺，不過聽室友說他的粥裏面會拌生蛋，口感會很滑順~			', '2020-06-08 06:54:11'),
('3385191271452489', '2348424406327827', '阿言', '123456', '我也蠻想玩的~			', '2020-06-07 21:35:35'),
('5010586484876413', '2348424406327827', '理學院', '123456', '		爛遊戲買不起啦 88	', '2020-06-08 08:06:04'),
('6641677205862275', '3664194220702458', '柏言', '123456', '我也聽說還不錯吃			', '2020-06-08 13:24:49'),
('7070090807675210', '5677309350519742', '匿名', '123456', '我現在沒時間玩			', '2020-06-09 19:30:35'),
('8694107247318447', '3664194220702458', '理學院', '123456', '我也聽說步錯			', '2020-06-08 13:25:09');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `mId` char(100) CHARACTER SET utf8mb4 NOT NULL,
  `name` char(50) CHARACTER SET utf8mb4 NOT NULL,
  `nickname` char(50) CHARACTER SET utf8mb4 NOT NULL,
  `email` char(100) CHARACTER SET utf8mb4 NOT NULL,
  `mpsw` char(50) CHARACTER SET utf8mb4 NOT NULL,
  `gender` char(50) CHARACTER SET utf8mb4 NOT NULL,
  `dep` char(50) CHARACTER SET utf8mb4 NOT NULL,
  `verification` int(50) NOT NULL,
  `image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`mId`, `name`, `nickname`, `email`, `mpsw`, `gender`, `dep`, `verification`, `image`) VALUES
('123456', '陳柏言', '柏言', 'poyengood13@gmail.com', 'jjj555', 'male', '理學院', 1, ''),
('5c633167-2a45-ab2f-720b-c86dabc2522f', '陳柏諺', '言', 'poyengood13@gmail.com', 'jjj666', 'male', '中山大學', 1, ''),
('b5224d61-b248-8807-e5f1-7f9c3177af90', 'ian', 'ian', 'poyengood13@gmail.com', 'jjj999', 'male', '台灣大學', 1, '');

-- --------------------------------------------------------

--
-- 資料表結構 `post`
--

CREATE TABLE `post` (
  `pId` char(100) CHARACTER SET utf8mb4 NOT NULL,
  `author` char(100) CHARACTER SET utf8mb4 NOT NULL,
  `pcategory` char(50) CHARACTER SET utf8mb4 NOT NULL,
  `ident` char(100) CHARACTER SET utf8mb4 NOT NULL,
  `header` char(100) CHARACTER SET utf8mb4 NOT NULL,
  `pcontent` varchar(10000) CHARACTER SET utf8mb4 NOT NULL,
  `pTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `likes` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `post`
--

INSERT INTO `post` (`pId`, `author`, `pcategory`, `ident`, `header`, `pcontent`, `pTime`, `likes`) VALUES
('2024157591053614', '123456', '有趣', '柏言', '最近有甚麼有趣的事情啊', '最近有甚麼有趣的事情啊?		', '2020-06-08 08:34:39', 0),
('2348424406327827', '123456', '遊戲', '管學院', '動物森友會好玩嗎?', '最近想玩動物森友會!		', '2020-06-07 21:32:15', 0),
('3664194220702458', '123456', '美食', '匿名', '最近有甚麼好吃的', '聽室友說興隆居還不錯吃，有人可以告訴我它好吃的地方在哪裡呢?		', '2020-06-08 06:48:34', 0),
('5677309350519742', '123456', '遊戲', '柏言', '有人知道刺客教條的故事嗎', '好想玩刺客教條		', '2020-06-08 13:36:24', 0),
('6207303162150202', '123456', '工作', '柏言', '工作好累', '工作好累喔~		', '2020-06-08 10:10:02', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `room`
--

CREATE TABLE `room` (
  `rId` int(100) NOT NULL,
  `creator` char(50) CHARACTER SET utf8mb4 NOT NULL,
  `title` char(50) CHARACTER SET utf8mb4 NOT NULL,
  `description` char(200) CHARACTER SET utf8mb4 NOT NULL,
  `rTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` char(50) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `room`
--

INSERT INTO `room` (`rId`, `creator`, `title`, `description`, `rTime`, `password`) VALUES
(2, '123456', '測試', '這只是個測試				', '2020-06-09 20:06:20', ''),
(4, '123456', '測試', 'teest				', '2020-06-09 20:08:48', '');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `chatrecord`
--
ALTER TABLE `chatrecord`
  ADD PRIMARY KEY (`crId`);

--
-- 資料表索引 `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cId`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mId`);

--
-- 資料表索引 `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`pId`);

--
-- 資料表索引 `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`rId`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `chatrecord`
--
ALTER TABLE `chatrecord`
  MODIFY `crId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `room`
--
ALTER TABLE `room`
  MODIFY `rId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
