<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<style>
#editEmp{
    position: relative;
    margin-left: 62px;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}

#btnEditEmp{
    margin-left: 42%;
}

#box-body-Edit{
    margin-left: 14%;
}

</style>

<div class="content-wrapper">
    <section class="content-header">
        <center><h3><i class="fa fa-male"> Editar Datos del Empleado</i></h3></center>
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
            <li class="active">Editar Datos</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div id="editEmp" class="col-xs-10">
                <!-- general form elements -->
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <center><h3 class="box-title">Datos de Empleado/Usuario</h3></center>
                    </div>
                    <?= $this->Form->create($user) ?>
                        <div id="box-body-Edit" class="box-body">
                            <div class="form-group col-xs-5">
                                <?php 
                                    echo $this->Form->input("cargo", ['label' => 'Cargo', 'class' => 'form-control']);
                                ?>
                            </div>
                            <div class="form-group col-xs-5">
                                <?php 
                                    echo $this->Form->input("usuario", ['label' => 'Usuario', 'class' => 'form-control']);
                                ?>
                            </div>
                            <div class="form-group col-xs-5">
                                <?php 
                                    echo $this->Form->input("clave", ['label' => 'Contraseña', 'class' => 'form-control', 'value' => '']);
                                ?>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="checkbox">
                                    <?php 
                                        echo $this->Form->input("active", ['label' => 'Activo', 'type' => 'checkbox']);
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <?= $this->Form->button("Editar Empleado", ['id' => 'btnEditEmp', 'Class' => 'btn btn-primary']); ?>
                        </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </section>
</div>
