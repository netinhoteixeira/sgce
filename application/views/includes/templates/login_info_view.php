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
 * Description of logininfo_view
 *
 * @author Pedro Conrad Jr
 */
?>
<ul class="navbar-nav ml-auto">
    <li class="nav-item active">
        <a class="nav-link"><?php echo $this->session->userdata('uid'); ?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>manual/manual-sgce.pdf" target="_blank">Manual</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>sistema/logout">Sair</a>
    </li>
</ul>