<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
        <?= $this->html->image('img/user2-160x160.jpg', ['class' => 'img-circle', 'alt' => 'User Image']); ?>
        </div>
        <div class="pull-left info">
          <p>Cessare Julius</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
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
        <li class="header"><center>MENU</center></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Clientes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
                <?= $this->Html->Link('<i class="fa fa-user-plus"></i> Agregar Nuevo', ['controller' => 'Personas', 'action' => 'add'], ['escape' => false]); ?>
            </li>
            <li>
                <?= $this->Html->Link('<i class="fa fa-navicon"></i> Ver Todos', ['controller' => 'Personas', 'action' => 'index'], ['escape' => false]); ?>
            </li>
            <li><a href="../../index2.html"><i class="fa fa-search"></i> Buscar Cliente</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
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
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Registro</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../UI/general.html"><i class="fa fa-circle-o"></i> Nuevo Registro</a></li>
            <li><a href="../UI/icons.html"><i class="fa fa-circle-o"></i> Ver Todos</a></li>
            <li><a href="../UI/buttons.html"><i class="fa fa-circle-o"></i> Buscar Registro</a></li>
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
            <li><a href="../forms/general.html"><i class="fa fa-circle-o"></i> Ver Todos</a></li>
            <li><a href="../forms/advanced.html"><i class="fa fa-circle-o"></i> Buscar Equipo</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Reportes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Clientes
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Todos</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Filtrar</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Empleados
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Todos</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Filtrar</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Registros
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Todos</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Filtrar</a></li>
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
        <li class="header"><center>OPCIONES</center></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Perfil</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Configuracion</span></a></li>
        <li><?= $this->Html->Link('<i class="fa fa-circle-o text-red"></i> <span>Salir</span>', ['controller' => 'Users', 'action' => 'logout'], ['escape' => false]) ?></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>