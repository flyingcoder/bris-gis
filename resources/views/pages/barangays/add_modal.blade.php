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
                                      <select class="form-control" id="">
                                            <option>Lanao del Norte</option> 
                                      </select>                          
                                </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 control-label">Municipality</label>
                                 <div class="col-md-6">
                                        <select class="form-control" id="">
                                             <option>Iligan City</option>
                                        </select>                          
                                 </div>
                         </div>

                    </div>        
                </form>


            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary pull-right">ADD</button>
            </div>
        </div>
        <!-- End Modal content-->
    </div>
</div>
<!--End Add Barangay-->