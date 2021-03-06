<!DOCTYPE html>
<html>
<head>
    <?php
        header("Cache-Control: no-cache, no-store, must-revalidate"); 
        header("Pragma: no-cache");
        header("Expires: 0");
        echo $this->Html->charset(); 
    ?>
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

            // Summernote
            'plugins/summernote/summernote-bs4.css',
            'style.css',

            // Datepicker
            'plugins/datapicker/datepicker3.css',

            // iCheck
            'plugins/iCheck/custom.css',
            'plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css',

            // Sweetalert
            'plugins/sweetalert/sweetalert.css',

            // Custom css
            'custom.css',

            // select2
            'plugins/select2/select2.min.css',

            // footable
            'plugins/footable/footable.core.css',

            // jsTree
            'plugins/jsTree/style.min.css',

            // loading buttons
            'plugins/ladda/ladda-themeless.min.css',

            // lightbox gallery
            'plugins/blueimp/css/blueimp-gallery.min.css',

            // jquery grid
            'plugins/jqGrid/ui.jqgrid.css',

            // chosen
            'plugins/chosen/bootstrap-chosen.css',

            // daterangepicker
            'plugins/daterangepicker/daterangepicker-bs3.css'
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

            // Summernote
            'plugins/summernote/summernote-bs4.js',

            // jQuery UI
            // 'plugins/jquery-ui/jquery-ui.min.js',

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
            'plugins/iCheck/icheck.min.js',

            // Sweetalert
            'plugins/sweetalert/sweetalert.min.js',

            // select2
            'plugins/select2/select2.full.min.js',
            
            // footable
            'plugins/footable/footable.all.min.js',

            // jsTree
            'plugins/jsTree/jstree.min.js',

            // loading buttons
            'plugins/ladda/spin.min.js',
            'plugins/ladda/ladda.min.js',
            'plugins/ladda/ladda.jquery.min.js',

            // lightbox gallery
            'plugins/blueimp/jquery.blueimp-gallery.min.js',

            // jquery grid
            'plugins/jqGrid/jquery.jqGrid.min.js',

            // chosen
            'plugins/chosen/chosen.jquery.js',

            // moment
            'plugins/fullcalendar/moment.min.js',

            // daterangepicker
            'plugins/daterangepicker/daterangepicker.js'
        ]);

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<?php if(AuthComponent::user('id')) : ?>
    <body>
        <div class="pace  pace-inactive">
            <div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
              <div class="pace-progress-inner"></div>
            </div>
            <div class="pace-activity"></div>
        </div>
        <div id="wrapper">

            <?php echo $this->element('sidebar') ?>

            <div id="page-wrapper" class="gray-bg dashbard-1" style="min-height: 937px;">
                <?php echo $this->element('navbar') ?>
                <?php echo $this->element('heading') ?>
                <?php echo $this->fetch('content'); ?>
                <?php echo $this->element('footer') ?>
            </div>
        </div>
    </body>
<?php else : ?>
    <body class="gray-bg">
        <?php echo $this->fetch('content'); ?>
    </body>
<?php endif ?>
</html>
