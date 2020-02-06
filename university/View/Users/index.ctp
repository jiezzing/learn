<script>
    var page = 'user';
</script>

<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-content">
                            <?php echo $this->Form->create(false, array('id' => 'registration')) ?>
                                <div class="form-group  row"><label class="col-sm-2 col-form-label">Basic Information</label>
                                    <div class="col-sm-4">
                                        <?php
                                            echo $this->Form->input(false, array(
                                                'class' => 'form-control',
                                                'type' => 'text',
                                                'placeholder' => 'Firstname',
                                                'label' => false,
                                                'name' => 'firstname'
                                            ));
                                        ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?php
                                            echo $this->Form->input(false, array(
                                                'class' => 'form-control',
                                                'type' => 'text',
                                                'placeholder' => 'Lastname',
                                                'label' => false,
                                                'name' => 'lastname'
                                            ));
                                        ?>
                                    </div>
                                    <div class="col-sm-2">
                                        <?php
                                            echo $this->Form->input(false, array(
                                                'class' => 'form-control',
                                                'type' => 'text',
                                                'placeholder' => 'Middle Initial',
                                                'label' => false,
                                                'name' => 'middle-initial'
                                            ));
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-8">
                                        <?php
                                            echo $this->Form->input(false, array(
                                                'class' => 'form-control',
                                                'type' => 'text',
                                                'placeholder' => 'Address',
                                                'label' => false,
                                                'name' => 'address'
                                            ));
                                        ?>
                                    </div>
                                    <div class="col-sm-2">
                                        <?php
                                            echo $this->Form->input(false, array(
                                                'class' => 'form-control',
                                                'type' => 'number',
                                                'placeholder' => 'Age',
                                                'label' => false,
                                                'name' => 'age'
                                            ));
                                        ?>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group  row"><label class="col-sm-2 col-form-label">Account Information</label>
                                    <div class="col-sm-5">
                                        <?php
                                            echo $this->Form->input(false, array(
                                                'class' => 'form-control',
                                                'type' => 'email',
                                                'placeholder' => 'Email Address',
                                                'label' => false,
                                                'name' => 'email'
                                            ));
                                        ?>
                                    </div>
                                    <div class="col-sm-5">
                                        <?php
                                            echo $this->Form->input(false, array(
                                                'class' => 'form-control',
                                                'type' => 'email',
                                                'placeholder' => 'Employee # / Student ID #',
                                                'label' => false,
                                                'name' => 'identification'
                                            ));
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-5">
                                        <?php
                                            echo $this->Form->input(false, array(
                                                'class' => 'form-control',
                                                'type' => 'password',
                                                'placeholder' => 'Password',
                                                'label' => false,
                                                'name' => 'password'
                                            ));
                                        ?><span class="form-text m-b-none">Password must have at least 10 characters.</span>
                                    </div>
                                    <div class="col-sm-5">
                                        <?php
                                            echo $this->Form->input(false, array(
                                                'class' => 'form-control',
                                                'type' => 'password',
                                                'placeholder' => 'Confirm Password',
                                                'label' => false,
                                                'name' => 'confirm-password'
                                            ));
                                        ?>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">User Type</label>
                                    <?php foreach($data['type'] as $value) : ?>
                                    <div class="col-sm-5">
                                        <div class="i-checks">
                                            <label> 
                                                <input type="radio" checked="" value="option2" name="axxx"> Teacher 
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="i-checks">
                                            <label> 
                                                <input type="radio" value="option2" name="axxx"> Student 
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row">
                                    <div class="col-sm-12 col-sm-offset-2">
                                        <button class="btn btn-primary btn-sm float-right" type="button" id="register-btn">Register</button>
                                    </div>
                                </div>
                            <?php echo $this->Form->end() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php echo $this->Html->script(array(
                'scripts/initialize.js',
                'scripts/user_registration.js'
            )) 
        ?>