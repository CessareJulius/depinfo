<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Equipo[]|\Cake\Collection\CollectionInterface $equipos
 */
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?= $this->Flash->render() ?> 
    <section class="content-header">
        <h1>Bienvenido<small>Esta es la pagina de inicio</small></h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i>
                <?= $this->Html->Link('Inicio', ['controller' => 'Users', 'action' => 'home']); ?>
            </li>
            <li class="active">Equipos Reparados sin Entregar</li>
        </ol>
    </section>

        <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <center><h1 class="box-title">Equipos Reparados sin Entregar</h1></center>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>SERIAL</th>
                                    <th>TIPO</th>
                                    <th>FALLA</th>
                                    <th>REPARACIÓN</th>
                                    <th>FECHA DE REPARACIÓN</th>
                                    <th><center>ACCION</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($equipos_Reparados as $equipo_Reparado): ?>
                                <tr>
                                    <td><?= $this->Number->format($equipo_Reparado->id) ?></td>
                                    <td><?php echo $this->Html->Link($equipo_Reparado->serial, 
                                        [
                                            'controller' => 'Equipos',
                                            'action' => 'view/'.$equipo_Reparado->id
                                        ]); ?>
                                    </td>
                                    <td><?= h($equipo_Reparado->tipo) ?></td>
                                    <td><?= h($equipo_Reparado->detalle_registro_equipo->falla) ?></td>
                                    <td><?= h($equipo_Reparado->detalle_registro_equipo->reparacion) ?></td>
                                    <td><center><?= $equipo_Reparado->modified->nice() ?></center></td>
                                    <td class="actions">
                                        <center>
                                            <?= $this->Html->link(__('Entregar'), ['action' => 'entregarEquipo', $equipo_Reparado->id], ['Class' => 'btn btn-success btn-sm']) ?>
                                        </center>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="control-sidebar-bg"></div>