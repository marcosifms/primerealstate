CREATE DATABASE  IF NOT EXISTS `age37778_prime_real_state` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `age37778_prime_real_state`;
-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: age37778_prime_real_state
-- ------------------------------------------------------
-- Server version	5.7.10-log

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
-- Table structure for table `caixa`
--

DROP TABLE IF EXISTS `caixa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caixa` (
  `id_caixa` int(11) NOT NULL AUTO_INCREMENT,
  `desc_caixa` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_caixa`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caixa`
--

LOCK TABLES `caixa` WRITE;
/*!40000 ALTER TABLE `caixa` DISABLE KEYS */;
INSERT INTO `caixa` VALUES (1,'CAJA BANCO CONTINENTAL FF'),(2,'CAJA BANCO VISIÓN FF'),(3,'CAJA BANCO GNB FF'),(4,'CAJA FÍSICO FF'),(5,'CAJA BANCO CONTINENTAL PRIMEPJC'),(6,'CAJA FISICO PRIMEPJC'),(7,'CAJA BANCO GNB PRIMEASU'),(8,'CAJA FÍSICO PRIMEASU');
/*!40000 ALTER TABLE `caixa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carta_instrucoes`
--

DROP TABLE IF EXISTS `carta_instrucoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carta_instrucoes` (
  `id_carta_instrucoes` int(11) NOT NULL AUTO_INCREMENT,
  `contrato_carta` int(11) DEFAULT NULL,
  `data_geracao_carta_instrucoes` date DEFAULT NULL,
  `num_carta_instrucoes` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_carta_instrucoes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carta_instrucoes`
--

LOCK TABLES `carta_instrucoes` WRITE;
/*!40000 ALTER TABLE `carta_instrucoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `carta_instrucoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `centro_custo`
--

DROP TABLE IF EXISTS `centro_custo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `centro_custo` (
  `id_ccusto` int(11) NOT NULL AUTO_INCREMENT,
  `cod_ccusto` varchar(50) DEFAULT NULL,
  `desc_ccusto` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_ccusto`)
) ENGINE=InnoDB AUTO_INCREMENT=187 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `centro_custo`
--

LOCK TABLES `centro_custo` WRITE;
/*!40000 ALTER TABLE `centro_custo` DISABLE KEYS */;
INSERT INTO `centro_custo` VALUES (2,'1','PRIMEPJC'),(3,'2','PRIMEASU'),(5,'1.0.101','NANAWA AP. 101'),(6,'1.0.102','NANAWA AP. 102'),(7,'1.0.103','NANAWA AP. 103'),(8,'1.0.104','NANAWA AP. 104'),(9,'1.0.201','NANAWA AP. 201'),(10,'1.0.202','NANAWA AP. 202'),(11,'1.0.203','NANAWA AP. 203'),(12,'1.0.204','NANAWA AP. 204'),(13,'1.0.205','NANAWA AP. 205'),(14,'1.0.206','NANAWA AP. 206'),(15,'1.0.301','NANAWA AP. 301'),(16,'1.0.302','NANAWA AP. 302'),(17,'1.0.303','NANAWA AP. 303'),(18,'1.0.304','NANAWA AP. 304'),(19,'1.0.305','NANAWA AP. 305'),(20,'1.0.306','NANAWA AP. 306'),(21,'1.0.401','NANAWA AP. 401'),(22,'1.0.402','NANAWA AP. 402'),(23,'1.0.403','NANAWA AP. 403'),(24,'1.0.404','NANAWA AP. 404'),(25,'1.0.405','NANAWA AP. 405'),(26,'1.0.406','NANAWA AP. 406'),(27,'1.BL.BV102','EDF. BUZIOS AP. 102'),(28,'1.BL.BV105','EDF. BUZIOS AP. 105'),(29,'1.BL.BV302','EDF. BUZIOS AP. 302'),(30,'1.BL.BV304','EDF. BUZIOS AP. 304'),(31,'1.TB.L100','TERRENO BLUE LAGOON M22 L6 '),(32,'1.TB.L101','TERRENO BLUE LAGOON M22 L4'),(33,'1.TB.L103','TERRENO BLUE LAGOON M24 L12'),(34,'1.BL.BA102','EDF. BUZIOS AP. 102'),(35,'1.BL.BA105','EDF. BUZIOS AP. 105'),(36,'1.BL.BA302','EDF. BUZIOS AP. 302'),(37,'1.BL.BA304','EDF. BUZIOS AP. 304'),(38,'1.CV.100','CASA MAURICIO'),(39,'1.CV.101','CASA KHALIL'),(40,'1.CV.102','YOLANDA  I CASA 01 SÃO JOÃO'),(41,'1.CV.103','YOLANDA I CASA 02 PARQUE DOS ERVAIS'),(42,'1.CV.104','ADRIANO I CASA'),(43,'1.CV.105','CASA SANDRA'),(44,'1.CV.106','SILVIA TEREZINHA I CASA'),(45,'1.CV.107','CASA SERGIO'),(46,'1.CV.108','CASA MIGUEL'),(47,'1.CV.109','CASA OSMAR'),(48,'1.CV.110','CASA MARCIA'),(49,'1.CV.111','PAULO MONTEIRO I CASA'),(50,'1.CA.100','CASA MAURICIO'),(51,'1.CA.101','BOUTROS I CASA'),(52,'1.CA.102','CARMEN FRANCO I CASA'),(53,'1.CA.103','MARTIN BAEZ I CASA'),(54,'1.CA.104','FLAVIA ROSIANE I CASA'),(55,'1.T.100','TERRENO RUTA V'),(56,'1.T.101','TERRENO ARMAZEM'),(57,'1.T.102','TERRENO EBS'),(58,'1.T.103','TERRENO EBS'),(59,'1.T.104','TERRENO EBS'),(60,'1.T.105','TERRENO EBS'),(61,'1.T.106','TERRENO EBS'),(62,'1.T.107','TERRENO BR 463 KHALIL'),(63,'1.DV.100','DEPOSITO ERNANDI'),(64,'1.11.I','UTCD I SALAO'),(65,'1.12.01','WALDEMAR COGO I SALAO'),(66,'1.13.S01','FRANCISCA ALEJANDRA I SALAO 01'),(67,'1.13.S03','FRANCISCA ALEJANDRA I SALAO 03'),(68,'1.14.03','MARCELO BRUM I TRIPLEX'),(69,'1.1.01','CERRO LEON AP. 01'),(70,'1.1.02','CERRO LEON AP. 02'),(71,'1.1.03','CERRO LEON AP. 03'),(72,'1.1.04','CERRO LEON AP. 04'),(73,'1.1.05','CERRO LEON AP. 05'),(74,'1.1.06','CERRO LEON AP. 06'),(75,'1.1.07','CERRO LEON AP. 07'),(76,'1.1.08','CERRO LEON AP. 08'),(77,'1.1.09','CERRO LEON AP. 09'),(78,'1.1.10','CERRO LEON AP. 10'),(79,'1.1.11','CERRO LEON AP. 11'),(80,'1.1.12','CERRO LEON AP. 12'),(81,'1.2.B1101','LAS PALMAS B01 AP. 101'),(82,'1.2.B1102','LAS PALMAS B01 AP. 102'),(83,'1.2.B1201','LAS PALMAS B01 AP. 201'),(84,'1.2.B1202','LAS PALMAS B01 AP. 202'),(85,'1.2.B2101','LAS PALMAS B02 AP. 101'),(86,'1.2.B2102','LAS PALMAS B02 AP. 102'),(87,'1.2.B2201','LAS PALMAS B02 AP. 201'),(88,'1.2.B2202','LAS PALMAS B02 AP. 202'),(89,'1.2.B3101','LAS PALMAS B03 AP. 101'),(90,'1.2.B3102','LAS PALMAS B03 AP. 102'),(91,'1.2.B3201','LAS PALMAS B03 AP. 201'),(92,'1.2.B3202','LAS PALMAS B03 AP. 202'),(93,'1.2.B4101','LAS PALMAS B04 AP. 101'),(94,'1.2.B4102','LAS PALMAS B04 AP. 102'),(95,'1.2.B4201','LAS PALMAS B04 AP. 201'),(96,'1.2.B4202','LAS PALMAS B04 AP. 202'),(97,'1.3.01','PRIME RESIDENCE AP. 01'),(98,'1.3.02','PRIME RESIDENCE AP. 02'),(99,'1.3.03','PRIME RESIDENCE AP. 03'),(100,'1.3.04','PRIME RESIDENCE AP. 04'),(101,'1.4.S03','CARLOS WINCKLER I SALAO 03'),(102,'1.4.S04','CARLOS WINCKLER I SALAO 04'),(103,'1.4.S01','CARLOS WINCKLER I SALAO 01'),(104,'1.4.S02','CARLOS WINCKLER I SALAO 02'),(105,'1.4.A01','CARLOS WINCKLER I APTO 01'),(106,'1.4.A02','CARLOS WINCKLER I APTO 02'),(107,'1.4.A03','CARLOS WINCKLER I APTO 03'),(108,'1.4.A04','CARLOS WINCKLER I APTO 04'),(109,'1.5.01','RESIDENCIAL RESQUIN AP. 01'),(110,'1.5.02','RESIDENCIAL RESQUIN AP. 02'),(111,'1.5.03','RESIDENCIAL RESQUIN AP. 03'),(112,'1.5.04','RESIDENCIAL RESQUIN AP. 04'),(113,'1.5.05','RESIDENCIAL RESQUIN AP. 05'),(114,'1.5.06','RESIDENCIAL RESQUIN AP. 06'),(115,'1.6.A203','EDF. ALBORADA AP. 203'),(116,'1.7.101','CONDOMINIO MONIQUE DORNELES AP. 101'),(117,'1.8.02','RESIDENCIAL NADIELY AP. 02'),(118,'1.9.02','RESIDENCIAL R.B AP. 02'),(119,'1.10.08','DON NOTY AP. 08'),(120,'1.10.18','DON NOTY AP. 18'),(121,'1.9.01','RESIDENCIAL R.B AP. 01'),(122,'1.9.03','RESIDENCIAL R.B AP. 03'),(123,'1.9.04','RESIDENCIAL R.B AP. 04'),(124,'1.10.01','DON NOTY AP. 01'),(125,'1.10.02','DON NOTY AP. 02'),(126,'1.10.03','DON NOTY AP. 03'),(127,'1.10.04','DON NOTY AP. 04'),(128,'1.10.05','DON NOTY AP. 05'),(129,'1.10.07','DON NOTY AP. 07'),(130,'1.10.06','DON NOTY AP. 06'),(131,'1.10.09','DON NOTY AP. 09'),(132,'1.10.10','DON NOTY AP. 10'),(133,'1.10.11','DON NOTY AP. 11'),(134,'1.10.12','DON NOTY AP. 12'),(135,'1.10.13','DON NOTY AP. 13'),(136,'1.10.14','DON NOTY AP. 14'),(137,'1.10.15','DON NOTY AP. 15'),(138,'1.10.16','DON NOTY AP. 16'),(139,'1.10.17','DON NOTY AP. 17'),(140,'1.10.19','DON NOTY AP. 19'),(141,'1.10.20','DON NOTY AP. 20'),(142,'1.6.A201','EDF. ALBORADA AP. 201'),(143,'1.6.A202','EDF. ALBORADA AP. 202'),(144,'1.6.A204','EDF. ALBORADA AP. 204'),(145,'1.6.A205','EDF. ALBORADA AP. 205'),(146,'1.6.A205','EDF. ALBORADA AP. 205'),(147,'1.6.A301','EDF. ALBORADA AP. 301'),(148,'1.6.A302','EDF. ALBORADA AP. 302'),(149,'1.6.A303','EDF. ALBORADA AP. 303'),(150,'1.6.A304','EDF. ALBORADA AP. 304'),(151,'1.6.A305','EDF. ALBORADA AP. 305'),(152,'1.8.01','RESIDENCIAL NADIELY AP. 01'),(153,'1.8.03','RESIDENCIAL NADIELY AP. 03'),(154,'1.7.102','CONDOMINIO MONIQUE DORNELES AP. 102'),(155,'1.15.01','PEDRINHO CHICOSKI I APTO.'),(156,'1.13.S02','FRANCISCA ALEJANDRA I SALAO 02'),(157,'1.16.01','ORLANDO JAVIER I SALAO'),(158,'1.7.201','CONDOMINIO MONIQUE DORNELES AP. 201'),(159,'1.7.202','CONDOMINIO MONIQUE DORNELES AP. 202'),(160,'1.7.203','CONDOMINIO MONIQUE DORNELES AP. 203'),(161,'1.7.204','CONDOMINIO MONIQUE DORNELES AP. 204'),(162,'1.7.301','CONDOMINIO MONIQUE DORNELES AP. 301'),(163,'1.7.302','CONDOMINIO MONIQUE DORNELES AP. 302'),(164,'1.7.303','CONDOMINIO MONIQUE DORNELES AP. 303'),(165,'1.7.304','CONDOMINIO MONIQUE DORNELES AP. 304'),(166,'1.7.401','CONDOMINIO MONIQUE DORNELES AP. 401'),(167,'1.7.402','CONDOMINIO MONIQUE DORNELES AP. 402'),(168,'1.7.403','CONDOMINIO MONIQUE DORNELES AP. 201'),(169,'1.CVA01','TRIPLEX ANAHI'),(170,'1.17V.703','TETRYZ APTO. 703'),(171,'1.17V.104','TETRYZ APTO. 104'),(172,'1.17V.203','TETRYZ APTO. 203'),(173,'1.17V.401','TETRYZ APTO. 401'),(174,'1.CA.105','RICARDO ESCOBAR I CASA '),(175,'1.CV.114','RENAN I CASA'),(176,'1.CV.112','ELISA I CASA'),(177,'2.0.01','KUARAHY CENTER I PISO 01'),(178,'1.1.18','DPTO 303 AUGUSTINA'),(179,'1.DA.100','DEPOSITO EMPORIO COMERCIAL'),(180,'1.11.P','UTCD I SALAO'),(181,'1.T.108','TERRENO JARDIN AURORA'),(182,'1.T.109','TERRENO JARDIN AURORA'),(183,'1.T.110','TERRENO JARDIN AURORA'),(184,'1.T.111','TERRENO JARDIN AURORA'),(185,'1.T.112','TERRENO JARDIN AURORA'),(186,'1.CV.113','CASA MARIA VITORIA');
/*!40000 ALTER TABLE `centro_custo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_tipo` int(11) NOT NULL DEFAULT '0',
  `enquadramento_cliente` int(11) NOT NULL DEFAULT '0',
  `nome_cliente` varchar(200) DEFAULT NULL,
  `data_nascimento_cliente` date DEFAULT NULL,
  `estado_civil_cliente` varchar(200) DEFAULT NULL,
  `cpf_cnpj_cliente` varchar(15) DEFAULT NULL,
  `rg_ci_cliente` varchar(15) DEFAULT NULL,
  `endereco_cliente` varchar(200) DEFAULT NULL,
  `numero_cliente` varchar(10) DEFAULT NULL,
  `bairro_cliente` varchar(50) DEFAULT NULL,
  `cidade_cliente` varchar(50) DEFAULT NULL,
  `estado_cliente` varchar(50) DEFAULT NULL,
  `pais_cliente` varchar(50) DEFAULT NULL,
  `contato_cliente` varchar(50) DEFAULT NULL,
  `contato_cliente2` varchar(50) DEFAULT NULL,
  `whatsapp_cliente` varchar(50) DEFAULT NULL,
  `instagram_cliente` varchar(100) DEFAULT NULL,
  `email_cliente` varchar(50) DEFAULT NULL,
  `observacao_cliente` mediumtext,
  `resp_contrato_cliente` varchar(100) DEFAULT NULL,
  `adm_cliente` varchar(100) DEFAULT NULL,
  `data_nascimento_resp_contrato` date DEFAULT NULL,
  `rg_resp_contrato` varchar(50) DEFAULT NULL,
  `whatsapp_resp_contrato` varchar(50) DEFAULT NULL,
  `email_resp_contrato` varchar(50) DEFAULT NULL,
  `instagram_resp_contrato` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (13,1,1,'ROBERSON LOPES EZEQUIEL','1983-09-10','SOLTERO','952.882.361-00','973222','JUANA DE LARA','-','CENTRO','PEDRO JUAN CABALLERO','AMAMBAY','PARAGUAY','+55 67 91980686','','+55 67 91980686','','nulo@hotmail.com','','',NULL,'0000-00-00','','','',''),(15,1,1,'GLORIA ELIZABETH ESCOBAR DE GONZALEZ','1972-11-24','SOLTEIRA','','1623201','COND. BLUE LAGOON DPTO 205','205','COND. BLUE LAGOON','PEDRO JUAN CABALLERO','AMAMBAY','PARAGUAI','+595971687060','','+595971687060','','nulo@hotmail.com','','',NULL,'0000-00-00','','','',''),(16,2,1,'THAIS LOPES PIEROTE VIERA','1986-08-26','SOLTEIRA','112096847-05','8433588','AVENIDA PANAMA','290','-','IVINHEMA','MATO GROSSO DO SUL','BRASIL','-','','','','nulo@hotmail.com','','',NULL,'0000-00-00','','','',''),(17,2,1,'MARCELO BRUM CANTO','1974-08-08','CASADO','54104572187','388438277','','','','','','','','','','','','','',NULL,'0000-00-00','','','',''),(18,2,1,'SILVIA TEREZINHA MOREIRA','0001-01-01','SOLTEIRA','','338568','','','','','','','','','','','','','',NULL,'0000-00-00','','','',''),(20,2,1,'WALDEMAR COGO','0001-01-01','CASADO','','3.352.259','','','','','','','','','','','','','',NULL,'0000-00-00','','','',''),(21,2,1,'NADIELY VILALBA MATOS','1997-02-26','SOLTEIRA','03868252118','2005341','','','','','','','','','','','','','',NULL,'0000-00-00','','','',''),(22,1,1,'RENNER MALAQUIAS DE OLIVEIRA','0001-01-01','SOLTEIRO','03868252118','3509873','','','','','','','','','','','','','',NULL,'0000-00-00','','','',''),(23,2,1,'PEDRINHO SELCO CHICOSKI','0001-01-01','CASADO','','5419644','','','','','','','','','','','','','',NULL,'0000-00-00','','','',''),(24,2,1,'NERY MARTIN BAEZ MARTINEZ','1993-06-11','SOLTEIRO','','4384746','','','','','','','','','','','','','',NULL,'0000-00-00','','','',''),(25,2,1,'MIGUEL GILL SALINAS','1968-03-14','CASADO','','1102257','','','','','','','','','','','','','',NULL,'0000-00-00','','','',''),(27,2,1,'MAURICIO BORTOLIN FORTE','0001-01-01','SOLTEIRO','','001819799','','','','','','','','','','','','','',NULL,'0000-00-00','','','',''),(28,2,1,'LABIRE ESTHER ESGAIB KAYATT','0001-01-01','CASADA','','046069','','','','','','','','','','','','','',NULL,'0000-00-00','','','',''),(29,2,2,'KHAEL CONSTRUTORA E INCORPORADORA LTDA','0000-00-00','','20512162000116','','RUA ANTONIO JOAO','610','CENTRO','PONTA PORA','MATO GROSSO DO SUL','BRASIL','0000000000','','','','','','',NULL,'0001-01-01','','','',''),(31,2,1,'JUANA ELIZA GONZALEZ GAYOSO','1974-06-24','CASADA','','2929095','','','','','','','','','','','','','',NULL,'0000-00-00','','','',''),(32,1,1,'JOSE URBANO GOMES DE MORAIS','1990-07-28','SOLTEIRO','','001.714.197','RUA PELOTAS','-','CORENEL ANTONINO','CAMPO GRANDE','MS','BRASIL','+55 67 9177 2015','','','','nulo@hotmail.com','','',NULL,'0000-00-00','','','',''),(33,2,1,'RAFHAEL WINCKLER RODRIGUES','0001-01-01','CASADO','','4920080','','','','','','','','','','','','','',NULL,'0000-00-00','','','',''),(34,1,1,'JESSILY GABRIELY GONZALEZ BULKA','2000-06-09','SOLTEIRA','','6722903','','','','','','','','','','','','','',NULL,'0000-00-00','','','',''),(35,2,1,'ORLANDO JAVIER DENIS','0001-01-01','CASADO','','4795669','','','','','','','','','','','','','',NULL,'0000-00-00','','','',''),(36,2,1,'DANIELA BEATRIZ ALFONSO ESQUIVEL','0001-01-01','CASADA','','3808965','','','','','','','','','','','','','',NULL,'0000-00-00','','','',''),(37,2,1,'GUILLERMO GABRIEL FRUTOS RESQUIN','0001-01-01','SOLTEIRO','','3586860','','','','','','','','','','','','','',NULL,'0000-00-00','','','',''),(38,1,1,'BRENDON SOARES BORGES','0001-01-01','SOLTEIRO','03843723257','1393033','','','','','','','','','','','','','',NULL,'0000-00-00','','','',''),(39,2,1,'FLAVIA ROSIANE ESTIGARRIBIA SORIA','0001-01-01','CASADA','','8312000','','','','','','','','','','','','','',NULL,'0000-00-00','','','',''),(40,1,1,'SADY PAOLA CALONGA EL HAGE','0001-01-01','SOLTEIRA','','3759540','','','','','','','','','','','','','',NULL,'0000-00-00','','','',''),(41,2,1,'EUSTACIO DOMINGUEZ GONZALEZ','0001-01-01','CASADA','','672589','','','','','','','','','','','','','',NULL,'0000-00-00','','','',''),(42,2,1,'ERNANDI TORRES DE LEMOS','1971-06-01','CASADO','08145995752','091522003','','','','','','','','','','','','','',NULL,'0000-00-00','','','',''),(43,1,1,'CRISTHIAN DAVID QUEVERO MEDINA','1995-02-21','SOLTEIRO','','3985137','','','','','','','','','','','','','',NULL,'0000-00-00','','','',''),(44,2,1,'CARLOS ANTONIO WINCKLER QUINTANA','1963-03-24','CASADO','','816574','','','','','','','','','','','','','',NULL,'0000-00-00','','','',''),(45,1,1,'BRUNO LAFARJA SALINAS','1991-08-12','CASADO','','3172670','','','','','','','','','','','','','',NULL,'0000-00-00','','','',''),(46,1,1,'RODY JOEL ZARACHO FERREIRA','0001-01-01','SOLTEIRO','','5747516','','','','','','','','','','','','','',NULL,'0000-00-00','','','',''),(47,2,1,'BOUTROS MEZHER','0001-01-01','CASADO','','7059464','','','','','','','','','','','','','',NULL,'0000-00-00','','','',''),(48,1,1,'THIAGO CAPOANI MEINE','0001-01-01','SOLTEIRO','','6821394','','','','','','','','','','','','','',NULL,'0000-00-00','','','',''),(49,1,1,'ANNA PAULA DANTAS DOS SANTOS','0001-01-01','SOLTEIRA','','21074945','','','','','','','','','','','','','',NULL,'0000-00-00','','','',''),(50,1,1,'GUSTAVO DE SOUZA DA SILVA','2001-02-11','SOLTERO','06091448200','1595215','RUA JOAO DE OLIVEIRA, 795','795','JARDIM BANDEIRANTES','OURO PRETO DO OESTE','RO','BRASIL','+556992819934','','+556992819934','','','','',NULL,'0000-00-00','','','',''),(51,2,1,'ANTONIA RAMONA BRITES DE CANDIA','0001-01-01','VIUVA','','3.000.971','CALLER CERRO LEÓN Y ALBERDI','','CENTRO','PEDRO JUAN CABALLERO','AMAMBAY','PARAGUAI','+595 971 987 150','','+595 971 987 150','','','','',NULL,'0000-00-00','','','',''),(52,1,1,'ARLENNE SANDEY MARÇAL','1981-01-17','SOLTERA','','097278-1','RUA MARIANO PIRES DE CAMPOS','1575','SÃO JOSE','PONTES E LACERDA','MS','BRASIL','','','','','','','',NULL,'0000-00-00','','','',''),(53,1,1,'BRUNA RAFAELA DE SOUZA','0001-01-01','SOLTERA','098.867.929-90','13.358.064-6','CALLE BRASILIA','206','CENTRO','COLORADO','PR','BRASIL','','','','','','','',NULL,'0000-00-00','','','',''),(54,1,1,'DEBORAH CRISTINA VERON DE JALES','1995-12-12','SOLTERA','','1.270502','CALLE TENIENTE HERRERO, DPTO 01','163','JARDIN SAN ANTONIO','PEDRO JUAN CABALLERO','AMAMBAY','PARAGUAY','','','','','','','',NULL,'0000-00-00','','','',''),(55,1,1,'TAINARA MENDES DA SILVA','0001-01-01','SOLTERA','801.474.169-22','15.432.758-5','RUA POUSO ALEGRE','163','CENTRO','CALIFORNIA','PR','BRASIL','','','','','','','',NULL,'0000-00-00','','','',''),(56,1,1,'YSIS VALERIA GONZALEZ SANABRIA','0001-01-01','SOLTERA','','4.571.818','CARLOS ANTONIO LOPEZ','','GENERAZ DIAZ','PEDRO JUAN CABALLERO','','','','','','','','','',NULL,'0000-00-00','','','',''),(57,1,1,'KARINE SILVA DE OLIVEIRA','2002-09-18','SOLTERA','54.370.066.233','160.774-5','CALLE ACAÍ','4413','VALE DO PARAISO','OURO PRETO DO OESTE','RO','BRASIL','','','','','','','',NULL,'0000-00-00','','','',''),(58,1,1,'LUIZ HENRIQUE CARVALHO CAMILOTTI','1997-09-20','SOLTERO','039.785.051-42','1402729','RUA MONTE ALEGRE, 987','','JARDIN TROPICAL','DOURADOS','MS','BRASIL','0','','','','nulo@hotmail.com','','',NULL,'0000-00-00','','','',''),(59,2,1,'FRANCISCA AJEJANDRA GONZALEZ DE AYALA','1965-04-20','CASADA','','1.001.525','AQUIDABAN E/ 15 DE AGOSTO Y CNEL. MARTINEZ','','BERNADINO CABALLERO','PEDRO JUAN CABALLERO','AMAMBAY','PARAGUAI','','','','','','','',NULL,'0000-00-00','','','',''),(60,1,1,'JOÃO MANOEL MODESTO BARBOSA','2002-08-13','CASADO','050.098.831-55','1.447.145','SÃO FRANCISCO','','BARROS','ARAGUAINA','TO','BRASIL','(63) 99105-9852','','(63) 99105-9852','','','','',NULL,'0000-00-00','','','',''),(61,1,1,'NIARA LINS BEZERRA','1992-04-26','SOLTERA','089.575.284-07','3308151','MARIA DA PENHA RIBEIRO LIMA, 59','','BESSA','JOAO PESSOA','PB','BRASIL','','','','','','','',NULL,'0000-00-00','','','',''),(63,1,1,'KAREN LORENA GONZALEZ BAEZ','1983-03-15','CASADA','','Z567904-E','RUA DIAS DE GUZMAN','','JARDIM AURORA','PEDRO JUAN CABALLERO','AMAMBAY','PARAGUAI','+595 971 623 077','','+595 971 623 077','','','','',NULL,'0000-00-00','','','',''),(64,1,1,'KAREN LORENA GONZALEZ BAEZ','1983-03-15','CASADA','','Z567904-E','RUA DIAS DE GUZMAN','','JARDIM AURORA','PEDRO JUAN CABALLERO','AMAMBAY','PARAGUAI','+595 971 623 077','','+595 971 623 077','','','','',NULL,'0000-00-00','','','',''),(65,2,2,'RONIA S.A','0000-00-00','','801.038.41-3','','15 DE AGOSTO E/ TERESA ROA Y JOVENES POR LA DEMOCRACIA','','VIRGEN DE CAACUPE','PEDRO JUAN CABALLERO','AMAMBAY','PARAGUAI','0000000000','','','','','','DORIS IRMA GONZALEZ RODRIGUEZ',NULL,'0001-01-01','927.100','','',''),(66,1,1,'ROUSEBERK ERNANE SIQUEIRA','0001-01-01','CASADO','038.338.316-18','365365713','AVENIDA JACARANDÁ, 20','','AGUAS CLARAS','BRASILIA','D.F','BRASIL','','','','','','','',NULL,'0000-00-00','','','',''),(67,1,1,'ROUSEBERK ERNANE SIQUEIRA','0001-01-01','CASADO','038.338.316-18','365365713','AVENIDA JACARANDÁ, 20','','AGUAS CLARAS','BRASILIA','D.F','BRASIL','','','','','','','',NULL,'0000-00-00','','','',''),(68,1,1,'ROUSEBERK ERNANE SIQUEIRA','0001-01-01','CASADO','038.338.316-18','365365713','AVENIDA JACARANDÁ, 20','','AGUAS CLARAS','BRASILIA','D.F','BRASIL','','','','','','','',NULL,'0000-00-00','','','',''),(69,1,1,'GABRIELA BEZERRA DE QUEIROZ','0001-01-01','SOLTERA','084.505.611-59','2400728','FRANCISCO GOMES PEREIRA, 447','','PLANALTO','DEODÁPOLIS','MS','BRASIL','','','','','','','',NULL,'0000-00-00','','','',''),(70,2,1,'JULIO CESAR DA SILVA FERREIRA','1985-06-24','SOLTERO','726.494.451-49','03707274248','RUA JOSÉ CARPES, 85','','CENTRO','PONTA PORÃ','MS','BRASIL','+55 (67) 99240-4600','','+55 (67) 99240-4600','','','','',NULL,'0000-00-00','','','','');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contratos`
--

DROP TABLE IF EXISTS `contratos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contratos` (
  `id_contrato` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_contrato` int(11) DEFAULT NULL,
  `imovel_contrato` int(11) DEFAULT NULL,
  `tipo_contrato` int(11) DEFAULT NULL,
  `cliente_locatario` int(11) DEFAULT NULL,
  `inicio_vigencia_contrato` date DEFAULT NULL,
  `fim_vigencia_contrato` date DEFAULT NULL,
  `tipo_moeda_contrato` int(11) DEFAULT NULL,
  `valor_total_contrato` float(10,2) DEFAULT NULL,
  `qtd_parcelas_contrato` int(11) DEFAULT NULL,
  `valor_parcela_contrato` float(10,2) DEFAULT NULL,
  `garantia_contrato` float(10,2) DEFAULT NULL,
  `taxa_adm_contrato` float(10,2) DEFAULT NULL,
  `comissao_contrato` float(10,2) DEFAULT NULL,
  `data_contrato` date DEFAULT NULL,
  PRIMARY KEY (`id_contrato`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contratos`
--

LOCK TABLES `contratos` WRITE;
/*!40000 ALTER TABLE `contratos` DISABLE KEYS */;
INSERT INTO `contratos` VALUES (1,35,2,1,34,'2021-04-20','2022-09-20',1,2300000.00,18,230000.00,2300000.00,0.00,300000.00,'2021-04-20');
/*!40000 ALTER TABLE `contratos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enquadramento_cliente`
--

DROP TABLE IF EXISTS `enquadramento_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enquadramento_cliente` (
  `id_enquadramento` int(11) NOT NULL AUTO_INCREMENT,
  `nome_enquadramento` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_enquadramento`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enquadramento_cliente`
--

LOCK TABLES `enquadramento_cliente` WRITE;
/*!40000 ALTER TABLE `enquadramento_cliente` DISABLE KEYS */;
INSERT INTO `enquadramento_cliente` VALUES (1,'Pessoa Física'),(2,'Pessoa Jurídica');
/*!40000 ALTER TABLE `enquadramento_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fornecedores`
--

DROP TABLE IF EXISTS `fornecedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fornecedores` (
  `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_fornecedor` int(11) DEFAULT NULL,
  `classe_fornecedor` int(11) DEFAULT NULL,
  `produto_servico_fornecedor` varchar(200) DEFAULT NULL,
  `nome_razao_social_fornecedor` varchar(200) DEFAULT NULL,
  `rg_fornecedor` varchar(15) DEFAULT NULL,
  `cpf_fornecedor` varchar(15) DEFAULT NULL,
  `cnpj_fornecedor` varchar(15) DEFAULT NULL,
  `data_nascimento_fornecedor` date DEFAULT NULL,
  `estado_civil_fornecedor` varchar(50) DEFAULT NULL,
  `endereco_fornecedor` varchar(200) DEFAULT NULL,
  `bairro_fornecedor` varchar(50) DEFAULT NULL,
  `cidade_fornecedor` varchar(50) DEFAULT NULL,
  `estado_fornecedor` varchar(50) DEFAULT NULL,
  `pais_fornecedor` varchar(50) DEFAULT NULL,
  `telefone_fornecedor` varchar(50) DEFAULT NULL,
  `whatsapp_fornecedor` varchar(50) DEFAULT NULL,
  `email_fornecedor` varchar(50) DEFAULT NULL,
  `instagram_fornecedor` varchar(200) DEFAULT NULL,
  `representande_legal_fornecedor` varchar(200) DEFAULT NULL,
  `rg_representande_legal_fornecedor` varchar(20) DEFAULT NULL,
  `data_nascimento_representande_legal_fornecedor` date DEFAULT NULL,
  `whatsapp_representande_legal_fornecedor` varchar(20) DEFAULT NULL,
  `email_representande_legal_fornecedor` varchar(100) DEFAULT NULL,
  `instagram_representande_legal_fornecedor` varchar(100) DEFAULT NULL,
  `observacoes_fornecedor` mediumtext,
  PRIMARY KEY (`id_fornecedor`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fornecedores`
--

LOCK TABLES `fornecedores` WRITE;
/*!40000 ALTER TABLE `fornecedores` DISABLE KEYS */;
INSERT INTO `fornecedores` VALUES (1,1,1,'Teste','Gustavo Lacerda','989219832','12356588909',NULL,'1984-06-08','Divorciado','Rua A','Centro','Volta Redonda','teste','Brazil','2499967078','2499967078','gustavo@appbox.com.br','',NULL,NULL,NULL,NULL,NULL,NULL,'');
/*!40000 ALTER TABLE `fornecedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imoveis`
--

DROP TABLE IF EXISTS `imoveis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imoveis` (
  `id_imovel` int(11) NOT NULL AUTO_INCREMENT,
  `imovel_tipo` varchar(50) DEFAULT NULL,
  `proprietario_imovel` int(11) DEFAULT NULL,
  `captador_imovel` int(11) DEFAULT NULL,
  `referencia_imovel` varchar(50) DEFAULT NULL,
  `operacao_imovel` varchar(50) DEFAULT NULL,
  `endereco_imovel` varchar(100) DEFAULT NULL,
  `bairro_imovel` varchar(100) DEFAULT NULL,
  `cidade_imovel` varchar(100) DEFAULT NULL,
  `estado_imovel` varchar(50) DEFAULT NULL,
  `pais_imovel` varchar(50) DEFAULT NULL,
  `matricula_imovel` varchar(50) DEFAULT NULL,
  `conta_corrente_imovel` varchar(50) DEFAULT NULL,
  `tipo_construcao_imovel` varchar(50) DEFAULT NULL,
  `centro_custo_imovel` int(11) DEFAULT NULL,
  `fracao_imovel` varchar(50) DEFAULT NULL,
  `valor_aluguel_imovel` varchar(50) DEFAULT NULL,
  `valor_venda_imovel` varchar(50) DEFAULT NULL,
  `valor_garantia_imovel` varchar(50) DEFAULT NULL,
  `destino_garantia_imovel` varchar(50) DEFAULT NULL,
  `administracao_imovel` varchar(50) DEFAULT NULL,
  `comissao_aluguel_imovel` varchar(50) DEFAULT NULL,
  `comissao_venda_imovel` varchar(50) DEFAULT NULL,
  `descricao_imovel` mediumtext,
  `condominio_imovel` varchar(50) DEFAULT NULL,
  `nome_condominio_imovel` varchar(50) DEFAULT NULL,
  `administrador_imovel` varchar(50) DEFAULT NULL,
  `data_nascimento_adm_imovel` date DEFAULT NULL,
  `wpp_adm_imovel` varchar(50) DEFAULT NULL,
  `email_adm_imovel` varchar(50) DEFAULT NULL,
  `instagram_adm_imovel` varchar(50) DEFAULT NULL,
  `cct_cadastral_imovel` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_imovel`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imoveis`
--

LOCK TABLES `imoveis` WRITE;
/*!40000 ALTER TABLE `imoveis` DISABLE KEYS */;
INSERT INTO `imoveis` VALUES (2,'SALÓN COMERCIAL',35,5,'206   ','Alquiler','CERRO LEÓN C/ JOSÉ DE JESUS MARTINEZ','CENTRO','PEDRO JUAN CABALLERO','AMAMBAY','PARAGUAY','','','ALVENARIA',5,NULL,'2300000','0','2300000','Propietário','Sín Tasa de Administración','Sín comisión','Over Price','<p>G$ 300.000 de comisión</p>','Não','-','-','0001-01-01','','','',''),(3,'CASA',27,3,'251 ','Venta','RUA SÃO PEDRO ','MOOCA','PONTA PORÃ','MS','BRASIL','','','ALVENARIA',5,NULL,'0','1.650.000,00','0','','Sín Tasa de Administración','Sín comisión','5,00% s/ el Monto','','No','0','-','0001-01-01','','-','','');
/*!40000 ALTER TABLE `imoveis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lancamentos`
--

DROP TABLE IF EXISTS `lancamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lancamentos` (
  `id_lancamento` int(11) NOT NULL AUTO_INCREMENT,
  `lancamento_tipo` int(11) NOT NULL DEFAULT '0',
  `data_lancamento` date NOT NULL,
  `mes_lancamento` char(2) DEFAULT NULL,
  `ano_lancamento` char(4) DEFAULT NULL,
  `moeda_lancamento` int(11) DEFAULT NULL,
  `valor_lancamento` float(10,2) DEFAULT NULL,
  `fornecedor_lancamento` int(11) DEFAULT NULL,
  `cc_custo_conta_lancamento` int(11) DEFAULT NULL,
  `caixa_lancamento` int(11) DEFAULT NULL,
  `num_doc_lancamento` varchar(50) DEFAULT NULL,
  `descricao_lancamento` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id_lancamento`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lancamentos`
--

LOCK TABLES `lancamentos` WRITE;
/*!40000 ALTER TABLE `lancamentos` DISABLE KEYS */;
INSERT INTO `lancamentos` VALUES (1,1,'2022-02-06','02','2022',3,1000.00,5,3,7,'17800-1','<p>Pago de servicios ref. contrato 290/2021. Cuota 01/02.</p>'),(2,1,'2022-02-06','02','2022',3,1000.00,5,3,7,'17800-1','<p>Pago de servicios ref. contrato 290/2021. Cuota 01/02.</p>'),(3,22,'2022-05-10','05','2022',2,10000.00,1,10,5,'2547','<p>Su pago, gracias!</p>');
/*!40000 ALTER TABLE `lancamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `cod_usuario` int(10) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(50) DEFAULT '0',
  `email_usuario` varchar(50) DEFAULT '0',
  `login_acesso` varchar(25) NOT NULL DEFAULT '0',
  `senha_acesso` varchar(150) DEFAULT '0',
  `perfil_acesso` int(10) DEFAULT '0',
  `ativo` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`cod_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=161 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,'Administrador do Sistema','contato@agenciainnovar.com.br','adm','40bd001563085fc35165329ea1ff5c5ecbdbbeef',1,'A'),(158,'FABIANO FARIA','f.faria@primepy.com','fabiano.faria','553cd5a88a709df302a9f924fae1c8a2913d6197',1,'A'),(159,'PRIME PJC','contacto@primepy.com','primepjc','15723d49f40cc4ced04fd2213c692f4afd0fbdfd',2,'A'),(160,'PRIME ASU','contacto@primepy.com','primeasu','593660a5058710fade86242d82189a935fc1ab76',2,'A');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagamento_aluguel_inquilino`
--

DROP TABLE IF EXISTS `pagamento_aluguel_inquilino`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagamento_aluguel_inquilino` (
  `id_pagamento` int(11) NOT NULL AUTO_INCREMENT,
  `recibo_pagamento` int(11) DEFAULT NULL,
  `cota_pagamento` varchar(50) DEFAULT NULL,
  `desc_pagamento` varchar(500) DEFAULT NULL,
  `tipo_moeda_pagamento` int(11) DEFAULT NULL,
  `tipo_lancamento_pagamento` int(11) DEFAULT NULL,
  `valor_pagamento` float(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_pagamento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagamento_aluguel_inquilino`
--

LOCK TABLES `pagamento_aluguel_inquilino` WRITE;
/*!40000 ALTER TABLE `pagamento_aluguel_inquilino` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagamento_aluguel_inquilino` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil_acesso`
--

DROP TABLE IF EXISTS `perfil_acesso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil_acesso` (
  `cod_perfil` int(10) NOT NULL,
  `desc_perfil_acesso` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`cod_perfil`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil_acesso`
--

LOCK TABLES `perfil_acesso` WRITE;
/*!40000 ALTER TABLE `perfil_acesso` DISABLE KEYS */;
INSERT INTO `perfil_acesso` VALUES (2,'Usuario'),(1,'Administrador');
/*!40000 ALTER TABLE `perfil_acesso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal`
--

DROP TABLE IF EXISTS `personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal` (
  `id_personal` int(11) NOT NULL AUTO_INCREMENT,
  `cargo_funcao_personal` varchar(150) DEFAULT NULL,
  `sucursal_personal` varchar(150) DEFAULT NULL,
  `nome_personal` varchar(150) DEFAULT NULL,
  `rg_personal` varchar(50) DEFAULT NULL,
  `cpf_personal` varchar(50) DEFAULT NULL,
  `estado_civil_personal` varchar(50) DEFAULT NULL,
  `data_nascimento_personal` date DEFAULT NULL,
  `endereco_personal` varchar(200) DEFAULT NULL,
  `bairro_personal` varchar(100) DEFAULT NULL,
  `cidade_personal` varchar(100) DEFAULT NULL,
  `estado_personal` varchar(100) DEFAULT NULL,
  `pais_personal` varchar(100) DEFAULT NULL,
  `telefone_personal` varchar(50) DEFAULT NULL,
  `email_personal` varchar(100) DEFAULT NULL,
  `whatsapp_personal` varchar(50) DEFAULT NULL,
  `banco_personal` varchar(50) DEFAULT NULL,
  `sucursal_agencia_personal` varchar(50) DEFAULT NULL,
  `cc_ca_personal` varchar(50) DEFAULT NULL,
  `email_sucursal_personal` varchar(50) DEFAULT NULL,
  `cnh_personal` varchar(50) DEFAULT NULL,
  `data_validade_cnh_personal` date DEFAULT NULL,
  `instagram_personal` varchar(100) DEFAULT NULL,
  `observacoes_personal` mediumtext,
  PRIMARY KEY (`id_personal`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal`
--

LOCK TABLES `personal` WRITE;
/*!40000 ALTER TABLE `personal` DISABLE KEYS */;
INSERT INTO `personal` VALUES (2,'Ejecutivo de Negocios','Prime PJC','Fabio Ortiz','001.543.809','029.265.081-74','Soltero','1987-06-16','Rua Algacir Pissini, 369','Ipê 2','Ponta Porã','Mato Grosso do Sul','Brasil','+5567991865729','f.ortiz@primepy.com','+595986711282','Nubank','0001','8733001-9','',NULL,NULL,'eng.fabio',''),(3,'Supervisor de Marketing','Prime PJC','João Lucas Brandão Chaves','2.029.951','056.640.321-89','Soltero','1997-05-30','Policarpo Davila','Jardim Estoril','Ponta Porã','MS','Brasil','67996850760','joao_lucasbchaves@hotmail.com','+5567996850760','Nubank','0001','316947-6','joao_lucasbchaves@hotmail.com',NULL,NULL,'',''),(5,'Director Ejecutivo','Prime ASU','Fabiano Faria','8.344.070','8.344.070-4','Soltero','1979-12-29','Calle Guyra Campana e/ Pikasu','Jardín Aurora','Pedro Juan Caballero','Amambay','Paraguay','','f.faria@primepy.com','+595981630332','Continental','PJC','','',NULL,NULL,'realfabiano','');
/*!40000 ALTER TABLE `personal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recibo_entrega_chaves`
--

DROP TABLE IF EXISTS `recibo_entrega_chaves`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recibo_entrega_chaves` (
  `id_recibo_itens` int(11) NOT NULL AUTO_INCREMENT,
  `recibo_tipo_itens` int(11) DEFAULT NULL,
  `contrato_recibo_itens` int(11) DEFAULT NULL,
  `data_recibo_itens` date DEFAULT NULL,
  `itens_recibo_itens` mediumtext,
  PRIMARY KEY (`id_recibo_itens`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recibo_entrega_chaves`
--

LOCK TABLES `recibo_entrega_chaves` WRITE;
/*!40000 ALTER TABLE `recibo_entrega_chaves` DISABLE KEYS */;
/*!40000 ALTER TABLE `recibo_entrega_chaves` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recibo_pagamento_inquilino`
--

DROP TABLE IF EXISTS `recibo_pagamento_inquilino`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recibo_pagamento_inquilino` (
  `id_recibo_pagamento` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_recibo` int(11) DEFAULT NULL,
  `contrato_pagamento` int(11) DEFAULT NULL,
  `data_pagamento` date DEFAULT NULL,
  PRIMARY KEY (`id_recibo_pagamento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recibo_pagamento_inquilino`
--

LOCK TABLES `recibo_pagamento_inquilino` WRITE;
/*!40000 ALTER TABLE `recibo_pagamento_inquilino` DISABLE KEYS */;
/*!40000 ALTER TABLE `recibo_pagamento_inquilino` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_cliente`
--

DROP TABLE IF EXISTS `tipo_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_cliente` (
  `id_tipo_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `desc_tipo_cliente` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_cliente`
--

LOCK TABLES `tipo_cliente` WRITE;
/*!40000 ALTER TABLE `tipo_cliente` DISABLE KEYS */;
INSERT INTO `tipo_cliente` VALUES (1,'Inquilino'),(2,'Proprietário');
/*!40000 ALTER TABLE `tipo_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_contrato`
--

DROP TABLE IF EXISTS `tipo_contrato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_contrato` (
  `id_tipo_contrato` int(11) NOT NULL AUTO_INCREMENT,
  `desc_tipo_contrato` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_contrato`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_contrato`
--

LOCK TABLES `tipo_contrato` WRITE;
/*!40000 ALTER TABLE `tipo_contrato` DISABLE KEYS */;
INSERT INTO `tipo_contrato` VALUES (1,'CONTRATO PRIVADO DE ALQUILER'),(2,'CONTRATO PRIVADO DE VENTA'),(3,'CONTRATO PRIVADO DE ARRENDAMIENTO COMERCIAL'),(4,'CONTRATO PRIVADO DE ARRENDAMIENTO DE EDIFICIOS');
/*!40000 ALTER TABLE `tipo_contrato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_lancamento`
--

DROP TABLE IF EXISTS `tipo_lancamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_lancamento` (
  `id_lanc` int(11) NOT NULL AUTO_INCREMENT,
  `desc_lanc` varchar(50) DEFAULT NULL,
  `estado_lacn` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_lanc`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_lancamento`
--

LOCK TABLES `tipo_lancamento` WRITE;
/*!40000 ALTER TABLE `tipo_lancamento` DISABLE KEYS */;
INSERT INTO `tipo_lancamento` VALUES (2,'1.	ACTIVO PRIME PJC',NULL),(5,'1.1	ACTIVO CORRIENTE',NULL),(6,'1.1.1	DISPONIBILIDADES',NULL),(7,'1.1.1.1	CAJAS',NULL),(8,'1.1.1.1.1	FISICO PJC',NULL),(9,'1.1.1.1.1.01	Guaraníes',NULL),(10,'1.1.1.1.1.02	Reales',NULL),(11,'1.1.1.1.1.03	Dolares',NULL),(12,'1.1.1.1.2	EFECTIVO A DEPOSITAR',NULL),(13,'1.1.1.1.2.01	Guaraníes',NULL),(14,'1.1.1.1.2.02	Reales',NULL),(15,'1.1.1.1.2.03	Dolares',NULL),(16,'1.1.1.1.3	CHEQUES A DEPOSITAR',NULL),(17,'1.1.1.1.3.01	Guaranies',NULL),(18,'1.1.1.1.3.02	Reales',NULL),(19,'1.1.1.1.3.03	Dolares',NULL),(20,'1.1.1.2	BANCOS',NULL),(21,'1.1.1.2.1	BANCOS (G$)',NULL),(22,'1.1.1.2.1.01	Banco Continental',NULL),(23,'1.1.1.2.1.02	Banco Río',NULL),(24,'1.1.1.2.1.03	Visión Banco',NULL),(25,'1.1.1.2.1.04	GNB Paraguay',NULL),(26,'1.1.1.2.2	BANCOS (R$)',NULL),(27,'1.1.1.2.2.01	Bradesco',NULL),(28,'1.1.1.2.3	BANCOS (U$)',NULL),(29,'1.1.1.2.3.01	Banco Continental',NULL),(30,'1.1.1.2.3.02	Banco Río',NULL),(31,'1.1.2	CREDITOS',NULL),(32,'1.1.2.1	CUENTAS A COBRAR',NULL),(33,'1.1.2.1.1	CLIENTES (G$)',NULL),(34,'1.1.2.1.2	CLIENTES (R$)',NULL),(35,'1.1.2.1.3	CLIENTES (U$)',NULL),(36,'1.1.2.2	OTROS CRÉDITOS',NULL),(37,'1.1.2.2.1	Anticipo al Personal',NULL),(38,'1.1.2.2.2	Anticipo de Alquileres',NULL),(39,'1.1.2.2.3	Anticipo a Proveedores PF',NULL),(40,'1.1.2.2.4	Anticipo a Proveedores PJ',NULL),(41,'1.1.2.2.5	Anticipo de Gastos a Rendir',NULL),(42,'1.1.2.2.6	Anticipo Impuesto a la Renta',NULL),(43,'1.1.2.2.7	Retención Impuesto a la Renta',NULL),(44,'1.1.2.2.8	IVA Crédito 5%',NULL),(45,'1.1.2.2.9	IVA Crédito 10%',NULL),(46,'1.1.2.2.10	Retención IVA',NULL),(47,'1.1.2.2.11	Anticipo a Clientes',NULL),(48,'1.2	ACTIVO NO CORRIENTE',NULL),(49,'1.2.1	BIENES DE USO',NULL),(50,'1.2.1.1	MUEBLES Y ÚTILES',NULL),(51,'1.2.1.1.1	Muebles y Útiles',NULL),(52,'1.2.1.1.2	Muebles y Enseres',NULL),(53,'1.2.1.1.3	Depreciación Acumulada',NULL),(54,'1.2.1.2	MAQUINARIAS Y EQUIPOS',NULL),(55,'1.2.1.2.1	Maquinarias',NULL),(56,'1.2.1.2.2	Herramientas y Equipos',NULL),(57,'1.2.1.2.3	Equipos de Informatica',NULL),(58,'1.2.1.2.4	Equipos Eletrónicos',NULL),(59,'1.2.1.3	TRANSPORTE TERRESTRE',NULL),(60,'1.2.1.2.5	Depreciación Acumulada',NULL),(61,'1.2.1.3.1	Automóviles',NULL),(62,'1.2.1.3.2	Motocicletas',NULL),(63,'1.2.1.3.3	Otros Bienes',NULL),(64,'1.2.1.3.4	Depreciación Acumulada',NULL);
/*!40000 ALTER TABLE `tipo_lancamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_moeda`
--

DROP TABLE IF EXISTS `tipo_moeda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_moeda` (
  `id_moeda` int(11) NOT NULL AUTO_INCREMENT,
  `sigla_moeda` varchar(10) DEFAULT NULL,
  `desc_moeda` varchar(50) DEFAULT NULL,
  `simbolo_moeda` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_moeda`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_moeda`
--

LOCK TABLES `tipo_moeda` WRITE;
/*!40000 ALTER TABLE `tipo_moeda` DISABLE KEYS */;
INSERT INTO `tipo_moeda` VALUES (1,'G$','GUARANÍES','Gs$'),(2,'U$','DOLARES AMERICANOS','USS'),(3,'R$','REALES','BRL');
/*!40000 ALTER TABLE `tipo_moeda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_propriedade`
--

DROP TABLE IF EXISTS `tipo_propriedade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_propriedade` (
  `id_tipo_propriedade` int(11) NOT NULL AUTO_INCREMENT,
  `desc_tipo_propriedade` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_propriedade`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_propriedade`
--

LOCK TABLES `tipo_propriedade` WRITE;
/*!40000 ALTER TABLE `tipo_propriedade` DISABLE KEYS */;
INSERT INTO `tipo_propriedade` VALUES (1,'CASA'),(11,'CONJUNTO COMERCIAL'),(12,'DEPARTAMENTO'),(17,'DEPOSITO'),(18,'EDIFICIO COMERCIAL'),(19,'EDIFICIO RESIDENCIAL'),(20,'OFICINA CORPORATIVA'),(21,'PISO CORPORATIVO'),(22,'SALÓN COMERCIAL'),(23,'TERRENO'),(24,'TERRENO EN CONDOMINIO');
/*!40000 ALTER TABLE `tipo_propriedade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_provedor`
--

DROP TABLE IF EXISTS `tipo_provedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_provedor` (
  `id_tipo_provedor` int(11) NOT NULL AUTO_INCREMENT,
  `desc_tipo_provedor` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_provedor`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_provedor`
--

LOCK TABLES `tipo_provedor` WRITE;
/*!40000 ALTER TABLE `tipo_provedor` DISABLE KEYS */;
INSERT INTO `tipo_provedor` VALUES (1,'TELEFONIA');
/*!40000 ALTER TABLE `tipo_provedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_recibo`
--

DROP TABLE IF EXISTS `tipo_recibo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_recibo` (
  `id_tipo_recibo` int(11) NOT NULL AUTO_INCREMENT,
  `nome_tipo_recibo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_recibo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_recibo`
--

LOCK TABLES `tipo_recibo` WRITE;
/*!40000 ALTER TABLE `tipo_recibo` DISABLE KEYS */;
INSERT INTO `tipo_recibo` VALUES (1,'Recibo de Deposito de Llaves'),(2,'Recibo de Dinero - Proprietário'),(3,'Recibo de Dinero - Inquilino');
/*!40000 ALTER TABLE `tipo_recibo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-08 16:33:35
