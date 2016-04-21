<!--Start Edit Purok-->
<div id="{{$purok->id}}edit-purok" class="modal fade" role="dialog">  
    <div class="modal-dialog modal-md">
      <!-- Modal content-->
        <div class="modal-content">
              <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <h4 class="modal-title">Edit Purok Information</h4>
              </div>
              <div class='row modal-body' style="text-align:right">
                  <form class="form-horizontal" method="post" action="">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="panel-body">
                            <div class="form-group row">
                                <label class="col-md-4 control-label">Purok Name</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="name" value="{{$purok->name}}" required>
                                  </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 control-label">Description</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="description" value="{{$purok->description}}" required>
                                  </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 control-label">President</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="president" value="{{$purok->president}}" required>
                                  </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 control-label">Population</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="population" value="{{$purok->population}}" required>
                                  </div>
                            </div>
                        </div>
                    </form>
              </div>
              <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary pull-right">Update</button>
              </div>
              </form>
         </div>
         <!-- End Modal content-->
    </div>
</div>
<!--End Edit Purok-->