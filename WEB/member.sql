-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-01-31 10:11:41
-- 服务器版本： 5.5.45
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ctmp_web`
--

-- --------------------------------------------------------

--
-- 表的结构 `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL COMMENT '会员ID号',
  `member_user` varchar(25) COLLATE utf8_unicode_ci NOT NULL COMMENT '注册名称',
  `member_password` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '注册密码',
  `member_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `member`
--

INSERT INTO `member` (`id`, `member_user`, `member_password`, `member_img`) VALUES
(1, 'admin', 'dcc62e31c8030d9488969c5da73d2f16', 'http://inte.link/admin.jpg'),
(2, 'hlsj', 'dcc62e31c8030d9488969c5da73d2f16', 'http://inte.link/admin.jpg'),
(3, '互联世纪', 'dcc62e31c8030d9488969c5da73d2f16', 'http://inte.link/admin.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `member_account` (`member_user`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '会员ID号', AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
