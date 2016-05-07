@extends('layouts.app')

@section('htmlheader_title')
  Disasters
@endsection

@section('main-content')
  <section class="content-header">
  	<div class="col-md-8 col-md-offset-2">
          <h3>
            Disasters
          </h3> 
    </div>     
        </section>
        <!-- Main content -->
   <form class="form-horizontal" method="post" action="{{route('disasters.addDisasters')}}">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <input type="hidden" name="barangay_id" value="{{$barangay_id}}">
   <section class="content">
       <div class="row">
           <div class="col-md-8 col-md-offset-2">
            <div class="box">
                <div class="box-header">
                	<div class="col-xs-3">   
                          <h3 class="box-title">Information</h3>
                   </div>
                </div>
                    <div class="box-body">
                    	 <div class="col-md-12 form-group row">
				              <div class="col-md-5 col-md-offset-1">
				              <label for="TypeInput">Type of Disaster</label>
				              	<div class="input-group">
				              		 <span class="input-group-addon"><i class="fa fa-bolt"></i></span>                       	  	
                           <select class="form-control " name="type" id="type" required>
                                  <option value="Flood">Flood</option>
                                 <option value="Fire Incident">Fire Incident</option>
                          </select>
      				  				</div>
				              </div>
				              <div class="col-md-5">
				              <label for="TypeInput">Date</label>   			              
				             	 <div class="input-group">
                              	  	 <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				  					 <input type="date" class="form-control" name="year" id="date" required>
                     			  </div> 
				              </div>
				         </div>   
                  <div class="col-md-12 form-group row">
                      <div class="col-md-10 col-md-offset-1">
                            <label>Description</label>   
                         <input type="text" class="form-control" name="description" placeholder="Enter Description">
                     </div>        
                 </div>         
                 <div class="col-md-12 form-group row">
                      <div class="col-md-10 col-md-offset-1">
                      	<label>Search for Household</label>   
                         <div class="input-group">
          			   	   <span class="input-group-addon"><i class="fa fa-search"></i></span>
          				   <input type="text" class="form-control" id="household-name" placeholder="Enter Household">
         				 </div>                     
                              </div> 
                         </div>
                    </div>
                </div>
         	 </div>  
        </div>
   </section>

	<section class="content">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="box">
                <div class="box-header">
                	<div class="col-md-12">   
                          <h3 class="box-title">Affected Households</h3>
                   </div>                    
                </div>
                <div class="box-body">
                <select style="display:none;" name="households[]" multiple="multiple" id="households" required></select>
                <table id="household-list" name="household_list" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Household</th>
                        <th>Purok</th>
                        <th>Structure</th>
                        <th><center>Remove</center></th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                      <tr>                        
                        <th>ID</th>
                        <th>Household</th>
                        <th>Purok</th>
                        <th>Structure</th>
                        <th><center>Remove</center></th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
                <div class="box-body">
                  <div class="form-group row">
                      <div class="col-md-2 col-md-offset-10">
                           <button type="submit" class="btn btn-primary btn-block">Submit</button>
                      </div>
                  </div>
                </div>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
       </section>
       </form>
@endsection

@section('page-script')
    <!-- DataTables -->
    <script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <!-- page script -->
    <script>
      $(function () {
        $('#household-list').DataTable({
          "paging": false,
          "scrollX": true,
          "lengthChange": false,
          "searching": false,
          "ordering": false,
          "info": true,
          "autoWidth": true
        });
      });
    </script>


<script type="text/javascript">

    var households = [];    
        
    $(document).ready(function(){ 
      $('#household-name').autocomplete({
            source: function( request, response ) {
            $.get("{{route('households.getDetails', $barangay_id)}}",
              { household_name: $('#household-name').val() }, 
              function( data ) {
                response( 
                    $.map(data, function(item) {
                        return {
                          value: item.name,
                          label: item.name,
                          data: item
                        }
                }));
            });

            },
            autoFocus: true,
            minLength: 0,

            select: function( event, ui ) {
              var building = ui.item.data;
              $("#households").append("<option value='"+ building.id +"' selected>" + building.name + "</option>");
              $("#household-list").dataTable().fnAddData([
                                building.id,
                                building.b_name,
                                building.p_name + ' ' + building.description,
                                building.structure,
                                "<center><button class='deletehousehold' style='background:transparent; border:0 !important;'><span class='glyphicon glyphicon-remove text-danger' aria-hidden='true'></span></button></center>"
                            ]);
              $("#household-name").val("");
              return false;
            }  

          });
      });

      $(document).ready(function() {

          var table = $('#household-list').DataTable();
           
              $('#household-list tbody').on( 'click', 'tr', function () {
                  if ( $(this).hasClass('selected') ) {
                      $(this).removeClass('selected');
                  }
                  else {
                      table.$('tr.selected').removeClass('selected');
                      $(this).addClass('selected');
                  }

                  $(document).on("click", ".deletehousehold", function(){
                    var tabledata = table.row('.selected').data();
                    $("#households option[value='"+tabledata[0]+"']").remove();
                    table.row('.selected').remove().draw( false );
                 });
              } );
 
           

        });

       
    </script>
@endsection