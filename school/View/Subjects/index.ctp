<?php echo $this->element('edit_subject') ?>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-8">
            <div class="ibox ">
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th>Subject </th>
                                    <th>Accessed level</th>
                                    <th>Created</th>
                                    <th>Last modified</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($subject as $key => $value) : ?>
                                    <tr>
                                        <td><?php echo $value['Subject']['name'] ?></td>
                                        <td>
                                            <div class="row col-sm-12">
                                                <?php echo $badge[$key] ?>
                                            </div>
                                        </td>
                                        <td><?php echo CakeTime::niceShort($value['Subject']['created']) ?></td>
                                        <td><?php echo CakeTime::niceShort($value['Subject']['modified']) ?></td>
                                        <td>
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item">
                                                    <?php echo $this->Html->link(
                                                        $this->Html->tag('i', false, array('class' => 'fa fa-pencil')) . '' . 
                                                        $this->Html->tag('span', ' Edit', array('class' => 'nav-label')), array(
                                                            'controller' => 'subjects',
                                                            'action' => 'fetchSubjectData'
                                                        ), array(
                                                            'escape' => false,
                                                            'data-toggle' => 'modal',
                                                            'class' => 'text-navy edit-subject get-id',
                                                            'value' => $value['Subject']['id']
                                                        )) 
                                                    ?>
                                                </li>
                                                <li class="breadcrumb-item">
                                                    <?php echo $this->Html->link(
                                                        $this->Html->tag('i', false, array('class' => 'fa fa-trash')) . '' . 
                                                        $this->Html->tag('span', ' Delete', array('class' => 'nav-label')), array(
                                                            'controller' => 'subjects',
                                                            'action' => 'deleteSubject'
                                                        ), array(
                                                            'escape' => false,
                                                            'class' => 'text-navy delete-subject get-id',
                                                            'value' => $value['Subject']['id']
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
        <div class="col-lg-4">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Add new Subject</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#" class="dropdown-item">Config option 1</a>
                            </li>
                            <li><a href="#" class="dropdown-item">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <?php
                                echo $this->Form->input(false, array(
                                    'class' => 'form-control',
                                    'type' => 'text',
                                    'placeholder' => 'Subject name here...',
                                    'label' => 'Name',
                                    'id' => 'subject-name'
                                ));
                            ?>
                        </div>
                        <div class="col-sm-12 mt-4">
                            <p>
                                Select levels that can have this subject
                            </p>
                            <select class="chosen-select form-control" data-placeholder="Choose level..." id="levels" multiple tabindex="4">
                                <?php foreach($level as $level) : ?>
                                    <option value="<?php echo $level['Level']['id'] ?>"><?php echo $level['Level']['name'] ?></option>
                                <?php endforeach ?>
                            </select>

                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>
                    <div class="form-group row">
                        <div class="col-sm-4 col-sm-offset-2">
                            <button class="btn btn-primary btn-sm" type="button" id="add-subject-btn">Add subject</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<?php 
    echo $this->Html->script(array(
        'scripts/initialize.js',
        'scripts/subject.js'
    )); 
?>