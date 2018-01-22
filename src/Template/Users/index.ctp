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
            <h1>Bienvenido<small>Esta es la pagina de empleados</small></h1>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i>
                    <?= $this->Html->Link('Inicio', ['controller' => 'Users', 'action' => 'home']); ?>
                </li>
                <li class="active">Empleados</li>
            </ol>
        </section>

        <!-- Main content -->
    <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <center><h1 class="box-title">Lista de Empleados</h1></center>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>APELLIDO(S)</th>
                <th>STATUS</th>
                <th><center>ACCIONES</center></th>
              </tr>
              </thead>
              <tbody>
              <?php foreach($users as $user): ?>
              <tr>
                <td><?= $this->Number->format($user->id) ?></td>
                <td><?= h($user->persona->nombre) ?></td>
                <td><?= h($user->persona->apellido) ?></td>
                <td>
                    <?php 
                        if($user->active == true){
                            echo "<center><label class='labell label-success'>Activo</label></center>";
                        }else{
                          echo "<center><label class='labell label-warning'>Inactivo</label></center>";
                        };
                    ?>
                </td>
                <td class="actions">
                  <center>
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $user->id], ['Class' => 'btn btn-info btn-sm']) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id], ['Class' => 'btn btn-primary btn-sm']) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $user->id],['Class' => 'btn btn-danger btn-sm'], ['confirm' => __('Esta seguro que desea borrar este usuario # {0}?', $user->id)]) ?>
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




