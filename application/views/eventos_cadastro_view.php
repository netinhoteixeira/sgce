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

echo form_open_multipart(base_url() . 'eventos/salvar');
?>
<div class="row">
    <div class="col-sm-12">
        <h1><?php echo $titulo_pagina; ?></h1>
        <hr/>
        <?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
    </div>
</div>
<div class="row toolbar">
    <div class="col-sm-12">
        <div class="pull-right">
            <button type="submit" class="btn btn-danger pull-right"><i class="fas fa-save"></i> Salvar</button>
        </div>
        <button type="button" class="btn btn-primary"
                onclick="parent.location='<?php echo base_url() ?>eventos/cancelar'"><i class="fas fa-times"></i>
            Cancelar
        </button>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <fieldset>
            <legend>Dados Principais</legend>
            <div class="form-row">
                <div class="form-group md-form col-md-2">
                    <label for="txtId" class="disabled">C&oacute;digo</label>
                    <input type="text" class="form-control" id="txtId" name="txtId"
                           value="<?php echo @$evento->id_evento; ?>" disabled>
                </div>
                <div class="col-md-2">&nbsp;</div>
                <div class="form-group md-form col-md-4">
                    <label for="txtDtInclusao" class="disabled">Data de Inclus&atilde;o</label>
                    <input type="text" class="form-control" id="txtDtInclusao" name="txtDtInclusao"
                           value="<?php echo dataBR(@$evento->dt_inclusao); ?>" disabled>
                </div>
                <div class="form-group md-form col-md-4">
                    <label for="txtDtAlteracao" class="disabled">Data de Altera&ccedil;&atilde;o</label>
                    <input type="text" class="form-control" id="txtDtAlteracao" name="txtDtAlteracao"
                           value="<?php echo dataBR(@$evento->dt_alteracao); ?>" disabled>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group md-form col-md-8">
                    <label for="txtNome">Nome</label>
                    <input type="text" class="form-control" id="txtNome" name="txtNome"
                           value="<?php echo @$evento->nm_evento; ?>" maxlength="50">
                </div>
                <div class="form-group md-form col-md-4">
                    <label for="txtSigla">Sigla</label>
                    <input type="text" class="form-control" id="txtSigla" name="txtSigla"
                           value="<?php echo @$evento->sg_evento; ?>" maxlength="50">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group md-form col-md-2">
                    <label for="txtPeriodo">Período de Realização</label>
                    <input type="text" class="form-control" id="txtPeriodo" name="txtPeriodo"
                           value="<?php echo @$evento->de_periodo; ?>" maxlength="50">
                </div>
                <div class="form-group md-form col-md-2">
                    <label for="txtCarga">Carga Horária</label>
                    <input type="text" class="form-control" id="txtCarga" name="txtCarga"
                           value="<?php echo @$evento->de_carga; ?>" maxlength="50">
                </div>
                <div class="form-group md-form col-md-8">
                    <label for="txtLocal">Local de Realização</label>
                    <input type="text" class="form-control" id="txtLocal" name="txtLocal"
                           value="<?php echo @$evento->de_local; ?>" maxlength="50">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group md-form col-md-6">
                    <label for="txtURL">Site</label>
                    <input type="text" class="form-control" id="txtURL" name="txtURL"
                           value="<?php echo @$evento->de_url; ?>" maxlength="50">
                </div>
                <div class="form-group md-form col-md-6">
                    <label for="txtEmail">E-mail</label>
                    <input type="email" class="form-control" id="txtEmail" name="txtEmail"
                           value="<?php echo @$evento->de_email; ?>" maxlength="50">
                </div>
            </div>
        </fieldset>
        <?php if (@$evento->id_evento > 0) { ?>
        <fieldset>
            <legend>Organizadores</legend>

                <a href="javascript:exibeFormOrganizadores('<?php echo base_url() ?>');"
                   id="link_add_Organizadores">
                    <img src="<?php echo base_url() ?>assets/images/more_16.png"
                         alt="Adicionar Organizadores ao Evento" height="15" width="15"/><b>Adicionar Organizadores</b>
                </a><br/>

                <div id="newRegister">
                    <p>
                        <label for='txtOrganizadores'>Organizadores*:
                            <img id="loading_organizadores"
                                 src='<?php echo base_url() ?>assets/images/ajax-loader-branco.gif'/>
                        </label>
                        <br/>
                        <select name='txtOrganizadores[]' id='txtOrganizadores'
                                multiple='multiple' size="6" class="combo">
                            <option value="">Selecione os organizadores...</option>
                        </select>
                        <br/><br/>

                        <button type="button" onClick="javascript:addOrganizadoresTable(document.getElementById('txtId').value,
                                document.getElementById('txtOrganizadores'),
                                '<?php echo base_url() ?>');">
                            <img src='<?php echo base_url() ?>assets/images/disponivel_16.png'
                                 alt="Adicionar" height="15" width="15"/>Adicionar
                        </button>

                        <button type="button" onClick="javascript:cancelFormOrganizadores();">
                            <img src='<?php echo base_url() ?>assets/images/cancel_16.png'
                                 alt="Cancelar" height="15" width="15"/>Cancelar
                        </button>
                    </p>
                </div>

                <!-- Organizadores - Tabela -->
                <table border='0' class="center_table_interna" id="data_table_interna"
                       name="data_table_interna">
                    <tr class="linha_par">
                        <td width="50px"><b>C&oacute;digo</b></td>
                        <td><b>Organizador</b></td>
                        <td width="20px">
                            <center><b>Controlador</b></center>
                        </td>
                        <td width="20px">
                            <center><b>Excluir</b></center>
                        </td>
                    </tr>
                    <?php if (@$organizadores): ?>
                        <?php echo geraTabelaOrganizadores($organizadores, @$evento->id_evento); ?>
                    <?php endif; ?>
                </table>
                <br/>
        </fieldset>
    <?php } ?>
    </div>
</div>
<br/>
<script type="text/javascript" src='<?php echo base_url() ?>assets/js/eventos.js'></script>
<?php
echo form_close();

/* End of file eventos_cadastro_view.php */
/* Location: ./application/views/eventos_cadastro_view.php */