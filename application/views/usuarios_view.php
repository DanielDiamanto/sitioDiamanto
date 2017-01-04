
<div class="pusher" style="background-image: url(<?php echo base_url('assets//img/heat.gif');?>);">
    
    <div class="ui vertical divided stripe segment" style="padding-top: 5%">
        <div class="ui text container">
            <div class="ui content one column center aligned ">
                <div class="ui column six wide form-holder" style="color: white;">
                    <h2 class="center aligned header form-head" style="color: white;font-size: xx-large;">Registro</h2>
                    <?php
                    //Si existen las sesiones flasdata que se muestren
                        if($this->session->flashdata('correcto'))
                            echo $this->session->flashdata('correcto');
                         
                        if($this->session->flashdata('incorrecto')) 
                            echo $this->session->flashdata('incorrecto');
                    ?>
                    <?php echo validation_errors(); ?>
                    <?php echo form_open('usuarios_controller/add'); ?>
                        <div class="ui form">
                            <div class="field">
                                <input type="text" size="20" id="username" name="username" placeholder="Nombre de usuario" required>
                            </div>
                            <div class="field">
                                <input type="password" size="20" id="passowrd" name="password" placeholder="Contraseña" required>
                            </div>
                            <div class="field">
                                <input type="submit" name="submit" value="Registrarse" class="ui button large fluid inverted grey">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    