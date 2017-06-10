
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `email` VARCHAR(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `fullname` VARCHAR(64) NOT NULL,
  `gender` TINYINT NOT NULL,
  `security_question_id` INT(11) NULL,
  `answer` VARCHAR(255) NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL
) AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(48) NOT NULL,
  `title` varchar(48) NOT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL
) AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL
) AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `title` varchar(255) NOT NULL,
  `content` TEXT NULL,
  `author_id` INT(11),
  `category_id` INT(11),
  `image` VARCHAR(255) NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL
) AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(48) NOT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL
) AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `tag_post`;
CREATE TABLE `tag_post` (
  `tag_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL
) AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(48) NOT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL
) AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `category_post`;
CREATE TABLE `category_post` (
  `category_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL
) AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `ads`;
CREATE TABLE `ads` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `image` VARCHAR(48) NULL,
  `text` VARCHAR(255) NULL,
  `expired` DATE NOT NULL,
  `created_at` DATETIME NULL,
  `updated_at`DATETIME NULL
) AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `security_questions`;
CREATE TABLE `security_questions` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(48) NOT NULL,
  `created_at` DATETIME NULL,
  `updated_at`DATETIME NULL
) AUTO_INCREMENT=1;