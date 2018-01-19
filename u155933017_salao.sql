CREATE DATABASE  IF NOT EXISTS `gerirmeusalao` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `gerirmeusalao`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: gerirmeusalao
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.22-MariaDB

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
-- Table structure for table `cargo`
--

DROP TABLE IF EXISTS `cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargo` (
  `codCargo` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) NOT NULL,
  PRIMARY KEY (`codCargo`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `categoriaentrada`
--

DROP TABLE IF EXISTS `categoriaentrada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoriaentrada` (
  `codCategoriaEntrada` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) NOT NULL,
  `codEmpresa` int(11) NOT NULL,
  PRIMARY KEY (`codCategoriaEntrada`),
  KEY `fk_categoriaEntrada_empresa1_idx` (`codEmpresa`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `categoriasaida`
--

DROP TABLE IF EXISTS `categoriasaida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoriasaida` (
  `codcategoriaSaida` int(11) NOT NULL,
  `descricao` varchar(45) NOT NULL,
  `codEmpresa` int(11) NOT NULL,
  PRIMARY KEY (`codcategoriaSaida`),
  KEY `fk_categoriaSaida_empresa1_idx` (`codEmpresa`),
  KEY `codcategoriaSaida` (`codcategoriaSaida`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cidade`
--

DROP TABLE IF EXISTS `cidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cidade` (
  `codCidade` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) DEFAULT NULL,
  `codEstado` int(11) NOT NULL,
  `capital` int(11) DEFAULT NULL,
  PRIMARY KEY (`codCidade`),
  KEY `fk_cidade_estado1_idx` (`codEstado`)
) ENGINE=MyISAM AUTO_INCREMENT=9715 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `codCliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `nascimento` varchar(10) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `cpf` varchar(14) NOT NULL,
  `CEP` varchar(9) DEFAULT NULL,
  `logradouro` varchar(45) DEFAULT NULL,
  `numero` varchar(45) DEFAULT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `codEmpresa` int(11) NOT NULL,
  `codCidade` int(11) NOT NULL,
  `sexo` varchar(10) NOT NULL DEFAULT 'FEMININO',
  PRIMARY KEY (`codCliente`),
  KEY `fk_cliente_empresa_idx` (`codEmpresa`),
  KEY `fk_cliente_cidade1_idx` (`codCidade`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `compromisso`
--

DROP TABLE IF EXISTS `compromisso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compromisso` (
  `codCompromisso` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) NOT NULL DEFAULT '',
  `horario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0',
  `codServico` int(11) NOT NULL DEFAULT '0',
  `codFuncionario` int(11) NOT NULL DEFAULT '0',
  `codEmpresa` int(11) NOT NULL DEFAULT '0',
  `codCliente` int(11) NOT NULL DEFAULT '0',
  `diaInteiro` int(11) DEFAULT NULL,
  `dataFim` timestamp NULL DEFAULT NULL,
  `valor` double NOT NULL,
  PRIMARY KEY (`codCompromisso`),
  KEY `fk_compromisso_servico1_idx` (`codServico`),
  KEY `fk_compromisso_funcionario1_idx` (`codFuncionario`),
  KEY `fk_compromisso_empresa1_idx` (`codEmpresa`),
  KEY `fk_compromisso_cliente1_idx` (`codCliente`)
) ENGINE=MyISAM AUTO_INCREMENT=186 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `compromisso_BEFORE_UPDATE` BEFORE UPDATE ON `compromisso`
 FOR EACH ROW BEGIN
	IF(NEW.status = 1) THEN
    	INSERT INTO servicoprestado(codFuncionario, codCliente, codServico, horario) VALUES (NEW.codFuncionario, new.codCliente, new.codServico, new.horario);
	END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresa` (
  `codEmpresa` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `cnpj` varchar(45) DEFAULT NULL,
  `logradouro` varchar(45) DEFAULT NULL,
  `numero` varchar(45) DEFAULT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cep` char(8) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `contato` varchar(45) DEFAULT NULL,
  `codCidade` int(11) NOT NULL,
  `codEstado` int(11) DEFAULT NULL,
  PRIMARY KEY (`codEmpresa`),
  KEY `fk_empresa_cidade1_idx` (`codCidade`),
  KEY `fk_empresa_estado1_idx` (`codEstado`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `codEstado` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) NOT NULL,
  `uf` char(2) NOT NULL,
  PRIMARY KEY (`codEstado`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcionario` (
  `codFuncionario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `telefone` varchar(17) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `comissaoDinheiro` double NOT NULL,
  `comissaoCartao` double NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `codCargo` int(11) NOT NULL,
  `codEmpresa` int(11) NOT NULL,
  `nascimento` date NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `salario` double NOT NULL,
  PRIMARY KEY (`codFuncionario`),
  KEY `fk_funcionario_empresa1_idx` (`codEmpresa`),
  KEY `fk_funcionario_cargo1_idx` (`codCargo`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `itemvenda`
--

DROP TABLE IF EXISTS `itemvenda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `itemvenda` (
  `codProduto` int(11) NOT NULL,
  `codVenda` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `precoUnitario` double NOT NULL,
  PRIMARY KEY (`codProduto`,`codVenda`),
  KEY `fk_produto_has_venda_venda1_idx` (`codVenda`),
  KEY `fk_produto_has_venda_produto1_idx` (`codProduto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `lembrete`
--

DROP TABLE IF EXISTS `lembrete`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lembrete` (
  `codlembrete` int(11) NOT NULL AUTO_INCREMENT,
  `codEmpresa` int(11) NOT NULL,
  `mensagem` text NOT NULL,
  `dataLeitura` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codlembrete`),
  KEY `FK_Empresa_lembrete_idx` (`codEmpresa`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `notaentrada`
--

DROP TABLE IF EXISTS `notaentrada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notaentrada` (
  `codNotaEntrada` int(11) NOT NULL AUTO_INCREMENT,
  `valor` double NOT NULL,
  `status` int(11) NOT NULL,
  `discriminacao` text NOT NULL,
  `dataCriacao` datetime NOT NULL,
  `dataVencimento` datetime NOT NULL,
  `codCliente` int(11) DEFAULT NULL,
  `codCategoriaEntrada` int(11) NOT NULL,
  `codEmpresa` int(11) NOT NULL,
  `datapagto` timestamp NULL DEFAULT NULL,
  `codCompromisso` int(11) DEFAULT NULL,
  `formaPagto` varchar(45) DEFAULT 'DINHEIRO',
  PRIMARY KEY (`codNotaEntrada`),
  KEY `fk_notaEntrada_categoriaEntrada1_idx` (`codCategoriaEntrada`),
  KEY `fk_notaEntrada_empresa1_idx` (`codEmpresa`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `notasaida`
--

DROP TABLE IF EXISTS `notasaida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notasaida` (
  `codNotaSaida` int(11) NOT NULL AUTO_INCREMENT,
  `valor` double NOT NULL,
  `status` int(11) NOT NULL,
  `discriminacao` text NOT NULL,
  `dataCriacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dataVencimento` timestamp NULL DEFAULT NULL,
  `dataPagto` timestamp NULL DEFAULT NULL,
  `codcategoriaSaida` int(11) NOT NULL,
  `codEmpresa` int(11) NOT NULL,
  PRIMARY KEY (`codNotaSaida`),
  KEY `fk_notaSaida_categoriaSaida1_idx` (`codcategoriaSaida`),
  KEY `fk_notaSaida_empresa1_idx` (`codEmpresa`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `permissaousuario`
--

DROP TABLE IF EXISTS `permissaousuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissaousuario` (
  `codPermissaoUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `codUsuario` int(11) NOT NULL,
  `perm_efetuarCadastro` int(11) NOT NULL DEFAULT '0',
  `perm_efetuarAlteracao` int(11) NOT NULL DEFAULT '0',
  `perm_cadastrarUsuario` int(11) NOT NULL DEFAULT '0',
  `perm_alterarDadosEmpresa` int(11) NOT NULL DEFAULT '0',
  `perm_verRelatorios` int(11) NOT NULL DEFAULT '0',
  `perm_verNotas` int(11) NOT NULL DEFAULT '0',
  `perm_marcarCompromissos` int(11) NOT NULL DEFAULT '0',
  `perm_cadastrarFuncionario` int(11) NOT NULL DEFAULT '0',
  `perm_cadastrarProdutosServicos` int(11) NOT NULL DEFAULT '0',
  `perm_designarCompromisso` int(11) NOT NULL DEFAULT '0' COMMENT '0 => Ninguem/ 1=> Somente para si / 2 => Controle Total',
  `perm_alterarPermissoes` int(11) NOT NULL,
  PRIMARY KEY (`codPermissaoUsuario`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produto` (
  `codProduto` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` text NOT NULL,
  `valorCompra` double DEFAULT NULL,
  `valorVenda` double NOT NULL,
  `estoque` int(11) NOT NULL,
  `codEmpresa` int(11) NOT NULL,
  PRIMARY KEY (`codProduto`),
  KEY `fk_produto_empresa1_idx` (`codEmpresa`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `servico`
--

DROP TABLE IF EXISTS `servico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servico` (
  `codServico` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) NOT NULL,
  `valorComum` double NOT NULL,
  `valorPromocional` double NOT NULL,
  `horariosEstimados` int(11) NOT NULL DEFAULT '1',
  `tempoRemarcacao` int(11) DEFAULT NULL,
  `codEmpresa` int(11) NOT NULL,
  PRIMARY KEY (`codServico`),
  KEY `fk_servico_empresa1_idx` (`codEmpresa`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `servicoprestado`
--

DROP TABLE IF EXISTS `servicoprestado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicoprestado` (
  `codFuncionario` int(11) NOT NULL,
  `codCliente` int(11) NOT NULL,
  `codServico` int(11) NOT NULL,
  `horario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `fk_servicoPrestado_funcionario1_idx` (`codFuncionario`),
  KEY `fk_servicoPrestado_cliente1_idx` (`codCliente`),
  KEY `fk_servicoPrestado_servico1_idx` (`codServico`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tipopermissao`
--

DROP TABLE IF EXISTS `tipopermissao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipopermissao` (
  `codTipoPermissao` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `perm_efetuarCadastro` int(11) NOT NULL,
  `perm_efetuarAlteracao` int(11) NOT NULL,
  `perm_cadastrarUsuario` int(11) NOT NULL,
  `perm_alterarDadosEmpresa` int(11) NOT NULL,
  `perm_verRelatorios` int(11) NOT NULL,
  `perm_verNotas` int(11) NOT NULL,
  `perm_marcarCompromissos` int(11) NOT NULL,
  `perm_cadastrarFuncionario` int(11) NOT NULL DEFAULT '0',
  `perm_cadastrarProdutosServicos` int(11) NOT NULL DEFAULT '0',
  `perm_alterarPermissoes` int(11) NOT NULL,
  PRIMARY KEY (`codTipoPermissao`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `codUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `codEmpresa` int(11) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `codPermissao` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`codUsuario`),
  KEY `fk_usuario_empresa1_idx` (`codEmpresa`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `venda`
--

DROP TABLE IF EXISTS `venda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venda` (
  `codVenda` int(11) NOT NULL AUTO_INCREMENT,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `valor` double NOT NULL,
  `empresa_codEmpresa` int(11) NOT NULL,
  `cliente_codCliente` int(11) NOT NULL,
  PRIMARY KEY (`codVenda`),
  KEY `fk_venda_empresa1_idx` (`empresa_codEmpresa`),
  KEY `fk_venda_cliente1_idx` (`cliente_codCliente`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping events for database 'gerirmeusalao'
--

--
-- Dumping routines for database 'gerirmeusalao'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-15 15:44:06
