-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-04-09 04:33:30
-- 服务器版本： 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `index`
--

-- --------------------------------------------------------

--
-- 表的结构 `join_form`
--

CREATE TABLE `join_process` (
  `id` int(11) NOT NULL,
  `num` int(255) DEFAULT NULL,
  `c1` varchar(100) DEFAULT NULL,
  `c2` varchar(200) DEFAULT NULL,
  `c3` varchar(200) DEFAULT NULL,
  `c4` varchar(200) DEFAULT NULL,
  `c5` varchar(100) DEFAULT NULL,
  `c6` varchar(200) DEFAULT NULL,
  `c7` varchar(100) DEFAULT NULL,
  `c8` varchar(400) DEFAULT NULL,
  `c9` varchar(400) DEFAULT NULL,
  `c10` varchar(100) DEFAULT NULL,
  `c11` varchar(100) DEFAULT NULL,
  `c12` varchar(100) DEFAULT NULL,
  `c13` varchar(400) DEFAULT NULL,
  `c14` varchar(400) DEFAULT NULL,
  `c15` varchar(100) DEFAULT NULL,
  `c16` varchar(100) DEFAULT NULL,
  `c17` varchar(400) DEFAULT NULL,
  `c18` varchar(100) DEFAULT NULL,
  `c19` varchar(100) DEFAULT NULL,
  `c20` varchar(100) DEFAULT NULL,
  `c21` varchar(100) DEFAULT NULL,
  `c22` varchar(100) DEFAULT NULL,
  `c23` varchar(100) DEFAULT NULL,
  `c24` varchar(100) DEFAULT NULL,
  `c25` varchar(100) DEFAULT NULL,
  `c26` varchar(100) DEFAULT NULL,
  `c27` varchar(100) DEFAULT NULL,
  `c28` varchar(100) DEFAULT NULL,
  `c29` varchar(100) DEFAULT NULL,
  `c30` varchar(100) DEFAULT NULL,
  `c31` varchar(100) DEFAULT NULL,
  `c32` varchar(100) DEFAULT NULL,
  `c33` varchar(100) DEFAULT NULL,
  `c34` varchar(100) DEFAULT NULL,
  `c35` varchar(100) DEFAULT NULL,
  `c36` varchar(100) DEFAULT NULL,
  `c37` varchar(100) DEFAULT NULL,
  `c38` varchar(100) DEFAULT NULL,
  `c39` varchar(100) DEFAULT NULL,
  `c40` varchar(100) DEFAULT NULL,
  `c41` varchar(2000) DEFAULT NULL,
  `id_p` int(11) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `info` varchar(2000) DEFAULT NULL,
  `level1` varchar(1000) DEFAULT NULL,
  `level2` varchar(1000) DEFAULT NULL,
  `level3` varchar(1000) DEFAULT NULL,
  `level4` varchar(1000) DEFAULT NULL,
  `uid` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `join_form`
--

INSERT INTO `join_form` (`id`, `num`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`, `c7`, `c8`, `c9`, `c10`, `c11`, `c12`, `c13`, `c14`, `c15`, `c16`, `c17`, `c18`, `c19`, `c20`, `c21`, `c22`, `c23`, `c24`, `c25`, `c26`, `c27`, `c28`, `c29`, `c30`, `c31`, `c32`, `c33`, `c34`, `c35`, `c36`, `c37`, `c38`, `c39`, `c40`, `c41`, `id_p`, `state`, `info`, `level1`, `level2`, `level3`, `level4`, `uid`) VALUES
(3, 1, '测试增加企业', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 12, 8, '秘书处留言', ' 一级', ' ', '二级（螺栓球节点网络结构）', '', ''),
(5, NULL, 'ttt3', '', '', '', '', '', '', '', '', '', '', '12345', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 10, 6, '这是张领意见', ' 一级', ' ', '二级（螺栓球节点网络结构）', '', ''),
(6, 2, '北京工业大学', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, 8, 'qqq意见', ' 一级', ' ', '二级（螺栓球节点网络结构）', '', ''),
(7, NULL, '企业企业', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2013', '2', '123', '234', '', '67', '67', '45', '', '78', '22', '11', '', 28, 6, 'cvnvbmbm', ' 一级', ' ', '二级（螺栓球节点网络结构）', '', ''),
(8, NULL, '12345', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 29, 6, 'dxg', ' 一级', ' ', '二级（螺栓球节点网络结构）', '', ''),
(9, 3, 'qwrgghkhl', '', '私人企业', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 30, 8, '', ' 一级', ' ', '二级（螺栓球节点网络结构）', '', ''),
(13, 4, 'bjut', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 9, 8, '', ' 一级', ' ', '二级（螺栓球节点网络结构）', '', ''),
(16, 0, 'ceshi', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 34, 4, '', ' 一级', ' ', '二级（螺栓球节点网络结构）', '', ''),
(17, 0, '北京www', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', '123', '1', '', '1', '11', '1', '', '1', '1', '11', '', 36, 2, '', ' 一级', ' ', '二级（螺栓球节点网络结构）', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `join_form`
--
ALTER TABLE `join_form`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `join_form`
--
ALTER TABLE `join_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
