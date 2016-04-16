 @extends('layouts.app')

@section('htmlheader_title')
	Households
@endsection

@section('main-content')
      <div class="col-lg-12">
          <h1 class="page-header">
              List of Households
          <a href="{{route('users.create')}}" class="btn btn-primary" role="button" style="float: right;">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
              Add Household
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
                        <th>No</th>
                        <th>Name</th>
                        <th>Purok</th>
                        <th>Year Constructed</th>
                        <th>Usage</th>
                        <th>Total Area</th>
                        <th><center>Delete</center></th>
                      </tr>
                    </thead>
                    <tbody>

                    @foreach ($households as $household)
                      <tr>
                        <td>{{$household->id}}</td>
                        <td><a href="#">{{$household->name}}</a></td>
                        <td>{{$household->purok_name}}</td>
                        <td>{{$household->year_constructed}}</td>
                        <td>{{$household->usage}}</td>
                        <td>{{$household->area}}</td>
                        <td>
                        	<center>
                        		<button type="button" class="btn btn-link">
                        			<span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>
                        		</button>
                        	</center>
                        </td>
                      </tr>
                     @endforeach

                    </tbody>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Purok</th>
                        <th>Year Constructed</th>
                        <th>Usage</th>
                        <th>Total Area</th>
                        <th><center>Delete</center></th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>

@endsection
