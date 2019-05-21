SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `user`;
DROP TABLE IF EXISTS `homework`;
DROP TABLE IF EXISTS `feedback`;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE `user` (
    `id` varchar(255) NOT NULL,
    `username` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `isAdmin` int(1) NOT NULL,
    `created_at` datetime(15) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE `homework` (
    `id` varchar(255) NOT NULL,
    `title` varchar(255) NOT NULL,
    `homework` varchar(255) NOT NULL,
    `subject` varchar(255) NOT NULL,
    `deadline` date(15) NOT NULL,
    `user_id` varchar(255) NOT NULL,
    `created_at` varchar(255) NOT NULL,
    `file` varchar(255),
    PRIMARY KEY (`id`)
);

CREATE TABLE `feedback` (
    `id` varchar(255) NOT NULL,
    `name` varchar(255) NOT NULL,
    `created_at` varchar(255) NOT NULL,
    `feedback` varchar(255) NOT NULL,
    `homework_id` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
);

ALTER TABLE `homework` ADD FOREIGN KEY (`user_id`) REFERENCES `user`(`id`);
ALTER TABLE `feedback` ADD FOREIGN KEY (`homework_id`) REFERENCES `homework`(`id`);