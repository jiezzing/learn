<div class="modal" id="edit-subject-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content animated bounceInRight">
      <div class="modal-header">
        <h5 class="modal-title">Subject Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12 mb">
              <?php
                  echo $this->Form->input('update-subject-name', array(
                      'class' => 'form-control',
                      'type' => 'text',
                      'label' => 'Name',
                      'placeholder' => 'Your text here...'
                  ));
              ?>
          </div>
          <div class="col-sm-12 mt-4">
              <p>
                  Select levels that can have this subject
              </p>
              <select class="chosen-select form-control" data-placeholder="Choose level..." id="update-levels" multiple tabindex="4">
                  <?php foreach($level as $level) : ?>
                      <option value="<?php echo $level['Level']['id'] ?>"><?php echo $level['Level']['name'] ?></option>
                  <?php endforeach ?>
              </select>

          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="update-subject-btn">Save Changes</button>
      </div>
    </div>
  </div>
</div>