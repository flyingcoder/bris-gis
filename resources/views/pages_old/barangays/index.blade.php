@extends('layouts.app')

@section('htmlheader_title')
	Barangays
@endsection

@include('pages.barangays.add_modal')

@section('main-content')
  <div class="row">

    <!-- Table Content -->
      
    <div class="col-lg-10">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2>
              List of Barangays
            <a data-toggle="modal" data-target="#add-barangay" style="float: right;" class="btn btn-primary">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
                Add Barangay
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
                  <th>Province</th>
                  <th>Municipality</th>
                  <th><center>Edit</center></th>
                  <th><center>Delete</center></th>
                </tr>
              </thead>
              <tbody>

              @foreach($barangays as $barangay)
                <tr>
                  <td>{{$barangay->id}}</td>
                  <td><a href="{{route('barangays.show', $barangay->id)}}"> {{$barangay->name}} </a></td>
                  <td>{{$barangay->province_name}}</td>
                  <td>{{$barangay->municipality_name}}</td>
                  <td>
                    <center>
                      <a href="#" data-toggle="modal" data-target="#{{$barangay->id}}edit-barangay" >
                        <span class="glyphicon glyphicon-edit text-black" aria-hidden="true"></span>
                      </a>
                    </center>
                  </td>
                  <td>
                  	<center>
                      <a href="#" data-toggle="modal" data-target="#{{$barangay->id}}delete-barangay" >
                  			<span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>
                  		</a>
                  	</center>
                  </td>
                </tr>

              @include('pages.barangays.edit_modal')
              @include('pages.barangays.delete_modal')

              @endforeach

              </tbody>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Province</th>
                  <th>Municipality</th>
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

@section('page-script')

<script type="text/javascript">
$(document).ready(function(){ 
    $('#province1').on('change', function(){
        $.get("{{route('municipalities.dropdown')}}",
          { option: $(this).val() }, 
          function(data) {
            var municipalities = $('#municipalities1');
            municipalities.empty();
          $.each(data, function(index, element) {
                  municipalities.append("<option value='"+ index +"'>" + element + "</option>");
          });
        });
    });
  });
</script>

<script type="text/javascript">
$(document).ready(function(){ 
    $('#province2').on('change', function(){
        $.get("{{route('municipalities.dropdown')}}",
          { option: $(this).val() }, 
          function(data) {
            var municipalities = $('#municipalities2');
            municipalities.empty();
          $.each(data, function(index, element) {
            municipalities.append("<option value='"+ index +"'>" + element + "</option>");
          
          });
        });
    });
  });
</script>
@endsection