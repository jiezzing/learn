<div class="modal inmodal" id="contents-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Modal title</h4>
                <div class="carousel-caption ">
                                            <p>hahaha</p>
                                        </div>
                <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
            </div>
            <div class="modal-body">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php foreach($contents as $contentsKey => $contentsItem) : ?>
                            <?php foreach($contentsItem as $key => $value) : ?>
                                <?php if($key == 0) : ?>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $key ?>" class="active"></li>
                                <?php else : ?>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $key ?>"></li>
                                <?php endif ?>
                            <?php endforeach ?>
                        <?php endforeach ?>
                    </ol>
                    <div class="carousel-inner">
                        <?php foreach($contents as $contentsKey => $contentsItem) : ?>
                            <?php foreach($contentsItem as $key => $value) : ?>
                                <?php if($key == 0) : ?>
                                    <div class="carousel-item active">
                                        <embed class="d-block w-100" height="500" src="<?php echo 'files/UNIV-1/' . $value['Content']['name'] ?>">
                                        <div class="carousel-caption d-none d-md-block">
                                            <p><?php echo $value['Content']['name'] ?></p>
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <div class="carousel-item">
                                        <embed class="d-block w-100" height="500" src="<?php echo 'files/UNIV-1/' . $value['Content']['name'] ?>">
                                        <div class="carousel-caption d-none d-md-block">
                                            <p><?php echo $value['Content']['name'] ?></p>
                                        </div>
                                    </div>
                                <?php endif ?>
                            <?php endforeach ?>
                        <?php endforeach ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>