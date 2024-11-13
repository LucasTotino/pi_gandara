--
-- Estrutura para tabela `agendamento_plantacao`
--

CREATE TABLE 'agendamento_plantacao'(
    `id` int(11) NOT NULL,
    `nome_plantio` varchar(100),
    `area_plantio` float,
    `data_plantio` date,
    `data_colheita` date,
    `espacamento_mudas` float,
    `fruto` varchar(20)
)

--
-- Estrutura para tabela `medicao_producao`
--

CREATE TABLE 'medicao_producao'(
    `id` int(11) NOT NULL,
    `nome_plantio` varchar(100),--Mesmo que o da tabela acima
    `diametro_fruto` float,
    `praga` date,
    `obs_medicao` varchar(200),
    `espacamento_mudas` float,
    `fruto` varchar(20)
)

--
-- Estrutura para tabela `cadastro_insumo` (solicitação de cadastro de um novo insumo)
--

CREATE TABLE 'cadastro_insumo'(
    `id` int(11) NOT NULL,
    `nome_insumo` varchar(100),--Mesmo que o da tabela acima
    `cod_ref` float,
    `qtde_utilizada` date,
    `unidade` varchar(20),
    `prazo_util` float,
)
