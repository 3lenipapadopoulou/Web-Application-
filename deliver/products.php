<?php
include ("../connect.php");
include ("menu.php");

if (isset($_POST['idp']))
{
	
	$s="update shop_products set Qnt='$_POST[qnt]' 
		 where id=$_POST[idp]";
		
	mysqli_query($conn,$s);
}

?>
  
<div class="container">


<h2>Products:</h2> 
 <?php

$s="select * from shop_products where id_shop=$_SESSION[sid]";
 $q=mysqli_query($conn,$s);
  while ($row=mysqli_fetch_array($q))
 {
	 $s2="select * from products where id=$row[id_prod]";
	$q2=mysqli_query($conn,$s2);
	$row2=mysqli_fetch_array($q2);
	 echo "
	 <form action='' method=post>
	 <br><br>
	 $row2[title] 
	 <input type=hidden name='idp' value=$row[id]>
	 <b>Quantity:</b> <input type=number name=qnt value='$row[Qnt]'> 
	<input type='submit' name=sv class='btn btn-default' value='Save'>
	 </form>
	 ";
 }

?> 
 
</div>

</body>
</html>
