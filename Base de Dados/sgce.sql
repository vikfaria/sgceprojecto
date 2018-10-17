-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19-Set-2018 às 15:11
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sgce`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created`, `modified`) VALUES
(1, 'Fashion', 'Category for anything related to fashion.', '2014-06-01 00:35:07', '2014-05-31 00:34:33'),
(2, 'Electronics', 'Gadgets, drones and more.', '2014-06-01 00:35:07', '2014-05-31 00:34:33'),
(3, 'Motors', 'Motor sports and more', '2014-06-01 00:35:07', '2014-05-31 00:34:54'),
(5, 'Movies', 'Movie products.', '0000-00-00 00:00:00', '2016-01-08 21:27:26'),
(6, 'Books', 'Kindle books, audio books and more.', '0000-00-00 00:00:00', '2016-01-08 21:27:47'),
(13, 'Sports', 'Drop into new winter gear.', '2016-01-09 02:24:24', '2016-01-09 09:24:24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `colleges`
--

CREATE TABLE `colleges` (
  `id` int(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `type` varchar(20) NOT NULL,
  `lat` float(10,6) DEFAULT NULL,
  `lng` float(10,6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `colleges`
--

INSERT INTO `colleges` (`id`, `name`, `address`, `type`, `lat`, `lng`) VALUES
(1, 'College of Engineering Pune', 'INCM - Instituto nacional de comunicaçoes', 'college', -25.929749, 32.553040),
(2, 'Hotel', 'Radisson Blue Hotel', 'Motel', -25.956730, 32.604809);

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

CREATE TABLE `historico` (
  `id` bigint(20) NOT NULL,
  `tipo` int(1) NOT NULL,
  `usuario` int(10) UNSIGNED DEFAULT NULL,
  `data_hora` datetime NOT NULL,
  `descricao` text NOT NULL,
  `tabela` varchar(100) NOT NULL,
  `registoalterado` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `historico`
--

INSERT INTO `historico` (`id`, `tipo`, `usuario`, `data_hora`, `descricao`, `tabela`, `registoalterado`) VALUES
(165, 1, 12, '2018-02-25 21:03:50', 'Adicionada Presença', 'tblpresenca', 2),
(166, 1, 12, '2018-02-25 21:04:40', 'Adicionada Presença', 'tblpresenca', 3),
(167, 1, 12, '2018-02-25 21:05:41', 'Adicionada Presença', 'tblpresenca', 4),
(168, 1, 12, '2018-02-25 21:08:44', 'Adicionada Presença', 'tblpresenca', 5),
(169, 1, 12, '2018-02-25 21:11:22', 'Adicionada Presença', 'tblpresenca', 6),
(170, 1, 12, '2018-02-25 21:14:08', 'Adicionada Presença', 'tblpresenca', 7),
(171, 1, 12, '2018-02-25 21:16:37', 'Adicionada Presença', 'tblpresenca', 8),
(172, 1, 12, '2018-02-25 23:39:31', 'Adicionada Presença', 'tblpresenca', 9),
(173, 1, 12, '2018-02-26 00:26:41', 'Adicionada Presença', 'tblpresenca', 10),
(174, 1, 12, '2018-02-26 00:27:12', 'Adicionada Presença', 'tblpresenca', 11),
(175, 1, 12, '2018-02-26 00:28:59', 'Adicionada Presença', 'tblpresenca', 12),
(176, 1, 12, '2018-02-26 00:29:41', 'Adicionada Presença', 'tblpresenca', 13),
(177, 1, 11, '2018-03-07 23:32:38', 'Adiciona Motorista', 'tblmotorista', 2),
(178, 1, 3, '2018-03-09 10:50:23', 'Adicionada Presença', 'tblpresenca', 1),
(179, 1, 3, '2018-03-09 10:50:30', 'Adicionada Presença', 'tblpresenca', 2),
(180, 1, 3, '2018-03-09 11:00:26', 'Adicionada Presença', 'tblpresenca', 3),
(181, 2, 2, '2018-03-09 12:31:37', 'Actualizar Aluno', 'tblaluno', 0),
(182, 2, 2, '2018-03-09 12:34:29', 'Actualizar Aluno', 'tblaluno', 0),
(183, 2, 2, '2018-03-09 12:34:51', 'Actualizar Aluno', 'tblaluno', 0),
(184, 2, 2, '2018-03-09 12:38:34', 'Actualizar Encarregado', 'tblencarregado', 0),
(185, 2, 2, '2018-03-09 12:39:08', 'Actualizar Encarregado', 'tblencarregado', 0),
(186, 2, 2, '2018-03-09 12:39:28', 'Actualizar Encarregado', 'tblencarregado', 0),
(187, 2, 2, '2018-03-09 12:41:48', 'Actualizar Educadora', 'tbleducadora', 0),
(188, 2, 2, '2018-03-09 12:42:05', 'Actualizar Educadora', 'tbleducadora', 0),
(189, 2, 2, '2018-03-09 12:45:14', 'Actualizar Motorista', 'tblmotorista', 0),
(190, 2, 2, '2018-03-09 12:45:39', 'Actualizar Motorista', 'tblmotorista', 0),
(191, 1, 2, '2018-03-09 12:46:22', 'Adiciona Motorista', 'tblmotorista', 3),
(192, 2, 2, '2018-03-09 12:46:43', 'Actualizar Motorista', 'tblmotorista', 0),
(193, 2, 2, '2018-03-09 12:51:16', 'Actualizar Carrinha', 'tblcarinha', 0),
(194, 2, 2, '2018-03-09 12:52:39', 'Actualizar Carrinha', 'tblcarinha', 0),
(195, 2, 2, '2018-03-09 12:56:47', 'Actualizar Escola', 'tblescola', 0),
(196, 2, 2, '2018-03-09 12:58:26', 'Actualizar Escola', 'tblescola', 0),
(197, 2, 2, '2018-03-09 13:12:07', 'Actualizar Seriços Transportes', 'tbladerencia', 0),
(198, 2, 2, '2018-03-09 13:13:08', 'Actualizar Seriços Transportes', 'tbladerencia', 0),
(199, 2, 2, '2018-03-09 13:27:19', 'Actualizar Seriços Transportes', 'tbladerencia', 0),
(200, 2, 2, '2018-03-09 13:29:04', 'Actualizar Seriços Transportes', 'tbladerencia', 0),
(201, 2, 2, '2018-03-09 13:29:50', 'Actualizar Seriços Transportes', 'tbladerencia', 0),
(202, 3, 2, '2018-03-09 14:02:46', 'Eliminar Educadora', 'tblrotas', 0),
(203, 1, 2, '2018-03-09 14:05:06', 'Adiciona Rota', 'tblrotas', 2),
(204, 3, 2, '2018-03-09 14:10:00', 'Eliminar Educadora', 'tblrotas', 0),
(205, 2, 2, '2018-03-09 14:11:30', 'Actualizar Aluno', '', 0),
(206, 2, 2, '2018-03-09 14:26:19', 'Actualizar Aluno', '', 0),
(207, 2, 2, '2018-03-09 14:27:27', 'Actualizar Aluno', '', 0),
(208, 2, 2, '2018-03-09 14:28:19', 'Actualizar Aluno', '', 0),
(209, 2, 2, '2018-03-09 14:29:36', 'Actualizar Aluno', '', 0),
(210, 2, 2, '2018-03-09 14:30:00', 'Actualizar Aluno', '', 0),
(211, 2, 2, '2018-03-09 14:30:46', 'Actualizar Aluno', '', 0),
(212, 2, 2, '2018-03-09 14:30:58', 'Actualizar Aluno', '', 0),
(213, 2, 2, '2018-03-09 14:31:41', 'Actualizar Aluno', '', 0),
(214, 2, 2, '2018-03-09 14:31:49', 'Actualizar Aluno', '', 0),
(215, 2, 2, '2018-03-09 14:32:31', 'Actualizar Aluno', 'tblrotas', 0),
(216, 2, 2, '2018-04-27 10:55:31', 'Actualizar Aluno', 'tblaluno', 0),
(217, 3, 2, '2018-08-02 18:39:27', 'Eliminar Educadora', 'tblrotas', 0),
(218, 2, 2, '2018-08-02 23:01:02', 'Actualizar Encarregado', 'tblencarregado', 0),
(219, 2, 2, '2018-08-02 23:01:31', 'Actualizar Encarregado', 'tblencarregado', 0),
(220, 2, 2, '2018-08-02 23:02:34', 'Actualizar Encarregado', 'tblencarregado', 0),
(221, 2, 2, '2018-09-15 17:06:50', 'Actualizar Motorista', 'tblmotorista', 0),
(222, 2, 2, '2018-09-15 17:32:17', 'Actualizar Carrinha', 'tblcarinha', 0),
(223, 2, 2, '2018-09-15 17:36:33', 'Actualizar Motorista', 'tblmotorista', 0),
(224, 2, 2, '2018-09-15 18:26:52', 'Actualizar Encarregado', 'tblencarregado', 0),
(225, 2, 2, '2018-09-15 18:27:16', 'Actualizar Encarregado', 'tblencarregado', 0),
(226, 2, 2, '2018-09-17 20:04:26', 'Actualizar Aluno', 'tblaluno', 0),
(227, 2, 2, '2018-09-17 20:12:03', 'Actualizar Encarregado', 'tblencarregado', 0),
(228, 2, 2, '2018-09-17 20:12:07', 'Actualizar Encarregado', 'tblencarregado', 0),
(229, 2, 2, '2018-09-18 00:00:58', 'Actualizar Aluno', 'tblaluno', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `location`
--

CREATE TABLE `location` (
  `uname` varchar(20) NOT NULL,
  `longitude` float(10,6) NOT NULL,
  `latitude` float(10,6) NOT NULL,
  `link` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `location`
--

INSERT INTO `location` (`uname`, `longitude`, `latitude`, `link`) VALUES
('Incm', -25.956730, 32.604809, 'Toda via');

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `category_id`, `created`, `modified`) VALUES
(1, 'LG P880 4X HD', 'My first awesome phone!', '336', 3, '2014-06-01 01:12:26', '2014-06-01 00:12:26'),
(2, 'Google Nexus 4', 'The most awesome phone of 2013!', '299', 2, '2014-06-01 01:12:26', '2014-06-01 00:12:26'),
(3, 'Samsung Galaxy S4', 'How about no?', '600', 3, '2014-06-01 01:12:26', '2014-06-01 00:12:26'),
(6, 'Bench Shirt', 'The best shirt!', '29', 1, '2014-06-01 01:12:26', '2014-05-31 09:12:21'),
(7, 'Lenovo Laptop', 'My business partner.', '399', 2, '2014-06-01 01:13:45', '2014-05-31 09:13:39'),
(8, 'Samsung Galaxy Tab 10.1', 'Good tablet.', '259', 2, '2014-06-01 01:14:13', '2014-05-31 09:14:08'),
(9, 'Spalding Watch', 'My sports watch.', '199', 1, '2014-06-01 01:18:36', '2014-05-31 09:18:31'),
(10, 'Sony Smart Watch', 'The coolest smart watch!', '300', 2, '2014-06-06 17:10:01', '2014-06-06 01:09:51'),
(11, 'Huawei Y300', 'For testing purposes.', '100', 2, '2014-06-06 17:11:04', '2014-06-06 01:10:54'),
(12, 'Abercrombie Lake Arnold Shirt', 'Perfect as gift!', '60', 1, '2014-06-06 17:12:21', '2014-06-06 01:12:11'),
(13, 'Abercrombie Allen Brook Shirt', 'Cool red shirt!', '70', 1, '2014-06-06 17:12:59', '2014-06-06 01:12:49'),
(26, 'Another product', 'Awesome product!', '555', 2, '2014-11-22 19:07:34', '2014-11-22 04:07:34'),
(28, 'Wallet', 'You can absolutely use this one!', '799', 6, '2014-12-04 21:12:03', '2014-12-04 06:12:03'),
(31, 'Amanda Waller Shirt', 'New awesome shirt!', '333', 1, '2014-12-13 00:52:54', '2014-12-12 09:52:54'),
(42, 'Nike Shoes for Men', 'Nike Shoes', '12999', 3, '2015-12-12 06:47:08', '2015-12-12 13:47:08'),
(48, 'Bristol Shoes', 'Awesome shoes.', '999', 5, '2016-01-08 06:36:37', '2016-01-08 13:36:37'),
(60, 'Rolex Watch', 'Luxury watch.', '25000', 1, '2016-01-11 15:46:02', '2016-01-11 22:46:02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbladerencia`
--

CREATE TABLE `tbladerencia` (
  `id_aderencia` int(10) NOT NULL,
  `id_aluno` int(10) NOT NULL,
  `id_zona` int(10) NOT NULL,
  `id_percurso` int(10) NOT NULL,
  `id_carrinha` int(10) NOT NULL,
  `id_educadora` int(10) NOT NULL,
  `id_motorista` int(10) NOT NULL,
  `id_rota` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbladerencia`
--

INSERT INTO `tbladerencia` (`id_aderencia`, `id_aluno`, `id_zona`, `id_percurso`, `id_carrinha`, `id_educadora`, `id_motorista`, `id_rota`) VALUES
(3, 1, 1, 2, 1, 1, 2, 1),
(4, 3, 2, 3, 1, 1, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblaluno`
--

CREATE TABLE `tblaluno` (
  `id_aluno` int(10) NOT NULL,
  `nome_aluno` varchar(45) NOT NULL,
  `apelido_aluno` varchar(45) NOT NULL,
  `id_zona` int(10) NOT NULL,
  `foto` varchar(500) NOT NULL,
  `data_nascimento` date NOT NULL,
  `id_encarregado` int(10) NOT NULL,
  `id_escola` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tblaluno`
--

INSERT INTO `tblaluno` (`id_aluno`, `nome_aluno`, `apelido_aluno`, `id_zona`, `foto`, `data_nascimento`, `id_encarregado`, `id_escola`) VALUES
(1, 'Sidney', 'Mussagy', 1, 'IMG_8063 (0).JPG', '1994-05-11', 4, 1),
(3, 'Victor', 'Faria', 0, '', '2018-02-01', 4, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblcarinha`
--

CREATE TABLE `tblcarinha` (
  `id_carrinha` int(10) NOT NULL,
  `matricula` varchar(20) NOT NULL,
  `lotacao` int(35) NOT NULL,
  `id_tipo_carinha` int(10) NOT NULL,
  `contacto` int(20) NOT NULL,
  `id_motorista` int(10) NOT NULL,
  `id_educadora` int(10) NOT NULL,
  `foto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tblcarinha`
--

INSERT INTO `tblcarinha` (`id_carrinha`, `matricula`, `lotacao`, `id_tipo_carinha`, `contacto`, `id_motorista`, `id_educadora`, `foto`) VALUES
(1, 'MMH-45-09', 15, 1, 2147483647, 2, 1, 'cars.png'),
(2, 'MPT-54-28', 10, 2, 843664883, 2, 1, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbldistrito`
--

CREATE TABLE `tbldistrito` (
  `id_distrito` int(10) NOT NULL,
  `nome_distrito` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbleducadora`
--

CREATE TABLE `tbleducadora` (
  `id_educadora` int(10) NOT NULL,
  `nome_educadora` varchar(25) NOT NULL,
  `apelido_educadora` varchar(25) NOT NULL,
  `contacto_educadora` int(20) NOT NULL,
  `email_educadora` varchar(40) NOT NULL,
  `id_zona` int(10) NOT NULL,
  `foto` varchar(500) NOT NULL,
  `usuarioId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbleducadora`
--

INSERT INTO `tbleducadora` (`id_educadora`, `nome_educadora`, `apelido_educadora`, `contacto_educadora`, `email_educadora`, `id_zona`, `foto`, `usuarioId`) VALUES
(1, 'Tatiana', 'Lala', 2147483647, 'tatiana@gmail.com', 2, '81665db0-6649-4247-ab1f-ccebe19fdb7f.JPG', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblencarregado`
--

CREATE TABLE `tblencarregado` (
  `id_encarregado` int(10) NOT NULL,
  `nome_encarregado` varchar(45) NOT NULL,
  `apelido_encarregado` varchar(45) NOT NULL,
  `contacto_encarregado` int(20) NOT NULL,
  `email_encarregado` varchar(25) NOT NULL,
  `id_zona` int(10) NOT NULL,
  `foto` varchar(500) NOT NULL,
  `usuarioId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tblencarregado`
--

INSERT INTO `tblencarregado` (`id_encarregado`, `nome_encarregado`, `apelido_encarregado`, `contacto_encarregado`, `email_encarregado`, `id_zona`, `foto`, `usuarioId`) VALUES
(4, 'CarlosS', 'Nhamtumbo', 847976020, 'carlos@gmail.com', 2, '4a0d3a6e9f0ce749724977d94a9ab648.jpg', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblescola`
--

CREATE TABLE `tblescola` (
  `id_escola` int(10) NOT NULL,
  `nome_escola` varchar(50) NOT NULL,
  `contacto_escola` int(20) NOT NULL,
  `id_zona` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tblescola`
--

INSERT INTO `tblescola` (`id_escola`, `nome_escola`, `contacto_escola`, `id_zona`) VALUES
(1, 'Isctem', 845678876, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblestado`
--

CREATE TABLE `tblestado` (
  `id_estado` int(10) NOT NULL,
  `nome_estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tblestado`
--

INSERT INTO `tblestado` (`id_estado`, `nome_estado`) VALUES
(1, 'Entrar'),
(2, 'Sair');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblestadopresenca`
--

CREATE TABLE `tblestadopresenca` (
  `id_estadopresenca` int(10) NOT NULL,
  `nome_estadopresenca` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tblestadopresenca`
--

INSERT INTO `tblestadopresenca` (`id_estadopresenca`, `nome_estadopresenca`) VALUES
(1, 'Presente'),
(2, 'Ausente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblmotorista`
--

CREATE TABLE `tblmotorista` (
  `id_motorista` int(10) NOT NULL,
  `nome_motorista` varchar(45) NOT NULL,
  `apelido_motorista` varchar(45) NOT NULL,
  `carta_motorista` varchar(25) NOT NULL,
  `contacto_motorista` int(25) NOT NULL,
  `email_motorista` varchar(25) NOT NULL,
  `id_zona` int(10) NOT NULL,
  `foto_motorista` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tblmotorista`
--

INSERT INTO `tblmotorista` (`id_motorista`, `nome_motorista`, `apelido_motorista`, `carta_motorista`, `contacto_motorista`, `email_motorista`, `id_zona`, `foto_motorista`) VALUES
(2, 'Gustavo', 'Ngove', '1256478393PB', 2147483647, 'gustavo@gmail.com', 2, '4a0d3a6e9f0ce749724977d94a9ab648.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblpercurso`
--

CREATE TABLE `tblpercurso` (
  `id_percurso` int(10) NOT NULL,
  `nome_percurso` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tblpercurso`
--

INSERT INTO `tblpercurso` (`id_percurso`, `nome_percurso`) VALUES
(1, 'Casa - Escola'),
(2, 'Escola - Casa'),
(3, 'Todo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblpresenca`
--

CREATE TABLE `tblpresenca` (
  `id_presenca` int(10) NOT NULL,
  `id_aluno` int(10) NOT NULL,
  `data_presenca` date NOT NULL,
  `hora_presenca` time NOT NULL,
  `id_educadora` int(10) NOT NULL,
  `id_carrinha` int(10) NOT NULL,
  `latitude` float(10,6) NOT NULL,
  `longitude` float(10,6) NOT NULL,
  `nome_rua` varchar(500) NOT NULL,
  `id_zona` int(10) NOT NULL,
  `id_estado` int(10) NOT NULL,
  `id_tpresenca` int(10) NOT NULL,
  `id_estadopresenca` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblrotas`
--

CREATE TABLE `tblrotas` (
  `id_rota` int(10) NOT NULL,
  `nome_rota` varchar(100) NOT NULL,
  `origem_rota` varchar(100) NOT NULL,
  `destino_rota` varchar(100) NOT NULL,
  `localizacao` varchar(1000) NOT NULL,
  `distancia` int(50) DEFAULT NULL,
  `tempo` int(100) DEFAULT NULL,
  `id_carrinha` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tblrotas`
--

INSERT INTO `tblrotas` (`id_rota`, `nome_rota`, `origem_rota`, `destino_rota`, `localizacao`, `distancia`, `tempo`, `id_carrinha`) VALUES
(1, 'MP-TP', 'Maputo', 'Matola', 'moz', 0, 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbltipocarinha`
--

CREATE TABLE `tbltipocarinha` (
  `id_tipo_carinha` int(10) NOT NULL,
  `nome_tipo_carinha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbltipocarinha`
--

INSERT INTO `tbltipocarinha` (`id_tipo_carinha`, `nome_tipo_carinha`) VALUES
(1, 'Coaster'),
(2, 'Mini-Bus');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbltpresenca`
--

CREATE TABLE `tbltpresenca` (
  `id_tpresenca` int(10) NOT NULL,
  `nome_tpresenca` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbltpresenca`
--

INSERT INTO `tbltpresenca` (`id_tpresenca`, `nome_tpresenca`) VALUES
(1, 'Casa - Escola'),
(2, 'Escola - Casa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblusuario`
--

CREATE TABLE `tblusuario` (
  `usuarioId` int(10) NOT NULL,
  `usuarioNome` varchar(250) CHARACTER SET latin1 NOT NULL,
  `usuarioSenha` varchar(250) NOT NULL,
  `usuarioAvatar` varchar(250) CHARACTER SET latin1 NOT NULL,
  `usuNivelAcesso` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `UsuarioApelido` varchar(255) NOT NULL,
  `UsuarioSexo` varchar(255) NOT NULL,
  `UsuarioEmail` varchar(255) NOT NULL,
  `UsuarioEstado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `tblusuario`
--

INSERT INTO `tblusuario` (`usuarioId`, `usuarioNome`, `usuarioSenha`, `usuarioAvatar`, `usuNivelAcesso`, `nome`, `UsuarioApelido`, `UsuarioSexo`, `UsuarioEmail`, `UsuarioEstado`) VALUES
(1, 'admin', '1111', 'IMG_4252.png', 0, 'Victor', 'Faria', 'M', 'admin@gmai.com', '1'),
(2, 'secretaria', '2222', 'IMG_7926 (0).jpg', 1, 'Daniela', 'Assunção', 'M', 'andrewjosemanacaze@hotmail.com', '1'),
(3, 'educadora', '3333', '526ee43c-d063-41b1-bb8e-83a7cdcdcc60.jpg', 2, 'Tatiana', 'Lala', 'M', 'fredy@gmail.com', '1'),
(4, 'encarregado', '4444', 'IMG_8062.jpg', 3, 'José', 'Faria', 'M', 'mauroabelm280@gmail.com', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblzona`
--

CREATE TABLE `tblzona` (
  `id_zona` int(10) NOT NULL,
  `nome_zona` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tblzona`
--

INSERT INTO `tblzona` (`id_zona`, `nome_zona`) VALUES
(1, 'Matola'),
(2, 'Catembe');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_historico`
--

CREATE TABLE `tipo_historico` (
  `id` int(1) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_historico`
--

INSERT INTO `tipo_historico` (`id`, `nome`) VALUES
(1, 'Insert'),
(2, 'Update'),
(3, 'Delete'),
(4, 'Login'),
(5, 'Falha login'),
(6, 'Logout');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo` (`tipo`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `campoalterado` (`registoalterado`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladerencia`
--
ALTER TABLE `tbladerencia`
  ADD PRIMARY KEY (`id_aderencia`),
  ADD KEY `id_aluno` (`id_aluno`),
  ADD KEY `id_zona` (`id_zona`),
  ADD KEY `id_percurso` (`id_percurso`),
  ADD KEY `id_carrinha` (`id_carrinha`),
  ADD KEY `id_educadora` (`id_educadora`),
  ADD KEY `id_motorista` (`id_motorista`),
  ADD KEY `id_rota` (`id_rota`);

--
-- Indexes for table `tblaluno`
--
ALTER TABLE `tblaluno`
  ADD PRIMARY KEY (`id_aluno`),
  ADD KEY `id_encarregado` (`id_encarregado`),
  ADD KEY `id_escola` (`id_escola`);

--
-- Indexes for table `tblcarinha`
--
ALTER TABLE `tblcarinha`
  ADD PRIMARY KEY (`id_carrinha`),
  ADD KEY `id_tipo_carinha` (`id_tipo_carinha`),
  ADD KEY `id_motorista` (`id_motorista`),
  ADD KEY `id_educadora` (`id_educadora`);

--
-- Indexes for table `tbldistrito`
--
ALTER TABLE `tbldistrito`
  ADD PRIMARY KEY (`id_distrito`);

--
-- Indexes for table `tbleducadora`
--
ALTER TABLE `tbleducadora`
  ADD PRIMARY KEY (`id_educadora`),
  ADD KEY `id_zona` (`id_zona`),
  ADD KEY `usuarioId` (`usuarioId`);

--
-- Indexes for table `tblencarregado`
--
ALTER TABLE `tblencarregado`
  ADD PRIMARY KEY (`id_encarregado`),
  ADD UNIQUE KEY `id_encarregado` (`id_encarregado`),
  ADD KEY `id_zona` (`id_zona`),
  ADD KEY `usuarioId` (`usuarioId`);

--
-- Indexes for table `tblescola`
--
ALTER TABLE `tblescola`
  ADD PRIMARY KEY (`id_escola`),
  ADD KEY `id_zona` (`id_zona`);

--
-- Indexes for table `tblestado`
--
ALTER TABLE `tblestado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indexes for table `tblestadopresenca`
--
ALTER TABLE `tblestadopresenca`
  ADD PRIMARY KEY (`id_estadopresenca`);

--
-- Indexes for table `tblmotorista`
--
ALTER TABLE `tblmotorista`
  ADD PRIMARY KEY (`id_motorista`),
  ADD KEY `id_zona` (`id_zona`);

--
-- Indexes for table `tblpercurso`
--
ALTER TABLE `tblpercurso`
  ADD PRIMARY KEY (`id_percurso`);

--
-- Indexes for table `tblpresenca`
--
ALTER TABLE `tblpresenca`
  ADD PRIMARY KEY (`id_presenca`),
  ADD KEY `id_aluno` (`id_aluno`,`id_educadora`,`id_carrinha`,`id_zona`,`id_estado`,`id_tpresenca`,`id_estadopresenca`),
  ADD KEY `id_educadora` (`id_educadora`),
  ADD KEY `id_carrinha` (`id_carrinha`),
  ADD KEY `id_zona` (`id_zona`),
  ADD KEY `id_estado` (`id_estado`),
  ADD KEY `id_tpresenca` (`id_tpresenca`),
  ADD KEY `id_estadopresenca` (`id_estadopresenca`);

--
-- Indexes for table `tblrotas`
--
ALTER TABLE `tblrotas`
  ADD PRIMARY KEY (`id_rota`),
  ADD KEY `id_carrinha` (`id_carrinha`);

--
-- Indexes for table `tbltipocarinha`
--
ALTER TABLE `tbltipocarinha`
  ADD PRIMARY KEY (`id_tipo_carinha`);

--
-- Indexes for table `tbltpresenca`
--
ALTER TABLE `tbltpresenca`
  ADD PRIMARY KEY (`id_tpresenca`);

--
-- Indexes for table `tblusuario`
--
ALTER TABLE `tblusuario`
  ADD PRIMARY KEY (`usuarioId`),
  ADD UNIQUE KEY `usuarioId` (`usuarioId`);

--
-- Indexes for table `tblzona`
--
ALTER TABLE `tblzona`
  ADD PRIMARY KEY (`id_zona`);

--
-- Indexes for table `tipo_historico`
--
ALTER TABLE `tipo_historico`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `historico`
--
ALTER TABLE `historico`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tbladerencia`
--
ALTER TABLE `tbladerencia`
  MODIFY `id_aderencia` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblaluno`
--
ALTER TABLE `tblaluno`
  MODIFY `id_aluno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblcarinha`
--
ALTER TABLE `tblcarinha`
  MODIFY `id_carrinha` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbldistrito`
--
ALTER TABLE `tbldistrito`
  MODIFY `id_distrito` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbleducadora`
--
ALTER TABLE `tbleducadora`
  MODIFY `id_educadora` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblencarregado`
--
ALTER TABLE `tblencarregado`
  MODIFY `id_encarregado` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblescola`
--
ALTER TABLE `tblescola`
  MODIFY `id_escola` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblestado`
--
ALTER TABLE `tblestado`
  MODIFY `id_estado` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblestadopresenca`
--
ALTER TABLE `tblestadopresenca`
  MODIFY `id_estadopresenca` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblmotorista`
--
ALTER TABLE `tblmotorista`
  MODIFY `id_motorista` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpercurso`
--
ALTER TABLE `tblpercurso`
  MODIFY `id_percurso` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblpresenca`
--
ALTER TABLE `tblpresenca`
  MODIFY `id_presenca` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblrotas`
--
ALTER TABLE `tblrotas`
  MODIFY `id_rota` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbltipocarinha`
--
ALTER TABLE `tbltipocarinha`
  MODIFY `id_tipo_carinha` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbltpresenca`
--
ALTER TABLE `tbltpresenca`
  MODIFY `id_tpresenca` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblusuario`
--
ALTER TABLE `tblusuario`
  MODIFY `usuarioId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblzona`
--
ALTER TABLE `tblzona`
  MODIFY `id_zona` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tipo_historico`
--
ALTER TABLE `tipo_historico`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tbladerencia`
--
ALTER TABLE `tbladerencia`
  ADD CONSTRAINT `tbladerencia_ibfk_1` FOREIGN KEY (`id_aluno`) REFERENCES `tblaluno` (`id_aluno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbladerencia_ibfk_2` FOREIGN KEY (`id_zona`) REFERENCES `tblzona` (`id_zona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbladerencia_ibfk_3` FOREIGN KEY (`id_carrinha`) REFERENCES `tblcarinha` (`id_carrinha`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbladerencia_ibfk_4` FOREIGN KEY (`id_educadora`) REFERENCES `tbleducadora` (`id_educadora`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbladerencia_ibfk_5` FOREIGN KEY (`id_percurso`) REFERENCES `tblpercurso` (`id_percurso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbladerencia_ibfk_6` FOREIGN KEY (`id_motorista`) REFERENCES `tblmotorista` (`id_motorista`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbladerencia_ibfk_7` FOREIGN KEY (`id_rota`) REFERENCES `tblrotas` (`id_rota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tblaluno`
--
ALTER TABLE `tblaluno`
  ADD CONSTRAINT `tblaluno_ibfk_1` FOREIGN KEY (`id_encarregado`) REFERENCES `tblencarregado` (`id_encarregado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblaluno_ibfk_2` FOREIGN KEY (`id_escola`) REFERENCES `tblescola` (`id_escola`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tblcarinha`
--
ALTER TABLE `tblcarinha`
  ADD CONSTRAINT `tblcarinha_ibfk_1` FOREIGN KEY (`id_motorista`) REFERENCES `tblmotorista` (`id_motorista`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblcarinha_ibfk_2` FOREIGN KEY (`id_educadora`) REFERENCES `tbleducadora` (`id_educadora`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblcarinha_ibfk_3` FOREIGN KEY (`id_tipo_carinha`) REFERENCES `tbltipocarinha` (`id_tipo_carinha`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tbleducadora`
--
ALTER TABLE `tbleducadora`
  ADD CONSTRAINT `tbleducadora_ibfk_1` FOREIGN KEY (`id_zona`) REFERENCES `tblzona` (`id_zona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbleducadora_ibfk_2` FOREIGN KEY (`usuarioId`) REFERENCES `tblusuario` (`usuarioId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tblencarregado`
--
ALTER TABLE `tblencarregado`
  ADD CONSTRAINT `tblencarregado_ibfk_1` FOREIGN KEY (`id_zona`) REFERENCES `tblzona` (`id_zona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblencarregado_ibfk_2` FOREIGN KEY (`usuarioId`) REFERENCES `tblusuario` (`usuarioId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tblescola`
--
ALTER TABLE `tblescola`
  ADD CONSTRAINT `tblescola_ibfk_1` FOREIGN KEY (`id_zona`) REFERENCES `tblzona` (`id_zona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tblmotorista`
--
ALTER TABLE `tblmotorista`
  ADD CONSTRAINT `tblmotorista_ibfk_1` FOREIGN KEY (`id_zona`) REFERENCES `tblzona` (`id_zona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tblpresenca`
--
ALTER TABLE `tblpresenca`
  ADD CONSTRAINT `tblpresenca_ibfk_1` FOREIGN KEY (`id_aluno`) REFERENCES `tblaluno` (`id_aluno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblpresenca_ibfk_2` FOREIGN KEY (`id_educadora`) REFERENCES `tbleducadora` (`id_educadora`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblpresenca_ibfk_3` FOREIGN KEY (`id_carrinha`) REFERENCES `tblcarinha` (`id_carrinha`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblpresenca_ibfk_4` FOREIGN KEY (`id_zona`) REFERENCES `tblzona` (`id_zona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblpresenca_ibfk_5` FOREIGN KEY (`id_estado`) REFERENCES `tblestado` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblpresenca_ibfk_6` FOREIGN KEY (`id_tpresenca`) REFERENCES `tbltpresenca` (`id_tpresenca`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblpresenca_ibfk_7` FOREIGN KEY (`id_estadopresenca`) REFERENCES `tblestadopresenca` (`id_estadopresenca`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
