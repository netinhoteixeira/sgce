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
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
<?php
/*
    <link rel="icon" href="../../../../favicon.ico">


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="pt-br" lang="pt-br" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <META HTTP-EQUIV="pragma" CONTENT="no-cache"/>
    <meta http-equiv="Cache-control" content="no-cache"/>
    <!--    <link rel="stylesheet" href='--><?php //echo base_url() ?><!--assets/css/menu.css' type="text/css"/>-->
    <link rel="stylesheet" href='<?php echo base_url() ?>assets/css/estilo_admin.css' type="text/css"/>
    <!--    <script type="text/javascript" src='--><?php //echo base_url() ?><!--assets/js/jquery.js'></script>-->
    <!--    <script type="text/javascript" src='--><?php //echo base_url() ?><!--assets/js/menu.js'></script>-->
    <script type="text/javascript" src='<?php echo base_url() ?>assets/js/admin.js'></script>
*/
?>
    <link rel="stylesheet" href='<?php echo base_url() ?>assets/css/estilo_admin.css' type="text/css"/>
    <link rel="stylesheet" href='<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css' type="text/css"/>
    <link rel="stylesheet" href='<?php echo base_url() ?>assets/mdb/css/mdb.css' type="text/css"/>
    <link rel="stylesheet" href='<?php echo base_url() ?>assets/selecty/dist/css/selecty.min.css' type="text/css"/>
    <link rel="stylesheet" href='<?php echo base_url() ?>assets/summernote/dist/summernote-bs4.css' type="text/css"/>

    <style>
        .row.toolbar {
            margin-top: 1em;
            margin-bottom: 1em;
        }

        .pull-left {
            float: left;
        }

        .pull-right {
            float: right;
        }

        .note-editor.note-frame {
            border: 1px solid #ced4da;
            border-radius: .25rem;
        }

        .note-editor .btn-light {
            background: transparent !important;
        }

        .note-editor .btn, .note-editor .btn.disabled:active, .note-editor .btn.disabled:focus, .note-editor .btn.disabled:hover, .note-editor .btn:disabled:active, .note-editor .btn:disabled:focus, .note-editor .btn:disabled:hover {
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        .note-editor .btn:hover {
            -webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
        }

        .note-popover {
            display: none;
        }

        .message_field {
            font-weight: bold;
        }

        .search_form button {
            height: 38px;
        }

        .table td, .table th {
            vertical-align: middle;
        }

        /* Sticky footer styles
        -------------------------------------------------- */
        html {
            position: relative;
            min-height: 100%;
        }

        body {
            /* Margin bottom by footer height */
            margin-bottom: 60px;
        }

        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            /* Set the fixed height of the footer here */
            height: 60px;
            line-height: 60px; /* Vertically center the text there */
            background-color: #f5f5f5;
        }

        /* Custom page CSS
        -------------------------------------------------- */
        /* Not required for template or sticky footer method. */

        body > .container {
            padding: 60px 15px 0;
        }

        .footer > .container {
            padding-right: 15px;
            padding-left: 15px;
        }

        code {
            font-size: 80%;
        }

        /** Selecty Fix **/
        .selecty .selecty-selected {
            /*height: 32px;*/
            /*line-height: 32px;*/
            height: 38.6px;
            line-height: 38.6px;
            border-bottom: 1px solid #ced4da;
        }

        .selecty .selecty-selected::after {
            border-top: 4px dashed #212529;
        }

        .form-group.md-style {
            position: relative;
            margin-top: 1.5rem;
        }

        .form-group.md-style label {
            position: absolute;
            top: 0.65rem;
            left: 4px;
            -webkit-transition: 0.2s ease-out;
            -o-transition: 0.2s ease-out;
            transition: 0.2s ease-out;
            cursor: text;
            color: #757575;
            font-size: 0.8rem;
            -webkit-transform: translateY(-140%);
            -ms-transform: translateY(-140%);
            transform: translateY(-140%);
        }

        /** MDB Fix **/
        .md-form label {
            left: 4px;
        }
    </style>

    <title><?php echo SIGLA_SISTEMA . ' - ' . NOME_SISTEMA ?></title>
</head>
<body>
<?php $this->load->view('includes/templates/header_view'); ?>

<main role="main" class="container">
    <?php
    if (isset($corpo_pagina)) {
        $this->load->view($corpo_pagina);
    }

    var_dump($corpo_pagina);
    ?>
</main>

<?php $this->load->view('includes/templates/footer_view'); ?>

<script type="text/javascript" src='<?php echo base_url() ?>assets/jquery/jquery-3.3.1.min.js'></script>
<script type="text/javascript" src='<?php echo base_url() ?>assets/bootstrap/js/bootstrap.bundle.min.js'></script>
<script type="text/javascript" src='<?php echo base_url() ?>assets/mdb/js/popper.min.js'></script>
<script type="text/javascript" src='<?php echo base_url() ?>assets/mdb/js/mdb.js'></script>
<script type="text/javascript" src='<?php echo base_url() ?>assets/selecty/dist/js/selecty.min.js'></script>
<script type="text/javascript" src='<?php echo base_url() ?>assets/summernote/dist/summernote-bs4.min.js'></script>
<script type="text/javascript" src='<?php echo base_url() ?>assets/summernote/dist/lang/summernote-pt-BR.min.js'></script>
<script>
    $(document).ready(function () {
        $('select').selecty();

        $('.summernote').summernote({
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                // ['font', ['strikethrough', 'superscript', 'subscript']],
                // ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                // ['height', ['height']],
            ],
            lang: 'pt-BR',
            followingToolbar: false
        });
    });

    function confirmaExclusao(url, nome) {
        if (window.confirm("Confirmar a exclusão " + nome + " ?"))
            window.location.href = url;
    }

    function confirmaClonagem(url, nome) {
        if (window.confirm("Confirma a clonagem " + nome + " ?"))
            window.location.href = url;
    }

    function confirmaRestauracaoConfig(url) {
        if (window.confirm("Confirmar a restauração da configuração padrão?")) {
            window.location.href = url;
        }
    }

    function selecionaTipoConfig(config) {
        if (config === 'banco') {
            $('#configLDAP').hide('fast');
        } else {
            $('#configLDAP').show('fast');
        }
    }
</script>
</body>
</html>