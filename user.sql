/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : search_topic

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-10-31 21:11:35
*/

SET FOREIGN_KEY_CHECKS=0;
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
  `content` text,
  `mentor` varchar(20) NOT NULL COMMENT '指导教师',
  `mentorNum` char(11) NOT NULL COMMENT '导师电话',
  `time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('19', '000000', 'admin', '123123', '000000', '000000', '000000', '0', '000000 : 基于Android的安防报警系统', null, '000000', '0', '2019-09-10 20:30:30');
INSERT INTO `user` VALUES ('20', '17203043', '吴福亮', '123123', '物联网17-3', '物联网应用技术', '电子工程系', '14781828227', '17203043 : 基于Android的安防报警系统', '1.设计一个基于Android平台的智能家居安防系统的总体设计方案,根据设计方案给出了软件的基本模块结构,然后对每个软件模块给出了具体实现。\r\n2.给出硬件实现电路图及软件程序\r\n3.论文要救思路清晰，结构合理，语言流畅，书写格式符合要求。', '王小勇', '13208393717', '2019-10-31 20:27:48');
INSERT INTO `user` VALUES ('26', '17203055', '王菲', '123123', '物联网17-3', '物联网应用技术', '电子工程系', '44444444444', '17203055 : 学籍管理系统', '1.利用VisualFoxPro实现了学籍系统后台数据库的建立和前端界面的开发，包括个人信息管理、成绩管理、统计查询管理和用户系统管理等，实现了相关信息的增加、删除、查询和修改等功能。\r\n2.给出硬件实现电路图及软件程序\r\n3.论文要救思路清晰，结构合理，语言流畅，书写格式符合要求。', '王小勇', '13208393717', '2019-10-31 20:38:44');
INSERT INTO `user` VALUES ('27', '17203011', '李四', '123123', '物联网17-3', '物联网应用技术', '电子工程系', '11111111111', '17203011 : 基于物联网温度控制系统', '1.采用箔电阻、精密电阻及电位器组成测量电桥作为温度传感器，要求温度测量范围为0℃-100℃；\r\n2.要求温度超过40摄氏度时报警；\r\n3.当检测温度超过设定上限值时，发出蜂鸣器报警声，要求报警声喃喃间断发声，频率约1Hz；\r\n4.论文要救思路清晰，结构合理，语言流畅，书写格式符合要求。', '王小勇', '13208393717', '2019-10-31 21:06:09');
