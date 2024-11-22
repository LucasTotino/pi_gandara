-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Nov-2024 às 01:50
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

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
-- Estrutura da tabela `agendamento_plantacao`
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
-- Estrutura da tabela `cadastro_funcionarios`
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
-- Estrutura da tabela `cadastro_insumo`
--

CREATE TABLE `cadastro_insumo` (
  `id` int(11) NOT NULL,
  `nome_insumo` varchar(100) DEFAULT NULL,
  `cod_ref` float DEFAULT NULL,
  `qtde_utilizada` int(11) DEFAULT NULL,
  `unidade` varchar(20) DEFAULT NULL,
  `prazo_util` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_nota_saida`
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
-- Estrutura da tabela `cadastro_vendas`
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
-- Estrutura da tabela `cad_cliente`
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
-- Estrutura da tabela `cad_descontos`
--

CREATE TABLE `cad_descontos` (
  `id_promo` int(10) NOT NULL,
  `nomepromocao` varchar(254) NOT NULL,
  `iniciopromo` date NOT NULL,
  `fimpromo` date NOT NULL,
  `cod_produto` varchar(20) NOT NULL,
  `produto` varchar(254) NOT NULL,
  `porcen_promo` float(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_distribuidor`
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
-- Estrutura da tabela `cad_fornecedor`
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
-- Estrutura da tabela `cad_nat_financeira`
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
-- Estrutura da tabela `cad_nfs`
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
-- Estrutura da tabela `cad_novobanco`
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
-- Estrutura da tabela `cad_produtos`
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
-- Estrutura da tabela `cad_transportadores`
--

CREATE TABLE `cad_transportadores` (
  `id_transportador` int(11) NOT NULL,
  `nometransportador` varchar(254) NOT NULL,
  `cpfcnpj_transportador` varchar(254) NOT NULL,
  `modeloveiculo` varchar(254) NOT NULL,
  `status_transportador` varchar(7) NOT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `volume` varchar(50) DEFAULT NULL,
  `placa` varchar(10) NOT NULL,
  `rntrc` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_venda`
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
-- Estrutura da tabela `cad_vendedores`
--

CREATE TABLE `cad_vendedores` (
  `id_vendedor` int(11) NOT NULL,
  `nomevendedor` varchar(254) NOT NULL,
  `cpfcnpj` varchar(254) NOT NULL,
  `datanasc` date NOT NULL,
  `cidade` varchar(254) NOT NULL,
  `bairro` varchar(254) DEFAULT NULL,
  `rua` varchar(254) DEFAULT NULL,
  `numero` varchar(254) DEFAULT NULL,
  `complemento` varchar(254) DEFAULT NULL,
  `cep` varchar(254) DEFAULT NULL,
  `porcentagem_comissao` float NOT NULL,
  `desconto_possivel` float NOT NULL,
  `tipo_vendedor` varchar(3) NOT NULL,
  `status_vendedor` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cotacao`
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
-- Estrutura da tabela `insumos`
--

CREATE TABLE `insumos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `quantidade` float NOT NULL,
  `unidade` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `medicao_producao`
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
-- Estrutura da tabela `pecas`
--

CREATE TABLE `pecas` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `quantidade` float NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_compra`
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
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome_produto` varchar(100) NOT NULL,
  `quantidade` float NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `data_recebimento` date NOT NULL,
  `numero_nota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacao_produtos`
--

CREATE TABLE `solicitacao_produtos` (
  `id` int(11) NOT NULL,
  `nome_produto` varchar(255) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `tipo_produto` enum('insumos','material_consumo','produto_acabado','produto_semiacabado') NOT NULL,
  `data_solicitacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sol_compra`
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
-- Estrutura da tabela `usuarios`
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
-- Índices para tabela `agendamento_plantacao`
--
ALTER TABLE `agendamento_plantacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cadastro_funcionarios`
--
ALTER TABLE `cadastro_funcionarios`
  ADD PRIMARY KEY (`id_cad_funcionario`);

--
-- Índices para tabela `cadastro_insumo`
--
ALTER TABLE `cadastro_insumo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cadastro_nota_saida`
--
ALTER TABLE `cadastro_nota_saida`
  ADD PRIMARY KEY (`id_cad_nota_saida`),
  ADD UNIQUE KEY `cnpj_saida` (`cnpj_saida`);

--
-- Índices para tabela `cadastro_vendas`
--
ALTER TABLE `cadastro_vendas`
  ADD PRIMARY KEY (`id_cad_venda`);

--
-- Índices para tabela `cad_cliente`
--
ALTER TABLE `cad_cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cad_descontos`
--
ALTER TABLE `cad_descontos`
  ADD PRIMARY KEY (`id_promo`);

--
-- Índices para tabela `cad_distribuidor`
--
ALTER TABLE `cad_distribuidor`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cad_fornecedor`
--
ALTER TABLE `cad_fornecedor`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cad_nat_financeira`
--
ALTER TABLE `cad_nat_financeira`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cad_nfs`
--
ALTER TABLE `cad_nfs`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cad_novobanco`
--
ALTER TABLE `cad_novobanco`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cad_produtos`
--
ALTER TABLE `cad_produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cad_transportadores`
--
ALTER TABLE `cad_transportadores`
  ADD PRIMARY KEY (`id_transportador`);

--
-- Índices para tabela `cad_venda`
--
ALTER TABLE `cad_venda`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cad_vendedores`
--
ALTER TABLE `cad_vendedores`
  ADD PRIMARY KEY (`id_vendedor`);

--
-- Índices para tabela `cotacao`
--
ALTER TABLE `cotacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_fk_sol_compra` (`id_sol_compra`),
  ADD KEY `id_fk_fornecedor_cotacao` (`id_fornecedor`);

--
-- Índices para tabela `insumos`
--
ALTER TABLE `insumos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `medicao_producao`
--
ALTER TABLE `medicao_producao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nome_plantio` (`id_nome_plantio`);

--
-- Índices para tabela `pecas`
--
ALTER TABLE `pecas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pedido_compra`
--
ALTER TABLE `pedido_compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_fk_solicitacao` (`id_solicitacao`),
  ADD KEY `id_fk_fornecedor` (`id_fornecedor`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `solicitacao_produtos`
--
ALTER TABLE `solicitacao_produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sol_compra`
--
ALTER TABLE `sol_compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_fk_produto` (`id_produto`),
  ADD KEY `id_fk_usuario` (`id_usuario`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastro_funcionarios`
--
ALTER TABLE `cadastro_funcionarios`
  MODIFY `id_cad_funcionario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cadastro_nota_saida`
--
ALTER TABLE `cadastro_nota_saida`
  MODIFY `id_cad_nota_saida` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cadastro_vendas`
--
ALTER TABLE `cadastro_vendas`
  MODIFY `id_cad_venda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cad_cliente`
--
ALTER TABLE `cad_cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cad_descontos`
--
ALTER TABLE `cad_descontos`
  MODIFY `id_promo` int(10) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT de tabela `cad_produtos`
--
ALTER TABLE `cad_produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cad_transportadores`
--
ALTER TABLE `cad_transportadores`
  MODIFY `id_transportador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cad_venda`
--
ALTER TABLE `cad_venda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cad_vendedores`
--
ALTER TABLE `cad_vendedores`
  MODIFY `id_vendedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cotacao`
--
ALTER TABLE `cotacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `insumos`
--
ALTER TABLE `insumos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pecas`
--
ALTER TABLE `pecas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedido_compra`
--
ALTER TABLE `pedido_compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `solicitacao_produtos`
--
ALTER TABLE `solicitacao_produtos`
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
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cotacao`
--
ALTER TABLE `cotacao`
  ADD CONSTRAINT `id_fk_fornecedor_cotacao` FOREIGN KEY (`id_fornecedor`) REFERENCES `cad_fornecedor` (`id`),
  ADD CONSTRAINT `id_fk_sol_compra` FOREIGN KEY (`id_sol_compra`) REFERENCES `sol_compra` (`id`);

--
-- Limitadores para a tabela `pedido_compra`
--
ALTER TABLE `pedido_compra`
  ADD CONSTRAINT `id_fk_fornecedor` FOREIGN KEY (`id_fornecedor`) REFERENCES `cad_fornecedor` (`id`),
  ADD CONSTRAINT `id_fk_solicitacao` FOREIGN KEY (`id_solicitacao`) REFERENCES `sol_compra` (`id`);

--
-- Limitadores para a tabela `sol_compra`
--
ALTER TABLE `sol_compra`
  ADD CONSTRAINT `id_fk_produto` FOREIGN KEY (`id_produto`) REFERENCES `cad_produtos` (`id`),
  ADD CONSTRAINT `id_fk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
