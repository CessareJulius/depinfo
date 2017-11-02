<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Departamento de Informatica
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['../materialize/css/materialize.min', '../materialize/fonts/iconfont/material-icons']) ?>
    <?= $this->Html->css('estilos') ?>

    <?= $this->Html->script(['jquery.min','bootstrap.min']) ?>
    <?= $this->Html->script(['../materialize/js/materialize.min', 'app']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <?= $this->element('modales') ?>
    <div class="row">
        <nav class="nav-wrapper blue lighten-1">
            <div>
                <h4 class="brand-logo center dercha">Departamento de Informática</h4>
            </div>
            <div class="row">
                <div class="right">
                    <a href="../index.php" class="waves-effect tooltipped" data-position="left" data-delay="50" data-tooltip="Salir"><i class="material-icons">launch
                    </i></a>
                </div>
            </div>
        </nav>
        <?= $this->element('menu') ?>
    </div>
    <!--menu desplegable-->
    <div class="fixed-action-btn vertical click-to-toggle">
        <a class="waves-effect waves-light btn-floating btn-large blue tooltipped" data-position="left" data-delay="50" data-tooltip="Menu de Administrador">
            <i class="large material-icons">add</i>
        </a>
        <ul>
            <li><a class="waves-effect waves-light btn-floating green tooltipped" data-position="left" data-delay="50" data-tooltip="Agregar Equipo" href="#agregar"><i class="material-icons">laptop</i></a></li>
            <li><a class="waves-effect waves-light btn-floating cyan tooltipped" data-position="left" data-delay="50" data-tooltip="Agregar Personal" href="#agregar_pers"><i class="material-icons">group_add</i></a></li>
            <li><a class="waves-effect waves-light btn-floating red tooltipped" data-position="left" data-delay="50" data-tooltip="Ver todos los equipos" href="#tabla"><i class="material-icons">view_headline</i></a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col m9 offset-m3">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </div>
    <script>
		$(document).ready(function() {
			$('.modal').modal();			
		
			$('select').material_select();
		});
	</script>
</body>
</html>
