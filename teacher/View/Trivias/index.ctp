<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8">
                    <?php if (count($trivia) == 0) : ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-danger">
                                    <div class="panel-body text-center">
                                        <h4>Currently no trivias published.</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                    <?php foreach ($trivia as $value) : ?>
                    <?php $detail = json_decode($value['Trivia']['trivias'], true) ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox">
                                <div class="ibox-title">
                                    <h5>Trivia Question # <?php echo $value['Trivia']['id'] ?></h5>
                                    <div class="ibox-tools">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                            <i class="fa fa-gear"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-user">
                                            <li><?php echo $this->Html->link(
                                                $this->Html->tag('i', false, array('class' => 'fa fa-pencil')) . '' . 
                                                $this->Html->tag('span', ' Edit', array('class' => 'nav-label')), array(
                                                    'controller' => 'announcements', 
                                                    'action' => 'edit'
                                                ), array(
                                                    'escape' => false
                                                ))  ?>
                                            </li>
                                            <li><a href="#" value="<?php echo $announceItem['Announcement']['id'] ?>" class="dropdown-item delete"><i class="fa fa-trash"></i> Delete</a>
                                            </li>
                                        </ul>
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-down"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <p><?php echo $detail['question'] ?></p>
                                    <p>Hint: <?php echo $detail['hint'] ?></p>
                                    <p><i>Answer: <?php echo $detail['answer'] ?></i></p>
                                </div>
                                <div class="ibox-footer">
                                    <span>
                                        <?php echo CakeTime::niceShort($value['Trivia']['created']) ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
                <div class="col-lg-4 container">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Make announcement</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="form-group  row"><label class="col-sm-12 col-form-label">Question</label>
                                <div class="col-sm-12">
                                    <?php
                                        echo $this->Form->input(false, array(
                                            'class' => 'form-control',
                                            'type' => 'text',
                                            'placeholder' => 'Your text here...',
                                            'label' => false,
                                            'id' => 'question'
                                        ));
                                    ?>
                                </div>
                            </div>
                            <div class="form-group  row"><label class="col-sm-12 col-form-label">Answer</label>
                                <div class="col-sm-12">
                                    <?php
                                        echo $this->Form->input(false, array(
                                            'class' => 'form-control',
                                            'type' => 'text',
                                            'placeholder' => 'Your text here...',
                                            'label' => false,
                                            'id' => 'answer'
                                        ));
                                    ?>
                                </div>
                            </div>
                            <div class="form-group  row"><label class="col-sm-12 col-form-label">Hint</label>
                                <div class="col-sm-12">
                                    <?php
                                        echo $this->Form->input(false, array(
                                            'class' => 'form-control',
                                            'type' => 'text',
                                            'placeholder' => 'Your text here...',
                                            'label' => false,
                                            'id' => 'hint'
                                        ));
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <button class="btn btn-primary btn-sm float-right" type="button" id="trivia-btn">Create Trivia</button>
                                    </div>
                                </div>
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
        'scripts/trivia.js',
    )); 
?>
