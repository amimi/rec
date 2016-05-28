DROP DATABASE IF EXISTS `rec`;

CREATE DATABASE `rec`;
USE `rec`;

-- 管理者テーブル
DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE `admin_user` (
	`id`				int NOT NULL AUTO_INCREMENT					COMMENT 'ID',
	`login_id`			varchar(20) NOT NULL						COMMENT 'ログインID',
	`password`			varchar(100) NOT NULL						COMMENT 'パスワード',
	`admin_name`		varchar(20) NOT NULL						COMMENT '名前',
	`created_at`		DATETIME NOT NULL default CURRENT_TIMESTAMP	COMMENT '作成日時',
	`updated_at`		DATETIME NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP	COMMENT '更新日時',
	PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='管理者';

