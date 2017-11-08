<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>
<div class="content-wrapper">
    <section class="content-header">
        <center><h3><i class="fa fa-male"> Datos del Cliente</i></h3></center>
        <ol class="breadcrumb">
            <li>
              <?= $this->Html->Link('<i class="fa fa-dashboard"></i> Inicio', 
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
              <?= $this->Html->Link('Clientes', 
                [
                    'controller' => 'Clientes',
                    'action' => 'index'
                ],
                [
                    'escape' => false
                ]) 
              ?>
            </li>
            <li class="active">Datos del Cliente</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Datos Personales</h3>&nbsp;&nbsp;
                        <?= $this->Html->link(__('Editar'), 
                            [
                                'action' => 'edit', $cliente->id
                            ], 
                            [
                                'Class' => 'btn btn-primary btn-sm'
                            ]) 
                        ?>
                    </div>
                    <div class="box-body">
                        <dl>
                            <dt>Cedula</dt>
                                <dd>&nbsp;&nbsp;<?= $cliente->persona->cedula ?></dd>
                                <br>

                            <dt>Nombre(s)</dt>
                                <dd>&nbsp;&nbsp;<?= $cliente->persona->nombre ?></dd>
                                <br>

                            <dt>Apellido(s)</dt>
                                <dd>&nbsp;&nbsp;<?= $cliente->persona->apellido ?></dd>
                                <br>

                            <dt>Telefono</dt>
                                <dd>&nbsp;&nbsp;<?= $cliente->persona->telefono ?></dd>
                                <br>

                            <dt>Creado</dt>
                                <dd>&nbsp;&nbsp;<?= $cliente->persona->created->nice() ?></dd>
                                <br>

                            <dt>Modificado</dt>
                                <dd>&nbsp;&nbsp;<?= $cliente->persona->modified->nice() ?></dd>
                        </dl>
                    </div>
                </div>
            </div>
    
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <center><h3 class="box-title">Registro de sus Equipos </h3></center>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Rgistrados:</label>
                            2
                        </div>
                        <div class="form-group">
                            <label>En Reparacion:</label>
                            1
                        </div>
            
                        <div class="form-group">
                            <label>Entregados:</label>
                            1
                        </div>
            
                        <div class="form-group">
                            <label>Sin Retirar:</label>
                            0
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>




