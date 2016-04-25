<!--Start Add Family-->
<div id="add-family" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Family Information</h4>
            </div>
            <div class='row modal-body'>
                <form class="form-horizontal" method="post" action="{{route('families.store')}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="building_id" value="{{$building->id}}">
                    <div class="panel-body">
                        <div class="form-group row">
                                <label class="col-md-4 control-label">Family Name</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="family_identifier"  required>
                                  </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 control-label">Monthly Income</label>
                                  <div class="col-md-6">
                                      <input type="number" class="form-control" name="monthly_income" required>
                                  </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 control-label">Livelihood</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="if_other_livelihood"  required>
                                  </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 control-label">Other Livelihood</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="livelihood" required>
                                  </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 control-label">4p's Beneficiary</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="if_4ps" required>
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
<!--End Add Family-->