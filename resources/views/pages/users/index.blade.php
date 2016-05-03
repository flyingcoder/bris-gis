@extends('layouts.app')

@include('pages.users.add_admin_modal')
@include('pages.users.add_modal')

@section('main-content')
  <section class="content-header">
          <h1>
            Authorized Users
          </h1>     
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <div class="col-xs-3">   
                      <h3 class="box-title">List of Admins</h3>
                    </div>
                    <div class="col-xs-0">
                      <a data-toggle="modal" data-target="#add-admin" class="btn btn-primary btn-sm pull-right">
                          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
                          Add Admin
                      </a>
                    </div>                  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                     <thead>
                       <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th><center>Edit</center></th>
                          <th><center>Delete</center></th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    @if($user->capability == 'Admin')
                      <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->first_name}} {{$user->last_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <center>
                              <a href="#" data-toggle="modal" data-target="#{{$user->id}}edit-user" >
                                <span class="glyphicon glyphicon-edit text-info" aria-hidden="true"></span>
                              </a>
                            </center>
                        </td>
                        <td>
                            <center>
                              <a href="#" data-toggle="modal" data-target="#{{$user->id}}delete-user" >
                                <span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>
                              </a>
                            </center>
                        </td>
                      </tr>                               
                    @include('pages.users.delete_modal')
                    @include('pages.users.edit_modal')
                    @endif
                    @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th><center>Edit</center></th>
                        <th><center>Delete</center></th>
                      </tr>
                   </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <div class="col-xs-3">   
                      <h3 class="box-title">List of Users</h3>
                    </div>
                    <div class="col-xs-0">
                      <a data-toggle="modal" data-target="#add-user" class="btn btn-primary btn-sm pull-right">
                          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
                          Add User
                      </a>
                    </div>                  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-striped">
                     <thead>
                       <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Province</th>
                          <th>Municipality</th>
                          <th>Barangay</th>
                          <th><center>Edit</center></th>
                          <th><center>Delete</center></th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                     @if($user->capability == 'User')
                      <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->first_name}} {{$user->last_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->barangayAdmin->barangay->municipality->province->name}}</td>
                        <td>{{$user->barangayAdmin->barangay->municipality->name}}</td>
                        <td>{{$user->barangayAdmin->barangay->name}}</td>
                        <td>
                            <center>
                              <a href="#" data-toggle="modal" data-target="#{{$user->id}}edit-user" >
                                <span class="glyphicon glyphicon-edit text-info" aria-hidden="true"></span>
                              </a>
                            </center>
                        </td>
                        <td>
                            <center>
                              <a href="#" data-toggle="modal" data-target="#{{$user->id}}delete-user" >
                                <span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>
                              </a>
                            </center>
                        </td>
                      </tr>                               
                    @include('pages.users.delete_modal')
                    @include('pages.users.edit_modal')
                    @endif
                    @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                          <th>Province</th>
                          <th>Municipality</th>
                          <th>Barangay</th>
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
        $("#example1").DataTable({
          "scrollX": true
        });
        $("#example2").DataTable({
          "scrollX": true
        });
      });
    </script>


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

@endsection