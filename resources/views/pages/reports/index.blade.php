@extends('layouts.app')

@section('htmlheader_title')
  Reports
@endsection

@section('main-content')

<section class="content">
 <div class="row">
               <div class="col-lg-3">

                     <div class="box">
                         <div class="box-header">
                          <div class="col-lg-3">   
                           <h3 class="box-title">Options</h3>
                        </div>
                         </div>
                             <div class="box-body">                      
                                    <div class="form-group row">
                                      <label class="col-md-3 control-label">Category:</label>
                                          <div class="col-md-9">
                                              <select class="form-control" id="option1">
                                                 <option value="buildings">Building Information</option>
                                                 <option value="families">Family Information</option>
                                                 <option value="residents">Resident Information</option>
                                              </select>                          
                                          </div>
                                    </div>
                                    <div class="form-group row">
                                      <label class="col-md-3 control-label">Specifics:</label>
                                          <div class="col-md-9">
                                              <select class="form-control" id="option2">
                                              <option value="structure">Structure</option>
                                              <option value="building_usage">Usage</option>
                                              </select>                          
                                          </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 col-sm-offset-8">
                                                <button  id="go2" type="button" class="btn btn-primary" onclick="showReport()" btn-sm>GO</button>
                                        </div>
                                 </div>

                            </div>
                     </div>
            

                </div>

                <div class="col-lg-9">
                     <div class="box">
                    <div class="box-header with-border">
                    <h3 class="box-title">Pie Chart</h3>
                    </div>
                    <div class="box-body">
                    <div class="chart" id="report-chart" style="height: 600px;">
                      @piechart('reportChart', 'report-chart', true)
                    </div>
                    </div><!-- /.box-body -->
                 </div><!-- /.box -->
                </div>                
         </div>
         <div class="row">
         <div class="col-lg-9 col-lg-offset-3">
                     <div class="box">
                    <div class="box-header with-border">
                        <div class="box-tools pull-right">
                          <button class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-plus"></i></button>
                          </div>
                    <h3 class="box-title">Data Table</h3>
                    </div>
                    <div class="box-body">
                    <div class="chart" id="line-chart" style="height: 600px;">
                    </div>
                    </div><!-- /.box-body -->
                 </div><!-- /.box -->
                </div>     
         </div>
   </section>
@endsection

@section('page-script')

<script type="text/javascript">
$(document).ready(function(){ 
    $('#option1').on('change', function(){
            var option2 = $('#option2');
            option2.empty();
            if($(this).val() == 'buildings')
            {
              option2.append("<option value='structure'>Structure</option>");
              option2.append("<option value='building_usage'>Usage</option>");
            }else if ($(this).val() == 'families')
            {
              
              option2.append("<option value='monthly_income'>Family Income</option>");
              option2.append("<option value='if_4ps'>4ps Beneficiaries</option>");
            }else if ($(this).val() == 'residents')
            {
              option2.append("<option value='age'>Age</option>");
              option2.append("<option value='occupation_category'>Occupation</option>");
              option2.append("<option value='education'>Education</option>");
              option2.append("<option value='if_voter'>Voter</option>");
              option2.append("<option value='if_disabled'>Disabled</option>");
            }
          
  });

});
  function showReport()
  {
      $.get("{{ url( 'barangays/generateReports' ) }}",
        {table: $('#option1').val(),column: $('#option2').val()}, 
          function(data) {
            lava.loadData('reportChart', data, true);
        });
      

  }
</script>

@endsection