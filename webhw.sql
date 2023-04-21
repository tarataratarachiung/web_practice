-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-04-09 09:45:32
-- 伺服器版本： 10.4.27-MariaDB
-- PHP 版本： 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `webhw`
--

-- --------------------------------------------------------

--
-- 資料表結構 `participants`
--

CREATE TABLE `participants` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `birth` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `intro` varchar(150) NOT NULL,
  `demoaddress` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `participants`
--

INSERT INTO `participants` (`id`, `name`, `nickname`, `birth`, `address`, `phone`, `intro`, `demoaddress`, `created_at`) VALUES
(12, '姜昀', 'yun', '2023-04-20', '哈哈', '0917000121', 'cccc', 'https://therapper2.mtv.com.tw/', '2023-04-05 19:49:14'),
(13, 'tara', 'haha', '1999-04-25', '哈哈', '0917000121', '嗨', 'https://therapper2.mtv.com.tw/', '2023-04-06 01:40:26');

-- --------------------------------------------------------

--
-- 資料表結構 `players`
--

CREATE TABLE `players` (
  `p_id` int(11) NOT NULL,
  `player_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `players`
--

INSERT INTO `players` (`p_id`, `player_name`) VALUES
(1, 'Andy'),
(2, 'Ben'),
(3, '虹宇'),
(4, '阿邦'),
(5, '七七'),
(6, 'Sharron ninja'),
(7, '孫振'),
(8, 'Rex'),
(9, 'Coffe'),
(10, '紀威'),
(11, '阿金');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('M1161013', '00000000'),
('m1161014', '77777777'),
('m1161015', '12345678'),
('m1161016', '11111111'),
('m1161017', '22222222');

-- --------------------------------------------------------

--
-- 資料表結構 `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `p_id` int(11) NOT NULL,
  `votes` int(11) NOT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `votes`
--

INSERT INTO `votes` (`id`, `username`, `p_id`, `votes`, `created_at`) VALUES
(117, 'M1161013', 1, 1, '2023-04-09'),
(118, 'M1161013', 2, 1, '2023-04-09'),
(119, 'M1161013', 3, 1, '2023-04-09'),
(120, 'm1161014', 1, 1, '2023-04-09'),
(121, 'm1161014', 4, 1, '2023-04-09'),
(122, 'm1161014', 1, 1, '2023-04-09'),
(123, 'm1161015', 1, 1, '2023-04-09'),
(124, 'm1161015', 2, 1, '2023-04-09'),
(125, 'm1161015', 5, 1, '2023-04-09'),
(126, 'm1161016', 1, 1, '2023-04-09'),
(127, 'm1161016', 3, 1, '2023-04-09'),
(128, 'm1161016', 6, 1, '2023-04-09'),
(129, 'm1161017', 1, 1, '2023-04-09'),
(130, 'm1161017', 2, 1, '2023-04-09'),
(131, 'm1161017', 7, 1, '2023-04-09');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`p_id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- 資料表索引 `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `player_id` (`p_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `participants`
--
ALTER TABLE `participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `players`
--
ALTER TABLE `players`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
