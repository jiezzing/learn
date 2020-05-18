<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-3">
            <div class="widget style1 navy-bg">
                <div class="row">
                    <div class="col-4">
                        <i class="fa fa-id-badge fa-3x"></i>
                    </div>
                    <div class="col-8 text-right">
                        <span> Students </span>
                        <h2 class="font-bold"><?php echo $stats['totalStudents'] ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="widget style1 navy-bg">
                <div class="row">
                    <div class="col-4">
                        <i class="fa fa-user fa-3x"></i>
                    </div>
                    <div class="col-8 text-right">
                        <span> School Admin </span>
                        <h2 class="font-bold"><?php echo $stats['totalAdmin'] ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="widget style1 navy-bg">
                <div class="row">
                    <div class="col-4">
                        <i class="fa fa-bell fa-3x"></i>
                    </div>
                    <div class="col-8 text-right">
                        <span> Announcement </span>
                        <h2 class="font-bold"><?php echo $totalAnnouncement ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="widget style1 navy-bg">
                <div class="row">
                    <div class="col-4">
                        <i class="fa fa-newspaper-o fa-3x"></i>
                    </div>
                    <div class="col-8 text-right">
                        <span> Trivia </span>
                        <h2 class="font-bold"><?php echo $tallyTrivia ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-lg-6">
            <div class="ibox "  style="height: 100%">
                <?php if (!empty($announcement)) : ?>
                    <div class="ibox-content ibox-heading">
                        <h3><i class="fa fa-bell"></i> Annoucements</h3>
                        <small><i class="fa fa-tim"></i>Total # of announcement: <?php echo $totalAnnouncement ?></small>
                    </div>
                    <div class="ibox-content">
                    <div class="feed-activity-list">
                        <?php foreach ($announcement as $announceItem) : ?>
                        <?php $details = json_decode($announceItem['Announcement']['announcement'], true) ?>
                        <div class="feed-element">
                            <div>
                                <small class="float-right text-navy"><?php echo CakeTime::niceShort($announceItem['Announcement']['created']) ?></small>
                                <strong><?php echo $details['title'] ?></strong>
                                <div class="mt-2"><?php echo $details['description'] ?></div>
                            </div>
                        </div>
                        <?php endforeach ?>

                    </div>
                </div>
                <?php else : ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-danger">
                                <div class="panel-body text-center">
                                    <h4>Currently no announcement published.</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="ibox ">
                <?php if (!empty($trivia)) : ?>
                    <div class="ibox-content ibox-heading">
                        <h3><i class="fa fa-newspaper-o"></i> Trivias</h3>
                        <small><i class="fa fa-tim"></i>Total # of trivia: <?php echo $tallyTrivia ?></small>
                    </div>
                    <div class="ibox-content">
                    <div class="feed-activity-list">
                        <?php foreach ($trivia as $value) : ?>
                        <?php $details = json_decode($value['Trivia']['trivias'], true) ?>
                        <div class="feed-element">
                            <div>
                                <small class="float-right text-navy"><?php echo CakeTime::niceShort($value['Trivia']['created']) ?></small>
                                <strong><?php echo $value['User']['firstname'] . ' ' . $value['User']['lastname'] ?></strong>
                                <div class="mt-2">Question: <?php echo $details['question'] ?></div>
                            </div>
                        </div>
                        <?php endforeach ?>

                    </div>
                </div>
                <?php else : ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-danger">
                                <div class="panel-body text-center">
                                    <h4>Currently no trivias available.</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>

<?php echo $this->Html->script('scripts/initialize.js') ?>