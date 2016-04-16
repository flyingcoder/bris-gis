@extends('layouts.app')
<head>
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
function initialize() {
  var mapProp = {
    center:new google.maps.LatLng(8.22312124,124.22121331),
    zoom:12,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>

@section('main-content')
<div class="row">
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">Map Options</div>
                <div class="panel-body">
                	<div class="form-group row">
                    <label class="col-md-4 control-label">Province</label>
                    <br>
                       <div class="col-md-10">
                        <select class="form-control" id="barangay1">
                           <option>Lanao del Norte</option>
                           <option>2</option>
                           <option>3</option>
                           <option>4</option>
                           </select>                          
                        </div>
                  </div>
                  <div class="form-group row">
                     <label class="col-md-4 control-label">Municipality</label>
                     <br>
                        <div class="col-md-10">
                           <select class="form-control" id="municipality1">
                             <option>Iligan City</option>
                             <option>2</option>
                             <option>3</option>
                             <option>4</option>
                           </select>                          
                        </div>
                  </div>
    			        <div class="form-group row">
                     <label class="col-md-4 control-label">Barangay</label>
                     <br>
                        <div class="col-md-10">
                           <select class="form-control" id="barangay1">
                             <option>Hinaplanon</option>
                             <option>2</option>
                             <option>3</option>
                             <option>4</option>
                           </select>                          
                        </div>
                   </div>
                   <div class="form-group row">
                       <label class="col-md-7 control-label">Flood Maps</label>
                       <br>
                          <div class="col-md-10">
                             <select class="form-control" id="floodmap1">
                               <option>25 years</option>
                               <option>50</option>
                               <option>100</option>
                             </select>                          
                          </div>
                    </div>     
                        <div class="col-md-10">
                            <label class="checkbox">
                                <input type="checkbox" autocomplete="off">Heat Maps
                            </label>
                            <label class="checkbox">
                                <input type="checkbox" autocomplete="off">Boundaries
                          </label>
                     </div>           
    		       </div>
         </div>
    </div>

     <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">Dashboard</div>

            <div class="panel-body">
                <div id="googleMap" style="width:100%;height:85%;"></div>
            </div>
        </div>
    </div>
</div>


@endsection
