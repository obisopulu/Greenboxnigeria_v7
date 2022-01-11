<?php
//create reg_student_tb
$sql_tb_1 = "CREATE TABLE activities (
  activityID int NOT NULL AUTO_INCREMENT,
  activityName char(100),
  activityPic char(50),
  activityInfo varchar(1000),
  activityDay int(2),
  activityMonth int(2),
  activityYear int(2),
  activityDate char(10),
  dateDay int(2),
  dateMonth int(2),
  dateYear int(4),
  dateUpdated int(8),
  PRIMARY KEY  (activityID)
)";
mysql_query ($sql_tb_1, $cxn) or die('fjhgvkjhbgkjbk');

//create reg_subject_tb
$sql_tb_2 = "CREATE TABLE anonymous (
  anonymousID int(9) auto_increment,
  anonymousName char(50),
  anonymousIP char(100),
  anonymousRating int(6),
  anonymousDownload int(6),
  anonymousRegDate int(8),
  PRIMARY KEY  (anonymousID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
mysql_query ($sql_tb_2, $cxn);

//create reg_v31_tb
$sql_tb_3 = "CREATE TABLE downloads (
  downloadID int(20) auto_increment,
  downloadUser char(50),
  downloadSongID int(9),
  downloadDate varchar(8),
  PRIMARY KEY  (downloadID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
mysql_query ($sql_tb_3, $cxn);	

//create reg_v41_tb
$sql_tb_4 = "CREATE TABLE feedback (
  feedID int(6) auto_increment,
  feedName char(50),
  feedTopic char(50),
  feedBack varchar(1000),
  feedDate char(10),
  PRIMARY KEY  (feedID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
mysql_query ($sql_tb_4, $cxn);	

//create reg_v51_tb
$sql_tb_5 = "CREATE TABLE labels (
  labelID int(6) auto_increment,
  labelName char(100),
  labelPic char(50),
  labelOwner char(100),
  labelIntro varchar(1000),
  labelHistory varchar(1000),
  labelArtists varchar(300),
  labelProducers varchar(200),
  dateDay int(2),
  dateMonth int(2),
  dateYear int(4),
  dateUpdated int(8),
  PRIMARY KEY  (labelID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
mysql_query ($sql_tb_5, $cxn);	

//create reg_v61_tb
$sql_tb_6 = "CREATE TABLE persons (
  personID int(6) auto_increment,
  personStageName char(50),
  personBirthName char(100),
  personFanName char(50),
  personGenre char(50),
  personBirthDay char(5),
  personBirthYear int(4),
  personPlaceOfOrigin char(100),
  personProfession char(50),
  personCareerStartYear int(4),
  personLabel char(50),
  personAssociatedActs char(200),
  personLifeStory varchar(10000),
  personPic1 char(50),
  personPic2 char(50),
  personPic3 char(50),
  dateDay int(2),
  dateMonth int(2),
  dateYear int(4),
  dateUpdated int(8),
  PRIMARY KEY  (personID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
mysql_query ($sql_tb_6, $cxn);	

//create reg_v61_tb
$sql_tb_6 = "CREATE TABLE songs (
  songID int(6) auto_increment,
  songTitle char(50),
  songArtist char(50),
  songArtistFt char(100),
  songAlbum char(50),
  songArt char(100),
  songProducer char(50),
  songBeatmaker char(50),
  songLenght int(4),
  songType char(15),
  songSize int(4),
  songURL char(100),
  songGenre char(100),
  songDescription char(100),
  songYear int(4),
  songLanguage char(100),
  songRating int(2),
  songDownload int(9),
  dateMonth int(2),
  dateDay int(2),
  dateYear int(4),
  dateUpdated int(8),
  PRIMARY KEY  (songID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
mysql_query ($sql_tb_6, $cxn);	
?>