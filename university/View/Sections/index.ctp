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
                                    <th>Educational Level </th>
                                    <th>Sections</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($level as $value) : ?>
                                    <tr>
                                        <td><input type="checkbox"  class="i-checks" value="<?php echo $value['Level']['id'] ?>"></td>
                                        <td><?php echo $value['Level']['name'] ?></td>
                                        <td>
                                            <div class="row col-sm-12">
                                                <?php 
                                                    if(isset($badge[$value['Level']['id']])) {
                                                        echo $badge[$value['Level']['id']];
                                                    }
                                                ?>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#"><i class="fa fa-check text-navy"></i></a>
                                            <a href="#"><i class="fa fa-check text-navy"></i></a>
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
                    <h5>Add Section</h5>
                </div>
                <div class="ibox-content">
                    <?php echo $this->Form->create(false, array('id' => 'Section')) ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <?php
                                    echo $this->Form->input(false, array(
                                        'class' => 'form-control',
                                        'type' => 'text',
                                        'placeholder' => 'Your text here...',
                                        'label' => 'Section Name',
                                        'id' => 'section-name'
                                    ));
                                ?>
                            </div>
                            <div class="col-sm-12 mt-4">
                                    <p>
                                        Select level that can have this section
                                    </p>
                                    <select class="select2 form-control" id="levels">
                                        <?php foreach($level as $level) : ?>
                                            <option value="<?php echo $level['Level']['id'] ?>"><?php echo $level['Level']['name'] ?></option>
                                        <?php endforeach ?>
                                    </select>

                                </div>
                        </div>
                    <?php echo $this->Form->end() ?>
                </div>
                <div class="ibox-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <button class="btn btn-primary btn-sm" type="button" id="add-section-btn">Add New Section</button>
                            </div>
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
        'scripts/section.js'
    )); 
?>