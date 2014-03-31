-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1:3306
-- 生成日期: 2014 年 03 月 29 日 02:05
-- 服务器版本: 5.1.28
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `mingshi`
--

-- --------------------------------------------------------

--
-- 表的结构 `ms_access`
--

CREATE TABLE IF NOT EXISTS `ms_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `module` varchar(50) DEFAULT NULL,
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='权限分配表';

--
-- 导出表中的数据 `ms_access`
--

INSERT INTO `ms_access` (`role_id`, `node_id`, `level`, `pid`, `module`) VALUES
(3, 17, 3, 16, NULL),
(2, 37, 3, 35, NULL),
(2, 36, 3, 35, NULL),
(2, 35, 2, 1, NULL),
(2, 28, 3, 18, NULL),
(2, 27, 3, 18, NULL),
(2, 26, 3, 18, NULL),
(2, 25, 3, 18, NULL),
(3, 16, 2, 1, NULL),
(3, 14, 3, 13, NULL),
(3, 13, 2, 1, NULL),
(3, 9, 3, 3, NULL),
(3, 8, 3, 3, NULL),
(3, 3, 2, 1, NULL),
(3, 4, 3, 2, NULL),
(3, 2, 2, 1, NULL),
(3, 1, 1, 0, NULL),
(2, 24, 3, 18, NULL),
(2, 23, 3, 18, NULL),
(2, 21, 3, 18, NULL),
(2, 20, 3, 18, NULL),
(2, 19, 3, 18, NULL),
(2, 22, 3, 18, NULL),
(2, 18, 2, 1, NULL),
(2, 34, 3, 16, NULL),
(2, 30, 3, 16, NULL),
(4, 39, 2, 1, NULL),
(3, 18, 2, 1, NULL),
(3, 22, 3, 18, NULL),
(3, 19, 3, 18, NULL),
(3, 20, 3, 18, NULL),
(3, 21, 3, 18, NULL),
(3, 23, 3, 18, NULL),
(3, 24, 3, 18, NULL),
(3, 25, 3, 18, NULL),
(3, 26, 3, 18, NULL),
(3, 27, 3, 18, NULL),
(3, 28, 3, 18, NULL),
(4, 35, 2, 1, NULL),
(4, 17, 3, 16, NULL),
(4, 16, 2, 1, NULL),
(4, 14, 3, 13, NULL),
(4, 13, 2, 1, NULL),
(4, 9, 3, 3, NULL),
(4, 8, 3, 3, NULL),
(4, 3, 2, 1, NULL),
(4, 4, 3, 2, NULL),
(4, 2, 2, 1, NULL),
(4, 1, 1, 0, NULL),
(2, 29, 3, 16, NULL),
(2, 17, 3, 16, NULL),
(2, 16, 2, 1, NULL),
(2, 33, 3, 13, NULL),
(2, 32, 3, 13, NULL),
(2, 31, 3, 13, NULL),
(2, 14, 3, 13, NULL),
(2, 13, 2, 1, NULL),
(2, 12, 3, 3, NULL),
(2, 11, 3, 3, NULL),
(2, 10, 3, 3, NULL),
(2, 9, 3, 3, NULL),
(2, 8, 3, 3, NULL),
(2, 3, 2, 1, NULL),
(2, 7, 3, 2, NULL),
(2, 6, 3, 2, NULL),
(2, 5, 3, 2, NULL),
(2, 4, 3, 2, NULL),
(2, 2, 2, 1, NULL),
(2, 1, 1, 0, NULL),
(2, 38, 3, 35, NULL),
(2, 39, 2, 1, NULL),
(2, 40, 3, 39, NULL),
(2, 41, 3, 39, NULL),
(2, 42, 3, 39, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `ms_active`
--

CREATE TABLE IF NOT EXISTS `ms_active` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `active_name` char(32) NOT NULL DEFAULT '',
  `sponsor` varchar(32) NOT NULL DEFAULT '',
  `area` varchar(32) NOT NULL DEFAULT '',
  `link` varchar(32) NOT NULL DEFAULT '',
  `introduce` text,
  `start_time` varchar(16) DEFAULT NULL,
  `end_time` varchar(16) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL COMMENT '状态 0 未通过审核 1通过审核',
  `month` tinyint(2) DEFAULT NULL,
  `year` char(4) DEFAULT NULL COMMENT '年',
  `day` tinyint(2) DEFAULT NULL,
  `superman` varchar(32) NOT NULL COMMENT '重要嘉宾',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 导出表中的数据 `ms_active`
--

INSERT INTO `ms_active` (`id`, `active_name`, `sponsor`, `area`, `link`, `introduce`, `start_time`, `end_time`, `status`, `month`, `year`, `day`, `superman`) VALUES
(2, '从后台添加一个时间试下', '主板党委发的搜', '发的规划', 'http://www.baidu.com', '明天的午休时间', '2014-03-18 12:00', '2014-03-31 14:25', 0, 3, '2014', 18, '王余洁'),
(3, '顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶', '发财反反复复反反复复', '是是是', 'http://www.baidu.com', '活动的顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶的顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶活动的顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶的顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶', '2014-03-21 14:25', '2014-03-23 14:25', 1, 3, '2014', 21, '是是是');

-- --------------------------------------------------------

--
-- 表的结构 `ms_admin`
--

CREATE TABLE IF NOT EXISTS `ms_admin` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL COMMENT '登陆账号',
  `role_id` tinyint(2) NOT NULL DEFAULT '0' COMMENT '角色',
  `email` varchar(50) DEFAULT NULL COMMENT '登录账号',
  `password` char(32) DEFAULT NULL COMMENT '登录密码',
  `status` int(11) DEFAULT '1' COMMENT '账号状态',
  `remark` varchar(255) DEFAULT '' COMMENT '备注信息',
  `find_code` char(5) DEFAULT NULL COMMENT '找回账号验证码',
  `time` int(10) DEFAULT NULL COMMENT '开通时间',
  `realname` varchar(32) NOT NULL COMMENT '真实姓名',
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='网站后台管理员表' AUTO_INCREMENT=4 ;

--
-- 导出表中的数据 `ms_admin`
--

INSERT INTO `ms_admin` (`aid`, `username`, `role_id`, `email`, `password`, `status`, `remark`, `find_code`, `time`, `realname`) VALUES
(1, 'admin', 1, '745760587@qq.com', '202cb962ac59075b964b07152d234b70', 1, '超级管理员', NULL, 1395976823, '超级管理员'),
(2, 'kefu1', 2, '123456@qq.com', '202cb962ac59075b964b07152d234b70', 1, '客服人员', NULL, 1395977077, '客服1'),
(3, 'bianji1', 3, '123456@qq.com', 'd9b1d7db4cd6e70935368a1efb10e377', 0, '编辑人员', NULL, 1395977718, '编辑1');

-- --------------------------------------------------------

--
-- 表的结构 `ms_area`
--

CREATE TABLE IF NOT EXISTS `ms_area` (
  `id` tinyint(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `pid` tinyint(10) unsigned NOT NULL,
  `path` varchar(32) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL COMMENT '地区类型',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 导出表中的数据 `ms_area`
--

INSERT INTO `ms_area` (`id`, `name`, `pid`, `path`, `type`) VALUES
(1, '北京', 0, '0', 1),
(4, '朝阳区', 1, '0-1', 2),
(7, '海淀区', 1, '0-1', 2),
(6, '五道口', 4, '0-1-4', 3),
(8, '中关村', 7, '0-1-7', 3),
(10, '魏公村', 7, '0-1-7', 0),
(11, '奥运村', 4, '0-1-4', 0),
(12, '西城区', 1, '0-1', 0);

-- --------------------------------------------------------

--
-- 表的结构 `ms_article`
--

CREATE TABLE IF NOT EXISTS `ms_article` (
  `aid` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `ishid` tinyint(2) unsigned NOT NULL COMMENT '是否匿名',
  `tag` varchar(32) NOT NULL COMMENT '对应标签id号',
  `uid` mediumint(8) unsigned NOT NULL,
  `contact` varchar(20) DEFAULT NULL COMMENT '游客投稿的联系方式',
  `cid` mediumint(8) unsigned NOT NULL COMMENT '文章分类id',
  `sbj_id` tinyint(1) NOT NULL DEFAULT '0' COMMENT '科目id',
  `flag` set('a','t','f','j','h') DEFAULT NULL COMMENT 'a推荐t头条f幻灯j精品h热门',
  `keywords` varchar(80) NOT NULL COMMENT '关键字',
  `description` varchar(100) NOT NULL COMMENT '描述',
  `summary` char(125) NOT NULL COMMENT '摘要',
  `content` text NOT NULL,
  `number` int(10) NOT NULL,
  `title` varchar(32) NOT NULL COMMENT '文章标题',
  `image` varchar(200) NOT NULL COMMENT '文章图片',
  `click` int(10) NOT NULL DEFAULT '0' COMMENT '点击率',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '发布时间',
  `up_time` int(10) NOT NULL COMMENT '文章更新时间',
  `status` tinyint(10) unsigned NOT NULL COMMENT '0未通过审核1通过审核',
  `firstimage` varchar(100) NOT NULL COMMENT '测试图片',
  `images` varchar(100) NOT NULL,
  `rNum` int(11) NOT NULL DEFAULT '0' COMMENT '评论数',
  `shareNum` mediumint(9) NOT NULL DEFAULT '0' COMMENT '分享次数',
  `up` tinyint(10) unsigned NOT NULL DEFAULT '0' COMMENT '支持',
  `down` tinyint(10) unsigned NOT NULL DEFAULT '0' COMMENT '反对',
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 导出表中的数据 `ms_article`
--

INSERT INTO `ms_article` (`aid`, `ishid`, `tag`, `uid`, `contact`, `cid`, `sbj_id`, `flag`, `keywords`, `description`, `summary`, `content`, `number`, `title`, `image`, `click`, `create_time`, `up_time`, `status`, `firstimage`, `images`, `rNum`, `shareNum`, `up`, `down`) VALUES
(1, 0, 'js脚本丢失，编辑器丢失', 1, NULL, 1, 0, 'a,t', 'js脚本丢失，编辑器丢失', 'js脚本丢失，编辑器丢失js脚本丢失，编辑器丢失', 'js脚本丢失，编辑器丢失js脚本丢失，编辑器丢失', 'js脚本丢失，编辑器丢失js脚本丢失，编辑器丢失js脚本丢失，编辑器丢失js脚本丢失，编辑器丢失js脚本丢失，编辑器丢失js脚本丢失，编辑器丢失js脚本丢失，编辑器丢失js脚本丢失，编辑器丢失js脚本丢失，编辑器丢失js脚本丢失，编辑器丢失js脚本丢失，编辑器丢失js脚本丢失，编辑器丢失js脚本丢失，编辑器丢失js脚本丢失，编辑器丢失js脚本丢失，编辑器丢失js脚本丢失，编辑器丢失js脚本丢失，编辑器丢失js脚本丢失，编辑器丢失js脚本丢失，编辑器丢失js脚本丢失，编辑器丢失js脚本丢失，编辑器丢失js脚本丢失，编辑器丢失js脚本丢失，编辑器丢失js脚本丢失，编辑器丢失js脚本丢失，编辑器丢失js脚本丢失，编辑器丢失js脚本丢失，编辑器丢失js脚本丢失，编辑器丢失js脚本丢失，编辑器丢失js脚本丢失，编辑器丢失js脚本丢失，编辑器丢失js脚本丢失，编辑器丢失js脚本丢失，编辑器丢失js脚本丢失，编辑器丢失js脚本丢失，编辑器丢失js脚本丢失，编辑器丢失js脚本丢失，编辑器丢失js脚本丢失，编辑器丢失', 0, 'js脚本丢失，编辑器丢失', '', 7, 1395811861, 1395816178, 1, '533276f204d76.jpg', '', 0, 0, 0, 0),
(2, 0, '请将图片控制在100K以下！', 2, NULL, 1, 0, 'a,t,j,h', '请将图片控制在100K以下！', '请将图片控制在100K以下！', '请将图片控制在100K以下！', '请将图片控制在100K以下！请将图片控制在100K以下！请将图片控制在100K以下！请将图片控制在100K以下！请将图片控制在100K以下！', 0, '请将图片控制在100K以下！', '', 39, 1395815813, 1395815853, 1, '53326c1a5f131.jpeg', '', 1, 0, 0, 0),
(3, 0, '王家长，在线投篇稿件，看看效果~！', 20, NULL, 1, 0, 'h', '王家长，在线投篇稿件，看看效果~！', '王家长，在线投篇稿件，看看效果~！', '王家长，在线投篇稿件，看看效果~！', '王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！王家长，在线投篇稿件，看看效果~！', 0, '王家长，在线投篇稿件，看看效果~！', '', 4, 1395821282, 1395821401, 1, '53328b59be41a.png', '', 0, 0, 0, 0),
(4, 1, '匿名', 20, NULL, 1, 0, 'a,t,j,h', '', '', '', '王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？王家长，如果要求匿名投稿呢？', 0, '王家长，如果要求匿名投稿呢？', '', 8, 1395821451, 1395886891, 1, '', '', 0, 0, 0, 0),
(5, 0, '', 0, NULL, 1, 0, 'a,t,j,h', '', '', '...', '游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果游客投篇稿件，看下效果', 0, '游客投篇稿件，看下效果', '', 24, 1395829195, 1395886947, 1, '533380f63f731.jpg', '', 0, 0, 0, 0),
(6, 0, '', 5, 'QQ：745760587', 0, 0, NULL, '', '', '...', '投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式投稿的时候，写上投稿人的联系方式', 0, '投稿的时候，写上投稿人的联系方式', '', 0, 1395887098, 0, 0, '', '', 0, 0, 0, 0),
(7, 0, '', 0, 'tel：15210651512', 0, 0, NULL, '', '', '...', '但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！但凡写了联系方式的都在后台列出来吧~！', 0, '但凡写了联系方式的都在后台列出来吧~！', '', 0, 1395887174, 0, 0, '', '', 0, 0, 0, 0),
(8, 0, '', 0, 'QQ号、手机号等联系方式', 0, 0, NULL, '', '', '...', '游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码', 0, '游客投稿的话，需要输入一次验证码', '', 0, 1395899201, 0, 0, '', '', 0, 0, 0, 0),
(9, 0, '', 5, 'QQ号、手机号等联系方式', 0, 0, NULL, '', '', '...', '登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码', 0, '登录会员投稿，无需输入验证码', '', 0, 1395899541, 0, 0, '', '', 0, 0, 0, 0),
(10, 0, '', 5, '', 0, 0, NULL, '', '', '...', '登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码登录会员投稿，无需输入验证码', 0, '登录会员投稿，无需输入验证码', '', 0, 1395899850, 0, 0, '', '', 0, 0, 0, 0),
(11, 0, '', 0, '来个联系方式', 0, 0, NULL, '', '', '...', '游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码游客投稿的话，需要输入一次验证码', 0, '游客投稿的话，需要输入一次验证码', '', 0, 1395899886, 0, 0, '', '', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `ms_category`
--

CREATE TABLE IF NOT EXISTS `ms_category` (
  `cid` int(5) NOT NULL AUTO_INCREMENT,
  `pid` int(5) DEFAULT NULL COMMENT 'parentCategory上级分类',
  `name` varchar(20) DEFAULT NULL COMMENT '分类名称',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='精读分类表' AUTO_INCREMENT=8 ;

--
-- 导出表中的数据 `ms_category`
--

INSERT INTO `ms_category` (`cid`, `pid`, `name`) VALUES
(1, 0, '小学'),
(2, 0, '初中'),
(3, 0, '高中'),
(4, 0, '今日头条'),
(5, 1, '小学语文'),
(6, 5, '删除不了？'),
(7, 6, '我勒个去了');

-- --------------------------------------------------------

--
-- 表的结构 `ms_child_class`
--

CREATE TABLE IF NOT EXISTS `ms_child_class` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `name` char(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 导出表中的数据 `ms_child_class`
--

INSERT INTO `ms_child_class` (`id`, `name`) VALUES
(1, '小学一年级'),
(2, '小学二年级'),
(3, '小学三年级'),
(4, '小学四年级'),
(5, '小学五年级'),
(6, '小学六年级'),
(7, '初中一年级'),
(8, '初中二年级'),
(9, '初中三年级'),
(10, '高中一年级'),
(11, '高中二年级'),
(12, '高中三年级');

-- --------------------------------------------------------

--
-- 表的结构 `ms_fangan`
--

CREATE TABLE IF NOT EXISTS `ms_fangan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` tinyint(10) NOT NULL COMMENT '老师id',
  `kid` tinyint(10) unsigned NOT NULL COMMENT '约课id',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0未审1审核',
  `content` varchar(500) NOT NULL COMMENT '详细内容',
  `creat_time` int(10) unsigned NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='教学方案表' AUTO_INCREMENT=2 ;

--
-- 导出表中的数据 `ms_fangan`
--

INSERT INTO `ms_fangan` (`id`, `uid`, `kid`, `status`, `content`, `creat_time`) VALUES
(1, 3, 5, 1, '易中天老师针对此小学五年级设计的数学科目的设计方案。提交，请管理员认真审核~！易中天老师针对此小学五年级设计的数学科目的设计方案。提交，请管理员认真审核~！易中天老师针对此小学五年级设计的数学科目的设易中天老师针对此小学五年级设计的数学科目的设计方案。提交，请管理员认真审核~！易中天老师针对此小学五年级设计的数学科目的设计方案。提交，请管理员认真审核~！易中天老师针对此小学五年级设计的数学科目的设计方案。提交，请管理员认真审核~！易中天老师针对此小学五年级设计的数学科目的设计方案。提交，请管理员认真审核~！易中天老师针对此小学五年级设计的数学科目的设计方案。提交，请管理员认真审核~！易中天老师针对此小学五年级设计的数学科目的设计方案。提交，请管理员认真审核~！易中天老师针对此小学五年级设计的数学科目的设计方案。提交，请管理员认真审核~！易中天老师针对此小学五年级设计的数学科目的设计方案。提交，请管理员认真审核~！易中天老师针对此小学五年级设计的数学科目的设计方案。提交，请管理员认真审核~！易中天老师针对此小学五年级设计的数学科目的设计方案。提交，请管理员认真审核~！易中天老师针对此小学', 1395380579);

-- --------------------------------------------------------

--
-- 表的结构 `ms_favorite`
--

CREATE TABLE IF NOT EXISTS `ms_favorite` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(10) unsigned NOT NULL,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `title` char(100) NOT NULL,
  `url` char(100) NOT NULL,
  `adddate` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `userid` (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='收藏表' AUTO_INCREMENT=4 ;

--
-- 导出表中的数据 `ms_favorite`
--

INSERT INTO `ms_favorite` (`id`, `aid`, `uid`, `title`, `url`, `adddate`) VALUES
(1, 2, 20, '请将图片控制在100K以下！', 'http://localhost/test/index/content/aid/2', 1395819029),
(2, 4, 20, '王家长，如果要求匿名投稿呢？', 'http://localhost/test/index/content/aid/4', 1395823806),
(3, 5, 5, '游客投篇稿件，看下效果', 'http://localhost/test/index/content/aid/5', 1395886850);

-- --------------------------------------------------------

--
-- 表的结构 `ms_favorite_teacher`
--

CREATE TABLE IF NOT EXISTS `ms_favorite_teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '谁收藏的',
  `t_uid` int(11) NOT NULL COMMENT '被收藏的老师的id',
  `create_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='名师收藏表' AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `ms_favorite_teacher`
--


-- --------------------------------------------------------

--
-- 表的结构 `ms_member`
--

CREATE TABLE IF NOT EXISTS `ms_member` (
  `uid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `tid` mediumint(8) NOT NULL COMMENT '会员身份，1家长，2老师',
  `rankid` int(10) NOT NULL,
  `uname` char(20) NOT NULL,
  `password` char(32) NOT NULL,
  `phone` char(32) NOT NULL DEFAULT '',
  `classid` varchar(8) NOT NULL,
  `obj_id` mediumint(8) NOT NULL COMMENT '科目id',
  `coin` int(10) unsigned NOT NULL COMMENT '金币',
  `image` varchar(32) NOT NULL COMMENT '会员头像',
  `regdate` int(10) NOT NULL,
  `lastdate` int(10) NOT NULL,
  `create_time` varchar(32) NOT NULL COMMENT '图片上传时间',
  `place` smallint(5) NOT NULL,
  `status` int(2) unsigned NOT NULL DEFAULT '0' COMMENT '0未通过审核1通过审核',
  `ip` varchar(32) DEFAULT NULL COMMENT '用户ip',
  `yqm_sn` varchar(7) NOT NULL COMMENT '关联邀请码',
  `province` tinyint(10) unsigned NOT NULL COMMENT '省id',
  `city` tinyint(10) unsigned NOT NULL COMMENT '市id',
  `area` tinyint(10) unsigned NOT NULL COMMENT '县id',
  `style` varchar(32) NOT NULL DEFAULT 'black' COMMENT '风格',
  `jlpwd` varchar(32) NOT NULL COMMENT '简历密码',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- 导出表中的数据 `ms_member`
--

INSERT INTO `ms_member` (`uid`, `tid`, `rankid`, `uname`, `password`, `phone`, `classid`, `obj_id`, `coin`, `image`, `regdate`, `lastdate`, `create_time`, `place`, `status`, `ip`, `yqm_sn`, `province`, `city`, `area`, `style`, `jlpwd`) VALUES
(1, 2, 1, '刘创', 'e10adc3949ba59abbe56e057f20f883e', '18001208807', '2', 3, 0, '', 1384507756, 0, '', 0, 1, NULL, '', 1, 4, 6, 'top2', ''),
(2, 2, 2, '乔丹', 'e10adc3949ba59abbe56e057f20f883e', '', '3', 3, 5, '', 0, 0, '', 0, 1, NULL, '', 0, 0, 0, 'black', ''),
(3, 2, 1, '易中天', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 2, 5, '', 1385450858, 0, '', 0, 1, '2130706433', '', 1, 7, 10, 'black', ''),
(5, 2, 2, '王老师', 'e10adc3949ba59abbe56e057f20f883e', '13167356695', '1', 2, 5, '', 1385451253, 0, '', 0, 1, '2130706433', '88rv27', 1, 4, 6, 'black', 'e10adc3949ba59abbe56e057f20f883e'),
(6, 1, 0, '魏志国', 'e10adc3949ba59abbe56e057f20f883e', '1367892675', '0', 0, 5, '', 1385451568, 0, '', 0, 0, '2130706433', 'tklywd', 1, 4, 11, 'black', ''),
(20, 1, 0, '王家长', 'e10adc3949ba59abbe56e057f20f883e', '111', '1', 0, 5, '', 1392445590, 0, '', 0, 1, '2130706433', '11111', 1, 4, 6, 'top2', '');

-- --------------------------------------------------------

--
-- 表的结构 `ms_member_rank`
--

CREATE TABLE IF NOT EXISTS `ms_member_rank` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `rankname` char(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 导出表中的数据 `ms_member_rank`
--

INSERT INTO `ms_member_rank` (`id`, `rankname`) VALUES
(1, '超级管理员');

-- --------------------------------------------------------

--
-- 表的结构 `ms_member_type`
--

CREATE TABLE IF NOT EXISTS `ms_member_type` (
  `id` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(20) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- 导出表中的数据 `ms_member_type`
--

INSERT INTO `ms_member_type` (`id`, `name`) VALUES
(1, '家长'),
(2, '名师');

-- --------------------------------------------------------

--
-- 表的结构 `ms_message`
--

CREATE TABLE IF NOT EXISTS `ms_message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `mid` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `msg` varchar(100) NOT NULL,
  `create_time` int(10) unsigned NOT NULL COMMENT '发送时间',
  `isread` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '0未读 1已读',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 导出表中的数据 `ms_message`
--

INSERT INTO `ms_message` (`id`, `uid`, `mid`, `title`, `msg`, `create_time`, `isread`) VALUES
(1, 22, 0, '您好，欢迎注册名师.so', '您好，欢迎注册名师.so您好，欢迎注册名师.so您好，欢迎注册名师.so您好，欢迎注册名师.so您好，欢迎注册名师.so', 1393405644, 0);

-- --------------------------------------------------------

--
-- 表的结构 `ms_mystory`
--

CREATE TABLE IF NOT EXISTS `ms_mystory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `title` varchar(12) NOT NULL,
  `msg` text NOT NULL,
  `create_time` int(11) NOT NULL,
  `stutas` enum('0','1') NOT NULL DEFAULT '0',
  `up` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '赞',
  `down` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '踩',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `ms_mystory`
--


-- --------------------------------------------------------

--
-- 表的结构 `ms_node`
--

CREATE TABLE IF NOT EXISTS `ms_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) unsigned DEFAULT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='权限节点表' AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `ms_node`
--


-- --------------------------------------------------------

--
-- 表的结构 `ms_parent_info`
--

CREATE TABLE IF NOT EXISTS `ms_parent_info` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `uId` mediumint(8) NOT NULL,
  `childname` char(20) NOT NULL DEFAULT '',
  `school` char(20) NOT NULL DEFAULT '',
  `sex` char(32) NOT NULL DEFAULT '',
  `birthday` int(10) NOT NULL,
  `childscore` char(10) NOT NULL DEFAULT '',
  `dreamschool` char(20) NOT NULL,
  `bigimg` varchar(32) NOT NULL DEFAULT '',
  `thum` varchar(32) NOT NULL DEFAULT '',
  `smallimg` varchar(32) NOT NULL DEFAULT '',
  `parentname` char(20) NOT NULL DEFAULT '',
  `emile` char(32) NOT NULL DEFAULT '',
  `jianjie` char(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 导出表中的数据 `ms_parent_info`
--

INSERT INTO `ms_parent_info` (`id`, `uId`, `childname`, `school`, `sex`, `birthday`, `childscore`, `dreamschool`, `bigimg`, `thum`, `smallimg`, `parentname`, `emile`, `jianjie`) VALUES
(1, 9, '小明', '中关村二小', '女', 0, '', '清华大学', '/ms.so/Public/images/100_1.png', '/ms.so/Public/images/100_1.png', '/ms.so/Public/images/100_1.png', '雪华', '267343486@qq.com', '教育教育教育教育教育教育教育教育教育教育教育教育');

-- --------------------------------------------------------

--
-- 表的结构 `ms_review`
--

CREATE TABLE IF NOT EXISTS `ms_review` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL COMMENT '用户id',
  `aid` int(8) unsigned NOT NULL,
  `pid` int(10) unsigned NOT NULL,
  `username` char(32) NOT NULL,
  `ip` char(32) NOT NULL,
  `status` int(2) unsigned NOT NULL DEFAULT '0' COMMENT '0未通过审核1通过审核',
  `pl_time` int(10) unsigned NOT NULL COMMENT '评论时间',
  `face` char(100) NOT NULL DEFAULT '',
  `msg` text,
  `flag` set('h','t') NOT NULL COMMENT 'h热门t推荐',
  `up` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '赞',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 导出表中的数据 `ms_review`
--

INSERT INTO `ms_review` (`id`, `uid`, `aid`, `pid`, `username`, `ip`, `status`, `pl_time`, `face`, `msg`, `flag`, `up`) VALUES
(1, 20, 2, 0, '', '', 0, 1395824957, '', '给乔丹老师的文章评论一下~！', '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `ms_reviewcase`
--

CREATE TABLE IF NOT EXISTS `ms_reviewcase` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自身id',
  `pid` int(11) NOT NULL COMMENT '被评论案例的id即父id',
  `uid` int(11) NOT NULL COMMENT '谁评论的',
  `perid` tinyint(2) unsigned NOT NULL COMMENT '被评论教师id',
  `msg` text NOT NULL,
  `pl_time` int(11) NOT NULL DEFAULT '0',
  `stutas` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0为未审核',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='教学案例回复表' AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `ms_reviewcase`
--


-- --------------------------------------------------------

--
-- 表的结构 `ms_reviewinfo`
--

CREATE TABLE IF NOT EXISTS `ms_reviewinfo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `perid` int(10) unsigned NOT NULL COMMENT '被评分老师的id',
  `pid` tinyint(10) NOT NULL COMMENT '点评父id',
  `ip` char(32) NOT NULL DEFAULT '',
  `status` int(1) unsigned NOT NULL,
  `scores` int(100) unsigned NOT NULL COMMENT '评分',
  `pl_time` int(10) unsigned NOT NULL,
  `face` char(100) DEFAULT '',
  `msg` text,
  `up` int(2) unsigned NOT NULL COMMENT '赞的次数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='教师评论表' AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `ms_reviewinfo`
--


-- --------------------------------------------------------

--
-- 表的结构 `ms_reviewstory`
--

CREATE TABLE IF NOT EXISTS `ms_reviewstory` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自身id',
  `pid` int(11) NOT NULL COMMENT '被评论故事的id即父id',
  `uid` int(11) NOT NULL COMMENT '谁评论的',
  `perid` tinyint(2) unsigned NOT NULL COMMENT '被评论教师id',
  `msg` text NOT NULL,
  `pl_time` int(11) NOT NULL DEFAULT '0',
  `stutas` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0为未审核',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='名师故事回复表' AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `ms_reviewstory`
--


-- --------------------------------------------------------

--
-- 表的结构 `ms_role`
--

CREATE TABLE IF NOT EXISTS `ms_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='权限角色表' AUTO_INCREMENT=5 ;

--
-- 导出表中的数据 `ms_role`
--

INSERT INTO `ms_role` (`id`, `name`, `pid`, `status`, `remark`) VALUES
(1, 'admin', NULL, 1, '超级管理员'),
(2, 'service', 1, 1, '客服人员'),
(3, 'editor', 1, 1, '编辑人员');

-- --------------------------------------------------------

--
-- 表的结构 `ms_role_user`
--

CREATE TABLE IF NOT EXISTS `ms_role_user` (
  `role_id` mediumint(9) unsigned DEFAULT NULL COMMENT '不明白这张表存在的意义',
  `user_id` char(32) DEFAULT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`),
  KEY `role_id` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户角色表';

--
-- 导出表中的数据 `ms_role_user`
--

INSERT INTO `ms_role_user` (`role_id`, `user_id`) VALUES
(4, '6'),
(4, '4'),
(3, '5'),
(1, '1'),
(2, '2'),
(3, '3'),
(4, '7'),
(2, '2'),
(3, '3');

-- --------------------------------------------------------

--
-- 表的结构 `ms_ryzs`
--

CREATE TABLE IF NOT EXISTS `ms_ryzs` (
  `id` tinyint(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` tinyint(10) unsigned NOT NULL,
  `image` varchar(100) NOT NULL COMMENT '图片地址',
  `create_time` int(11) unsigned NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='荣誉证书表' AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `ms_ryzs`
--


-- --------------------------------------------------------

--
-- 表的结构 `ms_sktime`
--

CREATE TABLE IF NOT EXISTS `ms_sktime` (
  `id` smallint(8) unsigned NOT NULL AUTO_INCREMENT,
  `uid` smallint(8) unsigned NOT NULL,
  `morning` set('1','2','3','4','5','6','7') NOT NULL COMMENT '上午',
  `afternoon` set('1','2','3','4','5','6','7') NOT NULL COMMENT '中午',
  `evening` set('1','2','3','4','5','6','7') NOT NULL COMMENT '下午',
  `create_time` int(10) unsigned NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='可授课时间表' AUTO_INCREMENT=2 ;

--
-- 导出表中的数据 `ms_sktime`
--

INSERT INTO `ms_sktime` (`id`, `uid`, `morning`, `afternoon`, `evening`, `create_time`) VALUES
(1, 5, '3', '3', '2,3,4,6', 1394506328);

-- --------------------------------------------------------

--
-- 表的结构 `ms_studyexperience`
--

CREATE TABLE IF NOT EXISTS `ms_studyexperience` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL,
  `school` varchar(32) NOT NULL,
  `study_stage` varchar(32) NOT NULL,
  `start_time` varchar(32) NOT NULL,
  `end_time` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='学习经历' AUTO_INCREMENT=12 ;

--
-- 导出表中的数据 `ms_studyexperience`
--

INSERT INTO `ms_studyexperience` (`id`, `uid`, `school`, `study_stage`, `start_time`, `end_time`) VALUES
(5, 1, '清华大学', '博士后', '2012年6月', '2012年6月'),
(8, 1, '学校', '小学', '2012年6月', '2012年6月'),
(10, 5, '学校', '小学', '2012年6月', '2012年6月'),
(11, 5, '佳丽顿大学', '大专', '2008年9月', '2012年6月');

-- --------------------------------------------------------

--
-- 表的结构 `ms_subject`
--

CREATE TABLE IF NOT EXISTS `ms_subject` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `subject` char(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 导出表中的数据 `ms_subject`
--

INSERT INTO `ms_subject` (`id`, `subject`) VALUES
(1, '语文'),
(2, '数学'),
(3, '英语'),
(4, '物理'),
(5, '化学'),
(6, '美术');

-- --------------------------------------------------------

--
-- 表的结构 `ms_tag`
--

CREATE TABLE IF NOT EXISTS `ms_tag` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `status` tinyint(2) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='教师标签表' AUTO_INCREMENT=20 ;

--
-- 导出表中的数据 `ms_tag`
--

INSERT INTO `ms_tag` (`id`, `name`, `status`) VALUES
(1, '幽默', 0),
(2, '风趣', 0),
(3, '生动活泼', 0),
(4, '欢笑', 0),
(5, 'vghfhfh', 0),
(7, '发反反复复', 0),
(8, '反反复复', 0),
(11, '美丽大方', 0),
(12, '高规格', 0),
(13, '大方', 0),
(14, '人人人人人', 0),
(15, '凤飞飞', 0),
(16, '很好很好', 0),
(17, '凤飞飞飞', 0),
(18, '得得得', 0),
(19, '777', 0);

-- --------------------------------------------------------

--
-- 表的结构 `ms_tags`
--

CREATE TABLE IF NOT EXISTS `ms_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag` char(32) NOT NULL DEFAULT '',
  `uid` int(10) unsigned NOT NULL,
  `artid` int(10) unsigned NOT NULL,
  `time` int(10) NOT NULL COMMENT '添加时间',
  `first_char` varchar(10) NOT NULL COMMENT '汉子拼音首字母',
  `flag` set('h','t') NOT NULL COMMENT 'h热门t推荐',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 导出表中的数据 `ms_tags`
--

INSERT INTO `ms_tags` (`id`, `tag`, `uid`, `artid`, `time`, `first_char`, `flag`) VALUES
(1, '小学', 0, 0, 1385433216, 'X', 'h'),
(3, '中学', 0, 0, 1385362442, 'Z', 'h'),
(4, '公开', 0, 0, 1385362453, 'G', 'h'),
(5, '教育', 0, 0, 1385362463, 'J', 'h'),
(6, '供货方', 0, 0, 1385361459, 'G', ''),
(7, '小升初课程', 0, 0, 1385617711, 'X', 'h'),
(8, '奥数', 0, 0, 1385617731, 'A', 'h');

-- --------------------------------------------------------

--
-- 表的结构 `ms_teachcase`
--

CREATE TABLE IF NOT EXISTS `ms_teachcase` (
  `id` tinyint(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` tinyint(10) unsigned NOT NULL,
  `title` varchar(32) NOT NULL COMMENT '标题',
  `case` varchar(1000) NOT NULL COMMENT '教学案例内容',
  `create_time` int(11) unsigned NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='教学案例表' AUTO_INCREMENT=36 ;

--
-- 导出表中的数据 `ms_teachcase`
--

INSERT INTO `ms_teachcase` (`id`, `uid`, `title`, `case`, `create_time`) VALUES
(2, 1, '北师大附小 小升初', '北师大附小 小升初北师大附小 小升初北师大附小 小升初北师大附小 小升初', 1390199036),
(4, 3, '学而思', '  这是个让人成长的地方  这是个让人成长的地方  这是个让人成长的地方  这是个让人成长的地方  这是个让人成长的地方  这是个让人成长的地方  这是个让人成长的地方  这是个让人成长的地方  这是', 1390290263),
(34, 5, '某某学生课程辅导，修改？', '某某学生课程辅导某某学生课程辅导某某学生课程辅导某某学生课程辅导某某学生课程辅导某某学生课程辅导某某学生课程辅导某某学生课程辅导某某学生课程辅导某某学生课程辅导某某学生课程辅导某某学生课程辅导某某学生，这里限制字数1000字！', 1395110270),
(15, 1, '发反反复复反反复复', '北师大附小 小升初北师大附小 小升初北师大附小 小升初北师大附小 小升初', 1390445136),
(35, 5, '王老师再来一个教学案例', '王老师再来一个教学案例王老师再来一个教学案例王老师再来一个教学案例王老师再来一个教学案例王老师再来一个教学案例王老师再来一个教学案例王老师再来一个教学案例王老师再来一个教学案例王老师再来一个教学案例王老师再来一个教学案例王老师再来一个教学案例王老师再来一个教学案例王老师再来一个教学案例王老师再来一个教学案例王老师再来一个教学案例王老师再来一个教学案例王老师再来一个教学案例王老师再来一个教学案例王老师再来一个教学案例王老师再来一个教学案例王老师再来一个教学案例王老师再来一个教学案例王老师再来一个教学案例王老师再来一个教学案例王老师再来一个教学案例王老师再来一个教学案例王老师再来一个教学案例', 1395112719);

-- --------------------------------------------------------

--
-- 表的结构 `ms_teacher_info`
--

CREATE TABLE IF NOT EXISTS `ms_teacher_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `recommend` tinyint(2) DEFAULT '0' COMMENT 'login页推荐名师',
  `ishide` tinyint(4) NOT NULL COMMENT '默认0显示所有人可见1自己可见',
  `teach_age` int(10) unsigned NOT NULL COMMENT '教学年龄',
  `keshifei` int(10) unsigned NOT NULL,
  `now_job` char(100) NOT NULL,
  `my_strong` char(100) NOT NULL,
  `teach_style` char(100) NOT NULL,
  `emile` varchar(100) NOT NULL,
  `identity` varchar(100) NOT NULL COMMENT '身份',
  `education` varchar(10) NOT NULL COMMENT '学历',
  `school` char(100) NOT NULL,
  `major` char(60) NOT NULL COMMENT '专业',
  `home` varchar(100) NOT NULL,
  `hobby` varchar(32) NOT NULL,
  `bir_type` varchar(32) NOT NULL COMMENT '0农历1阳历',
  `sex` int(2) unsigned NOT NULL COMMENT '0男1女',
  `demain_name` varchar(32) NOT NULL,
  `start_time` int(10) NOT NULL,
  `end_time` int(10) NOT NULL,
  `bigimg` varchar(32) NOT NULL,
  `thumb` varchar(32) NOT NULL,
  `smallimg` varchar(32) NOT NULL,
  `honor` varchar(32) NOT NULL,
  `msg` text NOT NULL,
  `year` int(10) unsigned NOT NULL COMMENT '年',
  `month` tinyint(10) unsigned NOT NULL COMMENT '月',
  `day` tinyint(10) unsigned NOT NULL COMMENT '日',
  `tuike` tinyint(10) unsigned NOT NULL DEFAULT '0' COMMENT '退课次数',
  `distence` int(10) unsigned NOT NULL COMMENT '距离',
  `url` varchar(100) NOT NULL COMMENT '名师二级域名',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- 导出表中的数据 `ms_teacher_info`
--

INSERT INTO `ms_teacher_info` (`id`, `uid`, `recommend`, `ishide`, `teach_age`, `keshifei`, `now_job`, `my_strong`, `teach_style`, `emile`, `identity`, `education`, `school`, `major`, `home`, `hobby`, `bir_type`, `sex`, `demain_name`, `start_time`, `end_time`, `bigimg`, `thumb`, `smallimg`, `honor`, `msg`, `year`, `month`, `day`, `tuike`, `distence`, `url`) VALUES
(1, 1, 1, 0, 12, 120, '打开看看的', '日前取保候审的范志钱明骏、贾育新三名离职的原盛大管理人员发动一场“反诉”行动，举报盛大集团董事长陈天jhj', '幽默,风趣', '1234@qq.com', '顶级名师', '初中', '北京大学', '数学', '北京市', '篮球', '0', 0, '', 0, 0, '', '', '', '篮球，羽毛球', '老师2008年北京理工大学硕士毕业，毕业后的6年一直在从事小学奥数的研究和教学工作，独创的小升初7大专题教学法帮助几百位学生考上重点中学，是一位难得的好老师。', 1987, 6, 13, 0, 0, ''),
(2, 3, 1, 0, 13, 211, '学而思', '语文唱歌语文唱歌语文唱歌语文唱歌语文唱歌语文唱歌语文唱歌语文唱歌语文唱歌语文唱歌语文唱歌语文唱歌语文唱歌语文唱歌语文唱歌语文唱歌语文唱歌', '', '', '名校学生', '本科', '北京理工大学', '', '', '', '', 0, '', 0, 0, '', '', '', '', '我是个乐观开朗的人，课堂氛围活跃，带人亲和，热爱教学事业，喜欢小盆友，喜欢登山，喜欢旅游，喜欢唱歌，喜欢喝酒我是个乐观开朗的人，课堂氛围活跃，带人亲和，热爱教学事业，喜欢小盆友，喜欢登山，喜欢旅游，喜欢唱歌，喜欢喝酒', 0, 0, 0, 0, 0, ''),
(3, 5, 1, 0, 10, 50, '学而思', '据央视新闻联播报道，中共中央总书记、国家主席、中央军委主席、中央全面深化改革领导小组组长习近平今日（1月22日）下午主持召开中央全面深化改革领导小组第一次会议并发表重要讲话。他强调，全面深化改革，我们', '', '', '一线名师', '大专', '', '', '', '旅游', '0', 0, '', 0, 0, '', '', '', '', '改革领导小组第一次会议并发表重要讲话。他强调，全面深化改革，我们具备有利条件，具备实践基础，具备理论准备，也具备良好氛围，要把握大局、审时度势、统筹兼顾、科学实施，充分调动各方面积极性，坚定不移朝着改革领导小组第一次会议并发表重要讲话。他强调，全面深化改革，我们具备有利条件，具备实践基础，具备理论准备，也具备良好氛围，要把握大局、审时度势、统筹兼顾、科学实施，充分调动各方面积极性，坚定不移朝着', 1986, 11, 31, 0, 0, 'www.sasa.mingshi.so'),
(4, 2, 1, 0, 10, 150, '老师', '强项？', '幽默', '3654125@qq.com', '一级名师', '本科', '学校？', '体育', '米国', '篮球', '', 0, '', 0, 0, '', '', '', '', '这是一个来自米国的英文老师', 0, 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `ms_usertags`
--

CREATE TABLE IF NOT EXISTS `ms_usertags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` tinyint(10) unsigned NOT NULL COMMENT '用户id',
  `tid` tinyint(10) unsigned NOT NULL COMMENT '标签id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户标签表' AUTO_INCREMENT=77 ;

--
-- 导出表中的数据 `ms_usertags`
--

INSERT INTO `ms_usertags` (`id`, `uid`, `tid`) VALUES
(47, 1, 11),
(76, 5, 5),
(45, 1, 7),
(38, 1, 8),
(31, 1, 3),
(40, 1, 5),
(41, 1, 13),
(52, 3, 1),
(53, 3, 2),
(67, 5, 15),
(56, 5, 11),
(58, 21, 19),
(59, 21, 5),
(60, 21, 11),
(61, 5, 19),
(62, 21, 7),
(75, 5, 16),
(64, 5, 18),
(72, 5, 13),
(73, 5, 8),
(70, 5, 2);

-- --------------------------------------------------------

--
-- 表的结构 `ms_visit`
--

CREATE TABLE IF NOT EXISTS `ms_visit` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `v_time` varchar(10) NOT NULL,
  `vid` int(10) NOT NULL COMMENT '被访问者id',
  `uid` int(10) NOT NULL,
  `ip` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='最近访客表' AUTO_INCREMENT=36 ;

--
-- 导出表中的数据 `ms_visit`
--

INSERT INTO `ms_visit` (`id`, `v_time`, `vid`, `uid`, `ip`) VALUES
(1, '1395643623', 1, 3, '127.0.0.1'),
(2, '1388562462', 2, 3, '127.0.0.1'),
(3, '1388729134', 2, 1, '127.0.0.1'),
(4, '1390459378', 3, 1, '127.0.0.1'),
(5, '1388631308', 0, 1, '127.0.0.1'),
(6, '1388631412', 0, 1, '127.0.0.1'),
(7, '1388728841', 19, 1, '127.0.0.1'),
(8, '1388714332', 0, 1, '127.0.0.1'),
(9, '1388728289', 4, 1, '127.0.0.1'),
(10, '1388728311', 5, 1, '127.0.0.1'),
(11, '1388728860', 89, 1, '127.0.0.1'),
(12, '1388737658', 0, 1, '127.0.0.1'),
(13, '1388803009', 0, 3, '127.0.0.1'),
(14, '1389316380', 0, 1, '127.0.0.1'),
(15, '1389345042', 0, 1, '127.0.0.1'),
(16, '1390189503', 0, 1, '127.0.0.1'),
(17, '1390206786', 0, 1, '192.168.2.108'),
(18, '1390207116', 0, 1, '127.0.0.1'),
(19, '1395295470', 1, 5, '192.168.2.104'),
(20, '1390540462', 2, 5, '127.0.0.1'),
(21, '1395138815', 3, 5, '127.0.0.1'),
(22, '1390553106', 0, 5, '127.0.0.1'),
(23, '1393299767', 1, 21, '127.0.0.1'),
(24, '1395371797', 1, 20, '127.0.0.1'),
(25, '1394013725', 0, 5, '127.0.0.1'),
(26, '1394013735', 0, 5, '127.0.0.1'),
(27, '1394517922', 0, 5, '127.0.0.1'),
(28, '1394517928', 0, 5, '127.0.0.1'),
(29, '1395630590', 5, 20, '127.0.0.1'),
(30, '1395823405', 2, 20, '127.0.0.1'),
(31, '1394791307', 19, 5, '127.0.0.1'),
(32, '1394792533', 21, 5, '127.0.0.1'),
(33, '1394863736', 753, 5, '127.0.0.1'),
(34, '1395625039', 3, 20, '127.0.0.1'),
(35, '1395640027', 5, 3, '127.0.0.1');

-- --------------------------------------------------------

--
-- 表的结构 `ms_workexperience`
--

CREATE TABLE IF NOT EXISTS `ms_workexperience` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL,
  `company` varchar(32) NOT NULL,
  `content` varchar(32) NOT NULL,
  `start_time` varchar(32) NOT NULL,
  `end_time` varchar(32) CHARACTER SET utf8 COLLATE utf8_esperanto_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='工作经历' AUTO_INCREMENT=18 ;

--
-- 导出表中的数据 `ms_workexperience`
--

INSERT INTO `ms_workexperience` (`id`, `uid`, `company`, `content`, `start_time`, `end_time`) VALUES
(7, 1, '学而思', '发方法发发烦烦烦烦烦福福福福福福福福福', '2012年6月 ', '2012年6月 '),
(8, 1, '学而思', '哥哥哥哥高规格高规格哥哥哥哥哥哥哥哥', '2012年6月 ', '2012年6月 '),
(9, 1, '巨人', '授课教学生', '2012年6月 ', '2012年6月 '),
(17, 5, '敏思堂教育', '负责名师.SO的修改于再开发。', '2014年3月', '今'),
(16, 5, '高斯', '测试测试测试测试测试', '2012年8月', '2013年12月');

-- --------------------------------------------------------

--
-- 表的结构 `ms_yqm`
--

CREATE TABLE IF NOT EXISTS `ms_yqm` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `yqm_sn` varchar(6) NOT NULL COMMENT '邀请码',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '0未使用1使用过',
  `use_time` varchar(32) NOT NULL COMMENT '使用时间',
  `user_id` tinyint(10) unsigned NOT NULL COMMENT '使用用户id',
  PRIMARY KEY (`id`),
  UNIQUE KEY `yqm_sn` (`yqm_sn`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 PACK_KEYS=0 COMMENT='邀请码表' AUTO_INCREMENT=11 ;

--
-- 导出表中的数据 `ms_yqm`
--

INSERT INTO `ms_yqm` (`id`, `yqm_sn`, `status`, `use_time`, `user_id`) VALUES
(3, 'hkk61i', 0, '1395903690', 0),
(4, 'vltc7f', 0, '1395903690', 0),
(5, '8k0ip3', 0, '1395903690', 0),
(6, 'gvfhv1', 0, '1395903690', 0),
(7, 'gqnvfx', 0, '1395903690', 0),
(8, '11f8po', 0, '1395903690', 0),
(9, 'zfneh2', 0, '1395903690', 0);

-- --------------------------------------------------------

--
-- 表的结构 `ms_yueke`
--

CREATE TABLE IF NOT EXISTS `ms_yueke` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '约课状态0未审核1已审核2已结束',
  `uid` int(2) unsigned NOT NULL COMMENT '家长id',
  `tid` tinyint(2) unsigned NOT NULL COMMENT '受邀老师id',
  `tjid` varchar(20) NOT NULL DEFAULT '0' COMMENT '系统推荐名师列表',
  `class` varchar(32) NOT NULL COMMENT '孩子年级',
  `obj` varchar(32) NOT NULL COMMENT '科目',
  `phone` varchar(12) DEFAULT NULL COMMENT '手机号',
  `provinceId` varchar(32) NOT NULL COMMENT '省',
  `cityId` varchar(32) NOT NULL,
  `areaId` varchar(32) NOT NULL,
  `yueke_time` varchar(32) NOT NULL COMMENT '约课时间详细介绍',
  `budget` int(12) unsigned NOT NULL COMMENT '课酬预算',
  `ip` varchar(32) NOT NULL,
  `msg` text NOT NULL COMMENT '详细信息',
  `sex` tinyint(2) unsigned NOT NULL COMMENT '0女1男',
  `address` varchar(100) NOT NULL COMMENT '详细地址',
  `create_time` int(11) unsigned NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 导出表中的数据 `ms_yueke`
--

INSERT INTO `ms_yueke` (`id`, `status`, `uid`, `tid`, `tjid`, `class`, `obj`, `phone`, `provinceId`, `cityId`, `areaId`, `yueke_time`, `budget`, `ip`, `msg`, `sex`, `address`, `create_time`) VALUES
(1, 2, 20, 5, '0', '4', '3', '13510265419', '1', '4', '6', '周末的啊', 80, '2130706433', '及格万万岁~', 0, '具体地址再议', 1395287229),
(2, 1, 0, 0, '1,2', '4', '3', '13510265419', '1', '4', '6', '周末', 80, '2130706433', '及格万万岁~', 0, '具体地址再议', 1395287239),
(3, 0, 0, 0, '0', '8', '2', '15210651512', '1', '4', '6', '周末的吧', 150, '2130706433', '一定要及格啊~', 0, '自习室就好', 1395287326),
(4, 1, 20, 0, '1,2,5,3', '6', '3', '15210651512', '1', '7', '8', '周末', 80, '2130706433', '及格万万岁~', 0, '自习室', 1395311010),
(5, 1, 20, 3, '1,2,3', '5', '2', '15210651513', '1', '4', '6', '随意，最好周末', 250, '2130706433', '及格万万岁~', 0, '自习室上课', 1395368235),
(6, 0, 20, 0, '0', '8', '4', '1512651489', '1', '7', '8', '周末随时可以', 80, '2130706433', '及格万万岁的啊~', 0, '自习室', 1395369474);

-- --------------------------------------------------------

--
-- 表的结构 `ms_zan`
--

CREATE TABLE IF NOT EXISTS `ms_zan` (
  `zid` int(11) NOT NULL AUTO_INCREMENT COMMENT '本身id',
  `rid` int(11) unsigned DEFAULT NULL COMMENT '被赞的评论id',
  `aid` int(11) DEFAULT NULL COMMENT '被赞的文章id',
  `trid` int(2) unsigned NOT NULL COMMENT '被赞的theacher+review的id',
  `uid` int(11) NOT NULL COMMENT '谁赞的',
  `updown` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0是踩1是赞',
  `zan_time` int(20) NOT NULL,
  PRIMARY KEY (`zid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='赞-文章-评论' AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `ms_zan`
--

