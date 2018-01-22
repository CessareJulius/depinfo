<style>
#editEmp{
    position: relative;
    margin-left: 25%;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}

#box-body-Edit{
    margin-left: 14%;
}

</style>

<div class="content-wrapper">
    <?= $this->Flash->render() ?>
    <section class="content-header">
        <center><h3><i class="fa fa-user-plus"> Crear Nuevo Registro</i></h3></center>
        <ol class="breadcrumb">
            <li>
              <?= $this->Html->Link('<i class="fa fa-home"></i> Inicio', 
                [
                    'controller' => 'Users',
                    'action' => 'home'
                ],
                [
                    'escape' => false
                ]) 
              ?>
            </li>
            <li>
              <?= $this->Html->Link('Registros', 
                [
                    'controller' => 'DetalleRegistroEquipos',
                    'action' => 'index'
                ],
                [
                    'escape' => false
                ]) 
              ?>
            </li>
            <li class="active">Crear Nuevo</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <?php 
                if ($formCedula == true): ?>
                    
                    <div id="editEmp" class="col-xs-6">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <center><h3 class="box-title"><i class="fa fa-male"> Ingrese la Cedula de la Persona</i></h3></center>
                            </div>
                            <?php 
                                echo $this->Form->create($formCedula, ['class' => 'form-horizontal']) 
                            ?>
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="cedula" class="col-sm-2 control-label">Cedula</label>
                                        <div class="col-sm-10">
                                            <?=
                                                $this->Form->input('cedula', ['class' => 'form-control', 'placeholder' => 'Cedula',
                                                    'label' => false, 'required', 'autofocus', 'type' => 'number'])
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <?= $this->Html->Link('Cancelar', ['controller' => 'Users', 'action' => 'home'], ['class' => 'btn btn-danger']) ?>
                                    <?= $this->Form->button("Siguiente", ['name' => 'buscarCedula', 'value' => 'bCedula', 'Class' => 'btn btn-info pull-right']); ?>
                                </div>
                            <?= $this->Form->end() ?>
                        </div>
                    </div>

            <?php else: ?>
                <div class="col-xs-12">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <center><h3 class="box-title">Datos del Cliente</h3></center>
                        </div>
                        <?php if ($countClient > 0) {$status = 'disabled'; $valueCedula = $cliente['cedula']; $valueNombre = $cliente['nombre']; $valueApellido = $cliente['apellido']; $valueTelefono = $cliente['telefono'];} else {$status = 'enabled'; $valueCedula = ""; $valueNombre = ""; $valueApellido = ""; $valueTelefono = "";} ?>
                        <?= $this->Form->create($detalleRegistroEquipo) ?>
                            <div class="box-body">
                                    <?php 
                                        echo $this->Form->control("Personas.cedula", ['label' => 'Cedula', 'type' => 'hidden', 'class' => 'form-control', 'value' => $valueCedula]);
                                    ?>
                                <div class="form-group col-xs-3">
                                    <?php 
                                        echo $this->Form->control("Personas.cedula", ['label' => 'Cedula', 'class' => 'form-control', $status, 'value' => $valueCedula]);
                                    ?>
                                </div>
                                <div class="form-group col-xs-3">
                                    <?php 
                                        echo $this->Form->control("Personas.nombre", ['label' => 'Nombre', 'class' => 'form-control', $status, 'value' => $valueNombre]);
                                    ?>
                                </div>
                                <div class="form-group col-xs-3">
                                    <?php 
                                        echo $this->Form->control("Personas.apellido", ['label' => 'Apellido', 'class' => 'form-control', $status, 'value' => $valueApellido]);
                                    ?>
                                </div>
                                <div class="form-group col-xs-3">
                                    <?php 
                                        echo $this->Form->control("Personas.telefono", ['label' => 'Telefono', 'class' => 'form-control', $status, 'value' => $valueTelefono]);
                                    ?>
                                </div>
                            </div>
                            <div class="box-footer">
                                <center><h4 class="box-title">Datos del Equipo</h4></center>
                                    <?php 
                                        echo $this->Form->control("RegistroEquipos.Codigo", ['id' => 'disabled', 'type' => 'hidden', 'label' => 'Codigo', 'class' => 'form-control']);
                                    ?>
                                <div class="form-group col-xs-3">
                                    <?php 
                                        echo $this->Form->control("Equipos.serial", ['label' => 'Serial', 'class' => 'form-control', 'placeholder' => 'Ejm: AB-CDE-FGH-IJ']);
                                    ?>
                                </div>
                                <div class="form-group col-xs-3">
                                    <?php 
                                        echo $this->Form->control("Equipos.tipo", ['label' => 'Tipo', 'class' => 'form-control', 'placeholder' => 'Ejm: Laptop']);
                                    ?>
                                </div>
                                <div class="form-group col-xs-3">
                                    <?php 
                                        echo $this->Form->control("Equipos.marca", ['label' => 'Marca', 'class' => 'form-control', 'placeholder' => 'Ejm: Samsung']);
                                    ?>
                                </div>
                                <div class="form-group col-xs-3">
                                    <?php 
                                        echo $this->Form->control("Equipos.modelo", ['label' => 'Modelo', 'class' => 'form-control', 'placeholder' => 'Ejm: Compac']);
                                    ?>
                                </div>
                                <div class="form-group col-xs-3">
                                    <?php 
                                        echo $this->Form->control("Equipos.departamento", ['label' => 'Departamento', 'class' => 'form-control', 'placeholder' => 'Dejar vacio si no posee']);
                                    ?>
                                </div>
                                <div class="form-group col-xs-4">
                                    <?php 
                                        echo $this->Form->control("DetalleRegistroEquipos.falla", ['label' => 'Fallas', 'class' => 'form-control', 'rows' => 3]);
                                    ?>
                                </div>
                            </div>
                            <div class="box-footer">
                                <?php
                                    echo $this->Html->Link("<i class='fa fa-reply'>&nbsp;</i>Volver", ['controller' => 'DetalleRegistroEquipos','action' => 'index'], ['id' => 'btnVolEmp', 'class' => 'btn btn-info', 'escape' => false]);
                                    echo $this->Form->button("<i class='fa fa-share'>&nbsp;</i>Crear Registro", ['name' => 'crearRegistro', 'value' => 'cRegistro', 'id' => 'btnEditEmp', 'Class' => 'btn btn-primary', 'escape' => false]);
                                ?>
                            </div>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </section>
</div>

<script>
    $(document).ready(function(){

	var hora = ()=> {
		let time = new Date(),
			hora = time.getHours(),
			min  = time.getMinutes(),
			seg  = time.getSeconds(),
			elem = document.getElementById('hora');

		if(hora < 10)hora = '0' + hora ;
		if(min < 10)min = '0' + min ;
		if(seg < 10)seg = '0' + seg ; 

		elem.innerHTML = hora+':'+min+':'+seg;
	}

	setInterval(hora, 1000);

	// serial pa' los dos input

	function codigo(){

		var alpha  = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',0,1,2,3,4,5,6,7,8,9]
		,   cod = []
		,	numb   = [0,1,2,3,4,5,6,7,8,9]
		,	pass1=[], pass2=[], pass3=[], pass4=[]
		,	random = (p)=> {
			return Math.ceil(Math.random()*p -1)
		}

		for (var i = 0; i < 2; i++) {
			let pos = alpha[random(alpha.length)]
			pass1.push(pos)
		}
		for (var i = 0; i < 3; i++) {
			let pos = alpha[random(alpha.length)]
			pass2.push(pos)
		}
		for (var i = 0; i < 3; i++) {
			let pos = alpha[random(alpha.length)]
			pass3.push(pos)
		}	
		for (var i = 0; i < 2; i++) {
			let pos = numb[random(numb.length)]
			pass4.push(pos)
		}

		return pass1.join('')+'-'+pass2.join('')+'-'+pass3.join('')+'-'+pass4.join('');
	}

	var input1 = document.getElementById('disabled'), input2 = document.getElementById('serial') ;

	input1.value = codigo()
	input2.value = codigo()

})
// 69Jos123_e$f4#
// 47Kci884¡c&f7_


// AB5-98Y0R-9HG12-12
</script>