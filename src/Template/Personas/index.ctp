<script>
  $(function () {
    console.log($('#example1').DataTable().context[0])
  })
</script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?= $this->Flash->render() ?> 
        <section class="content-header">
            <h1>Bienvenido<small>Esta es la pagina de personas</small></h1>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i>
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
            <center><h1 class="box-title">Lista de Personas</h1></center>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>ID</th>
                <th>CEDULA</th>
                <th>NOMBRE(S)</th>
                <th>APELLIDO(S)</th>
                <th>TELEFONO</th>
                <th><center>ACCIONES</center></th>
              </tr>
              </thead>
              <tbody>
              <?php foreach($personas as $persona): ?>
              <tr>
                <td><?= $this->Number->format($persona->id) ?></td>
                <td><?= h($persona->cedula) ?></td>
                <td><?= h($persona->nombre) ?></td>
                <td><?= h($persona->apellido) ?></td>
                <td><?= h($persona->telefono) ?></td>
                <td class="actions">
                  <center>
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $persona->id], ['Class' => 'btn btn-info btn-sm']) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $persona->id], ['Class' => 'btn btn-primary btn-sm']) ?>
                    <?php if ($current_user['role'] == 'admin') {
                      echo $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $persona->id],['Class' => 'btn btn-danger btn-sm'], ['confirm' => __('Esta seguro que desea borrar este cliente # {0}?', $persona->id)]);
                    } ?>
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




