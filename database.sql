SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(30) NOT NULL,
    `zipCode` varchar(6) DEFAULT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;


INSERT INTO `city` (`id`, `name`, `zipCode`) VALUES
                                                 (27, 'Wrocław', '23-222'),
                                                 (28, 'Poznań', '44-111'),
                                                 (29, 'Gdańsk', '45-321'),
                                                 (30, 'Szczecin', ''),
                                                 (32, 'Sochocin', '86-432'),
                                                 (33, 'Kamionka', ''),
                                                 (34, 'Adamów', '11-191'),
                                                 (35, 'Radom', '54-321'),
                                                 (36, 'Torun', ''),
                                                 (37, 'Bytom', '23-176'),
                                                 (38, 'Opole', ''),
                                                 (39, 'Tychy', '');