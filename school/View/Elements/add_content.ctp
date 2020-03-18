<div class="modal" id="add-content-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content animated bounceInRight">
      <div class="modal-header">
        <h5 class="modal-title">Add PDF Files</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-sm-12">
                <input type="file" accept="application/pdf" id="pdfs" class="hide mt-2 w-100" multiple="">
            </div>

            <div class="col-sm-12">
                <div class="progress mt-4" hidden="">
                    <div class="progress-bar progress-bar-success progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="add-pdf-btn">Upload Files</button>
      </div>
    </div>
  </div>
</div>