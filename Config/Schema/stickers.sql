CREATE TABLE `stickers` (
  `id` char(36) DEFAULT NULL,
  `color` varchar(64) DEFAULT NULL,
  `content` text,
  `modified` datetime
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;
