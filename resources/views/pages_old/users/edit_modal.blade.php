<!--Start Edit Admin-->
<div id="{{$user->id}}edit-user" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit User Information</h4>
            </div>
            <div class='row modal-body'>
                <form class="form-horizontal" method="post" action="#">
                    {!! csrf_field() !!}

                    <div class="panel-body" style="text-align:right">
                        <input type="hidden" name="capability" value="User">
                        <div class="form-group row">
                            <label class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 control-label">Middle Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="middle_name" value="{{ $user->middle_name }}" required>
                            </div>
                        </div>                        

                        <div class="form-group row">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Modal content-->
    </div>
</div>
<!--End Edit Admin-->
