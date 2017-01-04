<?php

	$this->set_css($this->default_theme_path.'/flexigrid/css/flexigrid.css');
	$this->set_js_lib($this->default_theme_path.'/flexigrid/js/jquery.form.js');
	$this->set_js_config($this->default_theme_path.'/flexigrid/js/flexigrid-edit.js');

	$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/jquery.noty.js');
	$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/config/jquery.noty.config.js');
?>
<div style="text-align: -webkit-center;">
<div class="flexigrid crud-form" style='width: 50%;' data-unique-hash="<?php echo $unique_hash; ?>">
	<div class="mDiv">
		<div class="ftitle" style="font-family: fantasy;font-size: xx-large;padding-left: 34%;background-color:darkgoldenrod;">
			<div class='ftitle-left'>
				<?php echo $this->l('list_record'); ?> <?php echo $subject?>
			</div>
			<div class='clear'></div>
		</div>
	</div>
<div id='main-table-box'>
	<?php echo form_open( $read_url, 'method="post" id="crudForm"  enctype="multipart/form-data"'); ?>
	<div class='form-div'>
		<?php
		$counter = 0;
			foreach($fields as $field)
			{
				$even_odd = $counter % 2 == 0 ? 'odd' : 'even';
				$counter++;
		?>
			<div class='form-field-box <?php echo $even_odd?>' id="<?php echo $field->field_name; ?>_field_box" style="    padding-left: 32%;">
				<div class='form-display-as-box' id="<?php echo $field->field_name; ?>_display_as_box">
					<?php echo $input_fields[$field->field_name]->display_as?><?php echo ($input_fields[$field->field_name]->required)? "<span class='required'>*</span> " : ""?> :
				</div>
				<div class='form-input-box' id="<?php echo $field->field_name; ?>_input_box">
					<?php echo $input_fields[$field->field_name]->input?>
				</div>
				<div class='clear'></div>
			</div>
		<?php }?>
		<?php if(!empty($hidden_fields)){?>
		<!-- Start of hidden inputs -->
			<?php
				foreach($hidden_fields as $hidden_field){
					echo $hidden_field->input;
				}
			?>
		<!-- End of hidden inputs -->
		<?php }?>
		<?php if ($is_ajax) { ?><input type="hidden" name="is_ajax" value="true" /><?php }?>
		<div id='report-error' class='report-div error'></div>
		<div id='report-success' class='report-div success'></div>
	</div>
	<div class="pDiv" style="background: darkgoldenrod;">
		<div class='form-button-box' style="padding-left: 37%;">
			<input type='button' value='<?php echo $this->l('form_back_to_list'); ?>' class="btn btn-large back-to-list" id="cancel-button" style="background: gray; color: #ffffff; border-color: #204d74; text-transform: uppercase; border-radius: 4px; font-family: fantasy; font-size: large;"/>
		</div>
		<div class='form-button-box'>
			<div class='small-loading' id='FormLoading'><?php echo $this->l('form_update_loading'); ?></div>
		</div>
		<div class='clear'></div>
	</div>
	<?php echo form_close(); ?>
</div>
</div>
</div>
<script>
	var validation_url = '<?php echo $validation_url?>';
	var list_url = '<?php echo $list_url?>';

	var message_alert_edit_form = "<?php echo $this->l('alert_edit_form')?>";
	var message_update_error = "<?php echo $this->l('update_error')?>";
</script>
