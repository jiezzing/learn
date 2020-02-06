<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php echo $this->Html->meta('icon');
        
		echo $this->Html->css([
            'bootstrap.min.css',
            'font-awesome/css/font-awesome.css',

            // DataTables
            'plugins/dataTables/datatables.min.css',

            // Toastr style
            'plugins/toastr/toastr.min.css',
            'animate.css',
            'style.css',

            // Datepicker
            'plugins/datapicker/datepicker3.css',

            // iCheck
            'plugins/iCheck/custom.css',
            'plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css'
        ]);

        echo $this->Html->script([

            // Main scripts
            'jquery-3.1.1.min.js',
            'popper.min.js',
            'bootstrap.js',
            'plugins/metisMenu/jquery.metisMenu.js',
            'plugins/slimscroll/jquery.slimscroll.min.js',

            // Flot
            'plugins/flot/jquery.flot.js',
            'plugins/flot/jquery.flot.tooltip.min.js',
            'plugins/flot/jquery.flot.spline.js',
            'plugins/flot/jquery.flot.resize.js',
            'plugins/flot/jquery.flot.pie.js',

            // Peity
            'plugins/peity/jquery.peity.min.js',
            'demo/peity-demo.js',

            // Custom and plugin javascript
            'inspinia.js',
            'plugins/pace/pace.min.js',

            // jQuery UI
            'plugins/jquery-ui/jquery-ui.min.js',

            // GITTER
            'plugins/gritter/jquery.gritter.min.js',

            // DataTables
            'plugins/dataTables/datatables.min.js',
            'plugins/dataTables/datatables.bootstrap4.min.js',

            // Sparkline
            'plugins/sparkline/jquery.sparkline.min.js',

            // Sparkline demo data
            'demo/sparkline-demo.js',

            // Toastr
            'plugins/toastr/toastr.min.js',

            // Datepicker 
            'plugins/datapicker/bootstrap-datepicker.js',

            // iCheck
            'plugins/iCheck/icheck.min.js'
        ]);

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
    <?php if($this->Session->read('user_id') && $data['page'] != 'Login') : ?>
        <div class="pace  pace-inactive">
            <div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
              <div class="pace-progress-inner"></div>
            </div>
            <div class="pace-activity"></div>
        </div>
        <div id="wrapper">
            <nav class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav metismenu" id="side-menu" style="">
                        <li class="nav-header">
                            <div class="dropdown profile-element">
                                <?php echo $this->Html->image('profile_small.jpg', array(
                                    'alt' => 'image',
                                    'class' => array('rounded-circle') 
                                )); ?>
                                <a href="#">
                                    <span class="block m-t-xs font-bold">David Williams</span>
                                    <span class="text-muted text-xs block">School Admin </b></span>
                                </a>
                            </div>
                            <div class="logo-element">
                                IN+
                            </div>
                        </li>
                        <li>
                            <?php echo $this->Html->link(
                                $this->Html->tag('i', false, array('class' => 'fa fa-dashboard fa-lg')) . '' . 
                                $this->Html->tag('span', 'Dashboard', array('class' => 'nav-label')), array(
                                    'controller' => 'home', 
                                    'action' => 'index'
                                ), array(
                                    'escape' => false
                                )) 
                            ?>
                        </li>
                        <li>
                            <?php echo $this->Html->link(
                                $this->Html->tag('i', false, array('class' => 'fa fa-newspaper-o')) . '' . 
                                $this->Html->tag('span', 'Announcements', array('class' => 'nav-label')), array(
                                    'controller' => 'announcements', 
                                    'action' => 'index'
                                ), array(
                                    'escape' => false
                                )) 
                            ?>
                        </li>
                        <li>
                            <?php echo $this->Html->link(
                                $this->Html->tag('i', false, array('class' => 'fa fa-puzzle-piece fa-lg')) . '' . 
                                $this->Html->tag('span', 'Trivia', array('class' => 'nav-label')), array(
                                    'controller' => 'trivias', 
                                    'action' => 'index'
                                ), array(
                                    'escape' => false
                                )) 
                            ?>
                        </li>
                        <li class="">
                            <a href="index.html" aria-expanded="false"><i class="fa fa-users"></i> <span class="nav-label">Users</span> <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                                <li><?php echo $this->Html->link('Teachers', array('controller' => 'teachers', 'action' => 'index')) ?></a></li>
                                <li><?php echo $this->Html->link('Students', array('controller' => 'students', 'action' => 'index')); ?></li>
                                <li><?php echo $this->Html->link('New User', array('controller' => 'users', 'action' => 'index')); ?></li>
                            </ul>
                        </li>
                        <li>
                            <?php echo $this->Html->link(
                                $this->Html->tag('i', false, array('class' => 'fa fa-gears fa-lg')) . '' . 
                                $this->Html->tag('span', 'Profile Settings', array('class' => 'nav-label')), array(
                                    'controller' => 'profile', 
                                    'action' => 'index'
                                ), array(
                                    'escape' => false
                                )) 
                            ?>
                        </li>
                    </ul>
                </div>
            </nav>

            <div id="page-wrapper" class="gray-bg dashbard-1" style="min-height: 937px;">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    </div>
                        <ul class="nav navbar-top-links navbar-right">
                            <li class="dropdown">
                                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                    <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                                </a>
                                <ul class="dropdown-menu dropdown-alerts">
                                    <li>
                                        <a href="mailbox.html" class="dropdown-item">
                                            <div>
                                                <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                                <span class="float-right text-muted small">4 minutes ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="dropdown-divider"></li>
                                    <li>
                                        <a href="profile.html" class="dropdown-item">
                                            <div>
                                                <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                                <span class="float-right text-muted small">12 minutes ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="dropdown-divider"></li>
                                    <li>
                                        <a href="grid_options.html" class="dropdown-item">
                                            <div>
                                                <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                                <span class="float-right text-muted small">4 minutes ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="dropdown-divider"></li>
                                    <li>
                                        <div class="text-center link-block">
                                            <a href="notifications.html" class="dropdown-item">
                                                <strong>See All Alerts</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>


                            <li>
                                <?php echo $this->Html->link($this->Html->tag('i', '', array(
                                        'class' => 'fa fa-sign-out'
                                    )).'Logout', array(
                                        'controller' => 'login', 
                                        'action' => 'logout'
                                    ), array(
                                        'escape' => false
                                    )) ?>
                            </li>
                        </ul>

                </nav>
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><?php echo $data['page'] ?></h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <?php echo $this->Html->link('Home', array('controller' => 'home', 'action' => 'index')) ?>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong><?php echo $data['page'] ?></strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

                <?php echo $this->fetch('content'); ?>

                <div class="footer">
                    <div class="float-right">
                        10GB of <strong>250GB</strong> Free.
                    </div>
                    <div>
                        <strong>Copyright</strong> Example Company © 2014-2018
                    </div>
                </div>
                
            </div>
        </div>

    <?php else : ?>
        <?php echo $this->fetch('content'); ?>
    <?php endif ?>
</body>
</html>
