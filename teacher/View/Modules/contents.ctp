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
                    <embed class="d-block w-100" height="300" src="<?php echo '/learn/school/files/' . $value['Content']['name'] ?>">
                    <div class="product-desc">
                        <small class="text-muted">File</small>
                        <a href="#" class="product-name ellipsis"><?php echo $value['Content']['name'] ?></a>
                        <div class="small m-t-xs">
                            Many desktop publishing packages and web page editors now.
                        </div>
                        <div class="m-t text-right">
                            <a href="<?php echo '/learn/school/files/' . $value['Content']['name'] ?>" class="btn btn-xs btn-outline btn-primary" target="_blank"><span class="nav-label">Open in new TAB </span><i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</div>