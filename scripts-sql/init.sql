/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : encuestas

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-03-18 11:07:29
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for encuesta
-- ----------------------------
DROP TABLE IF EXISTS `encuesta`;
CREATE TABLE `encuesta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activo` tinyint(1) NOT NULL,
  `fechaDeCreacion` datetime NOT NULL,
  `nombre` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of encuesta
-- ----------------------------

-- ----------------------------
-- Table structure for encuesta_contestada
-- ----------------------------
DROP TABLE IF EXISTS `encuesta_contestada`;
CREATE TABLE `encuesta_contestada` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `encuesta_id` int(11) DEFAULT NULL,
  `nombreCompleto` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2588CE2446844BA6` (`encuesta_id`),
  CONSTRAINT `FK_2588CE2446844BA6` FOREIGN KEY (`encuesta_id`) REFERENCES `encuesta` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of encuesta_contestada
-- ----------------------------

-- ----------------------------
-- Table structure for opcion
-- ----------------------------
DROP TABLE IF EXISTS `opcion`;
CREATE TABLE `opcion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta_id` int(11) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL,
  `descripcion` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_97486F9631A5801E` (`pregunta_id`),
  CONSTRAINT `FK_97486F9631A5801E` FOREIGN KEY (`pregunta_id`) REFERENCES `pregunta` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of opcion
-- ----------------------------

-- ----------------------------
-- Table structure for permiso
-- ----------------------------
DROP TABLE IF EXISTS `permiso`;
CREATE TABLE `permiso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` longtext COLLATE utf8_unicode_ci NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of permiso
-- ----------------------------
INSERT INTO `permiso` VALUES ('1', 'Cargar Encuesta', '1', '/cargarEncuesta');
INSERT INTO `permiso` VALUES ('2', 'Ver Estadisticas', '1', '/estadisticas');

-- ----------------------------
-- Table structure for pregunta
-- ----------------------------
DROP TABLE IF EXISTS `pregunta`;
CREATE TABLE `pregunta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activo` tinyint(1) NOT NULL,
  `tipoPregunta` longtext COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sintesis` longtext COLLATE utf8_unicode_ci NOT NULL,
  `encuesta_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_AEE0E1F746844BA6` (`encuesta_id`),
  CONSTRAINT `FK_AEE0E1F746844BA6` FOREIGN KEY (`encuesta_id`) REFERENCES `encuesta` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of pregunta
-- ----------------------------

-- ----------------------------
-- Table structure for respuesta
-- ----------------------------
DROP TABLE IF EXISTS `respuesta`;
CREATE TABLE `respuesta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta_id` int(11) DEFAULT NULL,
  `opcion_id` int(11) DEFAULT NULL,
  `descripcionLibre` longtext COLLATE utf8_unicode_ci NOT NULL,
  `encuestaContestada_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6C6EC5EEAEA0A468` (`encuestaContestada_id`),
  KEY `IDX_6C6EC5EE31A5801E` (`pregunta_id`),
  KEY `IDX_6C6EC5EE5BDBF2F` (`opcion_id`),
  CONSTRAINT `FK_6C6EC5EE31A5801E` FOREIGN KEY (`pregunta_id`) REFERENCES `pregunta` (`id`),
  CONSTRAINT `FK_6C6EC5EE5BDBF2F` FOREIGN KEY (`opcion_id`) REFERENCES `opcion` (`id`),
  CONSTRAINT `FK_6C6EC5EEAEA0A468` FOREIGN KEY (`encuestaContestada_id`) REFERENCES `encuesta_contestada` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of respuesta
-- ----------------------------

-- ----------------------------
-- Table structure for rol
-- ----------------------------
DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of rol
-- ----------------------------
INSERT INTO `rol` VALUES ('1', 'administrador');
INSERT INTO `rol` VALUES ('2', 'dataentry');
INSERT INTO `rol` VALUES ('3', 'externo');

-- ----------------------------
-- Table structure for rol_permiso
-- ----------------------------
DROP TABLE IF EXISTS `rol_permiso`;
CREATE TABLE `rol_permiso` (
  `rol_id` int(11) NOT NULL,
  `permiso_id` int(11) NOT NULL,
  PRIMARY KEY (`rol_id`,`permiso_id`),
  KEY `IDX_BB62E2194BAB96C` (`rol_id`),
  KEY `IDX_BB62E2196CEFAD37` (`permiso_id`),
  CONSTRAINT `FK_BB62E2194BAB96C` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_BB62E2196CEFAD37` FOREIGN KEY (`permiso_id`) REFERENCES `permiso` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of rol_permiso
-- ----------------------------
INSERT INTO `rol_permiso` VALUES ('1', '1');
INSERT INTO `rol_permiso` VALUES ('1', '2');

-- ----------------------------
-- Table structure for sintesis_encuesta
-- ----------------------------
DROP TABLE IF EXISTS `sintesis_encuesta`;
CREATE TABLE `sintesis_encuesta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `fechaDeCreacion` datetime NOT NULL,
  `validador` longtext COLLATE utf8_unicode_ci NOT NULL,
  `json` longtext COLLATE utf8_unicode_ci NOT NULL,
  `medioDeTransporte` longtext COLLATE utf8_unicode_ci NOT NULL,
  `lugarDeEntrada` longtext COLLATE utf8_unicode_ci NOT NULL,
  `fechaDeIngreso` longtext COLLATE utf8_unicode_ci NOT NULL,
  `numeroEntrada` longtext COLLATE utf8_unicode_ci NOT NULL,
  `asientoCabina` longtext COLLATE utf8_unicode_ci NOT NULL,
  `nombreCompleto` longtext COLLATE utf8_unicode_ci NOT NULL,
  `numeroPasaporte` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sexo` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ultimosPaises` longtext COLLATE utf8_unicode_ci NOT NULL,
  `destino` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sintomas` longtext COLLATE utf8_unicode_ci NOT NULL,
  `direccionContacto` longtext COLLATE utf8_unicode_ci NOT NULL,
  `emailContacto` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ciudad` longtext COLLATE utf8_unicode_ci NOT NULL,
  `estado` longtext COLLATE utf8_unicode_ci NOT NULL,
  `telefono` longtext COLLATE utf8_unicode_ci NOT NULL,
  `personaDeContacto` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ciudadPersonaDeContacto` longtext COLLATE utf8_unicode_ci NOT NULL,
  `paisPersonaContacto` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ciudadPersonaContacto` longtext COLLATE utf8_unicode_ci NOT NULL,
  `telefonoPersonaContacto` longtext COLLATE utf8_unicode_ci NOT NULL,
  `encuestaContestada_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4A08133BDB38439E` (`usuario_id`),
  KEY `IDX_4A08133BAEA0A468` (`encuestaContestada_id`),
  CONSTRAINT `FK_4A08133BAEA0A468` FOREIGN KEY (`encuestaContestada_id`) REFERENCES `encuesta_contestada` (`id`),
  CONSTRAINT `FK_4A08133BDB38439E` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of sintesis_encuesta
-- ----------------------------

-- ----------------------------
-- Table structure for traduccion
-- ----------------------------
DROP TABLE IF EXISTS `traduccion`;
CREATE TABLE `traduccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta_id` int(11) DEFAULT NULL,
  `opcion_id` int(11) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL,
  `idioma` longtext COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2426C8E31A5801E` (`pregunta_id`),
  KEY `IDX_2426C8E5BDBF2F` (`opcion_id`),
  CONSTRAINT `FK_2426C8E31A5801E` FOREIGN KEY (`pregunta_id`) REFERENCES `pregunta` (`id`),
  CONSTRAINT `FK_2426C8E5BDBF2F` FOREIGN KEY (`opcion_id`) REFERENCES `opcion` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of traduccion
-- ----------------------------

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rol_id` int(11) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL,
  `nombre` longtext COLLATE utf8_unicode_ci NOT NULL,
  `apellido` longtext COLLATE utf8_unicode_ci NOT NULL,
  `nombreDeUsuario` longtext COLLATE utf8_unicode_ci NOT NULL,
  `contrasenia` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2265B05D4BAB96C` (`rol_id`),
  CONSTRAINT `FK_2265B05D4BAB96C` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('1', '1', '1', 'admin', 'admin', 'admin', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92');
