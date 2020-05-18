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
                        <span class="text-muted text-xs block"><?php echo $profile['UserType']['type'] ?></span>
                    </a>
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
                <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Academic</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li>
                        <?php echo $this->Html->link('Modules', array(
                                'controller' => 'modules', 
                                'action' => 'index'
                            )) 
                        ?>
                    </li>
                    <li>
                        <?php echo $this->Html->link('Subjects', array(
                                'controller' => 'subjects', 
                                'action' => 'index'
                            )) 
                        ?>
                    </li>
                </ul>
            </li>
            <li>
                <?php echo $this->Html->link(
                    $this->Html->tag('i', false, array('class' => 'fa fa-bell')) . '' . 
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
                    $this->Html->tag('i', false, array('class' => 'fa fa-users')) . '' . 
                    $this->Html->tag('span', 'Users', array('class' => 'nav-label')), array(
                        'controller' => 'users', 
                        'action' => 'index'
                    ), array(
                        'escape' => false
                    )) 
                ?>
            </li>
            <li>
                <?php echo $this->Html->link(
                    $this->Html->tag('i', false, array('class' => 'fa fa-cogs')) . '' . 
                    $this->Html->tag('span', 'Profile', array('class' => 'nav-label')), array(
                        'controller' => 'users', 
                        'action' => 'profile', AuthComponent::user('id')
                    ), array(
                        'escape' => false
                    )) 
                ?>
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