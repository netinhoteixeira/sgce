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
 * View de Lista de certificados
 *
 * Utilizada para Listar certificados cadastrados
 *
 * @author     Pedro Conrad Jr. <pedro.junior@unipampa.edu.br>
 * @author     Sergio Jr <sergiojunior@unipampa.edu.br
 *
 * @copyright Universidade Federal do Pampa - NTIC Campus Alegrete 2010
 *
 */
?>
<script type="text/javascript"
        src='<?php echo base_url() ?>assets/js/certificados.js'></script>

<div id="searchRegister" class="center_table">
    <div id="pesq_message" class="form_left">
        <?php echo form_open('certificados/listaCertificadosPublicos'); ?>
        <p>Pesquisar por:</p>
        <input type='hidden' name='hdnPesquisa' id='hdnPesquisa' value='pesquisa'/>
        <select name="cmbPesquisa" id="cmbPesquisa">
            <option value="D">Pessoa</option>
        </select>
        <input type='text' name='txtPesquisa' id='txtPesquisa' size='40' class="big_input"/>
        <button type="submit">
            <img src='<?php echo base_url() ?>assets/images/search.png'
                 alt="Executar pesquisa" height="15" width="15"/> Pesquisar
        </button>
        <i>(em branco para listar todos)</i>
        <?php echo form_close() ?>
    </div>
    <div class="clear"></div>
</div>

<div class="botoes_left">
    <button onclick="parent.location='<?php echo base_url() ?>certificados/listaPublica'"
            type="button" id="botao_cancelar">
        <img src='<?php echo base_url() ?>assets/images/seta_voltar_32.png'
             alt="Voltar"/><br>Voltar
    </button>
</div>

<div class="titulo_right">
    <h3>Listagem de Certificados - <?php echo @$nome_evento ?></h3>
</div>

<table width="100%" border='0' class="center_table" id="data_table">
    <tr class="linha_par">
        <td><b>Pessoa</b></td>
        <td><b>Tipo de Certificado</b></td>
        <td width="50px"><b>Emitir</b></td>
    </tr>
    <?php if (@$mensagem): ?>
        <tr class="linha_par">
            <td width="80" colspan="11" align="center"><b><?php echo $mensagem ?></b></td>
        </tr>
    <?php endif; ?>

    <?php $i = 0; ?>
    <?php if (!@$mensagem): ?>
        <?php foreach ($certificados as $row): ?>
            <?php
            $i++;
            if ($i % 2 == 0)
                $cor = "linha_par";
            else
                $cor = "linha_impar";
            ?>
            <tr class='<?php echo $cor ?>' id="linha_<?php echo $i ?>" onmouseover="overHighLight('<?php echo $i ?>')"
                onmouseout="outHighLight('#linha_<?php echo $i ?>')">
                <td><?php echo $row->nm_participante ?></td>
                <td><?php echo $row->nm_modelo ?></td>
                <td>
                    <center>
                        <a href="<?php echo base_url() ?>certificados/validar/<?php echo $row->de_hash ?>">
                            <img src='<?php echo base_url() ?>assets/images/comprovante_16.png'
                                 border="0" alt="Visualizar detalhes"
                                 title="Visualizar detalhes">
                        </a>
                    </center>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>
<div class="paginacao"><?php echo @$paginacao; ?></div>