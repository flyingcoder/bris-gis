@extends('layouts.app')

@section('main-content')
<!-- Page Content -->
<div class="row">
	<div class="col-lg-6">

    <!-- Title -->
        <h1>Barangay {{$barangay->name}} </h1>
   			<button type="submit" href="#" data-toggle="modal" data-target="#edit-book" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit "></i> Edit</button>
		    <button type="submit" href="#" data-toggle="modal" data-target="#delete-book" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash "></i> Delete</button>
					
        <hr>

	    	<button type="submit" href="#" class="btn btn-success"><i class='fa fa-map-marker'></i> Manage Flood Hazard</button>

        <hr>

    </div>
	    <!-- Table Content -->
	    <div class="col-lg-6">
	      <div class="panel panel-default">
	        <div class="panel-heading">
	          <h2>
	              List of Purok
	            <a data-toggle="modal" data-target="#add-purok" class="btn btn-primary pull-right">
	              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
	                Add Purok
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

		            @for ($i = 1; $i <= 5; $i++)
		              <tr>
		                <td>{{ $i }}</td>
		                <td><a href="#">Purok {{ $i }}</a></td>
						<td>
							<center>
								<a href="#" data-toggle="modal" data-target="#edit-purok" >
							    	<span class="glyphicon glyphicon-edit text-black" aria-hidden="true"></span>
								</a>
							</center>
						</td>
						<td>
							<center>
								<a href="#" data-toggle="modal" data-target="#delete-purok" >
									<span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>
								</a>
							</center>
						</td>
		              </tr>
		             @endfor

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
</div>
<!-- /.row -->
@endsection