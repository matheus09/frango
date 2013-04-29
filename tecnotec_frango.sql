-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 29-Abr-2013 às 13:59
-- Versão do servidor: 5.0.91-community-cll
-- versão do PHP: 5.3.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `tecnotec_frango`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `codAdmin` int(2) NOT NULL auto_increment,
  `nome` varchar(20) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(20) NOT NULL,
  PRIMARY KEY  (`codAdmin`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`codAdmin`, `nome`, `login`, `senha`) VALUES
(1, 'Administrador', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `idCliente` int(2) NOT NULL auto_increment,
  `nome` varchar(20) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `dataNascimento` varchar(10) NOT NULL,
  PRIMARY KEY  (`idCliente`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nome`, `cpf`, `telefone`, `endereco`, `dataNascimento`) VALUES
(23, 'yago', '100.738.074-86', '(84) 5565-5551', 'Rua João de Deus', '1992-06-08'),
(26, 'Diego Olinto', '053.173.214-25', '(84) 3643-1566', 'Rua Sao Joao', '1991-08-21'),
(25, 'Junior', '091.103.704-71', '(84) 9996-0115', 'Rua das perfideas', '1992-03-07');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE IF NOT EXISTS `estoque` (
  `idProduto` int(2) NOT NULL default '0',
  `qtd` int(3) NOT NULL,
  PRIMARY KEY  (`idProduto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE IF NOT EXISTS `fornecedor` (
  `idFornecedor` int(2) NOT NULL auto_increment,
  `nome` varchar(20) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `cnpj` int(11) NOT NULL,
  `telefone` varchar(8) NOT NULL,
  PRIMARY KEY  (`idFornecedor`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`idFornecedor`, `nome`, `endereco`, `cnpj`, `telefone`) VALUES
(1, 'lol', 'okokok', 0, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE IF NOT EXISTS `funcionario` (
  `idFuncionario` int(2) NOT NULL auto_increment,
  `nome` varchar(20) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `dataNascimento` varchar(10) NOT NULL,
  `salario` float NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(20) NOT NULL,
  PRIMARY KEY  (`idFuncionario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`idFuncionario`, `nome`, `cpf`, `telefone`, `dataNascimento`, `salario`, `endereco`, `login`, `senha`) VALUES
(9, 'Maria Prea', '035.364.784-50', '(34) 1744-4455', '1977-11-24', 1500, 'Rua dos prea 100', 'totonha', 'maria'),
(13, 'Garrafa Quebrada', '091.103.704-71', '(84) 9819-8347', '1992-03-07', 45, 'Rua Sao Joao', 'garrafa', 'cerveja');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itemPedido`
--

CREATE TABLE IF NOT EXISTS `itemPedido` (
  `codPedido` int(2) NOT NULL,
  `codProduto` int(2) NOT NULL,
  `qtd` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `codPedido` int(2) NOT NULL auto_increment,
  `codAdmin` int(2) NOT NULL,
  `totalPed` float NOT NULL,
  PRIMARY KEY  (`codPedido`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `idProduto` int(2) NOT NULL auto_increment,
  `codFornecedor` int(2) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `valorVenda` float NOT NULL,
  `valorCompra` float NOT NULL,
  PRIMARY KEY  (`idProduto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `idReserva` int(2) NOT NULL default '0',
  `idProduto` int(2) NOT NULL,
  `idCliente` int(2) NOT NULL,
  `qtd` int(3) NOT NULL,
  `data` varchar(10) NOT NULL,
  `hora` varchar(5) NOT NULL,
  PRIMARY KEY  (`idReserva`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE IF NOT EXISTS `vendas` (
  `idVenda` int(2) NOT NULL auto_increment,
  `idFuncionario` int(2) NOT NULL,
  `idProduto` int(2) NOT NULL,
  `idCliente` int(2) NOT NULL,
  `data` varchar(10) NOT NULL,
  `qtdVenda` int(3) NOT NULL,
  PRIMARY KEY  (`idVenda`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
