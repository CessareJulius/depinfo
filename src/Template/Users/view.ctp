<?php
/**
* @var \App\View\AppView $this
* @var \App\Model\Entity\User $user
*/
?>
<style type="text/css">
    i#title {
        margin-left: 22%;
    }
    a#pdf {
        margin-left: 58%;
    }
    .content-header {
        padding-bottom: 15px !important;
    }
</style>

<div class="content-wrapper">
    <section class="content-header"> 
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
              <?= $this->Html->Link('Empleados', 
                  [
                      'controller' => 'Users',
                      'action' => 'index'
                  ],
                  [
                      'escape' => false
                  ]) 
                  ?>
            </li>
            <li class="active">Datos del Empleado</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <?= $this->Html->Link('<i class="fa fa-mail-reply"></i> Volver', 
                [
                    'controller' => 'Users',
                    'action' => 'index'
                ],
                [
                    'escape' => false,
                    'class' => 'btn btn-app text-yellow',
                ]) 
                ?>
            </div>
            <div class="col-md-6">
                <h3><i class="fa fa-male" id="title"> Datos del Empleado</i></h3>
            </div>
            <div class="col-md-3">

                <?= $this->Html->Link(__('<i class="fa fa-file-pdf-o"></i> Descargar Pdf'), 
                [
                    'action' => 'view', $user->id, $user->id.'.pdf'
                ],
                [
                    'escape' => false,
                    'id' => 'pdf',
                    'class' => 'btn btn-app text-aqua',
                ]) 
                ?>
            </div>
        </div>
    <div class="row">
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Datos Personales</h3>&nbsp;&nbsp;
                    <?= $this->Html->link(__('Editar'), 
                    [
                        'controller' => 'Personas',
                        'action' => 'edit', $user->persona->id
                    ], 
                    [
                        'Class' => 'btn btn-primary btn-sm'
                    ]) 
                    ?>
                </div>
                <div class="box-body">
                    <dl>
                        <dt>Cedula</dt>
                            <dd>&nbsp;&nbsp;<?= $user->persona->cedula ?></dd>
                            <br>

                        <dt>Nombre(s)</dt>
                            <dd>&nbsp;&nbsp;<?= $user->persona->nombre ?></dd>
                            <br>

                        <dt>Apellido(s)</dt>
                            <dd>&nbsp;&nbsp;<?= $user->persona->apellido ?></dd>
                            <br>

                        <dt>Telefono</dt>
                            <dd>&nbsp;&nbsp;<?= $user->persona->telefono ?></dd>
                            <br>

                        <dt>Creado</dt>
                            <dd>&nbsp;&nbsp;<?= $user->persona->created->nice() ?></dd>
                            <br>

                        <dt>Modificado</dt>
                            <dd>&nbsp;&nbsp;<?= $user->persona->modified->nice() ?></dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Datos de Empleado/Usuario</h3>&nbsp;&nbsp;
                    <?= $this->Html->link(__('Editar'), 
                    [
                        'action' => 'edit', $user->id
                    ], 
                    [
                        'Class' => 'btn btn-primary btn-sm'
                    ]) 
                    ?>
                </div>
                <div class="box-body">
                    <dl>

                        <dt>Cargo</dt>
                            <dd>&nbsp;&nbsp;<?= $user->cargo ?></dd>
                            <br>

                        <dt>Turno</dt>
                            <?php if($user->turno == 1){ ?>
                                <dd>&nbsp;&nbsp;<?php echo "Mañana"; ?></dd>
                                <br>
                            <?php }else{ ?>
                                <dd>&nbsp;&nbsp;<?php echo "Tarde"; ?></dd>
                                <br>
                            <?php } ?>
                        <dt>Usuario</dt>
                            <dd>&nbsp;&nbsp;<?= $user->usuario ?></dd>
                            <br>

                        <dt>Habilitado</dt>
                            <dd>&nbsp;&nbsp;<?= $user->active ? 'SI' : 'NO' ?></dd>
                            <br>

                        <dt>Creado</dt>
                            <dd>&nbsp;&nbsp;<?= $user->created->nice() ?></dd>
                            <br>

                        <dt>Modificado</dt>
                            <dd>&nbsp;&nbsp;<?= $user->modified->nice() ?></dd>
                    </dl>
                </div>
            </div>
        </div>

    </div>
</section>
</div>
