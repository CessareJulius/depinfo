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
    <?= $this->Html->script('../materialize/js/materialize.min') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav>
		<div class="nav-wrapper blue lighten-1">
			<h4 class="brand-logo center">Departamento de Informática</h4>
		</div>
	</nav>
    <?= $this->Flash->render() ?>
    <div class="row">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
