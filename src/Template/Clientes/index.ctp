<div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Bienvenido<small>Esta es la pagina de inicio</small></h1>
            <ol class="breadcrumb">
                <li><i class="fa fa-dashboard"></i>
                    <?= $this->Html->Link('Inicio', ['controller' => 'Users', 'action' => 'home']); ?>
                </li>
                <li class="active">Clientes</li>
            </ol>
        </section>

        <!-- Main content -->
    <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <center><h1 class="box-title">Lista de Clientes</h1></center>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>ID</th>
                <th>CEDULA</th>
                <th>NOMBRE</th>
                <th>APELLIDO(S)</th>
                <th>TELEFONO</th>
                <th><center>ACCIONES</center></th>
              </tr>
              </thead>
              <tbody>
              <?php foreach($clientes as $cliente): ?>
              <tr>
                <td><?= $this->Number->format($cliente->id) ?></td>
                <td><?= h($cliente->persona->cedula) ?></td>
                <td><?= h($cliente->persona->nombre) ?></td>
                <td><?= h($cliente->persona->apellido) ?></td>
                <td><?= h($cliente->persona->telefono) ?></td>
                <td class="actions">
                  <center>
                    <?= $this->Html->link(__('Ver'), ['controller' => 'Clientes', 'action' => 'view', $cliente->id], ['Class' => 'btn btn-info btn-sm']) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $cliente->id], ['Class' => 'btn btn-primary btn-sm']) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $cliente->id],['Class' => 'btn btn-danger btn-sm'], ['confirm' => __('Esta seguro que desea borrar este usuario # {0}?', $cliente->id)]) ?>
                  </center>
                </td>
              </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
    </div>
    <div class="control-sidebar-bg"></div>




