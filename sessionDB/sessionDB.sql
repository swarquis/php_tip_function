CREATE TABLE sessions(
session_id VARCHAR(50) NOT NULL DEFAULT '' UNIQUE,
session_data VARCHAR(200) NOT NULL DEFAULT '',
session_update_time INT UNSIGNED NOT NULL DEFAULT 0
)ENGINE=INNODB CHARSET=UTF8;