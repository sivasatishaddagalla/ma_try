UPDATE `general_settings` SET `value` = '2.5' WHERE `general_settings`.`general_settings_id` = 79;

ALTER TABLE `member`
ADD `google_login_id` VARCHAR(100) NULL AFTER `profile_image_update_time`,
ADD `facebook_login_id` VARCHAR(100) NULL AFTER `google_login_id`,
ADD `twitter_login_id` VARCHAR(100) NOT NULL AFTER `facebook_login_id`,
ADD `registration_type` VARCHAR(20) NULL AFTER `reported_by`;

ALTER TABLE `member`
CHANGE `gender` `gender` INT(11) NULL,
CHANGE `email` `email` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
CHANGE `mobile` `mobile` VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
CHANGE `date_of_birth` `date_of_birth` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
CHANGE `password` `password` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `member` ;


UPDATE `third_party_settings` SET `value` = 'no' WHERE `third_party_settings`.`third_party_settings_id` = 3;
UPDATE `third_party_settings` SET `value` = 'no' WHERE `third_party_settings`.`third_party_settings_id` = 6;
INSERT INTO `third_party_settings` (`third_party_settings_id`, `type`, `value`)
VALUES
(NULL, 'twitter_login_set', 'no'), (NULL, 'twitter_app_key', ''), (NULL, 'twitter_app_secret', '');

INSERT INTO `permission` (`permission_id`, `name`, `codename`, `parent_status`, `description`) VALUES (NULL, NULL, 'social_media_login_settings', '8', NULL);
