
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
function initialize() {
  var mapProp = {
    center:new google.maps.LatLng(8.22312124,124.22121331),
    zoom:8,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
<!--Start Preview Flood Maps-->
<div id="preview-flood" class="modal fade" role="dialog">  
    <div class="modal-dialog modal-md">
      <!-- Modal content-->
        <div class="modal-content">
              <div class="modal-header-map">
              	   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <h4 class="modal-title">Preview</h4>
              </div>
              <div class='modal-body'>
                  <div id="googleMap" style="width:555px;height:400px;"></div>
              </div>
              <div class="modal-footer">
                    <button type="button" class="btn btn-default center-block" data-dismiss="modal">Close</button>                
              </div>
         </div>
       <!-- End Modal content-->
    </div>
</div>
<!-- End Preview Flood Maps -->


