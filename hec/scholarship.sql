/*
MySQL Data Transfer
Source Host: localhost
Source Database: scholarship
Target Host: localhost
Target Database: scholarship
Date: 11/2/2011 3:47:32 PM
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for notice
-- ----------------------------
DROP TABLE IF EXISTS `scholarship`;
CREATE TABLE `scholarship` (
  `nid` decimal(4,0) NOT NULL default '0',
  `title` text,
  `notice` text,
  `sdate` date default NULL,
  `edate` date default NULL,
  `status` tinyint(1) default NULL,
  `url` varchar(200) default NULL,
  `target` varchar(15) NOT NULL,
  `entered_by` varchar(50) NOT NULL,
  `enterydate` date default NULL,
  `entry_time` varchar(5) NOT NULL,
  `approved` tinyint(4) NOT NULL,
  PRIMARY KEY  (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `uid` decimal(2,0) NOT NULL default '0',
  `user_name` varchar(25) default NULL,
  `password` varchar(25) default NULL,
  `role` varchar(255) default NULL,
  PRIMARY KEY  (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `scholarship` VALUES ('1', 'Faculty Development ~ Austraila: PhD Scholarship at Centre for Applied Informatics, Victoria University', '<p><span>Applied Informatics Research Centre at Victora University (Melbourne, Australia) is offeringa PhD Scholarship in ontext of a project on physiological time series data processing. The visa required for PhD study is IELTS with an overall score of 605 in Academic module iwh a minimum score of 6.0 in each module. It involves the cooperation with the industry partner in Brisbane, Australia (Valued 46,000A$ per year inculding 20,000 A$ tuition fee for three years.</span></p>', '2011-09-23', '2011-12-03', '1', 'http://www.scholarship-positions.com', '_blank', 'admin', '2011-11-01', '1607', '1');
INSERT INTO `scholarship` VALUES ('2', 'Faculty Development - Germany: PhD Position Wireless Sensor Networks', '<p><span>Wireless Sensor Networks is associated&nbsp;to the Multimedia Communications Lab KOM (<a href=\"&quot;\\&quot;\\\\&quot;\\\\\\\\&quot;http:/www.kom.tu-darmstadt.de\\\\\\\\&quot;\\\\&quot;\\&quot;&quot;\">WWW.kom.tu-darmstadt.de</a>) and to the Research Cluster <a href=\"&quot;\\&quot;\\\\&quot;\\\\\\\\&quot;http:/www.cocoon.tu-darmstadt.de/cocoon/\\\\\\\\&quot;\\\\&quot;\\&quot;&quot;\">www.cocoon.tu-darmstadt.de/cocoon/</a>. The holder of this PhD postiton will perform research in the field of wireless sensor networks. The design and Evaluation of a generic methodology for the analysis of the performance analysis of wirless sensor network protocols; novel techniques for inspecting and debugging distributed sensible systmes; energy-efficient, adaptive data collection protocols integration and intelligent control of sensors and actuators in a distributed environment.</span></p>', '2011-09-23', '2011-12-30', '1', 'http://www.scholarships-Links.com', '_blank', 'admin', '2011-11-01', '1607', '1');
INSERT INTO `scholarship` VALUES ('4', 'Faculty Development ~ - Luxembourg: PhD Student (Service Innovation)', '<p><span>It makes a team responsible for Service Innovation procession and their definition, and it will be involved in research</span></p>\r\n<p><span>Must be a Msc or similar in information systems, management or computer science. Some initial experience industry and /or research projects is a plus.</span></p>\r\n<p><span>It will make you interesting in working in a highly dynamic and multi cultural environment and to make a difference.</span></p>\r\n<p><span>Solid background in computer science, management science or informatics.</span></p>', '2011-09-23', '2011-12-17', '1', 'http://www.scholarship-positions.com', '_blank', 'admin', '2011-11-01', '1607', '1');
INSERT INTO `scholarship` VALUES ('6', 'Faculty Development ~ Sweden: PhD Students in Energy Technology', '<p>The division of Energy Engineering at Lulea University of Technology, Sweden, has a position for a doctoral student for the development of a new technology based on ionic liquids to separation CO2 from synthetic gas. The position is financed by Interreg Nord.</p>\r\n<p><span>PhD candidates with a degree of Master of Science in Engineering preferably with a strong interest and/or experience on thermodynamics both of modeling and experimental measurements. it should be a good team player and have an ability to take initiative.<strong><br /></strong></span></p>', '2011-09-29', '2011-12-24', '1', 'http://www.scholarships-Links.com', '_blank', 'admin', '2011-11-01', '1607', '1');
INSERT INTO `scholarship` VALUES ('3', 'Faculty Development ~ Luxembourg: 2 PhD Students (Enterprise Architecture)', '<p><span>2 PhD Students (Enterprise Architecture). </span></p>\r\n<p><span>It makes a team responsible for Enterprise Architecture methodologies and definition, as well as the architecture coordination of enterprise transformations, and the student will be involoved in topics which are in the line wiht these themes.</span></p>\r\n<p><span>Must be a Msc or similar in information systems, management or computer science. Some initial experience industry and /or research projects is a plus.</span></p>\r\n<p><span>It will make you interesting in working in a highly dynamic and multi cultural environment and to make a difference.</span></p>\r\n<p><span>Solid background in computer science, management science or informatics.</span></p>\r\n<p><span><br /></span></p>', '2011-09-23', '2011-12-06', '1', 'http://www.scholarship-positions.com', '_blank', 'admin', '2011-11-01', '1607', '1');
INSERT INTO `scholarship` VALUES ('5', 'Faculty Development ~ Italy: 25 PhD Scholarhsips at Free University of Bozen, Bolzano', '<p><span>Application Forms for admission to the public Competition for PhD Programmes are as under:-</span></p>\r\n<p><span>PhD Programme in General Pedagogy, Social Pedagogy and General Education</span></p>\r\n<p><span>PhD Programme in Computer Science</span></p>\r\n<p><span>PhD Programme in Management of Mountain Environment</span></p>\r\n<p><span>PhD Programme in Energy and Technologies.<br /></span></p>', '2011-09-27', '2011-12-23', '1', 'http://www.scholarships-Links.com', '_blank', 'admin', '2011-11-01', '1607', '1');
INSERT INTO `users` VALUES ('1', 'admin', 'admin', 'admin');
INSERT INTO `users` VALUES ('2', 'exam', 'exam_2135', 'admin');
