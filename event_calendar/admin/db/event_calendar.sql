/*
MySQL Backup
Source Host:           localhost
Source Server Version: 3.23.47-nt
Source Database:       niit
Date:                  2005/06/28 10:05:37
*/

use niit;
#----------------------------
# Table structure for event_calendar
#----------------------------
create table event_calendar (
   id decimal(3,0) not null default '0',
   edate date,
   txt varchar(100),
   url varchar(200),
   primary key (id))
   type=MyISAM comment="";

#----------------------------
# Records for table event_calendar
#----------------------------


insert  into event_calendar values 
('2', '2005-05-05', 'MIS Software Meeting Module Inventory Control System', 'www.msn.com'), 
('3', '2005-06-05', 'test event calendar', 'www.niit.edu.pk'), 
('4', '2005-06-05', '1234567', 'sad');

