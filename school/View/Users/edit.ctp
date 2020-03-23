<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-content">
                    <div class="form-group  row">
                        <div class="col-sm-10">
                            <div class="form-group  row"><label class="col-sm-2 col-form-label">Basic Information</label>
                                <div class="col-sm-3">
                                    <?php echo $this->Form->input('firstname', array(
                                            'class' => 'form-control',
                                            'type' => 'text',
                                            'value' => $profile['User']['firstname'],
                                            'placeholder' => 'Firstname',
                                        ));
                                    ?>
                                </div>
                                <div class="col-sm-4">
                                    <?php echo $this->Form->input('lastname', array(
                                            'class' => 'form-control',
                                            'type' => 'text',
                                            'value' => $profile['User']['lastname'],
                                            'placeholder' => 'Lastname',
                                        ));
                                    ?>
                                </div>
                                <div class="col-sm-3">
                                    <?php echo $this->Form->input('middle_initial', array(
                                            'class' => 'form-control',
                                            'type' => 'text',
                                            'value' => $profile['User']['middle_initial'],
                                            'placeholder' => 'Middle Initial (optional)',
                                            'maxlength' => 1
                                        ));
                                    ?>
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-7">
                                    <?php echo $this->Form->input('address', array(
                                            'class' => 'form-control',
                                            'type' => 'text',
                                            'value' => $profile['User']['address'],
                                            'placeholder' => 'Address (optional)',
                                        ));
                                    ?>
                                </div>
                                <div class="col-sm-3">
                                    <?php echo $this->Form->input('age', array(
                                            'class' => 'form-control',
                                            'type' => 'number',
                                            'value' => $profile['User']['age'],
                                            'placeholder' => 'Age (optional)',
                                        ));
                                    ?>
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-7">
                                    <div class="form-group" id="data_1">
                                        <label class="font-normal">About yourself: </label>
                                        <textarea name="about" class="form-control" placeholder="Your text here... (optional)" rows="6" id="about"><?php echo $profile['User']['about'] ?></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group" id="data_1">
                                        <label class="font-normal">Birthdate</label>
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input placeholder="Birthdate (optional)" id="birthdate" type="text" class="form-control" value="<?php echo date('m/d/Y', strtotime($profile['User']['birthdate'])) ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group  row"><label class="col-sm-2 col-form-label">Account Information</label>
                                <div class="col-sm-5">
                                    <label class="col-sm-5 col-form-label row">Email Address</label>
                                    <?php
                                        echo $this->Form->input('email', array(
                                            'class' => 'form-control',
                                            'type' => 'email',
                                            'value' => $profile['User']['email'],
                                            'placeholder' => 'Email Address',
                                            'label' => false
                                        ));
                                    ?>
                                </div>
                                <div class="col-sm-5">
                                    <label class="col-sm-5 col-form-label row">Current Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password" placeholder="Verify your password before updating"> 
                                        <span class="input-group-append"> 
                                            <button type="button" class="btn btn-primary" id="search-password">Search</button> 
                                        </span>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group row" hidden="hidden" id="password-div"><label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-5">
                                    <label class="col-sm-5 col-form-label row">New Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="new-password"> 
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <label class="col-sm-5 col-form-label row">Confirm New Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="confirm-new-password"> 
                                    </div>
                                </div>

                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group row">
                                <div class="col-sm-12 col-sm-offset-2">
                                    <button class="btn btn-primary btn-sm" type="button" id="update-profile-btn">Update Information</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">

                            <?php 
                                if($profile['User']['image'] != null) {
                                    $image = json_decode($profile['User']['image'], true);
                                    $image = $image['name'];
                                }
                                else {
                                    $image = 'default.png';
                                }
                            ?> 

                            <?php echo $this->Html->image($image, array(
                                    'alt' => 'image',
                                    'class' => 'img-fluid',
                                    'id' => 'image-viewer'
                                )); 
                            ?>
                            <input type="file" accept="image/*" id="file" class="hide mt-2">
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