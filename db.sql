create table users(
uid int unsigned key,
role_id int unsigned,
instance_id int unsigned,
user_name varchar(30),
user_password varchar(32),
user_status tinyint unsigned default 1
);


create table user_role(
role_id int unsigned key,
role_name varchar(30),
group_id_array text,
is_role tinyint unsigned default 0,
role_status tinyint unsigned default 1,
descs varchar(30)
);

create table user_group(
group_id smallint unsigned key,
instance_id smallint unsigned,
group_name varchar(30),
group_status tinyint unsigned default 1,
is_system tinyint default 1,
module_id_array text,
created_at timestamp,
updated_at timestamp,
deleted_at timestamp
);


