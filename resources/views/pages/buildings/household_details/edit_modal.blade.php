<!--Start Edit Household Details-->
<div id="edit-detail" class="modal fade" role="dialog">  
    <div class="modal-dialog modal-md">
      <!-- Modal content-->
        <div class="modal-content">
              <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <h4 class="modal-title">Edit Household Information</h4>
	              </div>
	              <div class='row modal-body' style="text-align:right">
	                <form class="form-horizontal" method="post" action="{{route('buildings.update', $building->id)}}">
	                	<input type="hidden" name="_method" value="PUT">
	                    <input type="hidden" name="_token" value="{{csrf_token()}}">
	                    <div class="panel-body">
				            <div class="col-md-12 form-group">
				              <div class="col-md-6">
				              <label class="col-md-3" for="exampleInputEmail1">Longitude</label>
				              <input type="number" step="any" class="form-control" name="longitude" value="{{$building->longitude}}">
				              </div>
				              <div class="col-md-6">			              
				              <label class="col-md-3" for="exampleInputPassword1">Latitude</label>
				              <input type="number" step="any" class="form-control" name="latitude" value="{{$building->latitude}}">
				              </div>
				            </div>

	                        <div class="form-group row">
	                                <label class="col-md-4 control-label">Household Identifier</label>
	                                  <div class="col-md-6">
	                                      <input type="text" class="form-control" name="name" value="{{$building->name}}" >
	                                  </div>
	                            </div>
	                            <div class="form-group row">
	                                <label class="col-md-4 control-label">Street Address</label>
	                                  <div class="col-md-6">
	                                      <input type="text" class="form-control" name="street" value="{{$building->street}}" >
	                                  </div>
	                            </div>
	                            <div class="form-group row">
	                                <label class="col-md-4 control-label">Purok</label>
	                                  <div class="col-md-6">
	                                      <select class="form-control" name="purok_id" id="purok-list">
		                                     <option value="{{$building->purok->id}}">{{$building->purok->name}} {{$building->purok->description}}</option>
		                                   </select>   
	                                  </div>
	                            </div>
	                            <div class="form-group row">
	                                <label class="col-md-4 control-label">Year Constructed</label>
	                                  <div class="col-md-6">
	                                      <input type="date" class="form-control" name="year_constructed" value="{{$building->year_constructed}}">
	                                  </div>
	                            </div>
	                            <div class="form-group row">
	                                <label class="col-md-4 control-label">Net Value</label>
	                                  <div class="col-md-6">
	                                      <input type="number" class="form-control" name="net_value" value="{{$building->net_value}}" >
	                                  </div>
	                            </div>
	                            <div class="form-group row">
	                                <label class="col-md-4 control-label">Usage</label>
	                                  <div class="col-md-6">
	                                    <select class="form-control" name="building_usage" id="usage-list">
					              			<option value="{{$building->building_usage}}">{{$building->building_usage}}</option>
	                                     	<option value="Residential">Residential</option>
	                                     	<option value="Commercial">Commercial</option>
					              		</select>
	                                  </div>
	                            </div>
	                            <div class="form-group row">
	                                <label class="col-md-4 control-label">Structure</label>
	                                  <div class="col-md-6">
	                                      <select class="form-control" name="structure" id="structure-list">
		                                     	<option value="{{$building->structure}}">{{$building->structure}}</option>
		                                     	<option value="Concrete">Concrete</option>
		                                     	<option value="Bamboo">Bamboo</option>
		                                     	<option value="Makeshift">Makeshift</option>
		                                     	<option value="Masonry">Masonry</option>
		                                     	<option value="Metal">Metal</option>
		                                     	<option value="Wood">Wood</option>
		                                   	</select>   
	                                  </div>
	                            </div>
	                            <div class="form-group row">
	                                <label class="col-md-4 control-label">Estimated Area (sq.m)</label>
	                                  <div class="col-md-6">
	                                      <input type="number" step="any" class="form-control" name="area" value="{{$building->area}}" >
	                                  </div>
	                            </div>
	                            <div class="form-group row">
	                                <label class="col-md-4 control-label">Number of Storeys</label>
	                                  <div class="col-md-6">
	                                      <input type="number" class="form-control" name="no_stories" value="{{$building->no_stories}}" >
	                                  </div>
	                            </div>
	                            <div class="form-group row">
	                                <label class="col-md-4 control-label">Type of Holding</label>
	                                  <div class="col-md-6">
	                                      <select class="form-control" name="holding" id="holding-list">
						              			<option value="{{$building->holding}}">{{$building->holding}}</option>
		                                     	<option value="Owner">Owner</option>
		                                     	<option value="Renter">Renter</option>
		                                     	<option value="Tenant">Tenant</option>
		                                     	<option value="Caretaker">Caretaker</option>
		                                     	<option value="Mortgage">Mortgage</option>
		                                     	<option value="Pawn">Pawn</option>
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
<!--End Edit Household Detail-->