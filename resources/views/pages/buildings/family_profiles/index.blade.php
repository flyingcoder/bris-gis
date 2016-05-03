@extends('layouts.app')

@section('htmlheader_title')
  Family Profile
@endsection

@include('pages.buildings.residents.add_modal')
@section('main-content')
  <section class="content-header">
          <h1>
            <a href="{{ route('buildings.show', $family->building_id) }}">
                  <span class="fa fa-reply"></span>
              </a> Family Profile
          </h1>      
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
          	<div class="col-md-3">
        		<div class="box">
            		<div class="box-header">
            			  <div class="col-xs-10">   
                      		<h3 class="box-title">{{$family->family_identifier}}</h3>
                    </div>
            		</div>
               			<div class="box-body">
                       <div class="form-group row">
                             <div class="col-xs-7 col-xs-offset-5">  
                                  <a data-toggle="modal" data-target="#edit-profile" class="btn btn-primary btn-xs">
                                      <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> 
                                      Edit
                                  </a>
                                  <a data-toggle="modal" data-target="#delete-profile" class="btn btn-danger btn-xs">
                                      <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> 
                                      Delete
                                  </a>
                              
                             </div>
                             @include('pages.buildings.family_profiles.edit_modal')
                             @include('pages.buildings.family_profiles.delete_modal')

                        </div>
                 			  <div class="form-group row">
                     				    <label class="col-md-5">Monthly Income</label>
                                <div class="col-md-6">{{$family->monthly_income}}</div>
                 		    </div>
                        <div class="form-group row">
                                <label class="col-md-5">Livelihood</label>
                                <div class="col-md-6">{{$family->if_other_livelihood}}</div>
                        </div>
                        <div class="form-group row">
                                <label class="col-md-5">Other Livelihood</label>
                                <div class="col-md-6">{{$family->livelihood}}</div>
                        </div>
                        <div class="form-group row">
                                <label class="col-md-5">4p's Beneficiary</label>
                                <div class="col-md-6">{{$family->if_4ps}}</div>
                        </div>

                 		   
              			</div>
       			 </div>
    		</div>	


            <div class="col-md-9">
              <div class="box">
                <div class="box-header">
                    <div class="col-xs-3">   
                      <h3 class="box-title">List of Residents</h3>
                    </div>
                    <div class="col-xs-0">
                      <a data-toggle="modal" data-target="#add-resident" style="float: right;" class="btn btn-primary btn-sm">
                          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
                          Add Resident
                      </a>
                    </div>                  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped table-condensed">
                     <thead>
                       <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Gender</th>
                          <th>Birthdate</th>
                          <th>Age</th>
                          <th>Civil Status</th>
                          <th>Relationship to Head</th>
                          <th><center>Delete</center></th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($family->familyMembers as $familyMember)
                      <tr>
                        <td>{{$familyMember->resident->id}}</td>
                        <td><a href="{{route('residents.show',$familyMember->resident->id)}}">{{$familyMember->resident->first_name}} {{$familyMember->resident->last_name}}</a></td>
                        <td>{{$familyMember->resident->gender}}</td>
                        <td>{{$familyMember->resident->birthdate}}</td>
                        <td>{{$familyMember->resident->age}}</td>
                        <td>{{$familyMember->resident->civil_status}}</td>
                        <td>{{$familyMember->relation_head}}</td>
                        <td>
                            <center>
                              <a href="#" data-toggle="modal" data-target="#{{$familyMember->resident->id}}delete-resident" >
                                <span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>
                              </a>
                            </center>
                        </td>
                      </tr>                               
                        @include('pages.buildings.residents.edit_modal')
                        @include('pages.buildings.residents.delete_modal')
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Gender</th>
                          <th>Birthdate</th>
                          <th>Age</th>
                          <th>Civil Status</th>
                          <th>Relationship to Head</th>
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
            "paging": true,
          "scrollX": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false

        });
      });
    </script>
@endsection