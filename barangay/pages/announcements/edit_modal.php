<?php echo '<div id="editModal'.$row['announcement'].'" class="modal fade">
<form method="post">
  <div class="modal-dialog modal-sm" style="width:300px !important;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Edit Staff Info</h4>
        </div>
        <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" value="'.$row['announcement'].'" name="hidden_id" id="hidden_id"/>
                <div class="form-group">
                    <label>Name: <span style="color:gray; font-size: 10px;">(Title)</span></label>
                    <input name="txt_edit_announcement" class="form-control input-sm" type="text" value="'.$row['announcement'].'"/>
                </div>
                <div class="form-group">
                    <label>Username: </label>
                    <input name="txt_edit_about" class="form-control input-sm" type="text" value="'.$row['about'].'" />
                </div>
            </div>
        </div>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
            <input type="submit" class="btn btn-primary btn-sm" name="btn_save" value="Save"/>
        </div>
    </div>
  </div>
</form>
</div>';?>