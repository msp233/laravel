create table users(
uid int unsigned auto_increment key,
role_id int unsigned,
instance_id int unsigned,
user_name varchar(30),
user_password varchar(32),
user_status tinyint unsigned default 1
);

insert into users(uid,instance_id,role_id, user_name,user_password) values (1,1,3,'lg',md5("aaa111"));
insert into users(uid,instance_id,role_id, user_name,user_password) values (2,2,1,'abc',md5('aaa111'));
insert into users(uid,instance_id,role_id, user_name,user_password) values (3,3,4,'ab',md5('123456'));
insert into users(uid,instance_id,role_id, user_name,user_password) values (4,0,2,'def',md5('aaa111'));
insert into users(uid,instance_id,role_id, user_name,user_password) values (5,2,4,'demo',md5('aaa111'));

create table user_role(
role_id int unsigned auto_increment key,
role_name varchar(30),
group_id_array text,
is_role tinyint unsigned default 0,
role_status tinyint unsigned default 1,
descs varchar(30)
);

insert into user_role(role_name,group_id_array,is_role,role_status,descs) values ('普通','1',0,1,null);
insert into user_role(role_name,group_id_array,is_role,role_status,descs) values ('酱油','2',0,1,null);
insert into user_role(role_name,group_id_array,is_role,role_status,descs) values ('身份一','1,2',0,1,null);
insert into user_role(role_name,group_id_array,is_role,role_status,descs) values ('超级管理员','5',1,1,null);

create table user_group(
group_id smallint unsigned auto_increment key,
instance_id smallint unsigned,
group_name varchar(30),
group_status tinyint unsigned default 1,
is_system tinyint default 1,
module_id_array text,
created_at timestamp,
updated_at timestamp,
deleted_at timestamp
);

insert into user_group(group_id,instance_id,group_name,module_id_array) values ('1','5','初级管理员','1,2');
insert into user_group(group_id,instance_id,group_name,module_id_array) values ('2','4','中级管理员','1,2,3');
insert into user_group(group_id,instance_id,group_name,module_id_array) values ('3','1','高级管理员','1,2,3,4');
insert into user_group(group_id,instance_id,group_name,module_id_array) values ('4','3','正常管理员','1 ');
insert into user_group(group_id,instance_id,group_name,module_id_array) values ('5','2','超级管理员','1,2,3,4,5');


