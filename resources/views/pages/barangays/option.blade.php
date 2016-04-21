@extends('layouts.app')

@section('main-content')
  <section class="content-header">
          <h1>
            Barangay
          </h1>      
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-5">
            <div class="box">
                <div class="box-header">
                  <div class="col-md-5">   
                          <h3 class="box-title">Options</h3>
                        </div>
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
                         <div class="col-md-0">
                           <a onclick="showBarangays()" class="btn btn-primary btn-sm pull-right">
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
        $.get("{{route('provinces.create')}}",
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
function showBarangays(){

window.location = '/municipalities/' + $('#municipality-list').val();
}

</script>


@endsection