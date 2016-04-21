<!--Start Add Barangay-->
<div id="add-barangay" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Barangay Information</h4>
            </div>
            <div class='row modal-body'>
                <form class="form-horizontal" method="post" action="">
                    <div class="panel-body">
                        <div class="form-group row">
                            <label class="col-md-4 control-label">Barangay Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 control-label">Province</label>
                                 <div class="col-md-6">
                                        <input type="hidden" name="province_id" id="province-id">
                                        <input type="text" class="form-control" id="province-name" value="Select Province" disabled>                        
                                </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 control-label">Municipality</label>
                                 <div class="col-md-6">
                                        <input type="hidden" name="municipality_id" id="municipality-id">
                                        <input type="text" class="form-control" id="municipality-name" value="Select Municipality" disabled>   
                                 </div>
                         </div>

                    </div>        
      
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary pull-right">ADD</button>
            </div>
            </form>
        </div>
        <!-- End Modal content-->
    </div>
</div>
<!--End Add Barangay-->