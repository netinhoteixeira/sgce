<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
Copyright 2010 UNIPAMPA - Universidade Federal do Pampa

Este arquivo é parte do programa SGCE - Sistema de Gestão de Certificados Eletrônicos

O SGCE é um software livre; você pode redistribuí-lo e/ou modificá-lo dentro dos
termos da Licença Pública Geral GNU como publicada pela Fundação do Software Livre
(FSF); na versão 2 da Licença.

Este programa é distribuído na esperança que possa ser útil, mas SEM NENHUMA GARANTIA;
sem uma garantia implícita de ADEQUAÇÃO a qualquer MERCADO ou APLICAÇÃO EM PARTICULAR.
Veja a Licença Pública Geral GNU/GPL em português para maiores detalhes.

Você deve ter recebido uma cópia da Licença Pública Geral GNU, sob o título "LICENCA.txt",
junto com este programa, se não, acesse o Portal do Software Público Brasileiro no
endereço www.softwarepublico.gov.br ou escreva para a Fundação do Software Livre(FSF)
Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301, USA
*/

/**
 * Controlador das Configurações do Sistema.
 *
 * @author Pedro Jr     <pedro.junior@unipampa.edu.br>
 * @author Sergio Jr    <sergiojunior@unipampa.edu.br>
 * @author Francisco Ernesto Teixeira <me@francisco.pro>
 * @copyright NTIC Unipampa 2010
 */
class Configuracoes extends MY_Controller
{

    /**
     * Construtor da Classe.
     *
     * Inicializar os helpers e bibliotecas do CodeIgniter e verificar se o usuários
     * tem permissão para abrir o controlador.
     */
    public function __construct()
    {
        parent::__construct(TRUE);
    }

    /**
     * Método padrão chamado quando é invocado o controlador.
     *
     * Responsável por chamar a página principal para o usuário.
     */
    function index()
    {
        if (!$this->ehAdmin()) {
            $this->acessoBloqueado();
        } else {
            $this->editar();
        }
    }

    /**
     * Edita as informações da configuração.
     */
    function editar()
    {
        $this->load->model('configuracoes_model');
        $dados = $this->configuracoes_model->obter();
        $dados['corpo_pagina'] = 'configuracoes_view';

        $this->load->view('includes/templates/template', $dados);
    }

    /**
     * Salva as informações fornecidas para a configuração.
     */
    function salvar()
    {
        $this->load->library('form_validation');

        // Autenticação
        $this->form_validation->set_rules('txtModoAuth', 'Modo de Autenticação', 'required');
        $this->form_validation->set_rules('txtServerLDAP', 'Servidor LDAP', 'required');
        $this->form_validation->set_rules('txtPortaLDAP', 'Porta LDAP', 'required');
        $this->form_validation->set_rules('txtDNBase', 'DN Base LDAP', 'required');
        $this->form_validation->set_rules('txtDNMaster', 'DN Master LDAP', 'required');
        $this->form_validation->set_rules('txtDNSearch', 'DN Search LDAP', 'required');
        $this->form_validation->set_rules('txtSenhaLDAP', 'Senha LDAP', 'required');

        // Envio de arquivo
        $this->form_validation->set_rules('txtTamanhoUpload', 'Tamanho Máximo do Arquivo', 'required');
        $this->form_validation->set_rules('txtCaminhoUpload', 'Caminho do Arquivo Enviado', 'required');
        $this->form_validation->set_rules('txtExtensoesUpload', 'Extensões Permitidas', 'required');

        // E-mail
        // $this->form_validation->set_rules('txtSMTPServer', 'Servidor SMTP', 'required');
        // $this->form_validation->set_rules('txtSMTPPort', 'Porta SMTP', 'required');
        // $this->form_validation->set_rules('txtFromName', 'Nome do Remetente', 'required');
        // $this->form_validation->set_rules('txtFromMail', 'Endereço do Remetente', 'required');

        // Mensagens
        $this->form_validation->set_rules('txtEmailPadrao', 'Endereço de e-mail padrão do sistema', 'required');
        $this->form_validation->set_rules('txtServidorDNS', 'IP Servidor DNS', 'required');

        $this->form_validation->set_rules('txtMsgNotificacao', 'Texto Mensagem de Notificação', 'required');
        $this->form_validation->set_rules('txtMsgAlteracaoStatus', 'Texto Mensagem de Notificação/Revogação', 'required');
        $this->form_validation->set_rules('txtMsgNotifQualidade', 'Texto Mensagem de Notificação de Qualidade', 'required');

        $this->_configurarMensagensDeErroDoFormulario();

        if ($this->form_validation->run() === TRUE) {
            $this->load->model('configuracoes_model');

            $dados = [];

            // Autenticação
            $dados['tipo_de_autenticacao'] = $this->input->post('txtModoAuth');
            $dados['server_ldap'] = $this->input->post('txtServerLDAP');
            $dados['porta_ldap'] = $this->input->post('txtPortaLDAP');
            $dados['base_dn'] = $this->input->post('txtDNBase');
            $dados['master_dn'] = $this->input->post('txtDNMaster');
            $dados['search_dn'] = $this->input->post('txtDNSearch');
            $dados['senha_ldap'] = $this->input->post('txtSenhaLDAP');

            // Envio de arquivo
            $dados['max_size'] = $this->input->post('txtTamanhoUpload');
            $dados['upload_path'] = $this->input->post('txtCaminhoUpload');
            $dados['allowed_types'] = $this->input->post('txtExtensoesUpload');

            // E-mail
            // $dados['smtp_host'] = $this->input->post('txtSMTPServer');
            // $dados['smtp_port'] = $this->input->post('txtSMTPPort');
            // $dados['mail_from_name'] = $this->input->post('txtFromName');
            // $dados['mail_from_address'] = $this->input->post('txtFromMail');
            // $dados['smtp_user'] = isset($this->input->post('txtSMTPUser')) ? $this->input->post('txtSMTPUser') : null;
            // $dados['smtp_pass'] = isset($this->input->post('txtSMTPPass')) ? $this->input->post('txtSMTPPass') : null;

            // Mensagens
            $dados['email_from_address'] = $this->input->post('txtEmailPadrao');
            $dados['servidor_dns'] = $this->input->post('txtServidorDNS');

            $dados['msg_notificacao'] = $this->input->post('txtMsgNotificacao');
            $dados['msg_alteracao_status'] = $this->input->post('txtMsgAlteracaoStatus');
            $dados['msg_notificacao_qualidade'] = $this->input->post('txtMsgNotifQualidade');

            $this->configuracoes_model->update($dados);
            $this->_aplicarConfiguracoes($dados);

            $this->_exibirRetorno('Operação executada com sucesso. Aguarde...', 'configuracoes/editar/');
        } else {
            $this->editar();
        }
    }

    /**
     * Personaliza as mensagens de erro do formulário.
     */
    function _configurarMensagensDeErroDoFormulario()
    {
        $this->form_validation->set_message('required',
            'O campo <span class="message_field">%s</span> &eacute; obrigat&oacute;rio.');
        $this->form_validation->set_message('valid_email',
            'O campo <span class="message_field">%s</span> n&atilde;o &eacute; um e-mail v&aacute;lido.');
        $this->form_validation->set_message('max_leght',
            'O campo <span class="message_field">%s</span> apresenta um tamanho m&aacute;ximo de 12 caracteres.');
        $this->form_validation->set_message('numeric',
            'O campo <span class="message_field">%s</span> deve possuir somente valor num&eacute;rico.');
        $this->form_validation->set_message('is_natural_no_zero',
            'O campo <span class="message_field">%s</span> &eacute; obrigat&oacute;rio.');
    }

    /**
     * Aplica as configurações do sistema com os dados fornecidos.
     *
     * @param array $dados Dados que serão aplicados ao sistema.
     */
    function _aplicarConfiguracoes($dados)
    {
        if (is_array($dados)) {
            $this->config->load('email');

            foreach ($dados as $chave => $valor) {
                $this->config->set_item($chave, $valor);
            }
        }
    }

    /**
     * Exibe o retorno de uma operação com a mensagem passada e o endereço de
     * direcionamento.
     *
     * @param string $mensagem Mensagem que deve ser retornada/exibida.
     * @param string $endereco Endereço do direcionamento (URL).
     */
    function _exibirRetorno($mensagem, $endereco)
    {
        $dados['mensagem'] = $mensagem;
        $dados['corpo_pagina'] = 'retorno_operacoes_view';
        $visao = $this->load->view('includes/templates/template', $dados, TRUE);

        exibeRetornoOperacao($visao, $endereco);
    }

    /**
     * Cancela a edição da configuração e volta para a página principal.
     */
    function cancelar()
    {
        redirect('sistema/principal');
    }

    /**
     * Restaura as configurações para os valores padrões.
     */
    function restaurar()
    {
        $this->load->model('configuracoes_model');
        $this->configuracoes_model->restaurarValoresPadroes();

        $this->_exibirRetorno('Operação executada com sucesso. Aguarde...',
            'configuracoes/editar/');
    }

}

/* End of file configuracoes.php */
/* Location: ./application/controllers/configuracoes.php */