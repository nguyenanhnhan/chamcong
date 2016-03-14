/*
 Navicat Premium Data Transfer

 Source Server         : Navi Cloud
 Source Server Type    : MySQL
 Source Server Version : 50505
 Source Host           : localhost
 Source Database       : chamcong

 Target Server Type    : MySQL
 Target Server Version : 50505
 File Encoding         : utf-8

 Date: 03/14/2016 14:02:23 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `groups`
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `groups`
-- ----------------------------
BEGIN;
INSERT INTO `groups` VALUES ('1', 'admin', 'Administrator'), ('2', 'members', 'General User');
COMMIT;

-- ----------------------------
--  Table structure for `login_attempts`
-- ----------------------------
DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `ip_access` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', '127.0.0.1', 'administrator', '$2y$08$AXOvmFbrc8To3KTP6zhWS.EFE48WuMrNI3A3JNGV26wb/nGksKi8O', '', 'admin@admin.com', '', null, null, null, '1268889823', '1457937078', '1', 'Admin', 'istrator', 'ADMIN', '0', '10.11.22.54'), ('5', '127.0.0.1', null, '$2y$08$Rr4fKdaF.XjSSMet0ypsbu0Adp3DznwYlioPpA00aQ1hnc9/FKPVu', null, 'nguyenanhnhan@vanlanguni.edu.vn', null, null, null, null, '1457936874', '1457937055', '1', 'Nguyễn Ảnh', 'Nhân', null, null, '10.11.22.54');
COMMIT;

-- ----------------------------
--  Table structure for `users_groups`
-- ----------------------------
DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `users_groups`
-- ----------------------------
BEGIN;
INSERT INTO `users_groups` VALUES ('1', '1', '1'), ('2', '1', '2'), ('6', '5', '2');
COMMIT;

-- ----------------------------
--  Table structure for `work_time`
-- ----------------------------
DROP TABLE IF EXISTS `work_time`;
CREATE TABLE `work_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `work_date` int(11) DEFAULT NULL,
  `note` varchar(500) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_date` int(11) DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `work_time`
-- ----------------------------
BEGIN;
INSERT INTO `work_time` VALUES ('12', '1', '1457889985', '', 'Admin istrator', '1457889985', null, null), ('13', '5', '1457937059', '', 'Nguyen Anh Nhan', '1457937059', null, null);
COMMIT;

-- ----------------------------
--  Table structure for `work_time_detail`
-- ----------------------------
DROP TABLE IF EXISTS `work_time_detail`;
CREATE TABLE `work_time_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `work_time_id` int(11) DEFAULT NULL,
  `check_in` int(11) DEFAULT NULL,
  `check_out` int(11) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_date` int(11) DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `work_time_detail`
-- ----------------------------
BEGIN;
INSERT INTO `work_time_detail` VALUES ('1', '12', '1457889985', '1457892082', 'Admin istrator', '1457889985', 'Admin istrator', '1457892082'), ('2', '12', '1457892069', '1457892082', 'Admin istrator', '1457892069', 'Admin istrator', '1457892082'), ('3', '12', '1457892421', '1457892482', 'Admin istrator', '1457892421', 'Admin istrator', '1457892482'), ('4', '12', '1457893660', '1457894921', 'Admin istrator', '1457893660', 'Admin istrator', '1457894921'), ('5', '13', '1457937059', null, 'Nguyen Anh Nhan', '1457937059', null, null);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
