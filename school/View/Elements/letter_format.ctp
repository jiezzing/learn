<div class="modal" id="letter-format-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content animated bounceInRight">
      <div class="modal-header">
        <h4 class="modal-title">Announcement Letter</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12 mb">
            <h2 id="title">TITLE HERE</h2>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-sm-12 mb">
              <span>
                <?php echo $profile['School']['name'] ?>
              </span>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-sm-12 mb">
              <span id="created">DATE HERE</span>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-sm-12 mb">
              Subject: <span id="subject">Meeting</span>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-sm-12 mb">
              <span id="recipients">Dear [RECIPIENT]</span>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-sm-12 mb">
              <p id="body">CONTEXT HERE</p>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-sm-12 mb">
              <span>Sincerely,</span>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-sm-12 mb">
              <span id="posted-by">FULLNAME HERE</span>
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