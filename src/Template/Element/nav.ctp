<header class="main-header">
    <!-- Logo -->
    <?= $this->Html->Link(
        "<span class='logo-mini'><b>DM</b>IF</span><span class='logo-lg'><b>DME</b>ITM</span>", 
        [
            'controller' => 'Users', 'action' => 'home'
        ], 
        [
            'class' => 'logo',
            'escape' => false
        ]); 
    ?>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </a>

    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?= $this->html->image('img/user2-160x160.jpg', ['class' => 'user-image', 'alt' => 'User Image']); ?>
            <span class="hidden-xs"><?php echo $current_user['persona']['nombre']." ".$current_user['persona']['apellido'] ?></span>
            </a>
            <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
            <?= $this->html->image('img/user2-160x160.jpg', ['class' => 'img-circle', 'alt' => 'User Image']); ?>

                <p>
                <?php echo $current_user['persona']['nombre']." ".$current_user['persona']['apellido'] ?>
                <?php 
                    $fechaCreated = explode("/", $current_user['created']);
                    
                    if (isset($fechaCreated[0])) {

                        $fechaCreatedMes = $fechaCreated[0];
                    }
                    if (isset($fechaCreated[1])) {

                        if ($fechaCreated[1] != '') {
                            $fechaCreatedDia = $fechaCreated[1];
                            
                        }
                    }
                    if (isset($fechaCreated[2])) {

                        if ($fechaCreated[2] != '') {
                            $fechaCreatedAñoTime = $fechaCreated[2];

                            $timeYearCreated = explode(",", $fechaCreatedAñoTime);

                            if (isset($timeYearCreated[0])) {
                                $fechaCreatedAño = "20";
                                $fechaCreatedAño .= $timeYearCreated[0];
                            }
                        }
                    }
                ?>
                <small>Miembro desde <?php echo "$fechaCreatedDia/$fechaCreatedMes/$fechaCreatedAño"; ?></small>
                </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
                <div class="pull-left">
                    <?php
                        $id = $current_user['id'];
                        echo $this->html->link("<i class='ion ion-tshirt'>&nbsp;</i>Perfil", 
                            ["controller" => "Users", "action" => "profile/$id"], 
                            [
                                'class' => 'btn btn-info btn-flat', 
                                'data-position' => 'left', 'data-delay' => '50', 
                                'data-tooltip' => 'Perfil',
                                'escape' => false
                            ]);   
                    ?>
                </div>
                <div class="pull-right">
                    <?php
                            echo $this->html->link("<i class='fa fa-sign-out text-gray'>&nbsp;</i>Salir", 
                            ['controller' => 'Users', 'action' => 'logout'], 
                            [
                                'class' => 'btn btn-warning btn-flat', 
                                'data-position' => 'left', 'data-delay' => '50', 
                                'data-tooltip' => 'Salir',
                                'escape' => false
                            ]);   
                    ?>
                </div>
            </li>
            </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>
        </ul>
    </div>
    </nav>
</header>