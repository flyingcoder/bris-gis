<!--Start Edit Health Information-->
<div id="{{$disease->id}}edit-health" class="modal fade" role="dialog">  
    <div class="modal-dialog modal-md">
      <!-- Modal content-->
        <div class="modal-content">
              <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <h4 class="modal-title">Edit Health Information</h4>
              </div>
              <div class='row modal-body' style="text-align:right">
                <form class="form-horizontal" method="post" action="{{route('diseases.update', $disease->id)}}">

                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="resident_id" value="{{$resident->id}}">
                        <div class="panel-body">
                              <div class="form-group row">
                                  <label class="col-md-4 control-label">Disease</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="type"  value="{{$disease->type}}">
                                  </div>
                             </div>

                              <div class="form-group row">
                                  <label class="col-md-4 control-label">Year</label>
                                  <div class="col-md-6">
                                      <input type="date" class="form-control" name="year"  value="{{$disease->year}}">
                                  </div>
                              </div>
                        </div>
                    
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
<!--End Edit Health Information-->