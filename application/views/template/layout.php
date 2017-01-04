<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<link rel="shortcut icon" type="image/png" href='<?= base_url('assets//img/user16.png')?>'/>
		
		<title><?= $titulo ?></title>
		<?= $css ?>
		<?= $js ?>
		<script>
		$(document)
		.ready(function() {

		// create sidebar and attach to menu open
		$('.ui.sidebar')
		.sidebar('attach events', '.sideMenu')
		;
		})
		;
		</script>
		
	</head>
	<body class="">
			<?= $header ?>			
			<?= $contenido ?>
			<?= $footer ?>
		</body>
	</html>