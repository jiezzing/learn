<div class="wrapper wrapper-content fadeInRight">
    <div class="row">
        <?php if(empty($content)) : ?>
            <div class="col-lg-12">
                <div class="panel panel-danger">
                    <div class="panel-body text-center">
                        <h4>No contents available</h4>
                    </div>
                </div>
            </div>
        <?php endif ?>
        <?php foreach($content as $value) : ?>
        <div class="col-md-3">
            <div class="ibox">
                <div class="ibox-content product-box">
                    <embed class="d-block w-100" height="300" src="<?php echo '../../../school/files/' . $value['Content']['name'] ?>">
                    <div class="product-desc">
                        <small class="text-muted">File</small>
                        <a href="#" class="product-name ellipsis"><?php echo $value['Content']['name'] ?></a>
                        <div class="small m-t-xs">
                            <?php echo CakeTime::niceShort($value['Content']['created']) ?>
                        </div>
                        <div class="m-t text-right">
                            <?php echo $this->Html->link(
                                $this->Html->tag('i', false, array('class' => 'fa fa-trash')), false, array(
                                    'escape' => false,
                                    'class' => 'btn btn-xs btn-outline btn-danger get-id delete',
                                    'value' => $value['Content']['id']
                                )) 
                            ?>
                            <?php echo $this->Html->link(
                                $this->Html->tag('span', 'Open in new TAB ', array('class' => 'nav-label')) . '' . 
                                $this->Html->tag('i', false, array('class' => 'fa fa-long-arrow-right')), array(
                                    'controller' => 'files', 
                                    'action' => $value['Content']['name'],
                                ), array(
                                    'escape' => false,
                                    'class' => 'btn btn-xs btn-outline btn-primary',
                                    'target' => '_blank'
                                )) 
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</div>

<?php 
    echo $this->Html->script(array(
        'scripts/content.js'
    )); 
?>