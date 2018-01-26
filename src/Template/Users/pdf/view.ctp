<style type="text/css">
	body {
		font-size: 24px;
	}
</style>

<?php $this->start('header'); ?>
    <p style="text-align: center; margin-top: 35px">Telefonica Movistar.</p>
<?php $this->end(); ?>

<?php echo $this->Dompdf->image('img/TM/tm_01.jpeg', ['class' => 'imgclass']); ?>

<center>
	<h2>DEPARTAMENTO DE MANTENIMIENTO DE EQUIPOS INFORMATICOS<br>
	TELEFONICA MOVISTAR</h2>
</center>
<br>

<section class="content">

	<div class="row">
        <div class="col-md-6">
            <div class="box box-success">
                <h3 class="box-title" style="font-size: 30px;">Datos Personales</h3>&nbsp;&nbsp;
	            <div class="box-body">
	                <dl>
	                    <dt>Cedula</dt>
	                        <dd>&nbsp;&nbsp;<?= $user->persona->cedula ?></dd>
	                        <br>

	                    <dt>Nombre(s)</dt>
	                        <dd>&nbsp;&nbsp;<?= $user->persona->nombre ?></dd>
	                        <br>

	                    <dt>Apellido(s)</dt>
	                        <dd>&nbsp;&nbsp;<?= $user->persona->apellido ?></dd>
	                        <br>

	                    <dt>Telefono</dt>
	                        <dd>&nbsp;&nbsp;<?= $user->persona->telefono ?></dd>
	                        <br>
	                </dl>
	            </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-primary">
                <h3 class="box-title" style="font-size: 30px;">Datos de Empleado/Usuario</h3>&nbsp;&nbsp;
                <div class="box-body">
                    <dl>

                        <dt>Cargo</dt>
                            <dd>&nbsp;&nbsp;<?= $user->cargo ?></dd>
                            <br>

                        <dt>Turno</dt>
                            <?php if($user->turno == 1){ ?>
                                <dd>&nbsp;&nbsp;<?php echo "Mañana"; ?></dd>
                                <br>
                            <?php }else{ ?>
                                <dd>&nbsp;&nbsp;<?php echo "Tarde"; ?></dd>
                                <br>
                            <?php } ?>
                        <dt>Usuario</dt>
                            <dd>&nbsp;&nbsp;<?= $user->usuario ?></dd>
                            <br>

                        <dt>Habilitado</dt>
                            <dd>&nbsp;&nbsp;<?= $user->active ? 'SI' : 'NO' ?></dd>
                            <br>
                    </dl>
                </div>
            </div>
        </div>
    </div>

</section>




<?php $this->start('footer'); ?>
    <strong>DMEITM &copy; 2017-2018 <a href="https://www.servitec.com.ve">SERVITEC</a>.</strong>
	Todos los derechos reservados.
<?php $this->end(); ?>