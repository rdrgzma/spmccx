-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Tempo de geração: 14-Dez-2022 às 07:28
-- Versão do servidor: 8.0.30
-- versão do PHP: 8.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistemadoc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `autorizacoes`
--

CREATE TABLE `autorizacoes` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `cadastro_id` bigint UNSIGNED DEFAULT NULL,
  `autorizacao` enum('Capão da Canoa','Xangri-lá','pendente') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pendente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `autorizacoes`
--

INSERT INTO `autorizacoes` (`id`, `user_id`, `cadastro_id`, `autorizacao`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Xangri-lá', '2022-12-14 01:13:01', '2022-12-14 01:13:01'),
(2, NULL, 2, 'Capão da Canoa', '2022-12-14 04:05:45', '2022-12-14 04:05:45');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastros`
--

CREATE TABLE `cadastros` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_associacao` date NOT NULL DEFAULT '2022-12-13',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mae` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_nascimento` date NOT NULL,
  `sexo` enum('masculino','feminino') COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_civil` enum('solteiro(a)','casado(a)','divorciado(a)','viuvo(a)') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nacionalidade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'brasileiro(a)',
  `naturalidade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ativo` enum('sim','nao') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'sim',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `cadastros`
--

INSERT INTO `cadastros` (`id`, `user_id`, `nome`, `data_associacao`, `email`, `telefone`, `celular`, `mae`, `pai`, `rg`, `cpf`, `pis`, `data_nascimento`, `sexo`, `estado_civil`, `nacionalidade`, `naturalidade`, `ativo`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Márcio Alexandre Rodriguez de Rodrigues', '2022-12-13', 'rdrgzma@hotmail.com', '+5551989150035', '51996863676', 'Nome da mãe', 'Nome do pai', '1058930999', '69668361091', '444444', '2022-12-21', 'masculino', 'solteiro(a)', 'Brasileira', 'Porto Alegre', 'sim', '2022-12-14 01:12:08', '2022-12-14 01:12:08'),
(2, NULL, 'Vila Gold', '2022-12-08', 'vila@email.com', '5196863676', '51996863676', 'Nome da mãe', 'Nome do pai', '1058930999', '69668361091', '444444', '2022-12-28', 'feminino', 'solteiro(a)', 'Brasileira', 'Porto Alegre', 'nao', '2022-12-14 04:05:14', '2022-12-14 04:05:14'),
(3, NULL, 'Dental Max', '2022-12-07', 'dentalmax111@eamil.com', '5196863676', '(55) 55555-5555', 'Nome da mãe', 'Nome do pai', '1058930999', '69668361091', '444444', '2022-12-21', 'masculino', 'solteiro(a)', 'Brasileira', 'Porto Alegre', 'sim', '2022-12-14 06:23:49', '2022-12-14 06:23:49'),
(4, 5, 'Vila Gold assoc', '2023-01-07', 'vila12@email.com', '5196863676', NULL, 'Nome da mãe', NULL, '111111111111111111', '6968361091', '444444', '2022-12-21', 'masculino', 'solteiro(a)', 'Brasileira', 'Porto Alegre', 'sim', '2022-12-14 06:28:23', '2022-12-14 06:28:23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `convenios`
--

CREATE TABLE `convenios` (
  `id` bigint UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnpj` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ativo` enum('sim','nao') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'sim',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `convenios`
--

INSERT INTO `convenios` (`id`, `nome`, `cnpj`, `user_id`, `email`, `telefone`, `celular`, `cpf`, `ativo`, `created_at`, `updated_at`) VALUES
(1, 'Dental Max', '33.333.333/3333-33', 2, 'dentalmax@eamil.com', '5196863676', '51996863676', '69668361091', 'sim', '2022-12-14 04:01:15', '2022-12-14 04:01:15'),
(2, 'Vila Gold', '22.222.222/2222-22', 3, 'vila@email.com', '5196863676', '51996863676', '69668361091', 'sim', '2022-12-14 04:03:48', '2022-12-14 04:03:48'),
(3, 'Vila Goldparceiro', NULL, 6, 'vila122@email.com', '5196863676', NULL, '69668361091', 'sim', '2022-12-14 07:02:23', '2022-12-14 07:02:23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dependentes`
--

CREATE TABLE `dependentes` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `cadastro_id` bigint UNSIGNED DEFAULT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parentesco` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_nascimento` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `dependentes`
--

INSERT INTO `dependentes` (`id`, `user_id`, `cadastro_id`, `nome`, `parentesco`, `data_nascimento`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Márcio Alexandre Rodriguez de Rodrigues', 'filho', '2022-12-07', '2022-12-14 01:12:56', '2022-12-14 01:12:56'),
(2, NULL, 1, 'Marcio Rodriguez', 'filho', '2022-12-31', '2022-12-14 01:12:56', '2022-12-14 01:12:56');

-- --------------------------------------------------------

--
-- Estrutura da tabela `documentos`
--

CREATE TABLE `documentos` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arquivo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecos`
--

CREATE TABLE `enderecos` (
  `id` bigint UNSIGNED NOT NULL,
  `logradouro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complemento` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bairro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `cadastro_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `enderecos`
--

INSERT INTO `enderecos` (`id`, `logradouro`, `numero`, `complemento`, `bairro`, `cep`, `cidade`, `estado`, `user_id`, `cadastro_id`, `created_at`, `updated_at`) VALUES
(1, 'Rua', '6', NULL, 'Lomba do Pinheiro', '000000', 'Porto Alegre', 'RS', NULL, 1, '2022-12-14 01:12:18', '2022-12-14 01:12:18'),
(2, 'Joao de Oliveira Remião 1770', '3201', '3201', 'Lomba do Pinheiro', '91550-000', 'Porto Alegre', 'RS', NULL, 2, '2022-12-14 04:05:23', '2022-12-14 04:05:23'),
(3, 'Rua', '6', NULL, 'Lomba do Pinheiro', '000000', 'Porto Alegre', 'RS', NULL, 3, '2022-12-14 06:26:04', '2022-12-14 06:26:04'),
(4, 'Rua', '6', NULL, 'Lomba do Pinheiro', '00001', 'Porto Alegre', 'MS', NULL, 4, '2022-12-14 06:28:46', '2022-12-14 06:28:46');

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `matriculas`
--

CREATE TABLE `matriculas` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `cadastro_id` bigint UNSIGNED DEFAULT NULL,
  `matricula1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cidade1` enum('Capão da Canoa','Xangri-lá') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_admissao1` date DEFAULT NULL,
  `matricula2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cidade2` enum('Capão da Canoa','Xangri-lá') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_admissao2` date DEFAULT NULL,
  `matricula3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cidade3` enum('Capão da Canoa','Xangri-lá') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_admissao3` date DEFAULT NULL,
  `matricula4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cidade4` enum('Capão da Canoa','Xangri-lá') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_admissao4` date DEFAULT NULL,
  `turnos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cargo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel_comercial` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_comercial` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `funcao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `matriculas`
--

INSERT INTO `matriculas` (`id`, `user_id`, `cadastro_id`, `matricula1`, `cidade1`, `data_admissao1`, `matricula2`, `cidade2`, `data_admissao2`, `matricula3`, `cidade3`, `data_admissao3`, `matricula4`, `cidade4`, `data_admissao4`, `turnos`, `cargo`, `tel_comercial`, `email_comercial`, `funcao`, `area`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 1, '00000', 'Capão da Canoa', '2022-11-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Manhã', NULL, '+5551996863676', 'rdrgzma45@hotmail.com', 'Professor(a) anos iniciais', NULL, '2022-12-14 01:12:34', '2022-12-14 01:12:34', NULL),
(2, NULL, 2, '00000', 'Capão da Canoa', '2022-12-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Manhã', NULL, NULL, NULL, 'Professor(a) anos iniciais', NULL, '2022-12-14 04:05:36', '2022-12-14 04:05:36', NULL),
(3, NULL, 3, '00000', 'Xangri-lá', '2022-11-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Manhã', NULL, NULL, NULL, 'Professor(a) anos iniciais', NULL, '2022-12-14 06:26:15', '2022-12-14 06:26:15', NULL),
(4, NULL, 4, '00000', 'Capão da Canoa', '2022-11-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Manhã', NULL, NULL, NULL, 'Professor(a) anos iniciais', NULL, '2022-12-14 06:28:57', '2022-12-14 06:28:57', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_30_235656_create_cadastros_table', 1),
(6, '2022_03_31_000615_create_dependentes_table', 1),
(7, '2022_03_31_060002_create_documentos_table', 1),
(8, '2022_08_15_104325_create_matricula_table', 1),
(9, '2022_08_21_212145_create_table_endereco', 1),
(10, '2022_08_21_212424_create_table_autorizacao', 1),
(11, '2022_12_13_184640_create_table_convenios', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_associacao` date DEFAULT NULL,
  `role` enum('Administrador(a)','Associado(a)','Convenio') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Associado(a)',
  `status` enum('Ativo','Inativo','Aguardando','Pendente') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aguardando',
  `telefone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cadastro_id` bigint UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `data_associacao`, `role`, `status`, `telefone`, `cadastro_id`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Administrador Sistema', 'admin@admin.com', NULL, '$2y$10$Ux0F68ZjsWw.WE94Fx.kheC25nSCpjbQOJL4gk2.syQ5WEZveTDhy', NULL, 'Administrador(a)', 'Aguardando', NULL, NULL, NULL, '2022-12-14 01:10:24', '2022-12-14 01:10:24', NULL),
(2, 'Dental Max', 'dentalmax@eamil.com', NULL, '$2y$10$XdC232GS5uCqX2nZ.p.aD.EbPolqZpTW2WNKRgfnSkw2F9UAI23lK', NULL, 'Convenio', 'Aguardando', NULL, NULL, NULL, '2022-12-14 04:01:15', '2022-12-14 04:01:15', NULL),
(3, 'Vila Gold', 'vila@email.com', NULL, '$2y$10$KkcnKwT6ufrk1Lo6DbsOPuKqskq89O0JPH6ebTZjQa9xPv3nFVMwm', NULL, 'Convenio', 'Aguardando', NULL, NULL, NULL, '2022-12-14 04:03:48', '2022-12-14 04:03:48', NULL),
(4, 'Dental Max', 'dentalmax111@eamil.com', NULL, '$2y$10$cEyPqDSSOLyMwLdEjFOf5O2e.2imFQWKncT0h.EtyKKT64JutYtre', NULL, 'Associado(a)', 'Aguardando', NULL, NULL, NULL, '2022-12-14 06:23:49', '2022-12-14 06:23:49', NULL),
(5, 'Vila Gold assoc', 'vila12@email.com', NULL, '$2y$10$DyO/Ige9FDdPQ7kpz.xi5.mnyHLJZEtffGaFKSvgIcJQQYOhfPqfu', NULL, 'Associado(a)', 'Aguardando', NULL, NULL, NULL, '2022-12-14 06:28:23', '2022-12-14 06:28:23', NULL),
(6, 'Vila Goldparceiro', 'vila122@email.com', NULL, '$2y$10$XI1oE67/T06rfqoWl67E6eXeez7ruP.j5ZO3TOrGRDJHJZxSHfqS2', NULL, 'Convenio', 'Aguardando', NULL, NULL, NULL, '2022-12-14 07:02:23', '2022-12-14 07:02:23', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `autorizacoes`
--
ALTER TABLE `autorizacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `autorizacoes_user_id_foreign` (`user_id`),
  ADD KEY `autorizacoes_cadastro_id_foreign` (`cadastro_id`);

--
-- Índices para tabela `cadastros`
--
ALTER TABLE `cadastros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cadastros_user_id_foreign` (`user_id`);

--
-- Índices para tabela `convenios`
--
ALTER TABLE `convenios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `convenios_user_id_foreign` (`user_id`);

--
-- Índices para tabela `dependentes`
--
ALTER TABLE `dependentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dependentes_user_id_foreign` (`user_id`),
  ADD KEY `dependentes_cadastro_id_foreign` (`cadastro_id`);

--
-- Índices para tabela `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documentos_user_id_foreign` (`user_id`);

--
-- Índices para tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enderecos_user_id_foreign` (`user_id`),
  ADD KEY `enderecos_cadastro_id_foreign` (`cadastro_id`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices para tabela `matriculas`
--
ALTER TABLE `matriculas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matriculas_user_id_foreign` (`user_id`),
  ADD KEY `matriculas_cadastro_id_foreign` (`cadastro_id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices para tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `autorizacoes`
--
ALTER TABLE `autorizacoes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cadastros`
--
ALTER TABLE `cadastros`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `convenios`
--
ALTER TABLE `convenios`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `dependentes`
--
ALTER TABLE `dependentes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `matriculas`
--
ALTER TABLE `matriculas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `autorizacoes`
--
ALTER TABLE `autorizacoes`
  ADD CONSTRAINT `autorizacoes_cadastro_id_foreign` FOREIGN KEY (`cadastro_id`) REFERENCES `cadastros` (`id`),
  ADD CONSTRAINT `autorizacoes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `cadastros`
--
ALTER TABLE `cadastros`
  ADD CONSTRAINT `cadastros_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `convenios`
--
ALTER TABLE `convenios`
  ADD CONSTRAINT `convenios_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `dependentes`
--
ALTER TABLE `dependentes`
  ADD CONSTRAINT `dependentes_cadastro_id_foreign` FOREIGN KEY (`cadastro_id`) REFERENCES `cadastros` (`id`),
  ADD CONSTRAINT `dependentes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `documentos`
--
ALTER TABLE `documentos`
  ADD CONSTRAINT `documentos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD CONSTRAINT `enderecos_cadastro_id_foreign` FOREIGN KEY (`cadastro_id`) REFERENCES `cadastros` (`id`),
  ADD CONSTRAINT `enderecos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `matriculas`
--
ALTER TABLE `matriculas`
  ADD CONSTRAINT `matriculas_cadastro_id_foreign` FOREIGN KEY (`cadastro_id`) REFERENCES `cadastros` (`id`),
  ADD CONSTRAINT `matriculas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
