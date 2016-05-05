@extends('layouts.app')

@section('main-content')

<div class="row">
   

<div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
            @if(Auth::user()->capability == 'Admin')
              <li class=""><a href="{{route('search.households', 'all')}}">Household Information</a></li>
              <li class="active"><a href="#tab_2" data-toggle="tab" aria-expanded="true">Family Information</a></li>
              <li class=""><a href="{{route('search.residents', 'all')}}">Resident Information</a></li>
            @else
              <li class=""><a href="{{route('search.households', Auth::user()->with('barangayAdmin')->find(Auth::user()->id)->barangayAdmin->barangay_id )}}">Household Information</a></li>
              <li class="active"><a href="#tab_2" data-toggle="tab" aria-expanded="true">Family Information</a></li>
              <li class=""><a href="{{route('search.residents', Auth::user()->with('barangayAdmin')->find(Auth::user()->id)->barangayAdmin->barangay_id )}}">Resident Information</a></li>
            @endif
            </ul>
            <div class="tab-content" style="min-height:500px">
             
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="tab_2">
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
                      	<label>Search for Family</label>   
          				   <input type="text" class="form-control" id="family-name" placeholder="Enter Family">
                    </div> 
                </div>   
                  <div class="col-md-10 col-md-offset-1">
						<label for="exampleInputPassword1">Occupation Category</label>
			            <select class="form-control" name="occupation_category" id="occupation-category-list">
                            <option>Occupation Category</option>
                            <option value="Goverment Employee">Goverment Employee</option>
                            <option value="Private Employee">Private Employee</option>
                            <option value="Non-Government Organization">Non-Government Organization</option>
                            <option value="OFW">OFW</option>
                            <option value="Businessman">Businessman</option>
                            <option value="Farmer">Farmer</option>
                            <option value="Livestock Raiser">Livestock Raiser</option>
                            <option value="Fisherman">Fisherman</option>
                            <option value="Laborer/Unskilled Worker">Laborer/Unskilled Worker</option>
                            <option value="Skilled Worker">Skilled Worker</option>
                            <option value="Retiree/Pensioner">Retiree/Pensioner</option>
                            <option value="Unemployed">Unemployed</option>
                        </select>
                 </div>  
                 <div class="col-md-10 col-md-offset-1">
						<label for="exampleInputPassword1">Occupation Category</label>
			            <select class="form-control" name="occupation_category" id="occupation-category-list">
                            <option>Occupation Category</option>
                            <option value="Goverment Employee">Goverment Employee</option>
                            <option value="Private Employee">Private Employee</option>
                            <option value="Non-Government Organization">Non-Government Organization</option>
                            <option value="OFW">OFW</option>
                            <option value="Businessman">Businessman</option>
                            <option value="Farmer">Farmer</option>
                            <option value="Livestock Raiser">Livestock Raiser</option>
                            <option value="Fisherman">Fisherman</option>
                            <option value="Laborer/Unskilled Worker">Laborer/Unskilled Worker</option>
                            <option value="Skilled Worker">Skilled Worker</option>
                            <option value="Retiree/Pensioner">Retiree/Pensioner</option>
                            <option value="Unemployed">Unemployed</option>
                        </select>
                 </div>         
                 <div class="col-md-10 col-md-offset-1">
					<label for="exampleInputPassword1">4 p's Beneficiary? </label>
					    <select class="form-control" name="if_4ps">
			                <option>Yes</option>
			                <option>No</option>
				    </select>
                 </div> 
                 </div> 
                 <div class="box-body">
                  <div class="form-group row">
                      <div class="col-md-2 col-md-offset-9">
                           <button type="submit" class="btn btn-primary btn-block">Submit</button>
                      </div>
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
                <table id="family-list" name="family_list" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Family Identifier</th>
                        <th>Name</th>
                        <th>Birthdate</th>
                        <th>Gender</th>
                        <th>Civil Status</th>
                        <th>Contact No.</th>
                        <th>Occupation</th>
                        <th>Education</th>
                        <th>Voter</th>
                        <th>Family Income</th>
                        <th>4ps</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                      <tr>                        
                        <th>ID</th>
                        <th>Family Identifier</th>
                        <th>Name</th>
                        <th>Birthdate</th>
                        <th>Gender</th>
                        <th>Civil Status</th>
                        <th>Contact No.</th>
                        <th>Occupation</th>
                        <th>Education</th>
                        <th>Voter</th>
                        <th>Family Income</th>
                        <th>4ps</th>
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
        $('#family-list').DataTable({
          "paging": true,
          "scrollX": true,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          dom: 'Bfrtip',
          lengthChange: false,
          buttons: [
              { extend: 'csv', text: 'Export file to Excel' }
          ]
        });
    </script>
@endsection