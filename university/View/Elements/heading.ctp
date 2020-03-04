<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php echo $data['page'] ?></h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <?php echo $this->Html->link('Home', array('controller' => 'home', 'action' => 'index')) ?>
            </li>
            <?php if ($data['page'] == 'Users') : ?>
                <li class="breadcrumb-item active">
                    <strong>
                        <?php echo $this->Html->link($data['page'], array('controller' => 'users', 'action' => 'index')) ?>
                    </strong>
                </li>
                <li class="breadcrumb-item active">
                    <strong>
                        <?php echo $this->Html->link('Register', array('controller' => 'users', 'action' => 'register')) ?>
                    </strong>
                </li>
            <?php elseif ($data['page'] == 'Announcements') : ?>
                <li class="breadcrumb-item active">
                    <strong>
                        <?php echo $this->Html->link($data['page'], array('controller' => 'announcements', 'action' => 'index')) ?>
                    </strong>
                </li>
                <li class="breadcrumb-item active">
                    <strong>
                        <?php echo $this->Html->link('Create announcement', array('controller' => 'announcements', 'action' => 'create')) ?>
                    </strong>
                </li>
            <?php elseif ($data['page'] == 'Modules') : ?>
                <li class="breadcrumb-item active">
                    <strong>
                        <?php echo $this->Html->link($data['page'], array('controller' => 'announcements', 'action' => 'index')) ?>
                    </strong>
                </li>
            <?php elseif($data['page'] == 'Editing announcement') : ?>
                <li class="breadcrumb-item active">
                    <strong>
                        <?php echo $this->Html->link('Announcements', array('controller' => 'announcements', 'action' => 'index')) ?>
                    </strong>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Edit</strong>
                </li>
            <?php else : ?>
                <li class="breadcrumb-item active">
                    <strong><?php echo $data['page'] ?></strong>
                </li>
            <?php endif ?>
        </ol>
    </div>
</div>