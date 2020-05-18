<div class="modal" id="edit-module-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content animated bounceInRight">
      <div class="modal-header">
        <h5 class="modal-title">Module Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12 mb">
              <?php
                  echo $this->Form->input('module-name', array(
                      'class' => 'form-control',
                      'type' => 'text',
                      'label' => 'Name',
                      'placeholder' => 'Your text here...'
                  ));
              ?>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="update-module-btn">Save Changes</button>
      </div>
    </div>
  </div>
</div>