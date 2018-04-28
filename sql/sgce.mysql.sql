/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

DROP DATABASE IF EXISTS `sgce`;
CREATE DATABASE IF NOT EXISTS `sgce` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `sgce`;

DROP TABLE IF EXISTS `certificados_modelo`;
CREATE TABLE IF NOT EXISTS `certificados_modelo` (
  `id_certificado_modelo` bigint(20) NOT NULL AUTO_INCREMENT,
  `nm_modelo` text NOT NULL,
  `nm_fundo` varchar(255) DEFAULT NULL,
  `de_titulo` varchar(255) DEFAULT NULL,
  `de_texto` text NOT NULL,
  `id_evento` int(11) NOT NULL,
  `nm_fonte` varchar(20) NOT NULL,
  `de_carga` varchar(50) DEFAULT NULL,
  `dt_inclusao` datetime NOT NULL,
  `dt_alteracao` datetime NOT NULL,
  `de_instrucoes` text,
  `de_posicao_texto` int(11) DEFAULT NULL,
  `de_posicao_titulo` int(11) DEFAULT NULL,
  `de_posicao_validacao` int(11) DEFAULT NULL,
  `de_alinhamento_titulo` varchar(10) DEFAULT NULL,
  `de_alinhamento_texto` varchar(10) DEFAULT NULL,
  `de_alinhamento_validacao` varchar(10) DEFAULT NULL,
  `de_alin_texto_titulo` varchar(10) DEFAULT NULL,
  `de_alin_texto_texto` varchar(10) DEFAULT NULL,
  `de_alin_texto_validacao` varchar(10) DEFAULT NULL,
  `de_cor_texto_titulo` varchar(10) DEFAULT NULL,
  `de_cor_texto_texto` varchar(10) DEFAULT NULL,
  `de_cor_texto_validacao` varchar(10) DEFAULT NULL,
  `de_tamanho_titulo` int(11) DEFAULT NULL,
  `de_tamanho_texto` int(11) DEFAULT NULL,
  `de_titulo_verso` text,
  `de_texto_verso` text,
  PRIMARY KEY (`id_certificado_modelo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Modelos de Certificação';

DROP TABLE IF EXISTS `certificados_participante`;
CREATE TABLE IF NOT EXISTS `certificados_participante` (
  `id_certificado` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_participante` int(11) NOT NULL,
  `id_modelo_certificado` int(11) NOT NULL,
  `de_complementar` text,
  `de_hash` varchar(255) DEFAULT NULL,
  `dt_inclusao` datetime NOT NULL,
  `dt_alteracao` datetime NOT NULL,
  `fl_ativo` char(1) DEFAULT NULL,
  `de_texto_certificado` text,
  `de_campos_frente` text,
  `de_campos_verso` text,
  PRIMARY KEY (`id_certificado`),
  UNIQUE KEY `uq_certificados_participante_de_hash` (`de_hash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Certificados dos Participantes';

DROP TABLE IF EXISTS `ci_sessions_sgce`;
CREATE TABLE IF NOT EXISTS `ci_sessions_sgce` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(11) NOT NULL DEFAULT '0',
  `user_data` text,
  PRIMARY KEY (`session_id`),
  INDEX `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Sessões do CodeIgniter';

DROP TABLE IF EXISTS `config_sistema`;
CREATE TABLE IF NOT EXISTS `config_sistema` (
  `id_config_sistema` bigint(20) NOT NULL AUTO_INCREMENT,
  `nm_parametro` varchar(25) NOT NULL,
  `vl_parametro` text,
  `vl_padrao` text,
  PRIMARY KEY (`id_config_sistema`),
  UNIQUE KEY `uq_config_sistema_nm_parametro` (`nm_parametro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Configurações do Sistema';

DROP TABLE IF EXISTS `eventos`;
CREATE TABLE IF NOT EXISTS `eventos` (
  `id_evento` bigint(20) NOT NULL AUTO_INCREMENT,
  `nm_evento` varchar(255) NOT NULL,
  `sg_evento` varchar(20) NOT NULL,
  `de_periodo` text NOT NULL,
  `de_carga` text NOT NULL,
  `de_local` text NOT NULL,
  `dt_inclusao` datetime NOT NULL,
  `dt_alteracao` datetime NOT NULL,
  `de_url` text,
  `de_email` text,
  PRIMARY KEY (`id_evento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Eventos';

DROP TABLE IF EXISTS `historico_status_certificado`;
CREATE TABLE IF NOT EXISTS `historico_status_certificado` (
  `id_historico_status_certificado` bigint(20) NOT NULL AUTO_INCREMENT,
  `ip_usuario` text NOT NULL,
  `nm_usuario` text NOT NULL,
  `fl_status_certificado` text NOT NULL,
  `de_justificativa` text NOT NULL,
  `dt_alteracao` datetime DEFAULT NULL,
  `id_certificado` bigint(20) NOT NULL,
  PRIMARY KEY (`id_historico_status_certificado`),
  CONSTRAINT `fk_certificados_participante` FOREIGN KEY (`id_certificado`) REFERENCES `certificados_participante` (`id_certificado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Histórico das Situações do Certificado';

DROP TABLE IF EXISTS `log_importacao`;
CREATE TABLE IF NOT EXISTS `log_importacao` (
  `id_log` bigint(20) NOT NULL AUTO_INCREMENT,
  `dt_log` datetime NOT NULL,
  `nm_usuario` varchar(255) NOT NULL,
  `ip_usuario` varchar(20) NOT NULL,
  `msg_log` text,
  `id_certificado_modelo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Registro das Importações';

DROP TABLE IF EXISTS `log_importacao_detalhes`;
CREATE TABLE IF NOT EXISTS `log_importacao_detalhes` (
  `id_log_detalhe` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_log` bigint(20) NOT NULL,
  `nr_linha` integer,
  `de_descricao` text,
  PRIMARY KEY (`id_log_detalhe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Detalhes do Registro das Importações';

DROP TABLE IF EXISTS `organizadores`;
CREATE TABLE IF NOT EXISTS `organizadores` (
  `id_organizador` bigint(20) NOT NULL AUTO_INCREMENT,
  `nm_organizador` varchar(50) NOT NULL,
  `nr_documento` varchar(15) NOT NULL,
  `de_email` varchar(255) DEFAULT NULL,
  `nr_telefone` varchar(50) DEFAULT NULL,
  `dt_inclusao` datetime NOT NULL,
  `dt_alteracao` datetime NOT NULL,
  `de_usuario` varchar(255) NOT NULL,
  `fl_admin` char(1) DEFAULT 'N',
  `de_senha` varchar(50) DEFAULT NULL,
  `fl_controlador` char(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_organizador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Organizadores';

DROP TABLE IF EXISTS `organizadores_evento`;
CREATE TABLE IF NOT EXISTS `organizadores_evento` (
  `id_organizadores_evento` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_organizador` bigint(20) NOT NULL,
  `id_evento` bigint(20) NOT NULL,
  `fl_controlador` char(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_organizadores_evento`),
  UNIQUE KEY `uq_organizadores_evento` (`id_organizador`,`id_evento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Eventos dos Organizadores';

DROP TABLE IF EXISTS `participantes`;
CREATE TABLE IF NOT EXISTS `participantes` (
  `id_participante` bigint(20) NOT NULL AUTO_INCREMENT,
  `nm_participante` text NOT NULL,
  `de_email` varchar(255) NOT NULL,
  `nr_documento` varchar(20) DEFAULT NULL,
  `dt_inclusao` datetime NOT NULL,
  `dt_alteracao` datetime NOT NULL,
  PRIMARY KEY (`id_participante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Participantes';

DROP TABLE IF EXISTS `rsenha_organizador`;
CREATE TABLE IF NOT EXISTS `rsenha_organizador` (
  `id_organizador` bigint(20) NOT NULL AUTO_INCREMENT,
  `de_senha_md5` varchar(100) NOT NULL,
  `id_acesso` varchar(100) NOT NULL,
  `dt_inclusao` datetime NOT NULL,
  `dt_alteracao` datetime NOT NULL,
  PRIMARY KEY (`id_organizador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Acessos do Organizador';

/*!40000 ALTER TABLE `config_sistema` DISABLE KEYS */;
INSERT INTO `config_sistema` (`id_config_sistema`, `nm_parametro`, `vl_parametro`, `vl_padrao`) VALUES
	(1, 'upload_path', './uploads/', './uploads/'),
	(2, 'allowed_types', 'jpg|jpeg|csv', 'doc|docx|pdf|zip|rar|jpg|jpeg|gif|png|csv'),
	(3, 'max_size', '1048576', '1048576'),
	(4, 'tipo_de_autenticacao', 'banco', 'banco'),
	(6, 'server_ldap', 'ldap.empresa.com.br', 'ldap.empresa.com.br'),
	(7, 'base_dn', 'ou=usuarios,dc=empresa,dc=com,dc=br', 'ou=usuarios,dc=empresa,dc=com,dc=br'),
	(8, 'master_dn', 'cn=manager,dc=empresa,dc=com,dc=br', 'cn=manager,dc=empresa,dc=com,dc=br'),
	(10, 'senha_ldap', 'admin', 'admin'),
	(12, 'smtp_host', 'smtp.empresa.com.br', 'smtp.empresa.com.br'),
	(16, 'smtp_user', 'email', 'email'),
	(17, 'smtp_pass', 'senha', 'senha'),
	(18, 'smtp_port', '25', '25'),
	(22, 'mail_from_address', 'nao.responder@empresa.com.br', 'nao.responder@empresa.com.br'),
	(23, 'mail_from_name', 'Nao Responder', 'Nao Responder'),
	(24, 'msg_notificacao', '<p>Prezado NOME_PARTICIPANTE,<br /><br />Informamos que seu certificado referente &agrave; participa&ccedil;&atilde;o no NOME_EVENTO j&aacute; est&aacute; dispon&iacute;vel para emiss&atilde;o e valida&ccedil;&atilde;o no Sistema de Emiss&atilde;o de Certificados da Unipampa.<br /><br />Para emitir seu certificado, acesse o seguinte endere&ccedil;o:<br /><br /> LINK_CERTIFICADO <br /><br /><br />Atenciosamente,<br />Comiss&atilde;o Organizadora do NOME_EVENTO <br /><br />ATEN&Ccedil;&Atilde;O: Esta mensagem foi enviada automaticamente. <br />Por favor, n&atilde;o responda a esta mensagem.</p>', 'Prezado NOME_PARTICIPANTE,<br /><br />Informamos que seu certificado referente à participação no NOME_EVENTO já está disponível para emissão e validação no Sistema de Emissão de Certificados da Unipampa.<br /><br />Para emitir seu certificado, acesse o seguinte endereço:<br /><br /> LINK_CERTIFICADO <br /><br /><br />Atenciosamente,<br />Comissão Organizadora do NOME_EVENTO <br/><br/>ATENÇÃO: Esta mensagem foi enviada automaticamente. <br />Por favor, não responda a esta mensagem.'),
	(25, 'msg_alteracao_status', '<p>Prezado NOME_PARTICIPANTE, <br /><br />Comunicamos que o certificado de participa&ccedil;&atilde;o no evento NOME_EVENTO com identifica&ccedil;&atilde;o IDENTIFICACAO_CERTIFICADO foi considerado DESCRICAO_STATUS no Sistema de Emiss&atilde;o de Certificados da Unipampa. <br /><br />Justificativa: DESCRICAO_JUSTIFICATIVA <br /><br />Atenciosamente,<br />Comiss&atilde;o Organizadora do NOME_EVENTO<br /><br />ATEN&Ccedil;&Atilde;O: Esta mensagem foi enviada automaticamente. <br />Por favor, n&atilde;o responda a esta mensagem.</p>', 'Prezado NOME_PARTICIPANTE, <br /><br />Seu certificado de participação no evento NOME_EVENTO com identificação IDENTIFICACAO_CERTIFICADO foi considerado DESCRICAO_STATUS no Sistema de Emissão de Certificados da Unipampa. <br /><br />Justificativa: DESCRICAO_JUSTIFICATIVA <br/><br/>Atenciosamente,<br />Comissão Organizadora do NOME_EVENTO<br/><br/>ATENÇÃO: Esta mensagem foi enviada automaticamente. <br />Por favor, não responda a esta mensagem.'),
	(26, 'porta_ldap', '389', '389'),
	(27, 'protocol', 'smtp', 'smtp'),
	(28, 'charset', 'utf-8', 'utf-8'),
	(29, 'wordwrap', 'TRUE', 'TRUE'),
	(30, 'mailtype', 'html', 'html'),
	(31, 'search_dn', 'dc=empresa,dc=com,dc=br', 'dc=empresa,dc=com,dc=br'),
	(32, 'msg_notificacao_qualidade', 'Prezado Avaliador de qualidade, <br/><br/>Existem certificados aguardando aprovação/liberação para o evento NOME_EVENTO.<br/></br>Pedimos que seja efetuada a liberação através da opção <b>Avaliação de Certificados</b> no menu <b>Certificados</b> o mais brevemente possível. <br /><br /><br />Atenciosamente,<br />Comissão Organizadora do NOME_EVENTO <br/><br/>ATENÇÃO: Esta mensagem foi enviada automaticamente. <br />Por favor, não responda a esta mensagem.', 'Prezado Avaliador de qualidade, <br/><br/>Existem certificados aguardando aprovação/liberação para o evento NOME_EVENTO.<br/></br>Pedimos que seja efetuada a liberação através da opção <b>Avaliação de Certificados</b> no menu <b>Certificados</b> o mais brevemente possível. <br /><br /><br />Atenciosamente,<br />Comissão Organizadora do NOME_EVENTO <br/><br/>ATENÇÃO: Esta mensagem foi enviada automaticamente. <br />Por favor, não responda a esta mensagem.'),
	(33, 'servidor_dns', '10.1.1.1', '10.1.1.1'),
	(34, 'email_from_address', 'nao.responder@empresa.com.br', 'nao.responder@empresa.com.br');
/*!40000 ALTER TABLE `config_sistema` ENABLE KEYS */;

/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
INSERT INTO `eventos` (`id_evento`, `nm_evento`, `sg_evento`, `de_periodo`, `de_carga`, `de_local`, `dt_inclusao`, `dt_alteracao`, `de_url`, `de_email`) VALUES
	(1, 'Evento de Treinamento', 'ETREINA', '21/09/2011', '1 hora', 'Webconf', '2011-09-19 00:00:00', '2011-12-06 00:00:00', '', 'admin@empresa.com.br');
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;

/*!40000 ALTER TABLE `organizadores` DISABLE KEYS */;
INSERT INTO `organizadores` (`id_organizador`, `nm_organizador`, `nr_documento`, `de_email`, `nr_telefone`, `dt_inclusao`, `dt_alteracao`, `de_usuario`, `fl_admin`, `de_senha`, `fl_controlador`) VALUES
	(1, 'Administrador', '000', 'admin@empresa.com.br', '55', '2011-02-01 08:49:35', '2011-11-21 00:00:00', 'admin', 'S', '21232f297a57a5a743894a0e4a801fc3', 'S');
/*!40000 ALTER TABLE `organizadores` ENABLE KEYS */;

/*!40000 ALTER TABLE `organizadores_evento` DISABLE KEYS */;
INSERT INTO `organizadores_evento` (`id_organizadores_evento`, `id_organizador`, `id_evento`, `fl_controlador`) VALUES
	(1, 1, 1, 'S');
/*!40000 ALTER TABLE `organizadores_evento` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
