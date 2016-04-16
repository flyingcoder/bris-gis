<!--Start Delete Barangay-->
<div id="{{$user->id}}delete-user" class="modal fade" role="dialog">
	<div class="modal-dialog modal-sm">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header modal-warning">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">WARNING!</h4>
			</div>
			<div class='row modal-body'>
				<form method="post" action="{{route('users.destroy', $user->id)}}">
					<div class="col-lg-12 panel">
						<div class="panel-body">
							<div class="form-group">
								<center><strong><label>Are you sure you want to delete User {{$user->first_name}} {{$user->last_name}}? </label></strong></center>
							</div>
							<div class="form-group">
								<input type="submit" name="submit" class="btn btn-danger pull-right" value="Delete User">
							</div>
						</div>
					</div>
				</form> 
			</div> 
		</div>
	</div>
</div>
<!-- End Delete Barangay -->
	
