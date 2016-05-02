@extends('layouts.app')

@section('htmlheader_title')
  Barangay Profile
@endsection

@include('pages.barangays.edit_modal')
@include('pages.barangays.delete_modal')

@section('main-content')
  <section class="content-header">
          <h1>
              <a href="{{ route('barangays.get', $barangay->municipality->id ) }}">
                  <span class="fa fa-reply"></span>
              </a> Barangay
          </h1>       
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
          	<div class="col-md-4">
            		<div class="box">
                		<div class="box-header">
                  			<div class="col-xs-9">   
                            <h1 class="box-title"><strong>{{$barangay->name}}</strong></h1>
                        </div>
                        <div class="col-xs-3">
                            <h1 class="box-title"><strong>ID: {{$barangay->id}}</strong></h1>
                        </div>
                		 </div>

                     <div class="box-body">
                        <div class="form-group row">
                          <div class="col-md-2 col-md-offset-7">
                              <a data-toggle="modal" data-target="#{{$barangay->id}}edit-barangay" class="btn btn-primary btn-xs ">
                                  <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> 
                                  Edit
                              </a>
                          </div> 
                          <div class="col-md-1" style="margin-left: 2px;">
                              <a data-toggle="modal" data-target="#{{$barangay->id}}delete-barangay" class="btn btn-danger btn-xs ">
                                  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> 
                                  Delete
                              </a>
                          </div>
                        </div>
                     </div>
                   	 <div class="box-body">
                     			 <div class="form-group row">
                       				 <label class="col-md-3 control-label">Province</label>
                           			<div class="col-md-9">
                                      <input type="text" class="form-control" name="name" value="{{$barangay->municipality->province->name}}" required disabled>
                                </div>

                     		     </div>

                     		     <div class="form-group row">
                         			 <label class="col-md-3 control-label">Municipality</label>                            		
                               		<div class="col-md-9">
                                        <input type="text" class="form-control" name="name" value="{{$barangay->municipality->name}}" required disabled>
                                  </div>                         			
                      			 </div>
                  		</div>


                      <div class="box-body">
                            <div class="form-group row">
                               <label class="col-md-5 control-label">Flood Hazards</label>
                            </div>
                            <div class="form-group row">
                              <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{route('floodMaps.importfloodmap')}}">
                              <input type="hidden" name="_token" value="{{csrf_token()}}">
                              <input type="hidden" name="barangay_id" value="{{$barangay->id}}">
                              <div class="col-md-6">
                                    <input name="csv_flood" type="file" id="csv-flood" accept=".csv"/>
                                </div>
                                <div class="col-md-3 col-md-offset-3">
                                  <button type='submit' class="btn btn-primary btn-xs"> <span class="glyphicon glyphicon-saved"></span>Submit</button>
                                </div>
                              </form>
                            </div>

                            <br>
                            <div class="form-group row">
                               <label class="col-md-5 control-label">Purok Boundaries</label>
                            </div>
                            <div class="form-group row">
                              <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{route('puroks.importboundary')}}">
                              <input type="hidden" name="_token" value="{{csrf_token()}}">
                              <input type="hidden" name="barangay_id" value="{{$barangay->id}}">
                              <div class="col-md-6">
                                    <input name="csv_boundary" type="file" id="csv-boundary" accept=".csv"/>
                                </div>
                                <div class="col-md-3 col-md-offset-3">
                                  <button type='submit' class="btn btn-primary btn-xs"> <span class="glyphicon glyphicon-saved"></span>Submit</button>
                                </div>
                              </form>
                            </div>                        
                      </div>

           			 </div>
    		    </div>	

            <!--Flood Maps-->
            <div class="col-md-8">
              <div class="box">
                <div class="box-header">
                    <div class="col-md-3">   
                      <h3 class="box-title">Flood Maps</h3>
                    </div>                     
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-striped">
                     <thead>
                       <tr>
                          <th>ID</th>
                          <th>Level</th>
                          <th><center>Return Period</center></th>
                          <th><center>Delete</center></th>
                          <th><center>Preview</center></th>
                      </tr>
                    </thead>
                    <tbody>


                    @foreach($barangay->floodMaps as $floodMap)
                      <tr>
                        <td>{{$floodMap->id}}</td>
                        <td>{{$floodMap->level}}</td>
                        <td><center>{{$floodMap->return_period}}</center></td>
                        <td>
                            <center>
                              <a href="#" data-toggle="modal" data-target="#{{$floodMap->id}}delete-flood" >
                                <span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>
                              </a>
                            </center>
                        </td>
                        <td>
                            <center>
                              <a href="#" data-toggle="modal" data-target="#preview-flood" onclick="showFloodMap({{$floodMap->id}})" id="flood_id" value="{{$floodMap->id}}">
                                <span class="glyphicon glyphicon-map-marker text-success" aria-hidden="true"></span>
                              </a>
                            </center>
                        </td>
                      </tr> 

                    @include('pages.barangays.floodmaps.delete_modal')
                      @endforeach
                    @include('pages.barangays.floodmaps.preview_modal')

                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Level</th>
                        <th><center>Return Period</center></th>
                        <th><center>Delete</center></th>
                        <th><center>Preview</center></th>
                      </tr>
                   </tfoot>
                  </table>
                </div><!-- /.box-body -->
                <div class="box-body">
                  <div class="form-group row">
                           <label class="col-md-3 col-md-offset-4 control-label">View by Return Period:</label>
                              <div class="col-md-2">
                                   <select class="form-control" id="return-period">
                                    {{$temp = null}}
                                    @foreach ($barangay->floodMaps as $floodMap)
                                        @if ($temp != $floodMap->return_period)
                                            {{$temp = $floodMap->return_period}}
                                            <option>{{$floodMap->return_period}}</option>
                                        @endif
                                    @endforeach
                                     
                                   </select>                          
                              </div>
                              <div class="col-md-3">
                                      <a  href="#" data-toggle="modal" data-target="#preview-flood" class="btn btn-primary btn-sm" onclick="showFloodMapByReturnPeriod()">
                                          <span class="glyphicon glyphicon-eye-open"></span>
                                          Submit
                                    </a>
                              </div>
                         </div>
                </div>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

          @include('pages.barangays.puroks.add_modal')

          <!--Purok-->
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header">
                    <div class="col-md-3">   
                      <h3 class="box-title">Purok</h3>
                    </div>
                    <div class="col-md-0">
                      <a data-toggle="modal" data-target="#add-purok" class="btn btn-primary btn-sm pull-right">
                          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
                          Add Purok
                      </a>
                    </div>                  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                     <thead>
                       <tr>
                          <th>ID</th>
                          <th>Purok</th>
                          <th>Description</th>
                          <th>President</th>
                          <th>Population</th>
                          <th><center>Edit</center></th>
                          <th><center>Delete</center></th>
                          <th><center>Preview</center></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($barangay->puroks as $purok)
                      <tr>
                        <td>{{$purok->id}}</td>
                        <td>{{$purok->name}}</td>
                        <td>{{$purok->description}}</td>
                        <td>{{$purok->president}}</td>
                        <td>{{$purok->population}}</td>
                        <td>
                            <center>
                              <a href="#" data-toggle="modal" data-target="#{{$purok->id}}edit-purok" >
                                <span class="glyphicon glyphicon-edit text-info" aria-hidden="true"></span>
                              </a>
                            </center>
                        </td>
                        <td>
                            <center>
                              <a href="#" data-toggle="modal" data-target="#{{$purok->id}}delete-purok" >
                                <span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>
                              </a>
                            </center>
                        </td>
                        <td>
                            <center>
                              <a href="#" data-toggle="modal" data-target="#preview-flood" onclick="showBoundaryMap({{$purok->id}})" id="boundary_id" value="{{$purok->id}}">
                                <span class="glyphicon glyphicon-map-marker text-success" aria-hidden="true"></span>
                              </a>
                            </center>
                        </td>
                      </tr>
                     @include('pages.barangays.puroks.delete_modal')
                     @include('pages.barangays.puroks.edit_modal')

                     @endforeach

                     @include('pages.barangays.puroks.preview_modal')

                    <tfoot>
                      <tr>
                        <th>ID</th>
                          <th>Purok</th>
                          <th>Description</th>
                          <th>President</th>
                          <th>Population</th>
                          <th><center>Edit</center></th>
                          <th><center>Delete</center></th>
                          <th><center>Preview</center></th>
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
    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable();
      });
    </script>


<script src="http://maps.googleapis.com/maps/api/js"></script>
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
 var polys = [];
 var floods = [];

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

 function setFloodOnMapAll(map) {
  for (var i = 0; i < floods.length; i++) {
    floods[i].setMap(map);
  }
}

function parsePolyStrings(ps) {
    var i, j, lat, lng, tmp, tmpArr,
        arr = [],
        //match '(' and ')' plus contents between them which contain anything other than '(' or ')'
        m = ps.match(/\([^\(\)]+\)/g);
    if (m !== null) {
        for (i = 0; i < m.length; i++) {
            //match all numeric strings
            tmp = m[i].match(/-?\d+\.?\d*/g);
            if (tmp !== null) {
                //convert all the coordinate sets in tmp from strings to Numbers and convert to LatLng objects
                for (j = 0, tmpArr = []; j < tmp.length; j+=2) {
                    lng = Number(tmp[j]);
                    lat = Number(tmp[j + 1]);
                    tmpArr.push(new google.maps.LatLng(lat, lng));
                    var pt = new google.maps.LatLng(lat, lng);
                    bounds.extend(pt);
                }
                arr.push(tmpArr);
            }
        }
    }

    map.fitBounds(bounds);

            var zoom = map.getZoom();
            map.setZoom(zoom > 16 ? 16 : zoom);
    //array of arrays of LatLng objects, or empty array
    return arr;
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
function showFloodMap(val){
$(document).ready(function(){ 

      setFloodOnMapAll(null);
      floods = [];
      center = null;
      temp = null;
      bounds = new google.maps.LatLngBounds();

        $.get("{{route('floodMaps.index')}}",
          { floodMap_id: val }, 
          function(data) {
                  floods.push(data.shape);

                for (i = 0; i < floods.length; i++) {
                    tmp = parsePolyStrings(floods[i]);
                    if (tmp.length) {
                        floods[i] = new google.maps.Polygon({
                            paths : tmp,
                            strokeColor : '#ff0000',
                            strokeOpacity : 1,
                            strokeWeight : 1,
                            fillColor : '#ff0000',
                            fillOpacity : 1
                        });
                        floods[i].setMap(map);
                    }
                }
        
        });
$('#preview-flood').on('shown.bs.modal', function(){
            google.maps.event.trigger(map, 'resize')
            });
      
  });
}
</script>

<script type="text/javascript">
function showFloodMapByReturnPeriod(){
$(document).ready(function(){ 
      var return_period = $('#return-period').val()
      setFloodOnMapAll(null);
      floods = [];
      center = null;
      temp = null;
      var levels = [];
      bounds = new google.maps.LatLngBounds();

        $.get("{{route('floodMaps.show',  $barangay->id )}}",
          { floodMap_level: return_period }, 
          function(data) {
          $.each(data.flood_maps, function(index, element) {

              floods.push(element.shape); 
              levels.push(element.level);        
            });
                  
          var colors = ['#ffffff', '#ffff00','#ff6600','#ff0000'];

                for (i = 0; i < floods.length; i++) {

                    tmp = parsePolyStrings(floods[i]);
                    if (tmp.length) {
                        floods[i] = new google.maps.Polygon({
                            paths : tmp,
                            strokeColor : colors[levels[i]],
                            strokeOpacity : 1,
                            strokeWeight : 1,
                            fillColor : colors[levels[i]],
                            fillOpacity : 1
                        });
                        floods[i].setMap(map);
                    }
                }
        });
$('#preview-flood').on('shown.bs.modal', function(){
            google.maps.event.trigger(map, 'resize');
            });
      
  });
}
</script>

<script type="text/javascript">
// Speed up calls to hasOwnProperty
var hasOwnProperty = Object.prototype.hasOwnProperty;

function isEmpty(obj) {

    // null and undefined are "empty"
    if (obj == null) return true;

    // Assume if it has a length property with a non-zero value
    // that that property is correct.
    if (obj.length > 0)    return false;
    if (obj.length === 0)  return true;

    // Otherwise, does it have any properties of its own?
    // Note that this doesn't handle
    // toString and valueOf enumeration bugs in IE < 9
    for (var key in obj) {
        if (hasOwnProperty.call(obj, key)) return false;
    }

    return true;
}



function showBoundaryMap(val){

$(document).ready(function(){ 

      setFloodOnMapAll(null);
      floods = [];
      center = null;
      temp = null;
      bounds = new google.maps.LatLngBounds();

        $.get("{{route('puroks.show', $barangay->id)}}",
          { purok_id: val }, 
          function(data) {
            if(!(isEmpty(data))){
                  floods.push(data.shape);

                for (i = 0; i < floods.length; i++) {
                    tmp = parsePolyStrings(floods[i]);
                    if (tmp.length) {
                        floods[i] = new google.maps.Polygon({
                              paths : tmp,
                              strokeColor : '#000000',
                              strokeOpacity : 1,
                              strokeWeight : 1.5,
                              fillColor : '#FFFFFF',
                              fillOpacity : 0
                        });
                        floods[i].setMap(map);
                    }
                }

        }else{
          alert("No Map Data!");
        }

        });

      $('#preview-flood').on('shown.bs.modal', function(){
                        google.maps.event.trigger(map, 'resize');

            });
  });
}
</script>
@endsection







