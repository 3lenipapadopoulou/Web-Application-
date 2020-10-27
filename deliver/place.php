<?php
include ("../connect.php");
include ("menu.php");

if (isset($_POST['lat']))
{	
	mysqli_query($conn,"update users set lat=$_POST[lat], lng=$_POST[lng] where id=$_SESSION[uid]");
}

$q=mysqli_query($conn,"select * from users where id=$_SESSION[uid]");
$r=mysqli_fetch_array($q);

$lat=$r['lat'];
$lng=$r['lng'];

?>
  
<div class="container">


<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDB8Hzdr9qGqPyzhjLJOmXypyPlpQO0fIk&callback=initMap"></script>

   <script>

		var marker;
        function initMap() {
		
			var myLatLng = {<?php echo "lat:$lat  , lng: $lng" ?>};

			var map = new google.maps.Map(document.getElementById('map'), 
									{zoom: 14,  center: myLatLng   });
									
			marker = new google.maps.Marker({	position: myLatLng,	
										map: map	});
			
			
				map.addListener('click', function(e) {
			
					document.getElementById("lat").value=e.latLng.lat();
					document.getElementById("lng").value=e.latLng.lng();
					
					marker.setMap(null);
					marker = new google.maps.Marker({position: e.latLng, map: map });
			
				})
      }
    </script>


 <div id=map style='width:100%; height:400px;'></div>


<form action="" method=post>
  <div class="form-group">
  <?php
  echo "
	  <input type=\"hidden\" id=\"lat\" name=\"lat\" value='$lat' >
	 
	 <input type=\"hidden\" id=\"lng\" name=\"lng\" value='$lng' >
	 ";
	 ?>
	
  </div>
  <button type="submit" class="btn btn-default">Save Changes</button>
</form>

	
</div>
</div>
</body>
</html>