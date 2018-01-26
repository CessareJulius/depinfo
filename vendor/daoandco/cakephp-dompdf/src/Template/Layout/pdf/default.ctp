<!DOCTYPE html>
<html>
    <head>
        <?= $this->fetch('head') ?>
        <?= $this->Dompdf->css(
        '../template/bootstrap/dist/css/bootstrap.min') ?>
        <?= $this->Dompdf->css(
        '../template/datatables.net-bs/css/dataTables.bootstrap.min') ?>
        <?= $this->Dompdf->css(
        '../template/dist/css/AdminLTE.min') ?>
        <?= $this->Dompdf->css(
        '../template/dist/css/skins/_all-skins.min') ?>

        <?= $this->Html->css([
        '../template/plugins/iCheck/all',
        '../template/plugins/iCheck/square/blue']) ?>

        <?= $this->Dompdf->css('dompdf', true) ?>
        <style><?= $this->fetch('style') ?></style>
    </head>
    <body>
        <div class="header"><?= $this->fetch('header') ?></div>
        <div id="content" class="container">
            <?= $this->fetch('content') ?>
        </div>
        <div class="footer"><?= $this->fetch('footer') ?></div>
        
    </body>
</html>