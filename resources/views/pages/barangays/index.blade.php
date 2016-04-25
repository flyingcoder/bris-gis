@extends('layouts.app')

@include('pages.barangays.add_modal')

@section('main-content')
  <section class="content-header">
          <h1>
            {{$municipality->province->name}} - {{$municipality ->name}}
          </h1>      
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header">
                    <div class="col-md-3">   
                      <h3 class="box-title">List of Barangays</h3>
                    </div>
                    <div class="col-md-0">
                      <button data-toggle="modal" data-target="#add-barangay" style="float: right;" class="btn btn-primary btn-sm" id="add-button">
                          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
                          Add Barangay
                      </button>
                    </div>                  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="barangay-list" class="table table-bordered table-striped">
                     <thead>
                       <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th><center>Delete</center></th>
                      </tr>
                    </thead>
                    @foreach($municipality->barangays as $barangay)
                      <tr>
                        <td>{{$barangay->id}}</td>
                        <td><a href="{{route('barangays.show', $barangay->id)}}"> {{$barangay->name}} </a></td>
                        <td>
                            <center>
                              <a href="#" data-toggle="modal" data-target="#{{$barangay->id}}delete-barangay" >
                                <span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>
                              </a>
                            </center>
                        </td>
                      </tr>                               
                    @include('pages.barangays.delete_modal')
                    @include('pages.barangays.edit_modal')

                    @endforeach

                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
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
        $("#barangay-list").DataTable();
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


@endsection