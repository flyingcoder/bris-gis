@extends('layouts.app')
@section('htmlheader_title')
  Disaster
@endsection

<head>
<script src="https://maps.googleapis.com/maps/api/js?&libraries=visualization"  type="text/javascript"></script>
<script>
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
</head>

@section('main-content')

<section class="content">
 <div class="row">
               <div class="col-md-3">
                    <div class="box">
                         <div class="box-header">
                          <div class="col-md-12">   
                           <h3 class="box-title">Household Informations</h3>
                        </div>
                         </div>
                             <div class="box-body">
                                    <div class="form-group row">
                                          <div class="col-md-12">
                                              <label>Location: {{$barangay->municipality->province->name}} - {{$barangay->municipality->name}} - {{$barangay->name}}</label>

                                          </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                                <button  id="go" type="button" class="btn btn-primary btn-block" btn-sm onclick="enable()">Show Households</button>
                                        </div>
                                 </div>

                            </div>
                     </div>

                     <div class="box">
                         <div class="box-header">
                        	<div class="col-md-12">   
                     			 <h3 class="box-title">Options</h3>
                  			</div>
                         </div>
                             <div class="box-body"> 
                             <div class="form-group row">
                                      <label class="col-md-3   control-label">Toggle</label>
                                          <div class="col-md-9">
                                              <div class="btn-group btn-group-sm">
                                                   <button onclick="toggleHeatmap()" id="toggle-heatmap" type="button" class="btn btn-primary" disabled>Heatmap</button>
                                                   <button onclick="toggleBoundary()" id="toggle-boundary" type="button" class="btn btn-primary" disabled>Boundary</button> 
                                              </div>
                                           </div>
                                    </div>                    
                                    <div class="form-group row">
                                      <label class="col-md-5 control-label">Disaster</label>
                                          <div class="col-md-7">
                                              <select class="form-control" id="return1" disabled>
                                                 <option value="flood">Flood</option>
                                              </select>                          
                                          </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                                <button  id="go2" type="button" onclick="enableHealthMaps()" class="btn btn-primary btn-block" btn-sm disabled>GO</button>
                                        </div>
                                 </div>

                            </div>
                     </div>

                </div>

                <div class="col-md-9">
                     <div class="box">
                         <div class="box-header">
                        	<div class="col-xs-4">   
                     			 <h3 class="box-title">Map</h3>
                  			</div>
                         </div>
                             <div class="panel-body">                      
                                 <div id="googleMap"  style="width:100%;height:85%;"></div>
                                    
                            </div>
                     </div>
                </div>                
         </div>

          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Households</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="household-list" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Household</th>
                        <th>Usage</th>
                        <th>Structure</th>
                        <th>Purok</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                      <tr>                        
                        <th>ID</th>
                        <th>Household</th>
                        <th>Usage</th>
                        <th>Structure</th>
                        <th>Purok</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
      </section>

@endsection


@section('page-script')
    <!-- DataTables -->
    <script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <!-- page script -->
    <script>
     $("#household-list").DataTable({
           "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
      });
    </script>

<script>
$('#main-body').addClass('sidebar-collapse');               
</script>

<script type="text/javascript">

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

 function setMarkerOnMapAll(map) {
  for (var i = 0; i < markerArray.length; i++) {
    markerArray[i].setMap(map);
  }
}

 function setBoundaryOnMapAll(map) {
  for (var i = 0; i < polys.length; i++) {
    polys[i].setMap(map);
  }
}

 function setFloodOnMapAll(map) {
  for (var i = 0; i < floods.length; i++) {
    floods[i].setMap(map);
  }
}

function setIcon(marker_icon)
{
     icon = new google.maps.MarkerImage(marker_icon,
     new google.maps.Size(10, 10), 
     new google.maps.Point(0, 0),
     new google.maps.Point(5,5));
}

       function toggleHeatmap() {
        heatmap.setMap(heatmap.getMap() ? null : map);

            if (markerArray[0].getMap() != null) {
                var arg = null;
            } else {
                var arg = map;
            }
            for (var i = 0; i < markerArray.length; i++) {
                markerArray[i].setMap(arg);
            }

            var arg = null;
            
            for (var i = 0; i < polys.length; i++) {
                polys[i].setMap(arg);
            }

            var arg = null;
            
            for (var i = 0; i < floods.length; i++) {
                floods[i].setMap(arg);
            }
      }

      function toggleBoundary() {
            

            var arg = map;
            
            for (var i = 0; i < markerArray.length; i++) {
                markerArray[i].setMap(arg);
            }

            if (polys!==null && polys.length!== 0){

                if (polys[0].getMap() != null) {
                    var arg = null;
                } else {
                    var arg = map;
                }
            }

            for (var i = 0; i < polys.length; i++) {
                polys[i].setMap(arg);
            }

            heatmap.setMap(null);
      }

      function toggleFloodHazard() {
            
            var arg = map;
            
            for (var i = 0; i < markerArray.length; i++) {
                markerArray[i].setMap(arg);
            }

            if (floods[0].getMap() != null) {
                var arg = null;
            } else {
                var arg = map;
            }
            for (var i = 0; i < floods.length; i++) {
                floods[i].setMap(arg);
            }

            heatmap.setMap(null);

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
    //array of arrays of LatLng objects, or empty array
    return arr;
}



</script>

 <script type="text/javascript">
    function enable() {
          document.getElementById("return1").disabled=false;
          document.getElementById("go2").disabled=false;
          document.getElementById("toggle-heatmap").disabled=false;
          document.getElementById("toggle-boundary").disabled=false;

      $(function(){

          $.get("{{route('maps.getHouseholds', $barangay->id)}}",
            function(data){

              if(data!==null && data.length!== 0)
              {

                  setMarkerOnMapAll(null);
                  markerArray = [];
                  center = null;
                  temp = null;
                  bounds = new google.maps.LatLngBounds();
                  setIcon("https://lh6.ggpht.com/GO-A_KjZDF9yJeeER2fajzO4MgqML-q2rccm27ynBlD6R-xOR3pJOb42WKfE0MNFtRsKwK4=w9-h9");

                   $.each(data, function(index, element) {
                      var h_name = element.h_name;
                      var h_id = element.h_id;
                      var info = "<b>" + h_id + "</b><br/>" + h_name;
                      addMarker(element.lat, element.lon, info);
                      addPoint(element.lat, element.lon);
                    });

                    center = bounds.getCenter();
                    map.fitBounds(bounds);
              }
            });

      });

    $.get("{{route('maps.getBoundary', $barangay->id)}}",
        function(data){
              
              if(data!==null && data.length!== 0)
              {
                  setBoundaryOnMapAll(null);
                  polys = [];

                   $.each(data, function(index, element) {
                        polys.push(element.shape_boundary);
                    });

                   for (i = 0; i < polys.length; i++) {
                      tmp = parsePolyStrings(polys[i]);
                      if (tmp.length) {
                          polys[i] = new google.maps.Polygon({
                              paths : tmp,
                              strokeColor : '#000000',
                              strokeOpacity : 0.6,
                              strokeWeight : 1,
                              fillColor : '#FFFFFF',
                              fillOpacity : 0
                          });
                          polys[i].setMap(null);
                      }
                    }

              }
            }
        );

      heatmap = new google.maps.visualization.HeatmapLayer({
                      data: getPoints(),
                      map: null
                    });

  } 
 </script>

<script>
        function enableHealthMaps() {
            var type = document.getElementById("return1").value;

      $(function(){

          $.get("{{route('maps.getDisaster', $barangay->id)}}",
            {type: type},
            function(data){
              if(data!==null && data.length!== 0)
              {

                  setMarkerOnMapAll(null);
                  markerArray = [];
                  center = null;
                  temp = null;
                  bounds = new google.maps.LatLngBounds();
            latlongs = [];
                  setIcon("https://lh6.ggpht.com/GO-A_KjZDF9yJeeER2fajzO4MgqML-q2rccm27ynBlD6R-xOR3pJOb42WKfE0MNFtRsKwK4=w9-h9");

                   $.each(data, function(index, element) {
                      var h_name = element.h_name;
                      var h_id = element.h_id;
                      var info = "<b>" + h_id + "</b><br/>" + h_name;
                      addMarker(element.lat, element.lon, info);
                      addPoint(element.lat, element.lon);

                      $("#household-list").dataTable().fnAddData([
                                h_id,
                                h_name,
                                element.h_usage,
                                element.h_structure,
                                element.p_name + ' ' + element.p_description
                            ]);

                    });

              }
              heatmap = new google.maps.visualization.HeatmapLayer({
                      data: getPoints(),
                      map: null
                    });
            });

          
      });

  }
  </script>
@endsection