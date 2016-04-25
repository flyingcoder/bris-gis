<!--Start Preview Flood Maps-->
<div id="map-detail" class="modal fade" role="dialog">  
    <div class="modal-dialog modal-md">
      <!-- Modal content-->
        <div class="modal-content">
              <div class="modal-header-map">
              	   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <h4 class="modal-title">Preview</h4>
              </div>
              <div class='modal-body'>
                  <div id="googleMap" style="width:100%;height:75%;"></div>
              </div>
              <div class="modal-footer">
                    <button type="button" class="btn btn-default center-block" data-dismiss="modal">Close</button>                
              </div>
         </div>
       <!-- End Modal content-->
    </div>
</div>
<!-- End Preview Details -->



<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
var center = null;
 var map = null;
 var icon = null;
 var currentPopup;
 var bounds = new google.maps.LatLngBounds();
 var latlongs = [];
 var markerArray = [];
 var tmp;
 var temp;
 var i;

 function addPoint(lat, lng) {
  var pt = new google.maps.LatLng(lat, lng);
  bounds.extend(pt);
  latlongs.push(pt);
 }

 function getPoints() {
  return latlongs;
 }

 function addMarker(lat, lng, info) {
     var pt = new google.maps.LatLng(lat, lng);
     bounds.extend(pt);

     var marker = new google.maps.Marker({
         position: pt,
         icon: icon,
         map: map
    });
     
     var popup = new google.maps.InfoWindow({
         content: info,
         maxWidth: 300
     });

     google.maps.event.addListener(marker, "click", function() {
         if (currentPopup != null) {
             currentPopup.close();
             currentPopup = null;
         }

         popup.open(map, marker);
         currentPopup = popup;
     });

     google.maps.event.addListener(popup, "closeclick", function() {
         map.panTo(center);
         currentPopup = null;
     });

      markerArray.push(marker);
 }

 function initializeMap() {
     map = new google.maps.Map(document.getElementById("googleMap"), {
         center: new google.maps.LatLng(8.2280,124.2452),
         zoom: 14,
         mapTypeId: google.maps.MapTypeId.ROADMAP,
         mapTypeControl: true,
         mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
         },
         navigationControl: true,
         navigationControlOptions: {
            style: google.maps.NavigationControlStyle.SMALL
         }
     });
 
  }
    google.maps.event.addDomListener(window, 'load', initializeMap);
</script>



