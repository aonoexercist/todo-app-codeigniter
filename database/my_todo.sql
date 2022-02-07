-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2022 at 02:51 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_todo`
--

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `check` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `todo`
--

INSERT INTO `todo` (`id`, `user_id`, `title`, `check`, `date_created`, `date_modified`) VALUES
(2, 1, 'assignment 1 lets go!', 1, '2022-02-06 22:45:19', '2022-02-07 00:42:54'),
(4, 1, 'grgrgrg update', 1, '2022-02-07 00:12:07', '2022-02-06 17:55:16'),
(14, 1, 'enter todo xd qqq', 0, '2022-02-07 00:40:02', '2022-02-07 00:43:05'),
(16, 1, 'fantech', 0, '2022-02-07 08:43:35', '2022-02-07 00:43:35'),
(21, 2, 'read book (any book)', 0, '2022-02-07 08:52:50', '2022-02-07 00:53:17'),
(22, 2, 'watch all of us are dead (netflix)', 1, '2022-02-07 08:53:02', '2022-02-07 00:53:26'),
(24, 19, 'cook chicken', 0, '2022-02-07 08:57:52', '2022-02-07 00:57:52');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `middle_name`, `last_name`, `email`, `password`, `date_created`, `date_modified`) VALUES
(1, 'qwe', 'asd', 'zxc', 'xercis.silao@gmail.con', '$2y$10$EODiBuychji9MxMLZnrW7eIRwd5P2EMg.sNReQ0N0iDQyNv1R6h4O', '2022-02-06 12:41:50', '2022-02-06 04:41:50'),
(2, 'rty', 'fgh', 'cvb', 'xercis.silao@yahoo.con', '$2y$10$5tZbr59NwuYIAvsH0fVyJuXdwZYXnbDc5mt3aBflaGOYgNv5YDGsS', '2022-02-06 12:54:21', '2022-02-06 04:54:21'),
(3, 'uyi', 'hjk', 'nm,', 'asd@yahoo.com', '$2y$10$yNdEmoEt6t1mfiRyg93dKO/VGRx8Eyg6uznuzjaOXrQ9g1BZ4KMuO', '2022-02-06 13:27:13', '2022-02-06 05:27:13'),
(4, 'iop', 'jkl', 'bnm', 'fantech@gmail.co', '$2y$10$de3FDfmrsCdKwSYuNe4s9OE/4B8iwMPKanxi5pnRwyM7XxbtcOWpK', '2022-02-06 13:38:17', '2022-02-06 05:38:17'),
(5, 'wrt', 'sdg', 'cnv', 'etras@outloo.ok', '$2y$10$Yp3VygJT6D20tsduX706geFwzVHGmaA3peACxGr4ZKg/P86kodmiu', '2022-02-06 13:49:22', '2022-02-06 05:49:22'),
(6, 'cvy', 'hgf', 'eru', 'xcbv@yahoo.to', '$2y$10$fCBriak0.Cy9Pucpf2IyruJQ/bF5Jq5dugDPWv/QAzjCphSxynZAC', '2022-02-06 13:52:12', '2022-02-06 05:52:12'),
(7, 'bnt', 'duA', 'wsc', 'edc@rfg.we', '$2y$10$m87G2EV5R2BLEs7lqpKDl.9jINhOHAURkS6/TtxZi.NrqwnNe1coK', '2022-02-06 13:56:39', '2022-02-06 05:56:39'),
(8, 'cxcb', 'dfgdf', 'mhg@req.tr', 'xer@silao.fe', '$2y$10$f25GopCZqrjSzgHMPK6xWeSdLn2prwO6hpbVtWpZ5I9Km9MyrBhCm', '2022-02-06 13:59:04', '2022-02-06 05:59:04'),
(9, 'dfg', 'cxzc', 'asd', 'czxvxcvxc@asdsad.as', '$2y$10$8dnObjSgS.wF0ACHz4FlNuVO8vzma9Y19yV3NUXF39YrmiLfI3yN6', '2022-02-06 14:04:43', '2022-02-06 06:04:43'),
(10, 'cbxvb', 'yty', 'hfg', 'aaaa@sss.cc', '$2y$10$kEKTllEBgdd46ZEIiSYOyuU1p4R6jtBWXIMSwiCdpXLxpybIdRJiG', '2022-02-06 14:05:43', '2022-02-06 06:05:43'),
(11, 'lll', 'iii', 'jj', 'qq@ww.ee', '$2y$10$6fSdaBCN2bmaTzoJ3eHsEOM0MowovNPTvBu9igd5R9LFvy5SKaP9S', '2022-02-06 14:08:47', '2022-02-06 06:08:47'),
(12, 'vv', 'bbb', 'nnnn', 'yyy@uii.op', '$2y$10$nozLmWPHn4jf1eDUsR/YIuWtq0S7E3G28Rng0rPUYWXQqMewrgGR2', '2022-02-06 14:10:33', '2022-02-06 06:10:33'),
(13, 'bbb', 'fff', 'gg', 'qwe@sdfg.ca', '$2y$10$OIqBkOtT0dKK.MFub5y5lOHv0ieSDtr3zdmSYrPAAJ8kAsg0dVuzy', '2022-02-06 14:13:26', '2022-02-06 06:13:26'),
(14, 'mb m', 'ghgh', 'vbnvn', 'fdfd@fere.as', '$2y$10$TV/3YqUErRiwpNjY6LbCvufbd2C/PiauVLwJZ1zyD7JsaHWL79O82', '2022-02-06 14:19:34', '2022-02-06 06:19:34'),
(15, 'tyt', 'fghf', 'vbnvb', 'xasdas@qwewq.vf', '$2y$10$F.DpZOz/chvgV2pN.kcoHuGiuMOXOX8ciHCzkAfP88y.QPW9j7lJq', '2022-02-06 14:31:14', '2022-02-06 06:31:14'),
(16, 'xcvxcv', 'sdfdsf', 'ewrewr', 'xasdasd@rtyr.asd', '$2y$10$xFTfKEdb6vmxKFtpupx20eCK9VsA8keElhPov7/kEn4b4Mt9a3QL2', '2022-02-06 14:37:42', '2022-02-06 06:37:42'),
(17, 'vcxvxc', 'fsdfd', 'tyry', 'xasdw@frt.as', '$2y$10$vV8Csg6crVhrWt1zsK71h.GWFw4WgkJH8bgSs7vZAfZxQ6yNsimw2', '2022-02-06 14:40:31', '2022-02-06 06:40:31'),
(18, 'ttt', 'yy', 'uuu', 'eee@rrr.tq', '$2y$10$isYqx1sD3gx0WRYZuguZIe5hbEhAPMLx2FZ/0qQoCM16dJk2AsiJm', '2022-02-06 14:41:15', '2022-02-06 06:41:15'),
(19, 'ttytyt', 'hghg', 'bvbvb', 'asd123@outlook.co', '$2y$10$68OzuWWy2Sonw4.xzohujuroiQApCYEY653IZ5VOs3/a/jxx.9MtO', '2022-02-07 08:57:11', '2022-02-07 00:57:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
