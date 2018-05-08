-- MySQL dump 10.13  Distrib 5.7.19, for Win64 (x86_64)
--
-- Host: localhost    Database: flazenginebasic
-- ------------------------------------------------------
-- Server version	5.7.19

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
-- Table structure for table `fe_user`
--

DROP TABLE IF EXISTS `fe_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fe_user` (
  `user_f_id` char(36) NOT NULL,
  `user_f_code` varchar(20) NOT NULL,
  `user_f_name` varchar(50) NOT NULL,
  `user_f_phone` varchar(15) NOT NULL,
  `user_f_email` varchar(50) NOT NULL,
  `user_f_password` varchar(100) NOT NULL,
  `user_f_status` varchar(10) NOT NULL,
  `user_r_user_group_f_id` char(36) NOT NULL,
  `user_f_picture` varchar(200) NOT NULL,
  `user_f_blocked` int(1) NOT NULL,
  `user_f_blocked_reason` varchar(255) NOT NULL,
  `user_f_token` varchar(255) NOT NULL,
  PRIMARY KEY (`user_f_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fe_user`
--

LOCK TABLES `fe_user` WRITE;
/*!40000 ALTER TABLE `fe_user` DISABLE KEYS */;
INSERT INTO `fe_user` VALUES ('470','U010','Administrator','085283511440','admin@admin.com','21232f297a57a5a743894a0e4a801fc3','Active','e3c6ce19-613e-4d24-aee1-4a9b6930ff7e','',0,'','');
/*!40000 ALTER TABLE `fe_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fe_user_access`
--

DROP TABLE IF EXISTS `fe_user_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fe_user_access` (
  `user_access_f_id` char(36) NOT NULL,
  `user_access_f_url` varchar(255) NOT NULL,
  `user_access_f_desc` varchar(255) NOT NULL,
  PRIMARY KEY (`user_access_f_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fe_user_access`
--

LOCK TABLES `fe_user_access` WRITE;
/*!40000 ALTER TABLE `fe_user_access` DISABLE KEYS */;
INSERT INTO `fe_user_access` VALUES ('12a57a42-e55f-11e7-bd7a-d137a07b8a42','user-add','Fungsi Menghapus Data User'),('12a57d32-e55f-11e7-bd7a-d137a07b8a42','user-edit','Fungsi Menghapus Data User'),('12a57dbf-e55f-11e7-bd7a-d137a07b8a42','user-access-add','Form of User Access'),('12a57e34-e55f-11e7-bd7a-d137a07b8a42','user-access-edit','Form of User Access'),('12a57f60-e55f-11e7-bd7a-d137a07b8a42','user-group-add','Form of User Group'),('12a57fd5-e55f-11e7-bd7a-d137a07b8a42','user-group-edit','Form of User Group'),('1cd1ad0b-a6f2-4721-9da9-07319f338eff','user-menu','Menu User'),('83c4444b-e557-11e7-bd7a-d137a07b8a42','user-list','List of Users'),('83c4486c-e557-11e7-bd7a-d137a07b8a42','user-group-list','List of User Group'),('83c44a55-e557-11e7-bd7a-d137a07b8a42','user-group-form','Form of User Group'),('83c44b44-e557-11e7-bd7a-d137a07b8a42','user-group-process','Process User Group'),('83c44c15-e557-11e7-bd7a-d137a07b8a42','user-group-delete','Delete of User Group'),('83c44ff9-e557-11e7-bd7a-d137a07b8a42','user-form','Form User Pengguna'),('83c450bb-e557-11e7-bd7a-d137a07b8a42','user-group-access-list','List of User Permission'),('83c45180-e557-11e7-bd7a-d137a07b8a42','user-group-access-process','Process User Group Access'),('83c45244-e557-11e7-bd7a-d137a07b8a42','user-profile','Edit User Profile'),('83c45303-e557-11e7-bd7a-d137a07b8a42','user-profile-process','Process User Profile'),('83c4582a-e557-11e7-bd7a-d137a07b8a42','user-delete','Fungsi Menghapus Data User'),('83c459b1-e557-11e7-bd7a-d137a07b8a42','user-process','Mengubah dan Menambah'),('83c45a77-e557-11e7-bd7a-d137a07b8a42','user-access-list','List of User Access'),('83c45b32-e557-11e7-bd7a-d137a07b8a42','user-access-form','Form of User Access'),('83c45bf2-e557-11e7-bd7a-d137a07b8a42','user-access-process','Process User Access'),('83c45cad-e557-11e7-bd7a-d137a07b8a42','user-access-delete','Delete of User Access'),('de95d3e7-c43c-46fb-9255-6ca10c363a16','user-group-menu','Menu User Group'),('e974711a-9e0e-4791-9140-66f287325f86','user-access-menu','Menu User Access');
/*!40000 ALTER TABLE `fe_user_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fe_user_group`
--

DROP TABLE IF EXISTS `fe_user_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fe_user_group` (
  `user_group_f_id` char(36) NOT NULL,
  `user_group_f_name` varchar(50) NOT NULL,
  `user_group_f_status` varchar(10) NOT NULL,
  `user_group_f_desc` varchar(100) NOT NULL,
  PRIMARY KEY (`user_group_f_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fe_user_group`
--

LOCK TABLES `fe_user_group` WRITE;
/*!40000 ALTER TABLE `fe_user_group` DISABLE KEYS */;
INSERT INTO `fe_user_group` VALUES ('e3c6ce19-613e-4d24-aee1-4a9b6930ff7e','Administrator','Active','Administrator');
/*!40000 ALTER TABLE `fe_user_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fe_user_group_access`
--

DROP TABLE IF EXISTS `fe_user_group_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fe_user_group_access` (
  `user_group_access_f_id` char(36) NOT NULL,
  `user_group_access_r_user_group_f_id` char(36) NOT NULL,
  `user_group_access_r_user_access_f_id` char(36) NOT NULL,
  `user_group_access_f_status` varchar(20) NOT NULL,
  PRIMARY KEY (`user_group_access_f_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fe_user_group_access`
--

LOCK TABLES `fe_user_group_access` WRITE;
/*!40000 ALTER TABLE `fe_user_group_access` DISABLE KEYS */;
INSERT INTO `fe_user_group_access` VALUES ('141eec79-6dfe-43ba-9cbb-a5fc88975c77','e3c6ce19-613e-4d24-aee1-4a9b6930ff7e','83c45b32-e557-11e7-bd7a-d137a07b8a42','Active'),('2b8b41ee-d258-4c9d-871b-190e122255ca','e3c6ce19-613e-4d24-aee1-4a9b6930ff7e','e974711a-9e0e-4791-9140-66f287325f86','Active'),('336bcaeb-9ea9-4401-8443-42e40d306957','e3c6ce19-613e-4d24-aee1-4a9b6930ff7e','83c45244-e557-11e7-bd7a-d137a07b8a42','Active'),('3375a8ed-1989-4c65-aa33-405173cd85ff','e3c6ce19-613e-4d24-aee1-4a9b6930ff7e','12a57e34-e55f-11e7-bd7a-d137a07b8a42','Active'),('347d8bf6-692c-4b68-856e-574bb93ba30b','e3c6ce19-613e-4d24-aee1-4a9b6930ff7e','83c459b1-e557-11e7-bd7a-d137a07b8a42','Active'),('3eb5c327-d43e-44d7-b756-355c5c448d30','e3c6ce19-613e-4d24-aee1-4a9b6930ff7e','1cd1ad0b-a6f2-4721-9da9-07319f338eff','Active'),('444f24a5-b7a2-4847-b2a0-1c95d57623f4','e3c6ce19-613e-4d24-aee1-4a9b6930ff7e','12a57f60-e55f-11e7-bd7a-d137a07b8a42','Active'),('4d6724da-6088-47d0-953e-7961ffd40c54','e3c6ce19-613e-4d24-aee1-4a9b6930ff7e','83c45cad-e557-11e7-bd7a-d137a07b8a42','Active'),('57fbdc45-177c-4107-b965-519078182c01','e3c6ce19-613e-4d24-aee1-4a9b6930ff7e','83c4444b-e557-11e7-bd7a-d137a07b8a42','Active'),('5e538fb3-b012-4726-90fd-0046a5dfbc5a','e3c6ce19-613e-4d24-aee1-4a9b6930ff7e','83c4486c-e557-11e7-bd7a-d137a07b8a42','Active'),('61b8869e-05d0-454e-9aba-ec1e9f35c587','e3c6ce19-613e-4d24-aee1-4a9b6930ff7e','83c45303-e557-11e7-bd7a-d137a07b8a42','Active'),('62f273b8-7e78-48c1-8b7d-4fd9404e070b','e3c6ce19-613e-4d24-aee1-4a9b6930ff7e','83c45bf2-e557-11e7-bd7a-d137a07b8a42','Active'),('748a6415-2f06-47fd-a3df-e3d8f888a003','e3c6ce19-613e-4d24-aee1-4a9b6930ff7e','de95d3e7-c43c-46fb-9255-6ca10c363a16','Active'),('835a01c7-bfa0-48b9-b403-8e9211d7542b','e3c6ce19-613e-4d24-aee1-4a9b6930ff7e','83c450bb-e557-11e7-bd7a-d137a07b8a42','Active'),('8f1347af-e8c6-44b8-bca7-7a4fbbd86db5','e3c6ce19-613e-4d24-aee1-4a9b6930ff7e','12a57fd5-e55f-11e7-bd7a-d137a07b8a42','Active'),('94885689-e548-4854-9102-3eefe2002c16','e3c6ce19-613e-4d24-aee1-4a9b6930ff7e','12a57dbf-e55f-11e7-bd7a-d137a07b8a42','Active'),('96932bef-e65f-471a-9b19-412c581ba710','e3c6ce19-613e-4d24-aee1-4a9b6930ff7e','83c4582a-e557-11e7-bd7a-d137a07b8a42','Active'),('9e55601d-3b05-4d9e-a6b1-d9454432b7a5','e3c6ce19-613e-4d24-aee1-4a9b6930ff7e','83c45180-e557-11e7-bd7a-d137a07b8a42','Active'),('a6780b09-5323-4941-85be-6f7e29ee6896','e3c6ce19-613e-4d24-aee1-4a9b6930ff7e','83c44a55-e557-11e7-bd7a-d137a07b8a42','Active'),('a68d83e6-e43a-418f-bdc1-0897f0cc101e','e3c6ce19-613e-4d24-aee1-4a9b6930ff7e','83c44ff9-e557-11e7-bd7a-d137a07b8a42','Active'),('c635691d-653e-427b-8473-004c9997f64a','e3c6ce19-613e-4d24-aee1-4a9b6930ff7e','83c45a77-e557-11e7-bd7a-d137a07b8a42','Active'),('d4415144-b409-437f-87f9-5c95869adc8a','e3c6ce19-613e-4d24-aee1-4a9b6930ff7e','12a57a42-e55f-11e7-bd7a-d137a07b8a42','Active'),('ddcc4d09-fa35-417f-9b7b-6231950b0297','e3c6ce19-613e-4d24-aee1-4a9b6930ff7e','12a57d32-e55f-11e7-bd7a-d137a07b8a42','Active'),('f5060dd8-5d6c-4b5b-8a48-04e474d18ed4','e3c6ce19-613e-4d24-aee1-4a9b6930ff7e','83c44c15-e557-11e7-bd7a-d137a07b8a42','Active'),('f917da6b-e33e-4613-be6f-7c21a64a398b','e3c6ce19-613e-4d24-aee1-4a9b6930ff7e','83c44b44-e557-11e7-bd7a-d137a07b8a42','Active');
/*!40000 ALTER TABLE `fe_user_group_access` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-08 15:16:53
