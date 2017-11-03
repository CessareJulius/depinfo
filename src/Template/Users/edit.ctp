
        
            <div class="card-panel hoverable">
                <?= $this->Form->create($user, ['novalidate']) ?>
                    <h4 class="center"><i class="prefix material-icons medium">devices</i> Editar Empleado</h4>
                    <div class="row">
                        
                        <div class="input-field col m4">
                            <i class="prefix material-icons">content_paste</i>
                            <!--<input id="serial1" type="text" name="serial" class="validate" autofocus="true" value="">-->
                            <?= $this->Form->control('cedula', ['id'=>'serial1', 'class'=>"validate", 'autofocus'=>"true", 'label' => 'CEDULA']) ?>
                        </div>
                        <div class="input-field col m4">
                            <i class="prefix material-icons">content_paste</i>
                            <!--<input id="serial1" type="text" name="serial" class="validate" autofocus="true" value="">-->
                            <?= $this->Form->control('nombre', ['id'=>'serial1', 'class'=>"validate", 'label' => 'NOMBRE']) ?>
                        </div>
                        <div class="input-field col m4">
                            <i class="prefix material-icons">content_paste</i>
                            <!--<input id="serial1" type="text" name="serial" class="validate" autofocus="true" value="">-->
                            <?= $this->Form->control('apellido', ['id'=>'serial1', 'class'=>"validate", 'label' => 'APELLIDO']) ?>
                        </div>
                        <div class="input-field col m4">
                            <i class="prefix material-icons">content_paste</i>
                            <!--<input id="serial1" type="text" name="serial" class="validate" autofocus="true" value="">-->
                            <?= $this->Form->control('telefono', ['id'=>'serial1', 'class'=>"validate", 'label' => 'TELEFONO']) ?>
                        </div>
                        <div class="input-field col m4">
                            <i class="prefix material-icons">content_paste</i>
                            <!--<input id="serial1" type="text" name="serial" class="validate" autofocus="true" value="">-->
                            <?= $this->Form->control('cargo', ['id'=>'serial1', 'class'=>"validate", 'label' => 'CARGO']) ?>
                        </div>
                        <div class="input-field col m4">
                            <i class="prefix material-icons">content_paste</i>
                            <!--<input id="serial1" type="text" name="serial" class="validate" autofocus="true" value="">-->
                            <?= $this->Form->control('usuario', ['id'=>'serial1', 'class'=>"validate", 'label' => 'USUARIO']) ?>
                        </div>
                        <div class="input-field col m4">
                            <i class="prefix material-icons">content_paste</i>
                            <!--<input id="serial1" type="text" name="serial" class="validate" autofocus="true" value="">-->
                            <?= $this->Form->control('clave', ['id'=>'serial1', 'class'=>"validate", 'label' => 'CLAVE', 'value' => '']) ?>
                        </div>
                        <div class="input-field col m4 ">
                            <i class="material-icons prefix">query_builder</i>
                            <select class="center">
                                <option value="" selected>Seleccione el Turno</option>
                                <option value="1">Mañana</option>
                                <option value="2">Tarde</option>
                            </select>
                            <label>Turno</label>
					    </div>
                        <div class="input-field col m4 ">
                            
                            <?php echo $this->Form->input("active", ['type' => 'checkbox']); ?>
                        </div>
                    </div>
                        <a href="../../users/index" class="btn waves-effect waves-light tooltipped Medium" data-position="left" data-delay="50" data-tooltip="Volver "><i class="material-icons">keyboard_backspace</i></a>

                        <?php
                            echo $this->Form->button("Editar Usuario", ['Class' => 'wave-effect right waves-green btn tooltipped', 'data-position' => "left", "data-delay" => "50",'data-tooltip' => "Finalizar Edicion", 'i' => ['class' => 'material-icons prefix']]);
                            echo $this->Form->end();
                        ?>
                        
                    
            </div>
        

    