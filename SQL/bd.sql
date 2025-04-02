-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17/07/2024 às 20:19
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
  `quantidade_carro` int(11) NOT NULL DEFAULT 1,
  `lote_carro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `carro`
--

INSERT INTO `carro` (`id_carro`, `modelo_carro`, `ano_fabricacao_carro`, `cor_carro`, `numero_chassi_carro`, `preco_carro`, `quantidade_carro`, `lote_carro`) VALUES
(104, 'Mustang', 2023, 'preto', '488868956555', 125800.00, 1, 55);

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

--
-- Despejando dados para a tabela `fornecedor`
--

INSERT INTO `fornecedor` (`cnpj_fornecedor`, `nome_fornecedor`, `email_fornecedor`, `endereco_fornecedor`) VALUES
(2147483647, 'PeçasMotors', 'fornecedor@entrega.com', 'rua da entrega, 123');

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

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `nome_produto`, `cor_produto`, `preco_produto`, `ano_fabricacao_produto`, `quantidade_produto`) VALUES
(28, 'Astra', 'verde', 125000.00, 2020, 3);

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
  `data_venda` date DEFAULT NULL,
  `valor_venda` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `venda`
--

INSERT INTO `venda` (`id_venda`, `id_carro_venda`, `quantidade_venda`, `data_venda`, `valor_venda`) VALUES
(1313131314, 3, 5, '2021-12-18', 456000),
(1313131315, 4, 5, '2024-08-05', 456000),
(1313131316, 7, 8, '2020-02-20', 1200000),
(1313131317, 15, 2, '2020-02-20', 400000);

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
  MODIFY `id_carro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23801;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1313131318;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
