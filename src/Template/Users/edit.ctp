
        
            <div class="card-panel hoverable">
                <?= $this->Form->create($user, ['novalidate']) ?>
                    <h4 class="center"><i class="prefix material-icons medium">devices</i> Editar Empleado</h4>
                    <div class="row">
                        
                        <div class="input-field col m4">
                            <i class="prefix material-icons">content_paste</i>
                            <input id="serial1" type="text" name="serial" class="validate" autofocus="true" value="<?= $user->cargo?>">
                            <label for="serial1">CARGO</label>
                        </div>
                        <div class="input-field col m4 ">
                            <i class="prefix material-icons">laptop</i>
                            <input id="tipo" type="text" name="tipo" class="validate" value="">
                            <label for="tipo">CLAVE</label>
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
                            <p>
                                <input type="checkbox" id="test5" />
                                <label for="test5">Red</label>
                            </p>
                            <?php //echo $this->Form->input("active", ['type' => 'checkbox']); ?>
                        </div>
                        <?php
                            echo $this->Form->button("Editar Usuario", ['Class' => 'btn btn-success']);
                            echo $this->Form->end();
                        ?>
                        
                    </div>
                        <a href="../../users/index" class="btn waves-effect waves-light tooltipped Medium" data-position="left" data-delay="50" data-tooltip="Volver "><i class="material-icons">keyboard_backspace</i></a>

                        <button class="wave-effect right waves-green btn tooltipped" data-position="left" data-delay="50" data-tooltip="Finalizar Edicion" type="submit"><i class="material-icons prefix">add</i></button>
                    <div style="clear: both;"></div>
                </form>
            </div>
        

    