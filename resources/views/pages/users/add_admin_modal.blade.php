<!--Start Add Province-->
<div id="add-admin" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Admin Information</h4>
            </div>
            <div class='row modal-body'>
                <form class="form-horizontal" method="post" action="">
                    <div class="panel-body">
                    <form class="form-horizontal" method="post" action="{{route('users.store')}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">                    
                    <input type="hidden" name="capability" value="Admin">
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
<!--End Add Province-->