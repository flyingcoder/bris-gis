@extends('layouts.app')

@section('main-content')


      <section class="content-header">
          <h1><a href="{{ route('households.get', $barangay_id) }}">
                  <span class="fa fa-reply"></span>
              </a>
             Household Information
          </h1>      
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
          <form class="form-horizontal" method="post" action="{{route('buildings.store')}}">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header">
                    <div class="col-md-6">   
                      <h3 class="box-title">Household Information</h3>
                    </div>                
                </div><!-- /.box-header --> 
			       <div class="box-body">
			        
                    		<input type="hidden" name="_token" value="{{csrf_token()}}">
			          		<input type="hidden" name="barangay_id" value="{{$barangay_id}}">
				          	<label for="exampleInputEmail1">Geographical Information</label>
				            <div class="col-md-12 form-group">
				              <div class="col-md-6">
				              <label for="exampleInputEmail1">Longitude</label>
				              <input type="number" step="any" class="form-control" name="longitude" placeholder="Longitude">
				              </div>
				              <div class="col-md-6">			              
				              <label for="exampleInputPassword1">Latitude</label>
				              <input type="number" step="any" class="form-control" name="latitude" placeholder="Latitude">
				              </div>
				            </div>
				            <div class="col-md-12 form-group">
				            	<label for="exampleInputEmail1">Household Information</label>
				            </div>
				            <div class="col-md-12 form-group">
				              <div class="col-md-6">
				              <label for="exampleInputEmail1">Street Address</label>
				              		<input type="text" class="form-control" name="street" placeholder="Street Address">
				              </div>
				              <div class="col-md-6">			              
				              <label for="exampleInputPassword1">Purok</label>
				              		<select class="form-control" name="purok_id" id="purok-list">
                                     <option>Select Purok</option>
                                   </select>   
				              </div>
				            </div>
				            <div class="col-md-12 form-group">
				              <div class="col-md-4">
				              <label for="exampleInputEmail1">Household Identifier</label>
				              <input type="text" class="form-control" name="name" placeholder="Household Identifier">
				              </div>
				              <div class="col-md-4">			              
				              <label for="exampleInputPassword1">Year Constructed</label>
				              <input type="date" class="form-control" name="year_constructed">
				              </div>
				              <div class="col-md-4">			              
				              <label for="exampleInputPassword1">Net Value</label>
				              <input type="number" class="form-control" name="net_value" placeholder="Net Value">
				              </div>
				            </div>

				            <div class="col-md-12 form-group">
				              <div class="col-md-4">
				              <label for="exampleInputEmail1">Usage</label>
				              		<select class="form-control" name="building_usage" id="usage-list">
				              			<option>Select Usage</option>
                                     	<option value="Residential">Residential</option>
                                     	<option value="Commercial">Commercial</option>
				              		</select>
				              </div>
				              <div class="col-md-4">			              
				              <label for="exampleInputPassword1">Structure</label>
				              		<select class="form-control" name="structure" id="structure-list">
                                     	<option>Select Structure</option>
                                     	<option value="Concrete">Concrete</option>
                                     	<option value="Bamboo">Bamboo</option>
                                     	<option value="Makeshift">Makeshift</option>
                                     	<option value="Masonry">Masonry</option>
                                     	<option value="Metal">Metal</option>
                                     	<option value="Wood">Wood</option>
                                   	</select>   
				              </div>
				              <div class="col-md-4">			              
				              <label for="exampleInputPassword1">Estimated Area (sq.m)</label>
				              <input type="number" step="any" class="form-control" name="area" placeholder="Estimated Area">
				              </div>
				       		</div>

				            <div class="col-md-12 form-group">
				              <div class="col-md-6">
				              <label for="exampleInputEmail1">Number of Storeys</label>
				              <input type="number" class="form-control" name="no_stories" placeholder="Number of Storeys">
				              </div>
				              <div class="col-md-6">			              
				              <label for="exampleInputPassword1">Type of Holding</label>
				              		<select class="form-control" name="holding" id="holding-list">
				              			<option>Select Holding</option>
                                     	<option value="Owner">Owner</option>
                                     	<option value="Renter">Renter</option>
                                     	<option value="Tenant">Tenant</option>
                                     	<option value="Caretaker">Caretaker</option>
                                     	<option value="Mortgage">Mortgage</option>
                                     	<option value="Pawn">Pawn</option>
				              		</select>
				              </div>
				            </div>

			       </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header">
                    <div class="col-md-3">   
                      <h3 class="box-title">Household Head Information</h3>
                    </div>                
                </div><!-- /.box-header -->
                <div class="box-body">
                	<form class="form-horizontal" role="form">
			           <div class="col-md-12 form-group">
			              <div class="col-md-4">
				              <label for="exampleInputEmail1">First Name</label>
				              <input type="text" class="form-control" name="first_name" placeholder="First Name">
			              </div>
			              <div class="col-md-4">			              
				              <label for="exampleInputPassword1">Last Name</label>
				              <input type="text" class="form-control" name="last_name" placeholder="Last Name">
			              </div>
			              <div class="col-md-4">			              
				              <label for="exampleInputPassword1">Middle Name</label>
				              <input type="text" class="form-control" name="middle_name" placeholder="Middle Name">
			              </div>
			           </div>

			           <div class="col-md-12 form-group">
			              <div class="col-md-2">
				              <label for="exampleInputEmail1">Birthdate</label>
				              <input type="date" class="form-control" name="birthdate">
			              </div>
			              <div class="col-md-2">			              
				              <label for="exampleInputPassword1">Gender</label>
				              		<select class="form-control" name="gender" id="gender-list">
                                     	<option value="Male">Male</option>
                                     	<option value="Female">Female</option>
                                     </select>
			              </div>
			              <div class="col-md-2">			              
				              <label for="exampleInputPassword1">Civil Status</label>
				              		<select class="form-control" name="civil_status" id="civil-status-list">
				              			<option>Civil Status</option>
                                     	<option value="Single">Single</option>
                                     	<option value="Married">Married</option>
                                     	<option value="Widowed">Widowed</option>
                                     	<option value="Separated">Separated</option>
                                     </select>
			              </div>
			              <div class="col-md-3">			              
				              <label for="exampleInputPassword1">Occupation Category</label>
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
			              <div class="col-md-3">			              
				              <label for="exampleInputPassword1">Specific Occupation</label>
				              <input type="text" class="form-control" name="occupation_specific" id="occupation_specific" placeholder="Specific Occupation">
			              </div>
			           </div>

			           <div class="col-md-12 form-group">
			              <div class="col-md-4">
				              <label for="exampleInputEmail1">Educational Attainment</label>
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
			              <div class="col-md-4">			              
				              <label for="exampleInputPassword1">Contact Number</label>
				              <input type="text" class="form-control" name="contact_number" placeholder="Contact Number">
			              </div>
			              <div class="col-md-2">			              
				              <label for="exampleInputPassword1">Registered Voter?</label>
				              <select class="form-control" name="if_voter">
	                                <option value="Yes">Yes</option>
	                                <option value="No">No</option>
		                      </select>
			              </div>
			              <div class="col-md-2">			              
				              <label for="exampleInputPassword1">Disabled?</label>
				              <select class="form-control" name="if_disabled">
	                                <option>No</option>
	                                <option>Yes</option>
		                      </select>
			              </div>
			           </div>

                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->


          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header">
                    <div class="col-md-3">   
                      <h3 class="box-title">Socioeconomic Information</h3>
                    </div>                
                </div><!-- /.box-header -->
                <div class="box-body">
	                 <form class="form-horizontal" role="form">
	                 		<div class="col-md-2">			              
				              <label for="exampleInputPassword1">Monthly Income</label>
				              <input class="form-control" name="monthly_income" type="number" placeholder="Monthly Income">
				              		<!-- <select class="form-control" name="monthly_income" id="monthly-income-list">
                                     	<option>Monthly Income</option>
                                     	<option value="P 0.00 - P 1,000">P 0.00 - P 1,000</option>
                                     	<option value="P 1,001 - P 3,000">P 1,001 - P 3,000</option>
                                     	<option value="P 3,001 - P 5,000">P 3,001 - P 5,000</option>
                                     	<option value="P 5,001 - P 10,000">P 5,001 - P 10,000</option>
                                     	<option value="P 10,001 - P 15,000">P 10,001 - P 15,000</option>
                                     	<option value="P 15,001 - P 20,000">P 15,001 - P 20,000</option>
                                     	<option value="P 20,001 and above">P 20,001 and above</option>
                                     </select> -->
			              	</div>
			              	<div class="col-md-2">			              
				              <label for="exampleInputPassword1">4 p's Beneficiary? </label>
								        <select class="form-control" name="if_4ps">
			                               <option value="Yes">Yes</option>
			                               <option value="No">No</option>
				                     	</select>
			              	</div>
			              	<div class="col-md-3 col-md-offset-1">			              
				              <label for="exampleInputPassword1">Alternative Sources of Livelihood? </label>
								        <select class="form-control" name="if_other_livelihood">
			                               <option value="No">No</option>
			                               <option value="Yes">Yes</option>
				                     	</select>
			              	</div>
			              	<div class="col-md-4">			              
				              <label for="exampleInputPassword1">if yes, specify  </label>
								        <input class="form-control" name="livelihood" type="text" placeholder="Please specify...">
			              	</div>
	    			
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
            <div class="col-md-4 col-md-offset-4">	
            	<button type="submit" class="btn btn-primary btn-lg btn-block pull-right">Submit</button>
            </div>
            </form>
          </div><!-- /.row -->
          		              
	      
        </section><!-- /.content -->

@endsection

@section('page-script')

<script type="text/javascript">
$(document).ready(function(){ 
        $.get("{{route('puroks.get', $barangay_id)}}",
          function(data) {
            var puroks = $('#purok-list');
            puroks.empty();
            puroks.append("<option>Select Purok</option>");
          $.each(data.puroks, function(index, element) {
                  puroks.append("<option value='"+ element.id +"'>" + element.name +" "+ element.description + "</option>");
          });
        });
    
  });
</script>

<script type="text/javascript">
$(document).ready(function(){ 
    $('#if_livelihood').on('change', function(){
       if($('#if_livelihood').val() == 'Yes')
       {
        document.getElementById("livelihood").disabled=false;

       } else
       {
        document.getElementById("livelihood").disabled=true;
        document.getElementById("livelihood").value='';
       }
    });
  });
</script>

<script type="text/javascript">
$(document).ready(function(){ 
    $('#occupation-category-list').on('change', function(){
       if($('#occupation-category-list').val() != 'Unemployed')
       {
        document.getElementById("occupation_specific").disabled=false;

       } else
       {
        document.getElementById("occupation_specific").disabled=true;
        document.getElementById("occupation_specific").value='';
       }
    });
  });
</script>
@endsection