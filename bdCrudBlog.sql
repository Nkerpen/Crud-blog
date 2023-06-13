
DROP DATABASE IF EXISTS `crudblog`;
CREATE DATABASE IF NOT EXISTS `crudblog` ;
USE `crudblog`;

CREATE TABLE IF NOT EXISTS `imgs` (
  `imgId` int(11) NOT NULL AUTO_INCREMENT,
  `imgNome` varchar(250) DEFAULT NULL,
  `imgNomeAleatorio` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`imgId`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE IF NOT EXISTS `infos` (
  `infoId` int(11) NOT NULL AUTO_INCREMENT,
  `infoTitulo` varchar(250) DEFAULT NULL,
  `infoCorpo` longtext DEFAULT NULL,
  `infoData` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`infoId`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE IF NOT EXISTS `noticias` (
  `noticiaId` int(11) NOT NULL AUTO_INCREMENT,
  `noticiaImgId` int(11) NOT NULL DEFAULT 0,
  `noticiaInfoId` int(11) NOT NULL DEFAULT 0,
  `noticiaUsuarioId` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`noticiaId`),
  KEY `FK_noticias_imgs` (`noticiaImgId`),
  KEY `FK_noticias_infos` (`noticiaInfoId`),
  KEY `FK_noticias_usuarios` (`noticiaUsuarioId`),
  CONSTRAINT `FK_noticias_imgs` FOREIGN KEY (`noticiaImgId`) REFERENCES `imgs` (`imgId`),
  CONSTRAINT `FK_noticias_infos` FOREIGN KEY (`noticiaInfoId`) REFERENCES `infos` (`infoId`),
  CONSTRAINT `FK_noticias_usuarios` FOREIGN KEY (`noticiaUsuarioId`) REFERENCES `usuarios` (`usuarioId`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuarioId` int(11) NOT NULL AUTO_INCREMENT,
  `usuarioNome` varchar(250) NOT NULL,
  `usuarioSenha` varchar(250) NOT NULL,
  `usuarioEmail` varchar(250) NOT NULL,
  `usuarioSexo` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`usuarioId`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


SELECT * FROM NOTICIAS INNER JOIN imgs ON noticiaImgId = imgId INNER JOIN infos ON noticiaInfoId = infoId INNER JOIN usuarios ON noticiaUsuarioId = usuarioId where noticiaUsuarioId and noticiaId 