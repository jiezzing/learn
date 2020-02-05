<script>
    var page = 'register';
</script>

<div class="middle-box text-center loginscreen animated fadeInDown">
	<div>
		<p>CREATE NEW ACCOUNT</p>
		<?php echo $this->Form->create('User', array(
			'class' => array('m-t'),
			'id' => 'User')); 
		?>
			<div class="form-group">
				<?php echo $this->Form->input('name', [
					'class' => array('form-control'), 
					'type' => 'text', 
					'name' => 'name',
					'required' => false,
					'label' => false,
					'placeholder' => 'Name']); 
				?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('email', [
					'class' => array('form-control'), 
					'type' => 'email', 
					'name' => 'email',
					'required' => false,
					'label' => false,
					'placeholder' => 'Email']); 
				?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('password', array(
					'class' => array('form-control'), 
					'type' => 'password', 
					'name' => 'password',
					'required' => false,
					'label' => false,
					'placeholder' => 'Password')); 
				?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('confirm-password', array(
					'class' => array('form-control'), 
					'type' => 'password', 
					'name' => 'confirm-password',
					'required' => false,
					'label' => false,
					'placeholder' => 'Confirm Password')); 
				?>
			</div>
			<?php echo $this->Form->button('Register', array(
				'class' => array('btn', 'btn-primary', 'block', 'full-width', 'm-b'),
				'id' => 'register-btn',
				'type' => 'button')); 
			?>
		<?php echo $this->Form->end(); ?>
		<p class="text-muted text-center"><small>Already have an account?</small></p>
		<a class="btn btn-sm btn-white btn-block" href="../users/login">Login here</a>
	</div>
</div>
    
<?php 
    echo $this->Html->script([
        'scripts/index.js'
    ]); 
?>