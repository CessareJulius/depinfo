<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Perfil de Usuario
  </h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-home"></i> 
        <?= $this->Html->Link('Inicio', ['controller' => 'Users', 'action' => 'home']); ?>
    </li>
    <li class="active">Perfil de usuario</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-5">

      <!-- Profile Image -->
      <div class="box box-success">
        <div class="box-body box-profile">
            <?= $this->html->image('img/user2-160x160.jpg', ['class' => 'profile-user-img img-responsive img-circle', 'alt' => 'User Profile Picture']); ?>

          <h3 class="profile-username text-center"><?= $current_user['persona']['nombre']." ".$current_user['persona']['apellido'] ?></h3>

          <p class="text-muted text-center"><?= $current_user['role'] ?></p>

          <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
              <b>Cedula </b> <a class="pull-right"><?= $current_user['persona']['cedula'] ?></a>
            </li>
            <li class="list-group-item">
              <b>Telef.</b> <a class="pull-right"><?= $current_user['persona']['telefono'] ?></a>
            </li>
            <li class="list-group-item">
              <b>Cargo</b> <a class="pull-right"><?= $current_user['cargo'] ?></a>
            </li>
          </ul>
        <?php $idPersona = $current_user['persona']['id'];
            echo $this->Html->Link("<i class='fa fa-edit'>&nbsp;</i>Editar", ['controller' => 'Personas', 'action' => "edit/$idPersona"], ['class' => 'btn btn-info btn-block', 'escape' => false]) 
        ?>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

      <!-- About Me Box -->
      
      <!-- /.box -->
    </div>
    <div class="col-md-5">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="profile-username text-center">Datos de Usuario</h3>
          <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
              <b>Usuario </b> <a class="pull-right"><?= $current_user['usuario'] ?></a>
            </li>
            <li class="list-group-item">
                <?php if($current_user['turno'] == 1){ ?>
                    <b>Turno</b> <a class="pull-right">Mañana</a>
                <?php }else{ ?>
                    <b>Turno</b> <a class="pull-right">Tarde</a>
                <?php } ?>
            </li>
          </ul>
        <?php $idUser = $current_user['id'];
            echo $this->Html->Link("<i class='fa fa-edit'>&nbsp;</i>Editar", ['controller' => 'Users', 'action' => "edit/$idUser"], ['class' => 'btn btn-info btn-block', 'escape' => false]) 
        ?>
        </div>
      </div>
    </div>
  </div>
  <!-- /.row -->

</section>
<!-- /.content -->
</div>