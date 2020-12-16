-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Ago-2020 às 00:35
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.5
-- atualizado: 04-Ago-2020 às 19:40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projetocpa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alternativa_resposta`
--

CREATE TABLE `alternativa_resposta` (
  `cod_alternativa_resposta` int(10) NOT NULL,
  `alternativa_resposta` varchar(10) NOT NULL,
  `detalhe` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `alternativa_resposta`
--

INSERT INTO `alternativa_resposta` (`cod_alternativa_resposta`, `alternativa_resposta`, `detalhe`) VALUES
(19, 'CT', 'Concordo Totalmente '),
(20, 'CP', 'Concordo Parcialmente '),
(21, 'DP', 'Discordo Parcialmente  '),
(22, 'DT', 'Discordo Totalmente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dimensao`
--

CREATE TABLE `dimensao` (
  `cod_dimensao` int(11) NOT NULL,
  `titulo` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `dimensao`
--

INSERT INTO `dimensao` (`cod_dimensao`, `titulo`) VALUES
(1, 'Dimensão: Missão Institucional'),
(2, 'Dimensão 2: A política para o ensino, pesquisa e extensão.'),
(3, 'Dimensão 3: Responsabilidade Social'),
(4, 'Dimensão 4:  A comunicação com a sociedade'),
(5, 'Dimensão 5: Políticas de Pessoal'),
(6, 'Dimensão 6: Organização e gestão institucional'),
(7, 'Dimensão 7: Infraestrutura física'),
(8, 'Dimensão 8: Planejamento e avaliação'),
(9, 'Dimensão 9: Atendimento ao estudante');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `detalhe` varchar(60) DEFAULT NULL,
  `cod_perfil` int(11) NOT NULL,
  `tipo_perfil` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`detalhe`, `cod_perfil`, `tipo_perfil`) VALUES
('ADMINISTRADOR DE TODO SISTEMA', 1, 'ADMINISTRADOR'),
('AUXILIAR DO ADMINISTRADOR', 2, 'AUXILIAR'),
('DISCENTES', 3, 'ALUNO'),
('DOSCENTES', 4, 'PROFESSORES');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pergunta`
--

CREATE TABLE `pergunta` (
  `cod_pergunta` int(11) NOT NULL,
  `pergunta` varchar(200) DEFAULT NULL,
  `cod_dimensao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pergunta`
--

INSERT INTO `pergunta` (`cod_pergunta`, `pergunta`, `cod_dimensao`) VALUES
(1, 'Existe uma formulação clara dos objetivos e finalidades da Instituição.', 1),
(2, 'Conheço a estrutura curricular do curso.', 1),
(3, 'O aluno ingressante na Faculdade recebe informações sobre a Instituição e seu funcionamento.', 1),
(4, 'O curso está correspondendo às minhas expectativas.', 2),
(5, 'O coordenador do curso está empenhado no desenvolvimento e na qualidade do curso.', 2),
(6, 'A coordenação encaminha soluções para os problemas surgidos no curso.', 2),
(7, 'Há um bom relacionamento da coordenação com os alunos', 2),
(8, 'Os professores apresentam o plano de ensino no início da disciplina.', 2),
(9, 'Os professores dominam o conteúdo e estão atualizados.', 2),
(10, 'Os professores têm bom relacionamento com os alunos e são abertos ao diálogo.', 2),
(11, 'Os professores são pontuais e assíduos.', 2),
(12, 'A didática dos professores contribui para a aprendizagem.', 2),
(13, 'Os professores incentivam a autonomia intelectual do aluno.', 2),
(14, 'Os professores entregam o resultado das avaliações em tempo hábil.', 2),
(15, 'O conteúdo e carga horária previstos para a disciplina são cumpridos.', 2),
(16, 'O aprofundamento dos conteúdos na disciplina é adequado.', 2),
(17, 'Os recursos didáticos utilizados na disciplina são de boa qualidade.', 2),
(18, 'Há compatibilidade da avaliação da aprendizagem com o conteúdo trabalhado.', 2),
(19, 'Há diversidade de instrumentos de avaliação (provas trabalhos trabalhos de grupo e outros).', 2),
(20, 'O número de avaliações é adequado à quantidade de conteúdos da disciplina.', 2),
(21, 'Existe um bom relacionamento entre os alunos.', 2),
(22, 'As turmas são assíduas às aulas comprometidas e responsáveis.', 2),
(23, 'O material didático indicado para a disciplina é de boa qualidade.', 2),
(24, 'A bibliografia para estudo do conteúdo é disponível na biblioteca.', 2),
(25, 'Estou satisfeito com a aprendizagem decorrente das disciplinas.', 2),
(26, 'Existe uma formulação clara dos objetivos e finalidades da Instituição.', 1),
(27, 'Conheço a estrutura curricular do curso. ', 1),
(28, 'O aluno ingressante na Faculdade recebe informações sobre a Instituição e seu funcionamento.', 1),
(29, 'Existe uma formulação clara dos objetivos e finalidades da Instituição.', 1),
(30, 'Conheço a estrutura curricular do curso. ', 1),
(31, 'O aluno ingressante na Faculdade recebe informações sobre a Instituição e seu funcionamento.', 1),
(32, 'Conheço ou participo de projeto de extensão da FACDF', 2),
(33, 'Tenho conhecimento sobre a realização de palestras seminários feiras e outros eventos do curso.', 2),
(34, 'O Portal da FACDF atende suas necessidades como discentes.', 2),
(35, 'Os conhecimentos adquiridos na sua vida acadêmica têm aplicação prática na vida pessoal ou profissional', 2),
(36, 'Existem ações que favorecem a inclusão e permanência de estudantes em situação econômica desfavorecida na FACDF.', 3),
(37, 'A política institucional favorece a inclusão de pessoas portadoras de necessidades especiais.', 3),
(38, 'Existem ações que promovem iniciativas de incubadoras de empresas empresas juniores captação de recursos.', 3),
(39, 'A comunidade externa tem conhecimento das atividades desenvolvidas pela Instituição.', 4),
(40, 'O sistema de informações internas da FACDF é de boa qualidade e eficiente.', 4),
(41, 'Os professores desempenham suas tarefas com responsabilidade.', 5),
(42, 'Há firmeza e bom senso na condução por parte da Direção-Geral da FACDF.', 6),
(43, 'A Direção Acadêmica demonstra interesse pelas reivindicações e age no sentido de atendê-las.', 6),
(44, 'O sistema de comunicação interna (quadros de avisos) funciona adequadamente.', 6),
(45, 'O setor de ouvidoria da FACDF  funciona adequadamente.', 6),
(46, 'O espaço físico da faculdade está adequado às necessidades da comunidade acadêmica.', 7),
(47, 'As instalações da FACDF oferecem condições adequadas de facilidade de acesso e segurança.', 7),
(48, 'O ambiente das salas de aulas é apropriado quanto à acústica luminosidade e ventilação. ', 7),
(49, 'Os equipamentos dos laboratórios de informática são adequados e em número suficiente.', 7),
(50, 'Os recursos instrucionais (multimídia) são em número suficiente.', 7),
(51, 'A manutenção e conservação das instalações físicas são satisfatórias.', 7),
(52, 'O serviço de biblioteca atende as necessidades da comunidade acadêmica.', 7),
(53, 'A biblioteca dispõe dos livros básicos e periódicos recomendados nas disciplinas.', 7),
(54, 'Conheço a finalidade da CPA - Comissão Própria de Avaliação.', 8),
(55, 'Conheço os integrantes da CPA', 8),
(56, 'Tenho facilidade de contato com os professores  representantes dos docentes membros da CPA', 8),
(57, 'O atendimento na central de atendimento aos alunos  é adequado', 9),
(58, 'O programa de estágio funciona adequadamente.', 9),
(59, 'A qualificação do servidor técnico-administrativo é adequada à função em que atua.', 9),
(234, 'Existe uma formulação clara dos objetivos e finalidades da Instituição.', 1),
(235, 'opaopaoapopa,opaopaoapo', 2),
(236, 'apenas testando', 9),
(237, 'Existe uma formulação, clara dos objetivos e finalidades da Instituição.', 1),
(238, 'Existem ações que favorecem a inclusão e permanência de estudantes em situação econômica desfavorecida na FACDF.', 1),
(239, 'A comunidade externa tem conhecimento das atividades desenvolvidas pela Instituição.', 1),
(240, 'Existem ações que favorecem a inclusão e permanência de estudantes em situação econômica desfavorecida na FACDF.', 2),
(241, 'Há diversidade de instrumentos de avaliação (provas trabalhos trabalhos de grupo e outros).', 2),
(242, 'Existem ações que promovem iniciativas de incubadoras de empresas empresas juniores captação de recursos.', 2),
(243, 'gosta de estudar', 6),
(244, 'apenas um teste', 3),
(245, 'apenas um teste 2', 3),
(246, 'apenas um teste 3', 3),
(247, 'outro teste', 7),
(248, 'nova pergunta', 7),
(249, 'ademais', 7),
(250, 'vai votar em quem', 5),
(251, 'isso é so um teste', 5),
(252, 'nao é nao', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pergunta_questionario`
--

CREATE TABLE `pergunta_questionario` (
  `cod_pergunta_questionario` int(11) NOT NULL,
  `cod_questionario` int(11) NOT NULL,
  `cod_pergunta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pergunta_questionario`
--

INSERT INTO `pergunta_questionario` (`cod_pergunta_questionario`, `cod_questionario`, `cod_pergunta`) VALUES
(39, 60, 1),
(40, 60, 2),
(41, 60, 3),
(42, 60, 4),
(43, 60, 5),
(44, 60, 6),
(45, 60, 7),
(47, 60, 8),
(49, 60, 9),
(50, 60, 10),
(52, 60, 11),
(56, 60, 12),
(57, 60, 13),
(58, 60, 14),
(59, 60, 15),
(60, 60, 16),
(61, 60, 17),
(62, 60, 18),
(63, 60, 19),
(64, 60, 20),
(65, 60, 21),
(66, 60, 22),
(67, 60, 23),
(69, 60, 24),
(71, 60, 25),
(72, 60, 26),
(73, 60, 27),
(74, 60, 28),
(75, 60, 29),
(76, 60, 75),
(77, 60, 31),
(78, 60, 32),
(79, 60, 33),
(80, 60, 34),
(81, 60, 35),
(82, 60, 36),
(83, 60, 37),
(84, 60, 38),
(85, 60, 39),
(86, 60, 40),
(87, 60, 41),
(88, 60, 42),
(89, 60, 43),
(90, 60, 44),
(91, 60, 45),
(92, 60, 46),
(93, 60, 47),
(94, 60, 48),
(95, 60, 49),
(96, 60, 50),
(97, 60, 51),
(98, 60, 52),
(99, 60, 53),
(100, 60, 54),
(101, 60, 55),
(102, 60, 56),
(103, 60, 57),
(104, 60, 58),
(105, 60, 59),
(106, 60, 30),
(189, 60, 188),
(190, 60, 189),
(191, 60, 190),
(192, 60, 191),
(194, 63, 234),
(195, 70, 235),
(196, 60, 236),
(197, 62, 237),
(198, 62, 238),
(199, 62, 239),
(200, 62, 240),
(201, 62, 241),
(202, 62, 242),
(203, 62, 243),
(204, 62, 244),
(205, 62, 245),
(206, 62, 246),
(207, 62, 247),
(208, 62, 248),
(209, 62, 249),
(210, 62, 250),
(211, 62, 251),
(212, 62, 252);

-- --------------------------------------------------------

--
-- Estrutura da tabela `questionario`
--

CREATE TABLE `questionario` (
  `cod_questionario` int(11) NOT NULL,
  `data_cadastramento` datetime DEFAULT NULL,
  `data_encerramento` datetime DEFAULT NULL,
  `detalhe` varchar(200) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `cod_tipo_questionario` int(11) DEFAULT NULL,
  `data_disponibilidade` datetime DEFAULT NULL,
  `status_questionario` tinyint(1) NOT NULL,
  `cod_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `questionario`
--

INSERT INTO `questionario` (`cod_questionario`, `data_cadastramento`, `data_encerramento`, `detalhe`, `nome`, `cod_tipo_questionario`, `data_disponibilidade`, `status_questionario`, `cod_usuario`) VALUES
(60, '2020-07-02 02:23:42', '2020-07-17 18:29:00', 'Questionário destinado aos alunos', 'QUESTIONÁRIO 2021', 3, '2020-07-02 04:09:00', 1, 23),
(62, '2020-07-08 01:55:39', '2020-07-08 06:55:27', 'Questionário destinado aos funcionários', 'QUESTIONÁRIO 2021 FUNCIONARIOS', 4, '2020-07-08 06:55:27', 1, 23),
(63, '2020-07-08 01:56:10', '2020-07-08 06:55:27', 'Questionário destinado aos colaboradores', 'QUESTIONÁRIO 2022', 4, '2020-07-08 06:55:27', 0, 23),
(64, '2020-07-08 01:58:29', '2020-07-08 06:58:20', 'Questionário destinado aos funcionários', 'QUESTIONÁRIO 2022', 3, '2020-07-08 06:58:20', 0, 23);

-- --------------------------------------------------------

--
-- Estrutura da tabela `resposta`
--

CREATE TABLE `resposta` (
  `cod_resposta` int(10) NOT NULL,
  `data` datetime NOT NULL,
  `cod_pergunta` int(11) NOT NULL,
  `cod_alternativa_resposta` int(10) DEFAULT NULL,
  `cod_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `resposta`
--

INSERT INTO `resposta` (`cod_resposta`, `data`, `cod_pergunta`, `cod_alternativa_resposta`, `cod_usuario`) VALUES
(5, '0000-00-00 00:00:00', 42, 22, 23),
(6, '0000-00-00 00:00:00', 43, 20, 34),
(7, '0000-00-00 00:00:00', 42, 22, 33),
(19, '2020-07-30 11:56:03', 1, 19, 41),
(20, '2020-07-30 11:56:03', 2, 19, 41),
(21, '2020-07-30 11:56:03', 3, 19, 41),
(22, '2020-07-30 11:56:03', 26, 20, 41),
(23, '2020-07-30 11:56:03', 27, 20, 41),
(24, '2020-07-30 11:56:03', 28, 20, 41),
(25, '2020-07-30 11:56:03', 29, 19, 41),
(26, '2020-07-30 11:56:03', 30, 21, 41),
(27, '2020-07-30 11:56:03', 31, 19, 41),
(28, '2020-07-30 11:56:03', 4, 22, 41),
(29, '2020-07-30 11:56:04', 5, 19, 41),
(30, '2020-07-30 11:56:04', 6, 20, 41),
(31, '2020-07-30 11:56:04', 7, 20, 41),
(32, '2020-07-30 11:56:04', 8, 21, 41),
(33, '2020-07-30 11:56:04', 9, 21, 41),
(34, '2020-07-30 11:56:04', 10, 21, 41),
(35, '2020-07-30 11:56:04', 11, 19, 41),
(36, '2020-07-30 11:56:04', 12, 19, 41),
(37, '2020-07-30 11:56:04', 13, 19, 41),
(38, '2020-07-30 11:56:04', 14, 19, 41),
(39, '2020-07-30 11:56:04', 15, 21, 41),
(40, '2020-07-30 11:56:04', 16, 21, 41),
(41, '2020-07-30 11:56:04', 17, 21, 41),
(42, '2020-07-30 11:56:04', 18, 21, 41),
(43, '2020-07-30 11:56:04', 19, 21, 41),
(44, '2020-07-30 11:56:04', 20, 22, 41),
(45, '2020-07-30 11:56:04', 21, 22, 41),
(46, '2020-07-30 11:56:04', 22, 19, 41),
(47, '2020-07-30 11:56:04', 23, 19, 41),
(48, '2020-07-30 11:56:04', 24, 19, 41),
(49, '2020-07-30 11:56:04', 25, 20, 41),
(50, '2020-07-30 11:56:04', 32, 19, 41),
(51, '2020-07-30 11:56:04', 33, 19, 41),
(52, '2020-07-30 11:56:04', 34, 20, 41),
(53, '2020-07-30 11:56:04', 35, 20, 41),
(54, '2020-07-30 11:56:04', 36, 21, 41),
(55, '2020-07-30 11:56:04', 37, 19, 41),
(56, '2020-07-30 11:56:04', 38, 19, 41),
(57, '2020-07-30 11:56:04', 39, 19, 41),
(58, '2020-07-30 11:56:04', 40, 19, 41),
(59, '2020-07-30 11:56:04', 41, 19, 41),
(60, '2020-07-30 11:56:04', 42, 19, 41),
(61, '2020-07-30 11:56:04', 43, 19, 41),
(62, '2020-07-30 11:56:04', 44, 20, 41),
(63, '2020-07-30 11:56:04', 45, 19, 41),
(64, '2020-07-30 11:56:04', 46, 19, 41),
(65, '2020-07-30 11:56:04', 47, 19, 41),
(66, '2020-07-30 11:56:04', 48, 19, 41),
(67, '2020-07-30 11:56:04', 49, 20, 41),
(68, '2020-07-30 11:56:04', 50, 20, 41),
(69, '2020-07-30 11:56:04', 51, 20, 41),
(70, '2020-07-30 11:56:04', 52, 20, 41),
(71, '2020-07-30 11:56:04', 53, 20, 41),
(72, '2020-07-30 11:56:04', 54, 20, 41),
(73, '2020-07-30 11:56:04', 55, 22, 41),
(74, '2020-07-30 11:56:04', 56, 21, 41),
(75, '2020-07-30 11:56:04', 57, 21, 41),
(76, '2020-07-30 11:56:04', 58, 21, 41),
(77, '2020-07-30 11:56:04', 59, 21, 41),
(78, '2020-07-30 13:25:44', 237, 20, 35),
(79, '2020-07-30 13:25:44', 238, 19, 35),
(80, '2020-07-30 13:25:44', 239, 19, 35),
(81, '2020-07-30 13:25:44', 240, 20, 35),
(82, '2020-07-30 13:25:44', 241, 19, 35),
(83, '2020-07-30 13:25:44', 242, 20, 35),
(84, '2020-07-30 13:25:45', 244, 19, 35),
(85, '2020-07-30 13:25:45', 245, 19, 35),
(86, '2020-07-30 13:25:45', 246, 22, 35),
(87, '2020-07-30 13:25:45', 250, 21, 35),
(88, '2020-07-30 13:25:45', 251, 19, 35),
(89, '2020-07-30 13:25:45', 252, 19, 35),
(90, '2020-07-30 13:25:45', 243, 19, 35),
(91, '2020-07-30 13:25:45', 247, 20, 35),
(92, '2020-07-30 13:25:45', 248, 21, 35),
(93, '2020-07-30 13:25:45', 249, 20, 35),
(94, '2020-07-30 13:26:51', 237, 20, 41),
(95, '2020-07-30 13:26:51', 238, 20, 41),
(96, '2020-07-30 13:26:51', 239, 20, 41),
(97, '2020-07-30 13:26:51', 240, 19, 41),
(98, '2020-07-30 13:26:51', 241, 19, 41),
(99, '2020-07-30 13:26:51', 242, 19, 41),
(100, '2020-07-30 13:26:51', 244, 19, 41),
(101, '2020-07-30 13:26:51', 245, 20, 41),
(102, '2020-07-30 13:26:51', 246, 20, 41),
(103, '2020-07-30 13:26:51', 250, 21, 41),
(104, '2020-07-30 13:26:51', 251, 22, 41),
(105, '2020-07-30 13:26:51', 252, 19, 41),
(106, '2020-07-30 13:26:51', 243, 19, 41),
(107, '2020-07-30 13:26:51', 247, 20, 41),
(108, '2020-07-30 13:26:51', 248, 20, 41),
(109, '2020-07-30 13:26:51', 249, 21, 41),
(110, '2020-08-04 19:30:12', 1, 19, 38),
(111, '2020-08-04 19:30:12', 2, 19, 38),
(112, '2020-08-04 19:30:12', 3, 19, 38),
(113, '2020-08-04 19:30:12', 26, 19, 38),
(114, '2020-08-04 19:30:12', 27, 19, 38),
(115, '2020-08-04 19:30:12', 28, 19, 38),
(116, '2020-08-04 19:30:12', 29, 19, 38),
(117, '2020-08-04 19:30:12', 30, 21, 38),
(118, '2020-08-04 19:30:12', 31, 21, 38),
(119, '2020-08-04 19:30:12', 4, 21, 38),
(120, '2020-08-04 19:30:12', 5, 21, 38),
(121, '2020-08-04 19:30:12', 6, 21, 38),
(122, '2020-08-04 19:30:12', 7, 21, 38),
(123, '2020-08-04 19:30:12', 8, 20, 38),
(124, '2020-08-04 19:30:12', 9, 20, 38),
(125, '2020-08-04 19:30:12', 10, 20, 38),
(126, '2020-08-04 19:30:12', 11, 22, 38),
(127, '2020-08-04 19:30:12', 12, 19, 38),
(128, '2020-08-04 19:30:12', 13, 19, 38),
(129, '2020-08-04 19:30:12', 14, 21, 38),
(130, '2020-08-04 19:30:12', 15, 21, 38),
(131, '2020-08-04 19:30:12', 16, 22, 38),
(132, '2020-08-04 19:30:12', 17, 22, 38),
(133, '2020-08-04 19:30:12', 18, 22, 38),
(134, '2020-08-04 19:30:12', 19, 22, 38),
(135, '2020-08-04 19:30:12', 20, 22, 38),
(136, '2020-08-04 19:30:12', 21, 22, 38),
(137, '2020-08-04 19:30:12', 22, 19, 38),
(138, '2020-08-04 19:30:12', 23, 19, 38),
(139, '2020-08-04 19:30:12', 24, 19, 38),
(140, '2020-08-04 19:30:12', 25, 20, 38),
(141, '2020-08-04 19:30:12', 32, 20, 38),
(142, '2020-08-04 19:30:12', 33, 20, 38),
(143, '2020-08-04 19:30:12', 34, 19, 38),
(144, '2020-08-04 19:30:12', 35, 20, 38),
(145, '2020-08-04 19:30:12', 36, 19, 38),
(146, '2020-08-04 19:30:12', 37, 21, 38),
(147, '2020-08-04 19:30:12', 38, 22, 38),
(148, '2020-08-04 19:30:12', 39, 20, 38),
(149, '2020-08-04 19:30:12', 40, 21, 38),
(150, '2020-08-04 19:30:12', 41, 19, 38),
(151, '2020-08-04 19:30:12', 42, 19, 38),
(152, '2020-08-04 19:30:12', 43, 19, 38),
(153, '2020-08-04 19:30:12', 44, 20, 38),
(154, '2020-08-04 19:30:12', 45, 19, 38),
(155, '2020-08-04 19:30:12', 46, 19, 38),
(156, '2020-08-04 19:30:12', 47, 19, 38),
(157, '2020-08-04 19:30:12', 48, 19, 38),
(158, '2020-08-04 19:30:12', 49, 19, 38),
(159, '2020-08-04 19:30:12', 50, 19, 38),
(160, '2020-08-04 19:30:12', 51, 19, 38),
(161, '2020-08-04 19:30:12', 52, 19, 38),
(162, '2020-08-04 19:30:12', 53, 20, 38),
(163, '2020-08-04 19:30:12', 54, 20, 38),
(164, '2020-08-04 19:30:12', 55, 20, 38),
(165, '2020-08-04 19:30:13', 56, 20, 38),
(166, '2020-08-04 19:30:13', 57, 20, 38),
(167, '2020-08-04 19:30:13', 58, 21, 38),
(168, '2020-08-04 19:30:13', 59, 20, 38),
(169, '2020-08-04 19:30:13', 236, 20, 38),
(170, '2020-08-04 19:32:04', 1, 20, 39),
(171, '2020-08-04 19:32:04', 2, 20, 39),
(172, '2020-08-04 19:32:04', 3, 20, 39),
(173, '2020-08-04 19:32:04', 26, 20, 39),
(174, '2020-08-04 19:32:04', 27, 19, 39),
(175, '2020-08-04 19:32:04', 28, 19, 39),
(176, '2020-08-04 19:32:04', 29, 19, 39),
(177, '2020-08-04 19:32:04', 30, 21, 39),
(178, '2020-08-04 19:32:04', 31, 22, 39),
(179, '2020-08-04 19:32:04', 4, 22, 39),
(180, '2020-08-04 19:32:04', 5, 22, 39),
(181, '2020-08-04 19:32:04', 6, 20, 39),
(182, '2020-08-04 19:32:04', 7, 20, 39),
(183, '2020-08-04 19:32:04', 8, 19, 39),
(184, '2020-08-04 19:32:04', 9, 19, 39),
(185, '2020-08-04 19:32:04', 10, 19, 39),
(186, '2020-08-04 19:32:04', 11, 19, 39),
(187, '2020-08-04 19:32:04', 12, 19, 39),
(188, '2020-08-04 19:32:04', 13, 19, 39),
(189, '2020-08-04 19:32:04', 14, 19, 39),
(190, '2020-08-04 19:32:04', 15, 21, 39),
(191, '2020-08-04 19:32:04', 16, 21, 39),
(192, '2020-08-04 19:32:04', 17, 21, 39),
(193, '2020-08-04 19:32:04', 18, 21, 39),
(194, '2020-08-04 19:32:04', 19, 21, 39),
(195, '2020-08-04 19:32:04', 20, 19, 39),
(196, '2020-08-04 19:32:04', 21, 19, 39),
(197, '2020-08-04 19:32:04', 22, 19, 39),
(198, '2020-08-04 19:32:04', 23, 19, 39),
(199, '2020-08-04 19:32:04', 24, 19, 39),
(200, '2020-08-04 19:32:04', 25, 20, 39),
(201, '2020-08-04 19:32:04', 32, 20, 39),
(202, '2020-08-04 19:32:04', 33, 22, 39),
(203, '2020-08-04 19:32:04', 34, 21, 39),
(204, '2020-08-04 19:32:04', 35, 22, 39),
(205, '2020-08-04 19:32:04', 36, 21, 39),
(206, '2020-08-04 19:32:04', 37, 21, 39),
(207, '2020-08-04 19:32:04', 38, 20, 39),
(208, '2020-08-04 19:32:04', 39, 20, 39),
(209, '2020-08-04 19:32:04', 40, 21, 39),
(210, '2020-08-04 19:32:04', 41, 21, 39),
(211, '2020-08-04 19:32:04', 42, 21, 39),
(212, '2020-08-04 19:32:04', 43, 19, 39),
(213, '2020-08-04 19:32:04', 44, 21, 39),
(214, '2020-08-04 19:32:04', 45, 21, 39),
(215, '2020-08-04 19:32:04', 46, 21, 39),
(216, '2020-08-04 19:32:04', 47, 20, 39),
(217, '2020-08-04 19:32:04', 48, 20, 39),
(218, '2020-08-04 19:32:04', 49, 20, 39),
(219, '2020-08-04 19:32:04', 50, 20, 39),
(220, '2020-08-04 19:32:04', 51, 20, 39),
(221, '2020-08-04 19:32:04', 52, 22, 39),
(222, '2020-08-04 19:32:05', 53, 22, 39),
(223, '2020-08-04 19:32:05', 54, 22, 39),
(224, '2020-08-04 19:32:05', 55, 22, 39),
(225, '2020-08-04 19:32:05', 56, 22, 39),
(226, '2020-08-04 19:32:05', 57, 22, 39),
(227, '2020-08-04 19:32:05', 58, 22, 39),
(228, '2020-08-04 19:32:05', 59, 22, 39),
(229, '2020-08-04 19:32:05', 236, 20, 39);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_questionario`
--

CREATE TABLE `tipo_questionario` (
  `cod_tipo_questionario` int(11) NOT NULL,
  `tipo_questionario` varchar(20) DEFAULT NULL,
  `detalhe` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_questionario`
--

INSERT INTO `tipo_questionario` (`cod_tipo_questionario`, `tipo_questionario`, `detalhe`) VALUES
(3, 'ALUNO', 'DISCENTES'),
(4, 'COLABORADORES', 'DOSCENTES');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `cod_usuario` int(11) NOT NULL,
  `matricula` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `sobrenome` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `senha` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cod_perfil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`cod_usuario`, `matricula`, `status`, `sobrenome`, `senha`, `email`, `nome`, `cod_perfil`) VALUES
(34, '1232131265', 1, 'Rabelo', 'e10adc3949ba59abbe56e057f20f883e', 'Danielabelo@gmail.com', 'Daniel', 4),
(35, '12321312757', 1, 'molina', 'e10adc3949ba59abbe56e057f20f883e', 'franciscomolina@gmail.com', 'francisco', 4),
(36, '12321312', 1, 'Santos', 'e10adc3949ba59abbe56e057f20f883e', 'beatriz@gmail.com', 'Beatriz', 3),
(37, '12321312', 1, 'Gangá', '14e1b600b1fd579f47433b88e8d85291', 'eduardo@gmail.com', 'Eduardo ', 4),
(38, '10101010', 1, 'Silva', 'd56d97ed410663ec5fffe42aeac7943b', 'tiagokamus40@gmail.com', 'Tiago', 3),
(39, '123213', 1, 'Tércio', 'e10adc3949ba59abbe56e057f20f883e', 'marcostercioramos@gmail.com', 'Marcos', 3),
(41, '654321', 1, 'Lima', '124bd1296bec0d9d93c7b52a71ad8d5b', 'ferdinamlima@gmail.com', 'Ferdinan', 4),
(45, '0000', 1, 'desconhecido', 'e10adc3949ba59abbe56e057f20f883e', 'washington@gmail.com', 'washington', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alternativa_resposta`
--
ALTER TABLE `alternativa_resposta`
  ADD PRIMARY KEY (`cod_alternativa_resposta`);

--
-- Índices para tabela `dimensao`
--
ALTER TABLE `dimensao`
  ADD PRIMARY KEY (`cod_dimensao`);

--
-- Índices para tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`cod_perfil`);

--
-- Índices para tabela `pergunta`
--
ALTER TABLE `pergunta`
  ADD PRIMARY KEY (`cod_pergunta`),
  ADD KEY `cod_dimensao` (`cod_dimensao`) USING BTREE;

--
-- Índices para tabela `pergunta_questionario`
--
ALTER TABLE `pergunta_questionario`
  ADD PRIMARY KEY (`cod_pergunta_questionario`),
  ADD KEY `pergunta` (`cod_pergunta`) USING BTREE,
  ADD KEY `cod_questionario` (`cod_questionario`) USING BTREE;

--
-- Índices para tabela `questionario`
--
ALTER TABLE `questionario`
  ADD PRIMARY KEY (`cod_questionario`),
  ADD KEY `cod_tipo_questionario` (`cod_tipo_questionario`),
  ADD KEY `cod_usuario` (`cod_usuario`);

--
-- Índices para tabela `resposta`
--
ALTER TABLE `resposta`
  ADD PRIMARY KEY (`cod_resposta`),
  ADD KEY `cod_pergunta` (`cod_pergunta`),
  ADD KEY `cod_alternativa_resposta` (`cod_alternativa_resposta`),
  ADD KEY `cod_usuario` (`cod_usuario`);

--
-- Índices para tabela `tipo_questionario`
--
ALTER TABLE `tipo_questionario`
  ADD PRIMARY KEY (`cod_tipo_questionario`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cod_usuario`),
  ADD KEY `cod_perfil` (`cod_perfil`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alternativa_resposta`
--
ALTER TABLE `alternativa_resposta`
  MODIFY `cod_alternativa_resposta` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `dimensao`
--
ALTER TABLE `dimensao`
  MODIFY `cod_dimensao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `cod_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `pergunta`
--
ALTER TABLE `pergunta`
  MODIFY `cod_pergunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT de tabela `pergunta_questionario`
--
ALTER TABLE `pergunta_questionario`
  MODIFY `cod_pergunta_questionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT de tabela `questionario`
--
ALTER TABLE `questionario`
  MODIFY `cod_questionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de tabela `resposta`
--
ALTER TABLE `resposta`
  MODIFY `cod_resposta` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT de tabela `tipo_questionario`
--
ALTER TABLE `tipo_questionario`
  MODIFY `cod_tipo_questionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `pergunta`
--
ALTER TABLE `pergunta`
  ADD CONSTRAINT `pergunta_ibfk_1` FOREIGN KEY (`cod_dimensao`) REFERENCES `dimensao` (`cod_dimensao`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
