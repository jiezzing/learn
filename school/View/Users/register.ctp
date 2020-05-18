<script>
    var page = 'users';
</script>

<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-content">
                            <div class="form-group  row"><label class="col-sm-2 col-form-label">Basic Information</label>
                                <div class="col-sm-5">
                                    <?php
                                        echo $this->Form->input('firstname', array(
                                            'class' => 'form-control',
                                            'type' => 'text',
                                            'placeholder' => 'Firstname',
                                            'label' => false
                                        ));
                                    ?>
                                </div>
                                <div class="col-sm-5">
                                    <?php
                                        echo $this->Form->input('lastname', array(
                                            'class' => 'form-control',
                                            'type' => 'text',
                                            'placeholder' => 'Lastname',
                                            'label' => false
                                        ));
                                    ?>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group  row"><label class="col-sm-2 col-form-label">Account Information</label>
                                <div class="col-sm-5">
                                    <?php
                                        echo $this->Form->input('email', array(
                                            'class' => 'form-control',
                                            'type' => 'email',
                                            'placeholder' => 'Email Address',
                                            'label' => false
                                        ));
                                    ?>
                                </div>
                                <div class="col-sm-5">
                                    <select class="chosen-select form-control" id="type">
                                        <?php foreach($types as $value) : ?>
                                            <option value="<?php echo $value['UserType']['id'] ?>"><?php echo $value['UserType']['type'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group row">
                                <div class="col-sm-12 col-sm-offset-2">
                                    <button class="btn btn-primary btn-sm float-right" type="button" id="register-btn">Register</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php echo $this->Html->script(array(
                'scripts/initialize.js',
                'scripts/users.js'
            )) 
        ?>