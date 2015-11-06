/*
 Navicat Premium Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 50624
 Source Host           : localhost
 Source Database       : btlltct

 Target Server Type    : MySQL
 Target Server Version : 50624
 File Encoding         : utf-8

 Date: 11/06/2015 23:39:58 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `images`
-- ----------------------------
DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `images_path_unique` (`path`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `images`
-- ----------------------------
BEGIN;
INSERT INTO `images` VALUES ('4', 'upload/albums/151106163426000000563cd6929d69b/phpQKkqYn563cd6929de6f.jpg', '5', '2015-11-06 16:34:26', '2015-11-06 16:34:26'), ('5', 'upload/albums/151106163502000000563cd6b6058bb/phplYqXBK563cd6b605e9a.jpeg', '7', '2015-11-06 16:35:02', '2015-11-06 16:35:02'), ('6', 'upload/albums/151106163514000000563cd6c2bff96/phpFtLTco563cd6c2c0639.jpeg', '8', '2015-11-06 16:35:14', '2015-11-06 16:35:14');
COMMIT;

-- ----------------------------
--  Table structure for `mst_categories`
-- ----------------------------
DROP TABLE IF EXISTS `mst_categories`;
CREATE TABLE `mst_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `p_id` int(10) unsigned DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `mst_categories`
-- ----------------------------
BEGIN;
INSERT INTO `mst_categories` VALUES ('1', 'Category 1', '0000-00-00 00:00:00', '2015-10-17 12:22:24', '0', ''), ('2', 'Category 2', '2015-10-17 12:30:38', '2015-10-17 12:30:38', '1', ''), ('3', 'Category 3', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', 'animals'), ('6', 'Category 4', '2015-10-23 14:15:01', '2015-10-23 14:42:57', '3', 'aaaa');
COMMIT;

-- ----------------------------
--  Table structure for `mst_users`
-- ----------------------------
DROP TABLE IF EXISTS `mst_users`;
CREATE TABLE `mst_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'upload/avatar/default/default-avatar.jpg',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mst_users_account_unique` (`account`),
  UNIQUE KEY `mst_users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `mst_users`
-- ----------------------------
BEGIN;
INSERT INTO `mst_users` VALUES ('9', '', '12345678', 'admin123', 'Admin Name', 'Address ', '1234567668', 'admin@gmail.com', '1', '2015-10-13 04:16:46', '2015-10-17 12:25:33'), ('10', '', '123456', 'daonhat123', 'daonhat', 'sdfsadfsdaf', '34234234', 'sdfsdf', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('11', 'upload/avatar/151025191901000000562d2b25db5ab/php653C.tmp562d2b25db5ab.jpg', '123456', 'daonhat', 'daonhat1', 'sfsdfsdf', '34234', 'daonhat1234@gmail.com', '0', '2015-10-25 19:19:01', '2015-10-25 19:19:01'), ('13', 'upload/avatar/default/default-avatar.jpg', '123456', 'daonhat12', 'nhất đào', 'sdfsadfasdf', '234234234', 'dinhanh2212@gmail.com', '1', '2015-10-25 19:39:16', '2015-10-25 19:39:16'), ('14', 'upload/avatar/default/default-avatar.jpg', '123456', 'usertest1', 'User Test 1', 'ASDFAS', '1234567', 'usertest1@gmail.com', '1', '2015-10-26 04:52:03', '2015-10-26 04:52:03'), ('15', 'upload/avatar/default/default-avatar.jpg', '123456', 'usertest2', 'User Test 2', 'dfsdf', '1234567', 'usertest2@gmail.com', '0', '2015-10-26 05:12:48', '2015-10-26 05:12:48');
COMMIT;

-- ----------------------------
--  Table structure for `notifications`
-- ----------------------------
DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `notifications`
-- ----------------------------
BEGIN;
INSERT INTO `notifications` VALUES ('1', '10', '2015-10-25 19:14:17', '2015-10-25 19:14:17'), ('2', '11', '2015-10-25 19:19:02', '2015-10-25 19:19:02'), ('3', '12', '2015-10-25 19:35:05', '2015-10-25 19:35:05'), ('4', '13', '2015-10-25 19:39:16', '2015-10-25 19:39:16');
COMMIT;

-- ----------------------------
--  Table structure for `products`
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `expired_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `public` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf32;

-- ----------------------------
--  Records of `products`
-- ----------------------------
BEGIN;
INSERT INTO `products` VALUES ('5', '14', '1', 'ban ghe', 'ban ghe', '2015-11-06 16:32:48', '2015-11-06 16:32:48', '0000-00-00 00:00:00', '1'), ('7', '14', '2', 'dien thoai', '', '2015-11-06 16:35:02', '2015-11-06 16:35:02', '0000-00-00 00:00:00', '1'), ('8', '14', '3', 'quan ao', '', '2015-11-06 16:35:14', '2015-11-06 16:35:14', '0000-00-00 00:00:00', '1');
COMMIT;

-- ----------------------------
--  Table structure for `relations`
-- ----------------------------
DROP TABLE IF EXISTS `relations`;
CREATE TABLE `relations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user1_id` int(10) unsigned NOT NULL,
  `user2_id` int(10) NOT NULL,
  `r_type` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

SET FOREIGN_KEY_CHECKS = 1;
