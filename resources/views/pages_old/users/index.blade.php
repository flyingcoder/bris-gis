@extends('layouts.app')

@section('htmlheader_title')
	Users
@endsection

@include('pages.users.add_modal')

@section('main-content')
  <div class="col-lg-12">
      <h1 class="page-header">
          List of Users
      <a data-toggle="modal" data-target="#add-user" style="float: right;" class="btn btn-primary">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
          Add User
      </a>
      </h1>
  </div>

<!-- Table Content -->
  <div class="row">
      <div class="col-lg-12">
          <div class="table-responsive">
              <table class="table table-bordered table-hover table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Full Name</th>
                    <th>E-mail</th>
                    <th><center>Edit</center></th>
                    <th><center>Password</center></th>
                    <th><center>Delete</center></th>
                  </tr>
                </thead>
                <tbody>

                @foreach($users as $user)
                  <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->first_name}} {{$user->last_name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                      <center>
                        <a href="#" data-toggle="modal" data-target="#{{$user->id}}edit-user">
                          <span class="glyphicon glyphicon-edit text-black" aria-hidden="true"></span>
                        </a>
                      </center>
                    </td>
                    <td>
                      <center>
                        <a href="#" data-toggle="modal" data-target="#{{$user->id}}change-password">
                          <span class="glyphicon glyphicon-cog text-black" aria-hidden="true"></span>
                        </a>
                      </center>
                    </td>
                    <td>
                      <center>
                        <a href="#" data-toggle="modal" data-target="#{{$user->id}}delete-user">
                          <span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>
                        </a>
                      </center>
                    </td>
                  </tr>
                  
                  @include('pages.users.edit_modal')
                  @include('pages.users.delete_modal')
                  
                @endforeach

                </tbody>
                <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Full Name</th>
                    <th>E-mail</th>
                    <th><center>Edit</center></th>
                    <th><center>Password</center></th>
                    <th><center>Delete</center></th>
                  </tr>
                </tfoot>
              </table>
          </div>
      </div>
  </div>
  <!-- /.row -->

@endsection