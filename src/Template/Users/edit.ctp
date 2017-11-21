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
    margin-left: 25%;
}
#btnVolEmp{
    margin-left: 17%;
}

#box-body-Edit{
    margin-left: 14%;
}

</style>

<div class="content-wrapper">
<?= $this->Flash->render() ?>
    <section class="content-header">
        <center><h3><i class="fa fa-male"> Editar Datos del Empleado</i></h3></center>
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
                    <?= $this->Form->create($user,['novalidate']) ?>
                        <div id="box-body-Edit" class="box-body">
                            <div class="form-group col-xs-5">
                                <?php 
                                    echo $this->Form->control("cargo", ['label' => 'Cargo', 'class' => 'form-control']);
                                ?>
                            </div>
                            <div class="form-group col-xs-5">
                                <?php 
                                    echo $this->Form->control("usuario", ['label' => 'Usuario', 'class' => 'form-control']);
                                ?>
                            </div>
                            <div class="form-group col-xs-5">
                                <?php 
                                    echo $this->Form->control("clave", ['label' => 'Contraseña', 'type'=> 'password', 'class' => 'form-control', 'value' => '']);
                                ?>
                            </div>
                            <div class="form-group col-xs-5">
                                <label>Turno</label>
                                <select name="turno" class="form-control select2" style="width: 100%;">
                                    <?php if($user->turno == 1){ ?>
                                        <option value="1" selected="selected">Mañana</option>
                                        <option value="2">Tarde</option>
                                    <?php }else{ ?>
                                        <option value="1">Mañana</option>
                                        <option value="2" selected="selected">Tarde</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-xs-4">
                                <b>Activo</b>
                                <?php 
                                    echo $this->Form->control("active", ['label' => false, 'type' => 'checkbox', 'class' => 'flat-red']);
                                ?>
                            </div>
                        </div>
                        <div class="box-footer">
                            <?php

                                $controller = $this->request->getParam('controller');
                                // $this->request->getParam('action);
                                $idParam = $this->request->getParam('pass.0');

                                if ($current_user['id'] == $idParam) {
                                    $controller = 'Users';
                                    $action = "profile/".$current_user['id'];
                                }else {
                                    $action = "index";
                                }
                                
                                echo $this->Html->Link("<i class='fa fa-reply'>&nbsp;</i>Volver", ['controller' => $controller,'action' => $action], ['id' => 'btnVolEmp', 'class' => 'btn btn-info', 'escape' => false]);
                            
                            ?>
                            <?= $this->Form->button("<i class='fa fa-share'>&nbsp;</i>Editar Empleado", ['id' => 'btnEditEmp', 'Class' => 'btn btn-primary', 'escape' => false]); ?>
                        </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </section>
</div>
