-- MySQL dump 10.13  Distrib 5.5.27, for osx10.6 (i386)
--
-- Host: 127.0.0.1    Database: fishbow
-- ------------------------------------------------------
-- Server version	5.5.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `assunto`
--

DROP TABLE IF EXISTS `assunto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assunto` (
  `idAssunto` int(11) NOT NULL AUTO_INCREMENT,
  `idTema` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `criadoEm` datetime NOT NULL,
  `criadoPor` int(11) NOT NULL,
  `aprovadoEm` datetime NOT NULL,
  `aprovadoPor` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idAssunto`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assunto`
--

LOCK TABLES `assunto` WRITE;
/*!40000 ALTER TABLE `assunto` DISABLE KEYS */;
INSERT INTO `assunto` VALUES (1,2,'Mitos de uma startup','2014-05-30 00:00:00',1,'2014-05-30 00:00:00',1,1),(2,2,'Monetização de Aplicativos','2014-05-30 00:00:00',1,'2014-05-30 00:00:00',1,1),(3,2,'Empresa promete internet móvel a velocidade de fibra óptica','2014-05-30 00:00:00',1,'2014-05-30 00:00:00',1,1),(4,2,'Desenvolvendo para iOS','2014-05-30 00:00:00',1,'2014-05-30 00:00:00',1,1),(5,3,'Desenvolvendo para Android','2014-05-30 00:00:00',1,'2014-05-30 00:00:00',1,1),(6,3,'Relógio da Microsoft será compatível com Android e iOS','2014-05-30 00:00:00',1,'2014-05-30 00:00:00',1,1),(7,3,'Google Glass, como funciona?','2014-05-30 00:00:00',1,'2014-05-30 00:00:00',1,1),(8,3,'\"Oculus Rift\" da Samsung x Google Glass','2014-05-30 00:00:00',1,'2014-05-30 00:00:00',1,1),(9,3,'Desenvolvimento de aplicações Java','2014-05-30 00:00:00',1,'2014-05-30 00:00:00',1,1),(10,5,'Desenvolvendo para Windows Phone','2014-05-30 00:00:00',1,'2014-05-30 00:00:00',1,1),(11,5,'BitCoin','2014-05-30 00:00:00',1,'2014-05-30 00:00:00',1,1),(12,5,'Computação nas nuvens','2014-05-30 00:00:00',1,'2014-05-30 00:00:00',1,1),(13,6,'Usabilidade Web','2014-05-30 00:00:00',1,'2014-05-30 00:00:00',1,1),(14,3,'Usabilidade','2014-05-30 00:00:00',0,'2014-05-30 00:00:00',0,1),(15,3,'Usabilidade','2014-05-30 00:00:00',0,'2014-05-30 00:00:00',0,1);
/*!40000 ALTER TABLE `assunto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assuntovoto`
--

DROP TABLE IF EXISTS `assuntovoto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assuntovoto` (
  `idAssuntoVoto` int(11) NOT NULL AUTO_INCREMENT,
  `idAssunto` int(11) NOT NULL,
  `criadoEm` datetime NOT NULL,
  `criadoPor` int(11) NOT NULL,
  PRIMARY KEY (`idAssuntoVoto`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assuntovoto`
--

LOCK TABLES `assuntovoto` WRITE;
/*!40000 ALTER TABLE `assuntovoto` DISABLE KEYS */;
INSERT INTO `assuntovoto` VALUES (1,1,'2014-05-30 00:00:00',1),(2,1,'2014-05-30 00:00:00',2),(3,2,'2014-05-30 00:00:00',3);
/*!40000 ALTER TABLE `assuntovoto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tema`
--

DROP TABLE IF EXISTS `tema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tema` (
  `idTema` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `criadoEm` datetime NOT NULL,
  `criadoPor` int(11) NOT NULL,
  `aprovadoEm` datetime NOT NULL,
  `aprovadoPor` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idTema`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tema`
--

LOCK TABLES `tema` WRITE;
/*!40000 ALTER TABLE `tema` DISABLE KEYS */;
INSERT INTO `tema` VALUES (1,'Inovação','2014-05-30 00:00:00',1,'2014-05-30 00:00:00',1,1),(2,'Startups','2014-05-30 00:00:00',1,'2014-05-30 00:00:00',1,1),(3,'Desenvolvimento Android','2014-05-30 00:00:00',1,'2014-05-31 00:00:00',2,1),(5,'Desenvolvimento em IOS','2014-05-30 00:00:00',235,'2014-06-17 00:00:00',1,1),(6,'Servidores','2014-05-30 00:00:00',30,'2014-06-03 00:00:00',1,1);
/*!40000 ALTER TABLE `tema` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(80) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `rule` int(1) NOT NULL DEFAULT '2',
  `status` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'rockmedia','215eeb1c6e5cf2d6e10e9e94e48813f2dc34adf5','guilherme@rockmedia.com.br','Rockmedia',1,1,'2014-05-27 15:47:17','2014-05-30 11:39:02'),(2,'eduardobona','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','eduardobona@gmail.com','Eduardo Bona',1,1,'2014-05-30 21:27:32','2014-05-30 21:29:05');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `status' int DEFAULT 1 NOT NULL
  `criadoEm` datetime NOT NULL,
  `idCurso` int(11) NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
-- INSERT INTO `usuario` VALUES (1,'Erick Lek Lek','erikleklek@gmail.com','2014-05-01 00:00:00',1),(2,'Japinha Caipira','japinha@yahoo.com','2014-05-02 00:00:00',2),(7,'Winicius Xandy Vem Neném','winixandy@gmail.com','2014-05-30 00:00:00',2),(8,'Martinho da Villa','martilho.davilla@gmail.com','2014-05-10 00:00:00',3),(9,'Pricila','pricila@hotmail.com','2014-05-23 00:00:00',4),(10,'Rodrigo Pinduca','RoDrIgO_PiNdUcA','2014-05-22 00:00:00',5),(11,'Boninha','bonaCS@gmail.com','2014-05-24 00:00:00',24),(12,'Mussum Ipsum','mussum.ipsum@gmail.com','2014-05-17 00:00:00',7),(13,'Ciclope','ciclope@gmail.com','2014-05-11 00:00:00',8),(14,'Wolverine da Silva','wolverine.silva@gmail.com','2014-05-14 00:00:00',9),(15,'Ryu Raduquen','Ryu_Raduquen@yahoo.com','2014-05-29 00:00:00',10),(16,'Ken','ken@yahoo.com','2014-05-15 00:00:00',11),(17,'Zangief','zangief@hotmail.com','2014-05-23 00:00:00',12);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `view_assunto_voto`
--

DROP TABLE IF EXISTS `view_assunto_voto`;
/*!50001 DROP VIEW IF EXISTS `view_assunto_voto`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `view_assunto_voto` (
  `idAssunto` tinyint NOT NULL,
  `idTema` tinyint NOT NULL,
  `titulo` tinyint NOT NULL,
  `criadoEm` tinyint NOT NULL,
  `criadoPor` tinyint NOT NULL,
  `aprovadoEm` tinyint NOT NULL,
  `aprovadoPor` tinyint NOT NULL,
  `status` tinyint NOT NULL,
  `qtdevotos` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `view_tema_voto`
--

DROP TABLE IF EXISTS `view_tema_voto`;
/*!50001 DROP VIEW IF EXISTS `view_tema_voto`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `view_tema_voto` (
  `idTema` tinyint NOT NULL,
  `titulo` tinyint NOT NULL,
  `criadoEm` tinyint NOT NULL,
  `criadoPor` tinyint NOT NULL,
  `aprovadoEm` tinyint NOT NULL,
  `aprovadoPor` tinyint NOT NULL,
  `status` tinyint NOT NULL,
  `qtdevotos` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `votos`
--

DROP TABLE IF EXISTS `votos`;
/*!50001 DROP VIEW IF EXISTS `votos`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `votos` (
  `idAssunto` tinyint NOT NULL,
  `idTema` tinyint NOT NULL,
  `titulo` tinyint NOT NULL,
  `criadoEm` tinyint NOT NULL,
  `criadoPor` tinyint NOT NULL,
  `aprovadoEm` tinyint NOT NULL,
  `aprovadoPor` tinyint NOT NULL,
  `status` tinyint NOT NULL,
  `qtdevotos` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `view_assunto_voto`
--

/*!50001 DROP TABLE IF EXISTS `view_assunto_voto`*/;
/*!50001 DROP VIEW IF EXISTS `view_assunto_voto`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_assunto_voto` AS select `assunto`.`idAssunto` AS `idAssunto`,`assunto`.`idTema` AS `idTema`,`assunto`.`titulo` AS `titulo`,`assunto`.`criadoEm` AS `criadoEm`,`assunto`.`criadoPor` AS `criadoPor`,`assunto`.`aprovadoEm` AS `aprovadoEm`,`assunto`.`aprovadoPor` AS `aprovadoPor`,`assunto`.`status` AS `status`,sum((case when `assuntovoto`.`idAssuntoVoto` then 1 else 0 end)) AS `qtdevotos` from (`assunto` left join `assuntovoto` on((`assunto`.`idAssunto` = `assuntovoto`.`idAssunto`))) group by `assunto`.`idAssunto` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_tema_voto`
--

/*!50001 DROP TABLE IF EXISTS `view_tema_voto`*/;
/*!50001 DROP VIEW IF EXISTS `view_tema_voto`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_tema_voto` AS select `assunto`.`idTema` AS `idTema`,`tema`.`titulo` AS `titulo`,`tema`.`criadoEm` AS `criadoEm`,`tema`.`criadoPor` AS `criadoPor`,`tema`.`aprovadoEm` AS `aprovadoEm`,`tema`.`aprovadoPor` AS `aprovadoPor`,`tema`.`status` AS `status`,sum((case when `assuntovoto`.`idAssuntoVoto` then 1 else 0 end)) AS `qtdevotos` from ((`assunto` left join `assuntovoto` on((`assunto`.`idAssunto` = `assuntovoto`.`idAssunto`))) left join `tema` on((`assunto`.`idTema` = `tema`.`idTema`))) group by `tema`.`idTema` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `votos`
--

/*!50001 DROP TABLE IF EXISTS `votos`*/;
/*!50001 DROP VIEW IF EXISTS `votos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `votos` AS select `assunto`.`idAssunto` AS `idAssunto`,`assunto`.`idTema` AS `idTema`,`assunto`.`titulo` AS `titulo`,`assunto`.`criadoEm` AS `criadoEm`,`assunto`.`criadoPor` AS `criadoPor`,`assunto`.`aprovadoEm` AS `aprovadoEm`,`assunto`.`aprovadoPor` AS `aprovadoPor`,`assunto`.`status` AS `status`,sum((case when `assuntovoto`.`idAssuntoVoto` then 1 else 0 end)) AS `qtdevotos` from (`assunto` left join `assuntovoto` on((`assunto`.`idAssunto` = `assuntovoto`.`idAssunto`))) group by `assunto`.`idAssunto` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-06-06 19:42:39
