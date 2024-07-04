ALTER TABLE `courses` CHANGE `is_active` `is_active` TINYINT(3) NOT NULL DEFAULT '0';
ALTER TABLE `courses` CHANGE `is_paid` `is_paid` TINYINT(3) NOT NULL DEFAULT '0';
ALTER TABLE `categorys` DROP `created`, DROP `modified`;
ALTER TABLE `courses` DROP `created`, DROP `modified`;
ALTER TABLE `chapters` DROP `created`, DROP `modified`;
ALTER TABLE `lessons` DROP `created`, DROP `modified`;
ALTER TABLE `levels` DROP `created`, DROP `modified`;
ALTER TABLE `ratings` DROP `created`, DROP `modified`;
ALTER TABLE `roles` DROP `created`, DROP `modified`;
ALTER TABLE `users` DROP `created`, DROP `modified`;

ALTER TABLE `courses` ADD `picture` VARCHAR(255) NOT NULL;
ALTER TABLE `chapters` ADD `quizz_title` VARCHAR(255) NOT NULL;
ALTER TABLE `lessons` ADD `is_paid` INT(3);

ALTER TABLE `courses` CHANGE `created` `created` DATETIME NOT NULL;

INSERT INTO `roles` (`id`, `role` ) VALUES
(1, 'student'),
(2, 'admin'),
(3, 'instructor');


-- migration 1
