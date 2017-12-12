<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
        <?= $this->html->image('img/user2-160x160.jpg', ['class' => 'img-circle', 'alt' => 'User Image']); ?>
        </div>
        <div class="pull-left info">
          <p><?php echo $current_user['persona']['nombre']." ".$current_user['persona']['apellido'] ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> En Linea</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Buscar...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li class="header"><center style="color: floralwhite; ">MENU</center></li>
        <li><?= $this->Html->Link('<i class="ion ion-home text-aqua"></i> <span>INICIO</span>', ['controller' => 'Users', 'action' => "home"], ['escape' => false]) ?></li>  
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user text-aqua"></i> <span>Clientes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
                <?= $this->Html->Link('<i class="fa fa-user-plus text-green"></i> Agregar Nuevo', ['controller' => 'Personas', 'action' => 'add'], ['escape' => false]); ?>
            </li>
            <li>
                <?= $this->Html->Link('<i class="fa fa-navicon text-aqua"></i> Ver Todos', ['controller' => 'Personas', 'action' => 'index'], ['escape' => false]); ?>
            </li>
          </ul>
        </li>
        <?php if ($current_user['role'] == 'admin'): ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users text-aqua"></i>
            <span>Empleados</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><?= $this->Html->Link('<i class="fa fa-user-plus"></i> Agregar Nuevo', ['controller' => 'Users', 'action' => 'add'], ['escape' => false]); ?></li>
            <li><?= $this->Html->Link('<i class="fa fa-navicon"></i> Ver Todos', ['controller' => 'Users', 'action' => 'index'], ['escape' => false]); ?></li>
            <li><a href="../charts/flot.html"><i class="fa fa-search"></i> Buscar Empleado</a></li>
          </ul>
        </li>
        <?php endif ?>
        <li class="treeview">
          <a href="#">
            <i class="ion ion-clipboard"></i>
            <span>Registro</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><?= $this->Html->Link('<i class="fa fa-plus"></i> Nuevo Registro', ['controller' => 'DetalleRegistroEquipos', 'action' => 'add'], ['escape' => false]); ?></li>
            <li><?= $this->Html->Link('<i class="fa fa-navicon"></i> Ver Todos', ['controller' => 'DetalleRegistroEquipos', 'action' => 'index'], ['escape' => false]); ?></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-user"></i> Ver por Status
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><?= $this->Html->Link('<i class="fa fa-circle-o"></i> Registros Activos', ['controller' => 'DetalleRegistroEquipos', 'action' => 'registrosActivos'], ['escape' => false]); ?></li>
                <li><?= $this->Html->Link('<i class="fa fa-circle-o"></i> Registros Anulados', ['controller' => 'DetalleRegistroEquipos', 'action' => 'registrosAnulados'], ['escape' => false]); ?></li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i> <span>Equipos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><?= $this->Html->Link('<i class="fa fa-navicon"></i> Ver Todos', ['controller' => 'Equipos', 'action' => 'index'], ['escape' => false]); ?></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-user"></i> Ver por Status
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><?= $this->Html->Link('<i class="fa fa-circle-o"></i> En Reparacion', ['controller' => 'Equipos', 'action' => 'reparando'], ['escape' => false]); ?></li>
                <li><?= $this->Html->Link('<i class="fa fa-circle-o"></i> Reparados sin Entregar', ['controller' => 'Equipos', 'action' => 'reparados'], ['escape' => false]); ?></li>
                <li><?= $this->Html->Link('<i class="fa fa-circle-o"></i> Entregados', ['controller' => 'Equipos', 'action' => 'entregados'], ['escape' => false]); ?></li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-file-pdf-o text-aqua"></i> <span>Reportes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="treeview">
              <a href="#"><i class="fa fa-user"></i> Clientes
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Todos</a></li>
                <li><a href="#"><i class="fa fa-filter"></i> Filtrar</a></li>
              </ul>
            </li>
            <?php if ($current_user['role'] == 'admin'): ?>
            <li class="treeview">
              <a href="#"><i class="fa fa-users"></i> Empleados
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Todos</a></li>
                <li><a href="#"><i class="fa fa-filter"></i> Filtrar</a></li>
              </ul>
            </li>
            <?php endif ?>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Registros
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Todos</a></li>
                <li><a href="#"><i class="fa fa-filter"></i> Filtrar</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Equipos
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Todos</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Filtrar</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="header"><center style="color: floralwhite; ">OPCIONES</center></li>
        <?php $id = $current_user['id']; ?>
        <li><?= $this->Html->Link('<i class="ion ion-person text-aqua"></i> <span>Perfil</span>', ['controller' => 'Users', 'action' => "profile/$id"], ['escape' => false]) ?></li>
        <li><a href="#"><i class="ion ion-wrench text-yellow"></i> <span>Configuracion</span></a></li>
        <li><?= $this->Html->Link("<i class='fa fa-power-off text-danger'>&nbsp;</i><span>Salir</span>", ['controller' => 'Users', 'action' => 'logout'], ['escape' => false]) ?></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>