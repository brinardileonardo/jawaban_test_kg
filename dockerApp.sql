/*
 Navicat Premium Data Transfer

 Source Server         : Localhost docker
 Source Server Type    : MySQL
 Source Server Version : 50650
 Source Host           : 127.0.0.1:33061
 Source Schema         : dockerApp

 Target Server Type    : MySQL
 Target Server Version : 50650
 File Encoding         : 65001

 Date: 09/01/2021 03:00:16
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2021_01_08_070038_create_artikel_table', 2);
INSERT INTO `migrations` VALUES (4, '2021_01_08_110639_create_artikel_table_2', 3);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
INSERT INTO `password_resets` VALUES ('brinardileonardo@gmail.com', '$2y$10$WyRL0Y4sqyB7cabGjwM.Bu46lGXQ.81Mv9G092jFh7W7mJJatHV7S', '2021-01-07 18:39:41');

-- ----------------------------
-- Table structure for tbl_artikel
-- ----------------------------
DROP TABLE IF EXISTS `tbl_artikel`;
CREATE TABLE `tbl_artikel`  (
  `artikel_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `artikel_judul` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `artikel_body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` int(11) NOT NULL,
  `tanggal_publish` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `path_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_publish` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`artikel_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_artikel
-- ----------------------------
INSERT INTO `tbl_artikel` VALUES (2, 'Untuk Indonesia', 'Maju Untuk Indonesia Ok', 1, '2021-01-08 18:52:07', 'artikel_img/artikel_1610107294Biaya Keterlambatan.PNG', 0, 1);
INSERT INTO `tbl_artikel` VALUES (3, 'Menteri Indonesia', 'Menteri Maju dan dipilih oleh seleksi', 1, '2021-01-08 17:16:47', 'artikel_img/artikel_1610124837Biaya Keterlambatan.PNG', 1, 2);
INSERT INTO `tbl_artikel` VALUES (4, 'Indonesia Ku', 'Maju', 1, '2021-01-08 17:16:52', 'artikel_img/artikel_1610124980Biaya Keterlambatan.PNG', 0, 3);
INSERT INTO `tbl_artikel` VALUES (5, 'Ok', 'ok', 1, '2021-01-08 17:08:05', 'artikel_img/artikel_1610125685Biaya Keterlambatan.PNG', 0, 1);
INSERT INTO `tbl_artikel` VALUES (6, 'Artikel leo', 'leo sagiotaru', 2, '2021-01-08 19:12:06', 'artikel_img/artikel_1610133126Biaya Keterlambatan.PNG', 1, 2);

-- ----------------------------
-- Table structure for tbl_category
-- ----------------------------
DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE `tbl_category`  (
  `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `author_id` int(11) NULL DEFAULT NULL,
  `category_status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`category_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_category
-- ----------------------------
INSERT INTO `tbl_category` VALUES (1, 'Lifestyle', 1, 1);
INSERT INTO `tbl_category` VALUES (2, 'Sporty', 1, 1);
INSERT INTO `tbl_category` VALUES (3, 'Seleb', 1, 1);
INSERT INTO `tbl_category` VALUES (4, 'None', 1, 1);

-- ----------------------------
-- Table structure for tbl_status
-- ----------------------------
DROP TABLE IF EXISTS `tbl_status`;
CREATE TABLE `tbl_status`  (
  `status_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `status_code` int(10) NULL DEFAULT NULL,
  `status_value` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`status_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_status
-- ----------------------------
INSERT INTO `tbl_status` VALUES (1, 0, 'Unpublish');
INSERT INTO `tbl_status` VALUES (2, 1, 'Publish');
INSERT INTO `tbl_status` VALUES (3, 2, 'Deleted');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Brinardi', 'brinardileonardo@gmail.com', '$2y$10$tsx5rm09kTI2fsZ2m7NTE.GD2n2xMjr.Sqw6zw58aAQ/FfV4dpAq.', 'U43r1ZOFttjPQH7dR9MgukryJExjcJSXppkb2WBwVljJRGx9GCRYZPq98RrU', '2021-01-07 18:31:39', '2021-01-07 18:31:39');
INSERT INTO `users` VALUES (2, 'Leo', 'leonardo@yahoo.com', '$2y$10$P1SFIfmxVFjc.6BYnXpXP.ezMzNL0HWvcoweIj3440hpDyjKARiWS', NULL, '2021-01-08 19:11:30', '2021-01-08 19:11:30');

SET FOREIGN_KEY_CHECKS = 1;
