<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu" style="">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    
                    <?php 
                        if($profile['User']['image'] != null) {
                            $image = json_decode($profile['User']['image'], true);
                            $image = $image['name'];
                        }
                        else {
                            $image = 'default.png';
                        }
                    ?> 
                    
                    <?php echo $this->Html->image($image, array(
                            'alt' => 'image',
                            'class' => array('rounded-circle'),
                            'width' => 50,
                            'height' => 50
                        )); 
                    ?>

                    <?php 
                        if($profile['User']['middle_initial'] != null) {
                            $name = $profile['User']['firstname'] . ' ' . 
                                    $profile['User']['middle_initial'] . '. ' . 
                                    $profile['User']['lastname'];
                        }
                        else {
                            $name = $profile['User']['firstname'] . ' ' . 
                                    $profile['User']['lastname'];
                        }
                    ?> 
                    
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold"><?php echo $name ?></span>
                        <span class="text-muted text-xs block"><?php echo $profile['UserType']['type'] ?><b class="caret"></b></span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#profile-modal">Profile</a></li>
                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="login.html">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li>
                <?php echo $this->Html->link(
                    $this->Html->tag('i', false, array('class' => 'fa fa-home fa-lg')) . '' . 
                    $this->Html->tag('span', 'Home', array('class' => 'nav-label')), array(
                        'controller' => 'home', 
                        'action' => 'index'
                    ), array(
                        'escape' => false
                    )) 
                ?>
            </li>
            <li>
                <?php echo $this->Html->link(
                    $this->Html->tag('i', false, array('class' => 'fa fa-file')) . '' . 
                    $this->Html->tag('span', 'Modules', array('class' => 'nav-label')), array(
                        'controller' => 'modules', 
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
            <li>
                <?php echo $this->Html->link(
                    $this->Html->tag('i', false, array('class' => 'fa fa-users')) . '' . 
                    $this->Html->tag('span', 'Students', array('class' => 'nav-label')), array(
                        'controller' => 'students', 
                        'action' => 'index'
                    ), array(
                        'escape' => false
                    )) 
                ?>
            </li>
            <li>
                <a href="#" data-toggle="modal" data-target="#profile-modal"><i class="fa fa-cogs"></i> <span class="nav-label">Profile</span>  </a>
            </li>
            <li class="special_link">
                <?php echo $this->Html->link(
                    $this->Html->tag('i', false, array('class' => 'fa fa-sign-out')) . '' . 
                    $this->Html->tag('span', 'Logout', array('class' => 'nav-label')), array(
                        'controller' => 'login', 
                        'action' => 'logout'
                    ), array(
                        'escape' => false
                    )) 
                ?>
            </li>
        </ul>
    </div>
</nav>