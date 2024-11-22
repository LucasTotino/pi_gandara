-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 20/11/2024 às 00:13
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_ceres`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `agendamento_plantacao`
--

CREATE TABLE `agendamento_plantacao` (
  `id` int(11) NOT NULL,
  `nome_plantio` varchar(100) DEFAULT NULL,
  `area_plantio` float DEFAULT NULL,
  `data_plantio` date DEFAULT NULL,
  `data_colheita` date DEFAULT NULL,
  `espacamento_mudas` float DEFAULT NULL,
  `fruto` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro_descontos`
--

CREATE TABLE `cadastro_descontos` (
  `id_cad_desconto` int(11) NOT NULL,
  `nome_promo` varchar(254) NOT NULL,
  `inicio_promo` date NOT NULL,
  `termino_promo` date NOT NULL,
  `codigo_promo` float NOT NULL,
  `produto_promo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro_funcionarios`
--

CREATE TABLE `cadastro_funcionarios` (
  `id_cad_funcionario` int(11) NOT NULL,
  `fpNome` varchar(255) NOT NULL,
  `fpRg` varchar(20) NOT NULL,
  `fpCpf` varchar(14) NOT NULL,
  `fpEndereco` varchar(255) NOT NULL,
  `fpNumeroCasa` varchar(10) NOT NULL,
  `fpEstado` varchar(2) NOT NULL,
  `fpCidade` varchar(100) NOT NULL,
  `fpCep` varchar(10) NOT NULL,
  `fpEtnia` varchar(50) NOT NULL,
  `fpGenero` varchar(10) NOT NULL,
  `fpDataNascimento` date NOT NULL,
  `fpEmail` varchar(255) NOT NULL,
  `fpTelefone` varchar(15) DEFAULT NULL,
  `fpCelular` varchar(15) NOT NULL,
  `fpDependentes` int(11) NOT NULL,
  `fpIdadeDependentes` varchar(50) NOT NULL,
  `fpEstadoCivil` varchar(20) NOT NULL,
  `fpCargo` varchar(100) NOT NULL,
  `fpSetor` varchar(100) NOT NULL,
  `fpDataAdimissao` date NOT NULL,
  `fpDataDemissao` date DEFAULT NULL,
  `fpSalarioBruto` float NOT NULL,
  `fpMetodoPagamento` varchar(50) NOT NULL,
  `fpChavePix` varchar(50) DEFAULT NULL,
  `fpAgenciaConta` varchar(20) DEFAULT NULL,
  `fpObservacoes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro_insumo`
--

CREATE TABLE `cadastro_insumo` (
  `id` int(11) NOT NULL,
  `nome_insumo` varchar(100) DEFAULT NULL,
  `cod_ref` float DEFAULT NULL,
  `qtde_utilizada` int(11) DEFAULT NULL,
  `unidade` varchar(20) DEFAULT NULL,
  `prazo_util` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro_nota_saida`
--

CREATE TABLE `cadastro_nota_saida` (
  `id_cad_nota_saida` int(11) NOT NULL,
  `cnpj_saida` float NOT NULL,
  `ie_saida` float NOT NULL,
  `cep_saida` float NOT NULL,
  `rua_saida` varchar(255) NOT NULL,
  `estado_saida` char(2) NOT NULL,
  `bairro_saida` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro_representantes`
--

CREATE TABLE `cadastro_representantes` (
  `id_cad_representante` int(11) NOT NULL,
  `nomerazao_repre` varchar(255) NOT NULL,
  `cpfoucnpj_repre` float NOT NULL,
  `nascimento_repre` date NOT NULL,
  `cidade_repre` char(50) NOT NULL,
  `bairro_repre` char(50) NOT NULL,
  `rua_repre` varchar(255) NOT NULL,
  `numero_repre` float NOT NULL,
  `complemento_repre` char(50) DEFAULT NULL,
  `cep_repre` float NOT NULL,
  `comissao_repre` float NOT NULL,
  `maxdesconto_repre` float NOT NULL,
  `status_repre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro_transportadores`
--

CREATE TABLE `cadastro_transportadores` (
  `id_cad_transportadora` int(11) NOT NULL,
  `nomerazao_transp` varchar(255) NOT NULL,
  `cpfoucnpj_transp` float NOT NULL,
  `modeloveiculo_transp` char(50) NOT NULL,
  `placa_transp` varchar(20) NOT NULL,
  `status_transp` char(1) NOT NULL,
  `estado_transp` char(2) NOT NULL,
  `volume_transp` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro_vendas`
--

CREATE TABLE `cadastro_vendas` (
  `id_cad_venda` int(11) NOT NULL,
  `razaosocial_vend` varchar(255) NOT NULL,
  `tipovenda` char(1) NOT NULL,
  `data_vend` date NOT NULL,
  `codigo_vend` float NOT NULL,
  `produto_vend` varchar(255) NOT NULL,
  `quantidade_vend` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro_vendedores`
--

CREATE TABLE `cadastro_vendedores` (
  `id_cad_vendedores` int(11) NOT NULL,
  `nomerazao_vdores` varchar(255) NOT NULL,
  `cpfoucnpj_vdores` float NOT NULL,
  `nascimento_vdores` date NOT NULL,
  `cidade_vdores` char(50) NOT NULL,
  `bairro_vdores` char(50) NOT NULL,
  `rua_vdores` varchar(255) NOT NULL,
  `numero_vdores` float NOT NULL,
  `complemento_vdores` char(50) DEFAULT NULL,
  `cep_vdores` float NOT NULL,
  `comissao_vdores` float NOT NULL,
  `maxdesconto_vdores` float NOT NULL,
  `status_vdores` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cad_cliente`
--

CREATE TABLE `cad_cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `cpf_cnpj` varchar(18) DEFAULT NULL,
  `tipo_cliente` int(11) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `logradouro` varchar(150) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `complemento` varchar(20) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cidade` varchar(150) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cad_distribuidor`
--

CREATE TABLE `cad_distribuidor` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `cpf_cnpj` varchar(18) DEFAULT NULL,
  `veiculo` varchar(100) DEFAULT NULL,
  `placa` varchar(7) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cad_fornecedor`
--

CREATE TABLE `cad_fornecedor` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `cpf_cnpj` varchar(18) DEFAULT NULL,
  `tipo_fornecedor` int(11) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `celular` varchar(14) DEFAULT NULL,
  `logradouro` varchar(150) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `complemento` varchar(20) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cidade` varchar(150) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cad_nat_financeira`
--

CREATE TABLE `cad_nat_financeira` (
  `id` int(11) NOT NULL,
  `cod_nat` varchar(6) NOT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  `cod_pai` varchar(6) DEFAULT NULL,
  `tipo_nat` int(11) DEFAULT NULL,
  `data_inclusao` date DEFAULT NULL,
  `mov_bancaria` int(11) DEFAULT NULL,
  `uso_nat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cad_nfs`
--

CREATE TABLE `cad_nfs` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `IE` varchar(20) DEFAULT NULL,
  `cep` varchar(6) DEFAULT NULL,
  `rua` varchar(150) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cidade` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cad_novobanco`
--

CREATE TABLE `cad_novobanco` (
  `id` int(11) NOT NULL,
  `nomeInstituicao` varchar(100) DEFAULT NULL,
  `numeroConta` varchar(20) DEFAULT NULL,
  `codBanco` char(3) DEFAULT NULL,
  `tipoConta` varchar(15) DEFAULT NULL,
  `moeda` varchar(3) DEFAULT NULL,
  `anotacoes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cad_produtos`
--

CREATE TABLE `cad_produtos` (
  `id` int(11) NOT NULL,
  `produto` varchar(150) NOT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  `cod_produto` varchar(6) NOT NULL,
  `unidade` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cad_venda`
--

CREATE TABLE `cad_venda` (
  `id` int(11) NOT NULL,
  `id_vendedor` int(11) DEFAULT NULL,
  `tipo_venda` int(11) DEFAULT NULL,
  `data_venda` date DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `qtd` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cotacao`
--

CREATE TABLE `cotacao` (
  `id` int(11) NOT NULL,
  `id_sol_compra` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `qtd` float DEFAULT NULL,
  `data_entrega` date DEFAULT NULL,
  `u_medida` varchar(10) DEFAULT NULL,
  `id_fornecedor` int(11) DEFAULT NULL,
  `observacoes` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `medicao_producao`
--

CREATE TABLE `medicao_producao` (
  `id` int(11) NOT NULL,
  `id_nome_plantio` int(11) NOT NULL,
  `diametro_fruto` float DEFAULT NULL,
  `praga` date DEFAULT NULL,
  `obs_medicao` varchar(200) DEFAULT NULL,
  `espacamento_mudas` float DEFAULT NULL,
  `fruto` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido_compra`
--

CREATE TABLE `pedido_compra` (
  `id` int(11) NOT NULL,
  `id_solicitacao` int(11) DEFAULT NULL,
  `id_fornecedor` int(11) DEFAULT NULL,
  `data_pedido` date DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `qtd` float DEFAULT NULL,
  `pre_compra` date DEFAULT NULL,
  `data_u_compra` date DEFAULT NULL,
  `historico` varchar(50) DEFAULT NULL,
  `qtd_baixada` float DEFAULT NULL,
  `valor_baixado` float DEFAULT NULL,
  `saldo_qtd` float DEFAULT NULL,
  `saldo_comprado` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `sol_compra`
--

CREATE TABLE `sol_compra` (
  `id` int(11) NOT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `origem` int(11) DEFAULT NULL,
  `observacao` varchar(200) DEFAULT NULL,
  `qtd` float DEFAULT NULL,
  `data_entrega` date DEFAULT NULL,
  `data_criacao` date DEFAULT NULL,
  `finalidade` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(254) NOT NULL,
  `email` varchar(254) NOT NULL,
  `celular` varchar(21) DEFAULT NULL,
  `data_nascimento` date NOT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `nivel_acesso` tinyint(4) NOT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `endereco` varchar(254) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `complemento` varchar(254) DEFAULT NULL,
  `cidade` varchar(254) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `senha` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `agendamento_plantacao`
--
ALTER TABLE `agendamento_plantacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cadastro_descontos`
--
ALTER TABLE `cadastro_descontos`
  ADD PRIMARY KEY (`id_cad_desconto`);

--
-- Índices de tabela `cadastro_funcionarios`
--
ALTER TABLE `cadastro_funcionarios`
  ADD PRIMARY KEY (`id_cad_funcionario`);

--
-- Índices de tabela `cadastro_insumo`
--
ALTER TABLE `cadastro_insumo`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cadastro_nota_saida`
--
ALTER TABLE `cadastro_nota_saida`
  ADD PRIMARY KEY (`id_cad_nota_saida`),
  ADD UNIQUE KEY `cnpj_saida` (`cnpj_saida`);

--
-- Índices de tabela `cadastro_representantes`
--
ALTER TABLE `cadastro_representantes`
  ADD PRIMARY KEY (`id_cad_representante`),
  ADD UNIQUE KEY `cpfoucnpj_repre` (`cpfoucnpj_repre`);

--
-- Índices de tabela `cadastro_transportadores`
--
ALTER TABLE `cadastro_transportadores`
  ADD PRIMARY KEY (`id_cad_transportadora`),
  ADD UNIQUE KEY `cpfoucnpj_transp` (`cpfoucnpj_transp`);

--
-- Índices de tabela `cadastro_vendas`
--
ALTER TABLE `cadastro_vendas`
  ADD PRIMARY KEY (`id_cad_venda`);

--
-- Índices de tabela `cadastro_vendedores`
--
ALTER TABLE `cadastro_vendedores`
  ADD PRIMARY KEY (`id_cad_vendedores`);

--
-- Índices de tabela `cad_cliente`
--
ALTER TABLE `cad_cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cad_distribuidor`
--
ALTER TABLE `cad_distribuidor`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cad_fornecedor`
--
ALTER TABLE `cad_fornecedor`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cad_nat_financeira`
--
ALTER TABLE `cad_nat_financeira`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cad_nfs`
--
ALTER TABLE `cad_nfs`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cad_novobanco`
--
ALTER TABLE `cad_novobanco`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cad_produtos`
--
ALTER TABLE `cad_produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cad_venda`
--
ALTER TABLE `cad_venda`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cotacao`
--
ALTER TABLE `cotacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_fk_sol_compra` (`id_sol_compra`),
  ADD KEY `id_fk_fornecedor_cotacao` (`id_fornecedor`);

--
-- Índices de tabela `medicao_producao`
--
ALTER TABLE `medicao_producao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nome_plantio` (`id_nome_plantio`);

--
-- Índices de tabela `pedido_compra`
--
ALTER TABLE `pedido_compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_fk_solicitacao` (`id_solicitacao`),
  ADD KEY `id_fk_fornecedor` (`id_fornecedor`);

--
-- Índices de tabela `sol_compra`
--
ALTER TABLE `sol_compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_fk_produto` (`id_produto`),
  ADD KEY `id_fk_usuario` (`id_usuario`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamento_plantacao`
--
ALTER TABLE `agendamento_plantacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cadastro_descontos`
--
ALTER TABLE `cadastro_descontos`
  MODIFY `id_cad_desconto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cadastro_funcionarios`
--
ALTER TABLE `cadastro_funcionarios`
  MODIFY `id_cad_funcionario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cadastro_insumo`
--
ALTER TABLE `cadastro_insumo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cadastro_nota_saida`
--
ALTER TABLE `cadastro_nota_saida`
  MODIFY `id_cad_nota_saida` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cadastro_representantes`
--
ALTER TABLE `cadastro_representantes`
  MODIFY `id_cad_representante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cadastro_transportadores`
--
ALTER TABLE `cadastro_transportadores`
  MODIFY `id_cad_transportadora` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cadastro_vendas`
--
ALTER TABLE `cadastro_vendas`
  MODIFY `id_cad_venda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cadastro_vendedores`
--
ALTER TABLE `cadastro_vendedores`
  MODIFY `id_cad_vendedores` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cad_cliente`
--
ALTER TABLE `cad_cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cad_distribuidor`
--
ALTER TABLE `cad_distribuidor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cad_fornecedor`
--
ALTER TABLE `cad_fornecedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cad_nat_financeira`
--
ALTER TABLE `cad_nat_financeira`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cad_nfs`
--
ALTER TABLE `cad_nfs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cad_novobanco`
--
ALTER TABLE `cad_novobanco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cad_produtos`
--
ALTER TABLE `cad_produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cad_venda`
--
ALTER TABLE `cad_venda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cotacao`
--
ALTER TABLE `cotacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `medicao_producao`
--
ALTER TABLE `medicao_producao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedido_compra`
--
ALTER TABLE `pedido_compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `sol_compra`
--
ALTER TABLE `sol_compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `cotacao`
--
ALTER TABLE `cotacao`
  ADD CONSTRAINT `id_fk_fornecedor_cotacao` FOREIGN KEY (`id_fornecedor`) REFERENCES `cad_fornecedor` (`id`),
  ADD CONSTRAINT `id_fk_sol_compra` FOREIGN KEY (`id_sol_compra`) REFERENCES `sol_compra` (`id`);

--
-- Restrições para tabelas `medicao_producao`
--
ALTER TABLE `medicao_producao`
  ADD CONSTRAINT `medicao_producao_ibfk_1` FOREIGN KEY (`id_nome_plantio`) REFERENCES `agendamento_plantacao` (`id`);

--
-- Restrições para tabelas `pedido_compra`
--
ALTER TABLE `pedido_compra`
  ADD CONSTRAINT `id_fk_fornecedor` FOREIGN KEY (`id_fornecedor`) REFERENCES `cad_fornecedor` (`id`),
  ADD CONSTRAINT `id_fk_solicitacao` FOREIGN KEY (`id_solicitacao`) REFERENCES `sol_compra` (`id`);

--
-- Restrições para tabelas `sol_compra`
--
ALTER TABLE `sol_compra`
  ADD CONSTRAINT `id_fk_produto` FOREIGN KEY (`id_produto`) REFERENCES `cad_produtos` (`id`),
  ADD CONSTRAINT `id_fk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
