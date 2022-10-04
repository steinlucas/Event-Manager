CREATE DATABASE  IF NOT EXISTS `prova` ;
use `prova` ;

DROP TABLE IF EXISTS `situacao_evento`;

CREATE TABLE `situacao_evento` (
  `codigo` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) NOT NULL,
  PRIMARY KEY (`codigo`)
);



INSERT INTO `situacao_evento` VALUES (1,'Planejamento'),(2,'Inscrições Abertas'),(3,'Realizado');



DROP TABLE IF EXISTS `eventos`;

CREATE TABLE `eventos` (
  `codigo` int NOT NULL AUTO_INCREMENT,
  `sigla` varchar(45) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `data_inicio` datetime NOT NULL,
  `data_fim` datetime NOT NULL,
  `carga_horaria` int NOT NULL,
  `local_realizacao` varchar(45) NOT NULL,
  `email_organizacao` varchar(45) NOT NULL,
  `responsavel_evento` varchar(45) NOT NULL,
  `codigo_situacao` int NOT NULL,
  `numero_participantes` int DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  KEY `fk_evento_1_idx` (`codigo_situacao`),
  CONSTRAINT `fk_evento_1` FOREIGN KEY (`codigo_situacao`) REFERENCES `situacao_evento` (`codigo`)
);



INSERT INTO `eventos` VALUES (1,'SNCT','Semana Nacional de Ciencia e Tecnologia','2020-10-01 00:00:00','2020-10-01 00:00:00',40,'IFSC Gaspar','email@email.com','Coordenador',3,150);



DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `codigo` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `endereco` varchar(120) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `cpf` bigint DEFAULT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
);

INSERT INTO `usuarios` VALUES (1,'Fulano','Rua Adriano Kromann, Bela Vista, Gaspar.',12345678999,'fulano','fulano'),(2,'Beltrano Teste','EndereÃ§o do Beltrano',123443322223,'beltrano','beltrano'),(3,'Administrador','EndereÃ§o do administrador',12345678911,'admin','admin');
