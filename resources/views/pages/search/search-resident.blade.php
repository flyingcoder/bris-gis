@extends('layouts.app')

@section('main-content')

<div class="row">
   

<div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
            @if(Auth::user()->capability == 'Admin')
              <li class=""><a href="{{route('search.households', 'all')}}">Household Information</a></li>
              <li class=""><a href="{{route('search.families', 'all')}}">Family Information</a></li>
              <li class="active"><a href="#tab_3" data-toggle="tab" aria-expanded="true">Resident Information</a></li>
            @else
              <li class=""><a href="{{route('search.households', Auth::user()->with('barangayAdmin')->find(Auth::user()->id)->barangayAdmin->barangay_id)}}">Household Information</a></li>
              <li class=""><a href="{{route('search.families', Auth::user()->with('barangayAdmin')->find(Auth::user()->id)->barangayAdmin->barangay_id)}}">Family Information</a></li>
              <li class="active"><a href="#tab_3" data-toggle="tab" aria-expanded="true">Resident Information</a></li>
            @endif
            </ul>
            <div class="tab-content" style="min-height:500px">
             
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="tab_3">
                <div class="row">
           <div class="col-md-8 col-md-offset-2">
            <div class="box">
                <div class="box-header">
                  <div class="col-xs-3">   
                          <h3 class="box-title">Search Option</h3>
                   </div>
                </div>
                <div class="box-body"> 
        <div class="col-md-12 form-group row">
                      <div class="col-md-10 col-md-offset-1">
                        <label>Search for Resident</label>   
                         <div class="input-group">
                       <span class="input-group-addon"><i class="fa fa-search"></i></span>
                     <input type="text" class="form-control" id="family-name" placeholder="Enter Family">
               </div>                     
                    </div> 
                </div>
                <div class="col-md-10 col-md-offset-1">
          <label for="exampleInputPassword1">Gender</label>
              <select class="form-control" name="if_4ps">
                      <option>Male</option>
                      <option>Female</option>
            </select>
                 </div>
                  <div class="col-md-10 col-md-offset-1">
            <label for="exampleInputEmail1">Educational Attainment</label>
                          <select class="form-control" name="education" id="education-list">
                            <option>Select Education</option>
                            <option value="Pre Elementary">Pre Elementary</option>
                            <option value="Elementary">Elementary</option>
                            <option value="High School Level">High School Level</option>
                            <option value="High School Graduate">High School Graduate</option>
                            <option value="College Level">College Level</option>
                            <option value="College Graduate">College Graduate</option>
                            <option value="Vocational">Vocational</option>
                            <option value="PostGraduate">PostGraduate</option>
                           </select>
                 </div>  
                        
                 <div class="col-md-10 col-md-offset-1">
          <label for="exampleInputPassword1">Registered Voter? </label>
              <select class="form-control" name="if_4ps">
                      <option>Yes</option>
                      <option>No</option>
            </select>
                 </div> 
                 <div class="col-md-10 col-md-offset-1">
          <label for="exampleInputPassword1">Disabled? </label>
              <select class="form-control" name="if_4ps">
                      <option>Yes</option>
                      <option>No</option>
            </select>
                 </div> 
                 </div> 
           </div>  
        </div>
    </div>

        <div class="row">
          <div class="col-md-12">
              <div class="box">
                <div class="box-header">
                  <div class="col-md-12">   
                          <h3 class="box-title">List of Family</h3>
                   </div>                    
                </div>
                <div class="box-body">
                <table id="resident-list" name="resident_list" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Birthdate</th>
                        <th>Gender</th>
                        <th>Civil Status</th>
                        <th>Contact No.</th>
                        <th>Occupation</th>
                        <th>Education</th>
                        <th>Voter</th>
                        <th>Disabled</th>
                        <th>Household Name</th>
                        <th>Purok</th>
                        <th>Barangay</th>
                      </tr>
                    </thead>
                    <tbody>
                    <tr>
                    <td>Sample sample</td>
                    <td>Sample sample</td>
                    <td>Sample sample</td>
                    <td>Sample sample</td>
                    <td>Sample sample</td>
                    <td>Sample sample</td>
                    <td>Sample sample</td>
                    <td>Sample sample</td>
                    <td>Sample sample</td>
                    <td>Sample sample</td>
                    <td>Sample sample</td>
                    <td>Sample sample</td>
                    <td>Sample sample</td>
                    <td>Sample sample</td>
                    <td>Sample sample</td>
                    </tr>
                    </tbody>
                    <tfoot>
                      <tr>                        
                        <th>ID</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Birthdate</th>
                        <th>Gender</th>
                        <th>Civil Status</th>
                        <th>Contact No.</th>
                        <th>Occupation</th>
                        <th>Education</th>
                        <th>Voter</th>
                        <th>Disabled</th>
                        <th>Household Name</th>
                        <th>Purok</th>
                        <th>Barangay</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
              </div>
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
</div>

@endsection

@section('page-script')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.bootstrap.min.css">


<!-- DataTables -->
<script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>


<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.bootstrap.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script type="text/javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/buttons/1.1.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/buttons/1.1.2/js/buttons.print.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/buttons/1.1.2/js/buttons.colVis.min.js"></script>


    <script>
        $('#resident-list').DataTable({
          "paging": true,
          "scrollX": true,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          dom: 'Bfrtip',
          lengthChange: true,
          buttons: [
              { extend: 'csv', text: 'Export file to Excel' }
          ]
        });
    </script>
@endsection