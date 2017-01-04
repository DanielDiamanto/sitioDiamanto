<div class="pusher" style="background-image: url(<?php echo base_url('assets//img/rainbow.gif');?>);background-size: cover;" oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
	
	<div class="ui vertical  segment"  style="padding-top: 5%">
		<div class="ui text container">
			<div class="ui message" style="text-align: center;">
				<h1 class="ui header">Envíe un correo</h1>
				
				<form action="<?=base_url("contacto/enviar")?>" method="post">
    Correo electronico: <br/>
    <input type="email" name="des"  required/><br/>
    Asunto: <br/>
    <input type="text" name="subject"  required/><br/>
    Mensaje:<br/>
    <textarea name="mensaje" required></textarea><br/>
    <input type="submit" name="submit" value="Enviar"/>
</form>
<?php
if($this->session->flashdata('envio')){
    echo $this->session->flashdata('envio');
}
?>
			</div>
		</div>
	</div>