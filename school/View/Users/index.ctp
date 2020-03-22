<script>
    var page = 'users';
</script>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>About</th>
                                    <th>Gender</th>
                                    <th>Birthday</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($user as $usersItem) : ?>
                                    <?php 
                                        empty($usersItem['User']['about']) ? 
                                            $about = 'Not set' : 
                                            $about = $usersItem['User']['about'];

                                        empty($usersItem['User']['gender']) ? 
                                            $gender = 'Not set' : 
                                            $gender = $usersItem['User']['gender'];

                                        empty($usersItem['User']['birthdate']) ? 
                                            $birthdate = 'Not set' : 
                                            $birthdate = $usersItem['User']['birthdate'];

                                        empty($usersItem['User']['address']) ? 
                                            $address = 'Not set' : 
                                            $address = $usersItem['User']['address'];
                                        empty($usersItem['User']['middle_initial']) ? 
                                            $name = $usersItem['User']['lastname'] . ', ' . $usersItem['User']['firstname'] : 
                                            $name = $usersItem['User']['lastname'] . ', ' . $usersItem['User']['firstname'] . ' ' . $usersItem['User']['middle_initial'] . '.';
                                    ?>
                                    <tr class="gradeX">
                                        <td><?php echo $name ?></td>
                                        <td><?php echo $about ?></td>
                                        <td><?php echo $gender ?></td>
                                        <td><?php echo $birthdate ?></td>
                                        <td><?php echo $address ?></td>
                                        <td><?php echo $usersItem['User']['email'] ?></td>
                                        <td><?php echo $usersItem['User']['password'] ?></td>
                                        <td class="center"><?php echo $usersItem['UserType']['type'] ?></td>
                                        <td class="center"><?php echo $usersItem['Status']['status'] ?></td>
                                        <td>
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item">
                                                    <?php echo $this->Html->link(
                                                        $this->Html->tag('i', false, array('class' => 'fa fa-pencil')) . '' . 
                                                        $this->Html->tag('span', ' Edit', array('class' => 'nav-label')), array(
                                                            'controller' => 'users',
                                                            'action' => 'edit', $usersItem['User']['id']
                                                        ), array(
                                                            'escape' => false,
                                                            'class' => 'text-navy'
                                                        )) 
                                                    ?>
                                                </li>
                                            </ol>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    echo $this->Html->script(array(
        'scripts/initialize.js'
    )); 
?>