DROP DATABASE IF EXISTS `lgcpis_dbs`;
CREATE DATABASE `lgcpis_dbs`;
USE `lgcpis_dbs`;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`(
	id int(11)not null primary key,
	fname varchar(100)not null,
	sname varchar(100)not null,
	lname varchar(100)not null,
	sex varchar(10)not null,
	phone varchar(100)not null,
	username varchar(100) not null,
	password varchar(100) not null,
	token VARCHAR(15)not null,
	access int(11) not null default 0,
	avatar VARCHAR(100)not null,
	status INT(2)not null,
	suspended INT(2)not null,
	created int(11)not null
);


DROP TABLE IF EXISTS `citizen`;
CREATE TABLE `citizen`(
	id int(11)not null primary key,
	region_name VARCHAR(30)not null,
	district_name VARCHAR(30)not null,
	ward_name VARCHAR(30)not null,
	type_name VARCHAR(30)not null,
	title VARCHAR(10)not null,
	fname varchar(100)not null,
	sname varchar(100)not null,
	lname varchar(100)not null,
	sex varchar(10)not null,
	dob VARCHAR(30) not null,
	phone varchar(100)not null,
	email varchar(100)not null,
	houseno varchar(100)not null,
	streetname varchar(100),
	occupation VARCHAR(255)not null,
	created INT(11)not null
);


DROP TABLE IF EXISTS `officers`;
CREATE TABLE `officers`(
	id int(11)not null auto_increment primary key,
	region_name VARCHAR(30)not null,
	district_name varchar(30)not null,
	ward_name varchar(100)not null,
	type VARCHAR(30)not null,
	title VARCHAR(11)not null,
	fname varchar(100)not null,
	sname varchar(100)not null,
	lname varchar(100)not null,
	sex varchar(10)not null,
	dob VARCHAR(20) not null,
	phone varchar(100)not null,
	email varchar(100)not null,
	date_created INT(11)not null
);

DROP TABLE if EXISTS `forum`;
CREATE TABLE `forum`(
	id INT(11)not null auto_increment primary key,
	user_id INT(11)not null,
	region_name VARCHAR(50)not null,
	topic_name VARCHAR(255)not null,
	description TEXT not null,
	created INT(11)not null,
	visible INT(2)not null default 0,
	FOREIGN KEY (user_id) REFERENCES users(id)
);

DROP TABLE if EXISTS `messages`;
CREATE TABLE `messages`(
	id INT(11)not null auto_increment primary key,
	from_user INT(11)not null,
	to_user INT(11)not null,
	subject VARCHAR(100)not null,
	message TEXT not null,
	created INT(11)not null,
	FOREIGN KEY (from_user) REFERENCES users(id),
	FOREIGN KEY (to_user) REFERENCES users(id)
);

DROP TABLE if EXISTS `announcements`;
CREATE TABLE `announcements`(
	id INT(11)not null auto_increment primary key,
	from_user INT(11)not null,
	subject INT(11)not null,
	announcement TEXT not null,
	created INT(11)not null,
	FOREIGN KEY (from_user) REFERENCES users(id)
);

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments`(
	id INT(11)not null auto_increment primary key,
	user_id INT(11)not null,
	topic_id INT(11)not null,
	comment TEXT not null,
	created INT(11)not null,
	FOREIGN KEY (user_id) REFERENCES users(id),
	FOREIGN KEY (topic_id) REFERENCES forum(id)
);

Drop TABLE IF EXISTS `reply`;
CREATE TABLE `reply`(
	id INT(11)not null primary key,
	member_id INT(11)not null,
	comment_id INT(11)not null,
	reply TEXT not null,
	created INT(11)not null,
	FOREIGN KEY (member_id) REFERENCES users(id),
	FOREIGN KEY (comment_id) REFERENCES comments(id)
);

DROP TABLE IF EXISTS `likes`;
CREATE TABLE `likes`(
	id INT(11)not null auto_increment primary key,
	user_id INT(11)not null,
	topic_id INT(11)not null,
	likes INT(11) not null,
	FOREIGN KEY (user_id) REFERENCES users(id),
	FOREIGN KEY (topic_id) REFERENCES forum(id)
);

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments`(
	id INT(11)not null auto_increment primary key,
	user_id INT(11)not null,
	topic_id INT(11)not null,
	comment TEXT not null,
	FOREIGN KEY (user_id) REFERENCES users(id),
	FOREIGN KEY (topic_id) REFERENCES forum(id)
);

DROP TABLE IF EXISTS `like_comment`;
CREATE TABLE `like_comment`(
	id INT(11)not null auto_increment primary key,
	user_id INT(11)not null,
	comment_id INT(11)not null,
	likes INT(11) not null,
	FOREIGN KEY (user_id) REFERENCES users(id),
	FOREIGN KEY (comment_id) REFERENCES comments(id)
);


DROP TABLE IF EXISTS `online`;
CREATE TABLE `online`(
	id INT(11)not null auto_increment primary key,
	user_id INT(100)not null,
	ip_address VARCHAR(15) not null,
	FOREIGN KEY (user_id) REFERENCES users(id)
);



