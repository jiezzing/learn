<div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li>
                <span class="m-r-sm text-muted welcome-message"><?php echo $profile['University']['name'] ?></span>
            </li>
            <li>
                <?php echo $this->Html->link($this->Html->tag('i', '', array(
                        'class' => 'fa fa-sign-out'
                    )).'Logout', array(
                        'controller' => 'login', 
                        'action' => 'logout'
                    ), array(
                        'escape' => false
                    )) 
                ?>
            </li>
        </ul>
    </nav>
</div>