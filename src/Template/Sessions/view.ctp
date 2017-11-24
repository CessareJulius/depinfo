<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="content-wrapper">
    <section class="content-header">
        <center><h3><i class="fa fa-male"> Datos del Empleado en Sesion</i></h3></center>
        <ol class="breadcrumb">
            <li>
              <?= $this->Html->Link('<i class="fa fa-home"></i> Inicio', 
                [
                    'controller' => 'Users',
                    'action' => 'home'
                ],
                [
                    'escape' => false
                ]) 
              ?>
            </li>
            <li>
              <?= $this->Html->Link('Sesiones', 
                [
                    'controller' => 'Sessions',
                    'action' => 'index'
                ],
                [
                    'escape' => false
                ]) 
              ?>
            </li>
            <li class="active">Datos del Empleado en Sesion</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Datos Personales</h3>&nbsp;&nbsp;
                    </div>
                    <div class="box-body">
                        <dl>
                            <dt>Cedula</dt>
                                <dd>&nbsp;&nbsp;<?= $session->user->persona->cedula ?></dd>
                                <br>

                            <dt>Nombre(s)</dt>
                                <dd>&nbsp;&nbsp;<?= $session->user->persona->nombre ?></dd>
                                <br>

                            <dt>Apellido(s)</dt>
                                <dd>&nbsp;&nbsp;<?= $session->user->persona->apellido ?></dd>
                                <br>
                        </dl>
                        <?= $this->Form->postLink(__('Volver'), ['action' => "index"],['Class' => 'btn btn-info btn-sm']) ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Datos de la Sesion</h3>&nbsp;&nbsp;
                        <?= $this->Form->postLink(__('Terminar'), [
                            'controller' => 'Users', 'action' => "closedSession", $session->user_id
                            ], 
                            [
                                'Class' => 'btn btn-danger btn-sm'
                            ], 
                            ['confirm' => __('Esta seguro que desea terminar esta sesion?')]) 
                        ?>
                    </div>
                    <div class="box-body">
                        <dl>

                            <dt>Status</dt>
                                <dd>&nbsp;&nbsp;<?= $session->status ?></dd>
                                <br>

                            <dt>Usuario</dt>
                                <dd>&nbsp;&nbsp;<?= $session->user->usuario ?></dd>
                                <br>

                            <dt>Creada</dt>
                                <dd>&nbsp;&nbsp;<?= $session->created->nice() ?></dd>
                                <br>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
