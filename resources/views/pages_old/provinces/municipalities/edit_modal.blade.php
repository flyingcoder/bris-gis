<!--Start Edit Municipality-->
<div id="{{$municipality->id}}edit-municipality" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Municipality Information</h4>
            </div>
            <div class='row modal-body' style="text-align:right">
                <form class="form-horizontal" method="post" action="{{route('municipalities.update', $municipality->id)}}">

                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="province_id" value="{{$province->id}}">


                    <div class="panel-body">
                        <div class="form-group row">
                            <label class="col-md-4 control-label">Municipality Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ $municipality->name }}" required>
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
<!--End Edit Municipality-->