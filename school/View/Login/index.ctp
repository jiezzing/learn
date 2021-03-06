<div class="middle-box text-center loginscreen animated fadeInDown">
	<div>
		<?php echo $this->Form->create('User', array('url' => 'login', 'id' => 'User')) ?>
			<div class="form-group">
				<?php echo $this->Form->input('email', array(
						'class' => 'form-control', 
						'type' => 'email', 
						'id' => 'email',
						'required' => true,
						'label' => false,
						'placeholder' => 'Email'
					)); 
				?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('password', array(
						'class' => 'form-control', 
						'type' => 'password', 
						'id' => 'password',
						'required' => true,
						'label' => false,
						'placeholder' => 'Password'
					)); 
				?>
			</div>
			<?php echo $this->Form->button('Login', array(
					'class' => 'btn btn-primary block full-width m-b',
					'id' => 'login-btn'
				)); 
			?>
		<?php echo $this->Form->end() ?>
		<p class="text-muted text-center"><small>Do not have an account?</small></p>
			<?php echo $this->Html->link(
	            $this->Html->tag('button', 'Create an account', 
		            	array('class' => 'btn btn-sm btn-white btn-block')
		            ), 
		        	array('controller' => 'registration'), 
		        	array('escape' => false)) 
	        ?>
	</div>
</div>
    
<?php echo $this->Html->script('scripts/login.js') ?>
