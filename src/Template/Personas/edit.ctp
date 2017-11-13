<style>
#editEmp{
    position: relative;
    margin-left: 62px;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}

#btnEditClient{
    margin-left: 25%;
}

#btnVolClient{
    margin-left: 17%;
}

#box-body-Edit{
    margin-left: 14%;
}

</style>

<div class="content-wrapper">
    <section class="content-header">
        <center><h3><i class="fa fa-male"> Editar Datos</i></h3></center>
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
              <?= $this->Html->Link('Personas', 
                [
                    'controller' => 'Personas',
                    'action' => 'index'
                ],
                [
                    'escape' => false
                ]) 
              ?>
            </li>
            <li class="active">Editar Datos</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div id="editEmp" class="col-xs-10">
                <!-- general form elements -->
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <center><h3 class="box-title">Datos Personales</h3></center>
                    </div>
                    <?= $this->Form->create($persona) ?>
                        <div id="box-body-Edit" class="box-body">
                            <div class="form-group col-xs-5">
                                <?php 
                                    echo $this->Form->input("cedula", ['label' => 'Cedula', 'class' => 'form-control']);
                                ?>
                            </div>
                            <div class="form-group col-xs-5">
                                <?php 
                                    echo $this->Form->input("nombre", ['label' => 'Nombre', 'class' => 'form-control']);
                                ?>
                            </div>
                            <div class="form-group col-xs-5">
                                <?php 
                                    echo $this->Form->input("apellido", ['label' => 'Apellido', 'class' => 'form-control']);
                                ?>
                            </div>
                            <div class="form-group col-xs-5">
                                <?php 
                                    echo $this->Form->input("telefono", ['label' => 'Telefono', 'class' => 'form-control']);
                                ?>
                            </div>
                        </div>
                        <div class="box-footer">
                            <?= $this->Html->Link('Volver', ['action' => 'index'], ['id' => 'btnVolClient', 'class' => 'btn btn-info']) ?>
                            <?= $this->Form->button("Editar Persona", ['id' => 'btnEditClient', 'Class' => 'btn btn-primary']); ?>
                        </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </section>
</div>


<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $persona->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $persona->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Personas'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="personas form large-9 medium-8 columns content">
    <?= $this->Form->create($persona) ?>
    <fieldset>
        <legend><?= __('Edit Persona') ?></legend>
        <?php
            echo $this->Form->control('cedula');
            echo $this->Form->control('nombre');
            echo $this->Form->control('apellido');
            echo $this->Form->control('telefono');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
