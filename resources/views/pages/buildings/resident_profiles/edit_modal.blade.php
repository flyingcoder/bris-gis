<!-- Start Edit Resident-->
<div id="edit-resprofile" class="modal fade" role="dialog">  
    <div class="modal-dialog modal-md">
      <!-- Modal content-->
        <div class="modal-content">
              <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <h4 class="modal-title">Edit Resident Information</h4>
              </div>
              <div class='row modal-body' style="text-align:right">
                <form class="form-horizontal" method="post" action="{{route('residents.update', $resident->id)}}">

                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <div class="panel-body">
                              <div class="form-group row">
                                  <label class="col-md-4 control-label">First Name</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="first_name"  value="{{$resident->first_name}}">
                                  </div>
                             </div>
                             <div class="form-group row">
                                  <label class="col-md-4 control-label">Last Name</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="last_name"  value="{{$resident->last_name}}">
                                  </div>
                             </div>
                             <div class="form-group row">
                                  <label class="col-md-4 control-label">Middle Name</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="middle_name"  value="{{$resident->middle_name}}">
                                  </div>
                             </div>

                              <div class="form-group row">
                                  <label class="col-md-4 control-label">Gender</label>
                                  <div class="col-md-6">
                                      <select class="form-control" name="gender" id="gender-list">
                                      <option value="{{$resident->gender}}">{{$resident->gender}}</option>>
                                      <option value="Male">Male</option>
                                      <option value="Female">Female</option>
                                     </select>
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <label class="col-md-4 control-label">Birthdate</label>
                                  <div class="col-md-6">
                                      <input type="date" class="form-control" name="birthdate"  value="{{$resident->birthdate}}">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-4 control-label">Civil Status</label>
                                  <div class="col-md-6">
                                      <select class="form-control" name="civil_status" id="civil-status-list">
                                      <option value="{{$resident->civil_status}}">{{$resident->civil_status}}</option>
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
                                      <input type="text" class="form-control" name="contact_number"  value="{{$resident->contact_number}}">
                                  </div>
                              </div>
                              <!-- <div class="form-group row">
                                  <label class="col-md-4 control-label">Relationship to Head</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="relation_head" value="{{$resident->familyMember->relation_head}}">
                                  </div>
                              </div> -->
                              <div class="form-group row">
                                  <label class="col-md-4 control-label">Education</label>
                                  <div class="col-md-6">
                                      <select class="form-control" name="education" id="education-list">
                                      <option value="{{$resident->education}}">{{$resident->education}}</option>
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
                                      <select class="form-control" name="occupation_category" id="occupation-category-list">
                                    <option value="{{$resident->occupation_category}}">{{$resident->occupation_category}}</option>
                                    <option value="Goverment Employee">Goverment Employee</option>
                                    <option value="Private Employee">Private Employee</option>
                                    <option value="Non-Government Organization">Non-Government Organization</option>
                                    <option value="OFW">OFW</option>
                                    <option value="Businessman">Businessman</option>
                                    <option value="Farmer">Farmer</option>
                                    <option value="Livestock Raiser">Livestock Raiser</option>
                                    <option value="Fisherman">Fisherman</option>
                                    <option value="Laborer/Unskilled Worker">Laborer/Unskilled Worker</option>
                                    <option value="Skilled Worker">Skilled Worker</option>
                                    <option value="Retiree/Pensioner">Retiree/Pensioner</option>
                                    <option value="Unemployed">Unemployed</option>
                               </select>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-4 control-label">Specific Category</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="occupation_specific" id="occupation_specific"  value="{{$resident->occupation_specific}}">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-4 control-label">Voter</label>
                                  <div class="col-md-6">
                                      <select class="form-control" name="if_voter">
                                              <option value="{{$resident->if_voter}}">{{$resident->if_voter}}</option>
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-4 control-label">Precinct</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="precinct" id="precinct"  value="{{$resident->precinct}}">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-4 control-label">Disabled</label>
                                  <div class="col-md-6">
                                      <select class="form-control" name="if_disabled">
                                              <option value="{{$resident->if_disabled}}">{{$resident->if_disabled}}</option>>
                                              <option>No</option>
                                              <option>Yes</option>
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
<!--End Edit Resident