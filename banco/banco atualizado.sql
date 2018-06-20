CREATE DATABASE IF NOT EXISTS `loja_teste1` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `loja_teste1`;

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  `dataCriacao` varchar(50) DEFAULT NULL,
  `dataModificacao` varchar(50) DEFAULT NULL,
  `observacao` varchar(50) DEFAULT NULL,
  `detalhes` varchar(50) DEFAULT NULL,
  `particularidade` varchar(50) DEFAULT NULL,
  `importancia` varchar(50) DEFAULT NULL,
  `ativo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valorTotal` float NOT NULL,
  `dataPedido` varchar(50) NOT NULL,
  `cliente` varchar(50) NOT NULL,
  `vendedor` varchar(50) NOT NULL,
  `filial` varchar(50) NOT NULL,
  `numeroDeItens` varchar(50) NOT NULL,
  `aprovado` varchar(50) NOT NULL,
  `ativo` varchar(1) DEFAULT 's',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `pedidos_produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `IdPedido` int(11) DEFAULT NULL,
  `IdProduto` int(11) DEFAULT NULL,
  `Quantidade` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `emailRecuperacao` varchar(30) DEFAULT NULL,
  `celular` varchar(30) DEFAULT NULL,
  `perguntaRecuperacao` varchar(30) DEFAULT NULL,
  `respostaRecuperacao` varchar(30) DEFAULT NULL,
  `ativo` varchar(1) NOT NULL DEFAULT 's',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

