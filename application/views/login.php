<?php
	$no_navigation = true;
	 
	$this->load->view("partial/header"); 
?>

<?php echo form_open('login') ?>
<div id="container" class="container">
<?php echo validation_errors(); ?>
	<div id="top">
	<?php echo $this->lang->line('login_login'); ?>
	</div>
	<div id="login_form">
		<div id="welcome_message">
		<?php echo $this->lang->line('login_welcome_message'); ?>
		</div>
		
		<div class="form_field_label"><?php echo $this->lang->line('login_username'); ?>: </div>
		<div class="form_field">
		<?php echo form_input(array(
		'name'=>'username', 
		'size'=>'20')); ?>
		</div>

		<div class="form_field_label"><?php echo $this->lang->line('login_password'); ?>: </div>
		<div class="form_field">
		<?php echo form_password(array(
		'name'=>'password', 
		'size'=>'20')); ?>
		
		</div>
		
		<div id="submit_button">
		<?php echo form_submit('loginButton','Go'); ?>
		</div>
	</div>
</div>
<?php echo form_close(); ?>
