<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-8">
            <div class="ibox ">
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th><input type="checkbox" class="i-checks"></th>
                                    <th>Subject </th>
                                    <th>Accessed level</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($subject as $key => $subject) : ?>
                                    <tr>
                                        <td><input type="checkbox"  class="i-checks" value="<?php echo $subject['Subject']['id'] ?>"></td>
                                        <td><?php echo $subject['Subject']['name'] ?></td>
                                        <td>
                                            <div class="row col-sm-12">
                                                <?php echo $badge[$key] ?>
                                            </div>
                                        </td>
                                        <td>
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item">
                                                    <?php echo $this->Html->link(
                                                        $this->Html->tag('i', false, array('class' => 'fa fa-pencil')) . '' . 
                                                        $this->Html->tag('span', ' Edit', array('class' => 'nav-label')), array(
                                                            'controller' => 'modules',
                                                            'action' => 'fetchSubmoduleData'
                                                        ), array(
                                                            'escape' => false,
                                                            'data-toggle' => 'modal',
                                                            'class' => 'text-navy'
                                                        )) 
                                                    ?>
                                                </li>
                                                <li class="breadcrumb-item">
                                                    <?php echo $this->Html->link(
                                                        $this->Html->tag('i', false, array('class' => 'fa fa-trash')) . '' . 
                                                        $this->Html->tag('span', ' Delete', array('class' => 'nav-label')), array(
                                                            'controller' => 'modules',
                                                            'action' => 'fetchSubmoduleData'
                                                        ), array(
                                                            'escape' => false,
                                                            'data-toggle' => 'modal',
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
                    <?php echo $this->Form->create(false, array('id' => 'module')) ?>
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
                    <?php echo $this->Form->end() ?>

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