@extends('layouts.app')

@section('main-content')

<div class="row center">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">Reports</div>
            <div class="panel-body text-center"> Barangay Demographics</div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
            <div class="panel panel-primary">           
            <div class="panel-heading">Age Group</div>
                 <div class="panel-body">
                        <div class="form-group row">
                                <label class="col-md-2 control-label">Year:</label>
                                <div class="col-md-3">
                                     <select class="form-control" id="age1">
                                         <option>2000</option>
                                         <option>2002</option>
                                     </select>
                                </div>
                                <div class="col-md-3">
                                     <button type="button" class="btn btn-primary">Go</button>
                                </div>
                                <div class="col-md-10">
                                      <div id="myfirstchart" style="height: 340px;"></div>
                                </div>
                         </div>                       
                  </div>
            </div>
      </div>
       <div class="col-md-6">
            <div class="panel panel-primary">           
            <div class="panel-heading">Population</div>
                 <div class="panel-body">
                        <div class="form-group row">                               
                                <div class="col-md-10"> 
                                      <label class="col-md-0.5 control-label">Male vs Female</label>
                                      <div id="bar-example" style="height: 350px;"></div>
                                </div>
                         </div>                       
                  </div>
            </div>
      </div>
</div>




<script type="text/javascript">
      Morris.Donut({
        element: 'myfirstchart',
        data: [
          {label:"Infant", value: 500},
          {label:"Childhood", value: 700},
          {label:"Adolesence", value: 1000},
          {label:"Senior Citizen", value: 250}
        ]
      });
</script>
<script type="text/javascript">
      Morris.Bar({
        element: 'bar-example',
        data: [
          { y: '2006', a: 100, b: 90 },
          { y: '2007', a: 75,  b: 65 },
          { y: '2008', a: 50,  b: 40 },
          { y: '2009', a: 75,  b: 65 },
          { y: '2010', a: 50,  b: 40 },
          { y: '2011', a: 75,  b: 65 },
          { y: '2012', a: 100, b: 90 }
        ],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Male', 'Female']
      });
</script>
@endsection
