<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-2">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Teachers</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo $data['stats']['totalTeachers'] ?></h1>
                    <small>Total # of teachers</small>
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Students</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo $data['stats']['totalStudents'] ?></h1>
                    <small>Total # of student</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Administrators</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo $data['stats']['totalAdmin'] ?></h1>
                    <small>Total # of announcements</small>
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Announcements</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo $data['totalAnnouncement'] ?></h1>
                    <small>Total # of announcements</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Trivia</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">275,800</h1>
                    <small>Total # of trivia</small>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="ibox "  style="height: 100%">
                <div class="ibox-title">
                    <h5>School Announcements</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <?php if (count($data['announcements']) > 0) : ?>
                    <div class="ibox-content ibox-heading">
                        <h3><i class="fa fa-newspaper-o"></i> Annoucements</h3>
                        <small><i class="fa fa-tim"></i> You have a total of <?php echo $data['totalAnnouncement'] ?> announcements.</small>
                    </div>
                    <div class="ibox-content scroll_content">
                    <div class="feed-activity-list">
                        <?php foreach ($data['announcements'] as $announceKey => $announceItem) : ?>
                        <?php $details = json_decode($announceItem['Announcement']['announcement'], true) ?>
                        <div class="feed-element">
                            <div>
                                <small class="float-right text-navy"><?php echo CakeTime::timeAgoInWords($announceItem['Announcement']['created']) ?></small>
                                <strong><?php echo $details['title'] ?></strong>
                                <div><?php echo $details['description'] ?></div>
                                <small class="text-muted"><?php echo CakeTime::niceShort($announceItem['Announcement']['created']) ?></small>
                            </div>
                        </div>
                        <?php endforeach ?>

                    </div>
                </div>
                <?php else : ?>
                    <div class="ibox-content ibox-heading text-center">
                        <h3>Currently no announcements were published.</h3>
                        <small><i class="fa fa-tim"></i> No announcements published.</small>
                    </div>
                <?php endif ?>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Trivia</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content ibox-heading">
                    <h3><i class="fa fa-puzzle-piece"></i> Trivia Questionaires</h3>
                    <small><i class="fa fa-tim"></i> You have no announcements for today.</small>
                </div>
                <div class="ibox-content">
                    <div class="feed-activity-list">

                        <div class="feed-element">
                            <div>
                                <small class="float-right text-navy">1m ago</small>
                                <strong>Monica Smith</strong>
                                <div>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</div>
                                <small class="text-muted">Today 5:60 pm - 12.06.2014</small>
                            </div>
                        </div>

                        <div class="feed-element">
                            <div>
                                <small class="float-right">2m ago</small>
                                <strong>Jogn Angel</strong>
                                <div>There are many variations of passages of Lorem Ipsum available</div>
                                <small class="text-muted">Today 2:23 pm - 11.06.2014</small>
                            </div>
                        </div>

                        <div class="feed-element">
                            <div>
                                <small class="float-right">5m ago</small>
                                <strong>Jesica Ocean</strong>
                                <div>Contrary to popular belief, Lorem Ipsum</div>
                                <small class="text-muted">Today 1:00 pm - 08.06.2014</small>
                            </div>
                        </div>

                        <div class="feed-element">
                            <div>
                                <small class="float-right">5m ago</small>
                                <strong>Monica Jackson</strong>
                                <div>The generated Lorem Ipsum is therefore </div>
                                <small class="text-muted">Yesterday 8:48 pm - 10.06.2014</small>
                            </div>
                        </div>


                        <div class="feed-element">
                            <div>
                                <small class="float-right">5m ago</small>
                                <strong>Anna Legend</strong>
                                <div>All the Lorem Ipsum generators on the Internet tend to repeat </div>
                                <small class="text-muted">Yesterday 8:48 pm - 10.06.2014</small>
                            </div>
                        </div>
                        <div class="feed-element">
                            <div>
                                <small class="float-right">5m ago</small>
                                <strong>Damian Nowak</strong>
                                <div>The standard chunk of Lorem Ipsum used </div>
                                <small class="text-muted">Yesterday 8:48 pm - 10.06.2014</small>
                            </div>
                        </div>
                        <div class="feed-element">
                            <div>
                                <small class="float-right">5m ago</small>
                                <strong>Gary Smith</strong>
                                <div>200 Latin words, combined with a handful</div>
                                <small class="text-muted">Yesterday 8:48 pm - 10.06.2014</small>
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
        'scripts/index.js',
        'scripts/initialize.js'
    )); 
?>