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
                <li class="active">Sesiones</li>
            </ol>
        </section>

        <!-- Main content -->
    <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <center><h1 class="box-title">Empleados con Sesiones activas</h1></center>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>ID</th>
                <th>NOMBRE(S)</th>
                <th>APELLIDO(S)</th>
                <th>CARGO</th>
                <th><center>ACCION</center></th>
              </tr>
              </thead>
              <tbody>
              <?php foreach($sessions as $session): ?>
              <tr>
                <td><?= $this->Number->format($session->id) ?></td>
                <td><?= h($session->user->persona->nombre) ?></td>
                <td><?= h($session->user->persona->apellido) ?></td>
                <td><?= h($session->user->cargo) ?></td>
                <td class="actions">
                  <center>
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $session->id], ['Class' => 'btn btn-info btn-sm']) ?>
                    <?= $this->Form->postLink(__('Terminar'), ['action' => 'delete'],['Class' => 'btn btn-danger btn-sm'], ['confirm' => __('Esta seguro que desea terminar esta sesion?')]) ?>
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




