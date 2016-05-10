<!--Start Edit Family Profile-->
<div id="edit-profile" class="modal fade" role="dialog">  
    <div class="modal-dialog modal-md">
      <!-- Modal content-->
        <div class="modal-content">
              <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <h4 class="modal-title">Edit Family Profile</h4>
              </div>
              <div class='row modal-body' style="text-align:right">
                <form class="form-horizontal" method="post" action="{{route('families.update', $family->id)}}">

                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="panel-body">
                            <div class="form-group row">
                                <label class="col-md-4 control-label">Family Name</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="family_identifier" value="{{$family->family_identifier}}" required>
                                  </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 control-label">Monthly Income</label>
                                  <div class="col-md-6">
                                      <input type="number" class="form-control" name="monthly_income" value="{{$family->monthly_income}}" required>
                                  </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 control-label">Livelihood</label>
                                  <div class="col-md-6">
                                      <select class="form-control" name="if_other_livelihood" id="if_livelihood">
                                               <option value="{{$family->if_other_livelihood}}">{{$family->if_other_livelihood}}</option>
                                               <option value="No">No</option>
                                               <option value="Yes">Yes</option>
                                               
                                        </select>
                                  </div>
                            </div>
                            @if($family->if_other_livelihood == 'Yes')
                            <div class="form-group row">
                                <label class="col-md-4 control-label">Other Livelihood</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="livelihood" id="livelihood" value="{{$family->livelihood}}">
                                  </div>
                            </div>
                            @else
                            <div class="form-group row">
                                <label class="col-md-4 control-label">Other Livelihood</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="livelihood" id="livelihood" disabled="">
                                  </div>
                            </div>
                            @endif
                            <div class="form-group row">
                                <label class="col-md-4 control-label">4p's Beneficiary</label>
                                  <div class="col-md-6">
                                      <select class="form-control" name="if_4ps" id="if_4ps">
                                               <option value="{{$family->if_4ps}}">{{$family->if_4ps}}</option>
                                               <option value="No">No</option>
                                               <option value="Yes">Yes</option>
                                               
                                        </select>
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
<!--End Edit Family Profile-->