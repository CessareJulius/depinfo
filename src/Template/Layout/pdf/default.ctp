<!DOCTYPE html>
<html lang="en">
<head>
	<?= $this->Html->charset() ?>

	<title>
		<?= $this->fetch('title') ?>
	</title>
	<?= $this->Html->css('stylePdf.css', ['fullBase' => true]) ?>
</head>
<body>
		<div class="content-wrapper">
			<center>
				<h3>DEPARTAMENTO DE MANTENIMIENTO DE EQUIPOS INFORMATICOS<br>
				TELEFONICA MOVISTAR</h3>
			</center>
			<div id="content">
				<?= $this->fetch('content') ?>
			</div>
		</div>
</body>
</html>