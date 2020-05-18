<?php 
    echo $this->element('add_content');
    echo $this->element('edit_submodule');
    echo $this->element('edit_module');
?>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <?php if (empty($module)) : ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-danger">
                                    <div class="panel-body text-center">
                                        <h4>Currently no modules published.</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                    <?php foreach($module  as $moduleItem) : ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox">
                                <div class="ibox-title">
                                    <h5><?php echo $moduleItem['Module']['name'] ?> </h5>
                                    <div class="ibox-tools">
                                        <a class="collapse-link" href="">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                    </div>
                                </div>
                                <?php if(!empty($submodule[$moduleItem['Module']['id']])) : ?>
                                <div class="ibox-content">
                                        <?php foreach($submodule[$moduleItem['Module']['id']] as $submodulesItem) : ?>
                                            <div class="mt">
                                                <h4>
                                                <label><?php echo $submodulesItem['Submodule']['name'] ?></label>
                                                <span class="float-right">
                                                    <ol class="breadcrumb">
                                                        <li class="breadcrumb-item">
                                                            <small>
                                                                <?php echo $this->Html->link(
                                                                    $this->Html->tag('i', false, array('class' => 'fa fa-file')) . '' . 
                                                                    $this->Html->tag('span', ' Contents', array('class' => 'nav-label')), array(
                                                                        'controller' => 'modules',
                                                                        'action' => 'contents', $submodulesItem['Submodule']['id']
                                                                    ), array(
                                                                        'escape' => false,
                                                                        'target' => '_blank'
                                                                    )) 
                                                                ?>
                                                            </small>
                                                        </li>
                                                    </ol>
                                                </span>
                                                </h4>
                                            </div>
                                        <div class="hr-line-dashed"></div>
                                        <?php endforeach ?>
                                </div>
                                <?php else : ?>
                                    <div class="ibox-content">
                                        <div class="mt-2 text-center">
                                            <h4>Submodules not available</h4>
                                        </div>
                                </div>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>
    
<?php 
    echo $this->Html->script(array(
        'scripts/modules.js',
        'scripts/initialize.js'
    )); 
?>