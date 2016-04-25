<!--Start Edit Resident-->
<div id="add-resident" class="modal fade" role="dialog">  
    <div class="modal-dialog modal-md">
      <!-- Modal content-->
        <div class="modal-content">
              <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <h4 class="modal-title">Resident Information</h4>
              </div>
              <div class='row modal-body' style="text-align:right">
                <form class="form-horizontal" method="post" action="{{route('residents.store')}}">

                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="family_id" value="{{$family->id}}">

                        <div class="panel-body">
                              <div class="form-group row">
                                  <label class="col-md-4 control-label">First Name</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="first_name"  >
                                  </div>
                             </div>
                             <div class="form-group row">
                                  <label class="col-md-4 control-label">Last Name</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="last_name"  >
                                  </div>
                             </div>
                             <div class="form-group row">
                                  <label class="col-md-4 control-label">Middle Name</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="middle_name"  >
                                  </div>
                             </div>

                              <div class="form-group row">
                                  <label class="col-md-4 control-label">Gender</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="gender"  >
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <label class="col-md-4 control-label">Birthdate</label>
                                  <div class="col-md-6">
                                      <input type="date" class="form-control" name="birthdate" >
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-4 control-label">Civil Status</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="civil_status" >
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-4 control-label">Contact Number</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="contact_number"  >
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-4 control-label">Education</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="education"  >
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-4 control-label">Relationship to Head</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="relation_head"  >
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-4 control-label">Occupation Category</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="occupation_category" >
                                  </div>
                              </div><div class="form-group row">
                                  <label class="col-md-4 control-label">Specific Category</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="occupation_specific" >
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-4 control-label">Voter</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="if_voter">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-4 control-label">Disabled</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="if_disabled">
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
<!--End Edit Resident-->