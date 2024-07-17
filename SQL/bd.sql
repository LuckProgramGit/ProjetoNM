-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03/06/2024 às 05:21
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd2`
--

DELIMITER $$
--
-- Funções
--
CREATE DEFINER=`root`@`localhost` FUNCTION `generate_custom_id` () RETURNS CHAR(9) CHARSET utf8mb4 COLLATE utf8mb4_general_ci  BEGIN
    DECLARE chars TEXT DEFAULT '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    DECLARE result CHAR(9) DEFAULT '';
    DECLARE i INT DEFAULT 0;
    DECLARE pos INT DEFAULT 0;

    WHILE i < 9 DO
        SET pos = FLOOR(1 + RAND() * LENGTH(chars));
        SET result = CONCAT(result, SUBSTRING(chars, pos, 1));
        SET i = i + 1;
    END WHILE;

    RETURN result;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `carro`
--

CREATE TABLE `carro` (
  `id_carro` int(11) NOT NULL,
  `modelo_carro` varchar(255) DEFAULT NULL,
  `ano_fabricacao_carro` int(4) DEFAULT NULL,
  `cor_carro` varchar(255) DEFAULT NULL,
  `numero_chassi_carro` varchar(255) DEFAULT NULL,
  `preco_carro` decimal(10,2) DEFAULT NULL,
  `quantidade_carro` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `cnpj_fornecedor` int(11) NOT NULL,
  `nome_fornecedor` varchar(255) DEFAULT NULL,
  `email_fornecedor` varchar(140) DEFAULT NULL,
  `endereco_fornecedor` varchar(140) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `peca`
--

CREATE TABLE `peca` (
  `id_peca` int(11) NOT NULL,
  `nome_peca` varchar(255) DEFAULT NULL,
  `preco_peca` decimal(10,2) DEFAULT NULL,
  `quantidade_peca` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` bigint(20) NOT NULL,
  `nome_produto` varchar(255) DEFAULT NULL,
  `cor_produto` varchar(255) DEFAULT NULL,
  `preco_produto` decimal(10,2) DEFAULT NULL,
  `ano_fabricacao_produto` int(11) DEFAULT NULL,
  `quantidade_produto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `registro_peca`
--

CREATE TABLE `registro_peca` (
  `numero` char(9) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `preco` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `relatorio`
--

CREATE TABLE `relatorio` (
  `id_relatorio` int(11) NOT NULL,
  `valor_final` decimal(10,2) DEFAULT NULL,
  `data_relatorio` date DEFAULT NULL,
  `quantidade_relatorio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(100) DEFAULT NULL,
  `email_usuario` varchar(100) DEFAULT NULL,
  `senha_usuario` varchar(255) DEFAULT NULL,
  `data_registro_usuario` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `email_usuario`, `senha_usuario`, `data_registro_usuario`) VALUES
(76, 'Thiago', 'thiago@unibrasil.com', '$2y$10$nGdwlJuWEZiCanHtmpPWxePWf7mEK1xYDe2FBYLEuGxLxQIWpY3aO', '2024-06-02 16:37:55'),
(93, 'eduardo', 'eduardo@unibrasil.com', '$2y$10$vQiXiortbArvYfaW23kHieEq8AztgEiiqhvz5Fyq1bN4sRzDOWIF6', '2024-06-02 16:38:44'),
(23800, 'lucas', 'lucas@unibrasil.com', '$2y$10$Oh2Sh7Rtpxu2QkdnKb/DMOQ.qQK.xo8rnu.VDF/XUMniUdERX5ePe', '2024-06-03 00:25:31');

-- --------------------------------------------------------

--
-- Estrutura para tabela `venda`
--

CREATE TABLE `venda` (
  `id_venda` int(11) NOT NULL,
  `id_carro_venda` int(11) NOT NULL,
  `quantidade_venda` int(11) DEFAULT NULL,
  `data_venda` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `carro`
--
ALTER TABLE `carro`
  ADD PRIMARY KEY (`id_carro`);

--
-- Índices de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`cnpj_fornecedor`);

--
-- Índices de tabela `peca`
--
ALTER TABLE `peca`
  ADD PRIMARY KEY (`id_peca`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices de tabela `registro_peca`
--
ALTER TABLE `registro_peca`
  ADD PRIMARY KEY (`numero`);

--
-- Índices de tabela `relatorio`
--
ALTER TABLE `relatorio`
  ADD PRIMARY KEY (`id_relatorio`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Índices de tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id_venda`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carro`
--
ALTER TABLE `carro`
  MODIFY `id_carro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `relatorio`
--
ALTER TABLE `relatorio`
  MODIFY `id_relatorio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23801;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1313131314;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
