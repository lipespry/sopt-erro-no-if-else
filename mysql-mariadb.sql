CREATE TABLE IF NOT EXISTS `members` (
    `member_id` int(11) NOT NULL AUTO_INCREMENT,
    `member_name` varchar(50) NOT NULL,
    `member_password` varchar(50) NOT NULL,
    `member_email` varchar(150) NOT NULL,
    PRIMARY KEY (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1;

