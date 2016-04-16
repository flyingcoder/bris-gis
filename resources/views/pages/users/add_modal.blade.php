<!--Start Add Province-->
<div id="add-user" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">User Information</h4>
            </div>
            <div class='row modal-body'>
                <form class="form-horizontal" method="post" action="">
                    <div class="panel-body">
                        <div class="form-group row">
                            <label class="col-md-4 control-label">Capability</label>
                            <div class="col-md-6">
                                  <select class="form-control" id="">
                                        <option>Admin</option>
                                        <option>User</option>
                                        <option>Editor</option>
                                  </select>                          
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 control-label">Barangay</label>
                            <div class="col-md-6">
                                  <select class="form-control" id="">
                                        <option>Hinaplanon</option>
                                  </select>                          
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 control-label">First Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="first_name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 control-label">Last Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="last_name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 control-label">Middle Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="middle_name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 control-label">Email</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="email" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="confirm_password" required>
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
<!--End Add Province-->