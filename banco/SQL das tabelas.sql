-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.1.26-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table loja_teste1.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table loja_teste1.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `celular` varchar(30) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `endereco` varchar(30) DEFAULT NULL,
  `cep` varchar(30) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `estado` varchar(30) DEFAULT NULL,
  `pais` varchar(30) DEFAULT NULL,
  `ativo` varchar(1) DEFAULT NULL,
  `tipoCliente` varchar(15) DEFAULT NULL,
  `cpf` varchar(30) DEFAULT NULL,
  `rg` varchar(30) DEFAULT NULL,
  `genero` varchar(30) DEFAULT NULL,
  `cnpj` varchar(30) DEFAULT NULL,
  `inscricaoEstadual` varchar(30) DEFAULT NULL,
  `nomeFantasia` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table loja_teste1.filiais
CREATE TABLE IF NOT EXISTS `filiais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cep` varchar(30) NOT NULL,
  `logradouro` varchar(30) NOT NULL,
  `bairro` varchar(30) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `pais` varchar(30) DEFAULT NULL,
  `dataDeInauguracao` date NOT NULL,
  `ativo` varchar(1) NOT NULL DEFAULT 's',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table loja_teste1.pedido
CREATE TABLE IF NOT EXISTS `pedido` (
  `numero` int(11) NOT NULL AUTO_INCREMENT,
  `valorTotal` float NOT NULL,
  `dataPedido` date NOT NULL,
  `ativo` varchar(1) DEFAULT 's',
  PRIMARY KEY (`numero`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table loja_teste1.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `idProduto` int(10) NOT NULL AUTO_INCREMENT,
  `codProduto` varchar(30) CHARACTER SET utf16 NOT NULL,
  `valor` double NOT NULL,
  `aVenda` varchar(1) CHARACTER SET utf16 DEFAULT 's',
  `idCategoriaProduto` int(3) DEFAULT NULL,
  `nomeProduto` varchar(45) CHARACTER SET utf16 NOT NULL,
  `cor` varchar(30) CHARACTER SET utf16 DEFAULT NULL,
  `pesoBruto` varchar(30) CHARACTER SET utf16 DEFAULT NULL,
  `dimensoes` varchar(30) CHARACTER SET utf16 DEFAULT NULL,
  `material` varchar(30) CHARACTER SET utf16 DEFAULT NULL,
  `descricao` text CHARACTER SET utf16,
  PRIMARY KEY (`idProduto`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table loja_teste1.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `emailRecuperacao` varchar(30) DEFAULT NULL,
  `celular` varchar(30) DEFAULT NULL,
  `perguntaRecuperacao` varchar(30) DEFAULT NULL,
  `respostaRecuperacao` varchar(30) DEFAULT NULL,
  `ativo` varchar(1) NOT NULL DEFAULT 's',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table loja_teste1.vendedores
CREATE TABLE IF NOT EXISTS `vendedores` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `celular` varchar(30) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `endereco` varchar(30) DEFAULT NULL,
  `cep` varchar(30) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `estado` varchar(30) DEFAULT NULL,
  `pais` varchar(30) DEFAULT NULL,
  `ativo` varchar(1) NOT NULL,
  `cpf` varchar(30) NOT NULL,
  `rg` varchar(30) DEFAULT NULL,
  `genero` varchar(30) DEFAULT NULL,
  `dataDeNascimento` date DEFAULT NULL,
  `dataDeAdmissao` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
