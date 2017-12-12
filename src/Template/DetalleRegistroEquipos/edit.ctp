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

#btnAddRep {
    margin-top: 21px;
    margin-left: 17%;
}

#btnVolEmp{
    margin-left: 15%;
}

#box-body-Edit{
    margin-left: 12%;
}

</style>

<div class="content-wrapper">
<?= $this->Flash->render() ?>
    <section class="content-header">
        <center><h3><i class="fa fa-male"> Editar Datos del Registro</i></h3></center>
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
              <?= $this->Html->Link('Registros', 
                [
                    'action' => 'index'
                ],
                [
                    'escape' => false
                ]) 
              ?>
            </li>
            <li class="active">Editar Registro</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div id="editEmp" class="col-xs-10">
                <!-- general form elements -->
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <center><h3 class="box-title">Datos de Registro</h3></center>
                    </div>
                    <?= $this->Form->create($detalleRegistroEquipo,['novalidate']) ?>
                        <div id="box-body-Edit" class="box-body">
                            <div class="form-group col-xs-5">
                                <?php 
                                    echo $this->Form->control("falla", ['label' => 'Fallas', 'class' => 'form-control', 'rows' => 3]);
                                ?>
                            </div>
                            <div class="form-group col-xs-5">
                                <?php if ($detalleRegistroEquipo->reparacion == null ) { ?>
                                        <div class="input required">
                                            <label>Reparaciones</label>
                                <?php 
                                        echo $this->Html->Link("<i class='fa fa-reply'>&nbsp;</i>Agregar Reparaciones", ['controller' => '','action' => ''], ['id' => 'btnAddRep', 'class' => 'btn btn-info', 'escape' => false]);
                                ?> 
                                        </div>
                                        <br>
                                <?php 
                                    } else {
                                        echo $this->Form->control("reparacion", ['label' => 'Reparaciones', 'class' => 'form-control', 'rows' => 3]);
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="box-footer">
                            <?php
                                
                                echo $this->Html->Link("<i class='fa fa-reply'>&nbsp;</i>Volver", ['controller' => 'DetalleRegistroEquipos','action' => 'index'], ['id' => 'btnVolEmp', 'class' => 'btn btn-info', 'escape' => false]);
                            
                            ?>
                            <?= $this->Form->button("<i class='fa fa-share'>&nbsp;</i>Editar Registro", ['id' => 'btnEditEmp', 'Class' => 'btn btn-primary', 'escape' => false]); ?>
                        </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </section>
</div>
