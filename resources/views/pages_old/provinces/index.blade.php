@extends('layouts.app')

@section('htmlheader_title')
	Provinces
@endsection

@include('pages.provinces.add_modal')

@section('main-content')
  <div class="row">

    <!-- Table Content -->
      
    <div class="col-lg-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2>
              List of Provinces
            <a data-toggle="modal" data-target="#add-province" style="float: right;" class="btn btn-primary">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
                Add Province
            </a>
          </h2>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th><center>Edit</center></th>
                  <th><center>Delete</center></th>
                </tr>
              </thead>
              <tbody>

              @foreach($provinces as $province)
                <tr>
                  <td>{{$province->id}}</td>
                  <td><a href="{{route('provinces.show', $province->id)}}"> {{$province->name}} </a></td>
                  <td>
                    <center>
                      <a href="#" data-toggle="modal" data-target="#{{$province->id}}edit-province" >
                        <span class="glyphicon glyphicon-edit text-black" aria-hidden="true"></span>
                      </a>
                    </center>
                  </td>
                  <td>
                    <center>
                      <a href="#" data-toggle="modal" data-target="#{{$province->id}}delete-province" >
                        <span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>
                      </a>
                    </center>
                  </td>
                </tr>

                @include('pages.provinces.edit_modal')
                @include('pages.provinces.delete_modal')

              @endforeach

              </tbody>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th><center>Edit</center></th>
                  <th><center>Delete</center></th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
