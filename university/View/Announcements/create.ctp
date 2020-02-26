<script>
    var page = 'make_announcement';
</script>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="col-lg-12">
                    <?php echo $this->Form->create(false, array('id' => 'announcement')) ?>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Announcement Title</label>
                            <div class="col-sm-12">
                                <?php
                                    echo $this->Form->input(false, array(
                                        'class' => 'form-control',
                                        'type' => 'text',
                                        'placeholder' => 'Title here . . .',
                                        'label' => false,
                                        'name' => 'title'
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
                                        'placeholder' => 'Description here . . .',
                                        'label' => false,
                                        'name' => 'description'
                                    ));
                                ?>
                            </div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Recipient</label>
                            <div class="col-sm-12"></div>
                            <div class="col-sm-6">
                                <select class="form-control m-b" id="recipient">
                                    <option value="select" selected>Select recipient</option>
                                    <?php foreach($data['types'] as $key => $dataItems) : ?>
                                        <option value="<?php echo $dataItems['UserType']['id'] ?>"><?php echo $dataItems['UserType']['type'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    <?php echo $this->Form->end() ?>
                    <div class="ibox-content no-padding">
                        <div class="summernote"></div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 col-sm-offset-2">
                            <button class="btn btn-primary btn-sm float-right" type="button" id="publish-btn">Publish announcement</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</div>

<?php echo $this->Html->script(array(
        'scripts/initialize.js',
        'scripts/announcements/create.js'
    )) 
?>