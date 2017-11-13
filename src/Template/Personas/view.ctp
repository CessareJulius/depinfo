<div class="content-wrapper">
    <section class="content-header">
        <center><h3><i class="fa fa-male"> Persona Registrada </i></h3></center>
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
              <?= $this->Html->Link('Personas', 
                [
                    'controller' => 'Personas',
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
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Datos Personales</h3>&nbsp;&nbsp;
                        <?= $this->Html->link(__('Editar'), 
                            [
                                'action' => 'edit', $persona->id
                            ], 
                            [
                                'Class' => 'btn btn-primary btn-sm'
                            ]) 
                        ?>
                    </div>
                    <div class="box-body">
                        <dl>
                            <dt>Cedula</dt>
                                <dd>&nbsp;&nbsp;<?= $persona->cedula ?></dd>
                                <br>

                            <dt>Nombre(s)</dt>
                                <dd>&nbsp;&nbsp;<?= $persona->nombre ?></dd>
                                <br>

                            <dt>Apellido(s)</dt>
                                <dd>&nbsp;&nbsp;<?= $persona->apellido ?></dd>
                                <br>

                            <dt>Telefono</dt>
                                <dd>&nbsp;&nbsp;<?= $persona->telefono ?></dd>
                                <br>

                            <dt>Creado</dt>
                                <dd>&nbsp;&nbsp;<?= $persona->created->nice() ?></dd>
                                <br>

                            <dt>Modificado</dt>
                                <dd>&nbsp;&nbsp;<?= $persona->modified->nice() ?></dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


