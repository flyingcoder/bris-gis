<!--Start Edit Resident-->
<div id="{{$familyMember->resident->id}}edit-resident" class="modal fade" role="dialog">  
    <div class="modal-dialog modal-md">
      <!-- Modal content-->
        <div class="modal-content">
              <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <h4 class="modal-title">Edit Resident Information</h4>
              </div>
              <div class='row modal-body' style="text-align:right">
                <form class="form-horizontal" method="post" action="{{route('residents.update', $familyMember->resident->id)}}">

                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <div class="panel-body">
                              <div class="form-group row">
                                  <label class="col-md-4 control-label">First Name</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="first_name"  value="{{$familyMember->resident->first_name}}">
                                  </div>
                             </div>
                             <div class="form-group row">
                                  <label class="col-md-4 control-label">Last Name</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="last_name"  value="{{$familyMember->resident->last_name}}">
                                  </div>
                             </div>
                             <div class="form-group row">
                                  <label class="col-md-4 control-label">Middle Name</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="middle_name"  value="{{$familyMember->resident->middle_name}}">
                                  </div>
                             </div>

                              <div class="form-group row">
                                  <label class="col-md-4 control-label">Gender</label>
                                  <div class="col-md-6">
                                      <select class="form-control" name="gender" id="gender-list">
                                      <option value="{{$familyMember->resident->gender}}">{{$familyMember->resident->gender}}</option>>
                                      <option value="Male">Male</option>
                                      <option value="Female">Female</option>
                                     </select>
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <label class="col-md-4 control-label">Birthdate</label>
                                  <div class="col-md-6">
                                      <input type="date" class="form-control" name="birthdate"  value="{{$familyMember->resident->birthdate}}">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-4 control-label">Civil Status</label>
                                  <div class="col-md-6">
                                      <select class="form-control" name="civil_status" id="civil-status-list">
                                      <option value="{{$familyMember->resident->civil_status}}">{{$familyMember->resident->civil_status}}</option>
                                      <option value="Single">Single</option>
                                      <option value="Married">Married</option>
                                      <option value="Widowed">Widowed</option>
                                      <option value="Separated">Separated</option>
                                     </select>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-4 control-label">Contact Number</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="contact"  value="{{$familyMember->resident->contact}}">
                                  </div>
                              </div>
                             <div class="form-group row">
                                  <label class="col-md-4 control-label">Education</label>
                                  <div class="col-md-6">
                                      <select class="form-control" name="education" id="education-list">
                                      <option value="">Select Education</option>
                                      <option value="Pre Elementary">Pre Elementary</option>
                                      <option value="Elementary">Elementary</option>
                                      <option value="High School Level">High School Level</option>
                                      <option value="High School Graduate">High School Graduate</option>
                                      <option value="College Level">College Level</option>
                                      <option value="College Graduate">College Graduate</option>
                                      <option value="Vocational">Vocational</option>
                                      <option value="PostGraduate">PostGraduate</option>
                                     </select>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-4 control-label">Occupation Category</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="occupation_category"  value="{{$familyMember->resident->occupation_category}}">
                                  </div>
                              </div><div class="form-group row">
                                  <label class="col-md-4 control-label">Specific Category</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="specific_category"  value="{{$familyMember->resident->specific_category}}">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-4 control-label">Voter</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="if_voter"  value="{{$familyMember->resident->if_voter}}">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-4 control-label">Disabled</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="if_disabled"  value="{{$familyMember->resident->if_disabled}}">
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
<!--End Edit Resident-->