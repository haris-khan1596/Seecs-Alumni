# MySQL-Front 3.1  (Build 14.14)


# Host: localhost    Database: alumni
# ------------------------------------------------------
# Server version 3.23.47-nt

DROP DATABASE IF EXISTS `alumni`;

CREATE DATABASE `alumni`;
USE `alumni`;

#
# Table structure for table academic_detail
#

CREATE TABLE `academic_detail` (
  `autonum` int(4) NOT NULL default '0',
  `user_id` bigint(20) NOT NULL default '0',
  `degree` varchar(50) default NULL,
  `degree_equal` varchar(20) default NULL,
  `duration_from` date default NULL,
  `duration_to` date default NULL,
  `gpa` varchar(5) default NULL,
  `major` varchar(30) default NULL,
  `university` varchar(100) default NULL
) TYPE=MyISAM;

#
# Dumping data for table academic_detail
#

INSERT INTO `academic_detail` VALUES (1,0,'MIT','Masters','1/1/2001','1/1/2003','70%','E-Commerce','MIU');
INSERT INTO `academic_detail` VALUES (2,0,'B.Com','Bachelors','1/1/1998','1/1/2000','58%','Commerce','PU');
INSERT INTO `academic_detail` VALUES (3,0,'BIT','Bachelors','12/1/2005','12/1/2006','3.5','IT','NUST');
INSERT INTO `academic_detail` VALUES (4,0,'MIT','Masters','12/1/2005','12/1/2006','3.9','EE','NUST');
INSERT INTO `academic_detail` VALUES (5,1,'MIT','Masters','12/1/2005','12/1/2006','70%','IT','MIU');

#
# Table structure for table admin_users
#

CREATE TABLE `admin_users` (
  `autonum` int(4) NOT NULL default '0',
  `email` varchar(100) NOT NULL default '',
  `user_name` varchar(50) NOT NULL default '',
  `password` varchar(50) NOT NULL default '',
  `role` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`email`)
) TYPE=MyISAM;

#
# Dumping data for table admin_users
#

INSERT INTO `admin_users` VALUES (1,'adnan','adnan','adnan',1);
INSERT INTO `admin_users` VALUES (2,'rehan','rehan','rehan',1);
INSERT INTO `admin_users` VALUES (3,'ali','ali','alii',1);

#
# Table structure for table alumni_users
#

CREATE TABLE `alumni_users` (
  `user_id` bigint(9) NOT NULL default '0',
  `user_name` varchar(50) NOT NULL default '',
  `password` varchar(50) NOT NULL default '',
  `role` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `username` (`user_id`,`user_name`)
) TYPE=MyISAM;

#
# Dumping data for table alumni_users
#

INSERT INTO `alumni_users` VALUES (1,'adnan','adnan',1);
INSERT INTO `alumni_users` VALUES (3,'2222-NUST-BIT-2-3333','1234',1);
INSERT INTO `alumni_users` VALUES (2,'2003-NUST-BIT-2-0699','123456',1);
INSERT INTO `alumni_users` VALUES (4,'2003-NUST-BIT-5555','1234',1);
INSERT INTO `alumni_users` VALUES (5,'2005-NUST-MS(IT)-2222','2222',1);
INSERT INTO `alumni_users` VALUES (6,'2004-NUST-PGD(IT)-1111','222',1);
INSERT INTO `alumni_users` VALUES (7,'2004-NUST-BIT-1234','123',1);

#
# Table structure for table class_all
#

CREATE TABLE `class_all` (
  `class_id` int(6) unsigned NOT NULL auto_increment,
  `class_name` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`class_id`)
) TYPE=MyISAM;

#
# Dumping data for table class_all
#

INSERT INTO `class_all` VALUES (1,'BIT');
INSERT INTO `class_all` VALUES (2,'MS(IT)');
INSERT INTO `class_all` VALUES (3,'PGD(IT)');

#
# Table structure for table emp_detail
#

CREATE TABLE `emp_detail` (
  `autonum` int(4) NOT NULL default '0',
  `user_id` bigint(20) NOT NULL default '0',
  `name_org` varchar(100) NOT NULL default '',
  `designation` varchar(50) NOT NULL default '',
  `duration_from` date NOT NULL default '0000-00-00',
  `duration_to` date NOT NULL default '0000-00-00',
  `location` varchar(50) NOT NULL default ''
) TYPE=MyISAM;

#
# Dumping data for table emp_detail
#

INSERT INTO `emp_detail` VALUES (1,0,'NUST','Webmaster','3/1/2005','10/1/2005','Rawalpindi');
INSERT INTO `emp_detail` VALUES (2,0,'Digital Dominance','Software Engineer','10/1/2004','10/1/2005','Rawalpindi');
INSERT INTO `emp_detail` VALUES (3,0,'Telenor','Software Engineer','12/1/2005','12/1/2006','islamabad');
INSERT INTO `emp_detail` VALUES (4,0,'islamabad','dba','12/1/2005','12/1/2006','islamabad');
INSERT INTO `emp_detail` VALUES (5,1,'cns','Software Engineer','12/1/2005','12/1/2006','islamabad');

#
# Table structure for table event_calendar
#

CREATE TABLE `event_calendar` (
  `id` decimal(3,0) NOT NULL default '0',
  `edate` date default NULL,
  `txt` char(200) default NULL,
  `url` char(200) default NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

#
# Dumping data for table event_calendar
#

INSERT INTO `event_calendar` VALUES (1,'1/1/2007','New Year event for NIIT Alumni','');

#
# Table structure for table notice
#

CREATE TABLE `notice` (
  `nid` decimal(2,0) NOT NULL default '0',
  `notice` char(200) default NULL,
  `sdate` date default NULL,
  `edate` date default NULL,
  `status` tinyint(1) default NULL,
  `detail` tinyint(1) default NULL,
  `url` char(200) default NULL,
  PRIMARY KEY  (`nid`)
) TYPE=MyISAM;

#
# Dumping data for table notice
#

INSERT INTO `notice` VALUES (1,'test notice for alumni members','12/30/2006','12/30/2007',1,1,'2222');

#
# Table structure for table personal_data
#

CREATE TABLE `personal_data` (
  `autonum` int(4) NOT NULL default '0',
  `user_id` bigint(20) NOT NULL default '0',
  `reg1` varchar(5) NOT NULL default '',
  `reg2` varchar(5) NOT NULL default '',
  `reg3` int(4) NOT NULL default '0',
  `reg4` varchar(5) NOT NULL default '',
  `name` varchar(50) NOT NULL default '',
  `fname` varchar(50) NOT NULL default '',
  `dob` date default NULL,
  `gender` varchar(6) NOT NULL default '',
  `nationality_b` varchar(100) NOT NULL default '',
  `nationality_p` varchar(100) NOT NULL default '',
  `marital_status` varchar(10) default NULL,
  `year_passing_niit` varchar(5) NOT NULL default '',
  `last_degree_niit` varchar(20) NOT NULL default '',
  `nic1` varchar(5) NOT NULL default '',
  `nic2` varchar(7) NOT NULL default '',
  `nic3` char(1) NOT NULL default '',
  `status` varchar(15) NOT NULL default '',
  `address` varchar(150) default NULL,
  `city` varchar(100) default NULL,
  `country` varchar(100) default NULL,
  `ph` varchar(25) default NULL,
  `mob` varchar(20) default NULL,
  `fax` varchar(25) NOT NULL default '',
  `sec_email` varchar(100) default NULL,
  `address_open` tinyint(1) default NULL,
  `job_company_name` varchar(50) default NULL,
  `job_title` varchar(50) default NULL,
  `job_Address` varchar(150) default NULL,
  `job_postal_code` varchar(20) default NULL,
  `job_city` varchar(50) default NULL,
  `job_country` varchar(50) default NULL,
  `job_ph` varchar(20) default NULL,
  `job_fax` varchar(20) default NULL,
  `job_email` varchar(100) default NULL,
  `job_url` varchar(100) default NULL,
  `entry_date` date NOT NULL default '0000-00-00',
  `entry_time` varchar(4) NOT NULL default ''
) TYPE=MyISAM;

#
# Dumping data for table personal_data
#

INSERT INTO `personal_data` VALUES (18,1,'2004','NUST',1,'1234','Adnan Rasheed','Abdul Rasheed','2/12/1980','Male','Pakistani','Pakistani','Single','2004','MS(IT)','12345','1234567','1','On Job','b-v-269, Rwp','rawalpindi','Pakistan','4475421','0321-5158829','2212333','adnan_rasheed@hotmail.com',1,'NIIT','Database Administrator','Chaklala Scheme III','46000','Rawalpindi','Pakistan','9280658','9280659','info@niit.edu.pk','http://niit.edu.pk','12/30/2006','1347');

#
# Table structure for table publications
#

CREATE TABLE `publications` (
  `autonum` int(4) NOT NULL default '0',
  `user_id` bigint(20) NOT NULL default '0',
  `author_name` char(50) default NULL,
  `co_author_name` char(50) NOT NULL default '',
  `title` char(200) default NULL,
  `pub_in` char(200) default NULL,
  `org_pub` char(200) default NULL,
  `no` char(5) default NULL,
  `vol` char(5) default NULL,
  `pp` char(5) default NULL,
  `dates` date default NULL,
  PRIMARY KEY  (`autonum`)
) TYPE=MyISAM;

#
# Dumping data for table publications
#

INSERT INTO `publications` VALUES (2,0,'asfd','fasd','adnan','sfad','sadf','00','00','00','2/12/1980');
INSERT INTO `publications` VALUES (1,0,'Saad Liaquat Kiani','Maria Riaz, Sungyoung Lee, You','Incorporating Semantics-based Search and Policy-based Access Control Mechanism in Context Service Delivery','IEEE ACIS International Conference on Computer and Information Science (ICIS 2005)','IEEE','00','00','00','7/10/2005');
INSERT INTO `publications` VALUES (3,1,'adnan','sadf','NIIT’s ASIC Design Group, under the supervision of Dr. N.D. Gohar, has recently won a grant of Rs. 4.283 Million from HEC.','sadf','sdfa','00','00','00','2/12/1980');

#
# Table structure for table requests
#

CREATE TABLE `requests` (
  `rid` int(6) NOT NULL default '0',
  `reg1` varchar(5) NOT NULL default '',
  `reg2` varchar(5) NOT NULL default '',
  `reg3` int(4) NOT NULL default '0',
  `reg4` varchar(5) NOT NULL default '',
  `name` varchar(50) NOT NULL default '',
  `fname` varchar(50) NOT NULL default '',
  `dob` date NOT NULL default '0000-00-00',
  `cgpa` double NOT NULL default '0',
  `email` varchar(100) NOT NULL default '',
  `user_name` varchar(40) NOT NULL default '',
  `password` varchar(20) NOT NULL default '',
  `status` varchar(10) default NULL,
  `entry_date` date default NULL,
  `entry_time` varchar(4) default NULL,
  `accept_date` date default NULL,
  `accept_time` varchar(4) default NULL,
  `reject_date` date default NULL,
  `reject_time` varchar(4) default NULL,
  PRIMARY KEY  (`rid`)
) TYPE=MyISAM;

#
# Dumping data for table requests
#


#
# Table structure for table research_experience
#

CREATE TABLE `research_experience` (
  `autonum` int(4) NOT NULL default '0',
  `user_id` bigint(20) NOT NULL default '0',
  `after_degree` char(50) default NULL,
  `post` char(50) default NULL,
  `duration_from` date default NULL,
  `duration_to` date default NULL,
  `university` char(100) default NULL,
  PRIMARY KEY  (`autonum`)
) TYPE=MyISAM;

#
# Dumping data for table research_experience
#

INSERT INTO `research_experience` VALUES (3,0,'MIT','RA','12/1/2005','12/1/2006','asdf');
INSERT INTO `research_experience` VALUES (1,0,'MS','RA','12/1/2005','12/1/2006','National University of Sciences and Technology (NUST)');
INSERT INTO `research_experience` VALUES (2,0,'','','0000-00-00','0000-00-00','');
INSERT INTO `research_experience` VALUES (4,1,'MIT','RA','12/1/2005','12/1/2006','National University of Sciences and Technology (NUST)');

