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
 * View de Lista de participantes
 *
 * Utilizada para Listar participantes cadastrados
 *
 * @author     Pedro Conrad Jr. <pedro.junior@unipampa.edu.br>
 * @author     Sergio Jr <sergiojunior@unipampa.edu.br
 * @author     Francisco Ernesto Teixeira <me@francisco.pro>
 *
 * @copyright Universidade Federal do Pampa - NTIC Campus Alegrete 2010
 */
?>
<div class="row">
    <div class="col-sm-12">
        <div class="pull-right">
            <button type="button" class="btn btn-light pull-right"
                    onclick="parent.location='<?php echo base_url(); ?>participantes/novo'">Adicionar
            </button>
        </div>
        <h1>Cadastro de Participantes</h1>
        <hr/>
        <?php //echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?php if (isset($mensagem)) { ?>
            <div class="alert alert-info" role="alert"><?php echo $mensagem; ?></div>
        <?php } ?>
    </div>
</div>

<?php echo form_open('participantes/listar'); ?>
<div class="search_form">
    <input type='hidden' name='hdnPesquisa' id='hdnPesquisa' value='pesquisa'/>
    <div class="row">
        <div class="col-sm-12">
            <fieldset>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="cmbPesquisa">Termo</label>
                        <select class="form-control" id="cmbPesquisa" name="cmbPesquisa">
                            <option value="D">Nome</option>
                            <option value="C">Código</option>
                            <option value="E">Evento</option>
                            <!--
                            <option value="mista" <?php echo (@$tipo_de_autenticacao == 'mista') ? ' selected' : ''; ?>>
                                Mista
                            </option>
                            -->
                        </select>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="txtPesquisa">Pesquisar por</label>
                        <input type="text" class="form-control" id="txtPesquisa" name="txtPesquisa"
                               placeholder="Pesquisar por" value="" maxlength="50">
                        <small id="txtPesquisaHelp" class="form-text text-muted">Em branco para listar todos.</small>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="btnPesquisaSubmit">&nbsp;</label>
                        <button type="submit" class="form-control btn btn-block btn-primary pull-right">
                            Pesquisar
                        </button>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>
<?php echo form_close(); ?>

<!--Table-->
<table class="table table-hover">

    <!--Table head-->
    <thead>
    <tr>
        <th><a href="<?php echo base_url('participantes/ordenar/codigo'); ?>">C&oacute;digo</a></th>
        <th><a href="<?php echo base_url('participantes/ordenar/evento'); ?>">Evento</a></th>
        <th><a href="<?php echo base_url('participantes/ordenar/nome'); ?>">Nome</a></th>
        <th></th>
    </tr>
    </thead>
    <!--Table head-->

    <!--Table body-->
    <tbody>
    <?php if (!isset($mensagem)) { ?>
        <?php foreach ($eventos as $row) { ?>
            <tr>
                <th scope="row"><?php echo $row->id_participante; ?></th>
                <td><?php echo $row->nm_evento; ?></td>
                <td><?php echo $row->nm_participante; ?></td>
                <td>
                    <div class="pull-right">
                        <button type="button" class="btn btn-sm btn-primary"
                                onclick="location.href='<?php echo base_url('participantes/editar/' . $row->id_participante); ?>'">
                            Editar
                        </button>
                        <button type="button" class="btn btn-sm btn-danger"
                                onclick="confirmaExclusao('<?php echo base_url('participantes/excluir/' . $row->id_participante); ?>','de <?php echo $row->nm_participante; ?>')">
                            Excluir
                        </button>
                    </div>
                </td>
            </tr>
        <?php } ?>
    <?php } ?>
    </tbody>
    <!--Table body-->

</table>
<!--Table-->

<div class="paginacao"><?php echo @$paginacao; ?></div>