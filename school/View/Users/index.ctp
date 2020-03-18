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
                                    <th><input type="checkbox" class="i-checks"></th>
                                    <th>Name</th>
                                    <th>About</th>
                                    <th>Gender</th>
                                    <th>Birthday</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($user as $usersItem) : ?>
                                    <?php 
                                        !isset($usersItem['User']['about']) ? $about = 'Not set' : $about = $usersItem['User']['about'];
                                        !isset($usersItem['User']['gender']) ? $gender = 'Not set' : $gender = $usersItem['User']['gender'];
                                        !isset($usersItem['User']['birthdate']) ? $birthdate = 'Not set' : $birthdate = $usersItem['User']['birthdate'];
                                        !isset($usersItem['User']['address']) ? $address = 'Not set' : $address = $usersItem['User']['address'];
                                    ?>
                                    <tr class="gradeX">
                                        <td><input type="checkbox"  class="i-checks" value="<?php echo $usersItem['User']['id'] ?>"></td>
                                        <td><?php echo $usersItem['User']['lastname'] . ', ' . $usersItem['User']['firstname'] . ' ' . $usersItem['User']['middle_initial'] . '.'?></td>
                                        <td><?php echo $about ?></td>
                                        <td><?php echo $gender ?></td>
                                        <td><?php echo $birthdate ?></td>
                                        <td><?php echo $address ?></td>
                                        <td><?php echo $usersItem['User']['email'] ?></td>
                                        <td><?php echo $usersItem['User']['password'] ?></td>
                                        <td class="center"><?php echo $usersItem['UserType']['type'] ?></td>
                                        <td class="center"><?php echo $usersItem['User']['status_id'] ?></td>
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