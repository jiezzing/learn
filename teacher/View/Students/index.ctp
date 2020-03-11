<script>
    var page = 'users';
</script>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['users'] as $usersItem) : ?>
                                    <tr class="gradeX">
                                        <td><?php echo $usersItem['User']['lastname'] . ', ' . $usersItem['User']['firstname'] . ' ' . $usersItem['User']['middle_initial'] . '.'?></td>
                                        <td><?php echo $usersItem['User']['email'] ?></td>
                                        <td><?php echo $usersItem['User']['password'] ?></td>
                                        <td class="center"><?php echo $usersItem['UserType']['type'] ?></td>
                                        <td class="center"><?php echo $usersItem['User']['status_id'] ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Type</th>
                                    <th>Type</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    echo $this->Html->script(array(
        'scripts/announcements.js'
    )); 
?>