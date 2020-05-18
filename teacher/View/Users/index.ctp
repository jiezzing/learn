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
                                    <th>Grade Level</th>
                                    <th>Section</th>
                                    <th>About</th>
                                    <th>Gender</th>
                                    <th>Birthday</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($student as $value) : ?>
                                    <?php 
                                        empty($value['User']['about']) ? 
                                            $about = 'Not set' : 
                                            $about = $value['User']['about'];

                                        empty($value['User']['gender']) ? 
                                            $gender = 'Not set' : 
                                            $gender = $value['User']['gender'];

                                        empty($value['User']['birthdate']) ? 
                                            $birthdate = 'Not set' : 
                                            $birthdate = $value['User']['birthdate'];

                                        empty($value['User']['address']) ? 
                                            $address = 'Not set' : 
                                            $address = $value['User']['address'];
                                        empty($value['User']['middle_initial']) ? 
                                            $name = $value['User']['lastname'] . ', ' . $value['User']['firstname'] : 
                                            $name = $value['User']['lastname'] . ', ' . $value['User']['firstname'] . ' ' . $value['User']['middle_initial'] . '.';
                                    ?>
                                    <tr class="gradeX">
                                        <td><?php echo $name ?></td>
                                        <td><?php echo $value['Level']['name'] ?></td>
                                        <td><?php echo $value['Section']['name'] ?></td>
                                        <td><?php echo $about ?></td>
                                        <td><?php echo $gender ?></td>
                                        <td><?php echo $birthdate ?></td>
                                        <td><?php echo $address ?></td>
                                        <td><?php echo $value['User']['email'] ?></td>
                                        <td><?php echo $value['User']['password'] ?></td>
                                        <td class="center"><?php echo $value['Status']['status'] ?></td>
                                        <td>
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item">
                                                    <?php echo $this->Html->link(
                                                        $this->Html->tag('i', false, array('class' => 'fa fa-pencil')) . '' . 
                                                        $this->Html->tag('span', ' Edit', array('class' => 'nav-label')), array(
                                                            'controller' => 'users',
                                                            'action' => 'edit', $value['User']['id']
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