<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
 * Exibe uma view com o retorno da operacao realizada, e apos <x> segundos,
 * direciona para outra pagina.
 *
 * @param String $view - view de retorno a ser exibida
 * @param String $redirect - url de direcionamento apos a view ser exibida
 */
function exibeRetornoOperacao($view, $redirect)
{
    descarregaBuffer($view);

    $secWait = 1;
    sleep($secWait);

    $redirect = base_url() . $redirect;
    direcionaParaEndereco($redirect);
}

/**
 * Direciona a página para o endereço fornecido. O direcionamento é em JavaScript.
 *
 * @param string $endereco Endereço para qual o navegador precisa ser direcionado.
 */
function direcionaParaEndereco($endereco)
{
    echo '<script>window.location.href = \'' . $endereco . '\';</script>';
}

/**
 * Descarrega o output buffer do php, forçando a saída dos dados no browser.
 */
function descarregaBuffer($msg = null)
{
    if ($msg) {
        echo $msg;
    }
    
    ob_flush();
    flush();
}

/* End of file retorno_operacoes_helper.php */
/* Location: ./application/helpers/retorno_operacoes_helper.php */