<?php
include ("../connect.php");
include ("menu.php");
?>

<div class="container">

<?php
if(isset($_POST['prd']))
{
	
		
	$q1=mysqli_query($conn,"select shop.id as id1,  SQRT(POW(69.1 * ($_POST[lat] - lat), 2) + POW(69.1 * ($_POST[lng] - lng) * COS(lat / 57.3), 2)) AS distance
	from shop,sh_pr where sh_pr.id_s=shop.id and sh_pr.id_p=$_POST[prd] 
	and sh_pr.Quant>$_POST[posot] order by distance");
	$r1=mysqli_fetch_array($q1);
	
	
	$q2=mysqli_query($conn,"select users.id as id2, SQRT(POW(69.1 * ($_POST[lat] - lat), 2) + POW(69.1 * ($_POST[lng] - lng) * COS(lat / 57.3), 2)) AS distance
	from users where users.type_user='delivery' and users.state=1 order by distance");
	


	$r2=mysqli_fetch_array($q2);
	
	$q3=mysqli_query($conn,"select * from products where id=$_POST[prd]");
	$r3=mysqli_fetch_array($q3);
	
	
	$s="INSERT INTO orders (id, id_s, id_u, id_p, Qnt, total, addr, lat, lng, state,date1,dst) 
						VALUES (NULL, '$r1[id1]', '$r2[id2]', '$_POST[prd]', '$_POST[posot]', 
						'".($r3['price']*$_POST['posot'])."', '$_POST[addr]', '$_POST[lat]', '$_POST[lng]','0',now(), '$r2[distance]')";				
		
					
	mysqli_query($conn,$s);
	
	echo "<b>Your order Saved</b>";	
					

    die();			
}

?>

  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDB8Hzdr9qGqPyzhjLJOmXypyPlpQO0fIk&callback=initMap"></script>

<form action="" method=post>

    <script>

		var marker;
        function initMap() {
		
			var myLatLng = {lat:38.24582  , lng: 21.73562};

			var map = new google.maps.Map(document.getElementById('map'), {zoom: 15,  center: myLatLng   });
			
			
			map.addListener('click', function(e) {
	
				document.getElementById("lat").value=e.latLng.lat();
				document.getElementById("lng").value=e.latLng.lng();
				
				marker.setMap(null);
				marker = new google.maps.Marker({position: e.latLng, map: map });
			
			});
			
			marker = new google.maps.Marker({	position: myLatLng,	map: map	});

       
      }
    </script>



	<div id=map style='width:100%; height:200px;'></div>


	 <div class="form-group">
		<label for="product">Product</label>
			<select class="form-control"  id=prd name=prd>
				 <?php
				 $q=mysqli_query($conn,"select * from products");
				 while ($row=mysqli_fetch_array($q)) echo "<option value=$row[id]>$row[title]</option>";
				 ?>
			</select>
	 </div>
	 <div class="form-group">
		<label for="posot">Qnt</label>
	 <input type="number" class="form-control" id="posot" name="posot">
	 
	  <div class="form-group">
		<label for="addr">Address</label>
	 <input type="text" class="form-control" id="addr" name="addr">
	 
	 </div>
	 
	  <input type="hidden" id="lat" name="lat">
	  <input type="hidden"  id="lng" name="lng">
	 
	  <div class="form-group">
	  <button type="submit" class="btn btn-default">Make Order</button>
	
 </form>


</body>
</html>