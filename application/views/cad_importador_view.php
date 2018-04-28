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
 * View de Cadastro de Importacao
 *
 *
 * @author     Pedro Conrad Jr. <pedro.junior@unipampa.edu.br>
 * @author     Sergio Jr <sergiojunior@unipampa.edu.br
 *
 * @copyright Universidade Federal do Pampa - NTIC Campus Alegrete 2010
 *
 */

?>
<?php echo validation_errors('<div class="error">', '</div>'); ?>
<?php echo form_open_multipart(base_url() . 'participantes/uploadRetorno'); ?>
    <div class="botoes_left">
        <button type="submit" id="botao_salvar" name="botao_salvar">
            <img src='<?php echo base_url() ?>assets/images/import_32.png'
                 alt="Salvar"/><br>Importar
        </button>

        <button onclick="javascript:abrirPopup('<?php echo base_url() ?>participantes/historicoImportacao/'+document.getElementById('txtModelo').value, 950, 300);"
                title="Visualizar o histórico de importações referentes ao modelo de certificado" type="button">
            <img src='<?php echo base_url() ?>assets/images/historico_32.png'
                 alt="Historico"/><br>Histórico
        </button>

        <button onclick="parent.location='<?php echo base_url() ?>sistema/principal'"
                type="button" id="botao_cancelar">
            <img src='<?php echo base_url() ?>assets/images/seta_voltar_32.png'
                 alt="Voltar"/><br>Voltar
        </button>
    </div>


    <div class="titulo_right"><h1>Importação de Dados</h1></div>
    <div class="center_table">
        <div class="form_left">
            <p>
                <label for='txtEvento'>Evento*: </label>
                <select name="txtEvento" class="combo"
                        onChange="carregaModelosEvento(this.value,
                                'loading_modelos',
                                '<?php echo base_url() ?>',
                                'txtModelo',
                                'instrucoes_importacao')">
                    <option value="">Selecione...</option>
                    <?php if (@$eventos): ?>
                        <?php foreach ($eventos as $evento): ?>
                            <option value="<?php echo $evento->id_evento; ?>"><?php echo $evento->nm_evento ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
                <br/><br/>

                <label for='txtModelo'>Modelo de Certificado*: </label>
                <select name="txtModelo" id="txtModelo" class="combo"
                        onChange="carregaInstrucoesImportacao(this.value,
                                'loading_instrucoes',
                                '<?php echo base_url() ?>',
                                'instrucoes_importacao')"> >
                    <option value="">Selecione...</option>
                </select>
                <img id="loading_modelos" class="loading"
                     src='<?php echo base_url() ?>assets/images/ajax-loader-preto.gif'/>
                <br/><br/>

                <label for="txtNotificarControladores">Notificar Controladores?</label>
                <select name="txtNotificarControladores">
                    <option value="N">Não</option>
                    <option value="S">Sim</option>
                </select> <span class="instrucao_campo">Marque 'Sim', caso deseje que os controladores de qualidade sejam notificados por e-mail.</span>
                <br/><br/>

                <label for="txtDuplicados">Permitir registros duplicados?</label>
                <select name="txtDuplicados">
                    <option value="N">Não</option>
                    <option value="S">Sim</option>
                </select>
                <br/><br/>

                <label for='txtArquivo'>Arquivo*: </label>
                <input name="txtArquivo" type="file" id="txtArquivo" size="50"
                       title="Extensões suportadas: .CSV"/>
                <br/><br/>

                <label>Formato de Arquivo Suportado: </label>
                CSV (Campos Separados por Vírgula).
                <br/><br/><br/>

                <img id="loading_instrucoes" class="loading"
                     src='<?php echo base_url() ?>assets/images/ajax-loader-preto.gif'/>
            <div id="instrucoes_importacao">
            </div>
            <br/>
            </p>
            <p class="aviso">* Campos Obrigat&oacute;rios</p>
        </div>
        <div class="clear"></div>
    </div>
<?php echo form_close() ?>