UPDATE `general_settings` SET `value` = '2.6' WHERE `general_settings`.`general_settings_id` = 79;

ALTER TABLE `plan` ADD `duration` INT NOT NULL AFTER `image`;

ALTER TABLE `member` ADD `package_invalid_at` DATE NULL DEFAULT NULL AFTER `photo_gallery`;

ALTER TABLE `deleted_member` ADD `package_invalid_at` DATE NULL DEFAULT NULL AFTER `photo_gallery`;
