-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24-Mar-2019 às 03:32
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
  `id_user` int(11) NOT NULL,
  `valor` decimal(10,0) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(14, 'testimonial-2.jpg', 20, '2019-03-23 13:46:27', NULL);

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
(21, 4, 3, '2019-02-20 21:54:03', NULL),
(22, 5, 2, '2019-02-20 21:54:13', NULL),
(23, 6, 2, '2019-02-20 21:54:20', NULL),
(24, 7, 2, '2019-02-20 21:54:25', NULL);

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
(7, 522396940, 6, 1, 143, NULL, 'nao', '2019-03-23 16:56:01', NULL),
(8, 752250755, 6, 1, 96, NULL, 'nao', '2019-03-23 17:02:45', NULL),
(9, 843083225, 6, 1, 23, NULL, 'nao', '2019-03-23 17:19:14', NULL),
(10, 82363968, 6, 1, 127, NULL, 'nao', '2019-03-23 17:24:44', NULL),
(11, 385747603, 7, 3, 216, 'Captura de Tela (140).png', 'sim', '2019-03-23 18:41:35', '2019-03-24 00:28:17'),
(12, 689788982, 7, 3, 120, 'Captura de Tela (136).png', 'sim', '2019-03-23 19:39:48', '2019-03-24 00:28:46');

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `preco` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `quantidade` int(10) NOT NULL DEFAULT '0',
  `id_responsavel` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `titulo`, `descricao`, `slug`, `preco`, `quantidade`, `id_responsavel`, `created`, `updated`) VALUES
(13, 'Produto teste x', 'hj,vasvhds', 'produto-teste-x', '321.00', 20, 3, '2019-03-23 11:06:25', NULL),
(14, 'tetse 2', 'weqwe', 'tetse-2', '120.30', 12, 3, '2019-03-23 13:42:29', NULL),
(15, 'Produto teste2', '121', 'produto-teste2', '105.99', 20, 3, '2019-03-23 13:42:46', NULL),
(16, 'tetse 22', '121', 'tetse-22', '96.30', 20, 3, '2019-03-23 13:43:06', NULL),
(17, 'tetse 45', 'sdfdwf', 'tetse-45', '23.30', 20, 3, '2019-03-23 13:44:32', NULL),
(18, 'teste 4', 'sdsd', 'teste-4', '63.22', 30, 3, '2019-03-23 13:45:01', NULL),
(19, 'camisa 3', 'sdas', 'camisa-3', '85.63', 30, 3, '2019-03-23 13:46:11', NULL),
(20, 'tetse 8976987', 'ishaifphi', 'tetse-8976987', '21.32', 20, 3, '2019-03-23 13:46:27', NULL);

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
(13, 14, 689788982, 1, '2019-03-23 19:39:48', NULL);

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

INSERT INTO `users` (`id`, `nome`, `cpf`, `cnpj`, `slug`, `email`, `senha`, `tipo_pessoa`, `tipo_user`, `status`, `indicador`, `pontuacao`, `rua`, `bairro`, `complemento`, `referencia`, `cep`, `numero`, `cidade`, `uf`, `sexo`, `telefone`, `avatar`, `created`, `_token`, `updated`) VALUES
(3, 'Leonardo Mauricio da Silva', '017.598.904-48', '', 'lmauricio', 'lf341533@gmail.com', '$2y$10$RCk2.0Hv4R9EDO26n5MJFuN7szVyJzxdPtj1m.N5inW24T6HqJ4Su', 'fisica', 1, 'ativo', NULL, 0, 'Rua Prisco Rocha', 'Passe e fica', 'Zona Urbana', 'Em frente ao orelhÃ£o', '59570-000', 50, 'CearÃ¡-Mirim', 'RN', 'M', '(99)48297-80', 'PhotoGrid_1440423455562.jpg', '2019-02-21 20:22:23', NULL, '2019-03-22 22:22:11'),
(6, 'Pedro Neto', '054.852.774-11', '', 'pedro-neto', 'neto@gmail.com', '$2y$10$Mjpcsj2V4YQbSVRRTu84lusMagUXncYWEcoRc4sroihC7fK1.DunS', 'fisica', 2, 'inativo', 3, 0, 'Rua Prisco Rocha', 'Passe e fica', 'Zona Urbana', 'Em frente ao orelhÃ£o', '59570-000', 12, 'CearÃ¡-Mirim', 'RN', 'M', '(84)45454-6546', '_LNO4840.jpg', '2019-02-21 20:37:28', NULL, '2019-02-22 19:17:58'),
(7, 'Teste Franqueado', NULL, NULL, 'teste', 'leomauricio7@gmail.com', '$2y$10$LcIp4mEV5yPZI6hTs.Qn7uAleVT0f952tY7oLRkUimyvI8xtf29Oe', 'fisica', 2, 'inativo', 6, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RN', NULL, '(84) 99430-2191', NULL, '2019-02-22 16:13:22', NULL, '2019-03-23 18:41:01'),
(8, 'teste cliente', '628.636.680-64', '', 'teste-cliente', 'teste@gmail.com', '$2y$10$yfbbJabS.UCj.WAzrPYfBeK3i7/2OMyPnsg6cpKrcP0l3ZHk.FCvm', 'fisica', 1, 'ativo', NULL, 0, 'Rua Prisco Richa', 'Passe e fica', 'Zona Urbana', 'Em frente ao orelhÃ£o', '59490-000', 1163, 'Ielmo Marinho', 'RN', 'M', '(84)32670-013', 'user.png', '2019-02-22 19:24:47', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comissoes`
--
ALTER TABLE `comissoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comissoes`
--
ALTER TABLE `comissoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `conta_users`
--
ALTER TABLE `conta_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `image_products`
--
ALTER TABLE `image_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `niveis`
--
ALTER TABLE `niveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `produtos_pedido`
--
ALTER TABLE `produtos_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `comissoes`
--
ALTER TABLE `comissoes`
  ADD CONSTRAINT `comissoes_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
