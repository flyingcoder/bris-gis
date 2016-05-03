@extends('layouts.app')

@section('main-content')

<div class="row">
   

<div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
            @if(Auth::user()->capability == 'Admin')
              <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Household Information</a></li>
              <li class=""><a href="{{route('search.families', 'all')}}" >Family Information</a></li>
              <li class=""><a href="{{route('search.residents', 'all')}}">Resident Information</a></li>
            @else
              <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Household Information</a></li>
              <li class=""><a href="{{route('search.families', Auth::user()->with('barangayAdmin')->find(Auth::user()->id)->barangayAdmin->barangay_id)}}" >Family Information</a></li>
              <li class=""><a href="{{route('search.residents', Auth::user()->with('barangayAdmin')->find(Auth::user()->id)->barangayAdmin->barangay_id)}}">Resident Information</a></li>
            @endif
            </ul>
            <div class="tab-content" style="min-height:500px">
              <div class="tab-pane active" id="tab_1">
		          <div class="row">
		           <div class="col-md-8 col-md-offset-2">
		            <div class="box">
		                <div class="box-header">
		                	<div class="col-md-3">   
		                          <h3 class="box-title">Search Option</h3>
		                   </div>
		                </div>
		                    <div class="box-body">    
			                 	<div class="col-md-12 form-group row">
			                      	<div class="col-md-10 col-md-offset-1">
			                      		<label>Search for Household</label>   
			                         	<div class="input-group">
			          			   	    	<span class="input-group-addon"><i class="fa fa-search"></i></span>
			          						<input type="text" class="form-control" id="household-name" placeholder="Enter Household">
			         					</div>                     
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
		                          <h3 class="box-title">List of Household</h3>
		                   </div>                    
		                </div>
		                <div class="box-body">
		                <table id="household-list" name="household_list" class="table table-bordered table-hover">
		                    <thead>
		                      <tr>
		                        <th>ID</th>
		                        <th>Household</th>
		                        <th>Purok</th>
		                        <th>Barangay</th>
		                        <th>Municipality</th>
                            <th>Province</th>
                            <th>Year Constructed</th>
                            <th>Net Value</th>
                            <th>Usage</th>
                            <th>No. of Stories</th>
                            <th>Area</th>
                            <th>Holding</th>
		                      </tr>
		                    </thead>
		                    <tbody>
		                    </tbody>
		                    <tfoot>
		                      <tr>                        
		                        <th>ID</th>
                            <th>Household</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                            <th>Municipality</th>
                            <th>Province</th>
                            <th>Year Constructed</th>
                            <th>Net Value</th>
                            <th>Usage</th>
                            <th>No. of Stories</th>
                            <th>Area</th>
                            <th>Holding</th>
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
      $(function () {
        $('#household-list').DataTable({
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
      });
    </script>

@endsection