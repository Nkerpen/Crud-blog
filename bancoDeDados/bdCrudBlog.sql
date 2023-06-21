-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.27-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para crudblog
DROP DATABASE IF EXISTS `crudblog`;
CREATE DATABASE IF NOT EXISTS `crudblog` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `crudblog`;

-- Copiando estrutura para tabela crudblog.imgs
CREATE TABLE IF NOT EXISTS `imgs` (
  `imgId` int(11) NOT NULL AUTO_INCREMENT,
  `imgNome` varchar(250) DEFAULT NULL,
  `imgNomeAleatorio` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`imgId`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela crudblog.infos
CREATE TABLE IF NOT EXISTS `infos` (
  `infoId` int(11) NOT NULL AUTO_INCREMENT,
  `infoTitulo` varchar(250) DEFAULT NULL,
  `infoCorpo` longtext DEFAULT NULL,
  `infoData` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`infoId`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela crudblog.noticias
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

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela crudblog.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuarioId` int(11) NOT NULL AUTO_INCREMENT,
  `usuarioNome` varchar(250) NOT NULL,
  `usuarioSenha` varchar(250) NOT NULL,
  `usuarioEmail` varchar(250) NOT NULL,
  `usuarioSexo` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`usuarioId`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Exportação de dados foi desmarcado.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
