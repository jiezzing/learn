<script>
    var page = 'announcements';
</script>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
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
        <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Example of constant height with scroll</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#" class="dropdown-item">Config option 1</a>
                                </li>
                                <li><a href="#" class="dropdown-item">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="scroll_content">
                            <p>
                                Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis
                                dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec,
                                pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
                                Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis
                                dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec,
                                pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
                                Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis
                                dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec,
                                pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
                            </p>

                            <p>
                                Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo,
                                rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis
                                pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.
                                Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis
                                dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec,
                                pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
                                Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis
                                dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec,
                                pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
                                Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis
                                dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec,
                                pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
                            </p>
                            <p>
                                Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo,
                                rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis
                                pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.
                            </p>
                            <p>
                                Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo,
                                rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis
                                pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>

<?php 
    echo $this->Html->script(array(
        'scripts/announcements.js'
    )); 
?>


                    <!-- <div class="ibox-content">
                        <div class="feed-activity-list">
                            <div class="feed-element">
                                <div>
                                    <?php $details = json_decode($data['announcements'][0]['Announcement']['announcement'], true) ?>

                                    <small class="float-right text-navy">1m ago</small>
                                    <strong><?php echo $details['title'] ?></strong>
                                    <div><?php echo $details['announcement'] ?></div>
                                    <small class="text-muted">Today 5:60 pm - 12.06.2014</small>
                                </div>
                            </div>
                        </div>
                    </div> -->