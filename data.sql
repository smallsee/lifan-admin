-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 20, 2016 at 09:05 AM
-- Server version: 5.5.42
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `bihu`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(12) DEFAULT NULL,
  `avatar_url` text,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `intro` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `phone_UNIQUE` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;--
-- Database: `book`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE `cart_item` (
  `id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `category_no` int(11) DEFAULT NULL,
  `preview` varchar(100) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `nickname` varchar(16) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `active` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `order_no` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `payway` int(11) DEFAULT '1',
  `status` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `pdt_snapshot` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pdt_content`
--

CREATE TABLE `pdt_content` (
  `id` int(11) NOT NULL,
  `content` varchar(20000) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pdt_images`
--

CREATE TABLE `pdt_images` (
  `id` int(11) NOT NULL,
  `image_path` varchar(200) DEFAULT NULL,
  `image_no` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `summary` varchar(200) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `preview` varchar(200) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `temp_email`
--

CREATE TABLE `temp_email` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `code` varchar(32) DEFAULT NULL,
  `deadline` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `temp_phone`
--

CREATE TABLE `temp_phone` (
  `id` int(11) NOT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `code` int(11) DEFAULT NULL,
  `deadline` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `temp_phone`
--

INSERT INTO `temp_phone` (`id`, `phone`, `code`, `deadline`) VALUES
(1, '13631297694', 32700, '2016-11-02 14:29:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pdt_content`
--
ALTER TABLE `pdt_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pdt_images`
--
ALTER TABLE `pdt_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_email`
--
ALTER TABLE `temp_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_phone`
--
ALTER TABLE `temp_phone`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pdt_content`
--
ALTER TABLE `pdt_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pdt_images`
--
ALTER TABLE `pdt_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `temp_email`
--
ALTER TABLE `temp_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `temp_phone`
--
ALTER TABLE `temp_phone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;--
-- Database: `imooc_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `shop_address`
--

CREATE TABLE `shop_address` (
  `addressid` bigint(20) unsigned NOT NULL,
  `firstname` varchar(32) NOT NULL DEFAULT '',
  `lastname` varchar(32) NOT NULL DEFAULT '',
  `company` varchar(100) NOT NULL DEFAULT '',
  `address` text,
  `postcode` char(6) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `telephone` varchar(20) NOT NULL DEFAULT '',
  `userid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shop_admin`
--

CREATE TABLE `shop_admin` (
  `adminid` int(10) unsigned NOT NULL COMMENT '主键ID',
  `adminuser` varchar(32) NOT NULL DEFAULT '' COMMENT '管理员账号',
  `adminpass` char(32) NOT NULL DEFAULT '' COMMENT '管理员密码',
  `adminemail` varchar(50) NOT NULL DEFAULT '' COMMENT '管理员电子邮箱',
  `logintime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登录时间',
  `loginip` bigint(20) NOT NULL DEFAULT '0' COMMENT '登录IP',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shop_admin`
--

INSERT INTO `shop_admin` (`adminid`, `adminuser`, `adminpass`, `adminemail`, `logintime`, `loginip`, `createtime`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'shop@imooc.com', 0, 0, 1475482184);

-- --------------------------------------------------------

--
-- Table structure for table `shop_cart`
--

CREATE TABLE `shop_cart` (
  `cartid` bigint(20) unsigned NOT NULL,
  `productid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `productnum` int(10) unsigned NOT NULL DEFAULT '0',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `userid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shop_category`
--

CREATE TABLE `shop_category` (
  `cateid` bigint(20) unsigned NOT NULL,
  `title` varchar(32) NOT NULL DEFAULT '',
  `parentid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shop_order`
--

CREATE TABLE `shop_order` (
  `orderid` bigint(20) unsigned NOT NULL,
  `userid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `addressid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` int(10) unsigned NOT NULL DEFAULT '0',
  `expressid` int(10) unsigned NOT NULL DEFAULT '0',
  `expressno` varchar(50) NOT NULL DEFAULT '',
  `tradeno` varchar(100) NOT NULL DEFAULT '',
  `tradeext` text,
  `createtime` int(10) unsigned NOT NULL DEFAULT '0',
  `updatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shop_order_detail`
--

CREATE TABLE `shop_order_detail` (
  `detailid` bigint(20) unsigned NOT NULL,
  `productid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `productnum` int(10) unsigned NOT NULL DEFAULT '0',
  `orderid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shop_product`
--

CREATE TABLE `shop_product` (
  `productid` bigint(20) unsigned NOT NULL,
  `cateid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `title` varchar(200) NOT NULL DEFAULT '',
  `descr` text,
  `num` int(10) unsigned NOT NULL DEFAULT '0',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `cover` varchar(200) NOT NULL DEFAULT '',
  `pics` text,
  `issale` enum('0','1') NOT NULL DEFAULT '0',
  `ishot` enum('0','1') NOT NULL DEFAULT '0',
  `istui` enum('0','1') NOT NULL DEFAULT '0',
  `saleprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ison` enum('0','1') NOT NULL DEFAULT '1',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shop_profile`
--

CREATE TABLE `shop_profile` (
  `id` bigint(20) unsigned NOT NULL COMMENT '主键ID',
  `truename` varchar(32) NOT NULL DEFAULT '' COMMENT '真实姓名',
  `age` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '年龄',
  `sex` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '性别',
  `birthday` date NOT NULL DEFAULT '2016-01-01' COMMENT '生日',
  `nickname` varchar(32) NOT NULL DEFAULT '' COMMENT '昵称',
  `company` varchar(100) NOT NULL DEFAULT '' COMMENT '公司',
  `userid` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '用户的ID',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shop_user`
--

CREATE TABLE `shop_user` (
  `userid` bigint(20) unsigned NOT NULL COMMENT '主键ID',
  `username` varchar(32) NOT NULL DEFAULT '',
  `userpass` char(32) NOT NULL DEFAULT '',
  `useremail` varchar(100) NOT NULL DEFAULT '',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shop_address`
--
ALTER TABLE `shop_address`
  ADD PRIMARY KEY (`addressid`),
  ADD KEY `shop_address_userid` (`userid`);

--
-- Indexes for table `shop_admin`
--
ALTER TABLE `shop_admin`
  ADD PRIMARY KEY (`adminid`),
  ADD UNIQUE KEY `shop_admin_adminuser_adminpass` (`adminuser`,`adminpass`),
  ADD UNIQUE KEY `shop_admin_adminuser_adminemail` (`adminuser`,`adminemail`);

--
-- Indexes for table `shop_cart`
--
ALTER TABLE `shop_cart`
  ADD PRIMARY KEY (`cartid`),
  ADD KEY `shop_cart_productid` (`productid`),
  ADD KEY `shop_cart_userid` (`userid`);

--
-- Indexes for table `shop_category`
--
ALTER TABLE `shop_category`
  ADD PRIMARY KEY (`cateid`),
  ADD KEY `shop_category_parentid` (`parentid`);

--
-- Indexes for table `shop_order`
--
ALTER TABLE `shop_order`
  ADD PRIMARY KEY (`orderid`),
  ADD KEY `shop_order_userid` (`userid`),
  ADD KEY `shop_order_addressid` (`addressid`),
  ADD KEY `shop_order_expressid` (`expressid`);

--
-- Indexes for table `shop_order_detail`
--
ALTER TABLE `shop_order_detail`
  ADD PRIMARY KEY (`detailid`),
  ADD KEY `shop_order_detail_productid` (`productid`),
  ADD KEY `shop_order_detail_orderid` (`orderid`);

--
-- Indexes for table `shop_product`
--
ALTER TABLE `shop_product`
  ADD PRIMARY KEY (`productid`),
  ADD KEY `shop_product_cateid` (`cateid`),
  ADD KEY `shop_product_ison` (`ison`);

--
-- Indexes for table `shop_profile`
--
ALTER TABLE `shop_profile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `shop_profile_userid` (`userid`);

--
-- Indexes for table `shop_user`
--
ALTER TABLE `shop_user`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `shop_user_username_userpass` (`username`,`userpass`),
  ADD UNIQUE KEY `shop_user_useremail_userpass` (`useremail`,`userpass`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shop_address`
--
ALTER TABLE `shop_address`
  MODIFY `addressid` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shop_admin`
--
ALTER TABLE `shop_admin`
  MODIFY `adminid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ID',AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `shop_cart`
--
ALTER TABLE `shop_cart`
  MODIFY `cartid` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shop_category`
--
ALTER TABLE `shop_category`
  MODIFY `cateid` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shop_order`
--
ALTER TABLE `shop_order`
  MODIFY `orderid` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shop_order_detail`
--
ALTER TABLE `shop_order_detail`
  MODIFY `detailid` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shop_product`
--
ALTER TABLE `shop_product`
  MODIFY `productid` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shop_profile`
--
ALTER TABLE `shop_profile`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ID';
--
-- AUTO_INCREMENT for table `shop_user`
--
ALTER TABLE `shop_user`
  MODIFY `userid` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ID';--
-- Database: `imooc_singcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms_admin`
--

CREATE TABLE `cms_admin` (
  `admin_id` mediumint(6) unsigned NOT NULL,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `lastloginip` varchar(15) DEFAULT '0',
  `lastlogintime` int(10) unsigned DEFAULT '0',
  `email` varchar(40) DEFAULT '',
  `realname` varchar(50) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_admin`
--

INSERT INTO `cms_admin` (`admin_id`, `username`, `password`, `lastloginip`, `lastlogintime`, `email`, `realname`, `status`) VALUES
(1, 'admin', 'd099d126030d3207ba102efa8e60630a', '0', 1476148410, 'tracywxh0830@126.com', 'singwa', 1),
(2, 'singwa', 'a8ea3a23aa715c8772dd5b4a981ba6f4', '0', 1458139801, '', '王新华', -1),
(3, 'singwa', 'a8ea3a23aa715c8772dd5b4a981ba6f4', '0', 0, '', '', -1),
(4, 'singwa3', '79d4026540fdd95e4a0b627c77e6fa44', '0', 1458144621, '', 'singwa', 0),
(5, 'singwa', '5ec68e6f496115b92ba5662a35922611', '0', 0, '', '1', -1),
(6, 'singwa222', '6f071d49b5122a7352d8f2cc21680079', '0', 0, '', 'singwa', -1),
(7, 'singwa222', '5ec68e6f496115b92ba5662a35922611', '0', 0, '', '1', -1),
(8, 'singwa123', '204c93175e725ca51d28633055536e09', '0', 1458485298, 'singcms@singwa.com', 'singcms123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cms_menu`
--

CREATE TABLE `cms_menu` (
  `menu_id` smallint(6) unsigned NOT NULL,
  `name` varchar(40) NOT NULL DEFAULT '',
  `parentid` smallint(6) NOT NULL DEFAULT '0',
  `m` varchar(20) NOT NULL DEFAULT '',
  `c` varchar(20) NOT NULL DEFAULT '',
  `f` varchar(20) NOT NULL DEFAULT '',
  `data` varchar(100) NOT NULL DEFAULT '',
  `listorder` smallint(6) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_menu`
--

INSERT INTO `cms_menu` (`menu_id`, `name`, `parentid`, `m`, `c`, `f`, `data`, `listorder`, `status`, `type`) VALUES
(1, '菜单管理', 0, 'admin', 'menu', 'index', '', 10, 1, 1),
(2, '文章管理', 0, 'admin', 'Content', 'index', '', 0, -1, 1),
(3, '体育', 0, 'home', 'cat', 'index', '', 3, 1, 0),
(4, '科技', 0, 'home', 'cat ', 'index', '', 0, -1, 0),
(5, '汽车', 0, 'home', 'cat', 'index', '', 0, -1, 0),
(6, '文章管理', 0, 'admin', 'content', 'index', '', 9, 1, 1),
(7, '用户管理', 0, 'admin', 'user', 'index', '', 0, -1, 1),
(8, '科技', 0, 'home', 'cat', 'index', '', 0, 1, 0),
(9, '推荐位管理', 0, 'admin', 'position', 'index', '', 4, 1, 1),
(10, '推荐位内容管理', 0, 'admin', 'positioncontent', 'index', '', 1, 1, 1),
(11, '基本管理', 0, 'admin', 'basic', 'index', '', 0, 1, 1),
(12, '新闻', 0, 'home', 'cat', 'index', '', 0, 1, 0),
(13, '用户管理', 0, 'admin', 'admin', 'index', '', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cms_news`
--

CREATE TABLE `cms_news` (
  `news_id` mediumint(8) unsigned NOT NULL,
  `catid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `title` varchar(80) NOT NULL DEFAULT '',
  `small_title` varchar(30) NOT NULL DEFAULT '',
  `title_font_color` varchar(250) DEFAULT NULL COMMENT '标题颜色',
  `thumb` varchar(100) NOT NULL DEFAULT '',
  `keywords` char(40) NOT NULL DEFAULT '',
  `description` varchar(250) NOT NULL COMMENT '文章描述',
  `posids` varchar(250) NOT NULL DEFAULT '',
  `listorder` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `copyfrom` varchar(250) DEFAULT NULL COMMENT '来源',
  `username` char(20) NOT NULL,
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  `count` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_news`
--

INSERT INTO `cms_news` (`news_id`, `catid`, `title`, `small_title`, `title_font_color`, `thumb`, `keywords`, `description`, `posids`, `listorder`, `status`, `copyfrom`, `username`, `create_time`, `update_time`, `count`) VALUES
(17, 3, 'test', 'test', '#5674ed', '/upload/2016/03/06/56dbdc0c483af.JPG', 'sss', 'sss', '', 1, -1, '0', 'admin', 1455756856, 0, 0),
(18, 3, '你好ssss', '你好', '#ed568b', '/upload/2016/03/06/56dbdc015e662.JPG', '你好', '你好sssss  ss', '', 2, -1, '3', 'admin', 1455756999, 0, 0),
(19, 8, '1', '11', '#5674ed', '/upload/2016/02/28/56d312b12ccec.png', '1', '1', '', 0, -1, '0', 'admin', 1456673467, 0, 0),
(20, 3, '事实上', '11', '', '/upload/2016/02/28/56d3185781237.png', '1', '11', '', 0, -1, '0', 'admin', 1456674909, 0, 0),
(21, 3, '习近平今日下午出席解放军代表团全体会议', '习近平出席解放军代表团全体会议', '', '/upload/2016/03/13/56e519a185c93.png', '中共中央总书记 国家主席 中央军委主席 习近平', '中共中央总书记', '', 2, 1, '1', 'admin', 1457854896, 0, 61),
(22, 12, '李克强让部长们当第一新闻发言人', '李克强让部长们当第一新闻发言人', '', '/upload/2016/03/13/56e51b6ac8ce2.jpg', '李克强  新闻发言人', '部长直接面对媒体回应关切，还能直接读到民情民生民意，而不是看别人的舆情汇报。', '', 0, 1, '0', 'admin', 1457855362, 0, 33),
(23, 3, '重庆美女球迷争芳斗艳', '重庆美女球迷争芳斗艳', '', '/upload/2016/03/13/56e51cbd34470.png', '重庆美女 球迷 争芳斗艳', '重庆美女球迷争芳斗艳', '', 10, 1, '0', 'admin', 1457855680, 0, 22),
(24, 3, '中超-汪嵩世界波制胜 富力客场1-0力擒泰达', '中超-汪嵩世界波制胜 富力客场1-0力擒泰达', '', '/upload/2016/03/13/56e51fc82b13a.png', '中超 汪嵩世界波  富力客场 1-0力擒泰达', '中超-汪嵩世界波制胜 富力客场1-0力擒泰达', '', 1, 1, '0', 'admin', 1457856460, 0, 25);

-- --------------------------------------------------------

--
-- Table structure for table `cms_news_content`
--

CREATE TABLE `cms_news_content` (
  `id` mediumint(8) unsigned NOT NULL,
  `news_id` mediumint(8) unsigned NOT NULL,
  `content` mediumtext NOT NULL,
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_news_content`
--

INSERT INTO `cms_news_content` (`id`, `news_id`, `content`, `create_time`, `update_time`) VALUES
(7, 17, '&lt;p&gt;\r\ngsdggsgsgsgsg\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\nsgsg\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\ngsdgsg \r\n&lt;/p&gt;\r\n&lt;p style=&quot;text-align:center;&quot;&gt;\r\n       ggg\r\n&lt;/p&gt;', 1455756856, 0),
(8, 18, '&lt;p&gt;\r\n你好\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n我很好dsggfg\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\ngsgfgdfgd\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\ngggg\r\n&lt;/p&gt;', 1455756999, 0),
(9, 19, '111', 1456673467, 0),
(10, 20, '111', 1456674909, 0),
(11, 21, '&lt;p&gt;\r\n&lt;span style=&quot;font-family:''Microsoft YaHei'', u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;font-size:16px;line-height:32px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; 3月13日下午，中共中央总书记、国家主席、中央军委主席习近平出席十二届全国人大四次会议解放军代表团全体会议，并发表重要讲话。&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n&lt;span style=&quot;font-family:''Microsoft YaHei'', u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;font-size:16px;line-height:32px;&quot;&gt;&lt;img src=&quot;/upload/2016/03/13/56e519acb12ee.png&quot; alt=&quot;&quot; /&gt;&lt;br /&gt;\r\n&lt;/span&gt;\r\n&lt;/p&gt;', 1457854896, 0),
(12, 22, '&lt;p style=&quot;font-size:16px;font-family:''Microsoft YaHei'', u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n&amp;nbsp; &amp;nbsp; “部长通道”是今年两会一大亮点，成为两会开放透明和善待媒体的一个象征。在这个通道上，以往记者拉着喊着部长接受采访的场景不见了，变为部长主动站出来回应关切，甚至变成部长排队10多分钟等着接受采访。媒体报道称，两会前李克强总理接连两次“发话”，要求各部委主要负责人“要积极回应舆论关切”。部长主动放料，使这个通道上传出了很多新闻，如交通部长对拥堵费传闻的回应，人社部部长称网传延迟退休时间表属误读等。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;font-family:''Microsoft YaHei'', u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n&amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;&lt;img src=&quot;/upload/2016/03/13/56e51b7fcd445.jpg&quot; alt=&quot;&quot; /&gt;\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;font-family:''Microsoft YaHei'', u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n&amp;nbsp; &amp;nbsp; &amp;nbsp; 记者之所以喜欢跑两会，原因之一是两会上高官云集，能“堵”到、“逮”到、“抢”到很多大新闻——现在不需要堵、逮和抢，部长们主动曝料，打通了各种阻隔，树立了开明开放的政府形象。期待“部长通道”不只在两会期间存在，最好能成为一种官媒交流、官民沟通的常态化新闻通道。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;font-family:''Microsoft YaHei'', u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n&lt;span style=&quot;font-family:''Microsoft YaHei'', u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;font-size:16px;line-height:32px;&quot;&gt;部长们多面对媒体多发言，不仅能提高自身的媒介素养，也带动部门新闻发言人，更加重视与媒体沟通。部长直接面对媒体回应关切，还能直接读到民情民生民意，而不是看别人的舆情汇报。&lt;/span&gt;\r\n&lt;/p&gt;', 1457855362, 0),
(13, 23, '&lt;p&gt;\r\n&lt;span style=&quot;color:#666666;font-family:''Microsoft Yahei'', 微软雅黑, SimSun, 宋体, ''Arial Narrow'', serif;font-size:14px;line-height:28px;background-color:#FFFFFF;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; 2016年3月13日，2016年中超联赛第2轮：重庆力帆vs河南建业，主场美女球迷争芳斗艳。&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n&lt;span style=&quot;color:#666666;font-family:''Microsoft Yahei'', 微软雅黑, SimSun, 宋体, ''Arial Narrow'', serif;font-size:14px;line-height:28px;background-color:#FFFFFF;&quot;&gt;&lt;img src=&quot;/upload/2016/03/13/56e51cb17542e.png&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;/upload/2016/03/13/56e51cb180f8a.png&quot; alt=&quot;&quot; /&gt;&lt;br /&gt;\r\n&lt;/span&gt;\r\n&lt;/p&gt;', 1457855680, 0),
(14, 24, '<p>\r\n<br />\r\n</p>\r\n<p>\r\n新浪体育讯　　北京时间2016年3月12日晚7点35分，2016年中超联赛第2轮的一场比赛在天津水滴体育场进行。由天津泰达主场对阵广州富力。上半场双方机会都不多，<strong>下半场第57分钟，常飞亚左路护住皮球回做，汪嵩迎球直接远射世界波破门。随后天津泰达尽管全力进攻，但伊万诺维奇和迪亚涅都浪费了近在咫尺的机会</strong>，最终不得不0-1主场告负。\r\n</p>\r\n<p>\r\n<img src="/upload/2016/03/13/56e51f63a5742.png" alt="" width="474" height="301" title="" align="" /> \r\n</p>\r\n<p>\r\n由于首轮中超对阵北京国安的比赛延期举行，因此本场比赛实际上是天津泰达本赛季的首次亮相。新援蒙特罗领衔锋线，两名外援中后卫均首发出场。另一方面，在首轮主场不敌中超新贵河北华夏之后，本赛季球员流失较多的广州富力也许不得不早早开始他们的保级谋划。本场陈志钊红牌停赛，澳大利亚外援吉安努顶替了上轮首发的肖智。\r\n</p>\r\n<p>\r\n广州富力显然更快地适应了比赛节奏。第3分钟，吉安努前插领球大步杀入禁区形成单刀，回防的赞纳迪内果断放铲化解险情。第8分钟，雷纳尔迪尼奥左路踩单车过人后低平球传中，约万诺维奇伸出大长腿将球挡出底线。第14分钟，富力队左路传中到远点，聂涛头球解围险些失误，送出本场比赛第一个角球。\r\n</p>\r\n<p>\r\n天津队中场的配合逐渐找到一些感觉。第23分钟，天津队通过一连串小配合打到左路，周海滨下底传中被挡出底线。角球被富力队顶出后天津队二次将球传到禁区前沿，蒙特罗转身后射门但软弱无力被程月磊得到。第27分钟，约万诺维奇断球后直塞蒙特罗，蒙特罗转身晃开后卫在禁区外大力轰门打高。第29分钟，瓦格纳任意球吊入禁区，程月磊出击失误没有击到球，天津队后点将球再次传中，姜至鹏在对方夹击下奋力将球顶出底线。\r\n</p>\r\n<p>\r\n双方都没有太好的打开僵局的办法，开始陷入苦战。第33分钟，常飞亚左路晃开空档突然起脚，皮球擦着近门柱稍稍偏出底线。第43分钟，白岳峰被雷纳尔迪尼奥断球得手，后者利用速度甩开约万诺维奇，低平球传中又躲过了赞纳迪内的滑铲，但吉安努门前近在咫尺的推射被杨启鹏神奇地单腿挡出！双方半场只得0-0互交白卷。\r\n</p>\r\n<p>\r\n中场休息双方都没有换人。第47分钟，蒙特罗前场扣过多名对方队员后将球交给周海滨，但周海滨传中时禁区内的胡人天越位在先。第51分钟，王嘉楠右路晃开聂涛下底，但传中球又高又远。第54分钟，雷纳尔迪尼奥中场拿球挑过李本舰，后者无奈将其放倒吃到黄牌。第57分钟，常飞亚左路护住皮球回做，汪嵩迎球直接远射，杨启鹏鞭长莫及，皮球呼啸着直挂远角！世界波！富力队客场1-0取得领先。\r\n</p>\r\n<p>\r\n第62分钟，瓦格纳任意球吊到禁区，程月磊再次拿球脱手，幸亏张耀坤将球踢出了边线。天津队率先做出调整，迪亚涅和周通两名前锋登场换下郭皓和瓦格纳。第64分钟，天津队右路传中，周通禁区内甩头攻门，程月磊侧扑将球得到。富力队并未保守。第66分钟，常飞亚左路连续盘带杀入禁区，小角度射门打偏。不过一分钟，雷纳尔迪尼奥禁区右角远射，皮球在门前反弹后稍稍偏出。\r\n</p>\r\n<p>\r\n第71分钟，吉安努禁区角上回做，常飞亚跟进远射，杨启鹏单掌将球托出。天津队马上打出反击，蒙特罗禁区内转身将球分到右路，胡人天的传中找到后排插上的周海滨，但后者的大力头球顶得太正被程月磊侯个正着。富力队肖智换下卢琳。第74分钟，迪亚涅依靠强壮的身体杀入禁区直塞，蒙特罗停球后射门被密集防守的后卫挡出。\r\n</p>\r\n<p>\r\n于洋换下雷纳尔迪尼奥，富力队加强防守。第81分钟，天津队角球开出，迪亚涅甩头攻门顶偏。天津队连续得到角球机会。第85分钟，天津队角球二次进攻，周通传中，蒙特罗后点头球回做，约万诺维奇离门不到两米处转身扫射竟然将球踢飞！\r\n</p>\r\n<div id="ad_33" class="otherContent_01" style="margin:10px 20px 10px 0px;padding:4px;">\r\n<iframe width="300px" height="250px" frameborder="0" src="http://img.adbox.sina.com.cn/ad/28543.html">\r\n</iframe>\r\n</div>\r\n<p>\r\n天津队范柏群换下李本舰。富力队用宁安换下常飞亚。第88分钟，胡人天战术犯规吃到黄牌。天津队久攻不下，第90分钟，赞纳迪内40米开外远射打偏。第93分钟，蒙特罗左路传中，迪亚涅头球争顶下来之后顺势扫射，皮球贴着横梁高出。广州富力最终将优势保持到了终场取得三分。\r\n</p>\r\n<p>\r\n进球信息：\r\n</p>\r\n<p>\r\n天津泰达：无。\r\n</p>\r\n<p>\r\n广州富力：第58分钟，卢琳左路回做，汪嵩跟上远射破网。\r\n</p>\r\n<p>\r\n黄牌信息：\r\n</p>\r\n<p>\r\n天津泰达：第54分钟，李本舰。第88分钟，胡人天。\r\n</p>\r\n<p>\r\n广州富力：无。\r\n</p>\r\n<p>\r\n红牌信息：\r\n</p>\r\n<p>\r\n无。\r\n</p>\r\n<p>\r\n双方出场阵容：\r\n</p>\r\n<p>\r\n天津泰达（4-5-1）：29-杨启鹏，23-聂涛、3-赞纳迪内、5-约万诺维奇、19-白岳峰，6-周海滨、7-李本舰（86分钟，28-范柏群）、8-胡人天、11-瓦格纳（63分钟，9-迪亚涅）、22-郭皓（63分钟，33-周通），10-蒙特罗；\r\n</p>\r\n<p>\r\n广州富力（4-5-1）：1-程月磊，11-姜至鹏、5-张耀坤、22-张贤秀、28-王嘉楠，7-斯文森、21-常飞亚（88分钟，15-宁安）、23-卢琳（73分钟，29-肖智）、31-雷纳尔迪尼奥（77分钟，3-于洋）、33-汪嵩，9-吉安努。\r\n</p>\r\n<p>\r\n（卢小挠）\r\n</p>\r\n<div>\r\n</div>\r\n<div style="font-size:0px;">\r\n</div>\r\n<p>\r\n<br />\r\n</p>', 1457856460, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cms_position`
--

CREATE TABLE `cms_position` (
  `id` smallint(5) unsigned NOT NULL,
  `name` char(30) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `description` char(100) DEFAULT NULL,
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_position`
--

INSERT INTO `cms_position` (`id`, `name`, `status`, `description`, `create_time`, `update_time`) VALUES
(1, '首页大图', -1, '展示首页大图的推荐位1', 1455634352, 0),
(2, '首页大图', 1, '展示首页大图的', 1455634715, 0),
(3, '小图推荐', 1, '小图推荐位', 1456665873, 0),
(4, '首页后侧推荐位', -1, '', 1457248469, 0),
(5, '右侧广告位', 1, '右侧广告位', 1457873143, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cms_position_content`
--

CREATE TABLE `cms_position_content` (
  `id` smallint(5) unsigned NOT NULL,
  `position_id` int(5) unsigned NOT NULL,
  `title` varchar(30) NOT NULL DEFAULT '',
  `thumb` varchar(100) NOT NULL DEFAULT '',
  `url` varchar(100) DEFAULT NULL,
  `news_id` mediumint(8) unsigned NOT NULL,
  `listorder` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_position_content`
--

INSERT INTO `cms_position_content` (`id`, `position_id`, `title`, `thumb`, `url`, `news_id`, `listorder`, `status`, `create_time`, `update_time`) VALUES
(28, 2, '习近平今日下午出席解放军代表团全体会议', '/upload/2016/03/13/56e519a185c93.png', NULL, 21, 0, 1, 1457854896, 0),
(27, 2, '文章18测试sss', '/upload/2016/03/07/56dcc0158f70e.JPG', '', 18, 0, -1, 1457306930, 0),
(26, 2, 'ss', '/upload/2016/03/07/56dcbce02cab9.JPG', 'http://sina.com.cn', 0, 0, -1, 1457306890, 0),
(25, 3, 'test', '/upload/2016/03/06/56dbdc0c483af.JPG', NULL, 17, 0, -1, 1455756856, 0),
(23, 2, 'test', '/upload/2016/03/06/56dbdc0c483af.JPG', NULL, 17, 1, -1, 1455756856, 0),
(24, 2, '你好ssss', '/upload/2016/03/06/56dbdc015e662.JPG', NULL, 18, 2, -1, 1455756999, 0),
(29, 3, '李克强让部长们当第一新闻发言人', '/upload/2016/03/13/56e51b6ac8ce2.jpg', NULL, 22, 12, 1, 1457855362, 0),
(30, 3, '重庆美女球迷争芳斗艳', '/upload/2016/03/13/56e51cbd34470.png', NULL, 23, 0, 1, 1457855680, 0),
(31, 3, '中超-汪嵩世界波制胜 富力客场1-0力擒泰达', '/upload/2016/03/13/56e51fc82b13a.png', NULL, 24, 0, 1, 1457856460, 0),
(32, 5, '2015劳伦斯国际体坛精彩瞬间', '/upload/2016/03/13/56e5612d525c3.png', 'http://sports.sina.com.cn/laureus/moment2015/', 0, 0, 1, 1457873220, 0),
(33, 5, 'singwa老师教您如何学PHP', '/upload/2016/03/13/56e56211c68e7.jpg', 'http://t.imooc.com/space/teacher/id/255838', 0, 0, 1, 1457873435, 0),
(34, 2, '习近平今日下午出席解放军代表团全体会议', '/upload/2016/03/13/56e519a185c93.png', NULL, 21, 0, 1, 1457854896, 0),
(35, 2, '中超-汪嵩世界波制胜 富力客场1-0力擒泰达', '/upload/2016/03/13/56e51fc82b13a.png', NULL, 24, 0, 1, 1457856460, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cms_admin`
--
ALTER TABLE `cms_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `cms_menu`
--
ALTER TABLE `cms_menu`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `listorder` (`listorder`),
  ADD KEY `parentid` (`parentid`),
  ADD KEY `module` (`m`,`c`,`f`);

--
-- Indexes for table `cms_news`
--
ALTER TABLE `cms_news`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `status` (`status`,`listorder`,`news_id`),
  ADD KEY `listorder` (`catid`,`status`,`listorder`,`news_id`),
  ADD KEY `catid` (`catid`,`status`,`news_id`);

--
-- Indexes for table `cms_news_content`
--
ALTER TABLE `cms_news_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_id` (`news_id`);

--
-- Indexes for table `cms_position`
--
ALTER TABLE `cms_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_position_content`
--
ALTER TABLE `cms_position_content`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cms_admin`
--
ALTER TABLE `cms_admin`
  MODIFY `admin_id` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `cms_menu`
--
ALTER TABLE `cms_menu`
  MODIFY `menu_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `cms_news`
--
ALTER TABLE `cms_news`
  MODIFY `news_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `cms_news_content`
--
ALTER TABLE `cms_news_content`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `cms_position`
--
ALTER TABLE `cms_position`
  MODIFY `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cms_position_content`
--
ALTER TABLE `cms_position_content`
  MODIFY `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;--
-- Database: `lifan`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_lists`
--

CREATE TABLE `book_lists` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `see` int(11) NOT NULL DEFAULT '0',
  `reply` int(11) DEFAULT '0',
  `statue` varchar(45) DEFAULT NULL,
  `tab` varchar(255) DEFAULT NULL,
  `book_thumb` varchar(255) DEFAULT NULL,
  `book_title` varchar(255) DEFAULT NULL,
  `book_content_img` text,
  `book_list` text,
  `content` text,
  `user_thumb` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_lists`
--

INSERT INTO `book_lists` (`id`, `user_id`, `username`, `see`, `reply`, `statue`, `tab`, `book_thumb`, `book_title`, `book_content_img`, `book_list`, `content`, `user_thumb`, `created_at`, `updated_at`) VALUES
(10, 2, 'admin', 0, 0, '1', '动漫图集,游戏CG', 'http://obsinesgs.bkt.clouddn.com/57c2b1b21f6c1', '近期P站图分享-11-4【482P】', NULL, '<img src="http://ogh4xbkgc.bkt.clouddn.com/641bfa8c1fcb33b9e54c7e73c2abcf5b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/8b66c859db0697d94ae6b1c525c19bf4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/45f0ee458eb763e83cdc01e1fff8d96b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/5f2268d9639dbe981491efa535dccbdd" alt="" />', '      asdsadas', 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '2016-11-11 07:26:57', '2016-11-11 07:26:57'),
(15, 1, 'admin', 0, 0, '1', '游戏CG,', 'http://obsinesgs.bkt.clouddn.com/57c2b49a7b04b', '近期P站图分享-11-4【482P】', NULL, '<img src="http://ogh4xbkgc.bkt.clouddn.com/641bfa8c1fcb33b9e54c7e73c2abcf5b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/8b66c859db0697d94ae6b1c525c19bf4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/45f0ee458eb763e83cdc01e1fff8d96b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/5f2268d9639dbe981491efa535dccbdd" alt="" />', '      asdsadas', 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '2016-11-11 07:26:57', '2016-11-11 07:26:57'),
(16, 2, 'admin', 0, 0, '1', '动漫图集,游戏CG', 'http://ogh4xbkgc.bkt.clouddn.com/73194ba0757fada96b33d78c79d8c107', '近期P站图分享-11-4【482P】', NULL, '<img src="http://ogh4xbkgc.bkt.clouddn.com/641bfa8c1fcb33b9e54c7e73c2abcf5b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/8b66c859db0697d94ae6b1c525c19bf4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/45f0ee458eb763e83cdc01e1fff8d96b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/5f2268d9639dbe981491efa535dccbdd" alt="" />', '      asdsadas', 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '2016-11-11 07:26:57', '2016-11-11 07:26:57'),
(17, 3, 'admin', 0, 0, '1', '游戏CG,', 'http://ogh4xbkgc.bkt.clouddn.com/73194ba0757fada96b33d78c79d8c107', '近期P站图分享-11-4【482P】', NULL, '<img src="http://ogh4xbkgc.bkt.clouddn.com/641bfa8c1fcb33b9e54c7e73c2abcf5b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/8b66c859db0697d94ae6b1c525c19bf4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/45f0ee458eb763e83cdc01e1fff8d96b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/5f2268d9639dbe981491efa535dccbdd" alt="" />', '      asdsadas', 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '2016-11-11 07:26:57', '2016-11-11 07:26:57'),
(18, 4, 'admin', 0, 0, '1', '游戏CG,', 'http://ogh4xbkgc.bkt.clouddn.com/73194ba0757fada96b33d78c79d8c107', '近期P站图分享-11-4【482P】', NULL, '<img src="http://ogh4xbkgc.bkt.clouddn.com/641bfa8c1fcb33b9e54c7e73c2abcf5b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/8b66c859db0697d94ae6b1c525c19bf4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/45f0ee458eb763e83cdc01e1fff8d96b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/5f2268d9639dbe981491efa535dccbdd" alt="" />', '      asdsadas', 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '2016-11-11 07:26:57', '2016-11-11 07:26:57'),
(19, 5, 'admin', 0, 0, '1', '动漫图集,游戏CG', 'http://obsinesgs.bkt.clouddn.com/57c2b499d2901', '近期P站图分享-11-4【482P】', NULL, '<img src="http://ogh4xbkgc.bkt.clouddn.com/641bfa8c1fcb33b9e54c7e73c2abcf5b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/8b66c859db0697d94ae6b1c525c19bf4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/45f0ee458eb763e83cdc01e1fff8d96b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/5f2268d9639dbe981491efa535dccbdd" alt="" />', '      asdsadas', 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '2016-11-11 07:26:57', '2016-11-11 07:26:57'),
(20, 6, 'admin', 0, 0, '1', '动漫图集,', 'http://obsinesgs.bkt.clouddn.com/57c2b4a41326f', '近期P站图分享-11-4【482P】', NULL, '<img src="http://ogh4xbkgc.bkt.clouddn.com/641bfa8c1fcb33b9e54c7e73c2abcf5b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/8b66c859db0697d94ae6b1c525c19bf4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/45f0ee458eb763e83cdc01e1fff8d96b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/5f2268d9639dbe981491efa535dccbdd" alt="" />', '      asdsadas', 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '2016-11-11 07:26:57', '2016-11-11 07:26:57'),
(21, 6, 'admin', 0, 0, '1', '动漫图集,个人动画', 'http://ogh4xbkgc.bkt.clouddn.com/73194ba0757fada96b33d78c79d8c107', '近期P站图分享-11-4【482P】', NULL, '<img src="http://ogh4xbkgc.bkt.clouddn.com/641bfa8c1fcb33b9e54c7e73c2abcf5b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/8b66c859db0697d94ae6b1c525c19bf4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/45f0ee458eb763e83cdc01e1fff8d96b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/5f2268d9639dbe981491efa535dccbdd" alt="" />', '      asdsadas', 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '2016-11-11 07:26:57', '2016-11-11 07:26:57'),
(22, 2, 'admin', 0, 0, '1', '游戏CG,', 'http://ogh4xbkgc.bkt.clouddn.com/73194ba0757fada96b33d78c79d8c107', '近期P站图分享-11-4【482P】', NULL, '<img src="http://ogh4xbkgc.bkt.clouddn.com/641bfa8c1fcb33b9e54c7e73c2abcf5b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/8b66c859db0697d94ae6b1c525c19bf4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/45f0ee458eb763e83cdc01e1fff8d96b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/5f2268d9639dbe981491efa535dccbdd" alt="" />', '      asdsadas', 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '2016-11-11 07:26:57', '2016-11-11 07:26:57'),
(23, 2, 'admin', 0, 0, '1', '个人动画', 'http://obsinesgs.bkt.clouddn.com/57c2b499d2901', '近期P站图分享-11-4【482P】', NULL, '<img src="http://ogh4xbkgc.bkt.clouddn.com/641bfa8c1fcb33b9e54c7e73c2abcf5b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/8b66c859db0697d94ae6b1c525c19bf4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/45f0ee458eb763e83cdc01e1fff8d96b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/5f2268d9639dbe981491efa535dccbdd" alt="" />', '      asdsadas', 'http://obsinesgs.bkt.clouddn.com/57c2b499d2901', '2016-11-11 07:26:57', '2016-11-11 07:26:57'),
(24, 2, 'admin', 0, 0, '1', '动漫图集,游戏CG', 'http://obsinesgs.bkt.clouddn.com/57c2b4a3bc680', '近期P站图分享-11-4【482P】', NULL, '<img src="http://ogh4xbkgc.bkt.clouddn.com/641bfa8c1fcb33b9e54c7e73c2abcf5b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/8b66c859db0697d94ae6b1c525c19bf4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/45f0ee458eb763e83cdc01e1fff8d96b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/5f2268d9639dbe981491efa535dccbdd" alt="" />', '      asdsadas', 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '2016-11-11 07:26:57', '2016-11-11 07:26:57'),
(25, 2, 'admin', 0, 0, '1', '游戏CG,', 'http://ogh4xbkgc.bkt.clouddn.com/73194ba0757fada96b33d78c79d8c107', '近期P站图分享-11-4【482P】', NULL, '<img src="http://ogh4xbkgc.bkt.clouddn.com/641bfa8c1fcb33b9e54c7e73c2abcf5b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/8b66c859db0697d94ae6b1c525c19bf4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/45f0ee458eb763e83cdc01e1fff8d96b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/5f2268d9639dbe981491efa535dccbdd" alt="" />', '      asdsadas', 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '2016-11-11 07:26:57', '2016-11-11 07:26:57'),
(26, 2, 'admin', 0, 0, '1', '游戏CG,个人动画', 'http://ogh4xbkgc.bkt.clouddn.com/73194ba0757fada96b33d78c79d8c107', '近期P站图分享-11-4【482P】', NULL, '<img src="http://ogh4xbkgc.bkt.clouddn.com/641bfa8c1fcb33b9e54c7e73c2abcf5b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/8b66c859db0697d94ae6b1c525c19bf4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/45f0ee458eb763e83cdc01e1fff8d96b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/5f2268d9639dbe981491efa535dccbdd" alt="" />', '      asdsadas', 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '2016-11-11 07:26:57', '2016-11-11 07:26:57'),
(27, 2, 'admin', 0, 0, '1', '游戏CG,', 'http://ogh4xbkgc.bkt.clouddn.com/73194ba0757fada96b33d78c79d8c107', '近期P站图分享-11-4【482P】', NULL, '<img src="http://ogh4xbkgc.bkt.clouddn.com/641bfa8c1fcb33b9e54c7e73c2abcf5b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/8b66c859db0697d94ae6b1c525c19bf4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/45f0ee458eb763e83cdc01e1fff8d96b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/5f2268d9639dbe981491efa535dccbdd" alt="" />', '      asdsadas', 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '2016-11-11 07:26:57', '2016-11-11 07:26:57'),
(28, 2, 'admin', 0, 0, '1', '游戏CG,', 'http://ogh4xbkgc.bkt.clouddn.com/73194ba0757fada96b33d78c79d8c107', '近期P站图分享-11-4【482P】', NULL, '<img src="http://ogh4xbkgc.bkt.clouddn.com/641bfa8c1fcb33b9e54c7e73c2abcf5b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/8b66c859db0697d94ae6b1c525c19bf4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/45f0ee458eb763e83cdc01e1fff8d96b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/5f2268d9639dbe981491efa535dccbdd" alt="" />', '      asdsadas', 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '2016-11-11 07:26:57', '2016-11-11 07:26:57'),
(29, 2, 'admin', 0, 0, '1', '游戏CG,', 'http://ogh4xbkgc.bkt.clouddn.com/73194ba0757fada96b33d78c79d8c107', '近期P站图分享-11-4【482P】', NULL, '<img src="http://ogh4xbkgc.bkt.clouddn.com/641bfa8c1fcb33b9e54c7e73c2abcf5b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/8b66c859db0697d94ae6b1c525c19bf4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/45f0ee458eb763e83cdc01e1fff8d96b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/5f2268d9639dbe981491efa535dccbdd" alt="" />', '      asdsadas', 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '2016-11-11 07:26:57', '2016-11-11 07:26:57'),
(30, 2, 'admin', 0, 0, '1', '动漫图集,游戏CG', 'http://ogh4xbkgc.bkt.clouddn.com/73194ba0757fada96b33d78c79d8c107', '近期P站图分享-11-4【482P】', NULL, '<img src="http://ogh4xbkgc.bkt.clouddn.com/641bfa8c1fcb33b9e54c7e73c2abcf5b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/8b66c859db0697d94ae6b1c525c19bf4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/45f0ee458eb763e83cdc01e1fff8d96b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/5f2268d9639dbe981491efa535dccbdd" alt="" />', '      asdsadas', 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '2016-11-11 07:26:57', '2016-11-11 07:26:57'),
(31, 2, 'admin', 0, 0, '1', '游戏CG,', 'http://ogh4xbkgc.bkt.clouddn.com/73194ba0757fada96b33d78c79d8c107', '近期P站图分享-11-4【482P】', NULL, '<img src="http://ogh4xbkgc.bkt.clouddn.com/641bfa8c1fcb33b9e54c7e73c2abcf5b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/8b66c859db0697d94ae6b1c525c19bf4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/45f0ee458eb763e83cdc01e1fff8d96b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/5f2268d9639dbe981491efa535dccbdd" alt="" />', '      asdsadas', 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '2016-11-11 07:26:57', '2016-11-11 07:26:57'),
(32, 2, 'admin', 0, 0, '1', '动漫图集,游戏CG', 'http://ogh4xbkgc.bkt.clouddn.com/73194ba0757fada96b33d78c79d8c107', '近期P站图分享-11-4【482P】', NULL, '<img src="http://ogh4xbkgc.bkt.clouddn.com/641bfa8c1fcb33b9e54c7e73c2abcf5b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/8b66c859db0697d94ae6b1c525c19bf4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/45f0ee458eb763e83cdc01e1fff8d96b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/5f2268d9639dbe981491efa535dccbdd" alt="" />', '      asdsadas', 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '2016-11-11 07:26:57', '2016-11-11 07:26:57'),
(33, 2, 'admin', 0, 0, '1', '个人动画', 'http://ogh4xbkgc.bkt.clouddn.com/73194ba0757fada96b33d78c79d8c107', '近期P站图分享-11-4【482P】', NULL, '<img src="http://ogh4xbkgc.bkt.clouddn.com/641bfa8c1fcb33b9e54c7e73c2abcf5b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/8b66c859db0697d94ae6b1c525c19bf4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/45f0ee458eb763e83cdc01e1fff8d96b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/5f2268d9639dbe981491efa535dccbdd" alt="" />', '      asdsadas', 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '2016-11-11 07:26:57', '2016-11-11 07:26:57'),
(34, 2, 'admin', 0, 0, '1', '动漫图集,', 'http://ogh4xbkgc.bkt.clouddn.com/73194ba0757fada96b33d78c79d8c107', '近期P站图分享-11-4【482P】', NULL, '<img src="http://ogh4xbkgc.bkt.clouddn.com/641bfa8c1fcb33b9e54c7e73c2abcf5b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/8b66c859db0697d94ae6b1c525c19bf4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/45f0ee458eb763e83cdc01e1fff8d96b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/5f2268d9639dbe981491efa535dccbdd" alt="" />', '      asdsadas', 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '2016-11-11 07:26:57', '2016-11-11 07:26:57'),
(35, 2, 'admin', 0, 0, '1', '个人动画', 'http://ogh4xbkgc.bkt.clouddn.com/73194ba0757fada96b33d78c79d8c107', '近期P站图分享-11-4【482P】', NULL, '<img src="http://ogh4xbkgc.bkt.clouddn.com/641bfa8c1fcb33b9e54c7e73c2abcf5b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/8b66c859db0697d94ae6b1c525c19bf4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/45f0ee458eb763e83cdc01e1fff8d96b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/5f2268d9639dbe981491efa535dccbdd" alt="" />', '      asdsadas', 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '2016-11-11 07:26:57', '2016-11-11 07:26:57'),
(36, 2, 'admin', 1, 0, '1', '个人动画', 'http://ogh4xbkgc.bkt.clouddn.com/73194ba0757fada96b33d78c79d8c107', '近期P站图分享-11-4【482P】', NULL, '<img src="http://ogh4xbkgc.bkt.clouddn.com/641bfa8c1fcb33b9e54c7e73c2abcf5b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/8b66c859db0697d94ae6b1c525c19bf4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/45f0ee458eb763e83cdc01e1fff8d96b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/5f2268d9639dbe981491efa535dccbdd" alt="" />', '      asdsadas', 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '2016-11-11 07:26:57', '2016-11-16 05:55:20'),
(37, 2, 'admin', 0, 0, '1', '动漫图集,游戏CG', 'http://ogh4xbkgc.bkt.clouddn.com/73194ba0757fada96b33d78c79d8c107', '近期P站图分享-11-4【482P】', NULL, '<img src="http://ogh4xbkgc.bkt.clouddn.com/641bfa8c1fcb33b9e54c7e73c2abcf5b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/8b66c859db0697d94ae6b1c525c19bf4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/45f0ee458eb763e83cdc01e1fff8d96b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/5f2268d9639dbe981491efa535dccbdd" alt="" />', '      asdsadas', 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '2016-11-11 07:26:57', '2016-11-11 07:26:57'),
(38, 2, 'admin', 0, 0, '1', '游戏CG,', 'http://ogh4xbkgc.bkt.clouddn.com/73194ba0757fada96b33d78c79d8c107', '近期P站图分享-11-4【482P】', NULL, '<img src="http://ogh4xbkgc.bkt.clouddn.com/641bfa8c1fcb33b9e54c7e73c2abcf5b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/8b66c859db0697d94ae6b1c525c19bf4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/45f0ee458eb763e83cdc01e1fff8d96b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/5f2268d9639dbe981491efa535dccbdd" alt="" />', '      asdsadas', 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '2016-11-11 07:26:57', '2016-11-11 07:26:57'),
(39, 1, 'admin', 0, 0, '1', '动漫图集,', 'http://ogh4xbkgc.bkt.clouddn.com/1a510e1c5ee531e73288a2291ca9ee0b', '近期P站图分享-11-4【482P】', NULL, '<img src="http://ogh4xbkgc.bkt.clouddn.com/d640c0012495e306a602b928ccddc007" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/0071d96d22a98f73f062394c77ac77a5" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/f81fcf854c0aafd3e45e2cabb3362c7e" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/707325438d4e7c20cf1b5e7497c2dd1c" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/56a68bef506cd3d320832af6a789f4e4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/55b7d95acbd5650036871ae2767e5eba" alt="" />', '      xzcxzcxz', 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '2016-11-11 23:02:00', '2016-11-11 23:02:00'),
(40, 1, 'admin', 0, 0, '1', '动漫图集,游戏CG', 'http://ogh4xbkgc.bkt.clouddn.com/efdf62fd2e621af7507e5f7370290b4a', '近期P站图分享-11-4【482P】', NULL, '<p>\n	xzcasdhqwuihnnzchhadbnakshdabldsajdbsakdsna\n</p>\n<p>\n	<img src="http://www.hlifan.com/web/lib/kindeditor/plugins/emoticons/images/20.gif" border="0" alt="" />\n</p>\n<p>\n	<br />\n</p>\n<p>\n	<img src="http://ogh4xbkgc.bkt.clouddn.com/49799c1e8213a849c903f20ce9d46614" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/76dc6e3d35f812e6543f14a6a2c340a4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/063ea1db9ba5d0dabddb0bdfd30a50e4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/055f9aa71cd3a0b47f9b260214ed3b76" alt="" />\n</p>', '      zxczxcz', 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '2016-11-12 01:37:17', '2016-11-12 01:37:17'),
(41, 1, 'admin', 2, 0, '1', '游戏CG,个人动画', 'http://ogh4xbkgc.bkt.clouddn.com/efdf62fd2e621af7507e5f7370290b4a', '近期P站图分享-11-4【482P】', NULL, '<p>\n	xzcasdhqwuihnnzchhadbnakshdabldsajdbsakdsna\n</p>\n<p>\n	<img src="http://www.hlifan.com/web/lib/kindeditor/plugins/emoticons/images/20.gif" border="0" alt="" />\n</p>\n<p>\n	<br />\n</p>\n<p>\n	<img src="http://ogh4xbkgc.bkt.clouddn.com/49799c1e8213a849c903f20ce9d46614" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/76dc6e3d35f812e6543f14a6a2c340a4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/063ea1db9ba5d0dabddb0bdfd30a50e4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/055f9aa71cd3a0b47f9b260214ed3b76" alt="" />\n</p>', '      zxczxcz', 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '2016-11-12 01:37:18', '2016-11-16 15:28:48'),
(44, 3, '123456789', 1, 0, '1', '游戏CG,', 'http://ogh4xbkgc.bkt.clouddn.com/d833772cb9bd083c9709913e7712c237', 'ss', NULL, 'zxcsadsadsadasdsadvcxv<img src="http://ogh4xbkgc.bkt.clouddn.com/8d4f4e614c0e8f7306d6a1670281bfc9" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/4a907e9e052cc56aba784f12216da18b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/cf20592d0ed32eabd7e74372f0a09010" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/befb4b9d5e657cd8b6cc765ac51af404" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/b3080f4748d916269e8b236d6a12d02e" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/48d6c60ff8145eb079fcbdafacc624ac" alt="" />', '      kzbkdjashdhuisahdqwoiejoqwjewq', 'http://ogh4xbkgc.bkt.clouddn.com/73194ba0757fada96b33d78c79d8c107', '2016-11-12 16:57:32', '2016-11-16 15:15:54'),
(45, 2, '123456', 2, 0, '1', '动漫图集,游戏CG', 'http://ogh4xbkgc.bkt.clouddn.com/8c763560b2c20fe9ba1d4ff4ec2f1940', '蚕食玩玩哇', 'http://ogh4xbkgc.bkt.clouddn.com/e0f40123b5ada5c267378ff5267ae5cc,http://ogh4xbkgc.bkt.clouddn.com/8c763560b2c20fe9ba1d4ff4ec2f1940,http://ogh4xbkgc.bkt.clouddn.com/a26d04bdcdbdb29619407f5b8aac1933,http://ogh4xbkgc.bkt.clouddn.com/362eb4283225aed14bb394ffbbae24f3,http://ogh4xbkgc.bkt.clouddn.com/ca134fa4e8798778ab3fde2d2fba79b9,http://ogh4xbkgc.bkt.clouddn.com/b345bbf0702452501e07fb59a99aa7ef,http://ogh4xbkgc.bkt.clouddn.com/a4388365f58fbe7f9a097355315ff6f7,http://ogh4xbkgc.bkt.clouddn.com/e8628ac662e85745d27dce66ed3f73e2', '<img src="http://ogh4xbkgc.bkt.clouddn.com/a26d04bdcdbdb29619407f5b8aac1933" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/362eb4283225aed14bb394ffbbae24f3" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/ca134fa4e8798778ab3fde2d2fba79b9" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/b345bbf0702452501e07fb59a99aa7ef" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/a4388365f58fbe7f9a097355315ff6f7" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/e8628ac662e85745d27dce66ed3f73e2" alt="" />', '      hhlzxncljzxichxzbcbgasugdkuigsbzkjxckjbszkj', 'http://obsinesgs.bkt.clouddn.com/57c2b4a41326f', '2016-11-14 06:30:12', '2016-11-16 15:15:59'),
(46, 2, '123456', 15, 1, '1', '游戏CG,个人动画', 'http://ogh4xbkgc.bkt.clouddn.com/bee72ad52b066ee4b9cf57ba1fe8e1ef', 'zxczxcxzweqwe', 'http://ogh4xbkgc.bkt.clouddn.com/bee72ad52b066ee4b9cf57ba1fe8e1ef,http://ogh4xbkgc.bkt.clouddn.com/bcad352b06223d754dd3844b74461d9c,http://ogh4xbkgc.bkt.clouddn.com/af27d75bd8c2cc79fabc809d21c4bc6f,http://ogh4xbkgc.bkt.clouddn.com/ff6fa0627bae94017cf30d65000cfac6,http://ogh4xbkgc.bkt.clouddn.com/da39f1342aa8090c76173e58336ca161,http://ogh4xbkgc.bkt.clouddn.com/405ba60dc335a0743c551172ad7c411c,http://ogh4xbkgc.bkt.clouddn.com/919323e9690cb2dcc873f71be1c0ba68', '<img src="http://ogh4xbkgc.bkt.clouddn.com/bcad352b06223d754dd3844b74461d9c" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/af27d75bd8c2cc79fabc809d21c4bc6f" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/ff6fa0627bae94017cf30d65000cfac6" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/da39f1342aa8090c76173e58336ca161" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/405ba60dc335a0743c551172ad7c411c" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/919323e9690cb2dcc873f71be1c0ba68" alt="" />', '      sadsadas', 'http://obsinesgs.bkt.clouddn.com/57c2b4a41326f', '2016-11-14 08:06:31', '2016-11-16 15:15:40'),
(47, 1, 'admin', 7, 1, '1', '动漫图集,游戏CG', 'http://ogh4xbkgc.bkt.clouddn.com/f542d0f69eb7f77fe0786bde7e4bb6e1', '想自己CAD', 'http://ogh4xbkgc.bkt.clouddn.com/f542d0f69eb7f77fe0786bde7e4bb6e1,http://ogh4xbkgc.bkt.clouddn.com/38883fee3934160a515153fc15889329,http://ogh4xbkgc.bkt.clouddn.com/faf0e447c34623be005ce1669cb16321,http://ogh4xbkgc.bkt.clouddn.com/78f520ee7428f1c27c30d07252f3b402,http://ogh4xbkgc.bkt.clouddn.com/7b02fa98374566f7973b98209309ba3a', '<img src="http://ogh4xbkgc.bkt.clouddn.com/38883fee3934160a515153fc15889329" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/faf0e447c34623be005ce1669cb16321" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/78f520ee7428f1c27c30d07252f3b402" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/7b02fa98374566f7973b98209309ba3a" alt="" />', '      iasoizxnkchiahhzkxulchaskhlzxhuwadkzhcdhasildkjsajd,zkxjhclkszhkdjsakldsl;ajlzxn,chnzchjzkl', 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '2016-11-15 06:01:41', '2016-11-16 15:15:44'),
(48, 3, '123456789', 2, 0, '1', '杂志画集,网站推荐', 'http://ogh4xbkgc.bkt.clouddn.com/91fdf4cae1c1ae4ec680238e0cd84552', 'dsdfhilxznkh ', 'http://ogh4xbkgc.bkt.clouddn.com/91fdf4cae1c1ae4ec680238e0cd84552,http://ogh4xbkgc.bkt.clouddn.com/8941fc059caa096cac70bb3a99df0421,http://ogh4xbkgc.bkt.clouddn.com/bc42483e050d080a50015d16ce81f1ea,http://ogh4xbkgc.bkt.clouddn.com/862562cfb4a460efa2427e0417f16432,http://ogh4xbkgc.bkt.clouddn.com/ad7c6d95380c3a3cc847ebc2f8e1dddb,http://ogh4xbkgc.bkt.clouddn.com/836f9aed4f8e1e7950956d64bb9db73b,http://ogh4xbkgc.bkt.clouddn.com/8d15c5ed4cc0009eca0f4876f17b4ec2', '<img src="http://ogh4xbkgc.bkt.clouddn.com/8941fc059caa096cac70bb3a99df0421" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/bc42483e050d080a50015d16ce81f1ea" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/862562cfb4a460efa2427e0417f16432" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/ad7c6d95380c3a3cc847ebc2f8e1dddb" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/836f9aed4f8e1e7950956d64bb9db73b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/8d15c5ed4cc0009eca0f4876f17b4ec2" alt="" />', '      aspdjioznxkcuiashdn,bvcxmgbkhndskjhfkacbzxkch,sakcnzx,ckjaszkjdsakildlsadjlsajdls', 'http://ogh4xbkgc.bkt.clouddn.com/73194ba0757fada96b33d78c79d8c107', '2016-11-16 04:30:09', '2016-11-16 15:15:48'),
(49, 2, 'admin', 0, 0, '1', '动漫图集,游戏CG', 'http://obsinesgs.bkt.clouddn.com/57c2b1b21f6c1', '近期P站图分享-11-4【482P】', NULL, '<img src="http://ogh4xbkgc.bkt.clouddn.com/641bfa8c1fcb33b9e54c7e73c2abcf5b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/8b66c859db0697d94ae6b1c525c19bf4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/45f0ee458eb763e83cdc01e1fff8d96b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/5f2268d9639dbe981491efa535dccbdd" alt="" />', '      asdsadas', 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '2016-11-11 07:26:57', '2016-11-11 07:26:57'),
(50, 1, 'admin', 0, 0, '1', '游戏CG,', 'http://obsinesgs.bkt.clouddn.com/57c2b49a7b04b', '近期P站图分享-11-4【482P】', NULL, '<img src="http://ogh4xbkgc.bkt.clouddn.com/641bfa8c1fcb33b9e54c7e73c2abcf5b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/8b66c859db0697d94ae6b1c525c19bf4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/45f0ee458eb763e83cdc01e1fff8d96b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/5f2268d9639dbe981491efa535dccbdd" alt="" />', '      asdsadas', 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '2016-11-11 07:26:57', '2016-11-11 07:26:57'),
(51, 2, 'admin', 0, 0, '1', '动漫图集,游戏CG', 'http://ogh4xbkgc.bkt.clouddn.com/73194ba0757fada96b33d78c79d8c107', '近期P站图分享-11-4【482P】', NULL, '<img src="http://ogh4xbkgc.bkt.clouddn.com/641bfa8c1fcb33b9e54c7e73c2abcf5b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/8b66c859db0697d94ae6b1c525c19bf4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/45f0ee458eb763e83cdc01e1fff8d96b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/5f2268d9639dbe981491efa535dccbdd" alt="" />', '      asdsadas', 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '2016-11-11 07:26:57', '2016-11-11 07:26:57'),
(52, 3, 'admin', 0, 0, '1', '游戏CG,', 'http://ogh4xbkgc.bkt.clouddn.com/73194ba0757fada96b33d78c79d8c107', '近期P站图分享-11-4【482P】', NULL, '<img src="http://ogh4xbkgc.bkt.clouddn.com/641bfa8c1fcb33b9e54c7e73c2abcf5b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/8b66c859db0697d94ae6b1c525c19bf4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/45f0ee458eb763e83cdc01e1fff8d96b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/5f2268d9639dbe981491efa535dccbdd" alt="" />', '      asdsadas', 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '2016-11-11 07:26:57', '2016-11-11 07:26:57'),
(53, 4, 'admin', 0, 0, '1', '游戏CG,', 'http://ogh4xbkgc.bkt.clouddn.com/73194ba0757fada96b33d78c79d8c107', '近期P站图分享-11-4【482P】', NULL, '<img src="http://ogh4xbkgc.bkt.clouddn.com/641bfa8c1fcb33b9e54c7e73c2abcf5b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/8b66c859db0697d94ae6b1c525c19bf4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/45f0ee458eb763e83cdc01e1fff8d96b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/5f2268d9639dbe981491efa535dccbdd" alt="" />', '      asdsadas', 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '2016-11-11 07:26:57', '2016-11-11 07:26:57'),
(54, 5, 'admin', 0, 0, '1', '动漫图集,游戏CG', 'http://obsinesgs.bkt.clouddn.com/57c2b499d2901', '近期P站图分享-11-4【482P】', NULL, '<img src="http://ogh4xbkgc.bkt.clouddn.com/641bfa8c1fcb33b9e54c7e73c2abcf5b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/8b66c859db0697d94ae6b1c525c19bf4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/45f0ee458eb763e83cdc01e1fff8d96b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/5f2268d9639dbe981491efa535dccbdd" alt="" />', '      asdsadas', 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '2016-11-11 07:26:57', '2016-11-11 07:26:57'),
(55, 6, 'admin', 0, 0, '1', '动漫图集,', 'http://obsinesgs.bkt.clouddn.com/57c2b4a41326f', '近期P站图分享-11-4【482P】', NULL, '<img src="http://ogh4xbkgc.bkt.clouddn.com/641bfa8c1fcb33b9e54c7e73c2abcf5b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/8b66c859db0697d94ae6b1c525c19bf4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/45f0ee458eb763e83cdc01e1fff8d96b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/5f2268d9639dbe981491efa535dccbdd" alt="" />', '      asdsadas', 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '2016-11-11 07:26:57', '2016-11-11 07:26:57'),
(56, 6, 'admin', 0, 0, '1', '动漫图集,个人动画', 'http://ogh4xbkgc.bkt.clouddn.com/73194ba0757fada96b33d78c79d8c107', '近期P站图分享-11-4【482P】', NULL, '<img src="http://ogh4xbkgc.bkt.clouddn.com/641bfa8c1fcb33b9e54c7e73c2abcf5b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/8b66c859db0697d94ae6b1c525c19bf4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/45f0ee458eb763e83cdc01e1fff8d96b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/5f2268d9639dbe981491efa535dccbdd" alt="" />', '      asdsadas', 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '2016-11-11 07:26:57', '2016-11-11 07:26:57'),
(57, 2, 'admin', 0, 0, '1', '游戏CG,', 'http://ogh4xbkgc.bkt.clouddn.com/73194ba0757fada96b33d78c79d8c107', '近期P站图分享-11-4【482P】', NULL, '<img src="http://ogh4xbkgc.bkt.clouddn.com/641bfa8c1fcb33b9e54c7e73c2abcf5b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/8b66c859db0697d94ae6b1c525c19bf4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/45f0ee458eb763e83cdc01e1fff8d96b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/5f2268d9639dbe981491efa535dccbdd" alt="" />', '      asdsadas', 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '2016-11-11 07:26:57', '2016-11-11 07:26:57'),
(58, 2, 'admin', 0, 0, '1', '个人动画', 'http://obsinesgs.bkt.clouddn.com/57c2b499d2901', '近期P站图分享-11-4【482P】', NULL, '<img src="http://ogh4xbkgc.bkt.clouddn.com/641bfa8c1fcb33b9e54c7e73c2abcf5b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/8b66c859db0697d94ae6b1c525c19bf4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/45f0ee458eb763e83cdc01e1fff8d96b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/5f2268d9639dbe981491efa535dccbdd" alt="" />', '      asdsadas', 'http://obsinesgs.bkt.clouddn.com/57c2b499d2901', '2016-11-11 07:26:57', '2016-11-11 07:26:57'),
(59, 2, 'admin', 0, 0, '1', '动漫图集,游戏CG', 'http://obsinesgs.bkt.clouddn.com/57c2b4a3bc680', '近期P站图分享-11-4【482P】', NULL, '<img src="http://ogh4xbkgc.bkt.clouddn.com/641bfa8c1fcb33b9e54c7e73c2abcf5b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/8b66c859db0697d94ae6b1c525c19bf4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/45f0ee458eb763e83cdc01e1fff8d96b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/5f2268d9639dbe981491efa535dccbdd" alt="" />', '      asdsadas', 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '2016-11-11 07:26:57', '2016-11-11 07:26:57'),
(60, 2, 'admin', 0, 0, '1', '游戏CG,', 'http://ogh4xbkgc.bkt.clouddn.com/73194ba0757fada96b33d78c79d8c107', '近期P站图分享-11-4【482P】', NULL, '<img src="http://ogh4xbkgc.bkt.clouddn.com/641bfa8c1fcb33b9e54c7e73c2abcf5b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/8b66c859db0697d94ae6b1c525c19bf4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/45f0ee458eb763e83cdc01e1fff8d96b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/5f2268d9639dbe981491efa535dccbdd" alt="" />', '      asdsadas', 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '2016-11-11 07:26:57', '2016-11-11 07:26:57'),
(61, 2, 'admin', 0, 0, '1', '游戏CG,个人动画', 'http://ogh4xbkgc.bkt.clouddn.com/73194ba0757fada96b33d78c79d8c107', '近期P站图分享-11-4【482P】', NULL, '<img src="http://ogh4xbkgc.bkt.clouddn.com/641bfa8c1fcb33b9e54c7e73c2abcf5b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/8b66c859db0697d94ae6b1c525c19bf4" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/45f0ee458eb763e83cdc01e1fff8d96b" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/5f2268d9639dbe981491efa535dccbdd" alt="" />', '      asdsadas', 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '2016-11-11 07:26:57', '2016-11-11 07:26:57'),
(62, 3, '123456789', 6, 0, '1', '杂志画集,网站推荐,个人动画', 'http://ogh4xbkgc.bkt.clouddn.com/67559d8019503fe58758c771e085d967', 'vcbfgwrew', 'http://ogh4xbkgc.bkt.clouddn.com/67559d8019503fe58758c771e085d967,http://ogh4xbkgc.bkt.clouddn.com/f57e8a4671e8a5d40ac1df9ffc7c9882,http://ogh4xbkgc.bkt.clouddn.com/a3af277cd57c74db2385f7b5add9565a,http://ogh4xbkgc.bkt.clouddn.com/ce63535e48792b9bfe839d00ed5c2a27,http://ogh4xbkgc.bkt.clouddn.com/089a0d214fbf646b2fed92c64c5d8450', '<img src="http://ogh4xbkgc.bkt.clouddn.com/f57e8a4671e8a5d40ac1df9ffc7c9882" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/a3af277cd57c74db2385f7b5add9565a" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/ce63535e48792b9bfe839d00ed5c2a27" alt="" /><img src="http://ogh4xbkgc.bkt.clouddn.com/089a0d214fbf646b2fed92c64c5d8450" alt="" />', '      xzwqewqe', 'http://ogh4xbkgc.bkt.clouddn.com/73194ba0757fada96b33d78c79d8c107', '2016-11-16 07:31:14', '2016-11-18 21:10:39');

-- --------------------------------------------------------

--
-- Table structure for table `commit`
--

CREATE TABLE `commit` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `video_id` int(11) DEFAULT NULL,
  `user_thumb` varchar(255) DEFAULT NULL,
  `video_content` text,
  `content` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commit`
--

INSERT INTO `commit` (`id`, `user_id`, `book_id`, `video_id`, `user_thumb`, `video_content`, `content`, `created_at`, `updated_at`) VALUES
(7, 2, 0, 13, 'http://obsinesgs.bkt.clouddn.com/57c2b4a41326f', 'zxcxzcasdsa', '', '2016-11-14 23:11:57', '2016-11-14 23:11:57'),
(10, 2, 46, 0, 'http://obsinesgs.bkt.clouddn.com/57c2b4a41326f', '', 'asdasczx', '2016-11-14 23:18:50', '2016-11-14 23:18:50'),
(11, 1, 47, 0, 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '', '阿斯顿自行车自行车', '2016-11-15 06:02:36', '2016-11-15 06:02:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `statue` varchar(45) DEFAULT NULL,
  `thumb` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `phone`, `statue`, `thumb`, `created_at`, `updated_at`) VALUES
(1, 'admin', '9294b1f48a7ca91e4177d3fbe7993023', '', NULL, '1', 'http://ogh4xbkgc.bkt.clouddn.com/012065a6b9b9459e440233d6fe215ac7', '2016-11-11 07:04:01', '2016-11-11 07:04:20'),
(2, '123456', '9294b1f48a7ca91e4177d3fbe7993023', NULL, NULL, '1', 'http://obsinesgs.bkt.clouddn.com/57c2b4a41326f', NULL, NULL),
(3, '123456789', '9294b1f48a7ca91e4177d3fbe7993023', NULL, NULL, '1', 'http://ogh4xbkgc.bkt.clouddn.com/73194ba0757fada96b33d78c79d8c107', NULL, NULL),
(9, '13631297694', '9294b1f48a7ca91e4177d3fbe7993023', '13631297694@163.com', NULL, '1', 'http://ogh4xbkgc.bkt.clouddn.com/b0bc47653cd7baf07b71ba5db381c734', '2016-11-12 08:18:13', '2016-11-12 08:26:33');

-- --------------------------------------------------------

--
-- Table structure for table `video_lists`
--

CREATE TABLE `video_lists` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `video_title` varchar(255) DEFAULT NULL,
  `video_thumb` varchar(255) DEFAULT NULL,
  `user_thumb` varchar(255) DEFAULT NULL,
  `content` text,
  `video_url` text NOT NULL,
  `tab` varchar(255) DEFAULT NULL,
  `see` int(11) DEFAULT '0',
  `reply` int(11) DEFAULT '0',
  `state` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `video_lists`
--

INSERT INTO `video_lists` (`id`, `user_id`, `video_title`, `video_thumb`, `user_thumb`, `content`, `video_url`, `tab`, `see`, `reply`, `state`, `created_at`, `updated_at`) VALUES
(3, 2, 'sadsazxczcz', 'http://ogh4xbkgc.bkt.clouddn.com/7d7d258bcaa4d430ff3679e9b83eaed1', 'http://ogh4xbkgc.bkt.clouddn.com/b0bc47653cd7baf07b71ba5db381c734', 'zxczxasdas', 'oejvtim90.bkt.clouddn.com/xiaohai-video4604.884965046445', 'ss,aa,vv', 1, 0, '1', '2016-11-14 07:49:13', '2016-11-15 05:31:16'),
(4, 2, 'sadsazxczcz', 'http://ogh4xbkgc.bkt.clouddn.com/7d7d258bcaa4d430ff3679e9b83eaed1', 'http://ogh4xbkgc.bkt.clouddn.com/b0bc47653cd7baf07b71ba5db381c734', 'zxczxasdas', 'oejvtim90.bkt.clouddn.com/xiaohai-video4604.884965046445', 'ss,aa,vv', 0, 0, '0', '2016-11-14 07:49:13', '2016-11-14 07:49:13'),
(5, 2, 'sadsazxczcz', 'http://ogh4xbkgc.bkt.clouddn.com/7d7d258bcaa4d430ff3679e9b83eaed1', 'http://ogh4xbkgc.bkt.clouddn.com/b0bc47653cd7baf07b71ba5db381c734', 'zxczxasdas', 'oejvtim90.bkt.clouddn.com/xiaohai-video4604.884965046445', 'ss,aa,vv', 0, 0, '1', '2016-11-14 07:49:13', '2016-11-14 07:49:13'),
(6, 2, 'sadsazxczcz', 'http://ogh4xbkgc.bkt.clouddn.com/7d7d258bcaa4d430ff3679e9b83eaed1', 'http://ogh4xbkgc.bkt.clouddn.com/b0bc47653cd7baf07b71ba5db381c734', 'zxczxasdas', 'oejvtim90.bkt.clouddn.com/xiaohai-video4604.884965046445', 'ss,aa,vv', 0, 0, '0', '2016-11-14 07:49:13', '2016-11-14 07:49:13'),
(7, 2, 'sadsazxczcz', 'http://ogh4xbkgc.bkt.clouddn.com/7d7d258bcaa4d430ff3679e9b83eaed1', 'http://ogh4xbkgc.bkt.clouddn.com/b0bc47653cd7baf07b71ba5db381c734', 'zxczxasdas', 'oejvtim90.bkt.clouddn.com/xiaohai-video4604.884965046445', 'ss,aa,vv', 0, 0, '1', '2016-11-14 07:49:13', '2016-11-14 07:49:13'),
(8, 2, 'sadsazxczcz', 'http://ogh4xbkgc.bkt.clouddn.com/7d7d258bcaa4d430ff3679e9b83eaed1', 'http://ogh4xbkgc.bkt.clouddn.com/b0bc47653cd7baf07b71ba5db381c734', 'zxczxasdas', 'oejvtim90.bkt.clouddn.com/xiaohai-video4604.884965046445', 'ss,aa,vv', 0, 0, '0', '2016-11-14 07:49:13', '2016-11-14 07:49:13'),
(9, 2, 'sadsazxczcz', 'http://ogh4xbkgc.bkt.clouddn.com/7d7d258bcaa4d430ff3679e9b83eaed1', 'http://ogh4xbkgc.bkt.clouddn.com/b0bc47653cd7baf07b71ba5db381c734', 'zxczxasdas', 'oejvtim90.bkt.clouddn.com/xiaohai-video4604.884965046445', 'ss,aa,vv', 0, 0, '1', '2016-11-14 07:49:13', '2016-11-14 07:49:13'),
(10, 2, 'sadsazxczcz', 'http://ogh4xbkgc.bkt.clouddn.com/7d7d258bcaa4d430ff3679e9b83eaed1', 'http://ogh4xbkgc.bkt.clouddn.com/b0bc47653cd7baf07b71ba5db381c734', 'zxczxasdas', 'oejvtim90.bkt.clouddn.com/xiaohai-video4604.884965046445', 'ss,aa,vv', 0, 0, '0', '2016-11-14 07:49:13', '2016-11-14 07:49:13'),
(11, 2, 'sadsazxczcz', 'http://ogh4xbkgc.bkt.clouddn.com/7d7d258bcaa4d430ff3679e9b83eaed1', 'http://ogh4xbkgc.bkt.clouddn.com/b0bc47653cd7baf07b71ba5db381c734', 'zxczxasdas', 'oejvtim90.bkt.clouddn.com/xiaohai-video4604.884965046445', 'ss,aa,vv', 0, 0, '0', '2016-11-14 07:49:13', '2016-11-14 07:49:13'),
(12, 2, 'sadsazxczcz', 'http://ogh4xbkgc.bkt.clouddn.com/7d7d258bcaa4d430ff3679e9b83eaed1', 'http://ogh4xbkgc.bkt.clouddn.com/b0bc47653cd7baf07b71ba5db381c734', 'zxczxasdas', 'oejvtim90.bkt.clouddn.com/xiaohai-video4604.884965046445', 'ss,aa,vv', 0, 0, '0', '2016-11-14 07:49:13', '2016-11-14 07:49:13'),
(13, 2, '我是小海', 'http://ogh4xbkgc.bkt.clouddn.com/9a8c93ea64659661bae1abe7dfdfcd9a', 'http://ogh4xbkgc.bkt.clouddn.com/b0bc47653cd7baf07b71ba5db381c734', 'WEQWEA正处在小城镇', 'oejvtim90.bkt.clouddn.com/xiaohai-video6083.9034720844065', 'ss,aa,qq', 21, 1, '1', '2016-11-14 18:42:54', '2016-11-16 07:31:53'),
(14, 2, '学院', 'http://ogh4xbkgc.bkt.clouddn.com/c27627c13864965a0d4398c95accf8f2', 'http://obsinesgs.bkt.clouddn.com/57c2b4a41326f', '阿萨德为取得政府', 'oejvtim90.bkt.clouddn.com/xiaohai-video7280.5935801283495', 'ss,aa,vv', 5, 0, '1', '2016-11-19 03:34:38', '2016-11-19 04:13:34'),
(15, 2, '现在出生地', 'http://ogh4xbkgc.bkt.clouddn.com/acefb52a6382660b5cd7da0dc17dfad3', 'http://obsinesgs.bkt.clouddn.com/57c2b4a41326f', '新的收费方式', 'oejvtim90.bkt.clouddn.com/xiaohai-video1274.3352818715482', 'ss,aa', 1, 0, '1', '2016-11-19 03:39:40', '2016-11-19 03:39:43'),
(16, 2, '学院2', 'http://ogh4xbkgc.bkt.clouddn.com/641ef66303b80f911665fb86b56f26a3', 'http://obsinesgs.bkt.clouddn.com/57c2b4a41326f', 'sadsfsfsd ', 'oejvtim90.bkt.clouddn.com/xiaohai-video9700.725267184964', 'ss,aa,vv', 1, 0, '1', '2016-11-19 04:03:38', '2016-11-19 04:03:41'),
(17, 2, 'qwewqe', 'http://ogh4xbkgc.bkt.clouddn.com/46dade45cb1fae92a2782384fa859d11', 'http://obsinesgs.bkt.clouddn.com/57c2b4a41326f', 'khsauidhasodqwijodjqwiojodjqwjdjjasldjsalkdjaljdlasjl', 'oejvtim90.bkt.clouddn.com/xiaohai-video5469.605328670781', '萝莉,制服,痴女', 1, 0, NULL, '2016-11-19 07:17:44', '2016-11-19 07:18:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_lists`
--
ALTER TABLE `book_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commit`
--
ALTER TABLE `commit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `phone_UNIQUE` (`phone`);

--
-- Indexes for table `video_lists`
--
ALTER TABLE `video_lists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_lists`
--
ALTER TABLE `book_lists`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `commit`
--
ALTER TABLE `commit`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `video_lists`
--
ALTER TABLE `video_lists`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;