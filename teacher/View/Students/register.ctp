<script>
    var page = 'users';
</script>

<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-content">
                            <div class="form-group  row"><label class="col-sm-2 col-form-label">Basic Information</label>
                                <div class="col-sm-4">
                                    <?php
                                        echo $this->Form->input(false, array(
                                            'class' => 'form-control',
                                            'type' => 'text',
                                            'placeholder' => 'Firstname',
                                            'label' => false,
                                            'id' => 'firstname'
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
                                            'id' => 'lastname'
                                        ));
                                    ?>
                                </div>
                                <div class="col-sm-2">
                                    <?php
                                        echo $this->Form->input(false, array(
                                            'class' => 'form-control',
                                            'type' => 'text',
                                            'placeholder' => 'Middle Initial (optional)',
                                            'label' => false,
                                            'name' => 'middle-initial',
                                            'maxlength' => 1
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
                                            'placeholder' => 'Address (optional)',
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
                                            'placeholder' => 'Age (optional)',
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
                                            'id' => 'email'
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
                                            'id' => 'identification'
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
                                            'id' => 'password'
                                        ));
                                    ?><span class="form-text m-b-none">Password must have at least 10 characters.</span>
                                </div>
                                <div class="col-sm-5">
                                    <select class="chosen-select form-control">
                                        <?php foreach($section as $value) : ?>
                                            <option value="<?php echo $value['Section']['id'] ?>"><?php echo 'Section ' . $value['Section']['name'] . ' - ' . $value['Level']['name']?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <span class="form-text m-b-none">Section</span>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group row">
                                <div class="col-sm-12 col-sm-offset-2">
                                    <button class="btn btn-primary btn-sm float-right" type="button" id="register-btn">Register Student</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php echo $this->Html->script(array(
                'scripts/initialize.js',
                'scripts/register.js'
            )) 
        ?>