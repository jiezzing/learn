<div class="modal fade" id="add-module-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create new module</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo $this->Form->create(false, array('id' => 'module')) ?>
            <div class="row">
                <div class="col-sm-12">
                    <?php
                        echo $this->Form->input(false, array(
                            'class' => 'form-control',
                            'type' => 'text',
                            'placeholder' => 'Module name here . . .',
                            'label' => 'Name',
                            'name' => 'name'
                        ));
                    ?>
                </div>
            </div>
        <?php echo $this->Form->end() ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="add-module-btn">Add</button>
      </div>
    </div>
  </div>
</div>