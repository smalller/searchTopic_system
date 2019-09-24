/*
Navicat MySQL Data Transfer

Source Server         : tencent_cloud
Source Server Version : 50726
Source Host           : 129.28.125.151:3306
Source Database       : search_topic

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2019-09-12 18:54:45
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `topic`
-- ----------------------------
DROP TABLE IF EXISTS `topic`;
CREATE TABLE `topic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic` text NOT NULL COMMENT '题目',
  `name` varchar(30) NOT NULL,
  `telephone` char(11) NOT NULL,
  `time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of topic
-- ----------------------------
INSERT INTO `topic` VALUES ('7', '学生管理系统', 'admin', '14781828227', null);
INSERT INTO `topic` VALUES ('8', '记账管理系统', 'admin', '14781828227', '2019-09-07 20:53:06');
INSERT INTO `topic` VALUES ('9', '智能停车系统', 'admin', '14781828227', null);
INSERT INTO `topic` VALUES ('10', '基于单片机的潮汐灯设计', 'admin', '14781828227', null);
INSERT INTO `topic` VALUES ('11', '基于zigbee的智能家居设计与实现', 'admin', '14781828227', null);
INSERT INTO `topic` VALUES ('12', '基于物联网温度报警系统', 'admin', '14781828227', null);
INSERT INTO `topic` VALUES ('13', '基于物联网的温湿度管理系统', 'admin', '14781828227', null);
INSERT INTO `topic` VALUES ('14', '基于单片机的流水灯设计', 'admin', '14781828227', null);
INSERT INTO `topic` VALUES ('15', '食堂用餐管理系统', 'admin', '14781828227', null);
INSERT INTO `topic` VALUES ('16', '基于web的电子商城', 'admin', '14781828227', null);
INSERT INTO `topic` VALUES ('17', '学籍管理系统', 'admin', '14781828227', null);
INSERT INTO `topic` VALUES ('18', '基于Android的安防报警系统', 'admin', '14781828227', null);
INSERT INTO `topic` VALUES ('19', '基于物联网的窗帘控制设计与实现', 'admin', '14781828227', null);
INSERT INTO `topic` VALUES ('20', 'GPS定位的设计与实现', 'admin', '14781828227', null);
INSERT INTO `topic` VALUES ('21', '仓库温湿度设计与实现', 'admin', '14781828227', null);
INSERT INTO `topic` VALUES ('22', '基于单片机的远程监控火灾系统', 'admin', '14781828227', null);
INSERT INTO `topic` VALUES ('23', '电梯的自动控制', 'admin', '14781828227', null);
INSERT INTO `topic` VALUES ('24', '交通灯的监控设计与实现', 'admin', '14781828227', null);
INSERT INTO `topic` VALUES ('25', '数字显示电子秤的设计', 'admin', '14781828227', null);
INSERT INTO `topic` VALUES ('26', '超声波测距的设计与实现', 'admin', '14781828227', null);
INSERT INTO `topic` VALUES ('27', '数字显示金属探测器的设计', 'admin', '14781828227', '2019-09-07 20:58:43');
INSERT INTO `topic` VALUES ('32', '基于单片机的红外探测仪设计', 'admin', '14781828227', '2019-09-10 20:28:59');
INSERT INTO `topic` VALUES ('36', '基于zigbee的近距离无线通信设计', 'admin', '14781828227', null);

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL COMMENT '学号',
  `name` varchar(20) NOT NULL COMMENT '姓名',
  `password` varchar(30) NOT NULL,
  `class` varchar(20) NOT NULL COMMENT '级班',
  `profession` varchar(30) NOT NULL COMMENT '专业',
  `departments` varchar(30) NOT NULL COMMENT '系部',
  `telephone` char(11) NOT NULL,
  `topic` varchar(50) NOT NULL COMMENT '目题',
  `mentor` varchar(20) NOT NULL COMMENT '指导教师',
  `mentorNum` char(11) NOT NULL COMMENT '导师电话',
  `time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('19', '000000', 'admin', '123123', '000000', '000000', '000000', '0', '000000 : 基于Android的安防报警系统', '000000', '0', '2019-09-10 20:30:30');
INSERT INTO `user` VALUES ('20', '17203043', '吴福亮', '123123', '物联网17-3', '物联网应用技术', '电子工程系', '14781828227', '17203043 : 基于物联网的窗帘控制设计与实现', '王小勇', '13208393717', '2019-09-10 20:33:56');
