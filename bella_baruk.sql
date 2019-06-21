-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21-Jun-2019 às 00:31
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
CREATE DATABASE IF NOT EXISTS `bella_baruk` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `bella_baruk`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comissoes`
--

DROP TABLE IF EXISTS `comissoes`;
CREATE TABLE `comissoes` (
  `id` int(11) NOT NULL,
  `id_user_recebedor` int(11) NOT NULL,
  `id_user_comprador` int(11) NOT NULL,
  `valor` double NOT NULL DEFAULT '0',
  `tipo` enum('matriz','unilevel') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'unilevel',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `comissoes`
--

INSERT INTO `comissoes` (`id`, `id_user_recebedor`, `id_user_comprador`, `valor`, `tipo`, `created`, `updated`) VALUES
(1, 6, 7, 40, 'unilevel', '2019-06-14 17:12:21', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `conta_users`
--

DROP TABLE IF EXISTS `conta_users`;
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

DROP TABLE IF EXISTS `image_products`;
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
-- Estrutura da tabela `matriz`
--

DROP TABLE IF EXISTS `matriz`;
CREATE TABLE `matriz` (
  `id` int(11) NOT NULL,
  `id_user_matriz` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `id_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `matriz`
--

INSERT INTO `matriz` (`id`, `id_user_matriz`, `id_user`, `level`, `id_no`) VALUES
(1, 3, 6, 1, 3),
(2, 6, 7, 1, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `niveis`
--

DROP TABLE IF EXISTS `niveis`;
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

DROP TABLE IF EXISTS `nivel_pontuacao`;
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
(5, 'BRONZE', 'R$ 250,00 (Prêmio em dinheiro)', 3000, 'BRONZE-MIN.png', '2019-05-21 20:09:47', NULL),
(6, 'PRATA', 'R$ 500,00 (Prêmio em dinheiro)', 15000, 'PRATA-MIN.png', '2019-05-21 20:10:45', NULL),
(7, 'OURO', 'R$ 1.500,00 (Prêmio em dinheiro)', 40000, 'OURO-MIN.png', '2019-05-21 20:11:27', NULL),
(8, 'RUBI', 'R$ 4.000,00 (Prêmio em dinheiro)', 100000, 'RUBI-MIN.png', '2019-05-21 20:12:10', NULL),
(9, 'SAFIRA', 'R$ 7.000,00 (Prêmio em dinheiro)', 150000, 'SAFIRA-MIN.png', '2019-05-21 20:12:45', NULL),
(10, 'DIAMANTE', 'R$ 10.000,00 (Prêmio em dinheiro)', 250000, 'DIAMANTE-MIN.png', '2019-05-21 20:13:24', NULL),
(11, 'DUPLO DIAMANTE', 'R$ 20.000,00 (Prêmio em dinheiro)', 500000, 'DUPLO DUAMANTE-MIN.png', '2019-05-21 20:13:53', NULL),
(12, 'TRIPLO DIAMANTE', 'R$ 50.000,00 (Prêmio em dinheiro)', 1000000, 'TRIPLO DIAMANTE-MIN.png', '2019-05-21 20:14:32', NULL),
(13, 'IMPERIAL DIAMANTE BARUK', 'R$ 100.000,00 (Prêmio em dinheiro)', 2000000, 'IMPERIAL-MIN.png', '2019-05-21 20:15:13', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel_pontuacao_user`
--

DROP TABLE IF EXISTS `nivel_pontuacao_user`;
CREATE TABLE `nivel_pontuacao_user` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_nivel` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `idPedido` int(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `valor` double NOT NULL DEFAULT '0',
  `comprovante` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dado_baixa` char(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'nao',
  `payment` enum('dinheiro','bonus','pagseguro') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'dinheiro',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `idPedido`, `id_user`, `id_status`, `valor`, `comprovante`, `dado_baixa`, `payment`, `created`, `updated`) VALUES
(3, 253484483, 6, 3, 210, 'Captura de Tela (140).png', 'sim', 'dinheiro', '2019-06-14 16:23:15', '2019-06-14 16:40:17'),
(4, 465898274, 7, 3, 210, 'Captura de Tela (1).png', 'sim', 'dinheiro', '2019-06-14 17:11:33', '2019-06-14 17:12:20'),
(5, 853151210, 6, 1, 62, NULL, 'nao', 'dinheiro', '2019-06-20 13:01:05', '2019-06-20 20:24:01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

DROP TABLE IF EXISTS `products`;
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

DROP TABLE IF EXISTS `produtos_pedido`;
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
(5, 22, 253484483, 1, '2019-06-14 16:23:15', NULL),
(6, 13, 253484483, 1, '2019-06-14 16:23:15', NULL),
(7, 22, 465898274, 1, '2019-06-14 17:11:33', NULL),
(8, 13, 465898274, 1, '2019-06-14 17:11:33', NULL),
(9, 18, 853151210, 2, '2019-06-20 13:01:05', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `saques`
--

DROP TABLE IF EXISTS `saques`;
CREATE TABLE `saques` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `valor` float NOT NULL,
  `status` enum('aprovado','reprovado','em analise') COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `saques`
--

INSERT INTO `saques` (`id`, `id_user`, `valor`, `status`, `created`, `updated`) VALUES
(1, 6, 10, 'reprovado', '2019-06-20 15:02:09', '2019-06-20 21:24:00'),
(2, 6, 20, 'reprovado', '2019-06-20 17:31:05', '2019-06-20 21:24:02'),
(3, 6, 23.5, 'aprovado', '2019-06-20 17:33:12', '2019-06-20 21:23:31'),
(4, 6, 5.5, 'aprovado', '2019-06-20 20:00:38', '2019-06-20 21:23:34');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_pedido`
--

DROP TABLE IF EXISTS `status_pedido`;
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

DROP TABLE IF EXISTS `tipo_users`;
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
-- Estrutura da tabela `transacoes`
--

DROP TABLE IF EXISTS `transacoes`;
CREATE TABLE `transacoes` (
  `id` int(11) NOT NULL,
  `id_user_origem` int(10) NOT NULL,
  `id_user_destino` int(10) NOT NULL,
  `valor` double NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `transacoes`
--

INSERT INTO `transacoes` (`id`, `id_user_origem`, `id_user_destino`, `valor`, `created`, `updated`) VALUES
(1, 6, 8, 10, '2019-06-20 15:24:09', NULL),
(2, 6, 7, 5, '2019-06-20 19:59:10', NULL),
(3, 6, 3, 2.5, '2019-06-20 20:00:23', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
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
(3, 'Leonardo Mauricio da Silva', '017.598.904-48', '', 'lmauricio', 'lf341533@gmail.com', '$2y$10$RCk2.0Hv4R9EDO26n5MJFuN7szVyJzxdPtj1m.N5inW24T6HqJ4Su', 'fisica', 1, 'inativo', 0, NULL, 420, 'Rua Prisco Rocha', 'Passe e fica', 'Casa 50', 'Em frente ao orelhÃ£o', '59570-000', 1163, 'CearÃ¡-Mirim', 'RN', 'M', '(84)99482-9780', 'IMG_2022.JPG', '2019-02-21 20:22:23', NULL, '2019-06-14 17:12:20'),
(6, 'Pedro Neto', '054.852.774-11', '', 'pedro-neto', 'neto@gmail.com', '$2y$10$Mjpcsj2V4YQbSVRRTu84lusMagUXncYWEcoRc4sroihC7fK1.DunS', 'fisica', 2, 'ativo', 1, 3, 420, 'Rua Prisco Rocha', 'Passe e fica', 'Zona Urbana', 'Em frente ao orelhÃ£o', '59570-000', 12, 'CearÃ¡-Mirim', 'RN', 'M', '(84)45454-6546', '_LNO4840.jpg', '2019-02-21 20:37:28', NULL, '2019-06-20 12:14:44'),
(7, 'Teste Franqueado', NULL, NULL, 'teste', 'leomauricio7@gmail.com', '$2y$10$LcIp4mEV5yPZI6hTs.Qn7uAleVT0f952tY7oLRkUimyvI8xtf29Oe', 'fisica', 2, 'ativo', 1, 6, 210, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RN', NULL, '(84) 99430-2191', NULL, '2019-02-22 16:13:22', NULL, '2019-06-14 17:12:20'),
(8, 'teste cliente', '628.636.680-64', '', 'teste-cliente', 'teste@gmail.com', '$2y$10$yfbbJabS.UCj.WAzrPYfBeK3i7/2OMyPnsg6cpKrcP0l3ZHk.FCvm', 'fisica', 1, 'inativo', 0, NULL, 0, 'Rua Prisco Richa', 'Passe e fica', 'Zona Urbana', 'Em frente ao orelhÃ£o', '59490-000', 1163, 'Ielmo Marinho', 'RN', 'M', '(84)32670-013', 'user.png', '2019-02-22 19:24:47', NULL, '2019-04-28 15:17:31'),
(9, 'Indicado do I', '', '', 'teste1', 'teste1@gmail.com', '$2y$10$SZrDXAJaveiio0P6rMs/3uzOgtncuWFSw.6SnEzRjHF6wFcJSSScu', 'fisica', 2, 'inativo', 0, 6, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RN', '', '(84)32670-013', 'IMG_20150606_101536.jpg', '2019-04-07 00:58:13', NULL, '2019-05-31 20:51:22'),
(10, 'indicado pelo 9', NULL, NULL, 'teste2', 'teste2@gmail.com', '$2y$10$y2csTcI32o5RmQ/R/bsQdOvKZeYXIi3wp1U.BHH9a4GzmHuRA.FPm', 'fisica', 2, 'inativo', 0, 9, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RN', NULL, '(84) 32670-013', NULL, '2019-04-07 01:00:19', NULL, '2019-05-31 20:51:22'),
(11, 'indicado pelo 10', NULL, NULL, 'teste3', 'teste3@gmail.com', '$2y$10$y2csTcI32o5RmQ/R/bsQdOvKZeYXIi3wp1U.BHH9a4GzmHuRA.FPm', 'fisica', 2, 'inativo', 0, 10, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RN', NULL, '(84) 32670-013', NULL, '2019-04-07 01:00:54', NULL, '2019-05-31 20:51:22'),
(13, 'indicado pleo 17', NULL, NULL, 'teste5', 'teste5@gmail.com', '$2y$10$qzVwW6azQg7RRHH4L0By9OOfEgC0O50dhJ6NziXYgAlLZIcAWPajK', 'fisica', 2, 'inativo', 0, 17, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RN', NULL, '(84) 32670-013', NULL, '2019-05-15 16:34:41', NULL, '2019-05-31 20:51:22'),
(14, 'indicado pelo 17', NULL, NULL, 'teste6', 'teste6@gmail.com', '$2y$10$8kI.KH.XB6JORY.V5JmzsuttS/SliMdHDY6Zt8PlhilmpFHOEeWCS', 'fisica', 2, 'inativo', 0, 17, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RN', NULL, '(84) 32670-013', NULL, '2019-05-15 16:35:11', NULL, '2019-05-31 20:51:22'),
(15, 'mas um indicado 9', NULL, NULL, 'teste9', 'teste9@gmail.com', '$2y$10$gnBoFK5xNHoNzEpUoG/YR.P67.kgEHJs/aue44/deyYg0NdwB1MnC', 'fisica', 2, 'inativo', 0, 9, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RN', NULL, '(87) 98789-7897', NULL, '2019-05-16 00:06:13', NULL, NULL),
(16, 'indicado pelo 7', NULL, NULL, 'teste10', 'testeuuu@gmaoil.com', '$2y$10$oPLiSexnsMNHJxlbhCaPe.o2avkn3OhzgnSI0Xm.JlwWNncIyNXTe', 'fisica', 2, 'inativo', 0, 7, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RN', NULL, '(45) 64867-9788', NULL, '2019-05-16 00:23:22', NULL, '2019-06-14 15:51:10'),
(17, 'mas um  indicado pelo 7', NULL, NULL, 'mai7', 'teste222@gmail.com', '$2y$10$OQZFkfTy3rmF1izi9GZCL.6RzpXstmPUHsOE4qtPwgVUOmhN4qoiG', 'fisica', 2, 'inativo', 0, 7, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RN', NULL, '(84) 32670-013', NULL, '2019-05-16 00:24:03', NULL, NULL),
(20, 'mas um indicado pelo 10 ', NULL, NULL, 'teste1010', 'teste1010@gmail.com', '$2y$10$D6wkRKyEqFR.AfAfsv9rB.nuFMIROZDLjjHnv2G9ioGJgesrNpobe', 'fisica', 2, 'inativo', 0, 10, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RN', NULL, '(84) 32670-013', NULL, '2019-05-16 00:32:21', NULL, NULL),
(21, 'indicado pelo 15', NULL, NULL, 'teste1515', 'teste1515@gmail.com', '$2y$10$pqwAWPn0UD1EsQMxrsFB8.Hi0xCR7C0/iyAoPiZc0N8WLd5f0JQPW', 'fisica', 2, 'inativo', 0, 15, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RN', NULL, '(84) 32670-013', NULL, '2019-05-16 00:33:42', NULL, NULL),
(22, 'mas um indicado pelo 15', NULL, NULL, 'teste152', 'teste152@gmail.com', '$2y$10$TCa2zn4W/.qifTqMFvMDcu6p3LZN3P5kjywL5r8t2yosG55yT4Cie', 'fisica', 2, 'inativo', 0, 15, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RN', NULL, '(84) 32670-013', NULL, '2019-05-16 00:34:18', NULL, NULL),
(23, 'indicado do 6', NULL, NULL, 'teste24', 'teste24@gmail.com', '$2y$10$BTd6QJeOwLzcNUrGyo97Du3YPUiTZBhiAGzXnDBQZ4TdfCCfOwfCW', 'fisica', 2, 'inativo', 0, 6, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RN', NULL, '(84) 32670-013', NULL, '2019-05-17 21:10:44', NULL, '2019-05-22 14:22:47'),
(24, 'indicado pelo 9', NULL, NULL, 'teste99', 'tes12te@gmail.com', '$2y$10$Olqia7fliubheTrFrlPQQukZc8udoqYq2asfP1Zcr3sMeWTztWRBG', 'fisica', 2, 'inativo', 0, 9, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RN', NULL, '(84) 32670-013', NULL, '2019-05-22 13:35:43', NULL, NULL),
(25, 'indicado do 12', NULL, NULL, 'indicadodo12', 'teste1212@gmail.com', '$2y$10$.OT4tZxS0ZWWLCMLlZJGKeQ4144HKkFFjeLafk0L3xt6FwVEC1612', 'fisica', 2, 'inativo', 0, 12, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RN', NULL, '(84) 32670-013', NULL, '2019-05-22 14:27:39', NULL, NULL),
(26, 'indicado pelo 6', NULL, NULL, 'ind-6', 'ind6@gmailcom', '$2y$10$oObs6/ldow0URr.u.GLvwO2zuRbz7a.cF814vczcNccNL5RNspuem', 'fisica', 2, 'inativo', 0, 6, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RN', NULL, '(84) 99430-2191', NULL, '2019-05-22 14:42:42', NULL, NULL),
(27, 'indicado pelo 6', NULL, NULL, 'ind-6-2', 'teste12121@gmail.com', '$2y$10$34ag0CoPeSDWdTdt7FDbMuylEradwH7J2s1ax9yCZXgsDyiNgVcFa', 'fisica', 2, 'inativo', 0, 6, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RN', NULL, '(84) 32670-013', NULL, '2019-05-22 14:43:38', NULL, NULL),
(28, 'indicado do 21', NULL, NULL, 'ind-21', 'teste21@gmail.com', '$2y$10$r1jFMNWDT4SG0qIR0fyD/OciN2mGK5pI2284s0ytbS6U0vhi13iKK', 'fisica', 2, 'inativo', 0, 21, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RN', NULL, '(84) 32670-013', NULL, '2019-05-22 14:55:30', NULL, NULL),
(29, 'indicado do 12', NULL, NULL, 'ind-12-12', 'teste12-12@gmail.com', '$2y$10$rlXYDm3S.gO5KBX4Fzm4lOsB/qqMN1hEcLbOJSsZrQEKZpPTZHn1y', 'fisica', 2, 'inativo', 0, 12, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RN', NULL, '(84) 32670-013', NULL, '2019-05-22 15:03:03', NULL, NULL),
(30, 'indicado do 17', NULL, NULL, 'ind-17', 'teste17@gmail.com', '$2y$10$Nq0k68BksyIFJraSH8x5zunnc7AeQozWTfrxq.lw6Qs.c7wUzh1y2', 'fisica', 2, 'inativo', 0, 14, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RN', NULL, '(84) 32670-013', NULL, '2019-05-22 15:15:27', NULL, NULL),
(31, 'indicado do 22', NULL, NULL, 'ind-22', 'teste22@gmail.com', '$2y$10$jhb4Bs2hX.GZRwX/n19viOS5wfgpcd0r4Ynj4D.29gNenIv5XL9lK', 'fisica', 2, 'inativo', 0, 22, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RN', NULL, '(84) 32670-013', NULL, '2019-05-22 15:22:09', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_adesao`
--

DROP TABLE IF EXISTS `user_adesao`;
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
(5, 6, '2019-06-14', '2019-07-14'),
(6, 7, '2019-06-14', '2019-07-14');

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
-- Indexes for table `matriz`
--
ALTER TABLE `matriz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_user_matriz` (`id_user_matriz`),
  ADD KEY `id_no` (`id_no`);

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
-- Indexes for table `nivel_pontuacao_user`
--
ALTER TABLE `nivel_pontuacao_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_nivel` (`id_nivel`);

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
-- Indexes for table `saques`
--
ALTER TABLE `saques`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

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
-- Indexes for table `transacoes`
--
ALTER TABLE `transacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user_origem` (`id_user_origem`),
  ADD KEY `id_user_destino` (`id_user_destino`),
  ADD KEY `id_user_origem_2` (`id_user_origem`),
  ADD KEY `id_user_destino_2` (`id_user_destino`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
-- AUTO_INCREMENT for table `matriz`
--
ALTER TABLE `matriz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `niveis`
--
ALTER TABLE `niveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `nivel_pontuacao`
--
ALTER TABLE `nivel_pontuacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `nivel_pontuacao_user`
--
ALTER TABLE `nivel_pontuacao_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `produtos_pedido`
--
ALTER TABLE `produtos_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `saques`
--
ALTER TABLE `saques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
-- AUTO_INCREMENT for table `transacoes`
--
ALTER TABLE `transacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `user_adesao`
--
ALTER TABLE `user_adesao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
-- Limitadores para a tabela `matriz`
--
ALTER TABLE `matriz`
  ADD CONSTRAINT `matriz_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `matriz_ibfk_2` FOREIGN KEY (`id_user_matriz`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `matriz_ibfk_3` FOREIGN KEY (`id_no`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `nivel_pontuacao_user`
--
ALTER TABLE `nivel_pontuacao_user`
  ADD CONSTRAINT `nivel_pontuacao_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nivel_pontuacao_user_ibfk_2` FOREIGN KEY (`id_nivel`) REFERENCES `nivel_pontuacao` (`id`) ON DELETE CASCADE;

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
-- Limitadores para a tabela `saques`
--
ALTER TABLE `saques`
  ADD CONSTRAINT `saques_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `transacoes`
--
ALTER TABLE `transacoes`
  ADD CONSTRAINT `transacoes_ibfk_1` FOREIGN KEY (`id_user_origem`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `transacoes_ibfk_2` FOREIGN KEY (`id_user_destino`) REFERENCES `users` (`id`);

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
