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
            <li class="active">Equipos</li>
        </ol>
    </section>

        <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <center><h1 class="box-title">Equipos en Reparacion</h1></center>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>SERIAL</th>
                                    <th>TIPO</th>
                                    <th>MARCA</th>
                                    <th>MODELO</th>
                                    <th>DEPARTAMENTO</th>
                                    <th><center>ACCION</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($equipos_EnRep as $equipos_EnRep): ?>
                                <tr>
                                    <td><?= $this->Number->format($equipos_EnRep->id) ?></td>
                                    <td><?= h($equipos_EnRep->serial) ?></td>
                                    <td><?= h($equipos_EnRep->tipo) ?></td>
                                    <td><?= h($equipos_EnRep->marca) ?></td>
                                    <td><?= h($equipos_EnRep->modelo) ?></td>
                                    <td>
                                        <?php 
                                            if ($equipos_EnRep->departamento == null ) {
                                                echo "No posee";
                                            } else {
                                                echo $equipos_EnRep->departamento;
                                            }
                                        ?>
                                    </td>
                                    <td class="actions">
                                        <center>
                                            <?= $this->Html->link(__('Agregar Reparaciones'), ['DetalleRegistroEquipos', 'action' => 'addRep', $equipos_EnRep->id], ['Class' => 'btn btn-warning btn-sm']) ?>
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