-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16-Maio-2019 às 01:41
-- Versão do servidor: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bella_baruk`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comissoes`
--

CREATE TABLE `comissoes` (
  `id` int(11) NOT NULL,
  `id_user_recebedor` int(11) NOT NULL,
  `id_user_comprador` int(11) NOT NULL,
  `valor` decimal(10,0) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `comissoes`
--

INSERT INTO `comissoes` (`id`, `id_user_recebedor`, `id_user_comprador`, `valor`, `created`, `updated`) VALUES
(2, 6, 7, '190', '2019-04-28 15:36:24', NULL),
(3, 3, 6, '63', '2019-04-28 15:43:17', NULL),
(4, 6, 14, '11', '2019-05-15 20:20:03', NULL),
(5, 6, 7, '22', '2019-05-15 20:34:02', NULL),
(6, 6, 7, '11', '2019-05-15 20:34:02', NULL),
(7, 6, 7, '6', '2019-05-15 20:34:02', NULL),
(8, 6, 7, '4', '2019-05-15 20:34:02', NULL),
(9, 6, 7, '4', '2019-05-15 20:34:02', NULL),
(10, 6, 7, '2', '2019-05-15 20:34:02', NULL),
(11, 6, 7, '12', '2019-05-15 20:34:33', NULL),
(12, 6, 7, '6', '2019-05-15 20:34:33', NULL),
(13, 6, 7, '4', '2019-05-15 20:34:33', NULL),
(14, 6, 7, '2', '2019-05-15 20:34:34', NULL),
(15, 6, 7, '2', '2019-05-15 20:34:34', NULL),
(16, 6, 7, '1', '2019-05-15 20:34:34', NULL),
(17, 6, 9, '98', '2019-05-15 20:40:13', NULL),
(18, 9, 10, '115', '2019-05-15 20:41:45', NULL),
(19, 10, 11, '98', '2019-05-15 20:45:36', NULL),
(20, 11, 12, '94', '2019-05-15 20:47:32', NULL),
(21, 12, 13, '94', '2019-05-15 20:48:53', NULL),
(22, 6, 14, '7', '2019-05-15 20:49:52', NULL),
(23, 9, 14, '4', '2019-05-15 20:49:52', NULL),
(24, 10, 14, '3', '2019-05-15 20:49:52', NULL),
(25, 11, 14, '3', '2019-05-15 20:49:52', NULL),
(26, 12, 14, '3', '2019-05-15 20:49:52', NULL),
(27, 13, 14, '1', '2019-05-15 20:49:52', NULL),
(28, 6, 14, '32', '2019-05-15 21:02:57', NULL),
(29, 9, 14, '19', '2019-05-15 21:02:57', NULL),
(30, 10, 14, '13', '2019-05-15 21:02:57', NULL),
(31, 11, 14, '13', '2019-05-15 21:02:57', NULL),
(32, 12, 14, '13', '2019-05-15 21:02:57', NULL),
(33, 13, 14, '6', '2019-05-15 21:02:57', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `conta_users`
--

CREATE TABLE `conta_users` (
  `id` int(11) NOT NULL,
  `titular` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `cpf_titular` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `banco` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `agencia` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `conta` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_conta` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `conta_users`
--

INSERT INTO `conta_users` (`id`, `titular`, `cpf_titular`, `banco`, `agencia`, `conta`, `tipo_conta`, `id_user`, `created`, `updated`) VALUES
(1, 'Leonardo Mauricio da Silva', '017.598.904-48', 'Banco do Brasil', '1069', '0068868-0', 'PoupanÃ§a', 3, '2019-04-06 02:47:51', '2019-04-06 02:48:43');

-- --------------------------------------------------------

--
-- Estrutura da tabela `image_products`
--

CREATE TABLE `image_products` (
  `id` int(11) NOT NULL,
  `url_image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `id_product` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `image_products`
--

INSERT INTO `image_products` (`id`, `url_image`, `id_product`, `created`, `updated`) VALUES
(7, 'team-4.jpg', 13, '2019-03-23 11:06:25', NULL),
(8, 'team-5.jpg', 14, '2019-03-23 13:42:29', NULL),
(9, 'team-7.jpg', 15, '2019-03-23 13:42:47', NULL),
(10, 'team-6.jpg', 16, '2019-03-23 13:43:06', NULL),
(11, 'testimonial-4.jpg', 17, '2019-03-23 13:44:32', NULL),
(12, 'testimonial-1.jpg', 18, '2019-03-23 13:45:01', NULL),
(13, 'testimonial-3.jpg', 19, '2019-03-23 13:46:11', NULL),
(14, 'testimonial-2.jpg', 20, '2019-03-23 13:46:27', NULL),
(15, 'pl1.png', 21, '2019-04-06 07:40:16', NULL),
(16, 'pl1.png', 22, '2019-04-06 19:57:34', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `niveis`
--

CREATE TABLE `niveis` (
  `id` int(11) NOT NULL,
  `nivel` int(11) DEFAULT '0',
  `comisao` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `niveis`
--

INSERT INTO `niveis` (`id`, `nivel`, `comisao`, `created`, `updated`) VALUES
(18, 1, 10, '2019-02-20 21:53:40', NULL),
(19, 2, 5, '2019-02-20 21:53:44', NULL),
(20, 3, 3, '2019-02-20 21:53:57', NULL),
(21, 4, 2, '2019-02-20 21:54:03', '2019-05-15 17:29:38'),
(22, 5, 2, '2019-02-20 21:54:13', NULL),
(23, 6, 2, '2019-02-20 21:54:20', NULL),
(24, 7, 1, '2019-02-20 21:54:25', '2019-05-15 17:29:42');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel_pontuacao`
--

CREATE TABLE `nivel_pontuacao` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8_unicode_ci NOT NULL,
  `pontuacao` int(11) NOT NULL,
  `avatar` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `nivel_pontuacao`
--

INSERT INTO `nivel_pontuacao` (`id`, `titulo`, `descricao`, `pontuacao`, `avatar`, `created`, `updated`) VALUES
(1, 'Diamante - Cruzeiro BellaBaruk', 'Ao chegar no nÃ­vel de Diamante BellaBaruk, vocÃª terÃ¡ direito a participar do Cruzeiro anual, sem dÃºvidas, vocÃª viverÃ¡ momentos incrÃ­veis!', 60000, 'Diamante.png', '2019-04-07 01:34:52', NULL),
(2, 'Two Stars - Bora bora', 'Como Imperial Two Stars, vocÃª estarÃ¡ no topo do Plano de Marketing da empresa. VocÃª ganharÃ¡ uma viagem de 12 dias em Bora Bora no Tahiti. AlÃ©m dessa mega viagem, receberÃ¡ uma incrÃ­vel JÃ³ia Tiffany e um Rolex', 30000, 'Imperial-Two-Star.png', '2019-04-07 01:35:53', NULL),
(3, 'Titan - Lamborghini ou Ferrari', 'VocÃª como Titan acaba de atingir o topo do Plano de Marketing da Hinode. E ao bater essa qualificaÃ§Ã£o vocÃª terÃ¡ a possibilidade de escolher entre um fantÃ¡stico Lamborghini ou uma incrÃ­vel Ferrari.', 20000, 'Titan.png', '2019-04-07 01:36:37', NULL),
(4, 'Three Stars - Programa Super Carros', 'Como Imperial Three Stars vocÃª farÃ¡ parte de um programa da Hinode e poderÃ¡ escolher um Super Carro', 60000, 'Imperial-Three-Star.png', '2019-04-07 01:37:39', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `idPedido` int(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `valor` double NOT NULL DEFAULT '0',
  `comprovante` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dado_baixa` char(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'nao',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `idPedido`, `id_user`, `id_status`, `valor`, `comprovante`, `dado_baixa`, `created`, `updated`) VALUES
(7, 522396940, 6, 3, 143, 'pl1.png', 'sim', '2019-03-23 16:56:01', '2019-05-15 20:33:27'),
(8, 752250755, 6, 2, 96, NULL, 'nao', '2019-03-23 17:02:45', '2019-04-28 10:40:52'),
(9, 843083225, 6, 2, 23, NULL, 'nao', '2019-03-23 17:19:14', '2019-04-28 10:40:52'),
(10, 82363968, 6, 3, 127, 'pl1.png', 'sim', '2019-03-23 17:24:44', '2019-05-15 20:33:47'),
(11, 385747603, 7, 3, 216, 'Captura de Tela (140).png', 'sim', '2019-03-23 18:41:35', '2019-05-15 20:34:01'),
(12, 689788982, 7, 3, 120, 'Captura de Tela (136).png', 'sim', '2019-03-23 19:39:48', '2019-05-15 20:34:33'),
(13, 890742676, 7, 3, 705, 'comprovante.PNG', 'sim', '2019-04-28 10:57:35', '2019-04-28 15:36:24'),
(14, 783871190, 6, 3, 234, 'Ã§.PNG', 'sim', '2019-04-28 15:09:35', '2019-04-28 15:43:17'),
(15, 984989177, 14, 3, 211, 'Captura de Tela (108).png', 'sim', '2019-05-15 18:39:07', '2019-05-15 20:22:11'),
(16, 51112517, 14, 3, 148, 'Captura de Tela (1).png', 'sim', '2019-05-15 19:40:26', '2019-05-15 20:49:51'),
(17, 716394782, 13, 3, 426, 'Captura de Tela (215).png', 'sim', '2019-05-15 20:25:23', '2019-05-15 20:48:53'),
(18, 207787728, 12, 3, 426, 'Captura de Tela (134).png', 'sim', '2019-05-15 20:27:05', '2019-05-15 20:47:32'),
(19, 79097886, 11, 3, 441, 'Captura de Tela (56).png', 'sim', '2019-05-15 20:29:09', '2019-05-15 20:45:36'),
(20, 391660155, 10, 3, 511, 'Captura de Tela (235).png', 'sim', '2019-05-15 20:30:54', '2019-05-15 20:41:44'),
(21, 127860002, 9, 3, 441, 'Captura de Tela (136).png', 'sim', '2019-05-15 20:32:06', '2019-05-15 20:40:13'),
(22, 378655221, 14, 3, 642, 'Captura de Tela (132).png', 'sim', '2019-05-15 21:01:17', '2019-05-15 21:02:57');

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descricao` text COLLATE utf8_unicode_ci,
  `slug` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `preco` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantidade` int(10) NOT NULL DEFAULT '0',
  `validade` int(11) DEFAULT NULL,
  `id_tipo` int(11) DEFAULT NULL,
  `id_responsavel` int(11) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `titulo`, `descricao`, `slug`, `preco`, `quantidade`, `validade`, `id_tipo`, `id_responsavel`, `created`, `updated`) VALUES
(13, 'Produto teste x', 'hj,vasvhds', 'produto-teste-x', '321.00', 20, NULL, NULL, 3, '2019-03-23 11:06:25', NULL),
(14, 'tetse 2', 'weqwe', 'tetse-2', '120.30', 12, NULL, NULL, 3, '2019-03-23 13:42:29', NULL),
(15, 'Produto teste2', '121', 'produto-teste2', '105.99', 20, NULL, NULL, 3, '2019-03-23 13:42:46', NULL),
(16, 'tetse 22', '121', 'tetse-22', '96.30', 20, NULL, NULL, 3, '2019-03-23 13:43:06', NULL),
(17, 'tetse 45', 'sdfdwf', 'tetse-45', '23.30', 20, NULL, NULL, 3, '2019-03-23 13:44:32', NULL),
(18, 'teste 4', 'sdsd', 'teste-4', '63.22', 30, NULL, NULL, 3, '2019-03-23 13:45:01', NULL),
(19, 'camisa 3', 'sdas', 'camisa-3', '85.63', 30, NULL, NULL, 3, '2019-03-23 13:46:11', NULL),
(20, 'tetse 8976987', 'ishaifphi', 'tetse-8976987', '21.32', 20, NULL, NULL, 3, '2019-03-23 13:46:27', NULL),
(21, 'Plano de ativaÃ§Ã£o mensal', 'Neste plano vocÃª ficarÃ¡ ativo durante 30 dias.', 'plano-de-ativacao-mensal', '50.00', 0, 30, 1, 3, '2019-04-06 07:40:16', NULL),
(22, 'Plano Premium', 'Plano premiun', 'plano-premium', '100.00', 0, 60, 1, 3, '2019-04-06 19:57:34', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_pedido`
--

CREATE TABLE `produtos_pedido` (
  `id` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `quantidade` int(10) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `produtos_pedido`
--

INSERT INTO `produtos_pedido` (`id`, `id_produto`, `id_pedido`, `quantidade`, `created`, `updated`) VALUES
(5, 17, 522396940, 1, '2019-03-23 16:56:01', NULL),
(6, 14, 522396940, 1, '2019-03-23 16:56:01', NULL),
(7, 16, 752250755, 1, '2019-03-23 17:02:45', NULL),
(8, 17, 843083225, 1, '2019-03-23 17:19:14', NULL),
(9, 20, 82363968, 2, '2019-03-23 17:24:44', NULL),
(10, 19, 82363968, 1, '2019-03-23 17:24:44', NULL),
(11, 14, 385747603, 1, '2019-03-23 18:41:35', NULL),
(12, 16, 385747603, 1, '2019-03-23 18:41:35', NULL),
(13, 14, 689788982, 1, '2019-03-23 19:39:48', NULL),
(14, 18, 890742676, 1, '2019-04-28 10:57:35', NULL),
(15, 13, 890742676, 2, '2019-04-28 10:57:35', NULL),
(16, 19, 783871190, 1, '2019-04-28 15:09:35', NULL),
(17, 18, 783871190, 2, '2019-04-28 15:09:35', NULL),
(18, 17, 783871190, 1, '2019-04-28 15:09:36', NULL),
(19, 20, 984989177, 1, '2019-05-15 18:39:07', NULL),
(20, 19, 984989177, 1, '2019-05-15 18:39:07', NULL),
(21, 15, 984989177, 1, '2019-05-15 18:39:07', NULL),
(22, 18, 51112517, 1, '2019-05-15 19:40:26', NULL),
(23, 19, 51112517, 1, '2019-05-15 19:40:26', NULL),
(24, 15, 716394782, 1, '2019-05-15 20:25:23', NULL),
(25, 13, 716394782, 1, '2019-05-15 20:25:23', NULL),
(26, 15, 207787728, 1, '2019-05-15 20:27:05', NULL),
(27, 13, 207787728, 1, '2019-05-15 20:27:05', NULL),
(28, 13, 79097886, 1, '2019-05-15 20:29:09', NULL),
(29, 14, 79097886, 1, '2019-05-15 20:29:09', NULL),
(30, 19, 391660155, 1, '2019-05-15 20:30:54', NULL),
(31, 15, 391660155, 1, '2019-05-15 20:30:54', NULL),
(32, 13, 391660155, 1, '2019-05-15 20:30:54', NULL),
(33, 13, 127860002, 1, '2019-05-15 20:32:06', NULL),
(34, 14, 127860002, 1, '2019-05-15 20:32:06', NULL),
(35, 13, 378655221, 2, '2019-05-15 21:01:17', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_pedido`
--

CREATE TABLE `status_pedido` (
  `id` int(11) NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `status_pedido`
--

INSERT INTO `status_pedido` (`id`, `status`) VALUES
(1, 'Aguardando Pagamento'),
(2, 'Em Análise'),
(3, 'Pago'),
(4, 'Disponível'),
(5, 'Em Disputa'),
(6, 'Devolvida'),
(7, 'cancelada'),
(8, 'Pendente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_users`
--

CREATE TABLE `tipo_users` (
  `id` int(11) NOT NULL,
  `tipo` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tipo_users`
--

INSERT INTO `tipo_users` (`id`, `tipo`) VALUES
(1, 'Administrador'),
(2, 'Master');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cnpj` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_pessoa` enum('fisica','juridica') COLLATE utf8_unicode_ci DEFAULT 'fisica',
  `tipo_user` int(11) NOT NULL DEFAULT '2',
  `status` enum('ativo','inativo') COLLATE utf8_unicode_ci DEFAULT NULL,
  `fisrt_adesao` tinyint(1) NOT NULL DEFAULT '0',
  `indicador` int(11) DEFAULT NULL,
  `pontuacao` int(11) DEFAULT '0',
  `rua` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bairro` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `complemento` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `referencia` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cep` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero` int(20) DEFAULT NULL,
  `cidade` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uf` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'RN',
  `sexo` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `_token` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `cpf`, `cnpj`, `slug`, `email`, `senha`, `tipo_pessoa`, `tipo_user`, `status`, `fisrt_adesao`, `indicador`, `pontuacao`, `rua`, `bairro`, `complemento`, `referencia`, `cep`, `numero`, `cidade`, `uf`, `sexo`, `telefone`, `avatar`, `created`, `_token`, `updated`) VALUES
(3, 'Leonardo Mauricio da Silva', '017.598.904-48', '', 'lmauricio', 'lf341533@gmail.com', '$2y$10$RCk2.0Hv4R9EDO26n5MJFuN7szVyJzxdPtj1m.N5inW24T6HqJ4Su', 'fisica', 1, 'inativo', 0, NULL, 0, 'Rua Prisco Rocha', 'Passe e fica', 'Casa 50', 'Em frente ao orelhÃ£o', '59570-000', 1163, 'CearÃ¡-Mirim', 'RN', 'M', '(84)99482-9780', 'IMG_2022.JPG', '2019-02-21 20:22:23', NULL, '2019-04-28 15:17:31'),
(6, 'Pedro Neto', '054.852.774-11', '', 'pedro-neto', 'neto@gmail.com', '$2y$10$Mjpcsj2V4YQbSVRRTu84lusMagUXncYWEcoRc4sroihC7fK1.DunS', 'fisica', 2, 'ativo', 1, 3, 504, 'Rua Prisco Rocha', 'Passe e fica', 'Zona Urbana', 'Em frente ao orelhÃ£o', '59570-000', 12, 'CearÃ¡-Mirim', 'RN', 'M', '(84)45454-6546', '_LNO4840.jpg', '2019-02-21 20:37:28', NULL, '2019-05-15 20:33:47'),
(7, 'Teste Franqueado', NULL, NULL, 'teste', 'leomauricio7@gmail.com', '$2y$10$LcIp4mEV5yPZI6hTs.Qn7uAleVT0f952tY7oLRkUimyvI8xtf29Oe', 'fisica', 2, 'ativo', 1, 6, 1041, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RN', NULL, '(84) 99430-2191', NULL, '2019-02-22 16:13:22', NULL, '2019-05-15 20:34:33'),
(8, 'teste cliente', '628.636.680-64', '', 'teste-cliente', 'teste@gmail.com', '$2y$10$yfbbJabS.UCj.WAzrPYfBeK3i7/2OMyPnsg6cpKrcP0l3ZHk.FCvm', 'fisica', 1, 'inativo', 0, NULL, 0, 'Rua Prisco Richa', 'Passe e fica', 'Zona Urbana', 'Em frente ao orelhÃ£o', '59490-000', 1163, 'Ielmo Marinho', 'RN', 'M', '(84)32670-013', 'user.png', '2019-02-22 19:24:47', NULL, '2019-04-28 15:17:31'),
(9, 'Indicado do I', '', '', 'teste1', 'teste1@gmail.com', '$2y$10$SZrDXAJaveiio0P6rMs/3uzOgtncuWFSw.6SnEzRjHF6wFcJSSScu', 'fisica', 2, 'ativo', 1, 6, 441, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RN', '', '(84)32670-013', 'IMG_20150606_101536.jpg', '2019-04-07 00:58:13', NULL, '2019-05-15 21:25:48'),
(10, 'teste 2', NULL, NULL, 'teste2', 'teste2@gmail.com', '$2y$10$y2csTcI32o5RmQ/R/bsQdOvKZeYXIi3wp1U.BHH9a4GzmHuRA.FPm', 'fisica', 2, 'ativo', 1, 9, 511, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RN', NULL, '(84) 32670-013', NULL, '2019-04-07 01:00:19', NULL, '2019-05-15 20:41:44'),
(11, 'teste3', NULL, NULL, 'teste3', 'teste3@gmail.com', '$2y$10$y2csTcI32o5RmQ/R/bsQdOvKZeYXIi3wp1U.BHH9a4GzmHuRA.FPm', 'fisica', 2, 'ativo', 1, 10, 441, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RN', NULL, '(84) 32670-013', NULL, '2019-04-07 01:00:54', NULL, '2019-05-15 20:45:36'),
(12, 'teste  4', NULL, NULL, 'teste4', 'teste4@gmail.com', '$2y$10$y2csTcI32o5RmQ/R/bsQdOvKZeYXIi3wp1U.BHH9a4GzmHuRA.FPm', 'fisica', 2, 'ativo', 1, 11, 426, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RN', NULL, '(98) 79897-5466', NULL, '2019-05-15 16:34:10', NULL, '2019-05-15 20:47:32'),
(13, 'teste 5 ', NULL, NULL, 'teste5', 'teste5@gmail.com', '$2y$10$qzVwW6azQg7RRHH4L0By9OOfEgC0O50dhJ6NziXYgAlLZIcAWPajK', 'fisica', 2, 'ativo', 1, 12, 426, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RN', NULL, '(84) 32670-013', NULL, '2019-05-15 16:34:41', NULL, '2019-05-15 20:48:53'),
(14, 'teste 6', NULL, NULL, 'teste6', 'teste6@gmail.com', '$2y$10$8kI.KH.XB6JORY.V5JmzsuttS/SliMdHDY6Zt8PlhilmpFHOEeWCS', 'fisica', 2, 'ativo', 1, 13, 1423, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RN', NULL, '(84) 32670-013', NULL, '2019-05-15 16:35:11', NULL, '2019-05-15 21:02:57');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_adesao`
--

CREATE TABLE `user_adesao` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `data_ativacao` date NOT NULL,
  `data_validade` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `user_adesao`
--

INSERT INTO `user_adesao` (`id`, `id_user`, `data_ativacao`, `data_validade`) VALUES
(5, 7, '2019-04-28', '2019-05-28'),
(6, 6, '2019-04-28', '2019-05-28'),
(7, 14, '2019-05-15', '2019-06-14'),
(8, 14, '2019-05-15', '2019-06-14'),
(9, 9, '2019-05-15', '2019-06-14'),
(10, 10, '2019-05-15', '2019-06-14'),
(11, 11, '2019-05-15', '2019-06-14'),
(12, 12, '2019-05-15', '2019-06-14'),
(13, 13, '2019-05-15', '2019-06-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comissoes`
--
ALTER TABLE `comissoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user_recebedor`),
  ADD KEY `id_user_comprador` (`id_user_comprador`);

--
-- Indexes for table `conta_users`
--
ALTER TABLE `conta_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `image_products`
--
ALTER TABLE `image_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `niveis`
--
ALTER TABLE `niveis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nivel_pontuacao`
--
ALTER TABLE `nivel_pontuacao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `idPedido` (`idPedido`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_responsavel` (`id_responsavel`);

--
-- Indexes for table `produtos_pedido`
--
ALTER TABLE `produtos_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Indexes for table `status_pedido`
--
ALTER TABLE `status_pedido`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipo_users`
--
ALTER TABLE `tipo_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `tipo_user` (`tipo_user`),
  ADD KEY `indicador` (`indicador`);

--
-- Indexes for table `user_adesao`
--
ALTER TABLE `user_adesao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comissoes`
--
ALTER TABLE `comissoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `conta_users`
--
ALTER TABLE `conta_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `image_products`
--
ALTER TABLE `image_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `niveis`
--
ALTER TABLE `niveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `nivel_pontuacao`
--
ALTER TABLE `nivel_pontuacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `produtos_pedido`
--
ALTER TABLE `produtos_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `status_pedido`
--
ALTER TABLE `status_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tipo_users`
--
ALTER TABLE `tipo_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user_adesao`
--
ALTER TABLE `user_adesao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `comissoes`
--
ALTER TABLE `comissoes`
  ADD CONSTRAINT `comissoes_ibfk_1` FOREIGN KEY (`id_user_recebedor`) REFERENCES `users` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `comissoes_ibfk_2` FOREIGN KEY (`id_user_comprador`) REFERENCES `users` (`id`) ON DELETE NO ACTION;

--
-- Limitadores para a tabela `conta_users`
--
ALTER TABLE `conta_users`
  ADD CONSTRAINT `conta_users_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `image_products`
--
ALTER TABLE `image_products`
  ADD CONSTRAINT `image_products_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedido_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `status_pedido` FOREIGN KEY (`id_status`) REFERENCES `status_pedido` (`id`);

--
-- Limitadores para a tabela `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_responsavel`) REFERENCES `users` (`id`) ON DELETE NO ACTION;

--
-- Limitadores para a tabela `produtos_pedido`
--
ALTER TABLE `produtos_pedido`
  ADD CONSTRAINT `pedido_produto` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`idPedido`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produto_pedido_produto` FOREIGN KEY (`id_produto`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`tipo_user`) REFERENCES `tipo_users` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`indicador`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `user_adesao`
--
ALTER TABLE `user_adesao`
  ADD CONSTRAINT `user_adesao_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
