<?php echo $this->element('letter_format') ?>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <?php if (empty($announcement)) : ?>
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
                                            <li>
                                                <?php echo $this->Html->link(
                                                    $this->Html->tag('i', false, array('class' => 'fa fa-eye')) . '' . 
                                                    $this->Html->tag('span', ' Preview', array('class' => 'nav-label')), array(
                                                        'controller' => 'announcements',
                                                        'action' => 'fetchAnnouncementsData'
                                                    ), array(
                                                        'escape' => false,
                                                        'data-toggle' => 'modal',
                                                        'class' => 'get-id preview',
                                                        'value' => $announceItem['Announcement']['id']
                                                    )) 
                                                ?>
                                            </li>
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
                                            <li>
                                                <?php if($announceItem['Status']['status'] == 'active') : ?>
                                                    <a href="#" status="<?php echo $announceItem['Status']['status'] ?>" value="<?php echo $announceItem['Announcement']['id'] ?>" class="dropdown-item action"><i class="fa fa-bell-slash"></i> Unpublish</a>
                                                <?php else : ?>
                                                    <a href="#" status="<?php echo $announceItem['Status']['status'] ?>" value="<?php echo $announceItem['Announcement']['id'] ?>" class="dropdown-item action"><i class="fa fa-bell"></i> Publish</a>
                                                <?php endif ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <p class="mt-4"><?php echo $details['description'] ?></p>
                                </div>
                                <div class="ibox-footer">
                                        <span class="mr-2">
                                            <?php echo 
                                                $announceItem['User']['firstname'] . ' ' . 
                                                $announceItem['User']['lastname'] . ' - ' . 
                                                $announceItem['UserType']['type']
                                            ?>
                                        </span>
                                        <span class="float-right row mr-1">
                                            <?php echo CakeTime::niceShort($announceItem['Announcement']['created']) ?>
                                        </span>
                                        <span class="float-right row mr-4">
                                            <?php if($announceItem['Status']['status'] == 'active') : ?>
                                                <p><span class="badge badge-success mr-2"><?php echo $announceItem['Status']['status'] ?></span></p>
                                            <?php else : ?>
                                                <p><span class="badge badge-danger mr-2"><?php echo $announceItem['Status']['status'] ?></span></p>
                                            <?php endif ?>
                                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
                <div class="col-md-6">
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
                            <div class="form-group  row"><label class="col-sm-12 col-form-label">Recipient</label>
                                <div class="col-sm-6">
                                    <select class="chosen-select form-control" id="recipient" multiple="multiple" data-placeholder="Select Recipients">
                                        <?php foreach($type as $value) : ?>
                                            <option value="<?php echo $value['UserType']['id'] ?>"><?php echo $value['UserType']['type'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <?php echo $this->Form->input('subject', array(
                                            'class' => 'form-control',
                                            'type' => 'text',
                                            'placeholder' => 'Your subject here...',
                                            'label' => false,
                                        ));
                                    ?>
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
    </div>
</div>

<?php 
    echo $this->Html->script(array(
        'scripts/announcements.js',
        'scripts/initialize.js'
    )); 
?>
