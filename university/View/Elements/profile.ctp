<div class="modal fade" id="profile-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Profile Setings</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="row">
            <div class="ibox-content no-padding border-left-right">
              <?php echo $this->Html->image('profile_big.jpg', array(
                  'alt' => 'image',
                  'class' => 'img-fluid'
                )); 
              ?>
            </div>
            <div class="ibox-content profile-content">
                <?php 
                    if($profile['User']['middle_initial'] != null) {
                        $name = $profile['User']['firstname'] . ' ' . 
                                $profile['User']['middle_initial'] . '. ' . 
                                $profile['User']['lastname'];
                    }
                    else {
                        $name = $profile['User']['firstname'] . ' ' . 
                                $profile['User']['lastname'];
                    }

                    if($profile['User']['address'] != null) {
                        $address = $profile['User']['address'];
                    }
                    else {
                        $address = "Currently no address.";
                    }

                    if($profile['User']['birthdate'] != null) {
                        $birth = $profile['User']['birthdate'];
                    }
                    else {
                        $birth = "Not set";
                    }

                    if($profile['User']['gender'] != null) {
                        $gender = $profile['User']['gender'];
                    }
                    else {
                        $gender = "Not set";
                    }

                    if($profile['User']['age'] != 0) {
                        $age = $profile['User']['age'];
                    }
                    else {
                        $age = "Not set";
                    }
                ?> 
                <h4><strong><?php echo $name ?></strong></h4>
                <p><i class="fa fa-map-marker"></i> <?php echo $address ?></p>
                <h5>
                    About me
                </h5>
                <p>
                    For the timid or uninitiated, leaf-wrapped foods offer an ideal and gentle introduction to fire cooking. Liberated from the need to worry about whether the fish is sticking to the grill or burning, pay attention instead to the rate of browning on the surface of the leaf, which you'll get to discard whether it chars or remains pale.
                </p>
                <div class="row m-t-lg row">
                  <div class="col-md-4">
                      <span><?php echo $gender ?></span>
                      <h5><strong>Gender</strong></h5>
                  </div>
                  <div class="col-md-4">
                      <span><?php echo CakeTime::format($birth) ?></span>
                      <h5><strong><i class="fa fa-birthday-cake"></i> Birthday</strong></h5>
                  </div>
                  <div class="col-md-4">
                      <span><?php echo $age ?></span>
                      <h5><strong>Age</strong></h5>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <?php echo $this->Html->link(
            $this->Html->tag('button', 'Edit', array('class' => 'btn btn-primary')), array(
                "controller" => "users",
                "action" => "edit", $this->Session->read("user_id")
            ), array(
                'escape' => false
            )) 
        ?>
      </div>
    </div>
  </div>
</div>