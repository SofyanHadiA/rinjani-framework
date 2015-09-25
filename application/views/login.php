
<div id="login-container" class="container">

	<h1 class="text-center">
		{pagetitle}
	</h1>
	
	<hr/>
	
	<div id="welcome_message">
		{pagedescription} 
		<?php // echo $this->lang->line('login_welcome_message'); ?> 
	</div>
	
	<br/>
	
	<?php echo form_open('login') ?>
		<div id="login_form" class="form-group">			
			
			<?php if(validation_errors()){ ?>
				<div class="bg-danger"></i><?php echo validation_errors(); ?></div>	
			<?php } ?>
									
			<?php 
			echo form_input(array('name'=>'username', 
				'size'=>'20', 
				'class'=>'form-control', 
				'placeholder'=>$this->lang->line('login_username')));				
			?>	
			
			<br/>
			
			<?php 			
			echo form_password(array(
				'name'=>'password', 
				'size'=>'20',
				'class'=>'form-control', 
				'placeholder'=>'Password')); 
			?>
			
			<br/>
			
			<button type="submit" class="btn btn-primary btn-block">Login</button>
	
		</div>
	<?php echo form_close(); ?>
</div>