<header id="header" class="">
	
	</header><!-- /header -->
	<!--SideBar-->
	<div class="ui left vertical menu sidebar wide inverted" style="background-image: url(<?php echo base_url('assets//img/yolandi2.gif');?>);">
		<div class="item">
			<!--<img src="<?= base_url('assets//img/face.gif')?>" style="height: 50px;width: 250px;">-->
			
		</div>
		<?php 
			if ($this->session->userdata('logged_in')) {
				echo "
				<a class='item' href=".base_url('home').">Home</a>
				<a class='item' href=".base_url('admon_users').">Administrar usuarios</a>
				<a class='item' href=".base_url('documentos').">Documentos</a>
				<a class='item' href=".base_url('contacto').">Enviar un E-Mail</a>
				";
			}else{
				echo "
				<a class='item' href=".base_url('Main').">Inicio</a>
				<a class='item' href=".base_url('Spotify').">Sobre Daniel</a>
				

				";
			}
		 ?>
	</div>
	
	<!--Barra menu-->
	<div class="ui  fixed menu ui inverted" style="width: 100%;">
		<div class="item sideMenu"><!-- el atributo sideMenu es seleccionado en una funcion de js -->
		<img src="<?= base_url('assets//img/piramid.jpg')?>" style="border-radius: 20px;">
		<label style="padding-left: 7px;">Menú</label>
		</div>
	<?php
		if($this->session->userdata('logged_in')){
			echo "
				<div class='right menu'>
					<div class='item'>
						<a class='ui inverted purple button' href='home/logout' >Cerrar Sesión</a>
					</div>					
				</div>
			 ";
		}else{
			echo "
				<div class='right menu'>
					<div class='item'>
						<a class='ui inverted purple button' href='verifylogin' >Iniciar Sesión</a>
					</div>
					<div class='item'>
						<a class='ui inverted teal button' href=".base_url('usuarios_controller').">Registrarse</a>
					</div>
				</div>
			";
		}
	?>

</div>