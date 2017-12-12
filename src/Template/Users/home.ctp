<style>
    #info-box-content {
        padding: 10px 2px;
        margin-left: 76px;
}

    #info-box {
        display: block;
        min-height: 83px;
        background: #fff;
        width: 100%;
        box-shadow: 0 1px 1px rgba(0,0,0,0.1);
        border-radius: 2px;
        margin-bottom: 15px;
}

    #info-box-icon {
        border-top-left-radius: 2px;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 2px;
        display: block;
        float: left;
        height: 83px;
        width: 70px;
        text-align: center;
        font-size: 45px;
        line-height: 90px;
        background: rgba(0,0,0,0.2);
}

#bg-green{
    color: #fff !important;
}
</style>
<div class="content-wrapper">
    <?= $this->Flash->render() ?> 
    <section class="content-header">
        <h1>Bienvenido<small>Esta es la pagina de inicio</small></h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i>
                <?= $this->Html->Link('Inicio', ['controller' => 'Users', 'action' => 'home']); ?>
            </li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?= $clientCount ?></h3>
                        <p>Clientes Registrados Actualmente</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-people"></i>
                    </div>
                    <?= $this->Html->Link('Más Informacion <i class="fa fa-arrow-circle-right"></i>', ['controller' => 'Personas', 'action' => 'index'], ['class' => 'small-box-footer', 'escape' => false]); ?>
                </div>
            </div>
            <?php if ($current_user['role'] == 'admin'):?>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?= $registroCount ?></h3>
                        <p>Registros creados </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-clipboard"></i>
                    </div>
                    <?= $this->Html->Link('Más Informacion <i class="fa fa-arrow-circle-right"></i>', ['controller' => 'DetalleRegistroEquipos', 'action' => 'index'], ['class' => 'small-box-footer', 'escape' => false]); ?>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?= $empCount ?></h3>
                        <p>Empleados Registrados</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-contacts"></i>
                    </div>
                    <?= $this->Html->Link('Más Informacion <i class="fa fa-arrow-circle-right"></i>', ['controller' => 'Users', 'action' => 'index'], ['class' => 'small-box-footer', 'escape' => false]); ?>
                </div>
            </div>
            <?php endif ?>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?= $registros_Anulados_Count ?></h3>
                        <p>Registros Anulados</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-laptop"></i>
                    </div>
                    <?= $this->Html->Link('Más Informacion <i class="fa fa-arrow-circle-right"></i>', ['controller' => 'detalleRegistroEquipos', 'action' => 'registrosAnulados'], ['class' => 'small-box-footer', 'escape' => false]); ?>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div id="info-box">
                    <span id="info-box-icon" class="bg-aqua">
                        <i class="ion ion-android-people"></i>
                    </span>
                    <div id="info-box-content" title="Clientes sin Registro">
                        <span class="info-box-text" >Clientes sin Registro</span>
                        <span class="info-box-number" >1</span>
                    </div>
                </div>
            </div>
            <?php if ($current_user['role'] == 'admin') { ?>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div id="info-box">
                        <span id="info-box-icon" class="bg-green">
                            <?php if ($sessCount == 0): ?>
                                <i class='fa fa-group'></i>
                            <?php else:
                                echo $this->Html->Link("<i class='fa fa-group'></i>", 
                                        ['controller' => 'Sessions', 'action' => 'index'], 
                                        ['id' => 'bg-green', 'escape' => false]);
                            endif ?> 
                        </span>
                        <div id="info-box-content" title="Empleados en Sesion">
                            <span class="info-box-text">Empleados en Sesion</span>
                            <span class="info-box-number"><?php if ($sessCount == null || $sessCount == 0) {echo "0";} else {echo $sessCount;} ?></span>
                        </div>
                    </div>
                </div>
            <?php     
            } elseif($current_user['role'] == 'user') { ?>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div id="info-box">
                        <span id="info-box-icon" class="bg-green">
                            <i class="fa fa-building"></i>
                        </span>
                        <div id="info-box-content" title="Registros Creados">
                            <span class="info-box-text">Registros Creados</span>
                            <span class="info-box-number">10</span>
                            Hoy
                        </div>
                    </div>
                </div>
            <?php } ?>

            <div class="clearfix visible-sm-block"></div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div id="info-box">
                    <span id="info-box-icon" class="bg-yellow">
                        <?php if ($equip_RepCount == 0): ?>
                            <i class="fa fa-desktop"></i>
                        <?php else:
                            echo $this->Html->Link("<i class='fa fa-desktop'></i>", 
                                    ['controller' => 'Equipos', 'action' => 'reparados'], 
                                    ['id' => 'bg-green', 'escape' => false]);
                        endif ?> 
                    </span>
                    <div id="info-box-content" title="Equipos por Entregar">
                        <span class="info-box-text">Equipos por Entregar</span>
                        <span class="info-box-number"><?= $equip_RepCount ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div id="info-box">
                    <span id="info-box-icon" class="bg-red">
                        <?php if ($equip_EnRepCount == 0): ?>
                            <i class="fa fa-desktop"></i>
                        <?php else:
                            echo $this->Html->Link("<i class='fa fa-laptop'></i>", 
                                    ['controller' => 'Equipos', 'action' => 'reparando'], 
                                    ['id' => 'bg-green', 'escape' => false]);
                        endif ?> 
                    </span>
                    <div id="info-box-content" title="Equipos en Reparacion">
                        <span class="info-box-text">Equipos en Reparacion</span>
                        <span class="info-box-number"><?= $equip_EnRepCount ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="control-sidebar-bg"></div>




