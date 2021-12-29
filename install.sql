-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: 2021-12-29 22:02:53
-- 服务器版本： 5.7.34-log
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ks2shop`
--

-- --------------------------------------------------------

--
-- 表的结构 `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `qq` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `out_trade_no` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `type` varchar(16) NOT NULL,
  `money` varchar(32) NOT NULL,
  `time` varchar(32) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `log`
--

INSERT INTO `log` (`out_trade_no`, `name`, `type`, `money`, `time`, `status`) VALUES
('Ks2Shop61cc126fbd482e3172113d5b03a88a28c082b24bab9f3', '', '支付宝', '2.00', '20211229', 1),
('Ks2Shop61cc12cd5f503f95c16db1ca0dfa77655e0fa2f819871', '', '支付宝', '1.00', '20211229', 0),
('Ks2Shop61cc131f81ee70a3f358d58f484699fa45edda5b1afa7', '', '支付宝', '1.00', '20211229', 0),
('Ks2Shop61cc2d430d64711b2187e5c5064547f66583cf374a5aa', '测试订单', '支付宝', '1', '20211229', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`out_trade_no`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
