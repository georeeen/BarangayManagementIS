
<!-- ========================= MODAL ======================= -->

<div id="detailsModal<?php echo $row['announcement'];?>" class="modal fade">
<form method="post">
  <div class="modal-dialog" >
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Details of <?php echo '<b>'.$row['announcement'].'</b>';?></h4>
        </div>
        <div class="modal-body">
            
            <div class="row">
                
                <?php
                echo '
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Title</label><br>
                        '.$row['announcement'].'
                        </div>
                    <div class="form-group">
                        <label>About:</label><br>
                        '.$row['about'].'
                    </div>
                </div>
                ';
                ?>
            <div>    
        <div class="modal-footer">
            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Close"/>
        </div>
    </div>
  </div>
  </form>
</div>