-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 14, 2016 at 02:20 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuziq`
--

-- --------------------------------------------------------

--
-- Table structure for table `assinatura`
--

CREATE TABLE `assinatura` (
  `id` int(11) NOT NULL,
  `tipo` varchar(25) DEFAULT NULL,
  `inicio` varchar(25) DEFAULT NULL,
  `duracaoRestante` int(11) DEFAULT NULL,
  `id_musico` int(11) DEFAULT NULL,
  `statu` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assinatura`
--

INSERT INTO `assinatura` (`id`, `tipo`, `inicio`, `duracaoRestante`, `id_musico`, `statu`) VALUES
(1, 'Premium', '23-08-2016', 29, 3, 'Ativado');

-- --------------------------------------------------------

--
-- Table structure for table `cargo`
--

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `cargo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cargo`
--

INSERT INTO `cargo` (`id`, `cargo`) VALUES
(1, 'administrador');

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nome_categoria` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nome_categoria`) VALUES
(1, 'DJ'),
(2, 'Cantor');

-- --------------------------------------------------------

--
-- Table structure for table `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `nome_enviado` varchar(255) DEFAULT NULL,
  `mensagem` varchar(255) DEFAULT NULL,
  `avaliacao` varchar(1) DEFAULT NULL,
  `data_envio` varchar(18) DEFAULT NULL,
  `id_musico` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comentario`
--

INSERT INTO `comentario` (`id`, `nome_enviado`, `mensagem`, `avaliacao`, `data_envio`, `id_musico`) VALUES
(31, 'asdasdasdaa', 'sdasda', '3', '29-08-2016 06:01', 3),
(32, 'asdasdasdaas', 'dasdasda', '3', '29-08-2016 06:01', 3),
(33, 'asdasdasda', 'asdasdas', '5', '29-08-2016 06:01', 3),
(34, 'asdas', 'asdasd', '5', '29-08-2016 06:02', 3),
(35, 'asdasdasda', 'asdasd', '5', '14-09-2016 09:16', 5);

-- --------------------------------------------------------

--
-- Table structure for table `funcionario`
--

CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `id_cargo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `funcionario`
--

INSERT INTO `funcionario` (`id`, `nome`, `usuario`, `senha`, `email`, `id_cargo`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `genero`
--

CREATE TABLE `genero` (
  `id_genero` int(11) NOT NULL,
  `nome_genero` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genero`
--

INSERT INTO `genero` (`id_genero`, `nome_genero`) VALUES
(1, 'Jazz'),
(2, 'Eletronica'),
(3, 'Samba'),
(4, 'Blues'),
(5, 'Outros'),
(16, 'Rock');

-- --------------------------------------------------------

--
-- Table structure for table `localidade`
--

CREATE TABLE `localidade` (
  `id` int(11) NOT NULL,
  `localidade` varchar(255) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `localidade`
--

INSERT INTO `localidade` (`id`, `localidade`) VALUES
(1, 'Rio de Janeiro'),
(2, 'São Paulo'),
(3, 'Paraná'),
(4, 'Pará');

-- --------------------------------------------------------

--
-- Table structure for table `mensagem`
--

CREATE TABLE `mensagem` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `assunto` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mensagem` text,
  `id_musico` int(11) DEFAULT NULL,
  `data_envio` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mensagem`
--

INSERT INTO `mensagem` (`id`, `nome`, `assunto`, `email`, `mensagem`, `id_musico`, `data_envio`) VALUES
(1, 'JoÃ£o', 'aisjd', 'joao@gmail.com', 'oiajsdioa\r\naisjdpoia\r\n\r\njaisdiao', 3, NULL),
(2, 'Allan', 'TEstanto', 'allan.agomesp@gmail.com', 'asdpoasodkaosdpoajs odajspod japos jdpojdoajspodjaopsdjopasojd poasjdo as\r\ndasojd\r\naosjdoasjdoasjdpoasjdpoasd', 3, NULL),
(3, 'Allan', 'asd', 'allan.agomesp@gmail.com', 'asdasdasd', 3, NULL),
(4, 'zx', 'asda', 'asda', 'asdasd', 3, NULL),
(5, 'Manoel', 'paosjd', 'jpoajsod@ojapdsj.com', 'eteste data', 3, '02-08-2016 08:2'),
(6, 'Joao', 'Asodjas', 'joao@gmail.com', 'aosjdpoajspodajo\r\n\r\n\r\nsoidjapjdsaos\r\n\r\naosjd', 3, '23-08-2016 06:1'),
(7, 'aosidhao', 'asdasd', 'asdojao@asida.com', 'asdasdasd', 3, '27-08-2016 09:5'),
(8, 'asd', 'asdasd', 'asdojao@asida.com', 'asdasdasd', 3, '29-08-2016 06:1'),
(9, 'asd', 'dasda', 'asdojao@asida.comas', 'sada', 3, '29-08-2016 06:1'),
(10, 'asd', 'asdasd', 'asdojao@asida.com', 'asdas', 3, '29-08-2016 06:1');

-- --------------------------------------------------------

--
-- Table structure for table `musicos`
--

CREATE TABLE `musicos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `avaliacao` varchar(1) DEFAULT '0',
  `biografia` text,
  `imagem_perfil` varchar(255) DEFAULT '_img/sem_imagem_ico.png',
  `imagem_perfil1` varchar(255) DEFAULT '_img/sem_imagem_ico.png',
  `imagem_perfil2` varchar(255) DEFAULT '_img/sem_imagem_ico.png',
  `imagem_perfil3` varchar(255) DEFAULT '_img/sem_imagem_ico.png',
  `imagem_perfil4` varchar(255) DEFAULT '_img/sem_imagem_ico.png',
  `imagem_perfil5` varchar(255) DEFAULT '_img/sem_imagem_ico.png',
  `url` varchar(255) DEFAULT NULL,
  `configurado` tinyint(1) DEFAULT NULL,
  `qntAvaliacoes` int(10) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `musicos`
--

INSERT INTO `musicos` (`id`, `nome`, `endereco`, `email`, `senha`, `avaliacao`, `biografia`, `imagem_perfil`, `imagem_perfil1`, `imagem_perfil2`, `imagem_perfil3`, `imagem_perfil4`, `imagem_perfil5`, `url`, `configurado`, `qntAvaliacoes`) VALUES
(3, 'a', 'RJ - Rio de Janeiro', 'qisuu@hotmail.com', '202cb962ac59075b964b07152d234b70', '4', ''' and asdpasd\r\n\r\na\r\nsd\r\nasd\r\n\r\n', NULL, '_uploads/qisuu@hotmail.com-imagem_perfil1.jpg', '_uploads/qisuu@hotmail.com-imagem_perfil2.jpg', '_uploads/qisuu@hotmail.com-imagem_perfil3.jpg', '_uploads/qisuu@hotmail.com-imagem_perfil4.jpg', '_uploads/qisuu@hotmail.com-imagem_perfil5.jpg', '_uploads/qisuu@hotmail.com-url.jpg', 1, 4),
(5, 'Allan', NULL, 'allan.agomesp@gmail.com', '1db60d07afe37a7cbdd959c683fced8a', '5', 'asda\r\n\r\nasd\r\n\r\n\r\nasd', NULL, '_img/sem_imagem_ico.png', '_img/sem_imagem_ico.png', '_img/sem_imagem_ico.png', '_img/sem_imagem_ico.png', '_img/sem_imagem_ico.png', '_uploads/allan.agomesp@gmail.com-perfil.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `musico_categoria`
--

CREATE TABLE `musico_categoria` (
  `id_musico` int(11) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `musico_categoria`
--

INSERT INTO `musico_categoria` (`id_musico`, `categoria_id`) VALUES
(5, 2),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `musico_genero`
--

CREATE TABLE `musico_genero` (
  `id_musico` int(11) DEFAULT NULL,
  `id_genero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `musico_genero`
--

INSERT INTO `musico_genero` (`id_musico`, `id_genero`) VALUES
(5, 5),
(5, 4),
(5, 1),
(3, 1),
(3, 2),
(3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `musico_localidade`
--

CREATE TABLE `musico_localidade` (
  `id_musico` int(11) DEFAULT NULL,
  `id_localidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `musico_localidade`
--

INSERT INTO `musico_localidade` (`id_musico`, `id_localidade`) VALUES
(5, 3),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `musico_organizacao`
--

CREATE TABLE `musico_organizacao` (
  `id` int(11) NOT NULL,
  `id_musico` int(11) DEFAULT NULL,
  `id_organizacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `musico_organizacao`
--

INSERT INTO `musico_organizacao` (`id`, `id_musico`, `id_organizacao`) VALUES
(2, 5, 1),
(3, 5, 1),
(4, 5, 1),
(5, 5, 1),
(6, 5, 1),
(7, 5, 1),
(8, 5, 1),
(9, 5, 1),
(10, 5, 1),
(11, 5, 1),
(13, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `organizacao`
--

CREATE TABLE `organizacao` (
  `id` int(11) NOT NULL,
  `organizacao` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organizacao`
--

INSERT INTO `organizacao` (`id`, `organizacao`) VALUES
(1, 'Solo'),
(2, 'Banda');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assinatura`
--
ALTER TABLE `assinatura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_musico` (`id_musico`);

--
-- Indexes for table `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_musico` (`id_musico`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- Indexes for table `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indexes for table `localidade`
--
ALTER TABLE `localidade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mensagem`
--
ALTER TABLE `mensagem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_musico` (`id_musico`);

--
-- Indexes for table `musicos`
--
ALTER TABLE `musicos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `musico_categoria`
--
ALTER TABLE `musico_categoria`
  ADD KEY `id_musico` (`id_musico`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indexes for table `musico_genero`
--
ALTER TABLE `musico_genero`
  ADD KEY `id_musico` (`id_musico`),
  ADD KEY `id_genero` (`id_genero`);

--
-- Indexes for table `musico_localidade`
--
ALTER TABLE `musico_localidade`
  ADD KEY `id_musico` (`id_musico`),
  ADD KEY `id_localidade` (`id_localidade`);

--
-- Indexes for table `musico_organizacao`
--
ALTER TABLE `musico_organizacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_musico` (`id_musico`),
  ADD KEY `id_organizacao` (`id_organizacao`);

--
-- Indexes for table `organizacao`
--
ALTER TABLE `organizacao`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assinatura`
--
ALTER TABLE `assinatura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `localidade`
--
ALTER TABLE `localidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `mensagem`
--
ALTER TABLE `mensagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `musicos`
--
ALTER TABLE `musicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `musico_organizacao`
--
ALTER TABLE `musico_organizacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `organizacao`
--
ALTER TABLE `organizacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `assinatura`
--
ALTER TABLE `assinatura`
  ADD CONSTRAINT `assinatura_ibfk_1` FOREIGN KEY (`id_musico`) REFERENCES `musicos` (`id`);

--
-- Constraints for table `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_musico`) REFERENCES `musicos` (`id`);

--
-- Constraints for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id`);

--
-- Constraints for table `mensagem`
--
ALTER TABLE `mensagem`
  ADD CONSTRAINT `mensagem_ibfk_1` FOREIGN KEY (`id_musico`) REFERENCES `musicos` (`id`);

--
-- Constraints for table `musico_categoria`
--
ALTER TABLE `musico_categoria`
  ADD CONSTRAINT `musico_categoria_ibfk_1` FOREIGN KEY (`id_musico`) REFERENCES `musicos` (`id`),
  ADD CONSTRAINT `musico_categoria_ibfk_2` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id_categoria`);

--
-- Constraints for table `musico_genero`
--
ALTER TABLE `musico_genero`
  ADD CONSTRAINT `musico_genero_ibfk_1` FOREIGN KEY (`id_musico`) REFERENCES `musicos` (`id`),
  ADD CONSTRAINT `musico_genero_ibfk_2` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_genero`);

--
-- Constraints for table `musico_localidade`
--
ALTER TABLE `musico_localidade`
  ADD CONSTRAINT `musico_localidade_ibfk_1` FOREIGN KEY (`id_musico`) REFERENCES `musicos` (`id`),
  ADD CONSTRAINT `musico_localidade_ibfk_2` FOREIGN KEY (`id_localidade`) REFERENCES `localidade` (`id`);

--
-- Constraints for table `musico_organizacao`
--
ALTER TABLE `musico_organizacao`
  ADD CONSTRAINT `musico_organizacao_ibfk_1` FOREIGN KEY (`id_musico`) REFERENCES `musicos` (`id`),
  ADD CONSTRAINT `musico_organizacao_ibfk_2` FOREIGN KEY (`id_organizacao`) REFERENCES `organizacao` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
