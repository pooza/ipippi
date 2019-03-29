SET NAMES ujis;

alter table c_commu_topic_comment add column file_filename1 varchar(200) not null;
alter table c_commu_topic_comment add column file_filename2 varchar(200) not null;
alter table c_commu_topic_comment add column file_filename3 varchar(200) not null;

alter table c_diary add column image_position enum('TOP','BOTTOM') not null default 'TOP';
alter table c_commu_topic_comment add column image_position enum('TOP','BOTTOM') not null default 'TOP';
