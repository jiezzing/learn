<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php echo $page ?></h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <?php echo $this->Html->link('Home', array(
                        'controller' => 'home', 
                        'action' => 'index'
                    )) 
                ?>
            </li>
            <?php if ($page == 'Users') : ?>
                <li class="breadcrumb-item active">
                    <strong>
                        <?php echo $this->Html->link($page, array(
                                'controller' => 'users', 
                                'action' => 'index'
                            )) 
                        ?>
                    </strong>
                </li>
                <li class="breadcrumb-item active">
                    <strong>
                        <?php echo $this->Html->link('Register', array(
                                'controller' => 'users', 
                                'action' => 'register'
                            )) 
                        ?>
                    </strong>
                </li>
            <?php elseif ($page == 'Announcements') : ?>
                <li class="breadcrumb-item active">
                    <strong>
                        <?php echo $this->Html->link($page, array(
                                'controller' => 'announcements', 
                                'action' => 'index'
                            )) 
                        ?>
                    </strong>
                </li>
                <li class="breadcrumb-item active">
                    <strong>
                        <?php echo $this->Html->link('Create Announcement', array(
                                'controller' => 'announcements', 
                                'action' => 'create'
                            )) 
                        ?>
                    </strong>
                </li>
            <?php elseif ($page == 'Modules') : ?>
                <li class="breadcrumb-item active">
                    <strong>
                        <?php echo $this->Html->link($page, array(
                                'controller' => 'modules', 
                                'action' => 'index'
                            )) 
                        ?>
                    </strong>
                </li>
            <?php elseif($page == 'Subjects') : ?>
                <li class="breadcrumb-item active">
                    <strong>
                        <?php echo $this->Html->link('Subjects', array(
                                'controller' => 'subjects', 
                                'action' => 'index'
                            )) 
                        ?>
                    </strong>
                </li>
            <?php elseif($page == 'Contents') : ?>
                <li class="breadcrumb-item active">
                    <strong>
                        <?php echo $this->Html->link('Modules', array(
                                'controller' => 'modules', 
                                'action' => 'index'
                            )) 
                        ?>
                    </strong>
                </li>
                <li class="breadcrumb-item">
                    <strong>
                        <a href="#" aria-expanded="false"><?php echo $submodule['Submodule']['name'] ?></a>
                    </strong>
                </li>
            <?php elseif($page == 'Editing announcement') : ?>
                <li class="breadcrumb-item active">
                    <strong>
                        <?php echo $this->Html->link('Announcements', array(
                                'controller' => 'announcements', 
                                'action' => 'index'
                            )) 
                        ?>
                    </strong>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Edit</strong>
                </li>
            <?php elseif($page == 'Creating Announcement') : ?>
                <li class="breadcrumb-item active">
                    <strong>
                        <?php echo $this->Html->link('Announcements', array(
                                'controller' => 'announcements', 
                                'action' => 'index'
                            )) 
                        ?>
                    </strong>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Create</strong>
                </li>
            <?php elseif($page == 'Edit Profile') : ?>
                <li class="breadcrumb-item active">
                    <strong>
                        <?php echo $this->Html->link('Users', array(
                                'controller' => 'users', 
                                'action' => 'index'
                            )) 
                        ?>
                    </strong>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Editing Profile</strong>
                </li>
            <?php elseif($page == 'User Registration') : ?>
                <li class="breadcrumb-item active">
                    <strong>
                        <?php echo $this->Html->link('Users', array(
                                'controller' => 'users', 
                                'action' => 'index'
                            )) 
                        ?>
                    </strong>
                </li>
                <li class="breadcrumb-item active">
                    <strong><?php echo $page ?></strong>
                </li>
            <?php elseif($page == 'Sections') : ?>
                <li class="breadcrumb-item active">
                    <strong>
                        <?php echo $this->Html->link('Sections', array(
                                'controller' => 'announcements', 
                                'action' => 'index'
                            )) 
                        ?>
                    </strong>
                </li>
            <?php else : ?>
                <li class="breadcrumb-item active">
                    <strong><?php echo $page ?></strong>
                </li>
            <?php endif ?>
        </ol>
    </div>
</div>