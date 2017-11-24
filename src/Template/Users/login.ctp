<div class="login-box">
	<div class="login-logo">
    	<a href="../../index2.html"><b>Dep</b>INFO</a>
	</div>
  	<!-- /.login-logo -->
	<div class="login-box-body">
    	<p class="login-box-msg">Iniciar Sesion</p>

		<?= $this->Form->create() ?>
			<div class="form-group has-feedback">
				<?=
					$this->Form->input('usuario', ['class' => 'form-control', 'placeholder' => 'Usuario',
						'label' => false, 'required', 'autofocus'])
				?>
				<span class="glyphicon glyphicon-user form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<?=
					$this->Form->input('clave', ['class' => 'form-control', 'type' => 'password','placeholder' => 'Clave',
						'label' => false, 'required'])
				?>
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<div class="row">
				<div class="col-xs-8">
					<div class="checkbox icheck">
						<label>
							<input type="checkbox"> Recordame?
						</label>
					</div>
				</div>
				<!-- /.col -->
				<div class="col-xs-4">
					<?= $this->Form->button('Ingresar', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'Ingresar']) ?>
				</div>
				<!-- /.col -->
			</div>
		<?= $this->Form->end() ?>
	</div>
  <!-- /.login-box-body -->
</div>
