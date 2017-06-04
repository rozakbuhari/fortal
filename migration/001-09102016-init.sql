
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `email` VARCHAR(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `fullname` VARCHAR(64) NOT NULL,
  `gender` TINYINT NOT NULL
) AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(48) NOT NULL,
  `title` varchar(48) NOT NULL
) AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  FOREIGN KEY (`role_id`) REFERENCES `role` (`id`)
) AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `title` varchar(48) NOT NULL,
  `content` TEXT NULL
) AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(48) NOT NULL
) AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `tag_post`;
CREATE TABLE `tag_post` (
  `tag_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`),
  FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`)
) AUTO_INCREMENT=1;



# User Seeds
INSERT INTO `user` (`password`, `fullname`, `email`, `gender`)
VALUES ('admin', 'Administrator', 'admin@email.com', 1);

INSERT INTO `user` (`password`, `fullname`, `email`, `gender`)
VALUES ('citra', 'Ariyana Arcitra', 'arcitra@email.com', 2);

# Role Seeds
INSERT INTO `role` (`name`, `title`)
VALUES ('admin', 'Administrator');

INSERT INTO `role` (`name`, `title`)
VALUES ('basic', 'Anggota Perpustakaan');

# User Role Seeds
INSERT INTO `user_role` (`user_id`, `role_id`)
VALUES ('1', '1');

INSERT INTO `user_role` (`user_id`, `role_id`)
VALUES ('2', '2');

#Post Seeds
INSERT INTO `posts` (`title`, `content`)
VALUES ('Gara gara ini, semua orang jadi pintar', 'Lorem ipsum dolor sit amet.');

INSERT INTO `posts` (`title`, `content`)
VALUES ('Gara gara ini, semua orang jadi pintar', 'Lorem ipsum dolor sit amet.');

INSERT INTO `posts` (`title`, `content`)
VALUES ('Gara gara ini, semua orang jadi pintar', 'Lorem ipsum dolor sit amet.');

#Post Seeds
INSERT INTO `tags` (`name`)
VALUES ('Teknologi');

INSERT INTO `tag_post` (`tag_id`, `post_id`)
VALUES (1, 1);
