use u24;
DROP TABLE if exists TD;
DROP TABLE if exists TRANS;
DROP TABLE if exists CUSTOMER;

#
CREATE TABLE if not exists `CUSTOMER`(
_id int not null auto_increment,
fname varchar(30),
lname varchar(30),
address varchar(60),
phonenumber varchar(16),
primary key(_id)
)engine = innodb;

#
create table if not exists `TRANS` (
  _id int not null auto_increment,
  cid int not null,
  totalPrice FLOAT(8,2) not null,
  tDate varchar(20) not null,
  primary key(_id),
  CONSTRAINT `cid` FOREIGN KEY (`cid`) REFERENCES `CUSTOMER` (`_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) engine = innodb;

#
create table if not exists `TD` (
  tid int not null,
  iid bigint not null,
  CONSTRAINT `tid` FOREIGN KEY (`tid`) REFERENCES `TRANS` (`_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `iid` FOREIGN KEY (`iid`) REFERENCES `ITEM` (`_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) engine = innodb;

drop table if exists article_author;
drop table if exists contain;
drop table if exists articles;
drop table if exists volume;

CREATE TABLE `volume` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `vno` int(11) DEFAULT NULL,
  `date` year(4) DEFAULT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `articles` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `pgno` varchar(20) DEFAULT NULL,
  `mvid` int(11) DEFAULT NULL,
  PRIMARY KEY (`_id`),
  KEY `mvid` (`mvid`),
  CONSTRAINT `mvid` FOREIGN KEY (`mvid`) REFERENCES `volume` (`_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `article_author` (
  `auth_id` int(11) DEFAULT NULL,
  `art_id` int(11) DEFAULT NULL,
  KEY `auth_id` (`auth_id`),
  KEY `art_id` (`art_id`),
  CONSTRAINT `art_id` FOREIGN KEY (`art_id`) REFERENCES `articles` (`_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `auth_id` FOREIGN KEY (`auth_id`) REFERENCES `AUTHOR` (`_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `contain` (
  `mvid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  KEY `mvid` (`mvid`),
  KEY `mid` (`mid`),
  CONSTRAINT `magid` FOREIGN KEY (`mid`) REFERENCES `MAGAZINE` (`_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `volid` FOREIGN KEY (`mvid`) REFERENCES `volume` (`_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



create index id_title on articles(title);
create index id_name on AUTHOR(fname,lname)