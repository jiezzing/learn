<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content">
            <div class="row" id="modules">
                <?php foreach($data['modules']  as $moduleItem) : ?>
                    <div class="col-lg-4">
                            <div class="ibox ">
                                <div class="ibox-title">
                                    <h5><?php echo $moduleItem['Module']['name'] ?> </h5>
                                    <div class="ibox-tools">
                                        <a class="collapse-link" href="">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                            <i class="fa fa-cog"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-user">
                                            <li><a href="#" class="dropdown-item">Edit</a>
                                            </li>
                                            <li><a href="#" class="dropdown-item">Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <?php if(count($data['submodules'][$moduleItem['Module']['id']])) : ?>
                                <div class="ibox-content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="<?php echo 'submodule-' . $moduleItem['Module']['id'] ?>" placeholder="<?php echo 'Add ' . $moduleItem['Module']['name'] . ' submodule.'?>"> 
                                                    <span class="input-group-append"> 
                                                        <button type="button" class="btn btn-primary add-submodule-btn" value="<?php echo $moduleItem['Module']['id'] ?>">Add </button> 
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed mt-3"></div>
                                    
                                        <div class="scroll_content">
                                                <?php foreach($data['submodules'][$moduleItem['Module']['id']] as $submodulesItem) : ?>
                                                    <div class="mt-4">
                                                        <h4><?php echo $submodulesItem['Submodule']['name'] ?>
                                                            <br>
                                                            <small class="m-r "><a href="#"> Show submodule contents </a> </small>
                                                            <small class="m-r float-right"><?php echo CakeTime::format($submodulesItem['Submodule']['created']) ?></small>
                                                        </h4>
                                                    </div>
                                                <div class="hr-line-dashed"></div>
                                                <?php endforeach ?>
                                        </div>
                                </div>
                                <div class="ibox-footer">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="input-group">
                                                <input type="text" class="form-control search-submodule-btn" placeholder="Search here . . .">
                                                <div class="input-group-append">
                                                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php else : ?>
                                <div class="ibox-content">
                                        <div class="mt-4 text-center">
                                            <h4>NO DATA</h4>
                                        </div>
                                </div>
                                <?php endif ?>
                            </div>
                        </div>
                <?php endforeach ?>
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