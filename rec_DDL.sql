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
	`image`				varchar(100) default NULL					COMMENT '画像',
	`last_logined_at`	DATETIME default NULL						COMMENT '最終ログイン',
	`deleted_flag`		tinyint(1) default 0						COMMENT '削除フラグ',
	`created_at`		DATETIME NOT NULL default CURRENT_TIMESTAMP	COMMENT '作成日時',
	`updated_at`		DATETIME NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP	COMMENT '更新日時',
	PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='管理者';

-- 投稿テーブル
DROP TABLE IF EXISTS `record`;
CREATE TABLE `record` (
	`id`				int NOT NULL AUTO_INCREMENT					COMMENT 'ID',
	`image`				varchar(100) NOT NULL						COMMENT '画像',
	`comment`			varchar(200)								COMMENT 'コメント',
	`published_flag`	TINYINT(1) default 0						COMMENT '公開フラグ',
	`deleted_flag`		TINYINT(1) default 0						COMMENT '削除フラグ',
	`published_at`		DATETIME NOT NULL default CURRENT_TIMESTAMP	COMMENT '公開日時',
	`created_at`		DATETIME NOT NULL default CURRENT_TIMESTAMP	COMMENT '作成日時',
	`updated_at`		DATETIME NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP	COMMENT '更新日時',
	PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='投稿';

-- カテゴリーテーブル
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
	`id`				int NOT NULL AUTO_INCREMENT					COMMENT 'ID',
	`category_name`		varchar(100) NOT NULL						COMMENT '名前',
	`segment`			varchar(20)									COMMENT 'セグメント',
	`deleted_flag`		TINYINT(1) default 0						COMMENT '削除フラグ',
	`created_at`		DATETIME NOT NULL default CURRENT_TIMESTAMP	COMMENT '作成日時',
	`updated_at`		DATETIME NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP	COMMENT '更新日時',
	PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='カテゴリー';

-- タグテーブル
DROP TABLE IF EXISTS `tag`;
CREATE TABLE `tag` (
	`id`				int NOT NULL AUTO_INCREMENT					COMMENT 'ID',
	`tag_name`			varchar(100) NOT NULL						COMMENT '名前',
	`segment`			varchar(20)									COMMENT 'セグメント',
	`deleted_flag`		TINYINT(1) default 0						COMMENT '削除フラグ',
	`created_at`		DATETIME NOT NULL default CURRENT_TIMESTAMP	COMMENT '作成日時',
	`updated_at`		DATETIME NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP	COMMENT '更新日時',
	PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='タグ';

-- 投稿カテゴリーテーブル
DROP TABLE IF EXISTS `rel_record_category`;
CREATE TABLE `rel_record_category` (
	`id`				int NOT NULL AUTO_INCREMENT					COMMENT 'ID',
	`record_id`			int NOT NULL								COMMENT '投稿ID',
	`category_id`		int NOT NULL								COMMENT 'カテゴリーID',
	`deleted_flag`		TINYINT(1) default 0						COMMENT '削除フラグ',
	`created_at`		DATETIME NOT NULL default CURRENT_TIMESTAMP	COMMENT '作成日時',
	`updated_at`		DATETIME NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP	COMMENT '更新日時',
	PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='投稿カテゴリー';

-- 投稿タグテーブル
DROP TABLE IF EXISTS `rel_record_tag`;
CREATE TABLE `rel_record_tag` (
	`id`				int NOT NULL AUTO_INCREMENT					COMMENT 'ID',
	`record_id`			int NOT NULL								COMMENT '投稿ID',
	`tag_id`			int NOT NULL								COMMENT 'タグID',
	`deleted_flag`		TINYINT(1) default 0						COMMENT '削除フラグ',
	`created_at`		DATETIME NOT NULL default CURRENT_TIMESTAMP	COMMENT '作成日時',
	`updated_at`		DATETIME NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP	COMMENT '更新日時',
	PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='投稿タグ';

-- session
CREATE TABLE IF NOT EXISTS `ci_sessions` (
	`id` varchar(40) NOT NULL,
	`ip_address` varchar(45) NOT NULL,
	`timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
	`data` blob NOT NULL,
	KEY `ci_sessions_timestamp` (`timestamp`),
	PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='CI session用';

