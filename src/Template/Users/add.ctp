
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
        <center><h3><i class="fa fa-user-plus"> Crear Nuevo Empleado</i></h3></center>
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
                    <?= $this->Form->create('', ['class' => 'form-horizontal']) ?>
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
                            <div class="form-group">
                                <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nombre" placeholder="Nombre">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="apellido" class="col-sm-2 control-label">Apellido</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="apellido" placeholder="Apellido">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="telefono" class="col-sm-2 control-label">Telefono</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="telefono" placeholder="Telefono">
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-danger">Cancelar</button>
                            <button type="submit" class="btn btn-info pull-right">Crear</button>
                        </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </section>
</div>
