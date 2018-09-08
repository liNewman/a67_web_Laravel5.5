#--a67后台管理系统--

#--管理用户表--

create table admin_users(
	id int(10) unsigned AUTO_INCREMENT comment '主键id',
	username varchar(30) not null comment '用户名',
	password varchar(32) not null comment '密码',
	image_url varchar(255) not null comment '头像',
	is_super ENUM('1','2') not null default '1' comment '是否超管 1 否 2 是',
	status enum('1','2') not null default '1' comment '状态 1 正常 2 注销',
	created_at timestamp DEFAULT CURRENT_TIMESTAMP() comment '创建时间',
	updated_at timestamp DEFAULT CURRENT_TIMESTAMP() on UPDATE CURRENT_TIMESTAMP() COMMENT '修改时间',
	PRIMARY KEY(id),
	UNIQUE key(username)
	)ENGINE=INNODB DEFAULT charset=utf8 COLLATE=utf8_general_ci;

#--权限表--

create table permissions(
	id int(10) unsigned AUTO_INCREMENT comment '主键id',
	name varchar(20) not null comment '权限名字',
	url varchar(30) not null comment '权限节点链接',
	fid int(10) not null comment '父类id',
	is_menu enum('1','2') not null comment '是否显示',
	description varchar(50) not null comment '备注',
	sort int(10) not null comment '排序',
	created_at timestamp DEFAULT CURRENT_TIMESTAMP() comment '创建时间',
	updated_at timestamp DEFAULT CURRENT_TIMESTAMP() on UPDATE CURRENT_TIMESTAMP() COMMENT '修改时间',
	PRIMARY KEY(id),
	UNIQUE key(name)
	)ENGINE=INNODB DEFAULT charset=utf8 COLLATE=utf8_general_ci;

#--角色表--

create table roles(
	id int(10) unsigned AUTO_INCREMENT comment '主键ID',
	role_name varchar(20) not null comment '角色名字',
	description varchar(50) not null comment '角色描述',
	created_at timestamp DEFAULT CURRENT_TIMESTAMP() comment '创建时间',
	updated_at timestamp DEFAULT CURRENT_TIMESTAMP() on UPDATE CURRENT_TIMESTAMP() COMMENT '修改时间',
	PRIMARY KEY(id),
	UNIQUE key(role_name)
	)ENGINE=INNODB DEFAULT charset=utf8 COLLATE=utf8_general_ci;

#--用户角色表--

create table user_role(
	admin_user_id int(10) unsigned comment '用户ID',
	role_id int(10) unsigned comment '角色ID',
	FOREIGN KEY(admin_user_id) REFERENCES admin_users(id),
	FOREIGN KEY(role_id) REFERENCES roles(id)
	)ENGINE=INNODB DEFAULT charset=utf8 COLLATE=utf8_general_ci;

#--权限角色表--

create table permission_role(
	permission_id int(10) unsigned  comment '权限ID',
	role_id int(10) unsigned comment '角色Id',
	FOREIGN KEY(permission_id) REFERENCES permissions(id),
	FOREIGN KEY(role_id) REFERENCES roles(id)
	)ENGINE=INNODB DEFAULT charset=utf8 COLLATE=utf8_general_ci;


#--电影表--
create table film (
 id int(10) unsigned not null auto_increment comment 'ID',
title char(30) default '' comment '电影名称',
image_url char(100) default ' ' comment '图片',
score decimal(3,1) default '0.00' comment '评分',
type_id int(10) not null default 0 comment '类型',
area_id int(10) not null default 0 comment '地区',
year_id int(10) not null default 0 comment '年份',
leader_id int(10) not null default 0 comment '导演',
actor_id char(20) not null default ' ' comment '演员',
description varchar(255) not null comment '描述',
created_at timestamp default current_timestamp comment '创建时间',
updated_at timestamp default current_timestamp on update current_timestamp comment '修改时间',
primary key(id),
UNIQUE key(title)
)ENGINE=MYISAM DEFAULT charset=utf8 COLLATE=utf8_general_ci;

#--小说novel--
create table novel(
  id int(10) unsigned not null auto_increment comment 'ID',
  title char(30) default ' ' comment '小说名称',
  image_url char(100) not null default ' ' comment '小说图片',
  status tinyint(4) not null default 0 comment '状态',
  tags char(50) not null default ' ' comment '标签',
  score decimal(3,1) default 0 comment '类型',
  type_id int(10) not null default 0 comment '类型',
  author_id int(10) not null default 0 comment '作者',
  description varchar(255) not null comment '描述',
  created_at timestamp default current_timestamp comment '创建时间',
  updated_at timestamp default current_timestamp on update current_timestamp comment '修改时间',
  primary key(id),
UNIQUE key(title)
)ENGINE=MYISAM DEFAULT charset=utf8 COLLATE=utf8_general_ci;


#--小说章节表novel_chapter--
create table novel_chapter(
  id int(10) unsigned not null auto_increment comment 'ID',
  novel_id int(10) not null default 0 comment '小说id',
  title varchar(30) default ' ' comment '章节标题',
  content text comment '章节内容',
  created_at timestamp default current_timestamp comment '创建时间',
  updated_at timestamp default current_timestamp on update current_timestamp comment '修改时间',
  primary key(id),
UNIQUE key(title)
)ENGINE=MYISAM DEFAULT charset=utf8 COLLATE=utf8_general_ci;

#--评论表comment--
create table comment(
  id int(10) unsigned not null auto_increment comment 'ID',
  user_id int not null comment '用户ID',
  film_id int not null comment '电影ID',
  title varchar(30) not null comment '评论标题',
  content varchar(255) not null comment '评论的内容',
  created_at timestamp default current_timestamp comment '创建时间',
  updated_at timestamp default current_timestamp on update current_timestamp comment '修改时间',
  primary key(id),
UNIQUE key(title)
)ENGINE=MYISAM DEFAULT charset=utf8 COLLATE=utf8_general_ci;

#--类型type--
create table type(
  id int(10) unsigned not null auto_increment comment 'ID',
  type_name varchar(30) not null default 0 comment '类型名称',
  primary key(id)
)ENGINE=MYISAM DEFAULT charset=utf8 COLLATE=utf8_general_ci;


#--地区area--
create table area(
  id int(10) unsigned not null auto_increment comment 'ID',
  area_name varchar(30) not null default 0 comment '地区名称',
  primary key(id)
)ENGINE=MYISAM DEFAULT charset=utf8 COLLATE=utf8_general_ci;


#--导演leader--
create table leader(
  id int(10) unsigned not null auto_increment comment 'ID',
  leader_name varchar(25) not null default 0 comment '导演姓名',
 primary key(id)
)ENGINE=MYISAM DEFAULT charset=utf8 COLLATE=utf8_general_ci;

#--演员actor--
create table actor(
  id int(10) unsigned not null auto_increment comment 'ID',
  actor_name varchar(25) not null default 0 comment '演员姓名',
 primary key(id)
)ENGINE=MYISAM DEFAULT charset=utf8 COLLATE=utf8_general_ci;

#--作者author--
create table author(
  id int(10) unsigned not null auto_increment comment 'ID',
  author_name varchar(25) not null default 0 comment '作者姓名',
 primary key(id)
)ENGINE=MYISAM DEFAULT charset=utf8 COLLATE=utf8_general_ci;

#-----

alter table permissions set ENGINE=INNODB;

ALTER TABLE `admin_users` ADD `image_url` VARCHAR(255) NOT NULL AFTER `password`;