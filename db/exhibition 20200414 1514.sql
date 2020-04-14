﻿--
-- Script was generated by Devart dbForge Studio 2019 for MySQL, Version 8.2.23.0
-- Product home page: http://www.devart.com/dbforge/mysql/studio
-- Script date 14.04.2020 15:14:18
-- Server version: 5.5.5-10.3.13-MariaDB-log
-- Client version: 4.1
--

-- 
-- Disable foreign keys
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Set SQL mode
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Set character set the client will use to send SQL statements to the server
--
SET NAMES 'utf8';

--
-- Set default database
--
USE exhibition;

--
-- Drop table `exhibition_work`
--
DROP TABLE IF EXISTS exhibition_work;

--
-- Drop table `exhibition`
--
DROP TABLE IF EXISTS exhibition;

--
-- Drop table `type_exhibition`
--
DROP TABLE IF EXISTS type_exhibition;

--
-- Drop table `work`
--
DROP TABLE IF EXISTS work;

--
-- Drop table `autor`
--
DROP TABLE IF EXISTS autor;

--
-- Drop table `hall`
--
DROP TABLE IF EXISTS hall;

--
-- Drop table `owner`
--
DROP TABLE IF EXISTS owner;

--
-- Drop table `user`
--
DROP TABLE IF EXISTS user;

--
-- Drop table `gender`
--
DROP TABLE IF EXISTS gender;

--
-- Set default database
--
USE exhibition;

--
-- Create table `gender`
--
CREATE TABLE gender (
  gender_id tinyint(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  name varchar(50) NOT NULL,
  PRIMARY KEY (gender_id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 3,
AVG_ROW_LENGTH = 8192,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Create table `user`
--
CREATE TABLE user (
  user_id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  name varchar(50) NOT NULL,
  gender tinyint(4) UNSIGNED NOT NULL,
  birthday date NOT NULL,
  PRIMARY KEY (user_id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 7,
AVG_ROW_LENGTH = 2730,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Create foreign key
--
ALTER TABLE user
ADD CONSTRAINT FK_user_gender_gender_id FOREIGN KEY (gender)
REFERENCES gender (gender_id) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Create table `owner`
--
CREATE TABLE owner (
  user_id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  adress varchar(255) NOT NULL,
  telephone varchar(255) NOT NULL,
  PRIMARY KEY (user_id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 7,
AVG_ROW_LENGTH = 8192,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Create foreign key
--
ALTER TABLE owner
ADD CONSTRAINT FK_owner_user_user_id FOREIGN KEY (user_id)
REFERENCES user (user_id) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Create table `hall`
--
CREATE TABLE hall (
  hall_id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  name varchar(50) NOT NULL,
  area varchar(255) NOT NULL,
  adress varchar(255) NOT NULL,
  telephone varchar(255) NOT NULL,
  user_id bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (hall_id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 4,
AVG_ROW_LENGTH = 5461,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Create foreign key
--
ALTER TABLE hall
ADD CONSTRAINT FK_hall_owner_user_id FOREIGN KEY (user_id)
REFERENCES owner (user_id) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Create table `autor`
--
CREATE TABLE autor (
  user_id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  info varchar(255) NOT NULL,
  education varchar(255) NOT NULL,
  PRIMARY KEY (user_id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 5,
AVG_ROW_LENGTH = 4096,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Create foreign key
--
ALTER TABLE autor
ADD CONSTRAINT FK_autor_user_user_id FOREIGN KEY (user_id)
REFERENCES user (user_id) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Create table `work`
--
CREATE TABLE work (
  work_id smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  user_id bigint(20) UNSIGNED NOT NULL,
  name varchar(50) NOT NULL,
  date_create date NOT NULL,
  execution varchar(255) NOT NULL,
  height varchar(255) NOT NULL,
  width varchar(255) NOT NULL,
  volume varchar(255) DEFAULT NULL,
  PRIMARY KEY (work_id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 8,
AVG_ROW_LENGTH = 2340,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Create foreign key
--
ALTER TABLE work
ADD CONSTRAINT FK_work_autor_user_id FOREIGN KEY (user_id)
REFERENCES autor (user_id) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Create table `type_exhibition`
--
CREATE TABLE type_exhibition (
  type_exhibition_id tinyint(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  name varchar(50) NOT NULL,
  PRIMARY KEY (type_exhibition_id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 3,
AVG_ROW_LENGTH = 8192,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Create table `exhibition`
--
CREATE TABLE exhibition (
  exhibition_id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  name varchar(50) NOT NULL,
  hall_id int(11) UNSIGNED NOT NULL,
  date date NOT NULL,
  adress varchar(255) NOT NULL,
  type_exhibition_id tinyint(4) UNSIGNED NOT NULL,
  PRIMARY KEY (exhibition_id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 4,
AVG_ROW_LENGTH = 5461,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Create foreign key
--
ALTER TABLE exhibition
ADD CONSTRAINT FK_exhibition_hall_hall_id FOREIGN KEY (hall_id)
REFERENCES hall (hall_id) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Create foreign key
--
ALTER TABLE exhibition
ADD CONSTRAINT FK_exhibition_type_exhibition_type_exhibition_id FOREIGN KEY (type_exhibition_id)
REFERENCES type_exhibition (type_exhibition_id) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Create table `exhibition_work`
--
CREATE TABLE exhibition_work (
  exhibition_id int(11) UNSIGNED NOT NULL,
  user_id bigint(20) UNSIGNED NOT NULL,
  work_id smallint(6) UNSIGNED NOT NULL
)
ENGINE = INNODB,
AVG_ROW_LENGTH = 2340,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Create foreign key
--
ALTER TABLE exhibition_work
ADD CONSTRAINT FK_exhibition_work_autor_user_id FOREIGN KEY (user_id)
REFERENCES autor (user_id) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Create foreign key
--
ALTER TABLE exhibition_work
ADD CONSTRAINT FK_exhibition_work_exhibition_exhibition_id FOREIGN KEY (exhibition_id)
REFERENCES exhibition (exhibition_id) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Create foreign key
--
ALTER TABLE exhibition_work
ADD CONSTRAINT FK_exhibition_work_work_work_id FOREIGN KEY (work_id)
REFERENCES work (work_id) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- 
-- Dumping data for table gender
--
INSERT INTO gender VALUES
(1, 'муж'),
(2, 'жен');

-- 
-- Dumping data for table user
--
INSERT INTO user VALUES
(1, 'Евгений Евгенеевич', 1, '1980-04-13'),
(2, 'Галина Ефремова', 2, '1986-08-23'),
(3, 'Александр Александрович', 1, '1975-11-02'),
(4, 'Вероника Измайлова', 2, '1990-03-27'),
(5, 'Данил Данилович', 1, '1980-05-16'),
(6, 'Валерий Валерович', 1, '1975-08-03');

-- 
-- Dumping data for table owner
--
INSERT INTO owner VALUES
(5, 'Уалиханова 12', '99928462180'),
(6, 'Байтурсынова 13', '55265423647');

-- 
-- Dumping data for table autor
--
INSERT INTO autor VALUES
(1, 'любит космос', 'среднее проф'),
(2, 'люит природу', 'высшее проф'),
(3, 'рисует людей', 'высшее проф'),
(4, 'скульптор', 'высшее проф');

-- 
-- Dumping data for table type_exhibition
--
INSERT INTO type_exhibition VALUES
(1, 'картина'),
(2, 'скульптура');

-- 
-- Dumping data for table hall
--
INSERT INTO hall VALUES
(1, 'картины', '80 кв м', 'Богенбая', '92472584758', 5),
(2, 'скульптуры', '80 кв м', 'Богенбая', '92775747582', 6),
(3, 'картины22', '80 кв м ', 'Валиханова 12', '54328795736', 5);

-- 
-- Dumping data for table work
--
INSERT INTO work VALUES
(1, 1, 'пространство', '2000-04-13', 'масляные краски', '90', '120', NULL),
(2, 1, 'время', '2015-10-06', 'масляные краски', '80', '100', NULL),
(3, 2, 'ромашки', '2003-01-23', 'акварель', '80', '100', NULL),
(4, 2, 'море', '2009-05-25', 'акрил', '60', '80', NULL),
(5, 3, 'Пикассо', '2005-04-04', 'гуашь', '120', '80', NULL),
(6, 3, 'Рубенс', '2010-04-13', 'гуашь', '120', '80', NULL),
(7, 4, 'танцор', '2009-12-19', 'стекло', '60', '40', '24000');

-- 
-- Dumping data for table exhibition
--
INSERT INTO exhibition VALUES
(1, 'ляпота', 1, '2019-08-13', 'Богенбая', 1),
(2, 'скульп', 2, '2020-04-21', 'Богенбая', 2),
(3, 'изо', 3, '2020-04-21', 'Валиханова 12', 1);

-- 
-- Dumping data for table exhibition_work
--
INSERT INTO exhibition_work VALUES
(1, 1, 1),
(1, 2, 3),
(1, 2, 4),
(2, 4, 7),
(3, 1, 2),
(3, 3, 5),
(3, 3, 6);

-- 
-- Restore previous SQL mode
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Enable foreign keys
-- 
/*!40014 SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS */;