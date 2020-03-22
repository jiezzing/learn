<script>
    var page = 'make_announcement';
</script>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Make announcement</h5>
                </div>
                <div class="ibox-content">
                    <div class="form-group  row">
                        <div class="col-sm-6">
                            <?php echo $this->Form->input('title', array(
                                    'class' => 'form-control',
                                    'type' => 'text',
                                    'placeholder' => 'Your text here...',
                                    'label' => 'Title',
                                ));
                            ?>
                        </div>
                        <div class="col-sm-6">
                            <?php echo $this->Form->input('description', array(
                                    'class' => 'form-control',
                                    'type' => 'text',
                                    'placeholder' => 'Your text here...',
                                    'label' => 'Description',
                                ));
                            ?>
                        </div>
                    </div>
                    <div class="form-group  row">
                        <label class="col-sm-12 col-form-label">Duration</label>
                        <div class="col-sm-12">
                            <div id="reportrange" class="form-control">
                                <i class="fa fa-calendar"></i>
                                <span></span> <b class="caret"></b>
                            </div>
                        </div>
                    </div>
                    <div class="form-group  row"><label class="col-sm-12 col-form-label">Recipient</label>
                        <div class="col-sm-6">
                            <select class="chosen-select form-control" id="recipient" multiple="multiple" data-placeholder="Select Recipients">
                                <?php foreach($type as $value) : ?>
                                    <option value="<?php echo $value['UserType']['id'] ?>"><?php echo $value['UserType']['type'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="ibox-content no-padding border">
                        <div class="summernote"></div>
                    </div>
                </div>
                <div class="ibox-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <button class="btn btn-primary btn-sm float-right" type="button" id="publish-btn">Publish</button>
                            </div>
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