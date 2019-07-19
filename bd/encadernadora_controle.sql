-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 18-Jan-2019 às 20:18
-- Versão do servidor: 5.7.24
-- versão do PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `encadernadora_controle`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrega_alb`
--

DROP TABLE IF EXISTS `entrega_alb`;
CREATE TABLE IF NOT EXISTS `entrega_alb` (
  `entrega_id` int(4) NOT NULL AUTO_INCREMENT,
  `loja_id` int(4) NOT NULL,
  `os_alb` varchar(100) NOT NULL,
  `data_envio_loja` date NOT NULL,
  `status` varchar(250) NOT NULL,
  `status_receb` varchar(250) NOT NULL,
  `data_recebe_enca` varchar(250) NOT NULL,
  `data_envio_enca` varchar(150) NOT NULL,
  PRIMARY KEY (`entrega_id`),
  KEY `loja_id_fk` (`loja_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `entrega_alb`
--

INSERT INTO `entrega_alb` (`entrega_id`, `loja_id`, `os_alb`, `data_envio_loja`, `status`, `status_receb`, `data_recebe_enca`, `data_envio_enca`) VALUES
(1, 1, '44', '2019-01-02', 'Pago', '<span>Enviado</span>', '2019-01-18', '2019-01-18'),
(2, 2, '998877', '2019-01-01', 'Pago', '<span>Enviado</span>', '2019-01-18', '2019-01-18'),
(3, 3, '321541', '2019-01-14', 'Pago', '<span>NÃ£o Recebido</span>', '', ''),
(4, 4, '500665', '2019-01-12', 'Pago', '<span>Enviado</span>', '2019-01-18', '2019-01-18'),
(5, 5, '997770', '2019-01-02', 'Pago', '<span>NÃ£o Recebido</span>', '', ''),
(6, 6, '900000', '2019-01-08', 'Pago', '<span>NÃ£o Recebido</span>', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lojas`
--

DROP TABLE IF EXISTS `lojas`;
CREATE TABLE IF NOT EXISTS `lojas` (
  `loja_id` int(4) NOT NULL AUTO_INCREMENT,
  `loja_nome` varchar(250) NOT NULL,
  PRIMARY KEY (`loja_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `lojas`
--

INSERT INTO `lojas` (`loja_id`, `loja_nome`) VALUES
(1, 'LOJA 100 - JACOBINA'),
(2, 'LOJA 110 - JUAZEIRO'),
(3, 'LOJA 120 - PETROLINA (CENTRO)'),
(4, 'LOJA 500 - PETROLINA (RIVER)'),
(5, 'LOJA 700 - SENHOR DO BONFIM'),
(6, 'LOJA 900 - CAPIM GROSSO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(4) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `senha` varchar(150) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `senha`) VALUES
(1, 'encadernadora', 'imagem');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `entrega_alb`
--
ALTER TABLE `entrega_alb`
  ADD CONSTRAINT `loja_id_fk` FOREIGN KEY (`loja_id`) REFERENCES `lojas` (`loja_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
