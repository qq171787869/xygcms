/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : xygcms

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-06-13 06:39:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `xyg_admin`
-- ----------------------------
DROP TABLE IF EXISTS `xyg_admin`;
CREATE TABLE `xyg_admin` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `userpass` varchar(32) NOT NULL,
  `level` tinyint(1) unsigned NOT NULL DEFAULT '9',
  `bindtypeid` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of xyg_admin
-- ----------------------------
INSERT INTO `xyg_admin` VALUES ('1', 'admin', 'ea718de5b8a4f326e382438eb015a1c2', '1', '');

-- ----------------------------
-- Table structure for `xyg_article`
-- ----------------------------
DROP TABLE IF EXISTS `xyg_article`;
CREATE TABLE `xyg_article` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `typeid` tinyint(3) unsigned NOT NULL,
  `title` varchar(150) NOT NULL,
  `litpic` varchar(150) DEFAULT NULL,
  `tags` varchar(150) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `body` text,
  `author` varchar(30) DEFAULT NULL,
  `click` mediumint(8) unsigned DEFAULT '0',
  `url` varchar(30) DEFAULT NULL,
  `pubdate` int(10) unsigned NOT NULL,
  `istop` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of xyg_article
-- ----------------------------

-- ----------------------------
-- Table structure for `xyg_config`
-- ----------------------------
DROP TABLE IF EXISTS `xyg_config`;
CREATE TABLE `xyg_config` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `field` varchar(100) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of xyg_config
-- ----------------------------
INSERT INTO `xyg_config` VALUES ('1', '网站名称', 'name', 'JJCMS 3.3.2轻量版');
INSERT INTO `xyg_config` VALUES ('2', 'CMS目录', 'cmsurl', '/');
INSERT INTO `xyg_config` VALUES ('3', '网站关键字', 'keywords', '菜的抠吊');
INSERT INTO `xyg_config` VALUES ('4', '网站描述词', 'description', '第一次嫖让你长大了；第N次嫖让你成熟了，你懂我说的意思吗？蠢货！');
INSERT INTO `xyg_config` VALUES ('5', '网站版权', 'copyright', '© 版权所有2018 - 2020 小乙哥的博客 基于tinkphp5+layui框架搭建 QQ:171787869');
INSERT INTO `xyg_config` VALUES ('6', '备案号', 'beian', '鲁ICP10086号');
INSERT INTO `xyg_config` VALUES ('7', '网站域名', 'domain', 'http://xygcms.demo.com');
INSERT INTO `xyg_config` VALUES ('8', '列表页数量', 'row', '20');
INSERT INTO `xyg_config` VALUES ('11', '内页初始点击数', 'click', '5000,10000');
INSERT INTO `xyg_config` VALUES ('12', '文章作者', 'author', '小乙哥');
INSERT INTO `xyg_config` VALUES ('13', '版本号', 'version', '3.3.2');

-- ----------------------------
-- Table structure for `xyg_film`
-- ----------------------------
DROP TABLE IF EXISTS `xyg_film`;
CREATE TABLE `xyg_film` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `typeid` tinyint(3) unsigned NOT NULL,
  `title` varchar(120) NOT NULL,
  `poster` varchar(100) DEFAULT NULL,
  `year` varchar(20) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `director` varchar(100) DEFAULT NULL,
  `performer` text,
  `body` text,
  `url` varchar(120) DEFAULT NULL,
  `ftp` varchar(255) DEFAULT NULL,
  `magnet` varchar(255) DEFAULT NULL,
  `click` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `istop` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of xyg_film
-- ----------------------------
INSERT INTO `xyg_film` VALUES ('1', '1', '2016年惊悚喜剧《犯罪女王》HD国语中字', 'http://www.imageto.org/images/nQsdm.jpg', '2016', '喜剧,惊悚 ', '韩国', '李耀燮', '朴智英,赵福来,李絮,白秀长,金大铉', '米卿有个包含她希望和梦想化身的儿子益秀，一天接到他的电话，益秀告诉她，他参加考试住宿处的水费从便宜的价格上涨到甚至超过可怕的1000美元。她决定去儿子的住处一探究竟。当她到了那儿，发现住在那里的其他人都很可疑和冷漠。她寻找荒谬水费的背后原因过程中，与管理处员工开泰结为好友。米卿很快意识到她正被卷入一个巨大的问题之中。', 'asdsad', 'ftp://ygdy8:ygdy8@yg45.dydytt.net:7221/阳光电影www.ygdy8.com.犯罪女王.HD.720p.韩语中字.mkv', 'magnet:?xt=urn:btih:a428e0ee8b6b14e949a8589a3da579ef4ec2f11b', '12321', '0', '1');
INSERT INTO `xyg_film` VALUES ('2', '1', '123123213', '', '', '', '', '', '', '', '', '', '', '7020', '0', '1');

-- ----------------------------
-- Table structure for `xyg_image`
-- ----------------------------
DROP TABLE IF EXISTS `xyg_image`;
CREATE TABLE `xyg_image` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(9) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of xyg_image
-- ----------------------------

-- ----------------------------
-- Table structure for `xyg_link`
-- ----------------------------
DROP TABLE IF EXISTS `xyg_link`;
CREATE TABLE `xyg_link` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `time` int(10) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of xyg_link
-- ----------------------------
INSERT INTO `xyg_link` VALUES ('5', '假货宝', 'http://www.taobao.com', '1527103151', '');
INSERT INTO `xyg_link` VALUES ('6', '二手东', 'http://www.jd.com', '1527103151', '');
INSERT INTO `xyg_link` VALUES ('7', '腾讯', 'http://www.baidu.com', '1527103151', '');
INSERT INTO `xyg_link` VALUES ('8', '新浪', 'http://www.sina.com', '1528364056', '');
INSERT INTO `xyg_link` VALUES ('9', '百度', 'http://www.baidu.com', '1528364191', '171787869@qq.com');

-- ----------------------------
-- Table structure for `xyg_soft`
-- ----------------------------
DROP TABLE IF EXISTS `xyg_soft`;
CREATE TABLE `xyg_soft` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of xyg_soft
-- ----------------------------

-- ----------------------------
-- Table structure for `xyg_type`
-- ----------------------------
DROP TABLE IF EXISTS `xyg_type`;
CREATE TABLE `xyg_type` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `pid` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `model` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `name` varchar(120) NOT NULL,
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `row` tinyint(3) unsigned NOT NULL DEFAULT '10',
  `litpic` varchar(100) DEFAULT NULL,
  `url` varchar(30) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `content` text,
  `listtpl` varchar(20) NOT NULL DEFAULT 'lists',
  `itemtpl` varchar(20) NOT NULL DEFAULT 'items',
  `level` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of xyg_type
-- ----------------------------
INSERT INTO `xyg_type` VALUES ('1', '0', '3', '国内电影', '0', '20', '', 'guonei', '', '', '', 'list_film', 'item_film', '0', '1');
INSERT INTO `xyg_type` VALUES ('2', '0', '3', '欧美电影', '0', '20', '', 'oumei', '', '', '', 'list_film', 'item_film', '0', '1');
INSERT INTO `xyg_type` VALUES ('3', '0', '3', '日韩电影', '0', '20', '', 'rihan', '', '', '', 'list_film', 'item_film', '0', '1');
INSERT INTO `xyg_type` VALUES ('4', '0', '1', '文章栏目', '0', '20', '', '', '', '', '', 'list_article', 'item_article', '0', '1');

-- ----------------------------
-- Table structure for `xyg_user`
-- ----------------------------
DROP TABLE IF EXISTS `xyg_user`;
CREATE TABLE `xyg_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `userpass` varchar(32) NOT NULL,
  `key` varchar(32) NOT NULL,
  `point` int(11) unsigned NOT NULL DEFAULT '0',
  `money` int(10) unsigned NOT NULL DEFAULT '0',
  `lastlogin` int(10) unsigned NOT NULL,
  `regdate` int(10) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of xyg_user
-- ----------------------------
INSERT INTO `xyg_user` VALUES ('1', '171787869@qq.com', 'e913266404f6a8adc57e1801f4828a31', 'cd340f3afffbdf4872700d94e0d2d86a', '0', '0', '1528826215', '1528826215', '1');
INSERT INTO `xyg_user` VALUES ('2', '1717878692@qq.com', 'ea718de5b8a4f326e382438eb015a1c2', '2ae6e2e9a4649c3c1d1dab84bedb2079', '0', '0', '1528826789', '1528826789', '1');
