-- MySQL dump 10.13  Distrib 8.0.17, for Win64 (x86_64)
--
-- Host: localhost    Database: encuestas
-- ------------------------------------------------------
-- Server version	5.6.45-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `encuesta`
--

DROP TABLE IF EXISTS `encuesta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `encuesta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activo` tinyint(1) NOT NULL,
  `fechaDeCreacion` datetime NOT NULL,
  `nombre` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `encuesta`
--

LOCK TABLES `encuesta` WRITE;
/*!40000 ALTER TABLE `encuesta` DISABLE KEYS */;
/*!40000 ALTER TABLE `encuesta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `encuesta_contestada`
--

DROP TABLE IF EXISTS `encuesta_contestada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `encuesta_contestada` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `encuesta_id` int(11) DEFAULT NULL,
  `nombreCompleto` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2588CE2446844BA6` (`encuesta_id`),
  CONSTRAINT `FK_2588CE2446844BA6` FOREIGN KEY (`encuesta_id`) REFERENCES `encuesta` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `encuesta_contestada`
--

LOCK TABLES `encuesta_contestada` WRITE;
/*!40000 ALTER TABLE `encuesta_contestada` DISABLE KEYS */;
/*!40000 ALTER TABLE `encuesta_contestada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `opcion`
--

DROP TABLE IF EXISTS `opcion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `opcion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta_id` int(11) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL,
  `descripcion` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_97486F9631A5801E` (`pregunta_id`),
  CONSTRAINT `FK_97486F9631A5801E` FOREIGN KEY (`pregunta_id`) REFERENCES `pregunta` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opcion`
--

LOCK TABLES `opcion` WRITE;
/*!40000 ALTER TABLE `opcion` DISABLE KEYS */;
/*!40000 ALTER TABLE `opcion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permiso`
--

DROP TABLE IF EXISTS `permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permiso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` longtext COLLATE utf8_unicode_ci NOT NULL,
  `visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permiso`
--

LOCK TABLES `permiso` WRITE;
/*!40000 ALTER TABLE `permiso` DISABLE KEYS */;
/*!40000 ALTER TABLE `permiso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pregunta`
--

DROP TABLE IF EXISTS `pregunta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pregunta`
--

LOCK TABLES `pregunta` WRITE;
/*!40000 ALTER TABLE `pregunta` DISABLE KEYS */;
/*!40000 ALTER TABLE `pregunta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respuesta`
--

DROP TABLE IF EXISTS `respuesta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respuesta`
--

LOCK TABLES `respuesta` WRITE;
/*!40000 ALTER TABLE `respuesta` DISABLE KEYS */;
/*!40000 ALTER TABLE `respuesta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol_permiso`
--

DROP TABLE IF EXISTS `rol_permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rol_permiso` (
  `rol_id` int(11) NOT NULL,
  `permiso_id` int(11) NOT NULL,
  PRIMARY KEY (`rol_id`,`permiso_id`),
  KEY `IDX_BB62E2194BAB96C` (`rol_id`),
  KEY `IDX_BB62E2196CEFAD37` (`permiso_id`),
  CONSTRAINT `FK_BB62E2194BAB96C` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_BB62E2196CEFAD37` FOREIGN KEY (`permiso_id`) REFERENCES `permiso` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol_permiso`
--

LOCK TABLES `rol_permiso` WRITE;
/*!40000 ALTER TABLE `rol_permiso` DISABLE KEYS */;
/*!40000 ALTER TABLE `rol_permiso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sintesis_encuesta`
--

DROP TABLE IF EXISTS `sintesis_encuesta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sintesis_encuesta`
--

LOCK TABLES `sintesis_encuesta` WRITE;
/*!40000 ALTER TABLE `sintesis_encuesta` DISABLE KEYS */;
/*!40000 ALTER TABLE `sintesis_encuesta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `traduccion`
--

DROP TABLE IF EXISTS `traduccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `traduccion`
--

LOCK TABLES `traduccion` WRITE;
/*!40000 ALTER TABLE `traduccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `traduccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'encuestas'
--

--
-- Dumping routines for database 'encuestas'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-03-18 10:14:18
