@extends('layouts.app')

@include('pages.barangays.add_modal')

@section('main-content')
  <section class="content-header">
          <h1>
            Barangay
          </h1>      
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-3">
            <div class="box">
                <div class="box-header">
                  <div class="col-xs-3">   
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
                                   <select class="form-control" id="municipality-list">
                                     <option>Select Municipality</option>
                                   </select>                          
                              </div>
                         </div>
                         <div class="col-md-0">
                           <a data-toggle="modal" data-target="" class="btn btn-primary btn-sm pull-right">
                               <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> 
                                Show
                           </a>
                         </div>
                    </div>
             </div>
        </div>  


            <div class="col-xs-9">
              <div class="box">
                <div class="box-header">
                    <div class="col-xs-3">   
                      <h3 class="box-title">List of Barangays</h3>
                    </div>
                    <div class="col-xs-0">
                      <a data-toggle="modal" data-target="#add-barangay" style="float: right;" class="btn btn-primary btn-sm">
                          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
                          Add Barangay
                      </a>
                    </div>                  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                     <thead>
                       <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th><center>Edit</center></th>
                          <th><center>Delete</center></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td><a href="{{route('barangays.purokUI')}}">Hinaplanon</a></td>
                        <td>
                            <center>
                              <a href="#" data-toggle="modal" data-target="#edit-barangay" >
                                <span class="glyphicon glyphicon-edit text-info" aria-hidden="true"></span>
                              </a>
                            </center>
                        </td>
                        <td>
                            <center>
                              <a href="#" data-toggle="modal" data-target="#delete-barangay" >
                                <span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>
                              </a>
                            </center>
                        </td>
                      </tr>                               
                    @include('pages.barangays.delete_modal')
                    @include('pages.barangays.edit_modal')
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
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
    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>

<script type="text/javascript">
$(document).ready(function(){ 
        $.get("{{route('provinces.create')}}",
          function(data) {
            console.log(data);
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
          { option: $(this).val() }, 
          function(data) {
            console.log(data);
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


@endsection