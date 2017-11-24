<style>
#editEmp{
    position: relative;
    margin-left: 25%;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}

#box-body-Edit{
    margin-left: 14%;
}

</style>

<div class="content-wrapper">
    <?= $this->Flash->render() ?>
    <section class="content-header">
        <center><h3><i class="fa fa-user-plus"> Crear Nuevo Registro</i></h3></center>
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
                    'controller' => 'DetalleRegistroEquipos',
                    'action' => 'index'
                ],
                [
                    'escape' => false
                ]) 
              ?>
            </li>
            <li class="active">Crear Nuevo</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <?php 
                if ($formCedula == true): ?>
                    
                    <div id="editEmp" class="col-xs-6">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <center><h3 class="box-title"><i class="fa fa-male"> Ingrese la Cedula del Cliente</i></h3></center>
                            </div>
                            <?php 
                                echo $this->Form->create($formCedula, ['class' => 'form-horizontal']) 
                            ?>
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="cedula" class="col-sm-2 control-label">Cedula/Rif</label>
                                        <div class="col-sm-10">
                                            <?=
                                                $this->Form->input('cedula', ['class' => 'form-control', 'placeholder' => 'Cedula',
                                                    'label' => false, 'required', 'autofocus'])
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <?= $this->Html->Link('Cancelar', ['controller' => 'Users', 'action' => 'home'], ['class' => 'btn btn-danger']) ?>
                                    <?= $this->Form->button("Siguiente", ['name' => 'buscarCedula', 'value' => 'bCedula', 'Class' => 'btn btn-info pull-right']); ?>
                                </div>
                            <?= $this->Form->end() ?>
                        </div>
                    </div>

            <?php else: ?>
                <div class="col-xs-12">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <center><h3 class="box-title">Datos del Cliente</h3></center>
                        </div>
                        <?php if ($countClient > 0) {$status = 'disabled'; $valueCedula = $cliente['cedula']; $valueNombre = $cliente['nombre']; $valueApellido = $cliente['apellido']; $valueTelefono = $cliente['telefono'];} else {$status = 'enabled'; $valueCedula = ""; $valueNombre = ""; $valueApellido = ""; $valueTelefono = "";} ?>
                        <?= $this->Form->create($detalleRegistroEquipo) ?>
                            <div class="box-body">
                                    <?php 
                                        echo $this->Form->control("Personas.cedula", ['label' => 'Cedula', 'type' => 'hidden', 'class' => 'form-control', 'value' => $valueCedula]);
                                    ?>
                                <div class="form-group col-xs-3">
                                    <?php 
                                        echo $this->Form->control("Personas.cedula", ['label' => 'Cedula', 'class' => 'form-control', $status, 'value' => $valueCedula]);
                                    ?>
                                </div>
                                <div class="form-group col-xs-3">
                                    <?php 
                                        echo $this->Form->control("Personas.nombre", ['label' => 'Nombre', 'class' => 'form-control', $status, 'value' => $valueNombre]);
                                    ?>
                                </div>
                                <div class="form-group col-xs-3">
                                    <?php 
                                        echo $this->Form->control("Personas.apellido", ['label' => 'Apellido', 'class' => 'form-control', $status, 'value' => $valueApellido]);
                                    ?>
                                </div>
                                <div class="form-group col-xs-3">
                                    <?php 
                                        echo $this->Form->control("Personas.telefono", ['label' => 'Telefono', 'class' => 'form-control', $status, 'value' => $valueTelefono]);
                                    ?>
                                </div>
                            </div>
                            <div class="box-footer">
                                <center><h4 class="box-title">Datos del Equipo</h4></center>
                                <div class="form-group col-xs-3">
                                    <?php 
                                        echo $this->Form->control("RegistroEquipos.Codigo", ['label' => 'Codigo', 'class' => 'form-control']);
                                    ?>
                                </div>
                                <div class="form-group col-xs-3">
                                    <?php 
                                        echo $this->Form->control("Equipos.serial", ['label' => 'Serial', 'class' => 'form-control', 'placeholder' => 'Ejm: AB-CDE-FGH-IJ']);
                                    ?>
                                </div>
                                <div class="form-group col-xs-3">
                                    <?php 
                                        echo $this->Form->control("Equipos.tipo", ['label' => 'Tipo', 'class' => 'form-control', 'placeholder' => 'Ejm: Laptop']);
                                    ?>
                                </div>
                                <div class="form-group col-xs-3">
                                    <?php 
                                        echo $this->Form->control("Equipos.marca", ['label' => 'Marca', 'class' => 'form-control', 'placeholder' => 'Ejm: Samsung']);
                                    ?>
                                </div>
                                <div class="form-group col-xs-3">
                                    <?php 
                                        echo $this->Form->control("Equipos.modelo", ['label' => 'Modelo', 'class' => 'form-control', 'placeholder' => 'Ejm: Compac']);
                                    ?>
                                </div>
                                <div class="form-group col-xs-3">
                                    <?php 
                                        echo $this->Form->control("Equipos.departamento", ['label' => 'Departamento', 'class' => 'form-control', 'placeholder' => 'Dejar vacio si no posee']);
                                    ?>
                                </div>
                                <div class="form-group col-xs-4">
                                    <?php 
                                        echo $this->Form->control("DetalleRegistroEquipos.falla", ['label' => 'Fallas', 'class' => 'form-control', 'rows' => 3]);
                                    ?>
                                </div>
                            </div>
                            <div class="box-footer">
                                <?php
                                    echo $this->Html->Link("<i class='fa fa-reply'>&nbsp;</i>Volver", ['controller' => 'DetalleRegistroEquipos','action' => 'index'], ['id' => 'btnVolEmp', 'class' => 'btn btn-info', 'escape' => false]);
                                    echo $this->Form->button("<i class='fa fa-share'>&nbsp;</i>Crear Registro", ['name' => 'crearRegistro', 'value' => 'cRegistro', 'id' => 'btnEditEmp', 'Class' => 'btn btn-primary', 'escape' => false]);
                                ?>
                            </div>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </section>
</div>

