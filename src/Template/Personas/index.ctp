<div id="row" class="row">
<div class="col m12">
				<table class="highlight centered bordered">
				<caption><h5>Lista de Empleados</h5></caption>
					<thead>
						<tr>
                            <th scope="col"><?= $this->Paginator->sort('id', 'ID') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('cedula', 'CEDULA') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('nombre', 'NOMBRE') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('apellido', 'APELLIDO') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('telefono', 'TELEFONO') ?></th>
                            <th scope="col" class="actions" colspan="1"><?= __('ACCIONES') ?></th>
						</tr>
					</thead>
					<tbody>
                        <?php foreach($personas as $key => $persona): ?>
						<tr>
                            <td><?= $this->Number->format($persona->id) ?></td>
                            <td><?= h($persona->cedula) ?></td>
                            <td><?= h($persona->nombre) ?></td>
                            <td><?= h($persona->apellido) ?></td>
                            <td><?= h($persona->telefono) ?></td>
                            
                            <td class="actions">
                                <?= $this->Html->link(__('Ver'), ['action' => 'view', $persona->id], ['Class' => 'btn waves-effect waves-light']) ?>
                                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $persona->id], ['Class' => 'btn waves-effect waves-light']) ?>
                                <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $persona->id],['Class' => 'btn waves-effect waves-light'], ['confirm' => __('Esta seguro que desea borrar este usuario # {0}?', $persona->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
					</tbody>
				</table>
            </div>
            <div class="paginator">
            <center>
                <ul class="pagination">
                    <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
                    <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
                    <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
                </ul>
                <p><?= $this->Paginator->counter(['format' => __('Pagina {{page}} de {{pages}}, total de resultados: {{count}}')]) ?></p>
            </center>
        </div>
</div>