@extends('layouts.app')

@section('htmlheader_title')
  Health
@endsection

@section('main-content')
  <section class="content-header">
  	<div class="col-md-8 col-md-offset-2">
          <h3>
            Health
          </h3> 
    </div>     
        </section>
        <!-- Main content -->
   <form class="form-horizontal" method="post" action="{{route('diseases.addDiseases')}}">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <input type="hidden" name="barangay_id" value="{{$barangay_id}}">
   <section class="content">
       <div class="row">
           <div class="col-md-8 col-md-offset-2">
            <div class="box">
                <div class="box-header">
                	<div class="col-sm-5">   
                          <h3 class="box-title">Disease Outbreak Information</h3>
                   </div>
             
                </div>
                    <div class="box-body">
                    	<div class="col-md-12 form-group row">
      				              <div class="col-md-5  col-md-offset-1">
          				              <label for="TypeInput">Type of Disease</label>
                                <div class="input-group">
                                   <span class="input-group-addon"><i class="fa fa-ambulance"></i></span>                       	  	
          				  					     <input type="text" class="form-control" name="type" placeholder="Ex.Dengue" required>
                                </div>
      				              </div>
      				              <div class="col-md-5">
          				              <label for="TypeInput">Date</label>   			              
          				              <div class="input-group">
                                   <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
          				  				       <input type="date" class="form-control" name="year" required>
                               	</div> 
      				              </div>
				              </div>
                      <div class="col-md-12 form-group row">
                      <div class="col-md-10 col-md-offset-1">
                        <label>Search for Resident</label>   
                         <div class="input-group">
                       <span class="input-group-addon"><i class="fa fa-search"></i></span>
                     <input type="text" class="form-control" id="resident-name" placeholder="Enter Resident Name">
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
                	<div class="col-md-4">   
                          <h3 class="box-title">Affected Residents</h3>
                   </div>                    
                </div>
                <div class="box-body">
                <select style="display:none;" name="residents[]" multiple="multiple" id="residents" required></select>
                <table id="resident-list" name="resident_list" class="table table-bordered table-hover">
                     <thead>
                       <tr>
                       	  <th>ID</th>
                          <th>Name</th>
                          <th><center>Remove</center></th>
                      
                      </tr>
                    </thead>
                    <tbody>                          
                    </tbody>
                    <tfoot>
                      <tr>
                          <th>ID</th>
                          <th>Name</th>
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
        $('#resident-list').DataTable({
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

    $(document).ready(function(){ 
      $('#resident-name').autocomplete({
            source: function( request, response ) {
            $.get("{{route('residents.getDetails', 1)}}",
              { resident_name: $('#resident-name').val() }, 
              function( data ) {
                response( 
                    $.map(data, function(item) {
                        return {
                          value: item.first_name +' '+item.last_name,
                          label: item.first_name +' '+item.last_name,
                          data: item
                        }
                }));
            });

            },
            autoFocus: true,
            minLength: 0,

            select: function( event, ui ) {
              var resident = ui.item.data;
              $("#residents").append("<option value='"+ resident.id +"' selected>" + resident.first_name + "</option>");
              $("#resident-list").dataTable().fnAddData([
                                resident.id,
                                resident.first_name +' '+resident.last_name,
                                "<center><button class='deleteResident' style='background:transparent; border:0 !important;'><span class='glyphicon glyphicon-remove text-danger' aria-hidden='true'></span></button></center>"
                            ]);
              $("#resident-name").val("");
              return false;
            }  

          });
      });

      $(document).ready(function() {

          var table = $('#resident-list').DataTable();
           
              $('#resident-list tbody').on( 'click', 'tr', function () {
                  if ( $(this).hasClass('selected') ) {
                      $(this).removeClass('selected');
                  }
                  else {
                      table.$('tr.selected').removeClass('selected');
                      $(this).addClass('selected');
                  }

                  $(document).on("click", ".deleteResident", function(){
                    var tabledata = table.row('.selected').data();
                    $("#residents option[value='"+tabledata[0]+"']").remove();
                    table.row('.selected').remove().draw( false );
                 });
              } );
 
           

        });

       
    </script>
@endsection