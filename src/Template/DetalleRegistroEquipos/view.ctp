<style>
    .dl-contain{
        margin-left: 10px;
        margin-top: 10px;
    }
    .dl-contain > dt {
        font-size: 14px;
    }
    .dl-contain > dd {
        margin-left: 10px;
        font-size: 14px;
    }
    div > #editButton {
        margin-left: 10%;
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
        <center>
            <h3><i class="fa fa-male"> Datos del Registro</i></h3>
        </center>
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
              <?= $this->Html->Link('Registros', 
                [
                    'controller' => 'DetalleRegistroEquipos',
                    'action' => 'index'
                ],
                [
                    'escape' => false
                ]) 
              ?>
            </li>
            <li class="active">Datos del Registro</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="box box-info direct-chat direct-chat-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Datos del Registro</h3>
                                <?= $this->Html->link(__('Editar'), [
                                                'controller' => 'DetalleRegistroEquipos',
                                                'action' => 'edit', $detalleRegistroEquipo->id
                                            ], [
                                                'id' => 'editButton',
                                                'Class' => 'btn btn-primary btn-sm'
                                            ]) 
                                        ?>
                            </div>
                            <div class="box-body">
                                <dl class="dl-contain" >
                                    <dt>Codigo</dt>
                                        <dd>&nbsp;&nbsp;<?= $detalleRegistroEquipo->registro_equipo->Codigo ?></dd>
                                        <br>
                                    
                                    <dt>Falla</dt>
                                        <dd>&nbsp;&nbsp;<?= $detalleRegistroEquipo->falla ?></dd>
                                        <br>

                                    <?php if ($detalleRegistroEquipo->reparacion != null): ?>
                                    <dt>Reparacion</dt>
                                        <dd>&nbsp;&nbsp;<?= $detalleRegistroEquipo->reparacion ?></dd>
                                        <br>
                                    <?php else: ?>
                                    <dt>Reparacion</dt><center>
                                        <?= $this->Html->link(__('Agregar Reparacion'), [
                                                'controller' => 'DetalleRegistroEquipos',
                                                'action' => 'addReparacion',$detalleRegistroEquipo->id
                                            ], [
                                                'Class' => 'btn btn-warning btn-sm'
                                            ]) 
                                        ?></center>
                                    <?php endif ?>

                                    <dt>Status</dt>
                                        <dd>&nbsp;&nbsp;<?= $detalleRegistroEquipo->status ?></dd>
                                        <br>
                                    
                                    <dt>Creado</dt>
                                        <dd>&nbsp;&nbsp;<?= $detalleRegistroEquipo->created->nice() ?></dd>
                                        <br>

                                    <dt>Modificado</dt>
                                        <dd>&nbsp;&nbsp;<?= $detalleRegistroEquipo->modified->nice() ?></dd>
                                        </dl>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box box-info direct-chat direct-chat-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Datos del Cliente</h3>
                                <?= $this->Html->link(__('Editar'), 
                                    [
                                        'controller' => 'Personas',
                                        'action' => 'edit', $detalleRegistroEquipo->registro_equipo->persona->id
                                    ], 
                                    [
                                        'style' => 'margin-left: 15%;',
                                        'Class' => 'btn btn-primary btn-sm'
                                    ]) 
                                ?>
                            </div>
                            <div class="box-body">
                                <dl class="dl-contain" >
                                    <dt>Cedula</dt>
                                        <dd>&nbsp;&nbsp;<?= $detalleRegistroEquipo->registro_equipo->persona->cedula ?></dd>
                                        <br>

                                    <dt>Nombre</dt>
                                        <dd>&nbsp;&nbsp;<?= $detalleRegistroEquipo->registro_equipo->persona->nombre ?></dd>
                                        <br>

                                    <dt>Apellido</dt>
                                        <dd>&nbsp;&nbsp;<?= $detalleRegistroEquipo->registro_equipo->persona->apellido ?></dd>
                                        <br>

                                    <dt>Telefono</dt>
                                        <dd>&nbsp;&nbsp;<?= $detalleRegistroEquipo->registro_equipo->persona->telefono ?></dd>
                                        <br>
                                    
                                    <dt>Creado</dt>
                                        <dd>&nbsp;&nbsp;<?= $detalleRegistroEquipo->registro_equipo->persona->created->nice() ?></dd>
                                        <br>

                                    <dt>Modificado</dt>
                                        <dd>&nbsp;&nbsp;<?= $detalleRegistroEquipo->registro_equipo->persona->modified->nice() ?></dd>
                                        </dl>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box box-info direct-chat direct-chat-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Datos del Equipo</h3>
                                <?= $this->Html->link(__('Editar'), 
                                    [
                                        'controller' => 'Equipos',
                                        'action' => 'edit', $detalleRegistroEquipo->equipo->id
                                    ], 
                                    [
                                        'style' => 'margin-left: 15%;',
                                        'Class' => 'btn btn-primary btn-sm'
                                    ]) 
                                ?>
                                    </div>
                            <div class="box-body">
                                <dl class="dl-contain" >
                                    <dt>Serial</dt>
                                        <dd>&nbsp;&nbsp;<?= $detalleRegistroEquipo->equipo->serial ?></dd>
                                        <br>

                                    <dt>Tipo</dt>
                                        <dd>&nbsp;&nbsp;<?= $detalleRegistroEquipo->equipo->tipo ?></dd>
                                        <br>

                                    <dt>Marca</dt>
                                        <dd>&nbsp;&nbsp;<?= $detalleRegistroEquipo->equipo->marca ?></dd>
                                        <br>

                                    <dt>Modelo</dt>
                                        <dd>&nbsp;&nbsp;<?= $detalleRegistroEquipo->equipo->modelo ?></dd>
                                        <br>
                                        
                                    <?php if ($detalleRegistroEquipo->equipo->departamento != null):?>
                                    <dt>Departamento</dt>
                                        <dd>&nbsp;&nbsp;<?= $detalleRegistroEquipo->equipo->departamento ?></dd>
                                        <br>
                                    <?php endif ?>

                                    <dt>Status</dt>
                                        <dd>&nbsp;&nbsp;<?= $detalleRegistroEquipo->equipo->status ?></dd>
                                        <br>
                                    
                                    <dt>Creado</dt>
                                        <dd>&nbsp;&nbsp;<?= $detalleRegistroEquipo->equipo->created->nice() ?></dd>
                                        <br>

                                    <dt>Modificado</dt>
                                        <dd>&nbsp;&nbsp;<?= $detalleRegistroEquipo->equipo->modified->nice() ?></dd>
                                        </dl>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box box-info direct-chat direct-chat-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Datos del Empleado</h3>
                            </div>
                            <div class="box-body">
                                <dl class="dl-contain" >
                                    <dt>Nombre</dt>
                                        <dd>&nbsp;&nbsp;<?= $detalleRegistroEquipo->registro_equipo->user->persona->nombre ?></dd>
                                        <br>

                                    <dt>Apellido</dt>
                                        <dd>&nbsp;&nbsp;<?= $detalleRegistroEquipo->registro_equipo->user->persona->apellido ?></dd>
                                        <br>

                                    <dt>Usuario</dt>
                                        <dd>&nbsp;&nbsp;<?= $detalleRegistroEquipo->registro_equipo->user->usuario ?></dd>
                                        <br>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="control-sidebar-bg"></div>