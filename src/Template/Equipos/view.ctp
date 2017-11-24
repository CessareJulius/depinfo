
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
        <center><h3><i class="fa fa-laptop"> Datos del Equipo</i></h3></center>
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
              <?= $this->Html->Link('Equipos', 
                [
                    'controller' => 'Equipos',
                    'action' => 'index'
                ],
                [
                    'escape' => false
                ]) 
              ?>
            </li>
            <li class="active">Datos del Equipo</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div id="editEmp" class="col-xs-6">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <?= $this->Html->link(__('Volver'), [
                                        'action' => 'index'
                                    ], [
                                        'style' => 'font-size: 14px; margin-left: 15px;',
                                        'Class' => 'btn btn-primary btn-sm'
                                    ]) 
                                ?>
                        <i class="fa fa-windows" style="margin-left: 15%" > Equipo</i>
                        <?= $this->Html->link(__('Editar'), [
                                        'action' => 'edit', $equipo->id
                                    ], [
                                        'style' => 'font-size: 14px; margin-left: 16%;',
                                        'Class' => 'btn btn-primary btn-sm'
                                    ]) 
                                ?>
                    </div>
                    <div class="box-body">
                        <dl>
                            <dt>Serial</dt>
                                <dd>&nbsp;&nbsp;<?= $equipo->serial ?></dd>
                                <br>

                            <dt>Tipo</dt>
                                <dd>&nbsp;&nbsp;<?= $equipo->tipo ?></dd>
                                <br>

                            <dt>Marca</dt>
                                <dd>&nbsp;&nbsp;<?= $equipo->marca ?></dd>
                                <br>

                            <dt>Modelo</dt>
                                <dd>&nbsp;&nbsp;<?= $equipo->modelo ?></dd>
                                <br>
                            
                            <?php if ($equipo->departamento != null):?>
                                <dt>Departamento</dt>
                                    <dd>&nbsp;&nbsp;<?= $equipo->departamento ?></dd>
                                    <br>
                            <?php endif ?>

                            <dt>Status</dt>
                                <dd>&nbsp;&nbsp;<?= $equipo->status ?></dd>
                                <br>

                            <dt>Creado</dt>
                                <dd>&nbsp;&nbsp;<?= $equipo->created->nice() ?></dd>
                                <br>

                            <dt>Modificado</dt>
                                <dd>&nbsp;&nbsp;<?= $equipo->modified->nice() ?></dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
