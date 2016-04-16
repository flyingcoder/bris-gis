@extends('layouts.app')

@section('main-content')

@include('pages.provinces.municipalities.add_modal')

<!-- Page Content -->
<div class="row">

	<div class="col-lg-6">
	  <div class="panel panel-default">
	    <div class="panel-heading">
	      <h2>
	      	{{$province->name}}
            <a data-toggle="modal" data-target="#add-municipality" style="float: right;" class="btn btn-primary">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
                Add Municipality
            </a>
	      </h2>
	    </div>
	    <div class="panel-body">
	      <div class="table-responsive">
	        <table class="table table-bordered tablse-hover table-striped">
	          <thead>
	            <tr>
	              <th>No</th>
	              <th>Name</th>
	              <th>Edit</th>
	              <th><center>Delete</center></th>
	            </tr>
	          </thead>
	          <tbody>

              @foreach($municipalities as $municipality)
                <tr>
                  <td>{{$municipality->id}}</td>
                  <td>{{$municipality->name}}</td>
                  <td>
                    <center>
                      <a href="#" data-toggle="modal" data-target="#{{$municipality->id}}edit-municipality" >
                        <span class="glyphicon glyphicon-edit text-black" aria-hidden="true"></span>
                      </a>
                    </center>
                  </td>
                  <td>
                    <center>
                      <a href="#" data-toggle="modal" data-target="#{{$municipality->id}}delete-municipality" >
                        <span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>
                      </a>
                    </center>
                  </td>
                </tr>

                @include('pages.provinces.municipalities.edit_modal')
                @include('pages.provinces.municipalities.delete_modal')

              @endforeach

	          </tbody>
	          <tfoot>
	            <tr>
	              <th>No</th>
	              <th>Name</th>
	              <th>Edit</th>
	              <th><center>Delete</center></th>
	            </tr>
	          </tfoot>
	        </table>
	      </div>
	    </div>
	  </div>
	</div>

</div>
<!-- /.row -->
@endsection