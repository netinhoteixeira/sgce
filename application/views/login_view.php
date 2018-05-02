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
 * View de Entrada no sistema (Login)
 * Utilizado como tela inicial, para entrada de usuarios autorizados
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
        <?php if (isset($mensagem)) { ?>
            <div class="alert alert-danger" role="alert"><?php echo $mensagem; ?></div>
        <?php } ?>
        <?php if (isset($retorno)) { ?>
            <div class="alert alert-danger" role="alert"><?php echo $retorno; ?></div>
        <?php } ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-6" style="display: none;">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Autenticação/Emissão do Certificado</h5>
                <p class="card-text">Forneça as informações necessárias para a autenticação ou emissão do seu certificado.</p>
                <?php echo form_open('certificados/recebeCodigo'); ?>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="txtHash">Código de Identicação</label>
                        <input type="text" class="form-control" id="txtHash" name="txtHash"
                               placeholder="Código de Identicação" value="" maxlength="50">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="txtOperacaoValidar" id="txtOperacaoValidar" value="validar" checked>
                            <label class="form-check-label" for="txtOperacaoValidar">Validar Certificado</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="txtOperacao" id="txtOperacaoEmitir" value="emitir">
                            <label class="form-check-label" for="txtOperacaoEmitir">Emitir Certificado</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Fazer Pedido</button>
                <br/>
                <a href="<?php echo base_url('listaPublica'); ?>" class="card-link">Não recebi nenhum código</a>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Acessar</h5>
                <p class="card-text">Forneça as informações necessárias para o acessar a área restrita do sistema.</p>
                <?php echo form_open('sistema/login'); ?>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="login">Usuário</label>
                        <input type="text" class="form-control" id="login" name="login"
                               placeholder="Usuário" value="" maxlength="50">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha"
                               placeholder="Senha" value="" maxlength="50">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                <br/>
<!--                <a href="--><?php //echo base_url('sistema/recuperarSenha'); ?><!--" class="card-link">Esqueci a senha</a>-->
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-sm-4"></div>
</div>
<br/>