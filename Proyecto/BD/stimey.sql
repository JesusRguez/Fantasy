ALTER TABLE `Puntuacion No Valida` DROP FOREIGN KEY `fk_Puntuacion No Valida_Quiz_1`;
ALTER TABLE `Quiz Final` DROP FOREIGN KEY `fk_Quiz_Puntuacion Valida_1`;
ALTER TABLE `Fantasy` DROP FOREIGN KEY `fk_Fantasy_Quiz_1`;
ALTER TABLE `Quiz Final` DROP FOREIGN KEY `fk_Quiz_LDAP_USER_1`;
ALTER TABLE `Fantasy` DROP FOREIGN KEY `fk_Fantasy_LDAP_USER_1`;
ALTER TABLE `Fantasy` DROP FOREIGN KEY `fk_Fantasy_Punto Activo_1`;
ALTER TABLE `Punto Activo` DROP FOREIGN KEY `fk_Punto Activo_Files_1`;
ALTER TABLE `Quiz Final` DROP FOREIGN KEY `fk_Quiz_Pregunta_1`;
ALTER TABLE `Punto Activo` DROP FOREIGN KEY `fk_Punto Activo_Quiz FInal_1`;

DROP TABLE `LDAP_USER`;
DROP TABLE `QuizFinal`;
DROP TABLE `Fantasy`;
DROP TABLE `PuntuacionValida`;
DROP TABLE `PuntuacionNoValida`;
DROP TABLE `Files`;
DROP TABLE `Punto Activo`;
DROP TABLE `Pregunta`;

CREATE TABLE `LDAP_USER` (
`idUser` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID autoincremental',
`Surname` varchar(255) NOT NULL,
`Name` varchar(255) NOT NULL,
`Email` varchar(255) NOT NULL,
`Username` varchar(255) NOT NULL,
`Rol` varchar(255) NOT NULL,
PRIMARY KEY (`idUser`) 
);
CREATE TABLE `QuizFinal` (
`idQuiz` int(11) NOT NULL AUTO_INCREMENT,
`idFantasia` int(11) NULL,
`idAlm1` int(11) NOT NULL,
`idAlum2` int(11) NULL,
`idPuntoActivo` int(11) NULL,
PRIMARY KEY (`idQuiz`) 
);
CREATE TABLE `Fantasy` (
`idFantasy` int(11) NOT NULL AUTO_INCREMENT,
`Topico` varchar(255) NULL,
`Token` int(12) NULL,
`idQuiz` int(11) NULL,
`idAutor` int(11) NULL,
`estado` int(1) NULL,
`password` varchar(255) NULL,
`link` varchar(255) NULL,
`createDate` datetime NULL,
`background` varchar(255) NULL,
`titulo` varchar(255) NULL,
PRIMARY KEY (`idFantasy`) 
);
CREATE TABLE `PuntuacionValida` (
`id` int(11) NOT NULL,
`idQuiz` int(11) NULL,
`Puntuacion` int(9) NULL,
PRIMARY KEY (`id`) 
);
CREATE TABLE `PuntuacionNoValida` (
`id` int(11) NOT NULL,
`idQuiz` int(11) NULL,
`Puntuacion` int(9) NULL,
`Token` int(255) NULL,
PRIMARY KEY (`id`) 
);
CREATE TABLE `Files` (
`id` int(11) NOT NULL,
`idPuntoActivo` int(255) NULL,
`ruta` varchar(255) NULL,
`token` int(11) NULL,
PRIMARY KEY (`id`) 
);
CREATE TABLE `PuntoActivo` (
`id` int(11) NOT NULL,
`idFantasy` int(11) NULL,
`orden` int(15) NULL,
`titulo` varchar(255) NULL,
`texto` varchar(255) NULL,
`coordenadaX` double(255,0) NULL,
`coordenadaY` double(255,0) NULL,
PRIMARY KEY (`id`) 
);
CREATE TABLE `Pregunta` (
`id` int(11) NOT NULL,
`idQuiz` int(11) NULL,
`textoPregunta` varchar(255) NULL,
`respuesta` varchar(255) NULL,
`puntuacion` double(255,0) NULL,
PRIMARY KEY (`id`) 
);

ALTER TABLE `Puntuacion No Valida` ADD CONSTRAINT `fk_Puntuacion No Valida_Quiz_1` FOREIGN KEY (`idQuiz`) REFERENCES `Quiz Final` (`idQuiz`);
ALTER TABLE `Quiz Final` ADD CONSTRAINT `fk_Quiz_Puntuacion Valida_1` FOREIGN KEY (`idQuiz`) REFERENCES `Puntuacion Valida` (`idQuiz`);
ALTER TABLE `Fantasy` ADD CONSTRAINT `fk_Fantasy_Quiz_1` FOREIGN KEY (`idQuiz`) REFERENCES `Quiz Final` (`idQuiz`);
ALTER TABLE `Quiz Final` ADD CONSTRAINT `fk_Quiz_LDAP_USER_1` FOREIGN KEY (`idAlm1`) REFERENCES `LDAP_USER` (`idUser`);
ALTER TABLE `Fantasy` ADD CONSTRAINT `fk_Fantasy_LDAP_USER_1` FOREIGN KEY (`idAutor`) REFERENCES `LDAP_USER` (`idUser`);
ALTER TABLE `Fantasy` ADD CONSTRAINT `fk_Fantasy_Punto Activo_1` FOREIGN KEY (`idFantasy`) REFERENCES `Punto Activo` (`idFantasy`);
ALTER TABLE `Punto Activo` ADD CONSTRAINT `fk_Punto Activo_Files_1` FOREIGN KEY (`id`) REFERENCES `Files` (`idPuntoActivo`);
ALTER TABLE `Quiz Final` ADD CONSTRAINT `fk_Quiz_Pregunta_1` FOREIGN KEY (`idQuiz`) REFERENCES `Pregunta` (`idQuiz`);
ALTER TABLE `Punto Activo` ADD CONSTRAINT `fk_Punto Activo_Quiz FInal_1` FOREIGN KEY (`id`) REFERENCES `Quiz Final` (`idPuntoActivo`);

