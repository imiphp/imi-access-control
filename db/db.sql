/*
 Navicat Premium Data Transfer

 Source Server         : 127.0.0.1_3306
 Source Server Type    : MySQL
 Source Server Version : 50553
 Source Host           : 127.0.0.1:3306
 Source Schema         : db_imi_access_control

 Target Server Type    : MySQL
 Target Server Version : 50553
 File Encoding         : 65001

 Date: 23/10/2019 15:08:36
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ac_member_operation_relation
-- ----------------------------
DROP TABLE IF EXISTS `ac_member_operation_relation`;
CREATE TABLE `ac_member_operation_relation`  (
  `member_id` int(10) UNSIGNED NOT NULL COMMENT '用户ID',
  `operation_id` int(10) UNSIGNED NOT NULL COMMENT '操作ID',
  PRIMARY KEY (`member_id`, `operation_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ac_member_role_relation
-- ----------------------------
DROP TABLE IF EXISTS `ac_member_role_relation`;
CREATE TABLE `ac_member_role_relation`  (
  `member_id` int(10) UNSIGNED NOT NULL COMMENT '用户ID',
  `role_id` int(10) UNSIGNED NOT NULL COMMENT '角色ID',
  PRIMARY KEY (`member_id`, `role_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ac_operation
-- ----------------------------
DROP TABLE IF EXISTS `ac_operation`;
CREATE TABLE `ac_operation`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '父级ID，顶级为0',
  `type` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '类型，默认0',
  `index` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '排序，越小越靠前',
  `code` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '操作代码',
  `name` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '操作名称',
  `title` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '菜单名称',
  `icon` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '字体图标',
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '操作介绍',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `code`(`code`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 37 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ac_role
-- ----------------------------
DROP TABLE IF EXISTS `ac_role`;
CREATE TABLE `ac_role`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '角色代码',
  `name` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '角色名称',
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '角色介绍',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `code`(`code`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ac_role_operation_relation
-- ----------------------------
DROP TABLE IF EXISTS `ac_role_operation_relation`;
CREATE TABLE `ac_role_operation_relation`  (
  `role_id` int(10) UNSIGNED NOT NULL COMMENT '角色ID',
  `operation_id` int(10) UNSIGNED NOT NULL COMMENT '操作ID',
  PRIMARY KEY (`role_id`, `operation_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
