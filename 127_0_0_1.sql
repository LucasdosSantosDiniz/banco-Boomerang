-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 22-Jan-2021 às 01:19
-- Versão do servidor: 5.7.26
-- versão do PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boomerang_bank`
--
CREATE DATABASE IF NOT EXISTS `boomerang_bank` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `boomerang_bank`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `num_conta` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `agencia` int(5) NOT NULL,
  `operacao` varchar(20) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  PRIMARY KEY (`num_conta`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`num_conta`, `nome`, `email`, `senha`, `agencia`, `operacao`, `cpf`, `cidade`, `estado`, `data_cadastro`) VALUES
(100, 'Neymar da Silva Santos JÃºnior', 'meninoney@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1110, 'Corrente', '11122233300', 'Santos', 'Sao Paulo', '2021-01-18 23:08:21'),
(101, 'Gusttavo Lima', 'embaixador@yahoo.com.br', '81dc9bdb52d04dc20036dbd8313ed055', 2000, 'Corrente', '44455566600', 'Goiania', 'Goias', '2021-01-18 23:10:15'),
(102, 'Marina Ruy Barbosa', 'mry@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 4000, 'Corrente', '77788899910', 'Rio de Janeiro', 'Rio de Janeiro', '2021-01-18 23:12:08'),
(103, 'Felipe Neto', 'fn@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 4000, 'Corrente', '10111213141', 'Rio de Janeiro', 'Rio de Janeiro', '2021-01-18 23:14:44'),
(104, 'Ivete Sangalo', 'ivetesangalo@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 7000, 'Poupanca', '74185296300', 'Salvador', 'Bahia', '2021-01-18 23:18:03'),
(105, 'Jair Bolsonaro', 'mito@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 6000, 'Poupanca', '15975342688', 'Brasilia', 'Distrito Federal', '2021-01-18 23:20:31'),
(106, 'Pablo Vittar', 'pv@yahoo.com.br', '81dc9bdb52d04dc20036dbd8313ed055', 3000, 'Corrente', '02486315799', 'Uberlandia', 'Minas Gerais', '2021-01-18 23:22:17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `conta`
--

DROP TABLE IF EXISTS `conta`;
CREATE TABLE IF NOT EXISTS `conta` (
  `id_conta` int(11) NOT NULL AUTO_INCREMENT,
  `num_conta` int(11) DEFAULT NULL,
  `deposito` int(11) DEFAULT NULL,
  `saque` int(11) DEFAULT NULL,
  `transferencia` int(11) DEFAULT NULL,
  `saldo` int(11) DEFAULT NULL,
  `data_conta` datetime DEFAULT NULL,
  PRIMARY KEY (`id_conta`),
  KEY `num_conta` (`num_conta`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `conta`
--

INSERT INTO `conta` (`id_conta`, `num_conta`, `deposito`, `saque`, `transferencia`, `saldo`, `data_conta`) VALUES
(1, 100, 15000, NULL, NULL, 15000, '2021-01-18 23:23:02'),
(2, 101, 10000, NULL, NULL, 10000, '2021-01-18 23:23:28'),
(3, 102, 8000, NULL, NULL, 8000, '2021-01-18 23:24:05'),
(4, 103, 5000, NULL, NULL, 5000, '2021-01-18 23:24:25'),
(5, 104, 14000, NULL, NULL, 14000, '2021-01-18 23:24:46'),
(6, 105, 10000, NULL, NULL, 10000, '2021-01-18 23:25:20'),
(7, 106, 7000, NULL, NULL, 7000, '2021-01-18 23:25:40'),
(8, 106, 3000, NULL, NULL, 10000, '2021-01-18 23:26:17'),
(9, 106, NULL, NULL, 1500, 8500, '2021-01-18 23:28:02'),
(10, 105, 1500, NULL, NULL, 11500, '2021-01-18 23:28:02'),
(11, 106, NULL, 500, NULL, 8000, '2021-01-18 23:28:15'),
(12, 100, NULL, 2000, NULL, 13000, '2021-01-18 23:28:56'),
(13, 100, NULL, NULL, 1200, 11800, '2021-01-18 23:29:19'),
(14, 101, 1200, NULL, NULL, 11200, '2021-01-18 23:29:19'),
(15, 100, 600, NULL, NULL, 12400, '2021-01-18 23:29:28'),
(16, 101, NULL, 300, NULL, 10900, '2021-01-18 23:30:07'),
(17, 101, NULL, NULL, 1200, 9700, '2021-01-18 23:30:22'),
(18, 104, 1200, NULL, NULL, 15200, '2021-01-18 23:30:22'),
(19, 101, 9000, NULL, NULL, 18700, '2021-01-18 23:30:32'),
(20, 102, NULL, 2500, NULL, 5500, '2021-01-18 23:32:12'),
(21, 102, NULL, NULL, 1000, 4500, '2021-01-18 23:32:36'),
(22, 105, 1000, NULL, NULL, 12500, '2021-01-18 23:32:36'),
(23, 102, 6000, NULL, NULL, 10500, '2021-01-18 23:32:45'),
(24, 103, NULL, NULL, 3000, 2000, '2021-01-18 23:33:19'),
(25, 100, 3000, NULL, NULL, 15400, '2021-01-18 23:33:19'),
(26, 103, NULL, 500, NULL, 1500, '2021-01-18 23:33:26'),
(27, 103, 2000, NULL, NULL, 3500, '2021-01-18 23:34:14'),
(28, 104, 10000, NULL, NULL, 25200, '2021-01-18 23:34:39'),
(29, 104, NULL, NULL, 2500, 22700, '2021-01-18 23:35:00'),
(30, 102, 2500, NULL, NULL, 13000, '2021-01-18 23:35:00'),
(31, 105, 6000, NULL, NULL, 18500, '2021-01-18 23:36:48'),
(32, 105, NULL, NULL, 3000, 15500, '2021-01-18 23:37:04'),
(33, 103, 3000, NULL, NULL, 6500, '2021-01-18 23:37:04'),
(34, 100, NULL, NULL, 200, 15200, '2021-01-20 13:29:28'),
(35, 103, 200, NULL, NULL, 6700, '2021-01-20 13:29:29');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `conta`
--
ALTER TABLE `conta`
  ADD CONSTRAINT `fk_num_conta` FOREIGN KEY (`num_conta`) REFERENCES `cliente` (`num_conta`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
