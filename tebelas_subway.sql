-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 07/12/2023 às 06:58
-- Versão do servidor: 10.6.15-MariaDB-cll-lve
-- Versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u756913841_subwayteste`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `admlogin`
--

CREATE TABLE `admlogin` (
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `admlogin`
--

INSERT INTO `admlogin` (`email`, `senha`) VALUES
('teste@mail.com', 'Senha@123'),
('severino_tiburcio@outlook.com', 'Senha@123');

-- --------------------------------------------------------

--
-- Estrutura para tabela `app`
--

CREATE TABLE `app` (
  `token` varchar(255) NOT NULL,
  `depositos` varchar(255) NOT NULL,
  `saques` varchar(255) NOT NULL,
  `usuarios` varchar(255) NOT NULL,
  `faturamento_total` varchar(255) NOT NULL,
  `cadastros` varchar(255) NOT NULL,
  `saques_valor` varchar(255) NOT NULL,
  `deposito_min` varchar(255) NOT NULL,
  `saques_min` varchar(255) NOT NULL,
  `aposta_max` varchar(255) NOT NULL,
  `dificuldade_jogo` varchar(255) NOT NULL,
  `aposta_min` varchar(255) NOT NULL,
  `rollover_saque` varchar(255) NOT NULL,
  `taxa_saque` varchar(255) NOT NULL,
  `google_ads_tag` varchar(255) NOT NULL,
  `facebook_ads_tag` varchar(255) NOT NULL,
  `cpa` varchar(255) NOT NULL,
  `deposito_min_cpa` varchar(255) NOT NULL,
  `revenue_share_falso` varchar(255) NOT NULL,
  `max_saque_cpa` varchar(255) NOT NULL,
  `max_por_saque_cpa` varchar(255) NOT NULL,
  `revenue_share` varchar(255) NOT NULL,
  `chance_afiliado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `app`
--

INSERT INTO `app` (`token`, `depositos`, `saques`, `usuarios`, `faturamento_total`, `cadastros`, `saques_valor`, `deposito_min`, `saques_min`, `aposta_max`, `dificuldade_jogo`, `aposta_min`, `rollover_saque`, `taxa_saque`, `google_ads_tag`, `facebook_ads_tag`, `cpa`, `deposito_min_cpa`, `revenue_share_falso`, `max_saque_cpa`, `max_por_saque_cpa`, `revenue_share`, `chance_afiliado`) VALUES
('', '', '', '', '', '', '', '20', '60', '100', 'dificil', '1', '100', '4', '1', '1', '100', '1', '80', '2', '5', '55', '100');

-- --------------------------------------------------------

--
-- Estrutura para tabela `appconfig`
--

CREATE TABLE `appconfig` (
  `id` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `saldo` varchar(255) NOT NULL,
  `jogoteste` varchar(255) NOT NULL,
  `linkafiliado` varchar(255) NOT NULL,
  `depositou` varchar(255) NOT NULL,
  `lead_aff` varchar(255) NOT NULL,
  `leads_ativos` varchar(255) NOT NULL,
  `rollover1` varchar(255) NOT NULL,
  `plano` varchar(255) NOT NULL,
  `demo` varchar(255) NOT NULL,
  `bloc` varchar(255) NOT NULL,
  `sacou` varchar(255) NOT NULL,
  `indicados` varchar(255) NOT NULL,
  `saldo_comissao` varchar(255) NOT NULL,
  `percas` varchar(255) NOT NULL,
  `ganhos` varchar(255) NOT NULL,
  `cpa` varchar(255) NOT NULL,
  `cpafake` varchar(255) NOT NULL,
  `jogo_demo` varchar(255) NOT NULL,
  `comissaofake` varchar(255) NOT NULL,
  `saldo_cpa` varchar(255) NOT NULL,
  `primeiro_deposito` varchar(255) NOT NULL,
  `status_primeiro_deposito` varchar(255) NOT NULL,
  `cont_cpa` varchar(255) NOT NULL,
  `data_cadastro` varchar(255) NOT NULL,
  `afiliado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `appconfig`
--

INSERT INTO `appconfig` (`id`, `nome`, `email`, `senha`, `cpf`, `telefone`, `saldo`, `jogoteste`, `linkafiliado`, `depositou`, `lead_aff`, `leads_ativos`, `rollover1`, `plano`, `demo`, `bloc`, `sacou`, `indicados`, `saldo_comissao`, `percas`, `ganhos`, `cpa`, `cpafake`, `jogo_demo`, `comissaofake`, `saldo_cpa`, `primeiro_deposito`, `status_primeiro_deposito`, `cont_cpa`, `data_cadastro`, `afiliado`) VALUES
('1', '', 'jeffex@mail.com', 'senha@123', '', '11923221122', '0', '1', 'https://jogosubwaysurf.com/cadastrar/?aff=1', '', '', '', '', '20', '', '', '', '0', '0', '', '', '', '', '', '', '', '', '', '', '06-12-2023 18:15', ''),
('123', '', 'teste2', '132', '', '123', '0', '1', 'https://subwaypay.website/cadastrar/cadastro/?aff=123', '', '', '', '', '20', '', '', '', '0', '0', '', '', '', '', '', '', '', '', '', '', '07-12-2023 03:46', ''),
('2', '', 'teste1@gmail.com', '123', '', '123', '0', '1', 'https://jogosubwaysurf.com/cadastrar/?aff=2', '', '1', '', '', '20', '', '', '', '0', '0', '', '', '', '', '', '', '', '', '', '', '07-12-2023 01:33', ''),
('3', '', 'tesste', 'teste', '', 'teste', '0', '1', 'https://jogosubwaysurf.com/cadastrar/?aff=3', '', '1', '', '', '20', '', '', '', '0', '0', '', '', '', '', '', '', '', '', '', '', '07-12-2023 02:46', ''),
('4', '', 'severino_tiburcio@outlook.com', '123', '', '81994298684', '0', '1', 'https://jogosubwaysurf.com/cadastrar/?aff=4', '', '3', '', '', '20', '', '', '', '0', '0', '', '', '', '', '', '', '', '', '', '', '07-12-2023 02:57', ''),
('5', '', 'tetete', '123', '', '123', '0', '1', 'https://jogosubwaysurf.com/cadastrar/?aff=5', '', '4', '', '', '20', '', '', '', '0', '0', '', '', '', '', '', '', '', '', '', '', '07-12-2023 03:43', ''),
('6', '', '231321', '123123', '', '123123', '0', '1', 'https://jogosubwaysurf.com/cadastrar/?aff=6', '', '', '', '', '20', '', '', '', '0', '0', '', '', '', '', '', '', '', '', '', '', '07-12-2023 03:49', ''),
('7', '', 'teste123123', '1231231Q12Q', '', '123123', '0', '1', 'subwaypay.website/cadastrar/?aff=7', '', '', '', '', '20', '', '', '', '0', '0', '', '', '', '', '', '', '', '', '', '', '07-12-2023 03:50', ''),
('8', '', 'QWEQWEQWE', 'QWEQWE', '', 'QWEQWEQW', '0', '1', 'subwaypay.website/cadastrar/?aff=8', '', '7', '', '', '20', '', '', '', '0', '0', '', '', '', '', '', '', '', '', '', '', '07-12-2023 03:50', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `confirmar_deposito`
--

CREATE TABLE `confirmar_deposito` (
  `email` varchar(255) NOT NULL,
  `externalreference` varchar(255) NOT NULL,
  `valor` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `confirmar_deposito`
--

INSERT INTO `confirmar_deposito` (`email`, `externalreference`, `valor`, `status`, `data`) VALUES
('jeffex@mail.com', '88b891c8-e605-4b0b-8439-ad66c4265b4e', '25', 'PAID_OUT', '06/12/2023 18:27'),
('jeffex@mail.com', 'faa24960-0b1d-40c1-98b9-b4818df55877', '25', 'WAITING_FOR_APPROVAL', '06/12/2023 23:24'),
('jeffex@mail.com', 'bf318697-5965-4f55-a908-f7f6f64cd557', '25', 'PAID_OUT', '06/12/2023 23:25'),
('jeffex@mail.com', '0841b09d-626e-4aa0-b0c8-c8d273b8619e', '25', 'WAITING_FOR_APPROVAL', '06/12/2023 23:42'),
('teste1@gmail.com', '2feded71-d7be-4769-a42c-d98053f521eb', '25', 'WAITING_FOR_APPROVAL', '07/12/2023 02:57'),
('teste1@gmail.com', '7f9b6b7e-cbc7-4c3d-9e34-9106a189c4d3', '25', 'WAITING_FOR_APPROVAL', '07/12/2023 03:50'),
('teste1@gmail.com', 'e07360ef-91a2-40e9-b27d-b0476cf739eb', '25', 'WAITING_FOR_APPROVAL', '07/12/2023 03:53');

-- --------------------------------------------------------

--
-- Estrutura para tabela `game`
--

CREATE TABLE `game` (
  `email` varchar(255) NOT NULL,
  `entry_value` varchar(255) NOT NULL,
  `out_value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `gateway`
--

CREATE TABLE `gateway` (
  `client_id` varchar(255) NOT NULL,
  `client_secret` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `gateway`
--

INSERT INTO `gateway` (`client_id`, `client_secret`) VALUES
('severino64_1697651537117', '6a75fd262ffd3baedb7fb2b9bf9bf097d604db467aee218c63d0dba2c2afbfd8e134663b62974cac992609f2be45572f');

-- --------------------------------------------------------

--
-- Estrutura para tabela `ggr`
--

CREATE TABLE `ggr` (
  `token` varchar(255) NOT NULL,
  `ggr_taxa` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL,
  `situacao` varchar(255) NOT NULL,
  `total_ganhos` varchar(255) NOT NULL,
  `percas_24h` varchar(255) NOT NULL,
  `percas_1m` varchar(255) NOT NULL,
  `total_percas` varchar(255) NOT NULL,
  `ggr_24h` varchar(255) NOT NULL,
  `ggr_1m` varchar(255) NOT NULL,
  `credito_ggr` varchar(255) NOT NULL,
  `debito_ggr` varchar(255) NOT NULL,
  `ggr_pago` varchar(255) NOT NULL,
  `status_ggr` varchar(255) NOT NULL,
  `ggr_total` varchar(255) NOT NULL,
  `saldo_inserido` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pix`
--

CREATE TABLE `pix` (
  `id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pix_deposito`
--

CREATE TABLE `pix_deposito` (
  `id` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `planos`
--

CREATE TABLE `planos` (
  `nome` varchar(255) NOT NULL,
  `cpa` varchar(255) NOT NULL,
  `rev` varchar(255) NOT NULL,
  `indicacao` varchar(255) NOT NULL,
  `valor_saque_maximo` varchar(255) NOT NULL,
  `saque_diario` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL,
  `situacao` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `saques`
--

CREATE TABLE `saques` (
  `email` varchar(255) NOT NULL,
  `externalreference` varchar(255) NOT NULL,
  `valor` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `token`
--

CREATE TABLE `token` (
  `email` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `admlogin`
--
ALTER TABLE `admlogin`
  ADD KEY `idx_email` (`email`);

--
-- Índices de tabela `appconfig`
--
ALTER TABLE `appconfig`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_lead_aff` (`lead_aff`);

--
-- Índices de tabela `confirmar_deposito`
--
ALTER TABLE `confirmar_deposito`
  ADD KEY `idx_email` (`email`),
  ADD KEY `idx_externalreference` (`externalreference`);

--
-- Índices de tabela `game`
--
ALTER TABLE `game`
  ADD KEY `idx_email` (`email`);

--
-- Índices de tabela `ggr`
--
ALTER TABLE `ggr`
  ADD PRIMARY KEY (`token`),
  ADD KEY `idx_data` (`data`);

--
-- Índices de tabela `pix`
--
ALTER TABLE `pix`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pix_deposito`
--
ALTER TABLE `pix_deposito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_email` (`email`);

--
-- Índices de tabela `planos`
--
ALTER TABLE `planos`
  ADD PRIMARY KEY (`nome`),
  ADD KEY `idx_data` (`data`);

--
-- Índices de tabela `saques`
--
ALTER TABLE `saques`
  ADD KEY `idx_email` (`email`),
  ADD KEY `idx_externalreference` (`externalreference`);

--
-- Índices de tabela `token`
--
ALTER TABLE `token`
  ADD KEY `idx_email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pix`
--
ALTER TABLE `pix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
