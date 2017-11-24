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
                        <center><h1 class="box-title">Lista de Equipos</h1></center>
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
                                    <th><center>ACCIONES</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($equipos as $equipo): ?>
                                <tr>
                                    <td><?= $this->Number->format($equipo->id) ?></td>
                                    <td><?= h($equipo->serial) ?></td>
                                    <td><?= h($equipo->tipo) ?></td>
                                    <td><?= h($equipo->marca) ?></td>
                                    <td><?= h($equipo->modelo) ?></td>
                                    <td>
                                        <?php 
                                            if ($equipo->departamento == null ) {
                                                echo "No posee";
                                            } else {
                                                echo $equipo->departamento;
                                            }
                                        ?>
                                    </td>
                                    <td class="actions">
                                    <center>
                                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $equipo->id], ['Class' => 'btn btn-info btn-sm']) ?>
                                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $equipo->id], ['Class' => 'btn btn-primary btn-sm']) ?>
                                        <?php if ($current_user['role'] == 'admin') {
                                        echo $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $equipo->id],['Class' => 'btn btn-danger btn-sm'], ['confirm' => __('Esta seguro que desea borrar este equipo # {0}?', $equipo->id)]);
                                        } ?>
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