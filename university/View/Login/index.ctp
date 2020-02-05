<script>
    var page = 'login';
</script>

<div class="middle-box text-center loginscreen animated fadeInDown">
	<div>
		<p>Login in. To see it in action.</p>
		<?php echo $this->Form->create('User', array(
			'class' => array('m-t'),
			'id' => 'User')); 
		?>
			<div class="form-group">
				<?php echo $this->Form->input('email', [
					'class' => array('form-control'), 
					'type' => 'email', 
					'name' => 'email',
					'required' => true,
					'label' => false,
					'placeholder' => 'Email']); 
				?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('password', array(
					'class' => array('form-control'), 
					'type' => 'password', 
					'name' => 'password',
					'required' => true,
					'label' => false,
					'placeholder' => 'Password')); 
				?>
			</div>
			<?php echo $this->Form->button('Login', array(
				'class' => array('btn', 'btn-primary', 'block', 'full-width', 'm-b'),
				'id' => 'login-btn')); 
			?>
		<?php echo $this->Form->end(); ?>
		<p class="text-muted text-center"><small>Do not have an account?</small></p>
		<a class="btn btn-sm btn-white btn-block" href="../users/register">Create an account</a>
	</div>
</div>
    
<?php 
    echo $this->Html->script(array(
        'scripts/index.js'
    )); 
?>
