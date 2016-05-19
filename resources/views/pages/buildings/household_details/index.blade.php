@extends('layouts.app')

@section('htmlheader_title')
  Household Profile
@endsection

@include('pages.buildings.families.add_modal')

@section('main-content')
  <section class="content-header">
          <h1>
            <a href="{{ route('households.get', $building->purok->barangay->id) }}">
                  <span class="fa fa-reply"></span>
              </a> Household Details
          </h1>      
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
          	<div class="col-md-4">
        		<div class="box">
            		<div class="box-header">
            			  <div class="col-xs-10">   
                      		<h3 class="box-title">Household Information:</h3>
                    </div>
            		</div>
               			<div class="box-body">
                       <div class="form-group row">
                             <div class="col-xs-10 col-xs-offset-2">  
                                  <a data-toggle="modal" data-target="#edit-detail" class="btn btn-primary btn-sm">
                                     <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> 
                                     Edit
                                  </a>
                                  <a data-toggle="modal" data-target="#delete-detail" class="btn btn-danger btn-sm">
                                     <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> 
                                     Delete
                                  </a>
                                  <a data-toggle="modal" data-target="#map-detail" class="btn btn-success btn-sm" id="preview"  onclick="showHousehold( {{$building->latitude}}, {{$building->longitude}}, 'Name: {{$building->name}} <br> Longitude: {{$building->longitude}} <br> Latitude: {{$building->latitude}} <br> Number of Resident: {{$count_resident}}' )">
                                      <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> 
                                      Map
                                  </a>  
                             </div>
                             @include('pages.buildings.household_details.delete_modal')
                             @include('pages.buildings.household_details.preview_modal')
                             @include('pages.buildings.household_details.edit_modal')
                        </div>
                 			  <div class="form-group row">
                     				    <label class="col-md-5">Household Name:</label>
                                <div class="col-md-6">{{$building->name}}</div>
                 		    </div>
                        <div class="form-group row">
                                <label class="col-md-5">Street Address:</label>
                                <div class="col-md-6">{{$building->street}}</div>
                        </div>
                        <div class="form-group row">
                                <label class="col-md-5">Year Constructed:</label>
                                <div class="col-md-6">{{$building->year_constructed}}</div>
                        </div>
                        <div class="form-group row">
                                <label class="col-md-5">Usage:</label>
                                <div class="col-md-6">{{$building->building_usage}}</div>
                        </div>
                        <div class="form-group row">
                                <label class="col-md-5">Net Value:</label>
                                <div class="col-md-6">{{$building->net_value}}</div>
                        </div>
                        <div class="form-group row">
                                <label class="col-md-5">Structure:</label>
                                <div class="col-md-6">{{$building->structure}}</div>
                        </div>
                        <div class="form-group row">
                                <label class="col-md-5">Area:</label>
                                <div class="col-md-6">{{$building->area}}</div>
                        </div>
                        <div class="form-group row">
                                <label class="col-md-5">No. of Stories:</label>
                                <div class="col-md-6">{{$building->no_stories}}</div>
                        </div>
                        <div class="form-group row">
                                <label class="col-md-5">Holding:</label>
                                <div class="col-md-6">{{$building->holding}}</div>
                        </div>
                        @if(!empty($building->householdHead->resident))
                        <div class="box-header">
                            <div class="col-xs-10">   
                               <h3 class="box-title">Household Head Info:</h3>
                            </div>
                        </div>
                        <div class="form-group row">
                                <label class="col-md-5">Name:</label>
                                <div class="col-md-6">{{$building->householdHead->resident->first_name}} {{$building->householdHead->resident->last_name}} </div>
                        </div>
                        <div class="form-group row">
                                <label class="col-md-5">Contact Number:</label>
                                <div class="col-md-6">{{$building->householdHead->resident->contact_number}}</div>
                        </div>
                 		   @endif
              			</div>
       			 </div>
    		</div>	


            <div class="col-md-8">
              <div class="box">
                <div class="box-header">
                    <div class="col-xs-3">   
                      <h3 class="box-title">List of Families</h3>
                    </div>
                    <div class="col-xs-0">
                      <a data-toggle="modal" data-target="#add-family" style="float: right;" class="btn btn-primary btn-sm">
                          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
                          Add Family
                      </a>
                    </div>                  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                     <thead>
                       <tr>
                          <th>ID</th>
                          <th>Family Identifier</th>
                          <th>Monthly Income</th>
                          <th>4ps</th>
                          <th><center>Delete</center></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($building->families as $family)
                      <tr>
                        <td>{{$family->id}}</td>
                        <td><a href="{{route('families.show', $family->id)}}">{{$family->family_identifier}}</a></td>
                        <td>{{$family->monthly_income}}</td>
                        <td>{{$family->if_4ps}}</td>
                        <td>
                            <center>
                              <a href="#" data-toggle="modal" data-target="#{{$family->id}}delete-family" >
                                <span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>
                              </a>
                            </center>
                        </td>
                      </tr>                               
                    @include('pages.buildings.families.delete_modal')
                    @include('pages.buildings.families.edit_modal')

                    @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Family Identifier</th>
                        <th>Monthly Income</th>
                        <th>4ps</th>
                        <th><center>Delete</center></th>
                      </tr>
                   </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->


                      <div class="col-md-8">
              <div class="box">
                <div class="box-header">
                    <div class="col-xs-3">   
                      <h3 class="box-title">List Disasters</h3>
                    </div>
                    <div class="col-xs-0">
                      <a data-toggle="modal" data-target="#add-disaster" style="float: right;" class="btn btn-primary btn-sm">
                          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
                          Add Disaster
                      </a>
                    </div>
                   @include('pages.buildings.disasters.add_modal')            
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-striped">
                     <thead>
                       <tr>
                          <th>ID</th>
                          <th>Type</th>
                          <th>Year</th>
                          <th>Description</th>
                          <th><center>Edit</center></th>
                          <th><center>Delete</center></th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($building->disasters as $disaster)
                      <tr>
                        <td>{{$disaster->id}}</td>
                        <td>{{$disaster->type}}</td>
                        <td>{{$disaster->year}}</td>
                        <td>{{$disaster->description}}</td>
                        <td>
                            <center>
                              <a href="#" data-toggle="modal" data-target="#{{$disaster->id}}edit-disaster" >
                                <span class="glyphicon glyphicon-edit text-info" aria-hidden="true"></span>
                              </a>
                            </center>
                        </td>
                        <td>
                            <center>
                              <a href="#" data-toggle="modal" data-target="#{{$disaster->id}}delete-disaster" >
                                <span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>
                              </a>
                            </center>
                        </td>
                      </tr>                               
                      @include('pages.buildings.disasters.delete_modal')
                      @include('pages.buildings.disasters.edit_modal')

                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Type</th>
                        <th>Year</th>
                        <th>Description</th>
                        <th><center>Edit</center></th>
                        <th><center>Delete</center></th>
                      </tr>
                   </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
@endsection

@section('page-script')
    <!-- DataTables -->
    <script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <!-- page script -->
    <script>
      $(function () {
        document.getElementById("loading").style.display = "none";
        document.getElementById("googleMap").display = "";
        $("#example1").DataTable({
          "scrollX": true
        });
        $('#example2').DataTable({
          "paging": true,
          "scrollX": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>



<script>
var center = null;
 var map = null;
 var icon = null;
 var currentPopup;
 var bounds = new google.maps.LatLngBounds();
 var latlongs = [];
 var markerArray = [];
 var tmp;
 var temp;
 var i;

 function addPoint(lat, lng) {
  var pt = new google.maps.LatLng(lat, lng);
  bounds.extend(pt);
  latlongs.push(pt);
 }

 function getPoints() {
  return latlongs;
 }

 function addMarker(lat, lng, info) {
     var pt = new google.maps.LatLng(lat, lng);
     bounds.extend(pt);

     var marker = new google.maps.Marker({
         position: pt,
         icon: icon,
         map: map
    });
     
     var popup = new google.maps.InfoWindow({
         content: info,
         maxWidth: 300
     });

     google.maps.event.addListener(marker, "click", function() {
         if (currentPopup != null) {
             currentPopup.close();
             currentPopup = null;
         }

         popup.open(map, marker);
         currentPopup = popup;
     });

     google.maps.event.addListener(popup, "closeclick", function() {
         map.panTo(center);
         currentPopup = null;
     });

      markerArray.push(marker);
 }

 function initializeMap() {
     map = new google.maps.Map(document.getElementById("googleMap"), {
         center: new google.maps.LatLng(8.2280,124.2452),
         zoom: 14,
         mapTypeId: google.maps.MapTypeId.ROADMAP,
         mapTypeControl: true,
         mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
         },
         navigationControl: true,
         navigationControlOptions: {
            style: google.maps.NavigationControlStyle.SMALL
         }
     });
 
  }
    google.maps.event.addDomListener(window, 'load', initializeMap);
</script>


<script type="text/javascript">
function showHousehold(lat, lng, info){
$(document).ready(function(){
    if(lat != 0 || lng != 0)
    {
                  addMarker(lat, lng, info);

                  $('#map-detail').on('shown.bs.modal', function(){
                    google.maps.event.trigger(map, 'resize');

                    map.fitBounds(bounds);
                    var zoom = map.getZoom();
                    map.setZoom(zoom > 17 ? 17 : zoom);
                    });

    }else{
          $('#map-detail').on('shown.bs.modal', function(){
             alert("No Map Data!");
             });
        }
});

}
</script>


<script type="text/javascript">
$(document).ready(function(){ 
        $.get("{{route('puroks.get', $building->purok->barangay->id)}}",
          function(data) {
            var puroks = $('#purok-list');
            puroks.empty();
            puroks.append("<option value='{{$building->purok->id}}''>{{$building->purok->name}} {{$building->purok->description}}</option>");
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




@endsection