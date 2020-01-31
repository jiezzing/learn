<div class="middle-box text-center loginscreen animated fadeInDown">
	<div>
		<p>Login in. To see it in action.</p>
		<?php echo $this->Form->create('User', ['class' => ['m-t']]);?>
			<div class="form-group">
				<?php echo $this->Form->input('email', [
					'class' => ['form-control'], 
					'type' => 'email', 
					'required' => true,
					'label' => false,
					'placeholder' => 'Email']); 
				?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('password', [
					'class' => ['form-control'], 
					'type' => 'password', 
					'required' => true,
					'label' => false,
					'placeholder' => 'Password']); 
				?>
			</div>
			<?php echo $this->Form->button('login', [
				'class' => ['btn', 'btn-primary', 'block', 'full-width', 'm-b']
			]); ?>
		<?php echo $this->Form->end(); ?>
		<p class="text-muted text-center"><small>Do not have an account?</small></p>
		<a class="btn btn-sm btn-white btn-block" href="../learn/users/register">Create an account</a>
		<p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
	</div>
</div>
