<script>
    var page = 'announcements';
</script>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>School Announcements</h5>
                </div>

                <?php if (count($data['announcements']) > 0) : ?>
                    <div class="ibox-content ibox-heading">
                        <h3><i class="fa fa-newspaper-o"></i> <?php echo $data['page'] ?></h3>
                        <small><i class="fa fa-tim"></i> You have no announcements for today.</small>
                    </div>
                <?php else : ?>
                    <div class="ibox-content ibox-heading text-center">
                        <h3>Currently no announcements were published.</h3>
                    </div>
                <?php endif ?>

            </div>
        </div>
    </div>

    <div class="row">
        <?php foreach ($data['announcements'] as $announceItem) : ?>
        <?php $details = json_decode($announceItem['Announcement']['announcement'], true) ?>
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5><?php echo $details['title'] ?><small class="m-l-sm"><?php echo $details['description'] ?></small></h5>
                    <div class="ibox-tools">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-gear"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <!-- <li><a href="#" value="<?php echo $announceItem['Announcement']['id'] ?>" class="dropdown-item edit"><i class="fa fa-pencil"></i> Edit</a>
                            </li> -->
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
                <div class="ibox-content ibox-content-collapse">
                    <p><?php echo $details['announcement'] ?></p>
                </div>
                <div class="ibox-footer">
                    <span class="float-right">
                    <?php echo CakeTime::niceShort($announceItem['Announcement']['created']) ?>
                    </span>
                      <?php echo CakeTime::timeAgoInWords($announceItem['Announcement']['created']) ?>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</div>

<?php 
    echo $this->Html->script(array(
        'scripts/announcements/index.js'
    )); 
?>
