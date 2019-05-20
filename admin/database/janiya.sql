# Host: localhost  (Version: 5.6.16)
# Date: 2015-06-03 23:46:52
# Generator: MySQL-Front 5.3  (Build 4.122)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "tbl_admin"
#

CREATE TABLE `tbl_admin` (
  `adm_Id` int(11) NOT NULL AUTO_INCREMENT,
  `adm_user` varchar(255) DEFAULT NULL,
  `adm_pwd` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`adm_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "tbl_admin"
#

INSERT INTO `tbl_admin` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3');

#
# Structure for table "tbl_answer"
#

CREATE TABLE `tbl_answer` (
  `ans_Id` int(11) NOT NULL AUTO_INCREMENT,
  `answer` varchar(255) DEFAULT NULL,
  `quiz_Id` int(11) DEFAULT NULL,
  `user_Id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ans_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tbl_answer"
#


#
# Structure for table "tbl_category"
#

CREATE TABLE `tbl_category` (
  `cat_Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cat_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Data for table "tbl_category"
#

INSERT INTO `tbl_category` VALUES (4,'Programming','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.',NULL);

#
# Structure for table "tbl_comment"
#

CREATE TABLE `tbl_comment` (
  `comment_Id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text,
  `datetime` datetime DEFAULT NULL,
  `sub_Id` int(11) DEFAULT NULL,
  `user_Id` int(11) DEFAULT NULL,
  PRIMARY KEY (`comment_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "tbl_comment"
#

INSERT INTO `tbl_comment` VALUES (1,'','2015-06-01 07:48:26',0,0),(2,'','2015-06-01 07:48:56',0,0);

#
# Structure for table "tbl_contact"
#

CREATE TABLE `tbl_contact` (
  `contact_Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` int(1) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`contact_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Data for table "tbl_contact"
#

INSERT INTO `tbl_contact` VALUES (2,'asd','sample@gmail.com',343,'sa','sadas'),(3,'asd','asdh@yahoo.com',324,'asd','asdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'),(4,'Sample','asdh@yahoo.com',24,'asd','asd');

#
# Structure for table "tbl_quiz"
#

CREATE TABLE `tbl_quiz` (
  `quiz_Id` int(11) NOT NULL AUTO_INCREMENT,
  `question_name` text,
  `answer1` varchar(255) DEFAULT '',
  `answer2` varchar(255) DEFAULT NULL,
  `answe3` varchar(255) DEFAULT NULL,
  `answer4` varchar(255) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`quiz_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Data for table "tbl_quiz"
#

INSERT INTO `tbl_quiz` VALUES (1,'<pre>\r\n<span style=\"color:rgb(0, 136, 0)\">What does PHP stand for?</span></pre>\r\n','4','','','',''),(2,'<pre>\r\n<span style=\"color:rgb(0, 136, 0)\">What does PHP stand for?</span></pre>\r\n','Personal Home Page','Personal Hypertext Processor','Private Home Page','PHP: Hypertext Preprocessor','4'),(3,'<p>asd</p>\r\n','asd','asd','asd','asd','3'),(4,'<p>asd</p>\r\n','45','45','45','452','2'),(5,'<p>asd</p>\r\n','gfgf','fg','fg','fg','2');

#
# Structure for table "tbl_subtopic"
#

CREATE TABLE `tbl_subtopic` (
  `sub_Id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_title` varchar(255) DEFAULT NULL,
  `sub_content` text,
  `datetime` datetime DEFAULT NULL,
  `topic_Id` int(11) DEFAULT NULL,
  PRIMARY KEY (`sub_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "tbl_subtopic"
#

INSERT INTO `tbl_subtopic` VALUES (1,'sample','<p><iframe src=\"https://www.youtube.com/embed/zg-J7jVNix0\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe></p>\r\n<p>asdasd</p>','2015-05-31 09:46:27',11),(2,'Lorem ipsum','<h3>sample</h3>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</div>\r\n\r\n<div>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</div>\r\n\r\n<div>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</div>\r\n\r\n<div>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</div>\r\n\r\n<div>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</div>\r\n\r\n<div>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div><a href=\"http://iwantsourcecodes.com\" target=\"_blank\">http://iwantsourcecodes.com</a></div>\r\n','2015-05-31 06:00:53',11);

#
# Structure for table "tbl_teacher"
#

CREATE TABLE `tbl_teacher` (
  `teacher_Id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) DEFAULT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `uname` varchar(255) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`teacher_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

#
# Data for table "tbl_teacher"
#

INSERT INTO `tbl_teacher` VALUES (1,'sample','sample','sample','sample','sample'),(7,'lorems','lorem','lorem','lorem','lorem');

#
# Structure for table "tbl_topic"
#

CREATE TABLE `tbl_topic` (
  `topic_Id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `datetime_posted` timestamp NULL DEFAULT NULL,
  `cat_Id` int(11) DEFAULT NULL,
  PRIMARY KEY (`topic_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

#
# Data for table "tbl_topic"
#

INSERT INTO `tbl_topic` VALUES (11,'samples','<p><iframe src=\"https://www.youtube.com/embed/KmCkQEkeVn8\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe></p>\r\n<p>edited</p>','2015-05-16 10:10:49',3),(13,'sample','<p>sample</p>\r\n','2015-05-30 08:37:01',4);

#
# Structure for table "tbl_user"
#

CREATE TABLE `tbl_user` (
  `user_Id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) DEFAULT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `yrlvl` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Data for table "tbl_user"
#

INSERT INTO `tbl_user` VALUES (1,'samples','sample','sample','2015-05-20','Male','BSIT','4','sample','5e8ff9bf55ba3508199d22e984129be6'),(2,'test','test','test','2015-05-08','Female','BSIT','1','test','098f6bcd4621d373cade4e832627b4f6'),(3,'aaa','aaa','aaa','2015-05-07','Male','BSCS','4','aaa','47bce5c74f589f4867dbd57e9ca9f808'),(4,'lorem','lorem','lorem','2015-04-30','Male','BSIT','2','lorem','d2e16e6ef52a45b7468f1da56bba1953');
