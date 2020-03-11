<div class="wrapper wrapper-content fadeInRight">
    <div class="row">
        <?php foreach($data['contents'] as $value) : ?>
        <div class="col-md-3">
            <div class="ibox">
                <div class="ibox-content product-box">
                    <embed class="d-block w-100" height="400" src="<?php echo '/learn/university/webroot/files/UNIV-1/' . $value['Content']['name'] ?>">
                    <div class="product-desc">
                        <small class="text-muted">File</small>
                        <a href="#" class="product-name ellipsis"><?php echo $value['Content']['name']?></a>



                        <div class="small m-t-xs">
                            Many desktop publishing packages and web page editors now.
                        </div>
                        <div class="m-t text-right">
                            <?php echo $this->Html->link(
                                $this->Html->tag('span', 'Open in new TAB ', array('class' => 'nav-label')) . '' . 
                                $this->Html->tag('i', false, array('class' => 'fa fa-long-arrow-right')), array(
                                    'controller' => 'files', 
                                    'action' => 'UNIV-1', $value['Content']['name'],
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