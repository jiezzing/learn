<script>
    var announcementId = '<?php echo $this->request->params['pass'][0] ?>';
</script>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="col-lg-12">
                    <?php $details = json_decode($detail['Announcement']['announcement'], true) ?>
                        <div class="form-group  row"><label class="col-sm-12 col-form-label">Announcement Title</label>
                            <div class="col-sm-12">
                                <?php
                                    echo $this->Form->input('title', array(
                                        'class' => 'form-control',
                                        'type' => 'text',
                                        'label' => false,
                                        'value' => $details['title'],
                                        'placeholder' => 'Your text here...'
                                    ));
                                ?>
                            </div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-12 col-form-label">Short Description</label>
                            <div class="col-sm-12">
                                <?php
                                    echo $this->Form->input('description', array(
                                        'class' => 'form-control',
                                        'type' => 'text',
                                        'label' => false,
                                        'value' => $details['description'],
                                        'placeholder' => 'Your text here...'
                                    ));
                                ?>
                            </div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Recipient</label>
                            <div class="col-sm-12"></div>
                            <div class="col-sm-6">
                                <select class="chosen-select form-control m-b" id="recipient" multiple="multiple" data-placeholder="Select Recipients">
                                    <?php foreach($type as $dataItems) : ?>
                                        <option value="<?php echo $dataItems['UserType']['id'] ?>"><?php echo $dataItems['UserType']['type'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <?php echo $this->Form->input('subject', array(
                                        'class' => 'form-control',
                                        'type' => 'text',
                                        'placeholder' => 'Your subject here...',
                                        'label' => false,
                                        'value' => $details['subject']
                                    ));
                                ?>
                            </div>
                        </div>
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
        'scripts/announcements.js'
    )) 
?>