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
?>

<?php
/**
 * View mostrada na solicitacao de recuperacao de senha, avisando que uma
 * nova senha foi enviada ao email do usuario
 */
?>
<br />
<div class="center_table">

    <h3>Solicita&ccedil;&atilde;o de Recupera&ccedil;&atilde;o de Senha</h3>

    <p align='center'>
        <center>
            <?php echo $mensagem;?>
            <br />
            <br />
            <a href="<?=base_url()?>">Clique aqui para voltar à tela de entrada</a>
        </center>
    </p>
    <br /><br />
    <div class="clear"></div>
</div>