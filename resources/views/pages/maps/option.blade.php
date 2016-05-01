@extends('layouts.app')

@section('htmlheader_title')
  Maps Options
@endsection

@section('main-content')
  <section class="content-header">
          <h1>
           <i class='fa fa-map-marker'></i>  Maps 
          </h1>      
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-5">
            <div class="box">
                <div class="box-header">
                  Select a Location
                </div>
                    <div class="box-body">
                       <div class="form-group row">
                           <label class="col-md-4 control-label">Province</label>
                           <br>
                              <div class="col-md-12">
                                  <select class="form-control" id="province-list" style"">
                                     <option >Select Province</option>
                                   </select>                          
                              </div>
                         </div>
                         <div class="form-group row">
                           <label class="col-md-4 control-label">Municipality</label>
                           <br>
                              <div class="col-md-12">
                                   <select class="form-control" name="municipality_id" id="municipality-list">
                                     <option>Select Municipality</option>
                                   </select>                          
                              </div>
                         </div>
                          <div class="form-group row">
                           <label class="col-md-4 control-label">Barangay</label>
                           <br>
                              <div class="col-md-12">
                                   <select class="form-control" name="barangay_id" id="barangay-list">
                                     <option>Select Barangay</option>
                                   </select>                          
                              </div>
                         </div>
                         <div class="form-group row">
                           <label class="col-md-4 control-label">Map Type</label>
                           <br>
                              <div class="col-md-12">
                                   <select class="form-control" name="map_type" id="map-type">
                                     <option>Select Map Type</option>
                                     <option value = 'flood_map'>Flood Map</option>
                                     <option value = 'population_map'>Population Map</option>

                                   </select>                          
                              </div>
                         </div>
                         <div class="col-md-0">
                           <a onclick="showMaps()" class="btn btn-primary btn-sm pull-right">
                               <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> 
                                Show
                           </a>
                         </div>
                    </div>
             </div>
        </div>  


          </div><!-- /.row -->
        </section><!-- /.content -->
@endsection

@section('page-script')


<script type="text/javascript">
$(document).ready(function(){ 
        $.get("{{route('provinces.get')}}",
          function(data) {
            var provinces = $('#province-list');
            provinces.empty();
            provinces.append("<option>Select Province</option>");
          $.each(data, function(index, element) {
                  provinces.append("<option value='"+ element.id +"'>" + element.name + "</option>");
          });
        });
    
  });
</script>


<script type="text/javascript">
$(document).ready(function(){ 
    $('#province-list').on('change', function(){
        $.get("{{route('municipalities.index')}}",
          { province_id: $(this).val() }, 
          function(data) {
            var municipalities = $('#municipality-list');
            municipalities.empty();
            municipalities.append("<option>Select Municipality</option>");
          $.each(data, function(index, element) {
                  municipalities.append("<option value='"+ element.id +"'>" + element.name + "</option>");
          });
        });
    });
  });
</script>

<script type="text/javascript">
$(document).ready(function(){ 
    $('#municipality-list').on('change', function(){
        $.get("{{route('barangays.index')}}",
          { municipality_id: $(this).val() }, 
          function(data) {
            var barangays = $('#barangay-list');
            barangays.empty();
            barangays.append("<option>Select Barangay</option>");
          $.each(data, function(index, element) {
                  barangays.append("<option value='"+ element.id +"'>" + element.name + "</option>");
          });
        });
    });
  });
</script>


<script type="text/javascript">
function showMaps(){
window.location = '/barangays/' + $('#barangay-list').val() +'/maps/' + $('#map-type').val();
}
</script>

@endsection
