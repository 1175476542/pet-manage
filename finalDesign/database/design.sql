/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : design

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 10/12/2021 16:44:19
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for doorservice
-- ----------------------------
DROP TABLE IF EXISTS `doorservice`;
CREATE TABLE `doorservice`  (
  `visiting_service_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '上门服务订单id',
  `user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '主人姓名',
  `user_phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '用户电话',
  `pet_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '宠物名',
  `pet_age` int(3) NOT NULL COMMENT '宠物年龄',
  `pet_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '宠物类型',
  `service_details` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '宠物详情',
  `pet_varieties` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '宠物品种',
  `store_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '门店id',
  PRIMARY KEY (`visiting_service_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of doorservice
-- ----------------------------
INSERT INTO `doorservice` VALUES ('4F8jTh7yX33WxZO', '111', '111111111', 'petName', 1, '[', 'details', '\'', '111');
INSERT INTO `doorservice` VALUES ('PF5EMaNbm7CfGPz', '11', '11111111111', '11', 1, '猫', '阿斯顿', '美短', '1');
INSERT INTO `doorservice` VALUES ('E2i52pWFyddq21E', 'ds', '11111111111', '11', 1, '狗', 'sad ', '拉布拉多', 'sffa');

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods`  (
  `goods_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '商品id',
  `goods_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '商品名称',
  `goods_price` float(20, 2) NOT NULL COMMENT '商品价格',
  `goods_type` enum('衣物','食物','洗护用品') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '商品类型',
  `goods_img` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '商品图片',
  `goods_detail` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '商品详情',
  `store_manager_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '对应的商家店长名',
  PRIMARY KEY (`goods_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('Asvh7PlrXBqKeZq', '111', 3.00, '食物', 'static/image/goods/1.png', '111', 'cao');
INSERT INTO `goods` VALUES ('zxNco5R39d3ZMcl', '1111', 6.00, '衣物', 'static/image/goods/1.png', '1111', 'cao');
INSERT INTO `goods` VALUES ('nss59mIhSjiXcwF', '11', 3.00, '洗护用品', 'static/image/goods/1.png', '111', 'cao');
INSERT INTO `goods` VALUES ('sorpXlQFhTFs7Py', '121', 2.00, '衣物', 'static/image/goods/1.png', '111', 'cao');

-- ----------------------------
-- Table structure for stores
-- ----------------------------
DROP TABLE IF EXISTS `stores`;
CREATE TABLE `stores`  (
  `store_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '商店id',
  `store_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '商店名称',
  `store_detail` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '商店详情',
  `store_avatur` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '商店图路径',
  `user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '商店店长',
  `status` enum('0','1','2') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '受否审核通过；0：未通过，1：已通过，2：待审核',
  PRIMARY KEY (`user_name`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of stores
-- ----------------------------
INSERT INTO `stores` VALUES ('1', '陈龙1的商店', 'dasd', NULL, '陈龙1', '1');
INSERT INTO `stores` VALUES ('kLEDUN9pvY0ia7n', '11', '11', 'static/image/store/1.png', 'cao', '1');
INSERT INTO `stores` VALUES ('kLEDUN9pvY0ia4n', '陈龙的商店', '11', 'static/image/store/1.png', '陈龙', '1');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `user_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '用户id',
  `user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '用户名',
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '密码',
  `identity` enum('用户','店长','管理员') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '身份',
  `phone_num` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '手机号',
  `order_id` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '订单号',
  `visiting_id` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '上门服务订单号',
  `status` enum('审核中','审核失败','审核成功') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '审核状态',
  `is_first` enum('0','1') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '是否此一次注册。1：是，0：否',
  `store_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '对应商店id',
  PRIMARY KEY (`user_name`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('111111', '曹啸宇', 'a1111111', '管理员', '0', NULL, NULL, '审核成功', '0', NULL);
INSERT INTO `users` VALUES ('222222', '陈龙', 'a2222222', '店长', '0', NULL, NULL, '审核成功', '1', NULL);
INSERT INTO `users` VALUES ('333333', 'Sirius', 'a3333333', '用户', '0', NULL, NULL, '审核成功', '0', NULL);
INSERT INTO `users` VALUES ('vuua554y09', 'Potter', '11111111', '店长', '11111111111', NULL, NULL, '审核中', '0', NULL);
INSERT INTO `users` VALUES ('feezysztp4', '李冲', '11111111', '用户', '11111111111', NULL, NULL, '审核成功', '0', NULL);
INSERT INTO `users` VALUES ('h6gh8ic6xf', 'cao', '11111111', '店长', '11111111111', NULL, NULL, '审核成功', '0', NULL);
INSERT INTO `users` VALUES ('ESJg33KCc6gw58D', '陈龙1', 'a2222222', '店长', '11111111111', NULL, NULL, '审核成功', '0', NULL);

SET FOREIGN_KEY_CHECKS = 1;
