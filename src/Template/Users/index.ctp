<div id="row" class="row">
<div class="col m12">
				<table class="highlight centered bordered">
				<caption><h5>Lista de Empleados</h5></caption>
					<thead>
						<tr>
                            <th scope="col"><?= $this->Paginator->sort('id', 'ID') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('cargo', 'CARGO') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('usuario', 'USUARIO') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('active', 'STATUS') ?></th>
                            <th scope="col" class="actions" colspan="1"><?= __('ACCIONES') ?></th>
						</tr>
					</thead>
					<tbody>
                        <?php foreach($users as $user): ?>
						<tr>
                            <td><?= $this->Number->format($user->id) ?></td>
                            <td><?= h($user->cargo) ?></td>
                            <td><?= h($user->usuario) ?></td>
                            <td>
                                <?php 
                                    if($user->active == true){
                                        echo "Activo";
                                    }else{
                                        echo "Inactivo";
                                    };
                                ?>
                            </td>
                            <td class="actions">
                                <?= $this->Html->link(__('Ver'), ['action' => 'view', $user->id], ['Class' => 'btn waves-effect waves-light']) ?>
                                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id], ['Class' => 'btn']) ?>
                                <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $user->id],['Class' => 'btn'], ['confirm' => __('Esta seguro que desea borrar este usuario # {0}?', $user->id)]) ?>
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