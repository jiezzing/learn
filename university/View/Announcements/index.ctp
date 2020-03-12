<div class="wrapper wrapper-content animated fadeInRight">
    <?php if (count($announcement) == 0) : ?>
        <div class="row">
            <div class="col-lg-8">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>School Announcements</h5>
                    </div>
                    <div class="ibox-content ibox-heading text-center">
                        <h3>Currently no announcements were published.</h3>
                    </div>
                </div>
            </div>
        </div>
    <?php endif ?>

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <?php foreach ($announcement as $announceItem) : ?>
                    <?php $details = json_decode($announceItem['Announcement']['announcement'], true) ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox">
                                <div class="ibox-title">
                                    <h5><?php echo $details['title'] ?></h5>
                                    <div class="ibox-tools">
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
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-down"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <p class="ellipsis"><?php echo $details['announcement'] ?></p>
                                </div>
                                <div class="ibox-footer">
                                    <span class="float-right">
                                    <?php echo CakeTime::niceShort($announceItem['Announcement']['created']) ?>
                                    </span>
                                      Recipient: <?php echo $announceItem['UserType']['type'] ?>
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
                                <div class="form-group  row"><label class="col-sm-12 col-form-label">Short Description</label>
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
                                <div class="form-group  row"><label class="col-sm-12 col-form-label">Recipient</label>
                                    <div class="col-sm-12">
                                        <select class="select2 form-control" id="levels" multiple="multiple">
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
