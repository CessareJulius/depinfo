
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
                    <?= $this->Form->create($user, ['class' => 'form-horizontal']) ?>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="cedula" class="col-sm-2 control-label">Cedula/Rif</label>
                                <div class="col-sm-10">
                                    <?=
                                        $this->Form->input('Personas.cedula', ['class' => 'form-control', 'placeholder' => 'Cedula',
                                            'label' => false, 'required', 'autofocus'])
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                                <div class="col-sm-10">
                                    <?=
                                        $this->Form->control('Personas.nombre', ['id' => 'nombre', 'class' => 'form-control', 'placeholder' => 'Nombre',
                                            'label' => false, 'required'])
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="apellido" class="col-sm-2 control-label">Apellido</label>
                                <div class="col-sm-10">
                                    <?=
                                        $this->Form->control('Personas.apellido', ['id' => 'apellido', 'class' => 'form-control', 'placeholder' => 'apellido',
                                            'label' => false, 'required'])
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="telefono" class="col-sm-2 control-label">Telefono</label>
                                <div class="col-sm-10">
                                    <?=
                                        $this->Form->control('Personas.telefono', ['id' => 'telefono', 'class' => 'form-control', 'placeholder' => 'Telefono',
                                            'label' => false, 'required'])
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="turno" class="col-sm-2 control-label">Turno</label>
                                <div class="col-sm-10">
                                    <select name="turno" class="form-control select2" style="width: 100%;">
                                        <option value="1" selected="selected">Mañana</option>
                                        <option value="2">Tarde</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="telefono" class="col-sm-2 control-label">Usuario</label>
                                <div class="col-sm-10">
                                    <?=
                                        $this->Form->control('usuario', ['id' => 'usuario', 'class' => 'form-control', 'placeholder' => 'Usuario',
                                            'label' => false, 'required'])
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="telefono" class="col-sm-2 control-label">Clave</label>
                                <div class="col-sm-10">
                                    <?=
                                        $this->Form->control('clave', ['id' => 'clave', 'class' => 'form-control', 'placeholder' => 'Clave', 'type' => 'password',
                                            'label' => false, 'required'])
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <?= $this->Html->Link('Cancelar', ['controller' => 'Users', 'action' => 'home'], ['class' => 'btn btn-danger']) ?>
                            <?= $this->Form->button("Crear Empleado", ['Class' => 'btn btn-info pull-right']); ?>
                        </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </section>
</div>
