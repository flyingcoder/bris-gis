<!--Start Delete Disaster-->
<div id="{{$disaster->id}}delete-disaster" class="modal fade" role="dialog">  
    <div class="modal-dialog modal-md">
      <!-- Modal content-->
        <div class="modal-content">
              <div class="modal-header-danger">
              	   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <h4 class="modal-title">WARNING!</h4>
              </div>
              <div class='row modal-body' style="text-align:right">
        <form method="post" action="{{route('disasters.destroy', $disaster->id)}}">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="building_id" value="{{$building->id}}">
          					  <div class="form-group">
          								<center><strong><label>Are you sure you want to delete Disaster Information? </label></strong></center>
          						</div>
				          
              </div>
              <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger pull-right">Delete</button>
              </div>
              </form> 
         </div>
       <!-- End Modal content-->
    </div>
</div>
<!-- End Delete Disaster-->
