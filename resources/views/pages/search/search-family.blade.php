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
						<label for="exampleInputPassword1">Family Income</label>
			            <select class="form-control" name="monthly_income" id="monthly-income-list">
                                      <option value="0-10000000"></option>
                                      <option value="0-1000">P 0.00 - P 1,000</option>
                                      <option value="1001-3000">P 1,001 - P 3,000</option>
                                      <option value="3001-5000">P 3,001 - P 5,000</option>
                                      <option value="5001-10000">P 5,001 - P 10,000</option>
                                      <option value="10001-15000">P 10,001 - P 15,000</option>
                                      <option value="15001-20000">P 15,001 - P 20,000</option>
                                      <option value="20001-10000000">P 20,001 and above</option>
                                     </select> 
                 </div>         
                 <div class="col-md-10 col-md-offset-1">
					<label for="exampleInputPassword1">4 p's Beneficiary? </label>
					    <select class="form-control" name="if_4ps" id="if-4ps">
                      <option></option>
			                <option>Yes</option>
			                <option>No</option>
				    </select>
                 </div> 
                 </div> 
                 <div class="box-body">
                  <div class="form-group row">
                      <div class="col-md-2 col-md-offset-9">
                           <button type="submit" class="btn btn-primary btn-block" onclick="showFamily()">Submit</button>
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
                        <th>Family Income</th>
                        <th>Livelihood</th>
                        <th>4ps</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                      <tr>                        
                        <th>ID</th>
                        <th>Family Identifier</th>
                        <th>Family Income</th>
                        <th>Livelihood</th>
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

    <script>
        function showFamily() {
            var family_name = document.getElementById("family-name").value;
            var monthly_income = document.getElementById("monthly-income-list").value;
            var if_4ps = document.getElementById("if-4ps").value;

      $(function(){

          $.get("{{route('search.getFamily', $barangay_id)}}",
            {family_name: family_name, monthly_income: monthly_income, if_4ps: if_4ps},
            function(data){
              $('#family-list').dataTable().fnClearTable();
               $.each(data, function(index, element) {

                      $("#family-list").dataTable().fnAddData([
                                element.id,
                                element.family_identifier,
                                element.monthly_income,
                                element.livelihood,
                                element.if_4ps
                            ]);
                    });
            });
        });
      }
        </script>
@endsection