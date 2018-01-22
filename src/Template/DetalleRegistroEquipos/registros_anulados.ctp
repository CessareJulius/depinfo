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
            <li class="active">Registros Anulados</li>
        </ol>
    </section>

        <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <center><h1 class="box-title">Lista de Registros Anulados</h1></center>
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
                                    <th style="width: 165px;" ><center>ACCIONES</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($registrosAnulados as $registroAnulado): ?>
                                <tr>
                                    <td><?= $this->Number->format($registroAnulado->id) ?></td>
                                    <td><?= h($registroAnulado->registro_equipo->Codigo) ?></td>
                                    <td><?= h($registroAnulado->equipo->tipo) ?></td>
                                    <td><?= h($registroAnulado->registro_equipo->persona->nombre." ".$registroAnulado->registro_equipo->persona->apellido) ?></td>
                                    <td><?= h($registroAnulado->registro_equipo->user->persona->nombre." ".$registroAnulado->registro_equipo->user->persona->apellido) ?></td>
                                    <td class="actions">
                                    <center>
                                        <?php 
                                            echo $this->Html->link(__('Ver'), ['action' => 'view', $registroAnulado->id], ['Class' => 'btn btn-info btn-sm']); 
                                            echo "&nbsp;";
                                            if ($current_user['role'] == 'admin') {
                                                echo $this->Form->postLink(__('Activar'), ['action' => 'activar', $registroAnulado->id],['Class' => 'btn btn-warning btn-sm'], ['confirm' => __('Esta seguro que desea Activar este Registro # {0}?', $registroAnulado->id)]);
                                            } 
                                        ?>
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