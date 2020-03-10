<script>
    var id = <?php echo $this->request->params['pass'][0] ?>;
</script>   

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="col-lg-12">
                    <?php echo $this->Form->create(false, array('id' => 'announcement')) ?>
                    <?php $details = json_decode($data['details']['Announcement']['announcement'], true) ?>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Announcement Title</label>
                            <div class="col-sm-12">
                                <?php
                                    echo $this->Form->input(false, array(
                                        'class' => 'form-control',
                                        'type' => 'text',
                                        'label' => false,
                                        'name' => 'title',
                                        'value' => $details['title']
                                    ));
                                ?>
                            </div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Short Description</label>
                            <div class="col-sm-12">
                                <?php
                                    echo $this->Form->input(false, array(
                                        'class' => 'form-control',
                                        'type' => 'text',
                                        'label' => false,
                                        'name' => 'description',
                                        'value' => $details['description']
                                    ));
                                ?>
                            </div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Recipient</label>
                            <div class="col-sm-12"></div>
                            <div class="col-sm-6">
                                <select class="form-control m-b" id="recipient">
                                    <?php foreach($data['types'] as $dataItems) : ?>
                                        <?php if($dataItems == 2) : ?>
                                            <option selected value="<?php echo $dataItems['UserType']['id'] ?>"><?php echo $dataItems['UserType']['type'] ?></option>
                                        <?php elseif($data['details']['Announcement']['recipient'] == 3) : ?>
                                            <option selected value="<?php echo $dataItems['UserType']['id'] ?>"><?php echo $dataItems['UserType']['type'] ?></option>
                                        <?php elseif($data['details']['Announcement']['recipient'] == 4) : ?>
                                            <option selected value="<?php echo $dataItems['UserType']['id'] ?>"><?php echo $dataItems['UserType']['type'] ?></option>
                                        <?php else : ?>
                                            <option value="<?php echo $dataItems['UserType']['id'] ?>"><?php echo $dataItems['UserType']['type'] ?></option>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    <?php echo $this->Form->end() ?>
                    <div class="ibox-content no-padding">
                        <div class="summernote"><?php echo $details['announcement'] ?></div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 col-sm-offset-2">
                            <button class="btn btn-primary btn-sm float-right" type="button" id="update-btn">Publish announcement</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</div>

<?php echo $this->Html->script(array(
        'scripts/initialize.js',
        'scripts/announcements/update.js'
    )) 
?>