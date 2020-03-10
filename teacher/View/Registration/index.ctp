<div class="middle-box text-center loginscreen animated fadeInDown">
	<div>
		<p>Login in. To see it in action.</p>
		<form id="University">
			<div class="form-group">
				<?php echo $this->Form->input('firstname', [
					'class' => array('form-control'), 
					'type' => 'text', 
					'required' => true,
					'label' => false,
					'placeholder' => 'Firstname']); 
				?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('lastname', [
					'class' => array('form-control'), 
					'type' => 'text', 
					'required' => true,
					'label' => false,
					'placeholder' => 'Lastname']); 
				?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('employee_code', [
					'class' => array('form-control'), 
					'type' => 'text', 
					'required' => true,
					'label' => false,
					'placeholder' => 'Employee #']); 
				?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('password', array(
					'class' => array('form-control'), 
					'type' => 'password', 
					'required' => true,
					'label' => false,
					'placeholder' => 'Password')); 
				?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('confirm_password', [
					'class' => array('form-control'), 
					'type' => 'password', 
					'required' => true,
					'label' => false,
					'placeholder' => 'Confirm password']); 
				?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('email', [
					'class' => array('form-control'), 
					'type' => 'email', 
					'required' => true,
					'label' => false,
					'placeholder' => 'Email']); 
				?>
			</div>
			<div class="row m-b">
	            <div class="col-md-12">
	                <select class="universities form-control">
	                    <option></option>
	                    <?php foreach($data['universities'] as $value) : ?>
	                    	<option value="<?php echo $value['University']['id'] ?>"><?php echo $value['University']['name'] ?></option>
	                    <?php endforeach ?>
	                </select>
	            </div>
	        </div>
			<?php echo $this->Form->button('Register', array(
					'class' => array(
						'btn', 
						'btn-primary', 
						'block', 
						'full-width', 
						'm-b'
					),
					'id' => 'register-btn',
					'type' => 'button')); 
			?>
		</form>
		<p class="text-muted text-center"><small>Already have an account?</small></p>
		<?php echo $this->Html->link(
            $this->Html->tag('button', 'Go to login', array(
            	'class' => 'btn btn-sm btn-white btn-block')
        	), array(
                "controller" => "login",
                "action" => "index"
            ), array(
                'escape' => false
            )) 
        ?>
	</div>
</div>
    
<?php 
    echo $this->Html->script(array(
        'scripts/registration.js'
    )); 
?>
