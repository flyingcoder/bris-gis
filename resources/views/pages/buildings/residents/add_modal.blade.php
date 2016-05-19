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
                                      <input type="text" class="form-control" name="first_name"  required>
                                  </div>
                             </div>
                             <div class="form-group row">
                                  <label class="col-md-4 control-label">Last Name</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="last_name"  required>
                                  </div>
                             </div>
                             <div class="form-group row">
                                  <label class="col-md-4 control-label">Middle Name</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="middle_name"  required>
                                  </div>
                             </div>

                              <div class="form-group row">
                                  <label class="col-md-4 control-label">Gender</label>
                                  <div class="col-md-6">
                                      <select class="form-control" name="gender" id="gender-list">
                                      <option value="Male">Male</option>
                                      <option value="Female">Female</option>
                                     </select>
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
                                      <select class="form-control" name="civil_status" id="civil-status-list">
                                      <option>Civil Status</option>
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
                                      <input type="text" class="form-control" name="contact_number"  >
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-4 control-label">Education</label>
                                  <div class="col-md-6">
                                      <select class="form-control" name="education" id="education-list">
                                      <option>Select Education</option>
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
                              <!-- <div class="form-group row">
                                  <label class="col-md-4 control-label">Relationship to Head</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="relation_head"  >
                                  </div>
                              </div> -->
                               <input type="hidden" class="form-control" name="relation_head" value="Household Head" >
                              <div class="form-group row">
                                  <label class="col-md-4 control-label">Occupation Category</label>
                                  <div class="col-md-6">
                                      <select class="form-control" name="occupation_category" id="occupation-category-list">
                                    <option>Occupation Category</option>
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
                              </div><div class="form-group row">
                                  <label class="col-md-4 control-label">Specific Category</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="occupation_specific" id="occupation_specific">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-4 control-label">Voter</label>
                                  <div class="col-md-6">
                                      <select class="form-control" name="if_voter">
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-4 control-label">Precinct</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="precinct" id="precinct">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-4 control-label">Disabled</label>
                                  <div class="col-md-6">
                                      <select class="form-control" name="if_disabled">
                                              <option>No</option>
                                              <option>Yes</option>
                                      </select>
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