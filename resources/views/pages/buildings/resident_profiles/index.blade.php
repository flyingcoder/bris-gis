@extends('layouts.app')

@include('pages.buildings.health_infos.add_modal')

@section('main-content')
  <section class="content-header">
          <h1>
            <a href="{{route('families.show', $resident->familyMember->family_id)}}">
                  <span class="fa fa-reply"></span>
              </a> Resident Profile
          </h1>      
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
          	<div class="col-md-6">
        		<div class="box">
                    <div class="box-header">
                        <div class="col-xs-10">   
                              <h3 class="box-title">{{$resident->first_name}} {{$resident->last_name}}</h3>
                        </div>
                    </div>
               			<div class="box-body">
                       <div class="form-group row">
                             <div class="col-xs-6 col-xs-offset-6"> 
                                  <a data-toggle="modal" data-target="#edit-resprofile" class="btn btn-primary btn-xs">
                                      <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> 
                                      Edit
                                  </a>
                                  <a data-toggle="modal" data-target="#delete-resprofile" class="btn btn-danger btn-xs">
                                      <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> 
                                      Delete
                                  </a>
                             </div>
                            @include('pages.buildings.resident_profiles.edit_modal')
                            @include('pages.buildings.resident_profiles.delete_modal')

                        </div>
                 			        <div class="form-group row">
                                <label class="col-md-6">ID:</label>
                                <div class="col-md-6">{{$resident->id}}</div>
                        </div>
                        <div class="form-group row">
                                <label class="col-md-6">Last Name:</label>
                                <div class="col-md-6">{{$resident->last_name}}</div>
                        </div>
                        <div class="form-group row">
                                <label class="col-md-6">First Name:</label>
                                <div class="col-md-6">{{$resident->first_name}}</div>
                        </div>
                        <div class="form-group row">
                                <label class="col-md-6">Middle Name:</label>
                                <div class="col-md-6">{{$resident->middle_name}}</div>
                        </div>
                        <div class="form-group row">
                                <label class="col-md-6">Birthdate:</label>
                                <div class="col-md-6">{{$resident->birthdate}}</div>
                        </div>
                        <div class="form-group row">
                                <label class="col-md-6">Age:</label>
                                <div class="col-md-6">20</div>
                        </div>
                        <div class="form-group row">
                                <label class="col-md-6">Civil Status:</label>
                                <div class="col-md-6">{{$resident->civil_status}}</div>
                        </div>
                        <div class="form-group row">
                                <label class="col-md-6">Contact No.:</label>
                                <div class="col-md-6">{{$resident->contact_number}}</div>
                        </div>
                        <div class="form-group row">
                                <label class="col-md-6">Relationship to Head:</label>
                                <div class="col-md-6">{{$resident->familyMember->relation_head}}</div>
                        </div>
                        <div class="form-group row">
                                <label class="col-md-6">Education</label>
                                <div class="col-md-6">{{$resident->education}}</div>
                        </div>
                        <div class="form-group row">
                                <label class="col-md-6">Occupation Category:</label>
                                <div class="col-md-6">{{$resident->occupation_category}}</div>
                        </div>
                        <div class="form-group row">
                                <label class="col-md-6">Specific Occupation:</label>
                                <div class="col-md-6">{{$resident->occupation_specific}}</div>
                        </div>
                        <div class="form-group row">
                                <label class="col-md-6">Voter:</label>
                                <div class="col-md-6">{{$resident->if_voter}}</div>
                        </div>
                        <div class="form-group row">
                                <label class="col-md-6">Disabled:</label>
                                <div class="col-md-6">{{$resident->if_disabled}}</div>
                        </div>  

                 		   
              			</div>
       			 </div>
    		</div>	


            <div class="col-xs-6">
              <div class="box">
                <div class="box-header">
                    <div class="col-xs-6">   
                      <h3 class="box-title">Health Information</h3>
                    </div>
                    <div class="col-xs-0">
                      <a data-toggle="modal" data-target="#add-health" style="float: right;" class="btn btn-primary btn-sm">
                          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
                          Add 
                      </a>
                    </div>                  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                     <thead>
                       <tr>
                          <th>ID</th>
                          <th>Diseases</th>
                          <th>Date</th>
                          <th><center>Edit</center></th>
                          <th><center>Delete</center></th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($resident->diseases as $disease)
                      <tr>
                        <td>{{$disease->id}}</td>
                        <td>{{$disease->type}}</td>
                        <td>{{$disease->year}}</td>
                        <td>
                            <center>
                              <a href="#" data-toggle="modal" data-target="#{{$disease->id}}edit-health" >
                                <span class="glyphicon glyphicon-edit text-info" aria-hidden="true"></span>
                              </a>
                            </center>
                        </td>
                        <td>
                            <center>
                              <a href="#" data-toggle="modal" data-target="#{{$disease->id}}delete-health" >
                                <span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>
                              </a>
                            </center>
                        </td>
                      </tr>                               
                    @include ('pages.buildings.health_infos.edit_modal')
                    @include ('pages.buildings.health_infos.delete_modal')
                    @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                          <th>ID</th>
                          <th>Diseases</th>
                          <th>Dates</th>
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
@endsection