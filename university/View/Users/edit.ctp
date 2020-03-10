<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-content">
                            <?php echo $this->Form->create(false, array('id' => 'UpdateForm')) ?>
                            <div class="form-group  row">
                                <div class="col-sm-10">
                                    <div class="form-group  row"><label class="col-sm-2 col-form-label">Basic Information</label>
                                        <div class="col-sm-4">
                                            <?php
                                                echo $this->Form->input('firstname', array(
                                                    'class' => 'form-control',
                                                    'type' => 'text',
                                                    'value' => $data["profile"]["User"]["firstname"],
                                                    'placeholder' => 'Firstname',
                                                    'label' => false,
                                                    'name' => 'firstname'
                                                ));
                                            ?>
                                        </div>
                                        <div class="col-sm-4">
                                            <?php
                                                echo $this->Form->input('lastname', array(
                                                    'class' => 'form-control',
                                                    'type' => 'text',
                                                    'value' => $data["profile"]["User"]["lastname"],
                                                    'placeholder' => 'Lastname',
                                                    'label' => false,
                                                    'name' => 'lastname'
                                                ));
                                            ?>
                                        </div>
                                        <div class="col-sm-2">
                                            <?php
                                                if($data["profile"]["User"]["middle_initial"] != null) {
                                                    $attribute = 'value';
                                                    $value = $data["profile"]["User"]["middle_initial"];
                                                }
                                                else {
                                                    $attribute = 'placeholder';
                                                    $value = 'Middle Initial (optional)';
                                                }

                                                echo $this->Form->input('middle_initial', array(
                                                    'class' => 'form-control',
                                                    'type' => 'text',
                                                    'value' => $data["profile"]["User"]["middle_initial"],
                                                    'placeholder' => 'Middle Initial (optional)',
                                                    'label' => false,
                                                    'name' => 'middle_initial',
                                                    'maxlength' => 1
                                                ));
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-8">
                                            <?php
                                                echo $this->Form->input('address', array(
                                                    'class' => 'form-control',
                                                    'type' => 'text',
                                                    'value' => $data["profile"]["User"]["address"],
                                                    'placeholder' => 'Address (optional)',
                                                    'label' => false,
                                                    'name' => 'address'
                                                ));
                                            ?>
                                        </div>
                                        <div class="col-sm-2">
                                            <?php
                                                echo $this->Form->input('age', array(
                                                    'class' => 'form-control',
                                                    'type' => 'number',
                                                    'value' => $data["profile"]["User"]["age"],
                                                    'placeholder' => 'Age (optional)',
                                                    'label' => false,
                                                    'name' => 'age'
                                                ));
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-8">
                                            <div class="form-group" id="data_1">
                                                <label class="font-normal">About yourself: </label>
                                                <textarea name="about" class="form-control" placeholder="Type here . . ." rows="6" id="about"><?php echo $data["profile"]["User"]["about"]?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group" id="data_1">
                                                <label class="font-normal">Birthdate</label>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input name="birthdate" type="text" class="form-control" value="<?php echo $data["profile"]["User"]["birthdate"] ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group  row"><label class="col-sm-2 col-form-label">Account Information</label>
                                        <div class="col-sm-5">
                                            <?php
                                                echo $this->Form->input('email', array(
                                                    'class' => 'form-control',
                                                    'type' => 'email',
                                                    'value' => $data["profile"]["User"]["email"],
                                                    'label' => false,
                                                    'name' => 'email'
                                                ));
                                            ?>
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
                            <?php echo $this->Form->end() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php echo $this->Html->script(array(
                'scripts/initialize.js',
                'scripts/profile.js',
                'scripts/filereader.js'
            )) 
        ?>