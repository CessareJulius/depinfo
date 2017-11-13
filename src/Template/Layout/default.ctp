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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Departamento de Informatica
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css([
        '../template/bootstrap/dist/css/bootstrap.min', 
        '../template/font-awesome/css/font-awesome.min', 
        '../template/Ionicons/css/ionicons.min']) ?>
    <?= $this->Html->css([
        '../template/datatables.net-bs/css/dataTables.bootstrap.min',
        '../template/plugins/iCheck/all', 
        '../template/dist/css/AdminLTE.min', 
        '../template/plugins/iCheck/square/blue', 
        '../template/dist/css/skins/_all-skins.min']) ?>


    <?= $this->Html->script([
        'jquery.min', 
        '../template/bootstrap/dist/js/bootstrap.min']) ?>

    <?= $this->Html->script([
        '../template/plugins/iCheck/icheck.min',
        '../template/datatables.net/js/jquery.dataTables',
        '../template/datatables.net-bs/js/dataTables.bootstrap.min', 
        '../template/jquery-slimscroll/jquery.slimscroll.min',
        '../template/plugins/iCheck/icheck.min', 
        '../template/fastclick/lib/fastclick']) ?>

    <?= $this->Html->script([
        '../template/dist/js/adminlte.min', 
        '../template/dist/js/demo']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<?php
    if (empty($current_user)){
?>
    <body class="hold-transition login-page">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    <script>
        $(function () {
            $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
            });
        });
    </script>
<?php
    }else{
?>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?= $this->element('nav') ?>
            <?= $this->element('menu') ?>

            
            <?= $this->fetch('content') ?>
            
            <?= $this->element('asideConfPage') ?>
            <?= $this->element('footer') ?>
        </div>
    <script>
        $(document).ready(function () {
            $('.sidebar-menu').tree()
        })
    </script>
    <script>
        $(function () {
            $('#example1').DataTable()
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass   : 'iradio_flat-green'
                })
        })
    </script>
<?php    
    } 
?>
</body>
</html>
