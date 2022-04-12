-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2022 年 4 月 12 日 15:27
-- サーバのバージョン： 5.7.34
-- PHP のバージョン: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `EWB`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `Admin`
--

CREATE TABLE `Admin` (
  `id` int(11) NOT NULL COMMENT 'ユーザID',
  `user_name` varchar(100) NOT NULL COMMENT '名前',
  `email` varchar(100) DEFAULT NULL COMMENT 'メールアドレス',
  `password` varchar(100) DEFAULT NULL COMMENT 'パスワード',
  `role` int(11) NOT NULL DEFAULT '0' COMMENT '権限'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `Admin`
--

INSERT INTO `Admin` (`id`, `user_name`, `email`, `password`, `role`) VALUES
(1, '管理太郎', 'admin@test.com', '$2y$10$anuxHHoNpFH5BADaf4jsO.0mCFG41hTJId5egKHTNSt/9lFQlW4fK', 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `Posts`
--

CREATE TABLE `Posts` (
  `id` int(11) NOT NULL COMMENT 'AUTO_INCREAMENT',
  `title` varchar(255) DEFAULT NULL,
  `body` varchar(512) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `good` int(11) NOT NULL COMMENT '非同期処理',
  `view` int(11) NOT NULL COMMENT '非同期処理',
  `user` varchar(255) NOT NULL COMMENT 'Users/user_idと同一'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `Posts`
--

INSERT INTO `Posts` (`id`, `title`, `body`, `genre`, `good`, `view`, `user`) VALUES
(2, 'テスト2', 'ここに内容が入ります。', '雑学', 1, 3, '1');

-- --------------------------------------------------------

--
-- テーブルの構造 `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL COMMENT 'ユーザID',
  `user_name` varchar(100) NOT NULL COMMENT '名前',
  `email` varchar(100) DEFAULT NULL COMMENT 'メールアドレス',
  `password` varchar(100) DEFAULT NULL COMMENT 'パスワード',
  `role` int(11) NOT NULL DEFAULT '1' COMMENT '権限'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `Users`
--

INSERT INTO `Users` (`id`, `user_name`, `email`, `password`, `role`) VALUES
(1, 'テスト太郎', 'user@test.com', '$2y$10$bkRpev2/cKgkKl4aH7uPouAzxMANCHAQ/fGqPenqBkk/m8DM1Zgm.', 1),
(2, 'テスト次郎', 'user2@test.com', '$2y$10$vJOZq86GKjtL1qB/DCpAjukQRP1JQEOMUDLocuMEUu12QUbRfJYRG', 1),
(3, '山田三郎', 'test3@test.com', '$2y$10$dFBfmr0OgvCoqj/YcbvJUuw4En1ufhudL885eArKifJJNZ5Uy491q', 1);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `Posts`
--
ALTER TABLE `Posts`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `Admin`
--
ALTER TABLE `Admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ユーザID', AUTO_INCREMENT=2;

--
-- テーブルの AUTO_INCREMENT `Posts`
--
ALTER TABLE `Posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'AUTO_INCREAMENT', AUTO_INCREMENT=3;

--
-- テーブルの AUTO_INCREMENT `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ユーザID', AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
