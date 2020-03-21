<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <?php if (count($announcement) == 0) : ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-danger">
                                    <div class="panel-body text-center">
                                        <h4>Currently no announcements published.</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                    <?php foreach ($announcement as $announceItem) : ?>
                    <?php $details = json_decode($announceItem['Announcement']['announcement'], true) ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox">
                                <div class="ibox-title">
                                        

                                    <div class="row col-sm-12">
                                    <h5 class="mr-1"><?php echo $details['title'] ?> - </h5>
                                        <?php 
                                            if(isset($recipient[$announceItem['Announcement']['id']])) {
                                                echo $recipient[$announceItem['Announcement']['id']];
                                            }
                                        ?>
                                    </div>
                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-down"></i>
                                        </a>
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                            <i class="fa fa-gear"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-user">
                                            <li><?php echo $this->Html->link(
                                                $this->Html->tag('i', false, array('class' => 'fa fa-pencil')) . '' . 
                                                $this->Html->tag('span', ' Edit', array('class' => 'nav-label')), array(
                                                    'controller' => 'announcements', 
                                                    'action' => 'edit', $announceItem['Announcement']['id']
                                                ), array(
                                                    'escape' => false
                                                ))  ?>
                                            </li>
                                            <li><a href="#" value="<?php echo $announceItem['Announcement']['id'] ?>" class="dropdown-item delete"><i class="fa fa-trash"></i> Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <p class="ellipsis"><?php echo $details['announcement'] ?></p>
                                </div>
                                <div class="ibox-footer">
                                        <span class="mr-2"></span>
                                        <span class="float-right">
                                            <?php echo CakeTime::niceShort($announceItem['Announcement']['created']) ?>
                                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
                <div class="col-lg-6 container">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Make announcement</h5>
                        </div>
                        <div class="ibox-content">
                            <?php echo $this->Form->create(false, array('id' => 'announcement')) ?>
                                <div class="form-group  row"><label class="col-sm-12 col-form-label">Announcement Title</label>
                                    <div class="col-sm-12">
                                        <?php
                                            echo $this->Form->input('title', array(
                                                'class' => 'form-control',
                                                'type' => 'text',
                                                'placeholder' => 'Your text here...',
                                                'label' => false,
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
                                                'placeholder' => 'Your text here...',
                                                'label' => false,
                                            ));
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group  row"><label class="col-sm-12 col-form-label">Recipient</label>
                                    <div class="col-sm-12">
                                        <select class="chosen-select form-control" id="recipient" multiple="multiple" data-placeholder="Select Recipients">
                                            <?php foreach($type as $value) : ?>
                                                <option value="<?php echo $value['UserType']['id'] ?>"><?php echo $value['UserType']['type'] ?></option>
                                            <?php endforeach ?>
                                            
                                        </select>
                                    </div>
                                </div>
                            <?php echo $this->Form->end() ?>
                            <div class="ibox-content no-padding border">
                                <div class="summernote"></div>
                            </div>
                        </div>
                        <div class="ibox-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <button class="btn btn-primary btn-sm float-right" type="button" id="publish-btn">Publish announcement</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    echo $this->Html->script(array(
        'scripts/announcements.js',
        'scripts/initialize.js'
    )); 
?>
