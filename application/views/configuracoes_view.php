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
 * View de Cadastro de eventos
 *
 * Utilizada para Entrada de Dados de eventos
 *
 * @author     Pedro Conrad Jr. <pedro.junior@unipampa.edu.br>
 * @author     Sergio Jr <sergiojunior@unipampa.edu.br
 * @author     Francisco Ernesto Teixeira <me@francisco.pro>
 * @copyright Universidade Federal do Pampa - NTIC Campus Alegrete 2010
 */

echo form_open(base_url() . 'configuracoes/salvar');
?>
    <div class="row">
        <div class="col-sm-12">
            <h1>Configurações do Sistema</h1>
            <hr/>
            <?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
        </div>
    </div>
    <div class="row toolbar">
        <div class="col-sm-12">
            <div class="pull-right">
                <button type="button" class="btn btn-secondary"
                        onclick="confirmaRestauracaoConfig('<?php echo base_url() ?>configuracoes/restaurar');">
                    Restaurar valores padrões
                </button>&nbsp;
                <button type="submit" class="btn btn-danger pull-right">Salvar</button>
            </div>
            <button type="button" class="btn btn-primary"
                    onclick="parent.location='<?php echo base_url() ?>configuracoes/cancelar'">Cancelar
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <fieldset>
                <legend>Autenticação</legend>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="txtModoAuth">Modo de autenticação</label>
                        <select class="form-control" id="txtModoAuth" name="txtModoAuth"
                                onchange="selecionaTipoConfig(this.value);">
                            <option value="banco" <?php echo (@$tipo_de_autenticacao == 'banco') ? ' selected' : ''; ?>>
                                Banco de Dados
                            </option>
                            <option value="ldap" <?php echo (@$tipo_de_autenticacao == 'ldap') ? ' selected' : ''; ?>>
                                LDAP
                            </option>
                            <option value="mista" <?php echo (@$tipo_de_autenticacao == 'mista') ? ' selected' : ''; ?>>
                                Mista
                            </option>
                        </select>
                    </div>
                </div>
            </fieldset>
            <fieldset id="configLDAP">
                <legend>Dados do Servidor LDAP</legend>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="txtServerLDAP">Servidor</label>
                        <input type="text" class="form-control" id="txtServerLDAP" name="txtServerLDAP"
                               placeholder="Servidor" value="<?php echo @$server_ldap; ?>" maxlength="50">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="txtPortaLDAP">Porta</label>
                        <input type="number" class="form-control" id="txtPortaLDAP" name="txtPortaLDAP"
                               placeholder="Porta" value="<?php echo @$porta_ldap; ?>" maxlength="50">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="txtDNBase">DN Base</label>
                        <input type="text" class="form-control" id="txtDNBase" name="txtDNBase"
                               placeholder="DN Base" value="<?php echo @$base_dn; ?>" maxlength="50">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="txtDNMaster">DN Master</label>
                        <input type="text" class="form-control" id="txtDNMaster" name="txtDNMaster"
                               placeholder="DN Master" value="<?php echo @$master_dn; ?>" maxlength="50">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="txtDNSearch">DN Search</label>
                        <input type="text" class="form-control" id="txtDNSearch" name="txtDNSearch"
                               placeholder="DN Search" value="<?php echo @$search_dn; ?>" maxlength="50">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="txtSenhaLDAP">Senha</label>
                        <input type="password" class="form-control" id="txtSenhaLDAP" name="txtSenhaLDAP"
                               placeholder="Senha" value="<?php echo @$senha_ldap; ?>" maxlength="50">
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>Envio de Arquivo</legend>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="txtTamanhoUpload">Tamanho Máximo do Arquivo</label>
                        <select class="form-control" id="txtTamanhoUpload" name="txtTamanhoUpload">
                            <option value="1048576" <?php echo (@$max_size == '1048576') ? " selected " : ""; ?> >1
                                MB
                            </option>
                            <option value="2097152" <?php echo (@$max_size == '2097152') ? " selected " : ""; ?> >2
                                MB
                            </option>
                            <option value="4194304" <?php echo (@$max_size == '4194304') ? " selected " : ""; ?> >4
                                MB
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="txtCaminhoUpload">Caminho do Arquivo Enviado</label>
                        <input type="text" class="form-control" id="txtCaminhoUpload" name="txtCaminhoUpload"
                               placeholder="Caminho do Arquivo Enviado" value="<?php echo @$upload_path; ?>"
                               maxlength="50">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="txtExtensoesUpload">Extensões Permitidas</label>
                        <input type="text" class="form-control" id="txtExtensoesUpload" name="txtExtensoesUpload"
                               placeholder="Extensões Permitidas" value="<?php echo @$allowed_types; ?>"
                               maxlength="50">
                        <small id="txtExtensoesUploadHelp" class="form-text text-muted">Separar as extensões com o
                            caracter <strong>'|'</strong>.
                        </small>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>Mensagens</legend>
                <p>O e-mail padrão e o IP do Servidor DNS são necess&aacute;rios para testes de validade de e-mail e
                    ambos devem existir e estar ativos.</p>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="txtEmailPadrao">E-mail Padrão do Sistema</label>
                        <input type="email" class="form-control" id="txtEmailPadrao" name="txtEmailPadrao"
                               placeholder="E-mail Padrão do Sistema" value="<?php echo @$email_from_address; ?>"
                               maxlength="50">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="txtServidorDNS">Endereço IP do Servidor DNS</label>
                        <input type="text" class="form-control" id="txtServidorDNS" name="txtServidorDNS"
                               placeholder="Endereço IP do Servidor DNS" value="<?php echo @$servidor_dns; ?>"
                               maxlength="10">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="txtMsgNotificacao">Mensagem de Notificação</label>
                        <textarea class="summernote" id="txtMsgNotificacao" name="txtMsgNotificacao"
                                  rows="4"><?php echo @$msg_notificacao; ?></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="txtMsgAlteracaoStatus">Mensagem de Validação/Revogação/Teste</label>
                        <textarea class="summernote" id="txtMsgAlteracaoStatus" name="txtMsgAlteracaoStatus"
                                  rows="4"><?php echo @$msg_alteracao_status; ?></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="txtMsgNotifQualidade">Mensagem de Notificação de Qualidade</label>
                        <textarea class="summernote" id="txtMsgNotifQualidade" name="txtMsgNotifQualidade"
                                  rows="4"><?php echo @$msg_notificacao_qualidade; ?></textarea>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
    <br/>
<?php
echo form_close();

if (@$tipo_de_autenticacao === 'banco') {
    echo '<script>window.onload = function () { selecionaTipoConfig("banco"); };</script>';
}

/* End of file configuracoes_view.php */
/* Location: ./application/views/configuracoes_view.php */