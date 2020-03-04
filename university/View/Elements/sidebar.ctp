<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu" style="">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    
                    <?php echo $this->Html->image('default.png', array(
                            'alt' => 'image',
                            'class' => array('rounded-circle'),
                            'width' => 50 
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
                    
                    <a href="#">
                        <span class="block m-t-xs font-bold"><?php echo $name ?></span>
                        <span class="text-muted text-xs block"><?php echo $profile['UserType']['type'] ?></b></span>
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
            <li class="">
                <a href="#" aria-expanded="false"><i class="fa fa-sitemap"></i> <span class="nav-label">Modules </span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                    <li>
                        <?php 
                            echo $this->Html->link('Modules', array(
                                'controller' => 'modules', 
                                'action' => 'index'
                            ));
                        ?>
                    </li>
                    <li><a href="#" aria-expanded="false" data-toggle="modal" data-target="#add-module-modal">Add Module</a></li>
                </ul>
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