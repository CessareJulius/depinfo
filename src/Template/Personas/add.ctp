
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
    <section class="content-header">
        <center><h3><i class="fa fa-user-plus"> Crear Nuevo Cliente</i></h3></center>
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
              <?= $this->Html->Link('Clientes', 
                [
                    'controller' => 'Personas',
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
            <div id="editEmp" class="col-xs-6">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <center><h3 class="box-title"><i class="fa fa-male"> Datos Personales</i></h3></center>
                    </div>
                    <?= $this->Form->create($persona, ['class' => 'form-horizontal']) ?>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="cedula" class="col-sm-2 control-label">Cedula/Rif</label>
                                <div class="col-sm-10">
                                    <?=
                                        $this->Form->input('cedula', ['id' => 'cedula', 'class' => 'form-control', 'placeholder' => 'Cedula o Rif',
                                            'label' => false, 'required', 'autofocus'])
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                                <div class="col-sm-10">
                                    <?=
                                        $this->Form->control('nombre', ['id' => 'nombre', 'class' => 'form-control', 'placeholder' => 'Nombre',
                                            'label' => false, 'required'])
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="apellido" class="col-sm-2 control-label">Apellido</label>
                                <div class="col-sm-10">
                                    <?=
                                        $this->Form->control('apellido', ['id' => 'apellido', 'class' => 'form-control', 'placeholder' => 'Apellido',
                                            'label' => false, 'required'])
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="telefono" class="col-sm-2 control-label">Telefono</label>
                                <div class="col-sm-10">
                                    <?=
                                        $this->Form->control('telefono', ['id' => 'telefono', 'class' => 'form-control', 'placeholder' => 'telefono',
                                            'label' => false, 'required'])
                                    ?>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <?php 
                                        echo $this->Form->input("<label for='status' class='col-sm-2 control-label'>Status</label>", ['options' => [ 1 => 'Empleado', 2 => 'Cliente'], 'div' => ['class' => 'col-sm-10'], 'escape' => false]);
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <?= $this->Html->Link('Cancelar', ['controller' => 'Users', 'action' => 'home'], ['class' => 'btn btn-danger']) ?>
                            <button type="submit" class="btn btn-info pull-right">Crear</button>
                        </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </section>
</div>
