<style>

.labell {
    display: inline;
    padding: .2em .6em .3em;
    font-size: 100%;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25em;
}
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?= $this->Flash->render() ?> 
    <section class="content-header">
        <h1>Bienvenido<small>Esta es la pagina de inicio</small></h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i>
                <?= $this->Html->Link('Inicio', ['controller' => 'Users', 'action' => 'home']); ?>
            </li>
            <li class="active">Registro</li>
        </ol>
    </section>

        <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <center><h1 class="box-title">Lista de Registros</h1></center>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th style="width: 107.75px;" >CODIGO</th>
                                    <th style="width: 95.75px;" >TIPO-EQUIPO</th>
                                    <th style="width: 87.75px;" >CLIENTE</th>
                                    <th>EMPLEADO</th>
                                    <th>STATUS</th>
                                    <th style="width: 165px;" ><center>ACCIONES</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($detalleRegistroEquipos as $detalleRegistroEquipo): ?>
                                <tr>
                                    <td><?= $this->Number->format($detalleRegistroEquipo->id) ?></td>
                                    <td><?= h($detalleRegistroEquipo->registro_equipo->Codigo) ?></td>
                                    <td><?= h($detalleRegistroEquipo->equipo->tipo) ?></td>
                                    <td><?= h($detalleRegistroEquipo->registro_equipo->persona->nombre." ".$detalleRegistroEquipo->registro_equipo->persona->apellido) ?></td>
                                    <td><?= h($detalleRegistroEquipo->registro_equipo->user->persona->nombre." ".$detalleRegistroEquipo->registro_equipo->user->persona->apellido) ?></td>
                                    <td>
                                        <?php 
                                            if($detalleRegistroEquipo->status == 'activo'){
                                                echo "<center><label class='labell label-success'>Activo</label></center>";
                                            }else{
                                            echo "<center><label class='labell label-warning'>Anulado</label></center>";
                                            };
                                        ?>
                                    </td>
                                    <td class="actions">
                                    <center>
                                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $detalleRegistroEquipo->id], ['Class' => 'btn btn-info btn-sm']) ?>
                                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $detalleRegistroEquipo->id], ['Class' => 'btn btn-primary btn-sm']) ?>
                                        <?php if ($current_user['role'] == 'admin') {
                                            echo $this->Form->postLink(__('Anular'), ['action' => 'anular', $detalleRegistroEquipo->id],['Class' => 'btn btn-danger btn-sm'], ['confirm' => __('Esta seguro que desea Anular este Registro # {0}?', $detalleRegistroEquipo->id)]);
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



<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Detalle Registro Equipo'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Equipos'), ['controller' => 'Equipos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Equipo'), ['controller' => 'Equipos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Registro Equipos'), ['controller' => 'RegistroEquipos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Registro Equipo'), ['controller' => 'RegistroEquipos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="detalleRegistroEquipos index large-9 medium-8 columns content">
    <h3><?= __('Detalle Registro Equipos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('equipo_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('registro_equipos_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($detalleRegistroEquipos as $detalleRegistroEquipo): ?>
            <tr>
                <td><?= $this->Number->format($detalleRegistroEquipo->id) ?></td>
                <td><?= h($detalleRegistroEquipo->created) ?></td>
                <td><?= h($detalleRegistroEquipo->modified) ?></td>
                <td><?= h($detalleRegistroEquipo->status) ?></td>
                <td><?= $detalleRegistroEquipo->has('equipo') ? $this->Html->link($detalleRegistroEquipo->equipo->id, ['controller' => 'Equipos', 'action' => 'view', $detalleRegistroEquipo->equipo->id]) : '' ?></td>
                <td><?= $detalleRegistroEquipo->has('registro_equipo') ? $this->Html->link($detalleRegistroEquipo->registro_equipo->id, ['controller' => 'RegistroEquipos', 'action' => 'view', $detalleRegistroEquipo->registro_equipo->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $detalleRegistroEquipo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $detalleRegistroEquipo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $detalleRegistroEquipo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detalleRegistroEquipo->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
