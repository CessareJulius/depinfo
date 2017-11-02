<style>
	body{
		background: url(assets/images/.jpg);
		background-size: cover;
		background-attachment: fixed;
		background-repeat: no-repeat;
	}	
</style>
	
		<div class="col m6 offset-m3 frm">
			<div class="card-panel hoverable">
				<form  method="post" action="" >
					<h4 class="center">Iniciar Sesión</h4>
					<div class="row">
						<div class="input-field col m10 offset-m1">
							<i class="prefix material-icons">perm_identity</i>
							<input id="usuario" type="text" class="validate">
							<label for="usuario">Usuario</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col m10 offset-m1">
							<i class="prefix material-icons">vpn_key</i>
							<input id="clave" type="password" class="validate">
							<label for="clave">Clave</label>
						</div>
					</div>
					<button class="btn waves-effect waves-light blue right" type="submit" name="entrar">Entrar<i class="material-icons right">input</i></button>
					<div style="clear: both;"></div>
				</form>
			</div>
		</div>
