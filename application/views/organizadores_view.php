<?php
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
 * View de Lista de organizadores
 *
 * Utilizada para Listar organizadores cadastrados
 *
 * @author     Sergio Jr <sergiojunior@unipampa.edu.br
 *
 * @copyright Universidade Federal do Pampa - NTIC Campus Alegrete 2010
 *
 */
?>
<div id="searchRegister" class="center_table">
    <div id="pesq_message" class="form_left">
        <?php echo form_open('organizadores/listar'); ?>
        <p>Pesquisar por:</p>
        <input type='hidden' name='hdnPesquisa' id='hdnPesquisa' value='pesquisa'/>
        <select name="cmbPesquisa" id="cmbPesquisa">
            <option value="D">Nome</option>
            <option value="C">C&oacute;digo</option>
        </select>
        <input type='text' name='txtPesquisa' id='txtPesquisa' size='40' class="big_input"/>
        <button type="submit">
            <img src='<?php echo base_url() ?>application/views/includes/images/search.png'
                 alt="Executar pesquisa" height="15" width="15"/> Pesquisar
        </button>
        <i>(em branco para listar todos)</i>
        <?php echo form_close() ?>
    </div>
    <div class="clear"></div>
</div>

<div class="botoes_left">
    <button onclick="parent.location='<?php echo base_url() ?>organizadores/novo'" type="button" id="botao_novo">
        <img src='<?php echo base_url() ?>application/views/includes/images/more_32.png'
             alt="Novo"/><br>Novo
    </button>
</div>

<div class="titulo_right">
    <h1>Cadastro de Usuários</h1>
</div>

<table width="100%" border='0' class="center_table" id="data_table">
    <tr class="linha_par">
        <td width="80px"><b><a href="<?php echo base_url() . 'organizadores/ordenar/codigo' ?>">C&oacute;digo</a></b>
        </td>
        <td><b><a href="<?php echo base_url() . 'organizadores/ordenar/nome' ?>">Nome</a></b></td>
        <td width="50px"><b>Editar</b></td>
        <td width="50px"><b>Excluir</b></td>
    </tr>
    <?php if (@$mensagem): ?>
        <tr class="linha_par">
            <td width="80" colspan="6" align="center"><b><?php echo $mensagem ?></b></td>
        </tr>
    <?php endif; ?>

    <?php $i = 0; ?>
    <?php if (!@$mensagem): ?>
        <?php foreach ($organizadores as $row): ?>
            <?php
            $i++;
            if ($i % 2 == 0)
                $cor = "linha_par";
            else
                $cor = "linha_impar";
            ?>
            <tr class='<?php echo $cor ?>' id="linha_<?php echo $i ?>" onmouseover="overHighLight('<?php echo $i ?>')"
                onmouseout="outHighLight('#linha_<?php echo $i ?>')">
                <td><?php echo $row->id_organizador ?></td>
                <td><?php echo $row->nm_organizador ?></td>
                <td width="30">
                    <center>
                        <a href="<?php echo base_url() ?>organizadores/editar/<?php echo $row->id_organizador ?>"
                           class="edit_command" title="Editar">
                            <img src='<?php echo base_url() ?>application/views/includes/images/edit_16.png'
                                 border="0" alt="Editar"
                                 title="Editar"/>
                        </a>
                    </center>
                </td>
                <td width="30">
                    <center>
                        <a href="#"
                           onclick="javascript:confirmaExclusao('<?php echo base_url() ?>organizadores/excluir/<?php echo $row->id_organizador ?>','de <?php echo $row->nm_organizador ?>')"
                           class="delete" title="Excluir">
                            <img src='<?php echo base_url() ?>application/views/includes/images/cancel_16.png'
                                 border="0" alt="Excluir"
                                 title="Excluir"/>
                        </a>
                    </center>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>
<div class="paginacao"><?php echo @$paginacao; ?></div>
