-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 21-Jul-2019 às 09:51
-- Versão do servidor: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_encadernadora`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cantoneira`
--

CREATE TABLE `cantoneira` (
  `id_cantoneira` int(4) NOT NULL,
  `nome_cantoneira` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cantoneira`
--

INSERT INTO `cantoneira` (`id_cantoneira`, `nome_cantoneira`) VALUES
(1, 'DOURADA'),
(2, 'PRATEADA'),
(3, 'SEM CANTONEIRA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `corte`
--

CREATE TABLE `corte` (
  `id_corte` int(4) NOT NULL,
  `nome_corte` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `corte`
--

INSERT INTO `corte` (`id_corte`, `nome_corte`) VALUES
(1, 'DOURADO'),
(2, 'PRATEADO'),
(3, 'SEM CORTE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `laminacaocapa`
--

CREATE TABLE `laminacaocapa` (
  `id_laminacaocapa` int(4) NOT NULL,
  `nome_laminacaocapa` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `laminacaocapa`
--

INSERT INTO `laminacaocapa` (`id_laminacaocapa`, `nome_laminacaocapa`) VALUES
(1, 'FOSCO'),
(2, 'BRILHO'),
(3, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lojas`
--

CREATE TABLE `lojas` (
  `id_loja` int(4) NOT NULL,
  `nome_loja` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `lojas`
--

INSERT INTO `lojas` (`id_loja`, `nome_loja`) VALUES
(1, 'JACOBINA'),
(2, 'JUAZEIRO'),
(3, 'PETROLINA (CENTRO)'),
(4, 'PETROLINA (RIVER)'),
(5, 'CAPIM GROSSO'),
(6, 'SENHOR DO BONFIM');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelo_de_album`
--

CREATE TABLE `modelo_de_album` (
  `id_modelo` int(4) NOT NULL,
  `nome_modelo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `modelo_de_album`
--

INSERT INTO `modelo_de_album` (`id_modelo`, `nome_modelo`) VALUES
(1, ''),
(5, 'GOLD'),
(6, 'PLUS'),
(7, 'WIRE-O'),
(8, 'ENCARTE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelo_de_capa`
--

CREATE TABLE `modelo_de_capa` (
  `id_modelo_capa` int(4) NOT NULL,
  `nome_modelo_capa` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `modelo_de_capa`
--

INSERT INTO `modelo_de_capa` (`id_modelo_capa`, `nome_modelo_capa`) VALUES
(1, 'PERSONALIZADA'),
(2, 'LISA'),
(3, 'ENCARTE'),
(4, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelo_estojo`
--

CREATE TABLE `modelo_estojo` (
  `id_modelo_estojo` int(4) NOT NULL,
  `nome_modelo_estojo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `modelo_estojo`
--

INSERT INTO `modelo_estojo` (`id_modelo_estojo`, `nome_modelo_estojo`) VALUES
(1, 'LUXOR PERSONALIZADO'),
(2, 'LUXOR LISO'),
(3, 'LUVA'),
(4, 'SEM ESTOJO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelo_maleta`
--

CREATE TABLE `modelo_maleta` (
  `id_modelo_maleta` int(4) NOT NULL,
  `nome_modelo_maleta` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `modelo_maleta`
--

INSERT INTO `modelo_maleta` (`id_modelo_maleta`, `nome_modelo_maleta`) VALUES
(1, 'PERSONALIZADO'),
(2, 'LISO'),
(3, 'MALETA ENCARTE'),
(4, 'SEM MALETA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `numero_de_pagina`
--

CREATE TABLE `numero_de_pagina` (
  `id_numero_pag` int(4) NOT NULL,
  `nome_numero_pagina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `numero_de_pagina`
--

INSERT INTO `numero_de_pagina` (`id_numero_pag`, `nome_numero_pagina`) VALUES
(1, 20),
(2, 21),
(3, 22),
(4, 23),
(5, 24),
(6, 25),
(7, 26),
(8, 27),
(9, 28),
(10, 29);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(4) NOT NULL,
  `id_loja` int(4) NOT NULL,
  `os_fotografia` varchar(150) NOT NULL,
  `os` varchar(10) DEFAULT NULL,
  `codigo_cliente` int(6) DEFAULT NULL,
  `cliente` varchar(250) DEFAULT NULL,
  `email_cliente` varchar(250) DEFAULT NULL,
  `telefone_cliente` varchar(50) DEFAULT NULL,
  `vendedor` varchar(150) DEFAULT NULL,
  `status_pag` int(4) DEFAULT NULL,
  `valor` decimal(5,2) DEFAULT NULL,
  `id_status` int(4) DEFAULT NULL,
  `data_loja` varchar(100) DEFAULT NULL,
  `data_lab` varchar(20) DEFAULT NULL,
  `data_encad` varchar(20) DEFAULT NULL,
  `id_modelo` int(4) DEFAULT NULL,
  `id_tamanhoalb` int(4) DEFAULT NULL,
  `paginas` varchar(10) DEFAULT NULL,
  `id_laminacao` int(4) DEFAULT NULL,
  `id_modelocapa` int(4) DEFAULT NULL,
  `id_laminacaocapa` int(4) DEFAULT NULL,
  `id_cantoneira` int(4) DEFAULT NULL,
  `id_corte` int(4) DEFAULT NULL,
  `id_estojo` int(4) DEFAULT NULL,
  `id_maleta` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `id_loja`, `os_fotografia`, `os`, `codigo_cliente`, `cliente`, `email_cliente`, `telefone_cliente`, `vendedor`, `status_pag`, `valor`, `id_status`, `data_loja`, `data_lab`, `data_encad`, `id_modelo`, `id_tamanhoalb`, `paginas`, `id_laminacao`, `id_modelocapa`, `id_laminacaocapa`, `id_cantoneira`, `id_corte`, `id_estojo`, `id_maleta`) VALUES
(246, 6, '678786', '846', 701, 'Felipe', '', '', 'carine', 3, '87.82', 1, '2019-07-15', '', '', 1, 4, '', 6, 4, 3, 3, 3, 1, 4),
(247, 6, '678784', '847', 701, 'Felipe', '', '', 'carine', 3, '75.82', 1, '2019-07-15', '', '', 1, 4, '', 6, 4, 3, 3, 3, 1, 4),
(248, 3, '260972', '715', 926, 'arnor viana', '', '', 'maiara', 2, '166.00', 3, '2019-05-22', '2019-05-30', '2019-06-04', 6, 6, '24', 1, 1, 1, 3, 3, 4, 4),
(249, 1, '427107', '1458', 101, 'joão henrique ferreira', '', '', 'elaine', 3, '375.00', 3, '2019-04-12', '2019-05-22', '2019-05-24', 5, 11, '20', 1, 1, 1, 3, 1, 4, 4),
(250, 1, '423362', '1297', 101, 'aloesia goncalves ', '', '', 'elane', 3, '882.00', 3, '2019-03-18', '2019-05-29', '2019-05-30', 5, 11, '', 1, 1, 1, 3, 1, 4, 4),
(251, 1, '423374', '1454', 13, 'tulio cezar', '', '', 'ivanuza', 3, '391.45', 3, '2019-03-30', '2019-05-23', '2019-05-24', 5, 11, '26', 1, 1, 1, 3, 2, 4, 4),
(252, 1, '427417', '1436', 1809, 'tony', '', '', 'marco', 3, '58.10', 3, '2019-05-22', '2019-05-22', '2019-05-24', 8, 7, '', 1, 4, 3, 3, 3, 4, 4),
(253, 1, '426925', '1429', 166, 'pinga ', '', '', 'marco', 3, '58.10', 3, '2019-04-30', '2019-04-30', '2019-05-15', 8, 7, '', 6, 4, 3, 3, 3, 4, 4),
(254, 6, '678600', '826', 79, 'hebert', '', '', 'carine', 3, '80.00', 3, '2019-05-22', '2019-05-24', '2019-05-27', 8, 7, '', 6, 4, 3, 3, 3, 4, 4),
(255, 6, '679471', '812', 701, 'jonas', '', '', 'carine', 3, '70.00', 3, '2019-04-23', '2019-04-24', '2019-05-30', 8, 7, '', 6, 4, 3, 3, 3, 4, 4),
(256, 3, '260798', '704', 1156, 'yara magalhães', '', '', 'maiara', 2, '151.50', 3, '2019-05-15', '2019-05-21', '2019-05-30', 8, 7, '', 6, 4, 3, 3, 3, 4, 4),
(257, 3, '260300', '694', 1865, 'junior souza', '', '', 'maiara', 2, '151.50', 3, '2019-05-03', '2019-05-21', '2019-05-24', 8, 7, '', 6, 4, 3, 3, 3, 4, 4),
(258, 3, '261053', '717', 1237, 'williano', '', '', 'maiara', 3, '151.50', 3, '2019-05-22', '2019-05-30', '2019-06-04', 8, 7, '', 6, 4, 3, 3, 3, 4, 4),
(259, 3, '261329', '731', 1250, 'josé fernando', '', '', 'maiara', 2, '166.50', 3, '2019-06-05', '2019-06-07', '2019-06-11', 8, 7, '', 6, 4, 3, 3, 3, 4, 3),
(260, 3, '261052', '718', 1237, 'williano', '', '', 'maiara', 2, '151.50', 3, '2019-05-22', '2019-05-30', '2019-05-04', 8, 7, '', 6, 4, 3, 3, 3, 4, 3),
(261, 3, '259265', '665', 869, 'gil castro', '', '', 'maiara', 3, '171.50', 3, '2019-04-04', '2019-04-09', '2019-04-25', 8, 7, '', 6, 4, 3, 3, 3, 4, 3),
(262, 3, '260280', '692', 328, 'heronaldo', '', '', 'maiara', 3, '57.00', 3, '2019-05-03', '2019-05-10', '0019-05-17', 8, 7, '', 6, 4, 3, 3, 3, 4, 3),
(263, 3, '260173', '695', 1252, 'josefa amorim', '', '', 'maiara', 3, '57.00', 3, '2019-05-06', '2019-05-14', '2019-05-17', 8, 7, '', 6, 4, 3, 3, 3, 4, 4),
(264, 3, '260862', '707', 328, 'heronaldo', '', '', 'maiara', 3, '57.00', 3, '2019-05-15', '2019-05-21', '2019-05-24', 8, 7, '', 6, 4, 3, 3, 3, 4, 4),
(265, 3, '260863', '708', 328, 'heronaldo', '', '', 'maiara', 3, '92.00', 3, '2019-05-15', '2019-05-21', '2019-05-24', 8, 7, '', 6, 4, 3, 3, 3, 4, 4),
(266, 3, '260865', '710', 328, 'heronaldo', '', '', 'maiara', 3, '303.00', 3, '2019-05-15', '2019-05-21', '2019-05-24', 8, 7, '', 6, 4, 3, 3, 3, 4, 3),
(267, 5, '86241', '248', 1691, 'dodo rios', '', '', 'neia', 3, '57.00', 3, '2019-05-07', '2019-05-08', '2019-05-10', 8, 7, '', 6, 4, 3, 3, 3, 4, 4),
(268, 6, '679580', '811', 701, 'jonas', '', '', 'carine', 3, '141.00', 3, '2019-03-23', '2019-04-25', '2019-05-24', 5, 1, '20', 1, 1, 1, 3, 1, 4, 4),
(269, 6, '679650', '817', 194, 'jonas', '', '', 'carine', 3, '225.00', 3, '2019-05-04', '2019-05-07', '2019-05-10', 5, 3, '24', 1, 1, 1, 3, 1, 4, 4),
(270, 6, '679570', '798', 701, 'diego', '', '', 'carine', 3, '355.00', 3, '2019-04-23', '2019-04-25', '2019-05-17', 5, 3, '44', 1, 1, 1, 3, 3, 4, 4),
(271, 6, '678578', '823', 701, 'jonas', '', '', 'carine', 3, '238.00', 3, '2019-05-17', '2019-05-20', '2019-05-24', 5, 3, '26', 1, 1, 1, 3, 1, 4, 4),
(272, 6, '679662', '820', 194, 'felipe', '', '', 'carine', 3, '342.90', 3, '2019-05-14', '2019-05-20', '2019-05-24', 5, 3, '48', 1, 1, 1, 3, 1, 4, 4),
(273, 6, '679518', '819', 194, 'felipe', '', '', 'carine', 3, '378.90', 3, '2019-05-14', '2019-05-20', '2019-05-24', 5, 3, '40', 1, 1, 1, 3, 1, 4, 4),
(274, 6, '678956', '825', 701, 'brow', '', '', 'carine', 2, '270.00', 3, '2019-05-21', '2019-05-29', '2019-06-04', 5, 3, '40', 1, 1, 1, 3, 3, 1, 4),
(275, 6, '678496', '813', 701, 'brow', '', '', 'carine', 3, '270.00', 3, '2019-04-25', '2019-04-26', '2019-05-24', 5, 4, '32', 1, 1, 1, 3, 3, 1, 4),
(276, 6, '678589', '822', 701, 'matheus pinheiro', '', '', 'carine', 3, '275.94', 3, '2019-05-16', '2019-05-20', '2019-05-24', 5, 4, '42', 1, 1, 1, 3, 1, 4, 4),
(277, 6, '679556', '815', 194, 'hebert', '', '', 'carine', 3, '103.00', 3, '2019-05-04', '2019-05-07', '2019-05-13', 1, 4, '', 6, 4, 3, 3, 3, 1, 4),
(278, 6, '679661', '821', 194, 'felipe', '', '', 'carine', 2, '295.74', 3, '2019-05-16', '2019-05-20', '2019-05-24', 5, 4, '32', 1, 1, 1, 3, 1, 1, 4),
(279, 6, '679418', '799', 701, 'felipe', '', '', 'carine', 3, '351.80', 3, '2019-04-23', '2019-05-03', '2019-05-10', 5, 4, '36', 1, 1, 1, 3, 1, 1, 4),
(280, 6, '679659', '814', 701, 'felipe', '', '', 'carine', 3, '295.74', 3, '52019-04-01', '2019-05-07', '2019-05-10', 5, 4, '32', 1, 1, 1, 3, 1, 1, 4),
(282, 6, '679599', '816', 701, 'brow', '', '', 'carine', 3, '595.80', 3, '2019-05-04', '2019-05-07', '2019-05-10', 5, 8, '40', 1, 1, 1, 3, 3, 1, 4),
(283, 1, '427659', '1439', 1991, 'hermano', '', '', 'marco', 3, '148.73', 3, '2019-05-28', '2019-05-28', '2019-05-28', 5, 6, '20', 1, 1, 1, 3, 3, 4, 4),
(284, 1, '427024', '1432', 101, 'marinalva dos reis', '', '98047520', 'marco', 3, '800.00', 3, '2019-05-07', '2019-05-22', '2019-05-24', 5, 2, '30', 1, 1, 1, 3, 1, 1, 4),
(285, 1, '427660', '1438', 1991, 'hermano', '', '', 'marco', 3, '315.03', 3, '2019-05-28', '2019-05-28', '2019-05-28', 5, 5, '22', 1, 1, 1, 3, 3, 4, 4),
(286, 1, '427338', '1434', 1809, 'toni', '', '', 'marco', 3, '327.73', 3, '2019-05-16', '2019-05-17', '2019-05-17', 5, 3, '42', 1, 1, 1, 3, 3, 4, 4),
(287, 1, '425763', '1345', 1032, 'jessica', '', '', 'marco', 3, '197.73', 3, '2019-02-27', '2019-04-28', '2019-05-01', 5, 3, '22', 1, 1, 1, 3, 3, 4, 4),
(288, 1, '427433', '1435', 1214, 'bia rodrigues', '', '', 'marco', 3, '341.72', 3, '2019-05-22', '2019-05-24', '2019-05-24', 5, 3, '30', 1, 1, 1, 3, 3, 1, 4),
(289, 1, '427079', '1433', 1809, 'toni', '', '', 'marco', 3, '445.73', 3, '2019-05-13', '2019-05-13', '2019-05-15', 5, 3, '46', 1, 1, 1, 3, 3, 1, 4),
(290, 5, '86383', '250', 901, 'israel', '', '', 'neia', 3, '174.69', 3, '2019-05-25', '2019-05-27', '2019-05-28', 5, 1, '24', 1, 1, 1, 3, 1, 4, 4),
(291, 2, '240132', '207', 722, 'fabio cardoso', '', '', 'natalia', 3, '273.20', 3, '2019-05-10', '2019-05-18', '2019-05-22', 5, 2, '22', 1, 1, 1, 3, 3, 1, 4),
(292, 2, '240128', '208', 722, 'fabio cardoso', '', '', 'natalia', 3, '319.90', 3, '2019-05-10', '2019-05-20', '2019-05-24', 5, 2, '30', 1, 1, 1, 3, 2, 1, 4),
(293, 2, '240084', '205', 1001, 'weslei freitas', '', '', 'natalia', 3, '353.00', 3, '2019-05-02', '2019-05-10', '2019-05-16', 5, 4, '50', 1, 1, 1, 1, 1, 4, 4),
(294, 2, '239718', '203', 1105, 'zelia maria', '', '', 'amanda', 3, '191.60', 1, '2019-04-02', '', '', 5, 3, '28', 1, 1, 1, 3, 3, 2, 4),
(295, 3, '260722', '702', 883, 'wesley lopes', '', '', 'maiara', 3, '195.20', 3, '2019-05-13', '2019-05-22', '2019-05-23', 5, 3, '22', 1, 1, 1, 3, 3, 4, 4),
(296, 3, '260726', '703', 883, 'wesley lopes', '', '', 'maiara', 3, '182.00', 3, '2019-05-13', '2019-05-22', '2019-05-23', 5, 3, '20', 1, 1, 3, 3, 3, 4, 4),
(297, 3, '260904', '713', 883, 'wesley lopes', '', '', 'maiara', 3, '248.00', 3, '2019-05-16', '2019-05-28', '2019-05-29', 6, 3, '30', 1, 1, 1, 3, 3, 4, 4),
(298, 3, '260724', '700', 883, 'wesley lopes', '', '', 'maiara', 3, '182.00', 3, '2019-05-13', '2019-05-24', '2019-05-25', 6, 3, '20', 1, 1, 1, 3, 3, 4, 4),
(299, 3, '260412', '696', 1310, 'lucia', '', '', 'maiara', 3, '146.00', 3, '2019-05-13', '2019-05-17', '2019-05-18', 5, 6, '20', 1, 1, 1, 3, 3, 4, 4),
(300, 3, '260725', '699', 883, 'wesley lopes', '', '', 'maiara', 3, '182.00', 3, '2019-05-13', '2019-05-16', '2019-05-22', 5, 3, '20', 1, 1, 1, 3, 3, 4, 4),
(301, 3, '260592', '698', 883, 'wesley lopes', '', '', 'maiara', 3, '208.40', 3, '2019-05-13', '2019-05-15', '2019-05-22', 5, 3, '24', 1, 1, 1, 3, 3, 4, 4),
(302, 3, '260723', '701', 883, 'wesley lopes', '', '', 'maiara', 3, '182.00', 3, '2019-05-13', '2019-05-16', '2019-05-22', 6, 3, '20', 1, 1, 1, 3, 3, 4, 4),
(303, 2, '240131', '210', 722, 'fabio cardoso', '', '', 'amanda', 3, '261.60', 3, '2019-05-10', '2019-05-18', '2019-05-22', 5, 2, '20', 1, 1, 1, 1, 1, 1, 4),
(304, 3, '261178', '723', 1023, 'gilmar araujo', '', '', 'maiara', 3, '325.00', 3, '2019-05-27', '2019-05-30', '2019-06-05', 5, 3, '42', 1, 1, 1, 3, 3, 4, 4),
(305, 2, '240129', '209', 722, 'fabio cardoso', '', '', 'amanda', 3, '273.20', 3, '2019-05-10', '2019-05-18', '2019-05-22', 5, 13, '22', 1, 1, 1, 3, 1, 4, 4),
(306, 3, '261055', '719', 926, 'arnor viana', '', '', 'tácio', 3, '166.00', 3, '2019-05-22', '2019-05-30', '2019-06-04', 6, 6, '24', 6, 1, 1, 3, 3, 4, 4),
(307, 3, '260219', '691', 1201, 'joão leonardo', '', '', 'maiara', 3, '311.60', 3, '2019-05-02', '2019-05-10', '2019-05-16', 5, 2, '32', 1, 1, 1, 3, 3, 1, 4),
(308, 3, '257671', '620', 329, 'heronaldo', '', '', 'maiara', 3, '450.60', 3, '2019-06-26', '2019-05-08', '2019-05-15', 6, 3, '42', 1, 1, 1, 3, 2, 3, 4),
(309, 3, '260500', '720', 1201, 'alciole rodrigues', '', '', 'tacio', 3, '157.80', 3, '2019-05-24', '2019-05-30', '2019-06-04', 6, 1, '24', 1, 1, 1, 3, 1, 4, 4),
(310, 3, '260932', '714', 1292, 'david', '', '', 'maiara', 3, '208.40', 3, '2019-05-22', '2019-05-30', '2019-06-05', 6, 3, '24', 1, 1, 1, 3, 3, 4, 4),
(311, 3, '260150', '716', 909, 'gilson pereira', '', '', 'maiara', 2, '182.00', 3, '2019-05-22', '2019-05-30', '2019-06-05', 6, 3, '20', 1, 1, 1, 3, 3, 4, 4),
(312, 3, '261181', '725', 725, 'wesley lopes', '', '', 'maiara', 3, '300.80', 3, '2019-05-27', '2019-05-30', '2019-06-05', 6, 3, '38', 1, 1, 1, 3, 3, 4, 4),
(313, 6, '678848', '844', 404406, 'brow', '', '', 'carine', 3, '217.00', 2, '2019-07-12', '2019-07-18', '', 5, 2, '20', 1, 1, 1, 3, 1, 1, 4),
(314, 1, '427133', '1469', 13, 'Cecilia lima tinel', '', '74991540586', 'elane', 3, '749.34', 2, '2019-05-22', '2019-07-18', '', 5, 11, '20', 1, 1, 1, 3, 1, 4, 4),
(315, 3, '262356', '743', 883, 'wesley lopes', '', '', 'maiara', 3, '221.60', 3, '2019-07-04', '2019-07-09', '2019-07-12', 6, 3, '26', 1, 1, 1, 3, 3, 4, 4),
(316, 3, '262119', '739', 883, 'wesley lopes', '', '', 'maiara', 3, '287.60', 3, '2019-06-27', '2019-07-11', '2019-07-12', 6, 3, '36', 1, 1, 1, 3, 3, 4, 4),
(317, 1, '427148', '1471', 13, 'Lara kamilly rios medice', '', '988058473', 'eLANE', 3, '375.00', 1, '2019-05-27', '', '', 7, 11, '20', 5, 1, 1, 3, 3, 4, 4),
(318, 3, '26523', '746', 883, 'wesley lopes', '', '', 'maiara', 3, '195.20', 3, '2019-07-08', '2019-07-11', '2019-07-12', 6, 3, '22', 1, 1, 1, 3, 3, 4, 4),
(319, 6, '679765', '841', 701, 'Felipe', '', '', 'carine', 1, '337.50', 2, '2019-07-12', '2019-07-19', '', 5, 4, '40', 1, 1, 1, 3, 1, 1, 4),
(320, 1, '427153', '1477', 13, 'lUAN SOUZA TAVARES', '', '74-988284126', 'eLANE', 3, '250.00', 1, '2019-06-26', '', '', 7, 6, '10', 5, 2, 3, 3, 3, 4, 4),
(321, 6, '679767', '842', 701, 'Felipe', '', '', 'carine', 1, '437.60', 2, '2019-07-12', '2019-07-19', '', 5, 3, '', 1, 1, 1, 3, 1, 1, 4),
(322, 1, '427153', '1476', 13, 'lUAN SOUZA TAVARES', '', '74-988284126', 'eLANE', 3, '250.00', 1, '2019-07-26', '', '', 7, 6, '10', 5, 2, 3, 3, 3, 4, 4),
(323, 6, '679766', '843', 701, 'Felipe', '', '', 'carine', 1, '402.30', 2, '2019-07-12', '2019-07-19', '', 5, 4, '', 6, 1, 1, 3, 1, 1, 4),
(324, 1, '428559', '1504', 1809, 'TONI', '', '', 'MARCO', 3, '562.73', 1, '2019-07-15', '', '', 5, 3, '64', 1, 1, 1, 3, 3, 1, 4),
(325, 3, '262400', '756', 209, 'ALCIOLE', '', '', '1202', 2, '166.20', 2, '2019-07-12', '2019-07-19', '', 6, 1, '26', 1, 1, 2, 3, 1, 4, 4),
(326, 3, '262407', '755', 209, 'ALCIOLE', '', '', '1202', 2, '157.80', 2, '2019-07-12', '2019-07-19', '', 6, 1, '24', 1, 1, 2, 3, 1, 4, 4),
(327, 3, '262544', '747', 1201, 'THIAGO', '', '', '1202', 2, '248.00', 2, '2019-07-08', '2019-07-19', '', 6, 3, '', 1, 1, 1, 3, 3, 4, 4),
(328, 3, '262242', '742', 1250, 'JOSE FERNANDO', '', '', '1202', 2, '360.00', 1, '2019-07-04', '', '', 6, 3, '30', 1, 1, 1, 3, 3, 1, 4),
(329, 3, '262267', '749', 1201, 'REGILEIDE', '', '', '1201', 2, '175.00', 2, '2019-07-11', '2019-07-19', '', 8, 4, '', 6, 4, 3, 3, 3, 4, 3),
(330, 3, '262545', '748', 856, 'LUCINEIDE', '', '', '1202', 2, '275.20', 2, '2019-07-08', '2019-07-19', '', 6, 3, '22', 1, 1, 1, 3, 3, 4, 4),
(331, 3, '262685', '750', 883, 'WESLEY LOPES', '', '', '1202', 2, '182.00', 2, '2019-07-11', '2019-07-19', '', 6, 3, '20', 1, 1, 1, 3, 3, 4, 4),
(332, 3, '262686', '751', 883, 'WESLEY LOPES', '', '', '1202', 2, '182.00', 2, '2019-07-11', '2019-07-19', '', 6, 3, '20', 1, 1, 1, 3, 3, 4, 4),
(333, 1, '427136', '1467', 13, 'ediene da SILVA LIMA', '', '999617777', 'elane', 3, '250.00', 1, '2019-05-14', '', '', 7, 6, '10', 5, 2, 3, 3, 3, 4, 4),
(334, 5, '86579', '404', 890, 'aline', 'loja9@fotoimagem.com.br', '', '902', 1, '149.00', 1, '2019-07-10', '', '', 8, 7, '', 6, 4, 3, 3, 3, 4, 3),
(335, 5, '86580', '405', 890, 'aline', '', '', '902', 1, '57.00', 1, '2019-07-10', '', '', 8, 7, '', 6, 4, 3, 3, 3, 4, 4),
(336, 5, '86588', '406', 1935, 'LINY', '', '', '902', 1, '57.00', 1, '2019-07-11', '', '', 8, 7, '', 6, 4, 3, 3, 3, 4, 4),
(337, 5, '86613', '407', 1691, 'DODO RIOS', '', '', '902', 1, '57.00', 1, '2019-07-15', '', '', 8, 7, '', 6, 4, 3, 3, 3, 4, 4),
(338, 3, '262490', '745', 328, 'heronaldo', '', '', 'maiara', 2, '228.00', 3, '2019-07-08', '2019-07-11', '2019-07-17', 8, 7, '', 6, 4, 3, 3, 3, 4, 4),
(339, 3, '262219', '741', 328, 'heronaldo', '', '', 'maiara', 2, '114.00', 3, '2019-06-27', '2019-07-11', '2019-07-12', 8, 7, '', 6, 4, 3, 3, 3, 4, 4),
(340, 3, '261177', '724', 1023, 'gilmar araujo', '', '', 'maiara', 2, '690.00', 3, '2019-05-27', '2019-06-05', '2019-06-10', 5, 3, '84', 1, 1, 3, 3, 3, 3, 4),
(341, 3, '262218', '740', 328, 'heronaldo', '', '', 'maiara', 2, '151.50', 3, '2019-06-27', '2019-07-11', '2019-07-12', 8, 7, '', 6, 4, 3, 3, 3, 4, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE `status` (
  `id_status` int(4) NOT NULL,
  `status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` (`id_status`, `status`) VALUES
(1, 'Não Recebido'),
(2, 'Recebido no Minilab'),
(3, 'Recebido na Encadernadora'),
(4, 'Enviado Para a Loja');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_pag`
--

CREATE TABLE `status_pag` (
  `id_pagamento` int(4) NOT NULL,
  `statuspg` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `status_pag`
--

INSERT INTO `status_pag` (`id_pagamento`, `statuspg`) VALUES
(1, 'CAPTADO'),
(2, 'PRECIFICADO'),
(3, 'PAGO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tamanho_de_album`
--

CREATE TABLE `tamanho_de_album` (
  `id_tamanho_album` int(4) NOT NULL,
  `nome_tamanho_album` varchar(150) NOT NULL,
  `preco_album` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tamanho_de_album`
--

INSERT INTO `tamanho_de_album` (`id_tamanho_album`, `nome_tamanho_album`, `preco_album`) VALUES
(1, '20x15', 40),
(2, '20x25', 46),
(3, '20x30', 40),
(4, '20x25', 46),
(5, '25x25', 52),
(6, '20x20', 46),
(7, 'ENCARTE', 57),
(8, '30x30', 0),
(9, '30x40', 0),
(10, '25x30', 0),
(11, '30x20', 0),
(12, '30x45', 0),
(13, '25x20', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_laminacao`
--

CREATE TABLE `tipo_laminacao` (
  `id_laminacao` int(4) NOT NULL,
  `nome_laminacao` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_laminacao`
--

INSERT INTO `tipo_laminacao` (`id_laminacao`, `nome_laminacao`) VALUES
(1, 'VERNIZ FOSCO'),
(2, 'VERNIZ BRILHANTE'),
(5, 'SEM LAMINAÇÃO'),
(6, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(4) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `senha` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `senha`) VALUES
(1, 'encadernadora', 'imagem'),
(2, 'lab', 'vivo01'),
(3, 'suporte', 'imagine4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cantoneira`
--
ALTER TABLE `cantoneira`
  ADD PRIMARY KEY (`id_cantoneira`);

--
-- Indexes for table `corte`
--
ALTER TABLE `corte`
  ADD PRIMARY KEY (`id_corte`);

--
-- Indexes for table `laminacaocapa`
--
ALTER TABLE `laminacaocapa`
  ADD PRIMARY KEY (`id_laminacaocapa`);

--
-- Indexes for table `lojas`
--
ALTER TABLE `lojas`
  ADD PRIMARY KEY (`id_loja`);

--
-- Indexes for table `modelo_de_album`
--
ALTER TABLE `modelo_de_album`
  ADD PRIMARY KEY (`id_modelo`);

--
-- Indexes for table `modelo_de_capa`
--
ALTER TABLE `modelo_de_capa`
  ADD PRIMARY KEY (`id_modelo_capa`);

--
-- Indexes for table `modelo_estojo`
--
ALTER TABLE `modelo_estojo`
  ADD PRIMARY KEY (`id_modelo_estojo`);

--
-- Indexes for table `modelo_maleta`
--
ALTER TABLE `modelo_maleta`
  ADD PRIMARY KEY (`id_modelo_maleta`);

--
-- Indexes for table `numero_de_pagina`
--
ALTER TABLE `numero_de_pagina`
  ADD PRIMARY KEY (`id_numero_pag`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `fk_loja` (`id_loja`),
  ADD KEY `fk_modelo_album` (`id_modelo`),
  ADD KEY `fk_modelo_capa` (`id_modelocapa`),
  ADD KEY `fk_modelo_estojo` (`id_estojo`),
  ADD KEY `fk_modelo_maleta` (`id_maleta`),
  ADD KEY `fk_tamanho_album` (`id_tamanhoalb`),
  ADD KEY `fk_laminacao` (`id_laminacao`),
  ADD KEY `fk_laminacao_capa` (`id_laminacaocapa`),
  ADD KEY `fk_corte` (`id_corte`),
  ADD KEY `fk_cantoneira` (`id_cantoneira`),
  ADD KEY `fk_status` (`id_status`),
  ADD KEY `fk_statuspg` (`status_pag`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `status_pag`
--
ALTER TABLE `status_pag`
  ADD PRIMARY KEY (`id_pagamento`);

--
-- Indexes for table `tamanho_de_album`
--
ALTER TABLE `tamanho_de_album`
  ADD PRIMARY KEY (`id_tamanho_album`);

--
-- Indexes for table `tipo_laminacao`
--
ALTER TABLE `tipo_laminacao`
  ADD PRIMARY KEY (`id_laminacao`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cantoneira`
--
ALTER TABLE `cantoneira`
  MODIFY `id_cantoneira` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `corte`
--
ALTER TABLE `corte`
  MODIFY `id_corte` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `laminacaocapa`
--
ALTER TABLE `laminacaocapa`
  MODIFY `id_laminacaocapa` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lojas`
--
ALTER TABLE `lojas`
  MODIFY `id_loja` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `modelo_de_album`
--
ALTER TABLE `modelo_de_album`
  MODIFY `id_modelo` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `modelo_de_capa`
--
ALTER TABLE `modelo_de_capa`
  MODIFY `id_modelo_capa` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `modelo_estojo`
--
ALTER TABLE `modelo_estojo`
  MODIFY `id_modelo_estojo` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `modelo_maleta`
--
ALTER TABLE `modelo_maleta`
  MODIFY `id_modelo_maleta` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `numero_de_pagina`
--
ALTER TABLE `numero_de_pagina`
  MODIFY `id_numero_pag` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=342;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `status_pag`
--
ALTER TABLE `status_pag`
  MODIFY `id_pagamento` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tamanho_de_album`
--
ALTER TABLE `tamanho_de_album`
  MODIFY `id_tamanho_album` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tipo_laminacao`
--
ALTER TABLE `tipo_laminacao`
  MODIFY `id_laminacao` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_cantoneira` FOREIGN KEY (`id_cantoneira`) REFERENCES `cantoneira` (`id_cantoneira`),
  ADD CONSTRAINT `fk_corte` FOREIGN KEY (`id_corte`) REFERENCES `corte` (`id_corte`),
  ADD CONSTRAINT `fk_laminacao` FOREIGN KEY (`id_laminacao`) REFERENCES `tipo_laminacao` (`id_laminacao`),
  ADD CONSTRAINT `fk_laminacao_capa` FOREIGN KEY (`id_laminacaocapa`) REFERENCES `laminacaocapa` (`id_laminacaocapa`),
  ADD CONSTRAINT `fk_loja` FOREIGN KEY (`id_loja`) REFERENCES `lojas` (`id_loja`),
  ADD CONSTRAINT `fk_modelo_album` FOREIGN KEY (`id_modelo`) REFERENCES `modelo_de_album` (`id_modelo`),
  ADD CONSTRAINT `fk_modelo_capa` FOREIGN KEY (`id_modelocapa`) REFERENCES `modelo_de_capa` (`id_modelo_capa`),
  ADD CONSTRAINT `fk_modelo_estojo` FOREIGN KEY (`id_estojo`) REFERENCES `modelo_estojo` (`id_modelo_estojo`),
  ADD CONSTRAINT `fk_modelo_maleta` FOREIGN KEY (`id_maleta`) REFERENCES `modelo_maleta` (`id_modelo_maleta`),
  ADD CONSTRAINT `fk_status` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`),
  ADD CONSTRAINT `fk_statuspg` FOREIGN KEY (`status_pag`) REFERENCES `status_pag` (`id_pagamento`),
  ADD CONSTRAINT `fk_tamanho_album` FOREIGN KEY (`id_tamanhoalb`) REFERENCES `tamanho_de_album` (`id_tamanho_album`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
